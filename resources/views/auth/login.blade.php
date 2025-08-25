@extends('layouts.appf')

@section('title', 'Sign In')
@section('content')
<section id="skills" class="skills section">
    <div class="container" data-aos="fade-up" data-aos-delay="100">
        <div class="container mt-1 mb-1 section-title" data-aos="fade-up">
            {{-- <h2>Sign In</h2> --}}
        </div>
        <div class="row">

            <div class="col-lg-6 d-flex align-items-center">
                <img src="{{asset('')}}assets/frontend//img/illustration/illustration-10.webp" class="img-fluid" alt="">
            </div>

            <div class="pt-4 col-lg-6 pt-lg-0 content">

                <x-flash-message/>
                <div class="contact-content">
                    <div class="contact-form-container">

                        <div class="card">
                            <div class="card-body">
                                <form method="POST" action="{{ route('login') }}" class="pt-3">
                                    @csrf
                                    <div class="mb-3 row">
                                        <div class="col-md-8 offset-md-2">
                                            <div class="input-group">
                                                <span class="input-group-text" ><i class="bi bi-person-square"></i></span>
                                                <input type="text" class="form-control @error('loginname') is-invalid @enderror"  name="loginname" value="{{ old('loginname') }}" required autocomplete="email" placeholder="Email/Username/Phone Number" aria-label="email" aria-describedby="basic-addon11">
                                                @error('loginname')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>

                                    <div class="mb-3 row">
                                        <div class="col-md-8 offset-md-2">
                                            <div class="input-group">
                                                <span class="input-group-text" ><i class="bi bi-file-lock2"></i></span>
                                                <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password" value="{{ old('password') }}" required  placeholder="Password" autocomplete="current-password" aria-label="email" aria-describedby="basic-addon1">
                                                @error('password')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>

                                    <div class="mb-3 row">
                                        <div class="col-md-8 offset-md-2">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="shopaswword" id="shopaswword" onclick="showHide()" />

                                                <label class="form-check-label" for="shopaswword">
                                                    {{ __('Show Password') }}
                                                </label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="mb-3 row">
                                        <div class="col-md-6 offset-md-4">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                                <label class="form-check-label" for="remember">
                                                    {{ __('Remember Me') }}
                                                </label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="mb-0 row">
                                        <div class="col-md-8 offset-md-4">
                                            <button type="submit" class="btn btn-primary">
                                                {{ __('Sign In') }}
                                            </button>

                                            @if (Route::has('password.request'))
                                            <a class="text-decoration-none ms-3" href="{{ route('password.request') }}">
                                                {{ __('Forgot Your Password?') }}
                                            </a>
                                            @endif
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>

                    </div>
                </div>

            </div>
        </div>

    </div>

</section>
<script>
    function showHide() {
        var inputpass = document.getElementById("password");
        if (inputpass.type === "password") {
            inputpass.type = "text";
        } else {
            inputpass.type = "password";
        }
    }
</script>
@endsection
