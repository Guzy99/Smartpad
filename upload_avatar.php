<?php
session_start();
require 'connect.php';
$ses_id = $_SESSION["id-user"];
if(isset($_FILES['file'])){
    $file_name = $_FILES['file']['name'];
    $file_size= $_FILES['file']['size'];
    $file_tmp = $file_name = $_FILES['file']['tmp_name'];
    $file_type = $_FILES['file']['type'];
    // $file_ext = strtolower(end(explode('.', $_FILES['file']['name'] )));

    $expensions = array('jpeg','jpg','png');
    if ($file_size > 2097152){
      $errors[] = 'Файл меньше 2мб';
    }
      if(empty($errors)==true){
        $path = "images/".$_FILES["file"]["name"];
        move_uploaded_file($_FILES["file"]["tmp_name"], $path);
        // echo($path);
        $result = mysqli_query ($link,"UPDATE `users` SET `img` = '$path' WHERE `users`.`id` = $ses_id;");

          if ($result){
            // echo "<p> Ваше фото загружено!</p>";
            $new_url = 'profile.php';
            header('Location: '.$new_url);
          }

          else {
            echo "<p>Ваше фото не загружено!</p>";
          }

      }
      else{
        echo($errors[0]);
      }
  }
else{
  exit("УУУУУ");
}
  // function can_upload($file){
  //   if($file['name'] == '')
	// 	  return 'Вы не выбрали файл.';
	
	// //проверяем размер
	// if($file['size'] == 0)
	// 	return 'Файл слишком большой.';

	// // находим расширение
	// $getMime = explode('.', $file['name']);
	// $mime = strtolower(end($getMime));
	// // допустимые расширения
	// $types = array('jpg', 'png', 'gif', 'bmp', 'jpeg');
	
	// // проверка расширение
	// if(!in_array($mime, $types))
	// 	return 'Недопустимый тип файла.';
	
	// return true;
  // }
  
  // function make_upload($file){	
	// // случайное имя для картинки и отправка ссылки в бд
  //   $name = mt_rand(0, 10000) . $file['name'];
  //   $slash="\\";
  //   $named = 'images'.$slash.$name;
  //   $_SESSION['url_avatar'] = $name;

  //   require 'connect.php';
  //   $result = mysqli_query($link,"UPDATE `users` SET `img` = '$name' WHERE `users`.`id` = 1;");
  //   copy($file['tmp_name'], 'images/' . $name);
  //           // $new_url = '../profile.php';
  //           // header('Location: '.$new_url);
  //       // else{
  //       //     exit("Соси жопу");
  //       // }
  //   }
?>