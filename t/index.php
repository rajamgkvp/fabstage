<?
print_r($_REQUEST);
?>
<html xmlns="http://www.w3.org/1999/xhtml"><head profile="http://gmpg.org/xfn/11">
<head>
<title>Dynamically Add Remove Textboxes Using Jquery</title>
<script type="text/javascript" src="jquery-1.5.2.min.js"></script>
<script src="jquery-ui.min.js"></script>
<style type="text/css">
body{
	font-family:arial;
	color:#666;
}
form input{
	border:2px solid #dadada;
    border-radius:7px;
    font-size:20px;
    padding:5px;
	width:250px;
}

input:focus { 
    outline:none;
    border-color:#9ecaed;
    box-shadow:0 0 10px #9ecaed;
}

form .button{
	background: -moz-linear-gradient(top,  #00b7ea 21%, #009ec3 76%); /* FF3.6+ */
	background: -webkit-gradient(linear, left top, left bottom, color-stop(21%,#00b7ea), color-stop(76%,#009ec3)); /* Chrome,Safari4+ */
	background: -webkit-linear-gradient(top,  #00b7ea 21%,#009ec3 76%); /* Chrome10+,Safari5.1+ */
	background: -o-linear-gradient(top,  #00b7ea 21%,#009ec3 76%); /* Opera 11.10+ */
	background: -ms-linear-gradient(top,  #00b7ea 21%,#009ec3 76%); /* IE10+ */
	background: linear-gradient(to bottom,  #00b7ea 21%,#009ec3 76%); /* W3C */
	filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#00b7ea', endColorstr='#009ec3',GradientType=0 ); /* IE6-9 */
	color:#DFE9EC;
	border:none;
	cursor:pointer;
	padding:7px;
}
.txt_div{
	float:left;
	width:300px;
	margin-bottom:10px;
}
.left{
	float:left;
	width:250px;
}
.right{
	float:right;
	width:40px;
	padding-top: 11px;
}
img{
	cursor:pointer;
}
</style>
<script type="text/javascript">
$(document).ready(function(){
	var id = 2,max = 8,append_data;
	
	/*If the add icon was clicked*/
	$(".add").live('click',function(){
		if($("div[id^='txt_']").length <8){ //Don't add new textbox if max limit exceed
		$(this).remove(); //remove the add icon from current text box
		var append_data = '<div id="txt_'+id+'" class="txt_div" style="display:none;"><div class="left"><input type="text" id="input_'+id+'" name="txtval[]"/></div><div class="right"><img src="add.png" class="add"/> <img src="remove.png" class="remove"/></div></div>';
		$("#text_boxes").append(append_data); //append new text box in main div
		$("#txt_"+id).effect("bounce", { times:3 }, 300); //display block appended text box with silde down
		id++;
		} else {
			alert("Maximum 8 textboxes are allowed");
		}
	})
	
	/*If remove icon was clicked*/
	$(".remove").live('click',function(){
		var prev_obj = $(this).parents().eq(1).prev().attr('id');  //previous div id of this text box
		$(this).parents().eq(1).slideUp('medium',function() { $(this).remove(); //remove this text box with slide up
		if($("div[id^='txt_']").length > 1){
			append_data = '<img src="remove.png" class="remove"/>'; //Add remove icon if number of text boxes are greater than 1
		}else{
			append_data = '';
		}
		if($(".add").length < 1){
			$("#"+prev_obj+" .right").html('<img src="add.png" class="add"/> '+append_data);
		}
		});
		
	})
});


</script>
</head>
<body>
<div style="width:800px; margin:auto;padding-top:100px;">
<h1>Dynamically Add Remove Textboxes Using Jquery</h1>
<form id="form" name="form" method="POST">
<div id="text_boxes" style="width:300px;height:auto;">
<div id="txt_1" class="txt_div">
<div class="left">
<input type="text" id="input_1" name="txtval[]"/>
</div>
<div class="right">
<img src="add.png" class="add"/>
</div>
</div>
</div>

<div style="clear:left;"></div>
<input type="submit" value="SUBMIT" class="button" >
</form>
</div>
</body>
</html>