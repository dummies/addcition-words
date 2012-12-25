<?php
$str = $_GET["word"];
$dict = file_get_contents("op.txt");
$idx = binary_search($dict, 0, sizeof($dict),$str, 'cmp');
if ($idx != -1) {
    echo true;
}
else
echo false;
	
function cmp($a, $b) {
        return ($a < $b) ? -1 : (($a > $b) ? 1 : 0);
    }
function binary_search(array $a, $first, $last, $key, $compare) {
        $lo = $first; 
        $hi = $last - 1;

        while ($lo <= $hi) {
            $mid = (int)(($hi - $lo) / 2) + $lo;
            $cmp = call_user_func($compare, $a[$mid], $key);

            if ($cmp < 0) {
                $lo = $mid + 1;
            } elseif ($cmp > 0) {
                $hi = $mid - 1;
            } else {
                return $mid;
            }
        }
        return -1;
    }
?>