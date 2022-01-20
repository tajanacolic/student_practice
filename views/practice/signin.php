<?php if (!empty($errors)): ?>
    <div class="alert alert-danger">
        <?php foreach ($errors as $error): ?>
            <div><?php echo $error ?></div>
        <?php endforeach; ?>
    </div>
<?php endif; ?>

<h1 class="h1">Please Sign in</h1>
<form action="" method="post">
<div>
    <div>
        <input type="text" id="username" name="username" placeholder="Username" value="<?php echo $admin['username'] ?>">
    </div>
</div>
    <br>
<div>
    <div>
        <input type="password" id="password" name="password" placeholder="Password" value="<?php echo $admin['password'] ?>">
    </div>
</div>
    <br>
    <div>
        <button type="submit" class="signin">Sign in</button>
    </div>
</form>