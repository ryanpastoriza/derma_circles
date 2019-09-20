<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

// add css files to header/footer page.
if( !function_exists( 'add_css' ) ) {

	function add_css( $file = '' ) {

		$str = '';
		$ci  = &get_instance();
		$header_css = $ci->config->item('header_css');

		if( empty($file) ){
			return;
		}

		if( is_array( $file ) ) {
			if( !is_array( $file ) && count( $file ) <= 0 ){
				$return;
			}

			foreach ( $file as $item ) {
				$header_css[] = $item;
			}

			$ci->config->set_item('header_css', $header_css);

		}else {
			$str = $file;
			$header_js[] = $str;
			$ci->config->set_item('header_css', $header_css);
		}
	}

}
// add js files to header/footer page.
if( !function_exists( 'add_js' ) ) {

	function add_js( $file = '' ) {

		$str = '';
		$ci  = &get_instance();
		$header_js = $ci->config->item('header_js');

		if( empty($file) ){
			return;
		}

		if( is_array( $file ) ) {
			if( !is_array( $file ) && count( $file ) <= 0 ){
				$return;
			}

			foreach ( $file as $item ) {
				$header_js[] = $item;
			}

			$ci->config->set_item('header_js', $header_js);

		}else {
			$str = $file;
			$header_js[] = $str;
			$ci->config->set_item('header_js', $header_js);
		}
	}

}


if ( !function_exists( 'put_headers' ) ) {

	function put_headers($type = 'css') {

		$str = '';
		$ci  = &get_instance();

		if( $type == 'js'){
			$header_js = $ci->config->item('header_js');

			foreach ($header_js as $item) {
				$str .= '<script type="text/javascript" src="'.base_url().'assets/'.$item.'"></script>'."\n";
			}

		}else{
			$header_css = $ci->config->item('header_css');

			foreach($header_css AS $item){
           		$str .= '<link rel="stylesheet" href="'.base_url().'assets/'.$item.'" type="text/css" />'."\n";
       		}

		}
		return $str;
	}

}


