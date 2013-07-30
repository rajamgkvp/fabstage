<?php
	/*include('chk_session_admin.php');*/

	if(isset($_REQUEST['question']) && $_REQUEST['question'] != ""){
		 $sql_query = "INSERT INTO fs_help (question,answer,added_on) VALUES('".$_REQUEST['question']."','".$_REQUEST['answer']."',
		'".date('Y-m-d h:m:s')."')";
		$query_done = q($sql_query);
		if($query_done){
			$msg = '- Congratulation! Added Successfully.';
		}else{
			$msg = '- Sorry! Not Added Successsfully.';
		}
	}
?>

 <script>
function validate(){

	var errText = "";
	var errorflag = false;

	if(document.upload_form.question.value == ""){
		 errText += "- Please Insert Question\n";
		 alert(errText);
		 errorflag = true;
		 document.upload_form.question.focus();
		 return false;
	
	}


	if(errorflag==true){
		return false;
	}else{
		return true;
	}
 }
</script> 

<script>
function validate(){

	var errText = "";
	var errorflag = false;

	if(document.upload_form.answer.value == ""){
		 errText += "- Please Insert Answer\n";
		 alert(errText);
		 errorflag = true;
		 document.upload_form.answer.focus();
		 return false;
	}



	if(errorflag==true){
		return false;
	}else{
		return true;
	}
 }
</script>   

<!------->

<!-- <script type="text/javascript" src="ajax.js"></script>
<script>
							
	var ajax = new Array();

	function getCityList(sel){
		var countryCode = document.getElementById('title').value;
		//var countryCode = sel.options[sel.selectedIndex].value;
		//alert(countryCode);
		document.getElementById('title1').options.length = 0;	// Empty city select box
		if(countryCode.length>0){
			var index = ajax.length;
			ajax[index] = new sack();
			
			ajax[index].requestFile = 'get_topic.php?theory='+countryCode;	// Specifying which file to get
			//alert(ajax[index].requestFile);
			ajax[index].onCompletion = function(){ createCities(index) };	// Specify function that will be executed after file has been found
			ajax[index].runAJAX();		// Execute AJAX function
		}
	}

	function createCities(index){
		var obj = document.getElementById('title1');
		eval(ajax[index].response);	// Executing the response from Ajax as Javascript code	
	} 
</script>  -->
<!------>









<link rel="stylesheet" href="admin_img/css/template_css.css" type="text/css" />
<style type="text/css">
	.style1 {color: #FF0000}
</style>

<!-- TinyMCE -->
<script type="text/javascript" src="jscripts/tiny_mce/tiny_mce.js"></script>
<script type="text/javascript">
	tinyMCE.init({
		// General options
		mode : "textareas",
		theme : "advanced",
		plugins : "autolink,lists,pagebreak,style,layer,table,save,advhr,advimage,advlink,emotions,iespell,inlinepopups,insertdatetime,preview,media,searchreplace,print,contextmenu,paste,directionality,fullscreen,noneditable,visualchars,nonbreaking,xhtmlxtras,template,wordcount,advlist,autosave",

		// Theme options
		theme_advanced_buttons1 : "save,newdocument,|,bold,italic,underline,strikethrough,|,justifyleft,justifycenter,justifyright,justifyfull,styleselect,formatselect",
		theme_advanced_buttons2 : "fontselect,fontsizeselect,search,replace,|,bullist,numlist,|,outdent,indent,blockquote,",
		theme_advanced_buttons3 : 
		"undo,redo,|link,unlink,anchor,image,|,forecolor,backcolor",
		//theme_advanced_buttons4 : "insertlayer,moveforward,movebackward,absolute,|,styleprops,|,cite,abbr,acronym,del,ins,attribs,|,visualchars,nonbreaking,template,pagebreak,restoredraft",
		theme_advanced_toolbar_location : "top",
		theme_advanced_toolbar_align : "left",
		theme_advanced_statusbar_location : "bottom",
		theme_advanced_resizing : true,

		// Example content CSS (should be your site CSS)
		content_css : "css/content.css",

		// Drop lists for link/image/media/template dialogs
		template_external_list_url : "lists/template_list.js",
		external_link_list_url : "lists/link_list.js",
		external_image_list_url : "lists/image_list.js",
		media_external_list_url : "lists/media_list.js",

		// Style formats
		style_formats : [
			{title : 'Bold text', inline : 'b'},
			{title : 'Red text', inline : 'span', styles : {color : '#ff0000'}},
			{title : 'Red header', block : 'h1', styles : {color : '#ff0000'}},
			{title : 'Example 1', inline : 'span', classes : 'example1'},
			{title : 'Example 2', inline : 'span', classes : 'example2'},
			{title : 'Table styles'},
			{title : 'Table row 1', selector : 'tr', classes : 'tablerow1'}
		],

		// Replace values for the template plugin
		template_replace_values : {
			username : "Some User",
			staffid : "991234"
		}
	});
</script>
<!-- /TinyMCE -->

	<body>
		<form name="upload_form" action="" method="POST" onsubmit="return validate();">
			<p>
				<h3>Question/Answer List <a href="main.php?page_id=fs_help_list">Click Here</a></h3>
			</p> 
			<table width="300"  border="0" align="center" cellspacing="1" cellpadding="1">
				<tr>
					<td colspan="2" width="100%" align="center" class="msg"><?=$msg?></td>
				</tr>
				<tr>
					<td colspan="2" width="100%" align="center"></td>
				</tr>
				<tr>
					<td colspan="2" width="100%" align="center" class="contentheading">
						Add Question/Answer 
					</td>
				</tr>
				<!-- <tr>
					<td>&nbsp;</td>
					<td>&nbsp;</td>
				</tr>
				<tr>
					<td><span class="style1">*</span>&nbsp;<span>Theory</span></td>
					<td>
						<select name="title" id="title" onchange="getCityList(this)">
							<option value="">-----Select Theory-----</option>
							<?php
								$sql = "SELECT * FROM add_theory ";
								$res_theory = q($sql);
								while($result = f($res_theory)) {
							?>
							<option value="<?=$result['fld_id']?>"><?=$result['title']?></option>
							<?}?>
						</select>
					</td>
				</tr>
				<tr> -->
					<!-- <td>&nbsp;</td>
					<td>&nbsp;</td>
				</tr>

				<tr>
					<td><span class="style1">*</span>&nbsp;<span>Topic</span></td>
					<td>
						<select name="title1" id="title1">
							<option value="">-----Select Topic-----</option>
							<?php
								$mysql = "SELECT * FROM add_topic ";
								$res_topic = q($mysql);
								while($result = f($res_topic)) {
							?>
							<option value="<?=$result['fld_id']?>"><?=$result['topic']?></option>
							<?}?>
						</select>
					</td>
					
				</tr>
 -->
			

				<tr>
					<td>&nbsp;</td>
					<td>&nbsp;</td>
				</tr>
				<tr>
					<td><span class="style1">*</span>&nbsp;<span>Question</span></td>
					<td>
						<textarea class="textarea" name="question" id="question" wrap="physical" rows="12" cols="100"></textarea>
					</td>
				</tr>
				<tr>
					<td>&nbsp;</td>
					<td>&nbsp;</td>
				</tr>
				<tr>
					<td><span class="style1">*</span>&nbsp;<span>Answer</span></td>
					<td>
						<textarea class="textarea" name="answer" id="answer" wrap="physical" rows="12" cols="100"></textarea>
					</td>
				</tr>
				<tr>
					<td>&nbsp;</td>
					<td>&nbsp;</td>
				</tr>
				<tr>
					<td>&nbsp;</td>
					<td>
					  <input type="submit" value="Add Question Answer" name="Submit">
				   </td>
				</tr>
				<tr>
					<td height="40px">&nbsp;</td>
					<td>&nbsp;</td>
				</tr>
			</table>
		</form>
	</body>