<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Learners Model
 *
 * @property \App\Model\Table\SchoolsTable&\Cake\ORM\Association\BelongsTo $Schools
 * @property \App\Model\Table\TransferdataTable&\Cake\ORM\Association\HasMany $Transferdata
 *
 * @method \App\Model\Entity\Learner get($primaryKey, $options = [])
 * @method \App\Model\Entity\Learner newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Learner[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Learner|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Learner saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Learner patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Learner[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Learner findOrCreate($search, callable $callback = null, $options = [])
 */
class LearnersTable extends Table
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

        $this->setTable('learners');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('Schools', [
            'foreignKey' => 'school_id',
            'joinType' => 'INNER',
        ]);
        $this->hasMany('Transferdata', [
            'foreignKey' => 'learner_id',
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
            ->scalar('firstname')
            ->maxLength('firstname', 25)
            ->requirePresence('firstname', 'create')
            ->notEmptyString('firstname');

        $validator
            ->scalar('lastname')
            ->maxLength('lastname', 25)
            ->requirePresence('lastname', 'create')
            ->notEmptyString('lastname');

        $validator
            ->integer('idnumber')
            ->requirePresence('idnumber', 'create')
            ->notEmptyString('idnumber')
            ->add('idnumber', 'unique', ['rule' => 'validateUnique', 'provider' => 'table']);

        $validator
            ->date('dateofbirth')
            ->requirePresence('dateofbirth', 'create')
            ->notEmptyDate('dateofbirth');

        $validator
            ->scalar('homeaddress')
            ->requirePresence('homeaddress', 'create')
            ->notEmptyString('homeaddress');

        $validator
            ->email('email')
            ->requirePresence('email', 'create')
            ->notEmptyString('email');

        $validator
            ->integer('phone')
            ->requirePresence('phone', 'create')
            ->notEmptyString('phone');

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
        $rules->add($rules->isUnique(['email']));
        $rules->add($rules->isUnique(['idnumber']));
        $rules->add($rules->existsIn(['school_id'], 'Schools'));

        return $rules;
    }
}
