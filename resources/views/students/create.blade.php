@extends('template')

@section('content')

{!! Form::open(['url'=>'/registration', 'method'=>'post', 'enctype'=>'multipart/form-data']) !!}

<h1>New Student Registration Form</h1>

<h3>Personal Information</h3>

<div class="row">
    <div class="col-md-6">
        <div class='form-group'>
            {{Form::label('lname','Last Name')}}
            {{Form::text('lname',null,['class'=>'form-control'])}}
        </div>
        <div class='form-group'>
            {{Form::label('fname','First Name')}}
            {{Form::text('fname',null,['class'=>'form-control'])}}
        </div>
        <div class='form-group'>
            {{Form::label('mname','Middle Name')}}
            {{Form::text('mname',null,['class'=>'form-control'])}}
        </div>
        <div class='form-group'>
            {{Form::label('bdate','Date of Birth')}}
            {{Form::date('bdate',null,['class'=>'form-control'])}}
        </div>
        <div class='form-group'>
            {{Form::label('civil_status')}}
            {{Form::select('civil_status',['single'=>'Single','married'=>'Married','widow'=>'Widow/Widower'],null,['class'=>'form-control'])}}
        </div>
        <div class='form-group'>
            {{Form::label('street')}}
            {{Form::text('street',null,['class'=>'form-control'])}}
        </div>
        <div class='form-group'>
            {{Form::label('bar','Barangay')}}
            {{Form::text('bar',null,['class'=>'form-control'])}}
        </div>
        <div class='form-group'>
            {{Form::label('town')}}
            {{Form::text('town',null,['class'=>'form-control'])}}
        </div>
        <div class='form-group'>
            {{Form::label('prov','Province')}}
            {{Form::text('prov',null,['class'=>'form-control'])}}
        </div>
        <div class='form-group'>
            {{Form::label('phone')}}
            {{Form::text('phone',null,['class'=>'form-control'])}}
        </div>
    </div>
    <div class="col-md-6">
        <div class='form-group'>
            {{Form::label('gender')}}
            {{Form::select('gender',['female'=>'Female','male'=>'Male'],
                null,['class'=>'form-control','placeholder'=>'Select gender'])}}
        </div>
        <div class='form-group'>
            {{Form::label('father','Father\'s Name')}}
            {{Form::text('father',null,['class'=>'form-control'])}}
        </div>
        <div class='form-group'>
            {{Form::label('mother','Mother\'s Name')}}
            {{Form::text('mother',null,['class'=>'form-control'])}}
        </div>
        <div class='form-group'>
            {{Form::label('parent_address','Parent\'s Address')}}
            {{Form::text('parent_address',null,['class'=>'form-control'])}}
        </div>
        <div class='form-group'>
            {{Form::label('phone_parent','Parent\'s Phone')}}
            {{Form::text('phone_parent',null,['class'=>'form-control'])}}
        </div>
        <div class='form-group'>
            {{Form::label('guardian','Name of Guardian')}}
            {{Form::text('guardian',null,['class'=>'form-control'])}}
        </div>
        <div class='form-group'>
            {{Form::label('phone_guardian','Guardian\'s Phone')}}
            {{Form::text('phone_guardian',null,['class'=>'form-control'])}}
        </div>
        <div class='form-group'>
            {{Form::label('relation','Relationship with Guardian')}}
            {{Form::text('relation',null,['class'=>'form-control'])}}
        </div>
        <div class='form-group'>
            {{Form::label('guardian_address','Guardian\'s Address')}}
            {{Form::text('guardian_address',null,['class'=>'form-control'])}}
        </div>
    </div>
</div>
<h3>Educational Background</h3>
<p class="alert alert-info">
    For the following fields, please enter only the school where you graduated
    at each of the levels indicated below.
</p>
<table class="table table-bordered">
    <thead>
        <tr>
            <th>&nbsp;</th>
            <th>Name of School</th>
            <th>Address</th>
            <th>School Year (Last attended)</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <th>Elementary</th>
            <td>{{Form::text('elem_school',null,['class'=>'form-control'])}}</td>
            <td>{{Form::text('elem_address',null,['class'=>'form-control'])}}</td>
            <td>{{Form::text('elem_sy',null,['class'=>'form-control'])}}</td>
        </tr>
        <tr>
            <th>Junior High School</th>
            <td>{{Form::text('jhs_school',null,['class'=>'form-control'])}}</td>
            <td>{{Form::text('jhs_address',null,['class'=>'form-control'])}}</td>
            <td>{{Form::text('jhs_sy',null,['class'=>'form-control'])}}</td>
        </tr>
        <tr>
            <th>Senior High School</th>
            <td>{{Form::text('shs_school',null,['class'=>'form-control'])}}</td>
            <td>{{Form::text('shs_address',null,['class'=>'form-control'])}}</td>
            <td>{{Form::text('shs_sy',null,['class'=>'form-control'])}}</td>
        </tr>
        <tr>
            <th>College</th>
            <td>{{Form::text('tertiary_school',null,['class'=>'form-control'])}}</td>
            <td>{{Form::text('tertiary_address',null,['class'=>'form-control'])}}</td>
            <td>{{Form::text('tertiary_sy',null,['class'=>'form-control'])}}</td>
        </tr>
        <tr>
            <th>Post Graduate</th>
            <td>{{Form::text('grad_school',null,['class'=>'form-control'])}}</td>
            <td>{{Form::text('grad_address',null,['class'=>'form-control'])}}</td>
            <td>{{Form::text('grad_sy',null,['class'=>'form-control'])}}</td>
        </tr>
    </tbody>
</table>

<h3>Documentary Requirements</h3>
<p class="alert alert-info">
    As part of the requirements for enrolment, you are required to submit scanned copy or
    photos of the following documents in jpg format.
</p>

<table class="table table-striped">
    <tr>
        <td>{{Form::label('pic','Two-by-two Picture')}}</label></td>
        <td>{{Form::file('pic',['accept'=>'.jpg'])}}</td>
    </tr>
    <tr>
        <td>{{Form::label('live_birth','Certificate of Live Birth')}}</label></td>
        <td>{{Form::file('live_birth',['accept'=>'.jpg'])}}</td>
    </tr>
    <tr>
        <td>{{Form::label('form137','Form 137-A or Certificate of Transfer')}}</label></td>
        <td>{{Form::file('form137',['accept'=>'.jpg'])}}</td>
    </tr>
</table>


<div class="form-group">
    <button type="submit" class="btn btn-primary btn-lg">Submit Registration</button>
</div>

{!! Form::close() !!}
@stop
