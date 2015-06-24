<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title></title>
    </head>
    <body>
        <h1>Broodjes bestellen</h1>
        <?php
        $db = new PDO('mysql:host=localhost;dbname=broodjes','root','root');
        $sql= "SELECT * FROM broodjes";
        $sqlwerknemer="SELECT * FROM werknemers";
        $result = $db->query($sql);
        $werknemers = $db->query($sqlwerknemer);
        $prijs = 0;
        
        
        
       
        function prijs($broodjeid){
            $prijs = $broodjeid;
        }
        ?>
        
        <form action="verwerken.php" method="post"><br>
            Broodje: <select name="broodjeselect">
                <option value="">..</option>
            <?php
                    foreach ($result as $value) {
                        ?>
                        <option value=<?php echo ($value['id']); ?>><?php echo ($value['broodje'])
                        . ": € " . ($value['kost']);?></option>
                        <?php
                    }
            ?>
            </select><br>
            Werknemer: <select name="werknemer">
                <option value="">..</option>
            <?php
                    foreach ($werknemers as $value) {
                        ?>
                        <option value=<?php echo ($value['id']) ; 
                        ?>><?php echo ($value['voornaam']) . " " . ($value['familienaam']);?></option>
                        
                        <?php
                    }
            ?>
            </select><br>
            
            <input type="submit">
        </form>   
       <?php if(count($_POST = 0)){
           $message = "Uw bestelling is geplaatst";
           echo "<script type='text/javascript'>alert('$message');</script>";
       }
               ?>
    </body>
</html>
