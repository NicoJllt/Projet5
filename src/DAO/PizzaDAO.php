<?php

namespace App\src\DAO;

use App\config\Parameter;
use App\src\model\Pizza;

class PizzaDAO extends DAO
{
    // Création d'un objet modèle sur la base des données reçues de la BDD
    // On aurait pu utiliser un constructeur avec paramètre dans le modèle
    private function buildObject($row)
    {
        $element = new Pizza();
        $element->setId($row['id']);
        $element->setName($row['name']);
        $element->setDescription($row['description']);
        $element->setPriceSmall($row['priceSmall']);
        $element->setPriceBig($row['priceBig']);
        $element->setIdAdmin($row['idAdmin']);
        return $element;
    }

    public function getPizzas()
    {
        $sql = 'SELECT pizza.id, pizza.name, pizza.description, pizza.priceSmall, pizza.priceBig, pizza.idAdmin, user.username
        FROM pizza INNER JOIN user ON pizza.idAdmin = user.id
        ORDER BY pizza.id ASC';
        $result = $this->createQuery($sql);
        $pizzas = [];
        foreach ($result as $row) {
            $pizzaId = $row['id'];
            $pizzas[$pizzaId] = $this->buildObject($row);
        }
        $result->closeCursor();
        return $pizzas;
    }

    public function addPizza(Parameter $post, $idAdmin)
    {
        $sql = 'INSERT INTO pizza (name, description, priceSmall, priceBig, idAdmin) VALUES (?, ?, ?, ?)';
        $this->createQuery($sql, [
            $post->get('name'),
            $post->get('description'),
            $post->get('priceSmall'),
            $post->get('priceBig'),
            $idAdmin
        ]);
    }

    public function editPizza(Parameter $post, $id, $idAdmin)
    {
        $sql = 'UPDATE pizza SET name=:name, description=:description, priceSmall=:priceSmall, priceBig=:priceBig, idAdmin=:idAdmin  WHERE id=:id';
        $this->createQuery($sql, [
            'name' => $post->get('name'),
            'description' => $post->get('description'),
            'priceSmall' => $post->get('priceSmall'),
            'priceBig' => $post->get('priceBig'),
            'idAdmin' => $idAdmin,
            'id' => $id
        ]);
    }

    public function deletePizza($id)
    {
        $sql = 'DELETE FROM pizza WHERE id = ?';
        $this->createQuery($sql, [$id]);
    }
    
    // Retourne le nombre d'éléments
    public function count()
    {
        $sql = 'SELECT COUNT(*) AS count FROM pizza';
        $result = $this->createQuery($sql);
        $count = $result->fetch();
        $result->closeCursor();
        return $count['count'];
    }
}
