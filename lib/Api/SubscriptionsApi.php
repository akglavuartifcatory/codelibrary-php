<?php
/**
 * SubscriptionsApi
 * PHP version 5
 *
 * @category Class
 * @package  Swagger\Client
 * @author   http://github.com/swagger-api/swagger-codegen
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache License v2
 * @link     https://github.com/swagger-api/swagger-codegen
 */

/**
 * Zuora API Reference
 *
 * # Introduction  Welcome to the reference for the Zuora REST API!  <a href=\"http://en.wikipedia.org/wiki/REST_API\" target=\"_blank\">REST</a> is a web-service protocol that lends itself to rapid development by using everyday HTTP and JSON technology.  The Zuora REST API provides a broad set of operations and resources that:  * Enable Web Storefront integration between your websites. * Support self-service subscriber sign-ups and account management. * Process revenue schedules through custom revenue rule models.  ## Endpoints  The Zuora REST services are provided via the following endpoints.  | Service                 | Base URL for REST Endpoints                                                                                                                                         | |-------------------------|---------------------------------------------------------------------------------------------------------------------------------------------------------------------| | Production REST service | https://rest.zuora.com/v1                                                                                                                                           | | Sandbox REST service    | https://rest.apisandbox.zuora.com/v1                                                                                                                                |  The production service provides access to your live user data. The sandbox environment is a good place to test your code without affecting real-world data. To use it, you must be provisioned with a sandbox tenant - your Zuora representative can help with this if needed.  ## Accessing the API  If you have a Zuora tenant, you already have access the the API.  If you don't have a Zuora tenant, go to <a href=\"https://www.zuora.com/resource/zuora-test-drive\" target=\"_blank\">https://www.zuora.com/resource/zuora-test-drive</a> and sign up for a trial tenant. The tenant comes with seed data, such as a sample product catalog.   We recommend that you <a href=\"https://knowledgecenter.zuora.com/CF_Users_and_Administrators/A_Administrator_Settings/Manage_Users/Create_an_API_User\" target=\"_blank\">create an API user</a> specifically for making API calls. Don't log in to the Zuora UI with this account. Logging in to the UI enables a security feature that periodically expires the account's password, which may eventually cause authentication failures with the API. Note that a user role does not have write access to Zuora REST services unless it has the API Write Access permission as described in those instructions.   # Authentication  There are three ways to authenticate:  * Use an authorization cookie. The cookie authorizes the user to make calls to the REST API for the duration specified in  **Administration > Security Policies > Session timeout**. The cookie expiration time is reset with this duration after every call to the REST API. To obtain a cookie, call the REST  `connections` resource with the following API user information:     *   ID     *   password     *   entity Id or entity name (Only for [Zuora Multi-entity](https://knowledgecenter.zuora.com/BB_Introducing_Z_Business/Multi-entity \"Multi-entity\"). See \"Entity Id and Entity Name\" below for more information.)  *   Include the following parameters in the request header, which re-authenticates the user with each request:     *   `apiAccessKeyId`     *   `apiSecretAccessKey`     *   `entityId` or `entityName` (Only for [Zuora Multi-entity](https://knowledgecenter.zuora.com/BB_Introducing_Z_Business/Multi-entity \"Multi-entity\"). See \"Entity Id and Entity Name\" below for more information.) *   For CORS-enabled APIs only: Include a 'single-use' token in the request header, which re-authenticates the user with each request. See below for more details.   ## Entity Id and Entity Name  The `entityId` and `entityName`  parameters are only used for  [Zuora Multi-entity](https://knowledgecenter.zuora.com/BB_Introducing_Z_Business/Multi-entity).  The  `entityId` parameter specifies the Id of the entity that you want to access. The `entityName` parameter specifies the [name of the entity](https://knowledgecenter.zuora.com/BB_Introducing_Z_Business/Multi-entity/B_Introduction_to_Entity_and_Entity_Hierarchy#Name_and_Display_Name \"Introduction to Entity and Entity Hierarchy\") that you want to access. Note that you must have permission to access the entity. You can get the entity Id and entity name through the REST GET Entities call.  You can specify either the  `entityId` or `entityName` parameter in the authentication to access and view an entity.  *   If both `entityId` and `entityName` are specified in the authentication, an error occurs.  *   If neither  `entityId` nor  `entityName` is specified in the authentication, you will log in to the entity in which your user account is created.   See [API User Authentication](https://knowledgecenter.zuora.com/BB_Introducing_Z_Business/Multi-entity/A_Overview_of_Multi-entity#API_User_Authentication \"Zuora Multi-entity\") for more information.  ## Token Authentication for CORS-Enabled APIs  The CORS mechanism enables REST API calls to Zuora to be made directly from your customer's browser, with all credit card and security information transmitted directly to Zuora. This minimizes your PCI compliance burden, allows you to implement advanced validation on your payment forms, and makes your payment forms look just like any other part of your website.  For security reasons, instead of using cookies, an API request via CORS uses **tokens** for authentication.  The token method of authentication is only designed for use with requests that must originate from your customer's browser; **it should not be considered a replacement to the existing cookie authentication** mechanism.  See [Zuora CORS REST ](https://knowledgecenter.zuora.com/DC_Developers/REST_API/A_REST_basics/G_CORS_REST \"Zuora CORS REST\")for details on how CORS works and how you can begin to implement customer calls to the Zuora REST APIs. See  [HMAC Signatures](/BC_Developers/REST_API/B_REST_API_reference/HMAC_Signatures \"HMAC Signatures\") for details on the HMAC method that returns the authentication token.    # Requests and Responses   ## Request IDs  As a general rule, when asked to supply a \"key\" for an account or subscription (accountKey, account-key, subscriptionKey, subscription-key), you can provide either the actual ID or the number of the entity.  ## HTTP Request Body  Most of the parameters and data accompanying your requests will be contained in the body of the HTTP request.  The Zuora REST API accepts JSON in the HTTP request body.  No other data format (e.g., XML) is supported.   ## Testing a Request  Use a third party client, such as Postman or Advanced REST Client, to test the Zuora REST API.  You can test the Zuora REST API from the Zuora sandbox or  production service. If connecting to the production service, bear in mind that you are working with your live production data, not sample data or test data.  ## Testing with Credit Cards  Sooner or later it will probably be necessary to test some transactions that involve credit cards. For suggestions on how to handle this, see [Going Live With Your Payment Gateway](https://knowledgecenter.zuora.com/CB_Billing/M_Payment_Gateways/C_Managing_Payment_Gateways/B_Going_Live_Payment_Gateways#Testing_with_Credit_Cards \"C_Zuora_User_Guides/A_Billing_and_Payments/M_Payment_Gateways/C_Managing_Payment_Gateways/B_Going_Live_Payment_Gateways#Testing_with_Credit_Cards\").       ## Error Handling  Responses and error codes are detailed in [Responses and errors](https://knowledgecenter.zuora.com/DC_Developers/REST_API/A_REST_basics/3_Responses_and_errors \"Responses and errors\").    # Pagination  When retrieving information (using GET methods), the optional `pageSize` query parameter sets the maximum number of rows to return in a response. The maximum is `40`; larger values are treated as `40`. If this value is empty or invalid, `pageSize` typically defaults to `10`.  The default value for the maximum number of rows retrieved can be overridden at the method level.  If more rows are available, the response will include a `nextPage` element, which contains a URL for requesting the next page.  If this value is not provided, no more rows are available. No \"previous page\" element is explicitly provided; to support backward paging, use the previous call.  ## Array Size  For data items that are not paginated, the REST API supports arrays of up to 300 rows.  Thus, for instance, repeated pagination can retrieve thousands of customer accounts, but within any account an array of no more than 300 rate plans is returned.   # API Versions  The Zuora REST API is in version control. Versioning ensures that Zuora REST API changes are backward compatible. Zuora uses a major and minor version nomenclature to manage changes. By specifying a version in a REST request, you can get expected responses regardless of future changes to the API.   ## Major Version  The major version number of the REST API appears in the REST URL. Currently, Zuora only supports the **v1** major version. For example,  `POST https://rest.zuora.com/v1/subscriptions` .   ## Minor Version  Zuora uses minor versions for the REST API to control small changes. For example, a field in a REST method is deprecated and a new field is used to replace it.   Some fields in the REST methods are supported as of minor versions. If a field is not noted with a minor version, this field is available for all minor versions. If a field is noted with a minor version, this field is in version control. You must specify the supported minor version in the request header to process without an error.   If a field is in version control, it is either with a minimum minor version or a maximum minor version, or both of them. You can only use this field with the minor version between the minimum and the maximum minor versions. For example, the  `invoiceCollect` field in the POST Subscription method is in version control and its maximum minor version is 189.0. You can only use this field with the minor version 189.0 or earlier.  The supported minor versions are not serial, see [Zuora REST API Minor Version History](https://knowledgecenter.zuora.com/DC_Developers/REST_API/A_REST_basics/Zuora_REST_API_Minor_Version_History \"Zuora REST API Minor Version History\") for the fields and their supported minor versions. In our REST API documentation, if a field or feature requires a minor version number, we note that in the field description.  You only need to specify the version number when you use the fields require a minor version. To specify the minor version, set the `zuora-version` parameter to the minor version number in the request header for the request call. For example, the `collect` field is in 196.0 minor version. If you want to use this field for the POST Subscription method, set the  `zuora-version` parameter to `196.0` in the request header. The `zuora-version` parameter is case sensitive.   For all the REST API fields, by default, if the minor version is not specified in the request header, Zuora will use the minimum minor version of the REST API to avoid breaking your integration.     # Zuora Object Model The following diagram presents a high-level view of the key Zuora objects. Click the image to open it in a new tab to resize it.  <a href=\"https://www.zuora.com/wp-content/uploads/2016/10/ZuoraERD-compressor-1.jpeg\" target=\"_blank\"><img src=\"https://www.zuora.com/wp-content/uploads/2016/10/ZuoraERD-compressor-1.jpeg\" alt=\"Zuora Object Model Diagram\"></a>
 *
 * OpenAPI spec version: 0.0.1
 * Contact: docs@zuora.com
 * Generated by: https://github.com/swagger-api/swagger-codegen.git
 *
 * Licensed under the Apache License, Version 2.0 (the "License");
 * you may not use this file except in compliance with the License.
 * You may obtain a copy of the License at
 *
 *      http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS,
 * WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 * See the License for the specific language governing permissions and
 * limitations under the License.
 */

/**
 * NOTE: This class is auto generated by the swagger code generator program.
 * https://github.com/swagger-api/swagger-codegen
 * Do not edit the class manually.
 */

namespace Swagger\Client\Api;

use \Swagger\Client\ApiClient;
use \Swagger\Client\ApiException;
use \Swagger\Client\Configuration;
use \Swagger\Client\ObjectSerializer;

/**
 * SubscriptionsApi Class Doc Comment
 *
 * @category Class
 * @package  Swagger\Client
 * @author   http://github.com/swagger-api/swagger-codegen
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache License v2
 * @link     https://github.com/swagger-api/swagger-codegen
 */
class SubscriptionsApi
{
    /**
     * API Client
     *
     * @var \Swagger\Client\ApiClient instance of the ApiClient
     */
    protected $apiClient;

    /**
     * Constructor
     *
     * @param \Swagger\Client\ApiClient|null $apiClient The api client to use
     */
    public function __construct(\Swagger\Client\ApiClient $apiClient = null)
    {
        if ($apiClient === null) {
            $apiClient = new ApiClient();
            $apiClient->getConfig()->setHost('https://rest.zuora.com/v1');
        }

        $this->apiClient = $apiClient;
    }

    /**
     * Get API client
     *
     * @return \Swagger\Client\ApiClient get the API client
     */
    public function getApiClient()
    {
        return $this->apiClient;
    }

    /**
     * Set the API client
     *
     * @param \Swagger\Client\ApiClient $apiClient set the API client
     *
     * @return SubscriptionsApi
     */
    public function setApiClient(\Swagger\Client\ApiClient $apiClient)
    {
        $this->apiClient = $apiClient;
        return $this;
    }

    /**
     * Operation gETOneSubscription
     *
     * Get subscriptions by key
     *
     * @param string $subscription_key Possible values are:   * a subscription number   * a subscription ID (required)
     * @param string $charge_detail The segmented rate plan charges. When an amendment results in a change to a charge, Zuora creates a segmented rate plan charge. Use this field to track segment charges.  Possible values are:   * __last-segment__: (Default) The last rate plan charge on the subscription. The last rate plan charge is the last one in the order of time on the subscription rather than the most recent changed charge on the subscription.  * __current-segment__: The segmented charge that is active on today???s date (effectiveStartDate &lt;&#x3D; today???s date &lt; effectiveEndDate).    * __all-segments__: All the segmented charges.   * __specific-segment&amp;as-of-date&#x3D;date__: The segmented charge that is active on a date you specified (effectiveStartDate &lt;&#x3D; specific date &lt; effectiveEndDate). The format of the date is yyyy-mm-dd. (optional)
     * @throws \Swagger\Client\ApiException on non-2xx response
     * @return \Swagger\Client\Model\GETSubscriptionTypeWithSuccess
     */
    public function gETOneSubscription($subscription_key, $charge_detail = null)
    {
        list($response) = $this->gETOneSubscriptionWithHttpInfo($subscription_key, $charge_detail);
        return $response;
    }

    /**
     * Operation gETOneSubscriptionWithHttpInfo
     *
     * Get subscriptions by key
     *
     * @param string $subscription_key Possible values are:   * a subscription number   * a subscription ID (required)
     * @param string $charge_detail The segmented rate plan charges. When an amendment results in a change to a charge, Zuora creates a segmented rate plan charge. Use this field to track segment charges.  Possible values are:   * __last-segment__: (Default) The last rate plan charge on the subscription. The last rate plan charge is the last one in the order of time on the subscription rather than the most recent changed charge on the subscription.  * __current-segment__: The segmented charge that is active on today???s date (effectiveStartDate &lt;&#x3D; today???s date &lt; effectiveEndDate).    * __all-segments__: All the segmented charges.   * __specific-segment&amp;as-of-date&#x3D;date__: The segmented charge that is active on a date you specified (effectiveStartDate &lt;&#x3D; specific date &lt; effectiveEndDate). The format of the date is yyyy-mm-dd. (optional)
     * @throws \Swagger\Client\ApiException on non-2xx response
     * @return array of \Swagger\Client\Model\GETSubscriptionTypeWithSuccess, HTTP status code, HTTP response headers (array of strings)
     */
    public function gETOneSubscriptionWithHttpInfo($subscription_key, $charge_detail = null)
    {
        // verify the required parameter 'subscription_key' is set
        if ($subscription_key === null) {
            throw new \InvalidArgumentException('Missing the required parameter $subscription_key when calling gETOneSubscription');
        }
        // parse inputs
        $resourcePath = "/subscriptions/{subscription-key}";
        $httpBody = '';
        $queryParams = [];
        $headerParams = [];
        $formParams = [];
        $_header_accept = $this->apiClient->selectHeaderAccept(['application/json']);
        if (!is_null($_header_accept)) {
            $headerParams['Accept'] = $_header_accept;
        }
        $headerParams['Content-Type'] = $this->apiClient->selectHeaderContentType(['application/json']);

        // query params
        if ($charge_detail !== null) {
            $queryParams['charge-detail'] = $this->apiClient->getSerializer()->toQueryValue($charge_detail);
        }
        // path params
        if ($subscription_key !== null) {
            $resourcePath = str_replace(
                "{" . "subscription-key" . "}",
                $this->apiClient->getSerializer()->toPathValue($subscription_key),
                $resourcePath
            );
        }
        // default format to json
        $resourcePath = str_replace("{format}", "json", $resourcePath);

        
        // for model (json/xml)
        if (isset($_tempBody)) {
            $httpBody = $_tempBody; // $_tempBody is the method argument, if present
        } elseif (count($formParams) > 0) {
            $httpBody = $formParams; // for HTTP post (form)
        }
        // make the API Call
        try {
            list($response, $statusCode, $httpHeader) = $this->apiClient->callApi(
                $resourcePath,
                'GET',
                $queryParams,
                $httpBody,
                $headerParams,
                '\Swagger\Client\Model\GETSubscriptionTypeWithSuccess',
                '/subscriptions/{subscription-key}'
            );

            return [$this->apiClient->getSerializer()->deserialize($response, '\Swagger\Client\Model\GETSubscriptionTypeWithSuccess', $httpHeader), $statusCode, $httpHeader];
        } catch (ApiException $e) {
            switch ($e->getCode()) {
                case 200:
                    $data = $this->apiClient->getSerializer()->deserialize($e->getResponseBody(), '\Swagger\Client\Model\GETSubscriptionTypeWithSuccess', $e->getResponseHeaders());
                    $e->setResponseObject($data);
                    break;
            }

            throw $e;
        }
    }

    /**
     * Operation gETSubscription
     *
     * Get subscriptions by account
     *
     * @param string $account_key Possible values are: * an account number * an account ID (required)
     * @param string $charge_detail The segmented rate plan charges.  When an amendment results in a change to a charge, Zuora creates a segmented rate plan charge. Use this field to track segment charges.  Possible values are:  * &#x60;last-segment&#x60;: (Default) The last rate plan charge on the subscription. The last rate plan charge is the last one in the order of time on the subscription rather than the most recent updated charge on the subscription. * &#x60;current-segment&#x60;: The segmented charge that is active on today???s date (**effectiveStartDate** &lt;&#x3D; today???s date &lt; **effectiveEndDate**). * &#x60;all-segments&#x60;: All the segmented charges. * &#x60;specific-segment&amp;as-of-date&#x3D;date&#x60;: The segmented charge that is active on a date you specified (**effectiveStartDate** &lt;&#x3D; specific date &lt; **effectiveEndDate**). The format of the date is yyyy-mm-dd. (optional)
     * @throws \Swagger\Client\ApiException on non-2xx response
     * @return \Swagger\Client\Model\GETSubscriptionWrapper
     */
    public function gETSubscription($account_key, $charge_detail = null)
    {
        list($response) = $this->gETSubscriptionWithHttpInfo($account_key, $charge_detail);
        return $response;
    }

    /**
     * Operation gETSubscriptionWithHttpInfo
     *
     * Get subscriptions by account
     *
     * @param string $account_key Possible values are: * an account number * an account ID (required)
     * @param string $charge_detail The segmented rate plan charges.  When an amendment results in a change to a charge, Zuora creates a segmented rate plan charge. Use this field to track segment charges.  Possible values are:  * &#x60;last-segment&#x60;: (Default) The last rate plan charge on the subscription. The last rate plan charge is the last one in the order of time on the subscription rather than the most recent updated charge on the subscription. * &#x60;current-segment&#x60;: The segmented charge that is active on today???s date (**effectiveStartDate** &lt;&#x3D; today???s date &lt; **effectiveEndDate**). * &#x60;all-segments&#x60;: All the segmented charges. * &#x60;specific-segment&amp;as-of-date&#x3D;date&#x60;: The segmented charge that is active on a date you specified (**effectiveStartDate** &lt;&#x3D; specific date &lt; **effectiveEndDate**). The format of the date is yyyy-mm-dd. (optional)
     * @throws \Swagger\Client\ApiException on non-2xx response
     * @return array of \Swagger\Client\Model\GETSubscriptionWrapper, HTTP status code, HTTP response headers (array of strings)
     */
    public function gETSubscriptionWithHttpInfo($account_key, $charge_detail = null)
    {
        // verify the required parameter 'account_key' is set
        if ($account_key === null) {
            throw new \InvalidArgumentException('Missing the required parameter $account_key when calling gETSubscription');
        }
        // parse inputs
        $resourcePath = "/subscriptions/accounts/{account-key}";
        $httpBody = '';
        $queryParams = [];
        $headerParams = [];
        $formParams = [];
        $_header_accept = $this->apiClient->selectHeaderAccept(['application/json']);
        if (!is_null($_header_accept)) {
            $headerParams['Accept'] = $_header_accept;
        }
        $headerParams['Content-Type'] = $this->apiClient->selectHeaderContentType(['application/json']);

        // query params
        if ($charge_detail !== null) {
            $queryParams['charge-detail'] = $this->apiClient->getSerializer()->toQueryValue($charge_detail);
        }
        // path params
        if ($account_key !== null) {
            $resourcePath = str_replace(
                "{" . "account-key" . "}",
                $this->apiClient->getSerializer()->toPathValue($account_key),
                $resourcePath
            );
        }
        // default format to json
        $resourcePath = str_replace("{format}", "json", $resourcePath);

        
        // for model (json/xml)
        if (isset($_tempBody)) {
            $httpBody = $_tempBody; // $_tempBody is the method argument, if present
        } elseif (count($formParams) > 0) {
            $httpBody = $formParams; // for HTTP post (form)
        }
        // make the API Call
        try {
            list($response, $statusCode, $httpHeader) = $this->apiClient->callApi(
                $resourcePath,
                'GET',
                $queryParams,
                $httpBody,
                $headerParams,
                '\Swagger\Client\Model\GETSubscriptionWrapper',
                '/subscriptions/accounts/{account-key}'
            );

            return [$this->apiClient->getSerializer()->deserialize($response, '\Swagger\Client\Model\GETSubscriptionWrapper', $httpHeader), $statusCode, $httpHeader];
        } catch (ApiException $e) {
            switch ($e->getCode()) {
                case 200:
                    $data = $this->apiClient->getSerializer()->deserialize($e->getResponseBody(), '\Swagger\Client\Model\GETSubscriptionWrapper', $e->getResponseHeaders());
                    $e->setResponseObject($data);
                    break;
            }

            throw $e;
        }
    }

    /**
     * Operation pOSTSubscription
     *
     * Create subscription
     *
     * @param \Swagger\Client\Model\POSTSubscriptionType $request  (required)
     * @param string $zuora_version The minor version of the Zuora REST API. You only need to set this parameter if you use the __collect__ or __invoice__ field. See [REST API Basics](https://knowledgecenter.zuora.com/DC_Developers/REST_API/A_REST_basics) for more information. (optional)
     * @throws \Swagger\Client\ApiException on non-2xx response
     * @return \Swagger\Client\Model\POSTSubscriptionResponseType
     */
    public function pOSTSubscription($request, $zuora_version = null)
    {
        list($response) = $this->pOSTSubscriptionWithHttpInfo($request, $zuora_version);
        return $response;
    }

    /**
     * Operation pOSTSubscriptionWithHttpInfo
     *
     * Create subscription
     *
     * @param \Swagger\Client\Model\POSTSubscriptionType $request  (required)
     * @param string $zuora_version The minor version of the Zuora REST API. You only need to set this parameter if you use the __collect__ or __invoice__ field. See [REST API Basics](https://knowledgecenter.zuora.com/DC_Developers/REST_API/A_REST_basics) for more information. (optional)
     * @throws \Swagger\Client\ApiException on non-2xx response
     * @return array of \Swagger\Client\Model\POSTSubscriptionResponseType, HTTP status code, HTTP response headers (array of strings)
     */
    public function pOSTSubscriptionWithHttpInfo($request, $zuora_version = null)
    {
        // verify the required parameter 'request' is set
        if ($request === null) {
            throw new \InvalidArgumentException('Missing the required parameter $request when calling pOSTSubscription');
        }
        // parse inputs
        $resourcePath = "/subscriptions";
        $httpBody = '';
        $queryParams = [];
        $headerParams = [];
        $formParams = [];
        $_header_accept = $this->apiClient->selectHeaderAccept(['application/json']);
        if (!is_null($_header_accept)) {
            $headerParams['Accept'] = $_header_accept;
        }
        $headerParams['Content-Type'] = $this->apiClient->selectHeaderContentType(['application/json']);

        // header params
        if ($zuora_version !== null) {
            $headerParams['zuora-version'] = $this->apiClient->getSerializer()->toHeaderValue($zuora_version);
        }
        // default format to json
        $resourcePath = str_replace("{format}", "json", $resourcePath);

        // body params
        $_tempBody = null;
        if (isset($request)) {
            $_tempBody = $request;
        }

        // for model (json/xml)
        if (isset($_tempBody)) {
            $httpBody = $_tempBody; // $_tempBody is the method argument, if present
        } elseif (count($formParams) > 0) {
            $httpBody = $formParams; // for HTTP post (form)
        }
        // make the API Call
        try {
            list($response, $statusCode, $httpHeader) = $this->apiClient->callApi(
                $resourcePath,
                'POST',
                $queryParams,
                $httpBody,
                $headerParams,
                '\Swagger\Client\Model\POSTSubscriptionResponseType',
                '/subscriptions'
            );

            return [$this->apiClient->getSerializer()->deserialize($response, '\Swagger\Client\Model\POSTSubscriptionResponseType', $httpHeader), $statusCode, $httpHeader];
        } catch (ApiException $e) {
            switch ($e->getCode()) {
                case 200:
                    $data = $this->apiClient->getSerializer()->deserialize($e->getResponseBody(), '\Swagger\Client\Model\POSTSubscriptionResponseType', $e->getResponseHeaders());
                    $e->setResponseObject($data);
                    break;
            }

            throw $e;
        }
    }

    /**
     * Operation pOSTSubscriptionCancellation
     *
     * Cancel subscription
     *
     * @param string $subscription_key Subscription number or ID. Subscription status must be &#x60;Active&#x60;. (required)
     * @param \Swagger\Client\Model\POSTSubscriptionCancellationType $request  (required)
     * @param string $zuora_version The minor version of the Zuora REST API. You only need to set this parameter if you use the __collect__ or __invoice__ field. See [REST API Basics](https://knowledgecenter.zuora.com/DC_Developers/REST_API/A_REST_basics) for more information. (optional)
     * @throws \Swagger\Client\ApiException on non-2xx response
     * @return \Swagger\Client\Model\POSTSubscriptionCancellationResponseType
     */
    public function pOSTSubscriptionCancellation($subscription_key, $request, $zuora_version = null)
    {
        list($response) = $this->pOSTSubscriptionCancellationWithHttpInfo($subscription_key, $request, $zuora_version);
        return $response;
    }

    /**
     * Operation pOSTSubscriptionCancellationWithHttpInfo
     *
     * Cancel subscription
     *
     * @param string $subscription_key Subscription number or ID. Subscription status must be &#x60;Active&#x60;. (required)
     * @param \Swagger\Client\Model\POSTSubscriptionCancellationType $request  (required)
     * @param string $zuora_version The minor version of the Zuora REST API. You only need to set this parameter if you use the __collect__ or __invoice__ field. See [REST API Basics](https://knowledgecenter.zuora.com/DC_Developers/REST_API/A_REST_basics) for more information. (optional)
     * @throws \Swagger\Client\ApiException on non-2xx response
     * @return array of \Swagger\Client\Model\POSTSubscriptionCancellationResponseType, HTTP status code, HTTP response headers (array of strings)
     */
    public function pOSTSubscriptionCancellationWithHttpInfo($subscription_key, $request, $zuora_version = null)
    {
        // verify the required parameter 'subscription_key' is set
        if ($subscription_key === null) {
            throw new \InvalidArgumentException('Missing the required parameter $subscription_key when calling pOSTSubscriptionCancellation');
        }
        // verify the required parameter 'request' is set
        if ($request === null) {
            throw new \InvalidArgumentException('Missing the required parameter $request when calling pOSTSubscriptionCancellation');
        }
        // parse inputs
        $resourcePath = "/subscriptions/{subscription-key}/cancel";
        $httpBody = '';
        $queryParams = [];
        $headerParams = [];
        $formParams = [];
        $_header_accept = $this->apiClient->selectHeaderAccept(['application/json']);
        if (!is_null($_header_accept)) {
            $headerParams['Accept'] = $_header_accept;
        }
        $headerParams['Content-Type'] = $this->apiClient->selectHeaderContentType(['application/json']);

        // header params
        if ($zuora_version !== null) {
            $headerParams['zuora-version'] = $this->apiClient->getSerializer()->toHeaderValue($zuora_version);
        }
        // path params
        if ($subscription_key !== null) {
            $resourcePath = str_replace(
                "{" . "subscription-key" . "}",
                $this->apiClient->getSerializer()->toPathValue($subscription_key),
                $resourcePath
            );
        }
        // default format to json
        $resourcePath = str_replace("{format}", "json", $resourcePath);

        // body params
        $_tempBody = null;
        if (isset($request)) {
            $_tempBody = $request;
        }

        // for model (json/xml)
        if (isset($_tempBody)) {
            $httpBody = $_tempBody; // $_tempBody is the method argument, if present
        } elseif (count($formParams) > 0) {
            $httpBody = $formParams; // for HTTP post (form)
        }
        // make the API Call
        try {
            list($response, $statusCode, $httpHeader) = $this->apiClient->callApi(
                $resourcePath,
                'PUT',
                $queryParams,
                $httpBody,
                $headerParams,
                '\Swagger\Client\Model\POSTSubscriptionCancellationResponseType',
                '/subscriptions/{subscription-key}/cancel'
            );

            return [$this->apiClient->getSerializer()->deserialize($response, '\Swagger\Client\Model\POSTSubscriptionCancellationResponseType', $httpHeader), $statusCode, $httpHeader];
        } catch (ApiException $e) {
            switch ($e->getCode()) {
                case 200:
                    $data = $this->apiClient->getSerializer()->deserialize($e->getResponseBody(), '\Swagger\Client\Model\POSTSubscriptionCancellationResponseType', $e->getResponseHeaders());
                    $e->setResponseObject($data);
                    break;
            }

            throw $e;
        }
    }

    /**
     * Operation pOSTSubscriptionPreview
     *
     * Preview subscription
     *
     * @param \Swagger\Client\Model\POSTSubscriptionPreviewType $request  (required)
     * @throws \Swagger\Client\ApiException on non-2xx response
     * @return \Swagger\Client\Model\POSTSubscriptionPreviewResponseType
     */
    public function pOSTSubscriptionPreview($request)
    {
        list($response) = $this->pOSTSubscriptionPreviewWithHttpInfo($request);
        return $response;
    }

    /**
     * Operation pOSTSubscriptionPreviewWithHttpInfo
     *
     * Preview subscription
     *
     * @param \Swagger\Client\Model\POSTSubscriptionPreviewType $request  (required)
     * @throws \Swagger\Client\ApiException on non-2xx response
     * @return array of \Swagger\Client\Model\POSTSubscriptionPreviewResponseType, HTTP status code, HTTP response headers (array of strings)
     */
    public function pOSTSubscriptionPreviewWithHttpInfo($request)
    {
        // verify the required parameter 'request' is set
        if ($request === null) {
            throw new \InvalidArgumentException('Missing the required parameter $request when calling pOSTSubscriptionPreview');
        }
        // parse inputs
        $resourcePath = "/subscriptions/preview";
        $httpBody = '';
        $queryParams = [];
        $headerParams = [];
        $formParams = [];
        $_header_accept = $this->apiClient->selectHeaderAccept(['application/json']);
        if (!is_null($_header_accept)) {
            $headerParams['Accept'] = $_header_accept;
        }
        $headerParams['Content-Type'] = $this->apiClient->selectHeaderContentType(['application/json']);

        // default format to json
        $resourcePath = str_replace("{format}", "json", $resourcePath);

        // body params
        $_tempBody = null;
        if (isset($request)) {
            $_tempBody = $request;
        }

        // for model (json/xml)
        if (isset($_tempBody)) {
            $httpBody = $_tempBody; // $_tempBody is the method argument, if present
        } elseif (count($formParams) > 0) {
            $httpBody = $formParams; // for HTTP post (form)
        }
        // make the API Call
        try {
            list($response, $statusCode, $httpHeader) = $this->apiClient->callApi(
                $resourcePath,
                'POST',
                $queryParams,
                $httpBody,
                $headerParams,
                '\Swagger\Client\Model\POSTSubscriptionPreviewResponseType',
                '/subscriptions/preview'
            );

            return [$this->apiClient->getSerializer()->deserialize($response, '\Swagger\Client\Model\POSTSubscriptionPreviewResponseType', $httpHeader), $statusCode, $httpHeader];
        } catch (ApiException $e) {
            switch ($e->getCode()) {
                case 200:
                    $data = $this->apiClient->getSerializer()->deserialize($e->getResponseBody(), '\Swagger\Client\Model\POSTSubscriptionPreviewResponseType', $e->getResponseHeaders());
                    $e->setResponseObject($data);
                    break;
            }

            throw $e;
        }
    }

    /**
     * Operation pUTRenewSubscription
     *
     * Renew subscription
     *
     * @param string $subscription_key Subscription number or ID (required)
     * @param \Swagger\Client\Model\PUTRenewSubscriptionType $request  (required)
     * @param string $zuora_version The minor version of the Zuora REST API. You only need to set this parameter if you use the __collect__ or __invoice__ field. See [REST API Basics](https://knowledgecenter.zuora.com/DC_Developers/REST_API/A_REST_basics) for more information. (optional)
     * @throws \Swagger\Client\ApiException on non-2xx response
     * @return \Swagger\Client\Model\PUTRenewSubscriptionResponseType
     */
    public function pUTRenewSubscription($subscription_key, $request, $zuora_version = null)
    {
        list($response) = $this->pUTRenewSubscriptionWithHttpInfo($subscription_key, $request, $zuora_version);
        return $response;
    }

    /**
     * Operation pUTRenewSubscriptionWithHttpInfo
     *
     * Renew subscription
     *
     * @param string $subscription_key Subscription number or ID (required)
     * @param \Swagger\Client\Model\PUTRenewSubscriptionType $request  (required)
     * @param string $zuora_version The minor version of the Zuora REST API. You only need to set this parameter if you use the __collect__ or __invoice__ field. See [REST API Basics](https://knowledgecenter.zuora.com/DC_Developers/REST_API/A_REST_basics) for more information. (optional)
     * @throws \Swagger\Client\ApiException on non-2xx response
     * @return array of \Swagger\Client\Model\PUTRenewSubscriptionResponseType, HTTP status code, HTTP response headers (array of strings)
     */
    public function pUTRenewSubscriptionWithHttpInfo($subscription_key, $request, $zuora_version = null)
    {
        // verify the required parameter 'subscription_key' is set
        if ($subscription_key === null) {
            throw new \InvalidArgumentException('Missing the required parameter $subscription_key when calling pUTRenewSubscription');
        }
        // verify the required parameter 'request' is set
        if ($request === null) {
            throw new \InvalidArgumentException('Missing the required parameter $request when calling pUTRenewSubscription');
        }
        // parse inputs
        $resourcePath = "/subscriptions/{subscription-key}/renew";
        $httpBody = '';
        $queryParams = [];
        $headerParams = [];
        $formParams = [];
        $_header_accept = $this->apiClient->selectHeaderAccept(['application/json']);
        if (!is_null($_header_accept)) {
            $headerParams['Accept'] = $_header_accept;
        }
        $headerParams['Content-Type'] = $this->apiClient->selectHeaderContentType(['application/json']);

        // header params
        if ($zuora_version !== null) {
            $headerParams['zuora-version'] = $this->apiClient->getSerializer()->toHeaderValue($zuora_version);
        }
        // path params
        if ($subscription_key !== null) {
            $resourcePath = str_replace(
                "{" . "subscription-key" . "}",
                $this->apiClient->getSerializer()->toPathValue($subscription_key),
                $resourcePath
            );
        }
        // default format to json
        $resourcePath = str_replace("{format}", "json", $resourcePath);

        // body params
        $_tempBody = null;
        if (isset($request)) {
            $_tempBody = $request;
        }

        // for model (json/xml)
        if (isset($_tempBody)) {
            $httpBody = $_tempBody; // $_tempBody is the method argument, if present
        } elseif (count($formParams) > 0) {
            $httpBody = $formParams; // for HTTP post (form)
        }
        // make the API Call
        try {
            list($response, $statusCode, $httpHeader) = $this->apiClient->callApi(
                $resourcePath,
                'PUT',
                $queryParams,
                $httpBody,
                $headerParams,
                '\Swagger\Client\Model\PUTRenewSubscriptionResponseType',
                '/subscriptions/{subscription-key}/renew'
            );

            return [$this->apiClient->getSerializer()->deserialize($response, '\Swagger\Client\Model\PUTRenewSubscriptionResponseType', $httpHeader), $statusCode, $httpHeader];
        } catch (ApiException $e) {
            switch ($e->getCode()) {
                case 200:
                    $data = $this->apiClient->getSerializer()->deserialize($e->getResponseBody(), '\Swagger\Client\Model\PUTRenewSubscriptionResponseType', $e->getResponseHeaders());
                    $e->setResponseObject($data);
                    break;
            }

            throw $e;
        }
    }

    /**
     * Operation pUTSubscription
     *
     * Update subscription
     *
     * @param string $subscription_key Subscription number or ID. (required)
     * @param \Swagger\Client\Model\PUTSubscriptionType $request  (required)
     * @param string $zuora_version The minor version of the Zuora REST API. You only need to set this parameter if you use the __collect__ or __invoice__ field. See [REST API Basics](https://knowledgecenter.zuora.com/DC_Developers/REST_API/A_REST_basics) for more information. (optional)
     * @throws \Swagger\Client\ApiException on non-2xx response
     * @return \Swagger\Client\Model\PUTSubscriptionResponseType
     */
    public function pUTSubscription($subscription_key, $request, $zuora_version = null)
    {
        list($response) = $this->pUTSubscriptionWithHttpInfo($subscription_key, $request, $zuora_version);
        return $response;
    }

    /**
     * Operation pUTSubscriptionWithHttpInfo
     *
     * Update subscription
     *
     * @param string $subscription_key Subscription number or ID. (required)
     * @param \Swagger\Client\Model\PUTSubscriptionType $request  (required)
     * @param string $zuora_version The minor version of the Zuora REST API. You only need to set this parameter if you use the __collect__ or __invoice__ field. See [REST API Basics](https://knowledgecenter.zuora.com/DC_Developers/REST_API/A_REST_basics) for more information. (optional)
     * @throws \Swagger\Client\ApiException on non-2xx response
     * @return array of \Swagger\Client\Model\PUTSubscriptionResponseType, HTTP status code, HTTP response headers (array of strings)
     */
    public function pUTSubscriptionWithHttpInfo($subscription_key, $request, $zuora_version = null)
    {
        // verify the required parameter 'subscription_key' is set
        if ($subscription_key === null) {
            throw new \InvalidArgumentException('Missing the required parameter $subscription_key when calling pUTSubscription');
        }
        // verify the required parameter 'request' is set
        if ($request === null) {
            throw new \InvalidArgumentException('Missing the required parameter $request when calling pUTSubscription');
        }
        // parse inputs
        $resourcePath = "/subscriptions/{subscription-key}";
        $httpBody = '';
        $queryParams = [];
        $headerParams = [];
        $formParams = [];
        $_header_accept = $this->apiClient->selectHeaderAccept(['application/json']);
        if (!is_null($_header_accept)) {
            $headerParams['Accept'] = $_header_accept;
        }
        $headerParams['Content-Type'] = $this->apiClient->selectHeaderContentType(['application/json']);

        // header params
        if ($zuora_version !== null) {
            $headerParams['zuora-version'] = $this->apiClient->getSerializer()->toHeaderValue($zuora_version);
        }
        // path params
        if ($subscription_key !== null) {
            $resourcePath = str_replace(
                "{" . "subscription-key" . "}",
                $this->apiClient->getSerializer()->toPathValue($subscription_key),
                $resourcePath
            );
        }
        // default format to json
        $resourcePath = str_replace("{format}", "json", $resourcePath);

        // body params
        $_tempBody = null;
        if (isset($request)) {
            $_tempBody = $request;
        }

        // for model (json/xml)
        if (isset($_tempBody)) {
            $httpBody = $_tempBody; // $_tempBody is the method argument, if present
        } elseif (count($formParams) > 0) {
            $httpBody = $formParams; // for HTTP post (form)
        }
        // make the API Call
        try {
            list($response, $statusCode, $httpHeader) = $this->apiClient->callApi(
                $resourcePath,
                'PUT',
                $queryParams,
                $httpBody,
                $headerParams,
                '\Swagger\Client\Model\PUTSubscriptionResponseType',
                '/subscriptions/{subscription-key}'
            );

            return [$this->apiClient->getSerializer()->deserialize($response, '\Swagger\Client\Model\PUTSubscriptionResponseType', $httpHeader), $statusCode, $httpHeader];
        } catch (ApiException $e) {
            switch ($e->getCode()) {
                case 200:
                    $data = $this->apiClient->getSerializer()->deserialize($e->getResponseBody(), '\Swagger\Client\Model\PUTSubscriptionResponseType', $e->getResponseHeaders());
                    $e->setResponseObject($data);
                    break;
            }

            throw $e;
        }
    }

    /**
     * Operation pUTSubscriptionResume
     *
     * Resume subscription
     *
     * @param string $subscription_key Subscription number or ID. Subscription status must be Active. (required)
     * @param \Swagger\Client\Model\PUTSubscriptionResumeType $request  (required)
     * @param string $zuora_version The minor version of the Zuora REST API. You only need to set this parameter if you use the __collect__ or __invoice__ field. See [REST API Basics](https://knowledgecenter.zuora.com/DC_Developers/REST_API/A_REST_basics) for more information. (optional)
     * @throws \Swagger\Client\ApiException on non-2xx response
     * @return \Swagger\Client\Model\PUTSubscriptionResumeResponseType
     */
    public function pUTSubscriptionResume($subscription_key, $request, $zuora_version = null)
    {
        list($response) = $this->pUTSubscriptionResumeWithHttpInfo($subscription_key, $request, $zuora_version);
        return $response;
    }

    /**
     * Operation pUTSubscriptionResumeWithHttpInfo
     *
     * Resume subscription
     *
     * @param string $subscription_key Subscription number or ID. Subscription status must be Active. (required)
     * @param \Swagger\Client\Model\PUTSubscriptionResumeType $request  (required)
     * @param string $zuora_version The minor version of the Zuora REST API. You only need to set this parameter if you use the __collect__ or __invoice__ field. See [REST API Basics](https://knowledgecenter.zuora.com/DC_Developers/REST_API/A_REST_basics) for more information. (optional)
     * @throws \Swagger\Client\ApiException on non-2xx response
     * @return array of \Swagger\Client\Model\PUTSubscriptionResumeResponseType, HTTP status code, HTTP response headers (array of strings)
     */
    public function pUTSubscriptionResumeWithHttpInfo($subscription_key, $request, $zuora_version = null)
    {
        // verify the required parameter 'subscription_key' is set
        if ($subscription_key === null) {
            throw new \InvalidArgumentException('Missing the required parameter $subscription_key when calling pUTSubscriptionResume');
        }
        // verify the required parameter 'request' is set
        if ($request === null) {
            throw new \InvalidArgumentException('Missing the required parameter $request when calling pUTSubscriptionResume');
        }
        // parse inputs
        $resourcePath = "/subscriptions/{subscription-key}/resume";
        $httpBody = '';
        $queryParams = [];
        $headerParams = [];
        $formParams = [];
        $_header_accept = $this->apiClient->selectHeaderAccept(['application/json']);
        if (!is_null($_header_accept)) {
            $headerParams['Accept'] = $_header_accept;
        }
        $headerParams['Content-Type'] = $this->apiClient->selectHeaderContentType(['application/json']);

        // header params
        if ($zuora_version !== null) {
            $headerParams['zuora-version'] = $this->apiClient->getSerializer()->toHeaderValue($zuora_version);
        }
        // path params
        if ($subscription_key !== null) {
            $resourcePath = str_replace(
                "{" . "subscription-key" . "}",
                $this->apiClient->getSerializer()->toPathValue($subscription_key),
                $resourcePath
            );
        }
        // default format to json
        $resourcePath = str_replace("{format}", "json", $resourcePath);

        // body params
        $_tempBody = null;
        if (isset($request)) {
            $_tempBody = $request;
        }

        // for model (json/xml)
        if (isset($_tempBody)) {
            $httpBody = $_tempBody; // $_tempBody is the method argument, if present
        } elseif (count($formParams) > 0) {
            $httpBody = $formParams; // for HTTP post (form)
        }
        // make the API Call
        try {
            list($response, $statusCode, $httpHeader) = $this->apiClient->callApi(
                $resourcePath,
                'PUT',
                $queryParams,
                $httpBody,
                $headerParams,
                '\Swagger\Client\Model\PUTSubscriptionResumeResponseType',
                '/subscriptions/{subscription-key}/resume'
            );

            return [$this->apiClient->getSerializer()->deserialize($response, '\Swagger\Client\Model\PUTSubscriptionResumeResponseType', $httpHeader), $statusCode, $httpHeader];
        } catch (ApiException $e) {
            switch ($e->getCode()) {
                case 200:
                    $data = $this->apiClient->getSerializer()->deserialize($e->getResponseBody(), '\Swagger\Client\Model\PUTSubscriptionResumeResponseType', $e->getResponseHeaders());
                    $e->setResponseObject($data);
                    break;
            }

            throw $e;
        }
    }

    /**
     * Operation pUTSubscriptionSuspend
     *
     * Suspend subscription
     *
     * @param string $subscription_key Subscription number or ID. Subscription status must be Active. (required)
     * @param \Swagger\Client\Model\PUTSubscriptionSuspendType $request  (required)
     * @param string $zuora_version The minor version of the Zuora REST API. You only need to set this parameter if you use the __collect__ or __invoice__ field. See [REST API Basics](https://knowledgecenter.zuora.com/DC_Developers/REST_API/A_REST_basics) for more information. (optional)
     * @throws \Swagger\Client\ApiException on non-2xx response
     * @return \Swagger\Client\Model\PUTSubscriptionSuspendResponseType
     */
    public function pUTSubscriptionSuspend($subscription_key, $request, $zuora_version = null)
    {
        list($response) = $this->pUTSubscriptionSuspendWithHttpInfo($subscription_key, $request, $zuora_version);
        return $response;
    }

    /**
     * Operation pUTSubscriptionSuspendWithHttpInfo
     *
     * Suspend subscription
     *
     * @param string $subscription_key Subscription number or ID. Subscription status must be Active. (required)
     * @param \Swagger\Client\Model\PUTSubscriptionSuspendType $request  (required)
     * @param string $zuora_version The minor version of the Zuora REST API. You only need to set this parameter if you use the __collect__ or __invoice__ field. See [REST API Basics](https://knowledgecenter.zuora.com/DC_Developers/REST_API/A_REST_basics) for more information. (optional)
     * @throws \Swagger\Client\ApiException on non-2xx response
     * @return array of \Swagger\Client\Model\PUTSubscriptionSuspendResponseType, HTTP status code, HTTP response headers (array of strings)
     */
    public function pUTSubscriptionSuspendWithHttpInfo($subscription_key, $request, $zuora_version = null)
    {
        // verify the required parameter 'subscription_key' is set
        if ($subscription_key === null) {
            throw new \InvalidArgumentException('Missing the required parameter $subscription_key when calling pUTSubscriptionSuspend');
        }
        // verify the required parameter 'request' is set
        if ($request === null) {
            throw new \InvalidArgumentException('Missing the required parameter $request when calling pUTSubscriptionSuspend');
        }
        // parse inputs
        $resourcePath = "/subscriptions/{subscription-key}/suspend";
        $httpBody = '';
        $queryParams = [];
        $headerParams = [];
        $formParams = [];
        $_header_accept = $this->apiClient->selectHeaderAccept(['application/json']);
        if (!is_null($_header_accept)) {
            $headerParams['Accept'] = $_header_accept;
        }
        $headerParams['Content-Type'] = $this->apiClient->selectHeaderContentType(['application/json']);

        // header params
        if ($zuora_version !== null) {
            $headerParams['zuora-version'] = $this->apiClient->getSerializer()->toHeaderValue($zuora_version);
        }
        // path params
        if ($subscription_key !== null) {
            $resourcePath = str_replace(
                "{" . "subscription-key" . "}",
                $this->apiClient->getSerializer()->toPathValue($subscription_key),
                $resourcePath
            );
        }
        // default format to json
        $resourcePath = str_replace("{format}", "json", $resourcePath);

        // body params
        $_tempBody = null;
        if (isset($request)) {
            $_tempBody = $request;
        }

        // for model (json/xml)
        if (isset($_tempBody)) {
            $httpBody = $_tempBody; // $_tempBody is the method argument, if present
        } elseif (count($formParams) > 0) {
            $httpBody = $formParams; // for HTTP post (form)
        }
        // make the API Call
        try {
            list($response, $statusCode, $httpHeader) = $this->apiClient->callApi(
                $resourcePath,
                'PUT',
                $queryParams,
                $httpBody,
                $headerParams,
                '\Swagger\Client\Model\PUTSubscriptionSuspendResponseType',
                '/subscriptions/{subscription-key}/suspend'
            );

            return [$this->apiClient->getSerializer()->deserialize($response, '\Swagger\Client\Model\PUTSubscriptionSuspendResponseType', $httpHeader), $statusCode, $httpHeader];
        } catch (ApiException $e) {
            switch ($e->getCode()) {
                case 200:
                    $data = $this->apiClient->getSerializer()->deserialize($e->getResponseBody(), '\Swagger\Client\Model\PUTSubscriptionSuspendResponseType', $e->getResponseHeaders());
                    $e->setResponseObject($data);
                    break;
            }

            throw $e;
        }
    }

    /**
     * Operation proxyDELETESubscription
     *
     * CRUD: Delete Subscription
     *
     * @param string $id Object id (required)
     * @throws \Swagger\Client\ApiException on non-2xx response
     * @return \Swagger\Client\Model\ProxyDeleteResponse
     */
    public function proxyDELETESubscription($id)
    {
        list($response) = $this->proxyDELETESubscriptionWithHttpInfo($id);
        return $response;
    }

    /**
     * Operation proxyDELETESubscriptionWithHttpInfo
     *
     * CRUD: Delete Subscription
     *
     * @param string $id Object id (required)
     * @throws \Swagger\Client\ApiException on non-2xx response
     * @return array of \Swagger\Client\Model\ProxyDeleteResponse, HTTP status code, HTTP response headers (array of strings)
     */
    public function proxyDELETESubscriptionWithHttpInfo($id)
    {
        // verify the required parameter 'id' is set
        if ($id === null) {
            throw new \InvalidArgumentException('Missing the required parameter $id when calling proxyDELETESubscription');
        }
        // parse inputs
        $resourcePath = "/object/subscription/{id}";
        $httpBody = '';
        $queryParams = [];
        $headerParams = [];
        $formParams = [];
        $_header_accept = $this->apiClient->selectHeaderAccept(['application/json']);
        if (!is_null($_header_accept)) {
            $headerParams['Accept'] = $_header_accept;
        }
        $headerParams['Content-Type'] = $this->apiClient->selectHeaderContentType(['application/json']);

        // path params
        if ($id !== null) {
            $resourcePath = str_replace(
                "{" . "id" . "}",
                $this->apiClient->getSerializer()->toPathValue($id),
                $resourcePath
            );
        }
        // default format to json
        $resourcePath = str_replace("{format}", "json", $resourcePath);

        
        // for model (json/xml)
        if (isset($_tempBody)) {
            $httpBody = $_tempBody; // $_tempBody is the method argument, if present
        } elseif (count($formParams) > 0) {
            $httpBody = $formParams; // for HTTP post (form)
        }
        // make the API Call
        try {
            list($response, $statusCode, $httpHeader) = $this->apiClient->callApi(
                $resourcePath,
                'DELETE',
                $queryParams,
                $httpBody,
                $headerParams,
                '\Swagger\Client\Model\ProxyDeleteResponse',
                '/object/subscription/{id}'
            );

            return [$this->apiClient->getSerializer()->deserialize($response, '\Swagger\Client\Model\ProxyDeleteResponse', $httpHeader), $statusCode, $httpHeader];
        } catch (ApiException $e) {
            switch ($e->getCode()) {
                case 200:
                    $data = $this->apiClient->getSerializer()->deserialize($e->getResponseBody(), '\Swagger\Client\Model\ProxyDeleteResponse', $e->getResponseHeaders());
                    $e->setResponseObject($data);
                    break;
            }

            throw $e;
        }
    }

    /**
     * Operation proxyGETSubscription
     *
     * CRUD: Retrieve Subscription
     *
     * @param string $id Object id (required)
     * @param string $fields Object fields to return (optional)
     * @throws \Swagger\Client\ApiException on non-2xx response
     * @return \Swagger\Client\Model\ProxyGetSubscription
     */
    public function proxyGETSubscription($id, $fields = null)
    {
        list($response) = $this->proxyGETSubscriptionWithHttpInfo($id, $fields);
        return $response;
    }

    /**
     * Operation proxyGETSubscriptionWithHttpInfo
     *
     * CRUD: Retrieve Subscription
     *
     * @param string $id Object id (required)
     * @param string $fields Object fields to return (optional)
     * @throws \Swagger\Client\ApiException on non-2xx response
     * @return array of \Swagger\Client\Model\ProxyGetSubscription, HTTP status code, HTTP response headers (array of strings)
     */
    public function proxyGETSubscriptionWithHttpInfo($id, $fields = null)
    {
        // verify the required parameter 'id' is set
        if ($id === null) {
            throw new \InvalidArgumentException('Missing the required parameter $id when calling proxyGETSubscription');
        }
        // parse inputs
        $resourcePath = "/object/subscription/{id}";
        $httpBody = '';
        $queryParams = [];
        $headerParams = [];
        $formParams = [];
        $_header_accept = $this->apiClient->selectHeaderAccept(['application/json']);
        if (!is_null($_header_accept)) {
            $headerParams['Accept'] = $_header_accept;
        }
        $headerParams['Content-Type'] = $this->apiClient->selectHeaderContentType(['application/json']);

        // query params
        if ($fields !== null) {
            $queryParams['fields'] = $this->apiClient->getSerializer()->toQueryValue($fields);
        }
        // path params
        if ($id !== null) {
            $resourcePath = str_replace(
                "{" . "id" . "}",
                $this->apiClient->getSerializer()->toPathValue($id),
                $resourcePath
            );
        }
        // default format to json
        $resourcePath = str_replace("{format}", "json", $resourcePath);

        
        // for model (json/xml)
        if (isset($_tempBody)) {
            $httpBody = $_tempBody; // $_tempBody is the method argument, if present
        } elseif (count($formParams) > 0) {
            $httpBody = $formParams; // for HTTP post (form)
        }
        // make the API Call
        try {
            list($response, $statusCode, $httpHeader) = $this->apiClient->callApi(
                $resourcePath,
                'GET',
                $queryParams,
                $httpBody,
                $headerParams,
                '\Swagger\Client\Model\ProxyGetSubscription',
                '/object/subscription/{id}'
            );

            return [$this->apiClient->getSerializer()->deserialize($response, '\Swagger\Client\Model\ProxyGetSubscription', $httpHeader), $statusCode, $httpHeader];
        } catch (ApiException $e) {
            switch ($e->getCode()) {
                case 200:
                    $data = $this->apiClient->getSerializer()->deserialize($e->getResponseBody(), '\Swagger\Client\Model\ProxyGetSubscription', $e->getResponseHeaders());
                    $e->setResponseObject($data);
                    break;
                case 404:
                    $data = $this->apiClient->getSerializer()->deserialize($e->getResponseBody(), '\Swagger\Client\Model\ProxyNoDataResponse', $e->getResponseHeaders());
                    $e->setResponseObject($data);
                    break;
            }

            throw $e;
        }
    }

    /**
     * Operation proxyPOSTSubscription
     *
     * CRUD: Create Subscription
     *
     * @param \Swagger\Client\Model\ProxyCreateSubscription $create_request  (required)
     * @throws \Swagger\Client\ApiException on non-2xx response
     * @return \Swagger\Client\Model\ProxyCreateOrModifyResponse
     */
    public function proxyPOSTSubscription($create_request)
    {
        list($response) = $this->proxyPOSTSubscriptionWithHttpInfo($create_request);
        return $response;
    }

    /**
     * Operation proxyPOSTSubscriptionWithHttpInfo
     *
     * CRUD: Create Subscription
     *
     * @param \Swagger\Client\Model\ProxyCreateSubscription $create_request  (required)
     * @throws \Swagger\Client\ApiException on non-2xx response
     * @return array of \Swagger\Client\Model\ProxyCreateOrModifyResponse, HTTP status code, HTTP response headers (array of strings)
     */
    public function proxyPOSTSubscriptionWithHttpInfo($create_request)
    {
        // verify the required parameter 'create_request' is set
        if ($create_request === null) {
            throw new \InvalidArgumentException('Missing the required parameter $create_request when calling proxyPOSTSubscription');
        }
        // parse inputs
        $resourcePath = "/object/subscription";
        $httpBody = '';
        $queryParams = [];
        $headerParams = [];
        $formParams = [];
        $_header_accept = $this->apiClient->selectHeaderAccept(['application/json']);
        if (!is_null($_header_accept)) {
            $headerParams['Accept'] = $_header_accept;
        }
        $headerParams['Content-Type'] = $this->apiClient->selectHeaderContentType(['application/json']);

        // default format to json
        $resourcePath = str_replace("{format}", "json", $resourcePath);

        // body params
        $_tempBody = null;
        if (isset($create_request)) {
            $_tempBody = $create_request;
        }

        // for model (json/xml)
        if (isset($_tempBody)) {
            $httpBody = $_tempBody; // $_tempBody is the method argument, if present
        } elseif (count($formParams) > 0) {
            $httpBody = $formParams; // for HTTP post (form)
        }
        // make the API Call
        try {
            list($response, $statusCode, $httpHeader) = $this->apiClient->callApi(
                $resourcePath,
                'POST',
                $queryParams,
                $httpBody,
                $headerParams,
                '\Swagger\Client\Model\ProxyCreateOrModifyResponse',
                '/object/subscription'
            );

            return [$this->apiClient->getSerializer()->deserialize($response, '\Swagger\Client\Model\ProxyCreateOrModifyResponse', $httpHeader), $statusCode, $httpHeader];
        } catch (ApiException $e) {
            switch ($e->getCode()) {
                case 200:
                    $data = $this->apiClient->getSerializer()->deserialize($e->getResponseBody(), '\Swagger\Client\Model\ProxyCreateOrModifyResponse', $e->getResponseHeaders());
                    $e->setResponseObject($data);
                    break;
                case 400:
                    $data = $this->apiClient->getSerializer()->deserialize($e->getResponseBody(), '\Swagger\Client\Model\ProxyBadRequestResponse', $e->getResponseHeaders());
                    $e->setResponseObject($data);
                    break;
            }

            throw $e;
        }
    }

    /**
     * Operation proxyPUTSubscription
     *
     * CRUD: Update Subscription
     *
     * @param string $id Object id (required)
     * @param \Swagger\Client\Model\ProxyModifySubscription $modify_request  (required)
     * @throws \Swagger\Client\ApiException on non-2xx response
     * @return \Swagger\Client\Model\ProxyCreateOrModifyResponse
     */
    public function proxyPUTSubscription($id, $modify_request)
    {
        list($response) = $this->proxyPUTSubscriptionWithHttpInfo($id, $modify_request);
        return $response;
    }

    /**
     * Operation proxyPUTSubscriptionWithHttpInfo
     *
     * CRUD: Update Subscription
     *
     * @param string $id Object id (required)
     * @param \Swagger\Client\Model\ProxyModifySubscription $modify_request  (required)
     * @throws \Swagger\Client\ApiException on non-2xx response
     * @return array of \Swagger\Client\Model\ProxyCreateOrModifyResponse, HTTP status code, HTTP response headers (array of strings)
     */
    public function proxyPUTSubscriptionWithHttpInfo($id, $modify_request)
    {
        // verify the required parameter 'id' is set
        if ($id === null) {
            throw new \InvalidArgumentException('Missing the required parameter $id when calling proxyPUTSubscription');
        }
        // verify the required parameter 'modify_request' is set
        if ($modify_request === null) {
            throw new \InvalidArgumentException('Missing the required parameter $modify_request when calling proxyPUTSubscription');
        }
        // parse inputs
        $resourcePath = "/object/subscription/{id}";
        $httpBody = '';
        $queryParams = [];
        $headerParams = [];
        $formParams = [];
        $_header_accept = $this->apiClient->selectHeaderAccept(['application/json']);
        if (!is_null($_header_accept)) {
            $headerParams['Accept'] = $_header_accept;
        }
        $headerParams['Content-Type'] = $this->apiClient->selectHeaderContentType(['application/json']);

        // path params
        if ($id !== null) {
            $resourcePath = str_replace(
                "{" . "id" . "}",
                $this->apiClient->getSerializer()->toPathValue($id),
                $resourcePath
            );
        }
        // default format to json
        $resourcePath = str_replace("{format}", "json", $resourcePath);

        // body params
        $_tempBody = null;
        if (isset($modify_request)) {
            $_tempBody = $modify_request;
        }

        // for model (json/xml)
        if (isset($_tempBody)) {
            $httpBody = $_tempBody; // $_tempBody is the method argument, if present
        } elseif (count($formParams) > 0) {
            $httpBody = $formParams; // for HTTP post (form)
        }
        // make the API Call
        try {
            list($response, $statusCode, $httpHeader) = $this->apiClient->callApi(
                $resourcePath,
                'PUT',
                $queryParams,
                $httpBody,
                $headerParams,
                '\Swagger\Client\Model\ProxyCreateOrModifyResponse',
                '/object/subscription/{id}'
            );

            return [$this->apiClient->getSerializer()->deserialize($response, '\Swagger\Client\Model\ProxyCreateOrModifyResponse', $httpHeader), $statusCode, $httpHeader];
        } catch (ApiException $e) {
            switch ($e->getCode()) {
                case 200:
                    $data = $this->apiClient->getSerializer()->deserialize($e->getResponseBody(), '\Swagger\Client\Model\ProxyCreateOrModifyResponse', $e->getResponseHeaders());
                    $e->setResponseObject($data);
                    break;
            }

            throw $e;
        }
    }
}
