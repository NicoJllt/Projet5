<?php

namespace App\src\controller;

use App\config\Parameter;

class BackController extends Controller
{
    // Vérification connexion session
    private function checkLoggedIn()
    {
        if (!$this->session->get('username')) {
            $this->session->setFlashMessage('need_login', 'Vous devez vous connecter pour accéder à cette section');
            header('Location: ../public/index.php?route=login');
            return false;
        } else {
            return true;
        }
    }

    // Vérification Admin
    // private function checkAdmin()
    // {
    //     if ($this->checkLoggedIn() && !($this->session->get('role') === 'admin')) {
    //         $this->session->setFlashMessage('not_admin', 'Vous n\'êtes pas autorisé à accéder à cette page');
    //         header('Location: ../public/index.php?route=home');
    //         return false;
    //     } else {
    //         return true;
    //     }
    // }

    // PAGE ADMINISTRATION
    public function administration()
    {
        if ($this->checkLoggedIn()) {
            $pizzas = $this->pizzaDAO->getPizzas();
            // $elements = $this->otherDAO->getElements();
            // $parameters = $this->settingDAO->getParameters();
            $users = $this->userDAO->getUsers();

            return $this->view->render('administration', [
                'pizzas' => $pizzas,
                // 'elements' => $elements,
                // 'paramaters' => $parameters,
                'users' => $users
            ]);
        }
    }

    // MENU
    public function addElement(Parameter $post)
    {
        if ($this->checkLoggedIn()) {
            if ($post->get('submit')) {
                $errors = $this->validation->validate($post, 'Other');
                if (!$errors) {
                    $this->otherDAO->addElement($post, $this->session->get('user_id'));
                    $this->session->setFlashMessage('add_element', 'L\'élément a bien été ajouté');
                    return header('Location: ../public/index.php?route=administration');
                }
                return $this->view->render('add_element', [
                    'post' => $post,
                    'errors' => $errors
                ]);
            }
            return $this->view->render('add_element');
        }
    }

    // MODIFIER ELEMENT
    public function editElement(Parameter $post, $elementId)
    {
        if ($this->checkLoggedIn()) {
            if ($post->get('submit')) {
                $errors = $this->validation->validate($post, 'Other');
                if (!$errors) {
                    $this->otherDAO->editElement($post, $elementId, $this->session->get('user_id'));
                    $this->session->setFlashMessage('edit_element', 'L\'élément a bien été mis à jour');
                    return header('Location: ../public/index.php?route=administration');
                }
                return $this->view->render('edit_element', [
                    'post' => $post,
                    'errors' => $errors
                ]);
            }
            $element = $this->otherDAO->getElement($elementId);
            $post->set('elementId', $element->getElementId());
            $post->set('name', $element->getName());
            $post->set('description', $element->getDescription());
            $post->set('smallPrice', $element->getSmallPrice());
            $post->set('bigPrice', $element->getBigPrice());
            $this->view->render('edit_episode', [
                'post' => $post
            ]);
        }
    }

    // SUPPRIMER ELEMENT
    public function deleteElement($elementId)
    {
        if ($this->checkLoggedIn()) {
            $this->otherDAO->deleteElement($elementId);
            $this->session->setFlashMessage('delete_element', 'L\'élément a bien été supprimé');
            return header('Location: ../public/index.php?route=administration');
        }
    }

    // AJOUTER ELEMENT PAGE CONTACT
    public function addSetting(Parameter $post)
    {
        if ($this->checkLoggedIn()) {
            if ($post->get('submit')) {
                $errors = $this->validation->validate($post, 'Setting');
                if (!$errors) {
                    $this->settingDAO->addSetting($post, $this->session->get('user_id'));
                    $this->session->setFlashMessage('add_element', 'L\'élément a bien été ajouté');
                    return header('Location: ../public/index.php?route=administration');
                }
                return $this->view->render('add_setting', [
                    'post' => $post,
                    'errors' => $errors
                ]);
            }
            return $this->view->render('add_setting');
        }
    }

    // MODIFIER ELEMENT PAGE CONTACT
    public function editSetting(Parameter $post, $settingId)
    {
        if ($this->checkLoggedIn()) {
            if ($post->get('submit')) {
                $errors = $this->validation->validate($post, 'Setting');
                if (!$errors) {
                    $this->settingDAO->editSetting($post, $settingId, $this->session->get('user_id'));
                    $this->session->setFlashMessage('edit_element', 'L\'élément a bien été mis à jour');
                    return header('Location: ../public/index.php?route=administration');
                }
                return $this->view->render('edit_setting', [
                    'post' => $post,
                    'errors' => $errors
                ]);
            }
            $setting = $this->settingDAO->getSetting($settingId);
            $post->set('settingId', $setting->getSettingId());
            $post->set('phone', $setting->getPhone());
            $post->set('mail', $setting->getMail());
            $post->set('info', $setting->getInfo());
            $post->set('internet', $setting->getInternet());
            $this->view->render('edit_setting', [
                'post' => $post
            ]);
        }
    }

    // SUPPRIMER ELEMENT PAGE CONTACT
    public function deleteSetting($settingId)
    {
        if ($this->checkLoggedIn()) {
            $this->settingDAO->deleteSetting($settingId);
            $this->session->setFlashMessage('delete_element', 'L\'élément a bien été supprimé');
            return header('Location: ../public/index.php?route=administration');
        }
    }

    // LOGIN - PASSWORD
    public function updatePassword(Parameter $post)
    {
        if ($this->checkLoggedIn()) {
            if ($post->get('submit')) {
                $errors = $this->validation->validate($post, 'User');
                if (!$errors) {
                    $this->userDAO->updatePassword($post, $this->session->get('username'));
                    $this->session->setFlashMessage('update_password', 'Le mot de passe a été mis à jour');
                    return header('Location: ../public/index.php?route=profile');
                }
                $this->session->setFlashMessage('update_password_failed', 'Le mot de passe doit contenir au minimum 8 caractères');
                return $this->view->render('update_password', [
                    'post' => $post,
                    'errors' => $errors
                ]);
            }
            return $this->view->render('update_password');
        }
    }

    public function logout()
    {
        if ($this->checkLoggedIn()) {
            $this->logoutOrDelete('logout');
        }
    }
    // Suppression d'un compte par un Admin
    public function deleteAccount()
    {
        if ($this->session->get('role') === 'admin') {
            $this->session->setFlashMessage('no_delete_account', 'Vous n\'êtes pas autorisé à supprimer un compte administrateur.');
            return header('Location: ../public/index.php?route=profile');
        }
        if ($this->checkLoggedIn()) {
            $this->userDAO->deleteAccount($this->session->get('username'));
            $this->logoutOrDelete('delete_account');
        }
    }

    // Suppression de son propre compte par un utilisateur
    public function deleteUser($userId)
    {
        if ($this->checkLoggedIn()) {
            $toDelete = $this->userDAO->getUser($userId);
            if ($toDelete->getRoleName() === 'admin') {
                $this->session->setFlashMessage('delete_user', 'Vous n\'êtes pas autorisé à supprimer un administrateur.');
                return header('Location: ../public/index.php?route=administration');
            }
            $this->userDAO->deleteUser($userId);
            $this->session->setFlashMessage('delete_user', 'L\'utilisateur a bien été supprimé.');
            header('Location: ../public/index.php?route=administration');
        }
    }
    // Déconnexion et/ou suppression de compte
    private function logoutOrDelete($param)
    {
        $this->session->stop();
        $this->session->start();
        if ($param === 'logout') {
            $this->session->setFlashMessage($param, 'Vous êtes maintenant déconnecté');
        } else {
            $this->session->setFlashMessage($param, 'Votre compte a bien été supprimé');
        }
        return header('Location: ../public/index.php');
    }
}
