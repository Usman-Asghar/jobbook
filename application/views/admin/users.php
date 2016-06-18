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
                                            <form name="add_form" id="add_form" onsubmit="return add_item('<?=base_url('admin/users/add_new');?>');" >
                                                <div class="row" >
                                                    <div class="col-sm-6">
                                                        <div class="form-group">
                                                            <label for="job_grade">Job Grade</label>
                                                            <select class="form-control" name="grade_id" id="grade_id">
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
                                                            <label for="fname">First Name</label>
                                                            <input type="text" class="form-control" placeholder="First Name" name="fname" id="fname" />
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-sm-6">
                                                        <div class="form-group">
                                                            <label for="lname">Last Name</label>
                                                            <input type="text" class="form-control" placeholder="Last Name" name="lname" id="lname" />
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <div class="form-group">
                                                            <label for="email">Email</label>
                                                            <input type="email" class="form-control" placeholder="Email" name="email" id="email" />
                                                        </div>
                                                    </div> 
                                                </div>
                                                <div class="row">
                                                    <div class="col-sm-6">
                                                        <div class="form-group">
                                                            <label for="password">Password</label>
                                                            <input type="password" class="form-control" placeholder="Password" name="password" id="password" />
                                                        </div>
                                                    </div>
                                                    
                                                </div>
                                                    <div class="row" >
                                                        <div class="col-sm-6">
                                                            <div class="input-group">
                                                                <input type="submit" name="submit" class="btn btn-primary" id="submit" value="Add"/>&nbsp;
                                                                <input type="reset" value="Reset" class="btn btn-danger" />
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
                                            <form name="update_form" id="update_form" onsubmit="return update_item('<?=base_url('admin/users/update');?>');" >
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
                                                            <label for="fname_u">First Name</label>
                                                            <input type="text" class="form-control" placeholder="First Name" name="fname" id="fname_u" />
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-sm-6">
                                                        <div class="form-group">
                                                            <label for="lname_u">Last Name</label>
                                                            <input type="text" class="form-control" placeholder="Last Name" name="lname" id="lname_u" />
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <div class="form-group">
                                                            <label for="email_u">Email</label>
                                                            <input type="email" class="form-control" placeholder="Email" name="email" id="email_u" />
                                                        </div>
                                                    </div> 
                                                </div>
                                                <div class="row">
                                                    <div class="col-sm-6">
                                                        <div class="form-group">
                                                            <label for="password_u">Password</label>
                                                            <input type="password" class="form-control" placeholder="Password" name="password" id="password_u" />
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
                                    <table id="datatable" class="table table-striped table-bordered nowrap" cellspacing="0" width="100%">
                                        <thead>
                                            <tr>
                                                <th>Sr. No</th>
                                                <th>User Job Grade</th>
                                                <th>First Name</th>
                                                <th>Last Name</th>
                                                <th>Email</th>
                                                <th>Status</th>
                                                <th>Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $count=1; ?>

                                            <?php foreach($users as $user): ?>
                                            <tr>
                                                <td><?=$count;?></td>
                                                <td><?=$user->grade_name;?></td>
                                                <td><?=ucfirst($user->fname);?></td>
                                                <td><?=ucfirst($user->lname);?></td>
                                                <td><?=$user->email;?></td>
                                                <td><?php if($user->profile_status == '1'){echo 'Active';}else{echo 'Deactive';} ?></td>
                                                <td>
                                                <div class="btn-group-sm">
                                                    <a href="javascript:;" onclick="edit_item(<?=$user->user_id;?>,'<?=base_url('admin/users/update')?>');" class="btn btn-success waves-effect waves-light tooltips" data-placement="top" data-toggle="tooltip" data-original-title="Edit">
                                                            <i class="fa fa-pencil"></i>
                                                    </a>
                                                    <a href="javascript:;" onclick="delete_item(<?=$user->user_id;?>,'<?=base_url('admin/users/remove')?>');" class="btn btn-danger waves-effect waves-light tooltips" data-placement="top" data-toggle="tooltip" data-original-title="Delete">
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
<!-- Latest compiled and minified JavaScript -->
<?=script_tag('admin/plugins/bootstrap-selectable/js/bootstrap-select.min.js');?>
<!-- Datatables-->
<?=script_tag('admin/plugins/datatables/jquery.dataTables.min.js');?>
<?=script_tag('admin/plugins/datatables/dataTables.bootstrap.js');?>
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