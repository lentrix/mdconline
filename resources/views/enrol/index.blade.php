@extends('template')

@section('content')

<h3>MDC Online Enrollment</h3>
<h4 style="font-size: 1.3em">1st Sem AY 2020-2021</h4>

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

