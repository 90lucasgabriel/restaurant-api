<?php
namespace App\Http\Controllers\Api;

use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Repositories\JobRepository;
use Illuminate\Http\Request;

class JobsController extends Controller{    
    private $jobRepository;

    public function __construct(
        JobRepository      $jobRepository
    ){
        $this->jobRepository   = $jobRepository;
    }


    public function index(){
        $jobs = $this
            ->jobRepository
            ->skipPresenter(false)
            ->paginate(10);

        return $jobs;
    }


    public function show($id)    {
        $job = $this
            ->jobRepository         
            ->skipPresenter(false)
            ->find($id);
        
        return $job;
    }

    public function queryJobsByBranch($branchId){
        $jobs = $this
            ->jobRepository
            ->skipPresenter(false)
            ->scopeQuery(function($query) use($branchId){
                return $query
                    ->join('branches_jobs', 'jobs.id', '=', 'branches_jobs.job_id')
                    ->where('branches_jobs.branch_id', '=', $branchId)
                    ->select('job_id as id', 'price', 'price_sale', 'duration');
            })->paginate(10);

        return $jobs;
    }


    public function search($data){
        $data = '%' . $data . '%';
        //$url = $request->fullUrlWithQuery(['bar' => 'baz']);
        
        $jobs = $this
            ->jobRepository
            ->skipPresenter(false)
            ->scopeQuery(function($query) use($data){
                return $query
                    ->where('name', 'like', $data);
            }
        )->paginate(10);

        /*$jobs = $this
            ->jobRepository
            ->skipPresenter(false)
            ->findWhere([
                ['name', 'like', $data],
                ['description', 'like', $data]
            ])
        ;*/

        return $jobs;
    }
}
