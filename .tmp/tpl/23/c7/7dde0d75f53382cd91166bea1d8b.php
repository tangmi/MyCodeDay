<?php

/* admin/sms.html.twig */
class __TwigTemplate_23c77dde0d75f53382cd91166bea1d8b extends Twig_Template
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
            <h1>Send SMS</h1>
            ";
        // line 7
        if ((isset($context["output"]) ? $context["output"] : null)) {
            // line 8
            echo "                <tt>";
            echo (isset($context["output"]) ? $context["output"] : null);
            echo "</tt>
            ";
        } else {
            // line 10
            echo "                <p>This page will send an SMS to all participants subscribed to text alergs</p>
                <form method=\"post\">
                    <input type=\"text\" name=\"message\" placeholder=\"Message\" maxlength=\"160\" />
                    <input type=\"submit\" class=\"btn btn-danger\" value=\"Send\" />
                </form>
            ";
        }
        // line 16
        echo "        </div>
    </div>
";
    }

    public function getTemplateName()
    {
        return "admin/sms.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  50 => 16,  42 => 10,  36 => 8,  34 => 7,  29 => 4,  26 => 3,);
    }
}
