<?php

namespace App\Controllers;
use App\Models\User;


class Home extends BaseController
{
    public function index(): string
    {
        return view('welcome_message');
    }

    public function about(): string
    {
        log_message('debug', 'Ali');
        return 'About';
    }
    public function users()
    {
        $user = New User();
        $users = $this->get_users();
        $response = service('response');
        $response->setContentType('application/json');
        $response->setHeader('X-Total-Count', count($users));
        $response->setBody(json_encode(['users'=>$users]));
        return $response;
    }
    private function get_users()
    {
        $user = new User();
        $users = $user->findAll();
        log_message('debug', 'User count: '.count($users));
        return $users;
    }
}
