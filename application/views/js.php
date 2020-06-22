        <!-- END wrapper -->


        <!-- jQuery  -->
        <script src="<?php echo base_url(); ?>/assets/js/jquery.min.js"></script>
        <script src="<?php echo base_url(); ?>/assets/js/popper.min.js"></script>
        <script src="<?php echo base_url(); ?>/assets/js/bootstrap.min.js"></script>
        <script src="<?php echo base_url(); ?>/assets/js/modernizr.min.js"></script>
        <script src="<?php echo base_url(); ?>/assets/js/detect.js"></script>
        <script src="<?php echo base_url(); ?>/assets/js/fastclick.js"></script>
        <script src="<?php echo base_url(); ?>/assets/js/jquery.slimscroll.js"></script>
        <script src="<?php echo base_url(); ?>/assets/js/jquery.blockUI.js"></script>
        <script src="<?php echo base_url(); ?>/assets/js/waves.js"></script>
        <script src="<?php echo base_url(); ?>/assets/js/jquery.nicescroll.js"></script>
        <script src="<?php echo base_url(); ?>/assets/js/jquery.scrollTo.min.js"></script>

        <script src="<?php echo base_url(); ?>/assets/plugins/metro/MetroJs.min.js"></script>
        <script src="<?php echo base_url(); ?>/assets/plugins/jvectormap/jquery-jvectormap-2.0.2.min.js"></script>
        <script src="<?php echo base_url(); ?>/assets/plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
        <script src="<?php echo base_url(); ?>/assets/plugins/sparkline-chart/jquery.sparkline.min.js"></script>
        <script src="<?php echo base_url(); ?>/assets/plugins/morris/morris.min.js"></script>
        <script src="<?php echo base_url(); ?>/assets/plugins/raphael/raphael-min.js"></script>
        <script src="<?php echo base_url(); ?>/assets/pages/dashboard.js"></script>
        <!-- App js -->
        <script src="<?php echo base_url(); ?>/assets/js/app.js"></script>

		<!-- Required datatable js -->
		<script src="<?php echo base_url(); ?>/assets/plugins/datatables/jquery.dataTables.min.js"></script>
		<script src="<?php echo base_url(); ?>/assets/plugins/datatables/dataTables.bootstrap4.min.js"></script>
		<!-- Buttons examples -->
		<script src="<?php echo base_url(); ?>/assets/plugins/datatables/dataTables.buttons.min.js"></script>
		<script src="<?php echo base_url(); ?>/assets/plugins/datatables/buttons.bootstrap4.min.js"></script>
		<script src="<?php echo base_url(); ?>/assets/plugins/datatables/jszip.min.js"></script>
		<script src="<?php echo base_url(); ?>/assets/plugins/datatables/pdfmake.min.js"></script>
		<script src="<?php echo base_url(); ?>/assets/plugins/datatables/vfs_fonts.js"></script>
		<script src="<?php echo base_url(); ?>/assets/plugins/datatables/buttons.html5.min.js"></script>
		<script src="<?php echo base_url(); ?>/assets/plugins/datatables/buttons.print.min.js"></script>
		<script src="<?php echo base_url(); ?>/assets/plugins/datatables/buttons.colVis.min.js"></script>
		<!-- Responsive examples -->
		<script src="<?php echo base_url(); ?>/assets/plugins/datatables/dataTables.responsive.min.js"></script>
		<script src="<?php echo base_url(); ?>/assets/plugins/datatables/responsive.bootstrap4.min.js"></script>

		<!-- parsley -->
		<script src="<?php echo base_url(); ?>/assets/plugins/parsleyjs/parsley.min.js"></script>
		<script src="<?php echo base_url(); ?>/assets/pages/form-validation.init.js"></script>

		<!-- Datatable init js -->
		<script src="<?php echo base_url(); ?>/assets/pages/datatables.init.js"></script>

		<!-- Sweet-Alert  -->
		<script src="<?php echo base_url(); ?>/assets/plugins/sweet-alert2/sweetalert2.min.js"></script>
		<script src="<?php echo base_url(); ?>/assets/pages/sweet-alert.init.js"></script>


		<script src="<?php echo base_url(); ?>/assets/plugins/timepicker/moment.js"></script>
		<script src="<?php echo base_url(); ?>/assets/plugins/timepicker/tempusdominus-bootstrap-4.js"></script>
		<script src="<?php echo base_url(); ?>/assets/plugins/timepicker/bootstrap-material-datetimepicker.js"></script>
		<script src="<?php echo base_url(); ?>/assets/plugins/colorpicker/jquery-asColor.js"></script>
		<script src="<?php echo base_url(); ?>/assets/plugins/colorpicker/jquery-asGradient.js"></script>
		<script src="<?php echo base_url(); ?>/assets/plugins/colorpicker/jquery-asColorPicker.min.js"></script>
		<script src="<?php echo base_url(); ?>/assets/plugins/select2/select2.min.js"></script>

		<script src="<?php echo base_url(); ?>/assets/plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js"></script>
		<script src="<?php echo base_url(); ?>/assets/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js"></script>
		<script src="<?php echo base_url(); ?>/assets/plugins/bootstrap-maxlength/bootstrap-maxlength.min.js"></script>
		<script src="<?php echo base_url(); ?>/assets/plugins/bootstrap-touchspin/js/jquery.bootstrap-touchspin.min.js"></script>
		<script src="<?php echo base_url(); ?>/assets/plugins/bootstrap-inputmask/bootstrap-inputmask.min.js"></script>
		<script src="<?php echo base_url(); ?>/assets/plugins/dropzone/dist/dropzone.js"></script>

		<!-- Plugins Init js -->
		<script src="<?php echo base_url(); ?>/assets/pages/form-advanced.js"></script>

		<script>
			window.onload = function(){
				document.getElementById("opennav").style.display='none';
				document.getElementById("closenav").style.display='block';
			};

			function openNav() {
				document.getElementById("sidebar").style.width = "250px";
				//document.getElementsByClassName("wrapper").style.marginLeft = "250px";
				document.getElementById("raps").style.marginLeft = "250px";
				document.getElementById("opennav").style.display='none';
				document.getElementById("closenav").style.display='block';

			}

			/* Set the width of the sidebar to 0 and the left margin of the page content to 0 */
			function closeNav() {
				document.getElementById("sidebar").style.width = "0px";
				//document.getElementsByClassName("wrapper").style.marginLeft = "0px";
				document.getElementById("raps").style.marginLeft = "0px";
				document.getElementById("opennav").style.display='block';
				document.getElementById("closenav").style.display='none';
				document.getElementById("top-bar").style.marginLeft = "0px";



			}

		</script>

