<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Stamp;
use App\Models\Rest;
Use Carbon\Carbon;

class RestController extends Controller
{   
    //休憩中かどうかの判定
    public function startRest()
    {
        $user = Auth::user();
        $rest = '';
        
        //もしstampsにレコードが存在していたら一番最新stampのレコードを取得
        if(Stamp::where('user_id', $user->id)->exists())
        {
            $stamp = Stamp::where('user_id', $user->id)->latest()->first();

            //もしrestsにstampsに紐づくにレコードが存在していたら一番最新のrestレコードを取得
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

    public function restIn() {
        $user = Auth::user();
        $stamp = Stamp::where('user_id', $user->id)->latest()->first();//一番最新stampのレコードを取得
        $startedRest = $this->startRest();
        
        if($stamp->punchIn && !$stamp->punchOut)
        {
            Rest::create([
                'stamp_id' => $stamp->id,
                'restIn' => Carbon::now(),
                'restOut' => null,
                'restTime' => null,
            ]);

            return redirect()->back()->with([
                'user' => $user,
                'startedRest' => $startedRest,
            ]);
        }
        return redirect()->back();//勤務中でなければ休憩開始打刻は出来ない
    }

    public function restOut() {
        //ログインユーザーの最新のレコードを取得
        $user = Auth::user();
        $stamp = Stamp::where('user_id', $user->id)->latest()->first();
        $rest = Rest::where('stamp_id', $stamp->id)->latest()->first();

        $startedRest = $this->startRest();

        if($stamp->punchIn && $rest->restIn && !$rest->restOut && !$stamp->punchOut)
        {
            //1回の休憩時間を算出
            $now = new Carbon();
            $restIn = new Carbon($rest->restIn);
            $restTime = $restTimeDiffInSeconds = $restIn->diffInSeconds($now);

            $rest->update([
                'restOut' => Carbon::now(),
                'restTime' => $restTime,
            ]);

            return redirect()->back()->with([
                'user' => $user,
                'startedRest' => $startedRest,
            ]);
        }
        return redirect()->back();//すでに休憩終了打刻が打たれている
    }
}
