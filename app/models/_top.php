<?php 
class _top
{
	public  $data;

	public function index()
	{
		require_once("app/functions/l.php"); 
		require_once("app/functions/strip_output.php"); 
		require_once("app/functions/language_output_name.php"); 
		require_once("app/functions/request.php"); 

		$word = "";
		if(functions\request::index("GET","w")){
			$word = strip_tags(functions\request::index("GET","w"));
			$word = str_replace(
				array("-", "%20", "'", '"'),
				array(" ", " ", "", ""),
				$word
			); 
		}

		$language_output_name = new functions\language_output_name();
		$outputName = $language_output_name->index();

		$l = new functions\l();


		$out = "<a href=\"#main-content\" class=\"element-invisible element-focusable\">&nbsp;</a>\n";
		$out .= "<div id=\"wrapper\">\n";
		$out .= "<div class=\"l-page\">\n";
		$out .= "<header class=\"header-main\" role=\"banner\">\n";
		$out .= "<div class=\"row row-branding\">\n";
		$out .= "<div class=\"l-branding\">\n";
		$out .= "<h2 class=\"site-name\">\n";
		$out .= "<a id=\"site-name\" href=\"/\" title=\"Home\" rel=\"home\"><span>&nbsp;</span></a>\n";
		$out .= "</h2>\n";
		
		// $out .= "<nav id=\"menu-toolbar-header\">\n";
		// $out .= "<ul class=\"links\">\n";

		// $actual_link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]"; 

		// $search = "/".$_SESSION["LANG"]."/";
		// $ge = (!isset($_SESSION["URL"][1])) ? "/ge" : str_replace($search, "/ge/", $actual_link);
		// $en = (!isset($_SESSION["URL"][1])) ? "/en" : str_replace($search, "/en/", $actual_link);
		// $de = (!isset($_SESSION["URL"][1])) ? "/de" : str_replace($search, "/de/", $actual_link);

		// $out .= "<li class=\"menu-519 first\">\n";
		// $out .= sprintf(
		// 	"<a href=\"%s\" class=\"BPGGlaxo\">ქართული</a>\n",
		// 	$ge
		// );
		// $out .= "</li>\n";

		// $out .= "<li class=\"menu-520\">\n";
		// $out .= sprintf(
		// 	"<a href=\"%s\">English</a>\n",
		// 	$en
		// );
		// $out .= "</li>\n";

		// $out .= "<li class=\"menu-520 last\">\n";
		// $out .= sprintf(
		// 	"<a href=\"%s\">Deutsch</a>\n",
		// 	$de
		// );
		// $out .= "</li>\n";
		

		// $out .= "</ul>\n";
		// $out .= "</nav>\n";

		$out .= "<div class=\"utility\">\n";
		$out .= "<div class=\"l-region l-region--branding\">\n";
		$out .= "<div class=\"search-wrapper\">\n";
		$out .= "<span id=\"test\"></span>\n";
		$out .= "<div id=\"block-search-form\" role=\"search\" class=\"block block--search block--search-form\">\n";
		$out .= "<div class=\"block__content\">\n";
		
		$out .= sprintf(
			"<form class=\"search-block-form\" action=\"/%s/search\" method=\"get\" id=\"search-block-form\" accept-charset=\"UTF-8\">\n",
			$_SESSION["LANG"]
		);
		$out .= "<div>\n";
		$out .= "<div class=\"container-inline\">\n";
		$out .= "<h2 class=\"element-invisible\">&nbsp;</h2>\n";
		$out .= "<div class=\"form-item form-type-textfield form-item-search-block-form\">\n";
		$out .= "<label class=\"element-invisible\" for=\"edit-search-block-form--2\">ძიება </label>\n";
		$out .= sprintf(
			"<input placeholder=\"%s\" tabindex=\"-1\" type=\"text\" id=\"edit-search-block-form--2\" name=\"w\" value=\"\" size=\"15\" maxlength=\"128\" class=\"form-text\" autocomplete=\"off\" />\n",
			$l->translate("keyword")
		);
		$out .= "</div>\n";
		$out .= "<div class=\"form-actions form-wrapper\" id=\"edit-actions\">\n";
		$out .= "<input tabindex=\"-1\" type=\"button\" id=\"edit-submit\" name=\"op\" value=\"ძებნა\" class=\"form-submit\" />\n";
		$out .= "</div>\n";
		$out .= "<input type=\"hidden\" name=\"form_build_id\" value=\"form-Vst0aM54cBaF3F96pc3us4vSoVs0hD2FZpFNoVlSTG8\" />\n";
		$out .= "<input type=\"hidden\" name=\"form_id\" value=\"search_block_form\" />\n";
		$out .= "</div>\n";
		$out .= "</div>\n";
		$out .= "</form>\n";

		$out .= "</div>\n";
		$out .= "<div class=\"search-close-wrapper\"><a href=\"#search-close\" class=\"btn-search-close\">Close</a></div>\n";
		$out .= "</div>\n";
		$out .= "</div>\n";

		$out .= "</div>\n";
		$out .= "</div>\n";
		$out .= "<div class=\"btn-menu-mobile\" tabindex=\"0\"><span>&nbsp;</span></div>\n";
		$out .= "<div class=\"btn-search-mobile\" tabindex=\"0\" role=\"button\" aria-controls=\"block-search-api-page-site-search\" aria-expanded=\"false\"><span></span></div>\n";
		$out .= "</div>\n";
		$out .= "</div>\n";
		$out .= "<form action=\"\" method=\"post\">\n";
		$out .= sprintf(
			"<input type=\"hidden\" class=\"lang\" value=\"%s\"/>\n",
			$_SESSION["LANG"]
		);
		$out .= "</form>\n";
		
		$out .= "<div class=\"row-navigation\">\n";
		$out .= "<div class=\"l-region l-region--navigation\">\n";
		$out .= "<nav id=\"block-system-main-menu\" role=\"navigation\" class=\"block block--system block--menu block--system-main-menu\">\n";
		$out .= "<h2 class=\"block__title\">Main menu</h2>\n";

		/* ul li */
		$out .= $this->data["navigationModule"];

		$out .= "</nav>\n";
		$out .= "</div>\n";
		$out .= "</div>\n";
		$out .= "\n";
		$out .= "</header>\n";

		
		return $out;
	}
}