		<footer class="footer text-right">
			2015 © Moltran.
		</footer>

		</div>
		<!-- ============================================================== -->
		<!-- End Right content here -->
		<!-- ============================================================== -->
        </div>
        <!-- END wrapper -->
        <script>
            var resizefunc = [];
        </script>

        <?=script_tag('admin/js/bootstrap.min.js');?>
        <?=script_tag('admin/js/detect.js');?>
        <?=script_tag('admin/js/fastclick.js');?>
        <?=script_tag('admin/js/jquery.slimscroll.js');?>
        <?=script_tag('admin/js/jquery.blockUI.js');?>
        <?=script_tag('admin/js/waves.js');?>
        <?=script_tag('admin/js/wow.min.js');?>
        <?=script_tag('admin/js/jquery.nicescroll.js');?>
        <?=script_tag('admin/js/jquery.scrollTo.min.js');?>
        <?=script_tag('admin/js/jquery.app.js');?>
        <!-- moment js  -->
        <?=script_tag('admin/plugins/moment/moment.js');?>
        <!-- counters  -->
        <?=script_tag('admin/plugins/waypoints/lib/jquery.waypoints.js');?>
        <?=script_tag('admin/plugins/counterup/jquery.counterup.min.js');?>
        
        <!-- sweet alert  -->
        <?=script_tag('admin/plugins/sweetalert/dist/sweetalert.min.js');?>
        
        <!-- flot Chart -->
        <?=script_tag('admin/plugins/flot-chart/jquery.flot.js');?>
        <?=script_tag('admin/plugins/flot-chart/jquery.flot.time.js');?>
        <?=script_tag('admin/plugins/flot-chart/jquery.flot.tooltip.min.js');?>
        <?=script_tag('admin/plugins/flot-chart/jquery.flot.resize.js');?>
        <?=script_tag('admin/plugins/flot-chart/jquery.flot.pie.js');?>
        <?=script_tag('admin/plugins/flot-chart/jquery.flot.selection.js');?>
        <?=script_tag('admin/plugins/flot-chart/jquery.flot.stack.js');?>
        <?=script_tag('admin/plugins/flot-chart/jquery.flot.crosshair.js');?>

        <!-- todos app  -->
        <?=script_tag('admin/pages/jquery.todo.js');?>
        
        <!-- chat app  -->
        <?=script_tag('admin/pages/jquery.chat.js');?>
        
        <!-- dashboard  -->
        <?=script_tag('admin/pages/jquery.dashboard.js');?>
		
        <!-- BEGIN PAGE SCRIPTS -->
        <?php
			if(function_exists('getScripts'))
			{
				$scripts = getScripts();
			}
		?>
		
        <script type="text/javascript">
            jQuery(document).ready(function($) {
                $('.counter').counterUp({
                    delay: 100,
                    time: 1200
                });
            });
        </script>
    </body>
</html>