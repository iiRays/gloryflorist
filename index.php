<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        include 'Controllers/Util/DB.php';
        include 'TestClasses.php';
        
        $result = DB::select("SELECT * from subjects", "Subject");
        foreach($result as $subject){
           echo $subject->yearOfStudy;
        }
        
        ?>
    </body>
</html>
