<?php

declare(strict_types=1);

namespace App\Controller;

/**
 * Services Controller
 *
 * @property \App\Model\Table\ServicesTable $Services
 */
class ServicesController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $query = $this->Services->find();
        $services = $this->paginate($query);

        $this->set(compact('services'));
    }

    /**
     * View method
     *
     * @param string|null $id Service id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $service = $this->Services->get($id, contain: ['Transactions']);
        $this->set(compact('service'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $service = $this->Services->newEmptyEntity();
        if ($this->request->is('post')) {
            $data = $this->request->getData();

            // Handle image upload

            // debug($this->request->getData('image'));


            $image = $data['image'];
            if ($image && !$image->getError()) {
                $filename = time() . '_' . $image->getClientFilename();
                $targetPath = WWW_ROOT . 'img/services/' . $filename;

                // Simpan file ke direktori
                $image->moveTo($targetPath);

                // Simpan nama file ke dalam data
                $data['image'] = 'services/' . $filename;
            } else {
                // Jika tidak upload file
                unset($data['image']);
            }

            $service = $this->Services->patchEntity($service, $data);
            if ($this->Services->save($service)) {
                $this->Flash->success(__('The service has been saved.'));
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The service could not be saved. Please, try again.'));
        }
        $this->set(compact('service'));
    }


    /**
     * Edit method
     *
     * @param string|null $id Service id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $service = $this->Services->get($id, contain: []);

        if ($this->request->is(['patch', 'post', 'put'])) {
            $data = $this->request->getData();
            $image = $data['image'];

            if ($image instanceof \Laminas\Diactoros\UploadedFile && $image->getError() === UPLOAD_ERR_OK) {
                // Hapus file lama
                if (!empty($service->image)) {
                    $oldImagePath = WWW_ROOT . $service->image;
                    if (file_exists($oldImagePath)) {
                        unlink($oldImagePath);
                    }
                }

                $filename = time() . '_' . $image->getClientFilename();
                $targetPath = WWW_ROOT . 'img/services/' . $filename;
                $image->moveTo($targetPath);
                $data['image'] = 'services/' . $filename;
            } else {
                unset($data['image']);
            }

            $service = $this->Services->patchEntity($service, $data);
            if ($this->Services->save($service)) {
                $this->Flash->success(__('The service has been saved.'));
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The service could not be saved. Please, try again.'));
        }
        $this->set(compact('service'));
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
    }

    /**
     * Delete method
     *
     * @param string|null $id Service id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $service = $this->Services->get($id);
        if ($this->Services->delete($service)) {
            $this->Flash->success(__('The service has been deleted.'));
        } else {
            $this->Flash->error(__('The service could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
