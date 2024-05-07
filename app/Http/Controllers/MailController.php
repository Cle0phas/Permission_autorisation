<?php

namespace App\Http\Controllers;

use App\Mail\MailNotify;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class MailController extends Controller
{
    public function sendEmail(){
        $toEmail='okwuimma@gmail.com';
        $message='Bienvenue sur Shellum';
        $subject='Welcome Email in Shellum Club';

        
        $response=Mail::to($toEmail)->send(new MailNotify($message,$subject));

        dd($response);
    }

    public function sendSolo(){
        $toEmail='okwuimma@gmail.com';
        $contenu='Essai';
        $obj= "Je crois que c'est bon j'ai compris le mechanisme de sorte a reprendre seul , je verrai comment m'adapter ";

        
        $response=Mail::to($toEmail)->send(new MailNotify($contenu,$obj));

        dd($response);
    }

    


}
