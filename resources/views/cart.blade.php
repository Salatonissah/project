@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h3>Your Cart</h3>
    @if(count($cart))
        <ul class="list-group mb-4">
            @foreach($cart as $item)
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    <div>
                        <img src="{{ asset($item['image']) }}" alt="" style="width:40px; height:40px; object-fit:cover; margin-right:10px;">
                        {{ $item['title'] }} - <strong>{{ $item['price'] }}</strong>
                    </div>
                    <form method="POST" action="{{ route('cart.remove') }}" class="d-inline remove-cart-form">
                        @csrf
                        <input type="hidden" name="id" value="{{ $item['id'] }}">
                        <button type="submit" class="btn btn-sm btn-danger">Remove</button>
                    </form>
                </li>
            @endforeach
        </ul>
        <a href="{{ url('/pay') }}" class="btn btn-success">Proceed to Payment</a>
    @else
        <p>Your cart is empty.</p>
    @endif
</div>
<script>
document.querySelectorAll('.remove-cart-form').forEach(form => {
    form.addEventListener('submit', function(e) {
        e.preventDefault();
        fetch(this.action, {
            method: 'POST',
            headers: {'X-CSRF-TOKEN': this.querySelector('[name=_token]').value, 'Accept': 'application/json'},
            body: new FormData(this)
        }).then(res => res.json()).then(data => {
            if(data.success) location.reload();
        });
    });
});
</script>
@endsection