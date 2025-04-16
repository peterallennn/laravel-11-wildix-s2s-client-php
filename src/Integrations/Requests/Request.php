<?php

namespace Wildix\Integrations\Requests;

use GuzzleHttp\Psr7\Request as BaseRequest;
use GuzzleHttp\Psr7\Stream;
use GuzzleHttp\Psr7\Utils;
use Psr\Http\Message\StreamInterface;

class Request extends BaseRequest implements RequestInterface
{

    private $body;

    /**
     * Request constructor.
     *
     * @param string $method
     * @param string $uri
     * @param array $headers
     * @param array|null $body
     * @param string $version
     */
    public function __construct(string $method, string $uri, array $headers = [], array $body = null, string $version = '1.1')
    {
        parent::__construct($method, $uri, $headers, null, $version);
        $this->body = $body;
    }

    /**
     * Gets the body of the message.
     *
     * @return array|null body.
     */
    public function getBody(): StreamInterface
    {
        if (is_array($this->body)) {
            $this->body = Utils::streamFor(json_encode($this->body));
        }

        return $this->body;
    }
}
