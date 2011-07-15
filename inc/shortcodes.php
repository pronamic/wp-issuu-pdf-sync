<?php
/*
 * The ISSUU PDF shortcode. Usage doc on the admin pannel
 */
add_shortcode('pdf','issuu_pdf_embeder'); 
function issuu_pdf_embeder( $atts, $content = null ) {
	
	global $ips_options;
	
	if ( isset( $ips_options['layout'] ) && $ips_options['layout'] == 2 )
		$layout = "presentation";
	else
		$layout = "browsing";
	
	extract( shortcode_atts( array( 
		'issuu_pdf_id' => null, 
		'width' => $ips_options['width'], 
		'height' => $ips_options['height'], 
		'layout' => $layout,
		'backgroundColor' => $ips_options['bgcolor'],
		'autoFlipTime' => $ips_options['flip_timelaps'],
		'autoFlip' => ( isset( $ips_options['autoflip'] ) && $ips_options['autoflip'] == 1 ) ? 'true' : 'false', 
		'showFlipBtn' => ( isset( $ips_options['show_flip_buttons'] ) && $ips_options['show_flip_buttons'] == 1 ) ? 'true' : 'false', 
		'allowfullscreen' => ( isset( $ips_options['allow_full_screen'] ) && $ips_options['allow_full_screen'] == 1 ) ? 'true' : 'false' ),
		$atts ) ); 
	
	// Check if the required param is set
	if ( empty( $issuu_pdf_id ))
		return false;	
	?>
	
	<div>
		<object style="width:<?php echo $width; ?>px;height:<?php echo $height; ?>px" >
			<param name="movie" value="http://static.issuu.com/webembed/viewers/style1/v1/IssuuViewer.swf?mode=embed&amp;backgroundColor=<?php echo $backgroundColor; ?>&amp;viewMode=<?php echo $layout; ?>&amp;showFlipBtn=<?php echo $showFlipBtn; ?>&amp;documentId=<?php echo $issuu_pdf_id; ?>&amp;autoFlipTime=<?php echo $autoFlipTime; ?>&amp;autoFlip=<?php echo $autoFlip; ?>&amp;loadingInfoText=<?php _e( 'Loading...', 'ips' ); ?>" />
			<param name="allowfullscreen" value="<?php echo $allowfullscreen; ?>"/>
			<param name="menu" value="false"/>
			<embed src="http://static.issuu.com/webembed/viewers/style1/v1/IssuuViewer.swf" type="application/x-shockwave-flash" allowfullscreen="<?php echo $allowfullscreen; ?>" menu="false" style="width:<?php echo $width; ?>px;height:<?php echo $height; ?>px" flashvars="mode=embed&amp;backgroundColor=<?php echo $backgroundColor; ?>&amp;viewMode=<?php echo $layout; ?>&amp;autoFlipTime=<?php echo $autoFlipTime; ?>&amp;autoFlip=<?php echo $autoFlip; ?>&amp;showFlipBtn=<?php echo $showFlipBtn; ?>&amp;documentId=<?php echo $issuu_pdf_id; ?>&amp;loadingInfoText=<?php _e( 'Loading...', 'ips' ); ?>" />
		</object>
	</div>
	 
	<?php
}