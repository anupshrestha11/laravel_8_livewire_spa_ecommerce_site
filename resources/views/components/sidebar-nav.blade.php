<nav class="sidebar-nav sticky-top">
    <h3 class="text-uppercase text-white text-center my-4 ">Mart</h3>

    @auth
    <div class="text-capitalize text-white alert alert-heading text-center">
        {{auth()->user()->name}}
    </div>
    @endauth

    <a href="{{route('dashboard')}}" class="">Dashboard</a>
    <a href="{{route('dashboard.products')}}" class="">Products</a>
    <a href="{{route('dashboard.orders')}}" class="">Orders</a>
    <a href="{{route('logout')}}" class="btn btn-danger bg-danger text-white mt-auto">Logout</a>
</nav>