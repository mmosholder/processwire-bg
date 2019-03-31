<?php

/* structure/chrome.html */
class __TwigTemplate_70abc960ce07b89292a8f9dee90b0e9e2321c8eaa4cd3e98d750d403a5ab9f14 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
            'content' => array($this, 'block_content'),
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        echo "<!DOCTYPE html>
<html lang=\"en\">
<head>
\t<meta http-equiv=\"content-type\" content=\"text/html; charset=utf-8\" />
\t<meta name=\"viewport\" content=\"width=device-width, initial-scale=1\" />
\t<title>The Bluegrass Lounge | ";
        // line 6
        echo $this->getAttribute((isset($context["page"]) ? $context["page"] : null), "title", array());
        echo "</title>
\t<meta name=\"description\" content=\"";
        // line 7
        echo $this->getAttribute((isset($context["view"]) ? $context["view"] : null), "summary", array());
        echo "\" />
  <link rel=\"shortcut icon\" type=\"image/x-icon\" href=\"";
        // line 8
        echo $this->getAttribute($this->getAttribute((isset($context["config"]) ? $context["config"] : null), "urls", array()), "templates", array());
        echo "images/favicon.ico\" />
  <link rel=\"stylesheet\" type=\"text/css\" href=\"";
        // line 9
        echo $this->getAttribute((isset($context["recurme"]) ? $context["recurme"] : null), "css", array());
        echo "\">
\t<link rel=\"stylesheet\" type=\"text/css\" href=\"";
        // line 10
        echo $this->getAttribute($this->getAttribute((isset($context["config"]) ? $context["config"] : null), "urls", array()), "templates", array());
        echo "styles/main.css\" />
\t<script type='text/javascript' src='https://maps.googleapis.com/maps/api/js?key=AIzaSyATHVvqqbz699klt8B_7SKEB2BkyfFd_IE'></script>
  <script src=\"https://use.fontawesome.com/bcb0ade4ba.js\"></script>
</head>
<body class='has-sidebar'>

\t<!-- top navigation -->
\t<nav class='nav' role='navigation'>
    <div class=\"container\">
      <div class=\"-row\">
\t\t\t\t<a href=\"/\">
          <img class=\"-logo\" src=\"";
        // line 21
        echo $this->getAttribute($this->getAttribute((isset($context["config"]) ? $context["config"] : null), "urls", array()), "templates", array());
        echo "images/home-nav-logo.png\" alt=\"\">
          <img class=\"-wordmark\" src=\"";
        // line 22
        echo $this->getAttribute($this->getAttribute((isset($context["config"]) ? $context["config"] : null), "urls", array()), "templates", array());
        echo "images/wordmark@2x.png\" alt=\"\">
        </a>
        <button class=\"hamburger hamburger--slider\" type=\"button\">
          <span class=\"hamburger-box\">
            <span class=\"hamburger-inner\"></span>
          </span>
        </button>
        <div class=\"-links\">
          <ul>
            <li><a href=\"/\">Home</a></li>
            ";
        // line 32
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute($this->getAttribute((isset($context["pages"]) ? $context["pages"] : null), "get", array(0 => "/"), "method"), "children", array()));
        foreach ($context['_seq'] as $context["_key"] => $context["item"]) {
            // line 33
            echo "              <li class=\"";
            echo ((($this->getAttribute($context["item"], "id", array()) == $this->getAttribute($this->getAttribute((isset($context["page"]) ? $context["page"] : null), "rootParent", array()), "id", array()))) ? ("current") : (""));
            echo "\"><a href=\"";
            echo $this->getAttribute($context["item"], "url", array());
            echo "\">";
            echo $this->getAttribute($context["item"], "title", array());
            echo "</a></li>
            ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['item'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 35
        echo "          </ul>
        </div>
      </div>
    </div>
  </nav>

\t<main id='main'>
    ";
        // line 42
        $this->displayBlock('content', $context, $blocks);
        // line 44
        echo "
\t</main>

\t<!-- footer -->
\t<footer class=\"footer\" role=\"contentinfo\">
\t\t<div class=\"container\">
\t\t\t<div class=\"row\">
\t\t\t\t<div class=\"hours\">
\t\t\t\t\t<div class=\"-item\">
\t\t\t\t\t\t<div class=\"-title\">Sunday - Thursday</div>
\t\t\t\t\t\t<div class=\"-time\">7AM to 10PM</div>
\t\t\t\t\t</div>
\t\t\t\t\t<div class=\"-item\">
\t\t\t\t\t\t<div class=\"-title\">Friday & Saturday</div>
\t\t\t\t\t\t<div class=\"-time\">7AM to 12AM</div>
\t\t\t\t\t</div>
          <div class=\"-item\">
            <div class=\"-title\">Daily Happy Hour</div>
            <div class=\"-time\">3PM to 6PM</div>
          </div>
\t\t\t\t</div>
\t\t\t\t<div class=\"links\">
          <ul>
            <li><a href=\"/\">Home</a></li>
            ";
        // line 68
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute($this->getAttribute((isset($context["pages"]) ? $context["pages"] : null), "get", array(0 => "/"), "method"), "children", array()));
        foreach ($context['_seq'] as $context["_key"] => $context["item"]) {
            // line 69
            echo "              <li class=\"";
            echo ((($this->getAttribute($context["item"], "id", array()) == $this->getAttribute($this->getAttribute((isset($context["page"]) ? $context["page"] : null), "rootParent", array()), "id", array()))) ? ("current") : (""));
            echo "\"><a href=\"";
            echo $this->getAttribute($context["item"], "url", array());
            echo "\">";
            echo $this->getAttribute($context["item"], "title", array());
            echo "</a></li>
            ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['item'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 71
        echo "          </ul>
          </ul>
          <ul>
          \t<li><a href=\"/menus\">Coffee &amp; Tea</a></li>
          \t<li><a href=\"/menus\">Breakfast &amp; Sunday Brunch</a></li>
          \t<li><a href=\"/menus\"></a>Lunch &amp; Dinner</li>
          \t<li><a href=\"/menus\">Drinks</a></li>
          \t<li><a href=\"/menus\">Daily Happy Hour</a></li>
          </ul>
        </div>
\t\t\t\t<div class=\"contact\">
\t\t\t\t\t<div class=\"-address\">
\t\t\t\t\t\t<span>The Bluegrass</span>
\t\t\t\t\t\t<span>7415 Grandview Ave</span>
\t\t\t\t\t\t<span>Arvada, CO 80002</span>
\t\t\t\t\t\t<span>720-476-3950</span>
\t\t\t\t\t</div>
\t\t\t\t\t<div class=\"-social\">
            <a href=\"https://www.facebook.com/thebluegrasscoffeehouse/\" target=\"_blank\">
              <i class=\"fa fa-facebook\"></i>            
            </a>
            <a href=\"https://www.instagram.com/bluegrassloungearvada/\" target=\"_blank\">
              <i class=\"fa fa-instagram\"></i>
            </a>
\t\t\t\t\t</div>
\t\t\t\t</div>
\t\t\t</div>
      <div class=\"bottom\">The Bluegrass &copy; ";
        // line 98
        echo twig_date_format_filter($this->env, (isset($context["now"]) ? $context["now"] : null), "Y");
        echo "</div>
\t\t</div>
\t</footer>
  <script src=\"https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js\"></script>
  <script src=\"";
        // line 102
        echo $this->getAttribute((isset($context["recurme"]) ? $context["recurme"] : null), "js", array());
        echo "\"></script>
  <script src=\"";
        // line 103
        echo $this->getAttribute($this->getAttribute((isset($context["config"]) ? $context["config"] : null), "urls", array()), "templates", array());
        echo "scripts/main.js\"></script>
</body>
</html>
";
    }

    // line 42
    public function block_content($context, array $blocks = array())
    {
        // line 43
        echo "    ";
    }

    public function getTemplateName()
    {
        return "structure/chrome.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  196 => 43,  193 => 42,  185 => 103,  181 => 102,  174 => 98,  145 => 71,  132 => 69,  128 => 68,  102 => 44,  100 => 42,  91 => 35,  78 => 33,  74 => 32,  61 => 22,  57 => 21,  43 => 10,  39 => 9,  35 => 8,  31 => 7,  27 => 6,  20 => 1,);
    }
}
/* <!DOCTYPE html>*/
/* <html lang="en">*/
/* <head>*/
/* 	<meta http-equiv="content-type" content="text/html; charset=utf-8" />*/
/* 	<meta name="viewport" content="width=device-width, initial-scale=1" />*/
/* 	<title>The Bluegrass Lounge | {{ page.title }}</title>*/
/* 	<meta name="description" content="{{ view.summary }}" />*/
/*   <link rel="shortcut icon" type="image/x-icon" href="{{config.urls.templates}}images/favicon.ico" />*/
/*   <link rel="stylesheet" type="text/css" href="{{ recurme.css}}">*/
/* 	<link rel="stylesheet" type="text/css" href="{{config.urls.templates}}styles/main.css" />*/
/* 	<script type='text/javascript' src='https://maps.googleapis.com/maps/api/js?key=AIzaSyATHVvqqbz699klt8B_7SKEB2BkyfFd_IE'></script>*/
/*   <script src="https://use.fontawesome.com/bcb0ade4ba.js"></script>*/
/* </head>*/
/* <body class='has-sidebar'>*/
/* */
/* 	<!-- top navigation -->*/
/* 	<nav class='nav' role='navigation'>*/
/*     <div class="container">*/
/*       <div class="-row">*/
/* 				<a href="/">*/
/*           <img class="-logo" src="{{config.urls.templates}}images/home-nav-logo.png" alt="">*/
/*           <img class="-wordmark" src="{{config.urls.templates}}images/wordmark@2x.png" alt="">*/
/*         </a>*/
/*         <button class="hamburger hamburger--slider" type="button">*/
/*           <span class="hamburger-box">*/
/*             <span class="hamburger-inner"></span>*/
/*           </span>*/
/*         </button>*/
/*         <div class="-links">*/
/*           <ul>*/
/*             <li><a href="/">Home</a></li>*/
/*             {% for item in pages.get('/').children %}*/
/*               <li class="{{ item.id == page.rootParent.id ? 'current' : '' }}"><a href="{{item.url}}">{{item.title}}</a></li>*/
/*             {% endfor %}*/
/*           </ul>*/
/*         </div>*/
/*       </div>*/
/*     </div>*/
/*   </nav>*/
/* */
/* 	<main id='main'>*/
/*     {% block content %}*/
/*     {% endblock %}*/
/* */
/* 	</main>*/
/* */
/* 	<!-- footer -->*/
/* 	<footer class="footer" role="contentinfo">*/
/* 		<div class="container">*/
/* 			<div class="row">*/
/* 				<div class="hours">*/
/* 					<div class="-item">*/
/* 						<div class="-title">Sunday - Thursday</div>*/
/* 						<div class="-time">7AM to 10PM</div>*/
/* 					</div>*/
/* 					<div class="-item">*/
/* 						<div class="-title">Friday & Saturday</div>*/
/* 						<div class="-time">7AM to 12AM</div>*/
/* 					</div>*/
/*           <div class="-item">*/
/*             <div class="-title">Daily Happy Hour</div>*/
/*             <div class="-time">3PM to 6PM</div>*/
/*           </div>*/
/* 				</div>*/
/* 				<div class="links">*/
/*           <ul>*/
/*             <li><a href="/">Home</a></li>*/
/*             {% for item in pages.get('/').children %}*/
/*               <li class="{{ item.id == page.rootParent.id ? 'current' : '' }}"><a href="{{item.url}}">{{item.title}}</a></li>*/
/*             {% endfor %}*/
/*           </ul>*/
/*           </ul>*/
/*           <ul>*/
/*           	<li><a href="/menus">Coffee &amp; Tea</a></li>*/
/*           	<li><a href="/menus">Breakfast &amp; Sunday Brunch</a></li>*/
/*           	<li><a href="/menus"></a>Lunch &amp; Dinner</li>*/
/*           	<li><a href="/menus">Drinks</a></li>*/
/*           	<li><a href="/menus">Daily Happy Hour</a></li>*/
/*           </ul>*/
/*         </div>*/
/* 				<div class="contact">*/
/* 					<div class="-address">*/
/* 						<span>The Bluegrass</span>*/
/* 						<span>7415 Grandview Ave</span>*/
/* 						<span>Arvada, CO 80002</span>*/
/* 						<span>720-476-3950</span>*/
/* 					</div>*/
/* 					<div class="-social">*/
/*             <a href="https://www.facebook.com/thebluegrasscoffeehouse/" target="_blank">*/
/*               <i class="fa fa-facebook"></i>            */
/*             </a>*/
/*             <a href="https://www.instagram.com/bluegrassloungearvada/" target="_blank">*/
/*               <i class="fa fa-instagram"></i>*/
/*             </a>*/
/* 					</div>*/
/* 				</div>*/
/* 			</div>*/
/*       <div class="bottom">The Bluegrass &copy; {{now | date('Y')}}</div>*/
/* 		</div>*/
/* 	</footer>*/
/*   <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>*/
/*   <script src="{{recurme.js}}"></script>*/
/*   <script src="{{config.urls.templates}}scripts/main.js"></script>*/
/* </body>*/
/* </html>*/
/* */
