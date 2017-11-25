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
    /**
     * Пути, адреса страниц, где не нужна цепочка навигации
     *
     * @var array
     */
    protected $excludePagesPath = [
        '/',
        'contact'
    ];

    public static $breadCrumbs;
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
            //dump($paths);
            foreach ($paths as &$path) {
                $path = '/' . $path;
            }

            //dump($paths);
            $pagesName = MainMenu::where('path', $path)->get(['name'])->toArray();
            dump($pagesName);
            //view()->share(['breadCrumbs' => $pagesName]);
        }

        return $next($request);
    }
}
