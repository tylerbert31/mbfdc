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
		echo $this->Form->input('birthday', array('type' => 'text', 'class' => 'datepicker'));
		echo $this->Form->input('gender');
		echo $this->Form->input('profile_url');
		?>
	</fieldset>

	<?php echo $this->Form->end(__('Submit')); ?>
	<?php echo $this->Html->link(__('Cancel'), array('controller' => 'users', 'action' => 'home')); ?>
</div>
<script>
	$(document).ready(function () {
		$('.datepicker').datepicker({
			dateFormat: 'yy-mm-dd',
			maxDate: new Date('2010-12-31'),
			changeMonth: true,
			changeYear: true,
			yearRange: 'c-100:c'
		});
	});
</script>