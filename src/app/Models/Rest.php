<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rest extends Model
{
    use HasFactory;

    protected $fillable = [
        'stamp_id',
        'restIn',
        'restOut',
        'restTime',
    ];

    public function timestamp()
    {
        $this->belongsTo(stamp::class);
    }
}
