<?php

namespace App\Http\Controllers;

use App\Info;
use App\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class StudentController extends Controller
{
    public function create() {
        return view('students.create');
    }

    public function store(Request $request) {
        $this->validate($request, [
            'lname' => 'required',
            'fname' => 'required',
            'mname' => 'required',
            'street' => 'required',
            'bar' => 'required',
            'town' => 'required',
            'prov' => 'required',
            'civil_status' => 'required',
            'bdate' => 'required',
            'gender' => 'required',
            'lname' => 'required',
            'lname' => 'required',
            'lname' => 'required',
        ]);

        $st = Student::create([
            'idext' => 'tmp',
            'lname' => strtoupper($request['lname']),
            'fname' => strtoupper($request['fname']),
            'mname' => strtoupper($request['mname']),
        ]);

        $info = Info::create([
            'id'=>$st->id,
            'street'=>$request['street'],
            'bar'=>$request['bar'],
            'town'=>$request['town'],
            'prov'=>$request['prov'],
            'gender'=>$request['gender'],
            'civil_status'=>$request['civil_status'],
            'bdate'=>$request['bdate'],
            'phone'=>$request['phone'],
            'father'=>$request['father'],
            'mother'=>$request['mother'],
            'parent_address'=>$request['parent_address'],
            'phone_parent'=>$request['phone_parent'],
            'guardian'=>$request['guardian'],
            'relation'=>$request['relation'],
            'phone_guardian'=>$request['phone_guardian'],
            'guardian_address'=>$request['guardian_address'],
            'elem_school'=>$request['elem_school'],
            'elem_address'=>$request['elem_address'],
            'elem_sy'=>$request['elem_sy'],
            'jhs_school'=>$request['jhs_school'],
            'jhs_address'=>$request['jhs_address'],
            'jhs_sy'=>$request['jhs_sy'],
            'shs_school'=>$request['shs_school'],
            'shs_address'=>$request['shs_address'],
            'shs_sy'=>$request['shs_sy'],
            'tertiary_school'=>$request['tertiary_school'],
            'tertiary_address'=>$request['tertiary_address'],
            'tertiary_sy'=>$request['tertiary_sy'],
            'grad_school'=>$request['grad_school'],
            'grad_address'=>$request['grad_address'],
            'grad_sy'=>$request['grad_sy'],
        ]);

        //store document images...
        if(isset($request->pic))
            $request->pic->storeAs("docs/" . $st->id, "pic.jpg");

        if(isset($request->live_birth))
            $request->live_birth->storeAs("docs/" . $st->id, "live_birth.jpg");

        if(isset($request->form137))
            $request->form137->storeAs("docs/" . $st->id, "form137.jpg");

        return redirect("/enrol/create/$st->id")->with('new-student', true);
    }

    public function view(Student $student) {
        $info = Info::find($student->id);

        if(!$info) {
            return redirect()->back()->with('Error','There is no information to show because this student did not register online.');
        }

        return view('students.view', [
            'student' => $student,
            'info' => $info
        ]);
    }

    public function updateID(Student $student, Request $request) {
        $this->validate($request, [
            'id' => 'required|numeric',
        ]);

        $oldId = $student->id;

        $student->update([
            'id' => $request['id'],
            'idext' => $request['idext']
        ]);

        //update documents folder..
        if(Storage::exists("docs/$oldId"))
            Storage::move('docs/' . $oldId, "docs/$student->id");

        return redirect("/backend/student/$student->id")->with('Info','The student ID has been updated.');
    }
}
