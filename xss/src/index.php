<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>XSS Challenge</title>
    <script src="./js/detect-obfuscated.js"></script>
    <?php include('./styles/styles.php'); ?>
</head>

<body>
    <h1 class="title">Capture the flag using XSS</h1>
    <p>
    <form action="" method="post" class="form">
        <input type="hidden" name="exercise">
        <input type="text" name="xss" placeholder="XSS will go here">
        <button type="submit">Submit</button>
    </form>
    </p>
    <p>
        <?php echo isset($_POST["xss"]) ? $_POST['xss'] : ''; ?>
    </p>
</body>

</html>