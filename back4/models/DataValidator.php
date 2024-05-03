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
            $errors['FIO'] = $ex->getMessage();
        }
        try {
            $this->validatePhone($data);
        } catch (\Exception $ex) {
            $errors['telephone'] = $ex->getMessage();
        }
        try {
            $this->validateEmail($data);
        } catch (\Exception $ex) {
            $errors['email'] = $ex->getMessage();
        }
        try {
            $this->validateBirthDate($data);
        } catch (\Exception $ex) {
            $errors['birthday'] = $ex->getMessage();
        }
        try {
            $this->validateSex($data);
        } catch (\Exception $ex) {
            $errors['sex'] = $ex->getMessage();
        }
        try {
            $this->validateLanguagesChoice($data);
        } catch (\Exception $ex) {
            $errors['languages'] = $ex->getMessage();
        }
        try {
            $this->validateBiography($data);
        } catch (\Exception $ex) {
            $errors['biography'] = $ex->getMessage();
        }
        try {
            $this->validateCheckbox($data);
        } catch (\Exception $ex) {
            $errors['checkbox'] = $ex->getMessage();
        }
        return $errors;
    }

    private function validateName(array $data): void
    {
        if (empty($data['FIO'])) {
            throw new \Exception('Введите ФИО.');
        }
        if (strlen($data['FIO']) > 150) {
            throw new \Exception('ФИО должно быть меньше 150 символов.');
        }
        if (!preg_match('/^[a-zA-Zа-яА-ЯёЁ\s-]+$/u', $data['FIO'])) {
            throw new \Exception('ФИО должно содержать только буквы, пробелы и дефисы.');
        }
    }

    private function validatePhone(array $data): void
    {
        if (empty($data['telephone'])) {
            throw new \Exception('Введите номер телефона.');
        }
        if (!preg_match('/^\+?\d{1,3}\s?\(?\d{1,4}\)?[\d\s-]{5,15}$/', $data['telephone'])) {
            throw new \Exception('Неверный формат номера телефона.');
        }
    }

    private function validateEmail(array $data): void
    {
        if (empty($data['email'])) {
            throw new \Exception('Введите email.');
        }
        if (!filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
            throw new \Exception('Неверный формат email.');
        }
    }

    private function validateBirthDate(array $data): void
    {
        if (empty($data['birthday'])) {
            throw new \Exception('Введите дату рождения.');
        }
        $date = date_create_from_format('Y-m-d', $data['birthday']);
        if (!$date || $date->format('Y-m-d') !== $data['birthday']) {
            throw new \Exception('Неверный формат даты рождения. Используйте ГГГГ-ММ-ДД.');
        }
    }

    private function validateSex(array $data): void
    {
        if (empty($data['sex'])) {
            throw new \Exception('Выберите пол.');
        }
    }

    private function validateLanguagesChoice(array $data): void
    {
        if (empty($data['languages']) || !is_array($data['languages'])) {
            throw new \Exception('Выберите хотя бы один язык программирования.');
        }
    }

    private function validateBiography(array $data): void
    {
        if (empty($data['biography'])) {
            throw new \Exception('Напишите что-то о себе.');
        }
    }

    private function validateCheckbox(array $data): void
    {
        if (!isset($data['checkbox']) || $data['checkbox'] !== 'on') {
            throw new \Exception('Подтвердите ознакомление с контрактом.');
        }
    }
}