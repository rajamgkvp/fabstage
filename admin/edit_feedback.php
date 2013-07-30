<?
include('../constants.php');

if($_REQUEST['rname'] !=''){
	$sql1 = "UPDATE fs_feedback SET name = '".$_REQUEST['rname']."',  feedback = '".htmlEntities($_REQUEST['desc1'])."' Where fld_id = '".$_REQUEST['id']."'";
	$res1 = q($sql1);
	$msg = " - Testimonials has been Updated successfully.";
}
$sql1 = "Select * from fs_feedback Where fld_id = ".$_REQUEST['id']."";
$res1 = q($sql1);
$row = f($res1);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Dominican Republic Shuttle Service and Airport Transfers</title>
<link href="css/style.css" rel="stylesheet" type="text/css" />
<script language="javascript" type="text/javascript" src="js/ycfcw.js"></script>
<link href="menu/jqueryslidemenu.css" rel="stylesheet" type="text/css" />

<script type="text/JavaScript">
<!--



function MM_preloadImages() { //v3.0
  var d=document; if(d.images){ if(!d.MM_p) d.MM_p=new Array();
    var i,j=d.MM_p.length,a=MM_preloadImages.arguments; for(i=0; i<a.length; i++)
    if (a[i].indexOf("#")!=0){ d.MM_p[j]=new Image; d.MM_p[j++].src=a[i];}}
}
//-->


</script>
<script>
function validate2(){
	var errText = "";
	var errorflag = false;
        if(document.review.rname.value == ""){
		 errText += "- Please Enter Your Name. \n";
		 alert(errText);
		 errorflag = true;
		 document.review.rname.focus();
		 return false;
	}
   	
		
	if(document.review.desc1.value==""){
		alert('Please Enter Your feedback.');
		document.review.desc1.focus();
		errorflag = true;
		return false;
	}
	if(errorflag==true){
		return false;
	}else{
		return true;
	}
}
	
 </script><link href="admin_img/css/template_css.css" rel="stylesheet" type="text/css">

</head>

<body>

		<form name="review" id="review" action="" method="POST" onsubmit="return validate2()">
		<table cellpadding="2" cellspacing="2" >
			<tbody>
				<tr>
				 <td colspan="2"  align="left">
					<table cellpadding="0">
						<tr><td style="color: #008040;font-size: 18px; font-family: arial "> Edit Feedback</td>
						</tr>		
					</table>
				</tr>
				<?
				if($msg !=''){
				?>
			 <tr>
				 <td colspan="2" style="color: red;" align="left" height="8px"><?=$msg?></td>
              </tr>
			  <?}?>
			   <tr>
				 <td colspan="2" style="color: red;" align="center" height="8px"></td>
              </tr>
              <tr>
                <td align="left" width="65px" style="color: #333333; font-weight: bold;">Name <span style="color:red"><b>*</b></span></td>
                <td>
                  <input name="rname" id="rname" value="<?=$row['name']?>" size="50" type="text"></td>
              </tr>




			  <tr>
				 <td colspan="2" style="color: red;" align="center" height="8px"></td>
              </tr>
              
              <tr>
               <td align="left" width="80px" style="color: #333333; font-weight: bold;">feedback <span style="color:red"><b>*</b></span></td>
              
                <td ><textarea rows="10" cols="40" name="desc1" id="desc1"><?=$row['feedback']?></textarea> </td>
              </tr>
			 
			  <tr>
				 <td colspan="2" style="color: red;" align="center" height="8px"></td>
              </tr>
              <tr>
			    <td align="left" width="80px" style="color: #333333; font-weight: bold;">&nbsp;</td> 
                <td align="left" colspan="2"><input type="submit" value="Edit Testimonial" ></td>
              </tr>
			  
              <tr>
                <td colspan="2" align="left"></td>
                </tr>
            </tbody>
		</table>
		</form>

</body>
</html>
