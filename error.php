<?php
//Error.php is responsible for holding the error messages of the website.
//Easier this way instead of having to create multiple variables for each error
//Errors will be stored into the $error variable and be displayed to the user
?>

<?php if (count($errors) > 0): ?>
    <div class="error">
        <?php foreach ($errors as $error) : ?>
        <p> <?php echo $error ?> </p>
        <?php endforeach ?>
    </div>
<?php endif ?>
