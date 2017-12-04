<?php
namespace App\Services;

use App\Http\Requests;
use App\Repositories\CategoryRepository;
use App\Models\Category;

/**
 * Class CategoryService
 * 
 * @package namespace App\Services;
 */
class CategoryService{
    /**
     * Repository of specified resource.
     *
     * @var CategoryRepository
     */
    private $repository;

    /**
     * Constructor
     *
     * @param CategoryRepository $repository
     */
    public function __construct(
        CategoryRepository   $repository
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
     * @return ['data'=>[App\Models\Category], 'meta'=>[pagination]]
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