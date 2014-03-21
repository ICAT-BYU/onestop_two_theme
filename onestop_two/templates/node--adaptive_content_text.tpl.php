<?php
	/*
	*	The template file to render Adaptive Content Text
	*/	
	//kpr($content);	
	//kpr($variables['changed']);
	
?>


<div class="adaptive_content_text adaptive_content_formatting">
	<?php	if(isset($content['body'])) {print(drupal_render($content['body']));}?>
</div>


