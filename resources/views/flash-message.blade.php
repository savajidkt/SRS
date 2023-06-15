@if ($message = Session::get('success'))
<div class="alert-box">
    <strong>{{ $message }}</strong>
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>

@endif
<script type="text/javascript">
    // $( document ).ready(function() {
    // ('#payment_msg').addClass('hidden');
        // @if(Session::get('success') == 'Successfully Registered')
            // ('#payment_msg').removeClass('hidden');
            // jQuery( ".booksSc .alert-box" ).addClass( "active" );
            // <?php
            //     Session::forget('success');
            // ?>
            // setTimeout(function() {
            //     jQuery(".booksSc .alert-box").removeClass("active");
            //     // ('#payment_msg').addClass('hidden');
            //     location.reload(true);
            //     $(this).remove();
            // }, 4500);
            // window.location.reload('success');
        // @endif
    // });
    @if(Session::get('success') != '')
        jQuery( ".booksSc .alert-box" ).addClass( "active" );
        setTimeout(function() {
            jQuery(".booksSc .alert-box").removeClass("active");
            // location.reload(true);
            $(this).remove();
        }, 4500);
    @endif
</script>
