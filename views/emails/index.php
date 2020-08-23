<?php $title = "Envois d'email"; ?>

<?php ob_start(); ?>
<h1>Qu'avez vous à dire ?</h1>

<form class="form-control" action="#" method="post"
      enctype="application/x-www-form-urlencoded">
    <br></br>Email: <input class="form-control" name='email' type='text' value="" required/><br/>
    Sujet: <input class="form-control" name='subject' type='text' value="" required/><br/>
    Message:<br/>
    <textarea class="form-control" name='message' rows='8' cols='40' required></textarea><br/>
    <input class="btn btn-outline-primary" name="SubmitButton" type='submit'/>
</form>

<?php
if (isset($_POST['SubmitButton'])) {
    $headers = "From:" . $_POST['email'] . "";
    $headers .= 'Reply-To: lud972vic@jur.fr' . "\n";
    $headers .= 'Content-Type: text/html; charset="iso-8859-1"' . "\n";
    $headers .= 'Content-Transfer-Encoding: 8bit';
    $email = $_POST['email'];
    $subject = $_POST['subject'];
    $message = '<html><head><title>Mail du site Tachete</title></head><body>' . $_POST['message'] . '</body></html>';

    mail($email, $subject, $message, $headers);
}
?>

<?php $content = ob_get_clean(); ?>

<?php require('views/gabarit.php'); ?>
