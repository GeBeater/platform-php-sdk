<?php

namespace Bigpoint;

class Oauth2Client
{
    /**
     * @var string
     */
    const ACCESS_TOKEN_KEY = 'access_token';

    /**
     * @var Environment
     */
    private $environment;

    /**
     * @var PersistenceInterface
     */
    private $persistence;

    /**
     * @var HttpClient
     */
    private $httpClient;

    /**
     * @var Request
     */
    private $request;

    /**
     * @var Configuration
     */
    private $configuration;

    /**
     * @param Environment $environment
     * @param PersistenceInterface $persistence
     * @param HttpClient $httpClient
     * @param Request $request
     * @param Configuration $configuration
     */
    public function __construct(
        Environment $environment,
        PersistenceInterface $persistence,
        HttpClient $httpClient,
        Request $request,
        Configuration $configuration
    ) {
        $this->environment = $environment;
        $this->persistence = $persistence;
        $this->httpClient = $httpClient;
        $this->request = $request;
        $this->configuration = $configuration;
    }

    /**
     * @param string $code
     */
    public function fetchAccessTokenFromCode($code)
    {
        // TODO replace dummy implementation
        return mt_rand(1, 100000);
    }

    /**
     * Return an access token.
     *
     * @return string|null
     */
    public function getAccessToken()
    {
        $accessToken = $this->persistence->get(ACCESS_TOKEN_KEY, null);

        if (null !== $accessToken) {
            return $accessToken;
        }

        $code = $this->environment->getGetParam('code', null);

        if (null === $code) {
            return null;
        }

        $accessToken = $this->fetchAccessTokenFromCode($code);

        if (null === $accessToken) {
            return null;
        }

        $this->persistence->set(ACCESS_TOKEN_KEY, $accessToken);

        return $accessToken;
    }
}