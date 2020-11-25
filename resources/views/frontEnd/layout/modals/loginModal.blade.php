<div class="modal fade" id="loginModal" tabindex="-1" aria-labelledby="loginModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="loginModalLabel">Modal title</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>

            <div class="tab-content">
                <div class="tab-pane container active" id="login">

                    <div class="login-wrap" id="loginmodal">
                        <div class="login-html">
                            <input id="tab-1" type="radio" name="tab" class="sign-in" checked><label for="tab-1" class="tab">Sign In</label>
                            <input id="tab-2" type="radio" name="tab" class="sign-up"><label for="tab-2" class="tab">Sign Up</label>

                            <div class="login-form">
                                <div class="sign-in-htm">
                                    <form class="form-auth-small m-t-20" method="POST" action="{{ route('login') }}">
                                        @csrf

                                        <div class="form-group ">

                                            <div class="group">
                                                {{-- <input id="email" type="email" class="input{{ $errors->has('email') ? ' is-invalid' : '' }}" placeholder="Email" required autofocus> --}}
                                                <input id="email" type="email" class="input {{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" placeholder="Email" required autofocus>

                                                @if ($errors->has('email'))
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $errors->first('email') }}</strong>
                                                    </span>
                                                @endif
                                            </div>
                                        </div>

                                        <div class="form-group ">

                                            <div class="group">
                                                <input id="password" type="password" placeholder="Password" class="input{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                                                @if ($errors->has('password'))
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $errors->first('password') }}</strong>
                                                    </span>
                                                @endif
                                                @if (Route::has('password.request'))
                                                <a class="btn btn-link" href="{{ route('password.request') }}">
                                                    {{ __('Forgot Password?') }}
                                                </a>
                                                        @endif
                                            </div>
                                        </div>

                                        {{-- <div class="form-group ">
                                            <div class="col-md-8 offset-md-4">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                                    <label class="form-check-label" for="remember">
                                                        {{ __('Remember Me') }}
                                                    </label>
                                                </div>
                                            </div>
                                        </div> --}}

                                        {{-- <div class="form-group mb-0 ">
                                            <div class="col-md-8 offset-md-4">
                                                <button type="submit" class="btn btn-primary btn-round btn-block">
                                                    {{ __('Login') }}
                                                </button>

                                                @if (Route::has('password.request'))
                                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                                        {{ __('Forgot Your Password?') }}
                                                    </a>
                                                @endif
                                                <span>Don't have an account? <a href="{{ route('register') }}">Register</a></span>
                                            </div>
                                        </div> --}}
                                        <div class="form-group">
                                            <div class="group">
                                        <button type="submit" class="button">
                                            {{ __('Login') }}
                                        </button>

                                            </div>
                                            </div>
                                    </form>
                                    <div class="hr"></div>
                                    <div class="foot-lnk">
                                        <span>Don't have an account? <label for="tab-2">Register</a></span>
                                    </div>
                                </div>
                                <div class="sign-up-htm">
                                    <form class="form-auth-small m-t-20" id="registrationForm" method="POST" action="{{ route('register') }}">
                                        @csrf

                                        <div class="form-group">

                                            <div class="group">
                                                <input id="first_name" type="text" class="input @error('first_name') is-invalid @enderror" name="first_name" value="{{ old('first_name') }}" placeholder="First Number" required autocomplete="first_name" autofocus>
                                                {{-- <input id="first_name" type="text" placeholder="First Name" class="form-control @error('first_name') is-invalid @enderror" name="first_name" value="{{ old('first_name') }}" required autocomplete="first_name" autofocus> --}}

                                                @error('first_name')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror

                                        </div>
                                    </div>
                                        <div class="form-group">
                                            <div class="group">
                                            <input id="last_name" type="text" class="input @error('last_name') is-invalid @enderror" name="last_name" value="{{ old('last_name') }}" placeholder="Last Number" required autocomplete="last_name" autofocus>

                                                {{-- <input id="last_name" type="text" placeholder="Last Name" class="form-control @error('last_name') is-invalid @enderror" name="last_name" value="{{ old('last_name') }}" required autocomplete="last_name" autofocus> --}}

                                                @error('last_name')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                                </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="group">

                                            <input id="email" type="email" class="input @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" placeholder="Email" required autocomplete="email" autofocus>

                                                {{-- <input id="email" type="email" placeholder="Email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email"> --}}

                                                @error('email')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                                </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="group">
                                            <input id="password" type="password" class="input @error('password') is-invalid @enderror" name="password" value="{{ old('password') }}" placeholder="Password" required autocomplete="password" autofocus>

                                                {{-- <input id="password" type="password" placeholder="Password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password"> --}}

                                                @error('password')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                                </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="group">
                                            <input id="password-confirm" type="password" class="input @error('password') is-invalid @enderror" name="password_confirmation" value="{{ old('password_confirmation') }}" placeholder="Confirm Password" required autocomplete="new-password" autofocus>

                                                {{-- <input id="password-confirm" type="password" placeholder="Confirm Password" class="form-control" name="password_confirmation" required autocomplete="new-password"> --}}

                                        </div>
                                    </div>

                                        <div class="form-group">
                                            <div class="group">
                                                <input id="mobile" type="integer" class="input @error('mobile') is-invalid @enderror" name="mobile" value="{{ old('mobile') }}" placeholder="Mobile" required autocomplete="mobile" autofocus>

                                                {{-- <input id="mobile" type="integer" placeholder="Mobile" class="form-control @error('mobile') is-invalid @enderror" name="mobile" value="{{ old('mobile') }}" required autocomplete="mobile" autofocus> --}}

                                                @error('mobile')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror

                                        </div>
                                    </div>

                                        <div class="form-group">

                                            <div class="group">
                                                {{-- <input id="mobile" type="integer" class="input @error('mobile') is-invalid @enderror" name="mobile" value="{{ old('mobile') }}" placeholder="Mobile" required autocomplete="mobile" autofocus> --}}


                                                        <select id="role" style="color: gray;" name="role" class="input @error('mobile') is-invalid @enderror" required>
                                                        <option value="" style="color: gray;">Choose your account Type</option>
                                                        <option value="2" style="color: gray;" >University</option>
                                                        <option value="3" style="color: gray;">Student</option>
                                                        <option value="4" style="color: gray;">Consultant</option>



                                                        </select>

                                                @error('role')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                                </div>
                                        </div>
<div class="form-group">
    <div class="group">
                                                <button type="submit" class="button">
                                                    {{ __('Register') }}
                                                </button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>


                    <div id="socialLinks" class="text-center">
                    </div>

                </div>
                <div class="tab-pane container fade" id="register">

                    <p class="lead">Create an account</p>
                <form class="form-auth-small m-t-20" id="registrationForm" method="POST" action="{{ route('register') }}">
                    @csrf

                    <div class="form-group">



                            <input id="first_name" type="text" placeholder="First Name" class="form-control @error('first_name') is-invalid @enderror" name="first_name" value="{{ old('first_name') }}" required autocomplete="first_name" autofocus>

                            @error('first_name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror

                    </div>

                    <div class="form-group">



                            <input id="last_name" type="text" placeholder="Last Name" class="form-control @error('last_name') is-invalid @enderror" name="last_name" value="{{ old('last_name') }}" required autocomplete="last_name" autofocus>

                            @error('last_name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror

                    </div>

                    <div class="form-group">



                            <input id="email" type="email" placeholder="Email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror

                    </div>

                    <div class="form-group">


                            <input id="password" type="password" placeholder="Password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror

                    </div>

                    <div class="form-group">


                            <input id="password-confirm" type="password" placeholder="Confirm Password" class="form-control" name="password_confirmation" required autocomplete="new-password">

                    </div>


                    <div class="form-group">


                            <input id="mobile" type="integer" placeholder="Mobile" class="form-control @error('mobile') is-invalid @enderror" name="mobile" value="{{ old('mobile') }}" required autocomplete="mobile" autofocus>

                            @error('mobile')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror

                    </div>

                    <div class="form-group">




                                    <select id="role" name="role" class="form-control" required>
                                    <option value="">Choose your account Type</option>
                                    <option value="2">University</option>
                                    <option value="3">Student</option>
                                    <option value="4">Consultant</option>



                                    </select>

                            @error('role')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror

                    </div>


                            <button type="submit" class="btn btn-primary btn-round btn-block">
                                {{ __('Register') }}
                            </button>

                </form>
                <div class="separator-linethrough"><span>OR</span></div>
                <button class="btn btn-round btn-signin-social"><i class="fa fa-facebook-official facebook-color"></i> Sign in with Facebook</button>
                <button class="btn btn-round btn-signin-social"><i class="fa fa-twitter twitter-color"></i> Sign in with Twitter</button>
                <span>Already have an account? <a href="{{ route('login') }}">Login</a></span>
                </div>
            </div>


      </div>
    </div>
  </div>
