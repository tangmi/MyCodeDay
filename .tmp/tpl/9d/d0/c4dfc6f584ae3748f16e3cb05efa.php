<?php

/* teams/create.html.twig */
class __TwigTemplate_9dd0c4dfc6f584ae3748f16e3cb05efa extends Twig_Template
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
            <h1>Form a Team</h1>
            <p>All we need to get started is a name (you can change it). You'll be able to add more details to your team later.</p>
            <form method=\"post\">
                <input type=\"text\" name=\"name\" placeholder=\"Team Name\" /><br />
                <input class=\"btn btn-primary\" type=\"submit\" value=\"Do it!\" />
            </form>
        </div>
    </div>
";
    }

    public function getTemplateName()
    {
        return "teams/create.html.twig";
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
