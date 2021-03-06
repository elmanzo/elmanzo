<?php

    include '../../../dbConnection.php';
    
    $conn = getDatabaseConnection('bookstore');
    
   $sql = "SELECT * FROM books
           NATURAL JOIN authors 
           NATURAL JOIN genres
           WHERE bookId = :bookId"; 
                
    $stmt = $conn->prepare($sql);  
    $stmt->execute(array(":bookId"=>$_GET['bookId']));
    $record = $stmt->fetch(PDO::FETCH_ASSOC);
    //print_r($record);  
    
    echo json_encode($record);
?>