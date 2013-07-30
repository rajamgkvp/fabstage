<?
include('constants.php');

$pno = $_REQUEST['pno'];

                   
                 
			
					for($i=1;$i<=$pno;$i++)
					{
				
					$str .='
					<table width="100%"  cellpadding="0" cellspacing="2">
					<tr>
						<td  width="140px" align="left" >Video Link '.$i.' <span style="color:red"><B>*</B></span></td>

						<td><input type="text" size="60" name="ro'.$i.'" style="font-family: verdana; font-size: 12px; border: 1px solid #666666 " id="ro'.$i.'" value="ro'.$i.'"/></td>

						
						
					</tr>';
					
					}
					$str .='</table>';
					echo $str;
?>	