<?php

namespace App\Http\Controllers\Admin\MailNotifier;

use App\Http\Controllers\Controller;
use App\Models\MailNotifier;
use Illuminate\Http\Request;

class Index extends Controller
{
    public function index()
    {
        return view('Admin.MailNotifier.index', [
            'title' => 'Mail Notifier',
            'all_mail_sent' => MailNotifier::where('notifier_sent', 'yes')->get(),
            'all_mail_not_sent' => MailNotifier::where('notifier_sent', 'no')->get(),
        ]);
    }
}
