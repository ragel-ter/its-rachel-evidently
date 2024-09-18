<?php
namespace App;

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Factory\AppFactory;

class App
{
    private $config;
    private $app;

    public function __construct($config)
    {
        $this->config = $config;
        $this->app = AppFactory::create();
    }

    public function run()
    {
        $this->app->get('/', [$this, 'defaultResponse']);
        $this->app->get('/api/schema', [$this, 'apiSchema']);
        $this->app->get('/api/ping', [$this, 'ping']);
        $this->app->map(['GET', 'POST', 'PUT', 'DELETE', 'PATCH'], '/{routes:.+}', [$this, 'notFound']);

        $this->app->run();
    }

    private function generateApiSchema(): array
    {
        $schema = [];
        $routes = $this->app->getRouteCollector()->getRoutes();

        foreach ($routes as $route) {
            $schema[] = [
                'path' => $route->getPattern(),
                'method' => implode(', ', $route->getMethods()),
            ];
        }

        return $schema;
    }

    public function apiSchema(Request $request, Response $response): Response {
        $data = [
            'data' => [
                'type' => 'api_schema',
                'attributes' => [
                    'schema' => $this->generateApiSchema()
                ]
            ],
            'meta' => [
                'timestamp' => gmdate('Y-m-d\TH:i:s\Z')
            ]
        ];

        $response->getBody()->write(json_encode($data));
        return $response
            ->withHeader('Content-Type', 'application/json')
            ->withStatus(200);
    }

    public function defaultResponse(Request $request, Response $response): Response {
        $data = [
            'data' => [
                'type' => 'api_info',
                'attributes' => [
                    'name' => $this->config['api_name'],
                    'version' => $this->config['api_version'],
                    'status' => 'running',
                    'schema' => $this->generateApiSchema()
                ]
            ],
            'meta' => [
                'timestamp' => gmdate('Y-m-d\TH:i:s\Z')
            ]
        ];
        
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