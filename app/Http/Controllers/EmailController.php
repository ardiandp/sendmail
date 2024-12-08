<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class EmailController extends Controller
{
    public function showForm()
    {
        return view('emails.send-mail');
    }

    public function sendEmail(Request $request)
    {
        $request->validate([
            'title' => 'required|string',
            'to' => 'required|email',
            'text' => 'required|string',
        ]);

        $details = [
            'title' => $request->title,
            'body' => $request->text,
        ];

        Mail::send([], [], function ($message) use ($request, $details) {
            $message->to($request->to)
                    ->subject($details['title'])
                    ->html($details['body']); // Menggunakan metode `html` untuk isi email.
        });

        return back()->with('success', 'Email has been sent successfully!');
    }
}
