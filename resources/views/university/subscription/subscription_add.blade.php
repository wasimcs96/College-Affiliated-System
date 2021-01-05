@extends('layout.master')
@section('parentPageTitle', 'Consultant')
@section('title', 'Subscription')

@section('content')

<div class="row clearfix">
    @foreach ($packages as $package)

    <div class="col-lg-4 cool-md-4 col-sm-12">

        <div class="card">
            <ul class="pricing body">
                <li class="plan-img"><img class="img-fluid rounded-circle" src="{{asset('assets/images/plan-1.svg')}}" alt="" /></li>
                <li class="price">
                    <h3><span>$</span>{{$package->amount}}<small>/ mo</small></h3>
                    <span>Subscription</span>
                    <?php $mytime=Carbon\Carbon::now()->format('Y-m-d');
        $rt=auth()->user()->Subscription_expire_date;
?>
                </li>
                <li>{{$package->description}}</li>
                <input type="text" name="amount" value="{{$package->amount}}" hidden>
                <input type="text" name="user_id" value="{{auth()->user()->id}}" hidden>
                <input type="text" name="payment_type" value="1" hidden>
                <input type="text" name="title" value="{{$package->title}}" hidden>
                @if($rt>$mytime && $rt != null)

                <li class="plan-btn"><button class="btn btn-round btn-outline-secondary">Choose plan</button></li>
                @else
                <li class="plan-btn"><button customDescription="{{$package->description}}" customAmount="{{$package->amount}}" customUser="{{auth()->user()->id}}" customPayment="1" customTitle="{{$package->title}}" class="btn btn-round btn-outline-secondary chooseplan">Choose plan</button></li>

                @endif
            </ul>
        </div>

    </div>
    @endforeach
    {{-- <img style="width: 100px; height: 50px; border-radius: 11px;" id="rzp-button1" src="{{asset('assets/images/razor_pay.jpeg')}} "> --}}
</div>
<div class="container" id="choosedcontent">

</div>
<div class="container">

<br>



{{-- @if($rt<$mytime) --}}
{{--  @if (Session::get('amount'))
<h2 class="text-center" style="font-family: -webkit-pictograph;
font-weight: unset;"> Pay with Razorpay</h2>
<hr>
<div class="align-content-center">
    <img style="width: 279px; height: 218px; border-radius: 7px; margin-top: -83px;"  class="cntr" id="rzp-button1" src="{{asset('assets/images/razor_pay.png')}} ">

</div>
@endif  --}}

{{-- @endif --}}
</div>
<div class="modal fade" id="mdlup" tabindex="-1" aria-labelledby="exampleModalLabel2" aria-hidden="true">
    <div class="modal-dialog  modal-dialog-centered">
      <div class="modal-content" style="background-color: antiquewhite">

        <div class="modal-body">

<div id="body"

>
 <div
 style="position: absolute;
 margin-top: -265px;"
 >
<h1 class="ml1">
    <span class="text-wrapper">
      <span class="line line1"></span>
      <span class="letters"> THANK YOU </span>
      <span class="line line2"></span>
    </span>
  </h1>
  </div>
    <canvas width="500" height="500"></canvas>
    <div
    style="position: absolute;
 margin-bottom: -330px;"
 >
<h1 class="ml1">
    <span class="text-wrapper">
      <span class="line line1"></span>
      <span class="letters"> FOR PURCHASE </span>
      <span class="line line2"></span>
    </span>
  </h1>
  </div>
              </div>

        </div>
    </div>

        {{-- <div class="modal-footer">
           <a href="javascript:void(0)"  class="btn btn-primary" id="apply"> Apply </a>
        </div> --}}
    </div>
</div>
</div>

@stop

@section('page-styles')
<style>
  * {
  box-sizing: border-box;
  padding: 0;
  margin: 0;
}
#body {
  min-height: 100vh;
  /* center the canvas in the viewport */
  display: flex;
  justify-content: center;
  align-items: center;
  /* atop an off-white background include a pattern using the star icon created for the project */
  background: url('data:image/svg+xml;utf8,<svg opacity="0.15" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 15" width="160" height="150"><g transform="translate(1 1)" stroke-width="2" stroke="%23ffc928" stroke-linecap="round" stroke-linejoin="round" fill="%23ffc928"><path d="M 0 4.5 l 4.5 0 l 2.5 -4.5 l 2.5 4.5 l 4.5 0 l -3.5 3.5 l 1.5 5 l -5 -2.5 l -5 2.5 l 1.5 -5 l -3.5 -3.5"></path></g></svg>'),
    hsl(0, 0%, 96%);
  background-size: 40px;
}

    </style>

<style>
.ml1 {
  font-weight: 900;
  font-size: 3.0rem;
}

.ml1 .letter {
  display: inline-block;
  line-height: 1em;
}

.ml1 .text-wrapper {
  position: relative;
  display: inline-block;
  padding-top: 0.1em;
  padding-right: 0.05em;
  padding-bottom: 0.15em;
}

.ml1 .line {
  opacity: 0;
  position: absolute;
  left: 0;
  height: 3px;
  width: 100%;
  background-color:cyan;
  transform-origin: 0 0;
}

.ml1 .line1 { top: 0; }
.ml1 .line2 { bottom: 0; }
</style>

<style>
.cntr {
    display: block;
    margin-left: auto;
    margin-right: auto;

  }
</style>

@stop

@section('page-script')
<script src="backend.js" charset="utf-8"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/animejs/2.0.2/anime.js"></script>
<script src="https://unpkg.com/zdog@1/dist/zdog.dist.min.js"></script>

<script>
    // Wrap every letter in a span
var textWrapper = document.querySelector('.ml1 .letters');
textWrapper.innerHTML = textWrapper.textContent.replace(/\S/g, "<span class='letter'>$&</span>");

anime.timeline({loop: true})
  .add({
    targets: '.ml1 .letter',
    scale: [0.3,1],
    opacity: [0,1],
    translateZ: 0,
    easing: "easeOutExpo",
    duration: 600,
    delay: (el, i) => 70 * (i+1)
  }).add({
    targets: '.ml1 .line',
    scaleX: [0,1],
    opacity: [0.5,1],
    easing: "easeOutExpo",
    duration: 700,
    offset: '-=875',
    delay: (el, i, l) => 80 * (l - i)
  }).add({
    targets: '.ml1',
    opacity: 0,
    duration: 1000,
    easing: "easeOutExpo",
    delay: 1000
  });
</script>

<script>

// from the Zdog object extract the necessary modules
const { Illustration, Ellipse, Rect, Shape, Group, Anchor } = Zdog;

// set up the illustration within the existing canvas element
const illustration = new Illustration({
  element: "canvas",
  dragRotate: true
});

// below the star draw a circle with a fill and no stroke, for the shadow
const shadow = new Ellipse({
  addTo: illustration,
  diameter: 100,
  stroke: false,
  fill: true,
  color: "hsla(45, 100%, 58%, 0.4)",
  translate: { x: 50, y: 100 },
  rotate: { x: Math.PI / 1.7 }
});

// include an anchor point for the star
// ! position the star atop the anchor, to have the rotation occur around this point
const starAnchor = new Anchor({
  addTo: illustration,
  translate: { y: 100 },
  rotate: { z: Math.PI / 10 }
});

// draw a star in a group element positioned atop the anchor point
const starGroup = new Group({
  addTo: starAnchor,
  translate: { x: -70, y: -170 } // -70 to center the 140 wide shape
});

// draw the path describing the star
new Shape({
  addTo: starGroup,
  path: [
    { x: 0, y: 45 },
    { x: 45, y: 45 },
    { x: 70, y: 0 },
    { x: 95, y: 45 },
    { x: 140, y: 45 },
    { x: 105, y: 80 },
    { x: 120, y: 130 },
    { x: 70, y: 105 },
    { x: 20, y: 130 },
    { x: 35, y: 80 },
    { x: 0, y: 45 }
  ],
  stroke: 40,
  color: "hsl(45, 100%, 58%)"
});
// within the path include a rectangle to remove the gap between the center of the star and its stroke
new Rect({
  addTo: starGroup,
  width: 40,
  height: 50,
  stroke: 40,
  translate: { x: 70, y: 70 },
  color: "hsl(45, 100%, 58%)"
});

// include a group for the eyes, positioned halfway through the height of the star
const eyesGroup = new Group({
  addTo: starGroup,
  translate: { x: 70, y: 72.5, z: 20 }
});

// add black circles describing the contour of the eyes, and either end of the star
const eye = new Ellipse({
  addTo: eyesGroup,
  diameter: 5,
  stroke: 15,
  translate: { x: -32.5 },
  color: "hsl(0, 0%, 0%)"
});
eye.copy({
  translate: { x: 32.5 }
});

// add an anchor point for the white part of the eyes
// by later translating the white part of the eyes, the rotation allows to have the circle rotate around the anchor point
const leftEyeAnchor = new Anchor({
  addTo: eyesGroup,
  translate: { x: -32.5, z: 0.5 }
});
const leftEye = new Ellipse({
  addTo: leftEyeAnchor,
  diameter: 1,
  stroke: 5,
  color: "hsl(0, 100%, 100%)",
  translate: { x: -3.5 }
});

// copy the left anchor for the right side
const rightEyeAnchor = leftEyeAnchor.copyGraph({
  translate: { x: 32.5, z: 0.5 }
});

// include an anchor point for the mouth
// by centering the mouth around the anchor and scaling the anchor itself, the change in size occurs from the center of the mouth
const mouthAnchor = new Anchor({
  addTo: starGroup,
  translate: { x: 70, y: 95, z: 20 },
  scale: 0.8
});
// draw a mouth with a line and arc commands
const mouth = new Shape({
  addTo: mouthAnchor,
  path: [
    { x: -8, y: 0 },
    { x: 8, y: 0 },
    {
      arc: [
        { x: 4, y: 6 },
        { x: 0, y: 6 }
      ]
    },
    {
      arc: [
        { x: -4, y: 6 },
        { x: -8, y: 0 }
      ]
    }
  ],
  stroke: 10,
  color: "hsl(358, 100%, 65%)"
});

illustration.updateRenderGraph();

/* to animate the star, change the transform property as follows

|variableName|transform|valueRange|
|---|---|---|
|starAnchor|rotate.z|[Math.PI/10, -Math.PI/10]|
|leftIrisAnchor && rightIrisAnchor|rotate.z|[0, Math.PI/2]|
|mouthAnchor|scale|[0.8, 1.2]|
|shadow|translate.x|[50, -50]|
*/

// ! I am positive there are much better ways to achieve this animation, but this is my take using anime.js
// I am still a newbie when it comes to animation
// create an object describing the values for the different elements
const starObject = {
  star: Math.PI / 10,
  shadow: 50,
  mouth: 0.8,
  eyes: 0
};

// set up a repeating animation which constantly updates the illustration and updates the desired transform properties according to the object's values
const timeline = anime.timeline({
  duration: 110,
  easing: "easeInOutQuart",
  direction: "alternate",
  loop: true,
  update: () => {
    starAnchor.rotate.z = starObject.star;
    // shadow.translate.x = starObject.shadow;
    mouth.scale = starObject.mouth;
    leftEyeAnchor.rotate.z = starObject.eyes;
    rightEyeAnchor.rotate.z = starObject.eyes;

    illustration.updateRenderGraph();
  }
});

// animate the star with a slightly more pronounced easing function
timeline.add({
  targets: starObject,
  star: -Math.PI / 10,
  easing: "easeInOutQuint"
});
// have the shadow follow with a small delay
timeline.add(
  {
    targets: starObject,
    delay: 2,
    shadow: -50
  },
  "-=110"
);

// with a smaller duration and slightly postponed, animate the mouth and the eyes
timeline.add(
  {
    targets: starObject,
    mouth: 1.2,
    duration: 30
  },
  "-=800"
);

timeline.add(
  {
    targets: starObject,
    eyes: Math.PI / 2,
    duration: 90
  },
  "-=1000"
);

</script>

{{-- ##############################################3 --}}

<script src="{{ asset('assets/bundles/mainscripts.bundle.js') }}"></script>

<script>
    $(function() {
        // (Optional) Active an item if it has the class "is-active"
        $(".accordion2 > .accordion-item.is-active").children(".accordion-panel").slideDown();

        $(".accordion2 > .accordion-item").click(function() {
            // Cancel the siblings
            $(this).siblings(".accordion-item").removeClass("is-active").children(".accordion-panel").slideUp();
            // Toggle the item
            $(this).toggleClass("is-active").children(".accordion-panel").slideToggle("ease-out");
        });
    });
</script>
<script src="https://checkout.razorpay.com/v1/checkout.js"></script>


<script>
    $(document).on('click', '.chooseplan', function ()
{

    user_id=$(this).attr('customUser');
    title=$(this).attr('customTitle');
    description=$(this).attr('customDescription');
    amount=$(this).attr('customAmount');
    payment_type=$(this).attr('customPayment');



   var html=`<div class="row clearfix">
    <div class="col-lg-12">
        <div class="card">
            <div class="body">
                <div class="row clearfix">
                    <div class="col-md-3">
                        <p><b>Plan Type</b></p>
                        <ul style="list-style-type: none;">
        <li class="plan-img"> Subscription Plan</li>
        <li class="price">

            <span>Subscription</span>
        </li>
        <li></li>
    </ul>
                    </div>
                    <div class="col-md-3">
                        <p class="align-center" ><b  style="float: left;">Amount To Pay</b></p>
                        <div class="align-center" ><h3 style="float:left; margin-left: -113px;"><span>$</span>${amount}<small>/ mo</small></h3></div>
                    </div>
                    <div class="col-md-3">
                        <p class="align-right"><b style="float: left;">Description</b></p>
                        <div class="align-left" style="float: left;margin-left: -85px;">${description} </div>
                    </div>
                    <div class="col-md-3">
                        <p class="align-justify"><b >Payment Method</b></p>
                        <div class="align-justify"> <img style="margin-top: -57px; margin-left: 1px;"  class="cntr" id="rzp-button1" src="{{asset('assets/images/razor_pay.png')}} "></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>`;
$('#choosedcontent').html(html);
    $.ajaxSetup({headers:
        {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
        });

        $.ajax({
        url:"{{ route('subscription.payment') }}",
        method:"post",
        data:{user_id:user_id,title:title,description:description,amount:amount,payment_type:payment_type},
        success: function(result){
            {{-- console.log() --}}
            var options = {
                "key": "rzp_test_6PaQ95AP7ZPT1S", // Enter the Key ID generated from the Dashboard
                "amount": result.amount, // Amount is in currency subunits. Default currency is INR. Hence, 50000 refers to 50000 paise
                "currency": "INR",
                "name":"{{Session::get('name')}}",
                "description": "Test Transaction",
                "image": "https://example.com/your_logo",
                "order_id": result.id, //This is a sample Order ID. Pass the `id` obtained in the response of Step 1
                "handler": function (response){

                    $.ajaxSetup({headers:
                        {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                        });


                         transactionId=response.razorpay_payment_id;

                        $.ajax({
                        url:"{{ route('transaction.pay') }}",
                        method:"GET",
                        data:{transactionId:transactionId,amount:amount,userId:user_id,payment_type:payment_type,title:title},
                        success: function(result){
                            $('#mdlup').modal('show');
                        }
                        });




                },

                "prefill": {
                    "name": "Gaurav Kumar",
                    "email": "gaurav.kumar@example.com",
                    "contact": "9999999999"
                },
                "notes": {
                    "address": "Razorpay Corporate Office"
                },
                "theme": {
                    "color": "#3399cc"
                }
            };
            var rzp1 = new Razorpay(options);
            rzp1.on('payment.failed', function (response){
                    alert(response.error.code);
                    alert(response.error.description);
                    alert(response.error.source);
                    alert(response.error.step);
                    alert(response.error.reason);
                    alert(response.error.metadata.order_id);
                    alert(response.error.metadata.payment_id);
            });
            document.getElementById('rzp-button1').onclick = function(e){
                rzp1.open();
                e.preventDefault();
            }
        }
        });



    })
</script>
@stop
