<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Stock Controller
 *
 * @property \App\Model\Table\StockTable $Stock
 *
 * @method \App\Model\Entity\Stock[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class StockController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $stock = $this->paginate($this->Stock);
        
        //ログイン情報の取得
        $group_id = $this->Auth->user('group_id');

        $this->set(compact('stock','group_id'));
    }

    /**
     * CSV出力メソッド
     */
    public function exportStcok()
    {

        //CSV出力準備
        $csvFileName = '/tmp/' . time() . rand() . '.csv';
		$fp = fopen($csvFileName, 'w');

        $data = $this->Stock->find('all')->toarray();
        
        //項目名
        $stock_list[] = ['在庫ID','在庫名','個数','金額','作成日','更新日'];

        //fputcsv用に配列を作成
        foreach ($data as $val) {
            $stocks = array();
            $stocks[] = $val['stock_id'];
            $stocks[] = $val['stock_name'];
            $stocks[] = $val['quantity'];
            $stocks[] = $val['price'];
            $stocks[] = $val['create_date'];
            $stocks[] = $val['update_date'];

            $stock_list[] = $stocks;
        }

        //CSV作成
        foreach($stock_list as $stock){
            fputcsv($fp, $stock);
        }
        fclose($fp);

        // ダウンロード開始
		header('Content-Type: application/octet-stream');

		// ここで渡されるファイルがダウンロード時のファイル名になる
		header('Content-Disposition: attachment; filename=sampaleCsv.csv'); 
		header('Content-Transfer-Encoding: binary');
		header('Content-Length: ' . filesize($csvFileName));
		readfile($csvFileName);

        $this->redirect($this->request->referer());

    }

    public function isAuthorized($user)
    {
        return true;
    }

//     /**
//      * View method
//      *
//      * @param string|null $id Stock id.
//      * @return \Cake\Http\Response|void
//      * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
//      */
//     public function view($id = null)
//     {
//         $stock = $this->Stock->get($id, [
//             'contain' => []
//         ]);

//         $this->set('stock', $stock);
//     }

//     /**
//      * Add method
//      *
//      * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
//      */
//     public function add()
//     {
//         $stock = $this->Stock->newEntity();
//         if ($this->request->is('post')) {
//             $stock = $this->Stock->patchEntity($stock, $this->request->getData());
//             if ($this->Stock->save($stock)) {
//                 $this->Flash->success(__('The stock has been saved.'));

//                 return $this->redirect(['action' => 'index']);
//             }
//             $this->Flash->error(__('The stock could not be saved. Please, try again.'));
//         }
//         $this->set(compact('stock'));
//     }

//     /**
//      * Edit method
//      *
//      * @param string|null $id Stock id.
//      * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
//      * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
//      */
//     public function edit($id = null)
//     {
//         $stock = $this->Stock->get($id, [
//             'contain' => []
//         ]);
//         if ($this->request->is(['patch', 'post', 'put'])) {
//             $stock = $this->Stock->patchEntity($stock, $this->request->getData());
//             if ($this->Stock->save($stock)) {
//                 $this->Flash->success(__('The stock has been saved.'));

//                 return $this->redirect(['action' => 'index']);
//             }
//             $this->Flash->error(__('The stock could not be saved. Please, try again.'));
//         }
//         $this->set(compact('stock'));
//     }

//     /**
//      * Delete method
//      *
//      * @param string|null $id Stock id.
//      * @return \Cake\Http\Response|null Redirects to index.
//      * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
//      */
//     public function delete($id = null)
//     {
//         $this->request->allowMethod(['post', 'delete']);
//         $stock = $this->Stock->get($id);
//         if ($this->Stock->delete($stock)) {
//             $this->Flash->success(__('The stock has been deleted.'));
//         } else {
//             $this->Flash->error(__('The stock could not be deleted. Please, try again.'));
//         }

//         return $this->redirect(['action' => 'index']);
//     }

}
