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
                <li class="breadcrumb-item"><a href="javascript:void(0)">Influencing Questions</a></li>
                <li class="breadcrumb-item active"><a href="javascript:void(0)">360 Questions</a></li>
            </ol>
        </div>
    </div>
    <!-- <div class="col-xl-12 col-xxl-12"> -->
    <div class="card">
        <div class="card-header attendee-home-lgt attendee-bg-clr">
            <strong>INFLUENCING COURSE - 360 Questions </strong>
            <div class="form-group text-font-clr">
            <label class="text-label text-font-clr">Filter By:</label>
            <select class="" name="category_id" id="category_id" aria-label=".form-select-sm example" onchange="questionSearch()">
                <option value="" selected>Select Category</option>
                <option value="1">Emotive</option>
                <option value="2">Assertive</option>
                <option value="3">Persuasive</option>
                <option value="4">Listening</option>
                <option value="5">Trusting</option>
                <option value="6">Inspiring</option>
                <option value="7">Knowing Self</option>
            </select>
            </div>
        </div>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Question</th>
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

<script src="{{asset('vendor/select2/js/select2.full.min.js')}}"></script>
<script src="{{asset('js/plugins-init/select2-init.js')}}"></script>
<script type="text/javascript">
    $(function() {
        var table = $('.table').DataTable({

            processing: true,
            serverSide: true,
            searching: false,
            
            // dom: '<"top"i>rt<"bottom"flp><"clear">',
            ajax: {
                url: "{{ route('questions.index') }}",
                data: function (d) {
                    d.category_id = $('#category_id').val();
                }
            },
            columns: [{
                    data: 'DT_RowIndex',
                    name: 'id',
                    orderable: false,
                    searchable: true
                },
                {
                    data: 'question',
                    name: 'question',
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
                $( row ).find('td:eq(3)').addClass('group-i-icons');
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

    });

    function questionSearch()
    {
        $('.table').DataTable().ajax.reload();
    }

</script>
@endsection