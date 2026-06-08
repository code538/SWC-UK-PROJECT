<?php

namespace App\Http\Controllers\API\Admin;

use App\Http\Controllers\Controller;
use App\Services\MailSettingService;
use App\Traits\ApiResponse;
use Illuminate\Http\Request;

class MailSettingController extends Controller
{
    use ApiResponse;

    protected MailSettingService $mailSettingService;

    public function __construct(MailSettingService $mailSettingService)
    {
        $this->mailSettingService = $mailSettingService;
    }

    public function save(Request $request)
    {
        $request->validate([
            'host'         => 'required',
            'port'         => 'required',
            'username'     => 'required',
            'password'     => 'required',
            'from_address' => 'required|email',
            'from_name'    => 'required',
        ]);

        $smtp = $this->mailSettingService->save(
            $request->all()
        );

        return $this->success(
            $smtp,
            'SMTP settings saved successfully'
        );
    }

    public function details()
    {
        $smtp = $this->mailSettingService->details();

        if (!$smtp) {
            return $this->error(
                'SMTP settings not found',
                [],
                404
            );
        }

        return $this->success(
            $smtp,
            'SMTP settings fetched successfully'
        );
    }
}