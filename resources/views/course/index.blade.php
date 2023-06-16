@extends('layouts.app')
@section('page_title','SRS')
@section('content')
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
              <li class="breadcrumb-item"><a href="javascript:void(0)">Client Management</a></li>
              <li class="breadcrumb-item active"><a href="./chart-morris.html">View Clients</a></li>
          </ol>
      </div>
  </div>

  <div class="col-xl-12 col-xxl-12">
  <table class="table">
      <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Course Name</th>
            <th scope="col">Course Date</th>
            <th scope="col">Course Duration</th>
            <th scope="col">Client</th>
            <th scope="col">Actions</th>
        </tr>
      </thead>
    </table>

    <!-- <nav aria-label="Page navigation example">
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
    </nav> -->
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
            ajax: "{{ route('course.index') }}",
            columns: [{
                    data: 'DT_RowIndex',
                    name: 'id',
                    orderable: false,
                    searchable: true
                },
                {
                    data: 'course_category_id',
                    name: 'course_category_id',
                    orderable: false,
                    searchable: true
                },
                {
                    data: 'start_date',
                    name: 'start_date',
                    orderable: false,
                    searchable: true
                },       
                {
                    data: 'duration',
                    name: 'duration',
                    orderable: false,
                    searchable: true
                },   
                {
                    data: 'client_id',
                    name: 'client_id',
                    orderable: false,
                    searchable: true
                },      
                {
                    data: 'action',
                    name: 'action',
                    orderable: false,
                    searchable: false
                },
            ],
            "createdRow": function(row, data, dataIndex) {
                $( row ).find('td:eq(5)').addClass('group-i-icons');
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
                    cancelButton: 'btn btn-outline-danger ml-3'
                },
                buttonsStyling: false
            }).then(function(result) {
                if (result.value) {
                    $this.find("form").trigger('submit');
                }
            });
        });

    });
</script>
<script src="{{asset('vendor/raphael/raphael.min.js')}}"></script>
<script src="{{asset('vendor/morris/morris.min.js')}}"></script>
<script src="{{asset('js/plugins-init/morris-init.js')}}"></script>
@endsection