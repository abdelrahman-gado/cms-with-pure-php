<?php require "includes/init.php" ?>

<?php

$email = '';
$subject = '';
$message = '';

?>

<?php
if ($_SERVER['REQUEST_METHOD'] === "POST") {
    $email = $_POST['email'];
    $subject = $_POST['subject'];
    $message = $_POST['message'];

    $errors = [];

    if (filter_var($email, FILTER_VALIDATE_EMAIL) === false) {
        $errors[] = 'Please enter a valid email address';
    }

    if ($subject === '') {
        $errors[] = 'Please enter a subject';
    }

    if ($message === '') {
        $errors[] = 'Please enter a message';
    }

    if (empty($errors)) {

        // $mail = new PHPMailer(true);

        // try {
        //     $mail->isSMTP();
        //     $mail->Host = 'your mail server';
        //     $mail->SMTPAuth = true;
        //     $mail->Username = 'username';
        //     $mail->Password = 'password';
        //     $mail->SMTPSecure = 'tls';
        //     $mail->Port = 587;

        //     $mail->setFrom('sender$daveh.io');
        //     $mail->addAddress('recipient@daveh.io');
        //     $mail->Subject = "asdasd";
        //     $mail->Body = "asdas";

        //     $mail->send();

        // } catch (Exception $e) {
        //     echo $e->getMessage();
        // }

        echo "Message Sent";
    }
}

?>


<?php require "includes/header.php" ?>

<h2>Contact</h2>
<?php if (!empty($errors)): ?>
    <ul>
        <?php foreach ($errors as $error): ?>
            <li>
                <?= $error ?>
            </li>
        <?php endforeach; ?>
    </ul>
<?php endif; ?>

<form action="" method="post" id="formContact">
    <div class="form-group">
        <label for="email">Your email</label>
        <input class="form-control" type="email" id="email" name="email" 
        placeholder="Your email" value="<?= htmlspecialchars($email) ?>">
    </div>

    <div class="form-group">
        <label for="subject">Subject</label>
        <input class="form-control" id="subject" name="subject" 
        placeholder="Subject" value="<?= htmlspecialchars($subject) ?>">
    </div>

    <div class="form-group">
        <label for="message">Message</label>
        <textarea class="form-control" name="message" id="Message"><?= htmlspecialchars($message) ?></textarea>
    </div>

    <button class="btn">Send</button>
</form>

<?php require "includes/footer.php" ?>