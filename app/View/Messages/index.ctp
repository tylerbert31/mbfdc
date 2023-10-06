<?php echo $this->Html->css('message/message-list'); ?>
<?php echo $this->Html->css('message/message'); ?>
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
        </ul>
        <div class="dropdown">
            <button class="btn btn-outline-secondary dropdown-toggle" type="button" id="dropdownMenuButton"
                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fa fa-user" aria-hidden="true"></i>
            </button>
            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton">
                <?php echo $this->Html->link('Update Email', array('controller' => 'users', 'action' => 'email', ), array('class' => 'dropdown-item')); ?>
                <?php echo $this->Html->link('Update Password', array('controller' => 'users', 'action' => 'password', ), array('class' => 'dropdown-item')); ?>
                <div class="dropdown-divider"></div>
                <?php echo $this->Html->link('Log Out', array('controller' => 'users', 'action' => 'logout', ), array('class' => 'dropdown-item')); ?>
            </div>
        </div>


    </div>
</nav>
<div class="container d-flex justify-content-center align-items-center my-5">
    <div class="card" style="width: 700px; max-width: 1000px; ">
        <div class="card-header">
            <h2>Messages List
                <?php echo $this->Html->link('New Message', array('controller' => 'messages', 'action' => 'new', ), array('class' => 'btn btn-outline-primary my-2 my-sm-0')); ?>
            </h2>

        </div>
        <ul class="list-group list-group-flush">
            <?php foreach ($messages as $message): ?>
                <li class="list-group-item">
                    <div class="card">
                        <div class="card-body cursor-pointer d-flex"
                            onclick="window.location.href='<?php echo $this->Html->url(array('controller' => 'messages', 'action' => 'direct', $message['User']['user_id'])); ?>'">
                            <img src="<?php echo $this->Html->webroot($message['User']['profile_url']) ?>"
                                class="rounded-circle mr-3" alt="Chris Wood" width="40" height="40">
                            <h5 class="card-title">
                                <?php echo $message['User']['firstname'] . ' ' . $message['User']['lastname']; ?>
                            </h5>
                            <p class="card-text">
                                <span class="message-date">
                                    <?php echo substr((substr($message[0]['latest_timestamp'], 10)), 0, -3); ?>
                                </span>
                            </p>
                        </div>
                    </div>
                </li>
            <?php endforeach; ?>
        </ul>

    </div>
</div>