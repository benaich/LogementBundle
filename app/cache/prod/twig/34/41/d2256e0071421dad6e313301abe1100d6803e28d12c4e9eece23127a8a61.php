<?php

/* BenLogementBundle:Default:menu.html.twig */
class __TwigTemplate_3441d2256e0071421dad6e313301abe1100d6803e28d12c4e9eece23127a8a61 extends Twig_Template
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
        $context["route"] = $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "request"), "attributes"), "get", array(0 => "_route"), "method");
        echo " 


";
        // line 4
        $context["personMenu"] = array(0 => "etudiant", 1 => "etudiant_elegible", 2 => "etudiant_show", 3 => "etudiant_new", 4 => "etudiant_edit", 5 => "etudiant_generate_list");
        echo " 
";
        // line 5
        $context["logementMenu"] = array(0 => "logement", 1 => "logement_show", 2 => "logement_new", 3 => "logement_edit", 4 => "block", 5 => "block_show", 6 => "block_new", 7 => "block_edit", 8 => "room", 9 => "room_show", 10 => "room_new", 11 => "room_edit");
        echo " 
";
        // line 6
        $context["logementMenu2"] = array(0 => "logement", 1 => "logement_show", 2 => "logement_new", 3 => "logement_edit");
        echo " 
";
        // line 7
        $context["blockMenu"] = array(0 => "block", 1 => "block_show", 2 => "block_new", 3 => "block_edit");
        echo " 
";
        // line 8
        $context["roomMenu"] = array(0 => "room", 1 => "room_show", 2 => "room_new", 3 => "room_edit");
        echo " 
";
        // line 9
        $context["configMenu"] = array(0 => "config", 1 => "university", 2 => "etablissement", 3 => "university_show", 4 => "university_new", 5 => "university_edit", 6 => "ben_import");
        echo " 

";
        // line 11
        $context["ReservationMenu"] = array(0 => "reservation", 1 => "reservation_show", 2 => "reservation_new", 3 => "reservation_edit");
        echo " 
";
        // line 12
        $context["universityMenu"] = array(0 => "university", 1 => "university_show", 2 => "university_new", 3 => "university_edit");
        echo " 
";
        // line 13
        $context["userMenu"] = array(0 => "ben_users", 1 => "ben_show_user", 2 => "ben_new_user", 3 => "ben_edit_user");
        echo " 


<nav id=\"adminmenu\">
    <ul class=\"top-menu\">
        <li class=\"";
        // line 18
        if (((isset($context["route"]) ? $context["route"] : null) != "ben_dashboard")) {
            echo "not-";
        }
        echo "current\"><a href=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("ben_dashboard"), "html", null, true);
        echo "\"><span class=\"glyphicon glyphicon-dashboard block\"></span> <span class=\"menu-title\">Dashborad</span></a></li>
        <li class=\"";
        // line 19
        if (!twig_in_filter((isset($context["route"]) ? $context["route"] : null), (isset($context["personMenu"]) ? $context["personMenu"] : null))) {
            echo "not-";
        }
        echo "current has-submenu\"><a href=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("etudiant"), "html", null, true);
        echo "\"><span class=\"glyphicon glyphicon-user block\"></span> <span class=\"menu-title\">Etudiants</span></a>
            <ul class=\"sub-menu\">
                <li class=\"submenu-head\">Etudiants</li>
                <li><a href=\"";
        // line 22
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("etudiant", array("status" => "valide")), "html", null, true);
        echo "\" ";
        if ((array_key_exists("status", $context) && ((isset($context["status"]) ? $context["status"] : null) == "valide"))) {
            echo "class=\"active\"";
        }
        echo ">Liste valide</a></li>
                <li><a href=\"";
        // line 23
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("etudiant_generate_list"), "html", null, true);
        echo "\" ";
        if (twig_in_filter((isset($context["route"]) ? $context["route"] : null), array(0 => "etudiant_generate_list"))) {
            echo "class=\"active\"";
        }
        echo " >Générer une liste</a></li>
                <li><a href=\"";
        // line 24
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("etudiant_elegible"), "html", null, true);
        echo "\" ";
        if (twig_in_filter((isset($context["route"]) ? $context["route"] : null), array(0 => "etudiant_elegible"))) {
            echo "class=\"active\"";
        }
        echo ">Liste éligibles</a></li>
                <li><a href=\"";
        // line 25
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("etudiant", array("status" => "résidant")), "html", null, true);
        echo "\" ";
        if ((array_key_exists("status", $context) && ((isset($context["status"]) ? $context["status"] : null) == "résidant"))) {
            echo "class=\"active\"";
        }
        echo ">Liste résident</a></li>
                <li><a href=\"";
        // line 26
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("etudiant", array("status" => "non valide")), "html", null, true);
        echo "\" ";
        if ((array_key_exists("status", $context) && ((isset($context["status"]) ? $context["status"] : null) == "non valide"))) {
            echo "class=\"active\"";
        }
        echo ">Etudiants rejetés</a></li>
            </ul>
        </li>
        <li class=\"";
        // line 29
        if (!twig_in_filter((isset($context["route"]) ? $context["route"] : null), (isset($context["ReservationMenu"]) ? $context["ReservationMenu"] : null))) {
            echo "not-";
        }
        echo "current\"><a href=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("reservation"), "html", null, true);
        echo "\"><span class=\"glyphicon glyphicon-file block\"></span> <span class=\"menu-title\">Résérvation</span></a></li>
        <li class=\"";
        // line 30
        if (!twig_in_filter((isset($context["route"]) ? $context["route"] : null), (isset($context["logementMenu"]) ? $context["logementMenu"] : null))) {
            echo "not-";
        }
        echo "current has-submenu\"><a href=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("logement"), "html", null, true);
        echo "\"><span class=\"glyphicon glyphicon-home block\"></span> <span class=\"menu-title\">Logement</span></a> <ul class=\"sub-menu\">
                <li class=\"submenu-head\">Logement</li>
                <li><a href=\"";
        // line 32
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("logement"), "html", null, true);
        echo "\" ";
        if (twig_in_filter((isset($context["route"]) ? $context["route"] : null), (isset($context["logementMenu2"]) ? $context["logementMenu2"] : null))) {
            echo "class=\"active\"";
        }
        echo ">Logement</a></li>
                <li><a href=\"";
        // line 33
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("block"), "html", null, true);
        echo "\" ";
        if (twig_in_filter((isset($context["route"]) ? $context["route"] : null), (isset($context["blockMenu"]) ? $context["blockMenu"] : null))) {
            echo "class=\"active\"";
        }
        echo ">Pavillon</a></li>
                <li><a href=\"";
        // line 34
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("room"), "html", null, true);
        echo "\" ";
        if (twig_in_filter((isset($context["route"]) ? $context["route"] : null), (isset($context["roomMenu"]) ? $context["roomMenu"] : null))) {
            echo "class=\"active\"";
        }
        echo ">Chambre</a></li>
            </ul>
        </li>

        ";
        // line 38
        if ($this->env->getExtension('security')->isGranted("ROLE_MANAGER")) {
            // line 39
            echo "        <li class=\"";
            if (!twig_in_filter((isset($context["route"]) ? $context["route"] : null), (isset($context["userMenu"]) ? $context["userMenu"] : null))) {
                echo "not-";
            }
            echo "current\"><a href=\"";
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("ben_users"), "html", null, true);
            echo "\"><span class=\"glyphicon glyphicon-cog block\"></span> <span class=\"menu-title\">Utilsateurs</span></a></li>
        <li class=\"";
            // line 40
            if (!twig_in_filter((isset($context["route"]) ? $context["route"] : null), (isset($context["configMenu"]) ? $context["configMenu"] : null))) {
                echo "not-";
            }
            echo "current has-submenu\"><a href=\"";
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("config"), "html", null, true);
            echo "\"><span class=\"glyphicon glyphicon-wrench block\"></span> <span class=\"menu-title\">Préférences</span></a>
            <ul class=\"sub-menu\">
                <li class=\"submenu-head\">Préférences</li>
                <li><a href=\"";
            // line 43
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("university"), "html", null, true);
            echo "\" ";
            if (twig_in_filter((isset($context["route"]) ? $context["route"] : null), (isset($context["universityMenu"]) ? $context["universityMenu"] : null))) {
                echo "class=\"active\"";
            }
            echo ">Université</a></li>
                <li><a href=\"";
            // line 44
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("etablissement"), "html", null, true);
            echo "\" ";
            if (twig_in_filter((isset($context["route"]) ? $context["route"] : null), array(0 => "etablissement"))) {
                echo "class=\"active\"";
            }
            echo ">Etablissement</a></li>
                <li><a href=\"";
            // line 45
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("ben_import"), "html", null, true);
            echo "\" ";
            if (twig_in_filter((isset($context["route"]) ? $context["route"] : null), array(0 => "ben_import"))) {
                echo "class=\"active\"";
            }
            echo ">Importer</a></li>
            </ul>
        </li>
        ";
        }
        // line 49
        echo "        <li class=\"";
        if (((isset($context["route"]) ? $context["route"] : null) != "fos_user_security_logout")) {
            echo "not-";
        }
        echo "current\"><a href=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("fos_user_security_logout"), "html", null, true);
        echo "\"><span class=\"glyphicon glyphicon-off block\"></span>  <span class=\"menu-title\">Déconnexion</span></a></li>
        <li class=\"not-current\"><a href=\"#\" id=\"trigger-shelf\"><span class=\"glyphicon glyphicon-chevron-left block\"></span>  <span class=\"menu-title\">Collapse menu</span></a></li>
    </ul>
</nav>
";
    }

    public function getTemplateName()
    {
        return "BenLogementBundle:Default:menu.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  218 => 49,  207 => 45,  199 => 44,  191 => 43,  181 => 40,  172 => 39,  159 => 34,  143 => 32,  134 => 30,  126 => 29,  116 => 26,  108 => 25,  100 => 24,  92 => 23,  84 => 22,  74 => 19,  66 => 18,  58 => 13,  54 => 12,  50 => 11,  45 => 9,  41 => 8,  37 => 7,  29 => 5,  25 => 4,  19 => 1,  298 => 131,  295 => 130,  288 => 126,  277 => 121,  273 => 120,  269 => 119,  265 => 118,  261 => 117,  253 => 114,  249 => 112,  245 => 111,  228 => 99,  195 => 74,  186 => 73,  177 => 72,  170 => 38,  166 => 67,  162 => 66,  155 => 62,  151 => 33,  147 => 60,  140 => 56,  136 => 55,  132 => 54,  125 => 50,  121 => 49,  117 => 48,  110 => 44,  106 => 43,  102 => 42,  95 => 38,  91 => 37,  87 => 36,  80 => 32,  76 => 31,  72 => 30,  55 => 16,  43 => 6,  40 => 5,  33 => 6,  30 => 2,);
    }
}
