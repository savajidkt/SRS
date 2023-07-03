<script src="{{asset('vendor/global/global.min.js')}}"></script>
<script src="{{asset('js/quixnav-init.js')}}"></script>
<script src="{{asset('js/custom.min.js')}}"></script>
<script src="{{asset('js/sweetalert2.all.min.js')}}"></script>
<script src="{{ asset('js/sweet-alerts.js') }}"></script>
<script src="{{asset('js/srs.common.js')}}"></script>
<script src="{{ asset('izitoast/js/iziToast.min.js') }}"></script>

<script src="{{asset('vendor/js/tables/datatable/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('vendor/js/tables/datatable/datatables.bootstrap4.min.js')}}"></script>
<script src="{{asset('vendor/js/tables/datatable/dataTables.responsive.min.js')}}"></script>
<script src="{{asset('vendor/js/tables/datatable/responsive.bootstrap4.js')}}"></script>
<script src="{{asset('vendor/js/tables/datatable/datatables.buttons.min.js')}}"></script>
<script src="{{asset('vendor/js/tables/datatable/buttons.bootstrap4.min.js')}}"></script>

<script src="{{asset('select/js/form-select2.js')}}"></script>
<script src="{{asset('select/js/select2.full.min.js')}}"></script>
<script>
	var sidebar = document.getElementById("main-wrapper")

	function updateSize() {
	 
	  if (window.innerWidth < 992) {


	sidebar.classList.add("menu-toggle")
	}else{

	  sidebar.classList.remove("menu-toggle")
	  }

	}

	updateSize();
	window.addEventListener("resize", updateSize);
</script>
 