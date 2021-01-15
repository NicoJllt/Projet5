<?php

namespace App\src\controller;

use App\config\Parameter;

class FrontController extends Controller
{

    // ACCUEIL
    public function home()
    {
        $this->view->render('home');
    }

    // CONTACT
    public function contact()
    {
        $this->view->render('contact');
    }

    // MENU
    public function takeAway()
    {
        $pizzas = $this->menuDAO->getPizzas();
        $elements = $this->menuDAO->getElements();
        $this->view->render('menu', [
            'pizzas' => $pizzas,
            'elements' => $elements
        ]);
    }

    // BOUTON ADMIN 
    public function admin()
    {
        $this->view->render('login');
    }

    // REGISTER
    public function register(Parameter $post)
    {
        if ($post->get('submit')) {
            $errors = $this->validation->validate($post, 'User');
            if ($this->userDAO->checkUser($post)) {
                $errors['username'] = $this->userDAO->checkUser($post);
            }
            if ($this->userDAO->checkMail($post)) {
                $errors['mail'] = $this->userDAO->checkMail($post);
            }
            if (!$errors) {
                $this->userDAO->register($post);
                $this->session->setFlashMessage('register', 'Votre inscription a bien été effectuée');
                return header('Location: ../public/index.php');
            }
            return $this->view->render('register', [
                'post' => $post,
                'errors' => $errors
            ]);
        }
        return $this->view->render('register');
    }

    // LOGIN
    public function login(Parameter $post)
    {
        if ($post->get('submit')) {
            $result = $this->userDAO->login($post);
            if ($result && $result['isPasswordValid']) {
                $this->session->setFlashMessage('login', 'Vous êtes maintenant connecté');
                $this->session->set('user_id', $result['result']['id']);
                $this->session->set('username', $post->get('username'));
                return header('Location: ../public/index.php?route=home');
            } else {
                $this->session->setFlashMessage('error_login', 'Le nom d\'utilisateur ou le mot de passe sont incorrects');
                return $this->view->render('login', [
                    'post' => $post
                ]);
            }
        }
        return $this->view->render('login');
    }
}
