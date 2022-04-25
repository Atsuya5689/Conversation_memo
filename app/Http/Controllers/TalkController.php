<?php

namespace App\Http\Controllers;

use App\Talk;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TalkController extends Controller
{
    
    public function index(Talk $talk, User $user)
    {
        $myId = auth::id();
        $talks1 = $talk->where('from_user_id', $user->id)
            ->orWhere('to_user_id', $myId)->get();
        $talks2 = $talk->where('from_user_id', $myId)
            ->orWhere('to_user_id', $user->id)->get();
        $collection = $talks1;
        $concatenated = $collection->concat($talks2);
        $concatenated->all();
        $talks = $concatenated;
        
        return view('talk/index')
        ->with(['user' => $user, 
            'talks1' => $talk->where('from_user_id', $user->id)
            ->orWhere('to_user_id', $myId)->get(), 
            'talks2' => $talk->where('from_user_id', $myId)
            ->orWhere('to_user_id', $user->id)->get(),
            'talks' => $talks]);
    }
}
