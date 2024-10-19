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
        $data['users'] = $this->get_users();
        $json = json_encode($data);
        if(json_last_error() !== JSON_ERROR_NONE)
        {
            log_message('debug', 'Json encode error: '.json_last_error_msg());
        }
        return $json;
    }
    private function get_users()
    {
        $user = new User();
        $users = $user->findAll();
        log_message('debug', 'User count: '.count($users));
        return $users;
    }
}
