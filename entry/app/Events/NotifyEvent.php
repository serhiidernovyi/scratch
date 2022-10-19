<?php

namespace App\Events;

use Illuminate\Queue\SerializesModels;
use UseCases\Contracts\Product\Entities\IOrder;

class NotifyEvent
{
    use SerializesModels;

    public IOrder $order;

    /**
     * @param IOrder $order
     */
    public function __construct(IOrder $order)
    {
        $this->order = $order;
    }
}
