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

    // PAGE ADMINISTRATION
    public function administration()
    {
        if ($this->checkLoggedIn()) {
            $pizzas = $this->pizzaDAO->getPizzas();
            $elements = $this->otherDAO->getElements();
            $users = $this->userDAO->getUsers();

            return $this->view->render('administration', [
                'pizzas' => $pizzas,
                'elements' => $elements,
                'users' => $users
            ]);
        }
    }

    // PAGE MENU - AJOUTER PIZZA
    public function addPizza(Parameter $post)
    {
        if ($this->checkLoggedIn()) {
            if ($post->get('submit')) {
                $errors = $this->validation->validate($post, 'Menu');
                if (!$errors) {
                    $this->pizzaDAO->addPizza($post, $this->session->get('user_id'));
                    $this->session->setFlashMessage('add_pizza', 'La pizza a bien été ajoutée');
                    return header('Location: ../public/index.php?route=administration');
                }
                return $this->view->render('add_pizza', [
                    'post' => $post,
                    'errors' => $errors
                ]);
            }
            return $this->view->render('add_pizza');
        }
    }

    // PAGE MENU - MODIFIER PIZZA
    public function editPizza(Parameter $post, $id)
    {
        if ($this->checkLoggedIn()) {
            if ($post->get('submit')) {
                $errors = $this->validation->validate($post, 'Menu');
                if (!$errors) {
                    $this->pizzaDAO->editPizza($post, $id, $this->session->get('user_id'));
                    $this->session->setFlashMessage('edit_pizza', 'La pizza a bien été mise à jour');
                    return header('Location: ../public/index.php?route=administration');
                }
                return $this->view->render('edit_pizza', [
                    'post' => $post,
                    'errors' => $errors
                ]);
            }
            $pizza = $this->pizzaDAO->getPizza($id);
            $post->set('id', $pizza->getId());
            $post->set('name', $pizza->getName());
            $post->set('description', $pizza->getDescription());
            $post->set('priceSmall', $pizza->getPriceSmall());
            $post->set('priceBig', $pizza->getPriceBig());
            $this->view->render('edit_pizza', [
                'post' => $post
            ]);
        }
    }

    // PAGE MENU - SUPPRIMER PIZZA
    public function deletePizza($id)
    {
        if ($this->checkLoggedIn()) {
            $this->pizzaDAO->deletePizza($id);
            $this->session->setFlashMessage('delete_pizza', 'La pizza a bien été supprimée');
            return header('Location: ../public/index.php?route=administration');
        }
    }

    // PAGE MENU - AUTRES
    // PAGE MENU - AJOUTER ELEMENT
    public function addElement(Parameter $post)
    {
        if ($this->checkLoggedIn()) {
            if ($post->get('submit')) {
                $errors = $this->validation->validate($post, 'Menu');
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

    // PAGE MENU - MODIFIER ELEMENT
    public function editElement(Parameter $post, $id)
    {
        if ($this->checkLoggedIn()) {
            if ($post->get('submit')) {
                $errors = $this->validation->validate($post, 'Menu');
                if (!$errors) {
                    $this->otherDAO->editElement($post, $id, $this->session->get('user_id'));
                    $this->session->setFlashMessage('edit_element', 'L\'élément a bien été mis à jour');
                    return header('Location: ../public/index.php?route=administration');
                }
                return $this->view->render('edit_element', [
                    'post' => $post,
                    'errors' => $errors
                ]);
            }
            $element = $this->otherDAO->getElement($id);
            $post->set('id', $element->getId());
            $post->set('description', $element->getDescription());
            $post->set('price', $element->getPrice());
            $post->set('category', $element->getCategory());
            $this->view->render('edit_element', [
                'post' => $post
            ]);
        }
    }

    // PAGE MENU - SUPPRIMER ELEMENT
    public function deleteElement($id)
    {
        if ($this->checkLoggedIn()) {
            $this->otherDAO->deleteElement($id);
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
                    return header('Location: ../public/index.php?route=administration');
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
    public function deleteUser($id)
    {
        if ($this->checkLoggedIn()) {
            $this->userDAO->deleteUser($id);
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
