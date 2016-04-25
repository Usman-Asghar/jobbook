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
                                                            <label for="job_no">Job ID</label>
                                                            <input type="text" class="form-control" placeholder="A unique job ID" name="job_no" id="job_no" autofocus />
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
                                                            <label for="start_date">Start Date</label>
                                                            <input type="text" class="form-control" placeholder="Job Opening Date" name="start_date" id="start_date" />
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <div class="form-group">
                                                            <label for="deadline_date">Deadline Date</label>
                                                            <input type="text" class="form-control" placeholder="Job Closing Date" name="deadline_date" id="deadline_date" />
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-sm-12">
                                                        <div class="form-group">
                                                            <label for="job_desc">Job Description</label>
                                                            <textarea class="form-control" name="job_desc" id="job_desc" placeholder="Describe as much detail about the job as possible" rows="5"></textarea>
                                                        </div>
                                                    </div>                                                    
                                                </div>
                                                <div class="row">
                                                    <div class="col-sm-6">
                                                        <div class="form-group">
                                                            <label for="assigned_to">Assigned To</label>
                                                            <select class="form-control" name="assigned_to" id="assigned_to">
                                                                <option value=""> - Select - </option>
                                                                <?php foreach($users as $u): ?>
                                                                    <option value="<?=$u->user_id?>" >
                                                                        <?=$u->fname.' '.$u->lname?>
                                                                    </option>
                                                                <?php endforeach; ?>
                                                            </select>
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
                                                            <label for="job_no">Job ID</label>
                                                            <input type="text" class="form-control" placeholder="A unique job ID" name="job_no" id="job_no_u" readonly />
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
                                                    <div class="col-sm-6">
                                                        <div class="form-group">
                                                            <label for="start_date">Start Date</label>
                                                            <input type="text" class="form-control" placeholder="Job Opening Date" name="start_date" id="start_date_u" />
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <div class="form-group">
                                                            <label for="deadline_date">Deadline Date</label>
                                                            <input type="text" class="form-control" placeholder="Job Closing Date" name="deadline_date" id="deadline_date_u" />
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-sm-12">
                                                        <div class="form-group">
                                                            <label for="job_desc">Job Description</label>
                                                            <textarea class="form-control" name="job_desc" id="job_desc_u" placeholder="Describe as much detail about the job as possible" rows="5"></textarea>
                                                        </div>
                                                    </div>                                                    
                                                </div>
                                                <div class="row">
                                                    <div class="col-sm-6">
                                                        <div class="form-group">
                                                            <label for="assigned_to">Assigned To</label>
                                                            <select class="form-control" name="assigned_to" id="assigned_to_u">
                                                                <option value="0"> - Select - </option>
                                                                <?php foreach($users as $u): ?>
                                                                    <option value="<?=$u->user_id?>" >
                                                                        <?=$u->fname.' '.$u->lname?>
                                                                    </option>
                                                                <?php endforeach; ?>
                                                            </select>
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
                                        <table class="table table-striped table-bordered nowrap"
                                               cellspacing="0" width="100%">
                                            <thead>
                                                <tr>
                                                    <th>Job ID</th>
                                                    <th>Title</th>
                                                    <th>Description</th>
                                                    <th>Assigned To</th>
                                                    <th>Actions</th>
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
                                                    <td><?=$job->assigned_to;?></td>
                                                    <td>
                                                        <div class="btn-group-sm">
                                                        <a href="#" onclick="edit_item(<?=$job->job_id;?>,'<?=base_url('admin/jobs_XHR/update')?>');" class="btn btn-success waves-effect waves-light tooltips" data-placement="top" data-toggle="tooltip" data-original-title="Edit">
                                                            <i class="fa fa-pencil"></i>
                                                        </a>
                                                        <a href="#" onclick="delete_item(<?=$job->job_id;?>,'<?=base_url('admin/jobs_XHR/remove')?>');" class="btn btn-danger waves-effect waves-light tooltips" data-placement="top" data-toggle="tooltip" data-original-title="Delete">
                                                            <i class="fa fa-close"></i>
                                                        </a>
                                                    </div>
                                                    </td>
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

<?=script_tag('admin/plugins/bootstrap-datepicker/js/bootstrap-datepicker.js');?>
<?=script_tag('admin/js/jobs.js');?>