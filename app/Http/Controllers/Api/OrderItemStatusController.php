<?php
namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\OrderItemStatusRepository;
use App\Services\OrderItemStatusService;
use App\Models\OrderItemStatus;

/**
 * Class OrderItemStatusController
 * @package namespace App\Http\Controllers\Api;
 */
class OrderItemStatusController extends Controller{    
    /**
     * Repository of specified resource.
     * @var OrderItemStatusRepository
     */
    private $repository;

    /**
     * Service of specified resource.
     * @var OrderItemStatusService
     */
    private $service;

    /**
     * Constructor
     * @param OrderItemStatusRepository $repository
     */
    public function __construct(
        OrderItemStatusRepository      $repository,
        OrderItemStatusService         $service
    ){
        $this->repository   =   $repository;
        $this->service      =   $service;
    }

    /**
     * Display a listing of the resource.
     * @param Request $request
     * @return ['data'=>[App\Models\OrderItemStatus], 'meta'=>[pagination]]
     */
    public function index(Request $request){
        $data               = $request->all();
        $items              = $this->service->query($data);

        return $items;
    }

    /**
     * Display the specified resource.
     * @param  int  $id
     * @return ['data'=>[App\Models\OrderItemStatus]]
     */
    public function show(int $id){
        $item       = $this->service->find($id);
        
        return $item;
    }

    /**
     * Create new item of specified resource
     * @param Request $request
     * @return ['data'=>[App\Models\OrderItemStatus]]
     */
    public function store(Request $request){
        $data       = $request->all();
        $item       = $this->repository->create($data);

        return $item;
    }

    /**
     * Update item of specified resource
     * @param Request $request
     * @param int $id
     * @return ['data'=>[App\Models\OrderItemStatus]]
     */
    public function update(Request $request, int $id){
        $data       = $request->all();
        $item       = $this->repository->update($data, $id);

        return $item;
    }

    /**
     * Delete item of specified resource
     * @param int $id
     * @return success->true|false
     */
    public function destroy(int $id){
        $success    = $this->repository->delete($id);
        
        return [ 'success' => $success ];
    }
}
