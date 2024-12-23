<?php
       $servername = "localhost";
       $username = "root";
       $password = "redaader@2000";
       $dbname = "usersdb";
   
   
       $conn = new mysqli($servername, $username, $password, $dbname);
   
       if ($conn->connect_error) {
           die("Connection failed: " . $conn->connect_error);
       }
    if(isset($_POST["singbtn"])){
        if(empty($_POST["username"])&&empty($_POST["email"])&&empty($_POST["role"])){
            echo "plaes fill out all the inputes";}else{

        function test_input($data) {
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
          }

        $name = test_input($_POST["username"]);
        $email = test_input($_POST["email"]);
        $role = test_input($_POST["role"]);

        $query = "INSERT INTO users(usersname,email,roleid) VALUE(?,?,?)";
        $stmt = $conn->prepare($query);

        $stmt->bind_param("ssi",$name,$email,$role);

        $stmt->execute();
        $stmt->close();
        $conn->close();
        echo"<script>alert'done'</script>";
    };
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form method="POST" >
        <input type="text" name="username" placeholder="name">
        <input type="text" name="email" placeholder="email">
        <select type="text" name="role" >
        <?php
            $conn = new mysqli($servername, $username, $password, $dbname);
   
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }
            $sql="SELECT * FROM role;";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo '<option value="'.$row['roleid'].'">'.$row['namee'].'</option>';
                }
            } 
            $conn->close();
        ?>
    
        
        </select>
        <button name="singbtn">sing in</button>

    </form>
</body>
</html>



