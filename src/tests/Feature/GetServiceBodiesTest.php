<?php

namespace Tests\Feature;

use App\LegacyConfig;
use App\Models\RootServer;
use App\Models\ServiceBody;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class GetServiceBodiesTest extends TestCase
{
    use RefreshDatabase;

    private function createRootServer(int $sourceId, string $name = 'test', string $url = 'https://test.com'): RootServer
    {
        return RootServer::create([
            'source_id' => $sourceId,
            'name' => $name,
            'url' => $url
        ]);
    }

    private function createZone(string $name, string $description, string $uri = null, string $helpline = null, string $worldId = null, string $email = null)
    {
        return $this->createServiceBody($name, $description, 'ZF', 0, $uri, $helpline, $worldId, $email);
    }

    private function createRegion(string $name, string $description, int $sbOwner, string $uri = null, string $helpline = null, string $worldId = null, string $email = null)
    {
        return $this->createServiceBody($name, $description, 'RS', $sbOwner, $uri, $helpline, $worldId, $email);
    }

    private function createArea(string $name, string $description, int $sbOwner, string $uri = null, string $helpline = null, string $worldId = null, string $email = null)
    {
        return $this->createServiceBody($name, $description, 'AS', $sbOwner, $uri, $helpline, $worldId, $email);
    }

    private function createServiceBody(string $name, string $description, string $sbType, int $sbOwner, string $uri = null, string $helpline = null, string $worldId = null, string $email = null)
    {
        return ServiceBody::create([
            'sb_owner' => $sbOwner,
            'name_string' => $name,
            'description_string' => $description,
            'sb_type' => $sbType,
            'uri_string' => $uri,
            'kml_file_uri_string' => $helpline,
            'worldid_mixed' => $worldId,
            'sb_meeting_email' => $email ?? '',
        ]);
    }

    private function allServiceBodiesInArray($expectedItems, $array): bool
    {
        foreach ($expectedItems as $item) {
            if (!in_array([
                'id' => strval($item->id_bigint),
                'parent_id' => strval($item->sb_owner),
                'name' => $item->name_string,
                'description' => $item->description_string,
                'type' => $item->sb_type,
                'url' => $item->uri_string,
                'helpline' => $item->kml_file_uri_string ?? '',
                'world_id' => $item->worldid_mixed ?? '',
            ], $array)) {
                return false;
            }
        }

        return true;
    }

    private function allServiceBodiesNotInArray($unexpectedItems, $array): bool
    {
        foreach ($unexpectedItems as $item) {
            if (in_array([
                'id' => strval($item->id_bigint),
                'parent_id' => strval($item->sb_owner),
                'name' => $item->name_string,
                'description' => $item->description_string,
                'type' => $item->sb_type,
                'url' => $item->uri_string,
                'helpline' => $item->kml_file_uri_string ?? '',
                'world_id' => $item->worldid_mixed ?? '',
            ], $array)) {
                return false;
            }
        }

        return true;
    }

    protected function tearDown(): void
    {
        LegacyConfig::reset();
        parent::tearDown();
    }

    public function testJsonp()
    {
        $response = $this->get('/client_interface/jsonp/?switcher=GetServiceBodies&callback=asdf');
        $response->assertStatus(200);
        $response->assertHeader('Content-Type', 'text/javascript; charset=UTF-8');
        $this->assertEquals('/**/asdf([]);', $response->content());
    }

    public function testNone()
    {
        $this->get('/client_interface/json/?switcher=GetServiceBodies')
            ->assertStatus(200)
            ->assertHeader('Content-Type', 'application/json')
            ->assertExactJson([]);
    }

    public function testOne()
    {
        $zone = $this->createZone("sezf", "sezf", "https://zone");
        $response = $this->get('/client_interface/json/?switcher=GetServiceBodies')
            ->assertStatus(200)
            ->assertHeader('Content-Type', 'application/json')
            ->assertJsonCount(1)
            ->json();
        $expected = [$zone];
        $this->assertTrue($this->allServiceBodiesInArray($expected, $response));
    }

    public function testFilterIncludeNoArray()
    {
        $zone = $this->createZone("sezf", "sezf");
        $region1 = $this->createRegion("ga", "ga", $zone->id_bigint);
        $region2 = $this->createRegion("nc", "nc", $zone->id_bigint);
        $area1 = $this->createArea("marietta", "marietta", $region1->id_bigint);
        $area2 = $this->createArea("capital area", "capital area", $region2->id_bigint);
        $response = $this->get("/client_interface/json/?switcher=GetServiceBodies&services=$area2->id_bigint")
            ->assertStatus(200)
            ->assertHeader('Content-Type', 'application/json')
            ->assertJsonCount(1)
            ->json();
        $expected = [$area2];
        $this->assertTrue($this->allServiceBodiesInArray($expected, $response));
        $unexpected = [$zone, $region1, $region2, $area1];
        $this->assertTrue($this->allServiceBodiesNotInArray($unexpected, $response));
    }

    public function testFilterIncludeWithArray()
    {
        $zone = $this->createZone("sezf", "sezf");
        $region1 = $this->createRegion("ga", "ga", $zone->id_bigint);
        $region2 = $this->createRegion("nc", "nc", $zone->id_bigint);
        $area1 = $this->createArea("marietta", "marietta", $region1->id_bigint);
        $area2 = $this->createArea("capital area", "capital area", $region2->id_bigint);
        $response = $this->get("/client_interface/json/?switcher=GetServiceBodies&services[]=$area2->id_bigint&services[]=$region1->id_bigint")
            ->assertStatus(200)
            ->assertHeader('Content-Type', 'application/json')
            ->assertJsonCount(2)
            ->json();
        $expected = [$area2, $region1];
        $this->assertTrue($this->allServiceBodiesInArray($expected, $response));
        $unexpected = [$zone, $region2, $area1];
        $this->assertTrue($this->allServiceBodiesNotInArray($unexpected, $response));
    }

    public function testFilterExcludeNoArray()
    {
        $zone = $this->createZone("sezf", "sezf");
        $region1 = $this->createRegion("ga", "ga", $zone->id_bigint);
        $region2 = $this->createRegion("nc", "nc", $zone->id_bigint);
        $area1 = $this->createArea("marietta", "marietta", $region1->id_bigint);
        $area2 = $this->createArea("capital area", "capital area", $region2->id_bigint);
        $response = $this->get("/client_interface/json/?switcher=GetServiceBodies&services=-$area1->id_bigint")
            ->assertStatus(200)
            ->assertHeader('Content-Type', 'application/json')
            ->assertJsonCount(4)
            ->json();
        $expected = [$zone, $region1, $region2, $area2];
        $this->assertTrue($this->allServiceBodiesInArray($expected, $response));
        $unexpected = [$area1];
        $this->assertTrue($this->allServiceBodiesNotInArray($unexpected, $response));
    }

    public function testFilterExcludeWithArray()
    {
        $zone = $this->createZone("sezf", "sezf");
        $region1 = $this->createRegion("ga", "ga", $zone->id_bigint);
        $region2 = $this->createRegion("nc", "nc", $zone->id_bigint);
        $area1 = $this->createArea("marietta", "marietta", $region1->id_bigint);
        $area2 = $this->createArea("capital area", "capital area", $region2->id_bigint);
        $response = $this->get("/client_interface/json/?switcher=GetServiceBodies&services[]=-$region2->id_bigint&services[]=-$area2->id_bigint")
            ->assertStatus(200)
            ->assertHeader('Content-Type', 'application/json')
            ->assertJsonCount(3)
            ->json();
        $expected = [$zone, $region1, $area1];
        $this->assertTrue($this->allServiceBodiesInArray($expected, $response));
        $unexpected = [$region2, $area2];
        $this->assertTrue($this->allServiceBodiesNotInArray($unexpected, $response));
    }

    public function testRecursiveFromZone()
    {
        $zone = $this->createZone("sezf", "sezf");
        $zone2 = $this->createZone("nezf", "nezf");
        $region1 = $this->createRegion("ga", "ga", $zone->id_bigint);
        $region2 = $this->createRegion("nc", "nc", $zone->id_bigint);
        $area1 = $this->createArea("marietta", "marietta", $region1->id_bigint);
        $area2 = $this->createArea("capital area", "capital area", $region2->id_bigint);
        $response = $this->get("/client_interface/json/?switcher=GetServiceBodies&services=$zone->id_bigint&recursive=1")
            ->assertStatus(200)
            ->assertHeader('Content-Type', 'application/json')
            ->assertJsonCount(5)
            ->json();
        $expected = [$zone, $region1, $region2, $area1, $area2];
        $this->assertTrue($this->allServiceBodiesInArray($expected, $response));
        $unexpected = [$zone2];
        $this->assertTrue($this->allServiceBodiesNotInArray($unexpected, $response));
    }

    public function testRecursiveFromOneRegion()
    {
        $zone = $this->createZone("sezf", "sezf");
        $region1 = $this->createRegion("ga", "ga", $zone->id_bigint);
        $region2 = $this->createRegion("nc", "nc", $zone->id_bigint);
        $area1 = $this->createArea("marietta", "marietta", $region1->id_bigint);
        $area2 = $this->createArea("capital area", "capital area", $region2->id_bigint);
        $response = $this->get("/client_interface/json/?switcher=GetServiceBodies&services=$region1->id_bigint&recursive=1")
            ->assertStatus(200)
            ->assertHeader('Content-Type', 'application/json')
            ->assertJsonCount(2)
            ->json();
        $expected = [$region1, $area1];
        $this->assertTrue($this->allServiceBodiesInArray($expected, $response));
        $unexpected = [$zone, $region2, $area2];
        $this->assertTrue($this->allServiceBodiesNotInArray($unexpected, $response));
    }

    public function testRecursiveFromMultipleRegions()
    {
        $zone = $this->createZone("sezf", "sezf");
        $region1 = $this->createRegion("ga", "ga", $zone->id_bigint);
        $region2 = $this->createRegion("nc", "nc", $zone->id_bigint);
        $area1 = $this->createArea("marietta", "marietta", $region1->id_bigint);
        $area2 = $this->createArea("capital area", "capital area", $region2->id_bigint);
        $response = $this->get("/client_interface/json/?switcher=GetServiceBodies&services[]=$region1->id_bigint&services[]=$region2->id_bigint&recursive=1")
            ->assertStatus(200)
            ->assertHeader('Content-Type', 'application/json')
            ->assertJsonCount(4)
            ->json();
        $expected = [$region1, $area1, $region2, $area2];
        $this->assertTrue($this->allServiceBodiesInArray($expected, $response));
        $unexpected = [$zone];
        $this->assertTrue($this->allServiceBodiesNotInArray($unexpected, $response));
    }

    public function testRecursiveFromArea()
    {
        $zone = $this->createZone("sezf", "sezf");
        $region1 = $this->createRegion("ga", "ga", $zone->id_bigint);
        $region2 = $this->createRegion("nc", "nc", $zone->id_bigint);
        $area1 = $this->createArea("marietta", "marietta", $region1->id_bigint);
        $area2 = $this->createArea("capital area", "capital area", $region2->id_bigint);
        $response = $this->get("/client_interface/json/?switcher=GetServiceBodies&services=$area1->id_bigint&recursive=1")
            ->assertStatus(200)
            ->assertHeader('Content-Type', 'application/json')
            ->assertJsonCount(1)
            ->json();
        $expected = [$area1];
        $this->assertTrue($this->allServiceBodiesInArray($expected, $response));
        $unexpected = [$zone, $region1, $region2, $area2];
        $this->assertTrue($this->allServiceBodiesNotInArray($unexpected, $response));
    }

    public function testParentsFromZone()
    {
        $zone = $this->createZone("sezf", "sezf");
        $zone2 = $this->createZone("nezf", "nezf");
        $region1 = $this->createRegion("ga", "ga", $zone->id_bigint);
        $region2 = $this->createRegion("nc", "nc", $zone->id_bigint);
        $area1 = $this->createArea("marietta", "marietta", $region1->id_bigint);
        $area2 = $this->createArea("capital area", "capital area", $region2->id_bigint);
        $response = $this->get("/client_interface/json/?switcher=GetServiceBodies&services=$zone->id_bigint&parents=1")
            ->assertStatus(200)
            ->assertHeader('Content-Type', 'application/json')
            ->assertJsonCount(1)
            ->json();
        $expected = [$zone];
        $this->assertTrue($this->allServiceBodiesInArray($expected, $response));
        $unexpected = [$zone2, $region1, $region2, $area1, $area2];
        $this->assertTrue($this->allServiceBodiesNotInArray($unexpected, $response));
    }

    public function testParentsFromOneRegion()
    {
        $zone = $this->createZone("sezf", "sezf");
        $zone2 = $this->createZone("nezf", "nezf");
        $region1 = $this->createRegion("ga", "ga", $zone->id_bigint);
        $region2 = $this->createRegion("nc", "nc", $zone->id_bigint);
        $area1 = $this->createArea("marietta", "marietta", $region1->id_bigint);
        $area2 = $this->createArea("capital area", "capital area", $region2->id_bigint);
        $response = $this->get("/client_interface/json/?switcher=GetServiceBodies&services=$region1->id_bigint&parents=1")
            ->assertStatus(200)
            ->assertHeader('Content-Type', 'application/json')
            ->assertJsonCount(2)
            ->json();
        $expected = [$zone, $region1];
        $this->assertTrue($this->allServiceBodiesInArray($expected, $response));
        $unexpected = [$zone2, $region2, $area1, $area2];
        $this->assertTrue($this->allServiceBodiesNotInArray($unexpected, $response));
    }

    public function testParentsFromMultipleRegions()
    {
        $zone = $this->createZone("sezf", "sezf");
        $zone2 = $this->createZone("nezf", "nezf");
        $region1 = $this->createRegion("ga", "ga", $zone->id_bigint);
        $region2 = $this->createRegion("nc", "nc", $zone2->id_bigint);
        $area1 = $this->createArea("marietta", "marietta", $region1->id_bigint);
        $area2 = $this->createArea("capital area", "capital area", $region2->id_bigint);
        $response = $this->get("/client_interface/json/?switcher=GetServiceBodies&services[]=$region1->id_bigint&services[]=$region2->id_bigint&parents=1")
            ->assertStatus(200)
            ->assertHeader('Content-Type', 'application/json')
            ->assertJsonCount(4)
            ->json();
        $expected = [$zone, $region1, $zone2, $region2];
        $this->assertTrue($this->allServiceBodiesInArray($expected, $response));
        $unexpected = [$area1, $area2];
        $this->assertTrue($this->allServiceBodiesNotInArray($unexpected, $response));
    }

    public function testParentsFromOneArea()
    {
        $zone = $this->createZone("sezf", "sezf");
        $zone2 = $this->createZone("nezf", "nezf");
        $region1 = $this->createRegion("ga", "ga", $zone->id_bigint);
        $region2 = $this->createRegion("nc", "nc", $zone->id_bigint);
        $area1 = $this->createArea("marietta", "marietta", $region1->id_bigint);
        $area2 = $this->createArea("capital area", "capital area", $region2->id_bigint);
        $response = $this->get("/client_interface/json/?switcher=GetServiceBodies&services=$area1->id_bigint&parents=1")
            ->assertStatus(200)
            ->assertHeader('Content-Type', 'application/json')
            ->assertJsonCount(3)
            ->json();
        $expected = [$zone, $region1, $area1];
        $this->assertTrue($this->allServiceBodiesInArray($expected, $response));
        $unexpected = [$zone2, $region2, $area2];
        $this->assertTrue($this->allServiceBodiesNotInArray($unexpected, $response));
    }

    public function testParentsFromMultipleAreas()
    {
        $zone = $this->createZone("sezf", "sezf");
        $zone2 = $this->createZone("nezf", "nezf");
        $region1 = $this->createRegion("ga", "ga", $zone->id_bigint);
        $region2 = $this->createRegion("nc", "nc", $zone->id_bigint);
        $area1 = $this->createArea("marietta", "marietta", $region1->id_bigint);
        $area2 = $this->createArea("capital area", "capital area", $region2->id_bigint);
        $response = $this->get("/client_interface/json/?switcher=GetServiceBodies&services[]=$area1->id_bigint&services[]=$area2->id_bigint&parents=1")
            ->assertStatus(200)
            ->assertHeader('Content-Type', 'application/json')
            ->assertJsonCount(5)
            ->json();
        $expected = [$zone, $region1, $region2, $area1, $area2];
        $this->assertTrue($this->allServiceBodiesInArray($expected, $response));
        $unexpected = [$zone2];
        $this->assertTrue($this->allServiceBodiesNotInArray($unexpected, $response));
    }

    public function testExcludeParents()
    {
        $zone = $this->createZone("sezf", "sezf");
        $zone2 = $this->createZone("nezf", "nezf");
        $region1 = $this->createRegion("ga", "ga", $zone->id_bigint);
        $region2 = $this->createRegion("nc", "nc", $zone2->id_bigint);
        $area1 = $this->createArea("marietta", "marietta", $region1->id_bigint);
        $area2 = $this->createArea("capital area", "capital area", $region2->id_bigint);
        $response = $this->get("/client_interface/json/?switcher=GetServiceBodies&services[]=-$region1->id_bigint&services[]=-$region2->id_bigint&parents=1")
            ->assertStatus(200)
            ->assertHeader('Content-Type', 'application/json')
            ->assertJsonCount(2)
            ->json();
        $expected = [$area1, $area2];
        $this->assertTrue($this->allServiceBodiesInArray($expected, $response));
        $unexpected = [$zone, $zone2, $region1, $region2];
        $this->assertTrue($this->allServiceBodiesNotInArray($unexpected, $response));
    }

    public function testExcludeChildren()
    {
        $zone = $this->createZone("sezf", "sezf");
        $zone2 = $this->createZone("nezf", "nezf");
        $region1 = $this->createRegion("ga", "ga", $zone->id_bigint);
        $region2 = $this->createRegion("nc", "nc", $zone2->id_bigint);
        $area1 = $this->createArea("marietta", "marietta", $region1->id_bigint);
        $area2 = $this->createArea("capital area", "capital area", $region2->id_bigint);
        $response = $this->get("/client_interface/json/?switcher=GetServiceBodies&services[]=-$region1->id_bigint&services[]=-$region2->id_bigint&recursive=1")
            ->assertStatus(200)
            ->assertHeader('Content-Type', 'application/json')
            ->assertJsonCount(2)
            ->json();
        $expected = [$zone, $zone2];
        $this->assertTrue($this->allServiceBodiesInArray($expected, $response));
        $unexpected = [$region1, $region2, $area1, $area2];
        $this->assertTrue($this->allServiceBodiesNotInArray($unexpected, $response));
    }

    public function textExcludeIncludeParentsAndRecursive()
    {
        $zone = $this->createZone("sezf", "sezf");
        $zone2 = $this->createZone("nezf", "nezf");
        $region1 = $this->createRegion("ga", "ga", $zone->id_bigint);
        $region2 = $this->createRegion("nc", "nc", $zone2->id_bigint);
        $area1 = $this->createArea("marietta", "marietta", $region1->id_bigint);
        $area2 = $this->createArea("capital area", "capital area", $region2->id_bigint);
        $response = $this->get("/client_interface/json/?switcher=GetServiceBodies&services[]=$region1->id_bigint&services[]=-$region2->id_bigint&recursive=1&parents=1")
            ->assertStatus(200)
            ->assertHeader('Content-Type', 'application/json')
            ->assertJsonCount(3)
            ->json();
        $expected = [$zone, $region1, $area1];
        $this->assertTrue($this->allServiceBodiesInArray($expected, $response));
        $unexpected = [$zone2, $region2, $area2];
        $this->assertTrue($this->allServiceBodiesNotInArray($unexpected, $response));
    }

    public function testRootServerIdWithAggregatorDisabled()
    {
        $rootServer = $this->createRootServer(1);
        $zone = $this->createZone("sezf", "sezf", "https://zone");
        $zone->rootServer()->associate($rootServer);
        $zone->save();
        $response = $this->get('/client_interface/json/?switcher=GetServiceBodies')
            ->assertStatus(200)
            ->assertHeader('Content-Type', 'application/json')
            ->assertJsonCount(1)
            ->json();
        self::assertArrayNotHasKey('root_server_id', $response[0]);
    }

    public function testRootServerIdWithAggregatorEnabled()
    {
        LegacyConfig::set('aggregator_mode_enabled', true);
        $rootServer = $this->createRootServer(1);
        $zone = $this->createZone("sezf", "sezf", "https://zone");
        $zone->rootServer()->associate($rootServer);
        $zone->save();
        $response = $this->get('/client_interface/json/?switcher=GetServiceBodies')
            ->assertStatus(200)
            ->assertHeader('Content-Type', 'application/json')
            ->assertJsonCount(1)
            ->json();
        self::assertEquals($rootServer->id, $response[0]['root_server_id']);
    }

    // root server ids
    //
    //
    public function testRootServerIdsWithAggregatorDisabled()
    {
        $rootServer1 = $this->createRootServer(1);
        $serviceBody1 = $this->createZone("sezf", "sezf");
        $serviceBody1->rootServer()->associate($rootServer1);
        $serviceBody1->save();
        $badId = $rootServer1->id + 1;
        $this->get("/client_interface/json/?switcher=GetServiceBodies&root_server_ids=$badId")
            ->assertStatus(200)
            ->assertJsonCount(1);
    }

    public function testRootServerIdsNone()
    {
        LegacyConfig::set('aggregator_mode_enabled', true);

        $rootServer1 = $this->createRootServer(1);
        $serviceBody1 = $this->createZone("sezf", "sezf");
        $serviceBody1->rootServer()->associate($rootServer1);
        $serviceBody1->save();
        $badId = $rootServer1->id + 1;
        $this->get("/client_interface/json/?switcher=GetServiceBodies&root_server_ids=$badId")
            ->assertStatus(200)
            ->assertJsonCount(0);
    }

    public function testRootServerIdsIncludeOne()
    {
        LegacyConfig::set('aggregator_mode_enabled', true);

        $rootServer1 = $this->createRootServer(1);
        $serviceBody1 = $this->createZone("sezf", "sezf");
        $serviceBody1->rootServer()->associate($rootServer1);
        $serviceBody1->save();

        $rootServer2 = $this->createRootServer(2);
        $serviceBody2 = $this->createZone("sezf2", "sezf2");
        $serviceBody2->rootServer()->associate($rootServer2);
        $serviceBody2->save();

        $this->get("/client_interface/json/?switcher=GetServiceBodies&root_server_ids=$rootServer1->id")
            ->assertStatus(200)
            ->assertJsonCount(1)
            ->assertJsonFragment(['id' => strval($serviceBody1->id_bigint)]);
    }

    public function testRootServerIdsIncludeTwo()
    {
        LegacyConfig::set('aggregator_mode_enabled', true);

        $rootServer1 = $this->createRootServer(1);
        $serviceBody1 = $this->createZone("sezf", "sezf");
        $serviceBody1->rootServer()->associate($rootServer1);
        $serviceBody1->save();

        $rootServer2 = $this->createRootServer(2);
        $serviceBody2 = $this->createZone("sezf2", "sezf2");
        $serviceBody2->rootServer()->associate($rootServer2);
        $serviceBody2->save();

        $rootServer3 = $this->createRootServer(3);
        $serviceBody3 = $this->createZone("sezf3", "sezf3");
        $serviceBody3->rootServer()->associate($rootServer3);
        $serviceBody3->save();

        $this->get("/client_interface/json/?switcher=GetServiceBodies&root_server_ids[]=$rootServer2->id&root_server_ids[]=$rootServer3->id")
            ->assertStatus(200)
            ->assertJsonCount(2)
            ->assertJsonFragment(['id' => strval($serviceBody2->id_bigint)])
            ->assertJsonFragment(['id' => strval($serviceBody3->id_bigint)]);
    }

    public function testRootServerIdsExcludeOne()
    {
        LegacyConfig::set('aggregator_mode_enabled', true);

        $rootServer1 = $this->createRootServer(1);
        $serviceBody1 = $this->createZone("sezf", "sezf");
        $serviceBody1->rootServer()->associate($rootServer1);
        $serviceBody1->save();

        $rootServer2 = $this->createRootServer(2);
        $serviceBody2 = $this->createZone("sezf2", "sezf2");
        $serviceBody2->rootServer()->associate($rootServer2);
        $serviceBody2->save();

        $this->get("/client_interface/json/?switcher=GetServiceBodies&root_server_ids=-$rootServer2->id")
            ->assertStatus(200)
            ->assertJsonCount(1)
            ->assertJsonFragment(['id' => strval($serviceBody1->id_bigint)]);
    }

    public function testRootServerIdsExcludeTwo()
    {
        LegacyConfig::set('aggregator_mode_enabled', true);

        $rootServer1 = $this->createRootServer(1);
        $serviceBody1 = $this->createZone("sezf", "sezf");
        $serviceBody1->rootServer()->associate($rootServer1);
        $serviceBody1->save();

        $rootServer2 = $this->createRootServer(2);
        $serviceBody2 = $this->createZone("sezf2", "sezf2");
        $serviceBody2->rootServer()->associate($rootServer2);
        $serviceBody2->save();

        $rootServer3 = $this->createRootServer(3);
        $serviceBody3 = $this->createZone("sezf3", "sezf3");
        $serviceBody3->rootServer()->associate($rootServer3);
        $serviceBody3->save();

        $this->get("/client_interface/json/?switcher=GetServiceBodies&root_server_ids[]=-$rootServer2->id&root_server_ids[]=-$rootServer3->id")
            ->assertStatus(200)
            ->assertJsonCount(1)
            ->assertJsonFragment(['id' => strval($serviceBody1->id_bigint)]);
    }
}
