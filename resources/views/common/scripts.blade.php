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
		var ham = document.getElementsByClassName("hamburger")


	function updateSize() {
// 	 var x = localStorage.getItem("showsidebar");
	  if (window.innerWidth < 992) {


	sidebar.classList.add("hide_sidebar")
		sidebar.classList.remove("show_sidebar")
		var mob = localStorage.getItem("mobile");
		console.log(mob)
		if(mob === "mobile")
		{

		    		sidebar.classList.remove("menu-toggle")
		    				    localStorage.removeItem("mobile");
		    				    			localStorage.setItem("desktop", "desktop");
		}
		else{
		    
		}
		
	

// 	localStorage.removeItem("showsidebar");
// 	  localStorage.setItem("showsidebar", true);
	
	}else{

	  sidebar.classList.remove("hide_sidebar")
	sidebar.classList.add("show_sidebar")
			localStorage.setItem("mobile", "mobile");
				var desk = localStorage.getItem("desktop");
		console.log(mob)
		if(desk === "desktop")
		{

		    		sidebar.classList.remove("menu-toggle")
		    				    localStorage.removeItem("desktop");
		    				    		
		}
		else{
		    
		}
			
	  }

	}

	updateSize();
	window.addEventListener("resize", updateSize);
	
	
	jQuery(function ($) {
    jQuery(document).ready(function () {
        	  if (window.innerWidth < 992) {
        	      	sidebar.classList.remove("menu-toggle")
        	      
        	  }
    })
	})
       
</script>
 