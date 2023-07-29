@extends('layouts.app')
@section('page_title', 'SRS')
@section('content')
    <!--**********************************
        Content body start
    ***********************************-->


    <div class="container-fluid template-manager-customise-container">
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
                    <?php
                    
                if( $type == "email" ){
                          ?> <li class="breadcrumb-item"><a href="javascript:void(0)">Template
                            Manager</a></li>
                    <li class="breadcrumb-item active"><a href="javascript:void(0)">Email Template
                            Manager</a></li>
                    <?php
                       } else if( $type == "help" ){
                           ?>
                    <li class="breadcrumb-item"><a href="javascript:void(0)">Template Manager</a></li>
                    <li class="breadcrumb-item active"><a href="javascript:void(0)">Help Template
                            Manager</a></li>
                    <?php
               
                       } else if( $type == "message" ){
                           ?>
                    ?> <li class="breadcrumb-item"><a href="javascript:void(0)">Template
                            Manager</a></li>
                    <li class="breadcrumb-item active"><a href="javascript:void(0)">Message
                            Template Manager</a></li>
                    <?php
                       } else if( $type == "template" ){
                           ?>
                    <li class="breadcrumb-item"><a href="javascript:void(0)">Template Manager</a>
                    </li>
                    <li class="breadcrumb-item active"><a href="javascript:void(0)">Common Template
                            Manager</a></li>

                    <?php
                       }
               
               ?>
                </ol>
            </div>
        </div>

        <div class="email-template-content-section">
            <table class="table table-bordered table-striped" id="userTable" style="width: 100%;">
                <thead>
                    <tr class="table-client-row">
                        <th scope="col">ID</th>
                        <th scope="col">Name</th>
                        <th scope="col">Course</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>               
            </table>

            {{-- <nav aria-label="Page navigation example">
                <ul class="pagination justify-content-end">
                    <li class="page-item">
                        <a class="page-link" href="#">First</a>
                    </li>
                    <li class="page-item">
                        <a class="page-link" href="#">Previous</a>
                    </li>
                    <li class="page-item"><a class="page-link" href="#">1</a></li>
                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                    <li class="page-item">
                        <a class="page-link" href="#">Next</a>
                    </li>
                    <li class="page-item">
                        <a class="page-link" href="#">Last</a>
                    </li>
                </ul>
            </nav> --}}
        </div>
        <!-- row -->
    </div>

    <!--**********************************
        Content body end
    ***********************************-->
@endsection
@section('extra-script')
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
                ajax: "{{ route('templatemanager-help') }}",
                order: [[1, 'desc']],
                columns: [
                    
                    {
                        data: 'DT_RowIndex',
                     orderable: false,
                     searchable: false
                    },
                    {
                        data: 'name',
                        name: 'name',
                        // orderable: false,
                        // searchable: true
                    },
                    {
                        data: 'course',
                        name: 'course',
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
                   // $(row).find('td:eq(5)').addClass('group-i-icons');
                    SRS.Utils.dtAnchorToForm(row);
                }
            }).on('click', '.delete_action', function(e) {
                e.preventDefault();
                var $this = $(this);
                console.log($this.attr('data-id'));
                var url = '{{ route('course.destroy', ':id') }}';
                url = url.replace(':id', $this.attr('data-id'));
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                Swal.fire({
                    title: 'Are you sure?',
                    text: "You won't be able to revert this!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonText: 'Yes, delete it!',
                    customClass: {
                        confirmButton: 'btn btn-primary',
                        cancelButton: 'btn btn-outline-danger ml-3'
                    },
                    buttonsStyling: false
                }).then(function(result) {
                    if (result.value) {
                        $.ajax({
                            url: url,
                            type: "DELETE",
                            success: function(data) {
                                table.ajax.reload(null, false);
                            }
                        })
                    }
                });
            });

        });
    </script>
    <script src="{{ asset('vendor/raphael/raphael.min.js') }}"></script>
    <script src="{{ asset('vendor/morris/morris.min.js') }}"></script>
    <script src="{{ asset('js/plugins-init/morris-init.js') }}"></script>
@endsection
