<?php

namespace App\src\model;

// Eléments qui se chargent des échanges avec la base de données
class Other
{
    /**
     * @var int
     */
    private $id;

    /**
     * @var string
     */
    private $description;

    /**
     * @var int
     */
    private $price;

    /**
     * @var string
     */
    private $category;

    /**
     * @var int
     */
    private $idAdmin;

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param string $description
     */
    public function setDescription($description)
    {
        $this->description = $description;
    }

    /**
     * @return int
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * @param int $price
     */
    public function setPrice($price)
    {
        $this->price = $price;
    }

    /**
     * @return string
     */
    public function getCategory()
    {
        return $this->category;
    }

    /**
     * @param string $category
     */
    public function setCategory($category)
    {
        $this->category = $category;
    }

    /**
     * @return int
     */
    public function getIdAdmin()
    {
        return $this->idAdmin;
    }

    /**
     * @param int $idAdmin
     */
    public function setIdAdmin($idAdmin)
    {
        $this->idAdmin = $idAdmin;
    }
}
