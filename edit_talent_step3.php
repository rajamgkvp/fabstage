<?

include('constants.php');
include('check_session.php');
    
	
	
$id = $_SESSION['fab_id'];

if($_REQUEST['submit']!=""){


          $sqlg = "Select * from fs_talent_project_summary Where talent_id = '".$id."' ";
          $resg = q($sqlg);
          $num = nr($resg);
		  $fatch = f($resg);
        if($num!=0){
		 $qu = "UPDATE fs_talent_project_summary SET summary = '".$_REQUEST['text']."' where talent_id = '".$id."'";
         $run = q($qu);
		
		}else{
		
		 $qu = "Insert into fs_talent_project_summary(talent_id,summary)values('".$id."','".$_REQUEST['text']."') ";
         $run = q($qu);
		}

}
 

?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title><?=TITLE?></title>

<script>
function edit_news(id){
	winparam = 'width=600,height=400,scrollbars=1,left=340,top=60,screenX=300,screenY=180';
	window.open('edit_talent_project_front.php?id='+id,'',winparam);
}
</script>
</head>
<script>


function validate(){

	var errText = "";
	var errorflag = false;
	
	if(document.upload_form.title.value == "" ){
		 errText = "- Please Enter from Month/Year.";
		 alert(errText);
		 errorflag = true;
		 document.upload_form.title.focus();
		 return false;
	}	

	if(document.upload_form.title1.value == "" ){
		 errText = "- Please Enter To Month/Year.";
		 alert(errText);
		 errorflag = true;
		 document.upload_form.title1.focus();
		 return false;
	}

		if(document.upload_form.pic.value == "" ){
		 errText = "- Please  Browse the  Project.";
		 alert(errText);
		 errorflag = true;
		 document.upload_form.pic.focus();
		 return false;
	}	



	if(errorflag==true){
		return false;
	}else{
		return true;
	}
 }


//DELETE USER
function delete_pub(id){
	if(confirm('Are you sure to delete this Project?'))
	window.location.href='delete_talent_project_front.php?id='+id+'&pro_id=<?=$id?>';
}



</script>

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
		//theme_advanced_buttons1 : "save,newdocument,|,bold,italic,underline,strikethrough,|,justifyleft,justifycenter,justifyright,justifyfull,styleselect,formatselect,fontselect,fontsizeselect",
		theme_advanced_buttons2 : "bullist,numlist,|,outdent,indent,blockquote,|,undo,redo,|,link,unlink,anchor,image,cleanup,help,code,|,insertdate,inserttime,preview,|,forecolor,backcolor",
		//theme_advanced_buttons3 : "tablecontrols,|,hr,removeformat,visualaid,|,sub,sup,|,charmap,emotions,iespell,media,advhr,|,print,|,ltr,rtl,|,fullscreen",
		
		//theme_advanced_buttons4 : "insertlayer,moveforward,movebackward,absolute,|,styleprops,|,cite,abbr,acronym,del,ins,attribs,|,visualchars,nonbreaking,template,pagebreak,restoredraft",
		theme_advanced_toolbar_location : "top",
		theme_advanced_toolbar_align : "left",
		//theme_advanced_statusbar_location : "bottom",
		//theme_advanced_resizing : true,

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



<style type="text/css">
	
	.text{ font-family:Arial, Helvetica, sans-serif; font-size:12px; color:#fff; text-decoration:none;}
	.text span{font-size:17px;}
	.button { width:auto; padding:0 10px; height:28px; background:#669966; border-radius:5px; -moz-border-radius:5px; -webkit-border-radius:5px; font:normal 14px Arial, Helvetica, sans-serif; color:#fff; border:none;}
	.button a { color:#fff; text-decoration:none;}
	.button:hover { width:auto; padding:0 10px; height:28px; background:#6BC0F7; border-radius:5px; -moz-border-radius:5px; -webkit-border-radius:5px; font:normal 14px Arial, Helvetica, sans-serif; color:#fff; border:none;}
	.border{ border-bottom:1px dotted #cccccc; margin:10px 0;}
	 .text_heading{ font-family:Arial, Helvetica, sans-serif; font-size:12px;color:#669966;font-weight:bold; padding-top:5px; text-transform:capitalize;}
												  
</style>


  <div style="background:#669966; padding:5px;"> 
	   <a href="edit_talent_step1.php" class="text">Profile Information <span>&raquo;</span></a>  
	    
	   <a href="edit_talent_step3.php" class="text">Project Summary<span>&raquo;</span></a> 
	   <a href="edit_talent_step8.php" class="text">Add project <span>&raquo;</span></a>
	   <a href="edit_talent_step4.php" class="text">Add Portfolio <span></span></a>
	   
  </div>  



<table width="96%" border="0" align="center" cellspacing="1" cellpadding="1">
<tr>
    <td colspan="2" align="center" class="msg" style="font-size: 12px"><?=$msg1?></td>
  </tr>
  <tr>
    <td colspan="2" align="center"></td>
  </tr>
  <tr>
    <td colspan="2" style="padding-left:210px;" class="text_heading">Add Portfolio Project :   </td>
  </tr>
  <tr>
    <td colspan="2" height="8">
		
		
		
		
		 <form enctype="multipart/form-data" onSubmit="return validate();" name="upload_form" id="upload_form" action="" method="POST"  autocomplete="on" style="font:normal 13px arial;">
					<table class="center_body" width="100%"  border="0" align="right" cellspacing="1" cellpadding="1" style="margin-top:0px;float:right;">
					
						
                    

                             <?
							          $sqlg1 = "Select * from fs_talent_project_summary Where talent_id = '".$id."' ";
									  $resg1 = q($sqlg1);
									
									  $fatch1 = f($resg1);
							 
							 ?>
					
				 
					<tr>	<td align="center"><textarea name="text" id="text" rows="25"><?=$fatch1['summary']?></textarea></td> </tr>
					
				    <tr>
					<td  >
						&nbsp;
					</td>
				</tr>		

					
	               <tr>
					<td  style="padding-left:210px;">
						<input type="submit" id="submit"  name="submit" value="Submit" class="button">
					</td>
				</tr>
	



	         </table>
    
         </form>
</td>
  </tr>

 <tr>
    <td colspan="2" height="10" align="center"></td>
  </tr>

 </table>
