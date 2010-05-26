<div class="positions form">
<?php echo $form->create('Position');?>
	<fieldset>
 		<legend><?php __('Edit Position');?></legend>
	<?php
		echo $form->input('id');
		echo $form->input('name');
		echo $form->input('Group');
	?>
	</fieldset>
<?php echo $form->end('Submit');?>
</div>
<div class="actions">
	<ul>
		<li><?php echo $html->link(__('Delete', true), array('action' => 'delete', $form->value('Position.id')), null, sprintf(__('Are you sure you want to delete # %s?', true), $form->value('Position.id'))); ?></li>
		<li><?php echo $html->link(__('List Positions', true), array('action' => 'index'));?></li>
		<li><?php echo $html->link(__('List Candidates', true), array('controller' => 'candidates', 'action' => 'index')); ?> </li>
		<li><?php echo $html->link(__('New Candidate', true), array('controller' => 'candidates', 'action' => 'add')); ?> </li>
		<li><?php echo $html->link(__('List Groups', true), array('controller' => 'groups', 'action' => 'index')); ?> </li>
		<li><?php echo $html->link(__('New Group', true), array('controller' => 'groups', 'action' => 'add')); ?> </li>
	</ul>
</div>
