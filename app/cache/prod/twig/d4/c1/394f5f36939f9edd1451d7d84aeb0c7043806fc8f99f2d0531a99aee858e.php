<?php

/* FOSUserBundle:Security:login.html.twig */
class __TwigTemplate_d4c1394f5f36939f9edd1451d7d84aeb0c7043806fc8f99f2d0531a99aee858e extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("BenLogementBundle::layout.html.twig");

        $this->blocks = array(
            'title' => array($this, 'block_title'),
            'container' => array($this, 'block_container'),
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
        echo "Login - ";
        $this->displayParentBlock("title", $context, $blocks);
        echo "
";
    }

    // line 6
    public function block_container($context, array $blocks = array())
    {
        // line 7
        echo "
<body class=\"sign-in-bg\">
    <div class=\"sign-in\">
        <div class=\"sign-in-head text-center\">
            <h1>";
        // line 11
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["app_config"]) ? $context["app_config"] : null), "app_name"), "html", null, true);
        echo "</h1>
        </div>
        <div class=\"sign-in-form\">
            <h5 class=\"text-center\" >Connexion</h5>
            ";
        // line 15
        if ((isset($context["error"]) ? $context["error"] : null)) {
            // line 16
            echo "                <div class=\"alert alert-danger fade in\">
                    <strong><i class=\"icon-warning-sign\"></i> erreur : </strong> ";
            // line 17
            echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans((isset($context["error"]) ? $context["error"] : null), array(), "FOSUserBundle"), "html", null, true);
            echo "
                </div>
            ";
        }
        // line 19
        echo " 
            <form action=\"";
        // line 20
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("fos_user_security_check"), "html", null, true);
        echo "\" method=\"post\">
                <div class=\"form-group\">
                    <div class=\"input-group input-group-lg\">
                      <span class=\"input-group-addon\"><span class=\"glyphicon glyphicon-user\"></span></span>
                      <input type=\"text\" class=\"form-control\" placeholder=\"Login/E-mail\" name=\"_username\" value=\"";
        // line 24
        echo twig_escape_filter($this->env, (isset($context["last_username"]) ? $context["last_username"] : null), "html", null, true);
        echo "\" required=\"required\" autofocus=\"true\" />
                    </div>
                </div>
                <div class=\"form-group\">
                    <div class=\"input-group input-group-lg\">
                      <span class=\"input-group-addon\"><span class=\"glyphicon glyphicon-lock\"></span></span>
                       <input type=\"password\" class=\"form-control\" id=\"password\" name=\"_password\" required=\"required\" placeholder=\"Password\"/>
                    </div>
                </div>
                <div class=\"form-group\">
                    <label for=\"remeberme\">
                   <input id=\"remeberme\" type=\"checkbox\" name=\"_remember_me\" value=\"on\">
                    Garder ma session active
                  </label>
                </div>
               <p class=\"text-center btn-area\">
              <button type=\"submit\" class=\"btn btn-primary btn-wide btn-huge\" href=\"adherents.html\">Login</button>
              </p>
            </form>
        </div>
    </div>
  </body>
";
    }

    public function getTemplateName()
    {
        return "FOSUserBundle:Security:login.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  76 => 24,  69 => 20,  66 => 19,  60 => 17,  57 => 16,  55 => 15,  48 => 11,  42 => 7,  39 => 6,  32 => 3,  29 => 2,);
    }
}
