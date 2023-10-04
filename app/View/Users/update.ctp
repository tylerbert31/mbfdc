<div>
    <?php echo $this->Form->create('User'); ?>
    <fieldset>
        <legend>
            <?php echo __('Update Profile'); ?>
        </legend>
        <?php
        echo $this->Form->input(
            'User.lastname',
            array(
                'label' => 'Last Name',
                'value' => $user['lastname'],
                'required' => false
            )
        );
        echo $this->Form->input(
            'User.firstname',
            array(
                'label' => 'First Name',
                'value' => $user['firstname'],
                'required' => false
            )
        );
        echo $this->Form->input(
            'User.age',
            array(
                'min' => 14,
                'max' => 99,
                'label' => 'Age',
                'value' => $user['age'],
                'required' => false
            )
        );
        echo $this->Form->input(
            'User.birthday',
            array(
                'type' => 'text',
                'class' => 'datepicker',
                'label' => 'Birthday',
                'value' => $user['birthday'],
                'required' => false
            )
        );
        echo $this->Form->input(
            'User.gender',
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
            'User.bio',
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
    $(function () {
        $(".datepicker").datepicker({
            changeMonth: true,
            changeYear: true,
            yearRange: 'c-100:c+10', // display a range of 100 years before and 10 years after the current year
            maxDate: new Date(2010, 11, 31), // December 31, 2010
            minDate: new Date(1930, 0, 1) // January 1, 1930
        });
    });


</script>