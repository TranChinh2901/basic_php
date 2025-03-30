<?php 
    include '../connectdtb.php';



   if(isset($_GET['id'])) {
        $id = $_GET['id'];
        echo "ID: " . htmlspecialchars($id);
   } else {
    echo "Khong co nguuoi dungf nao";
   };
    
?>