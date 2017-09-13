<?php
namespace App\Http\Controllers\Api;


use App\Http\Controllers\Controller;
use App\Repositories\CompanyRepository;
use Illuminate\Http\Request;

class CompaniesController extends Controller{    
    private $companyRepository;

    public function __construct(
        CompanyRepository      $companyRepository
    ){
        $this->companyRepository   = $companyRepository;
    }


    public function index(){
        $companies = $this
            ->companyRepository
            ->skipPresenter(false)
            ->paginate(10);

        return $companies;
    }


    public function show($id)    {
        $company = $this
            ->companyRepository         
            ->skipPresenter(false)
            ->find($id);
        
        return $company;
    }

    public function search($data){
        $data = '%' . $data . '%';
        //$url = $request->fullUrlWithQuery(['bar' => 'baz']);
        
        $companies = $this
            ->companyRepository
            ->skipPresenter(false)
            ->scopeQuery(function($query) use($data){
                return $query
                    ->where('name', 'like', $data);
            }
        )->paginate(10);

        /*$companies = $this
            ->companyRepository
            ->skipPresenter(false)
            ->findWhere([
                ['name', 'like', $data],
                ['description', 'like', $data]
            ])
        ;*/

        return $companies;
    }
}
