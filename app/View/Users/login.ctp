<?php
//login form using email and password
echo $this->Form->create('User');
echo $this->Form->input('email');
echo $this->Form->input('password');
echo $this->Form->end('Login');
?>

<p>Don't have an account?
    <?php echo $this->Html->link('Register', array('controller' => 'Users', 'action' => 'register')); ?>
</p>