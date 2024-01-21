<?php
 function drawnLetters(){
$drawn_letters = [];
for ($i=0; $i <= 3; $i++) { 
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
       if ($r === 3) {
         $x =$slice[0].$slice[1].$slice[2] ;
         ?> <p style="font-weight:bold; text-size: 36px; padding:2px; margin: 3px;"> <?php echo($x);?> </p><?php 

       }else {
         $x =$slice[0].$slice[1];
         ?> <p style="font-weight:bold; text-size: 36px; padding:2px; margin: 3px;"> <?php echo($x);?> </p><?php 

       }
     if (chercher($x) <>'') {
        return(chercher($x));
     }
  
    ?>
     <!-- <table>
         <tr>
            <td> <?php //echo($slice[0]); ?> </td>
            <td> <?php //echo($slice[1]); ?> </td>
            <td> <?php //echo($slice[2]); ?> </td>
         </tr>
     </table>  -->
     <?php
    } else {
        for ($i = $left; $i <= $right; $i++) {
            // Échanger les éléments $array[$left] et $array[$i]
            $temp = $array[$left];
            $array[$left] = $array[$i];
            $array[$i] = $temp;
            // Récursivement permuter le reste du tableau
            
             if (permute($array, $left + 1, $right, $r) <>'') {
                 return (permute($array, $left + 1, $right, $r));
            //    // echo (. "    is the longest word");
             }else{
                 permute($array, $left + 1, $right, $r);
             }
          //  permute($array, $left + 1, $right, $r);
            // Rétablir l'ordre initial pour la prochaine itération
            $temp = $array[$left];
            $array[$left] = $array[$i];
            $array[$i] = $temp;
        }
    }
}


function chercher($xi){
    $dictionaryFilePath = 'Dictionary in csv\A.txt';

    $fileContent = file_get_contents($dictionaryFilePath);

    // Convertir le texte en minuscules
    $fileContentLowerCase = strtolower($fileContent);
    
    // Réécrire le fichier avec le nouveau texte en minuscules
    file_put_contents($dictionaryFilePath, $fileContentLowerCase);

    $dictionary = loadDictionary($dictionaryFilePath);

    $n = 3; // Change this to your desired word length
    $nLetterDictionary = createNLetterDictionary($dictionary, $n);

    $searchWord = $xi; // Change this to the word you want to search
    $searchWord = strtolower($searchWord);
    $isWordFound = searchWord($searchWord, $nLetterDictionary);

    if ($isWordFound) {
        echo "$searchWord found in the $n-letter dictionary.";
        return ($xi);
    } else {
        echo "$searchWord not found in the $n-letter dictionary.";
        return ('');
    }
    
}

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

function nbrcomb($letters,$r){
//$letters = $dl;
//$r = 3;


 $result = nPr(count($letters), $r);
 return  ($result);
//permute($letters, 0, count($letters) - 1, $r);
}





function loadDictionary($filePath) {
    $dictionary = file($filePath, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
    return $dictionary;
}



 function searchWord($word, $dictionary) {
     return in_array($word, $dictionary);
 }





function createNLetterDictionary($dictionary, $n) {
    $nLetterWords = array_filter($dictionary, function($word) use ($n) {
        return strlen($word) == $n;
    });
    return $nLetterWords;
}



?>
