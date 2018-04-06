<?php
// echo $_GET['id'];
    global $wpdb;
    $sql = $wpdb->prepare( "SELECT * ,(SELECT name FROM spt_suspect WHERE id=c.suspect_id) as suspectname,(SELECT name FROM spt_victim WHERE id=c.victim_id) as victimname FROM spt_cases as c ORDER BY c.id DESC","" );
    $cases       = $wpdb->get_results( $sql );
    // print_r($cases);

    $sql = $wpdb->prepare( "SELECT COUNT(id) as y,barangay as label  FROM spt_cases GROUP BY barangay","" );
    $brgys       = json_encode( $wpdb->get_results( $sql ),JSON_NUMERIC_CHECK );

    $sql = $wpdb->prepare( "SELECT COUNT(id) as y,municipalitycity as label  FROM spt_cases GROUP BY municipalitycity","" );
    $mun       = json_encode( $wpdb->get_results( $sql ),JSON_NUMERIC_CHECK );
    // echo $mun;
    // foreach($r as $r1){
    //   print_r($r1);
    //   echo "<br><br>";
    // }
?>
<h1>Violence Against Women and Children Reports</h1>

<script src="https://canvasjs.com/assets/script/jquery.canvasjs.min.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

<div id="chartBrgy" class="dialog" style="height: 250px; width: 100%;"></div>
<div id="chartMun" class="dialog" style="height: 250px; width: 100%;"></div>
<script>
var optionsBrgy = {
	animationEnabled: true,
	title: {
		text: "Crime rate per Barangay"
	},
	axisY: {
		title: "Number of Victims",
		suffix: "",
		includeZero: false
	},
	axisX: {
		title: "Barangays"
	},
	data: [{
		type: "column",
		yValueFormatString: "#,##0.0#",
    dataPoints: <?php echo $brgys ?>
    // [
		// 	{ label: "Iraq", y: 10.09 },	
		// 	{ label: "T & C Islands", y: 9.40 },
		// 	{ label: "Nauru", y: 8.50 },
		// 	{ label: "Ethiopia", y: 7.96 },	
		// 	{ label: "Uzbekistan", y: 7.80 },
		// 	{ label: "Nepal", y: 7.56 },
		// 	{ label: "Iceland", y: 7.20 }
		// ]
	}]
};
$("#chartBrgy").CanvasJSChart(optionsBrgy);

var optionsMun = {
	animationEnabled: true,
	title: {
		text: "Crime rate per Municipality / City"
	},
	axisY: {
		title: "Number of Victims",
		suffix: "",
		includeZero: false
	},
	axisX: {
		title: "Municipality / City"
	},
	data: [{
		type: "column",
		yValueFormatString: "#,##0.0#",
    dataPoints: <?php echo $mun ?>
    // [
		// 	{ label: "Iraq", y: 10.09 },	
		// 	{ label: "T & C Islands", y: 9.40 },
		// 	{ label: "Nauru", y: 8.50 },
		// 	{ label: "Ethiopia", y: 7.96 },	
		// 	{ label: "Uzbekistan", y: 7.80 },
		// 	{ label: "Nepal", y: 7.56 },
		// 	{ label: "Iceland", y: 7.20 }
		// ]
	}]
};
$("#chartMun").CanvasJSChart(optionsMun);

</script>