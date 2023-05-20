<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Movie Star Details</title>
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
                            <h2>Movie Star Details</h2>
                        </div>
                        <div class="card-body">
                            <!-- Modify the form to submit to a new PHP file -->
                            <form method="GET" action="res.php" target="_self">
                                <div class="row justify-content-center">
                                    <div class="col-md-4">
                                        <input type="number" name="id" placeholder="Search by ID" value="<?php if (isset($_GET['id'])) {echo $_GET['id'];} ?>" class="form-control">
                                    </div>
                                    <div class="col-md-4">
                                        <input type="text" name="name" placeholder="Search by Name" value="<?php if (isset($_GET['name'])) {echo $_GET['name'];} ?>" class="form-control">
                                    </div>
                                    <div class="col-md-4">
                                        <button type="submit" class="btn btn-primary mb-2">Search</button>
                                    </div>
                                </div>
                            </form>
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