<?php

/* template.html */
class __TwigTemplate_d82f1fe65472d50fd399db6b429db5ba extends Twig_Template
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
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["event"]) ? $context["event"] : null), "title"), "html", null, true);
        echo " - Presented by StudentRND</title>
        <meta property=\"og:title\" content=\"CodeDay ";
        // line 5
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["event"]) ? $context["event"] : null), "title"), "html", null, true);
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
        echo twig_escape_filter($this->env, twig_lower_filter($this->env, $this->getAttribute((isset($context["event"]) ? $context["event"] : null), "title")), "html", null, true);
        echo ".codeday.org/assets/img/preview.jpg\" />
        <meta property=\"og:image\" content=\"http://";
        // line 11
        echo twig_escape_filter($this->env, twig_lower_filter($this->env, $this->getAttribute((isset($context["event"]) ? $context["event"] : null), "title")), "html", null, true);
        echo ".codeday.org/assets/img/preview.jpg\" />

        <meta property=\"og:type\" content=\"activity\"/>
        <meta property=\"fb:app_id\" content=\"254735791261112\"/>
        <meta property=\"fb:admins\" content=\"529109178\"/>


        <link rel=\"stylesheet\" href=\"/assets/css/bootstrap.css\"/>
        <link rel=\"stylesheet\" type=\"text/css\" href=\"/assets/css/view.css\"/>
    </head>

    <body>
        <!-- Navigation -->
        <div class=\"navbar navbar-fixed-top\">
            <div class=\"navbar-inner\">
                <div class=\"container\">
                    <a class=\"brand\" href=\"/\">
                        CodeDay ";
        // line 28
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["event"]) ? $context["event"] : null), "title"), "html", null, true);
        echo "
                    </a>
                    <div class=\"nav-collapse\">
                        <ul class=\"nav pull-right\">
                            <li class=\"active\"><a href=\"/\">Home</a></li>
                            <li><a href=\"/schedule.html\">Schedule</a></li>
                            <li><a href=\"/register.html\">Register</a></li>
                            <li><a href=\"/faq.html\">FAQ</a></li>
                            <li><a href=\"http://codeday.org/past.html?city=portland\">Past Events</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <!-- Header -->
        <div class=\"header\">
            <div class=\"container\">
                <h1>CodeDay ";
        // line 46
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["event"]) ? $context["event"] : null), "title"), "html", null, true);
        echo "</h1>
                <h2>";
        // line 47
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["event"]) ? $context["event"] : null), "tagline"), "html", null, true);
        echo "</h2>
                <hr class=\"clearfix\" />
                <a class=\"btn\" href=\"/register.html\">Register Today!</a>
                <p>";
        // line 50
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["event"]) ? $context["event"] : null), "time_period_string"), "html", null, true);
        echo " at ";
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["event"]) ? $context["event"] : null), "location_name"), "html", null, true);
        echo "</p>
            </div>
        </div>

        <!-- Main Content -->
        <div class=\"container\">
            ";
        // line 56
        $this->displayBlock('content', $context, $blocks);
        // line 58
        echo "        </div>

        <footer>
            <div class=\"container\">
                <p class=\"pull-left\">
                    Copyright &copy; 2012 Student Research and Development. All rights reserved.
                </p>
                <p class=\"pull-right\">
                    <a href=\"http://github.com/StudentRND/MyCodeDay\">Fork me on Github!</a>
                </p>
            </div>
        </footer>
    </body>
</html>
";
    }

    // line 56
    public function block_content($context, array $blocks = array())
    {
        // line 57
        echo "            ";
    }

    public function getTemplateName()
    {
        return "template.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  134 => 57,  131 => 56,  113 => 58,  111 => 56,  100 => 50,  94 => 47,  90 => 46,  69 => 28,  49 => 11,  45 => 10,  36 => 8,  32 => 7,  27 => 5,  23 => 4,  18 => 1,  29 => 4,  26 => 3,);
    }
}
