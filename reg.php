<meta charset="UTF-8" />
<table> 
<form method=post> 
<tr><td>Почта:</td><td><input type=text name=name></td></tr> 
<tr><td>Логин:</td><td><input type=mail name=mail></td></tr> 
<tr><td>Пароль:</td><td><input type=password name=pass></td></tr> 
<tr><td>Пароль:</td><td><input type=password name=pass_again></td></tr>   
<tr><td></td><td><input type=submit value='Зарегистрировать'></td></tr> 
</form> 
</table> 
<?php 
  $_POST['name'] = trim($_POST['name']); 
  $_POST['mail'] = trim($_POST['mail']);
  $_POST['pass'] = trim($_POST['pass']); 
  $_POST['pass_again'] = trim($_POST['pass_again']); 
  if(empty($_POST['name'])) exit(); 
  if(empty($_POST['name'])) exit('Поле "Имя" не заполнено'); 
  if(empty($_POST['mail'])) exit('Поле "Почта" не заполнено');
  if(empty($_POST['pass'])) exit('Одно из полей "Пароль" не заполнено'); 
  if(empty($_POST['pass_again'])) exit('Одно из полей "Пароль" не заполнено'); 
  if($_POST['pass'] != $_POST['pass_again']) exit('Пароли не совпадают'); 

  $filename = "users.txt";  
  $arr = file($filename); 
  foreach($arr as $line) 
  { 
    $data = explode("::",$line); 
    $temp[] = $data[0]; 
  } 
  if(in_array($_POST['name'], $temp)) 
  { 
    exit("Такой пользователь уже зарегистрирован"); 
  } 
  
   $filemail = "mail.txt";  
  $arr = file($filename); 
  foreach($arr as $line) 
  { 
    $data1 = explode("::",$line); 
    $temp1[] = $data1[0]; 
  } 
  if(in_array($_POST['name'], $temp1)) 
  { 
    exit("Такой пользователь уже зарегистрирован"); 
  } 
 
  $fd = fopen($filename, "a"); 
  if(!$fd) exit("Ошибка при открытии файла данных"); 
  $str = $_POST['name']."::". 
         $_POST['pass']."\r\n"; 
		
  fwrite($fd,$str); 
  fclose($fd);
 $fg = fopen($filemail, "a"); 
  if(!$fg) exit("Ошибка при открытии файла данных"); 
  $str = $_POST['mail'].".". 
       
  fwrite($fg,$str); 
  fclose($fg);
 echo "Вы успешно зарегестрировались"; 
?>
  <table> 
<form method=post action="login.php">   
<tr><td></td><td><input type=submit value='Войти'></td></tr> 
</form> 
</table>