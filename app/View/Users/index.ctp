<h1>Users List</h1>

<?php if (!isset($users) || !is_array($users) || empty($users)): ?>
    <p>No users found</p>
<?php else: ?>
<ul>
    <?php foreach($users as $user): ?>
        <!-- <li><?php echo $user->id ?></li> -->
        <li><?php echo $user->name ?></li>
        <li><?php echo $user->address ?></li>
        <li><?php echo $user->email ?></li>
        <li><?php echo $user->phone ?></li>
    <?php endforeach; ?>
</ul>
<?php endif; ?>