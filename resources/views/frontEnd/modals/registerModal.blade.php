<div class="modal fade" id="registerModal" tabindex="-1" role="dialog" aria-labelledby="registerModal" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="registerModal">{{ __('Register') }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
            <form method="POST" id="registerForm" action="{{ route('register') }}">
                    @csrf

                    <div class="form-group row">
                        <label for="nameInput" class="col-md-4 col-form-label text-md-right">{{ __('First Name') }}</label>

                        <div class="col-md-6">
                            <input id="first_nameInput" type="text" class="form-control" name="first_name" value="{{ old('first_name') }}"  autocomplete="first_name" autofocus>

                            <span class="invalid-feedback" role="alert" id="first_nameError">
                                <strong></strong>
                            </span>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="nameInput" class="col-md-4 col-form-label text-md-right">{{ __('Last Name') }}</label>

                        <div class="col-md-6">
                            <input id="last_nameInput" type="text" class="form-control" name="last_name" value="{{ old('last_name') }}"  autocomplete="last_name" autofocus>

                            <span class="invalid-feedback" role="alert" id="last_nameError">
                                <strong></strong>
                            </span>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="emailInput" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                        <div class="col-md-6">
                            <input id="emailInput" type="email" class="form-control" name="email" value="{{ old('email') }}" required autocomplete="email">

                            <span class="invalid-feedback" role="alert" id="emailError">
                                <strong></strong>
                            </span>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="passwordInput" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                        <div class="col-md-6">
                            <input id="passwordInput" type="password" class="form-control" name="password" required autocomplete="new-password">

                            <span class="invalid-feedback" role="alert" id="passwordError">
                                <strong></strong>
                            </span>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                        <div class="col-md-6">
                            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="mobileInput" class="col-md-4 col-form-label text-md-right">{{ __('Mobile') }}</label>

                        <div class="col-md-6">
                            <input id="mobileInput" type="mobile" class="form-control" name="mobile" value="{{ old('mobile') }}" required autocomplete="mobile">

                            <span class="invalid-feedback" role="alert" id="mobileError">
                                <strong></strong>
                            </span>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="roleInput" class="col-md-4 col-form-label text-md-right">{{ __('Role') }}</label>

                        <div class="col-md-6">
                            <select id="role" name="role" class="form-control" required>
                                <option value="">Choose your account Type</option>
                                <option value="2">University</option>
                                <option value="3">Student</option>
                                <option value="4">Consultant</option>



                                </select>
                            <span class="invalid-feedback" role="alert" id="roleError">
                                <strong></strong>
                            </span>
                        </div>
                    </div>

                    <div class="form-group row mb-0">
                        <div class="col-md-6 offset-md-4">
                            <button type="submit" class="btn btn-primary btn-block">
                                {{ __('Register') }}
                            </button>
                            Already Member? <a href="#" id="loginalready" data-toggle="modal" data-target="#loginPopupForm">Login</a>
                        </div>
                    </div>
                </form>
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

      //   $('#loginPopupForm').removeClass('show').addClass('fade').attr("aria-hidden","true").css("display","none").removeAttr("aria-modal");
      // $('.modal-backdrop').remove();
// console.log('qwswd');
$('#registerModal').modal('hide');
    });
  </script>
@endsection
