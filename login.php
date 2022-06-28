<?php 
  $filename = "users.txt";  
  if(empty($_POST)) 
  { 
    ?> 
    <table> 
      <form method=post> 
      <tr> 
        <td>Почта:</td> 
        <td><input type=text name=name></td> 
      </tr> 
      <tr> 
        <td>Пароль:</td> 
        <td><input type=password name=pass></td> 
      </tr> 
      <tr> 
        <td>&nbsp;</td> 
        <td><input type=submit value='Войти'></td> 
      </tr> 
      </form> 
   </table> 
   <?php 
  } 
 
  else 
  { 
 
    $arr = file($filename, FILE_IGNORE_NEW_LINES); 
    $i = 0; 
    $temp = array(); 
    foreach($arr as $line) 
    { 
      $data = explode("::",$line); 
      $temp['name'][$i]     = $data[0]; 
      $temp['password'][$i] = $data[1]; 
      $i++; 
    } 
    if(!in_array($_POST['name'],$temp['name'])) 
    { 
      exit("Пользователь с такой почтой не зарегистрирован"); 
    } 
    $index = array_search($_POST['name'],$temp['name']); 
    if($_POST['pass'] != $temp['password'][$index]) 
    { 
      exit("Пароль не соответствует логину"); 
    } 

    include "obrabotka.php"; 
    ?>     
      Вы вошли
<?php 
  }
?>