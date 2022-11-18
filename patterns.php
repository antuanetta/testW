<?php
 $patterns = ['', '1', '10?', '??', '0?0?0'];
 
 function walk_all_pattern(array $patterns) {
 	foreach ($patterns as $pattern) {
 		var_dump(implode(',', make_all_matches($pattern)));
 	}
 }
 
 function make_all_matches(string $pattern) {
 	
 	$results = [$pattern];
 	
 	if (stripos($pattern, '?') === false) {
 		return $results;
 	}

 	for ($i = 0; $i < strlen($pattern); $i++) {
 		$pos = stripos($pattern, '?', $i);
 		
 		if ($pos !== $i) {
 			continue;
 		}
 		
 		$temp = [];
 		foreach ($results as $result) {
 			$temp[] = substr_replace($result, '0', $i, 1);
 			$temp[] = substr_replace($result, '1', $i, 1);
 		}
 		
 		$results = $temp;
 	}
 	
 	return $results;
 }
 
 walk_all_pattern($patterns);
