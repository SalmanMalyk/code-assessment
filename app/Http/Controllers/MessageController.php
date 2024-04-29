<?php

namespace App\Http\Controllers;

use App\Models\Message;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\User;
use Illuminate\Support\Facades\Crypt;

class MessageController extends Controller
{
    public function index()
    {
        $messages = Message::where('recipient_id', auth()->id())->latest()->get();
        
        return view('Message.index',compact('messages'));
    }

    public function create() 
    {
        $users = User::whereNot('id', auth()->id())->get();

        return view('Message.create', compact( 'users'));
    }

    public function store(Request $request)
    {
        $encryptedContent = Crypt::encrypt($request->input('text'));

        $message = Message::create([
            'text' => $encryptedContent,
            'recipient_id' => $request->input('recipient_id'),
            'expires_at' => Carbon::parse($request->input('expires_at'), config('app.expire_timezone'))->timezone('UTC')->toDateTimeString(),
        ]);

        return redirect()->route('message.index');
    }

    public function markSeen(Request $request)
    {
        Message::where('recipient_id', auth()->id())->delete();
        return response()->json(['message' => 'Messages marked as seen successfully']);
    }
    
}
