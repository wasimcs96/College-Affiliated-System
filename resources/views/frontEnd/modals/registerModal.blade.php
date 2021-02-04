<div class="modal fade" id="registerModal" tabindex="-1" role="dialog" aria-labelledby="registerModal" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content" style="background-image: url('{{asset('frontEnd/assets/images/university-all.jpg')}}'); color: #f16d01;
        ">
            <div class="modal-header">
                <div>
                    <img src="{{asset('frontEnd/assets/images/logo.png')}}" alt="logo" style="
                    width: 198px;
                    height: 70px;
                ">
                </div>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="row">
            <div class="col-lg-6">
                <div class="container">
                    <div class="modal-header">
                        <h5 class="modal-title" id="registerModal" style="color: #f16d01;">Create a New Account</h5>

                    </div>
            <div class="modal-body">
            <form method="POST" id="registerForm" action="{{ route('register') }}">
                    @csrf



                        <div class="form-group row" id="nm">

                            <div class="col-md-12">
                                <input id="first_nameInput" type="text" placeholder="First Name" class="form-control" name="first_name" value="{{ old('first_name') }}"  autocomplete="first_name" autofocus>

                                <span class="invalid-feedback" role="alert" id="first_nameError">
                                    <strong></strong>
                                </span>
                            </div>
                        </div>

                        <div class="form-group row" id="nm">

                            <div class="col-md-12">
                                <input id="last_nameInput" type="text" placeholder="Last Name" class="form-control" name="last_name" value="{{ old('last_name') }}"  autocomplete="last_name" autofocus>

                                <span class="invalid-feedback" role="alert" id="first_nameError">
                                    <strong></strong>
                                </span>
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-12">
                                <input id="emailInput" type="email" placeholder="E-Mail Address" class="form-control" name="email" value="{{ old('email') }}" required autocomplete="email">

                                <span class="invalid-feedback" role="alert" id="emailError">
                                    <strong></strong>
                                </span>
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-12">
                                <input id="passwordInput" type="password" placeholder="Password" class="form-control" name="password" required autocomplete="new-password">

                                <span class="invalid-feedback" role="alert" id="passwordError">
                                    <strong></strong>
                                </span>
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-12">
                                <input id="password-confirm" type="password" placeholder="Confirm Password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-12">
                                <input id="mobileInput" type="mobile" class="form-control" placeholder="Mobile" name="mobile" value="{{ old('mobile') }}" required autocomplete="mobile">
                                <span class="invalid-feedback" role="alert" id="mobileError">
                                    <strong></strong>
                                </span>
                            </div>
                        </div>

                        <div class="form-group row" id="uni">

                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-12" style="color: #f16d01;">
                                <button type="submit" class="btn btn-primary btn-block">
                                    {{ __('Register') }}
                                </button>
                                Already Member? <a href="#loginPopupForm" id="loginalready" data-toggle="modal" data-dismiss="modal">Login</a>
                            </div>
                        </div>
                </form>
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

@section('per_page_script')
@parent

<script>
$(function () {
    $('#registerForm').submit(function (e) {
        e.preventDefault();
        let formData = $(this).serializeArray();
        $(".invalid-feedback").children("strong").text("");
        $("#registerForm input").removeClass("is-invalid");
        $.ajax({
            method: "POST",
            headers: {
                Accept: "application/json"
            },
            url: "{{ route('register') }}",
            data: formData,
            success: () => window.location.assign("{{ route('front') }}"),
            error: (response) => {
                if(response.status === 422) {
                    let errors = response.responseJSON.errors;
                    Object.keys(errors).forEach(function (key) {
                        $("#" + key + "Input").addClass("is-invalid");
                        $("#" + key + "Error").children("strong").text(errors[key][0]);
                    });
                } else {
                    window.location.reload();
                }
            }
        })
    });
})
</script>
<script>
    $(document).on('click','#loginalready', function (e) {
       $('#registerModal').modal('hide');
    });
  </script>
@endsection
