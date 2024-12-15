<?php
// Getting Config
$config = json_decode(file_get_contents("config.json"), true);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon"
        href="<?php echo 'data:image/x-icon;base64,' . base64_encode(file_get_contents($config["favicon"])); ?>"
        type="image/x-icon">
    <link rel="stylesheet" href="<?php echo 'themes/' . $config['theme'] . '/addMail.css'; ?>">
    <title><?php echo $config["appName"]; ?></title>

</head>

<body>
    <div class="mainbox">
        <div class="info">
            <img src="<?php echo 'data:image/png;base64,' . base64_encode(file_get_contents($config["logo"])); ?>"
                alt="Error Loading Image" class="logo" draggable="false">
            <p class="title"><?php echo $config["appName"]; ?></p>
        </div>

        <form method="post" class="box">
            <p class="success">Mail has been added.</p>
            <input type="text" placeholder="Enter name" required class="fillBox" name="name">
            <input type="email" placeholder="Enter email" required class="fillBox" name="email">
            <input type="submit" value="Submit" name="submit" class="submitBtn">
            <a href="index.php" class="send">Send Email?</a>
        </form>
    </div>

    <?php
    if (isset($_POST["submit"])) {

        $dataArray = json_decode(file_get_contents("data/mail.json"), true);

        $dataArray[$_POST["name"]] = $_POST["email"];
        file_put_contents("data/mail.json", json_encode($dataArray, JSON_PRETTY_PRINT));
    }
    ?>
</body>

</html>