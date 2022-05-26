@extends('layouts.app')

@section('content')


    {{-- <div class="container" style="margin-top: 70px">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Login') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Login') }}
                                </button>

                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
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
</div> --}}

<body>
    {{-- <div class="contentt"> --}}
    <div class="containerr" style="margin-top: 100px;">
    <div class="formss">
        <div class="formsss loginn">
            <span class="title">Login</span>
            <form  method="POST" action="{{ route('login') }}">
                @csrf
                <div class="input-fieldd">
                    <input id="email" class="@error('email') is-invalid @enderror" type="email" placeholder="Enter Your Email Address" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    <i class='bx bx-envelope icon'></i>
                </div>
                <div class="input-fieldd">
                    <input id="password" type="password" class="password @error('password') is-invalid @enderror" placeholder="Enter Your Password" name="password" required autocomplete="current-password">
                    <i class='bx bx-lock-alt icon'></i>
                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>


                <div class="checkbox-text">
                    <div class="checkbox-content">
                        <input type="checkbox" id="logCheck" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                        <label for="logCheck" class="text">Remember Me</label>
                    </div>
                    <a style="cursor: pointer;" class="text text-link" class="text">Forgot Password?</a>
                </div>

                <div class="input-fieldd button">
                    <input type="submit" value="Sign in">
                    {{-- <button type="submit" class="btn btn-primary">
                        {{ __('Login') }}
                    </button> --}}
                </div>
            </form>

            <div class="login-signup">
                <span class="text">Don't have an account?
                    <a style="cursor: pointer;" class="text text-link signup-link">Create Account</a>
                </span>
            </div>
        </div>

        {{-- Registration Form --}}

        <div class="formsss signupp">
            <span class="title">Register</span>
            <form method="POST" action="{{ route('register') }}">
                @csrf

                <div class="input-fieldd">
                    <input id="name" type="text" class="@error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" placeholder="Create Username" required autocomplete="name">
                    @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    <i class='bx bx-user icon' ></i>
                </div>

                <div class="input-fieldd">
                    <input id="email" type="email" class="@error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="Enter Your Email">

                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    <i class='bx bx-envelope icon'></i>
                </div>

                <div class="input-fieldd">
                    <input id="password" type="password" class="password @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" placeholder="Enter Your Password">
                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    <i class='bx bx-lock-alt icon' ></i>
                </div>

                <div class="input-fieldd">
                    <input id="password-confirm" type="password" class="password" name="password_confirmation" required autocomplete="new-password" placeholder="Confirm Your Password">
                    <i class='bx bx-lock-alt icon' ></i>
                </div>

                {{-- <div class="input-fieldd">
                    <label for="avatar" class="col-md-4 col-form-label text-md-end">{{ __('Please select your avatar') }}</label>
                    <input type="file" name="image" class="form-control-file">
                </div> --}}

                

                <div class="input-fieldd">
                    <label for="role" class="col-md-4 col-form-label text-md-end text">{{ __('Create Account as ... ') }}</label>
                    <select name="role" class="text" style="width: 200px; border-radius: 10px; height: 30px; text-align:center;">
                        <option value="founder">Founder</option>
                        <option value="skilled">Skilled</option>
                        <option value="investor">Investor</option>
                        <option value="admin">Admin</option>
                    </select>

                    @error('role')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                
                <hr>
                <div class="infoooo" style="text-align: center; margin-bottom: 10 0px;">
                    <p style="color: #808080;">If you would like to register as <strong>investor</strong>, you will be redirected to payment page after registration for having full access to your rights as investor.</p>
                </div>
                <hr>
                

                <div class="input-fieldd button">
                    <input type="submit" value="Create Account">
                </div>
            </form>

            <div class="login-signup">
                <span class="text">You already have an account? 
                    <a style="cursor: pointer;" class="text text-link login-link"><strong>Login</strong> to your account</a>
                </span>
            </div>
        </div>
    </div>
    </div>

{{-- </div> --}}
</body>

{{-- <div class="loader-wrapper">
    <span class="loader"><span class="loader-inner"></span></span>
</div>

<script>
    $(window).on("load", function() {
        $(".loader-wrapper").fadeOut("slow");
    });
</script> --}}

<script>

    const container = document.querySelector(".containerr"),
          signUp = document.querySelector(".signup-link"),
          login = document.querySelector(".login-link"),
          pwFields = document.querySelectorAll(".password");

    

    signUp.addEventListener("click", ( )=>{
        container.classList.add("active");

    });
    login.addEventListener("click", ( )=>{
        container.classList.remove("active");
        
    });

    
</script>

<style>

* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

body{
    height: 100vh;
    display: flex;
    justify-content: center;
    align-items: center;
    
}

.containerr {
    position: relative;
    max-width: 500px;
    width: 200%;
    background: #fff;
    border-radius: 10px;
    box-shadow: 0 5px 10px rgba(0,0,0,0.1);
    overflow: hidden;
}

.containerr .formss {
    display: flex;
    align-items: center;
    height: 440px;
    width: 200%;
    /* background-color: red; */
    transition: height 0.2s ease;
}


.containerr .formsss {
    width: 50%;
    padding: 30px;
    background-color: #fff;
    transition: margin-left 0.18s ease;
}

.containerr.active .loginn {
    margin-left: -50%; 
    opacity: 0;
    transition: margin-left 0.18s ease, opacity 0.15s ease;
}

.containerr .signupp {
    opacity: 0;
    transition: opacity 0.09s ease;
}

.containerr.active .signupp {
    opacity: 1;
    transition: opacity 0.2s ease;
}

.containerr.active .formss {
    height: 700px;
}

.containerr .formsss .title {
    position: relative;
    font-size: 27px;
    font-weight: 600;
}

.formsss .title::before {
    content: '';
    position: absolute;
    left: 0;
    bottom: 0;
    height: 3px;
    width: 30px;
    /* background-color: #4070f4; */
    background-color: orange;
    border-radius: 25px;
}

.formsss .input-fieldd {
    position: relative;
    height: 50px;
    width: 100%;
    margin-top: 30px;
}

.input-fieldd input {
    /* position: absolute; */
    height: 80%;
    width: 100%;
    border-radius: 10px;
    padding: 0 40px;
    border: none;
    outline: none;
    font-size: 16px;
    border-bottom: 2px solid #ccc;
    border-top: 1px solid transparent;
}

.input-fieldd input:is(:focus, :valid) {
    border-bottom-color: black;
    transition: 0.5s all ease
}

.input-fieldd i {
    position: absolute;
    top: 40%;
    transform: translateY(-50%);
    color: #999;
    font-size: 23px;
}

.input-fieldd input:is(:focus, :valid) ~ i {
    color: black;
    transition: 0.5s all ease
}

.input-fieldd i.icon {
    left: 2%;
}

.input-fieldd i.showHidePw {
    right: 2%;
    cursor: pointer;
}

.checkbox-text {
    padding-left: 10px;
    padding-right: 10px;
    align-items: center;
    margin-top: 20px;
    display: flex;
    justify-content: space-between;
}

.checkbox-text .checkbox-content {
    display: flex;
    align-items: center;   
}

.checkbox-content input {
    margin: 0px 8px -2px 4px;
    accent-color: orange;
}

.text {
    color: #333;
    font-size: 14px;
}

.text-link {
    text-decoration: none;
}

.text-link:hover {
    text-decoration: underline;
    color: orange;
}

.button input{
    border: none;
    transition: all 0.3s ease;
}

.button input:hover {
    color: white;
    background-color: orange;
}

.login-signup {
    margin-top: 20px;
    text-align: center;
}

/* input {
  width: 100%;
  padding: 12px 20px;
  margin: 8px 0;
  box-sizing: border-box;
  border: none;
  border-bottom: 1px solid black;
  box-shadow: 0 5px 10px rgba(0,0,0,0.1);
} */

</style>

@endsection
