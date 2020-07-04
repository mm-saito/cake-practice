<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Groups Model
 *
 * @method \App\Model\Entity\Group get($primaryKey, $options = [])
 * @method \App\Model\Entity\Group newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Group[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Group|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Group saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Group patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Group[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Group findOrCreate($search, callable $callback = null, $options = [])
 */
class GroupsTable extends Table
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

        $this->setTable('groups');
        $this->setDisplayField('group_id');
        $this->setPrimaryKey('group_id');

        //日付自動更新
        $this->addBehavior('Timestamp', [
            'events' => [
                'Model.beforeSave' => [
                'create_date' => 'new',
                'update_date' => 'existing'
                ]
            ]
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
            ->integer('group_id')
            ->allowEmptyString('group_id', 'create');

        $validator
            ->scalar('group_name')
            ->maxLength('group_name', 100)
            ->requirePresence('group_name', 'create')
            ->allowEmptyString('group_name', false);

        $validator
            ->dateTime('create_date')
            ->allowEmptyDateTime('create_date');

        $validator
            ->dateTime('update_date')
            ->allowEmptyDateTime('update_date');

        return $validator;
    }
}
