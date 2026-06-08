<?php

namespace App\Services;

use App\Models\MailSetting;
use Illuminate\Support\Facades\Config;

class MailConfigService
{
    public static function load(): void
    {
        $mail = MailSetting::first();

        if (!$mail) {
            return;
        }

        Config::set('mail.default', 'smtp');

        Config::set('mail.mailers.smtp.host', $mail->host);
        Config::set('mail.mailers.smtp.port', $mail->port);
        Config::set('mail.mailers.smtp.username', $mail->username);
        Config::set('mail.mailers.smtp.password', $mail->password);
        Config::set('mail.mailers.smtp.encryption', $mail->encryption);

        Config::set('mail.from.address', $mail->from_address);
        Config::set('mail.from.name', $mail->from_name);
    }
}