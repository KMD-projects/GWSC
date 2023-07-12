<?php
include('db/query.php');

$users = getAllCustomers();
$hasUser = !empty($users);
if ($hasUser) {
    $title = "Manage Users";
} else {
    $title = "No Users";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Users</title>
    <link rel="stylesheet" href="css/style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="js/script.js"></script>
</head>
<body>
<main class="grid-container-3">
    <?php
    echo '<h1 class="grid-2-3 center-text">' . $title . '</h1>'
    ?>
    <table class="grid-2-3 data-table">
        <tr>
            <th>User ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Actions</th>
        </tr>
        <?php
        foreach ($users as $user) {
            echo '<tr>';
            echo '<td>' . $user->id . '</td>';
            echo '<td>' . $user->firstname . ' ' . $user->lastname . '</td>';
            echo '<td>' . $user->email . '</td>';
            echo '<td><button id="'. $user->id .'" class="btn-error" onclick="deleteUser(this)">Delete</button></td>';
            echo '</tr>';
        }
        ?>
    </table>
</main>
</body>
</html>
