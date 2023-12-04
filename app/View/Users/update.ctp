<h1>Update User</h1>

<?php
    echo $this->Form->create('User');
    echo $this->Form->input('name', ['value' => $this->viewVars['user']['User']['name']]);
    echo $this->Form->input('email', ['value' => $this->viewVars['user']['User']['email']]);
    echo $this->Form->input('phone', ['value' => $this->viewVars['user']['User']['phone']]);
    echo $this->Form->end('Save');
?>