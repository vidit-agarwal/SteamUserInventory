<!DOCTYPE html>
<html lang="en">
  <head>
      <title>Steam Login</title>
  </head>
  <body>

  <?php
   session_start();
   require 'includes/lightopenid/openid.php';
  include_once("db_connect.php") ;

    //steam api of widow account 
   $_STEAMAPI = "B7EAB3CCA4D96A1825D3559603961A53";
   
   try {
     $openid = new LightOpenID('localhost');

     if(!$openid->mode){
       if(isset($_GET['login'])){
          $openid->identity = 'http://steamcommunity.com/openid/?l=english';
          header('Location: ' .$openid->authUrl());
      }
      else {
        echo "<h2>Connect to Steam </h2>";
        echo "<br />" ;
        echo "<form action='?login' method='post'>";
        echo "<input type='image' src='http://community.edgecast.steamstatic.com/public/images/signinthroughsteam/sits_02.png'>";
        echo "</form>" ;
      }
    } elseif($openid->mode == 'cancel'){
     echo 'User has canceled authetication!';
    } 
    else {
       if($openid->validate()) {
      $id = $openid->identity;
      $ptn = "/^http:\/\/steamcommunity\.com\/openid\/id\/(7[0-9]{15,25}+)$/";
      preg_match($ptn, $id, $matches);
      
      $url = "http://api.steampowered.com/ISteamUser/GetPlayerSummaries/v0002/?key=$_STEAMAPI&steamids=$matches[1]";
      
      $json_object= file_get_contents($url);
      
      $json_decoded = json_decode($json_object);
      
      foreach ($json_decoded->response->players as $player)
      {
          $sql_fetch_id = "SELECT * FROM users_steam WHERE steamId= $player->steamid" ;
          $query_id = $conn->query($sql_fetch_id) ;
          //$_SESSION['avatar'] = $player->avatar ;
          //$_SESSION['steamid']= $player->steamid ;


          if(mysqli_num_rows($query_id)==0)
          {
            //echo $player->steamid ;
            $sql_steam = "INSERT INTO users_steam (name , steamId , avatar) VALUES ('$player->personaname' ,'$player->steamid','$player->avatar')" ;
            $conn->query($sql_steam) ;

          }


      }
      } 
      else {
       echo "User is not logged in.\n";
       }
      }
     } 
     catch(ErrorException $e) {
         echo $e->getMessage();
      }
  ?>﻿
  </body>
</html>