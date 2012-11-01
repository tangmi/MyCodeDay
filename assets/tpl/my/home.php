<?php include(TEMPLATE_DIR . '/my/header.php'); ?>
    <div class="metro purple">
        <div class="container">
            <div class="row">
                <div class="span12">
                    <h1>My Teams</h1>
                    <ul class="teamlist">
                        <?php foreach (\StudentRND\CodeDay\Models\Registrant::current()->teams as $team) : ?>
                            <li>
                                <a
                                    href="<?=\CuteControllers\Router::link('/teams/' . $team->teamID)?>"
                                    title="<?=htmlentities($team->name)?>"
                                >
                                    <?=htmlentities($team->name)?>
                                </a>
                            </li>
                        <?php endforeach; ?>
                        <li class="new">
                            <a href="/teams/create">
                                Create a new team
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="metro orange">
        <div class="container">
            <div class="row-fluid">
                <div class="span12 about-me">
                    <h1>About Me</h1>
                    <p>The details you specify here will be used on the CodeDay website, as well as being available to
                        the judges.</p>
                    <p>The social details and your list of skills will be available to your fellow attendees.</p>
                    <form method="post" action="<?=\CuteControllers\Router::link('/user/update')?>">
                        <div class="row">
                            <div class="span2">

                            </div>
                            <div class="span6">
                                <fieldset>
                                    <div class="clearfix">
                                        <input type="text" disabled value="<?=htmlentities(\StudentRND\CodeDay\Models\Registrant::current()->first_name)?>" class="input-large">
                                        <input type="text" disabled value="<?=htmlentities(\StudentRND\CodeDay\Models\Registrant::current()->last_name)?>" class="input-large">
                                    </div>
                                    <div class="clearfix">
                                        <input type="text" value="<?=htmlentities(\StudentRND\CodeDay\Models\Registrant::current()->email)?>" name="email" id="email" placeholder="Email" class="input-xxlarge">
                                    </div>
                                    <div class="clearfix">
                                        <input type="text" value="<?=htmlentities(\StudentRND\CodeDay\Models\Registrant::current()->website)?>" name="website" id="website" placeholder="Website" class="input-xxlarge">
                                    </div>
                                    <div class="clearfix">
                                        <textarea name="bio" style="height:150px;" id="bio" placeholder="Bio" class="input-xxlarge"><?=htmlentities(\StudentRND\CodeDay\Models\Registrant::current()->bio)?></textarea>
                                    </div>
                                </fieldset>
                            </div>
                            <div class="span2">
                                    <button class="btn btn-primary" id="submit" type="submit">Update Me</button><br />
                                    <a class="btn" href="<?=\CuteControllers\Router::link('/user/password')?>">Change Password</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
<?php include(TEMPLATE_DIR . '/my/footer.php'); ?>
