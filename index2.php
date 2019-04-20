<?php
include "conf.php";
include "header.php";
include "slider.php";
?>
<!-- Nav bar for tendor notices. -->
<div class="js-sticky">
	<div class="fh5co-main-nav">
		<div class="container-fluid">
			<div class="fh5co-menu-1">
				<a href="#" data-nav-section="quotation">Tendor</a>
			</div>
			<div class="fh5co-logo">
				<a href="index.html">foodee</a>
			</div>
			<div class="fh5co-menu-2">
				<a href="#" data-nav-section="approved">Approved Quotations</a>
			</div>
		</div>
	</div>
</div>
     
<?php
include "vendor.php";
include "admin/quotation.php";
include "footer.php";
?>