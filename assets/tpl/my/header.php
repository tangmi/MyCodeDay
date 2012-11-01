
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>My.CodeDay</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="StudentRND">

        <link href="<?=ASSETS_URI?>/css/bootstrap.min.css" rel="stylesheet" />
        <link href="<?=ASSETS_URI?>/css/bootstrap-responsive.min.css" rel="stylesheet" />
        <link href="<?=ASSETS_URI?>/css/style.css" rel="stylesheet" />
        <link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Droid+Sans:400,700" />
        <link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Droid+Serif" />
        <link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Boogaloo" />
        <link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Economica:700,400italic" />
        <link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Open+Sans:400,300" />

        <!--[if lt IE 9]>
            <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
        <![endif]-->

    </head>
    <body>
        <script src="<?=ASSETS_URI?>/js/jquery.min.js"></script> <!-- bad practice...-->
        <header>
            <div class="container">
                <div class="row">
                    <div class="logo span3">
                        <a href="<?=\CuteControllers\Router::link('/')?>">
                            CodeDay <?=\StudentRND\CodeDay\Models\Registrant::current()->event->name?>
                        </a>
                    </div>
                    <div class="span9">
                        <div class="navbar navbar-inverse">
                            <div class="navbar-inner">
                                <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                </a>
                                <div class="nav-collapse collapse">
                                    <ul class="nav">
                                        <li class="active"><a href="<?=\CuteControllers\Router::link('/')?>">Home</a></li>
                                        <li><a href="<?=\CuteControllers\Router::link('/teams')?>">Teams</a></li>
                                        <li><a href="<?=\CuteControllers\Router::link('/resources')?>">Resources</a></li>
                                        <li><a href="<?=\CuteControllers\Router::link('/social')?>">Social</a></li>
                                        <li><a href="<?=\CuteControllers\Router::link('/schedule')?>">Schedule</a></li>
                                        <li><a href="<?=\CuteControllers\Router::link('/rules')?>">Rules</a></li>
                                        <li><a href="<?=\CuteControllers\Router::link('/judging')?>">Judging</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <div class="wrapper">
        <?php if (isset($error)) : ?>
            <div class="metro red">
                <div class="container">
                    <div class="row-fluid">
                        <div class="span12 about-me">
                            <h1>Error</h1>
                            <h2><?=$error?></h2>
                        </div>
                    </div>
                </div>
            </div>
        <?php endif; ?>
