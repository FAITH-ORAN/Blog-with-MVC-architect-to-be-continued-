<?php
//les foreihn Key ne sont pas accépté par innodb qui est l'engine par defaut ds mysql j'ai changé le ENGINE = Aria 
//pour voir les engins dispo faire SHOW ENGINES ds php Myadmin requette sql,c
//db connection
require "connectDb.php";

//create post users






//create post table


/*create first comment TABLE
$connexion->exec("CREATE TABLE posts_comments(
    post_id INT UNSIGNED NOT NULL,
    comment_id INT UNSIGNED NOT NULL,
    PRIMARY KEY (post_id, comment_id),
    CONSTRAINT fk_post
    FOREIGN KEY (post_id)
    REFERENCES posts (id)
    ON UPDATE CASCADE 
    ON DELETE RESTRICT,
    CONSTRAINT fk_comment
    FOREIGN KEY (comment_id)
     REFERENCES comments (id)
    ON UPDATE CASCADE
     ON DELETE RESTRICT
)ENGINE= Aria ");
  echo ",post comment reussi";*/


//users post 

$connexion->exec("CREATE TABLE users_posts(
    user_id INT UNSIGNED NOT NULL,
    post_id INT UNSIGNED NOT NULL,
    PRIMARY KEY (user_id, post_id),
    CONSTRAINT fk_user
    FOREIGN KEY (user_id)
     REFERENCES users (id)
    ON UPDATE CASCADE 
    ON DELETE RESTRICT,
    CONSTRAINT fk_post
    FOREIGN KEY (post_id) 
    REFERENCES posts (id)
    ON UPDATE CASCADE 
    ON DELETE RESTRICT
)ENGINE= Aria");
  echo ",user post reussi";


  //post catégories
  $connexion->exec("CREATE TABLE posts_categories(
    post_id INT UNSIGNED NOT NULL,
    categorie_id INT UNSIGNED NOT NULL,
    PRIMARY KEY (post_id, categorie_id),
    CONSTRAINT fk_post
    FOREIGN KEY (post_id)
     REFERENCES posts (id)
    ON UPDATE CASCADE
     ON DELETE RESTRICT,
    CONSTRAINT fk_categorie
    FOREIGN KEY (categorie_id)
     REFERENCES categories (id)
    ON UPDATE CASCADE 
    ON DELETE RESTRICT
)ENGINE= Aria");
  echo ",post categories  reussi, fin!!";



?>