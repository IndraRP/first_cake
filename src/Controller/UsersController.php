<?php

declare(strict_types=1);

namespace App\Controller;

use App\Controller\AppController;
use Cake\Http\Exception\NotFoundException;

class UsersController extends AppController
{
    public function index()
    {
        $query = $this->Users->find();
        $users = $this->paginate($query);

        $this->set(compact('users'));
    }

    public function add()
    {
        $user = $this->Users->newEmptyEntity();
        if ($this->request->is('post')) {
            $user = $this->Users->patchEntity($user, $this->request->getData());
            if ($this->Users->save($user)) {
                $this->Flash->success(__('The user has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The user could not be saved. Please, try again.'));
        }
        $this->set(compact('user'));
    }

    public function view($id = null)
    {
        if (!$id || !is_numeric($id)) {
            throw new NotFoundException(__('Invalid user ID'));
        }
        $user = $this->Users->get($id);
        $this->set(compact('user'));
    }

    public function edit($id = null)
    {
        if (!$id || !is_numeric($id)) {
            throw new NotFoundException(__('Invalid user ID'));
        }
        $user = $this->Users->get($id);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $user = $this->Users->patchEntity($user, $this->request->getData());
            if ($this->Users->save($user)) {
                $this->Flash->success(__('The user has been updated.'));
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The user could not be updated. Please, try again.'));
        }
        $this->set(compact('user'));
    }

    public function delete($id = null)
    {
        if (!$id || !is_numeric($id)) {
            throw new NotFoundException(__('Invalid user ID'));
        }
        $this->request->allowMethod(['post', 'delete']);
        $user = $this->Users->get($id);
        if ($this->Users->delete($user)) {
            $this->Flash->success(__('The user has been deleted.'));
        } else {
            $this->Flash->error(__('The user could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }

    public function initialize(): void
    {
        parent::initialize();
        // Pastikan Authentication component dimuat di sini
        $this->loadComponent('Authentication.Authentication');
    }

    public function beforeFilter(\Cake\Event\EventInterface $event)
    {
        parent::beforeFilter($event);
        // Mengizinkan akses ke actions login dan add tanpa autentikasi
        $this->Authentication->addUnauthenticatedActions(['login', 'add']);
    }

    public function login()
    {
        $this->request->allowMethod(['get', 'post']);
        $result = $this->Authentication->getResult();

        // Jika user sudah login, redirect
        if ($result && $result->isValid()) {
            $redirect = $this->request->getQuery('redirect', [
                'controller' => 'Hello',
                'action' => 'hello',
            ]);

            return $this->redirect($redirect);
        }

        // Jika form login disubmit dan autentikasi gagal
        if ($this->request->is('post') && !$result->isValid()) {
            $this->Flash->error(__('Email atau password salah.'));
        }
    }

    // public function logout()
    // {
    //     $result = $this->Authentication->getResult();
    //     if ($result->isValid()) {
    //         $this->Authentication->logout();
    //         return $this->redirect(['controller' => 'Users', 'action' => 'login']);
    //     }
    // }
}
