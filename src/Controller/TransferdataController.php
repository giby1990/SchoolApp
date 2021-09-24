<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Transferdata Controller
 *
 * @property \App\Model\Table\TransferdataTable $Transferdata
 *
 * @method \App\Model\Entity\Transferdata[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class TransferdataController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Learners', 'FromSchools','ToSchools'],
        ];

        $transferdata = $this->paginate($this->Transferdata);

        $this->set(compact('transferdata'));
    }

    
}
