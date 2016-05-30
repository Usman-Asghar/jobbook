<?=link_tag('admin/plugins/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css');?>
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
						<div class="panel panel-default">
							<div class="panel-heading">
								<h3 class="panel-title">
									Grades Listing
									<a href="javascript:add_request();" class="pull-right" title="Add"><i class="glyphicon glyphicon-plus" class="plus"></i></a>
								</h3>                                        
							</div>

							<div class="alert alert-success alert-dismissable" id="success_message"></div>
							<div class="alert alert-danger alert-dismissable" id="error_message"></div>
	
							<div class="col-xlg-4 noshow" id="add_form_holder">
								<div class="panel panel-primary">
									<div class="panel-heading">
										Add New Grade
										<a onclick="javascript:close_it('add_form_holder');" title="Close" class="pull-right">
											<i class="glyphicon glyphicon-remove"></i>
										</a>
									</div>
								<div class="panel-body">
									<form name="add_form" id="add_form" onsubmit="return add_item('<?=base_url('admin/grades/add_new');?>');" >
										<div class="row" >
											<div class="col-sm-6">
												<div class="form-group">
													<label for="job_no">Grade Name</label>
													<input type="text" class="form-control" placeholder="Grade Name" name="grade_name" id="grade_name" autofocus />
												</div>
											</div>
                                                                                        <div class="col-sm-6">
												<div class="form-group">
													<label for="job_no">Grade Color for Calendar View</label>
													<input type="color" class="form-control" placeholder="Grade Name" name="grade_color" id="grade_color" autofocus />
												</div>
											</div>
										</div>                                              
										<div class="row" >
											<div class="col-sm-6">
												<div class="input-group">
													<input type="submit" name="submit" class="btn btn-primary" id="submit" value="Add"/>&nbsp;
													<input type="reset" value="Reset" class="btn btn-primary" />
												</div>
											</div>
										</div>
									</form>
								</div>                              
							  </div>
							</div>

							<div class="col-xlg-4 noshow" id="update_form_holder">
								<div class="panel panel-primary">
									<div class="panel-heading">
										Update Job
										<a onclick="javascript:close_it('update_form_holder');" title="Close" class="pull-right">
											<i class="glyphicon glyphicon-remove"></i>
										</a>
									</div>
								<div class="panel-body">
									<form name="update_form" id="update_form" onsubmit="return update_item('<?=base_url('admin/grades/update');?>');" >
										<div class="row" >
											<div class="col-sm-6">
												<div class="form-group">
													<label for="job_title">Grade Name</label>
													<input type="text" class="form-control" placeholder="Grade Name" name="grade_name" id="grade_name_u" />
												</div>
											</div>
                                                                                        <div class="col-sm-6">
												<div class="form-group">
													<label for="job_no">Grade Color for Calendar View</label>
													<input type="color" class="form-control" placeholder="Grade Name" name="grade_color" id="grade_color_u" autofocus />
												</div>
											</div>
										</div>
										                                               
										<div class="row" >
											<div class="col-sm-6">
												<div class="input-group">
													<input type="hidden" id="record_id" name="record_id" />
													<input type="submit" name="submit" class="btn btn-primary" id="submit" value="Update"/>
												</div>
											</div>
										</div>
									</form>
								</div>                              
							  </div>
							</div>

							<div class="panel-body" id="content" class="content-limit-500">
								<table id="datatable" class="table table-striped table-bordered nowrap"
									   cellspacing="0" width="100%">
									<thead>
										<tr>
											<th>Sr. No</th>
											<th>Grade Name</th>
											<th>Status</th>
											<th>Actions</th>
										</tr>
									</thead>
									<tbody>
										<?php $count=1; foreach($grades as $grade): ?>
										<tr>
											<td><?=$count;?></td>
											<td><?=$grade->grade_name?></td>
											<td><?=$grade->grade_status == 1 ? 'Active' : 'Deactive' ?></td>
											<td>
												<div class="btn-group-sm">
												<a href="#" onclick="edit_item(<?=$grade->grade_id;?>,'<?=base_url('admin/grades/update')?>');" class="btn btn-success waves-effect waves-light tooltips" data-placement="top" data-toggle="tooltip" data-original-title="Edit">
													<i class="fa fa-pencil"></i>
												</a>
												<a href="#" onclick="delete_item(<?=$grade->grade_id;?>,'<?=base_url('admin/grades/remove')?>');" class="btn btn-danger waves-effect waves-light tooltips" data-placement="top" data-toggle="tooltip" data-original-title="Delete">
													<i class="fa fa-close"></i>
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
<!-- Datatables-->
<?=script_tag('admin/plugins/datatables/jquery.dataTables.min.js');?>
<?=script_tag('admin/plugins/datatables/dataTables.bootstrap.js');?>
<script>
$(document).ready(function() {
$('#datatable').dataTable();
} );

</script>
<?php
    $content = ob_get_contents();
    ob_end_clean();
    echo $content;
}
?>