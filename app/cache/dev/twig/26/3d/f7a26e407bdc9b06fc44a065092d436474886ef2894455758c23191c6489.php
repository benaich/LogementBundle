<?php

/* BenUserBundle::layout.html.twig */
class __TwigTemplate_263df7a26e407bdc9b06fc44a065092d436474886ef2894455758c23191c6489 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("BenLogementBundle::layout.html.twig");

        $this->blocks = array(
            'body' => array($this, 'block_body'),
            'fos_user_content' => array($this, 'block_fos_user_content'),
            'outcontainer' => array($this, 'block_outcontainer'),
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
    public function block_body($context, array $blocks = array())
    {
        // line 3
        echo "

 ";
        // line 5
        $this->displayBlock('fos_user_content', $context, $blocks);
        // line 8
        echo " 
";
        // line 9
        $this->displayBlock('outcontainer', $context, $blocks);
        // line 11
        echo "    </section>
 ";
    }

    // line 5
    public function block_fos_user_content($context, array $blocks = array())
    {
        // line 6
        echo "
 ";
    }

    // line 9
    public function block_outcontainer($context, array $blocks = array())
    {
    }

    public function getTemplateName()
    {
        return "BenUserBundle::layout.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  57 => 9,  52 => 6,  49 => 5,  44 => 11,  42 => 9,  39 => 8,  37 => 5,  249 => 164,  237 => 155,  226 => 147,  177 => 101,  158 => 85,  149 => 79,  146 => 78,  135 => 70,  131 => 69,  104 => 45,  81 => 27,  75 => 26,  69 => 25,  63 => 24,  43 => 6,  40 => 5,  33 => 3,  30 => 2,);
    }
}
