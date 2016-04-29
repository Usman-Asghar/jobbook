<?=link_tag('admin/plugins/fullcalendar/dist/fullcalendar.css');?>
<?=link_tag('admin/plugins/select2/dist/css/select2.css');?>
<!-- Begin page -->
<div id="wrapper">
	<div class="container">
		<div class="content-page">
			<!-- Start content -->
			<div class="content">
				<div class="container">
					<div class="row">
						<div class="col-lg-12">

							<div class="row">
								<div class="col-md-12">
									<div class="panel panel-default">
										<div class="panel-heading">
											<h3 class="panel-title">
												Calendar View
											</h3>                                        
										</div>
										<div class="panel-body">
											<div class="row">
												<div class="col-md-12 col-sm-12 col-xs-12">
													<div id="calendar"></div>
												</div>
											</div>
										</div>
									</div>
								</div> <!-- end col -->
							</div>  <!-- end row -->

							<!-- BEGIN MODAL -->
							<div class="modal fade none-border" id="event-modal">
								<div class="modal-dialog">
									<div class="modal-content">
										<div class="modal-header">
											<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
											<h4 class="modal-title"><strong>Add Event</strong></h4>
										</div>
										<div class="modal-body"></div>
										<div class="modal-footer">
											<button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Close</button>
											<button type="button" class="btn btn-success save-event waves-effect waves-light">Create event</button>
											<button type="button" class="btn btn-danger delete-event waves-effect waves-light" data-dismiss="modal">Delete</button>
										</div>
									</div>
								</div>
							</div>

							<!-- Modal Add Category -->
							<div class="modal fade none-border" id="add-category">
								<div class="modal-dialog">
									<div class="modal-content">
										<div class="modal-header">
											<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
											<h4 class="modal-title"><strong>Add</strong> a category</h4>
										</div>
										<div class="modal-body">
											<form role="form">
												<div class="row">
													<div class="col-md-6">
														<label class="control-label">Category Name</label>
														<input class="form-control form-white" placeholder="Enter name" type="text" name="category-name">
													</div>
													<div class="col-md-6">
														<label class="control-label">Choose Category Color</label>
														<select class="form-control form-white" data-placeholder="Choose a color..." name="category-color">
															<option value="success">Success</option>
															<option value="danger">Danger</option>
															<option value="primary">Primary</option>
															<option value="warning">Warning</option>
															<option value="inverse">Inverse</option>
														</select>
													</div>
												</div>
											</form>
										</div>
										<div class="modal-footer">
											<button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Close</button>
											<button type="button" class="btn btn-danger waves-effect waves-light save-category" data-dismiss="modal">Save</button>
										</div>
									</div>
								</div>
							</div>
							<!-- END MODAL -->
						</div>
						<!-- end col-12 -->
					</div> <!-- end row -->
				</div> <!-- container -->
			</div> <!-- content -->
		</div>
	</div>
</div>
<!-- END wrapper -->
<?php
function getScripts()
{
    ob_start();
?>
<script>
	var CALENDAR_URL = '<?=base_url('jobs/get_calendar_jobs');?>';
</script>
<?=script_tag('admin/plugins/fullcalendar/dist/fullcalendar.min.js');?>
<?=script_tag('user/js/pages/jquery.fullcalendar.js');?>
<?php

    $content = ob_get_contents();
    ob_end_clean();
    echo $content;
}
?>