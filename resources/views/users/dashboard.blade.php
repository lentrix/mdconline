@extends('template')

@section('content')

<h1>Dashboard</h1>

<hr>

<div class="row">
    <div class="col-md-3">
        <h3>Enrolment Status</h3>
        <table class="table table-bordered table-striped">
            <tr>
                <th>Pending Enrolment</th><td class="text-center">0</td>
            </tr>
            <tr>
                <th>Enrolment Under Processing</th><td class="text-center">0</td>
            </tr>
            <tr>
                <th>Finalized Enrolment</th><td class="text-center">0</td>
            </tr>
            <tr style="font-size: 1.2em">
                <th>Total Transactions</th>
                <td class="text-center">0</td>
            </tr>
        </table>
    </div>
    <div class="col-md-9">
        <h3>Transactions: {{strtoupper($status)}}</h3>
        <table class="table table-bordered">
            <thead>
                <tr class="bg-primary">
                    <th>Date/Time</th>
                    <th>Last Name</th>
                    <th>First Name</th>
                    <th>Program</th>
                    <th>Level</th>
                    <th>...</th>
                </tr>
            </thead>
            <tbody>
                @foreach($enrols as $enrol)
                <tr>
                    <td>{{$enrol->created_at}}</td>
                    <td>{{$enrol->student->lname}}</td>
                    <td>{{$enrol->student->fname}}</td>
                    <td>{{$enrol->program}}</td>
                    <td>{{$enrol->level}}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>


@stop
