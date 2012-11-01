<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>My.CodeDay</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="StudentRND">

        <link href="<?=ASSETS_URI?>/css/bootstrap.min.css" rel="stylesheet">
        <link href="<?=ASSETS_URI?>/css/bootstrap-responsive.min.css" rel="stylesheet">

        <style type="text/css">
            html, body {
                background-color: #eee;
            }

            body {
                padding-top: 40px;
            }

            .container {
                width: 300px;
            }

            .container > .content {
                background-color: #fff;
                padding: 20px;
                margin: 10px -20px;
                border-radius: 10px 10px 10px 10px;
                    -webkit-border-radius: 10px 10px 10px 10px;
                    -moz-border-radius: 10px 10px 10px 10px;
                box-shadow: 0 1px 2px rgba(0,0,0,.15);
                    -webkit-box-shadow: 0 1px 2px rgba(0,0,0,.15);
                    -moz-box-shadow: 0 1px 2px rgba(0,0,0,.15);
            }

            .hidden {
                display: none;
            }

            .login-form {
                margin-left: 65px;
            }

            legend {
                margin-right: -50px;
                font-weight: bold;
                color: #404040;
            }
        </style>

        <!--[if lt IE 9]>
            <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
        <![endif]-->
    </head>

    <body>
        <div class="container">
            <div class="content">
                <div class="row">
                    <div class="login-form">
                        <h2>CodeDay Login</h2>
                        <p>
                            Welcome to CodeDay <?=$this->event->name?>!
                        </p>
                        <p>
                            You can log in using the name you registered with.
                        </p>
                        <?php if (isset($login_error)) : ?>
                            <p class="alert alert-error">
                                Something didn't match up. Try again, or talk to an organizer.
                            </p>
                        <?php endif; ?>
                        <form method="POST">
                            <fieldset>
                                <div class="clearfix">
                                    <input type="text" name="first_name" id="first_name" placeholder="First Name">
                                </div>
                                <div class="clearfix">
                                    <input type="text" name="last_name" id="last_name" placeholder="Last Name">
                                </div>
                                <div class="clearfix">
                                    <input type="password" name="password" id="password" disabled placeholder="Password">
                                </div>
                                <button class="btn btn-primary" id="submit" disabled type="submit">Sign in</button>
                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>

            <div class="content">
                <div class="row">
                    <div class="login-form">
                        <h2>Other Events</h2>
                        <p>
                            Not here for CodeDay <?=$this->event->name?>? Try logging into
                            one of these other events.
                        </p>
                        <ul>
                            <?php foreach (\StudentRND\CodeDay\Models\Event::get_all_events() as $event) : ?>
                                <li>
                                    <a href="<?\CuteControllers\Router::link('/login?event_id' . $event->eventID)?>">
                                        CodeDay <?=$event->name?>, <?=date('F Y', $event->start_time)?>
                                    </a>
                                </li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <script src="<?=ASSETS_URI?>/js/jquery.min.js"></script>
        <script src="<?=ASSETS_URI?>/js/bootstrap.min.js"></script>
        <script type="text/javascript">
            var lastEvent = null;
            $("input").live('keyup', function(){
                if (lastEvent !== null) {
                    lastEvent.abort();
                }

                lastEvent = $.ajax({
                    url: '<?=\CuteControllers\Router::link('/login/usercheck.json?event_id=' . $this->event->eventID)?>',
                    type: 'POST',
                    data: {
                        'first_name': $('#first_name').val(),
                        'last_name': $('#last_name').val()
                    },
                    success: function(data)
                    {
                        if (data.password === true) {
                            $("#password").removeAttr('disabled');
                        } else {
                            $("#password").attr('disabled', 'sounds good');
                        }

                        if (data.exists === true &&
                            (!data.password || $('#password').val() !== '')) {
                            $('#submit').removeAttr('disabled');
                        } else {
                            $('#submit').attr('disabled', 'yep');
                        }
                    }
                });
            });
        </script>
    </body>
</html>
