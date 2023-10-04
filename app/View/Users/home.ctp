<!-- Checks if Profile Pic is Uploaded -->
<?php echo $this->Html->css('message/message'); ?>
<?php
if ($user['profile_url'] != '') {
    $profile_url = $user['profile_url'];
} else {
    $profile_url = "https://www.roiconnect.ca/wp-content/uploads/2021/07/DefaultAvatar.png";
}
?>



<section class=" " style="background-color: #eee; height: 100vh;">
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo03"
            aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <a class="navbar-brand">Message Board</a>

        <div class="collapse navbar-collapse" id="navbarTogglerDemo03">
            <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                <li class="nav-item active">
                    <a class="nav-link" href="#">Home </a>
                </li>
                <li class="nav-item">
                    <?php echo $this->Html->link('Update Profile', array('controller' => 'users', 'action' => 'update'), array('class' => 'nav-link')); ?>
                </li>
                <li class="nav-item">
                    <?php echo $this->Html->link('Messages', array('controller' => 'users', 'action' => 'logout', ), array('class' => 'btn btn-outline-success my-2 my-sm-0')); ?>
                </li>
            </ul>
            <?php echo $this->Html->link('Log Out', array('controller' => 'users', 'action' => 'logout', ), array('class' => 'btn btn-outline-primary my-2 my-sm-0')); ?>

        </div>
    </nav>
    <div class="container py-5">
        <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col col-lg-6 mb-4 mb-lg-0">
                <div class="card mb-3" style="border-radius: .5rem;">
                    <div class="row g-0">
                        <div class="col-md-4 gradient-custom text-center text-white"
                            style="border-top-left-radius: .5rem; border-bottom-left-radius: .5rem; background-image: url('https://images.unsplash.com/photo-1557683311-eac922347aa1?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8M3x8Ymx1ZSUyMGdyYWRpZW50fGVufDB8fDB8fHww&w=1000&q=80')">
                            <img src="<?php echo $this->Html->url($profile_url); ?>" alt="Avatar" class="img-fluid my-5"
                                style="width: 80px;" />
                            <h5 class="mx-2">
                                <?php echo $user['lastname'] . ', ' . $user['firstname']; ?>
                            </h5>
                            <p>Member</p>
                            <i class="far fa-edit mb-5"></i>
                        </div>
                        <div class="col-md-8">
                            <div class="card-body p-4">
                                <h6>User Profile</h6>
                                <hr class="mt-0 mb-4">
                                <div class="row pt-1">
                                    <div class="col-6 mb-3">
                                        <h6>Age</h6>
                                        <p class="text-muted">
                                            <?php echo $user['age']; ?>
                                        </p>
                                    </div>
                                    <div class="col-6 mb-3">
                                        <h6>Birthday</h6>
                                        <p class="text-muted">
                                            <?php echo $user['birthday']; ?>
                                        </p>
                                    </div>
                                </div>
                                <hr class="mt-0 mb-4">
                                <div class="row pt-1">
                                    <div class="col-6 mb-3">
                                        <h6>Joined</h6>
                                        <p class="text-muted">
                                            <?php echo $user['joined']; ?>
                                        </p>
                                    </div>
                                    <div class="col-6 mb-3">
                                        <h6>Last Login</h6>
                                        <p class="text-muted">
                                            <?php echo $user['last_login']; ?>
                                        </p>
                                    </div>
                                </div>
                                <hr class="mt-0 mb-4">
                                <div class="row pt-1">
                                    <div class="col-6 mb-3">
                                        <h6>Hubby</h6>
                                        <p class="text-muted">
                                            <?php echo $user['bio']; ?>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>






<script>
    console.table(<?php echo json_encode($user); ?>);
</script>