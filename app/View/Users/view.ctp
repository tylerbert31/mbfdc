<div class="users view">
	<h2>
		<?php echo __('User'); ?>
	</h2>
	<dl>
		<dt>
			<?php echo __('User Id'); ?>
		</dt>
		<dd>
			<?php echo h($user['User']['user_id']); ?>
			&nbsp;
		</dd>
		<dt>
			<?php echo __('Email'); ?>
		</dt>
		<dd>
			<?php echo h($user['User']['email']); ?>
			&nbsp;
		</dd>
		<dt>
			<?php echo __('Lastname'); ?>
		</dt>
		<dd>
			<?php echo h($user['User']['lastname']); ?>
			&nbsp;
		</dd>
		<dt>
			<?php echo __('Firstname'); ?>
		</dt>
		<dd>
			<?php echo h($user['User']['firstname']); ?>
			&nbsp;
		</dd>
		<dt>
			<?php echo __('Password'); ?>
		</dt>
		<dd>
			<?php echo h($user['User']['password']); ?>
			&nbsp;
		</dd>
		<dt>
			<?php echo __('Age'); ?>
		</dt>
		<dd>
			<?php echo h($user['User']['age']); ?>
			&nbsp;
		</dd>
		<dt>
			<?php echo __('Birthday'); ?>
		</dt>
		<dd>
			<?php echo h($user['User']['birthday']); ?>
			&nbsp;
		</dd>
		<dt>
			<?php echo __('Gender'); ?>
		</dt>
		<dd>
			<?php echo h($user['User']['gender']); ?>
			&nbsp;
		</dd>
		<dt>
			<?php echo __('Joined'); ?>
		</dt>
		<dd>
			<?php echo h($user['User']['joined']); ?>
			&nbsp;
		</dd>
		<dt>
			<?php echo __('Last Login'); ?>
		</dt>
		<dd>
			<?php echo h($user['User']['last_login']); ?>
			&nbsp;
		</dd>
		<dt>
			<?php echo __('Profile Url'); ?>
		</dt>
		<dd>
			<?php echo h($user['User']['profile_url']); ?>
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
			<?php echo $this->Html->link(__('Edit User'), array('action' => 'edit', $user['User']['user_id'])); ?>
		</li>
		<li>
			<?php echo $this->Form->postLink(__('Delete User'), array('action' => 'delete', $user['User']['user_id']), array('confirm' => __('Are you sure you want to delete # %s?', $user['User']['user_id']))); ?>
		</li>
		<li>
			<?php echo $this->Html->link(__('List Users'), array('action' => 'index')); ?>
		</li>
		<li>
			<?php echo $this->Html->link(__('New User'), array('action' => 'register')); ?>
		</li>
	</ul>
</div>