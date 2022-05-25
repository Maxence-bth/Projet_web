<?php
session_start();
if($_SESSION!=null)
  //echo $_SESSION['login'];
?>



<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" />
  </head>  
  <body>
 <h1>Connexion</h1>
    <form action="connectAccount.php" method="post">
      <table>
        
       
        <tr>
            <td>Email :</td>
            <td><input type="text" name="mail" /></td>
          </tr>
          <tr>
            <td>Mot de passe :</td>
            <td><input type="text" name="password" /></td>
          </tr>
          <tr>
          
          
          <td colspan="2" align="left">
              
            <input type="submit" value="Soumettre" name="Valider" />
          </td>
        </tr>
      </table>
    </form>
    <div id="errordiv"></div>
  </body>
</html>