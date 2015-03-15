<?php

/**
* A* implementation.
*
* PHP version 5
*
* @category Algorithms
* @package Astar
* @author Tobias Sjösten <tobias.sjosten@gmail.com>
* @license http://www.gnu.org/licenses/gpl.html GNU License
* @link http://vvv.tobiassjosten.net/
*/

/**
 * Calculate the cheapest path between two points in a map.
 *
 * @param array $endpoints
 *        	Start and end positions.
 * @param array $map
 *        	Grid to calculate path within.
 *        	
 * @return Array with keys 0=>cost and 1=>path from $start to $end.
 *        
 */
function findLowest($endpoints, $map) {
	$queue = $visited = array ();
	
	// Add start position to queue.
	$queue [$endpoints [0] . 'x' . $endpoints [1]] = array (
			array (
					$endpoints [0],
					$endpoints [1] 
			),
			true,
			$map [$endpoints [1]] [$endpoints [0]] 
	);
	
	while ( true ) {
		/* START FETCH ITEM */
		if (! count ( $queue )) {
			return false;
		}
		
		$cost = INF;
		$next_item = false;
		
		foreach ( $queue as $item ) {
			if ($item [2] < $cost) {
				$next_item = $item;
				$cost = $item [2];
			}
		}
		
		unset ( $queue [$next_item [0] [0] . 'x' . $next_item [0] [1]] );
		
		if (! $next_item) {
			break;
		}
		$item = $next_item;
		/* END FETCH ITEM */
		
		$item_id = $item [0] [0] . 'x' . $item [0] [1];
		if (! empty ( $visited [$item_id] )) {
			continue;
		}
		$visited [$item_id] = $item [1];
		
		// If current node is the end node, we've found our path!
		if ($item [0] [0] == $endpoints [2] && $item [0] [1] == $endpoints [3]) {
			$path = array ();
			$cost = 0;
			$node = $item [0];
			
			while ( $parent = $visited [$node [0] . 'x' . $node [1]] ) {
				$cost += $path [] = $map [$node [1]] [$node [0]];
				
				if ($parent === true) {
					break;
				}
				
				$node = $parent;
			}
			
			return array (
					$cost,
					array_reverse ( $path ) 
			);
		}
		
		/* START QUEUE ADJACENTS */
		$directions = array (
				array (	0,- 1 ),
				array (1,0 ),
				array (0,1 ),
				array (- 1,0 ) 
		);
		
		foreach ( $directions as $direction ) {
			$adjacent = array (
					$item [0] [0] + $direction [0],
					$item [0] [1] + $direction [1] 
			);
			
			$in_range = ! empty ( $map [$adjacent [1]] ) && ! empty ( $map [$adjacent [1]] [$adjacent [0]] );
			
			if (! empty ( $visited [$adjacent [0] . 'x' . $adjacent [1]] ) || ! $in_range) {
				continue;
			}
			
			/* START QUEUE ADD */
			$adjacent_id = $adjacent [0] . 'x' . $adjacent [1];
			$adjacent_cost = $item [2] + $map [$adjacent [1]] [$adjacent [0]];
			
			$adjacent_queue = true;
			
			if (! empty ( $visited [$adjacent_id] )) {
				$adjacent_queue = false;
			}
			
			if (! empty ( $queue [$adjacent_id] )) {
				if ($adjacent_cost < $queue [$adjacent_id] [2]) {
					$queue [$adjacent_id] [1] = true;
					$queue [$adjacent_id] [2] = $adjacent_cost;
				}
				
				$adjacent_queue = false;
			}
			
			if ($adjacent_queue) {
				$queue [$adjacent_id] = array (
						$adjacent,
						$item [0],
						$adjacent_cost 
				);
			}
			/* END QUEUE ADD */
		}
		/* END QUEUE ADJACENTS */
	}
}