<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
Use Carbon\Carbon;

class Stamp extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'punchIn',
        'punchOut',
        'stayTime',
    ];

    protected $appends = [
        'startTime',
        'endTime',
        'workTime',
        'totalRestTime',
        'date',
        'year',
        'month',
    ];
    
    public function getStartTimeAttribute()
    {
        $punchIn = new Carbon($this->punchIn);
        $startTime = $punchIn->format('H:i:s');

        return $startTime;
    }

    public function getEndTimeAttribute()
    {
        if (is_null($this->punchOut))
        {
            $endTime = null;
            
        } else {
            $punchOut = new Carbon($this->punchOut);
            $endTime = $punchOut->format('H:i:s');
        }
        

        return $endTime;
    }

    public function getWorkTimeAttribute()
    {
        if (is_null($this->punchOut))
        {
            $workTime = null;
            
        } else {
            $stayTime = $this->stayTime;
            $sumRestTime = $this->sum_restTime;
            $workTimeDiffInSeconds = $stayTime - $sumRestTime;
            $workTime = Carbon::parse($workTimeDiffInSeconds)->format('H:i:s');
        }
        
        return $workTime;
    }

    public function getTotalRestTimeAttribute()
    {
        if (is_null($this->sum_restTime))
        {
            $totalRestTime = null;
            
        } else {
            $sumRestTimeDiffInSeconds = $this->sum_restTime;
            $totalRestTime = Carbon::parse($sumRestTimeDiffInSeconds)->format('H:i:s');
        }
        
        return $totalRestTime;
    }

    public function getWorkDayAttribute()
    {
        $date = new Carbon($this->punchIn);
        $workDay = $date->format('Y-m-d');

        return $workDay;
    }

    public function user()
    {
        $this->belongsTo(User::class);
    }

    public function rest()
    {
        $this->hasMany(Rest::class);
    }

}
