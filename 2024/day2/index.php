<?php
include_once("data.php");

$exp_data = explode("\n",$data);
echo "<pre>";
// var_dump($exp_data);
// $array_column_one = [];
// $array_column_two = [];

$safeCounter = 0;
foreach($exp_data as $key => $calc_value){
    $data_reeks = explode(" ",$calc_value);
    // var_dump($data_reeks);
    $prevValue = -1;
    $direction = [];
    $totalCount = count($data_reeks);
    $skipValue = 0;
    // var_dump($data_reeks);
    foreach($data_reeks as $key2 => $reeks_value){
        if($prevValue == -1){
            $prevValue = $reeks_value;
        }else{
            $som = $reeks_value - $prevValue;
            // if($skipValue == 0){
            //     if($som != 0){
            //         //skip value
            //         $skipValue++;
            //     }
            // }

            if($som == 0){
                $direction[] = "same";
            }
            if($som > 0 && $som <= 3){
                $direction[] = "increas";
            }
            if($som < 0 && $som >= -3){
                $direction[] = "decreas";
            }
       
            
            $prevValue = $reeks_value;
        }
    }
    $arrayCount = array_count_values($direction);
    var_dump($totalCount-1);
    var_dump($arrayCount);

    // Solution 1:
    // if(isset($arrayCount['increas']) && ($totalCount-1) == $arrayCount['increas']){
    //     $safeCounter++;
    // }
    // if(isset($arrayCount['decreas']) && ($totalCount-1) == $arrayCount['decreas']){
    //     $safeCounter++;
    // }

    if(isset($arrayCount['increas']) && ($totalCount-1) == $arrayCount['increas']){
        echo "COUNTERUP<br>";
        $safeCounter++;
    }
    if(isset($arrayCount['decreas']) && ($totalCount-1) == $arrayCount['decreas']){
        echo "COUNTERUP<br>";
        $safeCounter++;
    }

    if(isset($arrayCount['increas'],$arrayCount['decreas']) && !isset($arrayCount['same']) && ($arrayCount['increas'] > 1 && $arrayCount['decreas'] == 1)){
        echo "COUNTERUP - Decreas remove<br>";
        $safeCounter++;
    }

    if(isset($arrayCount['increas'],$arrayCount['decreas']) && !isset($arrayCount['same']) && ($arrayCount['decreas'] > 1 && $arrayCount['increas'] == 1)){
        echo "COUNTERUP - Increas remove<br>";
        $safeCounter++;
    }

    if(isset($arrayCount['increas'],$arrayCount['same']) && !isset($arrayCount['decreas']) && ($arrayCount['increas'] > 1 && $arrayCount['same'] == 1)){
        echo "COUNTERUP - Decreas remove<br>";
        $safeCounter++;
    }

    if(isset($arrayCount['same'],$arrayCount['decreas']) && !isset($arrayCount['increas']) && ($arrayCount['decreas'] > 1 && $arrayCount['same'] == 1)){
        echo "COUNTERUP - Increas remove<br>";
        $safeCounter++;
    }

   
    
}

echo $safeCounter;
?>