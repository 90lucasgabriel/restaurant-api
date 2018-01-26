<?php
namespace App\Services;

use App\Http\Requests;
use App\Repositories\OrderDetailStatusRepository;
use App\Models\OrderDetailStatus;

/**
 * Class OrderDetailStatusService
 * 
 * @package namespace App\Services;
 */
class OrderDetailStatusService{
    /**
     * Repository of specified resource.
     *
     * @var OrderDetailStatusRepository
     */
    private $repository;

    /**
     * Constructor
     *
     * @param OrderDetailStatusRepository $repository
     */
    public function __construct(
        OrderDetailStatusRepository   $repository
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
     * @return ['data'=>[App\Models\OrderDetailStatus], 'meta'=>[pagination]]
     */
    public function find(int $id){
        $item = $this->repository->find($id);

        return $item;
    }
}