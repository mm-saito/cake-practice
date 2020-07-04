<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Order Model
 *
 * @property \App\Model\Table\StockTable|\Cake\ORM\Association\BelongsTo $Stock
 *
 * @method \App\Model\Entity\Order get($primaryKey, $options = [])
 * @method \App\Model\Entity\Order newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Order[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Order|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Order saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Order patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Order[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Order findOrCreate($search, callable $callback = null, $options = [])
 */
class OrderTable extends Table
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

        $this->setTable('order');
        $this->setDisplayField('order_id');
        $this->setPrimaryKey('order_id');

        //日付自動更新
        $this->addBehavior('Timestamp', [
            'events' => [
                'Model.beforeSave' => [
                'create_date' => 'new',
                'update_date' => 'existing'
                ]
            ]
        ]);

        $this->belongsTo('Stock', [
            'foreignKey' => 'stock_id',
            'joinType' => 'INNER'
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
            ->integer('order_id')
            ->allowEmptyString('order_id', 'create');

        $validator
            ->integer('quantity')
            ->requirePresence('quantity', 'create')
            ->allowEmptyString('quantity', false);

        $validator
            ->integer('price')
            ->requirePresence('price', 'create')
            ->allowEmptyString('price', false);

        $validator
            ->scalar('status')
            ->maxLength('status', 1)
            ->requirePresence('status', 'create')
            ->allowEmptyString('status', false);

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
        $rules->add($rules->existsIn(['stock_id'], 'Stock'));

        return $rules;
    }
}
