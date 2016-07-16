<?=link_tag('admin/plugins/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css');?>
<?=link_tag('admin/plugins/bootstrap-selectable/css/bootstrap-select.min.css');?>
<?=link_tag('admin/plugins/datatables/jquery.dataTables.min.css');?>
<?=link_tag('admin/js/lib/uploadify.css');?>
<?php $this->session->set_userdata('privateFiles', array()); ?>
<?php $this->session->set_userdata('publicFiles', array()); ?>
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
									Jobs Listing
                                                                        <a href="javascript:add_request();" class="pull-right" title="Add"><i class="glyphicon glyphicon-plus" class="plus"></i></a>
								</h3>                                        
							</div>

							<div class="alert alert-success alert-dismissable" id="success_message"></div>
							<div class="alert alert-danger alert-dismissable" id="error_message"></div>
	
							<div class="col-xlg-4 noshow" id="add_form_holder">
								<div class="panel panel-primary">
									<div class="panel-heading">
										Add New Job
										<a onclick="javascript:close_it('add_form_holder');" title="Close" class="pull-right">
											<i class="glyphicon glyphicon-remove"></i>
										</a>
									</div>
								<div class="panel-body">
									<form name="add_form" id="add_form" onsubmit="return add_item('<?=base_url('admin/jobs_XHR/add_new');?>');" >
										<div class="row" >
											<div class="col-sm-6">
												<div class="form-group">
													<label for="job_grade">Job Grade</label>
													<select class="form-control" name="grade_id" id="grade_id">
														<option value=""> - Select - </option>
														<?php foreach($grades as $g): ?>
															<option value="<?=$g->grade_id?>" >
																<?=$g->grade_name?>
															</option>
														<?php endforeach; ?>
													</select>
												</div>
											</div>
											<div class="col-sm-6">
												<div class="form-group">
													<label for="job_title">Job Title</label>
													<input type="text" class="form-control" placeholder="Title of the job" name="job_title" id="job_title" />
												</div>
											</div>
										</div>
										<div class="row">
											<div class="col-sm-6">
												<div class="form-group">
													<label for="deadline_date">Deadline Date</label>
													<input type="text" class="form-control" placeholder="Job Closing Date" name="deadline_date" id="deadline_date" />
												</div>
											</div>
											<div class="col-sm-6">
												<div class="form-group">
													<label for="job_desc">Job Description</label>
													<textarea class="form-control" name="job_desc" id="job_desc" placeholder="Describe as much detail about the job as possible" rows="5"></textarea>
												</div>
											</div> 
										</div>
                                                                            <div class="row">
                                                                                <div class="col-sm-6">
                                                                                    <div class="form-group">
                                                                                        <label for="deadline_date">Public Attachments</label>
                                                                                        <div class="uploadify-queue" id="file-queue-public"></div>
                                                                                        <input type="file" name="userfile" id="upload_btn_public" />
                                                                                        <a href="javascript:$('#upload_btn_public').uploadify('upload', '*')">Upload the Files</a>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-sm-6">
                                                                                    <div class="form-group">
                                                                                        <label for="job_desc">Private Attachments</label>
                                                                                        <div class="uploadify-queue" id="file-queue-private"></div>
                                                                                        <input type="file" name="userfile" id="upload_btn_private" />
                                                                                        <a href="javascript:$('#upload_btn_private').uploadify('upload', '*')">Upload the Files</a>
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
									<form name="update_form" id="update_form" onsubmit="return update_item('<?=base_url('admin/jobs_XHR/update');?>');" >
										<div class="row" >
											<div class="col-sm-6">
												<div class="form-group">
													<label for="job_grade">Job Grade</label>
													<select class="form-control" name="grade_id" id="grade_id_u">
														<option value="0"> - Select - </option>
														<?php foreach($grades as $g): ?>
															<option value="<?=$g->grade_id?>" >
																<?=$g->grade_name?>
															</option>
														<?php endforeach; ?>
													</select>
												</div>
											</div>
											<div class="col-sm-6">
												<div class="form-group">
													<label for="job_title">Job Title</label>
													<input type="text" class="form-control" placeholder="Title of the job" name="job_title" id="job_title_u" />
												</div>
											</div>
										</div>
										<div class="row">
											<!--<div class="col-sm-6">
												<div class="form-group">
													<label for="start_date">Start Date</label>
													<input type="text" class="form-control" placeholder="Job Opening Date" name="start_date" id="start_date" />
												</div>
											</div>-->
											<div class="col-sm-6">
												<div class="form-group">
													<label for="deadline_date">Deadline Date</label>
													<input type="text" class="form-control" placeholder="Job Closing Date" name="deadline_date" id="deadline_date_u" />
												</div>
											</div>
											<div class="col-sm-6">
												<div class="form-group">
													<label for="job_desc">Job Description</label>
													<textarea class="form-control" name="job_desc" id="job_desc_u" placeholder="Describe as much detail about the job as possible" rows="5"></textarea>
												</div>
											</div> 
										</div>
										<!--<div class="row">
											                                                   
										</div>-->
										<!--<div class="row">
											<div class="col-sm-6">
												<div class="form-group">
													<label for="assigned_to">Assigned To</label>
													<select class="form-control selectpicker" name="assigned_to" id="assigned_to">
														<option value=""> - Select - </option>
														<?php foreach($users as $u): ?>
															<option value="<?=$u->user_id?>" >
																<?=$u->fname.' '.$u->lname?>
															</option>
														<?php endforeach; ?>
													</select>
												</div>
											</div>
										</div>-->                                                
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
											<th>Assigned To</th>
											<th>Description</th>
											<th>Start Date</th>
											<th>End Date</th>
											<th>Actions</th>
                                                                                        <th>Applicants</th>
										</tr>
									</thead>
									<tbody>
										<?php $count=1; ?>

										<?php foreach($jobs as $job): ?>
										<tr>
											<td><?=$count?></td>
                                                                                        <td><?=$job->grade_name?></td>
											<td><?=$job->job_title?></td>
											<td><?php if(!$job->fname): ?>Not Assigned<?php endif; ?><?=ucfirst($job->fname);?> <?=ucfirst($job->lname);?></td>
											<td><?=$job->job_desc?></td>
											<td><?=date('M-d-Y', strtotime(str_replace('-','/', $job->start_date)));?></td>
											<td><?=date('M-d-Y', strtotime(str_replace('-','/', $job->deadline_date)));?></td>
											<td>
												<div class="btn-group-sm">
												<a href="#" onclick="edit_item(<?=$job->job_id;?>,'<?=base_url('admin/jobs_XHR/update')?>');" class="btn btn-success waves-effect waves-light tooltips" data-placement="top" data-toggle="tooltip" data-original-title="Edit">
													<i class="fa fa-pencil"></i>
												</a>
												<a href="#" onclick="delete_item(<?=$job->job_id;?>,'<?=base_url('admin/jobs_XHR/remove')?>');" class="btn btn-danger waves-effect waves-light tooltips" data-placement="top" data-toggle="tooltip" data-original-title="Delete">
													<i class="fa fa-close"></i>
												</a>
											</div>
                                                                                        <td><a href="<?=base_url('admin/jobs/applicants/'.$job->job_id.'')?>">Job Applicants</a></td>
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
<!-- Latest compiled and minified JavaScript -->
<?=script_tag('admin/plugins/bootstrap-selectable/js/bootstrap-select.min.js');?>
<!-- Datatables-->
<?=script_tag('admin/plugins/datatables/jquery.dataTables.min.js');?>
<?=script_tag('admin/plugins/datatables/dataTables.bootstrap.js');?>
<script src="//cdn.datatables.net/plug-ins/1.10.11/api/fnFilterClear.js"></script>

<?=script_tag('admin/js/lib/jquery.uploadify-3.1.min.js');?>  

<script>
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

 $('#upload_btn_private').uploadify({
  'debug'   : false,
  'swf'   : '<?php echo base_url() ?>assets/admin/js/lib/uploadify.swf',
  'uploader'  : '<?php echo base_url('admin/jobs_XHR/uploadprivateFiles')?>',
  'cancelImage' : '<?php echo base_url() ?>assets/admin/js/lib/uploadify-cancel.png',
  'queueID'  : 'file-queue-private',
  'buttonClass'  : 'button',
  'multi'   : true,
  'auto'   : false,
  'fileTypeExts' : '*.jpg; *.png; *.gif; *.PNG; *.JPG; *.GIF; *.pdf; *.docx; *.xlsx; *.pptx;',
  'fileTypeDesc' : 'Image Files',
  'method'  : 'post',
  'fileObjName' : 'userfile',
  'queueSizeLimit': 40,
  'simUploadLimit': 2,
  'sizeLimit'  : 10240000,
      /*'onUploadSuccess' : function(file, data, response) {
        alert('The file ' + file.name + ' was successfully uploaded with a response of ' + response + ':' + data);
   },
    'onUploadComplete' : function(file) {
        alert('The file ' + file.name + ' finished processing.');
   },*/
    'onQueueFull': function(event, queueSizeLimit) {
        alert("Please don't put anymore files in me! You can upload " + queueSizeLimit + " files at once");
        return false;
    }
    });
    
 $('#upload_btn_public').uploadify({
  'debug'   : false,
  'swf'   : '<?php echo base_url() ?>assets/admin/js/lib/uploadify.swf',
  'uploader'  : '<?php echo base_url('admin/jobs_XHR/uploadpublicFiles')?>',
  'cancelImage' : '<?php echo base_url() ?>assets/admin/js/lib/uploadify-cancel.png',
  'queueID'  : 'file-queue-public',
  'buttonClass'  : 'button',
  'multi'   : true,
  'auto'   : false,
  
   'fileTypeExts' : '*.jpg; *.png; *.gif; *.PNG; *.JPG; *.GIF; *.pdf; *.docx; *.xlsx; *.pptx;',
  'fileTypeDesc' : 'Image Files',
  'method'  : 'post',
  'fileObjName' : 'userfile',
  'queueSizeLimit': 40,
  'simUploadLimit': 2,
  'sizeLimit'  : 10240000,
    'onQueueFull': function(event, queueSizeLimit) {
        alert("Please don't put anymore files in me! You can upload " + queueSizeLimit + " files at once");
        return false;
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