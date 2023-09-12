<!-- contact.php -->
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Site de recettes - Formulaire de Contact</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <?php if ((!isset($_POST['email']) || !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) || (!isset($_POST['message']) || empty($_POST['message']))) {
        echo ('<h1> Il faut un email et un message valides pour soumettre le formulaire. </h1>');
        return;
    } ?>



    <h1>Message bien reçu !</h1>
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Rappel de vos informations</h5>
            <p class="card-text">
                <b>Email</b> : <?php echo strip_tags($_POST['email']); ?>

            </p>

            <p class="card-text">
                <b>Message</b> : <?php echo strip_tags($_POST['message']); ?>
            </p>
        </div>
    </div>

</body>

</html>