<?php

namespace App\src\model;

// Eléments qui se chargent des échanges avec la base de données
class Setting
{
    /**
     * @var int
     */
    private $settingId;

    /**
     * @var string
     */
    private $content;

    /**
     * @return int
     */
    public function getSettingId()
    {
        return $this->settingId;
    }

    /**
     * @param int $settingId
     */
    public function setSettingId($settingId)
    {
        $this->settingId = $settingId;
    }

    /**
     * @return string
     */
    public function getContent()
    {
        return $this->content;
    }

    /**
     * @param string $content
     */
    public function setContent($content)
    {
        $this->content = $content;
    }
}
