@extends('template')

@section('content')
<div class="row">
    <div class="jumbotron">
        <h1>Welcome!</h1>
        <p class="lead">
            Thank you for your interest in learning with us!
        </p>
        <hr class="my-4">
        <p>
            With the implementation of
            the 'New Normal' global community protocols, we hope to provide our
            <strong>Regular College Students</strong> with
            a facility to streamline the enrolment process without setting foot on campus premises.
        </p>
        <p>
            Please take note that part of the online enrollment process is the submission of
            scanned copy or picture of the proof of payment (for entrance fee) of Php500. You
            may place your payment through these
            <a href="{{url('/payment-channels')}}">payment channels</a>.
        </p>
        <p>
            For more information, check our FAQ page or contact us at the following:
                <ul>
                    <li>Tel. No.: 508-8106</li>
                    <li><a href="http://www.facebook.com/mdctubigon" target="_blank" class="link">MDC Facebook Page</a></li>
                    <li>Email Us at <a href="mailto:info@mdc.ph">info@mdc.ph</a></li>
                </ul>
        </p>
        <p class="lead">
            <a class="btn btn-primary btn-lg" href="{{url('/enrol')}}" role="button">Get Started!</a>
        </p>
    </div>
</div>

@stop
