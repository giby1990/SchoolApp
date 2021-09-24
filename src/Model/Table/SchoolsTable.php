<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Schools Model
 *
 * @property \App\Model\Table\LearnersTable&\Cake\ORM\Association\HasMany $Learners
 *
 * @method \App\Model\Entity\School get($primaryKey, $options = [])
 * @method \App\Model\Entity\School newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\School[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\School|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\School saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\School patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\School[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\School findOrCreate($search, callable $callback = null, $options = [])
 */
class SchoolsTable extends Table
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

        $this->setTable('schools');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->hasMany('Learners', [
            'foreignKey' => 'school_id',
        ]);

        $this->hasMany('Transferdata', [
            'foreignKey' => 'from_school_id',
        ]);

        $this->hasMany('Transferdata', [
            'foreignKey' => 'to_school_id',
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
            ->scalar('schoolname')
            ->maxLength('schoolname', 25)
            ->requirePresence('schoolname', 'create')
            ->notEmptyString('schoolname');

        $validator
            ->scalar('province')
            ->maxLength('province', 25)
            ->requirePresence('province', 'create')
            ->notEmptyString('province');

        $validator
            ->scalar('area')
            ->maxLength('area', 25)
            ->requirePresence('area', 'create')
            ->notEmptyString('area');

        return $validator;
    }
}
