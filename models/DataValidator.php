<?php

namespace Models;

class DataValidator
{
    public function validateAll(array $data): array
    {
        $errors = [];
        try {
            $this->validateName($data);
        } catch (\Exception $ex) {
            $errors[] = $ex->getMessage();
        }
        try {
            $this->validatePhone($data);
        } catch (\Exception $ex) {
            $errors[] = $ex->getMessage();
        }
        try {
            $this->validateEmail($data);
        } catch (\Exception $ex) {
            $errors[] = $ex->getMessage();
        }
        try {
            $this->validateBirthDate($data);
        } catch (\Exception $ex) {
            $errors[] = $ex->getMessage();
        }
        try {
            $this->validateSex($data);
        } catch (\Exception $ex) {
            $errors[] = $ex->getMessage();
        }
        try {
            $this->validateLanguagesChoice($data);
        } catch (\Exception $ex) {
            $errors[] = $ex->getMessage();
        }
        try {
            $this->validateBiography($data);
        } catch (\Exception $ex) {
            $errors[] = $ex->getMessage();
        }
        try {
            $this->validateCheckbox($data);
        } catch (\Exception $ex) {
            $errors[] = $ex->getMessage();
        }
        return $errors;
    }

    /**
     * @throws \Exception
     */
    private function validateName(array $data): void
    {
        if (empty($data['FIO'])) {
            throw new \Exception('Введите ФИО');
        }
        if (strlen($data['FIO']) > 150) {
            throw new \Exception('ФИО должно быть меньше 150 символов');
        }
        if (!preg_match('/^[a-zA-Zа-яА-Я]+/', $data['FIO'])) {
            throw new ('ФИО должно содержать только буквы и пробелы');
        }
    }

    private function validateSex(array $data): void
    {
        if (empty($data['sex'])) {
            throw new \Exception('Выберите пол');
        }
    }

    private function validatePhone(array $data): void
    {
        if (empty($data['telephone'])) {
            throw new \Exception('Введите номер телефона');
        }
        if (!preg_match('/^\+?\d{1,3}\s?\(?\d{1,4}\)?[\d\s-]{1,15}$/', $data['telephone'])) {
            throw new \Exception('Неверный формат номера телефона');
        }
    }

    private function validateEmail(array $data): void
    {
        if (empty($data['email'])) {
            throw new \Exception('Введите email');
        }
        if (!filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
            throw new \Exception('Неверный формат email');
        }
    }

    private function validateBirthDate(array $data): void
    {
        if (empty($data['birthday'])) {
            throw new \Exception('Введите дату рождения');
        }
        $date = date_create_from_format('Y-m-d', $data['birthday']);
        if (!$date || $date->format('Y-m-d') !== $data['birthday']) {
            throw new \Exception('Неверный формат даты рождения. Используйте ГГГГ-ММ-ДД');
        }
    }

    private function validateLanguagesChoice(array $data): void
    {
        if (empty($data['languages'])) {
            throw new \Exception('Выберите хотя бы один язык программирования');
        }
    }

    private function validateBiography(array $data): void
    {
        if (empty($data['biography'])) {
            throw new \Exception('Напишите что-то о себе');
        }
    }

    private function validateCheckbox(array $data): void
    {
        if ($data['checkbox']!=='on') {
            throw new \Exception('Подтвердите ознакомление с контрактом');
        }
    }
}