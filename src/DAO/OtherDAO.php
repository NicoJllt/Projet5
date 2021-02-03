<?php

namespace App\src\DAO;

use App\config\Parameter;
use App\src\model\Other;

class OtherDAO extends DAO
{
    // Création d'un objet modèle sur la base des données reçues de la BDD
    // On aurait pu utiliser un constructeur avec paramètre dans le modèle
    private function buildObject($row)
    {
        $element = new Other();
        $element->setId($row['id']);
        $element->setDescription($row['description']);
        $element->setPrice($row['price']);
        $element->setCategory($row['category']);
        $element->setIdAdmin($row['idAdmin']);
        return $element;
    }

    // Récupération des éléments
    public function getElements()
    {
        $sql = 'SELECT other.id, other.description, other.price, other.category, other.idAdmin, user.username
        FROM other INNER JOIN user ON other.idAdmin = user.id
        ORDER BY other.id ASC';
        $result = $this->createQuery($sql);
        $elements = [];
        foreach ($result as $row) {
            $elementId = $row['id'];
            $elements[$elementId] = $this->buildObject($row);
        }
        $result->closeCursor();
        return $elements;
    }

        // Récupération d'un épisode en fonction de son ID
        public function getElement($id)
        {
            $sql = 'SELECT id, description, price, category FROM other WHERE id = ?';
            $result = $this->createQuery($sql, [$id]);
            $element = $result->fetch();
            $result->closeCursor();
            return $this->buildObject($element);
        }
    

    public function addElement(Parameter $post, $idAdmin)
    {
        $sql = 'INSERT INTO other (description, price, category, idAdmin) VALUES (?, ?, ?, ?)';
        $this->createQuery($sql, [
            $post->get('description'),
            $post->get('price'),
            $post->get('category'),
            $idAdmin
        ]);
    }

    public function editElement(Parameter $post, $id, $idAdmin)
    {
        $sql = 'UPDATE other SET description=:description, price=:price, category=:category, idAdmin=:idAdmin  WHERE id=:id';
        $this->createQuery($sql, [
            'name' => $post->get('name'),
            'description' => $post->get('description'),
            'category' => $post->get('category'),
            'idAdmin' => $idAdmin,
            'id' => $id
        ]);
    }

    public function deleteElement($id)
    {
        $sql = 'DELETE FROM other WHERE id = ?';
        $this->createQuery($sql, [$id]);
    }
    
    // Retourne le nombre d'éléments
    public function count()
    {
        $sql = 'SELECT COUNT(*) AS count FROM other';
        $result = $this->createQuery($sql);
        $count = $result->fetch();
        $result->closeCursor();
        return $count['count'];
    }
}
