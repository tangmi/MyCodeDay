<?php

/* index.html.twig */
class __TwigTemplate_2d83c5f8e8defb11c44b32ed0b6c6198 extends Twig_Template
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

        ";
        // line 7
        echo "        <div class=\"span6\">

            ";
        // line 10
        echo "            <div class=\"span6 box\">
                <h1>";
        // line 11
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["event"]) ? $context["event"] : null), "hook"), "html", null, true);
        echo "</h1>
                <img src=\"https://www.filepicker.io/api/file/RyaUxTWiR3SyAB3NQiIn/convert?fit=crop&h=279&w=418\" />
                <p>";
        // line 13
        echo $this->getAttribute((isset($context["event"]) ? $context["event"] : null), "hook_details");
        echo "</p>
            </div>

            ";
        // line 17
        echo "            <div class=\"span6 box\">
                <h1>Play To Your Strengths</h1>
                <img src=\"https://www.filepicker.io/api/file/UxybmFQXR0uq1dMCuG00/convert?fit=crop&h=279&w=418\" />
                <p>Compete for awards in:</p>
                <ul>
                    ";
        // line 22
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["event"]) ? $context["event"] : null), "award_categories"));
        foreach ($context['_seq'] as $context["_key"] => $context["awardcategory"]) {
            // line 23
            echo "                        <li>
                            ";
            // line 24
            if ($this->getAttribute((isset($context["awardcategory"]) ? $context["awardcategory"] : null), "is_ranked")) {
                // line 25
                echo "                            Best
                            ";
            }
            // line 27
            echo "                            ";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["awardcategory"]) ? $context["awardcategory"] : null), "name"), "html", null, true);
            echo "
                        </li>
                    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['awardcategory'], $context['_parent'], $context['loop']);
        $context = array_merge($_parent, array_intersect_key($context, $_parent));
        // line 30
        echo "                </ul>
            </div>

        </div>

        ";
        // line 36
        echo "        <div class=\"span6\">

            ";
        // line 39
        echo "            <div class=\"span6 box\">
                <h1>What is CodeDay?</h1>
                <img src=\"https://www.filepicker.io/api/file/rMfeBYVwSjyz_62kb4iW/convert?fit=crop&amp;h=279&amp;w=418\" />
                <p>CodeDay is an amazing 24-hour event where students who love technology hang out and code.</p>
                <p>It's fun for both total beginners and advanced programmers.</p>
                <p>
                </p>
                <div class=\"social\">
                    <a href=\"https://twitter.com/share\" class=\"twitter-share-button\" data-lang=\"en\">Tweet</a>
                    <div class=\"fb-like\" data-href=\"http://";
        // line 48
        echo twig_escape_filter($this->env, twig_lower_filter($this->env, $this->getAttribute((isset($context["event"]) ? $context["event"] : null), "name")), "html", null, true);
        echo ".codeday.org/\" data-layout=\"button_count\" data-send=\"false\" data-width=\"450\" data-show-faces=\"true\" data-action=\"recommend\"></div>
                    <script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=\"https://platform.twitter.com/widgets.js\";fjs.parentNode.insertBefore(js,fjs);}}(document,\"script\",\"twitter-wjs\");</script>
                <hr class=\"clearfix\" />
                </div>
            </div>

            ";
        // line 55
        echo "            <div class=\"span6 box\">
                <h1>Be Happy!</h1>
                <img src=\"https://www.filepicker.io/api/file/cAvqKporSjqIIlhJmTBj/convert?fit=crop&amp;h=279&amp;w=418\" />
                <p>
                    At CodeDay, we'll have:
                    <ul>
                        <li>Free food!</li>
                        <li>Awesome swag!</li>
                        <li>Cool prizes and giveaways!</li>
                        <li>An amazing atmosphere!</li>
                    </ul>
                </p>
                <p>Thank the sponsors for making this an amazing event!</p>
            </div>
        </div>

    </div>

    <hr />

    ";
        // line 76
        echo "    <div class=\"row nopad people\">
        <div class=\"span6 vr\">
            <h1>Organizers</h1>

            ";
        // line 80
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["event"]) ? $context["event"] : null), "organizers"));
        foreach ($context['_seq'] as $context["_key"] => $context["person"]) {
            // line 81
            echo "                <div class=\"person\">
                    <div class=\"circle-thumb\">
                        <img src=\"";
            // line 83
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["person"]) ? $context["person"] : null), "profile_image"), "html", null, true);
            echo "\" />
                    </div>
                    ";
            // line 85
            if ($this->getAttribute((isset($context["person"]) ? $context["person"] : null), "website")) {
                // line 86
                echo "                        <a href=\"";
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["person"]) ? $context["person"] : null), "website"), "html", null, true);
                echo "\" target=\"_blank\">";
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["person"]) ? $context["person"] : null), "name"), "html", null, true);
                echo "</a>
                    ";
            } else {
                // line 88
                echo "                        <a href=\"/person/";
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["person"]) ? $context["person"] : null), "registrantID"), "html", null, true);
                echo "\">";
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["person"]) ? $context["person"] : null), "name"), "html", null, true);
                echo "</a>
                    ";
            }
            // line 90
            echo "                    <span>";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["person"]) ? $context["person"] : null), "work"), "html", null, true);
            echo "</span>
                </div>
            ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['person'], $context['_parent'], $context['loop']);
        $context = array_merge($_parent, array_intersect_key($context, $_parent));
        // line 93
        echo "        </div>

        <div class=\"span6\">
            <h1>Judges</h1>

            ";
        // line 98
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["event"]) ? $context["event"] : null), "judges"));
        foreach ($context['_seq'] as $context["_key"] => $context["person"]) {
            // line 99
            echo "                <div class=\"person\">
                    <div class=\"circle-thumb\">
                        <img src=\"";
            // line 101
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["person"]) ? $context["person"] : null), "profile_image"), "html", null, true);
            echo "\" />
                    </div>
                    ";
            // line 103
            if ($this->getAttribute((isset($context["person"]) ? $context["person"] : null), "website")) {
                // line 104
                echo "                        <a href=\"";
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["person"]) ? $context["person"] : null), "website"), "html", null, true);
                echo "\" target=\"_blank\">";
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["person"]) ? $context["person"] : null), "name"), "html", null, true);
                echo "</a>
                    ";
            } else {
                // line 106
                echo "                        <a href=\"/person/";
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["person"]) ? $context["person"] : null), "registrantID"), "html", null, true);
                echo "\">";
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["person"]) ? $context["person"] : null), "name"), "html", null, true);
                echo "</a>
                    ";
            }
            // line 108
            echo "                    <span>";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["person"]) ? $context["person"] : null), "work"), "html", null, true);
            echo "</span>
                </div>
            ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['person'], $context['_parent'], $context['loop']);
        $context = array_merge($_parent, array_intersect_key($context, $_parent));
        // line 111
        echo "        </div>

        <hr class=\"clearfix\" />
    </div>

    <hr />

    <!-- Sponsors -->
    <div class=\"row nopad sponsors\">
        <div class=\"span12\">
            <h1>Sponsors</h1>

            <ul>
                <li>
                    <img src=\"http://studentrnd.org/wp-content/uploads/2009/07/medtronic.png\" />
                </li>
                <li>
                    <img src=\"http://studentrnd.org/wp-content/uploads/2009/07/physio.png\" />
                </li>
                <li>
                    <img src=\"http://studentrnd.org/wp-content/uploads/2009/07/stratos.jpg\" />
                </li>

                ";
        // line 134
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["event"]) ? $context["event"] : null), "sponsors"));
        foreach ($context['_seq'] as $context["_key"] => $context["sponsor"]) {
            // line 135
            echo "                    <li>
                        ";
            // line 136
            if ($this->getAttribute((isset($context["sponsor"]) ? $context["sponsor"] : null), "url")) {
                // line 137
                echo "                            <a href=\"";
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["sponsor"]) ? $context["sponsor"] : null), "url"), "html", null, true);
                echo "\" target=\"_blank\"><img src=\"";
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["sponsor"]) ? $context["sponsor"] : null), "logo"), "html", null, true);
                echo "\" alt=\"";
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["sponsor"]) ? $context["sponsor"] : null), "name"), "html", null, true);
                echo "\" /></a>
                        ";
            } else {
                // line 139
                echo "                            <img src=\"";
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["sponsor"]) ? $context["sponsor"] : null), "logo"), "html", null, true);
                echo "\" alt=\"";
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["sponsor"]) ? $context["sponsor"] : null), "name"), "html", null, true);
                echo "\" />
                        ";
            }
            // line 141
            echo "                    </li>
                ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['sponsor'], $context['_parent'], $context['loop']);
        $context = array_merge($_parent, array_intersect_key($context, $_parent));
        // line 143
        echo "            </ul>
            <hr class=\"clearfix\" />
        </div>
    </div>

    <hr />

    <!-- Presented by -->
    <div class=\"row nopad presented\">
        <h1>Presented by</h1>
        <a href=\"http://studentrnd.org\">
            <img src=\"http://studentrnd.org/images/srndlogotransparent.png\" alt=\"StudentRND\" />
        </a>
    </div>
";
    }

    public function getTemplateName()
    {
        return "index.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  288 => 143,  281 => 141,  273 => 139,  263 => 137,  261 => 136,  258 => 135,  254 => 134,  229 => 111,  219 => 108,  211 => 106,  203 => 104,  201 => 103,  196 => 101,  192 => 99,  188 => 98,  181 => 93,  171 => 90,  163 => 88,  155 => 86,  153 => 85,  148 => 83,  144 => 81,  140 => 80,  134 => 76,  112 => 55,  103 => 48,  92 => 39,  88 => 36,  81 => 30,  71 => 27,  67 => 25,  65 => 24,  62 => 23,  58 => 22,  51 => 17,  45 => 13,  40 => 11,  37 => 10,  33 => 7,  29 => 4,  26 => 3,);
    }
}
