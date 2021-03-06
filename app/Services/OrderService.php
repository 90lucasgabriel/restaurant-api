<?php
namespace App\Services;

use App\Http\Requests;
use App\Repositories\OrderRepository;
use App\Models\Order;

/**
 * Class OrderService
 * 
 * @package namespace App\Services;
 */
class OrderService{
    /**
     * Repository of specified resource.
     * @var OrderRepository
     */
    private $repository;

    /**
     * Constructor
     * @param OrderRepository $repository
     */
    public function __construct(
        OrderRepository   $repository
    ){
        $this->repository = $repository;
    }

    /**
     * Display a listing of the resource.
     * @param array $data
     * @param int $companyId
     * @return ['data'=>[App\Models\Branch], 'meta'=>[pagination]]
     */
    public function query(array $data, int $company_id, int $branch_id){  
        $items   = $this
            ->repository
            ->scopeQuery(function($query) use($company_id, $branch_id){                
                $result = $query
                    ->where('company_id', '=', $company_id)
                    ->where('branch_id',  '=', $branch_id);
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
     * @param int $company_id
     * @param int $id
     * @return ['data'=>[App\Models\Order], 'meta'=>[pagination]]
     */
    public function find(int $company_id, int $branch_id, int $id){
        $item = $this
            ->repository
            ->findWhere([
                'company_id' => $company_id,
                'branch_id'  => $branch_id,
                'id'         => $id,
            ])['data'][0];
        $item = ['data' => $item];

        return $item;
    }
}