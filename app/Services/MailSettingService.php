<?php

namespace App\Services;

use App\Models\MailSetting;
use Illuminate\Support\Facades\Config;

class MailSettingService
{
    public function save(array $data)
    {
        return MailSetting::updateOrCreate(
            ['id' => 1],
            $data
        );
    }

    public function details()
    {
        return MailSetting::first();
    }
}