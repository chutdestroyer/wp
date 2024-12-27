<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>File Read and Write</title>
</head>
<body>
    <h1>File Read and Write Operations</h1>

    <!-- Form to write text to a file -->
    <form action="FileReadWrite.php" method="post">
        <label for="textdata">Enter Text:</label> <br>
        <textarea name="textdata" id="textdata" rows="5" cols="40" required></textarea><br>
        <input type="submit" value="Write to File"> <br><br>
    </form>

    <!-- Form to upload and read file content -->
    <form action="FileReadWrite.php" method="post" enctype="multipart/form-data">
        <label for="filedata">Upload File to Read Contents:</label> <br>
        <input type="file" name="filedata" id="filedata" accept=".txt" required><br>
        <input type="submit" value="Read File Contents"> <br><br>
    </form>

    <?php
    // Enable error reporting for debugging
    ini_set('display_errors', 1);
    error_reporting(E_ALL);

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Handle writing text to a file
        if (!empty($_POST['textdata'])) {
            $textdata = htmlspecialchars($_POST['textdata']); // Sanitize user input
            $filename = __DIR__ . "/output.txt"; // Use absolute path for safety

            if (file_put_contents($filename, $textdata)) {
                echo "<p>Data successfully written to <strong>output.txt</strong>.</p>";
            } else {
                echo "<p style='color:red;'>Failed to write to file.</p>";
            }
        }

        // Handle reading content from an uploaded file
        if (!empty($_FILES['filedata']['tmp_name'])) {
            $fileExtension = pathinfo($_FILES['filedata']['name'], PATHINFO_EXTENSION);

            if (strtolower($fileExtension) === 'txt') {
                $fileContent = file_get_contents($_FILES['filedata']['tmp_name']);
                echo "<h3>File Content:</h3>";
                echo "<pre>" . htmlspecialchars($fileContent) . "</pre>";
            } else {
                echo "<p style='color:red;'>Invalid file type. Please upload a .txt file.</p>";
            }
        }
    }
    ?>
</body>
</html>
