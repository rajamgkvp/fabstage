<?php
include('constants.php');
include('check_session.php');
    
	
	
$id = $_SESSION['fab_id'];


     
	if($_REQUEST['submit']!=""){

	
				for($j=0;$j<count($_REQUEST['cat']);$j++) {
					$check_val.=",";
					$check_val.= $_REQUEST['cat'][$j];
					$check_val.=",";
				}
      $_SESSION['check_val']=$check_val;
          
		//////upload file///////
     
		   




if(isset($_FILES['files'])){

function upload_multiple_file($file,$file_dir="company_portfolio_uploader/savefiles/") {
	
    $overwrite=0;
    $allowed_file_type= array("jpg", "jpeg", "png", "gif");
    $max_file_size = 2097152;
 
     foreach($_FILES['files']['name'] as $fkey=> $fname){
 
         $ext = pathinfo($fname, PATHINFO_EXTENSION);
           if (!in_array($ext, $allowed_file_type)) {
 
               return "unsupported file format";
                break;
           }
 
     }
 
    foreach($_FILES['files']['tmp_name'] as $key => $tmp_name ){
 
        $file_name = $_FILES['files']['name'][$key];
 
        $file_size =$_FILES['files']['size'][$key];
 
        $file_tmp_name =$_FILES['files']['tmp_name'][$key];
 
        $file_type=$_FILES['files']['type'][$key];
 
        if($max_file_size_check >0) {
            if($file_size > $max_file_size){
 
                $fsize=$max_file_size/1048576;
                return    'File size must be less than '.$fsize.' MB';
                break;
 
            }
        }
 
        if(is_dir($file_dir)==false){
 
              $status =  mkdir("$file_dir", 0700);
 
               if($status < 1){
 
                     return "unable to create  diractory $file_dir ";
 
                }
 
        }
 
        if(is_dir($file_dir)){
 ////////////////////////////////////
            if($overwrite < 1){

			 $file_upload_query="INSERT into fs_company_portfolio 
				 (
				 company_id,
				 skill,
				 portfolio_data,
				 added_on
				 )
				 				  
				 VALUES(
					'".$_SESSION['fab_id']."',
				    '".$_SESSION['check_val']."',
				    '".$file_name."',
					'".date('Y-m-d h:i:s')."'
				 )";


          $sql=q($file_upload_query);
		  if($sql){
			  move_uploaded_file($file_tmp_name,"$file_dir/".$file_name);

			  $msg= '- Image uploaded successfully';
		  }
 
 
            }
			//////////////////////
 
        }
 
   }

}
 if(isset($_FILES['files'])){
    $res =  upload_multiple_file($_FILES['files'],"company_portfolio_uploader/savefiles/");
     $res;
    }






	}

		///////

		//////video upload
        

		//
	   if($_REQUEST['video_link']!=''){

         $video_link = str_replace(',,',',', $_REQUEST['video_link']);
         $video_link = str_replace(' ','', $_REQUEST['video_link']);
	     $video = explode(",",$video_link);
			foreach ($video as &$link) {
               $Insert = "insert into fs_company_portfolio(company_id,skill,video,added_on)values('".$_SESSION['fab_id']."','".$check_val."','".$link."','".date('Y-m-d h:m:s')."') ";

			   $run_ins = q($Insert);
			}

}

        
		
			

           
          

            
                 

            //project_details.php?id=43
                
				//header('location:company_gallery.php');

			//



	  



									
 }


require_once "company_portfolio_uploader/phpuploader/include_phpuploader.php" ?>


<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title><?=TITLE?></title>
</head>
<script>
function validate5(){

	var errText = "";
	var errorflag = false;

	var chks = document.getElementsByName('cat[]');
	var hasChecked = false;
	for (var i = 0; i < chks.length; i++) {
		if (chks[i].checked) {
			hasChecked = true;
		break;
		}
	}
               if (hasChecked == false) {
					alert("Please select at least one Skill.");
					return false;
				}

	

   if(document.getElementById("files").files.length < 1)
     {
		
		 if(document.upload_form.video_link.value == ""){
		 errText += "- Please Enter Your Video Link. \n";
		 //alert(errText);
		 errorflag = true;
		// document.upload_form.video_link.focus();
		// return false;

           alert("You Forgot to select Portfolio files");
		   return false;


	}  
		   
		   
		   
		   
		   
		   
     }

 
	if(errorflag==true){
		return false;
	}else{
		return true;
	}
 }


</script>
<script>





//DELETE USER
function delete_pub(id,id1){
	if(confirm('Are you sure to delete this Picture?'))
	window.location.href='delete_photo_front.php?id='+id+'&id1='+id1;
}
</script>
<?include('profile_tab.php');?> 

<table width="96%" border="0" align="center" cellspacing="1" cellpadding="1">
<tr>
    <td colspan="2" align="center" class="msg" style="font-size: 12px"><?=$msg1?></td>
  </tr>
  <tr>
    <td colspan="2" align="center"></td>
  </tr>
  <tr>
    <td colspan="2" align="left" class="text_heading" >Add Company Portfolio  :   </td>
  </tr>
  <tr>
    <td colspan="2" height="8">












		<table class="center_body" width="100%"  border="0" align="right" cellspacing="1" cellpadding="1" style="margin-top:0px;float:right;">
						
						
						<!-- <tr>
                             <td colspan="2" align="center" class="msg" style="font-size: 12px"><?=$msg1?></td>
                        </tr>
						
						
						<tr>
							<td colspan="2" align="left" style="color:#fff; font-size:16px; font-weight:normal; background:#6BC0F7; height:30px; text-indent:10px; border:2px solid #fff;"> 
								<img src="images/details.gif" style="vertical-align:text-top; padding-right:5px;" />Add Portfolio
							</td>
						</tr> -->




 <tr>
    <td colspan="2" height="1">
						 

	<form enctype="multipart/form-data" onSubmit="return validate5();" name="upload_form" id="upload_form" action="" method="POST"  autocomplete="off" style="font:normal 13px arial;">
			
	

	<!-- <table width="80%"  border="0" align="center" cellspacing="1" cellpadding="1"> -->
		<?php

		   $sql = "select * from fs_company where member_id = '".$_SESSION['fab_id']."' ";
		   $res = q($sql);	
			while($fatch = f($res)){ 
			   $skill = $fatch['main_skill'];
			   $main_skill = str_replace(',,',',', $skill);
			    $skill = explode(",",$main_skill);
				$i=0; ?>
				<table width="100%"  border="0" align="center" cellspacing="0" cellpadding="0">
					
					
					 <tr>
	                        <td colspan="3"><span class="style1">*</span>&nbsp;<span class="text_heading">Select Skills</span> </td>
	                 </tr>
					<tr align="center">
					<?foreach ($skill as &$value) {
						if($value!=""){	  
							
							if($i%3==0){
							 echo "</tr><tr>";
							
							}
							?>
					
						<td  align="left" style="font-size:12px;padding-left:50px;"><input type="checkbox" name="cat[]" id="cat[]" value="<?=$value?>"> <?=$value?> </td>

					<?$i=$i+1;}
					
					}?>

					  
					 </tr>
					
					<tr><td colspan="3"><div class="border" style="margin:5px 0 0;"></div></td></tr>
				</table>

					<?} ?>
           				
				
           </td>
		 </tr>


		   </tr>
				   <tr>
					<td colspan="2" height="8"></td>
			  </tr>

			  
				
		
			     	  <tr >				
										    <td class="email_text" >Image/Audio:</td>
											<td colspan="2"><input type="file" name="files[]" id="files" multiple/>
											    <br/><span style="color:#ff3333;font-size:12px;font-family:calibri;width:360px;">Here You Can Upload Multiple Images / Audio by holding Ctrl Key</span>
											</td>
															 
									  				
									   </tr>

			
			  <tr>
					<td colspan="2" height="8"></td>
			  </tr> 
	
			    <tr>
					<td width="150px"><span class="style1"></span>&nbsp;<span class="text_heading">Video Link</span> </td>
					<td>
					  	 <!-- <input name="video" type="text" value="" id="video" size="60" > -->

                       <textarea id="video_link" name="video_link" cols="60" rows="6"></textarea><br>
					   <a align="center">( Separate Video Link By Comma Ex: Link1,Link2,Link3 )</a>

					</td>
			  </tr>
              
            
			



			  
			   <tr>
					<td colspan="2" align="center">
						&nbsp;
					</td>
				</tr>

			 <tr>
					<td colspan="2" style="padding-left:160px;">
						<input type="submit" id="submit"  name="submit" value="Create" class="button">
					</td>
				</tr>
		
			
		</form>


	</table> 
</td>
  </tr>






























	
  <!-- <tr>
    <td colspan="2" height="10" align="center"></td>
  </tr>
   <tr>
    <td colspan="2" align="left"  class="text_heading">Portfolio Images List</td>
  </tr>
   <tr>
    <td colspan="2" height="10" align="center"></td>
  </tr>
  <?
	if($_REQUEST['msg']=='del'){
  ?>
   <tr>
    <td colspan="2" height="10" align="left"  style="font-family: arial; font-size: 12px; font-weight: bold; color: #ff0000">Record Deleted Successfully. </td>
  </tr>
   <tr>
    <td colspan="2" height="10" align="center"></td>
  </tr>
  <?}?>
   <tr>
    <td colspan="2" height="8" width="100%">
		<table cellpadding="1" cellspacing="1" width="100%">
		   <tr style="background-color: #669966">
				<td width="300px" style="font-family: arial; font-size: 15px; font-weight: bold; color: #ffffff" height="25px">Title</td>
				<td style="font-family: arial; font-size: 15px; font-weight: bold; color: #ffffff" height="25px">Picture</td>
				
				<td style="font-family: arial; font-size: 15px; font-weight: bold; color: #ffffff" height="25px">Delete</td>

			  </tr> 
			  <?
				$sqlg = "Select * from fs_portfolio_photo Where ex_id = '".$id."' order by fld_id DESC";
				$resg = q($sqlg);
				$countg = nr($resg);
				if($countg){
					while($rowg = f($resg)){
			  ?>
			  <tr>
					<td height="25px"><?=$rowg['title']?></td>
					<td height="25px"><img src="admin/portfolio_pic/<?=$rowg['large_pic']?>" width="100px"></td>
				
					<td><a href="#" onClick="javascript:delete_pub(<?=$rowg['fld_id']?>, <?=$id?>)"><img src="admin/admin_img/delete.png" border="0"></a></td>
			  </tr>	
			<?		}
				}else{?>
				<tr>
					<td height="25px" colspan=4  style="font-family: arial; font-size: 15px; font-weight: bold; color: #ff0000">No  Picture Available.</td>
			  </tr>	
			<?}?>
		</table>						
	</td>
  </tr> -->
 </table>
