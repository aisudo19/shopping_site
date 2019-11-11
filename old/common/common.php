<?php 

function gengo($seireki){
    if($seireki >= 1868 && $seireki <= 1911){
        $gengo = '明治';
    }
    if($seireki >=1912  && $seireki <= 1925){
        $gengo = '大正';
    }
    if($seireki >=1926  && $seireki <= 1988){
        $gengo = '昭和';
    }
    if($seireki >= 1989 && $seireki <= 2018){
        $gengo = '平成';
    }
    if($seireki >= 2019){
        $gengo = '令和';
    }
    return($gengo);
}

function sanitize($before){
    foreach($before as $key => $val){
        $after[$key] = htmlspecialchars($val,ENT_QUOTES,'UTF-8');
    }
    return($after);

}

function pulldown_year(){
    echo '<select name="year">
    <option value="2017">2017</option>
    <option value="2018">2018</option>
    <option value="2019">2019</option>
    <option value="2020">2020</option>
</select>';
}
function pulldown_month(){
    echo '<select name="month">';
    for($i= 1; $i <=12; $i++){ 
        if($i < 10){
            $suji = "0".$i;
        }else{
            $suji = $i;
        }
        echo "<option value=".$suji.">".$suji."</option>";
    }
    echo '</select>';
}
function pulldown_day(){
    echo '<select name="day">';
        for($i = 1; $i <= 31; $i++){
            if($i < 10){
                $suji = "0".$i;
            }else{
                $suji = $i;
            }
            echo "<option value=".$suji.">".$suji."</option>";
        }
    echo '</select>';
}

?>
