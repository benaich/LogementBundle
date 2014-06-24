<?php

/* BenLogementBundle:Person:index.html.twig */
class __TwigTemplate_140c89ff8b6f89d98d03ad3c13032738b1c8341e85bfe7e72458460366fd7cc9 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("BenLogementBundle::layout.html.twig");

        $this->blocks = array(
            'title' => array($this, 'block_title'),
            'stylesheet' => array($this, 'block_stylesheet'),
            'body' => array($this, 'block_body'),
            'javascripts' => array($this, 'block_javascripts'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "BenLogementBundle::layout.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 2
    public function block_title($context, array $blocks = array())
    {
        // line 3
        echo "Tableau de bord | ";
        $this->displayParentBlock("title", $context, $blocks);
        echo "
";
    }

    // line 5
    public function block_stylesheet($context, array $blocks = array())
    {
        // line 6
        $this->displayParentBlock("stylesheet", $context, $blocks);
        echo "
        <link href=\"";
        // line 7
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("css/select2.css"), "html", null, true);
        echo "\" rel=\"stylesheet\">
";
    }

    // line 9
    public function block_body($context, array $blocks = array())
    {
        // line 10
        echo "
 <h3><span class=\"glyphicon glyphicon-user\"></span> ";
        // line 11
        if (((isset($context["status"]) ? $context["status"] : null) == "résidant")) {
            echo "Liste des étudiants résidents";
        } else {
            echo "Gestion des etudiants";
        }
        echo "</h3>
    <form  id=\"jsForm\" role=\"form\" method=\"post\" action=\"\">
          <input id=\"pagenumber\" type=\"hidden\" name=\"page\" value=\"1\"> 
          <input id=\"sortBy\" type=\"hidden\" name=\"searchEntity[sortBy]\" value=\"all\"> 
          <input id=\"sortDir\" type=\"hidden\" name=\"searchEntity[sortDir]\" value=\"ASC\"> 
          <input type=\"hidden\" name=\"template\" value=\"ajax_list\"> 
          <input id=\"status\" type=\"hidden\" name=\"status\" value=\"";
        // line 17
        echo twig_escape_filter($this->env, (isset($context["status"]) ? $context["status"] : null), "html", null, true);
        echo "\"> 
            <div class=\"row hidden-print\">
              <div class=\"col-md-5 form-group\">
                <div class=\"input-group\">
                  <input type=\"text\" name=\"keyword\" class=\"form-control\" placeholder=\"Search\">
                  <div class=\"input-group-btn\">
                  <button class=\"btn btn-default\" type=\"submit\"><span class=\"glyphicon glyphicon-search\"></span></button>
                  </div><!-- /btn-group -->
                </div><!-- /input-group -->
              </div><!-- /.col-md-6 -->

              <div class=\"col-md-3\">
                <select id=\"js-type\" name=\"type\" class=\"form-control\">
                    <option value=\"all\">Filtrer par</option>
                    <option value=\"";
        // line 31
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["person"]) ? $context["person"] : null), "new"), "html", null, true);
        echo "\">Nouveaux étudiants</option>
                    <option value=\"";
        // line 32
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["person"]) ? $context["person"] : null), "old"), "html", null, true);
        echo "\">Anciens étudiants</option>
                    <option value=\"";
        // line 33
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["person"]) ? $context["person"] : null), "foreign"), "html", null, true);
        echo "\">Etudiants étrangers</option>
                    <option value=\"";
        // line 34
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["person"]) ? $context["person"] : null), "special"), "html", null, true);
        echo "\">Etudiants en situation particulière</option>
                </select>
              </div><!-- /.col-md-3 -->

              <div class=\"col-lg-2\">
              <div class=\"col-md-9\">
              <select id=\"js-perpage\" name=\"perpage\" class=\"form-control\">
                <option value=\"10\" ";
        // line 41
        if (($this->getAttribute((isset($context["app_config"]) ? $context["app_config"] : null), "rows_per_page") == 10)) {
            echo "selected";
        }
        echo ">10</option>
                <option value=\"20\" ";
        // line 42
        if (($this->getAttribute((isset($context["app_config"]) ? $context["app_config"] : null), "rows_per_page") == 20)) {
            echo "selected";
        }
        echo ">20</option>
                <option value=\"50\" ";
        // line 43
        if (($this->getAttribute((isset($context["app_config"]) ? $context["app_config"] : null), "rows_per_page") == 50)) {
            echo "selected";
        }
        echo ">50</option>
                <option value=\"100\" ";
        // line 44
        if (($this->getAttribute((isset($context["app_config"]) ? $context["app_config"] : null), "rows_per_page") == 100)) {
            echo "selected";
        }
        echo ">100</option>
              </select>
              </div>
              </div>

              <div class=\"col-md-2\">
                <div class=\"btn-group pull-right\">              
                  <button class=\"btn btn-primary \"><span class=\"glyphicon glyphicon-cog\"></span> Action</button>
                  <button class=\"btn btn-primary dropdown-toggle\" data-toggle=\"dropdown\">
                    <span class=\"caret\"></span>
                  </button>
                  <ul class=\"dropdown-menu\" role=\"menu\">
                    <li><a href=\"";
        // line 56
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("etudiant_new"), "html", null, true);
        echo "\"><span class=\"glyphicon glyphicon-plus\"></span> Ajouter (";
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["person"]) ? $context["person"] : null), "new"), "html", null, true);
        echo ")</a></li>
                    <li><a href=\"";
        // line 57
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("etudiant_new", array("type" => $this->getAttribute((isset($context["person"]) ? $context["person"] : null), "foreign"))), "html", null, true);
        echo "\"><span class=\"glyphicon glyphicon-plus\"></span> Ajouter (";
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["person"]) ? $context["person"] : null), "foreign"), "html", null, true);
        echo ")</a></li>
                    <li><a href=\"";
        // line 58
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("etudiant_new", array("type" => $this->getAttribute((isset($context["person"]) ? $context["person"] : null), "special"))), "html", null, true);
        echo "\"><span class=\"glyphicon glyphicon-plus\"></span> Ajouter (";
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["person"]) ? $context["person"] : null), "special"), "html", null, true);
        echo ")</a></li>
                    <li><a href=\"#\"  data-toggle=\"modal\" data-target=\"#searchModal\"><span class=\"glyphicon glyphicon-search\"></span> Recherche avancée</a></li>
                ";
        // line 60
        if (((isset($context["status"]) ? $context["status"] : null) == $this->getAttribute((isset($context["person"]) ? $context["person"] : null), "resident"))) {
            // line 61
            echo "                    <li><a href=\"#\" id=\"js-switch\"><span class=\"glyphicon glyphicon-resize-small\"></span> Changement de chambre</a></li>
                ";
        }
        // line 63
        echo "                    <li class=\"divider\"></li>
                    <li><a href=\"";
        // line 64
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("etudiant_to_excel", array("status" => (isset($context["status"]) ? $context["status"] : null))), "html", null, true);
        echo "\"><span class=\"glyphicon glyphicon-export\"></span> Exporter</a></li>
                      <li><a id=\"btnPrint\"><span class=\"glyphicon glyphicon-print\"></span> imprimer cette page</a></li>
                      <li><a href=\"";
        // line 66
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("etudiant_to_pdf", array("status" => (isset($context["status"]) ? $context["status"] : null))), "html", null, true);
        echo "\" id=\"js-print-all\"><span class=\"glyphicon glyphicon-print\"></span> imprimer tout</a></li>
                    <li><a href=\"#\" data-toggle=\"modal\" data-target=\"#confirmationModal\"><span class=\"glyphicon glyphicon-ban-circle\"></span> Rejeter</a></li>
                    <li><a href=\"#\" id=\"js-delete\"><span class=\"glyphicon glyphicon-trash\"></span> Supprimer</a></li>
                  </ul>
                </div>
              </div>
            </div><!-- /.row -->

            <table class=\"table table-striped table-hover table-bordered\">
                <thead>
                    <tr>
                        <th class=\"hidden-print\"><input id=\"checkall\" type=\"checkbox\" value=\"\"></th>
                        <th class=\"sortable\"><a href=\"#\" class=\"js-sort\" data-order=\"n_dossier\">Dossier<span class=\"caret\"></span></a></th>
                        <th class=\"sortable\"><a href=\"#\" class=\"js-sort\" data-order=\"family_name\">Nom<span class=\"caret\"></span></a></th>
                        <th class=\"sortable\"><a href=\"#\" class=\"js-sort\" data-order=\"cin\">CIN<span class=\"caret\"></span></a></th>
                        <th class=\"sortable\"><a href=\"#\" class=\"js-sort\" data-order=\"cne\">CNE<span class=\"caret\"></span></a></th>
                        <th class=\"sortable\"><a href=\"#\" class=\"js-sort\" data-order=\"status\">Etat<span class=\"caret\"></span></a></th>
                        <th class=\"sortable\"><a href=\"#\" class=\"js-sort\" data-order=\"type\">Type<span class=\"caret\"></span></a></th>
                        <th class=\"hidden-print\">action</th>
                    </tr>
                </thead>
                <tbody id=\"dataContainer\"></tbody>
            </table>
        <div class=\"caption\">
          <strong>Total:</strong> <em>";
        // line 90
        echo twig_escape_filter($this->env, (isset($context["entitiesLength"]) ? $context["entitiesLength"] : null), "html", null, true);
        echo " Etudiants</em>
        </div>
<!-- Search Modal -->
";
        // line 93
        $this->env->loadTemplate("BenLogementBundle:Person:search.html.twig")->display($context);
        // line 94
        echo "<!-- confirmation modal -->
<div class=\"modal fade\" id=\"confirmationModal\" tabindex=\"-1\" role=\"dialog\" aria-labelledby=\"confirmationModal\" aria-hidden=\"true\">
  <div class=\"modal-dialog\">
    <div class=\"modal-content\">
      <div class=\"modal-header\">
        <button type=\"button\" class=\"close\" data-dismiss=\"modal\" aria-hidden=\"true\">×</button>
        <h4 class=\"modal-title\">Voulez-vous spécifier la raison du reject</h4>
      </div>
      <div class=\"modal-body form-horizontal\">
          <div class=\"form-group\">
            <label for=\"\" class=\"col-sm-5 control-label\">Raison du reject</label>
            <div class=\"col-sm-6\">
              <input id=\"reject-raison\" type=\"text\" name=\"remarque\" class=\"form-control\">
            </div>
          </div>
      </div>
      <div class=\"modal-footer\">
        <button id=\"js-reject\" type=\"button\" class=\"btn btn-primary\">Envoyer</button>
      </div>
    </div>
  </div>
</div>
</form>

";
    }

    // line 119
    public function block_javascripts($context, array $blocks = array())
    {
        // line 120
        $this->displayParentBlock("javascripts", $context, $blocks);
        echo "
";
        // line 121
        $this->env->loadTemplate("BenLogementBundle:Person:js.html.twig")->display($context);
    }

    public function getTemplateName()
    {
        return "BenLogementBundle:Person:index.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  250 => 121,  246 => 120,  243 => 119,  215 => 94,  213 => 93,  207 => 90,  180 => 66,  175 => 64,  172 => 63,  168 => 61,  166 => 60,  159 => 58,  153 => 57,  147 => 56,  130 => 44,  124 => 43,  118 => 42,  112 => 41,  102 => 34,  98 => 33,  94 => 32,  90 => 31,  73 => 17,  60 => 11,  57 => 10,  54 => 9,  48 => 7,  44 => 6,  41 => 5,  34 => 3,  31 => 2,);
    }
}
