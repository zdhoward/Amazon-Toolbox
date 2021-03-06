<?php
require_once('authenticate.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
	<link rel="icon" type="image/png" href="../assets/img/favicon.png">

	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
	<title>Amazon Report Toolbox</title>

	<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />

    <link href="../bootstrap3/css/bootstrap.css" rel="stylesheet" />
	<link href="../assets/css/gsdk.css" rel="stylesheet" />
    <link href="../assets/css/demo.css" rel="stylesheet" />

    <!--     Font Awesome     -->
    <link href="../bootstrap3/css/font-awesome.css" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Grand+Hotel' rel='stylesheet' type='text/css'>
</head>
<body>
<div id="navbar-full">
    <div class="container">

    </div><!--  end container-->

    <div class='blurred-container'>
        <div class="motto">
            <div class="border">S</div>
            <div class="border">B</div>
						<div class="border">T</div>
            <div>Reports</div>
        </div>
        <div class="img-src" style="background-image: url('../assets/img/cover_SBT.jpg')"></div>
        <div class='img-src blur' style="background-image: url('../assets/img/cover_SBT_blur.jpg')"></div>
    </div>

</div>



<div class="main">
    <div class="container tim-container">

        <div class="tim-title">
            <h2>Amazon Toolbox</h2>
        </div>

				<div>
					<table class='pure-table pure-table-horizontal'>
					  <thead>
					    <tr>
					      <th><h3>Name</h3></th><th><h3>Description</h3></th>
					    </tr>
					  </thead>
					  <tbody>
					    <tr>
					      <td><a href='amazonReport.php' target='_blank'><button class="btn btn-block btn-sm btn-info btn-fill">Amazon Report</button></a></td>
					      <td><a href='amazonReport.php' target='_blank'><button class="btn btn-block btn-sm btn-info">Shows the normal Amazon Report.</button></a></td>
					    </tr>
					    <tr>
					      <td><a href='fullAmazonReport.php' target='_blank'><button class="btn btn-block btn-sm btn-info btn-fill">Full Amazon Report</button></a></td>
					      <td><a href='fullAmazonReport.php' target='_blank'><button class="btn btn-block btn-sm btn-info">Shows the normal Amazon Report, including the hidden products.</button></a></td>
					    </tr>
					    <tr>
					      <td><a href='addProduct.php' target='_blank'><button class="btn btn-block btn-sm btn-success btn-fill">Add New Product</button></a></td>
					      <td><a href='addProduct.php' target='_blank'><button class="btn btn-block btn-sm btn-success">Allows you to add a new product to the database.</button></a></td>
					    </tr>
					    <tr>
					    <tr>
					      <td><a href='addTotalSold.php' target='_blank'><button class="btn btn-block btn-sm btn-success btn-fill">Add Total Sold</button></a></td>
					      <td><a href='addTotalSold.php' target='_blank'><button class="btn btn-block btn-sm btn-success">Allows you to add quantites to the total amounts a product has sold.</button></a></td>
					    </tr>
					    <tr>
					      <td><a href='addBackordered.php' target='_blank'><button class="btn btn-block btn-sm btn-success btn-fill">Add Backordered</button></a></td>
					      <td><a href='addBackordered.php' target='_blank'><button class="btn btn-block btn-sm btn-success">Allows you to add quantites to the backordered amounts for any product.</button></a></td>
					    </tr>
					    <tr>
					      <td><a href='removeBackordered.php' target='_blank'><button class="btn btn-block btn-sm btn-success btn-fill">Remove Backordered</button></a></td>
					      <td><a href='removeBackordered.php' target='_blank'><button class="btn btn-block btn-sm btn-success">Allows you to remove quantites to the backordered amounts for any product.</button></a></td>
					    </tr>
					    <tr>
					      <td><a href='setEmptySKUs.php' target='_blank'><button class="btn btn-block btn-sm btn-success btn-fill">Set Empty SKU</button></a></td>
					      <td><a href='setEmptySKUs.php' target='_blank'><button class="btn btn-block btn-sm btn-success">Looks for products that don't have a SKU yet, allow to add one.</button></a></td>
					    </tr>
					    <tr>
					      <td><a href='setProduct.php' target='_blank'><button class="btn btn-block btn-sm btn-success btn-fill">Set Product</button></a></td>
					      <td><a href='setProduct.php' target='_blank'><button class="btn btn-block btn-sm btn-success">Allows you to set many parameters of a product.</button></a></td>
					    </tr>
					    <tr>
					      <td><a href='setMAP.php' target='_blank'><button class="btn btn-block btn-sm btn-success btn-fill">Set MAP</button></a></td>
					      <td><a href='setMAP.php' target='_blank'><button class="btn btn-block btn-sm btn-success">Allows you to set the MAP price for any product.</button></a></td>
					    </tr>
					    <tr>
					      <td><a href='setLandedCost.php' target='_blank'><button class="btn btn-block btn-sm btn-success btn-fill">Set Landed Cost</button></a></td>
					      <td><a href='setLandedCost.php' target='_blank'><button class="btn btn-block btn-sm btn-success">Allows you to set the landed cost for any product.</button></a></td>
					    </tr>
					    <tr>
					      <td><a href='setMinimumInventory.php' target='_blank'><button class="btn btn-block btn-sm btn-success btn-fill">Set Minimum Inventory</button></a></td>
					      <td><a href='setMinimumInventory.php' target='_blank'><button class="btn btn-block btn-sm btn-success">Allows you to set the minimum inventory amount for any product.</button></a></td>
					    </tr>
					    <tr>
					      <td><a href='viewListings.php' target='_blank'><button class="btn btn-block btn-sm btn-warning btn-fill">View Listings</button></a></td>
					      <td><a href='viewListings.php' target='_blank'><button class="btn btn-block btn-sm btn-warning">Generate links to the Amazon Listing of each product we sell.</button></a></td>
					    </tr>
					    <tr>
					      <td><a href='checkOtherFBA.php' target='_blank'><button class="btn btn-block btn-sm btn-warning btn-fill">Check Other FBA</button></a></td>
					      <td><a href='checkOtherFBA.php' target='_blank'><button class="btn btn-block btn-sm btn-warning">Checks to see if anyone other than us is selling FBA (including Amazon themselves).</button></a></td>
					    </tr>
					    <tr>
					      <td><a href='checkOurFBA.php' target='_blank'><button class="btn btn-block btn-sm btn-warning btn-fill">Check Our FBA</button></a></td>
					      <td><a href='checkOurFBA.php' target='_blank'><button class="btn btn-block btn-sm btn-warning">Checks to see what products only we sell as FBA products.</button></a></td>
					    </tr>
					    <tr>
					      <td><a href='checkPricing.php' target='_blank'><button class="btn btn-block btn-sm btn-warning btn-fill">Check Pricing</button></a></td>
					      <td><a href='checkPricing.php' target='_blank'><button class="btn btn-block btn-sm btn-warning">Compares all pricing to ensure profits and avoid losses.</button></a></td>
					    </tr>
					    <tr>
					      <td><a href='checkInventory.php' target='_blank'><button class="btn btn-block btn-sm btn-warning btn-fill">Check Inventory</button></a></td>
					      <td><a href='checkInventory.php' target='_blank'><button class="btn btn-block btn-sm btn-warning">Compares all minimum quantities to current inventory + inbound shipments.</button></a></td>
					    </tr>
					    <tr>
					      <td><a href='checkInventoryLevels.php' target='_blank'><button class="btn btn-block btn-sm btn-warning btn-fill">Check Inventory Levels</button></a></td>
					      <td><a href='checkInventoryLevels.php' target='_blank'><button class="btn btn-block btn-sm btn-warning">Checks total Amazon quantities for annual inventory checking.</button></a></td>
					    </tr>
					    <tr>
					      <td><a href='checkBuyBox.php' target='_blank'><button class="btn btn-block btn-sm btn-warning btn-fill">Check Buy Box</button></a></td>
					      <td><a href='checkBuyBox.php' target='_blank'><button class="btn btn-block btn-sm btn-warning">Compares all buy boxes, filtering out buy boxes lost from lack of inventory.</button></a></td>
					    </tr>
					    <tr>
					      <td><a href='checkInventoryTurnRate.php' target='_blank'><button class="btn btn-block btn-sm btn-warning btn-fill">Check Inventory Turn Rate</button></a></td>
					      <td><a href='checkInventoryTurnRate.php' target='_blank'><button class="btn btn-block btn-sm btn-warning">WIP - Sales / Inventory Cost - And some other useful sales info.</button></a></td>
					    </tr>
					    <tr>
					      <td><a href='monday.php' target='_blank'><button class="btn btn-block btn-sm btn-default btn-fill">Monday</button></a></td>
					      <td><a href='monday.php' target='_blank'><button class="btn btn-block btn-sm btn-default">My typical work on Monday.</button></a></td>
					    </tr>
					    <tr>
					      <td><a href='backup.php' target='_blank'><button class="btn btn-block btn-sm btn-danger btn-fill">Backup</button></a></td>
					      <td><a href='backup.php' target='_blank'><button class="btn btn-block btn-sm btn-danger">Backup the database into a csv.</button></a></td>
					    </tr>
					    <tr>
					      <td><a href='restore.php' target='_blank'><button class="btn btn-block btn-sm btn-danger btn-fill">Restore - <b>DANGEROUS</b></button></a></td>
					      <td><a href='restore.php' target='_blank'><button class="btn btn-block btn-sm btn-danger">Restore a previous backup from a list of them.</button></a></td>
					    </tr>
					  </tbody>
					</table>
				</div>
    </div>
</div>

</div> <!-- end menu-dropdown -->

<div class="space"></div>

<!-- end main -->

<div class="parallax-pro">
    <div class="img-src" style="background-image: url('http://get-shit-done-pro.herokuapp.com/assets/img/bg6.jpg');"></div>
    <div class="container">
        <div class="row">
            <div class="col-md-12 text-center">
                <h1>
                    <small>
                       Now go make some money on Amazon<a>
                    </small>
                </h1>
            </div>
        </div>
        <div class="space-30"></div>
        <div class="row">
             <div class="col-md-12 text-center">
                <div class="credits">
                    &copy; <script>document.write(new Date().getFullYear())</script> Get Shit Done Kit by <a href="http://creative-tim.com"> Creative Tim</a>, made with <i class="fa fa-heart heart" alt="love"></i> for a better web.
                </div>
            </div>
        </div>
    </div>

</div>

</body>

    <script src="jquery/jquery-1.10.2.js" type="text/javascript"></script>
	<script src="assets/js/jquery-ui-1.10.4.custom.min.js" type="text/javascript"></script>

	<script src="bootstrap3/js/bootstrap.js" type="text/javascript"></script>
	<script src="assets/js/gsdk-checkbox.js"></script>
	<script src="assets/js/gsdk-radio.js"></script>
	<script src="assets/js/gsdk-bootstrapswitch.js"></script>
	<script src="assets/js/get-shit-done.js"></script>
    <script src="assets/js/custom.js"></script>

<script type="text/javascript">

    $('.btn-tooltip').tooltip();
    $('.label-tooltip').tooltip();
    $('.pick-class-label').click(function(){
        var new_class = $(this).attr('new-class');
        var old_class = $('#display-buttons').attr('data-class');
        var display_div = $('#display-buttons');
        if(display_div.length) {
        var display_buttons = display_div.find('.btn');
        display_buttons.removeClass(old_class);
        display_buttons.addClass(new_class);
        display_div.attr('data-class', new_class);
        }
    });
    $( "#slider-range" ).slider({
		range: true,
		min: 0,
		max: 500,
		values: [ 75, 300 ],
	});
	$( "#slider-default" ).slider({
			value: 70,
			orientation: "horizontal",
			range: "min",
			animate: true
	});
	$('.carousel').carousel({
      interval: 4000
    });


</script>
</html>
