<?php
namespace App\Services;

use App\Http\Requests;
use App\Repositories\BranchRepository;
use App\Models\Branch;
use App\Services\CommonService;

/**
 * Class BranchService
 * 
 * @package namespace App\Services;
 */
class BranchService{
    /**
     * Repository of specified resource.
     *
     * @var BranchRepository
     */
    private $repository;

    private $common;
    /**
     * Constructor
     *
     * @param BranchRepository $repository
     */
    public function __construct(
        BranchRepository    $repository,
        CommonService       $common
    ){
        $this->repository        = $repository;
        $this->common            = $common;
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
            ->scopeQuery(function($query) use($company_id, $data){                
                $result = $query->where('company_id', '=', $company_id);
                //$result = $this->common->makeWhere($data, $result);
                
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
     * @return ['data'=>[App\Models\Branch], 'meta'=>[pagination]]
     */
    public function find(int $company_id, int $id){
        $item = $this
            ->repository
            ->findWhere([
                'company_id' => $company_id,
                'id'         => $id,
            ])['data'][0];
        $item = ['data' => $item];
        
        /*
        $item = $this
        ->repository
        ->scopeQuery(function($query) use($company_id, $id){
            return $query
                ->where('branches.company_id', '=', $company_id)
                ->where('branches.id', '=', $id);
        })->first();
        */
        return $item;
    }
}