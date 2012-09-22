<h1>Add User Profile</h1>
<?php
echo $this->Form->create('Profile');
echo $this->Form->input('user_id');
echo $this->Form->input('name');
echo $this->Form->input('email');
echo $this->Form->end('add profile');
?>