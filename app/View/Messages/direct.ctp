<?php echo $this->Html->css('message/direct'); ?>


<div style="margin: 0px 0px; ">

    <div class="flex-grow-0 py-3 px-4 border-top bg-light " style="position: fixed; top: 0; width: 100%; z-index: 2;">
        <div class="input-group">
            <?php echo $this->Html->link('Go back', array('controller' => 'messages', 'action' => 'index', ), array('class' => 'btn btn-outline-success mr-2')); ?>

            <input id="newMessage" type="text" class="form-control" placeholder="Type your message">
            <button id="submit" class="btn btn-primary ml-2">Send</button>
        </div>
    </div>

    <div class="position-relative h-100">
        <div class="chat-messages chats p-4">
            <?php foreach ($messages as $message): ?>
                <?php if ($message['Message']['sender'] == $user_profile['user_id']): ?>
                    <div class="chat-message-right pb-4">
                        <div>
                            <img src="<?php echo $this->Html->webroot($user_profile['profile_url']) ?>"
                                class="rounded-circle mr-1" alt="Chris Wood" width="40" height="40">
                            <div class="text-muted small text-nowrap mt-2">
                                <?php echo substr($message['Message']['timestamp'], 11, -3) ?>
                            </div>
                        </div>
                        <div class="flex-shrink-1 bg-light rounded py-2 px-3 mr-3">
                            <div class="font-weight-bold mb-1">
                                <?php echo $user_profile['firstname'] ?>
                            </div>
                            <?php echo $message['Message']['message_content'] ?>
                        </div>
                    </div>

                <?php else: ?>

                    <div class="chat-message-left pb-4">
                        <div>
                            <img src="<?php echo $this->Html->webroot($receiver_profile['profile_url']) ?>"
                                class="rounded-circle mr-1" alt="Sharon Lessman" width="40" height="40">
                            <div class="text-muted small text-nowrap mt-2">
                                <?php echo substr($message['Message']['timestamp'], 11, -3) ?>
                            </div>
                        </div>
                        <div class="flex-shrink-1 bg-light rounded py-2 px-3 ml-3">
                            <div class="font-weight-bold mb-1">
                                <?php echo $receiver_profile['firstname'] ?>
                            </div>
                            <?php echo $message['Message']['message_content'] ?>
                        </div>
                    </div>
                <?php endif; ?>
            <?php endforeach; ?>
        </div>
    </div>
</div>

<script>
    $(document).ready(function () {
        var receiver_id = <?php echo $receiver_profile['user_id']; ?>;
        var sender_id = <?php echo $user_profile['user_id']; ?>;

        $('#submit').click(function () {
            var message_content = $('#newMessage').val();
            $.ajax({
                url: 'http://localhost/mbfdc/messages/reply.json',
                type: 'POST',
                data: {
                    message_content: message_content,
                    receiver: receiver_id,
                    sender: sender_id,
                    receiver: receiver_id,
                },
                success: function (response) {
                    window.location.reload();
                },
                error: function (xhr, status, error) {
                    console.log(xhr.responseText);
                }
            });
        });
    });
</script>