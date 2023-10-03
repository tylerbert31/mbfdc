<!-- Checks if Profile Pic is Uploaded -->
<?php
if ($user['profile_url'] != '') {
    $profile_url = $user['profile_url'];
} else {
    $profile_url = "https://www.roiconnect.ca/wp-content/uploads/2021/07/DefaultAvatar.png";
}
?>
<h1>User Profile</h1>

<div>
    <img src="<?php echo $this->Html->url($profile_url); ?>" alt="Profile Picture" style="max-height: 200px;">
</div>

<div>
    <p>
        <?php echo $user['lastname'] . ', ' . $user['firstname'] . ' ' . $user['age']; ?>
    </p>
    <p>Birthday:
        <?php echo $user['birthday']; ?>
    </p>
    <p>Joined:
        <?php echo $user['joined']; ?>
    </p>
    <p>Last Login:
        <?php echo $user['last_login']; ?>
    </p>
    <p>Bio:
        <?php echo $user['bio']; ?>
    </p>
</div>

<?php echo $this->Html->link('Update Profile', array('controller' => 'users', 'action' => 'update')); ?>



<?php echo $this->Html->link('Log Out', array('controller' => 'users', 'action' => 'logout')); ?>

<script>
    console.table(<?php echo json_encode($user); ?>);
</script>