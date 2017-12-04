<?php
namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\MenuProductRepository;
use App\Services\MenuProductService;
use App\Models\MenuProduct;

/**
 * Class MenuProductController
 * 
 * @package namespace App\Http\Controllers\Api;
 */
class MenuProductController extends Controller{    
    /**
     * Repository of specified resource.
     *
     * @var MenuProductRepository
     */
    private $repository;

    /**
     * Service of specified resource.
     *
     * @var MenuProductService
     */
    private $service;

    /**
     * Constructor
     *
     * @param MenuProductRepository $repository
     */
    public function __construct(
        MenuProductRepository      $repository,
        MenuProductService         $service
    ){
        $this->repository   =   $repository;
        $this->service      =   $service;
    }

    /**
     * Display a listing of the resource.
     * 
     * @param Request $request
     * @param int $company_id
     * @return ['data'=>[App\Models\MenuProduct], 'meta'=>[pagination]]
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
     * @return ['data'=>[App\Models\MenuProduct]]
     */
    public function show(int $company_id, int $id){
        $item       = $this->service->find($company_id, $id);
        
        return $item;
    }

    /**
     * Create new item of specified resource
     *
     * @param Request $request
     * @return ['data'=>[App\Models\MenuProduct]]
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
     * @return ['data'=>[App\Models\MenuProduct]]
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

    /**
     * Delete item of specified resource
     *
     * @param int $company_id
     * @return success->true|false
     */
    public function deleteByCompany(int $company_id){
        $success    = $this->repository->deleteWhere(['company_id' => $company_id]);
        
        return [ 'success' => $success ];
    }

    /**
     * Delete item of specified resource by menu id
     *
     * @param int $company_id
     * @return success->true|false
     */
    public function deleteByMenu(int $company_id, int $menu_id){
        $success = $this->repository->deleteWhere([
            'company_id'    => $company_id,
            'menu_id'       => $menu_id
            ]);
        
        return [ 'success' => $success ];
    }
}
