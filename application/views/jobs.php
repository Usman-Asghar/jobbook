<?=link_tag('admin/plugins/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css');?>
<!-- Begin page -->
<div id="wrapper">
	<div class="container">
		<div class="content-page">
			<!-- Start content -->
			<div class="content">
				<div class="container">
				<div class="row">
					<div class="col-md-12">
						<div class="panel panel-default">
							<div class="panel-heading">
								<h3 class="panel-title">
									My Jobs Listing
								</h3>                                        
							</div>
							<div class="panel-body" id="content" class="content-limit-500">
								<table class="table table-striped table-bordered nowrap"
									   cellspacing="0" width="100%">
									<thead>
										<tr>
											<th>Job ID</th>
											<th>Title</th>
											<th>Description</th>
										</tr>
									</thead>
									<tbody>
										<?php if(!$jobs): ?>
											<tr class="alert alert-warning text-center">
												<td colspan="10"><em>No job found in the system.</em></td>
											</tr>
										<?php endif; ?>

										<?php foreach($jobs as $job): ?>
										<tr>
											<td><?=$job->job_no?></td>
											<td><?=$job->job_title?></td>
											<td><?=$job->job_desc?></td>
										</tr>
										<?php endforeach; ?>
									</tbody>
								</table>
							</div>
						</div>
					</div>

				</div> <!-- End Row -->
				</div>
			</div>
		</div>
	</div>
</div>
<?php
function getScripts()
{
    ob_start();
?>
<?=script_tag('admin/plugins/bootstrap-datepicker/js/bootstrap-datepicker.js');?>
<?=script_tag('admin/js/jobs.js');?>
<?php

    $content = ob_get_contents();
    ob_end_clean();
    echo $content;
}
?>