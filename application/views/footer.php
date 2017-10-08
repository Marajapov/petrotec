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
		$('.datepicker_sales').datepicker({
			format: 'yyyy-mm-dd',
		});
		$('.datepicker_from').datepicker({
			format: 'yyyy-mm-dd',
			setDate: 'new Date()',
		}).on('changeDate', function(e) {
            $('#eventForm').formValidation('revalidateField', 'request_from');
        });
		$('.datepicker_installment').datepicker({
			format: 'yyyy-mm-dd',
			setDate: new Date(),
			autoclose: true
		});
	});
	$(function () {
		$('[data-toggle="tooltip"]').tooltip()
	});
	$(document).ready(function(){
		$('.request_other').prop(':checked');
		$('.request_other').change(function() {
			if($(this).is(":checked")) {
				$( ".request_other_text" ).prop( "disabled", false );
			}else{
				$('.request_other_text').prop('disabled',true);  
			}    
		});
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
	// Change Company
	$(document).ready(function(){ 
		
		$("#companyId").change(function(){ 
			var companyId = $(this).val(); 
			var dataString = "companyId="+companyId;
			$.ajax({ 
				type: "POST", 
				url: "<?= base_url('Sales/fetch_data'); ?>", 
				data: dataString, 
				success: function(result){
					if(result != '')
					{
						$("#employee_select").html(result);
						$("#quantityId1").removeAttr('disabled');
						$("#productId_1").removeAttr('disabled');
						$("#price1").removeAttr('disabled');
						$("#employee_select").removeAttr('disabled');
						$("#hideAddButton").removeClass('hide');
					}else{
						$("#quantityId1").prop('disabled', function(i, v) { return !v; });
						$("#productId_1").prop('disabled', function(i, v) { return !v; });
						$("#price1").prop('disabled', function(i, v) { return !v; });
						$("#employee_select").prop('disabled', function(i, v) { return !v; });
						$("#hideAddButton").addClass('hide');
						$('#employee_select').html(result);
					}
				}
			});
		});
	});
	// quantity value
	 $("#quantityId1").on("input",function(e){
		 var productId = $("#productId_1").val();
		 var companyId = $("#companyId").val();
		 var quantity1 = $(this).val(); 
		 var dataString = "quantity1="+quantity1+"&productId="+productId+"&companyId="+companyId;
		if(companyId != 0)
		{
			$.ajax({ 
				type: "POST", 
				url: "<?= base_url('Sales/change_quantity'); ?>", 
				data: dataString, 
				success: function(result){
					$("#quantity_show").addClass("show");
					$("#quantity_show").html(result);
				}
			}); // End Ajax
		}
    });
	// Total
	$(document).change(function(e){
		var i=1;
		var qty;
		var pp;
		var result;
		var price;
		var quantity;
		var a,b;
		var sum = 0;
		var count = $("input[id*='price']").length;
		console.log(count+" tut");
		if(count == 1){
			quantity = $("#quantityId1").val();
			price = $("#price1").val();
			result = quantity * price;
			$("#total").html(result);
		}else if($("#price"+count).val() != '')
		{
			for(i=1; i<=count; i++)
			{
				qty = parseInt($("#quantityId"+i).val());
				a = parseInt(qty);
				pp = parseInt($("#price"+i).val());
				b = parseInt(pp);
				sum += (a*b);
				
			}
			
			$("#total").html(sum);
		}

    });
	// Add Item
	$(document).ready(function(){ 
		var i = 1;
		var j = 1;
		var productId = 0;
		var productId = 0;
		var pr = 0;
		var test = 0;
		var result = 0;
		var send_array = [];
		var every_id = 0;
		
		$('#addItem').click(function () {
			var count = $("input[id*='price']").length;
			var count_products = $("select[name*='product']").length;
			var count_products_fromdb = $("#count_product_fromdb").val();
			if(count <= 1)
			{
				pr = $('#productId_1').val();
				productId = parseInt(pr);
			}else{
				for(j=1; j<=count; j++)
				{
					every_id = $('#productId_'+j).val();
					variable = parseInt(every_id);
					send_array.push(variable);
					
				}
				pr = $('#productId_'+i).val();
				productId = parseInt(pr);
			}
			i++;
			var url = "<?= base_url('Sales/addItem'); ?>";
			var dataString = 'i='+i+'&productId='+productId+'&send_array='+send_array;
			$.ajax
			({
				type: "POST",
				url: url,
				data: dataString,
				cache: false,
				success: function (data) {
					$('.newProduct').append(data);
					var productId_1 = parseInt($('#productId_1').val());
					var total = parseInt(productId_1 + count_products);
					

		
				}
			});
		});
	});

	

	
	//
	// end
</script>

</body>
</html>