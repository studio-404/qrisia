<?php 
class _homenews
{
	public $data;

	public function index()
	{
		require_once("app/functions/string.php");
		require_once("app/functions/l.php");
		$l = new functions\l();
		$sting = new functions\string();
		
		$out = "";

		if(count($this->data)){
			$month = array("ge"=>array("Jan"=>"იან", "Feb"=>"თებ", "Mar"=>"მარ", "Apr"=>"აპრ", "May"=>"მაი", "Jun"=>"ივნ", "Jul"=>"ივლ", "Aug"=>"აგვ", "Sep"=>"სექ", "Oct"=>"ოქტ", "Nov"=>"ნოე", "Dec"=>"დეკ"), "en"=>array("Jan"=>"Jan", "Feb"=>"Feb", "Mar"=>"Mar", "Apr"=>"Apr", "May"=>"May", "Jun"=>"Jun", "Jul"=>"Jul", "Aug"=>"Aug", "Sep"=>"Sep", "Oct"=>"Oct", "Nov"=>"Nov", "Dec"=>"Dec"));
			
			foreach($this->data as $item) {
				$photos = new Database("photos",array(
					"method"=>"selectByParent", 
					"idx"=>(int)$item['idx'],  
					"lang"=>strip_output::index($item['lang']),  
					"type"=>strip_output::index($item['type'])
				));
				if($photos->getter()){
					$pic = $photos->getter();
					$image = sprintf(
						"%s%s/image/loadimage?f=%s%s&w=360&h=220",
						Config::WEBSITE,
						strip_output::index($_SESSION['LANG']),
						Config::WEBSITE_,
						strip_output::index($pic[0]['path'])
					);
				}else{
					$image = "/public/filemanager/noimage.png";
				}


				$str = str_replace(date("M", (int)$item['date']), $month[strip_output::index($_SESSION['LANG'])][date("M", (int)$item['date'])], date("M d, Y", (int)$item['date']));
				$title = strip_tags($item['title']);
				$titleUrl = str_replace(array(" ", "'", '"'), "-", $title);

				$out .= "<div class=\"view view-home-page-views view-id-home_page_views view-display-id-homepage_news view-dom-id-7a923cfb0241bb09452450d03836830d\">";
				$out .= "<div class=\"view-content\">";
				$out .= "<div class=\"uvatoday-wrapper\">";
				$out .= "<div class=\"views-row views-row-5 views-row-odd views-row-last\">";
				$out .= sprintf(
					"<a href=\"%s%s/%s/%s/%s\">",
					Config::WEBSITE,
					strip_output::index($_SESSION['LANG']),
					$item["type"],
					(int)$item['idx'],
					strip_output::index($titleUrl) 
				);
				$out .= "<div class=\"views-field views-field-field-news-title\">";
				$out .= "<div class=\"field-content\">";
				$out .= sprintf(
					"<div class=\"link-news-title\">%s</div>",
					$title
				);
				$out .= "<div class=\"link-news-image\">";
				$out .= sprintf(
					"<img src=\"%s\" alt=\"\" title=\"\" />",
					$image
				);
				$out .= "</div>";
				$out .= "</div>";
				$out .= "</div>";
				$out .= "<div class=\"views-field views-field-field-news-description\">";
				$out .= "<div class=\"field-content\">";
				$out .= $sting->cut(strip_tags($item['description']), 160);
				$out .= "</div>";
				$out .= "</div>";
				$out .= "<div class=\"views-field views-field-field-news-url\">";
				$out .= sprintf(
					"<div class=\"field-content\">%s</div>",
					$l->translate("more")
				);
				$out .= "</div>";
				$out .= "</a>";
				$out .= "</div>";
				$out .= "</div>";
				$out .= "</div>";
				$out .= "</div>";
				
			}

		}
		return $out;
	}
}