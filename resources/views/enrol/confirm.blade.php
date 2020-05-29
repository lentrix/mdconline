@extends('template')


@section('content')

<div class="jumbotron">
    <h1>Congratulations!</h1>
    <p class="lead">
        You have completed your online enrolment!
    </p>
    <hr>
    <p>
        Please take note of following Access Code: <strong>{{$enrol->code}}</strong>. You will need this
        when checking the status of your enrolment at a later time.
        We will contact you once your enrolment have
        been verified and finalized.
        Please check back with us within 24 hours and click on the status link to
        check the status of your enrolment.
    </p>
    <p><strong>Enrolment Details</strong></p>
    <table>
        <tr>
            <th>Name </th><td>:</td><td>{{$enrol->student->fullName}}</td>
        </tr>
        <tr>
            <th>Program </th><td>:</td><td>{{\App\Enrol::programList()[$enrol->program]}}</td>
        </tr>
        <tr>
            <th>Year Level</th><td>:</td><td>{{$enrol->level}}</td>
        </tr>
    </table>
    <br>
    <p class="lead">
        <a href="{{url('/')}}" class="btn btn-primary btn-lg">Finished</a>
    </p>
</div>

@stop
