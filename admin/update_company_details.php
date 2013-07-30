<?
include('../constants.php');

//ADD ADMIN USER
$id = 2;

if(isset($_REQUEST['title']) && $_REQUEST['title'] !=''){
	


		$sql = "UPDATE fs_about_us SET title = '".$_REQUEST['title']."', description = '".$_REQUEST['descrip']."' WHERE fld_id = '".$id."'";
		$res = q($sql);

		if($res){
			$msg = '- Updated Successfully.';
		}else{
			$msg = '- Not Updated.';
		}

}

//POPULATE 
$sql_pop = "SELECT * FROM fs_about_us WHERE fld_id = '".$id."'";
$res_pop = q($sql_pop);
$row = f($res_pop);

?>




<!-- TinyMCE -->
<script type="text/javascript" src="jscripts/tiny_mce/tiny_mce.js"></script>
<script type="text/javascript">
	tinyMCE.init({
		// General options
		mode : "textareas",
		theme : "advanced",
		plugins : "autolink,lists,pagebreak,style,layer,table,save,advhr,advimage,advlink,emotions,iespell,inlinepopups,insertdatetime,preview,media,searchreplace,print,contextmenu,paste,directionality,fullscreen,noneditable,visualchars,nonbreaking,xhtmlxtras,template,wordcount,advlist,autosave",

		plugins : "autolink,lists,pagebreak,style,layer,table,save,advhr,advimage,advlink,emotions,iespell,inlinepopups,insertdatetime,preview,media,searchreplace,print,contextmenu,paste,directionality,fullscreen,noneditable,visualchars,nonbreaking,xhtmlxtras,template,wordcount,advlist,autosave",

		// Theme options
		theme_advanced_buttons1 : "save,newdocument,|,bold,italic,underline,strikethrough,|,justifyleft,justifycenter,justifyright,justifyfull,styleselect,formatselect,fontselect,fontsizeselect",
		theme_advanced_buttons2 : "cut,copy,paste,pastetext,pasteword,|,search,replace,|,bullist,numlist,|,outdent,indent,blockquote,|,undo,redo,|,link,unlink,anchor,image,cleanup,help,code,|,insertdate,inserttime,preview,|,forecolor,backcolor",
		theme_advanced_buttons3 : "tablecontrols,|,hr,removeformat,visualaid,|,sub,sup,|,charmap,emotions,iespell,media,advhr,|,print,|,ltr,rtl,|,fullscreen",
		theme_advanced_buttons4 : "insertlayer,moveforward,movebackward,absolute,|,styleprops,|,cite,abbr,acronym,del,ins,attribs,|,visualchars,nonbreaking,template,pagebreak,restoredraft",
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

<script>
function validate(){

	var errText = "";
	var errorflag = false;
		

	if(document.upload_form.title.value == ""){
		 errText += "- Please Enter Title. \n";
		 alert(errText);
		 errorflag = true;
		 document.upload_form.title.focus();
		 return false;
	}

	
	if(document.upload_form.descrip.value == ""){
		 errText += "- Please Enter Description.\n";
		 alert(errText);
		 errorflag = true;
		 document.upload_form.descrip.focus();
		 return false;
	}


	if(errorflag==true){
		return false;
	}else{
		return true;
	}
 }
</script>

<!-- CALENDAR INCLUDE-->
<script type="text/javascript" src="src/calendar.js"></script>
<script type="text/javascript" src="src/calendar-setup.js"></script>
<script type="text/javascript" src="lang/calendar-en.js"></script>
<style type="text/css"> @import url("css/calendar-win2k-cold-1.css"); </style>

<link rel="stylesheet" href="admin_img/css/template_css.css" type="text/css" />
<style type="text/css">
<!--
.style1 {color: #FF0000}
-->
</style>
<body>
<form name="upload_form" action="" method="POST" onSubmit="return validate();">
<table  border="0" align="center" cellspacing="1" cellpadding="1">
<tr>
    <td colspan="2"  align="center" class="msg" style="font-size: 12px"><?=$msg?></td>
  </tr>
  <tr>
    <td colspan="2"  align="center"></td>
  </tr>
  <tr>
    <td colspan="2"  align="center" class="contentheading">Update Company Details</td>
  </tr>
  <tr>
    <td colspan="2" height="8"></td>
  </tr>
  <tr>
    <td ><span class="style1">*</span>&nbsp;<span>Title</span> </td>
    <td ><input name="title" type="text" value="<?=$row['title']?>" id="title" size="25" ></td>
  </tr>
  <tr>
    <td colspan="2" height="8"></td>
  </tr>

    <tr>
    <td width="40" align="right"><span class="style1">*</span>&nbsp;<span>Description</span> </td>
    <td align="left">
		<textarea rows="10" cols="40" name="descrip" id="descrip"><?=$row['description']?></textarea>
    </td>
  </tr>
    <tr>
    <td colspan="2" height="8"></td>
  </tr>
  <tr>
  <td>&nbsp;</td>
    <td>
      <input type="submit" name="submit" value="Update Company Details">
   </td>
    </tr>
      <tr>
    <td height="40px">&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
</table>
</form>

 
</body>

