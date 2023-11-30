<?php

App::uses('AppController', 'Controller');
App::uses('User','Model');
App::uses('UserApiService', 'Service');

class UsersController extends AppController {
    public $name = 'Users';

    public function index() {
        $users = $this->User->find('all');

        if (empty($users)) {
            $userApiService = new UserApiService();
            $users = $userApiService->get_users();
            if (!empty($users)) {
                foreach ($users as $userData) {
                    try {
                        $user = $this->User->create($userData);
                        if ($this->User->save($user)) {
                            echo 'Users saved in Database';
                        } else throw new Exception(`User creating user: $user`);

                    } catch (\Throwable $th) {
                        echo 'Error creating a user: ' . print_r($th, true);
                    }
                }
            } else {
                echo 'Users retrieved from Database';
            }
        }
        $this->set('users', $users);
    }
}