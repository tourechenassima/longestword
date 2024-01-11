<?php
 function drawnLetters(){
$drawn_letters = [];
for ($i=0; $i <= 4; $i++) { 
    $drawn_letters[$i] = random_letter();?>
    
<?php    

 }
     return ($drawn_letters);

}
    

function random_letter(){
    $alphabet = ['A','B','C','D','E','F','G','H','I','J','K','L','M','N','O','P','Q','R','S','T','U','V','W','X','Y','Z'];
    $random_index = rand(0,count($alphabet)-1);
    return ($alphabet[$random_index]);
}
?>




<?php
function permute($array, $left, $right, $r) {
    if ($left == $r) {
      //  echo implode(", ", array_slice($array, 0, $r)) . PHP_EOL;
      $slice = array_slice($array, 0, $r);
    //    $lw = chercher($slice);
    //   if ($lw = ''){
        
    //   }else{
    //     // ...return $lw
    //   }?>
     <table>
         <tr>
            <td> <?php echo($slice[0]) ?> </td>
            <td> <?php echo($slice[1]) ?> </td>
            <td> <?php echo($slice[2]) ?> </td>

         </tr>
     </table>
     <?php
    } else {
        for ($i = $left; $i <= $right; $i++) {
            // Échanger les éléments $array[$left] et $array[$i]
            $temp = $array[$left];
            $array[$left] = $array[$i];
            $array[$i] = $temp;
            // Récursivement permuter le reste du tableau
            permute($array, $left + 1, $right, $r);
            // Rétablir l'ordre initial pour la prochaine itération
            $temp = $array[$left];
            $array[$left] = $array[$i];
            $array[$i] = $temp;
        }
    }
    $lw = '';
    return ($lw);

}


function comb($letters,$r){
//$letters = $dl;
//$r = 3;
// function factorial($n) {
//     if ($n <= 1) {
//         return 1;
//     } else {
//         return $n * factorial($n - 1);
//     }
// }
// function nPr($n, $r) {
//     if ($n < $r) {
//         return 0; // Impossible de calculer les permutations
//     }
//     return factorial($n) / factorial($n - $r);
// }
// $result = nPr(count($letters), $r);
// echo  ($result);
$lww = permute($letters, 0, count($letters) - 1, $r);
*************************************هنا
return ('');
}
?>
