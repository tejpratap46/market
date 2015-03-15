<?php
// remove from cart
$a = "<id>194</id><name>Moto X (16 GB) (Black, Without Adapter)</name><cost>17999</cost><quantity>1</quantity>";
$b = explode ( "</quantity>", $a );
echo count($b);
for($i = 0; $i < count ( $b ) - 1; $i ++) {
	$b [$i] = $b [$i] . "</quantity>";
}
echo json_encode ( $b );
?>