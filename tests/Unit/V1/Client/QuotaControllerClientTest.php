<?php
/*
 * Copyright 2023 Google LLC
 *
 * Licensed under the Apache License, Version 2.0 (the "License");
 * you may not use this file except in compliance with the License.
 * You may obtain a copy of the License at
 *
 *     https://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS,
 * WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 * See the License for the specific language governing permissions and
 * limitations under the License.
 */

/*
 * GENERATED CODE WARNING
 * This file was automatically generated - do not edit!
 */

namespace Google\Cloud\ServiceControl\Tests\Unit\V1\Client;

use Google\ApiCore\ApiException;
use Google\ApiCore\CredentialsWrapper;
use Google\ApiCore\Testing\GeneratedTest;
use Google\ApiCore\Testing\MockTransport;
use Google\Cloud\ServiceControl\V1\AllocateQuotaRequest;
use Google\Cloud\ServiceControl\V1\AllocateQuotaResponse;
use Google\Cloud\ServiceControl\V1\Client\QuotaControllerClient;
use Google\Rpc\Code;
use stdClass;

/**
 * @group servicecontrol
 *
 * @group gapic
 */
class QuotaControllerClientTest extends GeneratedTest
{
    /** @return TransportInterface */
    private function createTransport($deserialize = null)
    {
        return new MockTransport($deserialize);
    }

    /** @return CredentialsWrapper */
    private function createCredentials()
    {
        return $this->getMockBuilder(CredentialsWrapper::class)->disableOriginalConstructor()->getMock();
    }

    /** @return QuotaControllerClient */
    private function createClient(array $options = [])
    {
        $options += [
            'credentials' => $this->createCredentials(),
        ];
        return new QuotaControllerClient($options);
    }

    /** @test */
    public function allocateQuotaTest()
    {
        $transport = $this->createTransport();
        $gapicClient = $this->createClient([
            'transport' => $transport,
        ]);
        $this->assertTrue($transport->isExhausted());
        // Mock response
        $operationId = 'operationId-274116877';
        $serviceConfigId2 = 'serviceConfigId2-10425759';
        $expectedResponse = new AllocateQuotaResponse();
        $expectedResponse->setOperationId($operationId);
        $expectedResponse->setServiceConfigId($serviceConfigId2);
        $transport->addResponse($expectedResponse);
        $request = new AllocateQuotaRequest();
        $response = $gapicClient->allocateQuota($request);
        $this->assertEquals($expectedResponse, $response);
        $actualRequests = $transport->popReceivedCalls();
        $this->assertSame(1, count($actualRequests));
        $actualFuncCall = $actualRequests[0]->getFuncCall();
        $actualRequestObject = $actualRequests[0]->getRequestObject();
        $this->assertSame('/google.api.servicecontrol.v1.QuotaController/AllocateQuota', $actualFuncCall);
        $this->assertTrue($transport->isExhausted());
    }

    /** @test */
    public function allocateQuotaExceptionTest()
    {
        $transport = $this->createTransport();
        $gapicClient = $this->createClient([
            'transport' => $transport,
        ]);
        $this->assertTrue($transport->isExhausted());
        $status = new stdClass();
        $status->code = Code::DATA_LOSS;
        $status->details = 'internal error';
        $expectedExceptionMessage  = json_encode([
            'message' => 'internal error',
            'code' => Code::DATA_LOSS,
            'status' => 'DATA_LOSS',
            'details' => [],
        ], JSON_PRETTY_PRINT);
        $transport->addResponse(null, $status);
        $request = new AllocateQuotaRequest();
        try {
            $gapicClient->allocateQuota($request);
            // If the $gapicClient method call did not throw, fail the test
            $this->fail('Expected an ApiException, but no exception was thrown.');
        } catch (ApiException $ex) {
            $this->assertEquals($status->code, $ex->getCode());
            $this->assertEquals($expectedExceptionMessage, $ex->getMessage());
        }
        // Call popReceivedCalls to ensure the stub is exhausted
        $transport->popReceivedCalls();
        $this->assertTrue($transport->isExhausted());
    }

    /** @test */
    public function allocateQuotaAsyncTest()
    {
        $transport = $this->createTransport();
        $gapicClient = $this->createClient([
            'transport' => $transport,
        ]);
        $this->assertTrue($transport->isExhausted());
        // Mock response
        $operationId = 'operationId-274116877';
        $serviceConfigId2 = 'serviceConfigId2-10425759';
        $expectedResponse = new AllocateQuotaResponse();
        $expectedResponse->setOperationId($operationId);
        $expectedResponse->setServiceConfigId($serviceConfigId2);
        $transport->addResponse($expectedResponse);
        $request = new AllocateQuotaRequest();
        $response = $gapicClient->allocateQuotaAsync($request)->wait();
        $this->assertEquals($expectedResponse, $response);
        $actualRequests = $transport->popReceivedCalls();
        $this->assertSame(1, count($actualRequests));
        $actualFuncCall = $actualRequests[0]->getFuncCall();
        $actualRequestObject = $actualRequests[0]->getRequestObject();
        $this->assertSame('/google.api.servicecontrol.v1.QuotaController/AllocateQuota', $actualFuncCall);
        $this->assertTrue($transport->isExhausted());
    }
}