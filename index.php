<?php
/*
  Plugin Name: Upload Status
  Plugin URI: http://www.osclass.org/
  Description: This plugin shows a status bar giving the user visual feedback that it is processing.
  Version: 1.0
  Author: JChapman
  Author URI: http://forums.osclass.org/index.php?action=profile;u=1728
  Author Email: siouxfallsrummages@gmail.com
  Short Name: promo
  Plugin update URI: http://www.osclass.org/
*/
 
    function uploadStatus_install() {
       
    }
    
    function uploadStatus_unistall() {
       
    }
    
    function uploadStatus_header() {
       if(osc_is_publish_page() || osc_is_edit_page() ) {
          ?>
          <script type="text/javascript">
            $(document).ready(function() {
               $('[name=item]').submit(function() {
                  var selected = $("#catId").val();
                  var titleTxt = $('#title').val().length;                  
                  var descriptionTxt = $('#description').val().length;
	               if(selected>0 && titleTxt > 0 && descriptionTxt>0){
                     alert('working');
                  }
               });

            });
            function loadSubmit() {
	         var selected = $("#catId").val();
	           if(selected>0){
	              var ProgressImage = document.getElementById('progress_image');
	              document.getElementById("progress").style.visibility = "visible";
	              setTimeout(function(){ProgressImage.src = ProgressImage.src},100);
	              return true;
	           }
            } 
          </script> 
          <?php
       }
    }
    
    /**
     * Get if user is on edit ad page
     *
     * @return boolean
     */
    function osc_is_edit_page() {
        $location = Rewrite::newInstance()->get_location();
        $section = Rewrite::newInstance()->get_section();
        if($location=='item' && $section=='item_edit') {
            return true;
        }
        return false;
    }
    
    /**
     * ADD HOOKS
    */
    osc_register_plugin(osc_plugin_path(__FILE__), 'uploadStatus_install');
    osc_add_hook(osc_plugin_path(__FILE__)."_uninstall", 'uploadStatus_unistall');
    
    osc_add_hook('header', 'uploadStatus_header');
    
?>