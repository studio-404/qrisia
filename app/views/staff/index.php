<?php 
require_once("app/functions/l.php"); 
require_once("app/functions/string.php"); 
require_once("app/functions/strip_output.php"); 
require_once("app/functions/pagination.php");
require_once("app/functions/menu_data.php"); 
require_once("app/functions/breadcrups.php"); 
$menu_data = new functions\menu_data(); 
$l = new functions\l(); 
$pagination = new functions\pagination();
$string = new functions\string(); 
echo $data['headerModule'];// assets

?>
<!-- Main Container -->
    <div class="main-container">
        <?php 
        echo $data['headertop']; // navigation &...
        ?>

        <!-- Title Section Start -->
        <div class="title-section module">
            <div class="row">
        
                <div class="small-12 columns">
                    <h1><?=$data['pageData']['title']?></h1>
                </div><!-- Top Row /-->
        
                <div class="small-12 columns">
                    <?php 
                    $breadcrups = new functions\breadcrups();
                    echo $breadcrups->index();
                    ?>
                </div><!-- Bottom Row /-->
                
            </div><!-- Row /-->
        </div>
        
        <!-- Title Section End -->   

        <div class="content-section module blog-page">
            <div class="row">
                <div class="medium-9 small-12 columns posts-wrap">
                    <?php 
                            if(empty($data['staffId'])){
                                echo "<div class=\"row\">";
                                echo $data['staff']['html'];
                                echo '</div>';
                                echo "<div style=\"clear:both\"></div>";
                                echo $pagination->marneuli_pagination($data['staff']['count'], Config::NEWS_PER_PAGE);
                            }else{
                                echo "<h2 class=\"BPGNinoMtavruli\">".$data['staff_inside']['title']."</h2>";

                                $photos = new Database("photos",array(
                                    "method"=>"selectByParent", 
                                    "idx"=>(int)$data['staff_inside']['idx'],  
                                    "lang"=>strip_output::index($data['staff_inside']['lang']),  
                                    "type"=>strip_output::index($data['staff_inside']['type'])
                                ));
                                if($photos->getter()){
                                    $pic = $photos->getter();
                                    $image = sprintf(
                                        "%s%s/image/loadimage?f=%s%s&w=750&h=280",
                                        Config::WEBSITE,
                                        strip_output::index($_SESSION['LANG']),
                                        Config::WEBSITE_,
                                        strip_output::index($pic[0]['path'])
                                    );
                                    ?>
                                    <div class="event-thumb">
                                        <img src="<?=$image?>" width="100%" alt="Something0" class="thumbnail">
                                    </div><!-- Course Thumb /-->
                                    <?php
                                }

                                ?>
                                <div class="event-content BPGGlaxo" style="word-wrap: break-word;">
                                <?php 
                                $text = preg_replace_callback(
                                    "/\[https\:\/\/\w+\.youtube\.com\/watch\?v=(\w+|\w+-\w+)\]/",
                                    function($metches){
                                        $iframe = "<iframe width=\"100%\" height=\"415\" src=\"https://www.youtube.com/embed/".$metches[1]."\" frameborder=\"0\" allow=\"autoplay; encrypted-media\" allowfullscreen></iframe>";
                                        return $iframe;
                                    },
                                    strip_tags($data['staff_inside']['description'], "<h2><img><p><a><ul><li><br><table><tr><td><strong>")
                                );
                                echo $text;
                                ?>
                                </div><!-- Course content /-->
                                <?php
                            }
                        ?>                        
                </div><!-- Posts wrap ends /-->
                
                <div class="medium-3 small-12 columns sidebar">
                    
                    <div class="widget">
                        <h2 class="BPGNinoMtavruli"><?=$l->translate("usefulllinks")?></h2>
                        <ol class="menu vertical">
                            <?php 
                            if(count($data["left_usefull"]))
                            {
                                foreach ($data["left_usefull"] as $v):
                                ?>
                                <li>
                                    <?php 
                                    echo sprintf(
                                        "<a href=\"%s\" class=\"BPGGlaxo\">%s</a>", 
                                        $v["url"],
                                        $v['title']
                                    );
                                    ?>
                                </li>
                                <?php
                                endforeach;
                            }
                            ?>
                        </ol>
                    </div><!-- widget ends /-->
                
                                      
                </div><!-- right bar ends here /-->                
            </div><!-- Row Ends /-->
                        
        </div>   
        
        <!-- Footer -->
        <?=$data['footer_top']?>
        <!-- Footer Ends here /-->
        
    </div>
    <!-- Main Container /-->


<?=$data['footer']?>


</body>
</html>