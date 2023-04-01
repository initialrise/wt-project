<?php
include("db.php");
        if(isset($_GET["search"])){
        $search = $_GET["search"];
        $query_check_names = "SELECT username from users where username like '$search%'";
        $output = mysqli_query($con,$query_check_names);
        $result = mysqli_fetch_all($output);
        foreach ($result as $row){
            echo "$row[0]</br>";
        }
    }
    ?>