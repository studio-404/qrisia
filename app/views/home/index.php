<?php 
require_once("app/functions/l.php"); 
require_once("app/functions/string.php"); 
require_once("app/functions/strip_output.php"); 
// require_once("app/functions/menu_data.php"); 
// $menu_data = new functions\menu_data(); 
$l = new functions\l(); 
$string = new functions\string(); 
echo $data['headerModule'];// assets
echo $data['headertop'];// assets

?>


    <div class="site-tabs"></div>
    
  <div class="l-main">
    <div class="l-content" role="main">
           <a id="main-content"></a>
          <div id="block-views-home-page-views-homepage-hero" class="block block--views block--views-home-page-views-homepage-hero">
          <div class="block__content">
          <div class="view view-home-page-views view-id-home_page_views view-display-id-homepage_hero view-dom-id-60e2506e5b9ff5b01b492f143e36f8d9">
              
          <div class="view-content">
            <div class="swiper-container">

              <div class="swiper-wrapper">
                <?php echo $data["slider"]["list"]; ?>
              </div>

              <div class="swiper-pagination"></div>
              <div class="swiper-scrollbar"></div>

            </div>
          </div>



<script>
window.onload = function () {
  var mySwiper = new Swiper ('.swiper-container', {
    autoplay: true,
    speed:3000,
    delay:5000,
    loop: true
  })
};
</script>
       
        </div>  
      </div>
    </div>



<div id="block-views-home-page-views-life-at-uva" class="block block--views block--views-home-page-views-life-at-uva">
  <div class="block__content">
    <div class="view view-home-page-views view-id-home_page_views view-display-id-life_at_uva view-dom-id-494921e69abf8c100993053806cf09d0">
      <div class="view-header">
        <div class="view-header-title">
          <div class="view-header-bg">
            <div class="view-header-text">
              <h3><?=$l->translate("specialists")?></h3>
            </div>
          </div>
        </div>
        <div class="view-header-give"><a href="/<?=$_SESSION["LANG"]?>/specialties"><?=$l->translate("more")?></a></div>
      </div>

      <div class="view-content">
        
        <?php 
        $selecteByCid = new Database("page", array(
          "method"=>"selecteByCid",
          "cid"=>111,
          "lang"=>$_SESSION["LANG"]
        ));
        $fetch = $selecteByCid->getter();
        $out = array();
        foreach ($fetch as $value) {
          $out[$value["idx"]] = $value;
        }
        ?>
        <div class="views-row views-row-1 views-row-odd views-row-first">
          <div class="life-at-uva-promo-textwrap">
            <div class="glance-news glance-square Blue bg-right">
              <div class="glance-bg">
                <img src="<?=Config::WEBSITE.$_SESSION["LANG"]?>/image/loadimage?f=<?=Config::WEBSITE_.$out[128]["photo"]?>&w=506&h=506" width="506" height="506" />
              </div>
              <a href="/<?=$_SESSION["LANG"]?>/tour-operator">
                <p><span><?=$out[128]["title"]?></span></p>
              </a>
            </div>
          </div>
        </div>
        
        <div class="views-row views-row-2 views-row-even">
          <div class="life-at-uva-promo-textwrap">
            <div class="glance-news glance-square Blue">
              <div class="glance-bg">
                <img src="<?=Config::WEBSITE.$_SESSION["LANG"]?>/image/loadimage?f=<?=Config::WEBSITE_.$out[129]["photo"]?>&w=506&h=506" width="506" height="506" />
              </div>
              <a href="/<?=$_SESSION["LANG"]?>/Interpreter">
                <p><span><?=$out[129]["title"]?></span></p>
              </a>
            </div>
          </div>
        </div>

        <div class="views-row views-row-3 views-row-odd">
          <div class="life-at-uva-promo-textwrap">
            <div class="glance-video glance-rectangle">
              <div class="glance-video-player video-container"></div>
              <a href="#">
                <div class="glance-bg">
                  <img src="<?=Config::WEBSITE.$_SESSION["LANG"]?>/image/loadimage?f=<?=Config::WEBSITE_.$out[119]["photo"]?>&w=530&h=260" width="530" />
                </div>
                <a href="/<?=$_SESSION["LANG"]?>/restaurant-maker">
                  <p><?=$out[119]["title"]?></p>
                </a>
              </a>
            </div>
          </div>
        </div>

        <div class="views-row views-row-4 views-row-even">
          <div class="life-at-uva-promo-textwrap">
          <div class="glance-news glance-rectangle Blue bg-left">
            <div class="glance-bg">
              <img src="<?=Config::WEBSITE.$_SESSION["LANG"]?>/image/loadimage?f=<?=Config::WEBSITE_.$out[121]["photo"]?>&w=530&h=260" width="530" />
            </div>
            <a href="/<?=$_SESSION["LANG"]?>/hotel-chair-maker">
              <p><span><?=$out[121]["title"]?></span></p>
            </a>
          </div>
          </div>
        </div>

        <div class="views-row views-row-5 views-row-odd">
          <div class="life-at-uva-promo-textwrap">
            <div class="glance-news glance-square Blue">
              <div class="glance-bg">
                <img src="<?=Config::WEBSITE.$_SESSION["LANG"]?>/image/loadimage?f=<?=Config::WEBSITE_.$out[130]["photo"]?>&w=506&h=506" width="506" height="506" />
              </div>
              <a href="/<?=$_SESSION["LANG"]?>/office-specialist">
                <p><span><?=$out[130]["title"]?></span></p>
              </a>
            </div>
          </div>
        </div>

      
        <div class="views-row views-row-5 views-row-last">
          <div class="life-at-uva-promo-textwrap">
            <div class="glance-news glance-square Blue bg-right">
              <div class="glance-bg">
                <img src="<?=Config::WEBSITE.$_SESSION["LANG"]?>/image/loadimage?f=<?=Config::WEBSITE_.$out[131]["photo"]?>&w=506&h=506" width="506" height="506" />
              </div>
              <a href="/<?=$_SESSION["LANG"]?>/tourism">
                <p><span><?=$out[131]["title"]?></span></p>
              </a>
            </div>
          </div>
        </div>

        
        

      </div>
    </div>  
  </div>
</div>






<div id="block-uva-news-uva-news-rss" class="block block--uva-news block--uva-news-uva-news-rss">
  <div class="block__content">
    <div class="uva-news-events-container">
      
      <div class="uva-news-events-block">
        
        <div class="header-wrapper">
          <div class="header-wrapper-bg">
            <a href="#" target="_blank">
              <h2><span><?=$l->translate("news")?></span></h2>
            </a>
          </div>
        </div> 

        <?=$data["news"]?>

        <div class="hp-morelink">
          <a href="/<?=$_SESSION["LANG"]?>/news"><?=$l->translate("allnews")?></a>
        </div> 

      </div>

      <div class="uva-news-events-block">
        
        <div class="header-wrapper">
          <div class="header-wrapper-bg">
            <a href="#" target="_blank">
              <h2><span><?=$l->translate("gallery")?></span></h2>
            </a>
          </div>
        </div> 
        
        <div class="g-gallery">
          
         <?php echo $data["gallery"]; ?>

         <script type="text/javascript">
          jQuery('.g-gallery').magnificPopup({
            delegate: 'a', 
            type: 'image',
            gallery:{
              enabled:true
            }
          });
         </script>

        </div>
        
        <div style="clear:both"></div>

        <div class="hp-morelink">
          <a href="/<?=$_SESSION["LANG"]?>/gallery"><?=$l->translate("more")?></a>
        </div>

      </div>

    </div>
  </div>
</div>

  </div>

            
    
</div>


<?=$data['footer']?>


</body>
</html>