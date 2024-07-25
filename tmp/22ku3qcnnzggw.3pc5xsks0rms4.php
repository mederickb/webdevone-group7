<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LIST - <?= ($title) ?></title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <?php echo $this->render($header,NULL,get_defined_vars(),0); ?>
    
    <main>
        <?php echo $this->render($content,NULL,get_defined_vars(),0); ?>
    </main>
    
    <?php echo $this->render($footer,NULL,get_defined_vars(),0); ?>
    
    <script src="js/script.js"></script>
</body>
</html>