<?php

namespace App\Http\Controllers;

use App\Enrol;
use App\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class EnrolmentController extends Controller
{
    public function index() {
        return view('enrol.index');
    }

    public function verify(Request $request) {
        $this->validate($request,[
            'idnum' => 'required|numeric',
            'lname' => 'required',
            'fname' => 'required'
        ]);

        $stud = Student::find($request['idnum']);

        if($stud) {
            if(strcasecmp($stud->lname,$request['lname'])==0 && strcasecmp($stud->fname,$request['fname'])==0) {

                $enrol = Enrol::where('student_id', $request['idnum'])->first();

                if($enrol) {
                    return redirect("/enrol/$enrol->id");
                }else {
                    return redirect("/enrol/create/$stud->id");
                }

            }else {
                return redirect()->back()->with('Error','Sorry! The last name and/or first name do not match the ID Number you entered.');
            }
        }else {
            return redirect()->back()->with('Error',"Sorry! ID Number {$request['idnum']} is not on record.");
        }
    }

    public function create(Student $student) {
        $isNew = session('new-student');
        return view('enrol.create', [
            'student' => $student,
            'isNew' => $isNew
        ]);
    }

    public function store(Request $request) {
        $this->validate($request, [
            'email' => 'required|email',
            'phone' => 'required',
            'program' => 'required',
            'level' => 'required',
            'file' => 'required'
        ]);

        $enrol = Enrol::create([
            'student_id' => $request['student_id'],
            'email' => $request['email'],
            'phone' => $request['phone'],
            'program' => $request['program'],
            'level' => $request['level'],
            'code' => Str::random(8),
        ]);

        $request->file->storeAs("payments/" . $enrol->id, "payment.jpg");

        return redirect("/enrol/$enrol->id");
    }

    public function show(Enrol $enrol) {
        return view('enrol.view', compact('enrol'));
    }

    public function verifyPayment(Request $request) {
        $enrol = Enrol::findOrFail($request['id']);

        $enrol->payment_verified_by = auth()->user()->id;
        $enrol->save();

        return redirect('/dashboard')->with('Info',"The payment of Enrol ID: $enrol->id, {$enrol->student->fullName} has been verified");
    }

    public function review(Enrol $enrol) {
        return view('enrol.confirm', compact('enrol'));
    }
}
