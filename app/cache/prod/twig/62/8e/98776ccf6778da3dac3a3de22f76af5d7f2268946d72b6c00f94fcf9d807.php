<?php

/* BenLogementBundle:Person:search.html.twig */
class __TwigTemplate_628e98776ccf6778da3dac3a3de22f76af5d7f2268946d72b6c00f94fcf9d807 extends Twig_Template
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
        echo "    <!-- Modal advanced search -->
<div class=\"modal fade\" id=\"searchModal\" tabindex=\"-1\" role=\"dialog\" aria-labelledby=\"searchModalLabel\" aria-hidden=\"true\">
  <div class=\"modal-dialog\">
    <div class=\"modal-content\">
      <div class=\"modal-header\">
        <button type=\"button\" class=\"close\" data-dismiss=\"modal\" aria-hidden=\"true\">×</button>
        <h4 class=\"modal-title\" id=\"searchModalLabel\">Recherche avancée</h4>
      </div>
      <div class=\"modal-body form-horizontal\">
          <div class=\"form-group\">
            <label for=\"\" class=\"col-sm-5 control-label\">N° dossier</label>
            <div class=\"col-sm-6\">
              <input type=\"text\" name=\"searchEntity[dossier]\" class=\"form-control\">
            </div>
          </div>
          <div class=\"form-group\">
            <label for=\"\" class=\"col-sm-5 control-label\">Sexe</label>
            <div class=\"col-sm-6\">
              <select name=\"searchEntity[gender]\" class=\"form-control\">
                <option value=\"\"></option>
                <option value=\"Garçon\">Garçon</option>
                <option value=\"Fille\">Fille</option>
              </select>
            </div>
          </div>
          <div class=\"form-group\">
            <label for=\"citySelect\" class=\"col-sm-5 control-label\">Ville</label>
            <div class=\"col-sm-6\">
              <input id=\"citySelect\" type=\"text\" name=\"searchEntity[city]\" class=\"form-control\">
            </div>
          </div>
          <div class=\"form-group\">
            <label for=\"\" class=\"col-sm-5 control-label\">Note du Baccalauréat</label>
            <div class=\"col-sm-6\">
              <input type=\"text\" name=\"searchEntity[exellence]\" class=\"form-control\">
            </div>
          </div>
          <div class=\"form-group\">
            <label for=\"universitySelect\" class=\"col-sm-5 control-label\">Etablissement</label>
            <div class=\"col-sm-6\">
              <select id=\"universitySelect\" name=\"searchEntity[etablissement]\" class=\"form-control\">
                <option value=\"\"></option>
              ";
        // line 43
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["universities"]) ? $context["universities"] : null));
        foreach ($context['_seq'] as $context["_key"] => $context["item"]) {
            // line 44
            echo "                <option value=\"";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["item"]) ? $context["item"] : null), "id"), "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["item"]) ? $context["item"] : null), "name"), "html", null, true);
            echo "</option>
              ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['item'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 46
        echo "              </select>
            </div>
          </div>
          <div class=\"form-group\">
            <label for=\"\" class=\"col-sm-5 control-label\">Revenu des parents</label>
            <div class=\"col-sm-6\">
              <input type=\"text\" name=\"searchEntity[parents_revenu]\" class=\"form-control\">
            </div>
          </div>
          <div class=\"form-group\">
            <label for=\"\" class=\"col-sm-5 control-label\">Nombre de frères et soeurs</label>
            <div class=\"col-sm-6\">
              <input type=\"text\" name=\"searchEntity[bro_sis_number]\" class=\"form-control\">
            </div>
          </div>
          <div class=\"form-group\">
            <label for=\"\" class=\"col-sm-5 control-label\">Ancienteté</label>
            <div class=\"col-sm-6\">
              <input type=\"text\" name=\"searchEntity[ancientete]\" class=\"form-control\">
            </div>
          </div>
      </div>
      <div class=\"modal-footer\">
        <button id=\"js-search\" type=\"button\" class=\"btn btn-primary\">Rechercher</button>
      </div>
    </div>
  </div>
</div>";
    }

    public function getTemplateName()
    {
        return "BenLogementBundle:Person:search.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  78 => 46,  67 => 44,  63 => 43,  19 => 1,  250 => 121,  246 => 120,  243 => 119,  215 => 94,  213 => 93,  207 => 90,  180 => 66,  175 => 64,  172 => 63,  168 => 61,  166 => 60,  159 => 58,  153 => 57,  147 => 56,  130 => 44,  124 => 43,  118 => 42,  112 => 41,  102 => 34,  98 => 33,  94 => 32,  90 => 31,  73 => 17,  60 => 11,  57 => 10,  54 => 9,  48 => 7,  44 => 6,  41 => 5,  34 => 3,  31 => 2,);
    }
}
