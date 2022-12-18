@extends('auth.auth_layout.main')

@section('content')


<div class="row justify-content-center">
    <div class="col-md-8 col-lg-6 col-xl-5">
        <div class="card mt-4">

            <div class="card-body p-4">
                <div class="text-center  mb-4 ">
                    <div>
                        <a href="/" class="d-inline-block auth-logo">
                            <img src="https://cdn3d.iconscout.com/3d/free/thumb/google-5148287-4299203.png" alt="" height="100">
                        </a>
                    </div>
                    <p class=" fs-15 fw-medium"> Welcome Back!  </p>
                </div>
                <div class="p-2 mt-4">
                    <form action="{{ route('login') }}" method="post">
                        @csrf
                        <div class="mb-3">
                            <label for="username" class="form-label">Email</label>
                            <input type="text" value="ivan@gmail.com" class="form-control @error('email') is-invalid @enderror" id="username" name="email" placeholder="Enter email">
                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <div class="float-end">
                                <a href="{{ route('password.request') }}" class="text-muted">Forgot password?</a>
                            </div>
                            <label class="form-label" for="password-input">Password</label>
                            <div class="position-relative auth-pass-inputgroup mb-3">
                                <input value="password" type="password" class="form-control pe-5 @error('password') is-invalid @enderror" name="password" placeholder="Enter password" id="password-input">
                                <button class="btn btn-link position-absolute end-0 top-0 text-decoration-none text-muted" type="button" id="password-addon"><i class="ri-eye-fill align-middle"></i></button>
                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="" id="auth-remember-check">
                            <label class="form-check-label" for="auth-remember-check">Remember me</label>
                        </div>

                        <div class="mt-4">
                            <button class="btn btn-primary w-100" type="submit">Login In</button>
                        </div>

                    </form>
                    <div class="mt-4 text-end ">
                        <p class="mb-0 ">Don't have an account ? <a href="{{ route('register') }}" class="fw-semibold text-decoration-underline"> Signup </a> </p>
                    </div>

                </div>
            </div>
            <!-- end card body -->
        </div>
        <!-- end card -->


    </div>
</div>
@endsection

