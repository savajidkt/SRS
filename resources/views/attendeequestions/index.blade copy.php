@extends('layouts.app')
@section('page_title', 'SRS')
@section('content')
    <style>
        #userTable_filter label {
            display: inline-flex;
        }
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
                    <li class="breadcrumb-item active"><a href="javascript:void(0)">Attendee Questions</a></li>
                </ol>
            </div>
        </div>
        <!-- <div class="col-xl-12 col-xxl-12"> -->
        <div class="influencing-question-customise-content">
            <select id="customFilter" name="category_id" class="form-control custom-cls" onchange="filterQuestion(this.value)">
                <option value="">Select Category</option>
                <option value="1">Emotive</option>
                <option value="2">Assertive</option>
                <option value="3">Persuasive</option>
                <option value="4">Listening</option>
                <option value="5">Trusting</option>
                <option value="6">Inspiring</option>
                <option value="7">Knowing Self</option>
            </select>
            <table id="datatable_example" class="responsive table table-striped table-bordered" style="margin-bottom:0; ">
                <thead>
                    <tr>
                        <th width=10%>ID</th>
                        <th>Question</th>
                        <th width=10%>Actions</th>
                    </tr>
                </thead>
                <tbody>
                </tbody>
            </table>
        </div>
    </div>




    <!--**********************************
                Content body end
            ***********************************-->
@endsection
@section('extra-script')

    <script src="{{ asset('vendor/select2/js/select2.full.min.js') }}"></script>
    <script src="{{ asset('js/plugins-init/select2-init.js') }}"></script>
    <script src="https://srs-reporting.co.uk/js/plugins/datatables/js/jquery.dataTables.js"></script>
    <script src="https://srs-reporting.co.uk/js/plugins/datatables/js/jquery.dataTables.columnFilter.js"></script>
    <script type="text/javascript">
        /**** Specific JS for this page ****/
        // Datatables
        var dTable;
        $(document).ready(function() {

            var myRoutesJs = {
                getquestions_attendees_url: "{!! route('getquestions-attendees','') !!}",
            };
            

            var dontSort = [];
            $('#datatable_example thead th').each(function() {
                if ($(this).hasClass('no_sort')) {
                    dontSort.push({
                        "bSortable": false
                    });
                } else {
                    dontSort.push(null);
                }
            });
            dTable = $('#datatable_example').dataTable({
                "sDom": "<'row-fluid table_top_bar'<'span12'<'to_hide_phone' f>>>t<'row-fluid control-group full top' <'span4 to_hide_tablet'l><'span8 pagination'p>>",
                "aaSorting": [],
                "bPaginate": true,

                "sAjaxSource": myRoutesJs.getquestions_attendees_url,
                "sPaginationType": "full_numbers",
                "bJQueryUI": false,
                "aoColumns": dontSort
            });


            $('.dataTables_filter').hide();
            $('.dataTables_length select').css('width', '57px');
            $('.dataTables_length select').css('margin-bottom', '0px');


        });

        function filterQuestion(course) {

            var myRoutesJs = {
                getquestions_attendees_url: "{!! route('getquestions-attendees','') !!}",
            };

            RefreshTable("#datatable_example", myRoutesJs.getquestions_attendees_url+"/" + course);
            //RefreshTable("#datatable_example", "./getAttendeeQuestions.php?c=&sSearch=" + course);
        }

        function RefreshTable(tableId, urlData) {

            //Retrieve the new data with $.getJSON. You could use it ajax too
            $.getJSON(urlData, null, function(json) {
                table = $(tableId).dataTable();
                oSettings = table.fnSettings();

                table.fnClearTable(this);

                for (var i = 0; i < json.aaData.length; i++) {
                    table.oApi._fnAddData(oSettings, json.aaData[i]);
                }

                oSettings.aiDisplay = oSettings.aiDisplayMaster.slice();
                table.fnDraw();
            });
        }        
    </script>
@endsection
