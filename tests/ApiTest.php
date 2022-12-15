<?php

namespace App\Tests;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class ApiTest extends WebTestCase
{
    public function testMutationCreate(): void
    {
        $query = <<<'EOF'
        mutation RootMutation {
            createCarBrand(carbrand: {
            brand_name:"Mercedes"
            year:1928
            }) {
            brand_name
            year
            }
        }
        EOF;

        $jsonExpected = '{"data":{"createCarBrand":{"brand_name":"Mercedes","year":1928}}}';
        $response = static::createClient();
        $response->request('GET', '/', ['query' => $query], []);
        $result = $response->getResponse()->getContent();
        $this->assertResponseIsSuccessful();
        $this->assertEquals(json_decode($jsonExpected, true), json_decode($result, true), $result);
    }

    public function testQueryById(): void
    {
        $query = <<<'EOF'
        query RootQuery {
            carbrand(id:1) {
            brand_name
            year
            }
        }
        EOF;
    
        $jsonExpected = '{"data":{"carbrand":{"brand_name":"Mercedes","year":1928}}}';
        $response = static::createClient();
        $response->request('GET', '/', ['query' => $query], []);
        $result = $response->getResponse()->getContent();
        $this->assertResponseIsSuccessful();
        $this->assertEquals(json_decode($jsonExpected, true), json_decode($result, true), $result);
    }

    public function testMutationUpdate(): void
    {
        $query = <<<'EOF'
        mutation RootMutation {
            updateCarBrand(id:1, carbrand: {
            brand_name:"Mazda"
            year:1920
            }) {
            brand_name
            year
            }
        }
        EOF;

        $jsonExpected = '{"data":{"updateCarBrand":{"brand_name":"Mazda","year":1920}}}';
        $response = static::createClient();
        $response->request('GET', '/', ['query' => $query], []);
        $result = $response->getResponse()->getContent();
        $this->assertResponseIsSuccessful();
        $this->assertEquals(json_decode($jsonExpected, true), json_decode($result, true), $result);
    }

    public function testMutationDelete(): void
    {
        $query = <<<'EOF'
        mutation RootMutation {
            deleteCarBrand(id:1) {
            id
            }
        }
        EOF;

        $Expected = '{"data":{"deleteCarBrand":null}}';
        $response = static::createClient();
        $response->request('GET', '/', ['query' => $query], []);
        $result = $response->getResponse()->getContent();
        $this->assertResponseIsSuccessful();
        $this->assertEquals(json_decode($Expected, true), json_decode($result, true), $result);
    }

    public function testQueryByWrongId(): void
    {
        $query = <<<'EOF'
        query RootQuery {
            carbrand(id:"asds") {
            brand_name
            year
            }
        }
        EOF;

        $jsonExpected = '{"errors":[{"message":"No car with this id: asds"}]}';
        $response = static::createClient();
        $response->request('GET', '/', ['query' => $query], []);
        $result = $response->getResponse()->getContent();
        $this->assertResponseIsSuccessful();
        $this->assertEquals(json_decode($jsonExpected, true)['errors'][0]['message'], json_decode($result, true)['errors'][0]['message'], $result);
    }
}
