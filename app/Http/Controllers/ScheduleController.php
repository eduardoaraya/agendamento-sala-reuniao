<?php

namespace App\Http\Controllers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Http\Request;
use App\Models\Schedule;
use Carbon\Carbon;
use Validator;

class ScheduleController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    const LIMIT_HOURS = 6;

    public function __construct()
    {
        //
    }

    //
    public function index()
    {
        try{

            return response()->json([
                'schedules' => Schedule::active()->get()
            ],200);
        }catch(\Exception $e){
            return response()->json([
                'error' => 'Erro interno'
            ],500);
        }
    }
    
    public function store(Request $request)
    {
        try{

            $validator = Validator::make($request->all(),[
                'email'         => 'required|email|string',
                'start_time'    => 'required|date|after:today',
                'end_time'      => 'required|date|after:today',
                'description'   => 'required|string',
                'room_id'       => 'required|integer|in:1,2,3,4,5'
            ]);

            if($validator->fails())
                return response()->json([
                    'errors' => $validator->errors()
                ],400);
            
            $start = new Carbon($request->start_time);
            $end = new Carbon($request->end_time);

            if($start->lte($end))
                return response()->json([
                    'error' =>  'Data de inicio maior do que a de término'
                ],400);
                
            if($start->diffInHours($end) > self::LIMIT_HOURS)
                return response()->json([
                    'error' =>  'Reunião atingiu o limite mínimo de '.self::LIMIT_HOURS.' horas.'
                ],400);

            if(Schedule::checkAvailability($request->room_id, $request->start_time, $request->end_time))
                return response()->json([
                    'error' => 'Horário indisponível para esta sala'
                ],400);
            
            Schedule::create($request->all());

            return response()->json([
                'schedules' => Schedule::active()->get()
            ],200);
        }catch(\Exception $e){
            return response()->json([
                'error' => 'Erro interno',
                'message' => $e->getMessage()
            ],500);
        }
    }
    
    public function cancel($schedule_id)
    {
        try{

            Schedule::cancelById($schedule_id);
            return response()->json([
                'schedules' => Schedule::active()->get()
            ]);
        }catch(\Exception $e){
            return response()->json([
                'error' => 'Erro interno'
            ],500);
        }
    }
}
