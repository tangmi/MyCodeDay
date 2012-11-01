<?php include(TEMPLATE_DIR . '/my/header.php'); ?>
    <div class="metro purple">
        <div class="container">
            <div class="row-fluid">
                <div class="span12 about-me">
                    <h1>Form a team!</h1>
                    <p>Just one thing before we can make your new team: what do you want to be called?</p>
                    <form method="post">
                        <div class="row">
                            <div class="span2"></div>
                            <div class="span6">
                                <fieldset>
                                    <div class="clearfix">
                                        <input type="text" placeholder="Team Name" name="name" id="name" class="input-xxlarge">
                                    </div>
                                </fieldset>
                            </div>
                            <div class="span2">
                                    <button class="btn btn-primary" id="submit" type="submit">Make me a team!</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
<?php include(TEMPLATE_DIR . '/my/footer.php'); ?>
