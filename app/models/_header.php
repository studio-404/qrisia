<?php 
class _header
{
	public $public;
	public $lang;
	public $pagedata;
	public $imageSrc;
	public $product;

	public function index(){ 

		$getter = $this->pagedata->getter(); 

		if(isset($getter['title'])){
			$title = strip_tags($getter['title']);
			$description = strip_tags($getter['description']);
		}else if(isset($getter[0]['title'])){
			$title = strip_tags($getter[0]['title']); 
			$description = strip_tags($getter[0]['description']);
		}else{
			$title = "";
			$description = "";
		}

		if(isset($this->product)){
			$title = strip_tags($this->product['title']);
			$description = strip_tags($this->product['short_description']);
		}

		$actual_link = "https://".$_SERVER["HTTP_HOST"].htmlentities($_SERVER["REQUEST_URI"]);

		$out = "<!DOCTYPE html>\n";
		$out .= "<!--[if IEMobile 7]><html class=\"no-js ie iem7\" lang=\"en\" dir=\"ltr\"><![endif]-->\n";
		$out .= "<!--[if lte IE 6]><html class=\"no-js ie lt-ie9 lt-ie8 lt-ie7\" lang=\"en\" dir=\"ltr\"><![endif]-->\n";
		$out .= "<!--[if (IE 7)&(!IEMobile)]><html class=\"no-js ie lt-ie9 lt-ie8\" lang=\"en\" dir=\"ltr\"><![endif]-->\n";
		$out .= "<!--[if IE 8]><html class=\"no-js ie lt-ie9\" lang=\"en\" dir=\"ltr\"><![endif]-->\n";
		$out .= "<!--[if (gte IE 9)|(gt IEMobile 7)]><html class=\"no-js ie\" lang=\"en\" dir=\"ltr\" prefix=\"fb: http://ogp.me/ns/fb# og: http://ogp.me/ns# article: http://ogp.me/ns/article# book: http://ogp.me/ns/book# profile: http://ogp.me/ns/profile# video: http://ogp.me/ns/video# product: http://ogp.me/ns/product#\"><![endif]-->\n";
		$out .= "<!--[if !IE]><!--><html class=\"no-js\" lang=\"en\" dir=\"ltr\" prefix=\"fb: http://ogp.me/ns/fb# og: http://ogp.me/ns# article: http://ogp.me/ns/article# book: http://ogp.me/ns/book# profile: http://ogp.me/ns/profile# video: http://ogp.me/ns/video# product: http://ogp.me/ns/product#\"><!--<![endif]-->\n";
		$out .= "<head>\n";
		$out .= "<!-- Global site tag (gtag.js) - Google Analytics -->
		<script async src=\"https://www.googletagmanager.com/gtag/js?id=UA-42432523-3\"></script>
		<script>
		window.dataLayer = window.dataLayer || [];
		function gtag(){dataLayer.push(arguments);}
		gtag('js', new Date());

		gtag('config', 'UA-42432523-3');
		</script>\n";
		$out .= "<meta charset=\"utf-8\" />\n";
		$out .= sprintf("<base url=\"%s\">\n", Config::WEBSITE);
		$out .= "<link rel=\"profile\" href=\"http://www.w3.org/1999/xhtml/vocab\" />\n";
		
		$out .= sprintf(
			"<link rel=\"alternate\" type=\"application/rss+xml\" title=\"\" href=\"%srss.php?v=%s\" />\n",
			Config::WEBSITE,
			Config::WEBSITE_VERSION
		);

		$out .= "<meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0\" />\n";
		

		$keywords = str_replace(" ", ",", strip_tags($description));
		$out .= sprintf(
			"<meta name=\"keywords\" content=\"%s\" />\n", 
			htmlentities($keywords)
		);
		
		if(isset($this->imageSrc)){
			$image = $this->imageSrc;
		}else{
			$image = $this->public."img/share2.jpg";
		}
		$out .= sprintf(
			"<meta property=\"og:image\" content=\"%s\" />\n", 
			$image
		);
		$out .= sprintf(
			"<link rel=\"image_src\" type=\"image/jpeg\" href=\"%s\" />\n", 
			$image
		);
		
		$out .= sprintf(
			"<meta property=\"fb:app_id\" content=\"%s\" />\n",
			Config::FB_APP
		);
		$out .= sprintf(
			"<meta property=\"og:title\" content=\"%s\" />\n",
			$title
		);
		$out .= "<meta property=\"og:image:width\" content=\"600\" />\n";
		$out .= "<meta property=\"og:image:height\" content=\"315\" />\n";
		$out .= sprintf("<meta property=\"og:site_name\" content=\"%s\" />\n", Config::NAME);
		$out .= "<meta property=\"og:description\" content=\"".htmlentities($description)."\"/>\n";


		$out .= sprintf("<meta property=\"og:site_name\" content=\"%s\" />\n", Config::NAME);
		$out .= "<meta property=\"og:type\" content=\"website\" />\n";
		$out .= sprintf("<meta property=\"og:url\" content=\"%s\" />\n", $actual_link);

		$out .= sprintf("<link rel=\"shortcut icon\" href=\"%spublic/images/icons/favicon.png?v=%s\" type=\"image/ico\" />\n", Config::WEBSITE, Config::WEBSITE_VERSION);

		$out .= sprintf("<title>%s</title>\n", $title);

		$out .= sprintf("<link type=\"text/css\" rel=\"stylesheet\" href=\"%spublic/css/web/style1.css?v=%s\" media=\"all\" />\n", Config::WEBSITE, Config::WEBSITE_VERSION);

		$out .= sprintf("<link type=\"text/css\" rel=\"stylesheet\" href=\"%spublic/css/web/style2.css?v=%s\" media=\"all\" />\n", Config::WEBSITE, Config::WEBSITE_VERSION);

		$out .= sprintf("<link type=\"text/css\" rel=\"stylesheet\" href=\"%spublic/css/web/style3.css?v=%s\" media=\"all\" />\n", Config::WEBSITE, Config::WEBSITE_VERSION);


		$out .= sprintf("<link type=\"text/css\" rel=\"stylesheet\" href=\"%spublic/css/web/magnific-popup.css?v=%s\" media=\"all\" />\n", Config::WEBSITE, Config::WEBSITE_VERSION);


		if(isset($_SESSION['LANG']) && $_SESSION['LANG']=="ge"){
			$out .= sprintf("<link type=\"text/css\" rel=\"stylesheet\" href=\"%spublic/css/web/ge.css?v=%s\" media=\"all\" />\n", Config::WEBSITE, Config::WEBSITE_VERSION);
		}
		$out .= sprintf("<!--[if lte IE 8]>\n
				<link type=\"text/css\" rel=\"stylesheet\" href=\"%spublic/css/web/ie8.css?v=%s\" media=\"all\" />\n
				<![endif]-->\n", Config::WEBSITE, Config::WEBSITE_VERSION);

		$out .= sprintf(
			"<script src=\"%spublic/js/web/script.js?v=%s\"></script>\n",
			Config::WEBSITE, 
			Config::WEBSITE_VERSION
		);
		$out .= "<script>document.createElement( \"picture\" );</script>\n";

		$out .= sprintf(
			"<script src=\"%spublic/js/web/script3.js?v=%s\"></script>\n",
			Config::WEBSITE, 
			Config::WEBSITE_VERSION
		);
		
		$out .= sprintf(
			"<script src=\"%spublic/js/web/script4.js?v=%s\"></script>\n",
			Config::WEBSITE, 
			Config::WEBSITE_VERSION
		);
		$out .= sprintf(
			"<script src=\"%spublic/js/web/script5.js?v=%s\"></script>\n",
			Config::WEBSITE, 
			Config::WEBSITE_VERSION
		);

		$out .= "<script>try{Typekit.load();}catch(e){}</script>\n";

		$out .= sprintf(
			"<script src=\"%spublic/js/web/script6.js?v=%s\"></script>\n",
			Config::WEBSITE, 
			Config::WEBSITE_VERSION
		);

		$out .= sprintf(
			"<script src=\"%spublic/js/web/script7.js?v=%s\"></script>\n",
			Config::WEBSITE, 
			Config::WEBSITE_VERSION
		);

		$out .= sprintf(
			"<script src=\"%spublic/js/web/jquery.magnific-popup.js?v=%s\"></script>\n",
			Config::WEBSITE, 
			Config::WEBSITE_VERSION
		);

		$out .= sprintf(
			"<script src=\"%spublic/js/web/main.js?v=%s\"></script>\n",
			Config::WEBSITE, 
			Config::WEBSITE_VERSION
		);

		$out .= "<script>jQuery.extend(Drupal.settings, {\"basePath\":\"\/\",\"pathPrefix\":\"\",\"jcaption\":{\"jcaption_selectors\":[\".node.node--full .field--type-text-long img\",\".node.node--full .field--type-text-with-summary img\"],\"jcaption_alt_title\":\"title\",\"jcaption_requireText\":0,\"jcaption_copyStyle\":0,\"jcaption_removeStyle\":1,\"jcaption_removeClass\":1,\"jcaption_removeAlign\":1,\"jcaption_copyAlignmentToClass\":1,\"jcaption_copyFloatToClass\":1,\"jcaption_copyClassToClass\":1,\"jcaption_autoWidth\":1,\"jcaption_keepLink\":0,\"jcaption_styleMarkup\":\"\",\"jcaption_animate\":0,\"jcaption_showDuration\":\"200\",\"jcaption_hideDuration\":\"200\"},\"googleanalytics\":{\"trackOutbound\":1,\"trackMailto\":1,\"trackDownload\":1,\"trackDownloadExtensions\":\"7z|aac|arc|arj|asf|asx|avi|bin|csv|doc(x|m)?|dot(x|m)?|exe|flv|gif|gz|gzip|hqx|jar|jpe?g|js|mp(2|3|4|e?g)|mov(ie)?|msi|msp|pdf|phps|png|ppt(x|m)?|pot(x|m)?|pps(x|m)?|ppam|sld(x|m)?|thmx|qtm?|ra(m|r)?|sea|sit|tar|tgz|torrent|txt|wav|wma|wmv|wpd|xls(x|m|b)?|xlt(x|m)|xlam|xml|z|zip\"},\"urlIsAjaxTrusted\":{\"\/\":true}});</script>\n";
		$out .= "</head>";
		$out .= "<body class=\"html front not-logged-in page-node\">";
		// $out .= "<div style=\"margin:0; padding:0 5px; width:400px; display:inline-block; background-color:#fff; color:#555; text-align:center; font-size: 18px; position:absolute; top:0px; left: calc(50% - 200px); z-index:999999; font-family: 'BPGGlaxo';\">ვებ გვერდი მუშაობს სატესტო რეჯიმში !</div>";
		
		
		return $out;
	}
}