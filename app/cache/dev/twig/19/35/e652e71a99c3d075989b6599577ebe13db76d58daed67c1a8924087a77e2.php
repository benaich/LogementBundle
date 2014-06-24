<?php

/* BenUserBundle:admin:index.html.twig */
class __TwigTemplate_1935e652e71a99c3d075989b6599577ebe13db76d58daed67c1a8924087a77e2 extends Twig_Template
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
        echo "
<div class=\"col-md-12\">
<h3><span class=\"glyphicon glyphicon-user\"></span> Gestion des membres</h3>
        <form  id=\"jsForm\" role=\"form\" method=\"post\" action=\"\">
          <input id=\"pagenumber\" type=\"hidden\" name=\"page\" value=\"1\"> 
            <div class=\"row hide-print\">
              <div class=\"col-md-5 form-group\">
                <div class=\"input-group\">
                  <input type=\"text\" name=\"keyword\" class=\"form-control\" placeholder=\"Search\">
                  <div class=\"input-group-btn\">
                  <button class=\"btn btn-default\" type=\"button\"><span class=\"glyphicon glyphicon-search\"></span></button>
                  </div><!-- /btn-group -->
                </div><!-- /input-group -->
              </div><!-- /.col-md-6 -->

              <div class=\"col-md-2\">
                <div class=\"col-md-9\">
                <select id=\"js-perpage\" name=\"perpage\" class=\"form-control\">
                  <option value=\"10\" ";
        // line 24
        if (($this->getAttribute((isset($context["app_config"]) ? $context["app_config"] : $this->getContext($context, "app_config")), "rows_per_page") == 10)) {
            echo "selected";
        }
        echo ">10</option>
                  <option value=\"20\" ";
        // line 25
        if (($this->getAttribute((isset($context["app_config"]) ? $context["app_config"] : $this->getContext($context, "app_config")), "rows_per_page") == 20)) {
            echo "selected";
        }
        echo ">20</option>
                  <option value=\"50\" ";
        // line 26
        if (($this->getAttribute((isset($context["app_config"]) ? $context["app_config"] : $this->getContext($context, "app_config")), "rows_per_page") == 50)) {
            echo "selected";
        }
        echo ">50</option>
                  <option value=\"100\" ";
        // line 27
        if (($this->getAttribute((isset($context["app_config"]) ? $context["app_config"] : $this->getContext($context, "app_config")), "rows_per_page") == 100)) {
            echo "selected";
        }
        echo ">100</option>
                </select>
                </div>
              </div>

              <div class=\"col-lg-5\">
                <div class=\"btn-group pull-right\">              
                  <button class=\"btn btn-primary \"><span class=\"glyphicon glyphicon-cog\"></span> Action</button>
                  <button class=\"btn btn-primary dropdown-toggle\" data-toggle=\"dropdown\">
                    <span class=\"caret\"></span>
                  </button>
                  <span class=\"dropdown-arrow dropdown-arrow-inverse\"></span>
                  <ul class=\"dropdown-menu dropdown-inverse\">
                      <li><a href=\"#\" class=\"js-enable\" data-action=\"1\"><span class=\"glyphicon glyphicon-ok-circle\"></span> Activer</a></li>
                      <li><a href=\"#\" class=\"js-enable\" data-action=\"0\"><span class=\"glyphicon glyphicon-ban-circle\"></span> Désctiver</a></li>
                      <li><a href=\"#\" class=\"js-promote\" data-action=\"USER\"><span class=\"glyphicon glyphicon-user\"></span> Promote to user</a></li>
                      <li><a href=\"#\" class=\"js-promote\" data-action=\"ADMIN\"><span class=\"glyphicon glyphicon-user\"></span> Promote to Admin</a></li>
                      <li class=\"divider\"></li>
                      <li><a href=\"";
        // line 45
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("ben_users_export"), "html", null, true);
        echo "\"><span class=\"glyphicon glyphicon-export\"></span> Exporter</a></li>
                      <li><a id=\"btnPrint\"><span class=\"glyphicon glyphicon-print\"></span> imprimer</a></li>
                      <li><a href=\"#\" id=\"js-delete\"><span class=\"glyphicon glyphicon-trash\"></span> Supprimer</a></li>
                  </ul>
                </div>
              </div><!-- /.col-lg-2 -->
            </div><!-- /.row -->

            <table class=\"table table-hover table-bordered\">
                <thead>
                    <tr>
                        <th><input id=\"checkall\" type=\"checkbox\" value=\"\"></th>
                        <th class=\"col-md-2\">Identifiant</th>
                        <th>Nom et prénom</th>
                        <th>Email</th>
                        <th>Tél</th>
                        <th>Logement par defaut</th>
                        <th>Statut</th>
                        <th class=\"hide-print\">action</th>
                    </tr>
                </thead>
                <tbody id=\"dataContainer\"></tbody>
            </table>
            <div>
              <em><strong>Total:</strong> ";
        // line 69
        echo twig_escape_filter($this->env, (isset($context["entitiesLength"]) ? $context["entitiesLength"] : $this->getContext($context, "entitiesLength")), "html", null, true);
        echo " utilisateur</em>
              <a name=\"remove\" href=\"";
        // line 70
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("ben_new_user"), "html", null, true);
        echo "\" class=\"btn btn-embossed btn-primary btn-wide pull-right\"><span class=\"glyphicon glyphicon-plus\"></span> Ajouter un utilisateurs</a>
            </div>
        </form>
</div>
   
<div class=\"clearfix\"></div> 
";
    }

    // line 78
    public function block_javascripts($context, array $blocks = array())
    {
        // line 79
        $this->displayParentBlock("javascripts", $context, $blocks);
        echo "
<script> 
    (function(\$) {

      /* helper functions */
      function getUrl(id){
        var url = '";
        // line 85
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("ben_show_user", array("id" => 1111)), "html", null, true);
        echo "';
        return url.replace(\"1111\", id);
      }
      function updateLink (link) {
        moreBtn.attr('href', link);
      }
      function getCheckedRows () {
        var users = [];
        dataContainer.find('input:checkbox:checked').each(function() {
          users.push(\$(this).val());
        });
        return users.join(',');
      }
      function init(){
        pageInput.val('1');
        checkboxBtn.prop(\"checked\",false);
        jsFormUrl = '";
        // line 101
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("ben_users_ajax"), "html", null, true);
        echo "';
      }
      function ajaxPost(action) {
        container.addClass('working');
        \$.ajax({ 
          type: \"POST\", 
          data: form.serialize(),
          url: jsFormUrl, 
          success: function(data){ 
            container.removeClass('working');
            init();
            if(!action){
              dataContainer.empty().hide().html(data).fadeIn();
            }else ajaxPost();
          },
          error:function(){
              alert('service denied');
              container.removeClass('working');
          }
        });
        return false;
      }

      /* ajax dashboard*/
      var container= \$('.container'),
          form = \$('#jsForm'),
          dataContainer = form.find('#dataContainer');
          enableBtn = form.find('.js-enable'),
          promoteBtn = form.find('.js-promote'),
          deleteBtn = form.find('#js-delete'),
          pageInput = form.find('#pagenumber'),
          perPageBtn = form.find('#js-perpage'),
          jsFormUrl = '',
          checkboxBtn = form.find(\"input:checkbox\");

      /* pagination */    
      form.on('click', '.js-page', function(){
          pageInput.val(\$(this).data('page'));
          ajaxPost();
      });

      /* number of rows per page */
      perPageBtn.on('change', ajaxPost);

      /* enable or disable a user*/
      enableBtn.on('click', function(){
        var url = '";
        // line 147
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("ben_enable_users", array("etat" => 1111)), "html", null, true);
        echo "',
            etat = \$(this).data('action');
        jsFormUrl = url.replace(\"1111\", etat);
        ajaxPost('enable');
      });

      /* promote a user */
      promoteBtn.on('click', function(){
        var url='";
        // line 155
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("ben_promote_users", array("role" => 1111)), "html", null, true);
        echo "',
            etat = \$(this).data('action');
        jsFormUrl = url.replace(\"1111\", etat);
        ajaxPost('promote');
      });

      /* delete a user */
      deleteBtn.on('click', function(){
        if(!confirmation()) return false;
        jsFormUrl = '";
        // line 164
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("ben_remove_users"), "html", null, true);
        echo "';
        ajaxPost('delete');
      });
      form.on('submit', ajaxPost);

      /* submit the form after loading the page*/
      init();
      setTimeout(ajaxPost, 1);

      /* dropdown sub menu */
      \$('.dropdown-submenu').hover(function() {
        \$(this).find('.dropdown-menu').toggleClass('open');
      });
    })(jQuery);
</script>
";
    }

    public function getTemplateName()
    {
        return "BenUserBundle:admin:index.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  249 => 164,  237 => 155,  226 => 147,  177 => 101,  158 => 85,  149 => 79,  146 => 78,  135 => 70,  131 => 69,  104 => 45,  81 => 27,  75 => 26,  69 => 25,  63 => 24,  43 => 6,  40 => 5,  33 => 3,  30 => 2,);
    }
}
