<div class="candidates form">
<?php echo $form->create('Candidate');?>
	<fieldset>
 		<legend><?php __('Add Candidate');?></legend>
	<?php
		echo $form->input('name');
		echo $form->input('position_id');
		echo $form->input('image_url');
		echo $form->input('votes');
	?>
	</fieldset>
<?php echo $form->end('Submit');?>
</div>
<div class="actions">
	<ul>
		<li><?php echo $html->link(__('List Candidates', true), array('action' => 'index'));?></li>
		<li><?php echo $html->link(__('List Positions', true), array('controller' => 'positions', 'action' => 'index')); ?> </li>
		<li><?php echo $html->link(__('New Position', true), array('controller' => 'positions', 'action' => 'add')); ?> </li>
	</ul>
</div>
