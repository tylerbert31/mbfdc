<div class="users form">
<?php echo $this->Form->create('User'); ?>
	<fieldset>
		<legend><?php echo __('Add User'); ?></legend>
	<?php
		echo $this->Form->input('email');
		echo $this->Form->input('lastname');
		echo $this->Form->input('firstname');
		echo $this->Form->input('password');
		echo $this->Form->input('age');
		echo $this->Form->input('birthday');
		echo $this->Form->input('gender');
		echo $this->Form->input('joined');
		echo $this->Form->input('last_login');
		echo $this->Form->input('profile_url');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Users'), array('action' => 'index')); ?></li>
	</ul>
</div>
