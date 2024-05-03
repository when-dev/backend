<?php

use Models\DataValidator;
use Models\QueryBuilder;

require_once 'models/QueryBuilder.php';
require_once 'models/DataValidator.php';

session_start();

$dataValidator = new DataValidator();
$queryBuilder = new QueryBuilder();

// Validate form data
$errors = $dataValidator->validateAll($_POST);

// If there are validation errors, save them to the session and redirect back to the form
if (!empty($errors)) {
    $_SESSION['errors'] = $errors;
    $_SESSION['form_data'] = $_POST; // Save form data to repopulate the form
    header('Location: index.php');
    exit;
}

// Prepare data for insertion, ensuring all fields are set
$insertData = [
    'fio' => $_POST['FIO'],
    'telephone' => $_POST['telephone'],
    'email' => $_POST['email'],
    'birthday' => $_POST['birthday'],
    'sex' => $_POST['sex'] ?? 'Not specified', // Provide a default value if not set
    'biography' => $_POST['biography'],
];

// Insert data into the database
$queryBuilder->storeOne('Applications', $insertData);
$user_id = $queryBuilder->getLastId();

// Handle languages if provided
if (!empty($_POST['languages'])) {
    foreach ($_POST['languages'] as $language) {
        $queryBuilder->storeOne('LanguageApplications', [
            'application_id' => $user_id,
            'language_id' => $language
        ]);
    }
}

// Set a success flag and redirect back to the form
$_SESSION['form_submitted'] = true;
header('Location: index.php');
exit;