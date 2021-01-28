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
                    <div id="mouse-container">
                        <div id="lottie"></div>
                    </div>
                    <div id="cursor_preloader"></div>
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
 <script>var chamecolor = "";
    var degToRads = Math.PI / 180;
    var valueArr = [100, 500, 100];
    var mouse_changed = false;
    var minTongueRadius = 405,
      maxTongueRadius = 415;
    var angle = 0,
      distanceToMouse = 0,
      isActive = false;
    var camouflage_timeout = null;
    var colorSelector = document.querySelector(":root");
    var mouse_container = document.getElementById("mouse-container");
    var animationContainer = document.getElementById("lottie");
    var isMacLike = navigator.platform.match(/(Mac|iPhone|iPod|iPad)/i)?true:false;

    animationContainer.setAttribute('class',isMacLike ? 'default_hidden' : 'mac_hidden')
    var animData = {
      container: animationContainer,
      renderer: "svg",
      loop: true,
      autoplay: true,
      rendererSettings: {
        preserveAspectRatio: "xMidYMid meet"
      },
      path: "https://labs.nearpod.com/bodymovin/demo/chameleon/chameleon2.json"
    };
    anim = lottie.loadAnimation(animData);
    var animationAPI;

    var leftEyeCircles = [
      {
        name: "Group 12",
        radius: 27,
        divisor: 20
      },
      {
        name: "Group 13",
        radius: 27,
        divisor: 20
      },
      {
        name: "Group 14",
        radius: 27,
        divisor: 20
      },
      {
        name: "Group 15",
        radius: 23,
        divisor: 20
      },
      {
        name: "Group 16",
        radius: 21,
        divisor: 35
      },
      {
        name: "Group 17",
        radius: 19,
        divisor: 50
      },
      {
        name: "Group 18",
        radius: 17,
        divisor: 65
      },
      {
        name: "Group 19",
        radius: 15,
        divisor: 80
      },
      {
        name: "Group 20",
        radius: 13,
        divisor: 95
      },
      {
        name: "Group 21",
        radius: 5,
        divisor: 75
      }
    ];
    var rightEyeCircles = [
      {
        name: "Group 1",
        radius: 27,
        divisor: 20
      },
      {
        name: "Group 2",
        radius: 27,
        divisor: 20
      },
      {
        name: "Group 3",
        radius: 27,
        divisor: 20
      },
      {
        name: "Group 4",
        radius: 23,
        divisor: 20
      },
      {
        name: "Group 5",
        radius: 21,
        divisor: 35
      },
      {
        name: "Group 6",
        radius: 19,
        divisor: 50
      },
      {
        name: "Group 7",
        radius: 17,
        divisor: 65
      },
      {
        name: "Group 8",
        radius: 15,
        divisor: 80
      },
      {
        name: "Group 9",
        radius: 13,
        divisor: 95
      },
      {
        name: "Group 10",
        radius: 5,
        divisor: 75
      }
    ];

    var leaves = ["leaf_1", "leaf_2", "leaf_3", "leaf_4"];

    anim.addEventListener("DOMLoaded", function() {
      //anim.setSubframe(false);
      camouflage_timeout = setTimeout(function() {
                colorSelector.style.setProperty('--chame-color', 'rgba(240,237,231,1)');
                colorSelector.style.setProperty('--chame-color-eyes', 'rgba(228,225,218,1)');
                camouflage_timeout = null;
            }, 1000);

      animationAPI = lottie_api.createAnimationApi(anim);

      window.addEventListener("mousemove", updateValue);
      window.addEventListener("touchmove", updateValue);
      window.addEventListener("resize", onWindowResized);

      addMouthProperties();
      addTongueProperties();
      addArrowProperties();
      addEyeCircles();
      addLeavesListeners();
    });

    function addEyeCircleProperty(circleData, eye, cachedMouseEyeData) {
      //
      var eyeContainer = animationAPI.getKeyPath(
        eye + ",Contents," + circleData.name + ",Transform,Position"
      );
      var lastValue = null,
        eye_angle;
      animationAPI.addValueCallback(eyeContainer, function(currentValue) {
        if (!lastValue) {
          lastValue = [currentValue[0], currentValue[1]];
        }
        if (!isActive) {
          var trasformedPoint = animationAPI.toContainerPoint(valueArr);
          trasformedPoint = animationAPI.toKeypathLayerPoint(
            eyeContainer,
            trasformedPoint
          );
          cachedMouseEyeData.distance = Math.sqrt(
            Math.pow(trasformedPoint[0], 2) + Math.pow(trasformedPoint[1], 2)
          );
          cachedMouseEyeData.eye_angle =
            Math.atan2(0 - trasformedPoint[1], 0 - trasformedPoint[0]) / degToRads +
            179;
          cachedMouseEyeData.current[0] = valueArr[0];
          cachedMouseEyeData.current[1] = valueArr[1];
        }
        eye_angle = cachedMouseEyeData.eye_angle;
        var distance = cachedMouseEyeData.distance;
        distance = distance > circleData.radius ? circleData.radius : distance;
        var newValueX =
          currentValue[0] + distance * Math.cos(eye_angle * degToRads);
        var newValueY =
          currentValue[1] + distance * Math.sin(eye_angle * degToRads);
        lastValue[0] =
          lastValue[0] + (newValueX - lastValue[0]) / circleData.divisor * 3;
        lastValue[1] =
          lastValue[1] + (newValueY - lastValue[1]) / circleData.divisor * 3;
        //return currentValue;
        return lastValue;
      });
    }

    function addEyeCircles() {
      var i,
        len = leftEyeCircles.length;
      // len = 1;
      var cachedMouseEyeData = {
        current: [-1, -1],
        distance: 0,
        eye_angle: 0
      };
      for (i = 0; i < len; i += 1) {
        addEyeCircleProperty(
          leftEyeCircles[i],
          "Loop,left_eye",
          cachedMouseEyeData
        );
      }
      len = rightEyeCircles.length;
      cachedMouseEyeData = {
        current: [-1, -1],
        distance: 0,
        eye_angle: 0
      };
      // len = 1;
      for (i = 0; i < len; i += 1) {
        addEyeCircleProperty(
          rightEyeCircles[i],
          "Loop,right_eye",
          cachedMouseEyeData
        );
      }
    }

    function changeColor(leave_name) {
      var leafColorKey = animationAPI.getKeyPath(
        "#" + leave_name + ",Contents,color_group,fill_prop,Color"
      );
      var colorValue = leafColorKey.getPropertyAtIndex(0).getValue();
      var colorString = "rgba(";
      colorString += Math.round(colorValue[0]);
      colorString += ",";
      colorString += Math.round(colorValue[1]);
      colorString += ",";
      colorString += Math.round(colorValue[2]);
      colorString += ",1)";
      colorSelector.style.setProperty("--chame-color", colorString);
      colorSelector.style.setProperty("--chame-color-eyes", colorString);
      if (camouflage_timeout) {
        clearTimeout(camouflage_timeout);
      }
      camouflage_timeout = setTimeout(function() {
        colorSelector.style.setProperty("--chame-color", "rgba(240,237,231,1)");
        colorSelector.style.setProperty("--chame-color-eyes", "rgba(228,225,218,1)");
        camouflage_timeout = null;
      }, 15000);
    }

    function addLeaveListener(leave_name) {
      var leaveElement = document.getElementById(leave_name);
      leaveElement.addEventListener("mouseover", function() {
        changeColor(leave_name);
      });
      leaveElement.addEventListener("touchmove", function() {
        changeColor(leave_name);
      });
    }

    function addLeavesListeners() {
      var i,
        len = leaves.length;
      for (i = 0; i < len; i += 1) {
        addLeaveListener(leaves[i]);
      }
    }

    function addMouthProperties() {
      var keyPathMouthInner = animationAPI.getKeyPath("Mouth,ReferencePoint");
      var keyPathMouthContainerTimeRemap = animationAPI.getKeyPath(
        "Mouth,Time Remap"
      );
      var perc = 0;
      animationAPI.addValueCallback(keyPathMouthContainerTimeRemap, function(
        currentValue
      ) {
        if (!isActive && mouse_changed) {
          var point2 = animationAPI.toContainerPoint(valueArr);
          point2 = animationAPI.toKeypathLayerPoint(keyPathMouthInner, point2);
          angle = Math.atan2(0 - point2[1], 0 - point2[0]) / degToRads + 170;
          distanceToMouse = Math.sqrt(
            Math.pow(0 - point2[0], 2) + Math.pow(0 - point2[1], 2)
          );
          mouse_changed = false;
        }

        if (distanceToMouse < minTongueRadius) {
          perc = distanceToMouse / minTongueRadius;
          return perc * 9 / 30;
        } else if (distanceToMouse > maxTongueRadius) {
          perc =
            1 -
            Math.min(
              1,
              (distanceToMouse - maxTongueRadius) / (maxTongueRadius + 100)
            );
          return perc * (9 / 30);
        } else if (distanceToMouse >= minTongueRadius) {
          return 9 / 30;
        }
        return 0;
      });
    }

    function addArrowProperties() {
      var scalePath = "Mouth,Tongue_Comp,arrow,Contents,Shape 1,Transform,Scale";
      var rotationPath = "Mouth,Tongue_Comp,arrow,Contents,Shape 1,Transform,Rotation";
      var scaleKeyPath, rotationKeyPath;
      if(isMacLike) {
        scaleKeyPath = "Mouth,Tongue_Comp,.mac_arrow,Contents,Shape 1,Transform,Scale";
        rotationKeyPath = "Mouth,Tongue_Comp,.mac_arrow,Contents,Shape 1,Transform,Rotation";
      } else {
        scaleKeyPath = "Mouth,Tongue_Comp,.default_arrow,Contents,Shape 1,Transform,Scale";
        rotationKeyPath = "Mouth,Tongue_Comp,.default_arrow,Contents,Shape 1,Transform,Rotation";
      }
      var keyPathArrowScale = animationAPI.getKeyPath(
        scaleKeyPath
      );
      var currentScale = -1;
      var currentScaleValue = [-1, -1];
      animationAPI.addValueCallback(keyPathArrowScale, function(currentValue) {
        var scale = animationAPI.getScaleData().scale;
        if (currentScale !== scale) {
          currentScaleValue[0] = currentValue[0] / scale;
          currentScaleValue[1] = currentValue[1] / scale;
          currentScale = scale;
        }
        return currentScaleValue;
      });

      var keyPathArrowRotation = animationAPI.getKeyPath(
        rotationKeyPath
      );
      animationAPI.addValueCallback(keyPathArrowRotation, function(currentValue) {
        return -angle;
      });
    }

    function addTongueProperties() {
      var tongueInitialAnimationTime = 0;
      var tongueCurrentTime = 0;

      function animateTongue() {
        tongueInitialAnimationTime = Date.now() - 1500 / 30;
        isActive = true;
        mouse_container.setAttribute("class", "active");
      }

      function resetTongue() {
        isActive = false;
        mouse_container.setAttribute("class", "");
      }
      var keyPathTongueContainerTimeRemap = animationAPI.getKeyPath(
        "Mouth,Tongue_Comp,Time Remap"
      );
      animationAPI.addValueCallback(keyPathTongueContainerTimeRemap, function(
        currentValue
      ) {
        if (
          distanceToMouse > minTongueRadius &&
          distanceToMouse < maxTongueRadius &&
          !isActive
        ) {
          animateTongue();
        }
        if (isActive) {
          tongueCurrentTime = 2 * (Date.now() - tongueInitialAnimationTime) / 1000;
        }
        if (tongueCurrentTime > 2) {
          tongueCurrentTime = 0;
          resetTongue();
        }
        return tongueCurrentTime;
      });

      var keyPathTongueContainer = animationAPI.getKeyPath(
        "Mouth,Tongue_Comp,Transform,Rotation"
      );
      animationAPI.addValueCallback(keyPathTongueContainer, function(currentValue) {
        return angle;
      });
    }

    function updateValue(ev) {
      mouse_changed = true;
      var mouseX, mouseY;
      if (ev.touches && ev.touches.length) {
        var mouseX = ev.touches[0].pageX;
        var mouseY = ev.touches[0].pageY;
      } else if (ev.pageX !== undefined) {
        mouseX = ev.pageX;
        mouseY = ev.pageY;
      }
      valueArr[0] = mouseX;
      valueArr[1] = mouseY;
    }

    function onWindowResized() {
      if (animationAPI) {
        anim.resize();
        animationAPI.recalculateSize();
      }
    }
    </script>
@endsection
