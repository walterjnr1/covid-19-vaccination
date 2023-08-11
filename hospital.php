 <?php
include ('connect.php');


    $category = $_GET['cmdcategory'];
   // $conn = new mysqli ($servername, $username, $password, $dbname) or die("Connection to Database Failed");
    $stmt = $conn->stmt_init();
    $sql = "SELECT vaccination_center FROM hospital WHERE category_id  = (select id_no from category where category like '$category%')";
    $stmt->prepare($sql);
    $stmt->execute();
    $result = $stmt->get_result();
    while($resultRow = $result->fetch_array(MYSQLI_NUM))
        echo "<option>$resultRow[0]</option>";
    $result->close();
    $stmt->close();
?>