
<form id="new-report" onsubmit="return false">
<div class="wrap" id="sow-widgets-page">
	<div class="page-banner">
		<h1>New Report</h1>

		<div id="sow-widget-search">
			<!-- <input type="search" placeholder="<?php esc_attr_e('Filter Widgets', 'so-widgets-bundle') ?>" /> -->
		</div>
	</div>

	<ul class="page-nav">
		<li class="active"><a href="#case">Case</a></li>
		<li><a href="#victim">Victim</a></li>
		<li><a href="#suspect">Suspect</a></li>
	</ul>

    <div class="page-content">
        <div id="case" class="content">
        <!-- Place		Longtitude	Latitude	Date	Time	RA.9262 Violation	Case Status
Barangay	Municipality / Cities						 -->
        <b>Place</b><br>
        Barangay: <br><select name="case[barangay]" class="form-input required" id="">
            <option>Barangay 1</option>
            <option>Barangay 2</option>
            <option>Barangay 3</option>
            <option>Barangay 4</option>
        </select>
        <br>
        Municipality / City: <br><select name="case[municipalitycity]" class="form-input required" id="">
            <option>Municipality City 1</option>
            <option>Municipality City 2</option>
            <option>Municipality City 3</option>
            <option>Municipality City 4</option>
        </select>
        <!-- <input type="text" class="form-input required" placeholder="Barangay" name="case[barangay]" size="30" value="" id="title" spellcheck="true" autocomplete="off"><br>
        <input type="text" class="form-input required" placeholder="Municipality / Cities" name="case[municipalitycity]" size="30" value="" id="title" spellcheck="true" autocomplete="off"><br>
        -->
        <br><b>Coordinates</b><br>
        <input type="text" class="form-input required" placeholder="Latitude" name="case[latitude]" size="30" value="" id="title" spellcheck="true" autocomplete="off"><br>
        <input type="text" class="form-input required" placeholder="Longitude" name="case[longitude]" size="30" value="" id="title" spellcheck="true" autocomplete="off"><br>
        
        <br><b>Date & Time</b><br>
        <input type="text" class="form-input required" placeholder="Date" name="case[date]" size="30" value="" id="title" spellcheck="true" autocomplete="off"><br>
        <input type="text" class="form-input required" placeholder="Time" name="case[time]" size="30" value="" id="title" spellcheck="true" autocomplete="off"><br>
        
        <br><b>RA. 9262 Violation</b><br>
        <input type="text" class="form-input required" placeholder="Violation" name="case[violation]" size="30" value="" id="title" spellcheck="true" autocomplete="off"><br>
        

        <br><b>Status</b><br>
        <select name="case[status]" class="form-input required" id="">
            <option>123</option>
        </select>

        </div>
        <div id="victim" class="content" style="display: none;">
            <h3>Victim Information</h3>
            <b>Name</b><br>
            <input type="text" class="form-input required" placeholder="Victim's name" name="victim[name]" size="30" value="" id="title" spellcheck="true" autocomplete="off"><br>
            <b>Age</b><br>
            <input type="number" class="form-input required" placeholder="Age" name="victim[age]" size="30" value="" id="title" spellcheck="true" autocomplete="off"><br>
            <b>Gender</b><br>
            <select name="victim[gender]" class="form-input required">
                <option>Male</option>
                <option>Female</option>
            </select>
            <br><b>Nationality</b><br>
            <input type="text" class="form-input required" placeholder="Nationality" name="victim[nationality]" size="30" value="" id="title" spellcheck="true" autocomplete="off"><br>

        </div>
        <div id="suspect" class="content" style="display: none;">
            <h3>Suspect Information</h3>
            <b>Name</b><br>
            <input type="text" class="form-input required" placeholder="Suspect's name" name="suspect[name]" size="30" value="" id="title" spellcheck="true" autocomplete="off"><br>
            <b>Age</b><br>
            <input type="number" class="form-input required" placeholder="Age" name="suspect[age]" size="30" value="" id="title" spellcheck="true" autocomplete="off"><br>
            <b>Gender</b><br>
            <select name="suspect[gender]" class="form-input required">
                <option>Male</option>
                <option>Female</option>
            </select>
            <br><b>Nationality</b><br>
            <input type="text" class="form-input required" placeholder="Nationality" name="suspect[nationality]" size="30" value="" id="title" spellcheck="true" autocomplete="off"><br>

        </div>
    </div>

</div>
<button type="submit" class="button button-primary button-large">Submit</button>
</form>

<script>
window.send_action = function(data,onsuccess){
  $.ajax({
    url: '/process.php',
    data: data,
    type: "POST",
    contentType: false,
    processData: false,
    success: function(e) {
      if(onsuccess!=null){
        onsuccess(e);
      }
    }
  });
}
$("#new-report").on('submit',function(){
    let data = new FormData($(this).get(0));
    let error = "";
    $.each($("#new-report input,select"),function(x,v){
        let input = $(v);
        if(input.hasClass("required")){
            if(input.val().trim().length==0){
                console.log(input.val());
                error += input.attr("name").toUpperCase().replace("["," - ").replace("]","") + "\n";
            }
        }
    });
    if(error.length > 0){
        error = "Please fill-up the following field(s)\n\n" + error;
        alert(error);
        return;
    }
    data.append("action","new-record");
    send_action(data,function(r){
        console.log(r);
        if(r.trim()=="success"){
            var x = confirm("Record successfully added!\nDo you wish to add new?");
            if(x){
                window.location.reload();
            }else{
                window.location = '/wp-admin/admin.php?page=vawc';
            }
        }else{
            alert("Opps! Something went wrong. Please contact administrator.");
        }
    });
});
$('#sow-widgets-page .page-nav a').click(function(e){
        e.preventDefault();
        var $$ = $(this);
        var href = $$.attr('href');
        var $li = $$.closest('li');

        $('#sow-widgets-page .page-nav li').not($li).removeClass('active');
        $li.addClass('active');
        $(".page-content .content").hide();
        $(".page-content").find(href).show();
        $(window).resize();
    });

    // Enable css3 animations on the widgets list
    $('#widgets-list').addClass('so-animated');
</script>



<style>
.page-content {
    padding: 20px;
}
.form-input required{
    padding: 3px 8px;
    font-size: 1.3em;
    line-height: 100%;
    height: 1.7em;
    width: 400px;

    outline: 0;
    margin: 0 0 3px;
    background-color: #fff;
}
#sow-widgets-page {
    margin: 0 0 0 -20px;
  }
  #sow-widgets-page .page-banner {
    display: block;
    padding: 15px 30px 5px 30px;
    background: #f6f6f6;
    position: relative;
  }
  #sow-widgets-page .page-banner .icon {
    float: left;
    display: inline-block;
    width: 50px;
    height: 43px;
    position: relative;
    margin: 8px 22px 0 0;
  }
  #sow-widgets-page .page-banner .icon img {
    position: absolute;
  }
  #sow-widgets-page .page-banner .icon img.icon-back {
    top: 0;
    left: 0;
  }
  #sow-widgets-page .page-banner .icon img.icon-gear {
    top: 0;
    left: 12px;
    -webkit-animation: spin 60s linear infinite;
    -moz-animation: spin 60s linear infinite;
    animation: spin 60s linear infinite;
  }
  @-moz-keyframes spin {
    100% {
      -moz-transform: rotate(360deg);
    }
  }
  @-webkit-keyframes spin {
    100% {
      -webkit-transform: rotate(360deg);
    }
  }
  @keyframes spin {
    100% {
      -webkit-transform: rotate(360deg);
      transform: rotate(360deg);
    }
  }
  #sow-widgets-page .page-banner .icon img.icon-front {
    top: 0;
    left: 0;
  }
  #sow-widgets-page .page-banner h1 {
    font: 300 2.3em/1.4em "proxima-nova", "Open Sans", Helvetica, Arial, sans-serif;
    color: #666;
  }
  #sow-widgets-page .page-banner #sow-widget-search {
    position: absolute;
    bottom: -35px;
    right: 19px;
  }
  #sow-widgets-page .page-banner #sow-widget-search input {
    box-sizing: border-box;
    width: 200px;
  }
  #sow-widgets-page .page-banner #sow-widget-search .results {
    display: none;
    box-sizing: border-box;
    position: absolute;
    top: 100%;
    left: 1px;
    width: 200px;
    background: #ffffff;
    border: 1px solid #e0e0e0;
    padding: 0;
    margin: -2px 0 0 0;
    -webkit-box-shadow: 0 1px 1px rgba(0, 0, 0, 0.075);
    -moz-box-shadow: 0 1px 1px rgba(0, 0, 0, 0.075);
    box-shadow: 0 1px 1px rgba(0, 0, 0, 0.075);
  }
  #sow-widgets-page .page-banner #sow-widget-search .results li {
    margin: 0;
    padding: 5px;
    font-size: 0.95em;
    font-weight: bold;
    color: #777;
    cursor: pointer;
  }
  #sow-widgets-page .page-banner #sow-widget-search .results li:hover {
    background: #f7f7f7;
  }
  #sow-widgets-page .page-nav {
    background: #f6f6f6;
    border-bottom: 1px solid #d6d6d6;
    padding: 5px 0 0 30px;
    margin: 0;
    font-size: 0;
  }
  #sow-widgets-page .page-nav li {
    display: inline-block;
    margin: 0 0 -1px 0;
    background: #f6f6f6;
    line-height: 1em;
    font-size: 12px;
    position: relative;
    border: 1px solid #d6d6d6;
    border-width: 1px 0 1px 1px;
    transition: all 0.2s;
  }
  #sow-widgets-page .page-nav li:last-child {
    border-right-width: 1px;
  }
  #sow-widgets-page .page-nav li a {
    display: block;
    text-decoration: none;
    color: #555;
    padding: 12px 25px;
    font-weight: bold;
    box-shadow: none !important;
  }
  #sow-widgets-page .page-nav li:hover {
    background: #f3f3f3;
  }
  #sow-widgets-page .page-nav li.active {
    background: #f0f0f0;
    border-bottom-color: #f0f0f0;
  }
  #sow-widgets-page #widgets-list {
    zoom: 1;
    margin: 25px 18px 0 18px;
    position: relative;
  }
  #sow-widgets-page #widgets-list:before {
    content: '';
    display: block;
  }
  #sow-widgets-page #widgets-list:after {
    content: '';
    display: table;
    clear: both;
  }
  #sow-widgets-page #widgets-list .so-widget-wrap {
    float: left;
    -ms-box-sizing: border-box;
    -moz-box-sizing: border-box;
    -webkit-box-sizing: border-box;
    box-sizing: border-box;
    padding: 0 12px 24px 12px;
    width: 25%;
  }
  @media screen and (max-width: 1800px) {
    #sow-widgets-page #widgets-list .so-widget-wrap {
      width: 33.333%;
    }
  }
  @media screen and (max-width: 1280px) {
    #sow-widgets-page #widgets-list .so-widget-wrap {
      width: 50%;
    }
  }
  @media screen and (max-width: 960px) {
    #sow-widgets-page #widgets-list .so-widget-wrap {
      width: 100%;
    }
  }
  #sow-widgets-page #widgets-list .so-widget {
    border: 1px solid #D9D9D9;
    float: left;
    -webkit-box-shadow: 0 1px 2px rgba(0,0,0,0.05);
    -moz-box-shadow: 0 1px 2px rgba(0,0,0,0.05);
    box-shadow: 0 1px 2px rgba(0,0,0,0.05);
    padding: 0;
    width: 100%;
    background: #fefefe;
    position: relative;
    overflow: hidden;
  }
  #sow-widgets-page #widgets-list .so-widget .so-widget-banner {
    width: 128px;
    height: 128px;
    float: left;
    margin: 20px;
    overflow: hidden;
  }
  #sow-widgets-page #widgets-list .so-widget .so-widget-banner img,
  #sow-widgets-page #widgets-list .so-widget .so-widget-banner svg {
    height: 128px;
    width: auto;
  }
  #sow-widgets-page #widgets-list .so-widget .so-widget-text {
    padding: 20px 20px 20px 0;
    margin-left: 178px;
  }
  #sow-widgets-page #widgets-list .so-widget .so-widget-text .so-widget-active-indicator {
    float: right;
    margin: 0 0 10px 10px;
    background: #00a0d2;
    padding: 4px 10px;
    color: #fff;
    border-radius: 3px;
    -webkit-transition: all 0.35s ease;
    -moz-transition: all 0.35s ease;
    -o-transition: all 0.35s ease;
    transition: all 0.35s ease;
  }
  #sow-widgets-page #widgets-list .so-widget .so-widget-text h3 {
    color: #0073aa;
    font-size: 1.4em;
    font-weight: 500;
    margin-top: 0;
  }
  #sow-widgets-page #widgets-list .so-widget .so-widget-text .so-widget-description {
    margin: 0;
    line-height: 1.35em;
    color: #777777;
  }
  #sow-widgets-page #widgets-list .so-widget .so-widget-text .so-widget-byline {
    font-size: 0.9em;
    margin-top: 10px;
    color: #999;
    font-style: italic;
  }
  #sow-widgets-page #widgets-list .so-widget .so-widget-text .so-widget-byline a {
    color: #666;
    text-decoration: none;
  }
  #sow-widgets-page #widgets-list .so-widget .so-widget-text .so-widget-byline a:hover {
    color: #555;
    text-decoration: underline;
  }
  #sow-widgets-page #widgets-list .so-widget .so-widget-toggle-active {
    margin-top: 15px;
    display: inline-block;
  }
  #sow-widgets-page #widgets-list .so-widget .so-widget-toggle-active button:focus {
    outline: none;
  }
  #sow-widgets-page #widgets-list .so-widget.so-widget-is-active .so-widget-toggle-active .so-widget-activate {
    display: none;
  }
  #sow-widgets-page #widgets-list .so-widget.so-widget-is-inactive .so-widget-toggle-active .so-widget-deactivate {
    display: none;
  }
  #sow-widgets-page #widgets-list .so-widget.so-widget-is-inactive .so-widget-active-indicator {
    opacity: 0;
  }
  #sow-widgets-page #widgets-list .so-widget.so-widget-is-inactive h3 {
    color: #666;
  }
  #sow-widgets-page #widgets-list .so-widget.so-widget-is-inactive svg,
  #sow-widgets-page #widgets-list .so-widget.so-widget-is-inactive img {
    filter: url(filters.svg#grayscale);
    filter: gray;
    -webkit-filter: grayscale(1);
    opacity: 0.7;
  }
  #sow-widgets-page #widgets-list .so-widget .so-widget-settings {
    margin-top: 15px;
    display: inline-block;
  }
  #sow-widgets-page #widgets-list.so-animated img,
  #sow-widgets-page #widgets-list.so-animated svg {
    -webkit-transition: all 0.45s ease;
    -moz-transition: all 0.45s ease;
    -o-transition: all 0.45s ease;
    transition: all 0.45s ease;
  }
  #sow-widgets-page .developers-link {
    padding: 0 30px;
    text-align: right;
    color: #777;
    font-style: italic;
  }
  #sow-widgets-page #sow-settings-dialog {
    display: none;
  }
  #sow-widgets-page #sow-settings-dialog .so-overlay,
  #sow-widgets-page #sow-settings-dialog .so-content,
  #sow-widgets-page #sow-settings-dialog .so-title-bar,
  #sow-widgets-page #sow-settings-dialog .so-toolbar,
  #sow-widgets-page #sow-settings-dialog .so-left-sidebar,
  #sow-widgets-page #sow-settings-dialog .so-right-sidebar {
    z-index: 100001;
    position: fixed;
    -ms-box-sizing: border-box;
    -moz-box-sizing: border-box;
    -webkit-box-sizing: border-box;
    box-sizing: border-box;
    padding: 15px;
  }
  #sow-widgets-page #sow-settings-dialog .so-overlay {
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: rgba(0, 0, 0, 0.5);
  }
  #sow-widgets-page #sow-settings-dialog .so-content {
    overflow-y: auto;
    top: 80px;
    left: 30px;
    right: 30px;
    bottom: 88px;
    background-color: #fdfdfd;
    overflow-x: hidden;
    -webkit-box-shadow: inset 0 2px 2px rgba(0,0,0,0.03);
    -moz-box-shadow: inset 0 2px 2px rgba(0,0,0,0.03);
    box-shadow: inset 0 2px 2px rgba(0,0,0,0.03);
  }
  #sow-widgets-page #sow-settings-dialog .so-content > *:first-child,
  #sow-widgets-page #sow-settings-dialog .so-content form > *:first-child {
    margin-top: 0;
  }
  #sow-widgets-page #sow-settings-dialog .so-content > *:last-child,
  #sow-widgets-page #sow-settings-dialog .so-content form > *:last-child {
    margin-bottom: 0;
  }
  #sow-widgets-page #sow-settings-dialog .so-content .so-content-tabs > * {
    display: none;
  }
  #sow-widgets-page #sow-settings-dialog .so-content.so-loading {
    background-image: url("images/wpspin_light.gif");
    background-position: center center;
    background-repeat: no-repeat;
  }
  @media (-webkit-min-device-pixel-ratio: 2), (min-resolution: 192dpi) {
    #sow-widgets-page #sow-settings-dialog .so-content.so-loading {
      background-image: url(images/wpspin_light-2x.gif);
      background-size: 16px 16px;
    }
  }
  #sow-widgets-page #sow-settings-dialog .so-title-bar {
    left: 30px;
    right: 30px;
    top: 30px;
    height: 50px;
    background-color: #fafafa;
    border-bottom: 1px solid #D8D8D8;
    /* These are the action buttons in the title bar */
  }
  #sow-widgets-page #sow-settings-dialog .so-title-bar h3.so-title {
    margin: 0 !important;
    padding: 0 !important;
  }
  #sow-widgets-page #sow-settings-dialog .so-title-bar a {
    cursor: pointer;
    position: absolute;
    box-sizing: border-box;
    width: 50px;
    height: 50px;
    display: block;
    top: 0;
    right: 0;
    -webkit-transition: all 0.2s ease;
    -moz-transition: all 0.2s ease;
    -o-transition: all 0.2s ease;
    transition: all 0.2s ease;
    background: #fafafa;
    border-left: 1px solid #d8d8d8;
    border-bottom: 1px solid #d8d8d8;
  }
  #sow-widgets-page #sow-settings-dialog .so-title-bar a:hover {
    background: #e9e9e9;
  }
  #sow-widgets-page #sow-settings-dialog .so-title-bar a:hover .so-dialog-icon {
    color: #333333;
  }
  #sow-widgets-page #sow-settings-dialog .so-title-bar a .so-dialog-icon {
    position: absolute;
    top: 50%;
    left: 50%;
    text-decoration: none;
    width: 20px;
    height: 20px;
    margin-left: -10px;
    margin-top: -10px;
    color: #666666;
    text-align: center;
  }
  #sow-widgets-page #sow-settings-dialog .so-title-bar a .so-dialog-icon:before {
    font: 400 20px/1em dashicons;
    top: 7px;
    left: 13px;
  }
  #sow-widgets-page #sow-settings-dialog .so-title-bar a.so-close {
    right: 0;
  }
  #sow-widgets-page #sow-settings-dialog .so-title-bar a.so-close .so-dialog-icon:before {
    content: "\f335";
  }
  #sow-widgets-page #sow-settings-dialog .so-toolbar {
    left: 30px;
    right: 30px;
    bottom: 30px;
    height: 58px;
    background-color: #fafafa;
    border-top: 1px solid #D8D8D8;
    z-index: 100002;
  }
  #sow-widgets-page #sow-settings-dialog .so-toolbar .so-status {
    float: left;
    padding-top: 6px;
    padding-bottom: 6px;
    font-style: italic;
    color: #999999;
    line-height: 1em;
  }
  #sow-widgets-page #sow-settings-dialog .so-toolbar .so-status.so-panels-loading {
    padding-left: 26px;
    background-position: left center;
  }
  #sow-widgets-page #sow-settings-dialog .so-toolbar .so-buttons {
    float: right;
  }
  #sow-widgets-page #sow-settings-dialog .so-toolbar .so-buttons .action-buttons {
    position: absolute;
    left: 15px;
    top: 50%;
    margin-top: -0.65em;
  }
  #sow-widgets-page #sow-settings-dialog .so-toolbar .so-buttons .action-buttons a {
    cursor: pointer;
    display: inline;
    padding: 0.2em 0.5em;
    line-height: 1em;
    margin-right: 0.5em;
    text-decoration: none;
  }
  #sow-widgets-page #sow-settings-dialog .so-toolbar .so-buttons .action-buttons .so-delete {
    color: #a00;
  }
  #sow-widgets-page #sow-settings-dialog .so-toolbar .so-buttons .action-buttons .so-delete:hover {
    background: #a00;
    color: #FFFFFF;
  }
  #sow-widgets-page #sow-settings-dialog .so-toolbar .so-buttons .action-buttons .so-duplicate:hover {
    text-decoration: underline;
  }
  #sow-widgets-page #sow-settings-dialog .siteorigin-widget-help-link {
    display: none;
  }
  #sow-widgets-page #so-widget-settings-save {
    width: 0;
    height: 0;
    border: none;
  }
  body.plugins_page_so-widgets-plugins #contextual-help-link-wrap {
    z-index: 10;
  }
  </style>