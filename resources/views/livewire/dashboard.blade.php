<div class="container-fluid py-3 ">
    <h4
        class="text-uppercase text-center mb-4 font-weight-bold text-light rounded shadow py-3 bg-dark d-flex justify-content-between px-5">
        <div>Dashboard</div>
        @auth
        <div>
            {{auth()->user()->name}}
        </div>
        @endauth
    </h4>
    <div class="border shadow rounded my-3 ">
        <livewire:products />
    </div>
    <div class="border shadow rounded my-3">
        <livewire:orders />
    </div>
</div>