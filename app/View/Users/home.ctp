<h1>User Profile</h1>

<div>
    <img src="<?php echo $this->Html->url('https://easydrawingguides.com/wp-content/uploads/2022/10/how-to-draw-a-mans-face-featured-image-1200.png'); ?>"
        alt="Profile Picture" style="max-height: 200px;">
</div>

<div>
    <p>
        <?php echo $user['User']['lastname'] . ', ' . $user['User']['firstname'] . ' ' . $user['User']['age']; ?>
    </p>
    <p>Birthday:
        <?php echo $user['User']['birthday']; ?>
    </p>
    <p>Joined:
        <?php echo $user['User']['joined']; ?>
    </p>
    <p>Last Login:
        <?php echo $user['User']['last_login']; ?>
    </p>
    <p>Bio:
        <?php echo $user['User']['bio']; ?>
    </p>
</div>

<?php echo $this->Html->link('Update Profile', array('controller' => 'users', 'action' => 'edit', $user['User']['user_id']), array('escape' => false)); ?>



<?php echo $this->Html->link('Log Out', array('controller' => 'users', 'action' => 'logout')); ?>

<script>
    console.table(<?php echo json_encode($user['User']); ?>);
</script>