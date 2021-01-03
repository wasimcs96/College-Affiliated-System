@extends('layout.master')
@section('parentPageTitle', 'University')
@section('title', 'Media')


@section('content')

    <div class="col-lg-12 col-md-7">
        <div class="card">
            <div class="header">
                <h2>Add Document</h2>
                <ul class="header-dropdown dropdown">
                    <li><a href="javascript:void(0);" class="full-screen"><i class="icon-frame"></i></a></li>
                </ul>
            </div>
            <div class="body">
                <form action="{{ route('university.document.store')}}" method="POST" enctype="multipart/form-data" >
                    @csrf
                    <div class="form-group">
                        <label for="documents"><button type="button" name="adddocument" id="add_document" class="btn btn-primary btn-m" data-toggle="modal" data-target="#documentModal" ><i class="fa fa-plus"></i>Add Document </button>
                            <p id="error-checkbox3">
                                <div class="dynamic_document" id="dynamic_document"></label>
                                <?php $inc = 0 ?>
                                @if(isset($documents))
                                    @foreach($documents as $key => $value)
                                       <label class="control-inline fancy-checkbox">
                                       <input type="checkbox" name= "document[{{$inc}}]" value="{{$value}}" checked><span>{{$value}}</span></label>
                                       @php $inc++ @endphp
                                    @endforeach
                                @endif

                                </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
            @stop
            <div class="modal fade" id="documentModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Add Document Title</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                                </button>
                        </div>
                        <div class="modal-body">
                            <form id="basic-form" method="post" novalidate action="#">
                                <div class="form-group">
                                    <label>Document Name</label>
                                    <input type="text" class="form-control" name="document_name" id="document_name" required>
                                </div>
                           </form>
                        </div>
                        <div class="modal-footer">
                           {{-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button> --}}
                           {{-- <button type= class="btn btn-primary">Submit</button> --}}
                               <a href="javascript:void(0)" class="btn btn-primary" id="add_document2"> Add </a>
                        </div>
                    </div>
                </div>
            </div>
            @section('page-styles')
            <style>


.iws {
    position: relative;
    display: inline-block;

    font-size: 0;
}
.iws .closes {
    position: absolute;
    top: 5px;
    right: 8px;
    z-index: 6;
    background-color:#22252a;
    padding: 4px 3px;

    color: #000;
    font-weight: bold;
    cursor: pointer;

    text-align: center;
    font-size: 22px;
    line-height: 10px;
    border-radius: 50%;
    border:1px solid #22252a;
}
.iws:hover .closes {
    opacity: 1;
}
                </style>
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

<script type="text/javascript">
    $(document).ready(function(){
        var i=0;
        var document_row = {{$inc}} ;
        $('#add_document2').click(function(){
        rt=$('#document_name').val()
        $('#dynamic_document').append('<label class="control-inline fancy-checkbox"><input type="checkbox" name= "document['+document_row+']" value="'+rt+'" required><span>'+rt+'</span></label>')
        $('#documentModal').modal('hide')
        document_row++;
    });


    });
</script>

@stop
