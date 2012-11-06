<?php

/* template.html.twig */
class __TwigTemplate_0f4687385d8641e849bd19402fc7bf15 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
            'content' => array($this, 'block_content'),
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        echo "<!DOCTYPE html>
<html lang=\"en\">
    <head>
        <title>CodeDay ";
        // line 4
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["event"]) ? $context["event"] : null), "name"), "html", null, true);
        echo " - Presented by StudentRND</title>
        <meta property=\"og:title\" content=\"CodeDay ";
        // line 5
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["event"]) ? $context["event"] : null), "name"), "html", null, true);
        echo " (presented by StudentRND)\"/>

        <meta name=\"description\" content=\"";
        // line 7
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["event"]) ? $context["event"] : null), "tagline"), "html", null, true);
        echo "\" />
        <meta property=\"og:description\" content=\"";
        // line 8
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["event"]) ? $context["event"] : null), "time_period_string"), "html", null, true);
        echo " at ";
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["event"]) ? $context["event"] : null), "location_name"), "html", null, true);
        echo ". ";
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["event"]) ? $context["event"] : null), "tagline"), "html", null, true);
        echo "\"/>

        <link rel=\"img_src\" href=\"http://";
        // line 10
        echo twig_escape_filter($this->env, twig_lower_filter($this->env, $this->getAttribute((isset($context["event"]) ? $context["event"] : null), "name")), "html", null, true);
        echo ".codeday.org/assets/img/preview.jpg\" />
        <meta property=\"og:image\" content=\"http://";
        // line 11
        echo twig_escape_filter($this->env, twig_lower_filter($this->env, $this->getAttribute((isset($context["event"]) ? $context["event"] : null), "name")), "html", null, true);
        echo ".codeday.org/assets/img/preview.jpg\" />

        <meta property=\"og:type\" content=\"activity\"/>
        <meta property=\"fb:app_id\" content=\"254735791261112\"/>
        <meta property=\"fb:admins\" content=\"529109178\"/>


        <link rel=\"stylesheet\" href=\"/assets/css/bootstrap.css\"/>
        <link rel=\"stylesheet\" type=\"text/css\" href=\"/assets/css/view.css\"/>

        ";
        // line 22
        echo "        <style type=\"text/css\">
            .header .container h1 {
                background: rgba(";
        // line 24
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["event"]) ? $context["event"] : null), "color_rgb"), "r"), "html", null, true);
        echo ", ";
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["event"]) ? $context["event"] : null), "color_rgb"), "g"), "html", null, true);
        echo ", ";
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["event"]) ? $context["event"] : null), "color_rgb"), "b"), "html", null, true);
        echo ", 0.7);
            }

            .header .container h2,
            .brand span,
            a,
            a:hover,
            .navbar .nav > li.active > a {
                color: #";
        // line 32
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["event"]) ? $context["event"] : null), "accent_color"), "html", null, true);
        echo ";
            }

            .brand img {
                background-color: #";
        // line 36
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["event"]) ? $context["event"] : null), "color"), "html", null, true);
        echo ";
            }

            .header {
                background-image: url('";
        // line 40
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["event"]) ? $context["event"] : null), "hero_background_url"), "html", null, true);
        echo "');
            }

            .table-striped tbody tr:nth-child(odd) td, .table-striped tbody tr:nth-child(odd) th {
                background-color: #";
        // line 44
        echo twig_escape_filter($this->env, (isset($context["accent_color_light"]) ? $context["accent_color_light"] : null), "html", null, true);
        echo ";
            }

            a,
            a:hover {
                border-bottom-color: #";
        // line 49
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["event"]) ? $context["event"] : null), "accent_color"), "html", null, true);
        echo ";
            }

            ::selection {
                background: #";
        // line 53
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["event"]) ? $context["event"] : null), "color"), "html", null, true);
        echo ";
                color: #fff;
            }
            ::-moz-selection {
                background: #";
        // line 57
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["event"]) ? $context["event"] : null), "color"), "html", null, true);
        echo ";
                color: #fff;
            }
        </style>
    </head>
    <body>
        <script src=\"/assets/js/jquery.min.js\"></script>
        <script src=\"https://api.filepicker.io/v0/filepicker.js\"></script>
        <script type=\"text/javascript\">
            filepicker.setKey('AozhoHj1fTciEN2hZl3_Fz');
        </script>
        ";
        // line 69
        echo "        <div class=\"navbar navbar-fixed-top\">
            <div class=\"navbar-inner\">
                <div class=\"container\">
                    <a class=\"brand\" href=\"http://codeday.org/\">
                        <img src=\"/assets/img/codeday-logo-chameleon.png\" />
                        CodeDay
                    </a>
                    <a class=\"brand\" href=\"/\">
                        <span>";
        // line 77
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["event"]) ? $context["event"] : null), "name"), "html", null, true);
        echo "</span>
                    </a>
                    <div class=\"nav-collapse\">
                        ";
        // line 80
        $this->env->loadTemplate("nav.html.twig")->display($context);
        // line 81
        echo "                    </div>
                </div>
            </div>
        </div>

        ";
        // line 87
        echo "        <div class=\"header\">
            <div class=\"container\">
                <h1>CodeDay ";
        // line 89
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["event"]) ? $context["event"] : null), "name"), "html", null, true);
        echo "</h1>
                <h2>";
        // line 90
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["event"]) ? $context["event"] : null), "tagline"), "html", null, true);
        echo "</h2>
                <hr class=\"clearfix\" />
                <a class=\"btn\" href=\"/register.html\">Register Today!</a>
                <p>";
        // line 93
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["event"]) ? $context["event"] : null), "time_period_string"), "html", null, true);
        echo " at <a href=\"";
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["event"]) ? $context["event"] : null), "location_map_link"), "html", null, true);
        echo "\">";
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["event"]) ? $context["event"] : null), "location_name"), "html", null, true);
        echo "</a></p>
            </div>
        </div>

        ";
        // line 98
        echo "        <div class=\"container\">
            ";
        // line 99
        $this->displayBlock('content', $context, $blocks);
        // line 101
        echo "        </div>

        ";
        // line 104
        echo "        <footer>
            <div class=\"container\">
                <p class=\"pull-left\">
                    Copyright &copy; 2012 Student Research and Development. All rights reserved.
                </p>
                <p class=\"pull-right\">
                    <a href=\"http://github.com/StudentRND/MyCodeDay\">Fork me on Github!</a>
                </p>
            </div>
        </footer>

        ";
        // line 116
        echo "        <div id=\"fb-root\"></div>
        <script>(function(d, s, id) {
          var js, fjs = d.getElementsByTagName(s)[0];
          if (d.getElementById(id)) return;
          js = d.createElement(s); js.id = id;
          js.src = \"//connect.facebook.net/en_US/all.js#xfbml=1&appId=485616084806180\";
          fjs.parentNode.insertBefore(js, fjs);
        }(document, 'script', 'facebook-jssdk'));</script>

        <script type=\"text/javascript\">
          var _gaq = _gaq || [];
          _gaq.push(['_setAccount', 'UA-8868191-6']);
          _gaq.push(['_trackPageview']);

          (function() {
            var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
            ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
            var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
          })();
        </script>
    </body>
</html>
";
    }

    // line 99
    public function block_content($context, array $blocks = array())
    {
        // line 100
        echo "            ";
    }

    public function getTemplateName()
    {
        return "template.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  239 => 100,  236 => 99,  210 => 116,  197 => 104,  193 => 101,  191 => 99,  188 => 98,  177 => 93,  171 => 90,  167 => 89,  163 => 87,  156 => 81,  154 => 80,  148 => 77,  138 => 69,  124 => 57,  117 => 53,  110 => 49,  102 => 44,  95 => 40,  88 => 36,  81 => 32,  66 => 24,  62 => 22,  49 => 11,  45 => 10,  27 => 5,  23 => 4,  18 => 1,  44 => 10,  42 => 9,  36 => 8,  32 => 7,  29 => 4,  26 => 3,);
    }
}
