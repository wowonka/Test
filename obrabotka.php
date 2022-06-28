<?php 
  if($_POST['edit'] == 'edit') 
  { 
    $_POST['name'] = trim($_POST['name']); 
    $_POST['passw'] = trim($_POST['passw']); 
    $_POST['pass_again'] = trim($_POST['pass_again']); 
    if(empty($_POST['name'])) exit(); 
    if(empty($_POST['name'])) exit('Поле "Имя" не заполнено'); 
    if(empty($_POST['passw'])) 
       exit('Одно из полей "Пароль" не заполнено'); 
    if(empty($_POST['pass_again'])) 
       exit('Одно из полей "Пароль" не заполнено'); 
    if($_POST['passw'] != $_POST['pass_again']) 
       exit('Пароли не совпадают'); 
 
    $arr = file($filename); 
    $linefile = array(); 
    foreach($arr as $line) 
    { 
      $data = explode("::",$line); 
      if($data[0] == $temp['name'][$index]) 
      { 
        $linefile[] = $_POST['name']."::".$_POST['passw']."::".  
        $temp['password'][$index] = $_POST['passw']; 
      } 
      else $linefile[] = trim($line); 
    } 
 
    $fd = fopen($filename,"w"); 
    if(!$fd) exit("Ошибка записи в файле"); 
    fwrite($fd,implode("\r\n",$linefile)); 
    fclose($fd); 
  } 
?>