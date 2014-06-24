<?php

/* BenLogementBundle:Person:ajax_list.html.twig */
class __TwigTemplate_754ba03c39a57e30b4b1f0962b0d553f3509bf2c8881634e798117fb0f6735dd extends Twig_Template
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
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["entities"]) ? $context["entities"] : null));
        foreach ($context['_seq'] as $context["_key"] => $context["entity"]) {
            // line 2
            echo "    <tr>
        <td class=\"hidden-print\"><input type=\"checkbox\" name=\"entities[]\" value=\"";
            // line 3
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["entity"]) ? $context["entity"] : null), "id"), "html", null, true);
            echo "\" ></td>
        <td>";
            // line 4
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["entity"]) ? $context["entity"] : null), "ndossier"), "html", null, true);
            echo "</td>
        <td><em> ";
            // line 5
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["entity"]) ? $context["entity"] : null), "fullName"), "html", null, true);
            echo "</em></td>
        <td>";
            // line 6
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["entity"]) ? $context["entity"] : null), "cin"), "html", null, true);
            echo "</td>
        <td>";
            // line 7
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["entity"]) ? $context["entity"] : null), "cne"), "html", null, true);
            echo "</td>
        <td>";
            // line 8
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["entity"]) ? $context["entity"] : null), "status"), "html", null, true);
            echo "</td>
        <td>";
            // line 9
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["entity"]) ? $context["entity"] : null), "type"), "html", null, true);
            echo "</td>
        <td class=\"hidden-print\">
        <div class=\"text-centers\">
            <a class=\"btn btn-primary js-show btn-xs\" href=\"";
            // line 12
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("etudiant_show", array("id" => $this->getAttribute((isset($context["entity"]) ? $context["entity"] : null), "id"))), "html", null, true);
            echo "\"><span class=\"glyphicon glyphicon-search\"></span></a>
            <a class=\"btn btn-info btn-xs\" href=\"";
            // line 13
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("etudiant_edit", array("id" => $this->getAttribute((isset($context["entity"]) ? $context["entity"] : null), "id"), "type" => $this->getAttribute((isset($context["entity"]) ? $context["entity"] : null), "type"))), "html", null, true);
            echo "\"><span class=\"glyphicon glyphicon-edit\"></span></a>
            ";
            // line 14
            if (($this->getAttribute((isset($context["entity"]) ? $context["entity"] : null), "status") == $this->getAttribute((isset($context["person"]) ? $context["person"] : null), "resident"))) {
                // line 15
                echo "            <a class=\"btn btn-default btn-xs\" href=\"";
                echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("reservation_show", array("id" => $this->getAttribute($this->getAttribute((isset($context["entity"]) ? $context["entity"] : null), "reservation"), "id"))), "html", null, true);
                echo "\"><span class=\"glyphicon glyphicon-file\"></span></a>";
            }
            // line 16
            echo "        </div>
        </td>
    </tr>
";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['entity'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 20
        echo "                
";
        // line 21
        $this->env->loadTemplate("BenLogementBundle:Default:pagination.html.twig")->display($context);
    }

    public function getTemplateName()
    {
        return "BenLogementBundle:Person:ajax_list.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  83 => 21,  80 => 20,  71 => 16,  66 => 15,  64 => 14,  60 => 13,  56 => 12,  50 => 9,  46 => 8,  42 => 7,  38 => 6,  34 => 5,  30 => 4,  26 => 3,  23 => 2,  19 => 1,);
    }
}
