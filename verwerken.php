<?php
        $db = new PDO('mysql:host=localhost;dbname=broodjes','root','root');
        $broodje = $_POST['broodjeselect'];
        $werknemer = $_POST['werknemer'];
        $prijs = 0;
        $prijssql = "SELECT kost FROM broodjes WHERE id= '$broodje' ";
        $prijsbroodje = $db->query($prijssql);
        foreach($prijsbroodje as $item){
            $prijs = $item['kost'];
        }
        $time = time();
        $datum = date("Y-m-d", $time);      
        $sql = "INSERT INTO bestelling (`broodjesid`, `werknemersid`, `kost`, `datum`) 
            VALUES ('$broodje', '$werknemer', '$prijs','$datum')";
       
        $uitvoeren = $db->exec($sql);
        $message = "Uw bestelling is geplaatst";
        header("Location: index.php");

        
?>