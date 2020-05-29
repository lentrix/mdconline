@extends('template')

@section('content')

<h1>Dashboard</h1>

<hr>

<div class="row">
    <div class="col-md-3">
        <h3>Enrolment Status</h3>
        <table class="table table-bordered table-striped">
            <tr>
                <th>Pending Enrolment</th><td class="text-center">{{$counts['pending']}}</td>
            </tr>
            <tr>
                <th>Enrolment Under Processing</th><td class="text-center">{{$counts['processing']}}</td>
            </tr>
            <tr>
                <th>Finalized Enrolment</th><td class="text-center">{{$counts['finalized']}}</td>
            </tr>
            <tr>
                <th>Payment Verified</th><td class="text-center">{{$counts['verified']}}</td>
            </tr>
            <tr style="font-size: 1.2em">
                <th>Total Transactions</th>
                <td class="text-center">{{$counts['total']}}</td>
            </tr>
        </table>
    </div>
    <div class="col-md-9">
        <h3>Transactions: {{strtoupper($status)}}</h3>
        <table class="table table-bordered">
            <thead>
                <tr class="bg-primary">
                    <th>Date/Time</th>
                    <th>ID Number</th>
                    <th>Student</th>
                    <th>Program</th>
                    <th>Level</th>
                    <th class="text-center">...</th>
                </tr>
            </thead>
            <tbody>
                @foreach($enrols as $enrol)
                <tr>
                    <td>{{$enrol->created_at->format("F d, Y H:m A")}}</td>
                    <td class="text-center">{{str_pad($enrol->student->id, 7, '0',STR_PAD_LEFT)}}</td>
                    <td>{{$enrol->student->fullname}}</td>
                    <td>{{$enrol->program}}</td>
                    <td class="text-center">{{$enrol->level}}</td>
                    <td class="text-center">
                        <a href='{{url("/enrol/$enrol->id")}}' class="btn btn-sm btn-secondary" title="Open Transaction">
                            &#128194;
                        </a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>


@stop
