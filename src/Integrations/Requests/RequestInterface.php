<?php

namespace Wildix\Integrations\Requests;

use Psr\Http\Message\RequestInterface as BaseRequest;
use Psr\Http\Message\StreamInterface;

interface RequestInterface extends BaseRequest
{
    public function getBody(): StreamInterface;
}
