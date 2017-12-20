<?php
declare(strict_types=1);

namespace Nova\Http\Controllers\CorpSite;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Nova\Http\Controllers\Controller;
use Nova\Models\CorpSite\Comment;
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

    /**
     *
     */
    public function testPolicyComment()
    {
        return Comment::where('id', 3)->update(['text' => 'из политики1111s111']);
    }
}
