<?php
if ( is_active_sidebar( 'header-banner' ) ) {
?>
<div class="header-banner">
<div class="container"> 
<div class="row">

	<br />
<?php	
 dynamic_sidebar( 'header-banner' );
?>
	</div>
</div>
</div>
<?php
}
