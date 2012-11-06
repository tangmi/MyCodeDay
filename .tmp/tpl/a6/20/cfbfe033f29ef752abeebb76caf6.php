<?php

/* people/profile.html.twig */
class __TwigTemplate_a620cfbfe033f29ef752abeebb76caf6 extends Twig_Template
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
        echo "    <div class=\"row nopad homeboxes\">
        <span class=\"span12 box\" style=\"padding: 5px\">
            ";
        // line 6
        if ($this->getAttribute((isset($context["person"]) ? $context["person"] : null), "profile_image")) {
            // line 7
            echo "                <div class=\"circle pull-left\" style=\"margin-right: 10px;\">
                    <img class=\"mug\" src=\"";
            // line 8
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["person"]) ? $context["person"] : null), "profile_image"), "html", null, true);
            echo "\" />
                </div>
            ";
        }
        // line 11
        echo "            <h1>
                ";
        // line 12
        if ($this->getAttribute($this->getAttribute((isset($context["config"]) ? $context["config"] : null), "app"), "local")) {
            // line 13
            echo "                    ";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["person"]) ? $context["person"] : null), "name"), "html", null, true);
            echo "
                ";
        } else {
            // line 15
            echo "                    ";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["person"]) ? $context["person"] : null), "first_name"), "html", null, true);
            echo "
                ";
        }
        // line 17
        echo "            </h1>
            <h2>";
        // line 18
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["person"]) ? $context["person"] : null), "work"), "html", null, true);
        echo "</h2>
            ";
        // line 19
        if (($this->getAttribute($this->getAttribute((isset($context["config"]) ? $context["config"] : null), "app"), "local") && $this->getAttribute((isset($context["person"]) ? $context["person"] : null), "website"))) {
            // line 20
            echo "                <a href=\"";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["person"]) ? $context["person"] : null), "website"), "html", null, true);
            echo "\" target=\"_blank\">Website</a>
            ";
        }
        // line 22
        echo "
            ";
        // line 23
        if (($this->getAttribute($this->getAttribute((isset($context["config"]) ? $context["config"] : null), "app"), "local") && $this->getAttribute((isset($context["person"]) ? $context["person"] : null), "email"))) {
            // line 24
            echo "                <a href=\"mailto:";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["person"]) ? $context["person"] : null), "email"), "html", null, true);
            echo "\">Email</a>
            ";
        }
        // line 26
        echo "        </span>

        <hr class=\"clearfix\" />

        ";
        // line 30
        if ($this->getAttribute((isset($context["person"]) ? $context["person"] : null), "bio")) {
            // line 31
            echo "            <span class=\"span6\">
                <span style=\"margin-left: 0px;\" class=\"span6 box\">
                    <h1>Bio</h1>
                    <p>";
            // line 34
            echo nl2br(twig_escape_filter($this->env, $this->getAttribute((isset($context["person"]) ? $context["person"] : null), "bio"), "html", null, true));
            echo "</p>
                </span>
            </span>
        ";
        }
        // line 38
        echo "
        ";
        // line 39
        if ($this->getAttribute((isset($context["person"]) ? $context["person"] : null), "skills")) {
            // line 40
            echo "            <span class=\"span6\">
                <span class=\"span6 box\">
                    <h1>Skills</h1>
                    <ul>
                        ";
            // line 44
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["person"]) ? $context["person"] : null), "skills_list"));
            foreach ($context['_seq'] as $context["_key"] => $context["skill"]) {
                // line 45
                echo "                            <li>";
                echo twig_escape_filter($this->env, (isset($context["skill"]) ? $context["skill"] : null), "html", null, true);
                echo "</li>
                        ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['skill'], $context['_parent'], $context['loop']);
            $context = array_merge($_parent, array_intersect_key($context, $_parent));
            // line 47
            echo "                    </ul>
                </span>
            </span>
        ";
        }
        // line 51
        echo "    </div>
";
    }

    public function getTemplateName()
    {
        return "people/profile.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  137 => 51,  131 => 47,  122 => 45,  118 => 44,  112 => 40,  110 => 39,  107 => 38,  100 => 34,  95 => 31,  93 => 30,  87 => 26,  81 => 24,  79 => 23,  76 => 22,  70 => 20,  68 => 19,  64 => 18,  61 => 17,  55 => 15,  49 => 13,  47 => 12,  44 => 11,  38 => 8,  35 => 7,  33 => 6,  29 => 4,  26 => 3,);
    }
}
