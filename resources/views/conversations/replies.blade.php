@foreach($conversation->replies as $reply)
    <div>
        <header class="d-flex justify-content-between">
            <p class="m-0"><strong>{{ $reply->user->name }} said...</strong></p>

            @if($reply->isBest())
                <span class="text-success">Best Reply!!</span>
            @endif
        </header>
        {{ $reply->body }}

{{--        @can('update-conversation', $conversation)--}}
        @can('update', $conversation)
            <form method="post" action="/best-replies/{{ $reply->id }}">
                @csrf

                <button class="btn p-0 text-muted">Best Reply</button>
            </form>
        @endcan
    </div>

    @continue($loop->last)

    <hr>
@endforeach
