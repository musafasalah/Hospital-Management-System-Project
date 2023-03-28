<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\Doctor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function redirect(){

        if(Auth::id()){

            if(Auth::user()->usertybe == '0'){

                $doctor = Doctor::all();

                return view('user.home',compact('doctor'));
            }else{

                return view('admin.home');
            }

        }else
        {
            return redirect()->back();
        }
    }

    public function index(){

        if(Auth::id())
        {
            return redirect('home');
        }
        else{

            $doctor = Doctor::all();

            return view('user.home',compact('doctor'));
        }

    }

    public function appointment(Request $request){

        $data = new Appointment;

        $data->name = $request->name;
        $data->email = $request->email;
        $data->date = $request->date;
        $data->phone = $request->phone;
        $data->message = $request->message;
        $data->doctor = $request->doctor;
        $data->status = 'In Progress';

        if(Auth::id()){

            $data->user_id = Auth::user()->id;
        }

        $data->save();

        return redirect()->back()->with('message','Appointment Request Successful . We Will Contact With you Soon');

    }

    public function myappointment(){

        if(Auth::id()){

            $userid = Auth::user()->id;

            $appoint = Appointment::where('user_id','=',$userid)->get();

            return view('user.myappointment',compact('appoint'));

        }else{

            return redirect()->back();
        }

    }

    public function cancel_appoint($id){

        $data = Appointment::find($id);

        $data->delete();

        return redirect()->back();

    }
}
