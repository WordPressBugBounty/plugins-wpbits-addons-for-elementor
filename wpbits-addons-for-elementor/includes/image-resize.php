<?php
/**
 * Image Resize
 */
if( ! function_exists('wpbits_image_resize') ){

	function wpbits_image_resize( $attach_id = null, $width = "", $height = "", $crop = false, $class = array()) {


		$file_path = "";
		$image_src = array();
	
		//correct bools
		$crop = $crop === "false" ? false : $crop; 
		$crop = $crop === "true" ? true : $crop; 


		$image_src = wp_get_attachment_image_src( $attach_id, 'full' );
		$file_path = get_attached_file( $attach_id );
		$file_info = pathinfo( $file_path );
		$extension = isset($file_info['extension']) ? '.'. $file_info['extension'] : "";
		$image_alternative_text = get_post_meta($attach_id, '_wp_attachment_image_alt', true);
		$class_names = implode(" ", array_merge( array("attachment-custom","size-custom"), $class ) );

		if( $extension !== ".gif" ){
				// the image path without the extension
				$no_ext_path = isset( $file_info['dirname'] ) && isset( $file_info['filename'] ) ? $file_info['dirname'].'/'.$file_info['filename'] : "";
				$cropped_img_path = $no_ext_path.'-'.$width.'x'.$height.$extension; //cropped normal
		

				// checking if the file size is larger than the target size
				// if it is smaller or the same size, stop right here and return
				if ( isset($image_src[1]) && $image_src[1] > $width || isset($image_src[2]) && $image_src[2] > $height ) {

					// the file is larger, check if the resized version already exists (for $crop = true but will also work for $crop = false if the sizes match)
					if ( file_exists( $cropped_img_path ) && $crop != false) {

						$cropped_img_url = str_replace( basename( $image_src[0] ), basename( $cropped_img_path ), $image_src[0] );
						
						$image = array (
							'url' => $cropped_img_url,
							'width' => $width,
							'height' => $height
						);
						$image["html"] = '<img src="'.esc_url($image['url']).'" alt="'.esc_attr($image_alternative_text).'" class="'. $class_names.'" width="'.$image['width'].'" height="'.$image['height'].'" />';
						
						return $image;
					}

					// $crop = false
					if ( $crop == false ) {
						// calculate the size proportionaly
						$proportional_size = wp_constrain_dimensions( $image_src[1], $image_src[2], $width, $height );
						$resized_img_path = $no_ext_path.'-'.$proportional_size[0].'x'.$proportional_size[1].$extension;			

						// checking if the file already exists
						if ( file_exists( $resized_img_path ) ) {
						
							$resized_img_url = str_replace( basename( $image_src[0] ), basename( $resized_img_path ), $image_src[0] );

							$image = array (
								'url' => $resized_img_url,
								'width' => $proportional_size[0],
								'height' => $proportional_size[1]
							);
							$image["html"] = '<img src="'.esc_url($image['url']).'" alt="'.esc_attr($image_alternative_text).'" class="'. $class_names.'" width="'.$image['width'].'" height="'.$image['height'].'" />';
							
							return $image;
						}
					}

					// no cache files - let's finally resize it
					$new_img_path = wp_get_image_editor( $file_path );
					if ( ! is_wp_error( $new_img_path ) ) { 

						/*
						*  resize & crop
						*/
	
						$resized = $new_img_path->resize( $width, $height, $crop ); // regular resize
				
						//if no wp error save the new file
						if ( isset( $resized ) && ! is_wp_error( $resized ) ){
							
			
							$dest_file = $new_img_path->generate_filename();			

							$saved = $new_img_path->save( $dest_file );

							if ( ! is_wp_error( $saved ) ){
								$new_img_path = $saved["path"]; 
							}else{
								$new_img_path = $file_path; 
							}
						}else{
							$new_img_path = $file_path; 
						}
					}else{
						$new_img_path = $file_path; 
					}

					$new_img_size = getimagesize( $new_img_path );
					$new_img = str_replace( basename( $image_src[0] ), basename( $new_img_path ), $image_src[0] );

					// resized output
					$image = array (
						'url' => $new_img,
						'width' => $new_img_size[0],
						'height' => $new_img_size[1]
					);
					$image["html"] = '<img src="'.esc_url($image['url']).'" alt="'.esc_attr($image_alternative_text).'" class="'. $class_names.'" width="'.$image['width'].'" height="'.$image['height'].'" />';
					
					return $image;
				}
		}


		// default output - without resizing
		$image = array (
			'url' => isset($image_src[0]) ? $image_src[0] : "" ,
			'width' => isset($image_src[0]) ? $image_src[1] : "" ,
			'height' => isset($image_src[0]) ? $image_src[2] : "" 
		);
		
		$image["html"] = '<img src="'.esc_url($image['url']).'" alt="'.esc_attr($image_alternative_text).'" class="'. $class_names.'" width="'.$image['width'].'" height="'.$image['height'].'" />';

	
		return $image;
	}
}