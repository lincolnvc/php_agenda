<?php
// List of events
 $json = array();

 // Query that retrieves events
 $requete = "SELECT * FROM agenda ORDER BY id";

 // connection to the database
 try {
 //$bdd = new PDO('mysql:host=localhost;dbname=banco_de_dados', 'nome_usuario', 'senha_usuario');
 $bdd = new PDO('mysql:host=localhost;dbname=banco_de_dados', 'nome_usuario', 'senha_usuario');
 } catch(Exception $e) {
  exit('Não foi possível conectar na base de dados.');
 }

 // Execute the query
 $resultat = $bdd->query($requete) or die(print_r($bdd->errorInfo()));

 // sending the encoded result to success page
 echo json_encode($resultat->fetchAll(PDO::FETCH_ASSOC));

?>