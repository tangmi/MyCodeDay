<?php

/* schedule.html.twig */
class __TwigTemplate_e763a0fb44375a4f38d0d73b75e90a86 extends Twig_Template
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

            ";
        // line 8
        echo "            <div class=\"span5\">
                <table class=\"table table-striped\">
                    <h2> Event Schedule </h2>
                    <thead>
                        <tr>
                            <th>Time</th>
                            <th>Event</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>11:30 AM</td>
                            <td>Venue Opens</td>
                        </tr>
                        <tr>
                            <td>12 PM</td>
                            <td>Kickoff Talk &amp; Pizza</td>
                        </tr>
                        <tr>
                            <td>1 PM</td>
                            <td>Pitch Ideas and Form Teams</td>
                        </tr>
                        <tr>
                            <td>7 PM</td>
                            <td>Dinner</td>
                        </tr>
                        <tr>
                            <td>12 AM</td>
                            <td>Midnight Snack</td>
                        </tr>
                        <tr>
                            <td>7 AM</td>
                            <td>Breakfast</td>
                        </tr>
                        <tr>
                            <td>9 AM</td>
                            <td>Judges walk around &amp; talk with teams</td>
                        </tr>
                        <tr>
                            <td>10 AM</td>
                            <td>Presentations</td>
                        </tr>
                        <tr>
                            <td>11 AM</td>
                            <td>Awards</td>
                        </tr>
                    </tbody>
                </table>
            </div>

            ";
        // line 59
        echo "            <div class=\"span6\" style=\"width:500px;\">
                <h2>Event Workshops</h2>
                <table class=\"table table-striped\">
                    <thead>
                        <tr>
                            <th>Time</th>
                            <th>Description</th>
                            <th>Presenter</th>
                        </tr>
                    </thead>
                    <tbody>
                        ";
        // line 70
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["event"]) ? $context["event"] : null), "workshops"));
        foreach ($context['_seq'] as $context["_key"] => $context["workshop"]) {
            // line 71
            echo "                            <tr>
                                <td>
                                    ";
            // line 73
            if ((twig_date_format_filter($this->env, $this->getAttribute((isset($context["workshop"]) ? $context["workshop"] : null), "time"), "i") != "00")) {
                // line 74
                echo "                                        ";
                echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute((isset($context["workshop"]) ? $context["workshop"] : null), "time"), "g:i A"), "html", null, true);
                echo "
                                    ";
            } else {
                // line 76
                echo "                                        ";
                echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute((isset($context["workshop"]) ? $context["workshop"] : null), "time"), "g A"), "html", null, true);
                echo "
                                    ";
            }
            // line 78
            echo "                                </td>
                                <td>
                                    ";
            // line 80
            if ($this->getAttribute((isset($context["workshop"]) ? $context["workshop"] : null), "link")) {
                // line 81
                echo "                                        <a href=\"";
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["workshop"]) ? $context["workshop"] : null), "link"), "html", null, true);
                echo "\">
                                            ";
                // line 82
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["workshop"]) ? $context["workshop"] : null), "title"), "html", null, true);
                echo "
                                        </a>
                                    ";
            } else {
                // line 85
                echo "                                        ";
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["workshop"]) ? $context["workshop"] : null), "title"), "html", null, true);
                echo "
                                    ";
            }
            // line 87
            echo "                                </td>
                                <td>
                                    ";
            // line 89
            if ($this->getAttribute((isset($context["workshop"]) ? $context["workshop"] : null), "presenter_link")) {
                // line 90
                echo "                                        <a href=\"";
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["workshop"]) ? $context["workshop"] : null), "presenter_link"), "html", null, true);
                echo "\">
                                            ";
                // line 91
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["workshop"]) ? $context["workshop"] : null), "presenter"), "html", null, true);
                echo "
                                        </a>
                                    ";
            } else {
                // line 94
                echo "                                        ";
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["workshop"]) ? $context["workshop"] : null), "presenter"), "html", null, true);
                echo "
                                    ";
            }
            // line 96
            echo "                                </td>
                            </tr>
                        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['workshop'], $context['_parent'], $context['loop']);
        $context = array_merge($_parent, array_intersect_key($context, $_parent));
        // line 99
        echo "                    </tbody>
                </table>
            </div>
        </div>
    </div>
";
    }

    public function getTemplateName()
    {
        return "schedule.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  175 => 99,  167 => 96,  161 => 94,  155 => 91,  150 => 90,  148 => 89,  144 => 87,  138 => 85,  132 => 82,  127 => 81,  125 => 80,  121 => 78,  115 => 76,  109 => 74,  107 => 73,  103 => 71,  99 => 70,  86 => 59,  34 => 8,  29 => 4,  26 => 3,);
    }
}
