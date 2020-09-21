<header class="d-flex align-items-center justify-content-between px-5 py-3 shadow sticky-top bg-light">

    <a href="{{route('home')}}" class="btn btn-lg shadow-none m-0 p-0 ">
        <h3 class="m-0 p-0">Mart</h3>
    </a>

    <a wire:click="sessionDelete" class="btn btn-warning">Session Clear</a>
    {{-- <div wire:poll>
        Current time: {{ now()->timezone('Asia/Kathmandu')->toDayDateTimeString()}}
    </div> --}}

    <a class=" text-dark" href="{{route("cart")}}">
        <span class="fa-layers fa-fw fa-3x">
            <i class="fas fa-cart-arrow-down fa-xs"></i>
            @if (count($cartItems) > 0)
            <span class="fa-layers-counter" style="background:Tomato">{{count($cartItems)}}</span>
            @endif
        </span>
    </a>
</header>