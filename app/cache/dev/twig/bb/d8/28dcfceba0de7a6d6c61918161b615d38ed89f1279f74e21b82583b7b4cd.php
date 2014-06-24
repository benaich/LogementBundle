<?php

/* WebProfilerBundle:Profiler:base_js.html.twig */
class __TwigTemplate_bbd828dcfceba0de7a6d6c61918161b615d38ed89f1279f74e21b82583b7b4cd extends Twig_Template
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
        echo "<script type=\"text/javascript\">/*<![CDATA[*/
    Sfjs = (function() {
        \"use strict\";

        var noop = function() {},
            request = function(url, onSuccess, onError, payload, options) {
                var xhr = window.XMLHttpRequest ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
                options = options || {};
                xhr.open(options.method || 'GET', url, true);
                xhr.setRequestHeader('X-Requested-With', 'XMLHttpRequest');
                xhr.onreadystatechange = function(state) {
                    if (4 === xhr.readyState && 200 === xhr.status) {
                        (onSuccess || noop)(xhr);
                    } else if (4 === xhr.readyState && xhr.status != 200) {
                        (onError || noop)(xhr);
                    }
                };
                xhr.send(payload || '');
            },
            hasClass = function(el, klass) {
                return el.className.match(new RegExp('\\\\b' + klass + '\\\\b'));
            },
            removeClass = function(el, klass) {
                el.className = el.className.replace(new RegExp('\\\\b' + klass + '\\\\b'), ' ');
            },
            addClass = function(el, klass) {
                if (!hasClass(el, klass)) { el.className += \" \" + klass; }
            };

        return {
            hasClass: hasClass,
            removeClass: removeClass,
            addClass: addClass,
            request: request,
            load: function(selector, url, onSuccess, onError, options) {
                var el = document.getElementById(selector);

                if (el && el.getAttribute('data-sfurl') !== url) {
                    request(
                        url,
                        function(xhr) {
                            el.innerHTML = xhr.responseText;
                            el.setAttribute('data-sfurl', url);
                            removeClass(el, 'loading');
                            (onSuccess || noop)(xhr, el);
                        },
                        function(xhr) { (onError || noop)(xhr, el); },
                        options
                    );
                }

                return this;
            },
            toggle: function(selector, elOn, elOff) {
                var i,
                    style,
                    tmp = elOn.style.display,
                    el = document.getElementById(selector);

                elOn.style.display = elOff.style.display;
                elOff.style.display = tmp;

                if (el) {
                    el.style.display = 'none' === tmp ? 'none' : 'block';
                }

                return this;
            }

        }
    })();
/*]]>*/</script>
";
    }

    public function getTemplateName()
    {
        return "WebProfilerBundle:Profiler:base_js.html.twig";
    }

    public function getDebugInfo()
    {
        return array (  59 => 21,  50 => 15,  30 => 5,  24 => 2,  19 => 1,  250 => 97,  246 => 96,  242 => 95,  238 => 94,  234 => 93,  229 => 92,  226 => 91,  221 => 87,  215 => 86,  211 => 91,  206 => 88,  203 => 87,  200 => 86,  198 => 85,  184 => 74,  178 => 71,  167 => 63,  162 => 61,  158 => 60,  150 => 55,  140 => 48,  134 => 47,  117 => 35,  111 => 32,  108 => 31,  105 => 30,  102 => 29,  96 => 20,  90 => 18,  86 => 17,  81 => 16,  78 => 15,  73 => 14,  67 => 100,  65 => 29,  51 => 21,  46 => 14,  43 => 15,  41 => 14,  26 => 3,  76 => 24,  69 => 20,  66 => 19,  60 => 17,  57 => 16,  55 => 22,  48 => 11,  42 => 12,  39 => 6,  32 => 6,  29 => 2,);
    }
}
