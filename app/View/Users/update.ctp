<section class="h-100 bg-image" style="background-color: #eee;">
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo03"
            aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <a class="navbar-brand">Message Board</a>

        <div class="collapse navbar-collapse" id="navbarTogglerDemo03">
            <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                <li class="nav-item ">
                    <?php echo $this->Html->link('Home', array('controller' => 'users', 'action' => 'home'), array('class' => 'nav-link')); ?>
                </li>
                <li class="nav-item active">
                    <?php echo $this->Html->link('Update Profile', array('controller' => 'users', 'action' => 'update'), array('class' => 'nav-link')); ?>
                </li>
                <li class="nav-item">
                    <?php echo $this->Html->link('Messages', array('controller' => 'users', 'action' => 'logout', ), array('class' => 'btn btn-outline-success my-2 my-sm-0')); ?>
                </li>
            </ul>
            <?php echo $this->Html->link('Log Out', array('controller' => 'users', 'action' => 'logout', ), array('class' => 'btn btn-outline-primary my-2 my-sm-0')); ?>

        </div>
    </nav>
    <div class="mask d-flex align-items-center h-100 gradient-custom-3">
        <div class="container h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-12 col-md-9 col-lg-7 col-xl-6">
                    <div class="card m-5">
                        <div class="card-body p-5">
                            <h2 class="text-uppercase text-center mb-5">Update Profile</h2>

                            <?php
                            echo $this->Form->create('User');
                            echo $this->Html->link('Update Picture', array('controller' => 'users', 'action' => 'profile_pic', ), array('class' => 'btn btn-outline-primary mb-3 '));
                            echo $this->Form->input('User.lastname', array('label' => 'Last Name', 'class' => 'form-control form-control-lg', 'value' => $user['lastname']));
                            echo $this->Form->input('User.firstname', array('label' => 'First Name', 'class' => 'form-control form-control-lg', 'value' => $user['firstname']));
                            echo $this->Form->input('User.age', array('label' => 'Age', 'class' => 'form-control form-control-lg', 'value' => $user['age']));
                            echo $this->Form->input('User.birthday', array('type' => 'text', 'class' => 'form-control form-control-lg datepicker', 'label' => 'Birthday', 'value' => $user['birthday']));
                            echo $this->Form->input('User.gender', array('type' => 'radio', 'options' => array('Male' => 'Male&nbsp&nbsp ', 'Female' => 'Female'), 'label' => 'Gender', 'value' => $user['gender']));
                            echo $this->Form->input('User.bio', array('label' => 'Bio', 'class' => 'form-control form-control-lg mb-3', 'maxlength' => 150, 'value' => $user['bio']));
                            ?>

                            <div class="d-flex justify-content-center">
                                <?php echo $this->Form->button('Update', array('class' => 'btn btn-primary btn-block fa-lg gradient-custom-2 mb-3', 'id' => 'submitButton')); ?>
                                <?php echo $this->Form->end(); ?>
                            </div>

                            <div class="d-flex justify-content-center">
                                <?php echo $this->Html->link('Cancel', array('controller' => 'Users', 'action' => 'home'), array('class' => 'btn btn-outline-secondary btn-block fa-lg gradient-custom-2 mb-3', 'id' => 'cancelButton')); ?>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</section>



<script>
    $(function () {
        $(".datepicker").datepicker({
            changeMonth: true,
            changeYear: true,
            yearRange: 'c-100:c+10', // display a range of 100 years before and 10 years after the current year
            maxDate: new Date(2010, 11, 31), // December 31, 2010
            minDate: new Date(1930, 0, 1) // January 1, 1930
        });
    });


</script>