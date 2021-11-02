<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\FeedbackController;

class MailController extends Controller
{
    public function sendMail(Request $request)
    {
        $details = $request->validate([
            'name' => 'required|max:255|min:3',
            'email' => 'required|string|email|max:255',
            'message' => 'required|min:10',
        ]);

        Mail::to("den-sidnay@yandex.ru")->send(New FeedbackController($details));
        return back()->with('success', 'Сообщение отправлено!');
    }
}
