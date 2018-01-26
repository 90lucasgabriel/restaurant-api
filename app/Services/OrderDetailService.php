<?php
namespace App\Services;

use App\Http\Requests;
use App\Repositories\OrderDetailRepository;
use App\Models\OrderDetail;

class OrderDetailService{
    private $couponRepository;
    private $repository;
    private $productRepository;
    private $pushProcessor;

    public function __construct(
        OrderDetailRepository     $repository
    ){
        $this->orderDetailRepository   = $repository;
    }

    /**
     * Display a listing of the resource.
     * @param array $data
     * @param int $companyId
     * @return ['data'=>[App\Models\Branch], 'meta'=>[pagination]]
     */
    public function queryByBranch(array $data, int $company_id, int $branch_id){  
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
}