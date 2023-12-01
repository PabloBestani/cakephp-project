<h1>Create new User</h1>

<?php
    echo $this->Form->create('User');
    echo $this->Form->input('name');
    echo $this->Form->input('email');
    echo $this->Form->input('phone');
    echo $this->Form->end('Save');
?>