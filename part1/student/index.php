<?php
    $ID = $_POST['id'];
    $name = $_POST['name'];
    $dept_name = $_POST['dept'];
    $tot_cred = $_POST['cred'];

    $conn = new mysqli('localhost','root','','univ');
    if($conn->connect_error){
        die('Connection Failed : ' . $conn->connect_error);
    }
    else{
        // Disable foreign key checks
        $conn->query('SET FOREIGN_KEY_CHECKS=0;');
        
        $stmt = $conn->prepare("insert into student(ID, name, dept_name, tot_cred) values(?,?,?,?)");
        $stmt->bind_param("sssi", $ID, $name, $dept_name, $tot_cred);
        $stmt->execute();
        echo "Data Added Successfully ✌️";
        // $stmt->close();
        
        // Enable foreign key checks
        $conn->query('SET FOREIGN_KEY_CHECKS=1;');
        
        // Redirect to the same page
        header("Location: {$_SERVER['HTTP_REFERER']}");
        exit();
    }
?>
