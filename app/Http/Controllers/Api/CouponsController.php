<?php
namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Repositories\CouponRepository;

class CouponsController extends Controller{
    private $couponRepository;
    public function __construct(CouponRepository $couponRepository){
        $this->couponRepository    = $couponRepository;
    }

    public function findByCode($code)    {
        $coupon = $this
            ->couponRepository         
            ->skipPresenter(false)
            ->findByCode($code);
        
        return $coupon;
    }
}
