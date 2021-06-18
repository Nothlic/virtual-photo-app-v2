<div class="container-fluid container-wrapper-custom">
    <!--Bootstrap tabs-->
    <div class="row overflow-hidden">
        <div class="col-lg-6 video-wrapper-custom">
            <div class="tab-content">
                <div class="entry-video embed-responsive embed-responsive-16by9">
                        <div id="player"></div>
                        <!-- <iframe width="886" height="668" src="<?php echo $youtube['link'] ?>" allow="autoplay" allowfullscreen=""></iframe> -->
                        <div id="iframeBlocker" style="position:absolute; top: 0; left: 0; width:100%; height:100%;background-color:aliceblue;opacity:0.1;"></div>
                    </div>
                </div>
            </div>
        <div class="col-lg-6 px-0 hide-chat-desktop">
            <div class="container-fluid">
                <div class="px-4 py-5 chat-box" id='scrollbar'>
                    <div class="chat">

                    </div>
                </div>

                <!-- Typing area -->
                <div class="bg-dark mt-1">
                    <div class="input-group">
                        <input hidden type="text" name="idUser" class="form-control idUser" id="idUser" value="<?php echo $user['id'] ?>">
                        <input hidden type="text" name="name" class="form-control name" id="name" value="<?php echo $user['name'] ?>">
                        <input type="text" name='isi' placeholder="Type a message" aria-describedby="button-addon2" class="form-control rounded-0 border-0 py-4 philips-text-field isi">
                        <!-- <textarea class="form-control rounded-0 border-0 py-4 philips-text-field"></textarea>-->
                        <div class="input-group-append">
                            <button id="btn-chat" type="submit" class="btn philips-color-custom btn-chat">Kirim</button>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

<div class="hide-chat-desktop">
    <div class="container-fluid mt-5">
        <div class="grid-container">
            <div class="Image">
                <div class="text-center">
                    <img src="<?php echo base_url('assets/assetsfront2/images/philipscreation.png') ?>" class="img-fluid" alt="Responsive image">
                </div>
            </div>
            <div class="Text">
                <div class="wrapper-text">
                    <h5 class="font-custom">Wujudkan kreasi luminer lampu Anda dengan teknologi <b>3D Printing!</b></h5>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid mt-5 mb-5">
        <div class="text-center">
            <img src="<?php echo base_url('assets/assetsfront2/images/combine.png') ?>" class="img-fluid img-custom" alt="Responsive image">
        </div>
    </div>

    <div class="container-fluid mt-5 mb-5">
        <div class="text-center">
            <h5>Dapatkan kesempatan memenangkan hadiah menarik selama acara berlangsung!</h5>
            <img src="<?php echo base_url('assets/assetsfront2/images/iconhomefooter.png') ?>" class="img-fluid" alt="Responsive image">
        </div>
    </div> 

</div>


<div id="accordion" class="hide-wrapper-desktop ">
    <div class="container-fluid" style="padding-right:0px !important; padding-left:0px !important;">
        <nav class="nav nav-pills nav-justified" >
        <div class="nav-item nav-link active philips-color-custom" style="border-radius: 0 !important;padding: 5px !important;" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
            <i class="fas fa-home" style="font-style:normal !important"></i>
            <h6 style="font-size: 10px !important;">Beranda</h6>
        </div>
        <div class="nav-item nav-link active ml-1 philips-color-custom" style="border-radius: 0 !important;padding: 5px !important;" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
            <i class="fas fa-comment"  style="font-style:normal !important"></i>
            <h6 style="font-size: 10px !important;">Chat</h6>
        </div>
        </nav>
    </div>

    <div class="collapse show" id="collapseOne" aria-labelledby="headingOne" data-parent="#accordion">
        <div id="headingOne">
            
        <div class="container-fluid mt-5">
            <div class="grid-container">
                <div class="Image">
                    <div class="text-center">
                        <img src="<?php echo base_url('assets/assetsfront2/images/philipscreation.png') ?>" class="img-fluid" alt="Responsive image">
                    </div>
                </div>
                <div class="Text">
                    <div class="wrapper-text">
                        <h5 class="font-custom">Wujudkan kreasi luminer lampu Anda dengan teknologi <b>3D Printing!</b></h5>
                    </div>
                </div>
            </div>
        </div>

        <div class="container-fluid mt-5 mb-5">
            <div class="text-center">
                <img src="<?php echo base_url('assets/assetsfront2/images/combine.png') ?>" class="img-fluid img-custom" alt="Responsive image">
            </div>
        </div>

        <div class="container-fluid mt-5 mb-5">
            <div class="text-center">
                <h5>Dapatkan kesempatan memenangkan hadiah menarik selama acara berlangsung!</h5>
                <img src="<?php echo base_url('assets/assetsfront2/images/iconhomefooter.png') ?>" class="img-fluid" alt="Responsive image">
            </div>
        </div> 

        </div>
    </div>

    <div class="collapse"  id="collapseTwo" aria-labelledby="headingTwo" data-parent="#accordion">
        <div id="headingTwo">
        <div class="mb-3 mt-3">
        <div class="container-fluid">
                <div class="px-4 py-5 chat-box"id='scrollbar'>
                    <div class="chat">

                    </div>
                </div>

                <!-- Typing area -->

                <div class="bg-dark mt-1">
                    <div class="input-group">
                        <input hidden type="text" name="idUserMobile" class="form-control idUserMobile" id="idUser" value="<?php echo $user['id'] ?>">
                        <input hidden type="text" name="nameMobile" class="form-control nameMobile" id="name" value="<?php echo $user['name'] ?>">
                        <input type="text" name='isiMobile' placeholder="Type a message" aria-describedby="button-addon2" class="form-control rounded-0 border-0 py-4 philips-text-field isiMobile">
                        <!-- <textarea class="form-control rounded-0 border-0 py-4 philips-text-field"></textarea>-->
                        <div class="input-group-append">
                            <button id="btn-chat-mobile" type="submit" class="btn philips-color-custom btn-chat-mobile">Kirim</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
  
    </div>

</div>



