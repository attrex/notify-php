<?php
/**
 * SmsApi
 * PHP version 5
 *
 * @category Class
 * @package  NotifyLk
 * @author   http://github.com/swagger-api/swagger-codegen
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache License v2
 * @link     https://github.com/swagger-api/swagger-codegen
 */

/**
 * Notify.lk API
 *
 * Send SMS with Notify.lk
 *
 * OpenAPI spec version: v1
 * 
 * Generated by: https://github.com/swagger-api/swagger-codegen.git
 */

/**
 * NOTE: This class is auto generated by the swagger code generator program.
 * https://github.com/swagger-api/swagger-codegen
 * Do not edit the class manually.
 */

namespace NotifyLk\NotifyLk\Api;

use GuzzleHttp\Client;
use GuzzleHttp\ClientInterface;
use GuzzleHttp\Exception\RequestException;
use GuzzleHttp\Psr7\MultipartStream;
use GuzzleHttp\Psr7\Request;
use GuzzleHttp\RequestOptions;
use NotifyLk\ApiException;
use NotifyLk\Configuration;
use NotifyLk\HeaderSelector;
use NotifyLk\ObjectSerializer;

/**
 * SmsApi Class Doc Comment
 *
 * @category Class
 * @package  NotifyLk
 * @author   http://github.com/swagger-api/swagger-codegen
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache License v2
 * @link     https://github.com/swagger-api/swagger-codegen
 */
class SmsApi
{
    /**
     * @var ClientInterface
     */
    protected $client;

    /**
     * @var Configuration
     */
    protected $config;

    /**
     * @param ClientInterface $client
     * @param Configuration   $config
     * @param HeaderSelector  $selector
     */
    public function __construct(
        ClientInterface $client = null,
        Configuration $config = null,
        HeaderSelector $selector = null
    ) {
        $this->client = $client ?: new Client();
        $this->config = $config ?: new Configuration();
        $this->headerSelector = $selector ?: new HeaderSelector();
    }

    /**
     * @return Configuration
     */
    public function getConfig()
    {
        return $this->config;
    }

    /**
     * Operation getStatus
     *
     * Retrieve the account status
     *
     * @param  string $user_id API User ID - Can be found in your settings page. (required)
     * @param  string $api_key API Key - Can be found in your settings page. (required)
     *
     * @throws \NotifyLk\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return void
     */
    public function getStatus($user_id, $api_key)
    {
        $this->getStatusWithHttpInfo($user_id, $api_key);
    }

    /**
     * Operation getStatusWithHttpInfo
     *
     * Retrieve the account status
     *
     * @param  string $user_id API User ID - Can be found in your settings page. (required)
     * @param  string $api_key API Key - Can be found in your settings page. (required)
     *
     * @throws \NotifyLk\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of null, HTTP status code, HTTP response headers (array of strings)
     */
    public function getStatusWithHttpInfo($user_id, $api_key)
    {
        $returnType = '';
        $request = $this->getStatusRequest($user_id, $api_key);

        try {
            $options = $this->createHttpClientOption();
            try {
                $response = $this->client->send($request, $options);
            } catch (RequestException $e) {
                throw new ApiException(
                    "[{$e->getCode()}] {$e->getMessage()}",
                    $e->getCode(),
                    $e->getResponse() ? $e->getResponse()->getHeaders() : null,
                    $e->getResponse()->getBody()->getContents()
                );
            }

            $statusCode = $response->getStatusCode();

            if ($statusCode < 200 || $statusCode > 299) {
                throw new ApiException(
                    sprintf(
                        '[%d] Error connecting to the API (%s)',
                        $statusCode,
                        $request->getUri()
                    ),
                    $statusCode,
                    $response->getHeaders(),
                    $response->getBody()
                );
            }

            return [null, $statusCode, $response->getHeaders()];

        } catch (ApiException $e) {
            switch ($e->getCode()) {
            }
            throw $e;
        }
    }

    /**
     * Operation getStatusAsync
     *
     * Retrieve the account status
     *
     * @param  string $user_id API User ID - Can be found in your settings page. (required)
     * @param  string $api_key API Key - Can be found in your settings page. (required)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function getStatusAsync($user_id, $api_key)
    {
        return $this->getStatusAsyncWithHttpInfo($user_id, $api_key)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation getStatusAsyncWithHttpInfo
     *
     * Retrieve the account status
     *
     * @param  string $user_id API User ID - Can be found in your settings page. (required)
     * @param  string $api_key API Key - Can be found in your settings page. (required)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function getStatusAsyncWithHttpInfo($user_id, $api_key)
    {
        $returnType = '';
        $request = $this->getStatusRequest($user_id, $api_key);

        return $this->client
            ->sendAsync($request, $this->createHttpClientOption())
            ->then(
                function ($response) use ($returnType) {
                    return [null, $response->getStatusCode(), $response->getHeaders()];
                },
                function ($exception) {
                    $response = $exception->getResponse();
                    $statusCode = $response->getStatusCode();
                    throw new ApiException(
                        sprintf(
                            '[%d] Error connecting to the API (%s)',
                            $statusCode,
                            $exception->getRequest()->getUri()
                        ),
                        $statusCode,
                        $response->getHeaders(),
                        $response->getBody()
                    );
                }
            );
    }

    /**
     * Create request for operation 'getStatus'
     *
     * @param  string $user_id API User ID - Can be found in your settings page. (required)
     * @param  string $api_key API Key - Can be found in your settings page. (required)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    protected function getStatusRequest($user_id, $api_key)
    {
        // verify the required parameter 'user_id' is set
        if ($user_id === null) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $user_id when calling getStatus'
            );
        }
        // verify the required parameter 'api_key' is set
        if ($api_key === null) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $api_key when calling getStatus'
            );
        }

        $resourcePath = '/status';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;



        // form params
        if ($user_id !== null) {
            $formParams['user_id'] = ObjectSerializer::toFormValue($user_id);
        }
        // form params
        if ($api_key !== null) {
            $formParams['api_key'] = ObjectSerializer::toFormValue($api_key);
        }
        // body params
        $_tempBody = null;

        if ($multipart) {
            $headers= $this->headerSelector->selectHeadersForMultipart(
                ['application/application/x-www-form-urlencoded']
            );
        } else {
            $headers = $this->headerSelector->selectHeaders(
                ['application/application/x-www-form-urlencoded'],
                ['application/x-www-form-urlencoded']
            );
        }

        // for model (json/xml)
        if (isset($_tempBody)) {
            // $_tempBody is the method argument, if present
            $httpBody = $_tempBody;
            // \stdClass has no __toString(), so we should encode it manually
            if ($httpBody instanceof \stdClass && $headers['Content-Type'] === 'application/json') {
                $httpBody = \GuzzleHttp\json_encode($httpBody);
            }
        } elseif (count($formParams) > 0) {
            if ($multipart) {
                $multipartContents = [];
                foreach ($formParams as $formParamName => $formParamValue) {
                    $multipartContents[] = [
                        'name' => $formParamName,
                        'contents' => $formParamValue
                    ];
                }
                // for HTTP post (form)
                $httpBody = new MultipartStream($multipartContents);

            } elseif ($headers['Content-Type'] === 'application/json') {
                $httpBody = \GuzzleHttp\json_encode($formParams);

            } else {
                // for HTTP post (form)
                $httpBody = \GuzzleHttp\Psr7\build_query($formParams);
            }
        }


        $defaultHeaders = [];
        if ($this->config->getUserAgent()) {
            $defaultHeaders['User-Agent'] = $this->config->getUserAgent();
        }

        $headers = array_merge(
            $defaultHeaders,
            $headerParams,
            $headers
        );

        $query = \GuzzleHttp\Psr7\build_query($queryParams);
        return new Request(
            'GET',
            $this->config->getHost() . $resourcePath . ($query ? "?{$query}" : ''),
            $headers,
            $httpBody
        );
    }

    /**
     * Operation sendSMS
     *
     * Sending SMS to a number from specified sender ID
     *
     * @param  string $user_id API User ID - Can be found in your settings page. (required)
     * @param  string $api_key API Key - Can be found in your settings page. (required)
     * @param  string $message Text of the message. 800 chars max. (required)
     * @param  string $to Number to send the SMS. Better to use 9471XXXXXXX format. (required)
     * @param  string $sender_id This is the from name recipient will see as the sender of the SMS. Use \\\&quot;NotifyDemo\\\&quot; if you have not ordered your own sender ID yet. (required)
     * @param  string $contact_fname Contact First Name - This will be used while saving the phone number in your Notify contacts. (optional)
     * @param  string $contact_lname Contact Last Name - This will be used while saving the phone number in your Notify contacts. (optional)
     * @param  string $contact_email Contact Email Address - This will be used while saving the phone number in your Notify contacts. (optional)
     * @param  string $contact_address Contact Physical Address - This will be used while saving the phone number in your Notify contacts. (optional)
     * @param  int $contact_group A group ID to associate the saving contact with (optional, default to 0)
     *
     * @throws \NotifyLk\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return void
     */
    public function sendSMS($user_id, $api_key, $message, $to, $sender_id, $contact_fname = null, $contact_lname = null, $contact_email = null, $contact_address = null, $contact_group = '0')
    {
        $this->sendSMSWithHttpInfo($user_id, $api_key, $message, $to, $sender_id, $contact_fname, $contact_lname, $contact_email, $contact_address, $contact_group);
    }

    /**
     * Operation sendSMSWithHttpInfo
     *
     * Sending SMS to a number from specified sender ID
     *
     * @param  string $user_id API User ID - Can be found in your settings page. (required)
     * @param  string $api_key API Key - Can be found in your settings page. (required)
     * @param  string $message Text of the message. 800 chars max. (required)
     * @param  string $to Number to send the SMS. Better to use 9471XXXXXXX format. (required)
     * @param  string $sender_id This is the from name recipient will see as the sender of the SMS. Use \\\&quot;NotifyDemo\\\&quot; if you have not ordered your own sender ID yet. (required)
     * @param  string $contact_fname Contact First Name - This will be used while saving the phone number in your Notify contacts. (optional)
     * @param  string $contact_lname Contact Last Name - This will be used while saving the phone number in your Notify contacts. (optional)
     * @param  string $contact_email Contact Email Address - This will be used while saving the phone number in your Notify contacts. (optional)
     * @param  string $contact_address Contact Physical Address - This will be used while saving the phone number in your Notify contacts. (optional)
     * @param  int $contact_group A group ID to associate the saving contact with (optional, default to 0)
     *
     * @throws \NotifyLk\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of null, HTTP status code, HTTP response headers (array of strings)
     */
    public function sendSMSWithHttpInfo($user_id, $api_key, $message, $to, $sender_id, $contact_fname = null, $contact_lname = null, $contact_email = null, $contact_address = null, $contact_group = '0')
    {
        $returnType = '';
        $request = $this->sendSMSRequest($user_id, $api_key, $message, $to, $sender_id, $contact_fname, $contact_lname, $contact_email, $contact_address, $contact_group);

        try {
            $options = $this->createHttpClientOption();
            try {
                $response = $this->client->send($request, $options);
            } catch (RequestException $e) {
                throw new ApiException(
                    "[{$e->getCode()}] {$e->getMessage()}",
                    $e->getCode(),
                    $e->getResponse() ? $e->getResponse()->getHeaders() : null,
                    $e->getResponse()->getBody()->getContents()
                );
            }

            $statusCode = $response->getStatusCode();

            if ($statusCode < 200 || $statusCode > 299) {
                throw new ApiException(
                    sprintf(
                        '[%d] Error connecting to the API (%s)',
                        $statusCode,
                        $request->getUri()
                    ),
                    $statusCode,
                    $response->getHeaders(),
                    $response->getBody()
                );
            }

            return [null, $statusCode, $response->getHeaders()];

        } catch (ApiException $e) {
            switch ($e->getCode()) {
            }
            throw $e;
        }
    }

    /**
     * Operation sendSMSAsync
     *
     * Sending SMS to a number from specified sender ID
     *
     * @param  string $user_id API User ID - Can be found in your settings page. (required)
     * @param  string $api_key API Key - Can be found in your settings page. (required)
     * @param  string $message Text of the message. 800 chars max. (required)
     * @param  string $to Number to send the SMS. Better to use 9471XXXXXXX format. (required)
     * @param  string $sender_id This is the from name recipient will see as the sender of the SMS. Use \\\&quot;NotifyDemo\\\&quot; if you have not ordered your own sender ID yet. (required)
     * @param  string $contact_fname Contact First Name - This will be used while saving the phone number in your Notify contacts. (optional)
     * @param  string $contact_lname Contact Last Name - This will be used while saving the phone number in your Notify contacts. (optional)
     * @param  string $contact_email Contact Email Address - This will be used while saving the phone number in your Notify contacts. (optional)
     * @param  string $contact_address Contact Physical Address - This will be used while saving the phone number in your Notify contacts. (optional)
     * @param  int $contact_group A group ID to associate the saving contact with (optional, default to 0)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function sendSMSAsync($user_id, $api_key, $message, $to, $sender_id, $contact_fname = null, $contact_lname = null, $contact_email = null, $contact_address = null, $contact_group = '0')
    {
        return $this->sendSMSAsyncWithHttpInfo($user_id, $api_key, $message, $to, $sender_id, $contact_fname, $contact_lname, $contact_email, $contact_address, $contact_group)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation sendSMSAsyncWithHttpInfo
     *
     * Sending SMS to a number from specified sender ID
     *
     * @param  string $user_id API User ID - Can be found in your settings page. (required)
     * @param  string $api_key API Key - Can be found in your settings page. (required)
     * @param  string $message Text of the message. 800 chars max. (required)
     * @param  string $to Number to send the SMS. Better to use 9471XXXXXXX format. (required)
     * @param  string $sender_id This is the from name recipient will see as the sender of the SMS. Use \\\&quot;NotifyDemo\\\&quot; if you have not ordered your own sender ID yet. (required)
     * @param  string $contact_fname Contact First Name - This will be used while saving the phone number in your Notify contacts. (optional)
     * @param  string $contact_lname Contact Last Name - This will be used while saving the phone number in your Notify contacts. (optional)
     * @param  string $contact_email Contact Email Address - This will be used while saving the phone number in your Notify contacts. (optional)
     * @param  string $contact_address Contact Physical Address - This will be used while saving the phone number in your Notify contacts. (optional)
     * @param  int $contact_group A group ID to associate the saving contact with (optional, default to 0)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function sendSMSAsyncWithHttpInfo($user_id, $api_key, $message, $to, $sender_id, $contact_fname = null, $contact_lname = null, $contact_email = null, $contact_address = null, $contact_group = '0')
    {
        $returnType = '';
        $request = $this->sendSMSRequest($user_id, $api_key, $message, $to, $sender_id, $contact_fname, $contact_lname, $contact_email, $contact_address, $contact_group);

        return $this->client
            ->sendAsync($request, $this->createHttpClientOption())
            ->then(
                function ($response) use ($returnType) {
                    return [null, $response->getStatusCode(), $response->getHeaders()];
                },
                function ($exception) {
                    $response = $exception->getResponse();
                    $statusCode = $response->getStatusCode();
                    throw new ApiException(
                        sprintf(
                            '[%d] Error connecting to the API (%s)',
                            $statusCode,
                            $exception->getRequest()->getUri()
                        ),
                        $statusCode,
                        $response->getHeaders(),
                        $response->getBody()
                    );
                }
            );
    }

    /**
     * Create request for operation 'sendSMS'
     *
     * @param  string $user_id API User ID - Can be found in your settings page. (required)
     * @param  string $api_key API Key - Can be found in your settings page. (required)
     * @param  string $message Text of the message. 800 chars max. (required)
     * @param  string $to Number to send the SMS. Better to use 9471XXXXXXX format. (required)
     * @param  string $sender_id This is the from name recipient will see as the sender of the SMS. Use \\\&quot;NotifyDemo\\\&quot; if you have not ordered your own sender ID yet. (required)
     * @param  string $contact_fname Contact First Name - This will be used while saving the phone number in your Notify contacts. (optional)
     * @param  string $contact_lname Contact Last Name - This will be used while saving the phone number in your Notify contacts. (optional)
     * @param  string $contact_email Contact Email Address - This will be used while saving the phone number in your Notify contacts. (optional)
     * @param  string $contact_address Contact Physical Address - This will be used while saving the phone number in your Notify contacts. (optional)
     * @param  int $contact_group A group ID to associate the saving contact with (optional, default to 0)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    protected function sendSMSRequest($user_id, $api_key, $message, $to, $sender_id, $contact_fname = null, $contact_lname = null, $contact_email = null, $contact_address = null, $contact_group = '0')
    {
        // verify the required parameter 'user_id' is set
        if ($user_id === null) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $user_id when calling sendSMS'
            );
        }
        // verify the required parameter 'api_key' is set
        if ($api_key === null) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $api_key when calling sendSMS'
            );
        }
        // verify the required parameter 'message' is set
        if ($message === null) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $message when calling sendSMS'
            );
        }
        // verify the required parameter 'to' is set
        if ($to === null) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $to when calling sendSMS'
            );
        }
        // verify the required parameter 'sender_id' is set
        if ($sender_id === null) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $sender_id when calling sendSMS'
            );
        }

        $resourcePath = '/send';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;



        // form params
        if ($user_id !== null) {
            $formParams['user_id'] = ObjectSerializer::toFormValue($user_id);
        }
        // form params
        if ($api_key !== null) {
            $formParams['api_key'] = ObjectSerializer::toFormValue($api_key);
        }
        // form params
        if ($message !== null) {
            $formParams['message'] = ObjectSerializer::toFormValue($message);
        }
        // form params
        if ($to !== null) {
            $formParams['to'] = ObjectSerializer::toFormValue($to);
        }
        // form params
        if ($sender_id !== null) {
            $formParams['sender_id'] = ObjectSerializer::toFormValue($sender_id);
        }
        // form params
        if ($contact_fname !== null) {
            $formParams['contact_fname'] = ObjectSerializer::toFormValue($contact_fname);
        }
        // form params
        if ($contact_lname !== null) {
            $formParams['contact_lname'] = ObjectSerializer::toFormValue($contact_lname);
        }
        // form params
        if ($contact_email !== null) {
            $formParams['contact_email'] = ObjectSerializer::toFormValue($contact_email);
        }
        // form params
        if ($contact_address !== null) {
            $formParams['contact_address'] = ObjectSerializer::toFormValue($contact_address);
        }
        // form params
        if ($contact_group !== null) {
            $formParams['contact_group'] = ObjectSerializer::toFormValue($contact_group);
        }
        // body params
        $_tempBody = null;

        if ($multipart) {
            $headers= $this->headerSelector->selectHeadersForMultipart(
                ['application/application/x-www-form-urlencoded']
            );
        } else {
            $headers = $this->headerSelector->selectHeaders(
                ['application/application/x-www-form-urlencoded'],
                ['application/x-www-form-urlencoded']
            );
        }

        // for model (json/xml)
        if (isset($_tempBody)) {
            // $_tempBody is the method argument, if present
            $httpBody = $_tempBody;
            // \stdClass has no __toString(), so we should encode it manually
            if ($httpBody instanceof \stdClass && $headers['Content-Type'] === 'application/json') {
                $httpBody = \GuzzleHttp\json_encode($httpBody);
            }
        } elseif (count($formParams) > 0) {
            if ($multipart) {
                $multipartContents = [];
                foreach ($formParams as $formParamName => $formParamValue) {
                    $multipartContents[] = [
                        'name' => $formParamName,
                        'contents' => $formParamValue
                    ];
                }
                // for HTTP post (form)
                $httpBody = new MultipartStream($multipartContents);

            } elseif ($headers['Content-Type'] === 'application/json') {
                $httpBody = \GuzzleHttp\json_encode($formParams);

            } else {
                // for HTTP post (form)
                $httpBody = \GuzzleHttp\Psr7\build_query($formParams);
            }
        }


        $defaultHeaders = [];
        if ($this->config->getUserAgent()) {
            $defaultHeaders['User-Agent'] = $this->config->getUserAgent();
        }

        $headers = array_merge(
            $defaultHeaders,
            $headerParams,
            $headers
        );

        $query = \GuzzleHttp\Psr7\build_query($queryParams);
        return new Request(
            'POST',
            $this->config->getHost() . $resourcePath . ($query ? "?{$query}" : ''),
            $headers,
            $httpBody
        );
    }

    /**
     * Create http client option
     *
     * @throws \RuntimeException on file opening failure
     * @return array of http client options
     */
    protected function createHttpClientOption()
    {
        $options = [];
        if ($this->config->getDebug()) {
            $options[RequestOptions::DEBUG] = fopen($this->config->getDebugFile(), 'a');
            if (!$options[RequestOptions::DEBUG]) {
                throw new \RuntimeException('Failed to open the debug file: ' . $this->config->getDebugFile());
            }
        }

        return $options;
    }
}
