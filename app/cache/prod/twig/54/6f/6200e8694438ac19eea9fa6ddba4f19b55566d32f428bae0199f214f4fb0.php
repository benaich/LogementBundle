<?php

/* BenLogementBundle:Person:js.html.twig */
class __TwigTemplate_546f6200e8694438ac19eea9fa6ddba4f19b55566d32f428bae0199f214f4fb0 extends Twig_Template
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
        echo "    <script src=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("js/select2.min.js"), "html", null, true);
        echo "\"></script>
<script> 
    (function(\$) {

      /* profile navigation */
      var container= \$('.container'),
          form = \$('#jsForm'),
          dataContainer = form.find('#dataContainer'),
          pageInput = form.find('#pagenumber'),
          sortByInput = form.find('#sortBy'),
          sortDirInput = form.find('#sortDir'),
          sortBtn = form.find('.js-sort'),
          typeInput = form.find('#js-type'),
          perPageBtn = form.find('#js-perpage'),
          enableBtn = form.find('.js-enable'),
          rejectBtn = form.find('#js-reject'),

          ";
        // line 18
        if (((isset($context["status"]) ? $context["status"] : null) == $this->getAttribute((isset($context["person"]) ? $context["person"] : null), "eligible"))) {
            // line 19
            echo "          orderListInput = form.find('#orderList'),
          orderListBtn = form.find('.js-order-list'),
          ";
        } else {
            // line 22
            echo "          deleteBtn = form.find('#js-delete'),
          ";
        }
        // line 24
        echo "          ";
        if (((isset($context["status"]) ? $context["status"] : null) == $this->getAttribute((isset($context["person"]) ? $context["person"] : null), "resident"))) {
            // line 25
            echo "          switchBtn = form.find('#js-switch'),
          ";
        }
        // line 27
        echo "
          searchBtn = form.find('#js-search'),
          closeBtn = \$('#searchModal').find('.close'),
          closeConfirmationBtn = \$('#confirmationModal').find('.close'),
          printAllBtn = form.find('#js-print-all'),
          jsFormUrl = '',
          checkboxBtn = form.find(\"input:checkbox\");

      function init(){
        pageInput.val('1');
        jsFormUrl = '";
        // line 37
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("etudiant_ajax"), "html", null, true);
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
            if(!action)
                dataContainer.empty().hide().html(data).fadeIn();
            else ajaxPost();
          },
          error:function(){
              alert('service non disponible pour le moment');
              container.removeClass('working');
          }
        });
        return false;
      }
      
      /* enable or disable a user*/
      enableBtn.on('click', function(){
        if (dataContainer.find('input:checkbox:checked').length == 0) {
          alert('vous devez selectionner au moin un etudiant');
          return false;
        };
        var url = '";
        // line 66
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("etudiant_status", array("status" => 1111)), "html", null, true);
        echo "',
            etat = \$(this).data('action');
        jsFormUrl = url.replace(\"1111\", etat);
        ajaxPost('enable');
      });
      /* change sort order */
      sortBtn.on('click', function(){
        var th = \$(this).parent();
        th.addClass('sorted').toggleClass('asc').siblings().removeClass('sorted');
        sortByInput.val(\$(this).data('order'));
        if (th.hasClass('asc')) sortDirInput.val('ASC');
        else sortDirInput.val('DESC');
        ajaxPost();
        return false;
      });
      /* reject a user */
      rejectBtn.on('click', function(){
        closeConfirmationBtn.trigger('click');
        if (dataContainer.find('input:checkbox:checked').length == 0) {
          alert('vous devez selectionner au moin un etudiant');
          return false;
        };
        jsFormUrl = '";
        // line 88
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("etudiant_cancel"), "html", null, true);
        echo "';
        ajaxPost('reject');
      });

      /* pagination */    
      form.on('click', '.js-page', function(){
          pageInput.val(\$(this).data('page'));
          ajaxPost();
      });

      /* number of rows per page */
      perPageBtn.on('change', ajaxPost);
      typeInput.on('change', function () {
        var url = '";
        // line 101
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("etudiant_to_pdf", array("type" => 1111, "status" => (isset($context["status"]) ? $context["status"] : null))), "html", null, true);
        echo "';
            type = \$(this).val();
        url = url.replace(\"1111\", type);
        printAllBtn.attr('href', url);
        ajaxPost();
      });
      
      searchBtn.on('click', function () {
        closeBtn.trigger('click');
        ajaxPost();
      });

      ";
        // line 113
        if (((isset($context["status"]) ? $context["status"] : null) == $this->getAttribute((isset($context["person"]) ? $context["person"] : null), "eligible"))) {
            // line 114
            echo "      /* change the order list */
      orderListBtn.on('click', function(){
        orderListInput.val(\$(this).data('ids'));
        ajaxPost();
      });
      ";
        } else {
            // line 120
            echo "
      /* delete users */
      deleteBtn.on('click', function(){
        if (dataContainer.find('input:checkbox:checked').length == 0) {
          alert('vous devez selectionner au moin un etudiant');
          return false;
        };
        if(!confirmation()) return false;
        jsFormUrl='";
            // line 128
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("etudiant_remove_some"), "html", null, true);
            echo "';
        ajaxPost('delete');
      });
      ";
        }
        // line 132
        echo "
      ";
        // line 133
        if (((isset($context["status"]) ? $context["status"] : null) == $this->getAttribute((isset($context["person"]) ? $context["person"] : null), "resident"))) {
            // line 134
            echo "      /* switch rooms */
      switchBtn.on('click', function(){
        if (dataContainer.find('input:checkbox:checked').length != 2) {
          alert('vous devez selectionner deux etudiants');
          return false;
        };
        jsFormUrl='";
            // line 140
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("room_switch"), "html", null, true);
            echo "';
        ajaxPost('switch');
      });
      ";
        }
        // line 144
        echo "
      form.on('submit', ajaxPost);
      /* submit the form after loading the page*/
      init();
      setTimeout(ajaxPost, 1);

      /* select2 */
      var rejectRaisonInput = form.find('#reject-raison'),
            rejectRaisonData = ['Problem de paiment', 'Dossier non complet', 'l\\'etudiant à retirer son dossier', 'l\\'etudiant à quitter'];
        rejectRaisonData = \$.map(rejectRaisonData, function(val,index){return {id:val, text:val};});
        rejectRaisonInput.removeClass('form-control').select2({
          createSearchChoice:function(term, data) { 
            if (\$(data).filter(function() { return this.text.localeCompare(term)===0; }).length===0) {return {id:term, text:term};} 
          },
          multiple: false,
          data: rejectRaisonData
        });
        typeInput.removeClass('form-control').select2();
        perPageBtn.removeClass('form-control').select2();
        \$('#universitySelect').removeClass('form-control').select2();

        citiesData = ['','AL HAJEB', 'AGADIR', 'AL HOCEIMA', 'AZILAL', 'BENI MELLAL', 'BENSLIMANE', 'BOUJDOUR', 'BOULEMANE', 'BERRECHID', 'CASABLANCA  ', 'CHEFCHAOUEN', 'CHTOUKA AIT BAHA', 'CHICHAOUA', 'EL JADIDA', 'EL KELAA DES SRAGHNAS', 'ERRACHIDIA  ESSAOUIRA', 'ES SEMARA', 'FES', 'FIGUIG', 'GUELMIM', 'IFRANE', 'KENITRA', 'KHEMISSET', 'KHENIFRA  ', 'KHOURIBGA', 'LAAYOUNE  ', 'LARACHE', 'MOHAMMEDIA  ', 'MARRAKECH', 'MEKNES  ', 'NADOR', 'OUARZAZATE  ', 'OUJDA', 'OUED EDDAHAB  ', 'RABAT', 'SALE', 'SKHIRAT ', 'TEMARA', 'SEFROU', 'SAFI', 'SETTAT', 'SIDI KACEM', 'TANGER', 'TAN TAN', 'TAOUNAT', 'TAROUDANNT', 'TATA', 'TAZA', 'TETOUAN', 'TIZNIT'];

        citiesData = \$.map(citiesData, function(val,index){return {id:val, text:val};});
        \$('#citySelect').removeClass('form-control').select2({
          createSearchChoice:function(term, data) { if (\$(data).filter(function() { return this.text.localeCompare(term)===0; }).length===0) {return {id:term, text:term};} },
          multiple: false,
          data: citiesData
          });

    })(jQuery);
</script>";
    }

    public function getTemplateName()
    {
        return "BenLogementBundle:Person:js.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  205 => 144,  198 => 140,  190 => 134,  188 => 133,  185 => 132,  178 => 128,  160 => 114,  158 => 113,  143 => 101,  127 => 88,  70 => 37,  58 => 27,  51 => 24,  47 => 22,  42 => 19,  40 => 18,  78 => 46,  67 => 44,  63 => 43,  19 => 1,  250 => 121,  246 => 120,  243 => 119,  215 => 94,  213 => 93,  207 => 90,  180 => 66,  175 => 64,  172 => 63,  168 => 120,  166 => 60,  159 => 58,  153 => 57,  147 => 56,  130 => 44,  124 => 43,  118 => 42,  112 => 41,  102 => 66,  98 => 33,  94 => 32,  90 => 31,  73 => 17,  60 => 11,  57 => 10,  54 => 25,  48 => 7,  44 => 6,  41 => 5,  34 => 3,  31 => 2,);
    }
}
