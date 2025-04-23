<?php include 'db.php'; ?>
<!DOCTYPE html>
<html>
<head>
    <title>Book List</title>
    <style>
    body {
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        margin: 40px;
        background-color: #f9f9f9;
        color: #333;
    }

    h2 {
        color: #2c3e50;
    }

    table {
        width: 100%;
        border-collapse: collapse;
        background: #fff;
        box-shadow: 0 2px 5px rgba(0,0,0,0.1);
        margin-top: 20px;
    }

    th, td {
        border: 1px solid #ccc;
        padding: 12px 15px;
        text-align: left;
    }

    th {
        background-color: #34495e;
        color: white;
    }

    tr:nth-child(even) {
        background-color: #f2f2f2;
    }

    a {
        color: #3498db;
        text-decoration: none;
        margin-right: 10px;
    }

    a:hover {
        text-decoration: underline;
    }

    form {
        background: #fff;
        padding: 25px;
        border-radius: 6px;
        box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        max-width: 500px;
    }

    input[type="text"], input[type="number"] {
        width: 100%;
        padding: 10px;
        margin-bottom: 15px;
        border: 1px solid #ccc;
        border-radius: 4px;
    }

    button {
        background-color: #27ae60;
        color: white;
        padding: 10px 20px;
        border: none;
        border-radius: 4px;
        cursor: pointer;
        font-weight: bold;
    }

    button:hover {
        background-color: #219150;
    }

    .top-link {
        margin-bottom: 20px;
        display: inline-block;
        background: #3498db;
        color: #fff;
        padding: 8px 12px;
        border-radius: 4px;
        text-decoration: none;
    }

    .top-link:hover {
        background: #2980b9;
    }
</style>

    <style> table, th, td { border: 1px solid black; border-collapse: collapse; padding: 8px; } </style>
</head>
<body>
    <h2>Book List</h2>
    <a href="create.php">Add New Book</a>
    <table>
        <tr>
            <th>ID</th><th>Title</th><th>Author</th><th>Genre</th><th>Year</th><th>Actions</th>
        </tr>
        <?php
        $result = $conn->query("SELECT * FROM books");
        while ($row = $result->fetch_assoc()):
        ?>
        <tr>
            <td><?= $row['id']; ?></td>
            <td><?= $row['title']; ?></td>
            <td><?= $row['author']; ?></td>
            <td><?= $row['genre']; ?></td>
            <td><?= $row['year']; ?></td>
            <td>
                <a href="update.php?id=<?= $row['id']; ?>">Edit</a> |
                <a href="delete.php?id=<?= $row['id']; ?>" onclick="return confirm('Delete this book?');">Delete</a>
            </td>
        </tr>
        <?php endwhile; ?>
    </table>
</body>
</html>
