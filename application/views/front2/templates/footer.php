
<div class="snackbars" id="form-output-global"></div>
<script src="<?php echo base_url() ?>assets/assetsfront2/js/core.min.js"></script>
<script src="<?php echo base_url() ?>assets/assetsfront2/js/script.js"></script>
<script src="https://js.pusher.com/4.4/pusher.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.10.20/r-2.2.3/datatables.min.js"></script>

<script src="<?php echo base_url() ?>assets/assetsfront2/js/sweetalert.min.js"></script>
<!--coded by houdini-->
</body>

</html>

<script>
  // 2. This code loads the IFrame Player API code asynchronously.
  var tag = document.createElement('script');

  tag.src = "https://www.youtube.com/iframe_api";
  var firstScriptTag = document.getElementsByTagName('script')[0];
  firstScriptTag.parentNode.insertBefore(tag, firstScriptTag);

  // 3. This function creates an <iframe> (and YouTube player)
  //    after the API code downloads.
  var player;

  function onYouTubeIframeAPIReady() {
    player = new YT.Player('player', {
      width: '100%',
      videoId: 'mQ055hHdxbE',
      playerVars: {
        'autoplay': 1,
        'playsinline': 1,
        'rel': 0,
        'controls': 0,
        'showinfo': 0,
        'autohide': 1,
        'modestbranding': 1

      },
      events: {
        "onReady": onPlayerReady,
        'onStateChange': onPlayerStateChange
      },
    });
  }



  // 4. The API will call this function when the video player is ready.
  function onPlayerReady(event) {
    event.target.playVideo();
  }


  function LoadOnce() {
    window.location.reload();
  }

  // 5. The API calls this function when the player's state changes.
  //    The function indicates that when playing a video (state=1),
  //    the player should play for six seconds and then stop.
  var done = false;
  var p = document.getElementById("player");

  if (performance.navigation.type == 1) {
    // $(p).hide();
    window.location = "<?php echo base_url() ?>user";
  }


  var t = document.getElementById("thumbnail");
  t.src = "http://ecolinkvirtual.com/assets/assetsfront2/images/banner2.png";

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


  $(document).on('click', '.start-video', function() {
    $(this).hide();
    $("#player").show();
    $("#thumbnail_container").hide();
    player.playVideo();
  });

  $(document).on('click', '.thumbnail_container', function() {
    $(this).hide();
    $("#player").show();
    $(".start-video").hide();
    $("#thumbnail_container").hide();
    player.playVideo();
  });


  function stopVideo() {
    player.playVideo();
  }


  function playvideo() {
    player.playVideo();
  }

  function a() {
    player.playVideo();
  }


  $(document).ready(function() {
    //detect();
    chat();


    //detect browser
    function detect() {
      if (/Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent)) {} else {
        window.location = "<?php echo base_url() ?>user/front2";
      }
    }


    $('#useronline').DataTable();


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
          var count = 1;
          var A = Date.now()
          var i;
          for (i = 0; i < data.length; i++) {
            html += "<div class='media media-custom ml-auto mb-3'><div class='media-body'><p class='text-small text-white mb-0'>"+ data[i].name +"</p><div class='philips-color-custom rounded py-2 px-3 mb-2'><p class='text-small mb-0 text-white'>"+ data[i].isi+"</p></div></div></div>";
          }
          $('.chat').html(html);
        }
      })
    }

    var input = document.getElementById("isi");
    input.addEventListener("keyup", function(event) {
      if (event.keyCode === 13) {
        event.preventDefault();
        document.getElementById("btn-chat").click();
      }
    });

    // CREATE NEW Chat
    $('.btn-chat').on('click', function() {
      var name = $('.name').val();
      var isi = $('.isi').val();
      var kosong = isi.trim();
      if(kosong != ''){
        $('.isi').val("");
        $.ajax({
          url: '<?php echo site_url("user/create"); ?>',
          method: 'POST',
          data: {
            name: name,
            isi: isi
          },
          success: function() {
            console.log(name);
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
          url: "<?php echo base_url("user/action"); ?>",
          method: "POST",
          data: {
            action: action
          },
          success: function(data) {
            $('#user_login_status').html(data);
          }
        });
      }
      setInterval(function() {
        update_user_activity();
      }, 1000);


    <?php
    } else {
    ?>
      fetch_user_login_data();
      setInterval(function() {
        fetch_user_login_data();
      }, 1000);

      function fetch_user_login_data() {
        var action = "fetch_data";
        $.ajax({
          url: "<?php echo base_url("user/action"); ?>",
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

    var x = window.matchMedia("(max-width: 700px)")
    myFunction(x) // Call listener function at run time
    x.addListener(myFunction) // Attach listener function on state changes

  });
</script>