@extends('layouts.app')
@section('page_title','SRS')
@section('content')
<style>
    #userTable_filter label{ display: inline-flex; }
</style>
<!--**********************************
    Content body start
***********************************-->

<div class="container-fluid">
    <div class="row page-titles mx-0">
        <!-- <div class="col-sm-6">
            <div class="welcome-text">
                <h4>Hi, welcome back!</h4>
                <span class="ml-1">Sue Swindell</span>
            </div>
            </div> -->
        <!-- <div class="col-sm-6 justify-content-sm-end mt-2 mt-sm-0 d-flex"> -->
        <div>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Influencing Questions</a></li>
                <li class="breadcrumb-item active"><a href="javascript:void(0)">360 Questions</a></li>
            </ol>
        </div>
    </div>
    <!-- <div class="col-xl-12 col-xxl-12"> -->
    <div class="">
        <select id="customFilter" name="category_id" class="form-control custom-cls">
            <option value="">Select Category</option>
                <option value="1">Emotive</option>
                <option value="2">Assertive</option>
                <option value="3">Persuasive</option>
                <option value="4">Listening</option>
                <option value="5">Trusting</option>
                <option value="6">Inspiring</option>
                <option value="7">Knowing Self</option>
            </select>
        <table class="table table-striped" id="userTable" style="width: 100%;">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Question</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
        </table>
    </div>
    <!-- row -->
</div>




<!--**********************************
    Content body end
***********************************-->
@endsection
@section('extra-script')

<script src="{{asset('vendor/select2/js/select2.full.min.js')}}"></script>
<script src="{{asset('js/plugins-init/select2-init.js')}}"></script>
<script type="text/javascript">
    $(function() {
        var table = $('.table').DataTable({
            processing: true,
            serverSide: true,
            searching: true,
            lengthMenu: [50, 100, 150, 200],
            fnServerParams: function(data) {
                data['order'].forEach(function(items, index) {
                    data['order'][index]['column'] = data['columns'][items.column]['data'];
                });
            },
            "oLanguage": {
                "sLengthMenu": "Show  _MENU_ Entries",
            },
            // dom: '<"top"i>rt<"bottom"flp><"clear">',
            ajax: {
                url: "{{ route('questions.index') }}",
                data: function (d) {
                    d.customFilter = $('#customFilter').val();
                }
            },
            columns: [{
                    data: 'id',
                    name: 'id',
                    // orderable: false,
                    // searchable: true
                },
                {
                    data: 'question',
                    name: 'question',
                    // orderable: false,
                    // searchable: true
                },
                {
                    data: 'action',
                    name: 'action',
                    orderable: false,
                    searchable: false
                },
            ],
            "createdRow": function(row, data, dataIndex) {
                $( row ).find('td:eq(3)').addClass('group-i-icons');
                $( row ).find('td:eq(1)').addClass('attendee-txt-align');
                SRS.Utils.dtAnchorToForm(row);
            }
        }).on('click', '.delete_action', function(e) {          
            e.preventDefault();
            var $this = $(this);
            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Yes, delete it!',
                customClass: {
                    confirmButton: 'btn btn-primary',
                    cancelButton: 'btn btn-outline-danger ml-1'
                },
                buttonsStyling: false
            }).then(function(result) {
                if (result.value) {
                    $this.find("form").trigger('submit');
                }
            });
        });

        $("#userTable_filter label").html('');
        $("#userTable_filter label").html('Filter By:');
        $("#userTable_filter.dataTables_filter label").append($("#customFilter"));

        var index = 0;
        $("#userTable th").each(function(i) {
            if ($($(this)).html() == "Gender") {
                index = i;
                return false;
            }
        });
        $.fn.dataTable.ext.search.push(
            function(settings, data, dataIndex) {
                var selectedItem = $('#customFilter').val()
                var gender = data[index];
                if (selectedItem === "" || gender.includes(selectedItem)) {
                    return true;
                }
                return false;
            }
        );
        //When you change event for the Gender Filter dropdown to redraw the datatable
        $("#customFilter").change(function(e) {
            table.draw();
        });
        table.draw();
    });
    function questionSearch()
    {
        $('.table').DataTable().ajax.reload();
    }
</script>
@endsection