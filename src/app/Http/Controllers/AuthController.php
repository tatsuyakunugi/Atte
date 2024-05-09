<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Stamp;
use App\Models\Rest;
Use Carbon\Carbon;

class AuthController extends Controller
{   
    //出勤中かどうかを判定
    public function startWork()
    {
        $user = Auth::user();
        $stamp = Stamp::where('user_id', $user->id)->latest()->first();

            if($stamp)
            {
                return ($stamp->punchIn) && (empty($stamp->punchOut));
                
            } else {
                return false;
            }
    }

    //退勤済みかどうかの判定
    public function endWork()
    {
        $user = Auth::user();
        $stamp = Stamp::where('user_id', $user->id)->latest()->first();
        $oldStampDay = '';

        if($stamp)
        {
            $oldStampPunchIn = new Carbon($stamp->punchIn);
            $oldStampDay = $oldStampPunchIn->startOfDay();
            
            $newStampDay = Carbon::today();

            return ($oldStampDay == $newStampDay) && ($stamp->punchOut);
        }      
    }

    //休憩中かどうかの判定
    public function startRest()
    {
        $user = Auth::user();
        $rest = '';

        if(Stamp::where('user_id', $user->id)->exists())
        {
            $stamp = Stamp::where('user_id', $user->id)->latest()->first();

            if(Rest::where('stamp_id', $stamp->id)->exists())
            {
                $rest = Rest::where('stamp_id', $stamp->id)->latest()->first();
            }

            if($rest)
            {
                return ($stamp->punchIn) && (empty($stamp->punchOut)) && ($rest->restIn) && (empty($rest->restOut));
            }
        }
    }

    public function index()
    {
        $user = Auth::user();
        $oldStamp = Stamp::where('user_id', $user->id)->latest()->first();

        if($oldStamp)
        {
            $startedWork = $this->startWork();
            $endedWork = $this->endWork();
            $startedRest = $this->startRest();
        } else {
            $startedWork = false;
            $endedWork = false;
            $startedRest = false;
        }

        return view('index', compact('user', 'startedWork', 'endedWork', 'startedRest'));
    }
}
