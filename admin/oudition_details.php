<?
include('../constants.php');


//POPULATE 
$sql_pop = "SELECT * FROM fs_oudition WHERE fld_id = ".$_REQUEST['id']."";
$res_pop = q($sql_pop);
$row = f($res_pop);
?>


<link rel="stylesheet" href="admin_img/css/template_css.css" type="text/css" />


<form name="upload_form" action="" method="POST" onsubmit="return validate();">

 <table width="100%" border="0" align="center" cellspacing="2" cellpadding="2">

  <tr>
    <td colspan="2"  align="center"></td>
  </tr>
  <tr>
    <td colspan="2" align="center" class="contentheading">Audition Details</td>
  </tr>
  <tr>
    <td colspan="2" height="8"></td>
  </tr>

  
  <tr>
    <td><span><b>Publish Date:</b></span></td>
     <td>
		<table cellpadding="2" cellspacing="0">
		<tr><td>
	 <?=$row['added_on']?></td>
	</tr>
	</table>
	</td>
  </tr>
  <tr>
    <td colspan="2" height="8"></td>
  </tr>
  <tr>
    <td><span><b>Audition Title:</b></span> </td>
    <td><?=$row['title']?></td>
  </tr>
  <tr>
    <td colspan="2" height="8"></td>
  </tr>
  <tr>
    <td><span><b>Description:</b></span></td>
    <td>
		<?=html_entity_decode(nl2br($row['description']))?>
	</td>
  </tr>
  

    <tr>
    <td colspan="2" height="8"></td>
  </tr>

</table>