<?php

use Models\DataValidator;
use Models\QueryBuilder;

header('Content-Type: text/html; charset=UTF-8');

require_once 'models/QueryBuilder.php';
require_once 'models/DataValidator.php';

session_start();

$dataValidator = new DataValidator();
$queryBuilder = new QueryBuilder();

$_SESSION['errors'] = $dataValidator->validateAll($_POST);

if(! empty($_SESSION['errors'])) {
    header('Location: index.php');
    exit;
}

$queryBuilder->storeOne('Applications', [
    'fio' => $_POST['FIO'],
    'telephone' => $_POST['telephone'],
    'email' => $_POST['email'],
    'birthday' => $_POST['birthday'],
    'sex' => $_POST['sex'],
    'biography' => $_POST['biography'],
]);
$user_id = $queryBuilder->getLastId();

foreach ($_POST['languages'] as $language) {
    $queryBuilder->storeOne('LanguageApplications', [
        'application_id' => $user_id,
        'language_id' => $language
    ]);
}

header('Location: index.php');
exit;