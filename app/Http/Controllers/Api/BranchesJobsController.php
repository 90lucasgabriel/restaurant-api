<?php
namespace App\Http\Controllers\Api;

use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Repositories\BranchJobRepository;
use Illuminate\Http\Request;

class BranchesJobsController extends Controller{    
    private $branchJobRepository;

    public function __construct(
        BranchJobRepository      $branchJobRepository
    ){
        $this->branchJobRepository   = $branchJobRepository;
    }


    public function show($id)    {
        $branch = $this
            ->branchJobRepository         
            ->skipPresenter(false)
            ->find($id);
        
        return $branch;
    }


    public function queryJobsByBranch($branchId){
      $jobs = $this
        ->branchJobRepository
        ->skipPresenter(false)
        ->scopeQuery(function($query) use($branchId){
          return $query
            ->where('branch_id', '=', $branchId);
        })->paginate(10);

      return $jobs;
    }
}
