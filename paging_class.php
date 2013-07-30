<?
class paging
{
	var $koneksi;
	var $p;
	var $page;
	var $q;
	var $query;
	var $next;
	var $prev;
	var $number;

	function paging($baris=25, $langkah=25, $prev="PREV", $next="NEXT", $number="%%number%%")
	{
		$this->next=$next;
		$this->prev=$prev;
		$this->number=$number;
		$this->p["baris"]=$baris;
		$this->p["langkah"]=$langkah;
		$_SERVER["QUERY_STRING"]=preg_replace("/&page=[0-9]*/","",$_SERVER["QUERY_STRING"]);
		if (empty($_GET["page"])) {
			$this->page=1;
		} else {
			$this->page=$_GET["page"];
		}
	}

	function query($query)
	{
		$kondisi=false;
		// only select
		if (!preg_match("/^[\s]*select*/i",$query)) {
			$query="select ".$query;
		}

		// filter count query
		if (preg_match("/^select[\s]distinct/si",$query)){ //if distinct
			//if yes
			$query_temp=preg_replace("/select (.*) from (.*)/si","select count(\\1) from \\2",$query);
		} else {
			//if no
			$query_temp=preg_replace("/select .* from (.*)/si","select count(*) from \\1",$query);
		}

		$result_temp=mysql_query($query_temp) or die ("Query Error");
		list($this->p["count"]) = mysql_fetch_row($result_temp);

		// total page
		$this->p["total_page"]=ceil($this->p["count"]/$this->p["baris"]);

		// filter page
		if  ($this->page<=1)
			$this->page=1;
		elseif ($this->page>$this->p["total_page"])
			$this->page=$this->p["total_page"];

		// awal data yang diambil
		$this->p["mulai"]=$this->page*$this->p["baris"]-$this->p["baris"];

		$query=$query." limit ".$this->p["mulai"].",".$this->p["baris"];

		$query=mysql_query($query) or die("Query Error");
		$this->query=$query;
	}
	
	function result()
	{
		return $result=mysql_fetch_object($this->query);
	}

	function result_assoc()
	{
		return mysql_fetch_assoc($this->query);
	}

	function print_no()
	{
		$number=$this->p["mulai"]+=1;
		return $number;
	}
	
	function print_info()
	{
		$page=array();
		$page["start"]=$this->p["mulai"]+1;
		$page["end"]=$this->p["mulai"]+$this->p["baris"];
		$page["total"]=$this->p["count"];
		$page["total_pages"]=$this->p["total_page"];
			if ($page["end"] > $page["total"]) {
				$page["end"]=$page["total"];
			}
			if (empty($this->p["count"])) {
				$page["start"]=0;
			}

		return $page;
	}

	function print_link()
	{
		//generate template
		function number($i,$number)
		{
			return ereg_replace("^(.*)%%number%%(.*)$","\\1$i\\2",$number);
		}
		$print_link = false;

		if ($this->p["count"]>$this->p["baris"]) {

			// print prev
			if ($this->page>1)
			$print_link .= "<a href=\"".$_SERVER["PHP_SELF"]."?".$_SERVER["QUERY_STRING"]."&page=".($this->page-1)."\">".$this->prev."</a>\n";

			// set number
			$this->p["bawah"]=$this->page-$this->p["langkah"];
				if ($this->p["bawah"]<1) $this->p["bawah"]=1;

			$this->p["atas"]=$this->page+$this->p["langkah"];
				if ($this->p["atas"]>$this->p["total_page"]) $this->p["atas"]=$this->p["total_page"];

			// print start
			if ($this->page<>1)
			{
				for ($i=$this->p["bawah"];$i<=$this->page-1;$i++)
					$print_link .="<a href=\"".$_SERVER["PHP_SELF"]."?".$_SERVER["QUERY_STRING"]."&page=$i\">".number($i,$this->number)."</a>\n";
			}
			// print active
			if ($this->p["total_page"]>1)
				$print_link .= "<b>".number($this->page,$this->number)."</b>\n";

			// print end
			for ($i=$this->page+1;$i<=$this->p["atas"];$i++)
			$print_link .= "<a href=\"".$_SERVER["PHP_SELF"]."?".$_SERVER["QUERY_STRING"]."&page=$i\">".number($i,$this->number)."</a>\n";

			// print next
			if ($this->page<$this->p["total_page"])
			$print_link .= "<a href=\"".$_SERVER["PHP_SELF"]."?".$_SERVER["QUERY_STRING"]."&page=".($this->page+1)."\">".$this->next."</a>\n";

			return $print_link;
		}
	}
}
?>