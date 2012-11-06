<?php

/* people/password.html.twig */
class __TwigTemplate_dffb821eb925180c0d242ace877213dd extends Twig_Template
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
        echo "    ";
        if ((isset($context["error"]) ? $context["error"] : null)) {
            // line 5
            echo "        <div class=\"alert alert-danger\">
            ";
            // line 6
            echo twig_escape_filter($this->env, (isset($context["error"]) ? $context["error"] : null), "html", null, true);
            echo "
        </div>
    ";
        }
        // line 9
        echo "    <span class=\"span12 box\">
        <h1>Change Password</h1>

        <form method=\"post\">
            <input type=\"password\" name=\"password\" placeholder=\"Password\" />
            <input type=\"password\" name=\"password_confirm\" placeholder=\"Password (Confirm)\" />
            <input type=\"submit\" class=\"btn btn-success\" value=\"Update\" />
        </form>
    </span>
";
    }

    public function getTemplateName()
    {
        return "people/password.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  41 => 9,  35 => 6,  32 => 5,  29 => 4,  26 => 3,);
    }
}
