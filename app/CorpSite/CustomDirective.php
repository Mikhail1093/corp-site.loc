<?php
declare(strict_types = 1);

/**
 * Created by PhpStorm.
 * User: grishi
 * Date: 01.09.2017
 * Time: 22:13
 */

namespace Nova\CorpSite;

use Illuminate\Support\Facades\Blade;

/**
 * Class CustomDirective
 *
 * @package Nova\CorpSite
 */
class CustomDirective
{
    public static function increment()
    {
        Blade::directive('increment', function () {
            static $i;
            $i++;

            return '<?php echo ' . $i . ' ?>';
        });
    }
}
