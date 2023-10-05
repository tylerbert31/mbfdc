<?php
if ($user['profile_url'] != '') {
    $profile_url = $this->Html->webroot($user['profile_url']);
} else {
    $profile_url = "https://www.roiconnect.ca/wp-content/uploads/2021/07/DefaultAvatar.png";
}

?>

<nav class="navbar navbar-expand-lg navbar-light">
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

<div class=" w-100" style="background-color: #f2f2f2;">
    <div class="row justify-content-center align-items-center" style="height:100vh">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header text-center ">
                    Update Profile Picture
                </div>
                <div class="card-body">
                    <div class="form-group d-flex flex-column align-items-center ">
                        <img id="imgPreview" src="<?php echo $profile_url ?>" alt="Profile Pic"
                            style="max-height: 200px; border-radius: 15px; max-width: 140px;" class="form-group">
                        <?php echo $this->Form->create('User', array('type' => 'file')); ?>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text">Upload</span>
                            </div>
                            <div class="custom-file">
                                <?php echo $this->Form->input(
                                    'photograph',
                                    array(
                                        'type' => 'file',
                                        'name' => 'data[User][photograph]',
                                        'id' => 'photo',
                                        'class' => 'form-control-file',
                                        'required' => true,
                                        'accept' => '.jpg,.jpeg,.gif,.png',
                                        'label' => false
                                    )
                                ); ?>
                                <label class="custom-file-label" for="photo">Choose Picture</label>
                            </div>
                        </div>
                    </div>

                    <?= $this->Form->button('Update', ['class' => 'btn btn-primary btn-block']) ?>
                    <?= $this->Form->end() ?>
                    <?php echo $this->Html->link('Cancel', array('controller' => 'users', 'action' => 'update', ), array('class' => 'btn btn-outline-secondary btn-block mt-3')); ?>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(() => {
        $('#photo').change(function () {
            const file = this.files[0];
            console.log(this.value); // Log the file path to the console
            if (file) {
                let reader = new FileReader();
                reader.onload = function (event) {
                    $('#imgPreview').attr('src', event.target.result);
                }
                reader.readAsDataURL(file);
            }
        });
    });

</script>