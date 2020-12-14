<?php

namespace App\src\controller;

use App\config\Parameter;

class FrontController extends Controller
{
    public function home()
    {
        $this->view->render('home');
    }

    public function contact()
    {
        $this->view->render('contact');
    }

    public function takeAway()
    {
        $this->view->render('menu');
    }

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

    public function login(Parameter $post)
    {
        if ($post->get('submit')) {
            $result = $this->userDAO->login($post);
            if ($result && $result['isPasswordValid']) {
                $this->session->setFlashMessage('login', 'Vous êtes maintenant connecté');
                $this->session->set('user_id', $result['result']['userId']);
                $this->session->set('role', $result['result']['name']);
                $this->session->set('username', $post->get('username'));
                return header('Location: ../public/index.php');
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
