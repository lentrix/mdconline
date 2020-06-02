<?php

namespace App\Http\Controllers;

use App\Enrol;
use App\Student;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Symfony\Component\HttpKernel\Exception\UnauthorizedHttpException;

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
                    return redirect("/status")->with('Info','You already have an enrolment transaction. Please enter the access code to view it.');
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

        return redirect("/enrol/$enrol->id")->with('first', true);
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
        if(session('first'))
            return view('enrol.confirm', compact('enrol'));
        else {
            return redirect("/status")->with('Info','You already have an enrolment transaction. Please enter the access code to view it.');
        }
    }

    public function verifyRecords(Request $request) {
        $enrol = Enrol::findOrFail($request['id']);

        $enrol->records_verified_by = auth()->user()->id;
        $enrol->save();

        return redirect("/backend/enrol/$enrol->id")->with('Info','The records for this enrolment has been verified.');
    }

    public function process(Enrol $enrol) {
        $user = User::find(auth()->user()->id);

        if(!$user->inScope($enrol->program)) {
            throw new UnauthorizedHttpException("You are not allowed to process this enrolment.");
        }

        if(!($enrol->payment_verified_by && $enrol->records_verified_by)) {
            throw new UnauthorizedHttpException("", "You cannot process and unverified enrolment.");
        }

        $enrol->status = "processing";
        $enrol->save();

        return view("enrol.processing", compact('enrol'));
    }

    public function finalize(Enrol $enrol, Request $request) {
        $this->validate($request, ['study_load'=>'required']);

        $request->study_load->storeAs('study_load', $enrol->id . ".jpg");

        $enrol->status = "finalized";
        $enrol->save();

        return redirect('/dashboard')->with('Info','Enrolment# ' . $enrol->id . " has been finalized.");
    }

    public function status() {
        return view('enrol.status');
    }

    public function accessStatus(Request $request) {
        $this->validate($request, ['access_code'=>'required']);

        $enrol = Enrol::where('code', $request['access_code'])->first();

        if($enrol) {
            return view('enrol.client-view', compact('enrol'));
        }else {
            return redirect()->back()->with('Error','Sorry! The Access Code you entered cannot be found.');
        }
    }
}
