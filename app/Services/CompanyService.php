<?php
namespace App\Services;

use App\Http\Requests;
use App\Repositories\CompanyRepository;
use App\Models\Company;

/**
 * Class CompanyService
 * 
 * @package namespace App\Services;
 */
class CompanyService{
    /**
     * Repository of specified resource.
     *
     * @var CompanyRepository
     */
    private $repository;

    /**
     * Constructor
     *
     * @param CompanyRepository $repository
     */
    public function __construct(
        CompanyRepository   $repository
    ){
        $this->repository = $repository;
    }

    /**
     * Display a listing of the resource.
     *
     * @param array $data
     * @return ['data'=>[App\Models\Company], 'meta'=>[pagination]]
     */
    public function query(array $data){
        $per_page       = null;
        if(isset($data['per_page']) && (int) $data['per_page']){
            $per_page   = $data['per_page'];
        }

        return $this->repository->paginate($per_page);
    }
}