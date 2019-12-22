<!DOCTYPE html>
<html>
  <head>

  	<?php $this->view('template/v_head'); ?>

  </head>
  <body class="fixed-header dashboard menu-pin">

  	<?php $this->view('template/v_sidebar'); ?>

  	<!-- START PAGE-CONTAINER -->
  	<div class="page-container ">
		<?php $this->view('template/v_header'); ?>
  		<!-- START PAGE CONTENT -->
  		<!-- START PAGE CONTENT WRAPPER -->
      	<div class="page-content-wrapper ">
        	<div class="content ">
				    <?php $this->view('template/v_breadcrumb'); ?>
            <?php $this->view($_content.'/v_content'); ?>
      			<?php $this->view('template/v_footer'); ?>
      		</div>
      	</div>
	    <!-- END PAGE CONTENT WRAPPER -->
  	</div>
    <!-- END PAGE CONTENT -->
    <?php $this->view('template/v_scripts'); ?>
  </body>
</html>