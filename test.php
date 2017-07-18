<!DOCTYPE html>

<?php
/* sample input  $a is an array of number of tickets each machine has, $k is the 
 * numbers of tickets we want to sell and gain maximum profit
 * 
 * contition : the ticket price would be the same the number of tickets remained into the booth 

 * Input: there are some long intergers as well in to the input ($a,$k) 

 * here we have sample $a and $k */

$a = [4, 7, 1, 4, 8, 8];
$k = 4;

$result = 0;

$tickets = max($a);
$commcount = array_count_values($a);


for ($i = 1; $i <= $tickets; $i++) {
    if (array_key_exists($i, $commcount)) {
        $m[$i] = $commcount[$i];
    } else {
        $m[$i] = 0;
    }
}



$counter = count($m);

while ($k > 0) {
    if ($m[$counter] > 0) {
        if ($m[$counter] > $k) {
            $m[$counter] = $k;
        }
        $temp = $m[$counter] * $counter;
        $result += $temp;

        $m[$counter - 1] = $m[$counter - 1] + $m[$counter];

        $k = $k - $m[$counter];

        $m[$counter] = 0;
    } else {
        $counter--;
    }
}


echo $result;
?>
   