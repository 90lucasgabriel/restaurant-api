<?php
namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\CompanyRepository;
use App\Services\CompanyService;
use App\Models\Company;

/**
 * Class CompanyController
 * 
 * @package namespace App\Http\Controllers\Api;
 */
class CompanyController extends Controller{    
    /**
     * Repository of specified resource.
     *
     * @var CompanyRepository
     */
    private $repository;

    /**
     * Service of specified resource.
     *
     * @var CompanyService
     */
    private $service;

    /**
     * Constructor
     *
     * @param CompanyRepository $repository
     */
    public function __construct(
        CompanyRepository       $repository,
        CompanyService          $service
    ){
        $this->repository   =   $repository;
        $this->service      =   $service;
    }

    /**
     * Display a listing of the resource.
     * 
     * @param Request $request
     * @return ['data'=>[App\Models\Company], 'meta'=>[pagination]]
     */
    public function index(Request $request){
        $data               = $request->all();
        $items              = $this->service->query($data);

        return $items;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return ['data'=>[App\Models\Company]]
     */
    public function show(int $id){
        $item       = $this->repository->find($id);
        
        return $item;
    }

    /**
     * Create new item of specified resource
     *
     * @param Request $request
     * @return ['data'=>[App\Models\Company]]
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
     * @param int $id
     * @return ['data'=>[App\Models\Company]]
     */
    public function update(Request $request, int $id){
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
    public function destroy(int $id){
        $success    = $this->repository->delete($id);
        
        return [ 'success' => $success ];
    }

    /**
     * Search item by name with LIKE.
     *
     * @param string $data
     * @return ['data'=>[App\Models\Company]]
     */
    public function search(string $data){
        $data = '%' . $data . '%';
        
        $items = $this
            ->repository
            ->scopeQuery(function($query) use($data){
                return $query
                    ->where('name', 'like', $data);
            }
        )->paginate(10);

        /*$companies = $this
            ->companyRepository
            ->findWhere([
                ['name', 'like', $data],
                ['description', 'like', $data]
            ])
        ;*/

        return $items;
    }
}
