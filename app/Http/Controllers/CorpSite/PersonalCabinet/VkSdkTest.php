<?php
declare(strict_types = 1);

namespace Nova\Http\Controllers\CorpSite\PersonalCabinet;

use Illuminate\Http\Request;
use BW\Vkontakte as VK;
use Nova\Http\Controllers\Controller;

/**
 * Class VkSdkTest
 *
 * @package Nova\Http\Controllers\CorpSite\PersonalCabinet
 */
class VkSdkTest extends Controller
{
    public function index()
    {
        $vk = new VK([
          //  'accessToken' => '11581ca0dce1f1aa42c72214cc67487eb50e8a6bde1a2492710be6cf231e91743369e866a667cd0738b8e'
        ]);

        $vk->setAccessToken('11581ca0dce1f1aa42c72214cc67487eb50e8a6bde1a2492710be6cf231e91743369e866a667cd0738b8e');
        dump($vk);
        $data = $vk->api(
            'groups.getMembers',
            [
                'group_id' => 'mytestgrishi'
            ]
        );

        dump($data);

        $data = $vk->api(
            'groups.get',
            [
                'user_id' => '132651266'
            ]
        );

        dump($data);
    }
}


