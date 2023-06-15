@if ($message = Session::get('success'))

<script>
    iziToast.success({
        title: '{{ $message }}',
        position: "topRight",
   });
    setTimeout(function() {
        location.reload(true);
    }, 2500);
   
</script>

@endif

@if ($message = Session::get('error'))

<script>
    iziToast.error({
        title: '{{ $message }}',
        position: "topRight",
    });   
    setTimeout(function() {
        location.reload(true);
    }, 2500);
</script>

@endif

@if($errors->any())
<script>
    @foreach ($errors->all() as $error)
    iziToast.error({
        title: '{{ $error }}',
        position: "topRight",
    });
    @endforeach  
    setTimeout(function() {
        location.reload(true);
    }, 2500);      
</script>
@endif