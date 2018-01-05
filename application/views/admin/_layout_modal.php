<?php $this->load->view('admin/components/page_head') ?>
<body style="background:#555;">
<div class="container" >
  <div class="modal show" id="myModal" role="dialog" >
    <div class="modal-dialog" style="max-width:400px;"> 
	<div style="width:100%;margin:auto;background:transparent;text-align:center;margin-top:50px;">
		<p style="margin-top:0px;"><img src="<?php echo base_url('images/logo.png');?>" style="width:180px;margin:auto;"/></p>
	</div>
      <!-- Modal content-->
      <div class="modal-content" style="border-radius:0px;">
        <?php $this->load->view($subview);//subview is set in the controller ?>
        <div class="modal-footer">
          &copy; <?php echo $meta_title;?>
        </div>
      </div>
      
    </div>
  </div>
  
</div>
<?php $this->load->view('admin/components/page_tail') ?>



