<?php

/* teams/details/view.html.twig */
class __TwigTemplate_a055152b42d469ca6e98a9247ef52fe9 extends Twig_Template
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
        <div class=\"span12 box\">
            <h1>";
        // line 6
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["team"]) ? $context["team"] : null), "name"), "html", null, true);
        echo "</h1>
            ";
        // line 7
        if ($this->getAttribute((isset($context["team"]) ? $context["team"] : null), "website_link")) {
            // line 8
            echo "                <a class=\"team-website\" href=\"";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["team"]) ? $context["team"] : null), "website_link"), "html", null, true);
            echo "\" target=\"_blank\">";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["team"]) ? $context["team"] : null), "website_link"), "html", null, true);
            echo "</a>
            ";
        }
        // line 10
        echo "            <p>";
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["team"]) ? $context["team"] : null), "description"), "html", null, true);
        echo "</p>
        </div>
    </div>
";
    }

    public function getTemplateName()
    {
        return "teams/details/view.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  47 => 10,  39 => 8,  37 => 7,  33 => 6,  29 => 4,  26 => 3,);
    }
}
