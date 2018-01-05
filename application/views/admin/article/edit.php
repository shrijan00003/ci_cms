<h1><?php echo empty($article->id)?'Insert article':'Edit article:'.' '.$article->title; ?></h1>
<?php echo validation_errors();//we need to load form validation libery ?>
<?php 
	if ($this->session->flashdata('errors')) {
		echo '<h3 style="color:red;">'.$this->session->flashdata('errors').'</h3>';
	}
 ?>
<?php echo form_open_multipart(); ?>
<table class="table">
	<tr>
		<td style="width:200px">Publication Date</td>
		<td><?php echo form_input('pubdate',set_value('pubdate',$article->pubdate),'class="datepicker"'); ?></td>
	</tr>
	<tr>
		<td>Title</td>
		<td><?php echo form_input('title',set_value('title',$article->title),'class="size_of_form_elements"'); ?></td>
	</tr>
	<tr>
		<td>Category</td>
		<td><?php echo form_dropdown('category',$pages_without_parent,$this->input->post('parent_id')?$this->input->post('parent_id'):$page->parent_id,'class="size_of_form_elements"');?></td>
	</tr>
	<tr>
		<td>Feature Image</td>
		<td><?php echo form_upload ('userfile',set_value('userfile',$article->userfile),'class="size_of_form_elements"');?></td>
	</tr>
	<tr>
		<td>Slug</td>
		<td><?php echo form_input('slug',set_value('slug',$article->slug),'class="size_of_form_elements"'); ?></td>
	</tr>
	<tr>
		<td>Body</td>
		<td><?php echo form_textarea('body',html_entity_decode(set_value('body',$article->body)),'class="tiny_mce"','style="width:80%;"'); ?></td>
	</tr>
	<tr>
		<td></td>
		<td><?php echo form_submit('submit','Update article','class="btn  btn-primary"') ?></td>
	</tr>
</table>		
<?php echo form_close(); ?>
<script type="text/javascript">
	$(function(){
		$('.datepicker').datepicker({format:'yyyy-mm-dd'});
	});

	bkLib.onDomLoaded(function() {
       	new nicEditor({fullPanel : true}).panelInstance('textarea_news');
	});
</script>
