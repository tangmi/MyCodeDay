<?php

/* teams/index.html.twig */
class __TwigTemplate_aa3c74205685455bde71de630f22f261 extends Twig_Template
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
        if ((isset($context["is_logged_in"]) ? $context["is_logged_in"] : null)) {
            // line 5
            echo "        <a class=\"btn btn-large btn-block btn-primary\" href=\"/teams/create\">Form a New Team</a>
    ";
        }
        // line 7
        echo "    <div class=\"row\">
        <div class=\"span12 box\">
            <h1>Teams</h1>

            ";
        // line 11
        if ($this->getAttribute((isset($context["event"]) ? $context["event"] : null), "teams")) {
            // line 12
            echo "                <ul class=\"teamlist\">
                    ";
            // line 13
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["event"]) ? $context["event"] : null), "teams"));
            foreach ($context['_seq'] as $context["_key"] => $context["team"]) {
                // line 14
                echo "                        <div class='team-container'>
                            <h2 class='team_name'>
                                <a href=\"/teams/details/";
                // line 16
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["team"]) ? $context["team"] : null), "teamID"), "html", null, true);
                echo "\">";
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["team"]) ? $context["team"] : null), "name"), "html", null, true);
                echo "</a>
                            </h2>
                            <p>
                                ";
                // line 19
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["team"]) ? $context["team"] : null), "description"), "html", null, true);
                echo "
                            </p>

                            ";
                // line 22
                $context['_parent'] = (array) $context;
                $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["team"]) ? $context["team"] : null), "registrants"));
                foreach ($context['_seq'] as $context["_key"] => $context["member"]) {
                    // line 23
                    echo "                                <div class=\"userlisting\">
                                    <a href=\"/person/";
                    // line 24
                    echo twig_escape_filter($this->env, $this->getAttribute((isset($context["member"]) ? $context["member"] : null), "registrantID"), "html", null, true);
                    echo "\">
                                        ";
                    // line 25
                    if ($this->getAttribute((isset($context["member"]) ? $context["member"] : null), "profile_image")) {
                        // line 26
                        echo "                                            <img alt=\"Thumb\" src=\"";
                        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["member"]) ? $context["member"] : null), "profile_image"), "html", null, true);
                        echo "\" />
                                        ";
                    } else {
                        // line 28
                        echo "                                            <img alt=\"Thumb\" src=\"/assets/img/default_user.png\" />
                                        ";
                    }
                    // line 30
                    echo "
                                        <div class=\"user_info\">
                                            <div class=\"real_name\">
                                                <span class='first_name'>
                                                    ";
                    // line 34
                    echo twig_escape_filter($this->env, $this->getAttribute((isset($context["member"]) ? $context["member"] : null), "name"), "html", null, true);
                    echo "
                                                </span>
                                            </div>
                                            <div class=\"work\">
                                                ";
                    // line 38
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
                // line 44
                echo "                        </div>
                    ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['team'], $context['_parent'], $context['loop']);
            $context = array_merge($_parent, array_intersect_key($context, $_parent));
            // line 46
            echo "                </ul>
            ";
        } else {
            // line 48
            echo "                <div class=\"alert alert-info\">
                    There are no teams yet. Make one!
                </div>
            ";
        }
        // line 52
        echo "        </div>
    </div>
";
    }

    public function getTemplateName()
    {
        return "teams/index.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  134 => 52,  128 => 48,  124 => 46,  117 => 44,  105 => 38,  98 => 34,  92 => 30,  88 => 28,  82 => 26,  80 => 25,  76 => 24,  73 => 23,  69 => 22,  63 => 19,  55 => 16,  51 => 14,  47 => 13,  44 => 12,  42 => 11,  36 => 7,  32 => 5,  29 => 4,  26 => 3,);
    }
}
