<?php

namespace App\src\constraint;

// Classe qui met à disposition les différentes fonctions de validation des formulaires
class Constraint
{
    public function notBlank($name, $value)
    {
        if (empty($value)) {
            return '<p class="constraint-error">Le champ ' . $name . ' saisi est vide</p>';
        }
    }
    public function minLength($name, $value, $minSize)
    {
        if (strlen($value) < $minSize) {
            return '<p class="constraint-error">Le champ ' . $name . ' doit contenir au moins ' . $minSize . ' caractères</p>';
        }
    }
    public function maxLength($name, $value, $maxSize)
    {
        if (strlen($value) > $maxSize) {
            return '<p class="constraint-error">Le champ ' . $name . ' doit contenir au maximum ' . $maxSize . ' caractères</p>';
        }
    }
}