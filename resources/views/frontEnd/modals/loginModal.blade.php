<div class="modal-popup">
    <div class="modal fade" id="loginPopupForm" tabindex="-1" role="dialog"  aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <div>
                        <h5 class="modal-title title" id="exampleModalLongTitle2">Login</h5>
                        <p class="font-size-14">Hello! Welcome to your account</p>
                    </div>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true" class="la la-close"></span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="contact-form-action">
                    <form method="post" action="{{ route('login') }}">
                        @csrf
                            <div class="input-box">
                                <label class="label-text">Email</label>
                                <div class="form-group">
                                    <span class="la la-user form-icon"></span>

                                    <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" placeholder="Email" required autofocus>

                                    @if ($errors->has('email'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('email') }}</strong>
                                        </span>
                                    @endif

                                </div>
                            </div><!-- end input-box -->
                            <div class="input-box">
                                <label class="label-text">Password</label>
                                <div class="form-group mb-2">
                                    <span class="la la-lock form-icon"></span>
                                <input class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" type="password" name="password" id="password" placeholder="Type your password" required>
                                </div>
                                <div class="d-flex align-items-center justify-content-between">
                                    {{-- <div class="custom-checkbox mb-0">
                                        <input type="checkbox" id="rememberchb">
                                        <label for="rememberchb">Remember me</label>
                                    </div> --}}
                                    @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                                @if (Route::has('password.request'))
                                <a class="btn btn-link" href="{{ route('frontEnd.recover') }}">
                                    {{ __('Forgot Password?') }}
                                </a>
                                        @endif
                                    {{-- <p class="forgot-password">
                                        <a href="recover.html">Forgot Password?</a>
                                    </p> --}}
                                </div>
                            </div><!-- end input-box -->
                            <div class="btn-box pt-3 pb-4">
                                <button type="submit" class="theme-btn w-100">Login Account</button>
                              New to Website? <a href="javascript:void(0);" id="signupalready" data-toggle="modal" data-target="#registerModal">Sign Up</a>
                            </div>
                            <div class="action-box text-center">
                                <p class="font-size-14">Or Login Using</p>
                                <ul class="social-profile py-3">

                                    <li><a href="{{ url('/login/facebook') }}" class="bg-5 text-white"><i class="lab la-facebook-f"></i></a></li>
                                    <li><a href="{{ url('/login/google') }}" class="bg-6 text-white"><i class="lab la-google"></i></a></li>

                                    <li><a href="{{ url('/login/linkedin') }}" class="bg-5 text-white"><i class="lab la-linkedin-in"></i></a></li>
                                </ul>
                            </div>
                        </form>
                    </div><!-- end contact-form-action -->
                </div>
            </div>
        </div>
    </div>
</div><!-- end modal-popup -->
@section('per_page_script')
@parent

    @if($errors->has('email') || $errors->has('password'))
      <script>
      $(function() {
          $('#loginPopupForm').modal({
              show: true
          });
      });


      </script>
    @endif

<script>

$(document).on('click', '#signupalready', function ()
 {
    $('#loginPopupForm').modal('hide');
         console.log('test');
 });
 </script>
@endsection
