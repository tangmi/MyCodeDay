<?php

/* nav.html.twig */
class __TwigTemplate_313e4f1a7de4d9d4f48c8acc89e1e2de extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        $context["nav"] = array(0 => array("name" => "Home", "uri" => "/index.html"), 1 => array("name" => "Schedule", "uri" => "/schedule.html"));
        // line 5
        echo "
";
        // line 7
        if (($this->getAttribute((isset($context["event"]) ? $context["event"] : null), "has_ended") || $this->getAttribute($this->getAttribute((isset($context["config"]) ? $context["config"] : null), "app"), "local"))) {
            // line 8
            echo "    ";
            $context["nav"] = twig_array_merge((isset($context["nav"]) ? $context["nav"] : null), array(0 => array("name" => "Teams", "uri" => "/teams.html")));
        }
        // line 10
        echo "
";
        // line 12
        if ($this->getAttribute($this->getAttribute((isset($context["config"]) ? $context["config"] : null), "app"), "local")) {
            // line 13
            echo "    ";
            $context["nav"] = twig_array_merge((isset($context["nav"]) ? $context["nav"] : null), array(0 => array("name" => "Rules", "uri" => "/rules.html")));
            // line 14
            echo "    ";
            $context["nav"] = twig_array_merge((isset($context["nav"]) ? $context["nav"] : null), array(0 => array("name" => "Videos", "uri" => "/videos.html")));
            // line 15
            echo "    ";
            $context["nav"] = twig_array_merge((isset($context["nav"]) ? $context["nav"] : null), array(0 => array("name" => "People", "uri" => "/people.html")));
            // line 16
            echo "    ";
            if ((isset($context["is_logged_in"]) ? $context["is_logged_in"] : null)) {
                // line 17
                echo "        ";
                $context["nav"] = twig_array_merge((isset($context["nav"]) ? $context["nav"] : null), array(0 => array("name" => "Me", "uri" => ("/person/" . $this->getAttribute((isset($context["registrant"]) ? $context["registrant"] : null), "registrantID")))));
                // line 18
                echo "    ";
            } else {
                // line 19
                echo "        ";
                $context["nav"] = twig_array_merge((isset($context["nav"]) ? $context["nav"] : null), array(0 => array("name" => "Login", "uri" => "/login.html")));
                // line 20
                echo "    ";
            }
            // line 21
            echo "
";
        } else {
            // line 23
            echo "    ";
            $context["nav"] = twig_array_merge((isset($context["nav"]) ? $context["nav"] : null), array(0 => array("name" => "FAQ", "uri" => "/faq.html")));
        }
        // line 25
        echo "
";
        // line 26
        if ((!($this->getAttribute($this->getAttribute((isset($context["config"]) ? $context["config"] : null), "app"), "local") || $this->getAttribute((isset($context["event"]) ? $context["event"] : null), "has_ended")))) {
            // line 27
            echo "    ";
            $context["nav"] = twig_array_merge((isset($context["nav"]) ? $context["nav"] : null), array(0 => array("name" => "Register", "uri" => "/register.html")));
        }
        // line 29
        echo "
";
        // line 30
        if ((isset($context["is_logged_in"]) ? $context["is_logged_in"] : null)) {
            // line 31
            echo "    ";
            if ($this->getAttribute((isset($context["registrant"]) ? $context["registrant"] : null), "is_organizer")) {
                // line 32
                echo "        ";
                $context["nav"] = twig_array_merge((isset($context["nav"]) ? $context["nav"] : null), array(0 => array("name" => "Admin", "uri" => "/admin.html")));
                // line 33
                echo "    ";
            }
        }
        // line 35
        echo "
";
        // line 37
        if ((!$this->getAttribute($this->getAttribute((isset($context["config"]) ? $context["config"] : null), "app"), "local"))) {
            // line 38
            echo "    ";
            $context["nav"] = twig_array_merge((isset($context["nav"]) ? $context["nav"] : null), array(0 => array("name" => "Past Events", "uri" => ("http://codeday.org/past.html?city=" . twig_lower_filter($this->env, $this->getAttribute((isset($context["event"]) ? $context["event"] : null), "name"))))));
        }
        // line 40
        echo "
<ul class=\"nav pull-right\">
    ";
        // line 42
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["nav"]) ? $context["nav"] : null));
        foreach ($context['_seq'] as $context["_key"] => $context["page"]) {
            // line 43
            echo "        ";
            if (($this->getAttribute((isset($context["page"]) ? $context["page"] : null), "uri") == (isset($context["current_page"]) ? $context["current_page"] : null))) {
                // line 44
                echo "            <li class=\"active\">
        ";
            } else {
                // line 46
                echo "            <li>
        ";
            }
            // line 48
            echo "            <a href=\"";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["page"]) ? $context["page"] : null), "uri"), "html", null, true);
            echo "\">
                ";
            // line 49
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["page"]) ? $context["page"] : null), "name"), "html", null, true);
            echo "
            </a>
        </li>
    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['page'], $context['_parent'], $context['loop']);
        $context = array_merge($_parent, array_intersect_key($context, $_parent));
        // line 53
        echo "</ul>
";
    }

    public function getTemplateName()
    {
        return "nav.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  132 => 53,  122 => 49,  113 => 46,  109 => 44,  106 => 43,  98 => 40,  94 => 38,  92 => 37,  89 => 35,  85 => 33,  82 => 32,  79 => 31,  77 => 30,  74 => 29,  70 => 27,  68 => 26,  65 => 25,  61 => 23,  57 => 21,  54 => 20,  51 => 19,  48 => 18,  39 => 15,  33 => 13,  31 => 12,  28 => 10,  24 => 8,  22 => 7,  19 => 5,  17 => 1,  239 => 100,  236 => 99,  210 => 116,  197 => 104,  193 => 101,  191 => 99,  188 => 98,  177 => 93,  171 => 90,  167 => 89,  163 => 87,  156 => 81,  154 => 80,  148 => 77,  138 => 69,  124 => 57,  117 => 48,  110 => 49,  102 => 42,  95 => 40,  88 => 36,  81 => 32,  66 => 24,  62 => 22,  49 => 11,  45 => 17,  27 => 5,  23 => 4,  18 => 1,  44 => 10,  42 => 16,  36 => 14,  32 => 7,  29 => 4,  26 => 3,);
    }
}
