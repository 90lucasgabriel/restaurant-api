<?php
namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\OrderRepository;
use App\Services\OrderService;
use App\Models\Order;

/**
 * Class OrderController
 * @package namespace App\Http\Controllers\Api;
 */
class OrderController extends Controller{    
    /**
     * Repository of specified resource.
     * @var OrderRepository
     */
    private $repository;

    /**
     * Service of specified resource.
     * @var OrderService
     */
    private $service;

    /**
     * Constructor
     * @param OrderRepository $repository
     */
    public function __construct(
        OrderRepository      $repository,
        OrderService         $service
    ){
        $this->repository   =   $repository;
        $this->service      =   $service;
    }

    /**
     * Display a listing of the resource.
     * @param Request $request
     * @param int $company_id
     * @return ['data'=>[App\Models\Order], 'meta'=>[pagination]]
     */
    public function index(Request $request, int $company_id, int $branch_id){
        $data               = $request->all();
        $items              = $this->service->query($data, $company_id, $branch_id);

        return $items;
    }

    /**
     * Display the specified resource.
     * @param  int  $company_id
     * @param  int  $id
     * @return ['data'=>[App\Models\Order]]
     */
    public function show(int $company_id, int $branch_id, int $id){
        $item       = $this->service->find($company_id, $branch_id, $id);
        
        return $item;
    }

    /**
     * Create new item of specified resource
     * @param Request $request
     * @return ['data'=>[App\Models\Order]]
     */
    public function store(Request $request){
        $data       = $request->all();
        $item       = $this->repository->create($data);

        return $item;
    }

    /**
     * Update item of specified resource
     * @param Request $request
     * @param int $company_id
     * @param int $id
     * @return ['data'=>[App\Models\Order]]
     */
    public function update(Request $request, int $company_id, int $branch_id, int $id){
        $data       = $request->all();
        $item       = $this->repository->update($data, $id);

        return $item;
    }

    /**
     * Delete item of specified resource
     * @param int $id
     * @return success->true|false
     */
    public function destroy(int $company_id, int $branch_id, int $id){
        $success    = $this->repository->delete($id);
        
        return [ 'success' => $success ];
    }
}
