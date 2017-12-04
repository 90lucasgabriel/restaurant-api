<?php
namespace App\Services;

use App\Http\Requests;


/**
 * Class CommonService
 * 
 * @package namespace App\Services;
 */
class CommonService{
    
    /**
     * Constructor
     *
     * @param CommonRepository $repository
     */
    public function __construct(
        
        ){ }
        
        public function validateParam($param=null, $type, $default=null){
            if($type=='int'){
                if(isset($param) && (int) $param){
                    return $param;
            }else{
                return $default;
            }
        }
    }
    
    public function makeWhere($data, $result){
        $params = ['page', 'per_page', 'sort', 'sort_dir', 'include', 'search'];
        foreach($data as $key => $value){
            $key   = strtolower($key);
            //$value = strtolower($value);
            if(!in_array($key, $params) && strlen(trim($value)) > 0){
                $result = $result->where($key, '=', $value);
            }
        }

        return $result;
    }
}