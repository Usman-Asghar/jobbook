<div class="content-page">
		<!-- Start content -->
		<div class="content">
			<div class="container">
				<!-- Page-Title -->
				<div class="row">
					<div class="col-sm-12">
						<h4 class="pull-left page-title"><?=$page_title?></h4>
						<ol class="breadcrumb pull-right">
							<li><a href="#"><?=SITE_TITLE?></a></li>
							<li class="active">Chat</li>
						</ol>
					</div>
				</div>
			<div class="col-xlg-10 col-md-10">
			<div class="panel panel-default">
				
				<div class="panel-body">
					<div id="message"></div>
					<br/>
					
					<?php foreach($users as $user): ?>
						<div class="col-sm-3">
							<a href="<?=base_url('admin/chats/conversation/'.$user->user_id)?>" class="thumbnail text-center">
						      <p><?php echo $user->fname.' '.$user->lname ?></p> 
						      <img src="<?=assets_url('user/img/no-img.png');?>" alt="<?=$user->fname?>" style="width:150px;height:150px">
						    </a>
						</div>
					<?php endforeach; ?>
				</div><!-- panel-body -->
			</div> <!-- panel -->
		</div>
	</div>
</div>