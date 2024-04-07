<?php
unset($_SESSION['errors']);
session_start();
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="style.css" rel="stylesheet">
</head>
<body>

<div class="myform">
    <form action="action.php" method="POST">
        <h2 id="form">Форма</h2>

        <?php
        if (!empty($_SESSION['errors'])) {
            echo '<div id="errors" class="alert alert-danger">';
            echo '<ul>';
            foreach ($_SESSION['errors'] as $error) {
                echo '<li>'.$error.'</li>';
            }
            echo '</ul>';
            echo '</div>';
        } else if((isset($_SESSION['errors']))) {
            echo '<div class="alert alert-primary" id="form-success" role="alert">
                      Форма отправлена успешно, в ближайшее время мы свяжемся с вами
                    </div>';
        }
        unset($_SESSION['errors']);
        ?>

        <p><label for="FIO"><input name="FIO" type="text" id="FIO" placeholder="ФИО"></label></p>
        <p><label for="telephone"><input name="telephone" type="tel" id="telephone" placeholder="номер телефона"></label>
        </p>
        <p><label for="email"><input name="email" type="email" id="email" placeholder="email"></label></p>
        <p><label for="birthday"><input name="birthday" type="date" id="birthday"></label></p>
        Пол:<br>
        <div class="m-3">
            <label>
                <input type="radio" checked="checked" name="sex" value="М" required>
                Мужчина
            </label>
            <label>
                <input type="radio" name="sex" value="Ж" required>
                Женщина
            </label>
        </div>
        <p> Выберите язык программирования:<br>
            <select name="languages[]" multiple>
                <option value="1">Java</option>
                <option value="2">C++</option>
                <option value="3">Pascal</option>
                <option value="4">C#</option>
                <option value="5">JavaScript</option>
                <option value="6">PHP</option>
                <option value="7">Python</option>
                <option value="8">Haskel</option>
                <option value="9">Clojure</option>
                <option value="10">Prolog</option>
                <option value="11">Scala</option>
            </select>
        </p>
        <label>
            <textarea name="biography" rows="12" cols="30" placeholder="text"></textarea>
        </label>
        <p>С контрактом ознакомлен(-а):
            <label>
                <input name="checkbox" type="checkbox">
            </label>
        </p>
        <button type="submit" class="btn btn-success">Отправить форму на сервер</button>
    </form>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
</body>
</html>
