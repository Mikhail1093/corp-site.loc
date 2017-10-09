<?php
declare(strict_types = 1);

namespace Nova\CorpSite;

/**
 * Class OrdersReports
 *
 * @package Nova\CorpSite
 */
class OrdersReportsToFile implements SaveOrder
{
    public function write()
    {
        //
        dump('save into file...');

        return __METHOD__;
    }
}
