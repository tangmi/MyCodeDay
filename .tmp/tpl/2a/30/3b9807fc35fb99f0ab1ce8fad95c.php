<?php

/* people/index.html.twig */
class __TwigTemplate_2a303b9807fc35fb99f0ab1ce8fad95c extends Twig_Template
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
            <h1>Judges, Mentors, Sponsors, and Event Staff</h1>
            ";
        // line 7
        if ($this->getAttribute((isset($context["event"]) ? $context["event"] : null), "special_registrants")) {
            // line 8
            echo "                ";
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["event"]) ? $context["event"] : null), "special_registrants"));
            foreach ($context['_seq'] as $context["_key"] => $context["member"]) {
                // line 9
                echo "                    <div class=\"userlisting\">
                        <a href=\"/person/";
                // line 10
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["member"]) ? $context["member"] : null), "registrantID"), "html", null, true);
                echo "\">
                            ";
                // line 11
                if ($this->getAttribute((isset($context["member"]) ? $context["member"] : null), "profile_image")) {
                    // line 12
                    echo "                                <img alt=\"Thumb\" src=\"";
                    echo twig_escape_filter($this->env, $this->getAttribute((isset($context["member"]) ? $context["member"] : null), "profile_image"), "html", null, true);
                    echo "\" />
                            ";
                } else {
                    // line 14
                    echo "                                <img alt=\"Thumb\" src=\"/assets/img/default_user.png\" />
                            ";
                }
                // line 16
                echo "
                            <div class=\"user_info\">
                                <div class=\"real_name\">
                                    <span class='first_name'>
                                        ";
                // line 20
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["member"]) ? $context["member"] : null), "name"), "html", null, true);
                echo "
                                    </span>
                                </div>
                                <div class=\"work\">
                                    ";
                // line 24
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["member"]) ? $context["member"] : null), "work"), "html", null, true);
                echo "
                                </div>
                            </div>
                        </a>
                    </div>
                ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['member'], $context['_parent'], $context['loop']);
            $context = array_merge($_parent, array_intersect_key($context, $_parent));
            // line 30
            echo "                <hr class=\"clearfix\" />
            ";
        }
        // line 32
        echo "

            <h1>Participants</h1>
            ";
        // line 35
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["event"]) ? $context["event"] : null), "participants"));
        foreach ($context['_seq'] as $context["_key"] => $context["member"]) {
            // line 36
            echo "                <div class=\"userlisting\">
                    <a href=\"/person/";
            // line 37
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["member"]) ? $context["member"] : null), "registrantID"), "html", null, true);
            echo "\">
                        ";
            // line 38
            if ($this->getAttribute((isset($context["member"]) ? $context["member"] : null), "profile_image")) {
                // line 39
                echo "                            <img alt=\"Thumb\" src=\"";
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["member"]) ? $context["member"] : null), "profile_image"), "html", null, true);
                echo "\" />
                        ";
            } else {
                // line 41
                echo "                            <img alt=\"Thumb\" src=\"/assets/img/default_user.png\" />
                        ";
            }
            // line 43
            echo "
                        <div class=\"user_info\">
                            <div class=\"real_name\">
                                <span class='first_name'>
                                    ";
            // line 47
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["member"]) ? $context["member"] : null), "name"), "html", null, true);
            echo "
                                </span>
                            </div>
                            <div class=\"work\">
                                ";
            // line 51
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["member"]) ? $context["member"] : null), "work"), "html", null, true);
            echo "
                            </div>
                        </div>
                    </a>
                </div>
            ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['member'], $context['_parent'], $context['loop']);
        $context = array_merge($_parent, array_intersect_key($context, $_parent));
        // line 57
        echo "            <hr class=\"clearfix\" />
        </div>
    </div>
";
    }

    public function getTemplateName()
    {
        return "people/index.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  142 => 57,  130 => 51,  123 => 47,  117 => 43,  113 => 41,  107 => 39,  105 => 38,  101 => 37,  98 => 36,  94 => 35,  89 => 32,  85 => 30,  73 => 24,  66 => 20,  60 => 16,  56 => 14,  50 => 12,  48 => 11,  44 => 10,  41 => 9,  36 => 8,  34 => 7,  29 => 4,  26 => 3,);
    }
}
