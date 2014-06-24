<?php

/* BenUserBundle:admin:form.html.twig */
class __TwigTemplate_2c1a67570201a8cda080868cfa263d4909a167068654ae50b36210f5f30d7397 extends Twig_Template
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
        echo "  <div class=\"form-group\">
    <label for=\"\" class=\"col-sm-4 control-label\">Photo</label>
    <div class=\"col-sm-4\">
      <img class=\"myavatar col-md-4\" src=\"";
        // line 4
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl($this->getAttribute($this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "image"), "getwebpath")), "html", null, true);
        echo "\">
    </div>
  </div>
  ";
        // line 7
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "image"), "file"), 'row', array("label" => " "));
        echo "
  ";
        // line 8
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "username"), 'row', array("label" => "Identifiant"));
        echo "
  ";
        // line 9
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "plainpassword"), 'row', array("label" => "Mot de passe"));
        echo "
  ";
        // line 10
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "family_name"), 'row', array("label" => "Nom"));
        echo "
  ";
        // line 11
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "first_name"), 'row', array("label" => "Prénom"));
        echo "
  ";
        // line 12
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "email"), 'row', array("label" => "Adresse email"));
        echo "
  ";
        // line 13
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "tel"), 'row', array("label" => "Tél"));
        echo "
  ";
        // line 14
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "logement"), 'row', array("label" => "Logement"));
        echo "
  ";
        // line 15
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "enabled"), 'row', array("label" => "Activé"));
        echo "
  ";
        // line 16
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), 'rest');
    }

    public function getTemplateName()
    {
        return "BenUserBundle:admin:form.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  62 => 15,  54 => 13,  50 => 12,  42 => 10,  34 => 8,  24 => 4,  19 => 1,  1179 => 332,  1173 => 331,  1167 => 330,  1161 => 329,  1155 => 328,  1149 => 327,  1143 => 326,  1137 => 325,  1131 => 324,  1115 => 318,  1108 => 317,  1106 => 316,  1103 => 315,  1080 => 311,  1055 => 310,  1053 => 309,  1050 => 308,  1038 => 303,  1033 => 302,  1031 => 301,  1028 => 300,  1019 => 294,  1013 => 292,  1010 => 291,  1005 => 290,  1003 => 289,  1000 => 288,  993 => 283,  986 => 281,  983 => 277,  979 => 276,  976 => 275,  973 => 274,  971 => 273,  968 => 272,  960 => 268,  958 => 267,  955 => 266,  948 => 261,  945 => 260,  937 => 255,  933 => 254,  929 => 253,  926 => 252,  924 => 251,  921 => 250,  913 => 246,  911 => 242,  909 => 241,  906 => 240,  885 => 234,  882 => 233,  879 => 232,  876 => 231,  873 => 230,  870 => 229,  867 => 228,  864 => 227,  861 => 226,  858 => 225,  856 => 224,  853 => 223,  845 => 217,  842 => 216,  840 => 215,  837 => 214,  829 => 210,  826 => 209,  824 => 208,  821 => 207,  813 => 203,  810 => 202,  808 => 201,  805 => 200,  797 => 196,  794 => 195,  792 => 194,  789 => 193,  781 => 189,  778 => 188,  776 => 187,  773 => 186,  765 => 182,  762 => 181,  760 => 180,  757 => 179,  749 => 175,  747 => 174,  744 => 173,  736 => 169,  733 => 168,  731 => 167,  728 => 166,  720 => 162,  717 => 161,  715 => 160,  713 => 159,  710 => 158,  703 => 153,  695 => 152,  690 => 151,  687 => 150,  681 => 148,  678 => 147,  676 => 146,  673 => 145,  665 => 139,  663 => 138,  662 => 137,  661 => 136,  660 => 135,  655 => 134,  649 => 132,  646 => 131,  644 => 130,  641 => 129,  632 => 123,  628 => 122,  624 => 121,  620 => 120,  615 => 119,  609 => 117,  606 => 116,  604 => 115,  601 => 114,  585 => 110,  583 => 109,  580 => 108,  564 => 104,  562 => 103,  559 => 102,  542 => 98,  530 => 96,  523 => 93,  521 => 92,  516 => 91,  513 => 90,  495 => 89,  493 => 88,  490 => 87,  481 => 82,  478 => 81,  475 => 80,  469 => 78,  467 => 77,  462 => 76,  459 => 75,  456 => 74,  450 => 72,  448 => 71,  440 => 70,  438 => 69,  435 => 68,  429 => 64,  421 => 62,  416 => 61,  412 => 60,  407 => 59,  405 => 58,  402 => 57,  393 => 52,  387 => 50,  384 => 49,  382 => 48,  379 => 47,  369 => 43,  367 => 42,  364 => 41,  356 => 37,  353 => 36,  350 => 35,  347 => 34,  345 => 33,  342 => 32,  334 => 27,  329 => 26,  323 => 24,  321 => 23,  316 => 22,  314 => 21,  311 => 20,  278 => 8,  272 => 6,  267 => 4,  258 => 331,  256 => 330,  254 => 329,  252 => 328,  248 => 326,  246 => 325,  244 => 324,  241 => 323,  238 => 321,  236 => 315,  226 => 300,  223 => 299,  220 => 297,  213 => 272,  210 => 271,  208 => 266,  205 => 265,  202 => 263,  200 => 260,  197 => 259,  195 => 250,  192 => 249,  190 => 240,  184 => 237,  182 => 223,  179 => 222,  176 => 220,  171 => 213,  166 => 206,  164 => 200,  161 => 199,  149 => 179,  146 => 178,  144 => 173,  141 => 172,  136 => 165,  134 => 158,  131 => 157,  129 => 145,  124 => 129,  121 => 128,  119 => 114,  116 => 113,  114 => 108,  111 => 107,  109 => 102,  106 => 101,  104 => 87,  101 => 86,  94 => 57,  89 => 47,  86 => 46,  84 => 41,  81 => 40,  79 => 32,  76 => 31,  74 => 20,  69 => 13,  66 => 16,  313 => 131,  306 => 129,  303 => 125,  299 => 124,  295 => 16,  292 => 15,  290 => 14,  287 => 13,  281 => 114,  273 => 112,  269 => 5,  264 => 3,  260 => 332,  255 => 108,  253 => 107,  250 => 327,  233 => 314,  231 => 308,  228 => 307,  218 => 288,  215 => 287,  212 => 65,  206 => 63,  204 => 62,  199 => 61,  196 => 60,  193 => 59,  187 => 239,  185 => 56,  178 => 55,  174 => 214,  172 => 52,  169 => 207,  159 => 193,  156 => 192,  154 => 186,  151 => 185,  143 => 35,  139 => 166,  135 => 33,  128 => 32,  126 => 144,  123 => 30,  99 => 68,  96 => 67,  93 => 23,  91 => 56,  88 => 21,  67 => 15,  64 => 3,  61 => 2,  58 => 14,  52 => 10,  49 => 9,  46 => 11,  38 => 9,  35 => 4,  71 => 19,  68 => 21,  55 => 11,  53 => 9,  47 => 8,  43 => 7,  40 => 6,  33 => 3,  30 => 7,);
    }
}
