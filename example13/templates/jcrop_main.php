
<script src="js/jquery.min.js"></script>
<script src="js/jquery.ui.widget.js"></script>
<script src="js/jquery.ui.accordion.js"></script>
<script src="js/jquery.Jcrop.min.js"></script>

<script src="js/jcrop_main.js"></script>

<link rel="stylesheet" href="templates/css/jquery.ui.theme.css" type="text/css" />
<link rel="stylesheet" href="templates/css/jquery.ui.accordion.css" type="text/css" />
<link rel="stylesheet" href="templates/css/jquery.Jcrop.css" type="text/css" />
<link rel="stylesheet" href="templates/css/jcrop_main.css" type="text/css" />

<div class="jcrop_example">

    <div id="accordion" class="accordion">
        <h3><a href="#" style="color:blue;text-decoration:none;">Crop Your Image For Profile Pic</a></h3>

       
		
		
		
		
		<div class="sample_1">
          <table width="100%">
		  <tr>
		  

			  <td width="50%" action="center">

				   <h4>Current Profile Image</h4>
                <div style="overflow: hidden; width: 200px; height: 200px;">

				<?
				   $select = f(q("select * from fs_mamber where fld_id = ".$_SESSION['fab_id'].""));
				?>
                   <img  src="http://fabstage.swtpl.co.in/<?=$select['profile_crop_image']?>"/>

            
                    
           


 </div>  
             </td> 
    <!-- <div style="margin-bottom:10px;">
                <h4>Preview pane:</h4>
                <div style="overflow: hidden; width: 200px; height: 200px;">
                    <img id="preview" src="http://fabstage.swtpl.co.in/<?=$_REQUEST['link']?>"/>
                </div>
            </div> -->
		
           
            </div>

           <table width="100%">
		   <tr>
		     <td>
                <img src="http://fabstage.swtpl.co.in/<?=$_REQUEST['link']?>" id="cropbox1"/>
				 
             </td>
			
			 
               </tr>
		</table>	
	 	
			<form action="index.php?link=<?=$_REQUEST['link']?>" method="post" onsubmit="return checkCoords();">
                <div style="margin:5px;">
                    <label>X1 <input type="text" name="x" id="x" size="4"/></label>
                    <label>Y1 <input type="text" name="y" id="y" size="4"/></label>
                    <label>X2 <input type="text" name="x2" id="x2" size="4"/></label>
                    <label>Y2 <input type="text" name="y2" id="y2" size="4"/></label>
                    <label>W <input type="text" name="w" id="w" size="4"/></label>
                    <label>H <input type="text" name="h" id="h" size="4"/></label>
                </div>

                <div style="margin:5px;">
                    <input type="submit" value="Crop Image" />
                </div>
            </form>
          </table>
           
        </div>

    
    </div>

</div>
