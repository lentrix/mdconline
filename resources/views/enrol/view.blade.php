@extends('template')

@section('content')

<div class="overlay">
    <div id="doc-viewer"></div>
</div>

<h1>View Enrolment</h1>

<div class="row">
    <div class="col-md-5">
        <h3>Enrolment Details</h3>
        <table class="table table-bordered table-sm">
            <tr>
                <th>ID Number</th>
                <td>
                    {{str_pad($enrol->student->id,7,'0',STR_PAD_LEFT)}}
                    @if(auth()->user()->scope=="registrar")
                        <a href='{{url("/backend/student/{$enrol->student->id}")}}'
                                class="btn btn-sm btn-info float-right"
                                title="View student record.">&#128196;</a>
                    @endif
                </td>
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
                <td>
                    {{$enrol->verificationStatus()}}
                    @if(auth()->user()->scope=="finance" && !$enrol->payment_verified_by)
                        <div class="float-right">
                            {!! Form::open(['url'=>'/verify-payment', 'method'=>'post']) !!}
                                {{Form::hidden('id', $enrol->id)}}
                                <button type="submit" title="Verify Payment">&#10004;</button>
                            {!! Form::close() !!}
                        </div>
                    @endif
                </td>
            </tr>
            <tr>
                <th>Records Verified</th>
                <td>
                    {{$enrol->recordsStatus()}}
                    @if(auth()->user()->scope=="registrar" && !$enrol->records_verified_by)
                        <div class="float-right">
                            {!! Form::open(['url'=>'/verify-records', 'method'=>'post']) !!}
                                {{Form::hidden('id', $enrol->id)}}
                                <button type="submit" title="Verify Records">&#10004;</button>
                            {!! Form::close() !!}
                        </div>
                    @endif
                </td>
            </tr>
            <tr>
                <th>Code</th>
                <td>{{$enrol->code}}</td>
            </tr>
        </table>

        @if(!in_array(auth()->user()->scope, ['finance','registrar','all']) && auth()->user()->inScope($enrol->program) && in_array($enrol->status, ["pending","processing"]))
        <a href='{{url("/backend/process/$enrol->id")}}' class="btn btn-primary">
            Process Enrolment
        </a>
        @endif
    </div>

    <div class="col-md-7">
        <h3>Submitted Documents</h3>
        @foreach(Storage::files("payments/$enrol->id") as $pic)
        <div class="doc-pic" data-path="{{asset("storage/$pic")}}" style="background-image: url('{{asset("storage/$pic")}}');">
            <div style="position: absolute; bottom: -20px">{{substr($pic, strrpos($pic,'/')+1)}}</div>
        </div>
        @endforeach
        @foreach(Storage::files("docs/$enrol->student_id") as $pic)
        <div class="doc-pic" data-path="{{asset("storage/$pic")}}" style="background-image: url('{{asset("storage/$pic")}}');">
            <div style="position: absolute; bottom: -20px">{{substr($pic, strrpos($pic,'/')+1)}}</div>
        </div>
        @endforeach
    </div>
</div>

@if($enrol->status=="finalized")

<hr>
<h3>Generated Study Load</h3>
<img src='{{asset("storage/study_load/$enrol->id.jpg")}}' alt="Study Load" style="width: 90%;">
@endif

@stop

@section('scripts')

<script>
    $(document).ready(function(){
        $('.doc-pic').click(function(){
            var file = $(this).attr('data-path');
            $('#doc-viewer').css('background-image', "url('" + file + "')");
            $('.overlay').show(200);
        })

        $('.overlay').click(function(){
            $(this).hide(100);
        })
    })
</script>

@stop
