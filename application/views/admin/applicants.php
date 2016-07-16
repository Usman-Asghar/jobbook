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
                                                            Job Applicants
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
                                                                                    <th>Hours</th>
                                                                                    <th width="120px">Actions</th>
										</tr>
									</thead>
									<tbody>
										<?php $count=1; ?>

										<?php foreach($jobs as $job): ?>
										<tr>
											<td><?=$count?></td>
                                                                                        <td><?=$job->grade_name?></td>
											<td><?=$job->job_title?></td>
											<td><?=$job->job_desc?></td>
											<td><?=ucfirst($job->fname);?> <?=ucfirst($job->lname);?></td>
											<td><?=date('M-d-Y', strtotime(str_replace('-','/', $job->start_date)));?></td>
											<td><?=date('M-d-Y', strtotime(str_replace('-','/', $job->end_date)));?></td>
                                                                                        <td><?=$job->no_of_hours?></td>
											<td>
                                                                                            <?php
                                                                                            if($job->approved == 1)
                                                                                            {
                                                                                                echo '<span style="color:#33b86c;">Approved</span>';
                                                                                            }
                                                                                            else if($job->rejected == 1)
                                                                                            {
                                                                                                echo '<span style="color:#ef5350;">Rejected</span>';
                                                                                            }
                                                                                            else if($job->approved == 2)
                                                                                            {
                                                                                            ?>
                                                                                            <form action="https://www.sandbox.paypal.com/cgi-bin/webscr" method="post" target="_top">
                                                                                                <input type="hidden" name="cmd" value="_donations">
                                                                                                <input type="hidden" name="business" value="albert.maya7-buyer@gmail.com">
                                                                                                <input type="hidden" name="lc" value="US">
                                                                                                <input type="hidden" name="item_name" value="<?=$job->job_title?>">
                                                                                                <input type="hidden" name="no_note" value="0">
                                                                                                <input type="hidden" name="cn" value="Add special instructions to the seller:">
                                                                                                <input type="hidden" name="no_shipping" value="2">
                                                                                                <input type="hidden" name="rm" value="1">
                                                                                                <input type="hidden" name="return" value="<?=base_url();?>/admin/user_jobs/ammountPaid/1">
                                                                                                <input type="hidden" name="cancel_return" value="<?=base_url();?>/admin/user_jobs">
                                                                                                <input type="hidden" name="currency_code" value="USD">
                                                                                                <input type="hidden" name="bn" value="PP-DonationsBF:btn_donate_SM.gif:NonHosted">
                                                                                                <input type="image" src="https://www.paypalobjects.com/webstatic/en_US/btn/btn_paynow_107x26.png" border="0" name="submit" alt="PayPal - The safer, easier way to pay online!">
                                                                                                <img alt="" border="0" src="https://www.sandbox.paypal.com/en_US/i/scr/pixel.gif" width="1" height="1">
                                                                                            </form>
                                                                                            <?php
                                                                                            }
                                                                                            else
                                                                                            {
                                                                                            ?>
                                                                                            <div class="btn-group-sm">
												<a href="javascript:;" onclick="changeStatus('<?=base_url('admin/user_jobs/approve_user_job');?>',<?=$job->job_id;?>,<?=$job->user_id;?>)" class="btn btn-success waves-effect waves-light tooltips" data-placement="top" data-toggle="tooltip" data-original-title="Approve">
                                                                                                    Approve
												</a>
                                                                                                <a href="javascript:;" onClick="setValue(<?=$job->job_id;?>,<?=$job->user_id;?>)" data-toggle="modal" data-target="#custom-width-modal" class="btn btn-danger waves-effect waves-light tooltips" data-placement="top" data-toggle="tooltip" data-original-title="Reject">
                                                                                                    Reject
												</a>
                                                                                            </div>
                                                                                            <?php
                                                                                            }
                                                                                            ?>
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
<div id="custom-width-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="custom-width-modalLabel" aria-hidden="true" style="display: none">
    <div class="modal-dialog" style="width:55%">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title" id="custom-width-modalLabel">Reject Application</h4>
            </div>
            <form name="add_form" id="add_form" onsubmit="return add_item('<?=base_url('admin/user_jobs/reject_user_job');?>');" >
            <input type="hidden" name="job_id" id="job_id" />
            <input type="hidden" name="user_id" id="user_id" />
            <div class="alert alert-success alert-dismissable" id="success_message"></div>
            <div class="alert alert-danger alert-dismissable" id="error_message"></div>
            
            <div class="modal-body">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label for="deadline_date">Rejection Reason</label>
                            <input type="text" autofocus class="form-control" placeholder="Rejection Reason" name="rejection_reason" id="rejection_reason" />
                        </div>
                    </div>
                </div>
             </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Close</button>
                <button type="submit" id="submit" class="btn btn-primary waves-effect waves-light">Save changes</button>
            </div>
            </form>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
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
function setValue(jobId,userId)
{
    document.getElementById('job_id').value = jobId;
    document.getElementById('user_id').value = userId;
}
</script>
<?php
    $content = ob_get_contents();
    ob_end_clean();
    echo $content;
}
?>