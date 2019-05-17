<?php

namespace React_WordPress_Plugin;

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

class Shortcode extends Base {

	public function init() {
		add_shortcode( 'display_react_app_here', [$this, 'run_shortcode'] );
	}

	public function run_shortcode() {

		ob_start();
		?>
		<div class="react-wrapper" id="js-react-wordpress-plugin">
			(react will appear here)
		</div>
		<script type="text/javascript">
			if( typeof window.ReactWordPressPlugin !== 'undefined' && typeof window.react_wordpress_plugin_settings !== 'undefined'){
        window.ReactWordPressPlugin.frontEndLoaded(
          document.getElementById("js-react-wordpress-plugin"),
          window.react_wordpress_plugin_settings
        );
			}
		</script>
		<?php
		return ob_get_clean();

	}

}
