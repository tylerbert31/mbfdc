<div class="container d-flex justify-content-center align-items-center vh-100">
    <div class="text-center">
        <h1 class="mb-4">Registration Successful</h1>
        <p class="lead mb-5">Thank you for registering with us. You can now login to your account.</p>
        <?php echo $this->Html->link('Back to Home Page', array('controller' => 'Users', 'action' => 'login'), array('class' => 'btn btn-primary')); ?>
    </div>
</div>