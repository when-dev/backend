<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css" />
    <title>Document</title>
</head>
<body>
    <div class="form">
        <form action="" method="post">
            <input name="login" />
            <input name="pass" />
            <input type="hidden" name="csrf_token" value="<?=$val?>">
            <input type="submit" value="Войти" />
        </form>
    </div>
</body>
</html>