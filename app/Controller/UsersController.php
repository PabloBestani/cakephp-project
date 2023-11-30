<?php

App::uses('AppController', 'Controller');
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
                    $user = $this->User->newEntity($userData);
                    if (!$this->User->save($user)) {
                        echo 'Error saving a user: ' . print_r($user->getErrors(), true);
                    }
                }
            }
        }
        $this->set('users', $users);
    }
}