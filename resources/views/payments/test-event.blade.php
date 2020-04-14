@extends('layouts.app')

@section('content')
    <div class="container">
        <form action="/payments/process-event" method="post">
            @csrf
            <button class="btn btn-primary">Make Payment</button>
        </form>
    </div>
@endsection
