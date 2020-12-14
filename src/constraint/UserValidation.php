<?php

namespace App\src\constraint;

use App\config\Parameter;

class UserValidation extends Validation
{
    private $errors = [];
    private $constraint;

    public function __construct()
    {
        $this->constraint = new Constraint();
    }

    public function check(Parameter $post)
    {
        foreach ($post->all() as $key => $value) {
            $this->checkField($key, $value);
        }
        return $this->errors;
    }

    private function checkField($name, $value)
    {
        if ($name === 'username') {
            $error = $this->checkUsername($name, $value);
            $this->addError($name, $error);
        } elseif ($name === 'password') {
            $error = $this->checkPassword($name, $value);
            $this->addError($name, $error);
        } elseif ($name === 'mail') {
            $error = $this->checkMail($name, $value);
            $this->addError($name, $error);
        }
    }

    private function addError($name, $error)
    {
        if ($error) {
            $this->errors += [
                $name => $error
            ];
        }
    }

    private function checkUsername($name, $value)
    {
        if ($this->constraint->notBlank($name, $value)) {
            return $this->constraint->notBlank('Nom d\'utilisateur', $value);
        }
        if ($this->constraint->minLength($name, $value, 2)) {
            return $this->constraint->minLength('Nom d\'utilisateur', $value, 2);
        }
        if ($this->constraint->maxLength($name, $value, 50)) {
            return $this->constraint->maxLength('Nom d\'utilisateur', $value, 50);
        }
    }

    private function checkMail($name, $value)
    {
        if ($this->constraint->notBlank($name, $value)) {
            return $this->constraint->notBlank('Mail', $value);
        }
        if ($this->constraint->minLength($name, $value, 2)) {
            return $this->constraint->minLength('Mail', $value, 2);
        }
        if ($this->constraint->maxLength($name, $value, 50)) {
            return $this->constraint->maxLength('Mail', $value, 50);
        }
    }

    private function checkPassword($name, $value)
    {
        if ($this->constraint->notBlank($name, $value)) {
            return $this->constraint->notBlank('Mot de passe', $value);
        }
        if ($this->constraint->minLength($name, $value, 8)) {
            return $this->constraint->minLength('Mot de passe', $value, 8);
        }
        if ($this->constraint->maxLength($name, $value, 50)) {
            return $this->constraint->maxLength('Mot de passe', $value, 50);
        }
    }
}