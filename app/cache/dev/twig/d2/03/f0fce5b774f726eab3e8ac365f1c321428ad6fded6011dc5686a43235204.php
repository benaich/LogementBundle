<?php

/* BenLogementBundle:Default:index.html.twig */
class __TwigTemplate_d203f0fce5b774f726eab3e8ac365f1c321428ad6fded6011dc5686a43235204 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("BenLogementBundle::layout.html.twig");

        $this->blocks = array(
            'title' => array($this, 'block_title'),
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
    public function block_body($context, array $blocks = array())
    {
        // line 6
        echo "<div class=\"col-md-12  hidden-print\"><h3><span class=\"glyphicon glyphicon-dashboard\"></span> Tableau de bord</h3></div>
<div class=\"col-md-12  visible-print\">
            <h3 class=\"text-center\">Procès verbal de la commission d'octroi d'un logement au sein de la Cité Universitaire</h3>
            <h4><span class=\"glyphicon glyphicon-user\"></span> Membres de la commission </h4>
            <ul id=\"comity-list\"></ul>
            <h4><span class=\"glyphicon glyphicon-file\"></span> Statistiques:</h4>
</div>
<div class=\"col-md-8\">
    <div class=\"box\">
        <header class=\" hidden-print\">
            <h4><span class=\"glyphicon glyphicon-file\"></span> Statistiques: ";
        // line 16
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "user"), "logement"), "html", null, true);
        echo "</h4>
        </header>
        <table class=\"table table-hover table-bordered\">
            <thead>
                <tr>
                    <th></th>
                    <th>Fille</th>
                    <th>Garçon</th>
                    <th>Total</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Capacité d'accueil</td>
                    <td>";
        // line 30
        echo twig_escape_filter($this->env, (isset($context["capacityWomen"]) ? $context["capacityWomen"] : $this->getContext($context, "capacityWomen")), "html", null, true);
        echo "</td>
                    <td>";
        // line 31
        echo twig_escape_filter($this->env, (isset($context["capacityMen"]) ? $context["capacityMen"] : $this->getContext($context, "capacityMen")), "html", null, true);
        echo "</td>
                    <td>";
        // line 32
        echo twig_escape_filter($this->env, (isset($context["capacity"]) ? $context["capacity"] : $this->getContext($context, "capacity")), "html", null, true);
        echo "</td>
                </tr>
                <tr>
                    <td>Place disponibles</td>
                    <td>";
        // line 36
        echo twig_escape_filter($this->env, (isset($context["availableWomen"]) ? $context["availableWomen"] : $this->getContext($context, "availableWomen")), "html", null, true);
        echo "</td>
                    <td>";
        // line 37
        echo twig_escape_filter($this->env, (isset($context["availableMen"]) ? $context["availableMen"] : $this->getContext($context, "availableMen")), "html", null, true);
        echo "</td>
                    <td>";
        // line 38
        echo twig_escape_filter($this->env, (isset($context["available"]) ? $context["available"] : $this->getContext($context, "available")), "html", null, true);
        echo "</td>
                </tr>
                <tr>
                    <td>Nombre de demandes</td>
                    <td>";
        // line 42
        echo twig_escape_filter($this->env, (isset($context["requestWomen"]) ? $context["requestWomen"] : $this->getContext($context, "requestWomen")), "html", null, true);
        echo "</td>
                    <td>";
        // line 43
        echo twig_escape_filter($this->env, (isset($context["requestMen"]) ? $context["requestMen"] : $this->getContext($context, "requestMen")), "html", null, true);
        echo "</td>
                    <td>";
        // line 44
        echo twig_escape_filter($this->env, (isset($context["request"]) ? $context["request"] : $this->getContext($context, "request")), "html", null, true);
        echo "</td>
                </tr>
                <tr>
                    <td>Etudiants résidents</td>
                    <td>";
        // line 48
        echo twig_escape_filter($this->env, (isset($context["residentWomen"]) ? $context["residentWomen"] : $this->getContext($context, "residentWomen")), "html", null, true);
        echo "</td>
                    <td>";
        // line 49
        echo twig_escape_filter($this->env, (isset($context["residentMen"]) ? $context["residentMen"] : $this->getContext($context, "residentMen")), "html", null, true);
        echo "</td>
                    <td>";
        // line 50
        echo twig_escape_filter($this->env, (isset($context["resident"]) ? $context["resident"] : $this->getContext($context, "resident")), "html", null, true);
        echo "</td>
                </tr>
                <tr>
                    <td>Anciens étudiants résidents</td>
                    <td>";
        // line 54
        echo twig_escape_filter($this->env, (isset($context["oldResidentWomen"]) ? $context["oldResidentWomen"] : $this->getContext($context, "oldResidentWomen")), "html", null, true);
        echo "</td>
                    <td>";
        // line 55
        echo twig_escape_filter($this->env, (isset($context["oldResidentMen"]) ? $context["oldResidentMen"] : $this->getContext($context, "oldResidentMen")), "html", null, true);
        echo "</td>
                    <td>";
        // line 56
        echo twig_escape_filter($this->env, (isset($context["oldResident"]) ? $context["oldResident"] : $this->getContext($context, "oldResident")), "html", null, true);
        echo "</td>
                </tr>
                <tr>
                    <td>Nouveau étudiants résidents</td>
                    <td>";
        // line 60
        echo twig_escape_filter($this->env, (isset($context["newResidentWomen"]) ? $context["newResidentWomen"] : $this->getContext($context, "newResidentWomen")), "html", null, true);
        echo "</td>
                    <td>";
        // line 61
        echo twig_escape_filter($this->env, (isset($context["newResidentMen"]) ? $context["newResidentMen"] : $this->getContext($context, "newResidentMen")), "html", null, true);
        echo "</td>
                    <td>";
        // line 62
        echo twig_escape_filter($this->env, (isset($context["newResident"]) ? $context["newResident"] : $this->getContext($context, "newResident")), "html", null, true);
        echo "</td>
                </tr>
                <tr>
                    <td>Nouveau étudiants étrangers</td>
                    <td>";
        // line 66
        echo twig_escape_filter($this->env, (isset($context["foreignResidentWomen"]) ? $context["foreignResidentWomen"] : $this->getContext($context, "foreignResidentWomen")), "html", null, true);
        echo "</td>
                    <td>";
        // line 67
        echo twig_escape_filter($this->env, (isset($context["foreignResidentMen"]) ? $context["foreignResidentMen"] : $this->getContext($context, "foreignResidentMen")), "html", null, true);
        echo "</td>
                    <td>";
        // line 68
        echo twig_escape_filter($this->env, (isset($context["foreignResident"]) ? $context["foreignResident"] : $this->getContext($context, "foreignResident")), "html", null, true);
        echo "</td>
                </tr>
                <tr>
                    <td>Taux de satisfactions</td>
                    <td>";
        // line 72
        if ((isset($context["capacityWomen"]) ? $context["capacityWomen"] : $this->getContext($context, "capacityWomen"))) {
            echo twig_escape_filter($this->env, twig_number_format_filter($this->env, (((isset($context["residentWomen"]) ? $context["residentWomen"] : $this->getContext($context, "residentWomen")) * 100) / (isset($context["capacityWomen"]) ? $context["capacityWomen"] : $this->getContext($context, "capacityWomen"))), 2), "html", null, true);
            echo " %";
        } else {
            echo "-";
        }
        echo "</td>
                    <td>";
        // line 73
        if ((isset($context["capacityMen"]) ? $context["capacityMen"] : $this->getContext($context, "capacityMen"))) {
            echo twig_escape_filter($this->env, twig_number_format_filter($this->env, (((isset($context["residentMen"]) ? $context["residentMen"] : $this->getContext($context, "residentMen")) * 100) / (isset($context["capacityMen"]) ? $context["capacityMen"] : $this->getContext($context, "capacityMen"))), 2), "html", null, true);
            echo " %";
        } else {
            echo "-";
        }
        echo "</td>
                    <td>";
        // line 74
        if ((isset($context["capacity"]) ? $context["capacity"] : $this->getContext($context, "capacity"))) {
            echo twig_escape_filter($this->env, twig_number_format_filter($this->env, (((isset($context["resident"]) ? $context["resident"] : $this->getContext($context, "resident")) * 100) / (isset($context["capacity"]) ? $context["capacity"] : $this->getContext($context, "capacity"))), 2), "html", null, true);
            echo " %";
        } else {
            echo "-";
        }
        echo "</td>
                </tr>
                <tr class=\"hidden-print\">
                <td colspan=\"10\" class=\"text-center\">
                    <div class=\"col-md-10\">
                    <input type=\"text\" id=\"comity\" name=\"comity\" class=\"form-control\" placeholder=\"Membres du comité (séparé par des virgules)\">
                    </div>
                    <a id=\"comitymemmbersPrint\" href=\"#\" class=\"btn btn-default\"><span class=\"glyphicon glyphicon-print\"></span> Imprimer</a>
                    <a href=\"#\" class=\"hide\" id=\"btnPrint\"></a>
                </td>
                </tr>
            </tbody>
        </table>
        <div class=\"visible-print\">
        <br><br>
        <table>
            <tr>
                <td class=\"text-center\" width=\"50%\">Signature du directeur de la cité universitaire président de la commission</td>
                <td class=\"text-center\" style=\"vertical-align: top;\">Signature du chargé des affaires estudianes</td>
            </tr>
            <tr><td><br><br></td><td><br><br></td></tr>
            <tr><td class=\"text-center\">Signature du chargé des affaires économiques</td><td></td></tr>
            <tr><td><br><br></td><td><br><br></td></tr>
        </table>
            <div class=\"pull-right\">
                Fait à ";
        // line 99
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["app_config"]) ? $context["app_config"] : $this->getContext($context, "app_config")), "app_city"), "html", null, true);
        echo " le ";
        echo twig_escape_filter($this->env, twig_date_format_filter($this->env, "now", "d/m/Y"), "html", null, true);
        echo "
            </div>
        </div> 
    </div>
</div>

<div class=\"col-md-4 hidden-print\">
    <div class=\"box\">
      <header>
          <h4><span class=\"glyphicon glyphicon-user\"></span> Contacts</h4>
      </header>
      <ul class=\"list-group\" id=\"contact-list\">
      ";
        // line 111
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["users"]) ? $context["users"] : $this->getContext($context, "users")));
        foreach ($context['_seq'] as $context["_key"] => $context["entity"]) {
            // line 112
            echo "          <li class=\"list-group-item\">
              <div class=\"col-xs-12 col-sm-3\">
                  <img src=\"";
            // line 114
            echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl($this->getAttribute($this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "image"), "getwebpath")), "html", null, true);
            echo "\" alt=\"";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "fullName"), "html", null, true);
            echo "\" class=\"img-responsive img-circle\" />
              </div>
              <div class=\"col-xs-12 col-sm-9\">
                  <span class=\"name\">";
            // line 117
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "fullName"), "html", null, true);
            echo "</span><br/>
                  <span class=\"glyphicon glyphicon-earphone text-muted c-info\" data-toggle=\"tooltip\" title=\"";
            // line 118
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "tel"), "html", null, true);
            echo "\"></span>
                  <span class=\"visible-xs\"> <span class=\"text-muted\">";
            // line 119
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "tel"), "html", null, true);
            echo "</span><br/></span>
                  <span class=\"glyphicon glyphicon-envelope text-muted c-info\" data-toggle=\"tooltip\" title=\"";
            // line 120
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "email"), "html", null, true);
            echo "\"></span>
                  <span class=\"visible-xs\"> <span class=\"text-muted\">";
            // line 121
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "email"), "html", null, true);
            echo "</span><br/></span>
              </div>
              <div class=\"clearfix\"></div>
          </li>
      ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['entity'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 126
        echo "      </ul>
    </div>
</div>
";
    }

    // line 130
    public function block_javascripts($context, array $blocks = array())
    {
        // line 131
        $this->displayParentBlock("javascripts", $context, $blocks);
        echo "

<script> 
(function(\$) { 
    var comitymemmbersBtn = \$(\"#comitymemmbersPrint\"),
        comityList = \$('#comity-list'),
        comityInput = \$('#comity');
    comitymemmbersBtn.on('click', function(){
        var list = comityInput.val().split(',').join('</li><li>'),
            html = '<li>'+list+'</li>';
        comityList.html(html);
        \$('#btnPrint').trigger('click');
    });

})(jQuery);

</script>
";
    }

    public function getTemplateName()
    {
        return "BenLogementBundle:Default:index.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  298 => 131,  295 => 130,  288 => 126,  277 => 121,  273 => 120,  269 => 119,  265 => 118,  261 => 117,  253 => 114,  249 => 112,  245 => 111,  228 => 99,  195 => 74,  186 => 73,  177 => 72,  170 => 68,  166 => 67,  162 => 66,  155 => 62,  151 => 61,  147 => 60,  140 => 56,  136 => 55,  132 => 54,  125 => 50,  121 => 49,  117 => 48,  110 => 44,  106 => 43,  102 => 42,  95 => 38,  91 => 37,  87 => 36,  80 => 32,  76 => 31,  72 => 30,  55 => 16,  43 => 6,  40 => 5,  33 => 3,  30 => 2,);
    }
}
