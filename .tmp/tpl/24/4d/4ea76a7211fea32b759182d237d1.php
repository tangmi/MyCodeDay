<?php

/* login.html.twig */
class __TwigTemplate_244d4ea76a7211fea32b759182d237d1 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("template.html.twig");

        $this->blocks = array(
            'content' => array($this, 'block_content'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "template.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_content($context, array $blocks = array())
    {
        // line 4
        echo "    <div class=\"row\">
        ";
        // line 5
        if ((isset($context["error"]) ? $context["error"] : null)) {
            // line 6
            echo "            <div class=\"alert alert-danger\">
                ";
            // line 7
            echo twig_escape_filter($this->env, (isset($context["error"]) ? $context["error"] : null), "html", null, true);
            echo "
            </div>
        ";
        }
        // line 10
        echo "        <div class=\"span12 box\">
            <h1>Login</h1>
            <p>IF YOU HAVEN'T LOGGED IN BEFORE, YOU DO NOT NEED TO ENTER A PASSWORD.</p>
            <form method=\"post\">
                <input type=\"text\" name=\"first_name\" placeholder=\"First Name\" /><br />
                <input type=\"text\" name=\"last_name\" placeholder=\"Last Name\" /><br />
                <input type=\"password\" name=\"password\" placeholder=\"Password\" /><br />
                <input type=\"submit\" value=\"Log me in!\" />
            </form>
        </div>
    </div>
";
    }

    public function getTemplateName()
    {
        return "login.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  43 => 10,  37 => 7,  34 => 6,  32 => 5,  29 => 4,  26 => 3,);
    }
}
