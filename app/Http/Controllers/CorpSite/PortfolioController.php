<?php
declare(strict_types = 1);

namespace Nova\Http\Controllers\CorpSite;

use Illuminate\Http\Request;
use Nova\Http\Controllers\Controller;

/**
 * Class PortfolioController
 *
 * @package Nova\Http\Controllers\CorpSite
 */
class PortfolioController extends AppController
{
    /**
     *
     */
    public function execute()
    {
        $this->getMainMenu();
    }
}
