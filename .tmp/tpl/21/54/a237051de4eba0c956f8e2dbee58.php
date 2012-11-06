<?php

/* admin.html.twig */
class __TwigTemplate_2154a237051de4eba0c956f8e2dbee58 extends Twig_Template
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
        <div class=\"span6\">
            <div class=\"span6 box\">
                <h1>Utilities</h1>
                <ul>
                    <li><a href=\"/admin/sms\">Send SMS message (";
        // line 9
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["event"]) ? $context["event"] : null), "textable_numbers_count"), "html", null, true);
        echo ")</a></li>
                    <li><a href=\"/admin/sync\">Sync with EventBrite</a></li>
                </ul>
            </div>

            <div class=\"span6 box\">
                <h1>Details</h1>
                <form method=\"post\" action=\"/admin/config/update\">
                    <input type=\"text\" value=\"";
        // line 17
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["event"]) ? $context["event"] : null), "name"), "html", null, true);
        echo "\" name=\"name\" placeholder=\"Name\" /><br />
                    <input type=\"text\" value=\"";
        // line 18
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["event"]) ? $context["event"] : null), "tagline"), "html", null, true);
        echo "\" name=\"tagline\" placeholder=\"Tagline\" /><br />
                    <input type=\"text\" value=\"";
        // line 19
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["event"]) ? $context["event"] : null), "hook"), "html", null, true);
        echo "\" name=\"hook\" placeholder=\"Hook\" /><br />
                    <textarea name=\"hook_details\" placeholder=\"Hook Details\">";
        // line 20
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["event"]) ? $context["event"] : null), "hook_details"), "html", null, true);
        echo "</textarea><br />
                    <input type=\"text\" value=\"";
        // line 21
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["event"]) ? $context["event"] : null), "color"), "html", null, true);
        echo "\" name=\"color\" placeholder=\"Color (HEX)\" /><br />
                    <input type=\"text\" value=\"";
        // line 22
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["event"]) ? $context["event"] : null), "hero_background_url"), "html", null, true);
        echo "\" name=\"hero_background_url\" placeholder=\"Hero Background URL\" /><br />
                    <input type=\"text\" value=\"";
        // line 23
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["event"]) ? $context["event"] : null), "eventbrite_id"), "html", null, true);
        echo "\" name=\"eventbrite_id\" placeholder=\"Eventbrite ID\" /><br />

                    <h2>Start Time</h2>
                    <input type=\"text\" value=\"";
        // line 26
        echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute((isset($context["event"]) ? $context["event"] : null), "start_time"), "Y-m-d"), "html", null, true);
        echo "\" name=\"start_time_date\" placeholder=\"Start Date (YYYY-MM-DD)\" />
                    <input type=\"text\" value=\"";
        // line 27
        echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute((isset($context["event"]) ? $context["event"] : null), "start_time"), "g:iA"), "html", null, true);
        echo "\" name=\"start_time_time\" placeholder=\"Start Time (HH:MMam)\" />

                    <h2>End Time</h2>
                    <input type=\"text\" value=\"";
        // line 30
        echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute((isset($context["event"]) ? $context["event"] : null), "end_time"), "Y-m-d"), "html", null, true);
        echo "\" name=\"end_time_date\" placeholder=\"End Date (YYYY-MM-DD)\" />
                    <input type=\"text\" value=\"";
        // line 31
        echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute((isset($context["event"]) ? $context["event"] : null), "end_time"), "g:iA"), "html", null, true);
        echo "\" name=\"end_time_time\" placeholder=\"End Time (HH:MMam)\" />

                    <h2>Address</h2>
                    <input type=\"text\" value=\"";
        // line 34
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["event"]) ? $context["event"] : null), "location_name"), "html", null, true);
        echo "\" name=\"location_name\" placeholder=\"Location Name\" /><br />
                    <input type=\"text\" value=\"";
        // line 35
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["event"]) ? $context["event"] : null), "location_address_1"), "html", null, true);
        echo "\" name=\"location_address_1\" placeholder=\"Location Address\" /><br />
                    <input type=\"text\" value=\"";
        // line 36
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["event"]) ? $context["event"] : null), "location_address_2"), "html", null, true);
        echo "\" name=\"location_address_2\" placeholder=\"Location Address\" /><br />
                    <input type=\"text\" value=\"";
        // line 37
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["event"]) ? $context["event"] : null), "location_city"), "html", null, true);
        echo "\" name=\"location_city\" placeholder=\"Location City\" /><br />
                    <input type=\"text\" value=\"";
        // line 38
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["event"]) ? $context["event"] : null), "location_state"), "html", null, true);
        echo "\" name=\"location_state\" placeholder=\"Location State\" /><br />
                    <input type=\"text\" value=\"";
        // line 39
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["event"]) ? $context["event"] : null), "location_zip"), "html", null, true);
        echo "\" name=\"location_zip\" placeholder=\"Location Zip\" /><br />
                    <input type=\"text\" value=\"";
        // line 40
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["event"]) ? $context["event"] : null), "location_country"), "html", null, true);
        echo "\" name=\"location_country\" placeholder=\"Location Country\" /><br />
                    <input type=\"submit\" value=\"Update\" class=\"btn btn-primary\" />
                </form>
            </div>
        </div>

        <div class=\"span6\">
            <div class=\"span6 box\">
                <h1>Award Types</h1>
                <ul>
                    ";
        // line 50
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["event"]) ? $context["event"] : null), "award_categories"));
        foreach ($context['_seq'] as $context["_key"] => $context["awardcategory"]) {
            // line 51
            echo "                        <li><a href=\"/admin/awardcategories/update?faqID=";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["awardcategory"]) ? $context["awardcategory"] : null), "awardcategoryID"), "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["awardcategory"]) ? $context["awardcategory"] : null), "name"), "html", null, true);
            echo "</a></li>
                    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['awardcategory'], $context['_parent'], $context['loop']);
        $context = array_merge($_parent, array_intersect_key($context, $_parent));
        // line 53
        echo "                    <li><a href=\"/admin/awardcategories/create\">Add New</a></li>
                </ul>
            </div>


            <div class=\"span6 box\">
                <h1>Sponsors</h1>
                <ul>
                    ";
        // line 61
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["event"]) ? $context["event"] : null), "sponsors"));
        foreach ($context['_seq'] as $context["_key"] => $context["sponsor"]) {
            // line 62
            echo "                        <li><a href=\"/admin/sponsors/update?sponsorID=";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["sponsor"]) ? $context["sponsor"] : null), "sponsorID"), "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["sponsor"]) ? $context["sponsor"] : null), "name"), "html", null, true);
            echo "</a></li>
                    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['sponsor'], $context['_parent'], $context['loop']);
        $context = array_merge($_parent, array_intersect_key($context, $_parent));
        // line 64
        echo "                    <li><a href=\"/admin/sponsors/create\">Add New</a></li>
                </ul>
            </div>


            <div class=\"span6 box\">
                <h1>Workshops</h1>
                <ul>
                    ";
        // line 72
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["event"]) ? $context["event"] : null), "workshops"));
        foreach ($context['_seq'] as $context["_key"] => $context["workshop"]) {
            // line 73
            echo "                        <li><a href=\"/admin/workshops/update?workshopID=";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["workshop"]) ? $context["workshop"] : null), "workshopID"), "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["workshop"]) ? $context["workshop"] : null), "title"), "html", null, true);
            echo "</a></li>
                    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['workshop'], $context['_parent'], $context['loop']);
        $context = array_merge($_parent, array_intersect_key($context, $_parent));
        // line 75
        echo "                    <li><a href=\"/admin/workshops/create\">Add New</a></li>
                </ul>
            </div>


            <div class=\"span6 box\">
                <h1>FAQ</h1>
                <ul>
                    ";
        // line 83
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["event"]) ? $context["event"] : null), "faqs"));
        foreach ($context['_seq'] as $context["_key"] => $context["faq_entry"]) {
            // line 84
            echo "                        <li><a href=\"/admin/faqs/update?faqID=";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["faq_entry"]) ? $context["faq_entry"] : null), "faqID"), "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["faq_entry"]) ? $context["faq_entry"] : null), "title"), "html", null, true);
            echo "</a></li>
                    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['faq_entry'], $context['_parent'], $context['loop']);
        $context = array_merge($_parent, array_intersect_key($context, $_parent));
        // line 86
        echo "                    <li><a href=\"/admin/faqs/create\">Add New</a></li>
                </ul>
            </div>
        </div>
    </div>
";
    }

    public function getTemplateName()
    {
        return "admin.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  224 => 86,  213 => 84,  209 => 83,  199 => 75,  188 => 73,  184 => 72,  174 => 64,  163 => 62,  159 => 61,  149 => 53,  138 => 51,  134 => 50,  121 => 40,  117 => 39,  113 => 38,  109 => 37,  105 => 36,  101 => 35,  97 => 34,  91 => 31,  87 => 30,  81 => 27,  77 => 26,  71 => 23,  67 => 22,  63 => 21,  59 => 20,  55 => 19,  51 => 18,  47 => 17,  36 => 9,  29 => 4,  26 => 3,);
    }
}
