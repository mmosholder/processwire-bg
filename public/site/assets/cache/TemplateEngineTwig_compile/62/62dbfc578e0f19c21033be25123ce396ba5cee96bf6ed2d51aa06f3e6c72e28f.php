<?php

/* menus.html */
class __TwigTemplate_024266b97b12d6a0cb77b9dfa29fe336b570d8d71cb08fa3db6a2cf3c9e59ce7 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 2
        $this->parent = $this->loadTemplate("structure/chrome.html", "menus.html", 2);
        $this->blocks = array(
            'content' => array($this, 'block_content'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "structure/chrome.html";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_content($context, array $blocks = array())
    {
        // line 4
        echo "\t<div class=\"content-page menus\">

\t\t<div class=\"container\">
      <div class=\"-row\">
        <div id='content' class=\"content\"><h1>";
        // line 8
        echo $this->getAttribute((isset($context["page"]) ? $context["page"] : null), "title", array());
        echo "</h1></div>
      </div>
    </div>

    ";
        // line 12
        if ($this->getAttribute((isset($context["page"]) ? $context["page"] : null), "plain_text", array())) {
            // line 13
            echo "    <div class=\"container\">
      <div class=\"-row\">
        <div class=\"content\">
          <div class=\"-text -center-align\">
            <p>";
            // line 17
            echo $this->getAttribute((isset($context["page"]) ? $context["page"] : null), "plain_text", array());
            echo "</p>
          </div>
        </div>
       </div>
    </div>
    ";
        }
        // line 23
        echo "
\t\t";
        // line 24
        if ($this->getAttribute((isset($context["page"]) ? $context["page"] : null), "get", array(0 => "full_width_image"), "method")) {
            // line 25
            echo "      <div class=\"container\">
        <div class=\"-row\">
          <div class=\"-full-width-image\">
            <img src=\"";
            // line 28
            echo $this->getAttribute($this->getAttribute((isset($context["page"]) ? $context["page"] : null), "get", array(0 => "full_width_image"), "method"), "url", array());
            echo "\" alt=\"\">
          </div>
        </div>
      </div>
    ";
        }
        // line 33
        echo "
    <div class=\"container\">
      <div class=\"-row\">
        <div class=\"content tabbed\">
          <ul class=\"tabbed-tabs\">
            ";
        // line 38
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["page"]) ? $context["page"] : null), "menus_repeater", array()));
        $context['loop'] = array(
          'parent' => $context['_parent'],
          'index0' => 0,
          'index'  => 1,
          'first'  => true,
        );
        if (is_array($context['_seq']) || (is_object($context['_seq']) && $context['_seq'] instanceof Countable)) {
            $length = count($context['_seq']);
            $context['loop']['revindex0'] = $length - 1;
            $context['loop']['revindex'] = $length;
            $context['loop']['length'] = $length;
            $context['loop']['last'] = 1 === $length;
        }
        foreach ($context['_seq'] as $context["_key"] => $context["menuTab"]) {
            // line 39
            echo "              <li class=\"menu-tab ";
            echo ((($this->getAttribute($context["menuTab"], "index", array()) < 1)) ? ("active") : (""));
            echo "\" id=\"";
            echo $this->getAttribute($context["loop"], "index", array());
            echo "tab\"><a href=\"#";
            echo twig_lower_filter($this->env, twig_join_filter(twig_split_filter($this->env, $this->getAttribute($context["menuTab"], "plain_text_title", array()), " ")));
            echo "\">";
            echo $this->getAttribute($context["menuTab"], "plain_text_title", array());
            echo "</a></li>
            ";
            ++$context['loop']['index0'];
            ++$context['loop']['index'];
            $context['loop']['first'] = false;
            if (isset($context['loop']['length'])) {
                --$context['loop']['revindex0'];
                --$context['loop']['revindex'];
                $context['loop']['last'] = 0 === $context['loop']['revindex0'];
            }
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['menuTab'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 41
        echo "          </ul>
          <div class=\"tabbed-content\">
            ";
        // line 43
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["page"]) ? $context["page"] : null), "menus_repeater", array()));
        $context['loop'] = array(
          'parent' => $context['_parent'],
          'index0' => 0,
          'index'  => 1,
          'first'  => true,
        );
        if (is_array($context['_seq']) || (is_object($context['_seq']) && $context['_seq'] instanceof Countable)) {
            $length = count($context['_seq']);
            $context['loop']['revindex0'] = $length - 1;
            $context['loop']['revindex'] = $length;
            $context['loop']['length'] = $length;
            $context['loop']['last'] = 1 === $length;
        }
        foreach ($context['_seq'] as $context["_key"] => $context["menuTabContent"]) {
            // line 44
            echo "              <div class=\"tabbed-content-view\" id=\"";
            echo $this->getAttribute($context["loop"], "index", array());
            echo "\">
                ";
            // line 45
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable($this->getAttribute($context["menuTabContent"], "single_menu_item_repeater", array()));
            foreach ($context['_seq'] as $context["_key"] => $context["menuItem"]) {
                // line 46
                echo "                  <div class=\"menu-item\">
                    ";
                // line 47
                if ($this->getAttribute($context["menuItem"], "get", array(0 => "item_image"), "method")) {
                    // line 48
                    echo "                    <div class=\"menu-item-image\"><img src=\"";
                    echo $this->getAttribute($this->getAttribute($context["menuItem"], "get", array(0 => "item_image"), "method"), "url", array());
                    echo "\" alt=\"\"></div>
                    ";
                }
                // line 50
                echo "                    ";
                if ($this->getAttribute($context["menuItem"], "plain_text_title", array())) {
                    // line 51
                    echo "                    <div class=\"menu-item-title\">";
                    echo $this->getAttribute($context["menuItem"], "plain_text_title", array());
                    echo "</div>
                    ";
                }
                // line 53
                echo "                    ";
                if ($this->getAttribute($context["menuItem"], "second_title", array())) {
                    // line 54
                    echo "                    <div class=\"menu-item-price\">";
                    echo $this->getAttribute($context["menuItem"], "second_title", array());
                    echo "</div>
                    ";
                }
                // line 56
                echo "                    ";
                if ($this->getAttribute($context["menuItem"], "plain_text", array())) {
                    // line 57
                    echo "                    <div class=\"menu-item-text\"><p>";
                    echo $this->getAttribute($context["menuItem"], "plain_text", array());
                    echo "</p></div>
                    ";
                }
                // line 59
                echo "                  </div>
                ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['menuItem'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 61
            echo "              </div>
            ";
            ++$context['loop']['index0'];
            ++$context['loop']['index'];
            $context['loop']['first'] = false;
            if (isset($context['loop']['length'])) {
                --$context['loop']['revindex0'];
                --$context['loop']['revindex'];
                $context['loop']['last'] = 0 === $context['loop']['revindex0'];
            }
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['menuTabContent'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 63
        echo "          </div>
        </div>
      </div>
    </div>

\t</div>
";
    }

    public function getTemplateName()
    {
        return "menus.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  216 => 63,  201 => 61,  194 => 59,  188 => 57,  185 => 56,  179 => 54,  176 => 53,  170 => 51,  167 => 50,  161 => 48,  159 => 47,  156 => 46,  152 => 45,  147 => 44,  130 => 43,  126 => 41,  103 => 39,  86 => 38,  79 => 33,  71 => 28,  66 => 25,  64 => 24,  61 => 23,  52 => 17,  46 => 13,  44 => 12,  37 => 8,  31 => 4,  28 => 3,  11 => 2,);
    }
}
/* */
/* {% extends "structure/chrome.html" %}*/
/* {% block content %}*/
/* 	<div class="content-page menus">*/
/* */
/* 		<div class="container">*/
/*       <div class="-row">*/
/*         <div id='content' class="content"><h1>{{page.title}}</h1></div>*/
/*       </div>*/
/*     </div>*/
/* */
/*     {% if page.plain_text %}*/
/*     <div class="container">*/
/*       <div class="-row">*/
/*         <div class="content">*/
/*           <div class="-text -center-align">*/
/*             <p>{{page.plain_text}}</p>*/
/*           </div>*/
/*         </div>*/
/*        </div>*/
/*     </div>*/
/*     {% endif %}*/
/* */
/* 		{% if page.get('full_width_image') %}*/
/*       <div class="container">*/
/*         <div class="-row">*/
/*           <div class="-full-width-image">*/
/*             <img src="{{ page.get('full_width_image').url }}" alt="">*/
/*           </div>*/
/*         </div>*/
/*       </div>*/
/*     {% endif %}*/
/* */
/*     <div class="container">*/
/*       <div class="-row">*/
/*         <div class="content tabbed">*/
/*           <ul class="tabbed-tabs">*/
/*             {% for menuTab in page.menus_repeater %}*/
/*               <li class="menu-tab {{ menuTab.index < 1 ? 'active' : '' }}" id="{{ loop.index }}tab"><a href="#{{ menuTab.plain_text_title|split(' ')|join()|lower }}">{{ menuTab.plain_text_title }}</a></li>*/
/*             {% endfor %}*/
/*           </ul>*/
/*           <div class="tabbed-content">*/
/*             {% for menuTabContent in page.menus_repeater %}*/
/*               <div class="tabbed-content-view" id="{{ loop.index }}">*/
/*                 {% for menuItem in menuTabContent.single_menu_item_repeater %}*/
/*                   <div class="menu-item">*/
/*                     {% if menuItem.get('item_image') %}*/
/*                     <div class="menu-item-image"><img src="{{ menuItem.get('item_image').url }}" alt=""></div>*/
/*                     {% endif %}*/
/*                     {% if menuItem.plain_text_title %}*/
/*                     <div class="menu-item-title">{{ menuItem.plain_text_title }}</div>*/
/*                     {% endif %}*/
/*                     {% if menuItem.second_title %}*/
/*                     <div class="menu-item-price">{{ menuItem.second_title }}</div>*/
/*                     {% endif %}*/
/*                     {% if menuItem.plain_text %}*/
/*                     <div class="menu-item-text"><p>{{ menuItem.plain_text }}</p></div>*/
/*                     {% endif %}*/
/*                   </div>*/
/*                 {% endfor %}*/
/*               </div>*/
/*             {% endfor %}*/
/*           </div>*/
/*         </div>*/
/*       </div>*/
/*     </div>*/
/* */
/* 	</div>*/
/* {% endblock %}*/
/* */
