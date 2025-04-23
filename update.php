<?php include 'db.php';
$id = $_GET['id'];
$result = $conn->query("SELECT * FROM books WHERE id=$id");
$book = $result->fetch_assoc();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title = $_POST['title']; $author = $_POST['author'];
    $genre = $_POST['genre']; $year = $_POST['year'];
    $conn->query("UPDATE books SET title='$title', author='$author', genre='$genre', year='$year' WHERE id=$id");
    header("Location: index.php");
}
?>
<!DOCTYPE html>
<html>
<head>
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
<title>Edit Book</title></head>
<body>
    <h2>Edit Book</h2>
    <form method="POST">
        Title: <input name="title" value="<?= $book['title']; ?>"><br><br>
        Author: <input name="author" value="<?= $book['author']; ?>"><br><br>
        Genre: <input name="genre" value="<?= $book['genre']; ?>"><br><br>
        Year: <input name="year" type="number" value="<?= $book['year']; ?>"><br><br>
        <button type="submit">Update</button>
    </form>
    <a href="index.php">Back to list</a>
</body>
</html>
