<?php
namespace App\Services;

use App\Http\Requests;
use App\Repositories\MenuRepository;
use App\Models\Menu;

/**
 * Class MenuService
 * 
 * @package namespace App\Services;
 */
class MenuService{
    /**
     * Repository of specified resource.
     *
     * @var MenuRepository
     */
    private $repository;

    /**
     * Constructor
     *
     * @param MenuRepository $repository
     */
    public function __construct(
        MenuRepository   $repository
    ){
        $this->repository = $repository;
    }

    /**
     * Display a listing of the resource.
     *
     * @param array $data
     * @param int $companyId
     * @return ['data'=>[App\Models\Branch], 'meta'=>[pagination]]
     */
    public function query(array $data, int $company_id){  
        $items   = $this
            ->repository
            ->scopeQuery(function($query) use($company_id){                
                $result = $query->where('company_id', '=', $company_id);
                return $result;
            });

        if((int) isset($data['perPage'])){
            return $items->paginate($data['perPage']);
        }
        else {
            return $items->all();
        }
    }

    
    /**
     * Display a specific item of the resource.
     *
     * @param int $company_id
     * @param int $id
     * @return ['data'=>[App\Models\Menu], 'meta'=>[pagination]]
     */
    public function find(int $company_id, int $id){
        $item = $this
            ->repository
            ->findWhere([
                'company_id' => $company_id,
                'id'         => $id,
            ])['data'][0];
        $item = ['data' => $item];

        return $item;
    }

    /**
     * Sync product list of menu_product
     * @param Request $request
     * @param int $company_id
     * @param int $id
     * @return ['data'=>[App\Models\Product]]
     */
    public function syncProduct(array $data, int $id){
        $item        = Menu::find($id);
        $productList = [];

        foreach ($data['product'] as $product) {
            array_push($productList, [
                'product_id' => $product['id'], 
                'price'      => $product['price']
            ]);
        }
        $item->products()->sync($productList);

        return $item;
    }

    /**
     * Sync branch list of menu_branch
     *
     * @param Request $request
     * @param int $company_id
     * @param int $id
     * @return ['data'=>[App\Models\Branch]]
     */
    public function syncBranch(array $data, int $id){
        $item       = Menu::find($id);
        $branchList = []; //explode(',', $data['branch']);

        foreach ($data['branch'] as $branch) {
            array_push($branchList, [
                'branch_id' => $branch['id']
            ]);
        }
        $item->branches()->sync($branchList);

        return $item;
    }
}