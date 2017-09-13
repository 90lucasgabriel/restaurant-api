<?php
namespace App\Http\Controllers\Api;

use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Repositories\BranchJobEmployeeRepository;
use Illuminate\Http\Request;

class BranchJobEmployeesController extends Controller{    
    private $branchJobEmployeeRepository;

    public function __construct(
        BranchJobEmployeeRepository      $branchJobEmployeeRepository
    ){
        $this->branchJobEmployeeRepository   = $branchJobEmployeeRepository;
    }


    public function show($id)    {
        $branch = $this
            ->branchJobEmployeeRepository         
            ->skipPresenter(false)
            ->find($id);
        
        return $branch;
    }


    public function queryEmployeesByBranchJob($branchJobId){
      $employees = $this
        ->branchJobEmployeeRepository
        ->skipPresenter(false)
        ->scopeQuery(function($query) use($branchJobId){
          return $query
            ->where('branch_job_employees.branch_job_id', '=', $branchJobId);
        })->paginate(10);

      return $employees;
    }
}
