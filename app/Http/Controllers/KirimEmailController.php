<?php

namespace App\Http\Controllers;

use App\Mail\KirimEmail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class KirimEmailController extends Controller
{
    public function index(){
        return view('pages.mail.index');
    }

    public function kirim(Request $request)
    {
        $subject = $request->input('subject');
        $isi = $request->input('isi');
        $sender = $request->input('sender');

        $data_email = [
            'subject' => $subject,
            'isi' => $isi,
            'sender'=> $sender
        ];
        Mail::to('desacantikcimahi@gmail.com')->send(new KirimEmail($data_email));
        // return redirect('/email');
    }
}
