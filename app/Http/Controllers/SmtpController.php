<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;

class SmtpController extends Controller
{
    public function sendMail(Request $request){

        $request -> validate([

            "name" => 'required|string|max:250',
            "contactemail" => 'required|email|max:250',
            "subject" => 'required',
            "body" => 'required',

        ]);

        $name = $request->input('name');
        $email = $request->input('contactemail');
        $subject = $request->input('subject');
        $body = $request->input('body');

        $data = [
            'to' => 'dealbuddy1353@gmail.com',
            'name' => $name,
            'email' => $email,
            'subject' => $subject,
            'body' => $body,
        ];

        try{

            Mail::send('mailtemplate',$data,function($message) use ($data){
                $message ->to($data['to'])
                         ->from($data['email'],$data['name'])
                         ->subject($data['subject']);
            });
    
            $successFlag = true;

        }  catch (\Exception $e) {
           
            $successFlag = false;
            $message = $e->getMessage();
        }

        if($successFlag = true){
            return redirect('/contact')->withInput()->with("success","Email sent successfully");
        }
        else{
            return redirect('/contact')->withInput()->with("error","Email not sent");
        }

    }
}
