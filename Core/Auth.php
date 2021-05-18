<?php

namespace Core;

use App\Models\User;
use Aura\Session\SessionFactory;
use function Symfony\Component\Translation\t;

class Auth
{

    public \Aura\Session\Segment $segment;
    private static Auth $instance;

    public static function getInstance(): Auth
    {
        if (!isset(self::$instance)){
            self::$instance = new Auth();
        }
        return self::$instance;
    }

    public function __construct()
    {
        $session_factory = new SessionFactory();
        $session = $session_factory->newInstance($_COOKIE);
        $this->segment = $session->getSegment('Structure\Auth');
    }

    public function login($data): bool
    {
        $user = User::where('name', $data['username'])
            ->where('password', md5($data['password']))
            ->first();
        if ($user){
            $this->create($user);
            return $user;
        }

        return false;
    }

    public function exist($username)
    {
        return User::where('username', $username)->first();
    }

    public function create($data)
    {
        $this->segment->set('login', true);
        $this->segment->set('name', $data->username);
        $this->segment->set('id', $data->id);
    }

    public function register($data): bool
    {
        $data['password'] = md5($data['password']);
        $user = User::create($data);
        if ($user){
            $this->create($user);
            return true;
        }
        return false;
    }

    public function logout()
    {
        $this->segment->clear();
    }

    public function isLoggedIn()
    {
        return $this->segment->get('login');
    }

    public function getId()
    {
        return $this->segment->get('id');
    }

    public function getName()
    {
        return $this->segment->get('name');
    }

    public function guard(): static
    {
        return $this;
    }

    public function check()
    {
        return $this->segment->get('login');
    }

    public function guest(): bool
    {
        return !$this->segment->get('login');
    }

}