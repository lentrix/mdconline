@extends('template')

@section('content')

<h3>MDC Online Enrollment</h3>
<h4 style="font-size: 1.3em">1st Sem AY 2020-2021</h4>

<div class="row">
    <div class="col-md-8">
        <div class="alert alert-info" style="font-size: 1.1em">
            <strong>Please Note!</strong> <br>
            MDC Online Enrolment is intended only for current/returning MDC students.
            Freshmen and Transferees cannot use this facility. Instead, you are
            requested to personally process your enrolment in the MDC campus.
        </div>
    </div>
</div>

{!! Form::open(['url'=>'/enrol', 'method'=>'post']) !!}

<div class="form-group row">
    <div class="col-md-4">
        {{Form::label('idnum','ID Number')}}
        {{Form::number('idnum',null,['class'=>'form-control'])}}
    </div>
    <div class="instructions col-md-4 mt-auto">
        For ID Number, do not include the extension i.e. "-1T20"
        only the numeric part is required.
    </div>
</div>

<div class="form-group row">
    <div class="col-md-4">
        {{Form::label('lname','Last Name')}}
        {{Form::text('lname',null,['class'=>'form-control'])}}
    </div>
</div>

<div class="form-group row">
    <div class="col-md-4">
        {{Form::label('fname','First Name')}}
        {{Form::text('fname',null,['class'=>'form-control'])}}
    </div>
</div>

<div class="form-group">
    <button class="btn btn-primary btn-lg">Next Step &#10095;</button>
</div>

{!! Form::close() !!}

@stop

