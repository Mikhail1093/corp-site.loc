<?php
declare(strict_types = 1);

namespace Nova\Http\Controllers\CorpSite\Api;

use Illuminate\Http\Request;
use Nova\Exceptions\IncorrectInputDataException;
use \Nova\Http\Controllers\Controller;
use Nova\Models\CorpSite\Token;

/**
 * Class AppApiController
 *
 * @package Nova\Http\Controllers\CorpSite\Api
 */
class AppApiController extends Controller
{
    /**
     * @var string user api key for application
     */
    protected $apiKey;

    /**
     * @param string $apiKey
     *
     * @return array
     * @throws \Nova\Exceptions\IncorrectInputDataException
     */
    public function checkApiKey(string $apiKey): array//todo точно ли строка а не Request?
    {
        $token = Token::where('key', $apiKey)->get(['key'])->toArray();

        if (0 === count($token)) {
            throw new IncorrectInputDataException('api-key not found', 500);
        }

        return $token;
    }

    /**
     * @return string
     */
    private function getApiKey(): string
    {
        return $this->apiKey;
    }

    /**
     * @param string $apiKey
     *
     * @return AppApiController
     */
    private function setApiKey(string $apiKey)
    {
        $this->apiKey = $apiKey;

        return $this;
    }
}
