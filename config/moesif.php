<?php

/*
This config file is not used. merely serve as an example/template that
you can put into your config folder of your laravel project.
*/

/**
 * mask request headers by removing fields
 *
 * @return headers
 */
$maskRequestHeaders = function($headers) {
    $headers['header3'] = 'adding rather than removing, works the same';
    return $headers;
};

/**
 * Remove any fields from body that you don't want to send to Moesif.
 *
 * @return body
 */
$maskRequestBody = function($body) {
    return $body;
};

/**
 * mask request headers by removing fields
 *
 * @return headers
 */
$maskResponseHeaders = function($headers) {
    $headers['header2'] = '';
    return $headers;
};

/**
 * Remove any fields from body that you don't want to send to Moesif.
 *
 * @return body
 */
$maskResponseBody = function($body) {
    return $body;
};

/**
 * users the userId. If your app differs from standard lararvel for identify users.
 *
 * @return string
 */

$identifyUserId = function($request, $response) {
    if (is_null($request->user())) {
        return null;
    } else {
        $user = $request->user();
        return $user['id'];
    }
};

/**
 * returns metadata to be added by the events.
 *
 * @return mixed
 */
$getMetadata = function($request, $response) {
  return array("foo"=>"laravel example", "boo"=>"custom data");
};

/**
 * Use this function to find tokenId . If your app differs from standard lararvel for tokenIds.
 *
 * @return string
 */
$identifySessionId = function($request, $response) {
    if ($request->hasSession()) {
        return $request->session()->getId();
    } else {
        return null;
    }
};

/**
 * If you want to add any other tags to this event. Please comma separate them,
 *
 * @return string
 */
$addTags = function($request, $response) {
    return 'nada, profile';
};

return [
    'applicationId' => 'eyJhcHAiOiI5Mzo4NCIsInZlciI6IjIuMCIsIm9yZyI6IjcyNDo3MSIsImlhdCI6MTU1MDE4ODgwMH0.lzCbm4YjWjy3TsEG2xuMhTjtts806sp9hCoWkQb_KNQ',
    'maskRequestHeaders' => $maskRequestHeaders,
    'maksRequestBody' => $maskRequestBody,
    'maskResponseHeaders' => $maskResponseHeaders,
    'maskResponseBody' => $maskResponseBody,
    'identifyUserId' => $identifyUserId,
    'identifySessionId' => $identifySessionId,
    'apiVersion' => '1.2.2',
    'debug' => true,
    'addTags' => $addTags,
    'samplingPercentage' => 50,
];
