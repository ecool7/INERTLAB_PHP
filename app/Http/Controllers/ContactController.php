<?php

namespace App\Http\Controllers;

use App\Mail\ContactMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Log;

class ContactController extends Controller
{
    public function index()
    {
        return view('pages.contact');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'message' => 'required|string|max:5000',
        ]);

        try {
            $toEmail = config('mail.to', env('MAIL_TO', 'info.inertlab@gmail.com'));
            
            if (empty($toEmail)) {
                return redirect()->route('contact')->with('error', 'Форма временно недоступна. Пожалуйста, свяжитесь с нами по email: info.inertlab@gmail.com');
            }
            
            Mail::to($toEmail)->send(new ContactMail(
                $request->name,
                $request->email,
                $request->message
            ));

            return redirect()->route('contact')->with('success', 'Спасибо! Ваше сообщение отправлено. Мы свяжемся с вами в ближайшее время.');
        } catch (\Exception $e) {
            \Log::error('Contact form error: ' . $e->getMessage());
            return redirect()->route('contact')->with('error', 'Произошла ошибка при отправке сообщения. Пожалуйста, попробуйте позже или напишите на info.inertlab@gmail.com');
        }
    }
}

