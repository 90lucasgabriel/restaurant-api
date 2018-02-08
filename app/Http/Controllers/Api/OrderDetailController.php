<?php
namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\OrderDetailRepository;
use App\Services\OrderDetailService;
use App\Models\OrderDetail;

/**
 * Class OrderDetailController
 * 
 * @package namespace App\Http\Controllers\Api;
 */
class OrderDetailController extends Controller{    
    /**
     * Repository of specified resource.
     * @var OrderDetailRepository
     */
    private $repository;

    /**
     * Service of specified resource.
     * @var OrderDetailService
     */
    private $service;

    /**
     * Constructor
     * @param OrderDetailRepository $repository
     */
    public function __construct(
        OrderDetailRepository      $repository,
        OrderDetailService         $service
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
    public function index(Request $request, int $company_id, int $branch_id/*, int $order_id*/){
        $data               = $request->all();
        $items              = $this->service->index($data, $company_id, $branch_id/*, $order_id*/);

        return $items;
    }

        /**
     * Display a listing of the resource.
     * @param Request $request
     * @param int $company_id
     * @return ['data'=>[App\Models\Order], 'meta'=>[pagination]]
     */
    public function queryByBranch(Request $request, int $company_id, int $branch_id){
        $data               = $request->all();
        $items              = $this->service->queryByBranch($data, $company_id, $branch_id);

        return $items;
    }


    /**
     * Display the specified resource.
     * @param  int  $company_id
     * @param  int  $id
     * @return ['data'=>[App\Models\OrderDetail]]
     */
    public function show(int $company_id, int $id){
        $item       = $this->service->find($company_id, $id);
        
        return $item;
    }

    /**
     * Create new item of specified resource
     * @param Request $request
     * @return ['data'=>[App\Models\OrderDetail]]
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
     * @return ['data'=>[App\Models\OrderDetail]]
     */
    public function update(Request $request, int $company_id, int $id){
        $data       = $request->all();
        $item       = $this->repository->update($data, $id);

        return $item;
    }

    /**
     * Delete item of specified resource
     * @param int $id
     * @return success->true|false
     */
    public function destroy(int $company_id, int $id){
        $success    = $this->repository->delete($id);
        
        return [ 'success' => $success ];
    }
}
