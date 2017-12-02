<?php

namespace Nova\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\URL;
use Nova\Models\CorpSite\MainMenu;

/**
 * Class BreadCrumbs
 *
 * @package Nova\Http\Middleware
 */
class BreadCrumbs
{
    protected $breadCrumbs;
    /**
     * Пути, адреса страниц, где не нужна цепочка навигации
     *
     * @var array
     */
    protected $excludePagesPath = [
        '/',
        'contact'
    ];

    /**
     * BreadCrumbs constructor.
     */
    public function __construct(\Nova\CorpSite\BreadCrumbs $breadCrumbs)
    {
        $this->breadCrumbs = $breadCrumbs;
    }

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure                 $next
     *
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $currentUri = $request->path();

        if (!in_array($currentUri, $this->excludePagesPath, true)) {
            $paths = explode('/', $currentUri);

            foreach ($paths as &$path) {
                $path = '/' . $path;
            }

            $pagesName = MainMenu::whereIn('path', $paths)->get(['name'])->toArray();

            $this->breadCrumbs->setBreadCrumbs($pagesName);
        }

        return $next($request);
    }
}
