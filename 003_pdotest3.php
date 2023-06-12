<?php
  $host= 'localhost';
  $user= 'root';
  $password= '';
  $dbname= 'pdoposts';

  $dsn= 'mysql:host='. $host. ';dbname='. $dbname;

  //Create new PDO instance
  $pdo= new PDO($dsn, $user, $password);

  $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);

  //FETCH MULTIPLE POSTS

  $author= 'Gordor';  //User input
  $is_published= true;

  //Named params
  $sql= 'SELECT * FROM posts WHERE author = :author && is_published = :is_published';
  $stmt= $pdo->prepare($sql);
  $stmt->execute(['author'=>$author, 'is_published'=>$is_published]);  //Named parameter as a associative array
  $posts= $stmt->fetchAll(); //inside PDO::FETCH_ASSOC. empty because line 12

  //var_dump($posts);
  foreach($posts as $post){
    echo $post->author. ":". $post->body. "<br>";
  }

?>