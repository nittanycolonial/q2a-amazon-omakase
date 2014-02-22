<?php

/*
	2014 (c) Dennis Salguero

	http://www.buriedinfo.com/

	
	File: qa-plugin/amazon-omakase/qa-amazon-omakase.php
	Version: See define()s at top of qa-include/qa-base.php
	Description: Widget module class for Amazon Omakase widget plugin

	This program is free software; you can redistribute it and/or
	modify it under the terms of the GNU General Public License
	as published by the Free Software Foundation; either version 2
	of the License, or (at your option) any later version.
	
	This program is distributed in the hope that it will be useful,
	but WITHOUT ANY WARRANTY; without even the implied warranty of
	MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
	GNU General Public License for more details.

*/

	class qa_amazon_omakase {
		
		function allow_template($template)
		{
			return ($template!='admin');
		}

		
		function allow_region($region)
		{
			$allow=false;
			
			switch ($region)
			{
				case 'main':
				case 'side':
				case 'full':
					$allow=true;
					break;
			}
			
			return $allow;
		}

		
		function admin_form(&$qa_content)
		{
			$saved=false;
			
			if (qa_clicked('amazon_save_button')) {
				$trimchars="=;\"\' \t\r\n"; // prevent common errors by copying and pasting from Javascript
				qa_opt('amazon_tracking_id', trim(qa_post_text('amazon_tracking_id_field'), $trimchars));
				$saved=true;
			}
			
			return array(
				'ok' => $saved ? 'Amazon settings saved' : null,
				
				'fields' => array(
					array(
						'label' => 'Amazon Tracking ID:',
						'value' => qa_html(qa_opt('amazon_tracking_id')),
						'tags' => 'name="amazon_tracking_id_field"',
						'note' => 'Example: <i>yourcompany-20</i>',
					),
				),
				
				'buttons' => array(
					array(
						'label' => 'Save Changes',
						'tags' => 'name="amazon_save_button"',
					),
				),
			);
		}


		function output_widget($region, $place, $themeobject, $template, $request, $qa_content)
		{
			$divstyle='';
			
			switch ($region) {
				case 'full': // Leaderboard
					$divstyle='width:728px; margin:0 auto;';
					
				case 'main': // Leaderboard
					$width=728;
					$height=90;
					break;
					
				case 'side': //skyscraper
					$width=160;
					$height=600;
					break;
			}
			
?>
<div style="<?php echo $divstyle?>">
<script type="text/javascript"><!--
amazon_ad_tag = <?php echo qa_js(qa_opt('amazon_tracking_id'))?>; amazon_ad_width = <?php echo qa_js($width)?>; amazon_ad_height = <?php echo qa_js($height)?>;
amazon_ad_link_target = "new"; amazon_ad_border = "hide";//-->
</script>
<script type="text/javascript" src="http://ir-na.amazon-adsystem.com/s/ads.js"></script>
</div>
<?php
		}
	
	}
	

/*
	Omit PHP closing tag to help avoid accidental output
*/
