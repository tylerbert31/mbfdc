<div class="messages view">
	<h2>
		<?php echo __('Message'); ?>
	</h2>
	<dl>
		<dt>
			<?php echo __('Id'); ?>
		</dt>
		<dd>
			<?php echo h($message['Message']['id']); ?>
			&nbsp;
		</dd>
		<dt>
			<?php echo __('Sender'); ?>
		</dt>
		<dd>
			<?php echo h($message['Message']['sender']); ?>
			&nbsp;
		</dd>
		<dt>
			<?php echo __('Receiver'); ?>
		</dt>
		<dd>
			<?php echo h($message['Message']['receiver']); ?>
			&nbsp;
		</dd>
		<dt>
			<?php echo __('Message Content'); ?>
		</dt>
		<dd>
			<?php echo h($message['Message']['message_content']); ?>
			&nbsp;
		</dd>
		<dt>
			<?php echo __('Timestamp'); ?>
		</dt>
		<dd>
			<?php echo h($message['Message']['timestamp']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3>
		<?php echo __('Actions'); ?>
	</h3>
	<ul>
		<li>
			<?php echo $this->Html->link(__('Edit Message'), array('action' => 'edit', $message['Message']['id'])); ?>
		</li>
		<li>
			<?php echo $this->Form->postLink(__('Delete Message'), array('action' => 'delete', $message['Message']['id']), array('confirm' => __('Are you sure you want to delete # %s?', $message['Message']['id']))); ?>
		</li>
		<li>
			<?php echo $this->Html->link(__('List Messages'), array('action' => 'index')); ?>
		</li>
		<li>
			<?php echo $this->Html->link(__('New Message'), array('action' => 'add')); ?>
		</li>
	</ul>
</div>