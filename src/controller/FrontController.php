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
    public function menu()
    {
        $pizzas = $this->pizzaDAO->getPizzas();
        $elements = $this->otherDAO->getElements();
        $this->view->render('menu', [
            'pizzas' => $pizzas,
            'elements' => $elements
        ]);
    }

    // REGISTER
    public function register(Parameter $post)
    {
        if ($post->get('submit')) {
            $errors = $this->validation->validate($post, 'User');
            if ($this->userDAO->checkUser($post)) {
                $errors['username'] = $this->userDAO->checkUser($post);
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
            $user = $this->userDAO->login($post);
            if (!$user || !password_verify($post->get('password'), $user->getPassword())) {
                $this->session->setFlashMessage('error_login', 'Le nom d\'utilisateur ou le mot de passe sont incorrects');
                return $this->view->render('login', [
                    'post' => $post
                ]);
            } else if (!$user->getIsActive()) {
                $this->session->setFlashMessage('error_login', "Cet utilisateur n'est pas actif. Contactez le Webmaster.");
                return $this->view->render('login', [
                    'post' => $post
                ]);
            }
            $this->session->setFlashMessage('login', 'Vous êtes maintenant connecté');
            $this->session->set('user_id', $user->getId());
            $this->session->set('username', $user->getUsername());
            return header('Location: ../public/index.php');
        }
        return $this->view->render('login');
    }
}
