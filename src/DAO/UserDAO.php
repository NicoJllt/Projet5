<?php

namespace App\src\DAO;

use App\config\Parameter;
use App\src\model\User;

class UserDAO extends DAO
{
    // Création d'un objet modèle sur la base des données reçues de la BDD
    // On aurait pu utiliser un constructeur avec paramètre dans le modèle
    private function buildObject($row)
    {
        $user = new User();
        $user->setId($row['id']);
        $user->setUsername($row['username']);
        $user->setPassword($row['password']);
        $user->setRegistrationDate($row['registrationDate']);
        $user->setIsActive($row['isActive']);
        return $user;
    }

    public function getUsers()
    {
        $sql = 'SELECT * FROM user ORDER BY id ASC';
        $result = $this->createQuery($sql);
        $users = [];
        foreach ($result as $row) {
            $id = $row['id'];
            $users[$id] = $this->buildObject($row);
        }
        $result->closeCursor();
        return $users;
    }

    public function getUser($id)
    {
        $sql = 'SELECT * FROM user WHERE id=:id';
        $result = $this->createQuery($sql, ['id' => $id]);
        $user = $this->buildObject($result->fetch());
        $result->closeCursor();
        return $user;
    }

    public function login(Parameter $post)
    {
        $sql = 'SELECT * FROM user WHERE username = ?';
        $data = $this->createQuery($sql, [$post->get('username')]);
        $user = $this->buildObject($data->fetch());
        $data->closeCursor();
        return $user;
    }

    public function register(Parameter $post)
    {
        $this->checkUser($post);
        $sql = 'INSERT INTO user (username, password, registrationDate, isActive) VALUES (?, ?, NOW(), 0)';
        $this->createQuery($sql, [$post->get('username'), password_hash($post->get('password'), PASSWORD_BCRYPT)]);
    }

    public function checkUser(Parameter $post)
    {
        $sql = 'SELECT COUNT(username) FROM user WHERE username = ?';
        $result = $this->createQuery($sql, [$post->get('username')]);
        $isUnique = $result->fetchColumn();
        if ($isUnique) {
            return '<p>Le nom d\'utilisateur existe déjà</p>';
        }
    }

    public function updatePassword(Parameter $post, $username)
    {
        $sql = 'UPDATE user SET password = ? WHERE username = ?';
        $this->createQuery($sql, [password_hash($post->get('password'), PASSWORD_BCRYPT), $username]);
    }

    public function deleteAccount($username)
    {
        $sql = 'DELETE FROM user WHERE username = ?';
        $this->createQuery($sql, [$username]);
    }

    public function deleteUser($id)
    {
        $sql = 'DELETE FROM user WHERE id = ?';
        $this->createQuery($sql, [$id]);
    }
}
