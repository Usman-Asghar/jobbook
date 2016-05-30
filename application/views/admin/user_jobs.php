<?=link_tag('admin/plugins/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css');?>
<?=link_tag('admin/plugins/bootstrap-selectable/css/bootstrap-select.min.css');?>
<?=link_tag('admin/plugins/datatables/jquery.dataTables.min.css');?>

<!-- Begin page -->
<div id="wrapper">
	<div class="container">
		<div class="content-page">
			<!-- Start content -->
			<div class="content">
				<div class="container">
				<div class="row">
					<div class="col-md-12">
                                                <div class="alert alert-success alert-dismissable" id="success_message"></div>
                                                <div class="alert alert-danger alert-dismissable" id="error_message"></div>
                                                <div class="panel panel-default">
                                                    <div class="panel-heading">
                                                        <h3 class="panel-title">
                                                            User Jobs
                                                        </h3>                                        
                                                    </div>

							<div class="panel-body" id="content" class="content-limit-500">
                                                                <div class="col-sm-12">
                                                                    <label for="job_grade">Job Grade</label>
                                                                    <select class="form-control select-margin" name="grade_id" id="search_by_grade">
                                                                            <option value="0"> - Select - </option>
                                                                            <?php foreach($grades as $g): ?>
                                                                                    <option value="<?=$g->grade_name?>" >
                                                                                            <?=$g->grade_name?>
                                                                                    </option>
                                                                            <?php endforeach; ?>
                                                                    </select>
                                                                </div>
                                                                <table id="datatable" class="table table-striped table-bordered nowrap"
									   cellspacing="0" width="100%">
									<thead>
										<tr>
                                                                                    <th>Sr. No</th>
                                                                                    <th>Job Grade</th>
                                                                                    <th>Title</th>
                                                                                    <th>Description</th>
                                                                                    <th>Applied By</th>
                                                                                    <th>Start Date</th>
                                                                                    <th>End Date</th>
                                                                                    <th>Actions</th>
										</tr>
									</thead>
									<tbody>
										<?php if(!$jobs): ?>
											<tr class="alert alert-warning text-center">
												<td colspan="10"><em>No job found in the system.</em></td>
											</tr>
										<?php endif; $count=1;?>

										<?php foreach($jobs as $job): ?>
										<tr>
											<td><?=$count?></td>
                                                                                        <td><?=$job->grade_name?></td>
											<td><?=$job->job_title?></td>
											<td><?=$job->job_desc?></td>
											<td><?=ucfirst($job->fname);?> <?=ucfirst($job->lname);?></td>
											<td><?=date('M-d-Y', strtotime(str_replace('-','/', $job->start_date)));?></td>
											<td><?=date('M-d-Y', strtotime(str_replace('-','/', $job->deadline_date)));?></td>
											<td>
												<div class="btn-group-sm">
												<a href="javascript:;" onclick="changeStatus('<?=base_url('admin/user_jobs/approve_user_job');?>',<?=$job->job_id;?>,<?=$job->user_id;?>)" class="btn btn-success waves-effect waves-light tooltips" data-placement="top" data-toggle="tooltip" data-original-title="Approve">
                                                                                                    Approve
												</a>
                                                                                                <a href="javascript:;" onclick="changeStatus('<?=base_url('admin/user_jobs/reject_user_job');?>',<?=$job->job_id;?>,<?=$job->user_id;?>)" class="btn btn-danger waves-effect waves-light tooltips" data-placement="top" data-toggle="tooltip" data-original-title="Approve">
                                                                                                    Reject
												</a>
											</div>
											</td>
										</tr>
										<?php $count++; endforeach; ?>
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
<?=script_tag('user/js/common.js');?>
<!-- Latest compiled and minified JavaScript -->
<?=script_tag('admin/plugins/bootstrap-selectable/js/bootstrap-select.min.js');?>
<!-- Datatables-->
<?=script_tag('admin/plugins/datatables/jquery.dataTables.min.js');?>
<?=script_tag('admin/plugins/datatables/dataTables.bootstrap.js');?>
<script src="//cdn.datatables.net/plug-ins/1.10.11/api/fnFilterClear.js"></script>
<script>
$('.selectpicker').selectpicker({
  style: 'btn-info',
  liveSearch:true
});

$(document).ready(function() {
    var dataTable = $('#datatable').dataTable();
    
    $('select#search_by_grade').change( function() 
    { 
        if($(this).val() == 0)
        {
            dataTable.fnFilter('',1);
        }
        else
        {
            dataTable.fnFilter( $(this).val(),1,true,false); 
        }
    });
});

</script>
<?php
    $content = ob_get_contents();
    ob_end_clean();
    echo $content;
}
?>