<?php


function sanitize($post){
    foreach($post as $val){
        $val = htmlspecialchars($val,ENT_QUOTES,'UTF-8');
    }
    return $post;
}

// function sanitize($before){
//     foreach($before as $key => $val){
//         $after[$key] = htmlspecialchars($val,ENT_QUOTES,'UTF-8');
//     }
//     return($after);
// }



?>