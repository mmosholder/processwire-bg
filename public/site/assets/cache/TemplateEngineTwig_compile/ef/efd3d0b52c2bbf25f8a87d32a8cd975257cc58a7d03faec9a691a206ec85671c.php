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
\t<title>";
        // line 6
        echo $this->getAttribute((isset($context["page"]) ? $context["page"] : null), "title", array());
        echo "</title>
\t<meta name=\"description\" content=\"";
        // line 7
        echo $this->getAttribute((isset($context["view"]) ? $context["view"] : null), "summary", array());
        echo "\" />
\t<link rel=\"stylesheet\" type=\"text/css\" href=\"";
        // line 8
        echo $this->getAttribute($this->getAttribute((isset($context["config"]) ? $context["config"] : null), "urls", array()), "templates", array());
        echo "styles/main.css\" />
\t<script type='text/javascript' src='https://maps.googleapis.com/maps/api/js?key=AIzaSyATHVvqqbz699klt8B_7SKEB2BkyfFd_IE'></script>
</head>
<body class='has-sidebar'>

\t<!-- top navigation -->
\t<nav class='nav' role='navigation'>
    <div class=\"container\">
      <div class=\"-row\">
\t\t\t\t<a href=\"/\">
          <img class=\"-logo\" src=\"";
        // line 18
        echo $this->getAttribute($this->getAttribute((isset($context["config"]) ? $context["config"] : null), "urls", array()), "templates", array());
        echo "images/home-nav-logo.png\" alt=\"\">
          <img class=\"-wordmark\" src=\"";
        // line 19
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
        // line 29
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute($this->getAttribute((isset($context["pages"]) ? $context["pages"] : null), "get", array(0 => "/"), "method"), "children", array()));
        foreach ($context['_seq'] as $context["_key"] => $context["page"]) {
            // line 30
            echo "              <li><a href=\"";
            echo $this->getAttribute($context["page"], "url", array());
            echo "\">";
            echo $this->getAttribute($context["page"], "title", array());
            echo "</a></li>
            ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['page'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 32
        echo "          </ul>
        </div>
      </div>
    </div>
  </nav>

\t<main id='main'>
    ";
        // line 39
        $this->displayBlock('content', $context, $blocks);
        // line 41
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
\t\t\t\t\t\t<div class=\"-title\">Friday &amp; Saturday</div>
\t\t\t\t\t\t<div class=\"-time\">7AM to 12AM</div>
\t\t\t\t\t</div>
\t\t\t\t</div>
\t\t\t\t<div class=\"links\">
\t\t\t\t\t<ul></ul>
\t\t\t\t</div>
\t\t\t\t<div class=\"contact\">
\t\t\t\t\t<div class=\"-address\">
\t\t\t\t\t\t<span>The Bluegrass</span>
\t\t\t\t\t\t<span>7415 Grandview Ave</span>
\t\t\t\t\t\t<span>Arvada, CO 80002</span>
\t\t\t\t\t\t<span>720-476-3950</span>
\t\t\t\t\t</div>
\t\t\t\t\t<div class=\"-social\">

\t\t\t\t\t</div>
\t\t\t\t</div>
\t\t\t</div>
\t\t</div>
\t</footer>
\t<script src=\"https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js\"></script>
  <script src=\"";
        // line 76
        echo $this->getAttribute($this->getAttribute((isset($context["config"]) ? $context["config"] : null), "urls", array()), "templates", array());
        echo "scripts/main.js\"></script>
</body>
</html>
";
    }

    // line 39
    public function block_content($context, array $blocks = array())
    {
        // line 40
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
        return array (  139 => 40,  136 => 39,  128 => 76,  91 => 41,  89 => 39,  80 => 32,  69 => 30,  65 => 29,  52 => 19,  48 => 18,  35 => 8,  31 => 7,  27 => 6,  20 => 1,);
    }
}
/* <!DOCTYPE html>*/
/* <html lang="en">*/
/* <head>*/
/* 	<meta http-equiv="content-type" content="text/html; charset=utf-8" />*/
/* 	<meta name="viewport" content="width=device-width, initial-scale=1" />*/
/* 	<title>{{ page.title }}</title>*/
/* 	<meta name="description" content="{{ view.summary }}" />*/
/* 	<link rel="stylesheet" type="text/css" href="{{config.urls.templates}}styles/main.css" />*/
/* 	<script type='text/javascript' src='https://maps.googleapis.com/maps/api/js?key=AIzaSyATHVvqqbz699klt8B_7SKEB2BkyfFd_IE'></script>*/
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
/*             {% for page in pages.get('/').children %}*/
/*               <li><a href="{{page.url}}">{{page.title}}</a></li>*/
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
/* 						<div class="-title">Friday &amp; Saturday</div>*/
/* 						<div class="-time">7AM to 12AM</div>*/
/* 					</div>*/
/* 				</div>*/
/* 				<div class="links">*/
/* 					<ul></ul>*/
/* 				</div>*/
/* 				<div class="contact">*/
/* 					<div class="-address">*/
/* 						<span>The Bluegrass</span>*/
/* 						<span>7415 Grandview Ave</span>*/
/* 						<span>Arvada, CO 80002</span>*/
/* 						<span>720-476-3950</span>*/
/* 					</div>*/
/* 					<div class="-social">*/
/* */
/* 					</div>*/
/* 				</div>*/
/* 			</div>*/
/* 		</div>*/
/* 	</footer>*/
/* 	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>*/
/*   <script src="{{config.urls.templates}}scripts/main.js"></script>*/
/* </body>*/
/* </html>*/
/* */
