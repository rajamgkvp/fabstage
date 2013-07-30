 <?
   function check_integer($which) {
        if(isset($_REQUEST[$which])){
            if (intval($_REQUEST[$which])>0) {
                //check the paging variable was set or not, 
                //if yes then return its number:
                //for example: ?page=5, then it will return 5 (integer)
                return intval($_REQUEST[$which]);
            } else {
                return false;
            }
        }
        return false;
    }//end of check_integer()

    function get_current_page() {
        if(($var=check_integer('page'))) {
            //return value of 'page', in support to above method
            return $var;
        } else {
            //return 1, if it wasnt set before, page=1
            return 1;
        }
    }//end of method get_current_page()

    function doPages($page_size, $thepage, $query_string, $total=0) {
        
        //per page count
        $index_limit = 6;

        //set the query string to blank, then later attach it with $query_string
        $query='';
        
        if(strlen($query_string)>0){
            $query = "&amp;".$query_string;
        }
        
        //get the current page number example: 3, 4 etc: see above method description
        $current = get_current_page();
        
        $total_pages=ceil($total/$page_size);
        $start=max($current-intval($index_limit/2), 1);
        $end=$start+$index_limit-1;

        echo '<br /><br /><div class="paging">';

        if($current==1) {
            echo '<span class="prn">&lt; Previous</span>&nbsp;';
        } else {
            $i = $current-1;
            echo '<a href="'.$thepage.'&page='.$i.$query.'" class="prn" rel="nofollow" title="Go to Page '.$i.'">&lt; Previous</a>&nbsp;';
            //echo '<span class="prn1">...</span>&nbsp;';
        }

        if($start > 1) {
            $i = 1;
            echo '<a href="'.$thepage.'&page='.$i.$query.'" title="Go to Page '.$i.'">'.$i.'</a>&nbsp;';
        }

        for ($i = $start; $i <= $end && $i <= $total_pages; $i++){
            if($i==$current) {
                echo '<span>'.$i.'</span>&nbsp;';
            } else {
                echo '<a href="'.$thepage.'&page='.$i.$query.'" title="Go to Page '.$i.'">'.$i.'</a>&nbsp;';
            }
        }

        if($total_pages > $end){
            $i = $total_pages;
			 echo '<span class="prn1">...</span>&nbsp;';
            echo '<a href="'.$thepage.'&page='.$i.$query.'" title="Go to Page '.$i.'">'.$i.'</a>&nbsp;';
        }

        if($current < $total_pages) {
            $i = $current+1;
            //echo '<span class="prn1">...</span>&nbsp;';
            echo '<a href="'.$thepage.'&page='.$i.$query.'" class="prn" rel="nofollow" title="Go to Page '.$i.'">Next &gt;</a>&nbsp;';
        } else {
            echo '<span class="prn">Next &gt;</span>&nbsp;';
        }
        
        //if nothing passed to method or zero, then dont print result, else print the total count below:
        if ($total != 0){
            //prints the total result count just below the paging
           // echo '<p id="total_count">(total '.$total.' results)</p></div>';
        }
        
    }
	
	/*
	if($_REQUEST['page'] == '' || $_REQUEST['page'] == 1){
		$limit = "LIMIT 0,10";
	}else if($_REQUEST['page'] > 1){
		$off = ($_REQUEST['page']-1)*10;
		$value = 10;
		$limit = "LIMIT ".$off.",".$value."";
	}
	$sqlcs = "Select * FROM tbl_confes order by fld_id DESC ".$limit;
	*/
?>