<!-- /Users/irean/Documents/PHP/paiza/sample.php -->
<!-- /Applications/MAMP/htdocs/PHP/paiza/sample.php -->
<?php
    // 自分の得意な言語で
    // Let's チャレンジ！！

    $N = 0;
    $M = 0;
    $K = 0;
    $input_array1;
    while ($N <= 0 && $N >= 101 && $M <= 0 && $M >= 1001 && $K <= 0 && $K >= $M ) {
        $input_array1 = implode(" ", fgets(STDIN));
        $N = $input_array1[0];
        echo $input_array1[0];
        $M = $input_array1[1];
        echo $input_array1[1];
        $K = $input_array1[2];
        echo $input_array1[2];
    }

    // for ($i = 0; $i < $M; $i++){
    //     while($Ci <= 0 && $Ci >= 101) {
    //         $input_array2 = implode(" ", fgets(STDIN));
    //     }
    // }
    // echo $input_array2;

// 1 <= N <= 100 N...パラメータNの個数
// 1 <= M <= 1000 ...ユーザーの人数M
// 1 <= K <= M トップK 
// 0 <= Ci <= 100 ただし、1 <= i <= N
// 0 <= Xi <= 100000 ただし、1 <= i <= N
    

?>