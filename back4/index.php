<?php
session_start();

$formSubmitted = $_SESSION['form_submitted'] ?? false;
unset($_SESSION['form_submitted']); 

$errors = $_SESSION['errors'] ?? [];
unset($_SESSION['errors']);

$form_data = $_SESSION['form_data'] ?? [];
unset($_SESSION['form_data']);
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Форма</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="style.css" rel="stylesheet">
</head>
<body>

<div class="myform">
    <form action="action.php" method="POST">
        <h2 id="form">Форма</h2>

        <?php if ($formSubmitted): ?>
            <div class="alert alert-success" role="alert">
                Форма успешно отправлена!
            </div>
        <?php endif; ?>

        <?php if (!empty($errors)): ?>
        <div id="errors" class="alert alert-danger">
            <ul>
                <?php foreach ($errors as $error): ?>
                <li><?= htmlspecialchars($error) ?></li>
                <?php endforeach; ?>
            </ul>
        </div>
        <?php endif; ?>

        <p>
            <label for="FIO">ФИО:</label>
            <input name="FIO" type="text" id="FIO" placeholder="ФИО" value="<?= htmlspecialchars($form_data['FIO'] ?? '') ?>" class="<?= isset($errors['FIO']) ? 'is-invalid' : '' ?>">
            <?php if (isset($errors['FIO'])): ?>
            <div class="invalid-feedback"><?= htmlspecialchars($errors['FIO']) ?></div>
            <?php endif; ?>
        </p>

        <p>
            <label for="telephone">Телефон:</label>
            <input name="telephone" type="tel" id="telephone" placeholder="номер телефона" value="<?= htmlspecialchars($form_data['telephone'] ?? '') ?>" class="<?= isset($errors['telephone']) ? 'is-invalid' : '' ?>">
            <?php if (isset($errors['telephone'])): ?>
            <div class="invalid-feedback"><?= htmlspecialchars($errors['telephone']) ?></div>
            <?php endif; ?>
        </p>

        <p>
            <label for="email">Email:</label>
            <input name="email" type="email" id="email" placeholder="email" value="<?= htmlspecialchars($form_data['email'] ?? '') ?>" class="<?= isset($errors['email']) ? 'is-invalid' : '' ?>">
            <?php if (isset($errors['email'])): ?>
            <div class="invalid-feedback"><?= htmlspecialchars($errors['email']) ?></div>
            <?php endif; ?>
        </p>

        <p>
            <label for="birthday">Дата рождения:</label>
            <input name="birthday" type="date" id="birthday" value="<?= htmlspecialchars($form_data['birthday'] ?? '') ?>">
        </p>

        <p>Пол:</p>
        <div class="m-3">
            <label>
                <input type="radio" name="sex" value="М" <?= isset($form_data['sex']) && $form_data['sex'] === 'М' ? 'checked' : '' ?>>
                Мужчина
            </label>
            <label>
                <input type="radio" name="sex" value="Ж" <?= isset($form_data['sex']) && $form_data['sex'] === 'Ж' ? 'checked' : '' ?>>
                Женщина
            </label>
        </div>

        <p>Выберите язык программирования:</p>
        <select name="languages[]" multiple>
            <?php
            $languages = [
                '1' => 'Java',
                '2' => 'C++',
                '3' => 'Pascal',
                '4' => 'C#',
                '5' => 'PHP',
                '6' => 'JavaScript',
                '7' => 'Python',
                '8' => 'Ruby',
                '9' => 'Swift',
                '10' => 'Go',
                '11' => 'Kotlin',
                '12' => 'Scala',
                '13' => 'C',
            ];
            foreach ($languages as $value => $label): ?>
            <option value="<?= $value ?>" <?= in_array($value, $form_data['languages'] ?? []) ? 'selected' : '' ?>><?= $label ?></option>
            <?php endforeach; ?>
        </select>
        <label for="biography" class="form-label">Биография</label>
            <textarea name="biography" id="biography" rows="4" class="form-control <?= isset($errors['biography']) ? 'is-invalid' : '' ?>" placeholder="Расскажите о себе"><?= htmlspecialchars($form_data['biography'] ?? '') ?></textarea>
            <?php if (isset($errors['biography'])): ?>
                <?php endif; ?>

            <input name="checkbox" type="checkbox" id="checkbox" class="form-check-input <?= isset($errors['checkbox']) ? 'is-invalid' : '' ?>" <?= isset($form_data['checkbox']) && $form_data['checkbox'] === 'on' ? 'checked' : '' ?>>
            <label for="checkbox">С контрактом ознакомлен(-а)</label>
            <?php if (isset($errors['checkbox'])): ?>
            <div class="invalid-feedback"><?= htmlspecialchars($errors['checkbox']) ?></div>
            <?php endif; ?>

        <button type="submit" class="btn btn-success">Отправить форму на сервер</button>
    </form>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
</body>
</html>