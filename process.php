<?php
if(!isset($_POST['action'])):
    echo "aa";
    die();
endif;

require_once 'wp-load.php';

$action = $_POST['action'];


if($action=="new-record"):
    //echo json_encode(array_keys($_POST['victim']));
    //print_r($_POST['victim']);
    //name,age,gender,nationality
    $victim_id = cmd("INSERT INTO spt_victim (name,age,gender,nationality)VALUES(%s,%d,%s,%s)",$_POST['victim']);
    $suspect_id = cmd("INSERT INTO spt_suspect (name,age,gender,nationality)VALUES(%s,%d,%s,%s)",$_POST['suspect']);
    $_POST['case']['victim_id'] = $victim_id;
    $_POST['case']['suspect_id'] = $suspect_id;
    $id = cmd("INSERT INTO spt_cases (barangay,municipalitycity,latitude,longitude,date,time,violation,status,victim_id,suspect_id)VALUES(%s,%s,%s,%s,%s,%s,%s,%s,%d,%d)",$_POST['case']);
    echo 'success';
endif;

function cmd($sql,$arr){
    global $wpdb;
    $children_query = $wpdb->prepare($sql,$arr);
    //echo $children_query . "\n";
    $children       = $wpdb->get_results( $children_query );
    return mysqli_insert_id( $wpdb->dbh );
}
// get_news();
// 			function get_news(){
// 				global $wpdb;
// 				$children_query = $wpdb->prepare( "SELECT * FROM $wpdb->posts WHERE post_parent = 43", $post->post_type );
// 				$children       = $wpdb->get_results( $children_query );
// 				print_r($children);
// 			}
?>