<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Order Controller
 *
 * @property \App\Model\Table\OrderTable $Order
 *
 * @method \App\Model\Entity\Order[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class OrderController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Stock']
        ];
        $order = $this->paginate($this->Order);

        $this->set(compact('order'));
    }

    /**
     * View method
     *
     * @param string|null $id Order id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $order = $this->Order->get($id, [
            'contain' => ['Stock']
        ]);

        $this->set('order', $order);
    }

    /*
     * 在庫発注社員(staff)アクション
     */
    public function staff()
    {
        $order = $this->Order->newEntity();
        
        if ($this->request->is('post')) {

            $stock_id = $this->request->getData('stock_id');  //入力値：在庫ID
            $quantity = $this->request->getData('quantity');  //入力値：個数
            //発注中の在庫がある場合はエラー
            if ($this->setAction('checkOrder', $stock_id)) {
                
                //入力データを格納
                $order = $this->Order->patchEntity($order, $this->request->getData());
                
                //在庫テーブルから金額を取得
                $stock_price = $this->setAction('getPrice',$stock_id);

                // 在庫.金額 * 入力個数で計算 
                $order->price = $stock_price * $quantity;

                // 在庫状態を「1.発注確認」に設定
                $order->status = '1';

                if ($this->Order->save($order)) {
                    $this->Flash->success(__('発注完了しました。'));
                    return $this->redirect(['action' => 'staff']);
                }
                $this->Flash->error(__('発注に失敗しました。もう一度やり直してください'));
            }else {
                $this->redirect($this->request->referer());
                $this->Flash->error(__('既に発注済みの在庫です。'));
            }
        }
        //初期表示
        //在庫IDのプルダウンの表示名を在庫名で表示するため配列を作成
        $query = $this->Order->Stock->find('list',
                                           ['keyField' => 'stock_id','valueField' => 'stock_name'])
                                           ->order(['stock_id' => 'asc']); 
        $stock = $query->toArray();
        $this->set(compact('order', 'stock'));
    }

    /*
     * 在庫テーブルから金額を取得
     */
    public function getPrice($id = null)
    {
        //StcokをSELECT
        $stock = $this->Order->Stock->find()->
            select(['stock_id', 'price'])->where(['Stock.stock_id' => $id])->first();

        return $stock['price'];
    }

    /*
     * 発注中をチェックする
     */
    public function checkOrder($id = null)
    {   
        //OrderをSELECT
        $order = $this->Order->find()->
            select(['stock_id', 'status'])->where(['stock_id' => $id])->all();

            foreach($order as $val) {
                //在庫状態が「4.発注受け取り済み」以外があった時点でfalse
                if($val['status'] < 4) {
                    return false;
                }
            }
            return true;
    }

    /*
     * 在庫発注管理者(admin)アクション
     */
    public function admin()
    {
        $this->paginate = [
            'contain' => ['Stock'],
            'order' => [
                'order_id' => 'asc'
            ]
        ];
        //在庫状態＝「1.発注確認」 or 「3.発注済み」
        $query = $this->Order->find()->where(['status' => '1'])->orwhere(['status' => '3']);

        $order = $this->paginate($query);
        $this->set(compact('order'));
    }

    /*
     * 在庫発注管理者(admin)確認アクション
     */
    public function adminConfirm($id = null)
    {

        //現在の発注情報を取得
        $order = $this->Order->get($id);

        //在庫状態を判定し処理を分ける
        if($order->status === '1') {

            //更新差分データ
            $order_data['status'] = 2;  //「1.発注確認」→「2.発注状態

            //patchEntity(更新前データ, 差分データ)
            $order = $this->Order->patchEntity($order, $order_data);

            //発注テーブルの在庫状態を更新
            if ($this->Order->save($order)) {
                $this->Flash->success(__('在庫状態を更新しました。'));
                return $this->redirect(['action' => 'admin']);
            }
            $this->Flash->error(__('発注に失敗しました。もう一度やり直してください'));

        }else {

            //現在の在庫情報
            $stock = $this->Order->get($id, [
                'contain' => ['Stock']
            ]);
    
            //更新差分データを作成               
            $order_data['status'] = 4;  //「3.発注済み」→「4.発注受け取り済み」    
            $stock_data['quantity'] =  $stock->stock->quantity + $order->quantity;
            
    
            //patchEntity(更新前データ, 差分データ)
            $order = $this->Order->patchEntity($order, $order_data);
            $stock = $this->Order->patchEntity($stock, $stock_data);
    
            //在庫テーブルの個数、発注テーブルの在庫状態を更新
            if ($this->Order->save($order) && $this->Order->Stock->save($stock)) {
                $this->Flash->success(__('在庫状態・在庫個数を更新しました。'));
                return $this->redirect(['action' => 'admin']);
            }
            $this->Flash->error(__('発注に失敗しました。もう一度やり直してください'));
        }
        
    }

    /*
     * 在庫発注社(order_comp)アクション
     */
    public function comp()
    {
        $this->paginate = [
            'contain' => ['Stock'],
            'order' => [
                'order_id' => 'asc'
            ]
        ];
        //在庫状態＝「2.発注状態」
        $query = $this->Order->find()->where(['status' => '2']);

        $order = $this->paginate($query);
        $this->set(compact('order'));
    }

    /*
     * 在庫発注社(order_comp)確認アクション
     */
    public function compConfirm($id = null)
    {

        //現在の在庫・発注情報を取得
        $order = $this->Order->get($id);

        //更新差分データを作成               
        $order_data['status'] = 3;  //「2.発注状態」→ 「3.発注済み」     

        //patchEntity(更新前データ, 差分データ)
        $order = $this->Order->patchEntity($order, $order_data);

        //在庫テーブルの個数、発注テーブルの在庫状態を更新
        if ($this->Order->save($order)) {
            $this->Flash->success(__('在庫状態を更新しました。'));
            return $this->redirect(['action' => 'comp']);
        }
        $this->Flash->error(__('発注に失敗しました。もう一度やり直してください'));
        
    }

    /**
     * groups別にアクセスを制御
     */
    public function isAuthorized($user)
    {
        //叩かれたURLのアクション
        $action = $this->request->params['action'];
        
        //権限でアクセス制御
        switch($user['group_id'] ){
            case 1:                    
                if (in_array($action, ['staff'])) {
                    return true;
                }
                break;
            case 2:                    
                if (in_array($action, ['admin','adminConfirm'])) {
                    return true;
                }
                break;
            case 3:                    
                if (in_array($action, ['comp','compConfirm'])) {
                    return true;
                }
                break;
        }
        return false;
    }

    /**
     * Edit method
     *
     * @param string|null $id Order id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    // public function edit($id = null)
    // {
    //     $order = $this->Order->get($id, [
    //         'contain' => []
    //     ]);
    //     if ($this->request->is(['patch', 'post', 'put'])) {
    //         $order = $this->Order->patchEntity($order, $this->request->getData());
    //         if ($this->Order->save($order)) {
    //             $this->Flash->success(__('The order has been saved.'));

    //             return $this->redirect(['action' => 'index']);
    //         }
    //         $this->Flash->error(__('The order could not be saved. Please, try again.'));
    //     }
    //     $stock = $this->Order->Stock->find('list', ['limit' => 200]);
    //     $this->set(compact('order', 'stock'));
    // }

    /**
     * Delete method
     *
     * @param string|null $id Order id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    // public function delete($id = null)
    // {
    //     $this->request->allowMethod(['post', 'delete']);
    //     $order = $this->Order->get($id);
    //     if ($this->Order->delete($order)) {
    //         $this->Flash->success(__('The order has been deleted.'));
    //     } else {
    //         $this->Flash->error(__('The order could not be deleted. Please, try again.'));
    //     }

    //     return $this->redirect(['action' => 'index']);
    // }

}