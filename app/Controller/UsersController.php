<?php

App::uses('AppController', 'Controller');
App::uses('User','Model');
App::uses('UserApiService', 'Service');

class UsersController extends AppController {
    public $components = array('RecordDeletion', 'RecordCreation', 'RecordUpdate');
    public $name = 'Users';

    public function index() {
        $users = $this->User->find('all');
        if (!empty($users)) return $this->set('users', $users);

        $userApiService = new UserApiService();
        $users = $userApiService->get_users();
        if (!empty($users)) {
            foreach ($users as $userData) {
                try {
                    $user = $this->User->creat($userData);
                    if ($this->User->save($user)) {
                        echo 'Users saved inDatabase';
                    } else throw new Exceptio(`Error creating user: $user`);
                } catch (\Throwable $th) {
                    echo 'Error creating a user: ' .print_r($th, true);
                }
            }
        } else {
            echo 'Users retrieved from Database';
        }
        $this->set('users', $users);
    }

    public function delete($id) {
        $this->RecordDeletion->deleteRecord('User', $id);
        return $this->redirect(['action'=> 'index']);
    }

    public function add() {
        try {
            if (!$this->request->is('post')) {
                return;
            }
            $userData = [$this->request->data];
            $result = $this->RecordCreation->addRecord('User', $userData);
            if ($result) {
                $this->Flash->success('User created successfully');
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Flash->error($result);
            }
        } catch (\Throwable $th) {
            $this->log($th);
        }
    }

    public function update($id) {
        try {
            $user = $this->User->findById($id);
            if (!$user) {
                throw new Exception("No User found with id $id.");
            };
            $this->set('user', $user);   

            if (!$this->request->is('post')) {
                return;
            };

            $newData = $this->request->data;
            $result = $this->RecordUpdate->updateRecord('User', $user, $newData);

            if (!$result) return $this->Flash->error($result);
            $this->set('user', $result);
            $this->Flash->success('User updated successfully');
            $this->redirect(array('action' => 'index'));

        } catch (\Throwable $th) {
            $this->log($th);
        }
    }
}