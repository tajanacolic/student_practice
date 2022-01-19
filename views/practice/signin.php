<?php if (!empty($errors)): ?>
    <div class="alert alert-danger">
        <?php foreach ($errors as $error): ?>
            <div><?php echo $error ?></div>
        <?php endforeach; ?>
    </div>
<?php endif; ?>

<h1>Please Sign in</h1>
<form action="" method="post">
<div>
    <div><label for="username">Username</label></div>
    <div>
        <input type="text" id="username" name="username" value="<?php echo $admin['username'] ?>">
    </div>
</div>
<div>
    <div><label for="password">Password</label></div>
    <div>
        <input type="password" id="password" name="password" value="<?php echo $admin['password'] ?>">
    </div>
</div>
    <div>
        <button type="submit">Sign in</button>
    </div>
</form>