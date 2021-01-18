<?php

namespace App\src\model;

// Eléments qui se chargent des échanges avec la base de données
class Pizza
{
    /**
     * @var int
     */
    private $id;

    /**
     * @var string
     */
    private $name;

    /**
     * @var string
     */
    private $description;

        /**
     * @var int
     */
    private $priceSmall;

        /**
     * @var int
     */
    private $priceBig;

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
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName($name)
    {
        $this->name = $name;
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
    public function getPriceSmall()
    {
        return $this->priceSmall;
    }

    /**
     * @param int $priceSmall
     */
    public function setPriceSmall($priceSmall)
    {
        $this->priceSmall = $priceSmall;
    }

            /**
     * @return int
     */
    public function getPriceBig()
    {
        return $this->priceBig;
    }

    /**
     * @param int $priceBig
     */
    public function setPriceBig($priceBig)
    {
        $this->priceBig = $priceBig;
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
