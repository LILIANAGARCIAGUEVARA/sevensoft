<?php

namespace App\Http\Controllers;
use Mail;
use App\Http\Requests;
use App\Http\Controllers\Controller;


use Illuminate\Http\Request;

class MailController extends Controller
{
    
 
   public function html_email() {
      $data = array('name'=>"Seburrin");
      Mail::send('mail', $data, function($message) {
         $message->to('seburrin@gmail.com', 'Seburrin')->subject
            ('Laravel HTML Testing Mail');
         $message->from('sevensoft.soporte@gmail.com','Maria Luisa');
      });
      echo "HTML Email Sent. Check your inbox.";
   }
   
}
