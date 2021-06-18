<!-- Bootstrap core JavaScript-->
<script src="<?= base_url('assets/'); ?>vendor/jquery/jquery.min.js"></script>
<script src="<?= base_url('assets/'); ?>vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Core plugin JavaScript-->
<script src="<?= base_url('assets/'); ?>vendor/jquery-easing/jquery.easing.min.js"></script>

<!-- Custom scripts for all pages-->
<script src="<?= base_url('assets/'); ?>js/sb-admin-2.min.js"></script>

<script src="https://js.pusher.com/4.4/pusher.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

</body>

</html> 
<script>

    
    $(document).ready(function() {


    chat();
    
    $("html").animate({
       scrollTop: 20000 
    });
    
    // Enable pusher logging - don't include this in production
    Pusher.logToConsole = true;

    var pusher = new Pusher('aafd7f1d2116df4df74f', {
      cluster: 'ap1',
      forceTLS: true
    });

    var channel = pusher.subscribe('my-channel');
    channel.bind('my-event', function(data) {
      if (data.message === 'success') {
        chat();
      }
    });

    // FUNCTION SHOW PRODUCT
    function chat() {
      $("#scrollbar1").animate({ 
      scrollTop: 2000000
      }, 2000);
      $.ajax({
        url: '<?php echo base_url()?>user/get_product',
        type: 'GET',
        async: true,
        dataType: 'json',
        success: function(data) {
          var html = '';
          var count = 1;
          var A = Date.now()
          var i;
          for (i = 0; i < data.length; i++) {
            html += "<li class='left clearfix'><span class='chat-img pull-left'> </span> <div class='chat-body clearfix'><div class='header'><strong class='primary-font' style='font-family:centraleregular;color:white'>" + data[i].nama + "</strong> <small class='pull-right text-muted'> <span class='glyphicon glyphicon-time'></span> </small></div><p style='font-family:centraleregular;;color:white'>" + data[i].isi + "</p></div></li>";
          }
          $('.chat').html(html);
            $("html").animate({
               scrollTop: 20000000 
            });
        }

      });
    }
    
    });

</script>
