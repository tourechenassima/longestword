<?php
          include('functions.php');
          $tempor1 = $_GET['dl'];
          $dl = explode('*', $tempor1); 
        

          //************************* */
          $dictionaryFilePath = 'Dictionary in txt\A.txt';

        //  $fileContent = file_get_contents($dictionaryFilePath);
          // Convertir le texte en minuscules
       //   $fileContentLowerCase = strtolower($fileContent);
          // Réécrire le fichier avec le nouveau texte en minuscules
       //   file_put_contents($dictionaryFilePath, $fileContentLowerCase);

          $dictionary = loadDictionary($dictionaryFilePath);

          //   $n = 3; // Change this to your desired word length          
          //********************************************* */
               // echo(nbrcomb($dl,$i));              
                //$sugg = permute( $dl , 0 , count($dl) - 1 ,$i) <> '';
                for ($i=4 ; $i > 1 ; $i--) {
                 if (dic($dictionary, $i+1,$dl)<> ''){
                  $i = 1;
                 };
                                  
                }
         ?>