<?php
namespace App\Services;

use App\Http\Requests;
use App\Repositories\OrderDetailTypeRepository;
use App\Models\OrderDetailType;

/**
 * Class OrderDetailTypeService
 * 
 * @package namespace App\Services;
 */
class OrderDetailTypeService{
    /**
     * Repository of specified resource.
     *
     * @var OrderDetailTypeRepository
     */
    private $repository;

    /**
     * Constructor
     *
     * @param OrderDetailTypeRepository $repository
     */
    public function __construct(
        OrderDetailTypeRepository   $repository
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
     * @return ['data'=>[App\Models\OrderDetailType], 'meta'=>[pagination]]
     */
    public function find(int $id){
        $item = $this->repository->find($id);

        return $item;
    }
}