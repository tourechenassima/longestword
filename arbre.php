<?php

function loadDictionary($filePath) {
    $dictionary = file($filePath, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
   
    return $dictionary;
}

function createNLetterDictionary($dictionary, $n) {
    $nLetterWords = array_filter($dictionary, function($word) use ($n) {
        
        return strlen($word) == $n;
    });
    
    return $nLetterWords;
}
   
          $dictionaryFilePath = 'Dictionary in txt\B.txt';
          $fileContent = file_get_contents($dictionaryFilePath);
          // Convertir le texte en minuscules
          $fileContentLowerCase = strtolower($fileContent);
          // Réécrire le fichier avec le nouveau texte en minuscules
                   
          file_put_contents($dictionaryFilePath, $fileContentLowerCase);
          $dictionary = loadDictionary($dictionaryFilePath);
          $nLetterDictionary = createNLetterDictionary($dictionary, 3);
               //     $nLetterDictionary = array_values($nLetterDictionary);


            

           


// Classe pour représenter un nœud de l'arbre
class TreeNode {
    public $word;
    public $children = array();

    public function __construct($word) {
        $this->word = $word;
    }
}

// Fonction récursive pour construire l'arbre
function buildTree($words) {
    $root = new TreeNode($words[0]);

    foreach ($words as $word) {
        insertWord($root, $word);
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
         
        // if ($commonChars =3) { 

        //     break;
        // }
    }

    // Si le nœud actuel n'a pas d'enfant correspondant, créer un nouveau nœud
    if ($commonChars !=3) { 
    if (!isset($node->children[$commonChars])) {
        $node->children[$commonChars] = new TreeNode($word);
    } else {
        // Sinon, insérer le mot dans l'enfant correspondant
        insertWord($node->children[$commonChars], $word);
    }}
}

// Fonction pour afficher l'arbre de manière lisible
function printTree($node, $indent = 0) {
    if ($node == null) {
        return;
    }

    echo str_repeat("  ", $indent) . $node->word . "\n";
    foreach ($node->children as $child) {
        printTree($child, $indent + 1);
    }
}

// Charger les mots du fichier texte dans un tableau
$words = file('Dictionary in txt\B.txt', FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);

// Construire l'arbre
$tree = buildTree($words);

// Fonction pour afficher l'arbre de manière lisible avec DFS, indentation et niveau de chaque nœud
function printTreeDFS($node, $level = 0) {
    if ($node == null) {
        return;
    }

    // Afficher le niveau et le mot du nœud avec l'indentation correspondante
    echo str_repeat("  ", $level) . "Level $level: " . $node->word . "\n";

    // Parcourir les enfants du nœud et les afficher récursivement
    foreach ($node->children as $child) {
        printTreeDFS($child, $level + 1);
    }
}

// Afficher l'arbre avec DFS, indentation et niveau de chaque nœud
echo "Arbre de l'arborescence:\n";
printTreeDFS($tree);

