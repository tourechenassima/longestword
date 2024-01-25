<?php
          include('functions.php');
          $tempor1 = $_GET['dl'];
          $dl = explode('*', $tempor1); 
          for ($i=3; $i > 1 ; $i--) {
               // echo(nbrcomb($dl,$i));              
                //$sugg = permute( $dl , 0 , count($dl) - 1 ,$i) <> '';
              if (permute( $dl , 0 , count($dl) - 1 ,$i) <> ''){
                ?>
                          <h1 style ="color:red;">
                            <?php
                  echo (permute( $dl , 0 , count($dl) - 1 ,$i)."  is the longest word");
                  ?>

                          </h1>
                          <?php
                  $i = 1;
               } else{
                        if ($i = 2) {

                          if (permute( $dl , 0 , count($dl) - 1 ,$i) <> ''){?>
                          <h1 style ="color:red;">
                            <?php echo (permute( $dl , 0 , count($dl) - 1 ,$i)."  is the longest word");?>

                          </h1>
                          <?php
                         } else{
                                  if ($i = 2) {
                                     echo('There is not longest worddddddddddd');
                                    //   $i = 1;
                                  }
                         }  


                           
                        }
               }                        
         }