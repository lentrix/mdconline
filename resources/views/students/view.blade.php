@extends('template')

@section('content')

<!-- Modal -->
<div class="modal fade" id="updateIDModal" tabindex="-1" role="dialog" aria-labelledby="updateIDModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="updateIDModalLabel">Update ID Number</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            {!! Form::open(['url'=>"/backend/student/$student->id/update-id",'method'=>'post']) !!}
            <div class="modal-body">
                <div class='form-group'>
                    {{Form::label('id','ID Number')}}
                    {{Form::text('id',$student->id,['class'=>'form-control'])}}
                </div>
                <div class='form-group'>
                    {{Form::label('idext','ID Extension')}}
                    {{Form::text('idext',$student->idext,['class'=>'form-control'])}}
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Update ID Number</button>
            </div>
            {!! Form::close() !!}
        </div>
    </div>
</div>

<h1>View info Information</h1>

<h3>Personal Information</h3>

<div class="row">
    <div class="col-md-6">
        <table class="table table-striped">
            <tr><th>ID Number</th>
                <td>
                    {{$student->id}}
                    <button class="btn btn-info btn-sm float-right"
                            data-toggle="modal" data-target="#updateIDModal"
                            title="Update ID Number" type="button">
                        &#9851;
                    </button>
                </td>
            </tr>
            <tr><th>Last Name</th><td>{{$student->lname}}</td></tr>
            <tr><th>First Name</th><td>{{$student->fname}}</td></tr>
            <tr><th>Middle Name</th><td>{{$student->mname}}</td></tr>
            <tr><th>Gender</th><td>{{$info->gender}}</td></tr>
            <tr><th>Civil Status</th><td>{{$info->civil_status}}</td></tr>
            <tr><th>Street</th><td>{{$info->street}}</td></tr>
            <tr><th>Barangay</th><td>{{$info->bar}}</td></tr>
            <tr><th>Town</th><td>{{$info->town}}</td></tr>
            <tr><th>Province</th><td>{{$info->prov}}</td></tr>
        </table>
    </div>
    <div class="col-md-6">
        <table class="table table-striped">
            <tr><th>Birth Date</th><td>{{$info->bdate->format('F d, Y')}}</td></tr>
            <tr><th>Name of Father</th><td>{{$info->father}}</td></tr>
            <tr><th>Name of Mother</th><td>{{$info->mother}}</td></tr>
            <tr><th>Address of Parents</th><td>{{$info->parent_address}}</td></tr>
            <tr><th>Parent's Phone</th><td>{{$info->phone_parent}}</td></tr>
            <tr><th>Guardian</th><td>{{$info->guardian}}</td></tr>
            <tr><th>Address of Guardian</th><td>{{$info->guardian_address}}</td></tr>
            <tr><th>Guardian's Phone</th><td>{{$info->phone_guardian}}</td></tr>
            <tr><th>Relationship</th><td>{{$info->relation}}</td></tr>
        </table>
    </div>
</div>

<h3>Educational Records</h3>
<table class="table table-striped table-bordered">
    <thead>
        <tr>
            <th>&nbsp;</th>
            <th>Name of School</th>
            <th>Address</th>
            <th>School Year</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <th>Elementary</th>
            <td>{{$info->elem_school}}</td>
            <td>{{$info->elem_address}}</td>
            <td>{{$info->elem_sy}}</td>
        </tr>
        <tr>
            <th>Junior High School</th>
            <td>{{$info->jhs_school}}</td>
            <td>{{$info->jhs_address}}</td>
            <td>{{$info->jhs_sy}}</td>
        </tr>
        <tr>
            <th>Senior High School</th>
            <td>{{$info->shs_school}}</td>
            <td>{{$info->shs_address}}</td>
            <td>{{$info->shs_sy}}</td>
        </tr>
        <tr>
            <th>Tertiary</th>
            <td>{{$info->tertiary_school}}</td>
            <td>{{$info->tertiary_address}}</td>
            <td>{{$info->tertiary_sy}}</td>
        </tr>
        <tr>
            <th>Post-Graduate</th>
            <td>{{$info->grad_school}}</td>
            <td>{{$info->grad_address}}</td>
            <td>{{$info->grad_sy}}</td>
        </tr>
    </tbody>
</table>

@stop
