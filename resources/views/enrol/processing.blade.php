@extends('template')

@section('content')

<h1>Processing Enrolment</h1>

<div class="row">
    <div class="col-md-6">
        <table class="table table-bordered table-striped">
            <tr>
                <th>Name</th>
                <td>{{$enrol->student->fullName}}</td>
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
                <th>Records Verified</th>
                <td>{{$enrol->recordsStatus()}}</td>
            </tr>
            <tr>
                <th>Payment Verified</th>
                <td>{{$enrol->verificationStatus()}}</td>
            </tr>
        </table>
    </div>
    <div class="col-md-6">
        <p class="alert alert-info">
            After processing this enrolment in the SIS, grab a screen shot of the
            study load and upload it here to finalize the enrolment.
        </p>
        {!! Form::open(['url'=>'/backend/process/'.$enrol->id, 'method'=>'post','enctype'=>'multipart/form-data']) !!}

        <div class='form-group'>
            {{Form::label('study_load')}}
            {{Form::file('study_load',['accept'=>'.jpg','required'])}}
        </div>

        <div class="form-group">
            <button type="submit" class="btn btn-primary">
                Finalize Enrolment
            </button>
        </div>

        {!! Form::close() !!}
    </div>
</div>

@stop
