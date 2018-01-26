<?php
namespace App\Services;

use App\Http\Requests;
use App\Repositories\OrderStatusRepository;
use App\Models\OrderStatus;

/**
 * Class OrderStatusService
 * 
 * @package namespace App\Services;
 */
class OrderStatusService{
    /**
     * Repository of specified resource.
     *
     * @var OrderStatusRepository
     */
    private $repository;

    /**
     * Constructor
     *
     * @param OrderStatusRepository $repository
     */
    public function __construct(
        OrderStatusRepository   $repository
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
     * @return ['data'=>[App\Models\OrderStatus], 'meta'=>[pagination]]
     */
    public function find(int $id){
        $item = $this->repository->find($id);

        return $item;
    }
}