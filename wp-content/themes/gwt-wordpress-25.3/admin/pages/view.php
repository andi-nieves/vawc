<?php
    global $wpdb;
    $sql = $wpdb->prepare( "SELECT * FROM spt_cases as c WHERE id=%s",$_GET['id'] );
    $case       = $wpdb->get_results( $sql )[0];
    if(count($case)==0):
?>
<div id="message" class="updated notice is-dismissible">
		<p><strong>Record not found!</strong></p>
			<p><a href="/wp-admin/admin.php?page=vawc">← Back</a></p>
	<button type="button" class="notice-dismiss"><span class="screen-reader-text">Dismiss this notice.</span></button></div>
<?php
        return;
    endif;
    $sql = $wpdb->prepare( "SELECT * FROM spt_victim as c WHERE id=%s",$case->victim_id );
    $victim       = $wpdb->get_results( $sql )[0];

    $sql = $wpdb->prepare( "SELECT * FROM spt_suspect as c WHERE id=%s",$case->suspect_id );
    $suspect       = $wpdb->get_results( $sql )[0];
?>
<h1>Report Details</h1>
<style>
div.updated {
    border-left-color: red;
}
</style>

<div id="" class="postbox">
    <span class="item-controls">
        <!-- <a class="item-edit metabox-item-edit" id="edit_id" title="Edit Menu Item" href="#">Edit Menu Item</a> -->

        <!-- Array ( [0] => stdClass Object ( [id] => 11 [barangay] => Bangantalinga [municipalitycity] => Iba [longitude] => 1 [latitude] => 2 [date] => 0000-00-00 [time] => 11 am [violation] => Physical [status] => 123 [date_added] => 2018-04-06 02:54:29 [victim_id] => 5 [suspect_id] => 3 ) ) -->
    </span>
        <h3 class="hndle" style="padding: 5px;"><span>Case</span></h3>
        <div class="inside" style="">
            <table class="form-table">
                <tbody>
                    <tr id="row_ninja_forms[version]">
                        <th scope="row">
                            <label for="">Barangay</label>
                        </th>
                        <td><?php echo $case->barangay ?></td>
                    </tr>
                    <tr id="row_ninja_forms[version]">
                        <th scope="row">
                            <label for="">Municipality City</label>
                        </th>
                        <td><?php echo $case->municipalitycity ?></td>
                    </tr>
                    <tr id="">
                        <th scope="row">
                            <label for="">Coordinate</label>
                        </th>
                        <td><a target="new" href="https://www.google.com/maps/?q=<?php echo  $case->latitude . "," . $case->longitude; ?>"><?php echo $case->latitude . "," . $case->longitude ?></a></td>
                    </tr>
                    <tr id="">
                        <th scope="row">
                            <label for="">Date & Time</label>
                        </th>
                        <td><?php echo $case->date . " " . $case->time ?></td>
                    </tr>
                    <tr id="">
                        <th scope="row">
                            <label for="">Violation</label>
                        </th>
                        <td><?php echo $case->violation ?></td>
                    </tr>
                    <tr id="">
                        <th scope="row">
                            <label for="">Status</label>
                        </th>
                        <td><?php echo $case->status ?></td>
                    </tr>
                    <tr id="">
                        <th scope="row">
                            <label for="">Date Added</label>
                        </th>
                        <td><?php echo $case->date_added ?></td>
                    </tr>
                </tbody>
                
            </table>
        </div>
    </div>

<div id="" class="postbox">
    <span class="item-controls">
        <!-- <a class="item-edit metabox-item-edit" id="edit_id" title="Edit Menu Item" href="#">Edit Menu Item</a> -->

        <!-- Array ( [0] => stdClass Object ( [id] => 11 [barangay] => Bangantalinga [municipalitycity] => Iba [longitude] => 1 [latitude] => 2 [date] => 0000-00-00 [time] => 11 am [violation] => Physical [status] => 123 [date_added] => 2018-04-06 02:54:29 [victim_id] => 5 [suspect_id] => 3 ) ) -->
    </span>
        <h3 class="hndle" style="padding: 5px;"><span>Victim</span></h3>
        <div class="inside" style="">
            <table class="form-table">
                <tbody>
                    <tr id="">
                        <th scope="row">
                            <label for="">Name</label>
                        </th>
                        <td><?php echo $victim->name ?></td>
                    </tr>

                    <tr id="">
                        <th scope="row">
                            <label for="">Age</label>
                        </th>
                        <td><?php echo $victim->age ?></td>
                    </tr>
                    <tr id="">
                        <th scope="row">
                            <label for="">Gender</label>
                        </th>
                        <td><?php echo $victim->gender ?></td>
                    </tr>
                    <tr id="">
                        <th scope="row">
                            <label for="">Nationality</label>
                        </th>
                        <td><?php echo $victim->nationality ?></td>
                    </tr>
                </tbody>
                
            </table>
        </div>
    </div>


<div id="" class="postbox">
    <span class="item-controls">
        <!-- <a class="item-edit metabox-item-edit" id="edit_id" title="Edit Menu Item" href="#">Edit Menu Item</a> -->

        <!-- Array ( [0] => stdClass Object ( [id] => 11 [barangay] => Bangantalinga [municipalitycity] => Iba [longitude] => 1 [latitude] => 2 [date] => 0000-00-00 [time] => 11 am [violation] => Physical [status] => 123 [date_added] => 2018-04-06 02:54:29 [victim_id] => 5 [suspect_id] => 3 ) ) -->
    </span>
        <h3 class="hndle" style="padding: 5px;"><span>Suspect</span></h3>
        <div class="inside" style="">
            <table class="form-table">
                <tbody>
                    <tr id="">
                        <th scope="row">
                            <label for="">Name</label>
                        </th>
                        <td><?php echo $suspect->name ?></td>
                    </tr>

                    <tr id="">
                        <th scope="row">
                            <label for="">Age</label>
                        </th>
                        <td><?php echo $suspect->age ?></td>
                    </tr>
                    <tr id="">
                        <th scope="row">
                            <label for="">Gender</label>
                        </th>
                        <td><?php echo $suspect->gender ?></td>
                    </tr>
                    <tr id="">
                        <th scope="row">
                            <label for="">Nationality</label>
                        </th>
                        <td><?php echo $suspect->nationality ?></td>
                    </tr>
                </tbody>
                
            </table>
        </div>
    </div>