$(document).ready(function(){
    var aChildren = $("#topNav .nav .page-scroll"); // find the a children of the list items
    var aArray = []; // create the empty aArray
    for (var i=0; i < aChildren.length; i++) {    
        var aChild = aChildren[i];
        var ahref = $(aChild).attr('data-href');
        aArray.push(ahref);
    } // this for loop fills the aArray with attribute href values

    $(window).scroll(function(){
      if(!$('body').hasClass('scroll-active')){
        var windowPos = $(window).scrollTop(); // get the offset of the window from the top of page
        var windowHeight = $(window).height(); // get the height of the window
        var docHeight = $(document).height();
        for (var i=0; i < aArray.length; i++) {
            var theID = aArray[i];
            var divPos = ($(theID).offset().top)-50; // get the offset of the div from the top of page
            var divHeight = $(theID).height(); // get the height of the div in question
			if ( (($('#hero-wrpr').offset().top)-50) < windowPos ) {
				$('#pause').removeClass('active');
				$('#pause').removeClass('pause-video-img');
				$('#pause').addClass('play-video-img');
				$('#play').addClass('active');				
				$('#play').removeClass('pause-video-img');
				$('#play').addClass('play-video-img');
				$('#youtube_player')[0].contentWindow.postMessage('{"event":"command","func":"' + 'pauseVideo' + '","args":""}', '*');
			}
            if (windowPos >= divPos && windowPos < (divPos + divHeight)) {
              	if(!$("a[data-href='" + theID + "']").parent('li').hasClass("logo-li")){
              	$("a[data-href='" + theID + "']").parent('li').addClass("nav-active");	
              	}
              	else{
              		$("#topNav .nav li").removeClass("nav-active");
              	}
                  
              } else {
                  $("a[data-href='" + theID + "']").parent('li').removeClass("nav-active");
              }
          }
        }       
      });
   });

    $('.js--jumper,.js--jumper-new').click(function(e){ 
      e.preventDefault();       
    
      
      $("body, html").animate({
            scrollTop: $($(this).data('href')).offset().top-40
      }, 600, 'easeInOutExpo');
   
   
    });
    $('#topNav .nav li .page-scroll').click(function(e){
      e.preventDefault(); 
    	var self=$(this)
      $('body').addClass('scroll-active');
      if($(window).width()>1023){
      	$("body, html").animate({
            scrollTop: $($(this).data('href')).offset().top-40
      }, 600, 'easeInOutExpo',function(){ 
      	if(!self.parent('li').hasClass('logo-li')){
      		$("#topNav .nav li").removeClass("nav-active");
	            self.parent('li').addClass('nav-active'); 
	            $('.page-scroll').removeClass('.active-menu-item');

      	}
      	else{
      		$("#topNav .nav li").removeClass("nav-active");
      	}	            
      });
      }
      else{
      	$("body, html").animate({
            scrollTop: $($(this).data('href')).offset().top-87
	      }, 600, 'easeInOutExpo',function(){ 
	      	if(!self.parent('li').hasClass('logo-li')){
	      		$("#topNav .nav li").removeClass("nav-active");
		            self.parent('li').addClass('nav-active'); 
		            $('.page-scroll').removeClass('.active-menu-item');

	      	}
	      	else{
	      		$("#topNav .nav li").removeClass("nav-active");
	      	}	            
      	});
      }
      
       setTimeout(function(){$('body').removeClass('scroll-active');}, 800);
      	

  })
$(document).ready(function(){

	$('input[name="players"]').change(function(e){
		e.preventDefault();
		e.stopPropagation();
		$('body').addClass('loading');
		var playerId = $("input[name='players']:checked").val();
		if(playerId){
			playerFilterData(playerId);
		}else{
			alert("Please checked atleast one value!");
			return false;
		}
		
	});	

	$('#mobileFilter').change(function(e){
		e.preventDefault();
		e.stopPropagation();
		$('body').addClass('loading');
		var playerId = $(this).val();
		if(playerId){
			playerFilterData(playerId);
		}else{
			alert("Please select atleast one value!");
			return false;
		}
		
	});	

	$('body').on('click','.light-box-overlay', function(e){
		e.preventDefault();
		var imageId = $(this).attr('data-id');
		$('.item').removeClass('active');
		$('#modalImg_'+imageId).addClass('active');
		$("#largeShare").attr({
	        "data-title" : $(this).attr('data-title'),
	        "data-image" : $(this).attr('data-image'),
	        "data-desc" : $(this).attr('data-desc')
	    });
        $("#fbShareData").attr({
	        "data-name" : $(this).attr('data-title'),
	        "data-description" : $(this).attr('data-desc')
	    });
	    $("#largeTWShare").attr("data-username",$(this).attr('data-title'));	    
	    $("#largeTWShare").attr("data-qualified",$(this).attr('data-qualified'));
	    $('#fbShareData').html('');
        $('#fbShareData').html('<a id="largeShare" href="http://garvhai.in" data-image="'+$(this).attr('data-image')+'" data-title="'+$(this).attr('data-title')+'" data-desc="'+$(this).attr('data-desc')+'" class="social-icon-top btnShare"><img src="'+baseUrl+'assets/img/fb-w.png"></a>');

	    $('#myModal').modal('show');
	});
});
$('#carousel-example-generic').bind('slid.bs.carousel', function (e) {
        $('#fbShareData').html('');
        $('#fbShareData').html('<a id="largeShare" href="http://garvhai.in" data-image="'+$('#carousel-example-generic').find('.active').find('img').attr('src')+'" data-title="'+$("#fbShareData").attr('data-name')+'" data-desc="'+$("#fbShareData").attr('data-description')+'" class="social-icon-top btnShare"><img src="'+baseUrl+'assets/img/fb-w.png"></a>');
	//$("#largeShare").attr('data-image',$('#carousel-example-generic').find('.active').find('img').attr('src'));
    
})
function playerFilterData(playerID){
	if(playerID){
		$.ajax({
	  		  url: "index.php/home/player_filter_data",
	          type: 'POST',            
	          data: { 'playerId': playerID },
	          dataType: "json",
	          success: function(data) {
	          	var filterHtml = '';
	          	var modalInnerHtml = '';
	          	if($.trim(data) != "") { 
	          		if(data.filter_data.length != 0) {
		          		$.each( data, function( index, filterValue ) { 
		          			for(var i=0; i<filterValue.length; i++){
		          				var fbDesc = '';
		          				filterHtml += '<div class="col-xs-4 col-xs-20 light-box-wrpr"><div class="row">';
		          				if(filterValue[i].olympic_qulified == 1){
				                    fbDesc += 'Proud to support '+filterValue[i].name+' in the Rio Olympics 2016. #GarvHai by #Adani';
				                  }else{
				                    fbDesc += 'Proud to support '+filterValue[i].name+'. #GarvHai by #Adani';
				                  }
		          				if(filterValue[i].type == 'image'){
		          					entryArray = filterValue[i].media_value.split('.');
		          					filterHtml += '<a><img src="'+baseUrl+'uploads/'+filterValue[i].media_value+'" class="full-width-img"><div class="light-box-overlay image-overlay" data-id="'+filterValue[i].id+'" data-desc="'+fbDesc+'" data-title="'+filterValue[i].name+'" data-qualified="'+filterValue[i].olympic_qulified+'" data-image="'+baseUrl+'uploads/'+entryArray[0]+'-l.jpg"></div></a>';
		          					modalInnerHtml += '<div class="item" id="modalImg_'+filterValue[i].id+'"><img src="'+baseUrl+'uploads/'+filterValue[i].media_value.split('.', 1)+'-l.jpg"></div>';
		          				}else if(filterValue[i].type == 'video'){
		          					filterHtml += '<a href="#"><img src="'+baseUrl+'uploads/'+filterValue[i].video_thumbnail+'" class="full-width-img"><div class="light-box-overlay video-overlay" data-id="'+filterValue[i].id+'"></div></a>';
		          					modalInnerHtml += '<div class="item" id="modalImg_'+filterValue[i].id+'"><div class="embed-responsive embed-responsive-16by9"><iframe class="embed-responsive-item" src="'+filterValue[i].media_value+'" frameborder="0" allowfullscreen></iframe></div></div>';
		          				}
                 				filterHtml += '</div></div>';
		          			}
		          		}); 
					}else{
						filterHtml += '<h3 style="text-align:center">No videos/images found for this athlete!!!</h3>';
					}
					$('.replace-filter-data').html(filterHtml);
					$('.carousel-inner').html(modalInnerHtml);
					$('body').removeClass('loading');
				}
	          }
	        });
	}
}
