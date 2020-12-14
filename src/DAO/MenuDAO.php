<?php

namespace App\src\DAO;

use App\config\Parameter;
use App\src\model\Menu;

class MenuDAO extends DAO
{
    // Création d'un objet modèle sur la base des données reçues de la BDD
    // On aurait pu utiliser un constructeur avec paramètre dans le modèle
    private function buildObject($row)
    {
        $element = new Menu();
        $element->setElementId($row['elementId']);
        $element->setName($row['name']);
        $element->setDescription($row['description']);
        $element->setSmallPrice($row['smallPrice']);
        $element->setBigPrice($row['bigPrice']);
        $element->setIdAdmin($row['idAdmin']);
        return $element;
    }
    // Récupération des éléments
    public function getElements()
    {
        $sql = 'SELECT element.elementId, element.name, element.description, element.smallPrice, element.bigPrice, user.username
        FROM element INNER JOIN user ON element.idAdmin = user.userId
        ORDER BY element.elementId ' . ($asc ? 'ASC' : 'DESC');
        $result = $this->createQuery($sql);
        $elements = [];
        foreach ($result as $row) {
            $elementId = $row['elementId'];
            $elements[$elementId] = $this->buildObject($row);
        }
        $result->closeCursor();
        return $elements;
    }

    public function addElement(Parameter $post, $userId)
    {
        $sql = 'INSERT INTO element (name, description, smallPrice, bigPrice, idAdmin) VALUES (?, ?, NOW(), ?)';
        $this->createQuery($sql, [
            $post->get('name'),
            $post->get('description'),
            $post->get('smallPrice'),
            $post->get('bigPrice'),
            $userId
        ]);
    }

    public function editElement(Parameter $post, $elementId, $idAdmin)
    {
        $sql = 'UPDATE element SET name=:name, description=:description, idAdmin=:idAdmin  WHERE elementId=:elementId';
        $this->createQuery($sql, [
            'name' => $post->get('name'),
            'description' => $post->get('description'),
            'idAdmin' => $idAdmin,
            'elementId' => $elementId
        ]);
    }

    public function deleteElement($elementId)
    {
        $sql = 'DELETE FROM element WHERE elementId = ?';
        $this->createQuery($sql, [$elementId]);
    }
    
    // Retourne le nombre d'éléments
    public function count()
    {
        $sql = 'SELECT COUNT(*) AS count FROM element';
        $result = $this->createQuery($sql);
        $count = $result->fetch();
        $result->closeCursor();
        return $count['count'];
    }
}
