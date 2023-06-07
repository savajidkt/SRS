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
          <th scope="col">Company Name</th>
          <th scope="col">Post Code</th>
          <th scope="col">Contact</th>
          <th scope="col">Action</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <th scope="row">1</th>
          <td>Moonraker Development Services Limited</td>
          <td>B14 7QD</td>
          <td>Yvette Elcock</td>
          <td class="group-i-icons">
              <a href="./chart-flot.html">
              <i class="fa-regular fa-pen-to-square edit-ico" title="Edit"></i>
          </a>
              <a href="./form-element.html">
              <i class="fa-solid fa-eye" title="View"></i>
          </a>
          <a href="#" onclick="myFunction()" class="remove" title="Remove">
              <i class="fa-sharp fa-solid fa-xmark" id="demo"></i>
          </a>
          </td>
        </tr>
        <tr>
          <th scope="row">2</th>
          <td>Renewable Energy Systems Limited</td>
          <td>WD4 8LR</td>
          <td>Megan Grace</td>
          <td class="group-i-icons">
              <a href="./chart-flot.html"><i class="fa-regular fa-pen-to-square edit-ico" title="Edit"></i>
              </a>
              <a href="./form-element.html">
              <i class="fa-solid fa-eye" title="View"></i>
          </a>
          <a href="#" onclick="myFunction()" class="remove" title="Remove">
              <i class="fa-sharp fa-solid fa-xmark" title="Remove"></i>
          </a>
          </td>
        </tr>
        <tr>
          <th scope="row">3</th>
          <td>Thorntons PLC</td>
          <td>DE55 4XJ</td>
          <td>Emily Campbell</td>
          <td class="group-i-icons">
              <a href="./chart-flot.html">
              <i class="fa-regular fa-pen-to-square edit-ico" title="Edit"></i>
                  </a>
              <i class="fa-solid fa-eye" title="View"></i>
              <a href="#" onclick="myFunction()" class="remove" title="Remove">
              <i class="fa-sharp fa-solid fa-xmark" title="Remove"></i>
              </a>
          </td>
        </tr>
        <tr>
          <th scope="row">4</th>
          <td>Arup</td>
          <td>W1T 4BQ</td>
          <td>Philippa Hadfield</td>
          <td class="group-i-icons">
              <a href="./chart-flot.html">
              <i class="fa-regular fa-pen-to-square edit-ico" title="Edit"></i>
              </a>
              <i class="fa-solid fa-eye" title="View"></i>
              <a href="#" onclick="myFunction()" class="remove" title="Remove">
              <i class="fa-sharp fa-solid fa-xmark" title="Remove"></i>
              </a>
          </td>
        </tr>
        <tr>
          <th scope="row">5</th>
          <td colspan="2">SRS the Development Team Ltd</td>
          <td>Sue Mattingley</td>
          <td class="group-i-icons">
              <a href="./chart-flot.html">
              <i class="fa-regular fa-pen-to-square edit-ico" title="Edit"></i>
              </a>
              <i class="fa-solid fa-eye" title="View"></i>
              <a href="#" onclick="myFunction()" class="remove" title="Remove">
              <i class="fa-sharp fa-solid fa-xmark" title="Remove"></i>
              </a>
          </td>
        </tr>
        <tr>
          <th scope="row">6</th>
          <td>Debenhams</td>
          <td>NW1 3DS</td>
          <td>Angela Onissi</td>
          <td class="group-i-icons">
              <a href="./chart-flot.html">
              <i class="fa-regular fa-pen-to-square edit-ico" title="Edit"></i>
              </a>
              <i class="fa-solid fa-eye" title="View"></i>
              <a href="#" onclick="myFunction()" class="remove" title="Remove">
              <i class="fa-sharp fa-solid fa-xmark" title="Remove"></i>
              </a>
          </td>
        </tr>
        <tr>
          <th scope="row">7</th>
          <td colspan="2">Oliver Marketing</td>
          <td>Sue Mattingley</td>
          <td class="group-i-icons">
              <a href="./chart-flot.html">
              <i class="fa-regular fa-pen-to-square edit-ico" title="Edit"></i>
              </a>
              <i class="fa-solid fa-eye" title="View"></i> 
              <a href="#" onclick="myFunction()" class="remove" title="Remove">
              <i class="fa-sharp fa-solid fa-xmark" title="Remove"></i>
              </a>
          </td>
        </tr>
        <tr>
          <th scope="row">8</th>
          <td colspan="2">C and C Group plc</td>
          <td>Emily Bayne</td>
          <td class="group-i-icons">
              <a href="./chart-flot.html">
              <i class="fa-regular fa-pen-to-square edit-ico" title="Edit"></i>
              </a> 
              <i class="fa-solid fa-eye" title="View"></i>
              <a href="#" onclick="myFunction()" class="remove" title="Remove">
              <i class="fa-sharp fa-solid fa-xmark" title="Remove"></i>
              </a>
          </td>
        </tr>
        <tr>
          <th scope="row">9</th>
          <td colspan="2">Fred Perry</td>
          <td>Cathy Bonner</td>
          <td class="group-i-icons">
              <a href="./chart-flot.html">
              <i class="fa-regular fa-pen-to-square edit-ico" title="Edit"></i>
              </a>
              <i class="fa-solid fa-eye" title="View"></i>
              <a href="#" onclick="myFunction()" class="remove" title="Remove">
              <i class="fa-sharp fa-solid fa-xmark" title="Remove"></i>
              </a>
          </td>
        </tr>
        <tr>
          <th scope="row">10</th>
          <td>Trapeze</td>
          <td colspan="2">BA14 6PH</td>
          <td class="group-i-icons">
              <a href="./chart-flot.html">
              <i class="fa-regular fa-pen-to-square edit-ico" title="Edit"></i>
              </a>
              <i class="fa-solid fa-eye" title="View"></i>
              <a href="#" onclick="myFunction()" class="remove" title="Remove">
              <i class="fa-sharp fa-solid fa-xmark" title="Remove"></i>
              </a>
          </td>
        </tr>
        <tr>
          <th scope="row">11</th>
          <td>CDA TEST 2</td>
          <td>SG4 0AP</td>
          <td>Stuart Alldis</td>
          <td class="group-i-icons">
              <a href="./chart-flot.html">
              <i class="fa-regular fa-pen-to-square edit-ico" title="Edit"></i>
              </a>
              <a href="./client_view_courses.html">
              <i class="fa-solid fa-eye" title="View"></i>
          </a>
              <a href="#" onclick="myFunction()" class="remove" title="Remove">
              <i class="fa-sharp fa-solid fa-xmark" title="Remove"></i>
              </a>
          </td>
        </tr>
      </tbody>
    </table>

    <nav aria-label="Page navigation example">
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
    </nav>
  </div>

  <!-- row -->
</div>




<!--**********************************
    Content body end
***********************************-->
@endsection
@section('extra-script')
<script>
    function myFunction() {
      let text = "Are you sure you want to delete this Client";
      if (confirm(text) == true) {
        alert("Client has been deleted Successfully");
        text="";
      } else {
        text = "";
      }
      document.getElementById("demo").innerHTML = text;
    }
</script>
<script src="{{asset('vendor/raphael/raphael.min.js')}}"></script>
<script src="{{asset('vendor/morris/morris.min.js')}}"></script>
<script src="{{asset('js/plugins-init/morris-init.js')}}"></script>
@endsection