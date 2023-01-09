<?php

namespace App\Http\Controllers;

use auth;
use App\Models\Appointment;
use Illuminate\Http\Request;
use phpDocumentor\Reflection\Types\Null_;

class AppointmentController extends Controller
{
    //
    public function index()
    {


        return view('appointments.index', [
            'appointments' => Appointment::all()
        ]);
    }
    public function store(Request $request)
    {


        $formFields = $request->validate([
            "title" => "required",
            "datetime" => "required",
            "location" => "required",
            "coach_id" => "required",
            "travel_time" => "required",
            "duration" => "required",
            "alert" => "required"

        ]);
        $formFields['user_id'] = auth()->user()->id;
        Appointment::create($formFields);

        return redirect()->route('appointments.index');

        // return view('appointments.index', [
        //     'appointments' => Appointment::all()
        // ]);
    }
    public function apiStore(Request $request)
    {
        // return $request->body['title'];
       
        
        $formFields = [
            "title" => $request->title,
            "datetime" => $request->datetime,
            "location" => $request->location,
            "coach_id" => $request->coach_id,
            "travel_time" => $request->travel_time,
            "duration" => $request->duration,
            "alert" => $request->alert,
            "user_id" => $request->user_id
        ];
        // dd($formFields, $request->all());
        if($request->title == null){
            $formFields = [
                "title" => $request->body['title'],
                "datetime" => $request->body['datetime'],
                "location" => $request->body['location'],
                "coach_id" => $request->body['coach_id'],
                "travel_time" => $request->body['travel_time'],
                "duration" => $request->body['duration'],
                "alert" => $request->body['alert'],
                "user_id" => $request->body['user_id']
            ];

        }
        if($request->title == null && $request->body['title'] == null){
            return response()->json(['msg' => 'Enter a Title!'], 400);
        }

        if($request->location == null && $request->body['location'] == null ) {
            return response()->json(['msg' => 'Enter a Location!'], 400);
        }



        // $formFields['user_id'] = auth()->user()->id;
        // return $formFields;
        Appointment::create($formFields);
        //return last made id
        //return last id
        $lastId = Appointment::latest()->first()->id;


        return response()->json(['msg' => 'Success! You have been registered!'], 200);



        // return view('appointments.index', [
        //     'appointments' => Appointment::all()
        // ]);
    }
    public function create()
    {
        return view('appointments.create', [
            'coaches' => [
                [
                    'id' => 1,
                    'name' => 'Coach 1'
                ],
                [
                    'id' => 2,
                    'name' => 'Coach 2'
                ],
                [
                    'id' => 3,
                    'name' => 'Coach 3'
                ],
                [
                    'id' => 4,
                    'name' => 'Coach 4'
                ],
                [
                    'id' => 5,
                    'name' => 'Coach 5'
                ],
                [
                    'id' => 6,
                    'name' => 'Coach 6'
                ],

            ]
        ]);

    }

    public function apiIndex($id)
    {

        //get appointments where user_id = auth()->user()->id
        //paginate 3

        $appointments = Appointment::where('user_id', $id)->get();
        // $appointments = Appointment::all();
        $appointmentList = [];
        $times = [];



        foreach ($appointments as $appointment) {
           
            //hour minute formate date
            $appointment->startTime = date('H:i', strtotime($appointment->datetime));
            $appointment->datetime = date('Y-m-d', strtotime($appointment->datetime));
            if ($appointment->duration == -1) {
                $appointment->duration = 'All_Day';
            }
            if ($appointment->alert == -1) {
                $appointment->alert = 'None';
            }
            if ($appointment->travel_time == -1) {
                $appointment->travel_time = 'None';
            }
            if ($appointment->coach_id == -1) {
                $appointment->coach_id = Null;
            } else {
                $appointment->coach_id = [
                    'id' => $appointment->coach_id,
                    'name' => 'A. Baino ' . $appointment->coach_id,
                    'organization' => "Classy Notes",
                    'website' => "https://www.cn-lawfinancegroup.com/",
                    'type' => "Financial Literacy",
                    'availability' => [1, 2, 4],
                ];
            }
            //change string to date
            //if date not in appointmentList append
            //if date in appointmentList append to date
            if (
                !array_key_exists($appointment->datetime, $appointmentList)
            ) {
                //append appointment to times 
                array_push($times, $appointment);
                $appointmentList[$appointment->datetime] = [$appointment];
            } else {
                //add appointment to date
                array_push($appointmentList[$appointment->datetime], $appointment);
            }


        }
        // dd($appointments[2]->datetime);
        // dd($appointmentList);
        return $appointmentList;

        // return Appointment::all();
    }
}