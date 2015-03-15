<?php
error_reporting ( 0 );
require '../connection.php';

$apikey = $_GET ['apikey'];
$listid = $_GET ['listid'];

if (! empty ( $apikey )) {
	$api = mysql_query ( "SELECT * FROM apikey WHERE api_key = '" . $apikey . "'" ) or die ( "{\"status\":0," . "\"error\":\"" . mysql_error () . "\"}" );
	if (mysql_num_rows ( $api ) != 1) {
		die ( "{\"status\":0," . "\"error\":\"invalid apikey\"}" );
	}
} else {
	die ( "{\"status\":0," . "\"error\":\"invalid apikey\"}" );
}

if ($listid) {
	function dijkstra($graph_array, $source, $target) {
		$vertices = array ();
		$neighbours = array ();
		foreach ( $graph_array as $edge ) {
			array_push ( $vertices, $edge [0], $edge [1] );
			$neighbours [$edge [0]] [] = array (
					"end" => $edge [1],
					"cost" => $edge [2] 
			);
			$neighbours [$edge [1]] [] = array (
					"end" => $edge [0],
					"cost" => $edge [2] 
			);
		}
		$vertices = array_unique ( $vertices );
		
		foreach ( $vertices as $vertex ) {
			$dist [$vertex] = INF;
			$previous [$vertex] = NULL;
		}
		
		$dist [$source] = 0;
		$Q = $vertices;
		while ( count ( $Q ) > 0 ) {
			
			// TODO - Find faster way to get minimum
			$min = INF;
			foreach ( $Q as $vertex ) {
				if ($dist [$vertex] < $min) {
					$min = $dist [$vertex];
					$u = $vertex;
				}
			}
			
			$Q = array_diff ( $Q, array (
					$u 
			) );
			if ($dist [$u] == INF or $u == $target) {
				break;
			}
			
			if (isset ( $neighbours [$u] )) {
				foreach ( $neighbours [$u] as $arr ) {
					$alt = $dist [$u] + $arr ["cost"];
					if ($alt < $dist [$arr ["end"]]) {
						$dist [$arr ["end"]] = $alt;
						$previous [$arr ["end"]] = $u;
					}
				}
			}
		}
		$path = array ();
		$u = $target;
		while ( isset ( $previous [$u] ) ) {
			array_unshift ( $path, $u );
			$u = $previous [$u];
		}
		array_unshift ( $path, $u );
		return $path;
	}
	
	$graph_array = array (
			array (
					"a",
					"b",
					3 
			),
			array (
					"a",
					"c",
					3 
			),
			array (
					"a",
					"d",
					4 
			),
			array (
					"d",
					"c",
					1 
			),
			array (
					"d",
					"b",
					1 
			),
			array (
					"c",
					"f",
					10 
			),
			array (
					"f",
					"g",
					3 
			),
			array (
					"b",
					"e",
					8 
			),
			array (
					"e",
					"g",
					2 
			) 
	);
	
	$path = dijkstra ( $graph_array, "a", "g" );
	
	echo "path is: " . implode ( ", ", $path ) . "\n";
}else{
	die ( "{\"status\":0," . "\"error\":\"Give listid\"}" );
}
?>