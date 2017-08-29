<?php
declare(strict_types = 1);

namespace Nova\Http\Controllers\CorpSite;

use Illuminate\Http\Request;
use Nova\Http\Controllers\Controller;
use Nova\Providers\CorpSite\TestProv;

/**
 * Class TestComt
 *
 * @package Nova\Http\Controllers\CorpSite
 */
class TestComt extends Controller
{
    /**
     * @return string
     */
    public function execute(): string
    {
        
        return __METHOD__ . ' test';
    }
}
