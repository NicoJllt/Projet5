<?php

namespace App\src\constraint;

// Routage des validations des formulaires
class Validation
{
    public function validate($data, $name)
    {
        if ($name === 'Menu') {
            $menuValidation = new MenuValidation();
            $errors = $menuValidation->check($data);
            return $errors;
        } elseif ($name === 'User') {
            $userValidation = new UserValidation();
            $errors = $userValidation->check($data);
            return $errors;
        }
    }
}
