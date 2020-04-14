@extends('layouts.app')

@section('content')
    <div class="container">
        Show all notifications for the user
        <ul>
            @forelse($notifications as $notification)
                <li>
                    @if(isset($notification->data['amount']))
                    We have received a payment of ${{ $notification->data['amount']/100 }} from you
                        @endif
                </li>
            @empty
                <li>You have not unread notifications at this time</li>
            @endforelse
        </ul>
    </div>
@endsection
