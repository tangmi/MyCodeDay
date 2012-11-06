<?php

/* teams/details/edit.html.twig */
class __TwigTemplate_553fa389fcd2aa1784a928e5c754bba7 extends Twig_Template
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
        echo "        <div class=\"span6 box\">
            <h1>Team Details</h1>
            <form method=\"post\">
                <input type=\"text\" class=\"input-xlarge\" name=\"name\" placeholder=\"Team Name\" value=\"";
        // line 13
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["team"]) ? $context["team"] : null), "name"), "html", null, true);
        echo "\" /><br />
                <input type=\"text\" class=\"input-xlarge\" name=\"website_link\" placeholder=\"Team Website URL\" value=\"";
        // line 14
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["team"]) ? $context["team"] : null), "website_link"), "html", null, true);
        echo "\" /><br />
                <input type=\"text\" class=\"input-xlarge\" name=\"try_link\" placeholder=\"Try It URL\" value=\"";
        // line 15
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["team"]) ? $context["team"] : null), "try_link"), "html", null, true);
        echo "\" /><br />
                <textarea name=\"description\" class=\"input-xlarge\" placeholder=\"Describe what you're making.\">";
        // line 16
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["team"]) ? $context["team"] : null), "description"), "html", null, true);
        echo "</textarea><br />

                ";
        // line 18
        if ($this->getAttribute((isset($context["registrant"]) ? $context["registrant"] : null), "is_organizer")) {
            // line 19
            echo "                    <h2>Organizer Settings</h2>
                    <input type=\"text\" class=\"input-xlarge\" name=\"video_link\" placeholder=\"Video URL\" value=\"";
            // line 20
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["team"]) ? $context["team"] : null), "video_link"), "html", null, true);
            echo "\" /><br />
                    <input type=\"text\" class=\"input-xlarge\" name=\"presentation_link\" placeholder=\"Presentation URL\" value=\"";
            // line 21
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["team"]) ? $context["team"] : null), "presentation_link"), "html", null, true);
            echo "\" /><br />
                    <input type=\"text\" class=\"input-xlarge\" name=\"team_picture_url\" placeholder=\"Team Picture URL\" value=\"";
            // line 22
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["team"]) ? $context["team"] : null), "team_picture_url"), "html", null, true);
            echo "\" /><br />
                ";
        }
        // line 24
        echo "
                <input class=\"btn btn-primary\" type=\"submit\" value=\"Update\" />
                <a class=\"btn btn-danger\" href=\"/teams/details/disband/";
        // line 26
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["team"]) ? $context["team"] : null), "teamID"), "html", null, true);
        echo "\">Disband</a>
            </form>
        </div>

        <div class=\"span5 box\">
            <h1>Members</h1>
            <ul>
                ";
        // line 33
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["team"]) ? $context["team"] : null), "registrants"));
        foreach ($context['_seq'] as $context["_key"] => $context["member"]) {
            // line 34
            echo "                    <li>
                        ";
            // line 35
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["member"]) ? $context["member"] : null), "name"), "html", null, true);
            echo "
                        <form method=\"post\" action=\"/teams/details/membership/leave/";
            // line 36
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["team"]) ? $context["team"] : null), "teamID"), "html", null, true);
            echo "\" style=\"display:inline\">
                            <input type=\"hidden\" name=\"userID\" value=\"";
            // line 37
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["member"]) ? $context["member"] : null), "registrantID"), "html", null, true);
            echo "\" />
                            <input class=\"btn btn-warning\" type=\"submit\" value=\"Kick\" />
                        </form>
                    </li>
                ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['member'], $context['_parent'], $context['loop']);
        $context = array_merge($_parent, array_intersect_key($context, $_parent));
        // line 42
        echo "            </ul>

            <h2>Add a Member</h2>
            <form method=\"post\" action=\"/teams/details/membership/join/";
        // line 45
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["team"]) ? $context["team"] : null), "teamID"), "html", null, true);
        echo "\">
                <input type=\"text\" name=\"first_name\" placeholder=\"First Name\" />
                <input type=\"text\" name=\"last_name\" placeholder=\"Last Name\" /><br />
                <input class=\"btn btn-success\" type=\"submit\" value=\"Add\" />
            </form>
        </div>
    </div>
";
    }

    public function getTemplateName()
    {
        return "teams/details/edit.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  128 => 45,  123 => 42,  112 => 37,  108 => 36,  104 => 35,  101 => 34,  97 => 33,  87 => 26,  83 => 24,  78 => 22,  74 => 21,  70 => 20,  67 => 19,  65 => 18,  60 => 16,  56 => 15,  52 => 14,  48 => 13,  43 => 10,  37 => 7,  34 => 6,  32 => 5,  29 => 4,  26 => 3,);
    }
}
