<?php
declare(strict_types = 1);

namespace Nova\CorpSite;

/**
 * Class OrdersDataBase
 *
 * @package Nova\CorpSite
 */
class OrdersDataBase implements SaveOrder
{
    public function write()
    {
        dump('save into db...');

        return __METHOD__;
    }
}
