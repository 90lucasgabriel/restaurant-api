<?php
namespace App\Services;

use App\Http\Requests;
use App\Repositories\OrderItemRepository;
use App\Models\OrderItem;

/**
 * Class OrderItemService
 * 
 * @package namespace App\Services;
 */
class OrderItemService{
    /**
     * Repository of specified resource.
     *
     * @var OrderItemRepository
     */
    private $repository;

    /**
     * Constructor
     *
     * @param OrderItemRepository $repository
     */
    public function __construct(
        OrderItemRepository   $repository
    ){
        $this->repository = $repository;
    }
    
    /**
     * Display a listing of the resource.
     *
     * @param array $data
     * @param int $companyId
     * @return ['data'=>[App\Models\OrderItem], 'meta'=>[pagination]]
     */
    public function query(array $data, int $company_id, int $branch_id, int $order_id){  
        $items   = $this
            ->repository
            ->scopeQuery(function($query) use($company_id, $branch_id, $order_id){
                $result = $query
                    ->where('order_id', '=', $order_id)
                    ->orderBy('id', 'asc');
                return $result;
            });

        if((int) isset($data['perPage'])){
            return $items->paginate($data['perPage']);
        }
        else {
            return $items->all();
        }
    }

    /**
     * Display a listing of the resource.
     *
     * @param array $data
     * @param int $companyId
     * @return ['data'=>[App\Models\OrderItem], 'meta'=>[pagination]]
     */
    public function queryByBranch(array $data, int $company_id, int $branch_id){  
        $items   = $this
            ->repository
            ->scopeQuery(function($query) use($company_id, $branch_id){                
                $result = $query
                    ->join('orders', 'order_items.order_id', '=', 'orders.id')
                    ->where('orders.company_id', '=', $company_id)
                    ->where('orders.branch_id',  '=', $branch_id)
                    ->orderBy('orders.id', 'desc')
                    ->orderBy('order_items.updated_at', 'desc')
                    ->select('order_items.*');
                return $result;
            });

        if((int) isset($data['perPage'])){
            return $items->paginate($data['perPage']);
        }
        else {
            return $items->all();
        }
    }

    
    /**
     * Display a specific item of the resource.
     *
     * @param int $company_id
     * @param int $id
     * @return ['data'=>[App\Models\OrderItem], 'meta'=>[pagination]]
     */
    public function find(int $company_id, int $id){
        $item = $this
            ->repository
            ->findWhere([
                'company_id' => $company_id,
                'id'         => $id,
            ])['data'][0];
        $item = ['data' => $item];

        return $item;
    }
}