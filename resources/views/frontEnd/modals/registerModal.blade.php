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
                        <div class="col-md-12">
                            <button type="submit" class="btn btn-primary btn-block">
                                {{ __('Register') }}
                            </button>
                            Already Member? <a href="javascript:void(0);" id="loginalready" data-toggle="modal" data-target="#loginPopupForm">Login</a>
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
       $('#registerModal').modal('hide');
    });
  </script>
@endsection
