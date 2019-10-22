<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    protected $table = 'schedule';

    protected $fillable = array(
        'room_id',
        'start_time',
        'end_time',
        'email',
        'description'
    );

    public function scopeActive($query)
    {
        return $query->where('status','active');
    }

    public static function checkAvailability(int $room_id, string $start, string $end)
    {
        return self::where('start_time','>=',$start)
                        ->where('end_time','<=',$end)
                        ->where('room_id',$room_id)
                        ->first();
    }
    

}
