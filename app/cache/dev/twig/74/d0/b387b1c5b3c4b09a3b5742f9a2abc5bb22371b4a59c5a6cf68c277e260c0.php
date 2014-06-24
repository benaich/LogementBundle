<?php

/* BenUserBundle:myProfile:edit.html.twig */
class __TwigTemplate_74d0b387b1c5b3c4b09a3b5742f9a2abc5bb22371b4a59c5a6cf68c277e260c0 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("FOSUserBundle::layout.html.twig");

        $this->blocks = array(
            'title' => array($this, 'block_title'),
            'fos_user_content' => array($this, 'block_fos_user_content'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "FOSUserBundle::layout.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 2
    public function block_title($context, array $blocks = array())
    {
        // line 3
        echo "Profile - ";
        $this->displayParentBlock("title", $context, $blocks);
        echo "
";
    }

    // line 6
    public function block_fos_user_content($context, array $blocks = array())
    {
        // line 7
        echo "
<div class=\"col-md-12\"><h3><span class=\" glyphicon glyphicon-user\"></span> Mon Profile</h3></div>
<form class=\"form-horizontal\" action=\"";
        // line 9
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("ben_profile_update", array("id" => $this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "id"))), "html", null, true);
        echo "\" method=\"post\" ";
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), 'enctype');
        echo ">

  <div class=\"form-group\">
    <label for=\"\" class=\"col-sm-4 control-label\">Photo</label>
    <div class=\"col-sm-4\">
      <img class=\"myavatar col-md-4\" src=\"";
        // line 14
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl($this->getAttribute($this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "image"), "getwebpath")), "html", null, true);
        echo "\">
    </div>
  </div>
  ";
        // line 17
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "image"), "file"), 'row', array("label" => " "));
        echo "
  ";
        // line 18
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "family_name"), 'row', array("label" => "Nom"));
        echo "
  ";
        // line 19
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "first_name"), 'row', array("label" => "Prénom"));
        echo "
  ";
        // line 20
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "tel"), 'row', array("label" => "Tél"));
        echo "
  ";
        // line 21
        if ($this->env->getExtension('security')->isGranted("ROLE_MANAGER")) {
            echo " ";
            echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "logement"), 'row', array("label" => "Logement"));
            echo " ";
        }
        // line 22
        echo "  ";
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), 'rest');
        echo "

    <div class=\"form-group\">
      <div class=\"col-sm-offset-4 col-sm-4\">
        <button type=\"submit\" name=\"subvalider\" class=\"btn btn-primary\"><span class=\"fui-new\"></span> Mettre à jours</button>
      </div>
    </div>
</form>

";
    }

    public function getTemplateName()
    {
        return "BenUserBundle:myProfile:edit.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  84 => 22,  78 => 21,  74 => 20,  70 => 19,  66 => 18,  62 => 17,  56 => 14,  46 => 9,  42 => 7,  39 => 6,  32 => 3,  29 => 2,);
    }
}
