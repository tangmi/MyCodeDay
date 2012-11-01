<?php include(TEMPLATE_DIR . '/my/header.php'); ?>
    <!-- General team settings -->
    <div class="metro purple">
        <div class="container">
            <div class="row-fluid">
                <div class="span12">
                    <h1>Team Settings</h1>
                    <p>The information you provide will be used by the judges, so the more descriptive you can be the
                        better. It will also be used for the CodeDay website.</p>
                    <form method="post">
                        <div class="row">
                            <div class="span2"></div>
                            <div class="span6">
                                <fieldset>
                                    <div class="clearfix">
                                        <input type="text" placeholder="Team Name" name="name" id="name" class="input-xxlarge" value="<?=htmlentities($this->team->name)?>">
                                    </div>
                                    <div class="clearfix">
                                        <?php $description = $this->request->post('description') ? $this->request->post('description') : $this->team->description; ?>
                                        <textarea style="height:200px" placeholder="What are you making?" name="description" id="description" class="input-xxlarge"><?=htmlentities($description)?></textarea>
                                    </div>
                                    <div class="clearfix">
                                        <?php $website_link = $this->request->post('website_link') ? $this->request->post('website_link') : $this->team->website_link; ?>
                                        <input type="text" placeholder="Website URL" name="website_link" id="website_link" class="input-xxlarge" value="<?=htmlentities($website_link)?>">
                                    </div>
                                    <div class="clearfix">
                                        <?php $play_link = $this->request->post('play_link') ? $this->request->post('play_link') : $this->team->play_link; ?>
                                        <input type="text" placeholder="Play Game URL" name="play_link" id="play_link" class="input-xxlarge" value="<?=htmlentities($play_link)?>">
                                    </div>
                                </fieldset>
                            </div>
                            <div class="span2">
                                    <button class="btn btn-primary" id="submit" type="submit">Update</button><br />
                                    <a href="<?=\CuteControllers\Router::link('/teams/disband/' . $this->team->teamID)?>" class="btn">Disband</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Members -->
    <div class="metro orange">
        <div class="container">
            <div class="row-fluid">
                <div class="span12">
                    <h1>Members</h1>
                    <?php foreach ($this->team->registrants as $registrant) : ?>
                        <?php include (TEMPLATE_DIR . '/my/widgets/registrant_face.php'); ?>
                    <?php endforeach; ?>
                </div>
            </div>
            <div class="row-fluid">
                <div class="span12">
                    <h1>Add a member</h1>
                    <form method="post" action="<?=\CuteControllers\Router::link('/teams/members/add/' . $this->team->teamID)?>">
                        <input type="text" name="first_name" placeholder="First Name" class="input-xlarge" />
                        <input type="text" name="last_name" placeholder="Last Name" class="input-xlarge" />
                        <input type="submit" value="Add" class="btn btn-primary" />
                    </form>
                </div>
            </div>
        </div>
    </div>

<script type="text/javascript">
    (function(){

        var onHoverFaceLambda = function()
        {
            var x_html = '<form id="remove" method="post" action="<?=\CuteControllers\Router::link("/teams/members/remove/" . $this->team->teamID)?>">';
            x_html += '<input type="hidden" name="registrantID" value="' + $(this).attr('data-id') + '" />';
            x_html += '<input type="submit" value="x" />';
            x_html += '</form>';

            x = $(x_html).click(function(){
                console.log(this);
            });

            $(this).prepend(x);
        }

        var onHoverOutFaceLambda = function()
        {
            $(this).children('form#remove').remove();
        }

        $('.registrant-face').hover(onHoverFaceLambda, onHoverOutFaceLambda);


    })();
</script>
<?php include(TEMPLATE_DIR . '/my/footer.php'); ?>
