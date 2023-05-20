<!DOCTYPE html>
<html>

<head>
	<title>Search Results</title>
	<!-- Bootstrap CSS -->
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

	<div class="container-fluid text-center">
		<div class="row">
			<div class="col-md-4 mx-auto">
				<div class="container">
					<div class="card" style="background-color: #202b33;">
						<div class="card-header bg-dark text-white">
							<h3 class="card-title mb-0">Movie Director Details</h3>
						</div>
						<div class="card-body">
							<?php
							try {
								$pdo = new PDO('sqlite:movies.db');
								$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
							} catch (PDOException $e) {
								echo "Connection failed: " . $e->getMessage();
							}
							if (isset($_GET['id'])) {
								if (!empty($_GET['id'])) {
									$id = $_GET['id'];

									$query2 = "SELECT people.name AS director_name, COUNT(*) AS num_films
										FROM stars
										JOIN movies ON stars.movie_id = movies.id
										JOIN directors ON directors.movie_id = movies.id
										JOIN people ON directors.person_id = people.id
										WHERE stars.person_id = :id
										GROUP BY people.name
										ORDER BY num_films DESC;";

									$stmt2 = $pdo->prepare($query2);
									$stmt2->execute(['id' => $id]);
									
									if ($query_run2 = $stmt2->fetchAll(PDO::FETCH_ASSOC)) {
							?>
										<div class="table-responsive">
											<table class="table table-bordered text-white">
												<thead class="thead-dark">
													<tr>
														<th>Director Name</th>
														<th>Number of Films</th>
													</tr>
												</thead>
												<tbody>
													<?php
													foreach ($query_run2 as $result) {
													?>
														<tr>
															<td><?= $result['director_name']; ?></td>
															<td><?= $result['num_films']; ?></td>
														</tr>
													<?php
													}
													?>
												</tbody>
												</tbody>
											</table>
										</div>
									<?php
									} else {
										echo "<p class='text-danger'>No Record Found 😓</p>";
									}
								}
							}
							if (isset($_GET['name'])) {
								if (!empty($_GET['name'])) {
									$name = $_GET['name'];

									$query2 = "SELECT people.name AS director_name, COUNT(*) AS num_films
										FROM stars
										JOIN movies ON stars.movie_id = movies.id
										JOIN directors ON directors.movie_id = movies.id
										JOIN people ON directors.person_id = people.id
										WHERE stars.person_id = (SELECT id FROM people WHERE name = :name)
										GROUP BY people.name
										ORDER BY num_films DESC;";

									$stmt2 = $pdo->prepare($query2);
									$stmt2->execute(['name' => $name]);

									if ($query_run2 = $stmt2->fetchAll(PDO::FETCH_ASSOC)){
									?>
										<div class="table-responsive">
											<table class="table table-bordered text-white">
												<thead class="thead-dark">
													<tr>
														<th>Director Name</th>
														<th>Number of Films</th>
													</tr>
												</thead>
												<tbody>
													<?php
													foreach ($query_run2 as $result) {
													?>
														<tr>
															<td><?= $result['director_name']; ?></td>
															<td><?= $result['num_films']; ?></td>
														</tr>
													<?php
													}
													?>
												</tbody>
												</tbody>
											</table>
										</div>
							<?php
									} else {
										echo "<p class='text-danger'>No Record Found 😓</p>";
									}
								}
							}
							?>
						</div>
					</div>
				</div>
			</div>

			<div class="col-md-4 mx-auto">
				<div class="container">
					<div class="card" style="background-color: #202b33;">
						<div class="card-header bg-dark text-white">
							<h3 class="card-title mb-0">Movie Star Details</h3>
						</div>

						<div class="card-body">
							<?php

							try {
								$pdo = new PDO('sqlite:movies.db');
								$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
							} catch (PDOException $e) {
								echo "Connection failed: " . $e->getMessage();
							}

							if (isset($_GET['id'])) {
								if (!empty($_GET['id'])) {
									$id = $_GET['id'];

									$query1 = "SELECT m.year, COUNT(*) AS num_films 
									FROM movies as m 
									JOIN stars as s 
									ON m.id = s.movie_id 
									WHERE s.person_id = :id 
									GROUP BY m.year 
									ORDER BY m.year DESC;";

									$stmt1 = $pdo->prepare($query1);
									$stmt1->execute(['id' => $id]);

									if ($query_run1 = $stmt1->fetchAll(PDO::FETCH_ASSOC)) {
							?>
										<div class="table-responsive">
											<table class="table table-bordered text-white">
												<thead class="thead-dark">
													<tr>
														<th>Year</th>
														<th>Number of Films</th>
													</tr>
												</thead>
												<tbody>
													<?php
													foreach ($query_run1 as $result) {
													?>
														<tr>
															<td><?= $result['year']; ?></td>
															<td><?= $result['num_films']; ?></td>
														</tr>
													<?php
													}
													?>
												</tbody>
											</table>
										</div>
									<?php
									} else {
										echo "<p class='text-danger'>No Record Found 😓</p>";
									}
								}
							}
							if (isset($_GET['name'])) {
								if (!empty($_GET['name'])) {
									$name = $_GET['name'];

									$query = "SELECT m.year, COUNT(*) AS num_films 
									FROM movies as m 
									JOIN stars as s 
									ON m.id = s.movie_id 
									WHERE s.person_id = (SELECT id FROM people WHERE name = :name) GROUP BY m.year ORDER BY m.year DESC;";

									$stmt = $pdo->prepare($query);
									$stmt->execute(['name' => $name]);

									if ($query_run = $stmt->fetchAll(PDO::FETCH_ASSOC)) {
									?>
										<div class="table-responsive">
											<table class="table table-bordered text-white">
												<thead class="thead-dark">
													<tr>
														<th>Year</th>
														<th>Number of Films</th>
													</tr>
												</thead>
												<tbody>
													<?php
													foreach ($query_run as $result) {
													?>
														<tr>
															<td><?= $result['year']; ?></td>
															<td><?= $result['num_films']; ?></td>
														</tr>
													<?php
													}
													?>
												</tbody>
											</table>
										</div>
							<?php
									} else {
										echo "<p class='text-danger'>No Record Found 😓</p>";
									}
								}
							}
							?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

</body>
</html>