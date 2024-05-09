<?php
require '../vendor/autoload.php';

use Carbon\Carbon;

//$punchIn = new Carbon('2024-04-03 12:41:14');
//$punchOut = new Carbon('2024-04-03 16:31:42');
//$restIn = new Carbon('2024-04-03 15:02:32');
//$restOut = new Carbon('2024-04-03 15:15:58');

//$totalTime = $diffInSeconds = $punchIn->diffInSeconds($punchOut);
//$totalRest = $diffInSeconds = $restIn->diffInseconds($restOut);

//$workTime = gmdate('H:i:s', $totalTime - $totalRest);
//$restTime = gmdate('H:i:s', $totalRest);

//echo $workTime;
//echo $restTime;

//echo $totalTime;
//echo $totalRest;

//$totalTime = date_diff(new DateTime($punchIn), new DateTime($punchOut))->format('%H:%I:%S');
//$restTime = date_diff(new DateTime($restIn), new DateTime($restOut))->format('%H:%I:%S');
//$workTime = date_diff(new DateTime($totalTime), new DateTime($restTime))->format('%H:%I:%S');

//$workTime = Carbon::parse($totalTime - $totalRest)->format('H:i:s');
//$restTime = Carbon::parse($totalRest)->format('H:i:s');

//echo $workTime;
//echo $restTime;

//public function getWorkTimeAttribute()
    //{
        //$stampStartTime = new Carbon($this->punchIn);
        //$stampEndTime = new Carbon($this->punchOut);

        //$restStartTime = new Carbon($this->restIn);
        //$restEndTime =new Carbon($this->restOut);

        //$workTimeDiffInSeconds = $stampEndTime->diffInSeconds($stampStartTime);
        //$restTimeDiffInSeconds = $restEndTime->diffInseconds($restStartTime);

        //$workTime = Carbon::parse($workTimeDiffInSeconds - $restTimeDiffInSeconds)->format('H:i:s');
        
        //return $workTime;
    //}

//public function getRestTimeAttribute()
    //{
        //$restStartTime = new Carbon($this->restIn);
        //$restEndTime = new Carbon($this->restOut);

        //$restTimeDiffInSeconds = $restEndTime->diffInseconds($restStartTime);

        //$restTime = Carbon::parse($restTimeDiffInSeconds)->format('H:i:s');

        //return $restTime;
    //}

$punchIn = new Carbon('2024-05-10 22:00:00');
$punchOut = new Carbon('2024-05-11 07:00:00');
$restIn = new Carbon('2024-05-11 00:30:00');
$restOut = new Carbon('2024-05-11 01:00:00');

$stayTime = $diffInSeconds = $punchIn->diffInSeconds($punchOut);
$restTime = $diffInSeconds = $restIn->diffInseconds($restOut);

echo $stayTime;
echo nl2br("\n");
echo $restTime;