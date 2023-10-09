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
        <div class="card-header d-flex flex-row ">
            <h2>Messages List

            </h2>
            <?php echo $this->Html->link('New Message', array('controller' => 'messages', 'action' => 'new', ), array('class' => 'btn btn-outline-primary ml-2 align-content-center ')); ?>
            <input type="text" class=""
                style="flex-grow: 1; margin: 0px 0px 0px 10px; border-radius: 5px; border: none;"
                placeholder=" Search Contact..." id="autocomplete">
        </div>
        <ul class="list-group list-group-flush">
            <?php foreach ($messages as $message): ?>
                <li class="list-group-item">
                    <div class="card">
                        <div class="card-body cursor-pointer d-flex"
                            onclick="window.location.href='<?php echo $this->Html->url(array('controller' => 'messages', 'action' => 'direct', $message['User']['user_id'])); ?>'">
                            <img src="<?php echo $this->Html->webroot($message['User']['profile_url']) ?>"
                                class="rounded-circle mr-3" alt="Chris Wood" width="40" height="40">
                            <div class="card-text">
                                <h5 class="card-title">
                                    <?php echo $message['User']['firstname'] . ' ' . $message['User']['lastname']; ?>
                                </h5><br>
                                <p class="card-text" style="margin-top: -35px">
                                    <?php echo $message[0]['message_content']; ?>
                                    <span class="message-date">
                                        <?php echo substr((substr($message[0]['latest_timestamp'], 10)), 0, -3); ?>
                                    </span>
                                </p>
                            </div>
                        </div>
                    </div>
                </li>
            <?php endforeach; ?>
        </ul>
    </div>
</div>
<pre>


<script>
    $(document).ready(function () {
        var current_user = <?php echo $user_id; ?>

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
                window.location.href = 'http://localhost/mbfdc/messages/direct/' + ui.item.user_id;
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