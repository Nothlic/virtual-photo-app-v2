<style>
    body {
        background: linear-gradient(-45deg, #ee7752, #e73c7e, #23a6d5, #23d5ab);
        background-size: 400% 400%;
        animation: gradient 15s ease infinite;
        /* overflow: hidden; */
    }

    @media (min-width: 1024px) {

        #my_camera,
        #my_camera video {
            width: auto !important;
            height: 400px !important;
        }
    }

    @media (max-width: 860px) {

        #my_camera,
        #my_camera video {
            width: 100% !important;
            height: auto !important;
            min-width: 100px;
            min-height: 100px;
        }

        #results,
        #results img {
            width: 100% !important;
            height: auto !important;
        }
    }

    @keyframes gradient {
        0% {
            background-position: 0% 50%;
        }

        50% {
            background-position: 100% 50%;
        }

        100% {
            background-position: 0% 50%;
        }
    }

    .card-custom {
        box-shadow: 0 0 1rem 0 rgba(0, 0, 0, .2);
        border-radius: 5px;
        background-color: rgba(255, 255, 255, .15);
        backdrop-filter: blur(5px);
    }

    .center-forced {
        margin: 0;
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
    }

    .frame {
        width: auto;
        height: 404px;
        margin-top: -535px;
        position: absolute;
        margin-left: 34%;
    }

    .grid-container {
        display: grid;
        grid-template-columns: 1fr 1fr;
        grid-template-rows: 1fr;
        justify-items: center;
        margin: 0;
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        width: 70%;
        grid-template-areas:
            "A B";
    }

    .A {
        grid-area: A;
    }

    .B {
        grid-area: B;
    }
</style>

<script src="https://cdnjs.cloudflare.com/ajax/libs/webcamjs/1.0.25/webcam.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>


<div class="container center-forced" style="padding:unset!important">
    <div class="col-lg-12">
        <div class="text-center">
            <form id="register">
                <input type="text" class="form-control" name="username" id="username" value="<?php echo $user['kodeUnik'] ?>" required hidden>
                <div class="card">
                    <div class="card-header">
                        <div id="my_camera" style="margin-left: auto; margin-right: auto;"></div>
                        <div id="results"></div>
                    </div>
                    <div class="card-body">
                        <div class="col-md-12 text-center">
                            <button type="button" class="btn btn-danger btn-circle btn-lg" onClick="take_snapshot()" id="count_num"></button>
                            <div id="retake">
                                <div class="grid-container">
                                    <button type="button" class="btn btn-danger btn-circle btn-lg A" onCLick="retake()"><i class="fas fa-redo"></i></button>
                                    <button type="submit" class="btn btn-info btn-circle btn-lg B" id="register"><i class="fas fa-save"></i></button>
                                    <button href="<?= base_url('auth/logout'); ?>" id="logout" hidden></button>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </form>
        </div>
        <!-- <img src="<?php echo base_url()?>assets/img/Frame.png" style="width:35%;position:absolute;margin-top:-35rem;margin-left:150px">  -->

    </div>
</div>


<script>
    var timer;
    var count = 3;
    let mod = 0;
    var image = '';

    // Webcam.set({
    //     width: 490,
    //     height: 390,
    //     image_format: 'jpeg',
    //     jpeg_quality: 100
    // });

    // hd
    Webcam.set({
        width: 400,
        height: 400,
        image_format: 'jpeg',
        jpeg_quality: 90,
        constraints: {
            width: { exact: 400 },
            height: { exact: 400 }
        }
    });
    Webcam.attach('#my_camera');

    function take_snapshot() {
        if (timer != 0) {

            $('#count_num').css('pointer-events', 'none');
            count = 3;
            timer = setInterval(function() {
                handleTimer(count);
            }, 1000);
        } else {

        }
    }


    function onWebcam() {
        Webcam.reset()
        $('#my_camera').css('display', 'block');
    }

    function retake() {
        location.reload();
    }

    function save() {
        console.log('save');
    }

    function endCountdown() {
        // logic to finish the countdown here

        Webcam.snap(function(data_uri) {
            image = data_uri;
            document.getElementById('results').innerHTML = '<img id="results" src="' + data_uri + '"/>';
            $('#retake').css('display', 'block');
            $('.card-body').css('padding', '40px');
        });
        $('#count_num').html('<i class="fas fa-camera-retro"></i>');
        $('#count_num').css('pointer-events', 'auto');
        $('#count_num').css('display', 'none');
        Webcam.reset();
        $('#my_camera').css('display', 'none');
    }

    function handleTimer() {

        console.log(timer);
        if (count === 0) {
            clearInterval(timer);
            timer = 3;
            $(".card-header").fadeTo(100, 0.1).fadeTo(200, 1.0);

            endCountdown();
        } else {
            $('#count_num').html(count);
            count--;
        }
    }

    $(document).ready(function() {
        $('#count_num').html('<i class="fas fa-camera-retro"></i>');
        $('#retake').css('display', 'none');
    });


    $('#register').on('submit', function (event) {
			event.preventDefault();
			var username = $('#username').val();
            
			$.ajax({
				url: '<?php echo base_url("User/save");?>',
				type: 'POST',
				dataType: 'json',
				data: {username: username, image:image},
			})
			.done(function(data) {
				if (data > 0) {
					$('#register')[0].reset();
				}
			})
			.fail(function() {
				console.log("error");
			})
			.always(function() {
                console.log("complete");
                // // location.reload();
                // $('#logout').trigger('click');
                // window.location.href = 'http://localhost:8888/Virtual%20Photobooth/';
			});
			
			
		});
</script>