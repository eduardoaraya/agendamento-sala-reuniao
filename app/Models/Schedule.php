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

    public static function checkAvailability(int $room_id, $start, $end)
    {
        return self::whereDate('start_time',$start->format('Y-m-d'))
        ->where(function($query) use ($start,$end){
            $query->whereRaw('TIME(start_time) BETWEEN ? AND ?',[$start->format('H:i:s'),$end->format('H:i:s')]);
            $query->whereRaw('TIME(end_time) BETWEEN ? AND ?',[$start->format('H:i:s'),$end->format('H:i:s')]);
            $query->OrWhereRaw('? BETWEEN TIME(start_time) AND TIME(end_time)',[$start->format('H:i:s')]);
            $query->OrWhereRaw('? BETWEEN TIME(start_time) AND TIME(end_time)',[$end->format('H:i:s')]);
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
