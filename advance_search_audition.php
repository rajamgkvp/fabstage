		<script language="JavaScript">
				function showDiv() {  
               if(document.getElementById("physical").value=="yes")
			       {
						
						document.getElementById('rohit').style.visibility = 'visible';
						
				   } else{
				          document.getElementById('rohit').style.visibility = 'hidden';
				   }
				}
				-->
		</script>

         
        <script language="JavaScript">
				function show() {  
               if(document.getElementById("association").value=="yes")
			       {
						
						document.getElementById('gupta').style.visibility = 'visible';
						
				   } else{
				          document.getElementById('gupta').style.visibility = 'hidden';
				   }
				}
				-->
		</script>


<?

if($_REQUEST['submit']!=''){


 
 header('location:audition_search_result.php?cat='.$_REQUEST['cat'].'&category='.$_REQUEST['category'].'&location='.$_REQUEST['location'].'&to_experience='.$_REQUEST['to_experience'].'&from_experience='.$_REQUEST['from_experience'].'&language='.$_REQUEST['language'].'&wag_to='.$_REQUEST['wag_to'].'&wag_from='.$_REQUEST['wag_from'].'&assosiation_name='.$_REQUEST['assosiation_name'].'&nationality='.$_REQUEST['nationality'].'&to_height='.$_REQUEST['to_height'].'&from_height='.$_REQUEST['from_height'].'&from_height='.$_REQUEST['from_height'].'&from_height='.$_REQUEST['from_height'].'&from_height='.$_REQUEST['from_height'].'&from_height='.$_REQUEST['from_height'].'&weight='.$_REQUEST['weight'].'&ethenicity='.$_REQUEST['ethenicity'].'&eye='.$_REQUEST['eye'].'&hair='.$_REQUEST['hair'].'&body='.$_REQUEST['body'].'&skin='.$_REQUEST['skin'].'&shoes='.$_REQUEST['shoes'].'&dress='.$_REQUEST['dress'].'&look='.$_REQUEST['look'].'');
    
 
 
 
 }

?>


<form enctype="multipart/form-data" name="form" id="form" action="" method="POST" >
	<div class="post_area">
		<ul>
			<li>
				<a>Category: 
					<input class="text_input" type="text" value="<?=$_REQUEST['category']?>" name="category" id="category">
				</a>
			</li>
			<li>
				<a>Location: 
					&nbsp;<input type="text" name="location" value="<?=$_REQUEST['location']?>" id="location">
				</a>
			</li> 
			<li>
				<a>Exp:
					<select id="to_experience" name="to_experience">
					   <option value="">To</option>
						<?php
						  $query_s = "select * from fs_experience";
						  $query_run = q($query_s);
						  while($fatch_s = f($query_run)){
						?>
						<option value="<?=$fatch_s['value']?>" <?if($fatch_s['value']==$_REQUEST['to_experience']){?>selected<?}?>><?=$fatch_s['value']?> </option>
						<?}?>
					</select> &nbsp;
					<select id="from_experience" name="from_experience">
						<option value="">From</option>
						<?php
						  $query_s = "select * from fs_experience";
						  $query_run = q($query_s);
						  while($fatch_s = f($query_run)){
						?>
						<option value="<?=$fatch_s['value']?>" <?if($fatch_s['value']==$_REQUEST['from_experience']){?>selected<?}?> ><?=$fatch_s['value']?> </option>
						<?}?>
					</select>
				</a>
			</li>
			<li>
				<a>Language: 
					<input type="text" name="language" value="<?=$_REQUEST['language']?>" id="language">
				</a>
			</li>
			<li>
					<a>Wages:
						<input type="text" name="wag_to" value="<?=$_REQUEST['wag_to']?>" id="wag_to" size="5"> 
						&nbsp;
						<input type="text" name="wag_from" value="<?=$_REQUEST['wag_from']?>"  id="wag_from" size="5">
					</a>
			</li>

			<li>
				<a>Any Assosiation:   
					<select id="association" name="association" onchange="show();">
						<option value="yes"  <?if("yes"==$_REQUEST['association']){?>selected<?}?>>Yes</option>
						<option value="no"  <?if("no"==$_REQUEST['association']){?>selected<?}?>>No</option>
					</select>
				</a>
			</li>

            
			<div id="gupta">
                 <li>
					<a>Assosiation Name: 
						&nbsp;<input type="text" value="<?=$_REQUEST['assosiation_name']?>" name="assosiation_name" id="assosiation_name" size="12px">
					</a>
			     </li> 
			 
			</div>
           


		
			<li>
				<a>Physical Specification:   
					 <select id="physical" name="physical" onchange="showDiv();">
						  <option value="yes" <?if("yes"==$_REQUEST['physical']){?>selected<?}?>>Yes</option>
						  <option value="no" <?if("no"==$_REQUEST['physical']){?>selected<?}?>>No</option>
					 </select>
				</a>
			</li>
            <div id="rohit">
			
            
           <li>
			 <a>Height:
				   <select id="to_height" name="to_height" style="width:70px;">
						  <option value="">To:</option>
						  <? $height = "select * from fs_height order by fld_id ASC";
							 $height_run = q($height);
							 while($height_fatch = f($height_run)){
						  ?> 
						  <option value="<?=$height_fatch['type']?>" <?if($height_fatch['type']==$_REQUEST['to_height']){?>selected<?}?>><?=$height_fatch['type']?></option>
						  <?}?>
				  </select>&nbsp; &nbsp;
				  <select id="from_height" name="from_height" style="width:70px;">
						  <option value="">From:</option>
						  <? $height = "select * from fs_height order by fld_id ASC";
							 $height_run = q($height);
							 while($height_fatch = f($height_run)){
						  ?> 
						  <option value="<?=$height_fatch['type']?>" <?if($height_fatch['type']==$_REQUEST['from_height']){?>selected<?}?>><?=$height_fatch['type']?></option>
						  <?}?>
				  </select>
            </a> 
         </li>
		

         
         <li>
			 <a>Weight:
				  <select id="weight" name="weight">
						  <option value="">Select Weight</option>
						  <? $weight = "select * from fs_weight order by fld_id ASC";
							 $weight_run = q($weight);
							 while($weight_fatch = f($weight_run)){
						  ?> 
						  <option value="<?=$weight_fatch['type']?>" <?if($weight_fatch['type']==$_REQUEST['weight']){?>selected<?}?>><?=$weight_fatch['type']?></option>
						  <?}?>
                  </select>
            </a>
         </li> 
         

		    <li>
			 <a>Ethenicity:
				  <select id="ethenicity" name="ethenicity" >
					  <option value="">Select Ethenicity</option>
					  <? $ethenicity = "select * from fs_ethenicity order by fld_id ASC";
						 $ethenicity_run = q($ethenicity);
						 while($ethenicity_fatch = f($ethenicity_run)){
					  ?> 
					  <option value="<?=$ethenicity_fatch['type']?>" <?if($ethenicity_fatch['type']==$_REQUEST['ethenicity']){?>selected<?}?>><?=$ethenicity_fatch['type']?></option>
					  <?}?>
                 </select>
            </a>
         </li> 
        

        <li>
			 <a>Eyes Color:
				 <select id="eye" name="eye" >
						  <option value="">Select Eyes Color</option>
						  <? $eye = "select * from fs_eyes_color order by fld_id ASC";
							 $eye_run = q($eye);
							 while($eye_fatch = f($eye_run)){
						  ?> 
						  <option value="<?=$eye_fatch['type']?>" <?if($eye_fatch['type']==$_REQUEST['eye']){?>selected<?}?>><?=$eye_fatch['type']?></option>
						  <?}?>
                 </select>
            </a>
         </li> 
         
		  
           <li>
			 <a>Hair Color:
				 <select id="hair" name="hair" >
					  <option value="">Select Hair Color</option>
					  <? $hair = "select * from fs_hair_color order by fld_id ASC";
						 $hair_run = q($hair);
						 while($hair_fatch = f($hair_run)){
					  ?> 
					  <option value="<?=$hair_fatch['type']?>" <?if($hair_fatch['type']==$_REQUEST['hair']){?>selected<?}?>><?=$hair_fatch['type']?></option>
					  <?}?>
                </select>
            </a>
         </li>

 
           <li>
			 <a>Body Type:
				<select id="body" name="body" >
						  <option value="">Select Body Type</option>
						  <? $body = "select * from fs_body_type order by fld_id ASC";
							 $body_run = q($body);
							 while($body_fatch = f($body_run)){
						  ?> 
						  <option value="<?=$body_fatch['type']?>" <?if($body_fatch['type']==$_REQUEST['body']){?>selected<?}?>><?=$body_fatch['type']?></option>
						  <?}?>
               </select>
            </a>
         </li>

		     <li>
			 <a>Skin Color:
				<select id="skin" name="skin">
						  <option value="">Select Skin Color</option>
						  <? $skin = "select * from fs_skin_color order by fld_id ASC";
							 $skin_run = q($skin);
							 while($skin_fatch = f($skin_run)){
						  ?> 
						  <option value="<?=$skin_fatch['type']?>" <?if($skin_fatch['type']==$_REQUEST['skin']){?>selected<?}?>><?=$skin_fatch['type']?></option>
						  <?}?>
               </select>
            </a>
         </li>

		   <li>
			 <a>Shoes Size:
				<select id="shoes" name="shoes" style="width:100px;">
				  <option value="">Select Shoes Size</option>
				  <? $shoes = "select * from fs_shoe_size order by fld_id ASC";
				  	 $shoes_run = q($shoes);
					 while($shoes_fatch = f($shoes_run)){
				  ?> 
				  <option value="<?=$shoes_fatch['type']?>" <?if($shoes_fatch['type']==$_REQUEST['shoes']){?>selected<?}?>><?=$shoes_fatch['type']?></option>
				  <?}?>
               </select>
            </a>
         </li>


		 
		   <li>
			 <a>Dress Size:
				<select id="dress" name="dress" >
				  <option value="">Select Dress Size</option>
				  <? $dress = "select * from fs_dress_size order by fld_id ASC";
				  	 $dress_run = q($dress);
					 while($dress_fatch = f($dress_run)){
				  ?> 
				  <option value="<?=$dress_fatch['type']?>" <?if($dress_fatch['type']==$_REQUEST['dress']){?>selected<?}?>><?=$dress_fatch['type']?></option>
				  <?}?>
               </select>
            </a>
         </li>
         
		 <li>
				<a>Look Like: 
					&nbsp;<input type="text" value="<?=$_REQUEST['look']?>" name="look" id="look">
				</a>
		 </li>


			</div>
         
			 <input name="submit" id="submit"  type="submit" value="Search" class="search_btn" style="margin-left:10px;" /> 
        
		</ul>
	</div>

	</form>