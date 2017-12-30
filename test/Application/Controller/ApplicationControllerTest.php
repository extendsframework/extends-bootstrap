<?php
declare(strict_types=1);

namespace Application\Controller;

use ExtendsFramework\Http\Response\ResponseInterface;
use PHPUnit\Framework\TestCase;

class ApplicationControllerTest extends TestCase
{
    /**
     * Index action.
     *
     * Test that index action will return correct response.
     *
     * @covers \Application\ApplicationModule::getConfig()
     * @covers \Application\Controller\ApplicationController::indexAction()
     */
    public function testIndexAction(): void
    {
        $controller = new ApplicationController();
        $response = $controller->indexAction('John');

        $this->assertInstanceOf(ResponseInterface::class, $response);
        if ($response instanceof ResponseInterface) {
            $this->assertSame([
                'message' => 'Hello John, welcome to this application!',
            ], $response->getBody());
            $this->assertSame(200, $response->getStatusCode());
        }
    }
}
