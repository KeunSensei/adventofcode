<?php
$data = file_get_contents("data.txt");
echo "<pre>";
// $pattern = '/mul\((\d+),(\d+)\)/';
// preg_match_all($pattern, $data, $matches);

// var_dump($matches[0]);

// $totalCount = 0;
// foreach($matches[0] as $key => $val){
//     $removeMul = str_replace('mul(',"",$val);
//     $removeEx = str_replace(')',"",$removeMul);

//     $arrSom = explode(',',$removeEx);

//     $som = $arrSom[0] * $arrSom[1];

//     $totalCount += $som;

// }
// echo $totalCount;


$pattern = '/(?:do\(\)|don\'t\(\)|mul\(\d+,\d+\))/';

// preg_match_all($pattern, $data, $matches);

if (preg_match_all($pattern, $data, $matches)) {
    $instructions = $matches[0];
    $enabled = false; // Initially, mul() is disabled.
    $validMuls = [];

    foreach ($instructions as $instruction) {
        if ($instruction === "do()") {
            $enabled = true; // Enable mul().
        } elseif ($instruction === "don't()") {
            $enabled = false; // Disable mul().
        } elseif (preg_match('/mul\((\d+),(\d+)\)/', $instruction)) {
            if ($enabled) {
                $validMuls[] = $instruction; // Add mul() to the valid list if enabled.
            }
        }
    }

    // Output valid mul() calls
    print_r($validMuls);

    $totalCount = 0;
    foreach($validMuls as $key => $val){
        $removeMul = str_replace('mul(',"",$val);
        $removeEx = str_replace(')',"",$removeMul);

        $arrSom = explode(',',$removeEx);

        $som = $arrSom[0] * $arrSom[1];

        $totalCount += $som;

    }
    echo $totalCount;
} else {
    echo "No matches found.";
}


