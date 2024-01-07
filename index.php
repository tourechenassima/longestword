<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>


       


<?php

function permute($array, $left, $right, $r) {
   
    if ($left == $r) {
      //  echo implode(", ", array_slice($array, 0, $r)) . PHP_EOL;
      $slice = array_slice($array, 0, $r);
       
      ?>
      <table>
       
     <tr>
         <td> <?php echo($slice[0]) ?> </td>
         <td> <?php echo($slice[1]) ?> </td>
        
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
}

$letters = ['A', 'B', 'C'];
$r = 2;


function factorial($n) {
    if ($n <= 1) {
        return 1;
    } else {
        return $n * factorial($n - 1);
    }
}

function nPr($n, $r) {
    if ($n < $r) {
        return 0; // Impossible de calculer les permutations
    }

    return factorial($n) / factorial($n - $r);
}


$result = nPr(count($letters), $r);

echo  ($result);





permute($letters, 0, count($letters) - 1, $r);
?>

</body>
</html>