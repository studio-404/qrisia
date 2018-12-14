<?php 
class _navigation
{
	public $data;
	public $footerNavigation = false;

	public function index(){
		require_once("app/functions/strip_output.php");

		if($this->footerNavigation){
			$out = "<ul class=\"menu\">\n";
			foreach($this->data as $value) {
	        	
				if(isset($value['redirect']) && $value['redirect']!=""){
					$out .= sprintf(
						"<li class=\"leaf\"><a href=\"%s\"><span>%s</span></a>\n",
						$value['redirect'], 
						strip_output::index($value['title'])
					);
				}else{
					$out .= sprintf(
						"<li class=\"leaf\"><a href=\"%s%s/%s\"><span>%s</span></a></li>\n",
						Config::WEBSITE,
						strip_output::index($_SESSION['LANG']),
						strip_output::index($value['slug']),
						strip_output::index($value['title'])
					);
				}
	    	}
	        $out .= "</ul>\n";
	        return $out;
		}

		$out = "";
		$out .= "<ul class=\"menu\">\n";

		if(count($this->data)){
			$topx = 1;
			
			foreach($this->data as $value) {
				$first = ($topx==1) ? " first" : "";
				$subNavigation = new Database('page', array(
					"method"=>"select", 
					"cid"=>(int)$value['idx'], 
					"nav_type"=>0, 
					"lang"=>strip_output::index($value['lang']), 
					"status"=>0
				));
				
				if($subNavigation->getter()){				
					if(isset($value['redirect']) && $value['redirect']!=""){
						$out .= sprintf(
							"<li class=\"expanded%s\">\n<a href=\"%s\"><span>%s</span></a>\n",
							$first,
							$value['redirect'], 
							strip_output::index($value['title'])
						);
					}else{
						$out .= sprintf(
							"<li class=\"expanded%s\">\n<a href=\"%s%s/%s\"><span>%s</span></a>\n",
							$first,
							Config::WEBSITE,
							strip_output::index($_SESSION['LANG']),
							$value['slug'],
							strip_output::index($value['title'])
						);
					}

					$out .= "<ul class=\"menu\">\n";
					$subx = 1;
					foreach ($subNavigation->getter() as $val) {
						$first = ($subx==1) ? " first" : "";
						if(isset($val['redirect']) && $val['redirect']!=""){
							$out .= sprintf(
								"<li class=\"leaf%s\"><a href=\"%s\"><span>%s</span></a></li>\n",
								$first,
								$val['redirect'], 
								strip_output::index($val['title'])  
							);	
						}else{
							$out .= sprintf(
								"<li class=\"leaf%s\"><a href=\"%s%s/%s\"><span>%s</span></a></li>\n",
								$first,
								Config::WEBSITE,
								strip_output::index($_SESSION['LANG']),
								$val['slug'], 
								strip_output::index($val['title'])  
							);	
						}
						$subx++;
					}
					$out .= "</ul>\n";
					$out .= "</li>\n";					
				}else{					
					if(isset($value['redirect']) && $value['redirect']!=""){
						$out .= sprintf(
							"<li class=\"leaf\"><a href=\"%s\"><span>%s</span></a></li>\n",
							strip_output::index($value['redirect']),
							strip_output::index($value['title'])
						);
					}else{
						$out .= sprintf(
							"<li class=\"leaf\"><a href=\"%s%s/%s\"><span>%s</span></a></li>\n",
							Config::WEBSITE,
							strip_output::index($_SESSION['LANG']),
							strip_output::index($value['slug']),
							strip_output::index($value['title'])
						);	
					}
					$topx++;
				}				
			}				
		}			
		$out .= "</ul>\n";
		
		return $out;
	}
}