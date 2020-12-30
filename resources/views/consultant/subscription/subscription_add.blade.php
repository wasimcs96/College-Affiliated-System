@extends('layout.master')
@section('parentPageTitle', 'Consultant')
@section('title', 'Advertisement')


@section('content')
<div class="col-lg-12 col-md-7">
    <div class="card">
       <div class="header">
           <h2>Advertisement</h2>
           <ul class="header-dropdown dropdown">
               <li><a href="javascript:void(0);" class="full-screen"><i class="icon-frame"></i></a></li>
               {{-- <li class="dropdown">
                   <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"></a>
                   <ul class="dropdown-menu">
                       <li><a href="javascript:void(0);">Action</a></li>
                       <li><a href="javascript:void(0);">Another Action</a></li>
                       <li><a href="javascript:void(0);">Something else</a></li>
                   </ul>
               </li> --}}
           </ul>
       </div>


       </div>
</div>
<div class="row clearfix">
    <?php $packages=App\Models\Package::where('package_type',2)->where('status',1)->get();
    // dd($packages);
    ?>

    @foreach ($packages as $package)

    <div class="col-lg-4 cool-md-4 col-sm-12">
        <form action="{{route('consultant.advertisement.store')}}" method="POST"  enctype="multipart/form-data" >
            @csrf
        <div class="card">
            <ul class="pricing body">
                <li class="plan-img"><img class="img-fluid rounded-circle" src="{{asset('assets/images/plan-1.svg')}}" alt="" /></li>
                <li class="price">
                    <h3><span>$</span> {{$package->amount}}<small>/ mo</small></h3>
                    <span>Advertisement</span>
                </li>
                 <li>{{$package->description}}</li>
<li><input name="image" type="file" class="dropify-frrr" ></li>

                <input type="hidden" name="expire_date" value="{{ $package->package_time }}"  />
                <li class="plan-btn"><button type="submit" class="btn btn-round btn-outline-secondary">Choose plan</button></li>
            </ul>
        </div>
    </form>

    </div>

    @endforeach
</div>


            @stop

            @section('page-styles')
            <link rel="stylesheet" href="{{ asset('assets/vendor/light-gallery/css/lightgallery.css') }}">
            <link rel="stylesheet" href="{{ asset('assets/vendor/bootstrap-datepicker/css/bootstrap-datepicker3.min.css') }}">
            <link rel="stylesheet" href="{{ asset('assets/vendor/dropify/css/dropify.min.css') }}">


            @stop
@section('page-script')

<script src="{{ asset('assets/bundles/lightgallery.bundle.js') }}"></script>
<script src="{{ asset('assets/js/pages/medias/image-gallery.js') }}"></script>

<script src="{{ asset('assets/vendor/bootstrap-datepicker/js/bootstrap-datepicker.min.js') }}"></script>

<script src="{{ asset('assets/bundles/mainscripts.bundle.js') }}"></script>
<script src="{{ asset('assets/vendor/dropify/js/dropify.js') }}"></script>

<script src="{{ asset('assets/js/pages/forms/dropify.js') }}"></script>


<script>
    $('.dropify-frrr').dropify({
        messages: {
            default: 'Upload Image',
            replace: 'Upload  Image',
            remove: 'Cancel',
            error: 'Sorry,the file is too large'
        }
    });
</script>

<script>
    $(":radio").click(function(){
   var radioName = $(this).attr("expire_date"); //Get radio name
   $(":radio[name='"+radioName+"']").attr("disabled", true); //Disable all with the same name
});
    </script>
{{-- <script>
$(".deleteRecord").click(function(){
    // for(int i=0; )

    foreach($rts as $rt){
    var media_id = $('input[name="media_id{{$rt->id}}"]').val();
    }
console.log(media_id);
    $.ajaxSetup({
headers: {
'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
}
});
            $.ajax({
                type: "post",
                url: "{{route('media.destroy')}}",
                data: {media_id: media_id},
                success: function (result) {
                    console.log('success');
                }
            });

            document.getElementsByClassName(".deleteRecord").hide;

});

</script> --}}

@stop
