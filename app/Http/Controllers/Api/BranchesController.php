<?php
namespace App\Http\Controllers\Api;

use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Repositories\BranchRepository;
use Illuminate\Http\Request;

class BranchesController extends Controller{    
    private $branchRepository;

    public function __construct(
        BranchRepository      $branchRepository
    ){
        $this->branchRepository   = $branchRepository;
    }


    public function index(){
        $branches = $this
            ->branchRepository
            ->skipPresenter(false)
            ->paginate(10);

        return $branches;
    }


    public function show($id)    {
        $branch = $this
            ->branchRepository         
            ->skipPresenter(false)
            ->find($id);
        
        return $branch;
    }

    public function queryFavoritesByUser($userId){
        $branches = $this
            ->branchRepository
            ->skipPresenter(false)
            ->scopeQuery(function($query) use($userId){
                return $query
                    ->join('user_branch_favorites', 'branches.id', '=', 'branches_users_favorites.branch_id')
                    ->where('user_branch_favorites.user_id', '=', $userId);
            })->paginate(10);

        return $branches;
    }

   
    public function search($data){
        $data = '%' . $data . '%';
        //$url = $request->fullUrlWithQuery(['bar' => 'baz']);
        
        $branches = $this
            ->branchRepository
            ->skipPresenter(false)
            ->scopeQuery(function($query) use($data){
                return $query
                    ->where('name', 'like', $data);
            }
        )->paginate(10);

        /*$branches = $this
            ->branchRepository
            ->skipPresenter(false)
            ->findWhere([
                ['name', 'like', $data],
                ['description', 'like', $data]
            ])
        ;*/

        return $branches;
    }
}
