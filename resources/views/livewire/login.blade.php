<div class="container-fluid " style="height: 100vh;">

    <div class="d-flex justify-content-center align-items-center  h-75 w-100 ">
        <form action="" class="d-flex flex-column border px-4 pt-4 pb-2 w-100 shadow "
            style="max-width:350px; min-height: 300px; " wire:submit.prevent='submit'>
            <h4 class="text-uppercase text-center border-bottom">Login</h4>



            @if (session()->has('login_error'))
            <small class="my-2 alert alert-danger">
                {{ session('login_error') }}
            </small>
            @endif
            <input type="email" class="form-control my-2 " placeholder="Email" wire:model="form.email" />
            @error('form.email') <small class="text-danger">{{ $message }}</small> @enderror
            <input type="password" class="form-control my-2" placeholder="Password" wire:model="form.password" />
            @error('form.password') <small class="text-danger">{{ $message }}</small> @enderror
            <input type="submit" class="btn btn-success my-2" value="Login">
            <div class="mt-auto border-top">
                <p class="text-right mt-3"><a href="{{route('register')}}">Click here</a> to Register</p>
            </div>
        </form>
    </div>

</div>