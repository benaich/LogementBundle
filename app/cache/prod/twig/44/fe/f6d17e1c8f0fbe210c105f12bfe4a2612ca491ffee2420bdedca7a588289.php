<?php

/* BenLogementBundle:Default:pagination.html.twig */
class __TwigTemplate_44fef6d17e1c8f0fbe210c105f12bfe4a2612ca491ffee2420bdedca7a588289 extends Twig_Template
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
        if ((twig_length_filter($this->env, (isset($context["pagination"]) ? $context["pagination"] : null)) > 1)) {
            // line 2
            echo "<tr class=\"mypagination hide-print\">
    <td colspan=\"10\">
      <div class=\"text-center\">
          <ul class=\"pagination\">
            ";
            // line 6
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable((isset($context["pagination"]) ? $context["pagination"] : null));
            foreach ($context['_seq'] as $context["_key"] => $context["p"]) {
                // line 7
                echo "            <li";
                if ($this->getAttribute((isset($context["p"]) ? $context["p"] : null), "is_current")) {
                    echo " class=\"active\"";
                }
                echo ">
              <a href=\"#\" class=\"js-page\" data-page=\"";
                // line 8
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["p"]) ? $context["p"] : null), "page_number"), "html", null, true);
                echo "\" >";
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["p"]) ? $context["p"] : null), "label"), "html", null, true);
                echo "</a>
            </li>
            ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['p'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 11
            echo "          </ul>
      </div>
    </td>
</tr>
";
        }
    }

    public function getTemplateName()
    {
        return "BenLogementBundle:Default:pagination.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  49 => 11,  31 => 7,  27 => 6,  21 => 2,  83 => 21,  80 => 20,  71 => 16,  66 => 15,  64 => 14,  60 => 13,  56 => 12,  50 => 9,  46 => 8,  42 => 7,  38 => 8,  34 => 5,  30 => 4,  26 => 3,  23 => 2,  19 => 1,);
    }
}