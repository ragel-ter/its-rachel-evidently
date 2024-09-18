<?php
namespace App\CV;

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

class Controller
{
    private $config;
    private $repository;
    
    public function __construct($config)
    {
        $this->config = $config;
    }

    public function handleRequest(Request $request, Response $response, array $args): Response
    {
        $route = $args['routes'] ?? '';
        $method = $request->getMethod();

        switch ($route) {
            case '':
                return $this->listCVs($request, $response);
            case 'create':
                return $this->createCV($request, $response);
            default:
                if (preg_match('/^(\d+)$/', $route, $matches)) {
                    $cvId = $matches[1];
                    switch ($method) {
                        case 'GET':
                            return $this->getCV($request, $response, $cvId);
                        case 'PUT':
                            return $this->updateCV($request, $response, $cvId);
                        case 'DELETE':
                            return $this->deleteCV($request, $response, $cvId);
                    }
                }
                // If no matching route, return 404
                return $this->notFound($response);
        }
    }

    private function listCVs(Request $request, Response $response): Response
    {
        // Implementation for listing CVs
    }

    private function createCV(Request $request, Response $response): Response
    {
        // Implementation for creating a CV
    }

    private function getCV(Request $request, Response $response, $cvId): Response
    {
        // Implementation for getting a specific CV
    }

    private function updateCV(Request $request, Response $response, $cvId): Response
    {
        // Implementation for updating a specific CV
    }

    private function deleteCV(Request $request, Response $response, $cvId): Response
    {
        // Implementation for deleting a specific CV
    }

    private function notFound(Response $response): Response
    {
        $response->getBody()->write(json_encode(['error' => 'Not Found']));
        return $response
            ->withHeader('Content-Type', 'application/json')
            ->withStatus(404);
    }
}

