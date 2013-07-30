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

function upload_multiple_file($file,$file_dir="portfolio_uploader/savefiles/") {
	
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

			 $file_upload_query="INSERT into fs_talent_portfolio 
				 (
				 talent_id,
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
    $res =  upload_multiple_file($_FILES['files'],"portfolio_uploader/savefiles/");
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
               $Insert = "insert into fs_talent_portfolio(talent_id,skill,video,added_on)values('".$_SESSION['fab_id']."','".$check_val."','".$link."','".date('Y-m-d h:m:s')."') ";

			   $run_ins = q($Insert);
			}

}

        
		
			
$msg = "Added successfully ...";
           
          

            
                 

            //project_details.php?id=43
                
				//header('location:gallery.php');

			//



	  



									
 }


 ?>













<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title><?=TITLE?></title>


<script>
	function show2(){
			//alert('hgug');
		   document.getElementById('rohit').style.display="block";
		}
</script> 


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
	window.location.href='delete_talent_photo_front.php?id='+id+'&id1='+id1;
}
</script>
<link rel="stylesheet" href="admin_img/css/template_css.css" type="text/css" />
<link rel="stylesheet" href="css/edit_talent_css.css" type="text/css" />

<style type="text/css">
	
	.text{ font-family:Arial, Helvetica, sans-serif; font-size:12px; color:#fff; text-decoration:none;}
	.text span{font-size:17px;}
	.button { width:auto; padding:0 10px; height:28px; background:#669966; border-radius:5px; -moz-border-radius:5px; -webkit-border-radius:5px; font:normal 14px Arial, Helvetica, sans-serif; color:#fff; border:none;}
	.button a { color:#fff; text-decoration:none;}
	.button:hover { width:auto; padding:0 10px; height:28px; background:#6BC0F7; border-radius:5px; -moz-border-radius:5px; -webkit-border-radius:5px; font:normal 14px Arial, Helvetica, sans-serif; color:#fff; border:none;}
	.border{ border-bottom:1px dotted #cccccc; margin:10px 0;}
	 .text_heading{ font-family:Arial, Helvetica, sans-serif; font-size:12px;color:#669966;font-weight:bold; padding-top:5px; text-transform:capitalize;}
												  
</style>



     <div class="edit_profile_page">
       	<ul>
        <?include('edit_talent_profile.php');?>
        </ul>
       </div>


<table width="96%" border="0" align="center" cellspacing="1" cellpadding="1">
<tr>
    <td colspan="2" align="center" class="msg" style="font-size: 12px"><?=$msg1?></td>
  </tr>
  <tr>
    <td colspan="2" align="center"></td>
  </tr>
  <tr>
    <td colspan="2" align="left" class="text_heading">Add Portfolio Photo :   </td>
  </tr>
  <tr>
    <td colspan="2" height="8">
		
		
		
		
		
		
		<table class="center_body" width="100%"  border="0" align="right" cellspacing="1" cellpadding="1" style="margin-top:0px;float:right;">
						
		<?if($msg){?>			
		<tr>
		    <td>
		        
		            <?=$msg?>
		    </td>
		</tr>		

<?}?>


 <tr>
    <td colspan="2" height="1">

	<form enctype="multipart/form-data" onSubmit="return validate5();" name="upload_form" id="upload_form" action="" method="POST"  autocomplete="off" style="font:normal 13px arial;">
							  
							      <?php

								       $sql = "select * from fs_talent where member_id = '".$_SESSION['fab_id']."' ";
								       $res = q($sql);	
								             while($fatch = f($res)){ 
									         $skill = $fatch['main_skill'];
											   $main_skill = str_replace(',,',',', $skill);
												$skill = explode(",",$main_skill);
												$i=0; ?>
								<table width="100%"  border="0" align="center" cellspacing="0" cellpadding="0">
											

											 <tr>
													<td colspan="3"><span class="style1">*</span>&nbsp;<span>Select Skills</span> </td>
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
												
										
						

									
									<table>
									  
									  
									 

									  <tr >				
										    <td class="email_text" >Image/Audio:</td>
											<td colspan="2"><input type="file" name="files[]" id="files" multiple/>
											    <br/><span style="color:#ff3333;font-size:12px;font-family:calibri;width:360px;">Here You Can Upload Multiple Images / Audio by holding Ctrl Key</span>
											</td>
															 
									  				
									   </tr>

									  
									  
									   <tr>
											<td colspan="3" align="center">
												&nbsp;
											</td>
										</tr>

										  <tr >                      
												   
																	
												<td width="150px"><span class="style1"></span>&nbsp;<span>Video Link</span></td>
												<td colspan="2"><textarea id="video_link" name="video_link" cols="47" rows="4"></textarea><br>
													 <span style="color:#ff3333;font-size:12px;font-family:calibri;width:360px;">( Separate Video Link By Comma Ex: Link1,Link1,Link3 )</span>
												</td>
														
													
												 
										 </tr> 

									   <tr>
											<td colspan="3" align="center">
												&nbsp;
											</td>
										</tr>
										<tr>
										   <td>&nbsp;</td>
											<td colspan="2" align="left">
												<input type="submit" id="submit"   name="submit" value="Add Portfolio" >
											</td>
										</tr>
								    </table>
								</form>
</td></tr></table>
