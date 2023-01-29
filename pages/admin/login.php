<?php if (isset($_POST['username'], $_POST['password'])) : ?>
<?php if (($user = Users::findOne(['name' => strtolower($_POST['username'])])) && $user->password === sha1($_POST['password'])): ?>
    <?php Session::set('login',true); ?>
    <?php Tools::redirect('admin/index'); ?>
    <?php else: ?>
    <div class="alert alert-danger">
        <p>Invalid Username and password</p>
    </div>
<?php endif; ?>
<?php endif; ?>
<h1><span class="fa fa-sign-in fa-sm fa-fw"></span> Login</h1>
<hr/>

<div class="alert alert-success">
    <form action="" class="form-horizontal " method="post">
        <div class="form-group">
            <label for="username" class="col-sm-2 control-label "> Username</label>
            <div class="col-sm-3">
                <input class="form-control" name="username" id="username" type="text">
            </div>
        </div>
        <div class="form-group">
            <label for="pass" class="col-sm-2 control-label ">Password</label>
            <div class="col-sm-3">
                <input class="form-control" name="password" id="pass" type="text">
            </div>
        </div>

        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-3">
                <input class="btn btn-success btn-block" name="" value="Login" type="submit">
            </div>
        </div>
    </form>
</div>