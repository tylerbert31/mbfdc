<div class="messages index">
	<h2>
		<?php echo __('Messages'); ?>
	</h2>
	<table class="table table-striped">
		<thead>
			<tr>
				<th>
					<?php echo $this->Paginator->sort('id'); ?>
				</th>
				<th>
					<?php echo $this->Paginator->sort('sender'); ?>
				</th>
				<th>
					<?php echo $this->Paginator->sort('receiver'); ?>
				</th>
				<th>
					<?php echo $this->Paginator->sort('message_content'); ?>
				</th>
				<th>
					<?php echo $this->Paginator->sort('timestamp'); ?>
				</th>
				<th class="actions">
					<?php echo __('Actions'); ?>
				</th>
			</tr>
		</thead>
		<tbody>
			<?php foreach ($messages as $message): ?>
				<tr>
					<td>
						<?php echo h($message['Message']['id']); ?>&nbsp;
					</td>
					<td>
						<?php echo h($message['Message']['sender']); ?>&nbsp;
					</td>
					<td>
						<?php echo h($message['Message']['receiver']); ?>&nbsp;
					</td>
					<td>
						<?php echo h($message['Message']['message_content']); ?>&nbsp;
					</td>
					<td>
						<?php echo h($message['Message']['timestamp']); ?>&nbsp;
					</td>
					<td class="actions">
						<?php echo $this->Html->link(__('View'), array('action' => 'view', $message['Message']['id']), array('class' => 'btn btn-primary')); ?>
						<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $message['Message']['id']), array('class' => 'btn btn-secondary')); ?>
						<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $message['Message']['id']), array('class' => 'btn btn-danger', 'confirm' => __('Are you sure you want to delete # %s?', $message['Message']['id']))); ?>
					</td>
				</tr>
			<?php endforeach; ?>
		</tbody>
	</table>
	<p>
		<?php
		echo $this->Paginator->counter(
			array(
				'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
			)
		);
		?>
	</p>
	<div class="paging">
		<?php
		echo $this->Paginator->prev('< ' . __('previous'), array(), null, array('class' => 'prev disabled'));
		echo $this->Paginator->numbers(array('separator' => ''));
		echo $this->Paginator->next(__('next') . ' >', array(), null, array('class' => 'next disabled'));
		?>
	</div>
</div>
<div class="actions">
	<h3>
		<?php echo __('Actions'); ?>
	</h3>
	<ul>
		<li>
			<?php echo $this->Html->link(__('New Message'), array('action' => 'add'), array('class' => 'btn btn-success')); ?>
		</li>
	</ul>
</div>