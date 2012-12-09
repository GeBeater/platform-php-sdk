<?php

namespace Bigpoint;

class Configuration
{
    /**
     * @var string
     */
    const BASE_URI = 'https://api-dev.bigpoint.net/';

    /**
     * @var Environment
     */
    private $environment;

    /**
     * @var string
     */
    private $clientId;

    /**
     * @var string
     */
    private $clientSecret;

    /**
     * @var string
     */
    private $redirectUri;

    /**
     * @param Environment $environment
     * @param array $config
     */
    public function __construct(
        Environment $environment,
        array $config
    ) {
        $this->environment = $environment;
        $this->clientId = $config['client_id'];
        $this->clientSecret = $config['client_secret'];

        if (true === isset($config['redirect_uri'])) {
            $this->redirectUri = $config['redirect_uri'];
        }
    }

    /**
     * @return string
     */
    public function getBaseUri()
    {
        return static::BASE_URI;
    }

    /**
     * @return string
     */
    public function getClientId()
    {
        return $this->clientId;
    }

    /**
     * @return string
     */
    public function getClientSecret()
    {
        return $this->clientSecret;
    }

    /**
     * @return string
     */
    public function getRedirectURI()
    {
        if (null === $this->redirectUri) {
            return $this->environment->getCurrentURI();
        } else {
            $this->redirectUri;
        }
    }
}
