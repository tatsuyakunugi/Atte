<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Stamp;
use App\Models\Rest;
Use Carbon\Carbon;


class StampController extends Controller
{
    //出勤中かどうかを判定
    public function startWork()
    {
        $user = Auth::user();
        $stamp = Stamp::where('user_id', $user->id)->latest()->first();//一番最新のレコードを取得

            if($stamp)
            {   
                //最新のレコードに出勤記録があり、なおかつ退勤記録が無い
                return ($stamp->punchIn) && (empty($stamp->punchOut));

            } else {
                return false;
            }
    }

    //退勤済みかどうかの判定
    public function endWork()
    {
        $user = Auth::user();
        $stamp = Stamp::where('user_id', $user->id)->latest()->first();//一番最新のレコードを取得
        $oldStampDay = '';
        
        //出勤は１日1回までに制御
        if($stamp)
        {
            $oldStampPunchIn = new Carbon($stamp->punchIn);
            $oldStampDay = $oldStampPunchIn->startOfDay();//最後に登録したpunchInの時刻を00:00:00で代入

            $newStampDay = Carbon::today();//当日の日時を00:00:00で代入
            
            //日付の比較
            //同日付の出勤打刻が存在していて、なおかつ退勤履歴がある(すでに退勤済みである)
            return ($oldStampDay == $newStampDay) && ($stamp->punchOut);
        }      
    }

    public function punchIn()
    {
        $user = Auth::user();
        $startedWork = $this->startWork();//出勤済み判定
        $endedWork = $this->endWork();//退勤済み判定

        Stamp::create([
            'user_id' => $user->id,
            'punchIn' => Carbon::now(),
            'punchOut' => null,
            'stayTime' => null,
        ]);
        
        return redirect()->back();//出勤打刻が完了
    }

    public function punchOut()
    {
        //ログインユーザーの最新レコードを取得
        $user = Auth::user();
        $stamp = Stamp::where('user_id', $user->id)->latest()->first();
        //$rest = Rest::where('stamp_id', $stamp->id)->latest()->first();
        
        //出勤から退勤までの総合計時間を算出
        $now = new Carbon();
        $punchIn = new Carbon($stamp->punchIn);
        $stayTime = $stayTimeDiffInSeconds = $punchIn->diffInSeconds($now);
        
        $stamp->update([
            'punchOut' => Carbon::now(),
            'stayTime' => $stayTime,
        ]);

        return redirect()->back();//退勤打刻が完了
    }
}
