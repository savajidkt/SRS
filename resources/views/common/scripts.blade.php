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

<script>
var x, i, j, l, ll, selElmnt, a, b, c;
/*look for any elements with the class "customise-select":*/
x = document.getElementsByClassName("customise-select");
l = x.length;
for (i = 0; i < l; i++) {
  selElmnt = x[i].getElementsByTagName("select")[0];
  ll = selElmnt.length;
  /*for each element, create a new DIV that will act as the selected item:*/
  a = document.createElement("DIV");
  a.setAttribute("class", "select-selected");
  a.innerHTML = selElmnt.options[selElmnt.selectedIndex].innerHTML;
  x[i].appendChild(a);
  /*for each element, create a new DIV that will contain the option list:*/
  b = document.createElement("DIV");
  b.setAttribute("class", "select-items select-hide");
  for (j = 1; j < ll; j++) {
    /*for each option in the original select element,
    create a new DIV that will act as an option item:*/
    c = document.createElement("DIV");
    c.innerHTML = selElmnt.options[j].innerHTML;
    c.addEventListener("click", function(e) {
        /*when an item is clicked, update the original select box,
        and the selected item:*/
        var y, i, k, s, h, sl, yl;
        s = this.parentNode.parentNode.getElementsByTagName("select")[0];
        sl = s.length;
        h = this.parentNode.previousSibling;
        for (i = 0; i < sl; i++) {
          if (s.options[i].innerHTML == this.innerHTML) {
            s.selectedIndex = i;
            h.innerHTML = this.innerHTML;
            y = this.parentNode.getElementsByClassName("same-as-selected");
            yl = y.length;
            for (k = 0; k < yl; k++) {
              y[k].removeAttribute("class");
            }
            this.setAttribute("class", "same-as-selected");
            break;
          }
        }
        h.click();
    });
    b.appendChild(c);
  }
  x[i].appendChild(b);
  a.addEventListener("click", function(e) {
      /*when the select box is clicked, close any other select boxes,
      and open/close the current select box:*/
      e.stopPropagation();
      closeAllSelect(this);
      this.nextSibling.classList.toggle("select-hide");
      this.classList.toggle("select-arrow-active");
    });
}
function closeAllSelect(elmnt) {
  /*a function that will close all select boxes in the document,
  except the current select box:*/
  var x, y, i, xl, yl, arrNo = [];
  x = document.getElementsByClassName("select-items");
  y = document.getElementsByClassName("select-selected");
  xl = x.length;
  yl = y.length;
  for (i = 0; i < yl; i++) {
    if (elmnt == y[i]) {
      arrNo.push(i)
    } else {
      y[i].classList.remove("select-arrow-active");
    }
  }
  for (i = 0; i < xl; i++) {
    if (arrNo.indexOf(i)) {
      x[i].classList.add("select-hide");
    }
  }
}
/*if the user clicks anywhere outside the select box,
then close all select boxes:*/
document.addEventListener("click", closeAllSelect);
</script>



<script type="text/javascript">
  function startTime()
  {
      var today=new Date();
      //                   1    2    3    4    5    6    7    8    9   10    11  12   13   14   15   16   17   18   19   20   21   22   23   24   25   26   27   28   29   30   31   32   33
      var suffixes = ['','st','nd','rd','th','th','th','th','th','th','th','th','th','th','th','th','th','th','th','th','th','st','nd','rd','th','th','th','th','th','th','th','st','nd','rd'];

      var weekday = new Array(7);
      weekday[0] = "Sunday";
      weekday[1] = "Monday";
      weekday[2] = "Tuesday";
      weekday[3] = "Wednesday";
      weekday[4] = "Thursday";
      weekday[5] = "Friday";
      weekday[6] = "Saturday";

      var month = new Array(12);
      month[0] = "January";
      month[1] = "February";
      month[2] = "March";
      month[3] = "April";
      month[4] = "May";
      month[5] = "June";
      month[6] = "July";
      month[7] = "August";
      month[8] = "September";
      month[9] = "October";
      month[10] = "November";
      month[11] = "December";

      document.getElementById('demo').innerHTML=(weekday[today.getDay()] + ',' + " " + today.getDate()+'<sup>'+suffixes[today.getDate()]+'</sup>' + " " + month[today.getMonth()] + " " + today.getFullYear() + ' at ' + today.toLocaleTimeString());
      t=setTimeout(function(){startTime()},500);
  }
</script>



 