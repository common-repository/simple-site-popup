<?php
/** add action admin menu. */
add_action( 'admin_menu', 'popup_admin_menu' );
/** popup_admin_menu function */
function popup_admin_menu() {
    add_plugins_page('Simple Popup', 'Simple Popup', 'administrator', 'simple-popup-options', 'simple_popup_options' );
} //end truyencuoi admin menu

/** Admin POP UP OPTIONs */
function simple_popup_options(){
if(!$_POST){
    if(get_option('SimpleSitePopup_Enable')){
        $Enable = get_option('SimpleSitePopup_Enable');
        $DisplayInHomepage = get_option('SimpleSitePopup_DisplayInHomepage');   
        $DisplayInPostPage = get_option('SimpleSitePopup_DisplayInPostPage');    
        $Size = get_option('SimpleSitePopup_Size');   
        $PopupImage = get_option('SimpleSitePopup_PopupImage');     
        $PopupLinkTo = get_option('SimpleSitePopup_PopupLinkTo');            
        $CloseButton = get_option('SimpleSitePopup_CloseButton');    
        $CloseButton_Possition = get_option('SimpleSitePopup_CloseButton_Possition');    
    } else {
        $DisplayInPostPage = '1,2';    
        $Size = '640/480';   
        $PopupImage = plugins_url('images/popup.jpg', __FILE__);    
        $PopupLinkTo = get_bloginfo('url');   
        $CloseButton = plugins_url('images/close-icon.png',__FILE__);   
        $CloseButton_Possition = '-/5/5/-'; 
    }
  
?>
    <h2>Simple Site Popup Options</h2>
    <form action="" method="post">
    <div id="simple-popup-option">
        <ul class="menu">
            <li class="li-menu" id="li-general" style="background-color: #4A8BF5;color:#fff;">General</li>
            <li class="li-menu" id="li-aboutme">About Me</li>
        </ul>
        <div id="popup-general-option" class="div-option">
            <h3>General options</h3>
            <table border="0" cellpadding="1" cellspacing="1">
                <tr>
                    <td width="200">Enable Popup</td>
                    <td> 
                        On <input type="radio" name="EnablePopup" value="ON" <?php if($Enable == 'ON' || !$Enable) echo 'checked';?> /> 
                        Off <input type="radio" name="EnablePopup" value="OFF" <?php if($Enable == 'OFF') echo 'checked';?>/>
                    </td>
                </tr>
                <tr>
                    <td width="200">Where to display</td>
                    <td>
                        Homepage <input type="checkbox" name="DisplayInHomepage" value="ON" <?php if($DisplayInHomepage == 'ON' || !$DisplayInHomepage) echo 'checked';?> /><br />
                        In Posts, Pages <input name="DisplayInPostPage" type="text" size="28" placeholder="Post Id, Page Id,..." value="<?=$DisplayInPostPage?>" /><br />
                        <i>Post Id, Page Id, seperated by comma (,)</i>
                    </td>
                </tr>
                <tr>
                    <td>Size<br /><i>Width/Height px</i></td>
                    <td>
                        <input name="Size" type="text" size="40" placeholder="Widht/Height" value="<?=$Size?>"/>px
                    </td>
                </tr>
                <tr>
                    <td>Popup<br /><i>Image and link</i><br /></td>
                    <td>
                        <input name="PopupImage" type="text" size="40" placeholder="Link of popup image" value="<?=$PopupImage?>"/><br />
                        <input name="PopupLinkTo" type="text" size="40" placeholder="Link to somewhere" value="<?=$PopupLinkTo?>" /><br />
                        <i>If you customize popup, don't need to fill it, all here be not present</i>
                    </td>
                </tr>
                <tr>
                    <td>Close button</td>
                    <td>
                        <input name="CloseButton" type="text" size="40" placeholder="Link to image of close button" value="<?=$CloseButton?>"/><br />
                        <input name="CloseButton_Possition" type="text" size="40" placeholder="Top/Right/Bottom/Left" value="<?=$CloseButton_Possition?>" />px <br />
                        <i>If you don't set position, fill "-", eg: 5/6/-/- or 5/-/-/10 ...</i>
                    </td>
                </tr>
            </table>
        </div>
        
        <div id="aboutme" class="div-option">
            <h3>Thienhaxanh2405</h3>
            Follow me: <a href="http://twitter.com/thienhaxanh2405" title="My twitter">Twitter</a><br />
            Support more: <a href="http://thienhaxanh.info/plug-in-simple-site-popup/" title="support">In my site</a><br />
            In next version, you can modify popup's html code. I promise :) Wait for mine :) 
        </div>
        <div id="submit-popup">
            <input class="submit" type="submit" value="Update Popup" />
        </div>
    </form>            
    </div>
    
    
    <style type="text/css">
        #simple-popup-option{
            float:left; width:98%;
        }
        #simple-popup-option table{
            float:left;
            margin:10px 0 10px 0;
        }
        #simple-popup-option td{
            border-bottom: 1px dotted #000000;
        }
        #simple-popup-option .menu{
            float:left; width:90%;border-bottom:1px dotted #000;
            list-style:none;
            margin:0; padding:0;
        }
        #simple-popup-option .menu li{
            float:left;
            padding: 3px 5px; margin-right:10px;
            cursor:pointer;background-color:#F1F1F1;color:#434343;
        }

        
        #popup-general-option, #submit-popup, #aboutme{
            float:left;width:98%;margin: 5px 0;
        }

        #submit-popup {
            margin: 10px 0 0 50px;
        }
        input[type=text], textarea{
          -webkit-transition: all 0.30s ease-in-out;
          -moz-transition: all 0.30s ease-in-out;
          -o-transition: all 0.30s ease-in-out;
          outline: none;
          padding: 3px 0px 3px 3px;
          margin: 5px 1px 3px 0px;
          border: 1px solid #DDDDDD;
          border-radius:5px;
        }
        
        input[type=text]:focus, textarea:focus {
          box-shadow: 0 0 5px rgba(81, 203, 238, 1);
          padding: 3px 0px 3px 3px;
          margin: 5px 1px 3px 0px;
          border: 1px solid rgba(81, 203, 238, 1);
        }
        .submit{
            background-color:#4A8BF5;
            border:none; border-radius:3px;
            font-weight: bold;color:#fff;
            padding:7px;
        }
    </style>
    <script type="text/javascript">
        jQuery(document).ready(function(){
            jQuery('.div-option:gt(0)').hide();
            
            jQuery('.li-menu').click(function(){
                var id = jQuery(this).attr('id');
                if(id == 'li-general'){
                    jQuery('.div-option').hide();
                    jQuery('#popup-general-option').fadeIn(200);
                }
                if(id == 'li-aboutme'){
                    jQuery('.div-option').hide();
                    jQuery('#aboutme').fadeIn(200);
                }
                jQuery('.li-menu').css({'background-color':'#F1F1F1','color':'#434343'});
                jQuery(this).css({'background-color':'#4A8BF5','color':'#fff'});
            }); //end li menu click
            
            
        });//end document ready
    </script>
<?php
}// end if !POST
    if($_POST){
        echo ($_POST['CustomizeHtml']);
        
        //update popup enable
        if(!get_option('SimpleSitePopup_Enable')) add_option('SimpleSitePopup_Enable',$_POST['EnablePopup'],'','yes'); 
        else update_option('SimpleSitePopup_Enable',$_POST['EnablePopup']);
        
        // update where to display
        if(!get_option('SimpleSitePopup_DisplayInHomepage')) add_option('SimpleSitePopup_DisplayInHomepage',$_POST['DisplayInHomepage'],'','yes'); 
        else update_option('SimpleSitePopup_DisplayInHomepage',$_POST['DisplayInHomepage']);
        
        if(!get_option('SimpleSitePopup_DisplayInPostPage')) add_option('SimpleSitePopup_DisplayInPostPage',$_POST['DisplayInPostPage'],'','yes'); 
        else update_option('SimpleSitePopup_DisplayInPostPage',$_POST['DisplayInPostPage']);
        
        // update popup size
        if(!get_option('SimpleSitePopup_Size')) add_option('SimpleSitePopup_Size',$_POST['Size'],'','yes'); 
        else update_option('SimpleSitePopup_Size',$_POST['Size']);
        
        //update popup image
        if(!get_option('SimpleSitePopup_PopupImage')) add_option('SimpleSitePopup_PopupImage',$_POST['PopupImage'],'','yes'); 
        else update_option('SimpleSitePopup_PopupImage',$_POST['PopupImage']);
        
        if(!get_option('SimpleSitePopup_PopupLinkTo')) add_option('SimpleSitePopup_PopupLinkTo',$_POST['PopupLinkTo'],'','yes'); 
        else update_option('SimpleSitePopup_PopupLinkTo',$_POST['PopupLinkTo']);
        
        //update close button
        if(!get_option('SimpleSitePopup_CloseButton')) add_option('SimpleSitePopup_CloseButton',$_POST['CloseButton'],'','yes'); 
        else update_option('SimpleSitePopup_CloseButton',$_POST['CloseButton']);
        
        if(!get_option('SimpleSitePopup_CloseButton_Possition')) add_option('SimpleSitePopup_CloseButton_Possition',$_POST['CloseButton_Possition'],'','yes'); 
        else update_option('SimpleSitePopup_CloseButton_Possition',$_POST['CloseButton_Possition']);
        
        //update enable customize
        if(!get_option('SimpleSitePopup_CustomizeEnable')) add_option('SimpleSitePopup_CustomizeEnable',$_POST['CustomizeEnable'],'','yes'); 
        else update_option('SimpleSitePopup_CustomizeEnable',$_POST['CustomizeEnable']);
        
        echo '<h3 style="color:green;">Updated!</h3>';
    }
}// end admin pop up options


?>