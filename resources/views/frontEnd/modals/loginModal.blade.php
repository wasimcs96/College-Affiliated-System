

<div class="modal-popup">
    <div class="modal fade" id="loginPopupForm" tabindex="-1" role="dialog"  aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">


            {{-- background-image: url('{{asset('frontEnd/assets/images/login.jpg')}}'); --}}
            <div class="modal-content" style=" background-color:#e5e3e6;
             color: #f16d01;
            ">
                <div class="modal-header">
                    <div>
                        <img src="{{asset('frontEnd/assets/images/logo.png')}}" alt="logo" style="
                        width: 198px;
                        height: 70px;
                    ">
                    </div>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true" class="la la-close"></span>
                    </button>
                </div>
                <div class="row">

            <div class="col-lg-6">
                <div class="container">
                <div class="modal-header"  style="
                border-bottom-color: #d0cfd1;
            ">
                    <div >
                        <h5 class="modal-title title" id="exampleModalLongTitle2" style="color: #f16d01;">Hello! Welcome to your account</h5>
                        {{-- <p class="font-size-14"></p> --}}
                    </div>

                </div>

                        <div class="modal-body">

                    <div class="contact-form-action"  style=" padding: 19px;">
                    <form method="post" action="{{ route('login') }}">
                        @csrf
                            <div class="input-box">
                                <label class="label-text" style="color: #f16d01;">Email</label>
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
                                <label class="label-text" style="color: #f16d01;">Password</label>
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
                              New to Website? <a href="#registerModal" id="signupalready" data-toggle="modal" data-dismiss="modal">Sign Up</a>
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
        <div class="col-lg-6">
            <section class="testimonial-area">
                <div class="container">
                  <div class="section-heading text-center" >
                      <h2> How it works</h2>
                      <hr>

                  <div class="container">
                      <div class="row padding-top-50px">
                          <div class="row">
                            <div class="col-lg-5 responsive-column" style="width: 429px;">
                                <div class="deal-list" style="
                                height: 219px;
                            ">

                                    <lottie-player src="{{asset('frontEnd/assets/json/lf30_editor_cum0oz6f.json')}}"  background="transparent"  speed="1"  style="width: 160px; height: 93px;"  loop  autoplay></lottie-player>
                                    <h3 style="text-align: center"> Hire Nearby Consultant</h3>
                                </div>
                            </div><!-- end col-lg-3 -->

                           <div class="col-lg-5 responsive-column">
                              <div class="deal-list">
                                  <div class="d-flex align-items-center justify-content-between mb-3">

                                  </div>

                                  <lottie-player src="{{asset('frontEnd/assets/json/30304-back-to-school.json')}}"  background="transparent"  speed="1"  style="width: 160px; height: 93px;"  loop  autoplay></lottie-player>
                                  <h3 style="text-align: center">Choose University</h3>
                              </div>
                          </div><!-- end col-lg-3 -->
                        </div>
                        <div class="row">
                           <div class="col-lg-5 responsive-column" style="width: 416px;">
                              <div class="deal-list"  style=" height: 219px;">
                                  <div class="d-flex align-items-center justify-content-between mb-3">

                                  </div>

                                  <lottie-player src="{{asset('frontEnd/assets/json/27490-documentscan.json')}}"  background="transparent"  speed="1"  style="width: 160px;height: 93px;"  loop  autoplay></lottie-player>
                                  <h3 style="text-align: center">Verify Documents</h3>

                              </div>
                          </div><!-- end col-lg-3 -->
                          <div class="col-lg-5 responsive-column" style="width: 416px;">
                              <div class="deal-list">
                                  <div class="d-flex align-items-center justify-content-between mb-3">

                                  </div>

                                  <div>
                                  <lottie-player src="{{asset('frontEnd/assets/json/lf30_editor_ggnpfgjn.json')}}"  background="transparent"  speed="1"  style="width: 160px;height: 93px;"  loop  autoplay></lottie-player>
                                  </div>
                                  <h3 style="text-align: center">Get Ready to Fly</h3>
                              </div>
                          </div><!-- end col-lg-3 -->
                        </div>
                      </div><!-- end row -->
                  </div><!-- end container -->
                  </div><!-- end row -->
              </div><!-- end container -->
          </section>
        </div>
        </div>
        </div>
        </div>
    </div>
</div><!-- end modal-popup -->

@section('per_page_script')
@parent


<script>

$(document).on('click', '#signupalready', function ()
 {
    $('#loginPopupForm').modal('hide');
         console.log('test');
 });
 </script>
 @endsection
