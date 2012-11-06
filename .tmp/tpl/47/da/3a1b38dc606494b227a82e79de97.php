<?php

/* people/edit_profile.html.twig */
class __TwigTemplate_47da3a1b38dc606494b227a82e79de97 extends Twig_Template
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
        echo "    <span class=\"span12 box\">
        <h1>About ";
        // line 5
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["instance"]) ? $context["instance"] : null), "name"), "html", null, true);
        echo "</h1>
        <a class=\"btn btn-warning\" href=\"/person/password/";
        // line 6
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["person"]) ? $context["person"] : null), "registrantID"), "html", null, true);
        echo "\">Change Password</a>

        <form method=\"post\">
            ";
        // line 9
        $context["x"] = $this->getAttribute((isset($context["form"]) ? $context["form"] : null), "render", array(0 => "bootstrap", 1 => (isset($context["instance"]) ? $context["instance"] : null)), "method");
        // line 10
        echo "            <hr />
            <input type=\"submit\" class=\"btn btn-success\" value=\"Update\" />
        </form>
    </span>

    <script type=\"text/javascript\">
        \$('#profile_image').each(function(){
            var elem = \$(this);
            var img_src = elem.val();
            var hidden_field = \$('<input type=\"hidden\" name=\"profile_image\" id=\"profile_image\" value=\"' + img_src + '\" />');

            elem.parent().append(hidden_field);

            if (!img_src) {
                img_src = '/assets/img/default_user.png';
            }

            var img = \$('<img class=\"usermug\" src=\"' + img_src + '\" />');

            img.click(function(){
                filepicker.getFile(\"image/*\", {'modal': true},
                    function(url, metadata){
                        url = url + \"/convert?fit=crop&h=180&w=180&align=faces\"
                        hidden_field.val(url);
                        img.attr('src', url);
                });
            });

            elem = elem.replaceWith(img);
        });
    </script>
";
    }

    public function getTemplateName()
    {
        return "people/edit_profile.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  44 => 10,  42 => 9,  36 => 6,  32 => 5,  29 => 4,  26 => 3,);
    }
}
