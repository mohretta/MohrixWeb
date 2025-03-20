<?php 

session_start();


if(!isset($_SESSION['facture']))
   {
    echo"aucune facture dans la session" ;
    $_SESSION['facture'] = [] ; 
     
   }
   else
   {

     $facture = $_SESSION['facture'];

   }

   if (isset($_GET['position']) && is_numeric($_GET['position'])) 
   {
    $position = (int) $_GET['position'];
   }
   array_splice($_SESSION['facture'], $position, 1);

   foreach($facture as $item)
   {
      $prixItem = $item['$prixUnitaire'] * $item['$quantite'] ;
      $totalPrixFacture += $prixItem ; 

   }

   
  $_SESSION['facture'] = $facture ;
  $_SESSION['prixTotal'] = $totalPrixFacture ; 

  header("Location: facture.php");
  
  
  ?>

  





