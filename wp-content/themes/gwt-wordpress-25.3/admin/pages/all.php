<?php
// echo $_GET['id'];
    global $wpdb;
    $sql = $wpdb->prepare( "SELECT * ,(SELECT name FROM spt_suspect WHERE id=c.suspect_id) as suspectname,(SELECT name FROM spt_victim WHERE id=c.victim_id) as victimname FROM spt_cases as c ORDER BY c.id DESC","" );
    $cases       = $wpdb->get_results( $sql );
    // print_r($cases);

    $sql = $wpdb->prepare( "SELECT COUNT(id) as y,barangay as label  FROM spt_cases GROUP BY barangay","" );
    $brgys       = json_encode( $wpdb->get_results( $sql ),JSON_NUMERIC_CHECK );
    // echo $brgys;
    // foreach($r as $r1){
    //   print_r($r1);
    //   echo "<br><br>";
    // }
?>
<h1 class="wp-heading-inline">Violence Against Women and Children Data <a href="/wp-admin/admin.php?page=vawc-add-new" class="page-title-action">Add New</a></h1>

<table class="wp-list-table widefat fixed striped users">
	<thead>
	<tr>
  <th style="width: 20px;">id</th>
  <th>Victim</th>
  <th>Suspect</th>
  <th>Barangay</th>
  <td>Municipality / City</td>
  <td>Coordinate</td>
  <td>Date</td>
  <td>Violation</td>
  <td>Status</td>
  <td>Date Added</td>
  </tr>
		<!-- <td id="cb" class="manage-column column-cb check-column"><label class="screen-reader-text" for="cb-select-all-1">Select All</label><input id="cb-select-all-1" type="checkbox"></td><th scope="col" id="username" class="manage-column column-username column-primary sortable desc"><a href="http://localhost/wp-admin/users.php?orderby=login&amp;order=asc"><span>Username</span><span class="sorting-indicator"></span></a></th><th scope="col" id="name" class="manage-column column-name">Name</th><th scope="col" id="email" class="manage-column column-email sortable desc"><a href="http://localhost/wp-admin/users.php?orderby=email&amp;order=asc"><span>Email</span><span class="sorting-indicator"></span></a></th><th scope="col" id="role" class="manage-column column-role">Role</th><th scope="col" id="posts" class="manage-column column-posts num">Posts</th><th scope="col" id="forum-user-groups" class="manage-column column-forum-user-groups">Forum</th>	</tr> -->
	</thead>
	<tbody id="the-list" data-wp-lists="list:user">
		<?php foreach($cases as $case): ?>
	<tr >
    <th style="max-width: 20px;"><a href="/wp-admin/admin.php?page=vawc&id=<?php echo $case->id ?>"><?php echo $case->id ?></a></th>
    <th><?php echo $case->victimname ?></th>
    <th><?php echo $case->suspectname ?></th>
    
    <th><?php echo $case->barangay ?></th>
    <td><?php echo $case->municipalitycity ?></td>
    <td><a target="new" href="https://www.google.com/maps/?q=<?php echo  $case->latitude . "," . $case->longitude; ?>"><?php echo $case->latitude . "," . $case->longitude ?></td>
    <td><?php echo $case->date . "," . $case->time ?></td>
    <td><?php echo $case->violation ?></td>
    <td><?php echo $case->status ?></td>
    <td><?php echo $case->date_added ?></td>
  </tr>
    <?php endforeach; ?>

	<tfoot>
	<tr>
		<!-- <td class="manage-column column-cb check-column"><label class="screen-reader-text" for="cb-select-all-2">Select All</label><input id="cb-select-all-2" type="checkbox"></td><th scope="col" class="manage-column column-username column-primary sortable desc"><a href="http://localhost/wp-admin/users.php?orderby=login&amp;order=asc"><span>Username</span><span class="sorting-indicator"></span></a></th><th scope="col" class="manage-column column-name">Name</th><th scope="col" class="manage-column column-email sortable desc"><a href="http://localhost/wp-admin/users.php?orderby=email&amp;order=asc"><span>Email</span><span class="sorting-indicator"></span></a></th><th scope="col" class="manage-column column-role">Role</th><th scope="col" class="manage-column column-posts num">Posts</th><th scope="col" class="manage-column column-forum-user-groups">Forum</th>	</tr> -->
	</tfoot>

</table>
<style>
.page-title-action{
  margin-left: 4px;
    padding: 4px 8px;
    position: relative;
    top: -3px;
    text-decoration: none;
    border: none;
    border: 1px solid #ccc;
    border-radius: 2px;
    background: #f7f7f7;
    text-shadow: none;
    font-weight: 600;
    font-size: 13px;
    line-height: normal;
    color: #0073aa;
    cursor: pointer;
    outline: 0;
}
</style>