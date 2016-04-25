<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?=$page_title?></title>
    <!-- Core CSS - Include with every page -->
    <link href="<?=assets_url();?>css/bootstrap.min.css" rel="stylesheet">
    <link href="<?=assets_url();?>font-awesome/css/font-awesome.css" rel="stylesheet">
  
    <link href="<?=assets_url();?>css/admin/sb-admin.css" rel="stylesheet">

   <!-- jQuery Version 1.11.0 -->
	 <script src="<?=assets_url('js/jquery.js')?>"></script>
   <script src="<?=assets_url();?>3rd-Party-Plugins/QRCode/jquery.classyqr.min.js" ></script>
   <script src="<?=assets_url();?>3rd-Party-Plugins/say-cheese-master/say-cheese.js" ></script>
   <script src="<?=assets_url('js/bootbox.js');?>"></script>
   <script src="<?=assets_url('js/admin/common.js');?>"></script>
   <script type="text/javascript">
		var global = { base_url : "<?=base_url()?>" }
   </script>

</head>
<body>

    <div id="wrapper">