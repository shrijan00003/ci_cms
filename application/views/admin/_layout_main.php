<?php $this->load->view('admin/components/page_head') ?>
  <body>
    <!-- ==========================navbar========================= -->
 
  <nav class="navbar navbar-inverse navbar-static-top" style="position:fixed;width:100%;">
    <div class="container-fluid">
      <!-- Brand and toggle get grouped for better mobile display -->
      <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="<?php echo base_url('admin/dashboard')?>">
			<img src="<?php echo base_url('images/logo.png');?>" style="width:140px;margin-top:-13px;margin-left:20px;"/>
		</a>
      </div>
	  <form class="navbar-form navbar-left">
          <div class="form-group">
            <!--<input type="text" class="form-control" placeholder="Search">-->
          </div>
          <!--<button type="submit" class="btn btn-default">Submit</button>-->
        </form>
		<ul class="nav navbar-nav navbar-right" >
          <li><a href="#"> </a></li>

          <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">

               Last logged in<?php 
               
                 $date = date_create($this->session->last_login);

                  $interval = date_diff(date_create(), date_create($this->session->last_login));
                
                   if(0!=$interval->format("%d") && 0!=$interval->format("%i") && 0==$interval->format("%d")){

                      echo $interval->format("%H Hrs %i mins ago,");
                   
                   }else if(0==$interval->format("%d") && 0!=$interval->format("%i") && 0==$interval->format("%d")){

                      echo $interval->format(" %i mins ago,");
                   
                   }else if(0!=$interval->format("%d") && 0!=$interval->format("%i") && 0!=$interval->format("%d")){

                      echo $interval->format("%d days %H Hrs %i mins ago,");
                   }else{

                      echo " a while ago,";
                   }

                  

                  ?>

              &nbsp;Hello <?php echo $this->session->username;?> <span class="caret"></span></a>
            <ul class="dropdown-menu">
              <li><a href="<?php echo base_url('admin/user/logout'); ?>"><i class="fa fa-sign-out" aria-hidden="true"></i><span> Logout</span></a></li>
             <li><a href="#" aria-label="Settings"><i class="fa fa-cog" aria-hidden="true"></i><span> Setting</span></a></li>
              <!--<li><a href="#">Something else here</a></li>-->
              <li role="separator" class="divider"></li>
              <?php 
                $date = date_create($this->session->last_login);

                $interval = date_diff(date_create(), date_create($this->session->last_login));
              //echo $interval->format("You are  %Y Year, %M Months, %d Days, %H Hours, %i Minutes, %s Seconds Old");



              //$new_format = date_format($date,"M-d-Y");
            ?>
            
               <li><p style="margin-left:15px;">Last logged in on <br/>
              <?php 
                   if(0!=$interval->format("%d") && 0!=$interval->format("%i") && 0==$interval->format("%d")){

                      echo $interval->format("%H Hrs %i mins ago");
                   
                   }else if(0==$interval->format("%d") && 0!=$interval->format("%i") && 0==$interval->format("%d")){

                      echo $interval->format(" %i mins ago");
                   
                   }else if(0!=$interval->format("%d") && 0!=$interval->format("%i") && 0!=$interval->format("%d")){

                      echo $interval->format("%d days %H Hrs %i mins ago");
                   }else{

                      echo "A while ago";
                   }

                  

                  ?></p>
             </li>
            </ul>
          </li>
        </ul>
      </div>
      </nav>
	<aside class="sidebar-left" style="margin-top:51px;position:fixed;">
	<nav class="navbar navbar-inverse navbar-static-top" >
    <div class="container-fluid">
      <!-- Collect the nav links, forms, and other content for toggling -->
      <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
	  
        <ul class="sidebar-menu">
			 <li class="header">MAIN MENUS</li>
			  <!--<li class="active"><a href="#">Link <span class="sr-only">(current)</span></a></li>-->
			  
			  <li><a href="<?php echo base_url('admin/dashboard');?>"><i class="fa fa-dashboard"></i><span>Dashboard</span></a></li>
			  
		
			  
        <li class="treeview">
        <a href="#">
                <i class="fa fa-pencil-square-o" aria-hidden="true"></i> <span>Articles</span> <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                  <li><a href="<?php echo base_url('admin/article/edit');?>"><span class="glyphicon glyphicon-pencil"> New article</span></a></li>
                  <li><a href="<?php echo base_url('admin/article');?>"><span class="glyphicon glyphicon-list-alt"> Article list</span></a></li>
                 
                </ul>
        </li>

       <?php if(is_allowed('Admin')): ?>
        <li class="treeview">
        <a href="#">
                <i class="fa fa-files-o"></i> <span>Pages</span> <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                  <li><a href="<?php echo base_url('admin/page/edit');?>"><span class="glyphicon glyphicon-plus"> Add pages</span></a></li>
                  <li><a href="<?php echo base_url('admin/page');?>"><i class="fa fa-files-o"></i> Current pages</a></li>
                  <li><a href="<?php echo base_url('admin/page/order');?>"><i class="fa fa-bars"></i> Order pages</a></li>
                 
                </ul>
        </li>

        <li class="treeview">
        <a href="#">
                <i class="fa fa-play-circle" aria-hidden="true"></i> <span>Advertisment</span> <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                 
                  <li><a href="<?php echo base_url('admin/advertisment/viewads');?>"><i class="fa fa-circle-o"></i> View Ads</a></li>
                  <li><a href="<?php echo base_url('admin/advertisment/positions');?>"><i class="fa fa-circle-o"></i> Positions</a></li>
                </ul>
        </li>
       
		  
        <li class="treeview">
        <a href="#">
               <i class="fa fa-users" aria-hidden="true"></i></i> <span>Users</span> <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                  <li><a href="<?php echo base_url('admin/user/edit/admin');?>"><span class="glyphicon glyphicon-user">&nbsp;Add admin</span></a></li>
                   <li><a href="<?php echo base_url('admin/user/edit/editor');?>"><span class="glyphicon glyphicon-user">&nbsp;Add editor</span></a></li>
                 
                  <li><a href="<?php echo base_url('admin/user');?>"><span class="glyphicon glyphicon-list-alt"> Users list</span></a></li>
               </ul>
        </li>
        <!--<li><a href="#" aria-label="Settings"><i class="fa fa-cog" aria-hidden="true"></i><span>Setting</span></a></li>
			  <!--<li><a href="#"><i class="fa fa-files-o"></i><span><?php //echo anchor('admin/page','Pages');?></span></li>
			  <li><i class="fa fa-newspaper-o" aria-hidden="true"></i><?php //echo anchor('admin/article','News Article');?></li>
			  <li><?php //echo anchor('admin/page/order','Order Pages');?></li>
			  <li><?php //echo anchor('admin/user','Users');?></li>-->
			  
			 <?php endif; ?>
			  
			  
            
        </ul>
        
        
      </div><!-- /.navbar-collapse -->
	
    </div><!-- /.container-fluid -->
</nav>
 </aside>

    <!-- ================================navbar ends=================== -->
   <div class='content container-fluid'>
      <div class="col-sm-12" style="background-color:;">
       
       
          <!-- main content -->
          <section style="margin-top:75px;">
            <?php $this->load->view($subview); ?>
          </section>
        
      </div>
      <!-- end of main row -->
    </div>
    <!-- end of main container -->
    <?php $this->load->view('admin/components/page_tail') ?>
	<script>
      $('.sidebar-menu').SidebarNav()
    </script>
