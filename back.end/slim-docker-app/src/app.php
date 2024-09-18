<?php
namespace App;

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Factory\AppFactory;

class App
{
    private $config;
    private $app;
    private $controllers;

    public function __construct($config, $controllers)
    {
        $this->config = $config;
        $this->app = AppFactory::create();
        $this->controllers = $controllers;
    }

    public function run()
    {
        $this->app->get('/', [$this, 'defaultResponse']);
        $this->app->get('/v1/ping', [$this, 'ping']);
        $this->app->map(['GET', 'POST', 'PUT', 'DELETE', 'PATCH'], '/{routes:.+}', [$this, 'notFound']);
        $this->app->group('/v1/cv', function ($group) {
            $group->any('/{routes:.+}', [$this->controllers['cv'], 'handleRequest']);
        });
        $this->app->run();
    }

    private function generateApiLinks(): array
    {
        $links = [];
        $routes = $this->app->getRouteCollector()->getRoutes();

        foreach ($routes as $route) {
            $pattern = $route->getPattern();
            // Exclude the catch-all route
            if ($pattern !== '/{routes:.+}') {
                $links[ltrim($pattern, '/')] = [
                    'href' => $pattern,
                    'methods' => $route->getMethods(),
                ];
            }
        }

        return $links;
    }

    private function addHateoasLinks(array $data, string $self): array
    {
        $links = $this->generateApiLinks();
        $data['links'] = ['self' => ['href' => $self]] + $links;
        return $data;
    }

    public function defaultResponse(Request $request, Response $response): Response {
        $data = [
            'data' => [
                'type' => 'api_info',
                'attributes' => [
                    'name' => $this->config['api_name'],
                    'version' => $this->config['api_version'],
                    'status' => 'running'
                ]
            ],
            'meta' => [
                'timestamp' => gmdate('Y-m-d\TH:i:s\Z')
            ]
        ];
        
        $data = $this->addHateoasLinks($data, '/');

        $response->getBody()->write(json_encode($data));
        return $response
            ->withHeader('Content-Type', 'application/json')
            ->withStatus(200);
    }

    public function ping(Request $request, Response $response): Response {
        $data = [
            'data' => [
                'type' => 'ping',
                'attributes' => [
                    'message' => 'pong'
                ]
            ],
            'meta' => [
                'timestamp' => gmdate('Y-m-d\TH:i:s\Z')
            ]
        ];

        $data = $this->addHateoasLinks($data, '/api/ping');

        $response->getBody()->write(json_encode($data));
        return $response
            ->withHeader('Content-Type', 'application/json')
            ->withStatus(200);
    }

    public function notFound(Request $request, Response $response): Response
    {
        $data = [
            'errors' => [
                [
                    'status' => '404',
                    'title' => 'Not Found',
                    'detail' => 'The requested resource could not be found.'
                ]
            ],
            'meta' => [
                'timestamp' => gmdate('Y-m-d\TH:i:s\Z')
            ]
        ];

        $response->getBody()->write(json_encode($data));
        return $response
            ->withHeader('Content-Type', 'application/json')
            ->withStatus(404);
    }
}