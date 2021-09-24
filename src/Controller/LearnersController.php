<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;

/**
 * Learners Controller
 *
 * @property \App\Model\Table\LearnersTable $Learners
 *
 * @method \App\Model\Entity\Learner[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class LearnersController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Schools'],
        ];
        $learners = $this->paginate($this->Learners);

        $this->set(compact('learners'));
    }

    /**
     * View method
     *
     * @param string|null $id Learner id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $learner = $this->Learners->get($id, [
            'contain' => ['Schools', 'Transferdata'],
        ]);

        $this->set('learner', $learner);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $learner = $this->Learners->newEntity();
        if ($this->request->is('post')) {
            $learner = $this->Learners->patchEntity($learner, $this->request->getData());
            if ($this->Learners->save($learner)) {
                $this->Flash->success(__('The learner has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The learner could not be saved. Please, try again.'));
        }
        $schools = $this->Learners->Schools->find('list',['keyField' => 'id',
        'valueField' => 'schoolname'],['limit' => 200]);
        $this->set(compact('learner', 'schools'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Learner id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $learner = $this->Learners->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $learner = $this->Learners->patchEntity($learner, $this->request->getData());
            if ($this->Learners->save($learner)) {
                if($this->request->getData('prev_school_id') != $this->request->getData('school_id')){
                    $transferTable = TableRegistry::getTableLocator()->get('Transferdata');
                    $transfer = $transferTable->newEntity();
                    $transfer->learner_id = $id;
                    $transfer->from_school_id = $this->request->getData('prev_school_id');
                    $transfer->to_school_id = $this->request->getData('school_id');
                    $transfer->transfertime = date('Y-m-d H:i:s');
                    $transferTable->save($transfer);
                }
                $this->Flash->success(__('The learner has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The learner could not be saved. Please, try again.'));
        }
        $schools = $this->Learners->Schools->find('list',['keyField' => 'id',
        'valueField' => 'schoolname'],['limit' => 200]);
        $this->set(compact('learner', 'schools'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Learner id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $learner = $this->Learners->get($id);
        if ($this->Learners->delete($learner)) {
            $this->Flash->success(__('The learner has been deleted.'));
        } else {
            $this->Flash->error(__('The learner could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
