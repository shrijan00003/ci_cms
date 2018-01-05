<?php

echo get_ol($pages);
//displaying pages in nested order list
//we need the recursive funtion for that
function get_ol($array,$child=false){//whether it is child or not
	$str='';
	if (count($array)) {
		$str.=$child==false?'<ol class="sortable">':'<ol>';
		foreach ($array as $item) {
			$str.='<li id="list_'.$item['id'].'">';
			$str.='<div>'.$item['title'].'</div>';
			//do we have children
			if (isset($item['children'])&& count($item['children'])) {
				$str.=get_ol($item['children'],true); 
			}
			$str.='</li>'.PHP_EOL;
		}
		$str.='</ol>'.PHP_EOL;
	}
	
	return $str;

}
?>
<script type="text/javascript">
	$(document).ready(function(){

		$('.sortable').nestedSortable({
			handle: 'div',
			items: 'li',
			toleranceElement: '> div',
			maxLevels:2
		});

	});
</script>
