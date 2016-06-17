   <?php require_once('Mobile_Detect.php');
    $detect = new Mobile_Detect;   ?>
    <div style="display:none;">
    <img src="<?php echo base_url(); ?>assets/img/bg1.jpg">
    <img src="<?php echo base_url(); ?>assets/img/bg2.jpg">
    <img src="<?php echo base_url(); ?>assets/img/bg3.jpg">
    <img src="<?php echo base_url(); ?>assets/img/bg4.jpg">
    <img src="<?php echo base_url(); ?>assets/img/bg5.jpg">
    <img src="<?php echo base_url(); ?>assets/img/bg6.jpg">
  </div>
   <section id="video-wrpr" class="clearfix">
    <section class="video-wrpr">
    <?php //if( !$detect->isMobile()){ ?>
      <div class="embed-responsive embed-responsive-16by9 video-resize">
        <iframe id="youtube_player" class="embed-responsive-item" src="https://www.youtube.com/embed/0Oxq8aLElEk?autoplay=1&loop=1&playlist=0Oxq8aLElEk&modestbranding=1&autohide=1&showinfo=0&controls=0&enablejsapi=1&version=3&playerapiid=ytplayer" frameborder="0" allowfullscreen></iframe>
       </div>
      <?php /*}else { ?>
        <img src="<?php echo base_url(); ?>assets/img/inderjeet-mob-banner.jpg" class="img-responsive mob-inderjeet-img">
        <?php }*/ ?>
      <div class="top-video-info">
        <div>
          <h2 class="top-video-title text-upppercase">Two Words Will Make All The Difference</h2>
          <div class="top-video-discrp">
            To inspire our athletes. To bring them closer to Olympic glory. To stand by them. <br class="hidden-small" />All we have to do is utter these two words: <span>#Garvhai</span>
          </div>          
        </div>
      </div>
       <?php /*if( $detect->isMobile()){ ?>      
      <div class="vedio-title-wrpr">
        <div class="vedio-hero-title text-uppercase">Inderjeet Singh</div>
        <div class="vedio-hero-desig">Shot putter</div>
      </div>
      <?php }*/ ?>
        
      <div class="video-play-mute">  
      <?php if( !$detect->isMobile()) { ?>        
          <a id="pause" href="#" class="active pause-video-img">&nbsp;</a>
      <?php }else{ ?>
          <a id="play" href="#" class="active play-video-img">&nbsp;</a>
       <?php  } ?>
          <a id="mutedd" href="#" class="active1 mute-video-img">&nbsp;</a>
          <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
          <script>
          $('#pause').on('click', function() {
                  var $this = $(this);
                  $this.toggleClass('active');
                  if($this.hasClass('active')){
                      $this.removeClass('play-video-img');
                      $this.addClass('pause-video-img');
                      $('#youtube_player')[0].contentWindow.postMessage('{"event":"command","func":"' + 'playVideo' + '","args":""}', '*');        
                  } else {
                      $this.removeClass('pause-video-img');
                      $this.addClass('play-video-img');
                      $('#youtube_player')[0].contentWindow.postMessage('{"event":"command","func":"' + 'pauseVideo' + '","args":""}', '*'); 
                  }
          });
          $('#mutedd').on('click', function() {
                  var $this = $(this);
                  $this.toggleClass('active1');
                  if($this.hasClass('active1')){
                      $this.removeClass('unmute-video-img');
                      $this.addClass('mute-video-img');
                      $('#youtube_player')[0].contentWindow.postMessage('{"event":"command","func":"' + 'unMute' + '","args":""}', '*');
                  } else {
                      $this.removeClass('mute-video-img');
                      $this.addClass('unmute-video-img');
                      $('#youtube_player')[0].contentWindow.postMessage('{"event":"command","func":"' + 'mute' + '","args":""}', '*');
                  }
          });
          $('#play').on('click', function() {
                  var $this = $(this);
                  $this.toggleClass('active');
                  if($this.hasClass('active')){
                      $this.removeClass('pause-video-img');
                      $this.addClass('play-video-img');
                      $('#youtube_player')[0].contentWindow.postMessage('{"event":"command","func":"' + 'pauseVideo' + '","args":""}', '*');        
                  } else {                      
                      $this.removeClass('play-video-img');
                      $this.addClass('pause-video-img');
                      $('#youtube_player')[0].contentWindow.postMessage('{"event":"command","func":"' + 'playVideo' + '","args":""}', '*');
                  }
          });
          </script>
      </div>
      <?php //} ?>
      <div class="js--jumper" data-href="#hero-wrpr"><img src="<?php echo base_url(); ?>assets/img/scroll-down.png"></div>
    </section>
    </section>
    <section id="hero-wrpr" class="heros-list">
      <div class="container-fluid">
        <div class="row">
          <div class="col-xs-12">
            <div class="row">
              <div class="know-txt">
                It’s only when you know our athletes well is when you’ll truly feel proud of them.<br/>
                Get to know our heroes, right here.
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="container-fluid">
        <div class="row">
          <div class="col-xs-12">
            <div class="row">
              <?php 
              $count=1;
              $lr="";
              $tb="";
              if(isset($records)){
                foreach($records as $playerData) {
                   switch ($count) {
                    case '1':
                      $lr="25%";
                      $tb="tl";                      
                      break;
                       case '2':
                        $lr="50%";
                        $tb="tl";                      
                      break;
                       case '3':
                      $lr="0";
                      $tb="tr";                      
                      break;
                       case '4':
                      $lr="25%";
                      $tb="tr";                      
                      break;
                       case '5':
                      $lr="25%";
                      $tb="bl";                      
                      break;
                       case '6':
                      $lr="50%";
                      $tb="bl";                      
                      break;
                       case '7':
                      $lr="0";
                      $tb="br";                     
                      break;                    
                    default:
                     $lr="25%";
                      $tb="br"; 
                      break;
                  }
                  ?> 

                  <div class="col-xs-4 col-xs-20 overlay-wrpr">
                    <!-- <div class="heros-name text-uppercase"><?php echo $playerData['name']; ?></div> -->
                    <div class="row">
                      <img src="<?php echo base_url(); ?>uploads/<?php echo $playerData['profile_photo']; ?>" class="full-width-img">
                    </div>
                    <div class="hover-overlays"></div>
                    <div class="user-prof-wrpr text-center">
                    <div class="close-overlay">&times;</div>
                      <div class="text-uppercase prof-name-wrpr"><?php echo $playerData['name']; ?></div>
                      <div class="profile-btn text-uppercase" data-lr="<?php echo $lr?>" data-tb="<?php echo $tb?>" data-playermode="profile" data-playerid="<?php echo $playerData['id']; ?>"><span class="anim-btn-bg"></span><span class="anim-btn-txt">profile</span></div>
                      <div class="profile-btn text-uppercase" data-lr="<?php echo $lr?>" data-tb="<?php echo $tb?>" data-playermode="videos" data-playerid="<?php echo $playerData['id']; ?>">videos & images</div>
                      <div class="profile-btn text-uppercase" data-lr="<?php echo $lr?>" data-tb="<?php echo $tb?>" data-playermode="media" data-playerid="<?php echo $playerData['id']; ?>">Media</div>
                      <div class="text-uppercase supp-ply-txt">support player</div>
                      <div class="heros-social-links">
                        <ul class="list-inline">
                          <li class="fb-list">
                          <?php if($playerData['olympic_qulified'] == '1') {
                              $fbDesc = 'Proud to support '.$playerData["name"].' in the Rio Olympics 2016. #GarvHai by #Adani';
                              $twDesc = 'Proud to support '.$playerData["name"].' in the Rio Olympics 2016.';
                            }else{
                                $fbDesc = 'Proud to support '.$playerData["name"].'. #GarvHai by #Adani';
                                $twDesc = 'Proud to support '.$playerData["name"].'.';
                              } 
                             
                              ?>
                           <a href="/" data-image="<?php echo base_url(); ?>uploads/<?php echo $playerData['profile_photo']; ?>" data-title="<?php echo $playerData['name'];?>" data-desc="<?php echo $fbDesc;?>" class="btnShare"><img src="<?php echo base_url(); ?>assets/img/fb-w.png"></a></li>
                          <li><a onClick="window.open('https://twitter.com/share?url='+escape(window.location.href)+'&text=<?php echo $twDesc; ?>via @AdaniOnline&hashtags=GarvHai', '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=300,width=600');" href="javascript: void(0)" class="social-icon-top"><img src="<?php echo base_url(); ?>assets/img/tw-w.png"></a></li>
                        </ul>
                      </div>
                    </div>
                  </div>
                <?php 
                  $count++;
               }
              } ?>
              <div class="col-xs-40 col-xs-4 hero-detail-info hidden">
                <div class="close-prof">
                  <img src="<?php echo base_url(); ?>assets/img/close-icon-white.png">
                </div>
                <div class="hero-detail-inner hero-detail-inner-profile hidden">
                  <div class="hero-detail-top">
                    <div class="hero-detail-top-in">
                      <!-- <div class="hero-achive-wrpr">
                        <div class="hero-achive-con">
                          <div class="hero-achive-name text-uppercase">INDERJEET SINGH</div>
                          <div class="hero-achive-event">(Shot Put)</div>
                        </div>
                        <div class="hero-achive-time">
                          28.5
                        </div>
                        <div class="hero-achive-time">
                          22.5 
                        </div>
                        <div class="hero-achive-time">
                          22.1
                        </div>
                      </div> -->
                      <div class="hero-detail-social-icon text-center">
                        <div id="hero-support-name">Support Inderjeet</div>
                        <ul class="list-inline">
                          <li><a href="javascript: void(0)" class="social-icon-top"><img src="<?php echo base_url(); ?>assets/img/fb-w.png"></a></li>
                          <li><a href="javascript: void(0)" class="social-icon-top"><img src="<?php echo base_url(); ?>assets/img/tw-w.png"></a></li>
                        </ul>
                      </div>
                    </div>
                  </div>
                  <div class="hero-detail-middle">
                    <div id="profileReplaceData">
                        
                    </div>
                  </div>
                  <div class="hero-detail-bottom">
                    <div class="share-txt-mob">Support</div>
                    <div class="hero-bottom-btn-wrpr">  
                      <div class="back-btn text-uppercase">
                        &lt;&lt; back
                      </div>
                      <div class="media-btn-mob media-show" data-mode="media" data-profileid="">
                        Media
                      </div>
                      <div class="socil-btn-mob">
                        <a href="https://www.facebook.com/AdaniOnline/">
                          <img src="<?php echo base_url(); ?>assets/img/fb-w.png">
                        </a>
                      </div>
                      <div class="socil-btn-mob socil-btn-mob-tw">
                        <a href="https://twitter.com/AdaniOnline">
                          <img src="<?php echo base_url(); ?>assets/img/tw-w.png">
                        </a>
                      </div>
                    </div>
                  </div>                  
                </div>
                <div class="hero-detail-inner hero-detail-inner-media hidden">
                  <div class="hero-detail-top">
                    <div class="hero-detail-top-in">
                      <div class="media-title">Media</div>                      
                    </div>
                  </div>
                  <div class="hero-detail-middle">
                    <div class="media-list-wrpr" id="mediaListWrpr">
                      
                    </div>
                  </div>
                  <div class="hero-detail-bottom">
                    <div class="share-txt-mob share-txt-mob-med">Share</div>
                    <div class="hero-bottom-btn-wrpr">  
                      <div class="back-btn text-uppercase">
                        &lt;&lt; back
                      </div>
                      <div class="media-btn-mob profile-show" data-mode="profile" data-profileid="">
                        Profile
                      </div>
                      <div class="socil-btn-mob">
                        <a href="https://www.facebook.com/AdaniOnline/">
                          <img src="<?php echo base_url(); ?>assets/img/fb-w.png">
                        </a>
                      </div>
                      <div class="socil-btn-mob socil-btn-mob-tw">
                        <a href="https://twitter.com/AdaniOnline">
                          <img src="<?php echo base_url(); ?>assets/img/tw-w.png">
                        </a>
                      </div>
                    </div>
                  </div>                  
                </div>
              </div>             
            </div>
          </div>
        </div>
      </div>      
    </section>
    <section id="heros-gellary" class="heros-gellary">
      <div class="container-fluid">
        <div class="row">
          <div class="col-xs-12 light-box-wrpr-fliter">
            <div class="row">
              <div class="col-xs-12">
                <div class="row">
                  <div class="hero-filter clearfix">
                    <div class="col-xs-12">
                      <div class="filter-title">Catch our mighty Athletes in action and share it with the world.</div>
                      <div class="custom-label-vid text-uppercase">
                        videos &amp; images
                      </div>
                      <div class="select-style">
                          <select id="mobileFilter">
                           <?php 
                            if(isset($records)){
                              foreach($records as $playerData) { 
                                $optionSelected = '';
                                if($playerData['id'] == '4'){ $optionSelected = 'selected="selected"'; }
                                ?>
                                <option <?php echo $optionSelected; ?> value="<?php echo $playerData['id'];?>"><?php echo $playerData['name'];?></option>
                                <?php }
                            } ?>
                          </select>
                        </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="container-fluid">
        <div class="row">
          <div class="col-xs-12">
            <div class="row">
              <?php if( !$detect->isMobile()) { ?>
              <div class="know-txt">
                Catch our mighty Athletes in action and share it with the world.
              </div>
              <?php } ?>
              <div class="col-xs-4 col-xs-40 light-box-wrpr-fliter">
                <div>
                  <div class="col-xs-12">
                    <div class="hero-filter hero-filter-desk clearfix">
                        <?php 
                        if(isset($records)){
                          $count = 0;
                          //$loopCount = 1;
                          foreach($records as $playerData) { 
                            if($count == 0){
                              echo '<div class="col-sm-6 col-xs-12 hidden-small">
                                      <ul class="cust-inp-wrpr gallery-player">';
                            }
                            $radioChecked = '';
                            $count=$count+1;
                            if($playerData['id'] == '4'){ $radioChecked = 'checked="checked"'; }
                            ?>
                                  <li>
                                    <input type="radio" <?php echo $radioChecked;?> id="players_<?php echo $playerData['id'];?>" name="players" value="<?php echo $playerData['id'];?>">
                                      <label class="custom-radio text-uppercase" for="players_<?php echo $playerData['id'];?>">
                                        <?php echo $playerData['name'];?>
                                      </label>
                                  </li>
                          <?php 
                              if($count == 4){
                                echo '</ul>';
                                  /*if($loopCount == 1){
                                    echo '<div class="btn filter-btn text-uppercase btn-default">
                                      Videos &amp; Images
                                    </div>';
                                  }*/
                                  echo '</div>';
                                $count = 0;
                                //$loopCount = $loopCount+1;
                              }
                            }
                          } ?>
                    </div>
                    <div class="row">
                      <div class="col-sm-6">
                        <div class="row">
                          <img src="<?php echo base_url();?>assets/img/trans-bg.png" class="full-width-img">
                        </div>
                      </div>
                      <div class="col-sm-6">
                        <div class="row">
                          <img src="<?php echo base_url();?>assets/img/trans-bg.png" class="full-width-img">
                        </div>
                      </div>
                    </div>
                  </div>                                      
                </div>                
              </div>
              <div class="replace-filter-data">
                <?php 
                if(isset($videoRecords)){
                  foreach($videoRecords as $videoData) { 
                    $fbDesc = '';
                    ?> 
                    <div class="col-xs-4 col-xs-20 light-box-wrpr">
                      <div class="row">
                      <?php 
                      if($videoData['olympic_qulified'] == '1') {

                          $fbDesc .= 'Proud to support '.$videoData["name"].' in the Rio Olympics 2016. #GarvHai by #Adani';
                        }else{
                          $fbDesc .= 'Proud to support '.$videoData["name"].'. #GarvHai by #Adani';
                        } 

                      if($videoData['type'] == 'image') { 
                            $largeImg = explode('.', $videoData['media_value']);
                        ?>
                          <a>
                            <img src="<?php echo base_url(); ?>uploads/<?php echo $videoData['media_value'].'?'.strtotime($videoData['timestamp']); ?>" class="full-width-img">
                            <div class="light-box-overlay image-overlay" data-id="<?php echo $videoData['id']; ?>" data-image="<?php echo base_url(); ?>uploads/<?php echo $largeImg[0].'-l.jpg'.'?'.strtotime($videoData['timestamp']); ?>" data-qualified="<?php echo $videoData['olympic_qulified']; ?>" data-title="<?php echo $videoData['name']; ?>" data-desc="<?php echo $fbDesc; ?>"></div>
                          </a>   
                        <?php }else if($videoData['type'] == 'video') { ?>
                            <a href="#">
                              <img src="<?php echo base_url(); ?>uploads/<?php echo $videoData['video_thumbnail'].'?'.strtotime($videoData['timestamp']); ?>" class="full-width-img">
                              <div class="light-box-overlay video-overlay" data-id="<?php echo $videoData['id']; ?>" data-image="<?php echo base_url(); ?>uploads/<?php echo $videoData['video_thumbnail'].'?'.strtotime($videoData['timestamp']);?>" data-title="<?php echo $videoData['name']; ?>" data-desc="<?php echo $fbDesc; ?>"></div>
                            </a>
                        <?php } ?>               
                      </div>                
                    </div>
              <?php }
                } ?>
            </div>
            </div>
          </div>
        </div>
      </div>      
    </section>
    <section id="about" class="about-wrpr">
      <div class="about-inner">
        <h2 class="about-title text-uppercase text-center">#GarvHai: The Adani Initiative</h2>
        <p class="about-discrb text-center">"Sport has the power to build a better and a stronger nation. Through our humble initiative <span>#GarvHai</span> , we're privileged to support some of the best sporting talent in the country. Talented athletes were chosen from all parts of India and assisted to qualify for the Games much before the Olympics qualifiers began. These men and women have fought the odds and made great sacrifices, all for one vision - to bring glory to India. We need you to stand up and say 'Garv Hai'!<br/> Join us, and together, let's make history."</p>
      </div>
    </section>
    <section id="contact" class="contact-wrpr">
      <h2 class="contact-title text-uppercase text-center">Share your experience</h2>
      <div class="subhead-title">We at Adani are eager to know your #GarvHai moments. Do share it with us.</div>
      <form class="contact-form clearfix">
        <div class="col-xs-12">
          <div class="row">
            <div class="col-sm-4 col-xs-12">
              <div class="form-group">         
                <div class="input-group">
                  <label for="name-inp" class="input-group-addon"><i class="glyphicon glyphicon-user"></i></label>
                  <input id="name-inp" type="text" class="form-control" placeholder="Name">
                </div>
              </div>
            </div>
            <div class="col-sm-4 col-xs-12">
              <div class="form-group">         
                <div class="input-group">
                  <label for="email-inp" class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></label>
                  <input id="email-inp" type="mail" class="form-control" placeholder="Mail">
                </div>
              </div>
            </div>
            <div class="col-sm-4 col-xs-12">
              <div class="form-group">         
                <div class="input-group">
                  <label for="tel-inp" class="input-group-addon"><i class="glyphicon glyphicon-earphone"></i></label>
                  <input id="tel-inp" type="tel" class="form-control" placeholder="Mobile" minlength="10" maxlength="10">
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-xs-12">
              <div class="form-group">         
                <div class="input-group input-group-text-area">
                  <label for="comment-inp" class="input-group-addon"><i class="glyphicon glyphicon-comment"></i></label>
                  <textarea id="comment-inp" class="form-control" placeholder="Comment"></textarea>
                </div>
              </div>
              <div class="form-group terms-check-wrpr text-center">
                <h3 class="text-uppercase"><a target="_blank" href="/index.php/pages/terms_of_use">Terms & Conditions</a></h3>
                <div class="custom-check-wrpr">
                  <input id="tnc-inp" type="checkbox">
                  <label for="tnc-inp" class="text-uppercase">I hereby confirm that the details furnished above are mine and are true and correct to the best of my knowledge and belief. I have read the Privacy Policy & I authorize Garv Hai Website and its partners to call / email / SMS me for any further communication.</label>                  
                </div>
              </div>
              <div class="form-group">    
                <!-- <button id="share-exp" class="btn btn-submit center-block text-uppercase">submit</button> -->
                <span style="width:80px;" id="share-exp" class="btn btn-submit center-block text-uppercase">submit</span>
              </div>
              <p class="email-txt text-center">
                write us at <a href="mailto:communication@adani.com">communication@adani.com</a>
              </p>  
              <p class="abt-social-txt text-uppercase text-center">follow us on</p>
               <div class="heros-social-links text-center">
                  <ul class="list-inline">
                    <li><a href="https://www.facebook.com/AdaniOnline/" class="social-icon-top" target="_blank"><img src="<?php echo base_url(); ?>assets/img/fb-o.png"></a></li>
                    <li><a href="https://twitter.com/AdaniOnline" class="social-icon-top" target="_blank"><img src="<?php echo base_url(); ?>assets/img/tw-o.png"></a></li>
                  </ul>
                </div>           
            </div>
          </div>
        </div>        
      </form>        
    </section>
    <section id="media" class="players-schedule-wrpr">
      <div class="ply-schd-inner clearfix">
        <div class="row">
          <h2 class="media-title text-uppercase text-center">Media</h2>
          <div class="subhead-title">
            Our Olympic warriors are making the right waves.<br/>
            Catch up with all the latest news about our players.
          </div>
          <div class="col-sm-5 col-xs-12">
            <ul class="cust-inp-wrpr">
            <li>
            <input type="radio" id="schedule_all" name="adaniplayers" value="all" checked="checked">
            <label class="custom-radio text-uppercase" for="schedule_all" >all</label></li>
            <?php
              if(isset($records)){
                $radChecked = '';
                foreach($records as $playerData) {
                  //$radChecked = $playerData['id'] == 4 ? $radChecked = 'checked="checked"' : $radChecked = '';
            ?>
                  <li>
                    <input type="radio" id="schedule_<?php echo $playerData['id'];?>" name="adaniplayers" value="<?php echo $playerData['id'];?>" <?php echo $radChecked;?>>
                    <label class="custom-radio text-uppercase" for="schedule_<?php echo $playerData['id'];?>"><?php echo $playerData['name'];?></label>
                  </li>
            <?php
                }
              }
            ?>
            </ul>
            <div class="select-style">
              <select id="mobileMediaFilter">
              <option id="schedule_all" name="adaniplayers" value="all">All
              <?php
                if(isset($records)){
                  $dropSelect = '';
                  foreach($records as $playerData) {
                    //$dropSelect = $playerData['id'] == 4 ? $dropSelect = 'selected="selected"' : $dropSelect = '';
              ?>
                <option <?php echo $dropSelect;?> value="<?php echo $playerData['id'];?>"><?php echo $playerData['name'];?></option>
              <?php
                  }
                }
              ?>
              </select>
            </div>
          </div>
          <div class="col-sm-7 col-xs-12">
            <div class="media-list-wrpr-dwn media-list-wrpr-btm">
            <div id="dynamicMediaContent">
              
           
                <?php
                  $mediacount = 0;
                  foreach ($mediaRecords as $media) {
                ?>
                <div class="media-item">
                  <div class="media-discrp">
                    <div class="media-discrp-txt">
                      <p><a href="<?php echo $media['link'];?>" target="blank"><?php echo $media['description'];?></a></p>
                    </div>
                    <div class="media-discrp-date"><?php echo date_format(date_create($media['published_date']), 'F jS, Y');?></div>
                  </div>
                  <div class="media-social-icon">
                    <ul class="list-inline">
                      <li><a href="<?php echo $media['link'];?>" data-image="<?php echo base_url(); ?>uploads/<?php echo $media['profile_photo']; ?>" data-title="<?php echo $media['name'];?>" data-desc="<?php echo $media['media_value'];?>" class="social-icon-top btnShare"><img src="<?php echo base_url(); ?>assets/img/fb-w.png"></a></li>
                      <li><a data-title="<?php echo $media['name'];?>"  data-href="<?php echo $media['link'];?>" data-desc="<?php echo $media['media_value'];?>" href="javascript: void(0)" class="social-icon-top tw-user-media"><img src="<?php echo base_url(); ?>assets/img/tw-w.png"></a></li>
                    </ul>
                  </div>
                </div>
                <?php
                  }
                ?>
                 </div>
            </div>
          </div>
        </div>
      </div>
    </section>

<!-- Modal -->
<div class="modal fade modal-light-box" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <div class="modal-body">
          <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner" role="listbox">
        <?php if(isset($videoRecords)){
                  foreach($videoRecords as $videoData) { 
                      if($videoData['type'] == 'image') { 
                          $imgnm = explode('.', $videoData['media_value']);
                        ?>
                        <div class="item" id="modalImg_<?php echo $videoData['id']; ?>">
                          <img src="<?php echo base_url(); ?>uploads/<?php echo $imgnm[0].'-l.jpg?'.strtotime($videoData['timestamp']); ?>" class="full-width-img">
                        </div>
                       <?php }else if($videoData['type'] == 'video') { ?>
                          <div class="item" id="modalImg_<?php echo $videoData['id']; ?>" >
                            <div class="embed-responsive embed-responsive-16by9">
                               <iframe class="embed-responsive-item" src="<?php echo $videoData['media_value']; ?>" frameborder="0" allowfullscreen></iframe>
                            </div>
                          </div>
                       <?php } 
                  }
                } ?>
            </div>
            <!-- Controls -->
            <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
              <img src="<?php echo base_url(); ?>assets/img/previous.png">              
              <span class="sr-only">Previous</span>
            </a>
            <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
              <img src="<?php echo base_url(); ?>assets/img/next.png">
              <span class="sr-only">Next</span>
            </a>
          </div>
        </div>
      <div class="modal-footer">
        <div class="heros-social-links">
        <ul class="list-inline">
          <li id="fbShareData" data-name="" data-description=""><a id="largeShare" href="http://garvhai.in" data-image="" data-title="" data-desc="" class="social-icon-top btnShare"><img src="<?php echo base_url(); ?>assets/img/fb-w.png"></a></li>
          <li><a id="largeTWShare" href="" class="social-icon-top tw-user-profile" data-qualified="" data-username=""><img src="<?php echo base_url(); ?>assets/img/tw-w.png"></a></li>
        </ul>
      </div>
      </div>
    </div>
  </div>
</div> 


<!-- Modal -->
  <div class="modal fade" id="alertModal" role="dialog">
    <div class="modal-dialog">
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body replace-content">
          <p></p>
        </div>
        
      </div>
      
    </div>
  </div>
   
