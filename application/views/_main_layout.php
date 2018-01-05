<!-- this is front end main layout -->
<?php $this->load->view('components/page_head') ?>
<body id="top">

<header>
<!-- navbar -->
	<
	<div class="logo" >
	  	<section class="container" style="padding:0px;">
	  		<!--<span style="color:lightgray;font-size:16px;margin:0px;font-family:calibri;"><i class="fa fa-clock-o" aria-hidden="true"></i>&nbsp;<?php echo date("l, d, M, Y");?></span>
	       -->
	       <h2><a href="<?php echo base_url()?>"><img style='width: 280px;margin-bottom:35px;margin-top:-20px;' src='<?php echo base_url('images/logo1.gif')?>'></a>
	       <?php //echo anchor('',strtoupper(config_item('site_name'))); ?>
	      <!--- <p><span class="top_mennu">
	       	<a href="<?php echo site_url('contact');?>">About</a>
	       		&nbsp;&nbsp;|&nbsp;&nbsp;<a href="#">Team</a>


	       	</span></p>-->

	       		<?php

					$position = array();
					if (count($pos)): foreach ($pos as $po):

							$position[$po->p_id] = $po;
							
					endforeach; endif; 
					$count = 0;
					
					if (count($ads)){

						foreach ($ads as $ad){

							if($position[8]->p_id == $ad->position && $ad->status==1){ ?>

								<img style="float:right;width:600px; margin-top:-38px;" src="<?php echo base_url('images/'.$ad->img);?>"/>
								<?php $count++;
							}

						}

						if($count==0) { ?>

							<div style="float:right;width:600px; margin-top:-38px;"><h2 style="color:white;">Advertisment <?php echo $position[8]->size;?></h2></div>
							
						<?php }

					}else{ ?>
						<div style="float:right;width:600px; margin-top:-38px;"><h2 style="color:white;">Advertisment <?php echo $position[8]->size;?></h2></div>
							
					<?php }
				?>
	      
	  	</section>
	</div>
<!-- ============================ -->
	<div class="menu" >
		 <nav class="navbar navbar-inverse navbar-static-top"  >
		    <div class="container" style="padding:0px;" >
		      <!-- Brand and toggle get grouped for better mobile display -->
		      <div class="navbar-header">
		        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
		          <span class="sr-only">Toggle navigation</span>
		          <span class="icon-bar"></span>
		          <span class="icon-bar"></span>
		          <span class="icon-bar"></span>
		        </button>
		       
		      </div>

		      <!-- Collect the nav links, forms, and other content for toggling -->
		      <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
		        <ul class="nav navbar-nav" >
		            <?php echo get_menu($menu);//passing $menu that we have created at front_end controller ?>
		        </ul>
		       
		      </div><!-- /.navbar-collapse -->
		    </div><!-- /.container-fluid -->
		</nav>
	</div>
</header>
<!-- navbar ends -->
<div class="container" >
    <?php $this->load->view('templates/'.$subview) ?>
	
</div>
<footer>
	<div class="navbar navbar-inverse" style="width:100%;border:none;border-radius:0px;">
  		<section class="container" >
  			<img src="<?php echo base_url('images/logo1.gif');?>" style="width:160px;" />
  			<div class="social">
  				<a href="http://www.facebook.com" target="_blank"><img src="<?php echo base_url('images/fb.png');?>"  /></a>
  				<a href="http://www.twitter.com" target="_blank"><img src="<?php echo base_url('images/tw.png');?>"  /></a>
  				<a href="http://www.youtube.com" target="_blank"><img src="<?php echo base_url('images/yt.png');?>"  /></a>
  			
  			</div>
  		<section>
  	</div>
  	<section class="container" >
  		<div class="col-sm-4" >
  			<div class="foot_text">
  				<br/>
  				<p>News++, HelloWorld Building</p>
  				<p>Putalisadak, Kathmandu</p><br/>

  				<p><i class="fa fa-phone" aria-hidden="true"></i>&nbsp;&nbsp;01-0738456 / 4523114</p>
  				<p><a href="mailto:someone@example.com"><i class="fa fa-envelope" aria-hidden="true"></i>&nbsp;&nbsp;admin@news++.com</a></p>
  				<p><a href="mailto:someone@example.com"><i class="fa fa-envelope" aria-hidden="true"></i>&nbsp;&nbsp;info@news++.com</a></p>
  				<p><a href="mailto:someone@example.com"><i class="fa fa-envelope" aria-hidden="true"></i>&nbsp;&nbsp;custumer_services@news++.com</a></p>

  			</div>
  			<div class="vertical_line">
  			</div>
  		</div>
  		
  		<div class="col-sm-4" >
  			<div class="foot_text">
  				<h3>Quick Links<h3>
		            <?php echo get_menu($menu);//passing $menu that we have created at front_end controller ?>
  			</div>
  			<div class="vertical_line">
  			</div>
  		</div>
  		
  		<div class="col-sm-4">
  			<div class="foot_text">
  				<h3 >News++ Team<h3>
  				<h4 style="color:#e60000;">Developer</h4>
  				<p>Mr. Shrijan Tripathi <br>Student BIT VIth KCC</p>
  				<p>Mr. Akash Rai <br>Student BIT VIth KCC</p>
  				
  				<h4 style="color:#e60000;">Concept</h4>
  				<p> Mr. Shrijan Tripathi<br>Student BIT VIth KCC</p>

  				<h4 style="color:#e60000;">Supervisor</h4>
  				<p> Mr. Rubin Shrestha <br>Teaching staff, KCC</p><br/><br/>
		    </div>
  			<div class="foot_text" style="margin-left:30px;margin-top:55px;">
  				<h4 style="color:#e60000;">Frontend Tools</h4>
  				<p>HTML / HTML5</br>CSS / CSS 3<br>Bootstrap<br/>Javascript <br>Jquery</p>
		           
		         <h4 style="color:#e60000;">Backend Tools</h4>
  				<p>PHP (Codeignitor)<br>MySQL Database </p>
  			</div>
  		</div>

  		<hr class="hr"/>
  		<p style="text-align:center;">&copy; 2017News++ Project, KCC, BIT V <br/>Developed & Maintained by Akash Rai & Shrijan Tirpathi</p>
  	</section>


</footer>
<?php $this->load->view('components/page_tail') ?>
<script>
		function openNews(evt, type) {
			var i, tabcontent, tablinks;
			tabcontent = document.getElementsByClassName("tabcontent");
			for (i = 0; i < tabcontent.length; i++) {
				tabcontent[i].style.display = "none";
			}
			tablinks = document.getElementsByClassName("tablinks");
			for (i = 0; i < tablinks.length; i++) {
				tablinks[i].className = tablinks[i].className.replace(" active", "");
			//	document.getElementById(type).style.border = "none";
			}
			document.getElementById(type).style.display = "block";
			evt.currentTarget.className += " active";

		}
		//getting default news on sidebar
		document.getElementById("defaultOpen").click(); 

		$('.menu').addClass('original').clone().insertAfter('.menu').addClass('cloned').css('position','fixed').css('top','0').css('margin-top','0').css('z-index','500').removeClass('original').hide();

		scrollIntervalID = setInterval(stickIt, 10);


		function stickIt() {

		  var orgElementPos = $('.original').offset();
		  orgElementTop = orgElementPos.top;               

		  if ($(window).scrollTop() >= (orgElementTop)) {
		    // scrolled past the original position; now only show the cloned, sticky element.

		    // Cloned element should always have same left position and width as original element.     
		    orgElement = $('.original');
		    coordsOrgElement = orgElement.offset();
		    leftOrgElement = coordsOrgElement.left;  
		    widthOrgElement = orgElement.css('width');
		    $('.cloned').css('left',leftOrgElement+'px').css('top',0).css('width',widthOrgElement).show();
		    $('.original').css('visibility','hidden');
		  } else {
		    // not scrolled past the menu; only show the original menu.
		    $('.cloned').hide();
		    $('.original').css('visibility','visible');
		  }
		}

		
	</script>
	<script type="text/javascript">
        // create the back to top button
        $('body').prepend('<a href="#" class="back-to-top">Back to Top</a>');

        var amountScrolled = 200;

        $(window).scroll(function () {
            if ($(window).scrollTop() > amountScrolled) {
                $('a.back-to-top').fadeIn('slow');
            } else {
                $('a.back-to-top').fadeOut('slow');
            }
        });

        $('a.back-to-top, a.simple-back-to-top').click(function () {
            $('html, body').animate({
                scrollTop: 0
            }, 700);
            return false;
        });
	</script>