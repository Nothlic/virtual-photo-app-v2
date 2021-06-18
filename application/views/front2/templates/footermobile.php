
</div>

<footer class="footer philips-color-custom">
  <div class="container-fluid">
    <div class="d-flex flex-row justfy-content-between">
      <div class="p-3 w-100">
        <span class="text-white footer-font-res">Masukkan konfigurasi desain Anda di <b>www.tailored.lighting.philips.com</b></span>
      </div>
      <div class="flex-shrink-1 padding-logo-custom">
        <img src="<?php echo base_url() ?>assets/assetsfront2/images/faviconwhite.png" style="width:40px;">
      </div>
    </div>
  </div>
</footer>

<script src="<?php echo base_url() ?>assets/assetsfront2/js/core.min.js"></script>
<script src="<?php echo base_url() ?>assets/assetsfront2/js/script.js"></script>

<script src="https://js.pusher.com/4.4/pusher.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
<script src="<?php echo base_url() ?>assets/assetsfront2/js/sweetalert.min.js"></script>
<!--coded by houdini-->
</body>

</html>

<script>
  //ini youtube
    // 1. This code loads the IFrame Player API code asynchronously.
    var tag = document.createElement('script');

    tag.src = "https://www.youtube.com/iframe_api";
    var firstScriptTag = document.getElementsByTagName('script')[0];
    firstScriptTag.parentNode.insertBefore(tag, firstScriptTag);

    // 2. This function creates an <iframe> (and YouTube player)
    //    after the API code downloads.
    var player;

    function onYouTubeIframeAPIReady() {
      player = new YT.Player('player', {
        height: '100%',
        width: '100%',
        playerVars: {
          autoplay: 1,
          loop: 1,
          controls: 0,
          showinfo: 0,
          autohide: 1,
          modestbranding: 1,
          vq: 'hd1080'
        },
      videoId: 'a',
        events: {
          'onReady': onPlayerReady,
          'onStateChange': onPlayerStateChange
        }
      });
    }

    // 3. The API will call this function when the video player is ready.
    function onPlayerReady(event) {
      event.target.playVideo();
      // player.mute();
    }

    var done = false;
    if (performance.navigation.type == 1) {
    // $(p).hide();
      window.location = "<?php echo base_url(); ?>user/front2";
    }

    function onPlayerStateChange(event) {
        if (event.data == YT.PlayerState.ENDED) {
        $('.start-video').fadeIn('normal');
    }
      switch (event.data) {
        case YT.PlayerState.UNSTARTED:
          break;
        case YT.PlayerState.ENDED:
          console.log('ended');
          break;
        case YT.PlayerState.PLAYING:
          console.log('playing');
          break;
        case YT.PlayerState.PAUSED:
          location.reload();
          break;
        case YT.PlayerState.BUFFERING:
          break;
        case YT.PlayerState.CUED:
          console.log('video cued');
          break;
      }
    }
    function stopVideo() {
      player.stopVideo();
    }



  $(document).ready(function() {
    // detect();
    chat();

 

    //detect browser
    function detect() {
      if (/Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent)) {
        window.location = "<?php echo base_url(); ?>user";
      } else {
      }
    }

    



    $("html").animate({
      scrollTop: -20000
    });
    $("#scrollbar").animate({
      scrollTop: 2000000
    }, 2000);


    
    // Enable pusher logging - don't include this in production
    Pusher.logToConsole = true;
  
    var pusher = new Pusher('4989a359f9bcaf8f0e4e', {
      cluster: 'ap1',
      forceTLS: true
    });

    var channel = pusher.subscribe('my-channel');
    channel.bind('my-event', function(data) {
      if (data.message === 'success') {
        chat();
      }
    });


    function chat() {
      $("#scrollbar").animate({
        scrollTop:20000
      },2000);

      $.ajax({
        url: "<?php echo base_url()?>user/get_product",
        type: "GET",
        async: true,
        dataType: 'json',
        success : function(data) {
          var html = '';
          var id = "<?php echo $user['id'] ?>";
          var count = 1;
          var A = Date.now()
          var i;
          for (i = 0; i < data.length; i++) {
            if(data[i].idUser == id){
              html += "<div class='media media-custom ml-auto mb-3'><div class='media-body'><p class='text-small text-white mb-0' style='text-align:right'>"+ data[i].name+ ' :' +"</p><div class='philips-color-custom rounded mb-2'><p class='text-small mb-0 text-white' style='text-align:right;display: inline-block;word-break: break-word;float: right;'>"+ data[i].isi+"</p></div></div></div>";
            }else {
              html += "<div class='media media-custom mb-3'><div class='media-body'><p class='text-small text-white mb-0'  style='text-align:left;'>"+ data[i].name+ ' :' +"</p><div class='philips-color-custom rounded mb-2'><p class='text-small mb-0 text-white' style='text-align:left;display: inline-block;word-break: break-word;float: left;'>"+ data[i].isi+"</p></div></div></div>";
            }
          }
          $('.chat').html(html);
        }
      })
    }



    // var input = document.getElementById("isi");
    // input.addEventListener("keyup", function(event) {
    //   if (event.keyCode === 13) {
    //     event.preventDefault();
    //     document.getElementById("btn-chat").click();
    //   }
    // });


    // CREATE NEW Chat
    $(".btn-chat").on("click", function() {
      var idUser = $('.idUser').val();
      var name = $('.name').val();
      var isi = $('.isi').val();
      var kosong = isi.trim();
      if(kosong != ''){
        $('.isi').val("");
        $.ajax({
          url: '<?php echo site_url("user/create"); ?>',
          method: 'POST',
          data: {
            idUser: idUser,
            name: name,
            isi: isi
          },
          success: function() { 
            
          }
        });
      }
    });

    $(".a").on("click", function(){
      alert("The paragraph was clicked.");
    });

      // CREATE NEW Chat mobile
      $(".btn-chat-mobile").on("click", function() {
      var idUser = $('.idUserMobile').val();
      var name = $('.nameMobile').val();
      var isi = $('.isiMobile').val();
      var kosongsekali = isi.trim();
      if(kosongsekali != ''){
        $('.isiMobile').val("");
        $.ajax({
          url: '<?php echo site_url("user/create"); ?>',
          method: 'POST',
          data: {
            idUser: idUser,
            name: name,
            isi: isi
          },
          success: function() { 
            
          }
        });
      }
    });


    // END CREATE Chat
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



  });
</script>