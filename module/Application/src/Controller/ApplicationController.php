<?php
declare(strict_types=1);

namespace Application\Controller;

use ExtendsFramework\Http\Response\Response;
use ExtendsFramework\Http\Response\ResponseInterface;
use ExtendsFramework\Router\Controller\AbstractController;

class ApplicationController extends AbstractController
{
    /**
     * Application index.
     *
     * @param string $name
     * @return ResponseInterface
     */
    public function indexAction(string $name): ResponseInterface
    {
        return (new Response())->withBody([
            'message' => sprintf(
                'Hello %s, welcome to this application!',
                $name
            ),
        ]);
    }
}
