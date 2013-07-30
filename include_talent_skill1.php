<?php 
	include_once('constants.php');
?>
  

<?php

		   $sql = "select * from fs_talent where member_id = '".$_REQUEST['talent_id']."' ";
		   $res = q($sql);	
		   $fatch = f($res);
			   
			   $skill = $fatch['main_skill'];
			   $main_skill = str_replace(',,',',', $skill);
			   
				
				$skill = explode(",",$main_skill);
			
?>

<div class="all_projects_area">
                        	<ul>
                               

                              <li><a href="talent_project.php" <?if($_REQUEST['skill']==''){?>class="active"<?}?>>All Skills</a></li>

                             <?
							     foreach ($skill as &$value) {
                                 if($value!=""){	

							 ?>

							    <li><a href="talent_project.php?skill=<?=$value?>" <?if($_REQUEST['skill']==$value){?>class="active"<?}?>><?=$value?></a></li>

                            <?
								 }
							}
							?>


                            </ul>
                        </div>