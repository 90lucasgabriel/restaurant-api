<?php
namespace App\Services;

use App\Http\Requests;
use App\Repositories\MenuProductRepository;
use App\Models\MenuProduct;

/**
 * Class MenuProductService
 * 
 * @package namespace App\Services;
 */
class MenuProductService{
    /**
     * Repository of specified resource.
     *
     * @var MenuProductRepository
     */
    private $repository;

    /**
     * Constructor
     *
     * @param MenuProductRepository $repository
     */
    public function __construct(
        MenuProductRepository   $repository
    ){
        $this->repository = $repository;
    }

    /**
     * Display a listing of the resource.
     *
     * @param array $data
     * @param int $companyId
     * @return ['data'=>[App\Models\Branch], 'meta'=>[pagination]]
     */
    public function query(array $data, int $company_id){  
        $items   = $this
            ->repository
            ->scopeQuery(function($query) use($company_id){                
                $result = $query->where('company_id', '=', $company_id);
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
     * @return ['data'=>[App\Models\MenuProduct], 'meta'=>[pagination]]
     */
    public function find(int $company_id, int $id){
        $item = $this
            ->repository
            ->findWhere([
                'id'         => $id,
            ])['data'][0];
        $item = ['data' => $item];

        return $item;
    }
}