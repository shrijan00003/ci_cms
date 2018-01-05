<!-- this is subview for displaying pages -->
<?php if(is_allowed('Admin')){ ?>
<section>
	<h2>Pages</h2>
	<hr/>
	<span class="btn btn-default"><?php echo anchor('admin/page/edit','<span class="glyphicon glyphicon-plus-sign"></span>Add page'); ?></span>
	<table class="table table-striped">
		<thead>
			<tr>
				<th>Title</th>
				<th>Parent</th>
				<th>Edit</th>
				<th>Delete</th>
			</tr>
		</thead>
		<tbody>
		<?php if(count($pages)): foreach($pages as $page): ?>
			<tr>
				<td><?php echo anchor('admin/page/edit/'.$page->id,$page->title) ?></td>
				<?php if(isset($page->parent_slug)): ?>
					
					<td><?php echo $page->parent_slug; ?></td>

				<?php else : ?>

					<td>N/A</td>

				<?php endif; ?>
				
				<td><?php echo btn_edit('admin/page/edit/'.$page->id); ?></td>
				<td><?php echo btn_delete('admin/page/delete_page/'.$page->id); ?></td>
			</tr>
		<?php endforeach; ?>
		<?php else:  ?>
			<tr>
				<td colspan="3">We could not find any pages</td>
			</tr>
		<?php endif; ?>
		</tbody>
	</table>

</section>
<?php } else{

	redirect('admin/dashboard/resultnotfound');

}?>