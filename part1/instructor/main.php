<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Instructor updater</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <nav>
        <div class="navbar-left">
            <h1><a href="/project-2/index.html" class="text-decoration-none text-white">SQL/PHP Project</a></h1>
        </div>
        <div class="navbar-right">
            <button class="btn" onClick="window.location.href='/project-2/part1/student/index.html';">PART-1</button>
            <button class="btn" onClick="window.location.href='/project-2/part2/main.php';">PART-2</button>
        </div>
    </nav>

    <div class="main-container">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-7">
                    <div class="card mt-5" style="background-color: #202b33;">

                        <div class="card-header text-center">
                            <h2>Instructor Details</h2>
                        </div>

                        <div class="card-body">
                            <form method="GET">
                                <div class="row">
                                    <div class="col-md-8">
                                        <input type="text" name="id" placeholder="Enter Instructor ID" value="<?php if (isset($_GET['id'])) {
                                            echo $_GET['id'];
                                        } ?>" class="form-control">
                                    </div>
                                    <div class="col-md-4">
                                        <button type="submit" class="btn btn-primary">Search</button>
                                    </div>
                                </div>
                            </form>

                            <div class="row">
                                <div class="col-md-12">
                                    <hr>
                                    <?php
                                    $host = "localhost";
                                    $username = "root";
                                    $password = "";
                                    $dbname = "univ";
                                    $con = mysqli_connect($host, $username, $password, $dbname);

                                    if (isset($_GET['id'])) {
                                        $id = $_GET['id'];

                                        $query = "SELECT * FROM instructor WHERE id='$id' ";
                                        $query_run = mysqli_query($con, $query);

                                        if (mysqli_num_rows($query_run) > 0) {
                                            foreach ($query_run as $row) {
                                                ?>
                                                <form method="POST">
                                                    <div class="form-group mb-3">
                                                        <label for="">Name</label>
                                                        <input type="text" value="<?= $row['name']; ?>" class="form-control"
                                                            name="name">
                                                    </div>
                                                    <div class="form-group mb-3">
                                                        <label for="">Department Name</label>
                                                        <input type="text" value="<?= $row['dept_name']; ?>" class="form-control"
                                                            name="department" readonly>
                                                    </div>
                                                    <div class="form-group mb-3">
                                                        <label for="">Salary</label>
                                                        <input type="text" value="<?= $row['salary']; ?>" class="form-control"
                                                            name="salary">
                                                    </div>
                                                    <input type="submit" name="save" value="Submit" style="font-size:20px"
                                                        class="d-none d-sm-inline-block btn btn-sm btn-success shadow-sm">
                                                </form>
                                                <?php
                                            }
                                        } else {
                                            echo "No Record Found 😓";
                                        }
                                    }

                                    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                                        $id = $_GET['id'];
                                        $name = $_POST['name'];
                                        $dept_name = $_POST['department'];
                                        $salary = $_POST['salary'];

                                        $sql_query = "UPDATE instructor SET name = '$name' , dept_name = '$dept_name', salary = '$salary'
                                        WHERE ID = '$id'";
                                        $result = mysqli_query($con, $sql_query);
                                        if ($result) {
                                            echo "Data successfully updated 🥳";
                                        } else {
                                            echo "Error: " . $sql . "" . mysqli_error($conn);
                                        }
                                    }

                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>