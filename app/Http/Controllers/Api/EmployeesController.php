<?php
namespace App\Http\Controllers\Api;


use App\Http\Controllers\Controller;
use App\Repositories\EmployeeRepository;
use Illuminate\Http\Request;

class EmployeesController extends Controller{    
    private $employeeRepository;

    public function __construct(
        EmployeeRepository      $employeeRepository
    ){
        $this->employeeRepository   = $employeeRepository;
    }


    public function index(){
        $employees = $this
            ->employeeRepository
            ->skipPresenter(false)
            ->paginate(10);

        return $employees;
    }


    public function show($id)    {
        $employee = $this
            ->employeeRepository         
            ->skipPresenter(false)
            ->find($id);
        
        return $employee;
    }


    public function queryEmployeesByBranchAndJob($branchId, $jobId){
      $employees = $this
        ->employeeRepository
        ->skipPresenter(false)
        ->scopeQuery(function($query) use($branchId, $jobId){
          return $query
            ->join('users','users.id','=','employees.user_id')
            ->join('branch_job_employees','employees.id','=','branch_job_employees.employee_id')
            ->join('branches_jobs', function($join){
                $join->on('branches_jobs.id','=','branch_job_employees.branch_job_id');
                $join->on('branches_jobs.branch_id','=','employees.branch_id');
            })
            ->where('branches_jobs.branch_id', '=', $branchId)
            ->where('branches_jobs.job_id', '=', $jobId)
            ->select('employees.*');
        })->paginate(10);
      
      return $employees;
    }

    
}
