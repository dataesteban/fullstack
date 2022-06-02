<?php

namespace App\Http\Controllers;

use App\Mail\MensajeRecibido;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;

class MensajesController extends Controller
{
    public function store(Request $request)
    {

        $message = [

            'name' => $request->name,
            'email' => $request->email,
            'subject' => $request->subject,
            'content' => $request->content,
            'archivo' => $request->file('archivo')
        ];

        Mail::to($message['email'])->send(new MensajeRecibido($message));
        return readirect()->route('contact')->whith('status', 'Email enviado correctamente');
    }
}
