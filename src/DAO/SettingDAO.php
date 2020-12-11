<?php

namespace App\src\DAO;

use App\config\Parameter;
use App\src\model\Setting;

class SettingDAO extends DAO
{
    // Création d'un objet modèle sur la base des données reçues de la BDD
    // On aurait pu utiliser un constructeur avec paramètre dans le modèle
    private function buildObject($row)
    {
        $setting = new Setting();
        $setting->setSettingId($row['settingId']);
        $setting->setPhone($row['phone']);
        $setting->setMail($row['mail']);
        $setting->setInfo($row['info']);
        $setting->setInternet($row['internet']);
        return $setting;
    }

    public function getSetting($settingId)
    {
        $sql = 'SELECT setting.settingId, setting.content, user.username FROM setting 
        INNER JOIN user ON setting.idAdmin = user.userId
        WHERE setting.settingId = ?';
        $result = $this->createQuery($sql, [$settingId]);
        $setting = $result->fetch();
        $result->closeCursor();
        return $this->buildObject($setting);
    }

    public function addSetting(Parameter $post, $idAdmin)
    {
        $sql = 'INSERT INTO setting (content, idAdmin) VALUES (?, ?)';
        $this->createQuery($sql, [$post->get('content'), $idAdmin]);
    }

    public function editSetting(Parameter $post, $settingId, $idAdmin)
    {
        $sql = 'UPDATE setting SET content=:content, idAdmin=:idAdmin WHERE settingId=:settingId';
        $this->createQuery($sql, [
            'content' => $post->get('content'),
            'idAdmin' => $idAdmin,
            'settingId' => $settingId
        ]);
    }

    public function deleteSetting($settingId)
    {
        $sql = 'DELETE FROM setting WHERE settingId = ?';
        $this->createQuery($sql, [$settingId]);
    }
}
