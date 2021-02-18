@extends('layout.master')
@section('parentPageTitle', 'SubAdmin')
@section('title', 'Faq')

@section('content')

<div class="col-lg-12">
    <div class="card">
        <div class="header">
            <h2>FAQ Detail<small>All FAQ Posts</small></h2>
            <ul class="header-dropdown dropdown">

                <li><a href="javascript:void(0);" class="full-screen"><i class="icon-frame"></i></a></li>
               <li><a  style="color: white;" href="{{route('subadmin.general.faq')}}"class="btn btn-primary"><i class="fa fa-plus"></i>{!! "&nbsp;"!!}Add</a></li>
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
        <div class="body">
            <div class="table-responsive">
                <table class="table table-striped table-hover dataTable js-exportable">
                    <thead>

                        <tr>
                   
                            <th> <b>Title</b></th>
                            <th><b>Question</b></th>
                            <th><b>Answer</b></th>
                            <th><b>Status</b></th>
                            <th style="text-align: center;"><b>Action<b></th>

                        </tr>
                    </thead>
                   <?php $faqs=App\Models\Page::where('page_type',1)->get();?>
                    @if($faqs->count() > 0)
                   <tbody>
                    @foreach ($faqs as $faq)
                        <tr>
                            <td>{{$faq->title ?? ''}}</td>

                            <td>  
                                <?php
                                $myvalue =$faq->short_description ;
                                if (strlen($myvalue) > 40)
                                    {
                                        $myvalue = substr($myvalue, 0, 40);
                                        $myvalue = explode(' ', $myvalue);
                                        array_pop($myvalue); // remove last word from array
                                        $myvalue = implode(' ', $myvalue);
                                        // $myvalue = $myvalue . ' ...';
                                    } ?> 
                                     <?php echo $myvalue . '...' ?></td>


                             {{-- <td>{{$blog->content ?? ''}}</td> --}}

                             <td>@if(isset($faq->description))    
                                 <?php
                                $mydesc =$faq->description ;
                                if (strlen($mydesc) > 40)
                                    {
                                        $mydesc = substr($mydesc, 0, 40);
                                        $mydesc = explode(' ', $mydesc);
                                        array_pop($mydesc); // remove last word from array
                                        $mydesc = implode(' ', $mydesc);
                                        // $myvalue = $myvalue . ' ...';
                                    } ?> 
                                 <?php  echo $mydesc . '...'; ?> @else N/A @endif</td>


                            <td>
                                @if ($faq->status  == 1 ?? '')

                                <button class="btn btn-success">Active</button>
                                {{-- @endif --}}

                            @elseif($faq->status == 0 ?? '')

                             <button class="btn btn-danger">InActive</button>
                            @endif


                            </td>


                            <td style="text-align: center;">
               
                            <a href="{{route('subadmin.general.faq.edit', $faq->id ?? '')}}" class="btn btn-primary btn-sm" data-toggle="tooltip" alt="Edit course" title="" data-original-title="Edit"><i class="fa fa-edit"></i></a>
                            &nbsp;&nbsp;

                              <a href="{{route('subadmin.general.faq.delete', $faq->id ?? '')}}" class="confirmDeleteBtn btn btn-danger btn-sm btn-flat" data-toggle="tooltip" alt="Delete Course" data-url="" data-title="Delete"><i class="fa fa-trash"></i></a>

                            </td>

                        </tr>

                        @endforeach
                    <tbody>
                        {{-- @else
                        <tfoot>
                            <tr>
                                <td colspan='7' align='center'> <strong>Record Not Available</strong> </td>
                            </tr>
                        </tfoot> --}}
                        @endif
                </table>
            </div>
        </div>
    </div>
</div>
</div>



@stop
@section('page-styles')
<link rel="stylesheet" href="{{ asset('assets/vendor/jquery-datatable/dataTables.bootstrap4.min.css') }}">
<link rel="stylesheet" href="{{ asset('assets/vendor/jquery-datatable/fixedeader/dataTables.fixedcolumns.bootstrap4.min.css') }}">
<link rel="stylesheet" href="{{ asset('assets/vendor/jquery-datatable/fixedeader/dataTables.fixedheader.bootstrap4.min.css') }}">
<link rel="stylesheet" href="{{ asset('assets/vendor/sweetalert/sweetalert.css') }}"/>
<style>
td.details-control {
background: url('../assets/images/details_open.png') no-repeat center center;
cursor: pointer;
}
tr.shown td.details-control {
    background: url('../assets/images/details_close.png') no-repeat center center;
}
</style>
@stop
@section('page-script')
<script src="{{ asset('assets/bundles/datatablescripts.bundle.js') }}"></script>
<script src="{{ asset('assets/vendor/jquery-datatable/buttons/dataTables.buttons.min.js') }}"></script>
<script src="{{ asset('assets/vendor/jquery-datatable/buttons/buttons.bootstrap4.min.js') }}"></script>
<script src="{{ asset('assets/vendor/jquery-datatable/buttons/buttons.colVis.min.js') }}"></script>
<script src="{{ asset('assets/vendor/jquery-datatable/buttons/buttons.html5.min.js') }}"></script>
<script src="{{ asset('assets/vendor/jquery-datatable/buttons/buttons.print.min.js') }}"></script>
<script src="{{ asset('assets/vendor/sweetalert/sweetalert.min.js') }}"></script>

<script src="{{ asset('assets/bundles/mainscripts.bundle.js') }}"></script>
<script src="{{ asset('assets/js/pages/tables/jquery-datatable.js') }}"></script>
@stop
