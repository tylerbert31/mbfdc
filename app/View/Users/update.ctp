<div>
    <?php echo $this->Form->create('User'); ?>
    <fieldset>
        <legend>
            <?php echo __('Update Profile'); ?>
        </legend>
        <?php
        echo $this->Form->input(
            'lastname',
            array(
                'label' => 'Last Name',
                'value' => $user['lastname'],
                'required' => false
            )
        );
        echo $this->Form->input(
            'firstname',
            array(
                'label' => 'First Name',
                'value' => $user['firstname'],
                'required' => false
            )
        );
        echo $this->Form->input(
            'age',
            array(
                'min' => 14,
                'max' => 99,
                'label' => 'Age',
                'value' => $user['age'],
                'required' => false
            )
        );
        echo $this->Form->input(
            'birthday',
            array(
                'type' => 'text',
                'class' => 'datepicker',
                'label' => 'Birthday',
                'value' => $user['birthday'],
                'required' => false
            )
        );
        echo $this->Form->input(
            'gender',
            array(
                'type' => 'radio',
                'options' => array(
                    'Male' => 'Male',
                    'Female' => 'Female'
                ),
                'label' => 'Gender',
                'value' => $user['gender'],
                'required' => false
            )
        );
        echo $this->Form->input(
            'bio',
            array(
                'label' => 'Bio',
                'value' => $user['bio'],
                'required' => false
            )
        );
        ?>
    </fieldset>

    <?php echo $this->Form->end(__('Submit')); ?>
    <?php echo $this->Html->link(__('Cancel'), array('controller' => 'users', 'action' => 'home')); ?>
</div>

<script>
    $(document).ready(function () {
        $('.datepicker').datepicker({
            dateFormat: 'yy-mm-dd',
            maxDate: new Date('2009-12-31'),
            changeMonth: true,
            changeYear: true,
            yearRange: 'c-100:c'
        });
    });


</script>
<!-- HAYNAKOOOOOOOOOOOO -->