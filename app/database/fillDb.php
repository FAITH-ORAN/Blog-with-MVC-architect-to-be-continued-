<?php
//composer est installé sur le pc
//j'ai désactivé le http proxy de pramétre de système avancé, variable d'environnement, supprim le http proxy de pramétre
//pour pouvoir téléchargé des dépendance avec composer 
//il faut toujour mettre l'autoload daans le fichier ../../vendor/autoload.php
//ensuite on copie la bibliothèque on l'installe via composer 
//un require se créé automatiquement dans composer. json
//pour téléchargé les fichiers de la bibliothèque faut taper en ligne de commande composer dump autoload
//
require dirname(__DIR__) . "../../vendor/autoload.php";//autoloader composer

$faker = Faker\Factory::create('fr_FR');
require "connectDb.php";

$posts= [];//array();
$categories=[]; //array();
$comments=[];//array();
$users=[]; //array();

//clean data base
$connexion->exec("SET FOREIGN_KEY_CHECKS = 0");
$connexion->exec("TRUNCATE TABLE posts_categories");
$connexion->exec("TRUNCATE TABLE posts_comments");
$connexion->exec("TRUNCATE TABLE users_posts");//TRUNCATE supprimer les données de base de données sans supprimer la table
$connexion->exec("TRUNCATE TABLE users");
$connexion->exec("TRUNCATE TABLE posts");
$connexion->exec("TRUNCATE TABLE categories");
$connexion->exec("TRUNCATE TABLE comments");
$connexion->exec("SET FOREIGN_KEY_CHECKS = 1");
echo "data base tables clean!!<br>";
echo $faker->name ;

//create fake users
$hashPassword=null;
for($i=0;$i<13;$i++){
    $hashPassword=password_hash($faker->password, PASSWORD_BCRYPT);
    $connexion->exec("INSERT INTO users 
                                SET username='{$faker->userName}',
                                password='{$hashPassword}', 
                                slug='{$faker->slug}',
                                ft_image='image{$faker->numberBetween($min= 1, $max=5)}.jpg',
                                content='{$faker->paragraphs(rand(3,15),true)}',
                                email='{$faker->email}',
                                phone='{$faker->phoneNumber }',
                                role='Subscriber', 
                                created_at='{$faker->date} {$faker->time}'
                                ");

                  $users[]= $connexion->lastInsertId();
}
  echo "users info completed successfully <br>";

  //create Admin 


$hashPassword=password_hash('test', PASSWORD_BCRYPT);
$connexion->exec("INSERT INTO users 
                            SET username='{faizaBerrichi}',
                            password='{$hashPassword}', 
                            slug='faizaBerrichi',
                            ft_image='image{$faker->numberBetween($min= 1, $max=5)}.jpg',
                            content='{$faker->paragraphs(rand(3,15),true)}',
                            email='{$faker->email}',
                            phone='{$faker->phoneNumber }',
                            role='Admin', 
                            created_at='{$faker->date} {$faker->time}'
                            ");
  echo "admin créé<br>";

//create comments

for($i=0;$i<144;$i++){
  $hashPassword=password_hash($faker->password, PASSWORD_BCRYPT);
  $connexion->exec("INSERT INTO comments 
                              SET psuedo='{$faker->userName}',
                               title='{$faker->sentence(2)}',             
                              content='{$faker->paragraphs(rand(3,15),true)}',
                              created_at='{$faker->date} {$faker->time}',
                              published='1'
                              ");

                $comments[]= $connexion->lastInsertId();
}

echo "comments créé<br>";

//create posts_

for($i=0;$i<72;$i++){
  $hashPassword=password_hash($faker->password, PASSWORD_BCRYPT);
  $connexion->exec("INSERT INTO posts 
                              SET user_id='14',
                             title='{$faker->sentence(2)}',
                              slog='{$faker->slug}',
                              ft_image='image{$faker->numberBetween($min= 1, $max=5)}.jpg',
                              content='{$faker->paragraphs(rand(3,15),true)}',
                              created_at='{$faker->date} {$faker->time}',
                              published='1'
                              ");

                $posts[]= $connexion->lastInsertId();
}

echo "post créé<br>";

//create categorie
for($i=0;$i<15;$i++){
  $hashPassword=password_hash($faker->password, PASSWORD_BCRYPT);
  $connexion->exec("INSERT INTO categories
                              SET 
                             title='{$faker->sentence(2)}',
                              slog='{$faker->slug}',
                              ft_image='image{$faker->numberBetween($min= 1, $max=5)}.jpg',
                              content='{$faker->paragraphs(rand(3,15),true)}'
                              ");

                $categories[]= $connexion->lastInsertId();
}

echo "categories créé<br>";

//link posts with categories

foreach($posts as $post) {
  $randomCategories=$faker->randomElements($categories, rand(1,1));
  foreach($randomCategories as $categorie){
    $connexion->exec("INSERT INTO posts_categories SET post_id= $post, categorie_id=$categorie");
  }

}
echo "link poste categorie reussi <br>";

//link posts with comments

foreach($posts as $post) {
  $randomCaomments=$faker->randomElements($comments, rand(2,2));
  foreach($randomCategories as $comment){
    $connexion->exec("INSERT INTO posts_comments SET post_id= $post, comment_id=$comment");
  }

}
echo "link poste comment reussi <br>";

//link posts with Admin user

foreach($posts as $post) {
 

    $connexion->exec("INSERT INTO users_posts SET user_id= '14', post_id=$post");
 

}
echo "link poste user reussi <br> fin ";

?>