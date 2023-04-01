<?php
session_start();
include("includes/header.php");
include("db.php");
if(empty($_SESSION["user"])){
echo('<div id="content"><main>');
include("includes/login.php");
echo('</main>');
}
else {
?>
<div id="content"><main>
<div id="dashboard">
    <h1>Welcome to dashboard, <?php echo $_SESSION["user"]; ?></h1>
    <div id="searchsection">
<form method="get" action="search.php">
    <input type="text" name="search" id="search" onkeyup=searchMovie(this.value)>
    <input type="submit" value="Search" name="searchbtn" id="searchbtn">
</form>
<div id="suggestions"></div>
</div>
    <div id="usertable">
        <table border="1">
            <tr>
                <th>id</th>
                <th>username</th>
                <th>email</th>
            </tr>
            <?php 
            $query_get_users = "SELECT * from users";
            $output = mysqli_query($con,$query_get_users);
            while($result = mysqli_fetch_row($output)){
                echo "<tr>";
                echo "<td>$result[0]</td>";
                echo "<td>$result[2]</td>";
                echo "<td>$result[1]</td>";
                echo "</tr>";
            }
            ?>
        </table>

    </div>
    <div id="logmeout">
<button><a href='logout.php'>Logout</a></button>
        </div>
</div>
</main>
<?php } ?>

<?php

if(isset($_POST["submit"])){
    $username=$_POST["username"];
    $password=$_POST["password"];

    $query_check_creds = "SELECT * from users where username='$username' and password='$password'";
    $output = mysqli_query($con,$query_check_creds);
    $result = mysqli_fetch_row($output);

    if($result>0)
    {
        $_SESSION["user"]=$result[2];
        header("Location: home.php");
    }
}



    // if($username=="rabindra" && $password=="avatar"){
    //     $_SESSION["admin"] = "true";
    // }



include("includes/sidebar.php");
include("includes/footer.php");
mysqli_close($con);
?>
