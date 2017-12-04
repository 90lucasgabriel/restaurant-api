<?php
namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\MenuRepository;
use App\Services\MenuService;
use App\Models\Menu;

/**
 * Class MenuController
 * 
 * @package namespace App\Http\Controllers\Api;
 */
class MenuController extends Controller{    
    /**
     * Repository of specified resource.
     *
     * @var MenuRepository
     */
    private $repository;

    /**
     * Service of specified resource.
     *
     * @var MenuService
     */
    private $service;

    /**
     * Constructor
     *
     * @param MenuRepository $repository
     */
    public function __construct(
        MenuRepository      $repository,
        MenuService         $service
    ){
        $this->repository   =   $repository;
        $this->service      =   $service;
    }

    /**
     * Display a listing of the resource.
     * 
     * @param Request $request
     * @param int $company_id
     * @return ['data'=>[App\Models\Menu], 'meta'=>[pagination]]
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
     * @return ['data'=>[App\Models\Menu]]
     */
    public function show(int $company_id, int $id){
        $item       = $this->service->find($company_id, $id);
        
        return $item;
    }

    /**
     * Create new item of specified resource
     *
     * @param Request $request
     * @return ['data'=>[App\Models\Menu]]
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
     * @return ['data'=>[App\Models\Menu]]
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




    // PRODUCT SECTION -------------------------------
    /**
     * Sync products of menu_product
     *
     * @param Request $request
     * @param int $company_id
     * @param int $id
     * @return ['data'=>[App\Models\Product]]
     */
    public function syncProduct(Request $request, int $company_id, int $id){
        $data       = $request->all();
        $item       = $this->service->syncProduct($data, $id);

        return $item->products;
    }

    /**
     * Update item of specified resource
     *
     * @param Request $request
     * @param int $company_id
     * @param int $id
     * @return ['data'=>[App\Models\Product]]
     */
    public function queryProduct(int $company_id, int $id){
        $item       = Menu::find($id);
        
        return ['data' => $item->products];
    }




    // BRANCH SECTION -------------------------------
    /**
     * Sync branch list of menu_branch
     *
     * @param Request $request
     * @param int $company_id
     * @param int $id
     * @return ['data'=>[App\Models\Branch]]
     */
    public function syncBranch(Request $request, int $company_id, int $id){
        $data       = $request->all();
        $item       = $this->service->syncBranch($data, $id);

        return $item->branches;
    }

    /**
     * Update item of specified resource
     *
     * @param Request $request
     * @param int $company_id
     * @param int $id
     * @return ['data'=>[App\Models\Branch]]
     */
    public function queryBranch(int $company_id, int $id){
        $item       = Menu::find($id);
        
        return ['data' => $item->branches];
    }
}
