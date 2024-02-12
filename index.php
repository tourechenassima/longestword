<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Find the longest word</title>
    <!-- ******************************************** -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
    <style>
      html, body {
      min-height: 100%;
      }
      body, div, form { 
      padding: 0;
      margin: 0;
      outline: none;
      font-family: Roboto, Arial, sans-serif;
      font-size: 14px;
      color: #000;
      line-height: 22px;
      }
      input{
        padding: 0;
      margin-top: 3px;
      margin-bottom: 3px;
      margin-right: 30px;
      margin-left: 30px;
      outline: none;
      font-family: Roboto, Arial, sans-serif;
      font-size: 32px;
      color: #000;
      line-height: 22px;
      margin-bottom: 10px;
      border: 1px solid #ccc;
      border-radius: 3px;
      width: calc(100% - 600px);
      padding: 5px;
      width: calc(50% - 20px);
      }
      
      .testbox {
      display: flex;
      justify-content: center;
      align-items: center;
      height: inherit;
      padding: 20px;
      }
      form {
      width: 100%;
      padding: 20px;
      margin: 20px;
      border-radius: 6px;
      background: #fff;
      box-shadow: 0 0 10px 0 blue; 
      }
     
      .item:hover p, input:hover::placeholder {
      color: #cc0052;
      }
      .item input:hover, .item textarea:hover {
      border: 1px solid transparent;
      box-shadow: 0 0 6px 0 blue;
      color: #cc0052;
      }
      .item {
      position: relative;
      margin: 10px 0;
      }
      .btn-block {
      margin: 20px;
      text-align: center;
      }
      button {
      width: 150px;
      padding: 10px;
      border: none;
      border-radius: 5px; 
      background: #cc0052;
      font-size: 16px;
      color: #fff;
      cursor: pointer;
      }
      button:hover {
      background: #ff0066;
      }
      @media (min-width: 568px) {
      .contact-item {
      display: flex;
      flex-wrap: wrap;
      justify-content: space-between;
      width: calc(100% - 12px);
      }
      .contact-item .item {
      width: calc(50% - 8px);
      }
           
      a{
        width: 150px;
      padding: 10px;
      border: none;
      border-radius: 5px; 
      background: #50FFAA;
      font-size: 16px;
      color: #000;
      cursor: pointer;
      text-decoration: none;
      }
      
     
      
    </style>
    <!-- ***************************************************** -->
</head>
<body>
<!-- ******************************************************** -->
    <div class="testbox">
      <form action="/">
        <div class="btn-block">
          <a id = 'buttonStart' href="index.php">Start the game</a>
        </div>
        <div class="contact-item">
          <div class="item">
            <p>Enter the number of vowels</p>
            <input type="number" name="name3"/>
          </div>
        </div>
        <div class="btn-block">
      <?php
          include_once('functions.php');
          //include_once('game.php');
           $dl = drawnLetters();
          //$dl = ['z','t','e','c'];
          for ($i=0; $i <= 4; $i++) {
      ?>
       
        <div class="divaya" style="display:none ; width: 60px; height: 60px; padding: 3px; background-color: lightblue; font-size: 64px; font-weight:bold; text-align:center; "> 
           <?php echo($dl[$i])?> 
        </div> 
          <?php } ?>
        <a  id = 'buttonShow' onclick="show()"> THE RANDOMLY DRAWN LETTERS</a>
        </div>  
        <div class="btn-block">
        <?php $tempor = implode('*', $dl); ?>
        <a href="game.php?dl=<?php echo($tempor);?> " >Find the longest word</a>
        </div>
      </form>
    </div>
<script>
  function show(){
    const list = document.querySelectorAll(".divaya");
    const button_show = document.querySelector("#buttonShow");
    const button_start = document.querySelector("#buttonStart");
      for(let i = 0 ; i < 5; i++){
        list[i].style.display='inline-block';     
      }
    button_show.style.display='none'; 
    button_start.innerHTML='PLAY AGAIN'; 
  }
</script>
</body>
</html>