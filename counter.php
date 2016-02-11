<?php
/*catalyst IT project
Author: Srikanth Chadalawada
Date : 10/02/2015
*/
//task 2

$i = range(1,100)
?>
<table>
<?php
foreach( $i as $num){
	
echo " <tr>
	<td>$num</td>
	<td>";
	
if($num % 3 == 0){
	echo "triple";
}elseif($num % 5 == 0){
	echo "fiver";	
}elseif($num % 3 and 5 == 0){
	echo "triplefiver";	
}
else{
	echo $num;	
}
	echo "</td></tr>";
}
?>
</table>