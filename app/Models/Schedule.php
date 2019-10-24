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
        return self::where(function($query) use ($start,$end) {
                            $query->where('start_time','<=',$start);
                            $query->Where('end_time','>=',$end);
                        })
                        ->where('room_id',$room_id)
                        ->first();
    }

    public static function cancelById($schedule_id)
    {
        $schedule = self::findOrFail($schedule_id);
        $schedule->status = 'canceled';
        $schedule->update();
    }
    

}
