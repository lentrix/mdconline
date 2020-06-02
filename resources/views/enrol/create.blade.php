@extends('template')

@section('content')

<h3>MDC Online Enrollment</h3>
<h4 style="font-size: 1.3em">1st Sem AY 2020-2021</h4>

<hr>

<h4 style="font-size: 1.3em">Welcome {{$student->fname}}!</h4>

<div class="alert alert-info">
    <p style="font-style: italic">
        Please proceed by filling up the details of your enrollment.
    </p>
</div>

{!! Form::open(['url'=>'/enrol/store','method'=>'post','enctype'=>'multipart/form-data']) !!}

{{Form::hidden('student_id',$student->id)}}

<div class="form-group row">
    <div class="col-md-6">
        {{Form::label('email')}}
        {{Form::email('email',null,['class'=>'form-control'])}}
    </div>
    <div class="col-md-4 instructions mt-auto">
        Please use an existing email that you
        can access after the online enrollment.
    </div>
</div>
<div class="form-group row">
    <div class="col-md-6">
        {{Form::label('phone','Mobile Number')}}
        {{Form::number('phone',null,['class'=>'form-control'])}}
    </div>
    <div class="col-md-4 instructions mt-auto">
        We will inform you through text regarding
        the status of your enrollment.
    </div>
</div>
<div class="form-group row">
    <div class="col-md-6">
        {{Form::label('program')}}
        {{Form::select('program',\App\Enrol::programList(),null,['class'=>'form-control','placeholder'=>'Select Program'])}}
    </div>
    <div class="col-md-4 instructions mt-auto">
        Degree program you want to enrol into.
    </div>
</div>
<div class="form-group row">
    <div class="col-md-6">
        {{Form::label('level','Year Level')}}
        {{Form::select('level',\App\Enrol::levelList(),null,['class'=>'form-control','placeholder'=>'Select Year Level'])}}
    </div>
    <div class="col-md-4 instructions mt-auto">

    </div>
</div>
<div class="form-group row">
    <div class="col-md-6">
        {{Form::label('file','Proof of Payment (File)')}}
        {{Form::file('file',['class'=>'form-control','accept'=>'.jpg'])}}
    </div>
    <div class="col-md-4 instructions mt-auto">
        Scanned copy or picture of the proof of payment
        i.e. Receipts, Transaction Slip, etc.
    </div>
</div>

<div class="form-group">
    <button class="btn btn-primary btn-lg">
       Submit Enrollment &#10132;
    </button>
</div>

{!! Form::close() !!}

@stop
