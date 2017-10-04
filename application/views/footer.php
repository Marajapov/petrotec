</div> <!-- end .MAIN-WRAPPER -->
<script src="<?= base_url(); ?>admin_assets/assets/js-plugins/jquery-3.1.1.min.js" type="text/javascript"></script>
<script src="//cdn.datatables.net/1.10.15/js/jquery.dataTables.min.js"></script>
<script src="<?= base_url(); ?>admin_assets/assets/js-plugins/bootstrap.min.js" type="text/javascript"></script>
<script src="<?= base_url(); ?>admin_assets/assets/js-plugins/perfect-scrollbar.jquery.min.js" type="text/javascript"></script>
<script src="<?= base_url(); ?>admin_assets/assets/js-plugins/wow.min.js" type="text/javascript"></script>
<script src="<?= base_url(); ?>admin_assets/assets/js-plugins/validator.min.js" type="text/javascript"></script>
<script src="<?= base_url(); ?>admin_assets/assets/js-plugins/moment.min.js" type="text/javascript"></script>

<!--  MAIN SCRIPTS START FROM HERE  above scripts from plugin   -->
<script src="<?= base_url(); ?>admin_assets/assets/js/scripts.js" type="text/javascript"></script>
<script src="<?= base_url(); ?>admin_assets/assets/js/bootstrap-datepicker.min.js" type="text/javascript"></script>
<script>
	$(document).ready(function(){
		$('.table').DataTable();
		$('.datepicker').datepicker({
			format: 'yyyy-mm-dd',
		});
		// datepicker_sales
		$('.datepicker_sales').datepicker({
			format: 'yyyy-mm-dd',
		});
		
		
		
		/*


		// From
		$('.datepicker_from').datepicker({
			format: 'yyyy-mm-dd',
			startDate: new Date(),
		}).on('changeDate', function(e) {
            // Revalidate the date field
            $('#eventForm').formValidation('revalidateField', 'request_from');
        });
		// To
		$('.datepicker_to').datepicker({
			format: 'yyyy-mm-dd',
			minDate: moment(),
			startDate: '+1d',
		}).on('changeDate', function(e) {
            // Revalidate the date field
            $('#eventForm').formValidation('revalidateField', 'request_to');
        });

		$('#eventForm').formValidation({
			framework: 'bootstrap',
			icon: {
				valid: 'glyphicon glyphicon-ok',
				invalid: 'glyphicon glyphicon-remove',
				validating: 'glyphicon glyphicon-refresh'
			},
			fields: {
				name: {
					validators: {
						notEmpty: {
							message: 'The name is required'
						}
					}
				},
				date: {
					validators: {
						notEmpty: {
							message: 'The date is required'
						},
						date: {
							format: 'MM/DD/YYYY',
							message: 'The date is not a valid'
						}
					}
				}
			}
		});  
		
		
		
		*/



	});
	$(function () {
		$('[data-toggle="tooltip"]').tooltip()
	});

	// Added by Abakan start
	$(document).ready(function(){
		$('.request_other').prop(':checked');
		
		$('.request_other').change(function() {
			if($(this).is(":checked")) {
				$( ".request_other_text" ).prop( "disabled", false );
			}else{
				$('.request_other_text').prop('disabled',true);  
			}    
		});
		// Yes No
$( document ).ready(function() {
        <?php if(isset($row->request_doctor_yes) && ($row->request_doctor_yes == 1)) {?>
			$('.request_doctor_no').prop('disabled', true);
		<?php } ?>
		
		<?php if(isset($row->request_doctor_no) && ($row->request_doctor_no == 1)) {?>
			$('.request_doctor_yes').prop('disabled', true);
		<?php } ?>
    });
		$('.request_doctor_yes').change(function() {
			if($(this).is(":checked")) {
				$( ".request_doctor_no" ).prop( "disabled", true );
			}else{
				$( ".request_doctor_no" ).prop( "disabled", false );
			}    
		});
		$('.request_doctor_no').change(function() {
			if($(this).is(":checked")) {
				$( ".request_doctor_yes" ).prop( "disabled", true );
			}else{
				$( ".request_doctor_yes" ).prop( "disabled", false );
			}
			      
		});
		
	});

    $('#register').validator();

	// change supplier
	$(document).ready(function(){ 
		$("#companyId").change(function(){ 
		var companyId = $(this).val(); 
		var dataString = "companyId="+companyId;

		$.ajax({ 
			type: "POST", 
			url: "<?= base_url('Sales/fetch_data'); ?>", 
			data: dataString, 
			success: function(result){
			$("#employee_select").html(result);
			}
		});

		});
	});
	// quantity value
	 $('#quantityId').on('input',function(e){
		 var productId = $('#productId').val();
		 var companyId = $('#companyId').val();
		 var quantity = $(this).val(); 
		 var dataString = "quantity="+quantity+"&productId="+productId+"&companyId="+companyId;

		$.ajax({ 
			type: "POST", 
			url: "<?= base_url('Sales/change_quantity'); ?>", 
			data: dataString, 
			success: function(result){
				$('#quantity_show').removeClass('hide');
				$('#quantity_show').addClass('show');
				$("#quantity_show").html(result);
			}
		});
    });
	
	//
	// end
</script>

</body>
</html>