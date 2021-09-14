<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Events\ChatPusher;
use Exception;
use Illuminate\Support\Facades\Log;
use Carbon\Carbon;


class ChatController extends Controller
{
    function GetMessages() {
        return json_decode(Storage::disk('local')->get('data.json'));
    }

    function NewMessage(Request $request){
            $ch = new Chat();
            $ch->message = $request->get('messageDTO');
            $ch->username = $request->get('useridDTO');
        event(
            new ChatPusher(
                $ch->message,
                $ch->username
                )
            );
        $this->SaveJson($ch);
    }



    function SaveJson(Chat $chp){
        try {
            $jsonfile = Storage::disk('local')->exists('data.json') ? json_decode(Storage::disk('local')->get('data.json')) : [];
            $chp->time = Carbon::now();
            array_push($jsonfile, $chp);
            Storage::disk('local')->put('data.json', json_encode($jsonfile));
        }catch (Exception $e) {
            Log::info($e);
        }
    }
}
class Chat
{
    public $message;
    public $username;
    public $time;
}
