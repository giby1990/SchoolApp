<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Transferdata Model
 *
 * @property \App\Model\Table\LearnersTable&\Cake\ORM\Association\BelongsTo $Learners
 * @property \App\Model\Table\FromSchoolsTable&\Cake\ORM\Association\BelongsTo $FromSchools
 * @property \App\Model\Table\ToSchoolsTable&\Cake\ORM\Association\BelongsTo $ToSchools
 *
 * @method \App\Model\Entity\Transferdata get($primaryKey, $options = [])
 * @method \App\Model\Entity\Transferdata newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Transferdata[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Transferdata|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Transferdata saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Transferdata patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Transferdata[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Transferdata findOrCreate($search, callable $callback = null, $options = [])
 */
class TransferdataTable extends Table
{
    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        parent::initialize($config);

        $this->setTable('transferdata');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('Learners', [
            'foreignKey' => 'learner_id',
            'joinType' => 'INNER',
        ]);
        
        $this->belongsTo('FromSchools', [
            'className' => 'Schools',
            'foreignKey' => 'from_school_id',
            'joinType' => 'INNER',
            'condition' => 'id = from_school_id',
        ]);

        $this->belongsTo('ToSchools', [
                'className' => 'Schools',
                'foreignKey' => 'to_school_id',
                'joinType' => 'INNER',
                'condition' => 'id = to_school_id',
        ]);
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator)
    {
        $validator
            ->integer('id')
            ->allowEmptyString('id', null, 'create');

        $validator
            ->dateTime('transfertime')
            ->requirePresence('transfertime', 'create')
            ->notEmptyDateTime('transfertime');

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules)
    {
        $rules->add($rules->existsIn(['learner_id'], 'Learners'));
        $rules->add($rules->existsIn(['from_school_id'], 'FromSchools'));
        $rules->add($rules->existsIn(['to_school_id'], 'ToSchools'));

        return $rules;
    }
}
