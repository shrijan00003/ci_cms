
<?php if(is_allowed('Admin')){ ?>
<h3><?php echo empty($page->id)?'Insert page':'Edit page:'.' '.$page->title; ?></h3>
<?php echo validation_errors();//we need to load form validation libery ?>
<?php 
	if ($this->session->flashdata('errors')) {
		echo '<h3 style="color:red;">'.$this->session->flashdata('errors').'</h3>';
	}
 ?>
<?php echo form_open(); ?>
<table class="table">
	<tr>
		<td>Parent</td>
		<td><?php echo form_dropdown('parent_id',$pages_without_parent,$this->input->post('parent_id')?$this->input->post('parent_id'):$page->parent_id,'class="size_of_form_elements"');?></td>
	</tr>
	<tr>
		<td>Template</td>
		<td><?php echo form_dropdown('template',array('page'=>'Page','news_archive'=>'News Archive','homepage'=>'Homepage'),$this->input->post('template')?$this->input->post('template'):$page->template,'class="size_of_form_elements"');?></td>
	</tr>
	<tr>
		<td>Title</td>
		<td><?php echo form_input('title',set_value('title',$page->title),'class="size_of_form_elements"'); ?></td>
	</tr>
	<tr>
		<td>Slug</td>
		<td><?php echo form_input('slug',e(set_value('slug',$page->slug)),'class="size_of_form_elements"'); ?></td>
	</tr>
	<tr>
		<td>Body</td>
		<td><?php echo form_textarea('body',html_entity_decode(set_value('body',$page->body)),'class="tiny_mce"','style="width:80%;"'); ?></td>
	</tr>
	<tr>
		<td></td>
		<td><?php echo form_submit('submit','Update Page','class="btn  btn-primary"') ?></td>
	</tr>
</table>	


<?php echo form_close(); ?>

<?php } else{

	redirect('admin/dashboard/resultnotfound');

}?>
<script type="text/javascript">
	bkLib.onDomLoaded(function() {
       	new nicEditor({fullPanel : true}).panelInstance('textarea_news');
	});
</script>


