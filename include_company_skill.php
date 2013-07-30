<?php 
	include_once('constants.php');


		   $sql = "select * from fs_company where member_id = '".$_SESSION['fab_id']."' ";
		   $res = q($sql);	
		   $fatch = f($res);
			   
			   $skill = $fatch['main_skill'];
			   $main_skill = str_replace(',,',',', $skill);
			   
				
				$skill = explode(",",$main_skill);
			
?>

<div class="all_projects_area">
                        	<ul>
                               

                              <li><a href="company_project.php" <?if($_REQUEST['skill']==''){?>class="active"<?}?>>All Skills</a></li>

                             <?
							     foreach ($skill as &$value) {
                                 if($value!=""){	

							 ?>

							    <li><a href="company_project.php?skill=<?=$value?>"  <?if($_REQUEST['skill']==$value){?>class="active"<?}?>><?=$value?></a></li>

                            <?
								 }
							}
							?>


                            </ul>
                        </div>