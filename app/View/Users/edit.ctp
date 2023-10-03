<div class="users ">
	<?php echo $this->Form->create('User'); ?>
	<fieldset>
		<legend>
			<?php echo __('Edit User'); ?>
		</legend>
		<?php
		echo $this->Form->input('user_id');
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
	<?php echo $this->Html->link(__('Cancel'), array('controller' => 'users', 'action' => 'home')); ?>
</div>