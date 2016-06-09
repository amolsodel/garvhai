<div class="loader">
  
</div>
<footer class="btm-footer">
  <div class="container-fluid">
    <div class="row">
      <div class="col-sm-6 col-xs-12">
        <p class="copy-txt">&copy; 2016 Adani Group</p>
      </div>
      <div class="col-sm-6 col-xs-12">
        <nav class="footer-nav clearfix">
          <ul class="nav navbar-nav navbar-right">           
            <li><a href="/index.php/pages/privacy_policy" target="_blank">Privacy policy</a></li>
            <li><a href="/index.php/pages/legal_disclaimer" target="_blank">Legal disclaimer</a></li>                       
            <li><a href="/index.php/pages/terms_of_use" target="_blank">Terms of use</a></li>
          </ul>
        </nav>
      </div>        
    </div>
  </div>      
</footer>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="<?php echo base_url(); ?>assets/js/jquery-1.9.1.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/jquery.easing.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="<?php echo base_url(); ?>assets/js/bootstrap.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/jquery.mCustomScrollbar.concat.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/custom.js?ver=0.4" type="text/javascript" charset="utf-8"></script>

    <script type="text/javascript">
     
      var baseUrl = '<?php echo base_url() ?>';

      $(document).ready(function(){
        $('.close-overlay').click(function(){
          $(this).parents('.overlay-wrpr').removeClass('active-mob-overlay');
          
        });
        $('.overlay-wrpr>.row>img,.heros-name').click(function(){
          $(this).parents('.overlay-wrpr').addClass('active-mob-overlay');
        })
        $('.carousel').carousel({interval: false});
          $(window).on("scroll", function(e) {  
            if($(window).width()>1006){
              if ($(this).scrollTop() > 50) {
                $('body').addClass("fix-header");
              } else {
                $('body').removeClass("fix-header");
              }
          }             
        });
        $(window).resize(function(){
          if($(window).width()>=1007){
            $('.video-wrpr,.video-wrpr>img,.top-video-info').height($(window).height());
          }
          else{
            $('.video-wrpr,.video-wrpr>img,.top-video-info').css('height','auto');
          }
        
      });
         if($(window).width()>=1007){
            $('.video-wrpr,.video-wrpr>img,.top-video-info').height($(window).height());
         }

        $('.hero-detail-middle,.media-list-wrpr-btm').mCustomScrollbar({
          theme:"dark"
        });

        $('.profile-btn').click(function(e){
          $('body').addClass('loading');
          var lr= $(this).data('lr');
          var lb= $(this).data('tb');
          var playerId = $(this).data('playerid');
          var playerMode = $(this).data('playermode');
          $('.media-btn-mob').data('profileid',playerId);
  	      if(playerId && playerMode){
	          $('.hero-detail-info').removeClass('hidden').css({'left':lr})
	          if($(window).width()>1006){
    				    switch(lb){
    				      case "tr" :    
    				      reomoveItem();        
    				      $('.hero-detail-info').addClass('right').addClass('top');
    				      break;
    				      case "tl" :   
    				      reomoveItem();         
    				      $('.hero-detail-info').addClass('left').addClass('top');
    				      break;
    				      case 'br':    
    				      reomoveItem();        
    				      $('.hero-detail-info').addClass('right').addClass('bottom');
    				      break;
    				      default :
    				      reomoveItem();
    				      $('.hero-detail-info').addClass('left').addClass('bottom');
    				    }  
               
            }
            $("body, html").animate({
                    scrollTop: $("#hero-wrpr").offset().top
                }, 600);

            if(playerMode != 'videos'){
              $(this).parents('.overlay-wrpr').removeClass('active-mob-overlay');
              $(this).parents('.heros-list').find('.hover-overlays').show();
              $(this).parents('.overlay-wrpr').addClass('active-img').find('.hover-overlays').hide();
              showModalContent(playerId,playerMode,'mediaListWrpr');
            }else{
              $('.hero-detail-info').addClass('hidden');
              $(this).parents('.heros-list').find('.hover-overlays').hide();
              $('.col-sm-6 .cust-inp-wrpr').find('input').prop('checked',false);
              $('.cust-inp-wrpr').find('input[id="players_'+playerId+'"]').prop('checked',true);
              $('body').addClass('loading');
              playerFilterData(playerId);
              $("body, html").animate({
                    scrollTop: $("#heros-gellary").offset().top-40
                }, 600);
            }

          }
          function reomoveItem(){
            return $('.hero-detail-info').removeClass('right').removeClass('top').removeClass('bottom').removeClass('left');
          }
        });

        $('.hover-overlays').hover(function(e){
          e.stopPropagation();
          e.preventDefault();
          $('.user-prof-wrpr').addClass('hidden');          
        });

        $('.back-btn,.close-prof').click(function(){
          $(this).parents('.hero-detail-info').addClass('hidden');
          $('.user-prof-wrpr').removeClass('hidden');  
          $('.hover-overlays').hide();
          $('.overlay-wrpr').removeClass('active-img');
        });

        $('.media-show').click(function(){
          showModalContent($(this).data('profileid'),$(this).data('mode'), 'mediaListWrpr');
        });

        $('.profile-show').click(function(){
          showModalContent($(this).data('profileid'),$(this).data('mode'));
        });
        $('.menu-btn').click(function(){
          $('.main-nav').toggleClass('active');
          $(this).find('.menu-btn-img').toggleClass('hidden');
          $(this).find('.menu-close').toggleClass('hidden');

        });
        $('#share-exp').click(function(e){
          /*e.stopPropagation();*/
          e.preventDefault();
          var size = 10;
          var alertModal = $('#alertModal');
          if($('input[id="tnc-inp"]').is(':checked')){
            var name = $('#name-inp').val();
            var email = validateEmail($('#email-inp').val());
            var mobile = $('#tel-inp').val();
            var cmnt = $('#comment-inp').val();
            var letters = /^[a-zA-Z ]*$/; 
            if(name == "" && $('#email-inp').val() == "" && mobile == "" && cmnt == ""){
              alertModal.find('.replace-content').text('All fields are required.');
              alertModal.modal('show');
            }else if(name != "" && email != "" && mobile != "" && cmnt != ""){
              if(isNaN(mobile)){
              alertModal.find('.replace-content').text('Please enter Number only.');
              alertModal.modal('show');
              }
              else if($('#tel-inp').val().length != size){
              alertModal.find('.replace-content').text('Please enter Number exactly 10 digits.');
              alertModal.modal('show');
              }
              else if (/^[a-zA-Z0-9- ]*$/.test(name) == false) {
              alertModal.find('.replace-content').text('Please enter name  without special characters.');
              alertModal.modal('show');
              }
              else if((!name.match(letters))){
              alertModal.find('.replace-content').text('Please enter a valid name.');
              alertModal.modal('show');
              }
              else if(cmnt.length <= 10){
              alertModal.find('.replace-content').text('Please enter comment with atleast 10 characters.');
              alertModal.modal('show');
              }
              else{
              addShareExperience(name, $('#email-inp').val(), mobile, cmnt);}
            }else if(name != "" && $('#email-inp').val() == '' && mobile != "" && cmnt != ""){
              alertModal.find('.replace-content').text('Please enter email-id.');
              alertModal.modal('show');
            }else if(name != "" && email == false && mobile != "" && cmnt != ""){
              alertModal.find('.replace-content').text('Please enter valid email-id.');
              alertModal.modal('show');
            }else if(name != "" && email == true && mobile == "" && cmnt != ""){
              alertModal.find('.replace-content').text('Please enter mobile-no.');
              alertModal.modal('show');
            }else if(name != "" && email == true && mobile != "" && cmnt == ""){
              alertModal.find('.replace-content').text('Please enter comment.');
              alertModal.modal('show');
            }else if(name == "" && email == true && mobile != "" && cmnt != ""){
              alertModal.find('.replace-content').text('Please enter name.');
              alertModal.modal('show');
            }else{
              alertModal.find('.replace-content').text('Please fill other fields also.');
              alertModal.modal('show');
            }
          }else{
            alertModal.find('.replace-content').text('You must agree to our Terms & Conditions.');
            alertModal.modal('show');
          }
        });
        $('input[name="adaniplayers"]').change(function(){
          $('body').addClass('loading');
          var playerId = $(this).val();
          showModalContent(playerId,'media', 'dynamicMediaContent');
          
        });

        $('body').on('click','.fb-user-profile', function(e){
          e.preventDefault();
          elem = $(this);
          postToFeed(elem.data('title'), elem.data('desc'), elem.prop('href'), elem.data('image'));
          return false;
       });

        $('body').on('click','.tw-user-profile', function(e){
          e.preventDefault();
          var twDesc ='';
          var username = $(this).data('username');
          var olp_quilified = $(this).data('qualified');
          if(olp_quilified == 1){
            twDesc = 'Proud to support '+username+' in the Rio Olympics 2016.';
          }else{
            twDesc = 'Proud to support '+username+'.'
          }
          window.open('https://twitter.com/share?url='+escape(window.location.href)+'&text='+twDesc+'via @AdaniOnline&hashtags=GarvHai', '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=300,width=600');          
        });

        $('body').on('click','.tw-user-media', function(e){
          e.preventDefault();
          var link = $(this).data('href');
          var description = $(this).data('desc');
          var username = $(this).data('title');
          window.open('https://twitter.com/share?url='+escape(link)+'&text='+username+': '+description+'via @AdaniOnline&hashtags=GarvHai', '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=300,width=600');          
        });

        $('#mobileMediaFilter').change(function(e){
          e.preventDefault();
          e.stopPropagation();
          $('body').addClass('loading');
          var playerId = $(this).val();
          if(playerId){
            showModalContent(playerId,'media', 'dynamicMediaContent');
          }else{
            alert("Please select atleast one value!");
            return false;
          }
          
        }); 
        

      });

      function validateEmail(email) {
          var re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
          return re.test(email);
      }

      function addShareExperience(name, email, mobile, cmnt){
        $.ajax({
            url: "/index.php/home/share_experience_data",
            type: 'POST',            
            data: { 'name': name, 'email': email, 'mobile': mobile, 'cmnt': cmnt },
            dataType: "json",
            success: function(data){
              $('#alertModal').find('.replace-content').text(JSON.stringify(data));
              $('#alertModal').modal('show');
            }
        });
      }

      function showModalContent(playerId, playerMode, divToReplace){
        if(playerId && playerMode){
          $.ajax({
            url: "/index.php/home/player_model_data",
            type: 'POST',            
            data: { 'mode': playerMode, 'playerId': playerId },
            dataType: "json",
            success: function(data) {
              if($.trim(data) != "") {
                var mediaHtml = '';
                var fbDesc = '';
                var socialHtml = '';
                var mobileFBSocialHtml = mobileTWSocialHtml = '';
                if(playerMode == 'profile'){
                  if(data.modal_data[0].olympic_qulified == 1){
                    fbDesc += 'Proud to support '+data.modal_data[0].name+' in the Rio Olympics 2016. #GarvHai by #Adani';
                  }else{
                    fbDesc += 'Proud to support '+data.modal_data[0].name+'. #GarvHai by #Adani';
                  }
                  socialHtml += '<li><a href="http://garvhai.in" class="social-icon-top fb-user-profile" data-desc="'+fbDesc+'" data-title="'+data.modal_data[0].name+'" data-image="'+baseUrl+'uploads/'+data.modal_data[0].profile_photo+'"><img src="'+baseUrl+'assets/img/fb-w.png"></a></li><li><a href="javascript:void(0)" class="social-icon-top tw-user-profile" data-qualified="'+data.modal_data[0].olympic_qulified+'" data-username="'+data.modal_data[0].name+'"><img src="'+baseUrl+'assets/img/tw-w.png"></a></li>';
                  mobileFBSocialHtml += '<a href="http://garvhai.in" class="social-icon-top fb-user-profile" data-desc="'+fbDesc+'" data-title="'+data.modal_data[0].name+'" data-image="'+baseUrl+'uploads/'+data.modal_data[0].profile_photo+'"><img src="'+baseUrl+'assets/img/fb-w.png"></a>';
                  mobileTWSocialHtml += '<a href="javascript:void(0)" class="social-icon-top tw-user-profile" data-qualified="'+data.modal_data[0].olympic_qulified+'" data-username="'+data.modal_data[0].name+'"><img src="'+baseUrl+'assets/img/tw-w.png"></a>';
                    $('.hero-detail-inner-media').addClass('hidden');
                    $('.hero-detail-inner-profile').removeClass('hidden');
                    $('#hero-support-name').text('Support '+data.modal_data[0].name);
                    $('.hero-detail-social-icon .list-inline').html(socialHtml);
                    $('.socil-btn-mob').html(mobileFBSocialHtml);
                    $('.socil-btn-mob-tw').html(mobileTWSocialHtml);
                    
                    mediaHtml += '<div class="hero-detail-middle-name text-uppercase">'+data.modal_data[0].name+'</div>'+data.modal_data[0].contest+'<br />'+data.modal_data[0].championship;
                    $('#profileReplaceData').html(mediaHtml);
                }else if(playerMode == 'videos'){
                    $('.hero-detail-inner-media').addClass('hidden');
                    $('.hero-detail-inner-profile').removeClass('hidden');
                }else if(playerMode == 'media'){
                    $('.hero-detail-inner-profile').addClass('hidden');
                    $('.hero-detail-inner-media').removeClass('hidden');
                    $.each( data, function( index, mediaValue ) { 
                      for(var i=0; i<mediaValue.length; i++){
                        var published_date = converter(mediaValue[i].published_date);
                        mediaHtml += '<div class="media-item"><div class="media-discrp"><div class="media-discrp-txt"><a href="'+mediaValue[i].link+'" target="blank">'+mediaValue[i].description+'</a></div><div class="media-discrp-date">'+published_date+'</div></div><div class="media-social-icon"><ul class="list-inline"><li><a href="'+mediaValue[i].link+'" data-desc="'+mediaValue[i].media_value+'" data-title="'+mediaValue[i].name+'" data-image="'+baseUrl+'uploads/'+mediaValue[i].profile_photo+'" class="social-icon-top fb-user-profile"><img src="'+baseUrl+'assets/img/fb-w.png"></a></li><li><a href="#" data-title="'+mediaValue[i].name+'"  data-href="'+mediaValue[i].link+'" data-desc="'+mediaValue[i].media_value+'" data-qualified="'+mediaValue[i].olympic_qulified+'" class="social-icon-top tw-user-media"><img src="'+baseUrl+'assets/img/tw-w.png"></a></li></ul></div></div>';
                      }
                    }); 
                    $('#'+divToReplace).html(mediaHtml);
                }
                $('body').removeClass('loading');
              }
            }
          });
        }
      }

      function converter(s) {
          var months = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'];
          s =  s.replace(/-/g, '/');
          var d = new Date(s);
          return months[d.getMonth()] + ' ' + d.getDate() + ', ' + d.getFullYear();
      }
    </script>

    <div id="fb-root"></div>
    <script>
    window.fbAsyncInit = function(){
      FB.init({
          appId: '197178750676127', status: true, cookie: true, xfbml: true }); 
      };
      (function(d, debug){var js, id = 'facebook-jssdk', ref = d.getElementsByTagName('script')[0];
          if(d.getElementById(id)) {return;}
          js = d.createElement('script'); js.id = id; 
          js.async = true;js.src = "//connect.facebook.net/en_US/all" + (debug ? "/debug" : "") + ".js";
          ref.parentNode.insertBefore(js, ref);}(document, /*debug*/ false));
      function postToFeed(title, desc, url, image){
      var obj = {method: 'feed',link: url, picture: image,name: title,description: desc};
      function callback(response){}
      FB.ui(obj, callback);
      }

      $('body').on('click','.btnShare', function(e){
        elem = $(this);
        postToFeed(elem.data('title'), elem.data('desc'), elem.prop('href'), elem.data('image'));
        return false;
      });
    </script>
  </body>
</html>