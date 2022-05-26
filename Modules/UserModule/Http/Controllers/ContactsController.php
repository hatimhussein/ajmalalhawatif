<?php

namespace Modules\UserModule\Http\Controllers;


use DateTime;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\CommonModule\Helper\ApiResponseHelper;
use Modules\UserModule\Entities\Newsletter;
use Modules\UserModule\Entities\Suggestion;
use Modules\UserModule\Entities\Contactus;
use Modules\ProductModule\Entities\ProductReview;
use Modules\UserModule\Repository\SuggestionRepository;
use Modules\UserModule\Repository\UserRepository;

class ContactsController extends Controller
{
    use SuggestionRepository;
    use ApiResponseHelper;

    public function __construct()
    {
        $this->middleware('permission:suggestions_complaint')->only(['SuggestionsComplaint']);
        $this->middleware('permission:contactus')->only(['ContactUs']);
        $this->middleware('permission:reviews')->only(['Reviews', 'changeReviewStatus', 'deleteReview']);

    }


    function ContactUs(UserRepository $userRepository)
    {
        $contacts = Contactus::all();
        $userRepository->markSeen($contacts);

        return view('usermodule::admin.user_contacts.contact_us', compact('contacts'));
    }

    function Newsletter()
    {
        $contacts = Newsletter::all();
        return view('usermodule::admin.user_contacts.newsletter', compact('contacts'));
    }

    function SuggestionsComplaint($type = 'all')
    {
        $to = \request()->to ?? '';
        $from = \request()->from ?? '';
        $complete = \request()->complete ?? 'all';

        $query = Suggestion::query();

        if ($type != 'all') $query->where('type', $type);
        if (!empty($from) && DateTime::createFromFormat('Y-m-d', $from)) $query->whereDate('created_at', '>=', $from);
        if (!empty($to) && DateTime::createFromFormat('Y-m-d', $to)) $query->whereDate('created_at', '<=', $to);
        $contacts = $query->get();

        $contacts->each->update(['seen_at' => now()]);

        return view('usermodule::admin.user_contacts.suggestions_complaint', compact('contacts', 'type', 'complete', 'from', 'to'));
    }

    function SuggestionsOperations(Request $request): RedirectResponse
    {
        switch ($request->get('method')) {
            case 'complete':
                Suggestion::whereIn('id', explode(',', $request->ids))->update(['complete' => 1]);
                break;
            case 'incomplete':
                Suggestion::whereIn('id', explode(',', $request->ids))->update(['complete' => 0]);
                break;
            case 'show':
                Suggestion::whereIn('id', explode(',', $request->ids))->update(['show' => 1]);
                break;
            case 'hide':
                Suggestion::whereIn('id', explode(',', $request->ids))->update(['show' => 0]);
                break;
            case 'delete':
                Suggestion::whereIn('id', explode(',', $request->ids))->delete();
                break;
        }
        return redirect()->back()->with('updated', 'updated');
    }

    function showSuggestion($id)
    {
        $suggestion = Suggestion::with('suggestionReply', 'user')->findOrFail($id);
        return view('usermodule::admin.suggestion.show', compact('suggestion'));
    }

    function deleteSuggestion($id)
    {
        $suggestions = Suggestion::destroy($id);
        return redirect()->back()->with('deleted', 'deleted');
    }

    function replySuggestion(Request $request)
    {
        $request->validate([
            'attach.*' => 'mimes:pdf,docx,doc,jpg,jpeg,png,mp4,mov',
            'reply' => 'required|min:3',
        ]);
        $reply = $this->replyAdmin($request->all());

        if (isset($request->type) && $request->type == 'show')
            return $reply;
        return $this->setCode(200)->setSuccess(__('commonmodule::validation.createdsuccess'))->send();
    }


    function Reviews()
    {
        $reviews = ProductReview::with('product')->orderBy('id', 'desc')->get();

        $reviews->each->update(['seen_at' => now()]);

        return view('usermodule::admin.user_contacts.reviews', compact('reviews'));
    }

    function changeReviewStatus($status, $id)
    {
        $reviews = ProductReview::where('id', $id)->update(['is_shown' => $status]);

        return redirect()->back()->with('updated', 'updated');
    }

    function deleteReview($id)
    {
        $reviews = ProductReview::destroy($id);

        return redirect()->back()->with('deleted', 'deleted');
    }


    function deleteMesssage($id)
    {
        $message = Contactus::find($id)->delete();
        return redirect()->back()->with('deleted', 'deleted');

    }

    function deleteAllMessages()
    {
        $message = Contactus::truncate();
        return redirect()->back()->with('deleted', 'deleted');

    }


}
