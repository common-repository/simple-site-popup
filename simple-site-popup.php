<?php
/*
Plugin Name: Simple Site Popup
Plugin URI: http://thienhaxanh.info/plug-in-simple-site-popup/
Description: A simple way to add popup to your site. Demo and support, please follow: http://thienhaxanh.info/plug-in-simple-site-popup/
Version: 1.0
Author: thienhaxanh2405
Author URI: http://thienhaxanh.info
License: GPLv2 or later
*/

include_once( ABSPATH . 'wp-admin/includes/plugin.php' );
require dirname(__FILE__).'/admin.php';



// add header
function header_popup_data()
{
	echo '<script type="text/javascript" src="'.plugins_url( 'script.js' , __FILE__ ).'"></script>';
	echo '<link rel="stylesheet" href="'.plugins_url( 'style.css' , __FILE__ ).'">';
}

/** Display popup */
function Display_Simple_Site_Popup()
{
    $PopupImage = get_option('SimpleSitePopup_PopupImage');
    $PopupLinkTo = get_option('SimpleSitePopup_PopupLinkTo');
    
    //init size
    $PopupSize = get_option('SimpleSitePopup_Size');
    $PopupSize = trim($PopupSize);
    $Size = explode('/', $PopupSize);
    if(sizeof($Size) != 2) $Size = array(0 => 640, 1 => 480);
    
    //init close button
    $CloseButton = get_option('SimpleSitePopup_CloseButton');
    $CloseButton_Possition = get_option('SimpleSitePopup_CloseButton_Possition');
    $CloseButton_Possition = trim($CloseButton_Possition);
    $ClosePossition = explode('/', $CloseButton_Possition); 
?>
		<div id="background-popup"></div>
		<div id="main-popup">
		    <div id="popup-content">
                <a href="<?=$PopupLinkTo?>" title="Open Popup" ><img src="<?=$PopupImage?>" alt="Popup"></a>                          
            </div>        
            <div id="close-popup">
                <img  src="<?=$CloseButton?>" alt="close" />
            </div>
		</div>
		
		<style type="text/css">
		    #main-popup{
		        width: <?=trim($Size[0])?>px;
		        height: <?=trim($Size[1])?>px;
		    }
		    #close-popup{
		    <?php 
		          if(sizeof($ClosePossition) == 4){
    		          for($i = 0; $i <= 3; $i++){
    		              if($i == 0 && trim($ClosePossition[$i]) != '-') echo 'top:'.trim($ClosePossition[$i]).'px;';
                          if($i == 1 && trim($ClosePossition[$i]) != '-') echo 'right:'.trim($ClosePossition[$i]).'px;';
                          if($i == 2 && trim($ClosePossition[$i]) != '-') echo 'bottom:'.trim($ClosePossition[$i]).'px;';
                          if($i == 3 && trim($ClosePossition[$i]) != '-') echo 'left:'.trim($ClosePossition[$i]).'px;';
    		          }
                  }
		    ?>
		    }
		</style>
		
	<?php
} //end display simple site popup


/** Simple site pop up */
function simple_site_popup(){
    
    $EnablePopup = get_option('SimpleSitePopup_Enable');

    if($EnablePopup == 'ON'){
        $DisplayInHomepage = get_option('SimpleSitePopup_DisplayInHomepage');
        $DisplayInPostPage = get_option('SimpleSitePopup_DisplayInPostPage');
        
        
        // add action head
        add_action('wp_head','header_popup_data');
    
        if(is_home() || is_front_page()){
             
            if($DisplayInHomepage == 'ON') {              
                    add_action('wp_footer','Display_Simple_Site_Popup');          
            }
        } // end display in homepage 
        
        
        // display in post, page
        $DisplayInPostPage = trim($DisplayInPostPage);
        $PostsAndPages = explode(',', $DisplayInPostPage);
        foreach($PostsAndPages as $one){ 
            if(is_page($one) || is_single($one)) {
                Display_Simple_Site_Popup();
            }
        } // end display in post, page
    }//end if enable popup
        
}// end simple site popup

add_action('wp','simple_site_popup');

?>

