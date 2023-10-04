<?php echo $this->Html->css('message/message'); ?>
<section class="vh-100 gradient-form" style="background-color: #eee;">
    <div class="container py-5 h-100">
        <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-xl-10">
                <div class="card rounded-3 text-black">
                    <div class="row g-0">
                        <div class="col-lg-6">
                            <div class="card-body p-md-5 mx-md-4">

                                <div class="text-center">
                                    <img src="https://piperedge.com/storage/2021/08/Cake-logo-300x300-1.png"
                                        style="max-height: 100px;" alt="logo">
                                    <h4 class="mt-1 mb-5 pb-1">Message Board</h4>
                                </div>

                                <?php
                                echo $this->Form->create('User');
                                echo $this->Form->input('email', array('label' => 'Email address', 'class' => 'form-control'));
                                echo $this->Form->input('password', array('label' => 'Password', 'class' => 'form-control mb-3'));
                                echo $this->Form->button('Log in', array('class' => 'btn btn-primary btn-block fa-lg gradient-custom-2 mb-3'));
                                echo $this->Form->end();
                                ?>


                                <div class="d-flex align-items-center justify-content-center pb-4">
                                    <p class="mb-0 me-2">Don't have an account? &nbsp</p>
                                    <?php echo $this->Html->link('Register', array('controller' => 'Users', 'action' => 'register')); ?>
                                </div>

                            </div>
                        </div>
                        <div class="col-lg-6 d-flex align-items-center"
                            style="background-image: url('https://images.unsplash.com/photo-1557683311-eac922347aa1?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8M3x8Ymx1ZSUyMGdyYWRpZW50fGVufDB8fDB8fHww&w=1000&q=80)">
                            <div class="text-white px-3 py-4 p-md-5 mx-md-4">
                                <h4 class="mb-4">Welcome!</h4>
                                <p class="small mb-0">Message Board is a Training Phase Project for FDC's New Employee;
                                    <strong>Tyler Bert Baring</strong>. This is a Full Stack project using CakePHP
                                    2.10.19
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>