</div> <!-- end .MAIN-WRAPPER -->
<script src="<?= base_url(); ?>admin_assets/assets/js-plugins/jquery-3.1.1.min.js" type="text/javascript"></script>
<script src="//cdn.datatables.net/1.10.15/js/jquery.dataTables.min.js"></script>
<script src="<?= base_url(); ?>admin_assets/assets/js-plugins/bootstrap.min.js" type="text/javascript"></script>
<script src="<?= base_url(); ?>admin_assets/assets/js-plugins/perfect-scrollbar.jquery.min.js" type="text/javascript"></script>
<script src="<?= base_url(); ?>admin_assets/assets/js-plugins/wow.min.js" type="text/javascript"></script>

<!--  MAIN SCRIPTS START FROM HERE  above scripts from plugin   -->
<script src="<?= base_url(); ?>admin_assets/assets/js/scripts.js" type="text/javascript"></script>
<script src="<?= base_url(); ?>admin_assets/assets/js/bootstrap-datepicker.min.js" type="text/javascript"></script>
<script>
	$(document).ready(function(){
		$('.table').DataTable();
		$('.datepicker').datepicker({
			format: 'yyyy-mm-dd',
		});
	});
	$(function () {
		$('[data-toggle="tooltip"]').tooltip()
	});
</script>
</body>
</html>