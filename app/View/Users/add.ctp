<h1>Add User</h1>
<?php
echo $this->Form->create('User');
echo $this->Form->input('username');
echo $this->Form->input('password');


echo $this->Form->input('Profile.name');
echo $this->Form->input('Profile.email');

echo $this->Form->end('Save user');
?>