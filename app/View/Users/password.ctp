<?php echo $this->Html->css('message/message'); ?>
<section class=" " style="background-color: #f2f2f2; height: 100vh;">
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo03"
            aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <a class="navbar-brand">Message Board</a>

        <div class="collapse navbar-collapse" id="navbarTogglerDemo03">
            <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                <li class="nav-item active">
                    <?php echo $this->Html->link('Home', array('controller' => 'users', 'action' => 'home'), array('class' => 'nav-link')); ?>
                </li>
                <li class="nav-item">
                    <?php echo $this->Html->link('Update Profile', array('controller' => 'users', 'action' => 'update'), array('class' => 'nav-link')); ?>
                </li>
                <li class="nav-item mb-t">
                    <?php echo $this->Html->link('Messages', array('controller' => 'users', 'action' => 'logout', ), array('class' => 'btn btn-outline-success my-2 my-sm-0')); ?>
                </li>
            </ul>
            <div class="dropdown">
                <button class="btn btn-outline-secondary dropdown-toggle" type="button" id="dropdownMenuButton"
                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fa fa-user" aria-hidden="true"></i>
                </button>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton">
                    <?php echo $this->Html->link('Update Email', array('controller' => 'users', 'action' => 'email', ), array('class' => 'dropdown-item')); ?>
                    <a class="dropdown-item disabled" href="#">Update Password</a>
                    <div class="dropdown-divider"></div>
                    <?php echo $this->Html->link('Log Out', array('controller' => 'users', 'action' => 'logout', ), array('class' => 'dropdown-item')); ?>
                </div>
            </div>
        </div>
    </nav>

    <div class="container-fluid h-100">
        <div class="row justify-content-center align-items-center h-100">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h4 class="mb-0">Update Password</h4>
                    </div>
                    <div class="card-body">
                        <?php
                        echo $this->Form->create('User');
                        echo $this->Form->input('current_pass', ['label' => 'Current Password', 'id' => 'currentPass', 'class' => 'form-control mb-3', 'type' => 'password', 'required' => true]);
                        echo $this->Form->input('new_pass', ['label' => 'New Password', 'class' => 'form-control mb-3', 'id' => 'newPass', 'type' => 'password', 'required' => true]);
                        echo $this->Form->input('confirm_pass', ['label' => 'Confirm Password', 'id' => 'newConfirmPass', 'class' => 'form-control mb-3', 'type' => 'password', 'required' => true]);
                        echo $this->Form->button(__('Update Password'), ['class' => 'btn btn-primary btn-block', 'id' => 'submitButton']);
                        echo $this->Form->end();
                        echo $this->Html->link('Cancel', array('controller' => 'users', 'action' => 'home', ), array('class' => 'btn btn-outline-secondary btn-block mt-2')); ?>


                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function () {
            $('#newConfirmPass').on('change', function () {
                if ($(this).val() !== $('#newPass').val()) {
                    $('#submitButton').prop('disabled', true);
                    $(this).css('outline', '2px solid red');
                } else {
                    $('#submitButton').prop('disabled', false);
                    $(this).css('outline', 'none');
                }
            });
        });
    </script>