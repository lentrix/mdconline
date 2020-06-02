@extends('template')

@section('content')

<h1>View Enrolment Status</h1>
<p class="alert alert-info">
    Here you can view the status of your enrolment.
</p>

{!! Form::open(['url'=>'/status','method'=>'post']) !!}

<div class='form-group'>
    {{Form::label('access_code','Please enter your access code.')}}
    {{Form::text('access_code',null,['class'=>'form-control'])}}
    <span style="color: #888; font-style:italic">
        If you have forgotten your Access Code, please do not hesitate
        to call our Customer Hotlines: <br>
        Land line - 508-8106, Globe/Sun - 0917 XXX XXXX, Smart/TNT 0922 XXX XXXX
    </span>
</div>
<div class="form-group">
    <button type="submit" class="btn btn-primary">
        Access Enrolment
    </button>
</div>

{!! Form::close() !!}

@stop
