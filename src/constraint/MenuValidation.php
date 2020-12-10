<?php

namespace App\src\constraint;

use App\config\Parameter;

class MenuValidation extends Validation
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
        if ($name === 'name') {
            $error = $this->checkName($name, $value);
            $this->addError($name, $error);
        } elseif ($name === 'description') {
            $error = $this->checkDescription($name, $value);
            $this->addError($name, $error);
        } elseif ($name === 'smallPrice') {
            $error = $this->checkSmallPrice($name, $value);
            $this->addError($name, $error);
        } elseif ($name === 'bigPrice') {
            $error = $this->checkBigPrice($name, $value);
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

    private function checkName($name, $value)
    {
        if ($this->constraint->notBlank($name, $value)) {
            return $this->constraint->notBlank('Nom', $value);
        }
        if ($this->constraint->minLength($name, $value, 2)) {
            return $this->constraint->minLength('Nom', $value, 2);
        }
        if ($this->constraint->maxLength($name, $value, 50)) {
            return $this->constraint->maxLength('Nom', $value, 50);
        }
    }

    private function checkDescription($name, $value)
    {
        if ($this->constraint->notBlank($name, $value)) {
            return $this->constraint->notBlank('Description', $value);
        }
        if ($this->constraint->minLength($name, $value, 2)) {
            return $this->constraint->minLength('Description', $value, 2);
        }
    }

    private function checkSmallPrice($name, $value)
    {
        if ($this->constraint->notBlank($name, $value)) {
            return $this->constraint->notBlank('PetitPrix', $value);
        }
        if ($this->constraint->minLength($name, $value, 1)) {
            return $this->constraint->minLength('PetitPrix', $value, 1);
        }
        if ($this->constraint->maxLength($name, $value, 2)) {
            return $this->constraint->maxLength('PetitPrix', $value, 2);
        }
    }

    private function checkBigPrice($name, $value)
    {
        if ($this->constraint->notBlank($name, $value)) {
            return $this->constraint->notBlank('GrandPrix', $value);
        }
        if ($this->constraint->minLength($name, $value, 1)) {
            return $this->constraint->minLength('GrandPrix', $value, 1);
        }
        if ($this->constraint->maxLength($name, $value, 2)) {
            return $this->constraint->maxLength('GrandPrix', $value, 2);
        }
    }
}
