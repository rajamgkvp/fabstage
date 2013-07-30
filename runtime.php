<?php
$pno = $_REQUEST['pno'];
if($pno=='2'){
echo '
<span name="statuscat11" id="statuscat11">
<input class="category_input" type="text" value="category1" name="category1" id="category1"  />
</span>
';
}else{

echo "<span name='statuscat11' id='statuscat11'>
				<input class='category_input' type='text'  name='category' id='category'  />
				</span>";


}
?>