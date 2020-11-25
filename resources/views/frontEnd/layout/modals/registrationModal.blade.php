<div class="modal fade" id="signupmodal" tabindex="-1" aria-labelledby="signupmodalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
      <div class="modal-content">
        <div class="modal-header bg-warning">
          <h5 class="modal-title text-center " id="signupmodalLabel">Logo</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">

            <form class="form-auth-small m-t-20" method="POST" action="{{ route('login') }}">
                @csrf

                <div class="form-group my-4">

                    <div class="col-md-12 text-center">
                        <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" placeholder="Email" required autofocus>

                        @if ($errors->has('email'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                <div class="form-group my-4">

                    <div class="col-md-12">
                        <input id="password" type="password" placeholder="Password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

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
                    <button type="submit" class="btn btn-warning btn-round btn-lg" style="float-right">
                        {{ __('Login') }}
                    </button>

                    <span> Have an account? <a class="btn btn-link" href="{{ route('login') }}">Login</a></span>
                </form>
                </div>

        </div>
        <div class="modal-footer">
          {{-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-warning">Save changes</button> --}}

        </div>

    </div>
    </div>
  </div>
