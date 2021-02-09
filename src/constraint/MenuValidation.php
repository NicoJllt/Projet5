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
        } elseif ($name === 'priceSmall') {
            $error = $this->checkPriceSmall($name, $value);
            $this->addError($name, $error);
        } elseif ($name === 'priceBig') {
            $error = $this->checkPriceBig($name, $value);
            $this->addError($name, $error);
        } elseif ($name === 'price') {
            $error = $this->checkPrice($name, $value);
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

    private function checkPriceSmall($name, $value)
    {
        if ($this->constraint->notBlank($name, $value)) {
            return $this->constraint->notBlank('Prix demi-lune', $value);
        }
        if ($this->constraint->minLength($name, $value, 0)) {
            return $this->constraint->minLength('Prix demi-lune', $value, 0);
        }
        if ($this->constraint->maxLength($name, $value, 5)) {
            return $this->constraint->maxLength('Prix demi-lune', $value, 5);
        }
    }

    private function checkPriceBig($name, $value)
    {
        if ($this->constraint->notBlank($name, $value)) {
            return $this->constraint->notBlank('Prix entière', $value);
        }
        if ($this->constraint->minLength($name, $value, 0)) {
            return $this->constraint->minLength('Prix entière', $value, 0);
        }
        if ($this->constraint->maxLength($name, $value, 5)) {
            return $this->constraint->maxLength('Prix entière', $value, 5);
        }
    }

    private function checkPrice($name, $value)
    {
        if ($this->constraint->notBlank($name, $value)) {
            return $this->constraint->notBlank('Prix', $value);
        }
        if ($this->constraint->minLength($name, $value, 0)) {
            return $this->constraint->minLength('Prix', $value, 0);
        }
        if ($this->constraint->maxLength($name, $value, 5)) {
            return $this->constraint->maxLength('Prix', $value, 5);
        }
    }
}
