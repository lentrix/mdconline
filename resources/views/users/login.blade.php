@extends('template')

@section('content')

<div class="row">
    <div class="col-md-4 offset-md-4">

        <p style="color: #888; text-align: center">This login facility is your MDC personnel only.</p>

        <div class="card">
            <div class="card-header bg-primary text-white">
                &#128101; User Login
            </div>
            <div class="card-body">
                {!! Form::open(['url'=>"/login",'method'=>'post']) !!}

                <div class="form-group">
                    {{Form::label('username')}}
                    {{Form::text('username',null,['class'=>'form-control'])}}
                </div>
                <div class="form-group">
                    {{Form::label('password')}}
                    {{Form::password('password',['class'=>'form-control'])}}
                </div>
                <div class="form-group">
                    <button class="btn btn-primary float-right" type="submit">
                        &#128274; Login
                    </button>
                </div>



                {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>

@stop
