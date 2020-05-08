<?php

add_action( 'admin_menu', 'add_theme_menu_item' );
add_action( 'admin_init', 'display_theme_panel_fields' );

function add_theme_menu_item() {
	add_menu_page("Theme Panel", "Theme Panel", "manage_options", "theme-panel", "theme_settings_page", null, 99);
}

function theme_settings_page() {?>

	    <div class="wrap">
	    <form method="post" action="options.php">
	        <?php
	            settings_fields("section");
	            do_settings_sections("theme-options");      
	            submit_button(); 
	        ?>          
	    </form>
		</div>
	<?php
}

function display_theme_panel_fields() {

	add_settings_section("section", "Gallery Settings", null, "theme-options");
	add_settings_field("dg_images", "Images", "display_admin_field", "theme-options", "section");
    register_setting("section", "dg_images");
}

function display_admin_field(){ ?>

    	<input type="text" name="dg_images" id="dg_images" value="<?php echo get_option('dg_images'); ?>" />
    	<input id="upload_image_button" class="button" type="button" value="Upload Image" />
    	
    <?php
}