<?php
 function drawnLetters(){
$drawn_letters = [];
for ($i=0; $i <= 7 ; $i++) { 
    $drawn_letters[$i] = random_letter();    
 }
     return ($drawn_letters);
 }

function random_letter(){
    $alphabet = ['A','B','C','D','E','F','G','H','I','J','K','L','M','N','O','P','Q','R','S','T','U','V','W','X','Y','Z'];
    $random_index = rand(0,count($alphabet)-1);
    return ($alphabet[$random_index]);
}

function permute($array, $left, $right, $r,$customTree) {
    $arrayilem = [];
    if ($left == $r) {

      //  echo implode(", ", array_slice($array, 0, $r)) . PHP_EOL;
      $slice = array_slice($array, 0, $r);
      $x = implode("", $slice);
      //array_push($vide, $x);
      //var_dump ($vide);
      return(chercher($x,$r,$customTree));
   
    } else {
        for ($i = $left; $i <= $right; $i++) {
            // Échanger les éléments $array[$left] et $array[$i]
            $temp = $array[$left];
            $array[$left] = $array[$i];
            $array[$i] = $temp;
            // Récursivement permuter le reste du tableau
            
             if (permute($array, $left + 1, $right, $r,$customTree) <>'') {
                 return (permute($array, $left + 1, $right, $r,$customTree));
                 //echo (permute($array, $left + 1, $right, $r)."  is the longest word");
             }else{
                 permute($array, $left + 1, $right, $r,$customTree);
             }
          //  permute($array, $left + 1, $right, $r);
            // Rétablir l'ordre initial pour la prochaine itération
            $temp = $array[$left];
            $array[$left] = $array[$i];
            $array[$i] = $temp;
        }
    }
}

function chercher($xi,$n,$customTree){
  //  var_dump($customTree);
    
    $searchWord = $xi; // Change this to the word you want to search
    $searchWord = strtolower($searchWord);
 //include_once('tree.php');

// Exemple d'utilisation : Recherche du mot "example" dans l'arbre

if (searchWordInTree($customTree, $searchWord)) {
    return($searchWord);
} else {
    unset($searchWord);
   return('');
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
         return 0; 
     }
     return factorial($n) / factorial($n - $r);
 }

function nbrcomb($letters,$r){

 $result = nPr(count($letters), $r);
 return  ($result);
}

 function loadDictionary($filePath) {
     $dictionary = file($filePath, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
     return $dictionary;
 }

function dic($dl){

    $dictionaryFilePath = 'Dictionary in txt\A.txt';
    $dictionary = loadDictionary($dictionaryFilePath);
    
          for ($i=7 ; $i > 1 ; $i--) {
              $trie = buildTree( $dictionary, $i );
            // Afficher l'arbre avec DFS, indentation et niveau de chaque nœud
            // echo "Arbre de l'arborescence:\n";
            // printTreeDFS($trie);
               if ( permute( $dl , 0 , count($dl) -1 , $i, $trie ) <> ''){
                 
                 ?>  <h1 style ="color:green;">  <?php
                   echo (permute( $dl , 0 , count($dl) - 1 , $i,$trie)."  is the longest word in ".$i." letters words.");
                   $i = 1;
                   unset($dictionary);

                   unset($trie);
                 ?>  </h1>                       <?php
                  // return(permute( $dl , 0 , count($dl) - 1 , $j,$trie));
                 } else {
                 ?>  <h1 style ="color:red;">    <?php
                  // echo("There is not longest word in ".$j." letters words.");
                 ?>  </h1>                       <?php
                         }
     
                            
          }
          unset($dictionary);

          unset($trie);

 
                         }  
                        
// Classe pour représenter un nœud de l'arbre
class TreeNode {
    public $word;
    public $children = array();

    public function __construct($word) {
        $this->word = $word;
    }
}

// Fonction récursive pour construire l'arbre
function buildTree($words, $j) {
    $root = new TreeNode($words[0]);

    foreach ($words as $word) {
    if (strlen($word)=== $j) {
        insertWord($root, $word);
    }
        
    }

    return $root;
}

// Fonction pour insérer un mot dans l'arbre
function insertWord($node, $word) {
    // Trouver le nombre de caractères communs entre le mot et le nœud actuel
    $commonChars = 0;
    $minLen = min(strlen($node->word), strlen($word));
    for ($i = 0; $i < $minLen ; $i++) {
                           
            if ($node->word[$i] === $word[$i] ) {
                $commonChars++;
            }               
    }

    // Si le nœud actuel n'a pas d'enfant correspondant, créer un nouveau nœud
    if ($commonChars !=strlen($word)) { 
    if (!isset($node->children[$commonChars])) {
        $node->children[$commonChars] = new TreeNode($word);
    } else {
        // Sinon, insérer le mot dans l'enfant correspondant
        insertWord($node->children[$commonChars], $word);
    }}
}

// Fonction pour afficher l'arbre de manière lisible
// function printTree($node, $indent = 0) {
//     if ($node == null) {
//         return;
//     }

//     echo str_repeat("  ", $indent) . $node->word . "\n";
//     foreach ($node->children as $child) {
//         printTree($child, $indent + 1);
//     }
// }

// Charger les mots du fichier texte dans un tableau
//$words = file('Dictionary in txt\B.txt', FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);

// Construire l'arbre
//$tree = buildTree($words);

// Fonction pour afficher l'arbre de manière lisible avec DFS, indentation et niveau de chaque nœud
//  function printTreeDFS($node, $level = 0) {
//      if ($node == null) {
//          return;
//      }

//      // Afficher le niveau et le mot du nœud avec l'indentation correspondante
//      echo str_repeat("  ", $level) . "Level $level: " . $node->word . "\n";

//      // Parcourir les enfants du nœud et les afficher récursivement
//      foreach ($node->children as $child) {
//          printTreeDFS($child, $level + 1);
//      }
//  }

 // Fonction de recherche d'un mot dans l'arbre
// function searchWordInTree($node, $searchWord) {
//     if ($node == null) {
//         return false;
//     }

//     // Vérifie si le mot correspond à celui du nœud actuel
//     if ($node->word === $searchWord) {
//         return true;
//     }

//     // Parcourt les enfants du nœud et effectue une recherche récursive
//     foreach ($node->children as $child) {
//         if (searchWordInTree($child, $searchWord)) {
//             return true;
//         }
//     }
//     // Si le mot n'est pas trouvé dans cet arbre
//     return false;
// }
// Fonction pour rechercher un mot dans l'arbre
function searchWordInTree($node, $searchWord) {

    $length = strlen($searchWord);
    $currentNode = $node;
    // Parcourir l'arbre trie jusqu'à trouver le nœud correspondant au mot recherché
    while ($currentNode != null) {
        $word = $currentNode->word;
        $commonChars = 0;
        $minLen = min(strlen($word), $length);
        // Trouver le nombre de caractères communs entre le mot du nœud actuel et le mot recherché
        for ($i = 0; $i <$minLen; $i++) {
            if ($word[$i] === $searchWord[$i]) {
                $commonChars++;
            } 
        }
        // Si le nombre de caractères communs est égal à la longueur du mot recherché,
        // alors le mot a été trouvé dans l'arbre
        if ($commonChars === $length) {
            return true;
        }
        // Si le nombre de caractères communs est inférieur à la longueur du mot recherché,
        // continuer la recherche dans les enfants du nœud actuel
        if ($commonChars < $length) {
            if (isset($currentNode->children[$commonChars])) {
                 for ($i=0; $i < $length && $i != $commonChars; $i++) { 
                    //echo('nassima   ');
                     unset($currentNode->children[$i]);
                 }
                 $currentNode = $currentNode->children[$commonChars];
            } else {
                // Le préfixe commun est trouvé mais il n'y a pas de correspondance complète, donc le mot n'existe pas
                return false;
            }
        } 
   }
    unset($node->root);
    unset($node);

                   
}

?>
