<div class="candidates index">
<h2><?php __('Candidates');?></h2>
<p>
<?php
echo $paginator->counter(array(
'format' => __('Page %page% of %pages%, showing %current% records out of %count% total, starting on record %start%, ending on %end%', true)
));
?></p>
<table cellpadding="0" cellspacing="0">
<tr>
	<th><?php echo $paginator->sort('id');?></th>
	<th><?php echo $paginator->sort('name');?></th>
	<th><?php echo $paginator->sort('position_id');?></th>
	<th><?php echo $paginator->sort('image_url');?></th>
	<th class="actions"><?php __('Actions');?></th>
</tr>
<?php
$i = 0;
foreach ($candidates as $candidate):
	$class = null;
	if ($i++ % 2 == 0) {
		$class = ' class="altrow"';
	}
?>
	<tr<?php echo $class;?>>
		<td>
			<?php echo $candidate['Candidate']['id']; ?>
		</td>
		<td>
			<?php echo $candidate['Candidate']['name']; ?>
		</td>
		<td>
			<?php echo $html->link($candidate['Position']['name'], array('controller' => 'positions', 'action' => 'view', $candidate['Position']['id'])); ?>
		</td>
		<td>
			<?php echo $candidate['Candidate']['image_url']; ?>
		</td>
		<td class="actions">
			<?php echo $html->link(__('View', true), array('action' => 'view', $candidate['Candidate']['id'])); ?>
			<?php echo $html->link(__('Edit', true), array('action' => 'edit', $candidate['Candidate']['id'])); ?>
			<?php echo $html->link(__('Delete', true), array('action' => 'delete', $candidate['Candidate']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $candidate['Candidate']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
</table>
</div>
<div class="paging">
	<?php echo $paginator->prev('<< '.__('previous', true), array(), null, array('class'=>'disabled'));?>
 | 	<?php echo $paginator->numbers();?>
	<?php echo $paginator->next(__('next', true).' >>', array(), null, array('class' => 'disabled'));?>
</div>
<div class="actions">
	<ul>
		<li><?php echo $html->link(__('New Candidate', true), array('action' => 'add')); ?></li>
		<li><?php echo $html->link(__('List Positions', true), array('controller' => 'positions', 'action' => 'index')); ?> </li>
		<li><?php echo $html->link(__('New Position', true), array('controller' => 'positions', 'action' => 'add')); ?> </li>
	</ul>
</div>
