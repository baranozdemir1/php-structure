<?php

namespace App\Controllers;

use Core\Controller;
use Symfony\Component\HttpFoundation\Request;
use function Symfony\Component\Translation\t;

class Auth extends Controller
{

    public function login(Request $request): string
    {
        if ($request->isMethod('POST')){
            $this->validator->rule('required', ['username', 'password']);
            if ($this->validator->validate()){
                $user = auth()->login($this->validator->data());

                if ($user){
                    header('Location:http://localhost:8888/structure');
                    exit();
                } else {
                    $this->validator->error('error', 'Kullanıcı adı veya şifreniz hatalıdır.');
                }
            }
        }

        return $this->view('auth.login');
    }

    public function register(Request $request): string
    {
        if ($request->isMethod('POST')){
            $this->validator->rule('required', ['username', 'password']);
            if ($this->validator->validate()){

                $data = $this->validator->data();
                if (auth()->exist($data['username'])){
                    $this->validator->error('error', sprintf('%s adında kullanıcı adı bulunuyor. Lütfen farklı bir kullanıcı adı belirleyin.', $data['username']));
                } else {
                    $user = auth()->register($data);
                    if ($user){
                        header('Location:http://localhost:8888/structure');
                        exit();
                    } else {
                        $this->validator->error('error', 'Bir sorun var.');
                    }
                }

            }
        }

        return $this->view('auth.register');
    }

    public function logout()
    {
        auth()->logout();
        header('Location:http://localhost:8888/structure');

    }

}