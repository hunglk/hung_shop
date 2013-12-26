<div class="well">
	<ul class="nav nav-list">
		<li class="nav-header">Quản lý chung</li>
		<li class="<?php echo($this->uri->segment(2) == 'dash' ? 'active' : '') ?>"><a
				href="<?php echo base_url(); ?>index.php/admin/dash"><i class="icon-home"></i> Trang chủ</a></li>
		<li class="nav-header">Quản lý hệ thống</li>
		<li class="<?php echo($this->uri->segment(1) == 'product' ? 'active' : '') ?>"><a
				href="<?php echo base_url(); ?>index.php/product"><i class="icon-folder-open"></i> Sản phẩm</a></li>
		<li class="<?php echo($this->uri->segment(1) == 'color' ? 'active' : '') ?>"><a
				href="<?php echo base_url(); ?>index.php/color"><i class="icon-folder-open"></i> Màu</a></li>
		<li class="<?php echo($this->uri->segment(1) == 'category' ? 'active' : '') ?>"><a
				href="<?php echo base_url(); ?>index.php/category"><i class="icon-folder-open"></i> Danh mục</a></li>
		<li class="<?php echo($this->uri->segment(1) == 'user' ? 'active' : '') ?>"><a
				href="<?php echo base_url(); ?>index.php/user"><i class="icon-user"></i> Thành viên</a></li>
		<li class="<?php echo($this->uri->segment(1) == 'roles' ? 'active' : '') ?>"><a
				href="<?php echo base_url(); ?>index.php/roles"><i class="icon-folder-open"></i> Quản lý quyền</a></li>
	</ul>
</div>