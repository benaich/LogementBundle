<?php

/* BenUserBundle:admin:edit.html.twig */
class __TwigTemplate_a88a4f14da3a61c4f3d503be4098e40008b3b211c9d7daf9199928f0c7c0c620 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("BenUserBundle::layout.html.twig");

        $this->blocks = array(
            'title' => array($this, 'block_title'),
            'body' => array($this, 'block_body'),
            'javascripts' => array($this, 'block_javascripts'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "BenUserBundle::layout.html.twig";
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
        echo "<div class=\"col-md-12\">      
\t<h3><span class=\"glyphicon glyphicon-user\"></span> Mise à jour d'un utilisateur</h3>
\t<form class=\"form-horizontal\" action=\"";
        // line 8
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("ben_update_user", array("id" => $this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "id"))), "html", null, true);
        echo "\" method=\"POST\" role=\"form\" ";
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), 'enctype');
        echo ">
\t\t";
        // line 9
        $this->env->loadTemplate("BenUserBundle:admin:form.html.twig")->display($context);
        // line 10
        echo "  
  <div class=\"form-group\">
      <div class=\"col-sm-offset-4 col-sm-4\">
        <button type=\"submit\" name=\"subvalider\" class=\"btn btn-primary\"><span class=\"glyphicon glyphicon-edit\"></span>  Mettre à jour</button>
      </div>
    </div>

\t</form> 
</div>
";
    }

    // line 21
    public function block_javascripts($context, array $blocks = array())
    {
        // line 22
        $this->displayParentBlock("javascripts", $context, $blocks);
        echo "
<script> 
    (function(\$) {
    })(jQuery);
</script>
";
    }

    public function getTemplateName()
    {
        return "BenUserBundle:admin:edit.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  71 => 22,  68 => 21,  55 => 10,  53 => 9,  47 => 8,  43 => 6,  40 => 5,  33 => 3,  30 => 2,);
    }
}
