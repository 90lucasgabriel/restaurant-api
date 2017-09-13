<?php
namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Repositories\ProductRepository;

use Illuminate\Http\Request;

class ClientProductController extends Controller{
    private $productRepository;
    public function __construct(ProductRepository $productRepository){
        $this->productRepository    = $productRepository;
    }

    public function index(){
        $products = $this
            ->productRepository
            ->skipPresenter(false)
            ->paginate(10);

        return $products;
    }


    public function show($id)    {
        $product = $this
            ->productRepository         
            ->skipPresenter(false)
            ->find($id);
        
        return $product;
    }

    public function search($data){
        $data = '%' . $data . '%';
        //$url = $request->fullUrlWithQuery(['bar' => 'baz']);
        
        $products = $this
            ->productRepository
            ->skipPresenter(false)
            ->scopeQuery(function($query) use($data){
                return $query
                    ->where('name', 'like', $data);
            }
        )->paginate(10);

        /*$products = $this
            ->productRepository
            ->skipPresenter(false)
            ->findWhere([
                ['name', 'like', $data],
                ['description', 'like', $data]
            ])
        ;*/

        return $products;
    }
}
