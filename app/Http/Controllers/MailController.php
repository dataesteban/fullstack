<?php

use App\Http\Controllers\Controller;
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Requests;
use Mail;

class MailController extends Controller {

    public function basic_email(Request $request) {
        $to_name = $request->input("name");
        $to_email = $request->input("email");
        $subject = $request->input("subject");
        $file = $request->file("archivo");
        $data = array('name'=>"Cloudways (sender_name)", "body" => "oli");
      
    Mail::send('paginas.correo', $data, function($message) use ($to_name, $to_email, $subject, $file) {
    $message->to($to_email, $to_name)
    ->subject($subject);
    $message->from('envioapp5@gmail.com','Lab');
    $message->attach($file->getRealPath(), array(
        'as' => $file->getClientOriginalName(), // If you want you can chnage original name to custom name      
        'mime' => $file->getMimeType())
    );
    });
       

       return redirect('/resultado');
    }
}