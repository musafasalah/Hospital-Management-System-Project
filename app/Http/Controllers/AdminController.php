<?php

namespace App\Http\Controllers;

use App\Models\Doctor;
use App\Models\Appointment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Notifications\SendEmailNotification;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Notification;

class AdminController extends Controller
{
    public function add_doctor_view(){
        if(Auth::id()){

            if(Auth::user()->usertybe == 1){

                return view('admin.add_doctors');
            }else{

                return redirect()->back();
            }
        }
        else{

            return redirect('login');
        }

    }
    public function upload_doctor(Request $request){

        $doctor = new Doctor;

        $doctor->name = $request->name ;
        $doctor->phone = $request->phone ;
        $doctor->specialty = $request->Specialty ;
        $doctor->room = $request->room ;

        $image = $request->file;

        $doctor->image = Storage::putFile("doctorimage",$image);

        $doctor->save();

        return redirect()->back()->with('message','Doctor Added Successfuly');

    }

    public function showappointments(){

        if(Auth::id()){

            if(Auth::user()->usertybe == 1){

        $data = Appointment::all();

        return view('admin.showappointments',compact('data'));

        }else{
                return redirect()->back();
             }
        }
        else{

            return redirect('login');
        }
    }

    public function approved($id){

       $data = Appointment::find($id);

       $data->status = 'Approved';

       $data->save();

       return redirect()->back();
    }

    public function canceled($id){

        $data = Appointment::find($id);

        $data->status = 'Canceled';

        $data->save();

        return redirect()->back();

    }

    public function showdoctor(){

        if(Auth::id()){

            if(Auth::user()->usertybe == 1){

        $data = Doctor::all();

        return view('admin.showdoctor',compact('data'));
            }else{


                return redirect()->back();
            }
        }else{

            return redirect('login');
        }
    }

    public function deletedoctor($id){

        $data = Doctor::find($id);

        $data->delete();

        return redirect()->back();
    }

    public function updatedoctor($id){

        if(Auth::id()){

            if(Auth::user()->usertybe == 1){

                $data = Doctor::find($id);

                return view('admin.updatedoctor',compact('data'));
            }

        else{

            return redirect()->back();
        }

        }else{

        return redirect('login');
    }

    }

    public function editdoctor(Request $request , $id){

        $doctor = Doctor::find($id);

        $doctor->name = $request->name;
        $doctor->phone = $request->phone;
        $doctor->Specialty = $request->Specialty;
        $doctor->room = $request->room;
        $doctor->name = $request->name;

        $image = $request->file;

        if($image){

            $doctor->image = Storage::putFile("doctorimage",$image);
        }

        $doctor->save();

        return redirect()->back()->with('message','Doctor Details updated successfuly');

    }

    public function emailview($id){

        if(Auth::id()){

            if(Auth::user()->usertybe == 1){

                $data = Appointment::find($id);

                 return view('admin.emailview',compact('data'));
               }
               
             else{
            return redirect()->back();
             }
        }
        else{
        return redirect('login');
        }
    }

    public function sendemail(Request $request , $id){

       $data = Appointment::find($id);

       $details = [

        'greeting' => $request->greeting,
        'body' => $request->body,
        'button' => $request->button,
        'url' => $request->url,
        'lastline' => $request->lastline,

       ];

       Notification::send($data , new SendEmailNotification($details));

       return redirect()->back()->with('message','Mail Sent successfuly . ');

    }
}
