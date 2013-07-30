<?php
function articleMerge(){
	$numArgs = func_num_args();
	$args = func_get_args();
	$biggest=0;
	for($i=0;$i<$numArgs;$i++){
		$arr[$i] = explode(' ',$args[$i]);
		$size = sizeof($arr[$i]);
		$sizeArgs[$i] =$size;
		if($biggest < $size) $biggest=$size;
	}

	$merged=array();
	for($i=0;$i<$biggest;$i++){
		for($j=0;$j<$numArgs;$j++){
			$element = $sizeArgs[$j] <= $i ? $i%$sizeArgs[$j] : $i;
			if($i==0 && $j>0){
				$str = strtolower($arr[$j][$element]);
			}else{
				$str = $arr[$j][$element];
			}
			$merged[]=$str;
		}
	}

	$str = '';
	$size=sizeof($merged);
	$previous='';
	for($i=0;$i<$size;$i++){
		$current = $merged[$i];
		if(strtolower($current) === strtolower($previous)) continue;
		$str .= $current.' ';
		$previous=$current;
	}
	return $str;
}

function resizeArticle($article, $num){
	$arr = explode(' ',$article);
	$size = sizeof($arr);
	if($size <= $num) return $article;
	$str='';
	for($i=0; $i<$num;$i++){
		$str .= $arr[$i].' ';
	}
	return $str;
}

function removeNL($article){
	$article = str_replace("\n", '', $article);
	return $article;
}

?>