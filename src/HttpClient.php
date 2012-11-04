<?php

abstract class HttpClient
{
    /**
     * @var RequestInterface
     */
    private $request;

    /**
     * @var ResponseInterface
     */
    private $response;

    /**
     * @param Request $request
     * @param Response $response
     * @param array $queryParameter
     */
    public function __construct(
        Request $request,
        Response $response
    ){
        $this->request = $request;
        $this->response = $response;
    }

    /**
     * @return Response
     */
    abstract public function send();
}