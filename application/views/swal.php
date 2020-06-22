<!DOCTYPE html>
<html lang="en">
<head>


	<?php include('stylesheet.php'); ?>
</head>


<body class="fixed-left">
<!-- Begin page -->
<div id="wrapper">

	<script src="<?php echo base_url(); ?>/assets/plugins/sweet-alert2/sweetalert2.min.js"></script>
	<script src="<?php echo base_url(); ?>/assets/pages/sweet-alert.init.js"></script>


	<script type="text/javascript">

		swal({
			title: ' ',
			text: "<?php echo $msg; ?>",
			type: "<?php echo $type; ?>",
			confirmButtonClass: 'btn btn-confirm mt-2',
			cancelButtonClass: 'btn btn-cancel ml-2 mt-2',
		}). then(function ()  {
			window.location="<?php echo $location; ?>";

		})

	</script>

</div>
<!-- END wrapper -->
<!-- Sweet-Alert  -->


<?php include ('js.php');?>
</body>
</html>
