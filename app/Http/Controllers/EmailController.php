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

    // kirim email dengan file

    public function showEmailForm1()
{
    return view('emails.email-form1'); // Mengarahkan ke file `resources/views/email-form1.blade.php`
}

public function showEmailForm2()
{
    return view('emails.email-form2'); // Mengarahkan ke file `resources/views/email-form2.blade.php`
}

public function sendEmailWithAttachment(Request $request)
{
    $request->validate([
        'title' => 'required|string',
        'to' => 'required|email',
        'text' => 'required|string',
        'attachment' => 'nullable|file|max:2048',
    ]);

    $details = [
        'title' => $request->title,
        'body' => $request->text,
    ];

    Mail::send([], [], function ($message) use ($request, $details) {
        $message->to($request->to)
                ->subject($details['title'])
                ->html($details['body']);

        if ($request->hasFile('attachment')) {
            $file = $request->file('attachment');
            $message->attach($file->getPathname(), [
                'as' => $file->getClientOriginalName(),
                'mime' => $file->getMimeType(),
            ]);
        }
    });

    return back()->with('success', 'Email has been sent successfully!');
}

}
