<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Stamp;
use App\Models\Rest;
Use Carbon\Carbon;
use Illuminate\Pagination\Paginator;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;


class AttendanceController extends Controller
{
    public function attendance(Request $request)
    {
        //Viewに渡す日時データを取得
        if(is_null($request->date))
        {
            $today = Carbon::today();
            $yesterday = Carbon::yesterday();
            $tomorrow = Carbon::tomorrow();
        } else {
            $today = new Carbon($request->date);
            $yesterday = (new Carbon($request->date))->subDay();
            $tomorrow = (new Carbon($request->date))->addDay();
        }

        //サブクエリを作成
        //**@var \Illuminate\Datebase\Query\Builder $subQuery */
        $subQuery = DB::table('rests')
                        ->select('stamp_id')
                        ->selectRaw('SUM(restTime) As sum_restTime')
                        ->groupBy('stamp_id');
               
        //3つのテーブルを結合させる
        $items = Stamp::join('users', 'users.id', 'user_id')
                 ->leftJoinSub($subQuery, 'rests', function ($join) {
                    $join->on('stamps.id', '=', 'stamp_id');
                 })
                 ->whereDate('stamps.created_at', $today)
                 ->paginate(5);
                
        return view('attendance', compact('today', 'yesterday', 'tomorrow', 'items'));
    }
    
    //ユーザー一覧ページ表示
    public function getUsers()
    {
        $users = User::paginate(5);

        return view('users-list', compact('users'));
    }
    
    //個人ページ表示
    public function show(Request $request)
    {
        $user = User::find($request->id);
        $items = [];

        return view('show', compact('user', 'items'));
    }

    //個別勤怠の取得
    public function showResult(Request $request)
    {
        $user = User::find($request->id);
        $year = $request->year;
        $month = $request->month;
        $day = $request->day;
        $date = Carbon::create($year, $month, $day);
        
        //サブクエリを作成
        //**@var \Illuminate\Datebase\Query\Builder $restBuilder */
        $subQuery = DB::table('rests')
                        ->select('stamp_id')
                        ->selectRaw('SUM(restTime) As sum_restTime')
                        ->groupBy('stamp_id');
               
        //3つのテーブルを結合させる
        $items = Stamp::join('users', 'users.id', 'user_id')
                 ->leftJoinSub($subQuery, 'rests', function ($join) {
                    $join->on('stamps.id', '=', 'stamp_id');
                 })
                 ->where('users.id', $user->id)
                 ->whereDate('stamps.created_at', $date)
                 ->get();
                
        return view('show', compact('user', 'items'));
    }
}
