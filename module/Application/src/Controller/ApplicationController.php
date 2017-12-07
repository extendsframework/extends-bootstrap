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
     * @return ResponseInterface
     */
    public function indexAction(): ResponseInterface
    {
        return (new Response())->withBody([
            'message' => 'Welcome to this application!',
        ]);
    }
}
