<?php

namespace App\Http\Controllers;

use App\Mail\EmailTeste;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class EmailController extends Controller
{

    public function __construct (User $user)
    {
        $this->user_model = $user;
    }

    public function send ()
    {
        $email = new EmailTeste("Regeric");
        Mail::to('erichenriquesantosdamotta@gmail.com')->from('erichenriquedeveloper@gmail.com', 'Eric')->send($email);
    }

    public function sendAll()
    {
        $users = $this->user_model->all();
        foreach ($users as $key => $user) {
            $email = new EmailTeste($user->name);
            $email->from('erichenriquedeveloper@gmail.com', 'Eric');
            Mail::to($user->email)->send($email);
        }
    }

    public function render ()
    {
        return view('EmailTeste');
    }
}
