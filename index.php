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
    <link rel="stylesheet" href="<?php echo 'themes/' . $config['theme'] . '/index.css'; ?>">
    <title><?php echo $config["appName"]; ?></title>

</head>

<body>
    <div class="mainbox">
        <div class="info">
            <img src="<?php echo 'data:image/png;base64,' . base64_encode(file_get_contents($config["logo"])); ?>"
                alt="Error Loading Image" class="logo" draggable="false">
            <p class="title"><?php echo $config["appName"]; ?></p>
        </div>

        <form action="" class="box" method="post">
            <p class="tip">You can also use HTML & CSS for formatting</p>
            <p class="sending">Sending Mail... Please do not close the application</p>
            <input type="text" placeholder="Enter subject" class="subject" name="subject">
            <textarea name="message" class="msgBox" placeholder="Enter your message here"></textarea>
            <input type="submit" value="Send" name="submit" class="submitBtn">
            <p class="boiler" onclick="boilerPlate();">Add boiler plate?</p>
            <a href="addMail.php" class="add">Add Email?</a>
        </form>
    </div>

    <script>
        function boilerPlate() {
            document.querySelector(".msgBox").innerHTML = '<html>\n' +
                '    <head>\n' +
                '        <style>\n' +
                '        </style>\n' +
                '    </head>\n' +
                '    <body>\n' +
                '    </body>\n' +
                '</html>';
        }
    </script>

    <?php
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;

    require "vendor/autoload.php";

    if (isset($_POST["submit"])) {
        $dataArray = json_decode(file_get_contents("data/mail.json"), true);
        $mail = new PHPMailer(true);
        $successfulSends = 0;
        if (is_array($dataArray)) {
            foreach ($dataArray as $key => $value) {
                try {
                    $mail->isSMTP();
                    $mail->Host = $config["SMTP_HOST"];
                    $mail->SMTPAuth = true;
                    $mail->Username = $config["SMTP_MAIL"];
                    $mail->Password = $config["SMTP_PASSWORD"];
                    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
                    $mail->Port = $config["SMTP_PORT"];

                    $mail->setFrom($config["SMTP_MAIL"], $config["SMTP_SENDER"]);
                    $mail->addAddress($value);
                    $mail->isHTML(true);
                    $mail->Subject = htmlspecialchars($_POST["subject"]);
                    $mail->Body = $_POST["message"];
                    $mail->send();
                    $successfulSends++;

                } catch (Exception $e) {
                    echo "Ërror sending code try again: $e";
                }
            }

            echo "<script>
            document.querySelector('.sending').innerText = 'Successfully sent {$successfulSends} emails.';
            document.querySelector('.sending').style.display = 'block';
            </script>";
        } else {
            echo "<script>
            document.querySelector('.sending').innerText = 'No email address exists to send mail to';
            document.querySelector('.sending').style.display = 'block';
            </script>";
        }
    }
    ?>
</body>

</html>