<footer class="section footer-classic bg-default">
  <div class="container">
    <div class="row row-15">
      <div class="col-sm-6">
        <p class="rights"><span>  <p id="demo" style="display:none"></p>
        </p>
      </div>
      <div class="col-sm-6">
        <div class="footer-contact"><a href="contacts.html">
        </div>
      </div>
    </div>
</footer>
</div>
<div class="snackbars" id="form-output-global"></div>
<script src="<?php echo base_url() ?>assets/assetsfront3/js/core.min.js"></script>
<script src="<?php echo base_url() ?>assets/assetsfront3/js/script.js"></script>
<script src="https://js.pusher.com/4.4/pusher.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.10.20/r-2.2.3/datatables.min.js"></script>

<script src="<?php echo base_url() ?>assets/assetsfront3/js/sweetalert.min.js"></script>
<!--coded by houdini-->
</body>

</html>



<script>

// Set the date we're counting down to
var countDownDate = new Date("Apr 29, 2020 16:00:00").getTime();

// Update the count down every 1 second
var x = setInterval(function() {

  // Get today's date and time
  var now = new Date().getTime();

  // Find the distance between now and the count down date
  var distance = countDownDate - now;

  // Time calculations for days, hours, minutes and seconds
  var days = Math.floor(distance / (1000 * 60 * 60 * 24));
  var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
  var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
  var seconds = Math.floor((distance % (1000 * 60)) / 1000);

  // Display the result in the element with id="demo"
  document.getElementById("demo").innerHTML = days + "d " + hours + "h "
  + minutes + "m " + seconds + "s ";

  // If the count down is finished, write some text
  if (distance < 0) {
    window.location.reload();
    clearInterval(x);
  }
}, 1000);


  $(document).ready(function() {
    chat();
    
      
    function timeSince(date) {
    
      var seconds = Math.floor((new Date() - date) / 1000);
    
      var interval = Math.floor(seconds / 31536000);
    
      if (interval > 1) {
        return interval + " Years Ago";
      }
      interval = Math.floor(seconds / 2592000);
      if (interval > 1) {
        return interval + " Months Ago";
      }
      interval = Math.floor(seconds / 86400);
      if (interval > 1) {
        return interval + " Days Ago";
      }
      interval = Math.floor(seconds / 3600);
      if (interval > 1) {
        return interval + " Hours Ago";
      }
      interval = Math.floor(seconds / 60);
      if (interval > 1) {
        return interval + " Minutes Ago";
      }
      return Math.floor(seconds) + " Seconds Ago";
    }
         

    // Enable pusher logging - don't include this in production
    Pusher.logToConsole = true;

    var pusher = new Pusher('7f77145cfef9f51109fe', {
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
      $("html").animate({ 
      scrollTop: 2000000
      }, 2000);
      $.ajax({
        url: '<?php echo base_url("user/get_product"); ?>',
        type: 'GET',
        async: true,
        dataType: 'json',
        success: function(data) {
          var html = '';
          var count = 1;
          var A = Date.now()
          var i;
          var tgl;
          
       
     
            var aDay = 24*60*60*1000;
          for (i = 0; i < data.length; i++) {
     
                  
            html +=  "<div class='inlineContainer'><img class='inlineIcon' src=''><div class='otherBubble other' style='word-wrap: break-word;'>"+"<h2 style='color:white'><b>"+data[i].nama+"</b></h2><h3 style='color:white'>"+data[i].isi+"</h3></div></div><span class='other'></span>";
    
          }
          $('.chat').html(html);
        }

      });
    }
    
    $("html").animate({ 
      scrollTop: 2000000
      }, 2000);
    
     

    // CREATE NEW PRODUCT
    $('.btn-chat').on('click', function() {
      var nama = $('.nama').val();
      var isi = $('.isi').val();
      var kosong = isi.trim();
      if(kosong != ''){
        $.ajax({
          url: '<?php echo site_url("user/create"); ?>',
          method: 'POST',
          data: {
            nama: nama,
            isi: isi
          },
          success: function() {
            $('.isi').val("");
          }
        });
      }
    });
    
    // END CREATE PRODUCT
    <?php
    if ($user['role_id'] != '1') {
    ?>

      function update_user_activity() {
        var action = 'update_time';
        $.ajax({
          url: "action",
          method: "POST",
          data: {
            action: action
          },
          success: function(data) {

          }
        });
      }
      setInterval(function() {
        update_user_activity();
      }, 3000);


    <?php
    } else {
    ?>
      fetch_user_login_data();
      setInterval(function() {
        fetch_user_login_data();
      }, 3000);

      function fetch_user_login_data() {
        var action = "fetch_data";
        $.ajax({
          url: "action",
          method: "POST",
          data: {
            action: action
          },
          success: function(data) {
            $('#user_login_status').html(data);
          }
        });
      }
    <?php
    }
    ?>

    $('.add_cart').click(function() {
      var produk_id = $(this).data("produkid");
      var produk_nama = $(this).data("produknama");
      var produk_harga = $(this).data("produkharga");
      var quantity = $('#' + produk_id).val();
      $.ajax({
        url: "<?php echo base_url(); ?>user/add_to_cart",
        method: "POST",
        data: {
          produk_id: produk_id,
          produk_nama: produk_nama,
          produk_harga: produk_harga,
          quantity: quantity
        },
        success: function(data) {
          $('#detail_cart').html(data);
        }
      });
    });

    // Load shopping cart
    $('#detail_cart').load("<?php echo base_url(); ?>user/load_cart");

    //Hapus Item Cart
    $(document).on('click', '.hapus_cart', function() {
      var row_id = $(this).attr("id"); //mengambil row_id dari artibut id
      $.ajax({
        url: "<?php echo base_url(); ?>user/hapus_cart",
        method: "POST",
        data: {
          row_id: row_id
        },
        success: function(data) {
          $('#detail_cart').html(data);
        }
      });
    });

  });
</script>