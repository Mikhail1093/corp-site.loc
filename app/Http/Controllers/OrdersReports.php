<?php

namespace Nova\Http\Controllers;

use Illuminate\Http\Request;
use Nova;
use Nova\CorpSite\SaveOrder;
use Nova\CorpSite\OrdersDataBase;

/**
 * Class OrdersReports
 *
 * @package Nova\Http\Controllers
 */
class OrdersReports extends Controller
{
    /**
     * @param \Nova\CorpSite\SaveOrder $saveOrder
     */
    public function index(SaveOrder $saveOrder)
    {
        $saveOrder->write();
    }
}
