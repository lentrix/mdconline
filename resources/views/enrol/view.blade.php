@extends('template')

@section('content')

<h1>View Enrolment</h1>

<div class="row">
    <div class="col-md-4">
        <h3>Enrolment Details</h3>
        <table class="table table-bordered">
            <tr>
                <th>ID Number</th>
                <td>{{str_pad($enrol->student->id,7,'0',STR_PAD_LEFT)}}</td>
            </tr>
            <tr>
                <th>Last Name</th>
                <td>{{$enrol->student->lname}}</td>
            </tr>
            <tr>
                <th>First Name</th>
                <td>{{$enrol->student->fname}}</td>
            </tr>
            <tr>
                <th>Middle Name</th>
                <td>{{$enrol->student->mname}}</td>
            </tr>
            <tr>
                <th>Contact No.</th>
                <td>{{$enrol->phone}}</td>
            </tr>
            <tr>
                <th>Program</th>
                <td>{{$enrol->program}}</td>
            </tr>
            <tr>
                <th>Year Level</th>
                <td>{{$enrol->level}}</td>
            </tr>
            <tr>
                <th>Status</th>
                <td>{{$enrol->status}}</td>
            </tr>
            <tr>
                <th>Payment Verified</th>
                <td>{{$enrol->verificationStatus()}}</td>
            </tr>
            <tr>
                <th>Records Verified</th>
                <td>{{$enrol->recordsStatus()}}</td>
            </tr>
        </table>
    </div>
    <div class="col-md-8">
        <h3>Proof of Payment</h3>
        <img src="{{Storage::url("proofs/$enrol->id.jpg")}}" alt="proof of payment" style="width: 100%">

        @if(auth()->user()->scope=="finance" && !$enrol->payment_verified_by)
        <div>
            {!! Form::open(['url'=>'/verify-payment', 'method'=>'post']) !!}
                {{Form::hidden('id', $enrol->id)}}
                <button class="btn btn-primary" type="submit">Verify Payment</button>
            {!! Form::close() !!}
        </div>
        @endif
    </div>
</div>

@stop
