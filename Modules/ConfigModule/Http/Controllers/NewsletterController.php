<?php

namespace Modules\ConfigModule\Http\Controllers;

use Exception;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\Mail;
use Illuminate\View\View;
use Modules\CommonModule\Helper\BaseHelper;
use Modules\CommonModule\Helper\UploaderHelper;
use Modules\ConfigModule\Entities\NewsletterMessage;
use Modules\ConfigModule\Emails\NewsletterMail;
use Modules\UserModule\Entities\Newsletter;
use Modules\UserModule\Entities\User;


class NewsletterController extends Controller
{
    use BaseHelper, UploaderHelper;

    /**
     * Display a listing of the resource.
     * @return Application|Factory|Response|View
     */
    public function index()
    {
        $emails = Newsletter::get('email');
        $messages = NewsletterMessage::all();
        return view('configmodule::admin.newsletter.newsletter', compact('messages', 'emails'));
    }


    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Application|RedirectResponse|Response|Redirector
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'subject' => 'required',
            'message' => 'required',
            'emails' => 'required|min:1',
            'emails.*' => 'email',
        ]);

        $attachment = null;
        if ($request->file('attachment')) {
            $attachment = $this->uploadFile($request->file('attachment'), 'attachment');
        }

        $subject = $data['subject'];
        $message = $data['message'];
        $emails = $data['emails'];

        $diffs = array_diff($emails, Newsletter::whereIN('email', $emails)->get('email')->pluck('email')->toArray());
        $diffs = $this->prepareData($diffs, 'email');
        Newsletter::insert($diffs);

        if ($request->input('users'))
            $emails = array_merge($emails, User::where('is_merchant', 0)->get('email')->pluck('email')->toArray());
        if ($request->input('merchants'))
            $emails = array_merge($emails, User::where('is_merchant', 1)->get('email')->pluck('email')->toArray());

        try {
            Mail::bcc($emails)
                ->send(new NewsletterMail($subject, $message, $attachment));
            NewsletterMessage::create([
                'subject' => $subject,
                'message' => $message,
                'attachment' => $attachment,
            ]);
        } catch (Exception $e) {
//            throw $e;
            return redirect('admin/newsletter')->with('deleted', 'Failed To Sent');
        }
        return redirect('admin/newsletter')->with('success', 'success');
    }

}
