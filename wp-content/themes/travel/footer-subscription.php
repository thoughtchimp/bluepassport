<?php include_once( ABSPATH . 'wp-admin/includes/plugin.php' ); ?>
<?php if(is_plugin_active('email-subscribers/email-subscribers.php')){ ?>
<section class="subscription-box">
	<div class="container">
		<div class="row">
			<div class="col-sm-12">
				<h2><b>FREE</b> <span class="thin-weight">SUBSCRIPTION</span></h2>
			</div>
			<div class="col-sm-12 p-t-40">
			<?php es_subbox( $namefield = "YES", $desc = "", $group = "Public" ); ?>
			</div>
		</div>
	</div>
</section>
<?php } ?>


