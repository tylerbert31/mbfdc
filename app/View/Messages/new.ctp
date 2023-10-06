<!-- Checks if Profile Pic is Uploaded -->
<?php echo $this->Html->css('message/message'); ?>
<?php
if ($user['profile_url'] != '') {
    $profile_url = $this->Html->webroot($user['profile_url']);
} else {
    $profile_url = "https://www.roiconnect.ca/wp-content/uploads/2021/07/DefaultAvatar.png";
}

?>
<div style="height: 100vh; display: flex; flex-direction: column;">
    <nav style="flex-grow: 0" class="navbar navbar-expand-lg navbar-light bg-light">
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
                    <?php echo $this->Html->link('Messages', array('controller' => 'messages', 'action' => 'index', ), array('class' => 'btn btn-outline-success my-2 my-sm-0')); ?>
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
    <div style="flex-grow: 1; display: flex; background-color: #f2f2f2;">
        <div id="message-form" class="col-md-6"
            style="margin: auto;background-color: white; padding: 25px; border-radius: 5px">
            <div class="form-group">

                <h2 class="text-uppercase text-center mb-5">New Message</h2>
                <?php echo $this->Form->input("receiver_name", array("class" => "form-control", "type" => "text", "id" => "autocomplete", "placeholder" => "Enter name")) ?>
                <div id="contact-suggestions" class="list-group mt-2"></div>

                <?php echo $this->Form->create('Message'); ?>
                <div class="form-group" style="display: none;">
                    <?php echo $this->Form->input("receiver", array("class" => "form-control", "type" => "text", "id" => "receiver", "placeholder" => "Enter name")) ?>
                </div>


                <div class="form-group">
                    <label for="message_content">Message</label>
                    <?php echo $this->Form->textarea('message_content', array('class' => 'form-control', 'id' => 'message_content', 'rows' => '5', 'placeholder' => 'Enter message', 'required' => 'required')); ?>
                </div>

                <button type="submit" class="btn btn-primary float-right">Submit</button>
                <?php echo $this->Form->end(); ?>
                </form>
            </div>
        </div>
    </div>
</div>



</div>
<script>
    $(document).ready(function () {
        var current_user = <?php echo $user['user_id']; ?>;

        var people = [];

        $.ajax({
            url: 'http://localhost/mbfdc/users/getUsers.json',
            method: 'GET',
            dataType: 'json',
            success: function (data) {
                // Log the data to the console
                data.forEach(function (data) {
                    if (data.User.user_id == current_user) {
                        return;
                    }
                    var new_contact = {
                        label: data.User.firstname + ' ' + data.User.lastname,
                        image: data.User.profile_url,
                        user_id: data.User.user_id
                    };
                    people.push(new_contact)
                });
            },
            error: function (xhr, status, error) {
                console.error(error);
            }
        });

        $("#autocomplete").autocomplete({
            source: people,
            minLength: 0,
            select: function (event, ui) {
                // Set the chosen user_id to the #receiver input field
                $("#receiver").val(ui.item.user_id);
                console.log(ui.item.user_id);
            },
            focus: function (event, ui) {
                // Prevent the input field from being updated with the selected label
                event.preventDefault();
            },
            open: function (event, ui) {
                // Customize the appearance of the autocomplete dropdown
                $('.ui-autocomplete').css('width', $('#autocomplete').outerWidth() + 'px');
            }
        })
            .autocomplete("instance")._renderItem = function (ul, item) {
                return $("<li>")
                    .append(`<img style="width: 64px; border-radius: 10px 10px; max-height: 50px" src="/mbfdc/${item.image}" alt="${item.label}"> ${item.label}`)
                    .appendTo(ul);
            };

        // Show the autocomplete dropdown on focus
        $("#autocomplete").on("focus", function () {
            $(this).autocomplete("search", $(this).val());
        });
    });
</script>