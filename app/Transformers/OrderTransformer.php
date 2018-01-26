<?php
namespace App\Transformers;

use League\Fractal\TransformerAbstract;
use App\Models\Order;
use Illuminate\Database\Eloquent\Collection;

class OrderTransformer extends TransformerAbstract
{
    /**
     * Default models includes
     * @var array
     */
    protected $defaultIncludes  = [];

    /**
     * Available models includes
     * @var array
     */
    protected $availableIncludes = ['company', 'branch', 'diningtable', 'coupon', 'orderStatus', 'orderDetail'];
    public function transform(Order $model)
    {
        return [
            'id'              => (int) $model->id,
            'company_id'      => (int) $model->company_id,
            'branch_id'       => (int) $model->branch_id,
            'diningtable_id'  => (int) $model->diningtable_id,
            'order_status_id' => (int) $model->order_status_id,
            'total'           => (float) $model->total,
                        
            'created_at'      => $model->created_at,
            'updated_at'      => $model->updated_at
        ];
    }


    public function includeCompany(Order $model){
        return $this->item($model->company, new CompanyTransformer());
    }

    public function includeBranch(Order $model){
        return $this->item($model->branch, new BranchTransformer());
    }

    public function includStatus(Order $model){
        return $this->item($model-status, new OrderDetailStatusTransformer());
    }

    public function includeDiningtable(Order $model){
        return $this->item($model->diningtable, new DiningtableTransformer());
    }

    public function includeCoupon(Order $model){
        if(!$model->coupon){
            return null;
        }
        return $this->item($model->coupon, new CouponTransformer());
    }

    public function includeOrderStatus(Order $model){
        return $this->item($model->orderStatus, new OrderStatusTransformer());
    }

    public function includeOrderDetail(Order $model){
        return $this->collection($model->orderDetail, new OrderDetailTransformer());
    }



    protected function getProductNames(Collection $items){
        $names = [];
        foreach($items as $item){
            $names[] = $item->product->name;
        }

        return $names;
    }
}