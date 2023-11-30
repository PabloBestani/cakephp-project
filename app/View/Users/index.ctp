<h1>Users List</h1>

<?php if (!isset($users) || !is_array($users) || empty($users)): ?>
    <p>No users found</p>
<?php else: ?>
<ul>
    <?php foreach($users as $user): ?>
        <li><?php echo $user['User']['id'] ?></li>
        <li><?php echo 'Name: ' . $user['User']['name'] ?></li>
        <li><?php echo 'Email: ' .  $user['User']['email'] ?></li>
        <li><?php echo 'Phone: ' .  $user['User']['phone'] ?></li>
    <?php endforeach; ?>
</ul>
<?php endif; ?>