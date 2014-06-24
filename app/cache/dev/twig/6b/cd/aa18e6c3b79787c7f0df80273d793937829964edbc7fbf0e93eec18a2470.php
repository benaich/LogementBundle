<?php

/* BenLogementBundle::layout.html.twig */
class __TwigTemplate_6bcdaa18e6c3b79787c7f0df80273d793937829964edbc7fbf0e93eec18a2470 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
            'meta' => array($this, 'block_meta'),
            'stylesheet' => array($this, 'block_stylesheet'),
            'title' => array($this, 'block_title'),
            'container' => array($this, 'block_container'),
            'breadcrumb' => array($this, 'block_breadcrumb'),
            'body' => array($this, 'block_body'),
            'javascripts' => array($this, 'block_javascripts'),
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        echo "<!DOCTYPE html>
<!--
         ===================================================================
        ||          designed & developed by benaich.med@gmail.com          ||
         ===================================================================
-->
<html>
  <head>
    <meta charset=\"utf-8\">
    <meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0\">
    <meta name=\"application-name\" content=\"Tacharock\"/>
    <meta name=\"author\" content=\"benaich.med@gmail.com\">
    <meta http-equiv=\"Content-Type\" content=\"text/html; charset=utf-8\"/>
    ";
        // line 14
        $this->displayBlock('meta', $context, $blocks);
        // line 15
        echo "    ";
        $this->displayBlock('stylesheet', $context, $blocks);
        // line 20
        echo "    <title>";
        $this->displayBlock('title', $context, $blocks);
        echo "</title>
    <link rel=\"shortcut icon\" type=\"image/x-icon\" href=\"";
        // line 21
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("icon.png"), "html", null, true);
        echo "\" />
    <style>";
        // line 22
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["app_config"]) ? $context["app_config"] : $this->getContext($context, "app_config")), "app_css"), "html", null, true);
        echo "</style>
    <!-- HTML5 shim, for IE6-8 support of HTML5 elements. All other JS at the end of file. -->
    <!--[if lt IE 9]>
      <script src=\"js/html5shiv.js\"></script>
    <![endif]-->
</head>
<body>
";
        // line 29
        $this->displayBlock('container', $context, $blocks);
        // line 100
        echo "</body>
</html>
";
    }

    // line 14
    public function block_meta($context, array $blocks = array())
    {
    }

    // line 15
    public function block_stylesheet($context, array $blocks = array())
    {
        // line 16
        echo "        <link href=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bootstrap/css/bootstrap.css"), "html", null, true);
        echo "\" rel=\"stylesheet\">
        <link href=\"";
        // line 17
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("css/layout.css"), "html", null, true);
        echo "\" rel=\"stylesheet\">
        <link href=\"";
        // line 18
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("css/main.css"), "html", null, true);
        echo "\" rel=\"stylesheet\">
    ";
    }

    // line 20
    public function block_title($context, array $blocks = array())
    {
        echo "onousc";
    }

    // line 29
    public function block_container($context, array $blocks = array())
    {
        // line 30
        echo "    ";
        $this->env->loadTemplate("BenLogementBundle:Default:menu.html.twig")->display($context);
        // line 31
        echo "
    <div class=\"visible-print col-md-12 text-left\"><img src=\"";
        // line 32
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("images/header.png"), "html", null, true);
        echo "\" alt=\"logo\" /></div>
    <section class=\"wrap\">
        <header id=\"adminbar\">
            <div id=\"logo\"><img src=\"";
        // line 35
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl($this->getAttribute((isset($context["app_config"]) ? $context["app_config"] : $this->getContext($context, "app_config")), "app_logo")), "html", null, true);
        echo "\" alt=\"logo\" class=\"img-small\" /> <span>";
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["app_config"]) ? $context["app_config"] : $this->getContext($context, "app_config")), "app_name"), "html", null, true);
        echo "</span></div>
            <div class=\"header-btn pull-left hide\">
            <div class=\"pull-right\"><small>Cité en cours : Cité Universitaire Souissi II</small></div>
                <div class=\"btn-group\">
                    <a href=\"#\" class=\"btn btn-primary\">Etudiant <span class=\"glyphicon glyphicon-plus\"></span></a>
                    <a href=\"#\" class=\"btn btn-info\">Cité <span class=\"glyphicon glyphicon-plus\"></span></a>
                    <a href=\"#\" class=\"btn btn-success\">Chambre <span class=\"glyphicon glyphicon-plus\"></span></a>
                    <a href=\"#\" class=\"btn btn-danger\">Utilisateur <span class=\"glyphicon glyphicon-plus\"></span></a>
                </div>
            </div>
                <div class=\"dropdown pull-right user-profile\">
                  <a href=\"#\" id=\"drop3\" role=\"button\" class=\"dropdown-toggle\" data-toggle=\"dropdown\">
                  <img class=\"img-small\" src=\"";
        // line 47
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "user"), "image"), "getwebpath")), "html", null, true);
        echo "\" alt=\"";
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "user"), "username"), "html", null, true);
        echo "\">
                  ";
        // line 48
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "user"), "fullName"), "html", null, true);
        echo " <span class=\"glyphicon glyphicon-chevron-down\"></span></a>

                    <ul class=\"dropdown-menu\">
                        <li>
                            <div class=\"navbar-content\">
                                <div class=\"row\">
                                    <div class=\"col-md-5\">
                                        <img src=\"";
        // line 55
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "user"), "image"), "getwebpath")), "html", null, true);
        echo "\" alt=\"Alternate Text\" class=\"img-responsive\" />
                                        <div class=\"clearfix\"></div>
                                        <p></p>
                                    </div>
                                    <div class=\"col-md-7\">
                                        <span>";
        // line 60
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "user"), "username"), "html", null, true);
        echo "</span>
                                        <p class=\"text-muted small\">";
        // line 61
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "user"), "email"), "html", null, true);
        echo "</p>
                                        <div class=\"divider\"></div>
                                        <a href=\"";
        // line 63
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("ben_profile_edit", array("name" => $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "user"), "username"))), "html", null, true);
        echo "\" class=\"btn btn-primary btn-sm\">Afficher mon profil</a>
                                    </div>
                                </div>
                            </div>
                            <div class=\"navbar-footer\">
                                <div class=\"navbar-footer-content\">
                                    <div class=\"row\">
                                        <div class=\"col-md-6\">
                                            <a href=\"";
        // line 71
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("fos_user_profile_edit"), "html", null, true);
        echo "\" class=\"btn btn-default btn-sm\">Compte</a>
                                        </div>
                                        <div class=\"col-md-6\">
                                            <a href=\"";
        // line 74
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("fos_user_security_logout"), "html", null, true);
        echo "\" class=\"btn btn-default btn-sm pull-right\">Déconnexion</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
        </header>

        <div class=\"container\">
            ";
        // line 85
        $this->env->loadTemplate("BenLogementBundle:Default:flashes.html.twig")->display($context);
        // line 86
        echo "            ";
        $this->displayBlock('breadcrumb', $context, $blocks);
        // line 87
        echo "            ";
        $this->displayBlock('body', $context, $blocks);
        // line 88
        echo "        </div>
    </section>

    ";
        // line 91
        $this->displayBlock('javascripts', $context, $blocks);
    }

    // line 86
    public function block_breadcrumb($context, array $blocks = array())
    {
        echo " ";
    }

    // line 87
    public function block_body($context, array $blocks = array())
    {
    }

    // line 91
    public function block_javascripts($context, array $blocks = array())
    {
        // line 92
        echo "    <script src=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("js/jquery.min.js"), "html", null, true);
        echo "\"></script>
    <script src=\"";
        // line 93
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bootstrap/js/bootstrap.min.js"), "html", null, true);
        echo "\"></script>
    <script src=\"";
        // line 94
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bootstrap/js/bootstrap-select.js"), "html", null, true);
        echo "\"></script>
    <script src=\"";
        // line 95
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bootstrap/js/bootstrap-switch.js"), "html", null, true);
        echo "\"></script>
    <script src=\"";
        // line 96
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("js/jquery.cookie.js"), "html", null, true);
        echo "\"></script>
    <script src=\"";
        // line 97
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("js/application.js"), "html", null, true);
        echo "\"></script>
    ";
    }

    public function getTemplateName()
    {
        return "BenLogementBundle::layout.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  250 => 97,  246 => 96,  242 => 95,  238 => 94,  234 => 93,  229 => 92,  226 => 91,  221 => 87,  215 => 86,  211 => 91,  206 => 88,  203 => 87,  200 => 86,  198 => 85,  184 => 74,  178 => 71,  167 => 63,  162 => 61,  158 => 60,  150 => 55,  140 => 48,  134 => 47,  117 => 35,  111 => 32,  108 => 31,  105 => 30,  102 => 29,  96 => 20,  90 => 18,  86 => 17,  81 => 16,  78 => 15,  73 => 14,  67 => 100,  65 => 29,  51 => 21,  46 => 20,  43 => 15,  41 => 14,  26 => 1,  76 => 24,  69 => 20,  66 => 19,  60 => 17,  57 => 16,  55 => 22,  48 => 11,  42 => 7,  39 => 6,  32 => 3,  29 => 2,);
    }
}
