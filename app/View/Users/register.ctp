<?php echo $this->Html->css('message/message'); ?>
<section class="vh-100 bg-image" style="background-color: #eee;">
	<div class="mask d-flex align-items-center h-100 gradient-custom-3">
		<div class="container h-100">
			<div class="row d-flex justify-content-center align-items-center h-100">
				<div class="col-12 col-md-9 col-lg-7 col-xl-6">
					<div class="card">
						<div class="card-body p-5">
							<h2 class="text-uppercase text-center mb-5">Create an account</h2>

							<?php
							echo $this->Form->create('User');
							echo $this->Form->input('firstname', array('label' => 'First Name', 'class' => 'form-control form-control-lg'));
							echo $this->Form->input('lastname', array('label' => 'Last Name', 'class' => 'form-control form-control-lg'));
							echo $this->Form->input('email', array('label' => 'Email', 'class' => 'form-control form-control-lg'));
							echo $this->Form->input('password', array('label' => 'Password', 'class' => 'form-control form-control-lg'));
							echo $this->Form->input('confirm_password', array('label' => 'Repeat your password', 'type' => 'password', 'class' => 'form-control form-control-lg mb-3'));
							?>

							<div class="d-flex justify-content-center">
								<?php echo $this->Form->button('Register', array('class' => 'btn btn-primary btn-block fa-lg gradient-custom-2 mb-3', 'id' => 'submitButton')); ?>
								<?php echo $this->Form->end(); ?>
							</div>

							<p class="text-center text-muted mt-5 mb-0">Alread have an account?
								<?php echo $this->Html->link('Login', array('controller' => 'Users', 'action' => 'login'), array('escape' => false)); ?>
							</p>



						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>

<script>
	$(document).ready(function () {
		$('#UserConfirmPassword').on('change', function () {
			var password = $('#UserPassword').val();
			var confirm_password = $(this).val();
			if (password !== confirm_password) {
				$('#confirm-password-error').show();
				$('#submitButton').attr('disabled', true);
				$('#submitButton').attr('style', 'opacity: 30%');


			} else {
				$('#confirm-password-error').hide();
				$('#submitButton').attr('disabled', false);
				$('#submitButton"]').attr('style', 'opacity: 100%');
			}
		});
	});
</script>