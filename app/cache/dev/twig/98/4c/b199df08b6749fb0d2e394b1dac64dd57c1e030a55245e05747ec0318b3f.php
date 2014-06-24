<?php

/* FOSUserBundle:ChangePassword:changePassword.html.twig */
class __TwigTemplate_984cb199df08b6749fb0d2e394b1dac64dd57c1e030a55245e05747ec0318b3f extends Twig_Template
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
        echo "<form class=\"form-horizontal\" method=\"POST\" action=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("fos_user_change_password"), "html", null, true);
        echo "\" ";
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock((isset($context["passwordform"]) ? $context["passwordform"] : $this->getContext($context, "passwordform")), 'enctype');
        echo " >
    <fieldset>
        <legend><span class=\"glyphicon glyphicon-lock\"></span> Changer votre mot de passe</legend>

        ";
        // line 5
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["passwordform"]) ? $context["passwordform"] : $this->getContext($context, "passwordform")), "current_password"), 'row', array("label" => "Mot de passe actuel"));
        echo "
        ";
        // line 6
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute($this->getAttribute((isset($context["passwordform"]) ? $context["passwordform"] : $this->getContext($context, "passwordform")), "new"), "first"), 'row', array("label" => "Nouveau mot de passe"));
        echo "
        ";
        // line 7
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute($this->getAttribute((isset($context["passwordform"]) ? $context["passwordform"] : $this->getContext($context, "passwordform")), "new"), "second"), 'row', array("label" => "Confirmer votre mot de passe"));
        echo "

        ";
        // line 9
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock((isset($context["passwordform"]) ? $context["passwordform"] : $this->getContext($context, "passwordform")), 'rest');
        echo "

    <div class=\"form-group\">
        <div class=\"col-md-offset-4 col-md-4\">
            <button type=\"submit\" name=\"subvalider\" class=\"btn btn-primary\"><span class=\"glyphicon glyphicon-edit\"></span> Mettre à jour</button>
        </div>
    </div>
    </fieldset>
</form>

           ";
    }

    public function getTemplateName()
    {
        return "FOSUserBundle:ChangePassword:changePassword.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  37 => 7,  33 => 6,  19 => 1,  70 => 17,  65 => 15,  61 => 14,  57 => 13,  47 => 9,  45 => 8,  42 => 9,  39 => 6,  32 => 3,  29 => 5,);
    }
}
