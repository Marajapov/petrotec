<style>
	.active_menu{
		color:#fff !important;
	}
</style>
<div class="an-loader-container">
    <img src="<?= base_url(); ?>admin_assets/assets/img/loader.png" alt="">
  </div>
  <header class="an-header wow fadeInDown">
    <div class="an-topbar-left-part">
      <h3 class="an-logo-heading">
        <a class="an-logo-link" href="index.html">Petrotec
          <span>Admin Pannel</span>
        </a>
      </h3>
    </div> <!-- end .AN-TOPBAR-LEFT-PART -->

    <div class="an-topbar-right-part">

      <div class="an-profile-settings">
        <div class="btn-group an-notifications-dropown  profile">
          <button type="button" class="an-btn an-btn-icon dropdown-toggle"
                  data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <span class="an-profile-img" style="background-image: url('<?= base_url(); ?>admin_assets/assets//img/users/user5.jpeg');"></span>
            <span class="an-user-name">
            <?php
              if(isset($this->data)){
                echo $this->data['username'];
              }else{
                echo 'Admin';
              }
            ?>
            </span>
            <span class="an-arrow-nav"><i class="icon-arrow-down"></i></span>
          </button>
          <div class="dropdown-menu">
            <p class="an-info-count">Profile Settings</p>
            <ul class="an-profile-list">
              <li><a href="#"><i class="icon-user"></i>Settings</a></li>
              <li><a href="<?php if(isset($this->data)) { echo base_url('Login/logout'); } else{ echo '#';}?>"><i class="icon-download-left"></i>Log out</a></li>
            </ul>
          </div>
        </div>
      </div> <!-- end .AN-PROFILE-SETTINGS -->
    </div> <!-- end .AN-TOPBAR-RIGHT-PART -->
  </header> <!-- end .AN-HEADER -->
  <div class="an-page-content">
    <div class="an-sidebar-nav js-sidebar-toggle-with-click">
      <div class="an-sidebar-widgets">
        <div class="an-user-avatar">
          <img src="<?= base_url(); ?>admin_assets/assets/img/users/user5.jpeg" alt="an-user-info"/>
        </div>
        <div class="an-user-info">
          <div class="an-username">Admin</div>
          <div class="an-permision">Administrator</div>
        </div>
      </div> <!-- end .AN-SIDEBAR-WIDGETS -->

      <div class="an-sidebar-nav">
        <ul class="an-main-nav">
          <!-- <li class="an-nav-item ">
            <a class=" js-show-child-nav" href="#">
              <i class="icon-chart-stock"></i>
              <span class="nav-title">Dashboard
                    <span class="an-arrow-nav"><i class="icon-arrow-down"></i></span>
                  </span>
            </a>

            <ul class="an-child-nav js-open-nav">
              <li><a href="index.html">Version 1</a></li>
              <li><a href="index_2.html">Version 2</a></li>
              <li><a href="index_3.html">Version 3</a></li>
            </ul>
          </li> -->
		  
		  <li class="an-nav-item ">
			<a href="#">
              <i class="icon-chart-stock"></i>
              <span class="nav-title">Dashboard</span>
            </a>
		  </li>
		  <li class="an-nav-item ">
			<a class=" js-show-child-nav" href="#">
              <i class="icon-chart-stock"></i>
              <span class="nav-title">Sales
			  <span class="an-arrow-nav"><i class="icon-arrow-down"></i></span>
			  </span>
            </a>
			 <ul class="an-child-nav js-open-nav">
              <li><a href="<?= base_url('Sales/index'); ?>">All Sales</a></li>
              <li><a href="#">All Invoice</a></li>
              <li><a href="<?= base_url('Sales/generateinvoice'); ?>">Generate Invoice</a></li>
              <li><a href="#">Sales history</a></li>
            </ul>
		  </li>
			<?php
				if($this->uri->segment(2) == 'createcustomer' || $this->uri->segment(2) == 'allcustomer'){
					$style = 'style="display:block"';
				}
				else {
					$style = '';
				}
				if($this->uri->segment(2) == 'createcustomer'){
					$child1 = 'style="color:#fff"';
				}
				else{
					$child1 = '';
				}
				if($this->uri->segment(2) == 'allcustomer'){
					$child = 'style="color:#fff"';
				}
				else{
					$child = '';
				}
			?>
		  <li class="an-nav-item">
			<a class="js-show-child-nav" href="#">
              <i class="icon-chart-stock"></i>
              <span class="nav-title">Customers
			  <span class="an-arrow-nav"><i class="icon-arrow-down"></i></span>
			  </span>
            </a>
			<ul class="an-child-nav js-open-nav" <?= $style; ?>>
              <li><a <?= $child1; ?> href="<?= base_url('customer/addcustomer'); ?>">Add Customer</a></li>
              <li><a <?= $child; ?> href="<?= base_url('home/allcustomer'); ?>">All Customers</a></li>
            </ul>
		  </li>
			<?php
				if($this->uri->segment(2) == 'vendorlist'){
					$style = 'style="display:block"';
				}
				else {
					$style = '';
				}
				if($this->uri->segment(2) == 'vendorlist'){
					$child1 = 'style="color:#fff"';
				}
			?>
		  <li class="an-nav-item ">
			<a class=" js-show-child-nav" href="#">
              <i class="icon-chart-stock"></i>
              <span class="nav-title">Purchasing
			  <span class="an-arrow-nav"><i class="icon-arrow-down"></i></span>
			  </span>
            </a>
			<ul class="an-child-nav js-open-nav">
              <li><a href="#">Purchase Order</a></li>
              <li><a <?= $child; ?> href="<?= base_url('home/vendorlist'); ?>">Vendor List</a></li>
              <li><a href="#">Purchase history</a></li>
              <li><a href="#">Assets</a></li>
            </ul>
		  </li>
		  <li class="an-nav-item ">
			<a class=" js-show-child-nav" href="#">
              <i class="icon-chart-stock"></i>
              <span class="nav-title">Inventory
			  <span class="an-arrow-nav"><i class="icon-arrow-down"></i></span>
			  </span>
            </a>
			
			<ul class="an-child-nav js-open-nav">
              <li><a href="<?= base_url('inventory/viewInventory'); ?>">All inventory</a></li>
              <li><a href="<?= base_url('inventory/allproduct'); ?>">Product</a></li>
              <li><a href="<?= base_url('inventory/category'); ?>">Category</a></li>
            </ul>
		  </li>
			<li class="an-nav-item ">
				<a class=" js-show-child-nav" href="#">
					<i class="icon-chart-stock"></i>
					<span class="nav-title">Supplier
						<span class="an-arrow-nav"><i class="icon-arrow-down"></i></span>
					</span>
				</a>
				<ul class="an-child-nav js-open-nav">
					<li><a href="<?= base_url(); ?>supplier">All Supplier</a></li>
				</ul>
			</li>
		  <li class="an-nav-item <?= ($this->uri->segment(1) == 'hr') ? 'nav-open' : ''; ?>">
			<a class=" js-show-child-nav" href="#">
              <i class="icon-chart-stock"></i>
              <span class="nav-title">HR
			  <span class="an-arrow-nav"><i class="icon-arrow-down"></i></span>
			  </span>
            </a>
			
			<ul class="an-child-nav js-open-nav" <?= ($this->uri->segment(1) == 'hr') ? 'style="display: block;"' : ''; ?>>
              <li><a href="<?= base_url('hr/applicants'); ?>" <?= ($this->uri->segment(2) == 'applicants') ? 'class="active_menu"' : ''; ?>>Applicants</a></li>
              <li><a href="<?= base_url('hr/shortlistview'); ?>" <?= ($this->uri->segment(2) == 'shortlistview') ? 'class="active_menu"' : ''; ?>>Shortlisted</a></li>
              <li><a href="#">Payrolls</a></li>
            </ul>
		  </li>
      <!-- Request -->
      <li class="an-nav-item <?= ($this->uri->segment(1) == 'Request') ? 'nav-open' : ''; ?>">
			<a class=" js-show-child-nav" href="#">
              <i class="icon-chart-stock"></i>
              <span class="nav-title">Request
			  <span class="an-arrow-nav"><i class="icon-arrow-down"></i></span>
			  </span>
            </a>
			
			<ul class="an-child-nav js-open-nav" <?= ($this->uri->segment(1) == 'Request') ? 'style="display: block;"' : ''; ?>>
              <li><a href="<?= base_url('Request/index'); ?>" <?= ($this->uri->segment(2) == 'index') ? 'class="active_menu"' : ''; ?>>All Request</a></li>
              
            </ul>
      </li>
      <!-- User 
      <li class="an-nav-item <?= ($this->uri->segment(1) == 'User') ? 'nav-open' : ''; ?>">
			<a class=" js-show-child-nav" href="#">
              <i class="icon-chart-stock"></i>
              <span class="nav-title">User
			  <span class="an-arrow-nav"><i class="icon-arrow-down"></i></span>
			  </span>
            </a>
			
			<ul class="an-child-nav js-open-nav" <?= ($this->uri->segment(1) == 'User') ? 'style="display: block;"' : ''; ?>>
              <li><a href="<?= base_url('User/index'); ?>" <?= ($this->uri->segment(2) == 'index') ? 'class="active_menu"' : ''; ?>>All Users</a></li>
              
            </ul>
      </li> -->
      <!-- Accounting -->
		  <li class="an-nav-item ">
			<a class=" js-show-child-nav" href="#">
              <i class="icon-chart-stock"></i>
              <span class="nav-title">Accounting
			  <span class="an-arrow-nav"><i class="icon-arrow-down"></i></span>
			  </span>
            </a>
			
			<ul class="an-child-nav js-open-nav">
              <li><a href="#">General ledger</a></li>
              <li><a href="#">Chart of accounts</a></li>
              <li><a href="#">Trial balance</a></li>
              <li><a href="#">Balance sheet</a></li>
              <li><a href="#">Account recievable</a></li>
              <li><a href="#">Accounts payable</a></li>
              <li><a href="#">Profit & loss</a></li>
              <li><a href="#">Depreciation</a></li>
              <li><a href="#">Cash Flow</a></li>
            </ul>
		  </li>
		  <li class="an-nav-item ">
			<a class=" js-show-child-nav" href="#">
              <i class="icon-chart-stock"></i>
              <span class="nav-title">Settings
			  <span class="an-arrow-nav"><i class="icon-arrow-down"></i></span>
			  </span>
            </a>
			
			<ul class="an-child-nav js-open-nav <?= ($this->uri->segment(1) == 'User') ? 'style="display: block;"' : ''; ?>">
              <li><a href="#">General</a></li>
              <li><a href="#">Security</a></li>
              <li><a href="#">Notification</a></li>
              <li><a href="#">Assign Access</a></li>
              <li><a href="#">Add User</a></li>
            </ul>
		  </li>
        </ul> <!-- end .AN-MAIN-NAV -->
      </div> <!-- end .AN-SIDEBAR-NAV -->
    </div> <!-- end .AN-SIDEBAR-NAV -->