<div class="positions view">
<h2><?php  __('Position');?></h2>
	<dl><?php $i = 0; $class = ' class="altrow"';?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Id'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $position['Position']['id']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Name'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $position['Position']['name']; ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<ul>
		<li><?php echo $html->link(__('Edit Position', true), array('action' => 'edit', $position['Position']['id'])); ?> </li>
		<li><?php echo $html->link(__('Delete Position', true), array('action' => 'delete', $position['Position']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $position['Position']['id'])); ?> </li>
		<li><?php echo $html->link(__('List Positions', true), array('action' => 'index')); ?> </li>
		<li><?php echo $html->link(__('New Position', true), array('action' => 'add')); ?> </li>
		<li><?php echo $html->link(__('List Candidates', true), array('controller' => 'candidates', 'action' => 'index')); ?> </li>
		<li><?php echo $html->link(__('New Candidate', true), array('controller' => 'candidates', 'action' => 'add')); ?> </li>
		<li><?php echo $html->link(__('List Groups', true), array('controller' => 'groups', 'action' => 'index')); ?> </li>
		<li><?php echo $html->link(__('New Group', true), array('controller' => 'groups', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php __('Related Candidates');?></h3>
	<?php if (!empty($position['Candidate'])):?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php __('Id'); ?></th>
		<th><?php __('Name'); ?></th>
		<th><?php __('Position Id'); ?></th>
		<th><?php __('Image Url'); ?></th>
		<th><?php __('Votes'); ?></th>
		<th class="actions"><?php __('Actions');?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($position['Candidate'] as $candidate):
			$class = null;
			if ($i++ % 2 == 0) {
				$class = ' class="altrow"';
			}
		?>
		<tr<?php echo $class;?>>
			<td><?php echo $candidate['id'];?></td>
			<td><?php echo $candidate['name'];?></td>
			<td><?php echo $candidate['position_id'];?></td>
			<td><?php echo $candidate['image_url'];?></td>
			<td><?php echo $candidate['votes'];?></td>
			<td class="actions">
				<?php echo $html->link(__('View', true), array('controller' => 'candidates', 'action' => 'view', $candidate['id'])); ?>
				<?php echo $html->link(__('Edit', true), array('controller' => 'candidates', 'action' => 'edit', $candidate['id'])); ?>
				<?php echo $html->link(__('Delete', true), array('controller' => 'candidates', 'action' => 'delete', $candidate['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $candidate['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $html->link(__('New Candidate', true), array('controller' => 'candidates', 'action' => 'add'));?> </li>
		</ul>
	</div>
</div>
<div class="related">
	<h3><?php __('Related Groups');?></h3>
	<?php if (!empty($position['Group'])):?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php __('Id'); ?></th>
		<th><?php __('Name'); ?></th>
		<th class="actions"><?php __('Actions');?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($position['Group'] as $group):
			$class = null;
			if ($i++ % 2 == 0) {
				$class = ' class="altrow"';
			}
		?>
		<tr<?php echo $class;?>>
			<td><?php echo $group['id'];?></td>
			<td><?php echo $group['name'];?></td>
			<td class="actions">
				<?php echo $html->link(__('View', true), array('controller' => 'groups', 'action' => 'view', $group['id'])); ?>
				<?php echo $html->link(__('Edit', true), array('controller' => 'groups', 'action' => 'edit', $group['id'])); ?>
				<?php echo $html->link(__('Delete', true), array('controller' => 'groups', 'action' => 'delete', $group['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $group['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $html->link(__('New Group', true), array('controller' => 'groups', 'action' => 'add'));?> </li>
		</ul>
	</div>
</div>
