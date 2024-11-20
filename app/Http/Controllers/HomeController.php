<?php

namespace App\Http\Controllers;

use App\Models\Conversation;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function calendar()
    {
        return view('calendar');
    }

    public function chatMessage()
    {
        return view('chatMessage');
    }

    public function conversations(string $conversationId)
    {
        $conversation = Conversation::where('conversation_id', $conversationId)->first();
        $messages = $conversation->messages;
        $participants = $conversation->participants;
        $thisUser = '';
        foreach ($participants as $user) {
            if($user->user_1 == Auth::user()->user_id){
                $thisUser = $user->user_2;
            }else{
                $thisUser = $user->user_1;
            }
        }

        return view('conversations', [
            'messages' => $messages,
            'user' => User::where('user_id', $thisUser)->first(),
        ]);
    }

    public function chatEmpty()
    {
        return view('chatEmpty');
    }

    public function veiwDetails()
    {
        return view('veiwDetails');
    }

    public function email()
    {
        return view('email');
    }

    public function error1()
    {
        return view('error');
    }

    public function faq()
    {
        return view('faq');
    }

    public function gallery()
    {
        return view('gallery');
    }

    public function kanban()
    {
        return view('kanban');
    }

    public function pricing()
    {
        return view('pricing');
    }

    public function termsCondition()
    {
        return view('termsCondition');
    }

    public function widgets()
    {
        return view('widgets');
    }
    public function chatProfile()
    {
        return view('chatProfile');
    }

}
