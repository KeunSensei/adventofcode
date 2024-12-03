<?php
include_once("data.php");

$exp_data = explode("   ",$data);
echo "<pre>";
// var_dump($exp_data);
$array_column_one = [];
$array_column_two = [];

foreach($exp_data as $key => $current_code){
    
    if($key == 0){
        $array_column_one[] = $current_code;
    }else{
        // echo $key."-";
        $narray = explode("\n",$current_code);
        
        $array_column_two[] = $narray[0];
        if(!empty($narray[1])){
            $array_column_one[] = $narray[1];
        }
    }
    // if($key == 1000){
    //     $array_column_two[] = $current_code;
    // }

}
unset($array_column_one[1000]);

// echo "array1: ";
// var_dump($array_column_one);
// echo "array2: ";
// var_dump($array_column_two);

sort($array_column_one);
sort($array_column_two);

$array2count = array_count_values($array_column_two);

// echo "array1: ";
// var_dump($array_column_one);
// echo "array2: ";
// var_dump($array_column_two);

$totalvalue = 0;

foreach($array_column_one as $ar_key => $ar_val_one){
    //Solution for part one:
    // $ar_val_two = $array_column_two[$ar_key];
    // $sum_one = abs($ar_val_one - $ar_val_two);

    //Solution for part two:
    // if(!empty($array2count[$ar_val_one])){
    //     $ar_val_two = $array2count[$ar_val_one];
    // }else{
    //     $ar_val_two = 0;
    // }
    // $sum_one = $ar_val_one * $ar_val_two;
    // $totalvalue = $totalvalue+$sum_one;

    // echo "line <br>";
    // var_dump($ar_val_one);
    // var_dump($ar_val_two);
    // var_dump($sum_one);
    // echo $sum_one."<br>";
    
}

echo $totalvalue;
?>