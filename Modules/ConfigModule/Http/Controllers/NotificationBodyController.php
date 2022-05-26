<?php

namespace Modules\ConfigModule\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\CommonModule\Helper\ApiResponseHelper;
use Modules\ConfigModule\Entities\NotificationBody;

class NotificationBodyController extends Controller
{
    use ApiResponseHelper;

    public function __construct()
    {
        $this->middleware('auth:admin');
        $this->middleware('permission:notify_body');
    }

    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        $notifications = NotificationBody::all();
        return view('configmodule::admin.notification_body', compact('notifications'));
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param string $key
     * @return Response
     */
    public function update(Request $request, string $key)
    {
        $body = NotificationBody::where('key', $key)->first();
        if (!$body)
            return $this->setCode(400)->setError('ordermodule::order.not_found')->send();

        $data = $request->validate([
            'desc_ar' => 'required',
            'send_sms' => 'required',
        ]);

        $data['desc_en'] = $request->input('desc_en') ?? $data['desc_ar'];

        $body->update($data);

        return $this->setCode(200)->setSuccess('success')->send();

    }
}
