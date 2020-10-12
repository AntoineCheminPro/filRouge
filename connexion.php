
<?php 
// connect to database
try{
    $db = new PDO('mysql:host=localhost;dbname=banque_php', 'BanquePHP', 'banque76');

} catch (PDOException $e){
    print "Erreur !: " . $e->getMessage() . "<br/>";
    die();
  }
?>

