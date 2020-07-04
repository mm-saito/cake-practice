<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Stock Model
 *
 * @method \App\Model\Entity\Stock get($primaryKey, $options = [])
 * @method \App\Model\Entity\Stock newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Stock[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Stock|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Stock saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Stock patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Stock[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Stock findOrCreate($search, callable $callback = null, $options = [])
 */
class StockTable extends Table
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

        $this->setTable('stock');
        $this->setDisplayField('stock_id');
        $this->setPrimaryKey('stock_id');

        //日付自動更新
        $this->addBehavior('Timestamp', [
            'events' => [
                'Model.beforeSave' => [
                'create_date' => 'new',
                'update_date' => 'existing'
                ]
            ]
        ]);

        //1:多の関係を追加　
        $this->hasMany('Order');
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
            ->integer('stock_id')
            ->allowEmptyString('stock_id', 'create');

        $validator
            ->scalar('stock_name')
            ->maxLength('stock_name', 255)
            ->requirePresence('stock_name', 'create')
            ->allowEmptyString('stock_name', false)
            ->add('stock_name', 'unique', ['rule' => 'validateUnique', 'provider' => 'table']);

        $validator
            ->integer('quantity')
            ->requirePresence('quantity', 'create')
            ->allowEmptyString('quantity', false);

        $validator
            ->integer('price')
            ->requirePresence('price', 'create')
            ->allowEmptyString('price', false);

        $validator
            ->dateTime('create_date')
            ->allowEmptyDateTime('create_date');

        $validator
            ->dateTime('update_date')
            ->allowEmptyDateTime('update_date');

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
        $rules->add($rules->isUnique(['stock_name']));

        return $rules;
    }
}
