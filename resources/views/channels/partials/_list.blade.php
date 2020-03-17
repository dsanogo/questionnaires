@forelse ($channels as $channel)
    <li class="list-group-item"> {{ $channel->name }}</li>
@empty
    <p class="alert alert-info">No Channel Yet.</p>
@endforelse