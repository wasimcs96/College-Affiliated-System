@extends('layout.master')
@section('parentPageTitle', 'SubAdmin')
@section('title', 'Booking')

@section('content')
<div class="col-lg-12">
    <div class="card">
        <div class="header">
            <h2>Bookings<small>All booking requests</small></h2>
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
        <div class="body">
            <div class="table-responsive">
                <table class="table table-striped table-hover dataTable js-exportable">
                    <thead>
                        <tr>
                            <th><b>Updated At </b></th>
                            <th> <b>
                               Client Name</b></th>
                            <th><b>Consultant Name </b></th>
                            <th><b>Booking Type</b></th>
                            <th><b>Booking Date</b></th>
                            <th><b>Booking Time Slot</b></th>
                            <th><b>Booking Status</b></th>
                            <th><b>Actions</b></th>
                        </tr>
                    </thead>
                    <tfoot>

                    </tfoot>

                    @if($bookings->count() > 0)
                    <tbody>

                        @foreach($bookings as $booking)
                        <tr>
                            <td> {{$booking->updated_at ?? ''}} </td>
                            <td>@if(isset($booking->user->first_name)){{$booking->user->first_name}} {{$booking->user->last_name}}@else N/A @endif</td>
                            <td>@if(isset($booking->userConsultant->first_name)){{$booking->userConsultant->first_name}} {{$booking->userConsultant->last_name}}@else N/A @endif</td>

                            <td>@if(isset($booking->booking_for))@if($booking->booking_for == 0)Student Visa @elseif($booking->booking_for == 1)PR Migration @endif @else N/A @endif</td>
                            <td>@if(isset($booking->booking_date)){{ Carbon\Carbon::parse($booking->booking_date)->format(config('get.ADMIN_DATE_FORMAT')) }} @else N/A @endif</td>
                            {{-- <td>tru</td>--}}
                            <td>@if(isset($booking->booking_start_time)){{$booking->booking_start_time}}-{{$booking->booking_end_time}}@else N/A @endif</td>
                            {{-- <td>2020/30/11</td> --}}
                            <td>@if($booking->status==0 ?? '')<div class="btn btn-warning">Pending</div>@endif
                                @if($booking->status==1 ?? '')<div class="btn btn-success">Accepted</div>@endif
                                @if($booking->status==2 ?? '')<div class="btn btn-primary">In Progress</div>@endif
                                @if($booking->status==3 ?? '')<div class="btn btn-danger">Declined</div>@endif
                                @if($booking->status==4 ?? '')<div class="btn btn-info">Completed</div>@endif
                                @if($booking->status==5 ?? '')<div class="btn btn-danger">Closed</div>@endif
                            </td>
                            <td style="text-align: center;"><a href="{{route('admin.booking.show',['id'=>$booking->id])}}" class="btn btn-success"><i class="fa fa-eye"></i></a></td>
                        </tr>

@endforeach

@endif
                    </tbody>
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
{{-- <script src="{{ asset('assets/js/pages/tables/jquery-datatable.js') }}"></script> --}}
<script>
    $(function () {
    $('.js-basic-example').DataTable();

    //Exportable table
    $('.js-exportable').DataTable({
        dom: 'Bfrtip',
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ],
        "language": {
    // search: '<i class="fa fa-filter" aria-hidden="true"></i>',
    searchPlaceholder: 'Search Here'
}
    });
});

/* Formatting function for row details - modify as you need */
function format ( d ) {
    // `d` is the original data object for the row
    return '<table cellpadding="5" cellspacing="0" border="0" style="padding-left:50px;">'+
        '<tr>'+
            '<td>Full name:</td>'+
            '<td>'+d.name+'</td>'+
        '</tr>'+
        '<tr>'+
            '<td>Extension number:</td>'+
            '<td>'+d.extn+'</td>'+
        '</tr>'+
        '<tr>'+
            '<td>Extra info:</td>'+
            '<td>And any further details here (images etc)...</td>'+
        '</tr>'+
    '</table>';
}

$(document).ready(function() {
    var table = $('#example').DataTable( {
        "ajax": "assets/data/objects.txt",
        "columns": [
            {
                "className":      'details-control',
                "orderable":      false,
                "data":           null,
                "defaultContent": ''
            },
            { "data": "name" },
            { "data": "position" },
            { "data": "office" },
            { "data": "salary" }
        ],
        "order": [[0, 'desc']]
    } );

    // Add event listener for opening and closing details
    $('#example tbody').on('click', 'td.details-control', function () {
        var tr = $(this).closest('tr');
        var row = table.row( tr );

        if ( row.child.isShown() ) {
            // This row is already open - close it
            row.child.hide();
            tr.removeClass('shown');
        }
        else {
            // Open this row
            row.child( format(row.data()) ).show();
            tr.addClass('shown');
        }
    } );
} );

// Add row into table
var addRowTable = {
    options: {
        addButton: "#addToTable",
        table: "#addrowExample",
        dialog: {}
    },
    initialize: function() {
        this.setVars().build().events()
    },
    setVars: function() {
        return this.$table = $(this.options.table), this.$addButton = $(this.options.addButton), this.dialog = {}, this.dialog.$wrapper = $(this.options.dialog.wrapper), this.dialog.$cancel = $(this.options.dialog.cancelButton), this.dialog.$confirm = $(this.options.dialog.confirmButton), this
    },
    build: function() {
        return this.datatable = this.$table.DataTable({
            aoColumns: [null, null, null, {
                bSortable: !1
            }],
        }), window.dt = this.datatable, this
    },
    events: function() {
        var object = this;
        return this.$table.on("click", "button.button-save", function(e) {
            e.preventDefault(), object.rowSave($(this).closest("tr"))
        }).on("click", "button.button-discard", function(e) {
            e.preventDefault(), object.rowCancel($(this).closest("tr"))
        }).on("click", "button.button-edit", function(e) {
            e.preventDefault(), object.rowEdit($(this).closest("tr"))
        }).on("click", "button.button-remove", function(e) {
            e.preventDefault();
            var $row = $(this).closest("tr");
            swal({
                title: "Are you sure?",
                text: "You will not be able to recover this imaginary file!",
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: "#dc3545",
                confirmButtonText: "Yes, delete it!",
                closeOnConfirm: false
            }, function () {
                object.rowRemove($row)
                swal("Deleted!", "Your imaginary file has been deleted.", "success");
            });
        }), this.$addButton.on("click", function(e) {
            e.preventDefault(), object.rowAdd()
        }), this.dialog.$cancel.on("click", function(e) {
            e.preventDefault(), $.magnificPopup.close()
        }), this
    },
    rowAdd: function() {
        this.$addButton.attr({
            disabled: "disabled"
        });
        var actions, data, $row;
        actions = ['<button class="btn btn-sm btn-icon btn-pure btn-default on-editing button-save" data-toggle="tooltip" data-original-title="Save" hidden><i class="icon-drawer" aria-hidden="true"></i></button>', '<button class="btn btn-sm btn-icon btn-pure btn-default on-editing button-discard" data-toggle="tooltip" data-original-title="Discard" hidden><i class="icon-close" aria-hidden="true"></i></button>', '<button class="btn btn-sm btn-icon btn-pure btn-default on-default button-edit" data-toggle="tooltip" data-original-title="Edit"><i class="icon-pencil" aria-hidden="true"></i></button>', '<button class="btn btn-sm btn-icon btn-pure btn-default on-default button-remove" data-toggle="tooltip" data-original-title="Remove"><i class="icon-trash" aria-hidden="true"></i></button>'].join(" "), data = this.datatable.row.add(["", "", "", actions]), ($row = this.datatable.row(data[0]).nodes().to$()).addClass("adding").find("td:last").addClass("actions"), this.rowEdit($row), this.datatable.order([0, "desc"]).draw()
    },
    rowCancel: function($row) {
        var $actions, data;
        $row.hasClass("adding") ? this.rowRemove($row) : (($actions = $row.find("td.actions")).find(".button-discard").tooltip("hide"), $actions.get(0) && this.rowSetActionsDefault($row), data = this.datatable.row($row.get(0)).data(), this.datatable.row($row.get(0)).data(data), this.handleTooltip($row), this.datatable.draw())
    },
    rowEdit: function($row) {
        var data, object = this;
        data = this.datatable.row($row.get(0)).data(), $row.children("td").each(function(i) {
            var $this = $(this);
            $this.hasClass("actions") ? object.rowSetActionsEditing($row) : $this.html('<input type="text" class="form-control input-block" value="' + data[i] + '"/>')
        })
    },
    rowSave: function($row) {
        var $actions, object = this,
            values = [];
        $row.hasClass("adding") && (this.$addButton.removeAttr("disabled"), $row.removeClass("adding")), values = $row.find("td").map(function() {
            var $this = $(this);
            return $this.hasClass("actions") ? (object.rowSetActionsDefault($row), object.datatable.cell(this).data()) : $.trim($this.find("input").val())
        }), ($actions = $row.find("td.actions")).find(".button-save").tooltip("hide"), $actions.get(0) && this.rowSetActionsDefault($row), this.datatable.row($row.get(0)).data(values), this.handleTooltip($row), this.datatable.draw()
    },
    rowRemove: function($row) {
        $row.hasClass("adding") && this.$addButton.removeAttr("disabled"), this.datatable.row($row.get(0)).remove().draw()
    },
    rowSetActionsEditing: function($row) {
        $row.find(".on-editing").removeAttr("hidden"), $row.find(".on-default").attr("hidden", !0)
    },
    rowSetActionsDefault: function($row) {
        $row.find(".on-editing").attr("hidden", !0), $row.find(".on-default").removeAttr("hidden")
    },
    handleTooltip: function($row) {
        $row.find('[data-toggle="tooltip"]').tooltip()
    }
};
$(function() {
    addRowTable.initialize()
})
$(document).ready(function() {
    $('#example').DataTable( {
        "order": [[ 0, "desc" ]]
    } );
} );
</script>
@stop
