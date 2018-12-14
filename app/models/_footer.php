<?php 
class _footer
{
	public $data;

	public function index()
	{
		//contactdetails
		require_once("app/functions/l.php");
		require_once("app/functions/strip_output.php");  
		require_once("app/functions/string.php");
		require_once("app/functions/request.php"); 

		$l = new functions\l(); 
		$out = "";

		$out .= "<footer role=\"contentinfo\">\n";
		$out .= "<div class=\"container-pre-footer\">\n";
		$out .= "<div class=\"l-region l-region--pre-footer\">\n";
		$out .= "<div id=\"block-uva-blocks-uva-footer\" class=\"block block--uva-blocks block--uva-blocks-uva-footer\">\n";
		$out .= "<div class=\"block__content\">\n";
		$out .= "<div id=\"uva_footer\">\n";
		$out .= "<a href=\"/\" id=\"uva_logo\"><span>&nbsp;</span></a>\n";
		$out .= "<div id=\"uva_social_links\">\n";
		
		$out .= "<ul id=\"aetni-social\">\n";
		
		foreach ($this->data["socialnetworks"] as $value):
		$out .= sprintf(
			"<li id=\"%s\" class=\"social-icons-aetni-facebook-gry\">\n",
			strip_tags($value["classname"])
		);
		$out .= sprintf(
			"<a class=\"social\" href=\"%s\" target=\"_blank\">\n",
			strip_tags($value["url"])
		);
		$out .= sprintf(
			"<span class=\"icon facebook\">%s</span>\n",
			strip_tags($value["title"])
		);
		$out .= "</a>\n";
		$out .= "</li>\n";
		endforeach;

		$out .= "</ul>\n";

		$out .= "</div>\n";
		$out .= "</div>\n";
		$out .= "</div>\n";
		$out .= "</div>\n";
		$out .= "</div>\n";
		$out .= "</div>\n";

		$out .= "<div class=\"container-footer\">\n";
		$out .= "<div class=\"l-region l-region--footer\">\n";
		
		

		$out .= "<nav id=\"block-menu-menu-footer-utilities\" role=\"navigation\" class=\"block block--menu block--menu-menu-footer-utilities\">\n";
		$out .= "<h2 class=\"block__title\">Footer</h2>\n";
		$out .= $this->data["footer_navigation"];
		$out .= "</nav>\n";


		$out .= "<div id=\"block-uva-blocks-uva-copyright\" class=\"block block--uva-blocks block--uva-blocks-uva-copyright\">\n";
		$out .= "<div class=\"block__content\">\n";
		$out .= "<p><a href=\"http://ww.404.ge\" target=\"_blank\">&copy; 2018 Developed by Studio 404</a></p>\n";
		$out .= "</div>\n";
		$out .= "</div>\n";
		$out .= "</div>\n";
		$out .= "</div>\n";
		$out .= "</footer>\n";
		$out .= "</div>\n";
		$out .= "</div>\n";


		return $out;
	}
}