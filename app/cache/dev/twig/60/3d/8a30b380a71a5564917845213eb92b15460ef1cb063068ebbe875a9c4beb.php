<?php

/* BenLogementBundle:Default:flashes.html.twig */
class __TwigTemplate_603d8a30b380a71a5564917845213eb92b15460ef1cb063068ebbe875a9c4beb extends Twig_Template
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
        echo "<section class=\"flashbag\">
";
        // line 2
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "session"), "flashbag"), "all", array(), "method"));
        foreach ($context['_seq'] as $context["type"] => $context["flashMessages"]) {
            // line 3
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable((isset($context["flashMessages"]) ? $context["flashMessages"] : $this->getContext($context, "flashMessages")));
            foreach ($context['_seq'] as $context["_key"] => $context["flashMessage"]) {
                // line 4
                echo "            <div class=\"alert alert-";
                echo twig_escape_filter($this->env, (isset($context["type"]) ? $context["type"] : $this->getContext($context, "type")), "html", null, true);
                echo " fade in\">
                <button type=\"button\" class=\"close\" data-dismiss=\"alert\">×</button>
                <strong>info !</strong>  ";
                // line 6
                echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans((isset($context["flashMessage"]) ? $context["flashMessage"] : $this->getContext($context, "flashMessage")), array(), "FOSUserBundle"), "html", null, true);
                echo " 
            </div>
";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['flashMessage'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['type'], $context['flashMessages'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 10
        echo "</section>
";
    }

    public function getTemplateName()
    {
        return "BenLogementBundle:Default:flashes.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  49 => 10,  36 => 6,  26 => 3,  22 => 2,  218 => 49,  207 => 45,  199 => 44,  191 => 43,  181 => 40,  172 => 39,  159 => 34,  143 => 32,  134 => 30,  126 => 29,  116 => 26,  108 => 25,  100 => 24,  92 => 23,  84 => 22,  74 => 19,  66 => 18,  58 => 13,  54 => 12,  50 => 11,  45 => 9,  41 => 8,  37 => 7,  29 => 5,  25 => 4,  19 => 1,  298 => 131,  295 => 130,  288 => 126,  277 => 121,  273 => 120,  269 => 119,  265 => 118,  261 => 117,  253 => 114,  249 => 112,  245 => 111,  228 => 99,  195 => 74,  186 => 73,  177 => 72,  170 => 38,  166 => 67,  162 => 66,  155 => 62,  151 => 33,  147 => 60,  140 => 56,  136 => 55,  132 => 54,  125 => 50,  121 => 49,  117 => 48,  110 => 44,  106 => 43,  102 => 42,  95 => 38,  91 => 37,  87 => 36,  80 => 32,  76 => 31,  72 => 30,  55 => 16,  43 => 6,  40 => 5,  33 => 6,  30 => 4,);
    }
}
