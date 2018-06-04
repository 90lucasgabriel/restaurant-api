<?php
namespace App\Services;

use App\Http\Requests;
use App\Repositories\OrderItemTypeRepository;
use App\Models\OrderItemType;

/**
 * Class OrderItemTypeService
 * 
 * @package namespace App\Services;
 */
class OrderItemTypeService{
    /**
     * Repository of specified resource.
     *
     * @var OrderItemTypeRepository
     */
    private $repository;

    /**
     * Constructor
     *
     * @param OrderItemTypeRepository $repository
     */
    public function __construct(
        OrderItemTypeRepository   $repository
    ){
        $this->repository = $repository;
    }

    /**
     * Display a listing of the resource.
     * @param array $data
     * @return ['data'=>[App\Models\Branch], 'meta'=>[pagination]]
     */
    public function query(array $data){        
        if((int) isset($data['perPage'])){
            return $this->repository->paginate($data['perPage']);
        }
        else {
            return $this->repository->all();
        }
    }

    
    /**
     * Display a specific item of the resource.
     * @param int $id
     * @return ['data'=>[App\Models\OrderItemType], 'meta'=>[pagination]]
     */
    public function find(int $id){
        $item = $this->repository->find($id);

        return $item;
    }
}