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
		echo $this->Form->input('password', array('minLength' => 5));
		echo $this->Form->input('confirm_password', array('type' => 'password', 'minLength' => 5, 'required' => true));
		?>
		<div id="confirm-password-error" style="display: none; color: red;">Passwords do not match</div>
	</fieldset>
	<?php echo $this->Form->end(__('Submit')); ?>

	<p>Already have an account?
		<?php echo $this->Html->link('Login', array('controller' => 'Users', 'action' => 'login'), array('escape' => false)); ?>
	</p>

</div>
<script>
	$(document).ready(function () {
		$('#UserConfirmPassword').on('change', function () {
			var password = $('#UserPassword').val();
			var confirm_password = $(this).val();
			if (password !== confirm_password) {
				$('#confirm-password-error').show();
				$('.submit input[type="submit"]').attr('disabled', true);
				$('.submit input[type="submit"]').attr('style', 'opacity: 20%');


			} else {
				$('#confirm-password-error').hide();
				$('.submit input[type="submit"]').attr('disabled', false);
				$('.submit input[type="submit"]').attr('style', 'opacity: 100%');
			}
		});
	});
</script>