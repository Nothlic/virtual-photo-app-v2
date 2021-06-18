<style>
    
    @font-face {
	font-family: 'Gotham';
	src: url('assets/assetsfront2/fonts/Gotham Medium.eot');
	src: url('assets/assetsfront2/fonts/Gotham Medium.eot?#iefix') format('embedded-opentype'),
		url('Gotham-Bold.ttf') format('truetype');
	font-weight: 300;
	font-style: normal;
 }

</style>

<div class="container">

    <!-- Outer Row -->
    <div class="row justify-content-center">

        <div class="col-lg-6">

            <div class="card o-hidden border-0 shadow-lg my-5">
                <div class="card-body p-0">
                    <!-- Nested Row within Card Body -->
                    <div class="row">
                        <div class="col-lg">
                            <div class="p-5">
                                <div class="text-center">
                                    <img src="<?php echo base_url() ?>assets/assetsfront2/images/logo.png" class="img-fluid" alt="Responsive image" style="height:50%;width:50%"><br>
                                    <h5 class="mt-2" style="font-family:Gotham">Selamat Datang</h5>
                                      <!--   <p style="font-family:Gotham"><center>Acara akan dimulai dalam </center></p>
                                    
                                    <p id="demoa" style="font-family:Gotham"></p>
                                    <p style="font-family:Gotham"><center>Ketika Anda sudah memasuki halaman Virtual Gathering, <br>Jangan lupa menekan tombol play pada video.</center></p>
   
                                <p><center>Masukkan kode unik Anda<br>
                                        yang terdaftar pada undangan, no HP<br>
                                        serta alamat email Anda.</center></p> -->
                                        
                                        <!--youtube-->
                                        <!--
                                        <div id="IframeWrapper" style="position: relative;">
<iframe width="560" height="315" src="https://www.youtube.com/embed/diT3gZxQsnk?autoplay=1&controls=0&loop=1&modestbranding=1&rel=0&playsinline=1&showinfo=0" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>



    <div id="iframeBlocker" style="position:absolute; top: 0; left: 0; width:95%; height:95%;background-color:aliceblue;opacity:0.1;"></div>
    </div>
    
                                        
                                        
                                        -->
                                        
                                       <!-- <video width="100%" loop controls autoplay>
                                          <source src="<?php echo base_url() ?>assets/assetsfront2/video/bumper.mp4?autoplay=1" type="video/mp4">
                                          <source src="movie.ogg" type="video/ogg">
                                          Your browser does not support the video tag.
                                        </video>-->
                                        
                                        
                                        <div id="IframeWrapper" style="position: relative;">
                                  <div class="embed-responsive embed-responsive-16by9">
                                       <!-- <iframe width="460" height="315" src="https://www.youtube.com/embed/diT3gZxQsnk?autoplay=1&showinfo=0&controls=0&loop=1" class="embed-responsive-item" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>-->
                                         <div id="player"></div>
    <div id="iframeBlocker" style="position:absolute; top: 0; left: 0; width:95%; height:95%;background-color:transparent;opacity:0.1;"></div>
                                    </div>
                                    </div>
               
                                    <img src="<?php echo base_url() ?>assets/assetsfront2/images/footer.png" class="img-fluid" alt="Responsive image" style="height:80%;width:80%"><br>
                                </div>


                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>

</div>


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
      videoId: 'diT3gZxQsnk',
      playerVars: { 
          'autoplay': 1, 
          'playsinline': 1,
          'rel':0,
          'controls':0,
          'showinfo':0,
          'autohide':1,
          'loop':1,
          'modestbranding': 1,
           'fs': 0,
 
      },
      events: {
        "onReady":onPlayerReady,
        'onStateChange': onPlayerStateChange
      },
    });
  }

  // 4. The API will call this function when the video player is ready.
  function onPlayerReady(event) {
    event.target.playVideo();
  }

  // 5. The API calls this function when the player's state changes.
  //    The function indicates that when playing a video (state=1),
  //    the player should play for six seconds and then stop.
  var done = false;
  function onPlayerStateChange(event) {

    
    if (event.data === YT.PlayerState.ENDED) {
            player.playVideo(); 
        }
  }
  function stopVideo() {
    player.stopVideo();
  }
    
    var countDownDate = new Date("Apr 28, 2020 13:52:00").getTime();

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
    
  // Output the result in an element with id="demo"
  document.getElementById("demoa").innerHTML = minutes + " Menit " + seconds + " Detik ";
    
  // If the count down is over, write some text 
  if (distance < 0) {
      
    clearInterval(x);
    
    document.getElementById("demoa").innerHTML = "Event Start";

      cache_clear()


    function cache_clear() {
      window.location.reload(true);
      // window.location.reload(); use this if you do not remove cache
    }

    
    
  }
}, 1000);
</script>