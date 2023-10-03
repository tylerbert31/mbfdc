<div class="users">
	<?php echo $this->Form->create('User'); ?>
	<fieldset>
		<legend>
			<?php echo __('Register'); ?>
		</legend>
		<?php
		echo $this->Form->input('firstname', array('minLength' => 5, 'maxLength' => 20));
		echo $this->Form->input('lastname', array('minLength' => 5, 'maxLength' => 20));
		echo $this->Form->input('email');
		echo $this->Form->input('password');
		echo $this->Form->input('confirm_password', array('type' => 'password'));
		?>
	</fieldset>
	<?php echo $this->Form->end(__('Submit')); ?>

	<p>Already have an account?
		<?php echo $this->Html->link('Login', array('controller' => 'Users', 'action' => 'login'), array('escape' => false)); ?>
	</p>

</div>