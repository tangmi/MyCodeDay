<?php

/* register.html.twig */
class __TwigTemplate_a06d94d21741dd1ec6cf12e5f89e7031 extends Twig_Template
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
        <div class=\"span12 block\">
           <div style=\"width:100%; text-align:left;\" >
                <iframe
                    src=\"http://www.eventbrite.com/tickets-external?eid=";
        // line 8
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["event"]) ? $context["event"] : null), "eventbrite_id"), "html", null, true);
        echo "&amp;ref=etckt\"
                    frameborder=\"0\"
                    height=\"300\"
                    width=\"100%\"
                    vspace=\"0\"
                    hspace=\"0\"
                    marginheight=\"5\"
                    marginwidth=\"5\"
                    scrolling=\"auto\"
                    allowtransparency=\"true\"></iframe>
            </div>
        </div>
    </div>
";
    }

    public function getTemplateName()
    {
        return "register.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  35 => 8,  29 => 4,  26 => 3,);
    }
}
