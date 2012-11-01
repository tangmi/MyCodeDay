<?php include(TEMPLATE_DIR . '/my/header.php'); ?>
    <div class="metro orange">
        <div class="container">
            <div class="row-fluid">
                <div class="span12">
                    <h1>Change Password</h1>
                    <form method="post" action="<?=\CuteControllers\Router::link('/user/password')?>">
                        <div class="row">
                            <div class="span6">
                                <fieldset>
                                    <div class="clearfix">
                                        <input type="password" name="password" class="input-large" placeholder="Password">
                                        <input type="password" name="password_confirm" class="input-large" placeholder="Confirm Password">
                                    </div>
                                </fieldset>
                            </div>
                            <div class="span2">
                                    <button class="btn btn-primary" id="submit" type="submit">Change</button>
                            </div>
                        </div>
                        <div class="row">
                            <p>Your passwords will be stored as salted whirlpools.</p>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
<?php include(TEMPLATE_DIR . '/my/footer.php'); ?>
