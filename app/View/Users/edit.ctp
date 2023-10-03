<div class="users">
	<?php echo $this->Form->create('User'); ?>
	<fieldset>
		<legend>
			<?php echo __('Update Profile'); ?>
		</legend>
		<?php
		echo $this->Form->input('user_id');
		echo $this->Form->input('email');
		echo $this->Form->input('lastname');
		echo $this->Form->input('firstname');
		echo $this->Form->input('age', array('min' => 14, 'max' => 99));
		echo $this->Form->input('birthday', array('type' => 'text', 'class' => 'datepicker'));
		echo $this->Form->input(
			'gender',
			array(
				'type' => 'radio',
				'options' => array(
					'male' => 'Male',
					'female' => 'Female'
				)
			)
		);
		echo $this->Form->label('profile_url', 'Profile Pic');
		echo $this->Form->file('profile_url');
		?>
	</fieldset>

	<?php echo $this->Form->end(__('Submit')); ?>
	<?php echo $this->Html->link(__('Cancel'), array('controller' => 'users', 'action' => 'home')); ?>
</div>
<script>
	$(document).ready(function () {
		$('.datepicker').datepicker({
			dateFormat: 'yy-mm-dd',
			maxDate: new Date('2009-12-31'),
			changeMonth: true,
			changeYear: true,
			yearRange: 'c-100:c'
		});
	});
</script>