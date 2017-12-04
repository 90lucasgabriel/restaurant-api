<?php
namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\BranchRepository;
use App\Services\BranchService;
use App\Models\Branch;

/**
 * Class BranchController
 * 
 * @package namespace App\Http\Controllers\Api;
 */
class BranchController extends Controller{    
    /**
     * Repository of specified resource.
     *
     * @var BranchRepository
     */
    private $repository;

    /**
     * Service of specified resource.
     *
     * @var BranchService
     */
    private $service;

    /**
     * Constructor
     *
     * @param BranchRepository  $repository
     * @param BranchService     $service
     */
    public function __construct(
        BranchRepository      $repository,
        BranchService         $service
    ){
        $this->repository   = $repository;
        $this->service      = $service;
    }

    /**
     * Display a listing of the resource.
     * 
     * @param Request $request
     * @param int $company_id
     * @return ['data'=>[App\Models\Branch], 'meta'=>[pagination]]
     */
    public function index(Request $request, int $company_id){
        $data               = $request->all();
        $items              = $this->service->query($data, $company_id);

        return $items;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $company_id
     * @param  int  $id
     * @return ['data'=>[App\Models\Branch]]
     */
    public function show(int $company_id, int $id){
        $item       = $this->service->find($company_id, $id);
        
        return $item;
    }

    /**
     * Create new item of specified resource
     *
     * @param Request $request
     * @return ['data'=>[App\Models\Branch]]
     */
    public function store(Request $request){
        $data       = $request->all();
        $item       = $this->repository->create($data);

        return $item;
    }

    /**
     * Update item of specified resource
     *
     * @param Request $request
     * @param int $company_id
     * @param int $id
     * @return ['data'=>[App\Models\Branch]]
     */
    public function update(Request $request, int $company_id, int $id){
        $data       = $request->all();
        $item       = $this->repository->update($data, $id);

        return $item;
    }

    /**
     * Delete item of specified resource
     *
     * @param int $id
     * @return success->true|false
     */
    public function destroy(int $company_id, int $id){
        $success    = $this->repository->delete($id);
        
        return [ 'success' => $success ];
    }
}
