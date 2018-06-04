<?php
namespace App\Services;

use App\Http\Requests;
use App\Repositories\OrderItemStatusRepository;
use App\Models\OrderItemStatus;

/**
 * Class OrderItemStatusService
 * 
 * @package namespace App\Services;
 */
class OrderItemStatusService{
    /**
     * Repository of specified resource.
     *
     * @var OrderItemStatusRepository
     */
    private $repository;

    /**
     * Constructor
     *
     * @param OrderItemStatusRepository $repository
     */
    public function __construct(
        OrderItemStatusRepository   $repository
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
     * @return ['data'=>[App\Models\OrderItemStatus], 'meta'=>[pagination]]
     */
    public function find(int $id){
        $item = $this->repository->find($id);

        return $item;
    }
}