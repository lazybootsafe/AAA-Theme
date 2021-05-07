<form id="AAA_serach_form" method="get" action="<?php echo get_option('home'); ?>">
	<div class="form-group mb-3">
		<div class="input-group input-group-alternative">
			<div class="input-group-prepend">
				<span class="input-group-text"><i class="fa fa-search"></i></span>
			</div>
			<input name="s" class="form-control" placeholder="<?php _e('搜索什么...', 'AAA');?>" type="text"  autocomplete="off" >
		</div>
	</div>
	<div class="text-center">
		<button onclick="if($('#AAA_serach_form input[name=\'s\']').val() != '') {document.getElementById('AAA_serach_form').submit();}" type="button" class="btn btn-primary"><?php _e('搜索', 'AAA');?></button>
	</div>
</form>