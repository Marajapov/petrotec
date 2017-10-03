<?php
	class Main_model extends CI_Model{
		function __construct(){
			parent::__construct();
		}
		function debug($array){
			echo "<pre>";
				print_r($array);
			echo "</pre>";
		}
		function message($alert_msg){
			if (!empty($alert_msg)) {
				$flash_status = $alert_msg[0];
				$flash_header = $alert_msg[1];
				$flash_desc = $alert_msg[2];

				if ($flash_status == 'failure') { ?>
					<div class="row" id="notificationWrp">
						<div class="col-md-12">
							<div class="alert bg-warning" role="alert">
								<i class="icono-exclamationCircle" style="color: #FFF;"></i> 
								<?php echo $flash_desc; ?> <i class="icono-cross" id="closeAlert" style="cursor: pointer; color: #FFF; float: right;"></i>
							</div>
						</div>
					</div>
				<?php	}
				if ($flash_status == 'success') { ?>
					<div class="row" id="notificationWrp">
						<div class="col-md-12">
							<div class="alert bg-success" role="alert">
								<i class="icono-check" style="color: #FFF;"></i> 
								<?php echo $flash_desc; ?> <i class="icono-cross" id="closeAlert" style="cursor: pointer; color: #FFF; float: right;"></i>
							</div>
						</div>
					</div>
			<?php
				}
			}
		}
		function getcategory($selected = ''){
			$category = $this->db->get_where('category', array('parent' => 0))->result();
		?>
			<option value="0">None</option>
			<?php if(!empty($category)): foreach($category as $c): ?>
				<optgroup label="<?= $c->categoryname; ?>">
					<?php $childcat = $this->db->get_where('category', array('parent' => $c->id))->result(); 
						if(!empty($childcat)){
							foreach($childcat as $cc){ ?>
								<option value="<?= $cc->id; ?>" <?= ($selected == $cc->parent) ? 'selected' : ''; ?>><?= $cc->categoryname; ?></option>
						<?php
							}
						}
					?>
				</optgroup>
			<?php endforeach; endif; ?>
		<?php
		}
	}
?>