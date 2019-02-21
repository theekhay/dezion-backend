---
title: API Reference

language_tabs:
- bash
- javascript

includes:

search: true

toc_footers:
- <a href='http://github.com/mpociot/documentarian'>Documentation Powered by Documentarian</a>
---
<!-- START_INFO -->
# Info

Welcome to the generated API reference.
[Get Postman Collection](https://localhost/docs/collection.json)

<!-- END_INFO -->

#general
<!-- START_7e3072a9c6d43c05123a799823b02c6d -->
## api/docs
> Example request:

```bash
curl -X GET -G "http://localhost/api/docs" 
```

```javascript
const url = new URL("http://localhost/api/docs");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```

> Example response (500):

```json
{
    "message": "$ref \"#\/definitions\/WorkflowSteps\" not found for @SWG\\Items() in \\App\\Modules\\Workflow\\Http\\Controllers\\API\\WorkflowStepsAPIController->index() in C:\\workspace\\dezion\\app\\Modules\\Workflow\\Http\\Controllers\\API\\WorkflowStepsAPIController.php on line 30",
    "exception": "ErrorException",
    "file": "C:\\workspace\\dezion\\vendor\\zircote\\swagger-php\\src\\Logger.php",
    "line": 38,
    "trace": [
        {
            "function": "handleError",
            "class": "Illuminate\\Foundation\\Bootstrap\\HandleExceptions",
            "type": "->"
        },
        {
            "file": "C:\\workspace\\dezion\\vendor\\zircote\\swagger-php\\src\\Logger.php",
            "line": 38,
            "function": "trigger_error"
        },
        {
            "function": "Swagger\\{closure}",
            "class": "Swagger\\Logger",
            "type": "->"
        },
        {
            "file": "C:\\workspace\\dezion\\vendor\\zircote\\swagger-php\\src\\Logger.php",
            "line": 68,
            "function": "call_user_func"
        },
        {
            "file": "C:\\workspace\\dezion\\vendor\\zircote\\swagger-php\\src\\Annotations\\AbstractAnnotation.php",
            "line": 367,
            "function": "notice",
            "class": "Swagger\\Logger",
            "type": "::"
        },
        {
            "file": "C:\\workspace\\dezion\\vendor\\zircote\\swagger-php\\src\\Annotations\\Schema.php",
            "line": 246,
            "function": "validate",
            "class": "Swagger\\Annotations\\AbstractAnnotation",
            "type": "->"
        },
        {
            "file": "C:\\workspace\\dezion\\vendor\\zircote\\swagger-php\\src\\Annotations\\Items.php",
            "line": 41,
            "function": "validate",
            "class": "Swagger\\Annotations\\Schema",
            "type": "->"
        },
        {
            "file": "C:\\workspace\\dezion\\vendor\\zircote\\swagger-php\\src\\Annotations\\AbstractAnnotation.php",
            "line": 442,
            "function": "validate",
            "class": "Swagger\\Annotations\\Items",
            "type": "->"
        },
        {
            "file": "C:\\workspace\\dezion\\vendor\\zircote\\swagger-php\\src\\Annotations\\AbstractAnnotation.php",
            "line": 412,
            "function": "_validate",
            "class": "Swagger\\Annotations\\AbstractAnnotation",
            "type": "::"
        },
        {
            "file": "C:\\workspace\\dezion\\vendor\\zircote\\swagger-php\\src\\Annotations\\Schema.php",
            "line": 246,
            "function": "validate",
            "class": "Swagger\\Annotations\\AbstractAnnotation",
            "type": "->"
        },
        {
            "file": "C:\\workspace\\dezion\\vendor\\zircote\\swagger-php\\src\\Annotations\\AbstractAnnotation.php",
            "line": 442,
            "function": "validate",
            "class": "Swagger\\Annotations\\Schema",
            "type": "->"
        },
        {
            "file": "C:\\workspace\\dezion\\vendor\\zircote\\swagger-php\\src\\Annotations\\AbstractAnnotation.php",
            "line": 448,
            "function": "_validate",
            "class": "Swagger\\Annotations\\AbstractAnnotation",
            "type": "::"
        },
        {
            "file": "C:\\workspace\\dezion\\vendor\\zircote\\swagger-php\\src\\Annotations\\AbstractAnnotation.php",
            "line": 412,
            "function": "_validate",
            "class": "Swagger\\Annotations\\AbstractAnnotation",
            "type": "::"
        },
        {
            "file": "C:\\workspace\\dezion\\vendor\\zircote\\swagger-php\\src\\Annotations\\Schema.php",
            "line": 246,
            "function": "validate",
            "class": "Swagger\\Annotations\\AbstractAnnotation",
            "type": "->"
        },
        {
            "file": "C:\\workspace\\dezion\\vendor\\zircote\\swagger-php\\src\\Annotations\\AbstractAnnotation.php",
            "line": 442,
            "function": "validate",
            "class": "Swagger\\Annotations\\Schema",
            "type": "->"
        },
        {
            "file": "C:\\workspace\\dezion\\vendor\\zircote\\swagger-php\\src\\Annotations\\AbstractAnnotation.php",
            "line": 412,
            "function": "_validate",
            "class": "Swagger\\Annotations\\AbstractAnnotation",
            "type": "::"
        },
        {
            "file": "C:\\workspace\\dezion\\vendor\\zircote\\swagger-php\\src\\Annotations\\AbstractAnnotation.php",
            "line": 442,
            "function": "validate",
            "class": "Swagger\\Annotations\\AbstractAnnotation",
            "type": "->"
        },
        {
            "file": "C:\\workspace\\dezion\\vendor\\zircote\\swagger-php\\src\\Annotations\\AbstractAnnotation.php",
            "line": 448,
            "function": "_validate",
            "class": "Swagger\\Annotations\\AbstractAnnotation",
            "type": "::"
        },
        {
            "file": "C:\\workspace\\dezion\\vendor\\zircote\\swagger-php\\src\\Annotations\\AbstractAnnotation.php",
            "line": 412,
            "function": "_validate",
            "class": "Swagger\\Annotations\\AbstractAnnotation",
            "type": "::"
        },
        {
            "file": "C:\\workspace\\dezion\\vendor\\zircote\\swagger-php\\src\\Annotations\\Operation.php",
            "line": 158,
            "function": "validate",
            "class": "Swagger\\Annotations\\AbstractAnnotation",
            "type": "->"
        },
        {
            "file": "C:\\workspace\\dezion\\vendor\\zircote\\swagger-php\\src\\Annotations\\AbstractAnnotation.php",
            "line": 442,
            "function": "validate",
            "class": "Swagger\\Annotations\\Operation",
            "type": "->"
        },
        {
            "file": "C:\\workspace\\dezion\\vendor\\zircote\\swagger-php\\src\\Annotations\\AbstractAnnotation.php",
            "line": 412,
            "function": "_validate",
            "class": "Swagger\\Annotations\\AbstractAnnotation",
            "type": "::"
        },
        {
            "file": "C:\\workspace\\dezion\\vendor\\zircote\\swagger-php\\src\\Annotations\\AbstractAnnotation.php",
            "line": 442,
            "function": "validate",
            "class": "Swagger\\Annotations\\AbstractAnnotation",
            "type": "->"
        },
        {
            "file": "C:\\workspace\\dezion\\vendor\\zircote\\swagger-php\\src\\Annotations\\AbstractAnnotation.php",
            "line": 448,
            "function": "_validate",
            "class": "Swagger\\Annotations\\AbstractAnnotation",
            "type": "::"
        },
        {
            "file": "C:\\workspace\\dezion\\vendor\\zircote\\swagger-php\\src\\Annotations\\AbstractAnnotation.php",
            "line": 412,
            "function": "_validate",
            "class": "Swagger\\Annotations\\AbstractAnnotation",
            "type": "::"
        },
        {
            "file": "C:\\workspace\\dezion\\vendor\\zircote\\swagger-php\\src\\Annotations\\Swagger.php",
            "line": 150,
            "function": "validate",
            "class": "Swagger\\Annotations\\AbstractAnnotation",
            "type": "->"
        },
        {
            "file": "C:\\workspace\\dezion\\vendor\\zircote\\swagger-php\\src\\Analysis.php",
            "line": 331,
            "function": "validate",
            "class": "Swagger\\Annotations\\Swagger",
            "type": "->"
        },
        {
            "file": "C:\\workspace\\dezion\\vendor\\zircote\\swagger-php\\src\\functions.php",
            "line": 46,
            "function": "validate",
            "class": "Swagger\\Analysis",
            "type": "->"
        },
        {
            "file": "C:\\workspace\\dezion\\vendor\\appointer\\swaggervel\\src\\Appointer\\Swaggervel\\Http\\Controllers\\SwaggervelController.php",
            "line": 84,
            "function": "Swagger\\scan"
        },
        {
            "file": "C:\\workspace\\dezion\\vendor\\appointer\\swaggervel\\src\\Appointer\\Swaggervel\\Http\\Controllers\\SwaggervelController.php",
            "line": 36,
            "function": "regenerateDefinitions",
            "class": "Appointer\\Swaggervel\\Http\\Controllers\\SwaggervelController",
            "type": "->"
        },
        {
            "function": "ui",
            "class": "Appointer\\Swaggervel\\Http\\Controllers\\SwaggervelController",
            "type": "->"
        },
        {
            "file": "C:\\workspace\\dezion\\vendor\\laravel\\framework\\src\\Illuminate\\Routing\\Controller.php",
            "line": 54,
            "function": "call_user_func_array"
        },
        {
            "file": "C:\\workspace\\dezion\\vendor\\laravel\\framework\\src\\Illuminate\\Routing\\ControllerDispatcher.php",
            "line": 45,
            "function": "callAction",
            "class": "Illuminate\\Routing\\Controller",
            "type": "->"
        },
        {
            "file": "C:\\workspace\\dezion\\vendor\\laravel\\framework\\src\\Illuminate\\Routing\\Route.php",
            "line": 219,
            "function": "dispatch",
            "class": "Illuminate\\Routing\\ControllerDispatcher",
            "type": "->"
        },
        {
            "file": "C:\\workspace\\dezion\\vendor\\laravel\\framework\\src\\Illuminate\\Routing\\Route.php",
            "line": 176,
            "function": "runController",
            "class": "Illuminate\\Routing\\Route",
            "type": "->"
        },
        {
            "file": "C:\\workspace\\dezion\\vendor\\laravel\\framework\\src\\Illuminate\\Routing\\Router.php",
            "line": 682,
            "function": "run",
            "class": "Illuminate\\Routing\\Route",
            "type": "->"
        },
        {
            "file": "C:\\workspace\\dezion\\vendor\\laravel\\framework\\src\\Illuminate\\Routing\\Pipeline.php",
            "line": 30,
            "function": "Illuminate\\Routing\\{closure}",
            "class": "Illuminate\\Routing\\Router",
            "type": "->"
        },
        {
            "file": "C:\\workspace\\dezion\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php",
            "line": 104,
            "function": "Illuminate\\Routing\\{closure}",
            "class": "Illuminate\\Routing\\Pipeline",
            "type": "->"
        },
        {
            "file": "C:\\workspace\\dezion\\vendor\\laravel\\framework\\src\\Illuminate\\Routing\\Router.php",
            "line": 684,
            "function": "then",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "->"
        },
        {
            "file": "C:\\workspace\\dezion\\vendor\\laravel\\framework\\src\\Illuminate\\Routing\\Router.php",
            "line": 659,
            "function": "runRouteWithinStack",
            "class": "Illuminate\\Routing\\Router",
            "type": "->"
        },
        {
            "file": "C:\\workspace\\dezion\\vendor\\laravel\\framework\\src\\Illuminate\\Routing\\Router.php",
            "line": 625,
            "function": "runRoute",
            "class": "Illuminate\\Routing\\Router",
            "type": "->"
        },
        {
            "file": "C:\\workspace\\dezion\\vendor\\laravel\\framework\\src\\Illuminate\\Routing\\Router.php",
            "line": 614,
            "function": "dispatchToRoute",
            "class": "Illuminate\\Routing\\Router",
            "type": "->"
        },
        {
            "file": "C:\\workspace\\dezion\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Http\\Kernel.php",
            "line": 176,
            "function": "dispatch",
            "class": "Illuminate\\Routing\\Router",
            "type": "->"
        },
        {
            "file": "C:\\workspace\\dezion\\vendor\\laravel\\framework\\src\\Illuminate\\Routing\\Pipeline.php",
            "line": 30,
            "function": "Illuminate\\Foundation\\Http\\{closure}",
            "class": "Illuminate\\Foundation\\Http\\Kernel",
            "type": "->"
        },
        {
            "file": "C:\\workspace\\dezion\\vendor\\barryvdh\\laravel-debugbar\\src\\Middleware\\InjectDebugbar.php",
            "line": 58,
            "function": "Illuminate\\Routing\\{closure}",
            "class": "Illuminate\\Routing\\Pipeline",
            "type": "->"
        },
        {
            "file": "C:\\workspace\\dezion\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php",
            "line": 151,
            "function": "handle",
            "class": "Barryvdh\\Debugbar\\Middleware\\InjectDebugbar",
            "type": "->"
        },
        {
            "file": "C:\\workspace\\dezion\\vendor\\laravel\\framework\\src\\Illuminate\\Routing\\Pipeline.php",
            "line": 53,
            "function": "Illuminate\\Pipeline\\{closure}",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "->"
        },
        {
            "file": "C:\\workspace\\dezion\\vendor\\moesif\\moesif-laravel\\src\\Moesif\\Middleware\\MoesifLaravel.php",
            "line": 34,
            "function": "Illuminate\\Routing\\{closure}",
            "class": "Illuminate\\Routing\\Pipeline",
            "type": "->"
        },
        {
            "file": "C:\\workspace\\dezion\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php",
            "line": 151,
            "function": "handle",
            "class": "Moesif\\Middleware\\MoesifLaravel",
            "type": "->"
        },
        {
            "file": "C:\\workspace\\dezion\\vendor\\laravel\\framework\\src\\Illuminate\\Routing\\Pipeline.php",
            "line": 53,
            "function": "Illuminate\\Pipeline\\{closure}",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "->"
        },
        {
            "file": "C:\\workspace\\dezion\\vendor\\spatie\\laravel-cors\\src\\Cors.php",
            "line": 28,
            "function": "Illuminate\\Routing\\{closure}",
            "class": "Illuminate\\Routing\\Pipeline",
            "type": "->"
        },
        {
            "file": "C:\\workspace\\dezion\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php",
            "line": 151,
            "function": "handle",
            "class": "Spatie\\Cors\\Cors",
            "type": "->"
        },
        {
            "file": "C:\\workspace\\dezion\\vendor\\laravel\\framework\\src\\Illuminate\\Routing\\Pipeline.php",
            "line": 53,
            "function": "Illuminate\\Pipeline\\{closure}",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "->"
        },
        {
            "file": "C:\\workspace\\dezion\\vendor\\fideloper\\proxy\\src\\TrustProxies.php",
            "line": 57,
            "function": "Illuminate\\Routing\\{closure}",
            "class": "Illuminate\\Routing\\Pipeline",
            "type": "->"
        },
        {
            "file": "C:\\workspace\\dezion\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php",
            "line": 151,
            "function": "handle",
            "class": "Fideloper\\Proxy\\TrustProxies",
            "type": "->"
        },
        {
            "file": "C:\\workspace\\dezion\\vendor\\laravel\\framework\\src\\Illuminate\\Routing\\Pipeline.php",
            "line": 53,
            "function": "Illuminate\\Pipeline\\{closure}",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "->"
        },
        {
            "file": "C:\\workspace\\dezion\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Http\\Middleware\\TransformsRequest.php",
            "line": 31,
            "function": "Illuminate\\Routing\\{closure}",
            "class": "Illuminate\\Routing\\Pipeline",
            "type": "->"
        },
        {
            "file": "C:\\workspace\\dezion\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php",
            "line": 151,
            "function": "handle",
            "class": "Illuminate\\Foundation\\Http\\Middleware\\TransformsRequest",
            "type": "->"
        },
        {
            "file": "C:\\workspace\\dezion\\vendor\\laravel\\framework\\src\\Illuminate\\Routing\\Pipeline.php",
            "line": 53,
            "function": "Illuminate\\Pipeline\\{closure}",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "->"
        },
        {
            "file": "C:\\workspace\\dezion\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Http\\Middleware\\TransformsRequest.php",
            "line": 31,
            "function": "Illuminate\\Routing\\{closure}",
            "class": "Illuminate\\Routing\\Pipeline",
            "type": "->"
        },
        {
            "file": "C:\\workspace\\dezion\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php",
            "line": 151,
            "function": "handle",
            "class": "Illuminate\\Foundation\\Http\\Middleware\\TransformsRequest",
            "type": "->"
        },
        {
            "file": "C:\\workspace\\dezion\\vendor\\laravel\\framework\\src\\Illuminate\\Routing\\Pipeline.php",
            "line": 53,
            "function": "Illuminate\\Pipeline\\{closure}",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "->"
        },
        {
            "file": "C:\\workspace\\dezion\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Http\\Middleware\\ValidatePostSize.php",
            "line": 27,
            "function": "Illuminate\\Routing\\{closure}",
            "class": "Illuminate\\Routing\\Pipeline",
            "type": "->"
        },
        {
            "file": "C:\\workspace\\dezion\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php",
            "line": 151,
            "function": "handle",
            "class": "Illuminate\\Foundation\\Http\\Middleware\\ValidatePostSize",
            "type": "->"
        },
        {
            "file": "C:\\workspace\\dezion\\vendor\\laravel\\framework\\src\\Illuminate\\Routing\\Pipeline.php",
            "line": 53,
            "function": "Illuminate\\Pipeline\\{closure}",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "->"
        },
        {
            "file": "C:\\workspace\\dezion\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Http\\Middleware\\CheckForMaintenanceMode.php",
            "line": 62,
            "function": "Illuminate\\Routing\\{closure}",
            "class": "Illuminate\\Routing\\Pipeline",
            "type": "->"
        },
        {
            "file": "C:\\workspace\\dezion\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php",
            "line": 151,
            "function": "handle",
            "class": "Illuminate\\Foundation\\Http\\Middleware\\CheckForMaintenanceMode",
            "type": "->"
        },
        {
            "file": "C:\\workspace\\dezion\\vendor\\laravel\\framework\\src\\Illuminate\\Routing\\Pipeline.php",
            "line": 53,
            "function": "Illuminate\\Pipeline\\{closure}",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "->"
        },
        {
            "file": "C:\\workspace\\dezion\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php",
            "line": 104,
            "function": "Illuminate\\Routing\\{closure}",
            "class": "Illuminate\\Routing\\Pipeline",
            "type": "->"
        },
        {
            "file": "C:\\workspace\\dezion\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Http\\Kernel.php",
            "line": 151,
            "function": "then",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "->"
        },
        {
            "file": "C:\\workspace\\dezion\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Http\\Kernel.php",
            "line": 116,
            "function": "sendRequestThroughRouter",
            "class": "Illuminate\\Foundation\\Http\\Kernel",
            "type": "->"
        },
        {
            "file": "C:\\workspace\\dezion\\vendor\\mpociot\\laravel-apidoc-generator\\src\\Tools\\ResponseStrategies\\ResponseCallStrategy.php",
            "line": 275,
            "function": "handle",
            "class": "Illuminate\\Foundation\\Http\\Kernel",
            "type": "->"
        },
        {
            "file": "C:\\workspace\\dezion\\vendor\\mpociot\\laravel-apidoc-generator\\src\\Tools\\ResponseStrategies\\ResponseCallStrategy.php",
            "line": 259,
            "function": "callLaravelRoute",
            "class": "Mpociot\\ApiDoc\\Tools\\ResponseStrategies\\ResponseCallStrategy",
            "type": "->"
        },
        {
            "file": "C:\\workspace\\dezion\\vendor\\mpociot\\laravel-apidoc-generator\\src\\Tools\\ResponseStrategies\\ResponseCallStrategy.php",
            "line": 36,
            "function": "makeApiCall",
            "class": "Mpociot\\ApiDoc\\Tools\\ResponseStrategies\\ResponseCallStrategy",
            "type": "->"
        },
        {
            "file": "C:\\workspace\\dezion\\vendor\\mpociot\\laravel-apidoc-generator\\src\\Tools\\ResponseResolver.php",
            "line": 49,
            "function": "__invoke",
            "class": "Mpociot\\ApiDoc\\Tools\\ResponseStrategies\\ResponseCallStrategy",
            "type": "->"
        },
        {
            "file": "C:\\workspace\\dezion\\vendor\\mpociot\\laravel-apidoc-generator\\src\\Tools\\ResponseResolver.php",
            "line": 68,
            "function": "resolve",
            "class": "Mpociot\\ApiDoc\\Tools\\ResponseResolver",
            "type": "->"
        },
        {
            "file": "C:\\workspace\\dezion\\vendor\\mpociot\\laravel-apidoc-generator\\src\\Tools\\Generator.php",
            "line": 57,
            "function": "getResponse",
            "class": "Mpociot\\ApiDoc\\Tools\\ResponseResolver",
            "type": "::"
        },
        {
            "file": "C:\\workspace\\dezion\\vendor\\mpociot\\laravel-apidoc-generator\\src\\Commands\\GenerateDocumentation.php",
            "line": 201,
            "function": "processRoute",
            "class": "Mpociot\\ApiDoc\\Tools\\Generator",
            "type": "->"
        },
        {
            "file": "C:\\workspace\\dezion\\vendor\\mpociot\\laravel-apidoc-generator\\src\\Commands\\GenerateDocumentation.php",
            "line": 59,
            "function": "processRoutes",
            "class": "Mpociot\\ApiDoc\\Commands\\GenerateDocumentation",
            "type": "->"
        },
        {
            "function": "handle",
            "class": "Mpociot\\ApiDoc\\Commands\\GenerateDocumentation",
            "type": "->"
        },
        {
            "file": "C:\\workspace\\dezion\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php",
            "line": 29,
            "function": "call_user_func_array"
        },
        {
            "file": "C:\\workspace\\dezion\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php",
            "line": 87,
            "function": "Illuminate\\Container\\{closure}",
            "class": "Illuminate\\Container\\BoundMethod",
            "type": "::"
        },
        {
            "file": "C:\\workspace\\dezion\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php",
            "line": 31,
            "function": "callBoundMethod",
            "class": "Illuminate\\Container\\BoundMethod",
            "type": "::"
        },
        {
            "file": "C:\\workspace\\dezion\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\Container.php",
            "line": 572,
            "function": "call",
            "class": "Illuminate\\Container\\BoundMethod",
            "type": "::"
        },
        {
            "file": "C:\\workspace\\dezion\\vendor\\laravel\\framework\\src\\Illuminate\\Console\\Command.php",
            "line": 183,
            "function": "call",
            "class": "Illuminate\\Container\\Container",
            "type": "->"
        },
        {
            "file": "C:\\workspace\\dezion\\vendor\\symfony\\console\\Command\\Command.php",
            "line": 255,
            "function": "execute",
            "class": "Illuminate\\Console\\Command",
            "type": "->"
        },
        {
            "file": "C:\\workspace\\dezion\\vendor\\laravel\\framework\\src\\Illuminate\\Console\\Command.php",
            "line": 170,
            "function": "run",
            "class": "Symfony\\Component\\Console\\Command\\Command",
            "type": "->"
        },
        {
            "file": "C:\\workspace\\dezion\\vendor\\symfony\\console\\Application.php",
            "line": 901,
            "function": "run",
            "class": "Illuminate\\Console\\Command",
            "type": "->"
        },
        {
            "file": "C:\\workspace\\dezion\\vendor\\symfony\\console\\Application.php",
            "line": 262,
            "function": "doRunCommand",
            "class": "Symfony\\Component\\Console\\Application",
            "type": "->"
        },
        {
            "file": "C:\\workspace\\dezion\\vendor\\symfony\\console\\Application.php",
            "line": 145,
            "function": "doRun",
            "class": "Symfony\\Component\\Console\\Application",
            "type": "->"
        },
        {
            "file": "C:\\workspace\\dezion\\vendor\\laravel\\framework\\src\\Illuminate\\Console\\Application.php",
            "line": 89,
            "function": "run",
            "class": "Symfony\\Component\\Console\\Application",
            "type": "->"
        },
        {
            "file": "C:\\workspace\\dezion\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Console\\Kernel.php",
            "line": 122,
            "function": "run",
            "class": "Illuminate\\Console\\Application",
            "type": "->"
        },
        {
            "file": "C:\\workspace\\dezion\\artisan",
            "line": 37,
            "function": "handle",
            "class": "Illuminate\\Foundation\\Console\\Kernel",
            "type": "->"
        }
    ]
}
```

### HTTP Request
`GET api/docs`


<!-- END_7e3072a9c6d43c05123a799823b02c6d -->

<!-- START_d7b7952e7fdddc07c978c9bdaf757acf -->
## Register api

> Example request:

```bash
curl -X POST "http://localhost/api/register" 
```

```javascript
const url = new URL("http://localhost/api/register");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


### HTTP Request
`POST api/register`


<!-- END_d7b7952e7fdddc07c978c9bdaf757acf -->

<!-- START_c3fa189a6c95ca36ad6ac4791a873d23 -->
## login api

> Example request:

```bash
curl -X POST "http://localhost/api/login" 
```

```javascript
const url = new URL("http://localhost/api/login");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


### HTTP Request
`POST api/login`


<!-- END_c3fa189a6c95ca36ad6ac4791a873d23 -->

<!-- START_2d698b6d6bc7441f9c1a9cf11aec4059 -->
## Show the email verification notice.

> Example request:

```bash
curl -X GET -G "http://localhost/api/email/verify" 
```

```javascript
const url = new URL("http://localhost/api/email/verify");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```

> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET api/email/verify`


<!-- END_2d698b6d6bc7441f9c1a9cf11aec4059 -->

<!-- START_31f430322462abe3fc3e4ba369b8f77d -->
## Resend the email verification notification.

> Example request:

```bash
curl -X GET -G "http://localhost/api/email/resend" 
```

```javascript
const url = new URL("http://localhost/api/email/resend");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```

> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET api/email/resend`


<!-- END_31f430322462abe3fc3e4ba369b8f77d -->

<!-- START_356aa57a5886f377e4e6eea0dad27149 -->
## api/v1/admin/login
> Example request:

```bash
curl -X POST "http://localhost/api/v1/admin/login" 
```

```javascript
const url = new URL("http://localhost/api/v1/admin/login");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


### HTTP Request
`POST api/v1/admin/login`


<!-- END_356aa57a5886f377e4e6eea0dad27149 -->

<!-- START_36a0f6b9fc478346b3aa912174bb74d4 -->
## This creates administrator for a church without the need for authentication
This uses the church uuid to map the admin to a church
Retreives the chuch master administrator (also called church admin)

> Example request:

```bash
curl -X POST "http://localhost/api/v1/admin/branch/create/{church_key}" 
```

```javascript
const url = new URL("http://localhost/api/v1/admin/branch/create/{church_key}");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


### HTTP Request
`POST api/v1/admin/branch/create/{church_key}`


<!-- END_36a0f6b9fc478346b3aa912174bb74d4 -->

<!-- START_0a9b0727a46bf934308c61f675bd4389 -->
## api/v1/admin/notify/inapp
> Example request:

```bash
curl -X POST "http://localhost/api/v1/admin/notify/inapp" 
```

```javascript
const url = new URL("http://localhost/api/v1/admin/notify/inapp");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


### HTTP Request
`POST api/v1/admin/notify/inapp`


<!-- END_0a9b0727a46bf934308c61f675bd4389 -->

<!-- START_7801d3c4fb554003f71032ee369dce50 -->
## Log the currently signed-in user on this device.

> Example request:

```bash
curl -X GET -G "http://localhost/api/v1/admin/logout" 
```

```javascript
const url = new URL("http://localhost/api/v1/admin/logout");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```

> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET api/v1/admin/logout`


<!-- END_7801d3c4fb554003f71032ee369dce50 -->

<!-- START_62ee0f8bb69fad2ad110394625492630 -->
## API for creating a new branch administrator

> Example request:

```bash
curl -X POST "http://localhost/api/v1/admin/branch/create" 
```

```javascript
const url = new URL("http://localhost/api/v1/admin/branch/create");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


### HTTP Request
`POST api/v1/admin/branch/create`


<!-- END_62ee0f8bb69fad2ad110394625492630 -->

<!-- START_2bb6ef537d9fe81ec758e4f9486f9f87 -->
## api/v1/admin
> Example request:

```bash
curl -X GET -G "http://localhost/api/v1/admin" 
```

```javascript
const url = new URL("http://localhost/api/v1/admin");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```

> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET api/v1/admin`


<!-- END_2bb6ef537d9fe81ec758e4f9486f9f87 -->

<!-- START_f77312ba3799be8bcf89d1074365d7fb -->
## api/v1/admin
> Example request:

```bash
curl -X POST "http://localhost/api/v1/admin" 
```

```javascript
const url = new URL("http://localhost/api/v1/admin");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


### HTTP Request
`POST api/v1/admin`


<!-- END_f77312ba3799be8bcf89d1074365d7fb -->

<!-- START_72d946b89c00c1462cb564752b3df53e -->
## api/v1/admin/{admin}
> Example request:

```bash
curl -X GET -G "http://localhost/api/v1/admin/{admin}" 
```

```javascript
const url = new URL("http://localhost/api/v1/admin/{admin}");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```

> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET api/v1/admin/{admin}`


<!-- END_72d946b89c00c1462cb564752b3df53e -->

<!-- START_5b23517d7f2ba9628e7bcc13305cf606 -->
## api/v1/admin/{admin}
> Example request:

```bash
curl -X PUT "http://localhost/api/v1/admin/{admin}" 
```

```javascript
const url = new URL("http://localhost/api/v1/admin/{admin}");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "PUT",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


### HTTP Request
`PUT api/v1/admin/{admin}`

`PATCH api/v1/admin/{admin}`


<!-- END_5b23517d7f2ba9628e7bcc13305cf606 -->

<!-- START_789a39c63b2515b7f2efb0a504700c84 -->
## api/v1/admin/{admin}
> Example request:

```bash
curl -X DELETE "http://localhost/api/v1/admin/{admin}" 
```

```javascript
const url = new URL("http://localhost/api/v1/admin/{admin}");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "DELETE",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


### HTTP Request
`DELETE api/v1/admin/{admin}`


<!-- END_789a39c63b2515b7f2efb0a504700c84 -->

<!-- START_4ecaa340403adabad74d980c59a82e8b -->
## api/v1/admin_branches
> Example request:

```bash
curl -X GET -G "http://localhost/api/v1/admin_branches" 
```

```javascript
const url = new URL("http://localhost/api/v1/admin_branches");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```

> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET api/v1/admin_branches`


<!-- END_4ecaa340403adabad74d980c59a82e8b -->

<!-- START_beb11f2555c07f6039d2b41239aab795 -->
## api/v1/admin_branches
> Example request:

```bash
curl -X POST "http://localhost/api/v1/admin_branches" 
```

```javascript
const url = new URL("http://localhost/api/v1/admin_branches");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


### HTTP Request
`POST api/v1/admin_branches`


<!-- END_beb11f2555c07f6039d2b41239aab795 -->

<!-- START_b7355e65acad141d7e1d4c72b191ef73 -->
## api/v1/admin_branches/{admin_branch}
> Example request:

```bash
curl -X GET -G "http://localhost/api/v1/admin_branches/{admin_branch}" 
```

```javascript
const url = new URL("http://localhost/api/v1/admin_branches/{admin_branch}");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```

> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET api/v1/admin_branches/{admin_branch}`


<!-- END_b7355e65acad141d7e1d4c72b191ef73 -->

<!-- START_c163aed2b2bf5a2c9dbe5619b18a943c -->
## api/v1/admin_branches/{admin_branch}
> Example request:

```bash
curl -X PUT "http://localhost/api/v1/admin_branches/{admin_branch}" 
```

```javascript
const url = new URL("http://localhost/api/v1/admin_branches/{admin_branch}");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "PUT",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


### HTTP Request
`PUT api/v1/admin_branches/{admin_branch}`

`PATCH api/v1/admin_branches/{admin_branch}`


<!-- END_c163aed2b2bf5a2c9dbe5619b18a943c -->

<!-- START_61771777b5b1bc609fd677e2542d495d -->
## api/v1/admin_branches/{admin_branch}
> Example request:

```bash
curl -X DELETE "http://localhost/api/v1/admin_branches/{admin_branch}" 
```

```javascript
const url = new URL("http://localhost/api/v1/admin_branches/{admin_branch}");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "DELETE",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


### HTTP Request
`DELETE api/v1/admin_branches/{admin_branch}`


<!-- END_61771777b5b1bc609fd677e2542d495d -->

<!-- START_6879a75c701a3dc1458a40069650b9cc -->
## api/un_assimilated_buckets
> Example request:

```bash
curl -X GET -G "http://localhost/api/un_assimilated_buckets" 
```

```javascript
const url = new URL("http://localhost/api/un_assimilated_buckets");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```

> Example response (200):

```json
{
    "success": true,
    "data": [],
    "message": "Un Assimilated Buckets retrieved successfully"
}
```

### HTTP Request
`GET api/un_assimilated_buckets`


<!-- END_6879a75c701a3dc1458a40069650b9cc -->

<!-- START_36d1d954164334be7d95cefef714b15c -->
## api/un_assimilated_buckets
> Example request:

```bash
curl -X POST "http://localhost/api/un_assimilated_buckets" 
```

```javascript
const url = new URL("http://localhost/api/un_assimilated_buckets");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


### HTTP Request
`POST api/un_assimilated_buckets`


<!-- END_36d1d954164334be7d95cefef714b15c -->

<!-- START_9000b054459b44908068dfa1d8a507a0 -->
## api/un_assimilated_buckets/{un_assimilated_bucket}
> Example request:

```bash
curl -X GET -G "http://localhost/api/un_assimilated_buckets/{un_assimilated_bucket}" 
```

```javascript
const url = new URL("http://localhost/api/un_assimilated_buckets/{un_assimilated_bucket}");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```

> Example response (404):

```json
{
    "success": false,
    "message": "Un Assimilated Bucket not found"
}
```

### HTTP Request
`GET api/un_assimilated_buckets/{un_assimilated_bucket}`


<!-- END_9000b054459b44908068dfa1d8a507a0 -->

<!-- START_1d7740ab0cd4e1aa4c5687b9b07d7ab0 -->
## api/un_assimilated_buckets/{un_assimilated_bucket}
> Example request:

```bash
curl -X PUT "http://localhost/api/un_assimilated_buckets/{un_assimilated_bucket}" 
```

```javascript
const url = new URL("http://localhost/api/un_assimilated_buckets/{un_assimilated_bucket}");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "PUT",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


### HTTP Request
`PUT api/un_assimilated_buckets/{un_assimilated_bucket}`

`PATCH api/un_assimilated_buckets/{un_assimilated_bucket}`


<!-- END_1d7740ab0cd4e1aa4c5687b9b07d7ab0 -->

<!-- START_a139b5a96dc7ba75759f9f147c4eb138 -->
## api/un_assimilated_buckets/{un_assimilated_bucket}
> Example request:

```bash
curl -X DELETE "http://localhost/api/un_assimilated_buckets/{un_assimilated_bucket}" 
```

```javascript
const url = new URL("http://localhost/api/un_assimilated_buckets/{un_assimilated_bucket}");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "DELETE",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


### HTTP Request
`DELETE api/un_assimilated_buckets/{un_assimilated_bucket}`


<!-- END_a139b5a96dc7ba75759f9f147c4eb138 -->

<!-- START_6f7db82b51a16f0e2396b8727a397e22 -->
## api/v1/churches/register
> Example request:

```bash
curl -X POST "http://localhost/api/v1/churches/register" 
```

```javascript
const url = new URL("http://localhost/api/v1/churches/register");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


### HTTP Request
`POST api/v1/churches/register`


<!-- END_6f7db82b51a16f0e2396b8727a397e22 -->

<!-- START_7fc7a777a0c540c798351dd56a566a5e -->
## api/v1/churches/test
> Example request:

```bash
curl -X GET -G "http://localhost/api/v1/churches/test" 
```

```javascript
const url = new URL("http://localhost/api/v1/churches/test");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```

> Example response (200):

```json
null
```

### HTTP Request
`GET api/v1/churches/test`


<!-- END_7fc7a777a0c540c798351dd56a566a5e -->

<!-- START_91fc8c19011177c92f076b41d3206ac4 -->
## Gets the member types for a church

> Example request:

```bash
curl -X GET -G "http://localhost/api/v1/churches/member/types" 
```

```javascript
const url = new URL("http://localhost/api/v1/churches/member/types");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```

> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET api/v1/churches/member/types`


<!-- END_91fc8c19011177c92f076b41d3206ac4 -->

<!-- START_4a40f706dac0e68d211fde89456e56da -->
## api/v1/churches
> Example request:

```bash
curl -X GET -G "http://localhost/api/v1/churches" 
```

```javascript
const url = new URL("http://localhost/api/v1/churches");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```

> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET api/v1/churches`


<!-- END_4a40f706dac0e68d211fde89456e56da -->

<!-- START_ddf6991f4dfba12e9296ae8bc7506ff0 -->
## api/v1/churches
> Example request:

```bash
curl -X POST "http://localhost/api/v1/churches" 
```

```javascript
const url = new URL("http://localhost/api/v1/churches");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


### HTTP Request
`POST api/v1/churches`


<!-- END_ddf6991f4dfba12e9296ae8bc7506ff0 -->

<!-- START_a91413ac6aa6d7c5eb90e04fc2349a1f -->
## api/v1/churches/{church}
> Example request:

```bash
curl -X GET -G "http://localhost/api/v1/churches/{church}" 
```

```javascript
const url = new URL("http://localhost/api/v1/churches/{church}");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```

> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET api/v1/churches/{church}`


<!-- END_a91413ac6aa6d7c5eb90e04fc2349a1f -->

<!-- START_6ddf98b4324a0b5edca7f1c1a23c3825 -->
## api/v1/churches/{church}
> Example request:

```bash
curl -X PUT "http://localhost/api/v1/churches/{church}" 
```

```javascript
const url = new URL("http://localhost/api/v1/churches/{church}");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "PUT",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


### HTTP Request
`PUT api/v1/churches/{church}`

`PATCH api/v1/churches/{church}`


<!-- END_6ddf98b4324a0b5edca7f1c1a23c3825 -->

<!-- START_fe3e4d3869e5556c6215bea7b01ab793 -->
## api/v1/churches/{church}
> Example request:

```bash
curl -X DELETE "http://localhost/api/v1/churches/{church}" 
```

```javascript
const url = new URL("http://localhost/api/v1/churches/{church}");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "DELETE",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


### HTTP Request
`DELETE api/v1/churches/{church}`


<!-- END_fe3e4d3869e5556c6215bea7b01ab793 -->

<!-- START_0bacbf092031e0dba9318c174b19aa40 -->
## api/v1/branches
> Example request:

```bash
curl -X GET -G "http://localhost/api/v1/branches" 
```

```javascript
const url = new URL("http://localhost/api/v1/branches");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```

> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET api/v1/branches`


<!-- END_0bacbf092031e0dba9318c174b19aa40 -->

<!-- START_ab1f4acaa752a08371dfc9eb20f6241e -->
## api/v1/branches
> Example request:

```bash
curl -X POST "http://localhost/api/v1/branches" 
```

```javascript
const url = new URL("http://localhost/api/v1/branches");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


### HTTP Request
`POST api/v1/branches`


<!-- END_ab1f4acaa752a08371dfc9eb20f6241e -->

<!-- START_861bed453b63871ea14795f41e52ad76 -->
## api/v1/branches/{branch}
> Example request:

```bash
curl -X GET -G "http://localhost/api/v1/branches/{branch}" 
```

```javascript
const url = new URL("http://localhost/api/v1/branches/{branch}");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```

> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET api/v1/branches/{branch}`


<!-- END_861bed453b63871ea14795f41e52ad76 -->

<!-- START_ef86f0b77d8e7e1f3d765bde1bb51ab5 -->
## api/v1/branches/{branch}
> Example request:

```bash
curl -X PUT "http://localhost/api/v1/branches/{branch}" 
```

```javascript
const url = new URL("http://localhost/api/v1/branches/{branch}");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "PUT",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


### HTTP Request
`PUT api/v1/branches/{branch}`

`PATCH api/v1/branches/{branch}`


<!-- END_ef86f0b77d8e7e1f3d765bde1bb51ab5 -->

<!-- START_c3b7bcfec72e006cdfd0e49c317a332a -->
## api/v1/branches/{branch}
> Example request:

```bash
curl -X DELETE "http://localhost/api/v1/branches/{branch}" 
```

```javascript
const url = new URL("http://localhost/api/v1/branches/{branch}");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "DELETE",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


### HTTP Request
`DELETE api/v1/branches/{branch}`


<!-- END_c3b7bcfec72e006cdfd0e49c317a332a -->

<!-- START_130a5ba30a94337ca1eb60d303a1ac8e -->
## api/v1/members/import
> Example request:

```bash
curl -X POST "http://localhost/api/v1/members/import" 
```

```javascript
const url = new URL("http://localhost/api/v1/members/import");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


### HTTP Request
`POST api/v1/members/import`


<!-- END_130a5ba30a94337ca1eb60d303a1ac8e -->

<!-- START_eb24812784c39724ba7d6ef3cfb915c5 -->
## This would handle any export on the membership module

> Example request:

```bash
curl -X POST "http://localhost/api/v1/members/export" 
```

```javascript
const url = new URL("http://localhost/api/v1/members/export");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


### HTTP Request
`POST api/v1/members/export`


<!-- END_eb24812784c39724ba7d6ef3cfb915c5 -->

<!-- START_2048182f77d1c454b8fa4c953bef1ccd -->
## api/v1/member_type/members/{id}
> Example request:

```bash
curl -X GET -G "http://localhost/api/v1/member_type/members/{id}" 
```

```javascript
const url = new URL("http://localhost/api/v1/member_type/members/{id}");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```

> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET api/v1/member_type/members/{id}`


<!-- END_2048182f77d1c454b8fa4c953bef1ccd -->

<!-- START_6b83ee8045f2da32609258fb7ee994ec -->
## api/v1/member_types
> Example request:

```bash
curl -X GET -G "http://localhost/api/v1/member_types" 
```

```javascript
const url = new URL("http://localhost/api/v1/member_types");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```

> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET api/v1/member_types`


<!-- END_6b83ee8045f2da32609258fb7ee994ec -->

<!-- START_b00035817bb3a8e186f2856227787c9f -->
## api/v1/member_types
> Example request:

```bash
curl -X POST "http://localhost/api/v1/member_types" 
```

```javascript
const url = new URL("http://localhost/api/v1/member_types");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


### HTTP Request
`POST api/v1/member_types`


<!-- END_b00035817bb3a8e186f2856227787c9f -->

<!-- START_eb35d286e0d50e7c1b5209c9f0fab2db -->
## api/v1/member_types/{member_type}
> Example request:

```bash
curl -X GET -G "http://localhost/api/v1/member_types/{member_type}" 
```

```javascript
const url = new URL("http://localhost/api/v1/member_types/{member_type}");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```

> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET api/v1/member_types/{member_type}`


<!-- END_eb35d286e0d50e7c1b5209c9f0fab2db -->

<!-- START_947e2c6bddfbe4b1d5b9da0bda66d403 -->
## api/v1/member_types/{member_type}
> Example request:

```bash
curl -X PUT "http://localhost/api/v1/member_types/{member_type}" 
```

```javascript
const url = new URL("http://localhost/api/v1/member_types/{member_type}");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "PUT",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


### HTTP Request
`PUT api/v1/member_types/{member_type}`

`PATCH api/v1/member_types/{member_type}`


<!-- END_947e2c6bddfbe4b1d5b9da0bda66d403 -->

<!-- START_04f3a3082a02fef7fa24ea4ded614f60 -->
## api/v1/member_types/{member_type}
> Example request:

```bash
curl -X DELETE "http://localhost/api/v1/member_types/{member_type}" 
```

```javascript
const url = new URL("http://localhost/api/v1/member_types/{member_type}");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "DELETE",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


### HTTP Request
`DELETE api/v1/member_types/{member_type}`


<!-- END_04f3a3082a02fef7fa24ea4ded614f60 -->

<!-- START_9149c4c889a14310c73340d8ffe9bc5e -->
## api/v1/member_details
> Example request:

```bash
curl -X GET -G "http://localhost/api/v1/member_details" 
```

```javascript
const url = new URL("http://localhost/api/v1/member_details");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```

> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET api/v1/member_details`


<!-- END_9149c4c889a14310c73340d8ffe9bc5e -->

<!-- START_eaac5b3c6acca6bc73e82bccd5eee357 -->
## api/v1/member_details
> Example request:

```bash
curl -X POST "http://localhost/api/v1/member_details" 
```

```javascript
const url = new URL("http://localhost/api/v1/member_details");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


### HTTP Request
`POST api/v1/member_details`


<!-- END_eaac5b3c6acca6bc73e82bccd5eee357 -->

<!-- START_03052116572e043ba7c9e7813f33caa8 -->
## api/v1/member_details/{member_detail}
> Example request:

```bash
curl -X GET -G "http://localhost/api/v1/member_details/{member_detail}" 
```

```javascript
const url = new URL("http://localhost/api/v1/member_details/{member_detail}");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```

> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET api/v1/member_details/{member_detail}`


<!-- END_03052116572e043ba7c9e7813f33caa8 -->

<!-- START_2b044fad1991db6e3e7d23a10d180d9d -->
## api/v1/member_details/{member_detail}
> Example request:

```bash
curl -X PUT "http://localhost/api/v1/member_details/{member_detail}" 
```

```javascript
const url = new URL("http://localhost/api/v1/member_details/{member_detail}");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "PUT",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


### HTTP Request
`PUT api/v1/member_details/{member_detail}`

`PATCH api/v1/member_details/{member_detail}`


<!-- END_2b044fad1991db6e3e7d23a10d180d9d -->

<!-- START_13280d7e51c202b543b9ef5bb901510d -->
## api/v1/member_details/{member_detail}
> Example request:

```bash
curl -X DELETE "http://localhost/api/v1/member_details/{member_detail}" 
```

```javascript
const url = new URL("http://localhost/api/v1/member_details/{member_detail}");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "DELETE",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


### HTTP Request
`DELETE api/v1/member_details/{member_detail}`


<!-- END_13280d7e51c202b543b9ef5bb901510d -->

<!-- START_7b67b0cd63d6d7d8465e82386d6cec13 -->
## Imports cell data into the database
TODO: the request  should restrict this action to just admins

> Example request:

```bash
curl -X POST "http://localhost/api/v1/cells/import" 
```

```javascript
const url = new URL("http://localhost/api/v1/cells/import");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


### HTTP Request
`POST api/v1/cells/import`


<!-- END_7b67b0cd63d6d7d8465e82386d6cec13 -->

<!-- START_3c88e2c3f9df6b8ab6b7e57ec4aefc14 -->
## Get just addresses for all cells
this is to be used in the mapping function.

> Example request:

```bash
curl -X GET -G "http://localhost/api/v1/cells/addresses" 
```

```javascript
const url = new URL("http://localhost/api/v1/cells/addresses");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```

> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET api/v1/cells/addresses`


<!-- END_3c88e2c3f9df6b8ab6b7e57ec4aefc14 -->

<!-- START_e77a576ce5d784c22b3e7198a88ba111 -->
## api/v1/teams
> Example request:

```bash
curl -X GET -G "http://localhost/api/v1/teams" 
```

```javascript
const url = new URL("http://localhost/api/v1/teams");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```

> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET api/v1/teams`


<!-- END_e77a576ce5d784c22b3e7198a88ba111 -->

<!-- START_9c2019f9d2d308844e1949dfa342b380 -->
## api/v1/teams
> Example request:

```bash
curl -X POST "http://localhost/api/v1/teams" 
```

```javascript
const url = new URL("http://localhost/api/v1/teams");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


### HTTP Request
`POST api/v1/teams`


<!-- END_9c2019f9d2d308844e1949dfa342b380 -->

<!-- START_974ce426342989d03ea113b84c597ce4 -->
## api/v1/teams/{team}
> Example request:

```bash
curl -X GET -G "http://localhost/api/v1/teams/{team}" 
```

```javascript
const url = new URL("http://localhost/api/v1/teams/{team}");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```

> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET api/v1/teams/{team}`


<!-- END_974ce426342989d03ea113b84c597ce4 -->

<!-- START_02dc0adeb714bc1c46bd3cde2c952827 -->
## api/v1/teams/{team}
> Example request:

```bash
curl -X PUT "http://localhost/api/v1/teams/{team}" 
```

```javascript
const url = new URL("http://localhost/api/v1/teams/{team}");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "PUT",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


### HTTP Request
`PUT api/v1/teams/{team}`

`PATCH api/v1/teams/{team}`


<!-- END_02dc0adeb714bc1c46bd3cde2c952827 -->

<!-- START_f6de42238cfe6bcbd84ba30779151c10 -->
## api/v1/teams/{team}
> Example request:

```bash
curl -X DELETE "http://localhost/api/v1/teams/{team}" 
```

```javascript
const url = new URL("http://localhost/api/v1/teams/{team}");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "DELETE",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


### HTTP Request
`DELETE api/v1/teams/{team}`


<!-- END_f6de42238cfe6bcbd84ba30779151c10 -->

<!-- START_4f77ecb9c1083e891712e83ee47434e5 -->
## api/v1/districts
> Example request:

```bash
curl -X GET -G "http://localhost/api/v1/districts" 
```

```javascript
const url = new URL("http://localhost/api/v1/districts");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```

> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET api/v1/districts`


<!-- END_4f77ecb9c1083e891712e83ee47434e5 -->

<!-- START_0612b0c5f0d5889ac2ff240090fb66c1 -->
## api/v1/districts
> Example request:

```bash
curl -X POST "http://localhost/api/v1/districts" 
```

```javascript
const url = new URL("http://localhost/api/v1/districts");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


### HTTP Request
`POST api/v1/districts`


<!-- END_0612b0c5f0d5889ac2ff240090fb66c1 -->

<!-- START_c4758e602ac6340b8cf04522e6915390 -->
## api/v1/districts/{district}
> Example request:

```bash
curl -X GET -G "http://localhost/api/v1/districts/{district}" 
```

```javascript
const url = new URL("http://localhost/api/v1/districts/{district}");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```

> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET api/v1/districts/{district}`


<!-- END_c4758e602ac6340b8cf04522e6915390 -->

<!-- START_cadca96e711703132002f3a9c13eaa41 -->
## api/v1/districts/{district}
> Example request:

```bash
curl -X PUT "http://localhost/api/v1/districts/{district}" 
```

```javascript
const url = new URL("http://localhost/api/v1/districts/{district}");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "PUT",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


### HTTP Request
`PUT api/v1/districts/{district}`

`PATCH api/v1/districts/{district}`


<!-- END_cadca96e711703132002f3a9c13eaa41 -->

<!-- START_f37afad9b460dca296e689e0f380ed3a -->
## api/v1/districts/{district}
> Example request:

```bash
curl -X DELETE "http://localhost/api/v1/districts/{district}" 
```

```javascript
const url = new URL("http://localhost/api/v1/districts/{district}");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "DELETE",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


### HTTP Request
`DELETE api/v1/districts/{district}`


<!-- END_f37afad9b460dca296e689e0f380ed3a -->

<!-- START_afd59ae79bded808a408d0bc2eb563fb -->
## api/v1/cells
> Example request:

```bash
curl -X GET -G "http://localhost/api/v1/cells" 
```

```javascript
const url = new URL("http://localhost/api/v1/cells");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```

> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET api/v1/cells`


<!-- END_afd59ae79bded808a408d0bc2eb563fb -->

<!-- START_93b90302c0ba2000fca2f44f4f5daf89 -->
## api/v1/cells
> Example request:

```bash
curl -X POST "http://localhost/api/v1/cells" 
```

```javascript
const url = new URL("http://localhost/api/v1/cells");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


### HTTP Request
`POST api/v1/cells`


<!-- END_93b90302c0ba2000fca2f44f4f5daf89 -->

<!-- START_388ef76ac690c7296236bc7288f04568 -->
## api/v1/cells/{cell}
> Example request:

```bash
curl -X GET -G "http://localhost/api/v1/cells/{cell}" 
```

```javascript
const url = new URL("http://localhost/api/v1/cells/{cell}");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```

> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET api/v1/cells/{cell}`


<!-- END_388ef76ac690c7296236bc7288f04568 -->

<!-- START_6ea8504abb542912ba7906de90e1180b -->
## api/v1/cells/{cell}
> Example request:

```bash
curl -X PUT "http://localhost/api/v1/cells/{cell}" 
```

```javascript
const url = new URL("http://localhost/api/v1/cells/{cell}");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "PUT",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


### HTTP Request
`PUT api/v1/cells/{cell}`

`PATCH api/v1/cells/{cell}`


<!-- END_6ea8504abb542912ba7906de90e1180b -->

<!-- START_e28dbbec7ab73d395b70bf6609cc37e6 -->
## api/v1/cells/{cell}
> Example request:

```bash
curl -X DELETE "http://localhost/api/v1/cells/{cell}" 
```

```javascript
const url = new URL("http://localhost/api/v1/cells/{cell}");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "DELETE",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


### HTTP Request
`DELETE api/v1/cells/{cell}`


<!-- END_e28dbbec7ab73d395b70bf6609cc37e6 -->

<!-- START_501c3aa09cd62089cbdae5de55efdfd5 -->
## api/v1/communities
> Example request:

```bash
curl -X GET -G "http://localhost/api/v1/communities" 
```

```javascript
const url = new URL("http://localhost/api/v1/communities");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```

> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET api/v1/communities`


<!-- END_501c3aa09cd62089cbdae5de55efdfd5 -->

<!-- START_570470f6a406b7543c93379db26770a0 -->
## api/v1/communities
> Example request:

```bash
curl -X POST "http://localhost/api/v1/communities" 
```

```javascript
const url = new URL("http://localhost/api/v1/communities");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


### HTTP Request
`POST api/v1/communities`


<!-- END_570470f6a406b7543c93379db26770a0 -->

<!-- START_d46b237cd78ae3474a747769cb8df781 -->
## api/v1/communities/{community}
> Example request:

```bash
curl -X GET -G "http://localhost/api/v1/communities/{community}" 
```

```javascript
const url = new URL("http://localhost/api/v1/communities/{community}");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```

> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET api/v1/communities/{community}`


<!-- END_d46b237cd78ae3474a747769cb8df781 -->

<!-- START_a4b38c21e3c110e59321e8d1a58a8680 -->
## api/v1/communities/{community}
> Example request:

```bash
curl -X PUT "http://localhost/api/v1/communities/{community}" 
```

```javascript
const url = new URL("http://localhost/api/v1/communities/{community}");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "PUT",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


### HTTP Request
`PUT api/v1/communities/{community}`

`PATCH api/v1/communities/{community}`


<!-- END_a4b38c21e3c110e59321e8d1a58a8680 -->

<!-- START_5bc12268bfa4320917d6ba53af904e12 -->
## api/v1/communities/{community}
> Example request:

```bash
curl -X DELETE "http://localhost/api/v1/communities/{community}" 
```

```javascript
const url = new URL("http://localhost/api/v1/communities/{community}");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "DELETE",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


### HTTP Request
`DELETE api/v1/communities/{community}`


<!-- END_5bc12268bfa4320917d6ba53af904e12 -->

<!-- START_ef1b410fc063795dc43c183d7a74f9c1 -->
## api/v1/zones
> Example request:

```bash
curl -X GET -G "http://localhost/api/v1/zones" 
```

```javascript
const url = new URL("http://localhost/api/v1/zones");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```

> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET api/v1/zones`


<!-- END_ef1b410fc063795dc43c183d7a74f9c1 -->

<!-- START_ef7e68d34d2c5c95605138893a0f2068 -->
## api/v1/zones
> Example request:

```bash
curl -X POST "http://localhost/api/v1/zones" 
```

```javascript
const url = new URL("http://localhost/api/v1/zones");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


### HTTP Request
`POST api/v1/zones`


<!-- END_ef7e68d34d2c5c95605138893a0f2068 -->

<!-- START_e939dea85215c7ba161c3063bebef175 -->
## api/v1/zones/{zone}
> Example request:

```bash
curl -X GET -G "http://localhost/api/v1/zones/{zone}" 
```

```javascript
const url = new URL("http://localhost/api/v1/zones/{zone}");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```

> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET api/v1/zones/{zone}`


<!-- END_e939dea85215c7ba161c3063bebef175 -->

<!-- START_345ed4f9064c27b91b641539f5bad9f2 -->
## api/v1/zones/{zone}
> Example request:

```bash
curl -X PUT "http://localhost/api/v1/zones/{zone}" 
```

```javascript
const url = new URL("http://localhost/api/v1/zones/{zone}");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "PUT",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


### HTTP Request
`PUT api/v1/zones/{zone}`

`PATCH api/v1/zones/{zone}`


<!-- END_345ed4f9064c27b91b641539f5bad9f2 -->

<!-- START_7d55340c0fc68ffc5eff0498137eeba1 -->
## api/v1/zones/{zone}
> Example request:

```bash
curl -X DELETE "http://localhost/api/v1/zones/{zone}" 
```

```javascript
const url = new URL("http://localhost/api/v1/zones/{zone}");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "DELETE",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


### HTTP Request
`DELETE api/v1/zones/{zone}`


<!-- END_7d55340c0fc68ffc5eff0498137eeba1 -->

<!-- START_dd2f6094afe401c126124b8f364c0dd5 -->
## api/v1/sms/send
> Example request:

```bash
curl -X POST "http://localhost/api/v1/sms/send" 
```

```javascript
const url = new URL("http://localhost/api/v1/sms/send");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


### HTTP Request
`POST api/v1/sms/send`


<!-- END_dd2f6094afe401c126124b8f364c0dd5 -->

<!-- START_969027761848786970fcba3ff8acfe87 -->
## api/v1/inapp/send
> Example request:

```bash
curl -X POST "http://localhost/api/v1/inapp/send" 
```

```javascript
const url = new URL("http://localhost/api/v1/inapp/send");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


### HTTP Request
`POST api/v1/inapp/send`


<!-- END_969027761848786970fcba3ff8acfe87 -->

<!-- START_d2f16357cb4ed36dbb0e9529ea4a460c -->
## api/v1/roles
> Example request:

```bash
curl -X GET -G "http://localhost/api/v1/roles" 
```

```javascript
const url = new URL("http://localhost/api/v1/roles");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```

> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET api/v1/roles`


<!-- END_d2f16357cb4ed36dbb0e9529ea4a460c -->

<!-- START_5f753b2bffb6b34b6136ddfe1be7bcce -->
## api/v1/roles
> Example request:

```bash
curl -X POST "http://localhost/api/v1/roles" 
```

```javascript
const url = new URL("http://localhost/api/v1/roles");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


### HTTP Request
`POST api/v1/roles`


<!-- END_5f753b2bffb6b34b6136ddfe1be7bcce -->

<!-- START_ba05db58d706b9f94944b1ab79e1e4a2 -->
## api/v1/roles/{role}
> Example request:

```bash
curl -X GET -G "http://localhost/api/v1/roles/{role}" 
```

```javascript
const url = new URL("http://localhost/api/v1/roles/{role}");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```

> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET api/v1/roles/{role}`


<!-- END_ba05db58d706b9f94944b1ab79e1e4a2 -->

<!-- START_81ac9047f8db2b92092c5a7f13e5d28d -->
## api/v1/roles/{role}
> Example request:

```bash
curl -X PUT "http://localhost/api/v1/roles/{role}" 
```

```javascript
const url = new URL("http://localhost/api/v1/roles/{role}");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "PUT",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


### HTTP Request
`PUT api/v1/roles/{role}`

`PATCH api/v1/roles/{role}`


<!-- END_81ac9047f8db2b92092c5a7f13e5d28d -->

<!-- START_04c524fc2f0ea8c793406426144b4c71 -->
## api/v1/roles/{role}
> Example request:

```bash
curl -X DELETE "http://localhost/api/v1/roles/{role}" 
```

```javascript
const url = new URL("http://localhost/api/v1/roles/{role}");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "DELETE",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


### HTTP Request
`DELETE api/v1/roles/{role}`


<!-- END_04c524fc2f0ea8c793406426144b4c71 -->

<!-- START_8ec2a075078e70128bf47cf32b4be5dc -->
## api/v1/system_permissions
> Example request:

```bash
curl -X GET -G "http://localhost/api/v1/system_permissions" 
```

```javascript
const url = new URL("http://localhost/api/v1/system_permissions");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```

> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET api/v1/system_permissions`


<!-- END_8ec2a075078e70128bf47cf32b4be5dc -->

<!-- START_b3bd30572740cdf044559c53dfb8087a -->
## api/v1/system_permissions
> Example request:

```bash
curl -X POST "http://localhost/api/v1/system_permissions" 
```

```javascript
const url = new URL("http://localhost/api/v1/system_permissions");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


### HTTP Request
`POST api/v1/system_permissions`


<!-- END_b3bd30572740cdf044559c53dfb8087a -->

<!-- START_fbbe03d59175a39bb36e019971d4b8ff -->
## api/v1/system_permissions/{system_permission}
> Example request:

```bash
curl -X GET -G "http://localhost/api/v1/system_permissions/{system_permission}" 
```

```javascript
const url = new URL("http://localhost/api/v1/system_permissions/{system_permission}");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```

> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET api/v1/system_permissions/{system_permission}`


<!-- END_fbbe03d59175a39bb36e019971d4b8ff -->

<!-- START_d7142d25033fbff47d63eea95eca785c -->
## api/v1/system_permissions/{system_permission}
> Example request:

```bash
curl -X PUT "http://localhost/api/v1/system_permissions/{system_permission}" 
```

```javascript
const url = new URL("http://localhost/api/v1/system_permissions/{system_permission}");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "PUT",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


### HTTP Request
`PUT api/v1/system_permissions/{system_permission}`

`PATCH api/v1/system_permissions/{system_permission}`


<!-- END_d7142d25033fbff47d63eea95eca785c -->

<!-- START_829e7b537c6a914c8b32a7f26ad1e9d0 -->
## api/v1/system_permissions/{system_permission}
> Example request:

```bash
curl -X DELETE "http://localhost/api/v1/system_permissions/{system_permission}" 
```

```javascript
const url = new URL("http://localhost/api/v1/system_permissions/{system_permission}");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "DELETE",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


### HTTP Request
`DELETE api/v1/system_permissions/{system_permission}`


<!-- END_829e7b537c6a914c8b32a7f26ad1e9d0 -->

<!-- START_0988401e31a0e7a4d28c97d7056a8e75 -->
## api/v1/permission_categories
> Example request:

```bash
curl -X GET -G "http://localhost/api/v1/permission_categories" 
```

```javascript
const url = new URL("http://localhost/api/v1/permission_categories");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```

> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET api/v1/permission_categories`


<!-- END_0988401e31a0e7a4d28c97d7056a8e75 -->

<!-- START_57072572e2dc3cd36c823cb8125a1bba -->
## api/v1/permission_categories
> Example request:

```bash
curl -X POST "http://localhost/api/v1/permission_categories" 
```

```javascript
const url = new URL("http://localhost/api/v1/permission_categories");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


### HTTP Request
`POST api/v1/permission_categories`


<!-- END_57072572e2dc3cd36c823cb8125a1bba -->

<!-- START_8ae9aaabae3c98240399690b5df39a90 -->
## api/v1/permission_categories/{permission_category}
> Example request:

```bash
curl -X GET -G "http://localhost/api/v1/permission_categories/{permission_category}" 
```

```javascript
const url = new URL("http://localhost/api/v1/permission_categories/{permission_category}");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```

> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET api/v1/permission_categories/{permission_category}`


<!-- END_8ae9aaabae3c98240399690b5df39a90 -->

<!-- START_ad084e9190a148e2c52d93c1ed2b09df -->
## api/v1/permission_categories/{permission_category}
> Example request:

```bash
curl -X PUT "http://localhost/api/v1/permission_categories/{permission_category}" 
```

```javascript
const url = new URL("http://localhost/api/v1/permission_categories/{permission_category}");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "PUT",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


### HTTP Request
`PUT api/v1/permission_categories/{permission_category}`

`PATCH api/v1/permission_categories/{permission_category}`


<!-- END_ad084e9190a148e2c52d93c1ed2b09df -->

<!-- START_e446e6c5dd8e902605888fe22e78e676 -->
## api/v1/permission_categories/{permission_category}
> Example request:

```bash
curl -X DELETE "http://localhost/api/v1/permission_categories/{permission_category}" 
```

```javascript
const url = new URL("http://localhost/api/v1/permission_categories/{permission_category}");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "DELETE",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


### HTTP Request
`DELETE api/v1/permission_categories/{permission_category}`


<!-- END_e446e6c5dd8e902605888fe22e78e676 -->

<!-- START_3c8c4484a110a0ade00412f7d0833d72 -->
## api/v1/services
> Example request:

```bash
curl -X GET -G "http://localhost/api/v1/services" 
```

```javascript
const url = new URL("http://localhost/api/v1/services");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```

> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET api/v1/services`


<!-- END_3c8c4484a110a0ade00412f7d0833d72 -->

<!-- START_c033867c72496b8d075badce4e3f7cfd -->
## api/v1/services
> Example request:

```bash
curl -X POST "http://localhost/api/v1/services" 
```

```javascript
const url = new URL("http://localhost/api/v1/services");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


### HTTP Request
`POST api/v1/services`


<!-- END_c033867c72496b8d075badce4e3f7cfd -->

<!-- START_ff62824d7658444958c89b023a8326f7 -->
## api/v1/services/{service}
> Example request:

```bash
curl -X GET -G "http://localhost/api/v1/services/{service}" 
```

```javascript
const url = new URL("http://localhost/api/v1/services/{service}");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```

> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET api/v1/services/{service}`


<!-- END_ff62824d7658444958c89b023a8326f7 -->

<!-- START_d48326c80f7a952beab3182ea5ce92da -->
## api/v1/services/{service}
> Example request:

```bash
curl -X PUT "http://localhost/api/v1/services/{service}" 
```

```javascript
const url = new URL("http://localhost/api/v1/services/{service}");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "PUT",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


### HTTP Request
`PUT api/v1/services/{service}`

`PATCH api/v1/services/{service}`


<!-- END_d48326c80f7a952beab3182ea5ce92da -->

<!-- START_d474edd02766b598445c1c4a790d8bc4 -->
## api/v1/services/{service}
> Example request:

```bash
curl -X DELETE "http://localhost/api/v1/services/{service}" 
```

```javascript
const url = new URL("http://localhost/api/v1/services/{service}");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "DELETE",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


### HTTP Request
`DELETE api/v1/services/{service}`


<!-- END_d474edd02766b598445c1c4a790d8bc4 -->

<!-- START_f69a19f46c408f5dc87e6a31d6e1baa3 -->
## api/v1/service_data_category
> Example request:

```bash
curl -X GET -G "http://localhost/api/v1/service_data_category" 
```

```javascript
const url = new URL("http://localhost/api/v1/service_data_category");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```

> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET api/v1/service_data_category`


<!-- END_f69a19f46c408f5dc87e6a31d6e1baa3 -->

<!-- START_eba65b99a2526df868ba8d030b5f325b -->
## api/v1/service_data_category
> Example request:

```bash
curl -X POST "http://localhost/api/v1/service_data_category" 
```

```javascript
const url = new URL("http://localhost/api/v1/service_data_category");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


### HTTP Request
`POST api/v1/service_data_category`


<!-- END_eba65b99a2526df868ba8d030b5f325b -->

<!-- START_ac380c3034cffe7bf8ef470cf5e6f1b1 -->
## api/v1/service_data_category/{service_data_category}
> Example request:

```bash
curl -X GET -G "http://localhost/api/v1/service_data_category/{service_data_category}" 
```

```javascript
const url = new URL("http://localhost/api/v1/service_data_category/{service_data_category}");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```

> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET api/v1/service_data_category/{service_data_category}`


<!-- END_ac380c3034cffe7bf8ef470cf5e6f1b1 -->

<!-- START_33412d7a089779b294d6e6bf7c6ac0c5 -->
## api/v1/service_data_category/{service_data_category}
> Example request:

```bash
curl -X PUT "http://localhost/api/v1/service_data_category/{service_data_category}" 
```

```javascript
const url = new URL("http://localhost/api/v1/service_data_category/{service_data_category}");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "PUT",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


### HTTP Request
`PUT api/v1/service_data_category/{service_data_category}`

`PATCH api/v1/service_data_category/{service_data_category}`


<!-- END_33412d7a089779b294d6e6bf7c6ac0c5 -->

<!-- START_de851b45ab33002f11835834c61661f1 -->
## api/v1/service_data_category/{service_data_category}
> Example request:

```bash
curl -X DELETE "http://localhost/api/v1/service_data_category/{service_data_category}" 
```

```javascript
const url = new URL("http://localhost/api/v1/service_data_category/{service_data_category}");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "DELETE",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


### HTTP Request
`DELETE api/v1/service_data_category/{service_data_category}`


<!-- END_de851b45ab33002f11835834c61661f1 -->

<!-- START_b8f75119b7a70e00e5337c0c8429a57a -->
## api/v1/service_data_components
> Example request:

```bash
curl -X GET -G "http://localhost/api/v1/service_data_components" 
```

```javascript
const url = new URL("http://localhost/api/v1/service_data_components");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```

> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET api/v1/service_data_components`


<!-- END_b8f75119b7a70e00e5337c0c8429a57a -->

<!-- START_316ba4f85e345750439d710314c02183 -->
## api/v1/service_data_components
> Example request:

```bash
curl -X POST "http://localhost/api/v1/service_data_components" 
```

```javascript
const url = new URL("http://localhost/api/v1/service_data_components");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


### HTTP Request
`POST api/v1/service_data_components`


<!-- END_316ba4f85e345750439d710314c02183 -->

<!-- START_5bfec087b1fc3c90d822e009576030d9 -->
## api/v1/service_data_components/{service_data_component}
> Example request:

```bash
curl -X GET -G "http://localhost/api/v1/service_data_components/{service_data_component}" 
```

```javascript
const url = new URL("http://localhost/api/v1/service_data_components/{service_data_component}");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```

> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET api/v1/service_data_components/{service_data_component}`


<!-- END_5bfec087b1fc3c90d822e009576030d9 -->

<!-- START_a4b68b5c6363a344ce6df09d6263112e -->
## api/v1/service_data_components/{service_data_component}
> Example request:

```bash
curl -X PUT "http://localhost/api/v1/service_data_components/{service_data_component}" 
```

```javascript
const url = new URL("http://localhost/api/v1/service_data_components/{service_data_component}");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "PUT",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


### HTTP Request
`PUT api/v1/service_data_components/{service_data_component}`

`PATCH api/v1/service_data_components/{service_data_component}`


<!-- END_a4b68b5c6363a344ce6df09d6263112e -->

<!-- START_5d4ed77e893b652662bdeea4846c51f6 -->
## api/v1/service_data_components/{service_data_component}
> Example request:

```bash
curl -X DELETE "http://localhost/api/v1/service_data_components/{service_data_component}" 
```

```javascript
const url = new URL("http://localhost/api/v1/service_data_components/{service_data_component}");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "DELETE",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


### HTTP Request
`DELETE api/v1/service_data_components/{service_data_component}`


<!-- END_5d4ed77e893b652662bdeea4846c51f6 -->

<!-- START_acced4b5be5a829131c2894d0307ab99 -->
## api/v1/service_data_category_provisions
> Example request:

```bash
curl -X GET -G "http://localhost/api/v1/service_data_category_provisions" 
```

```javascript
const url = new URL("http://localhost/api/v1/service_data_category_provisions");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```

> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET api/v1/service_data_category_provisions`


<!-- END_acced4b5be5a829131c2894d0307ab99 -->

<!-- START_9bdbba2c7bc4bbbc93dad3c1ddecf021 -->
## api/v1/service_data_category_provisions
> Example request:

```bash
curl -X POST "http://localhost/api/v1/service_data_category_provisions" 
```

```javascript
const url = new URL("http://localhost/api/v1/service_data_category_provisions");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


### HTTP Request
`POST api/v1/service_data_category_provisions`


<!-- END_9bdbba2c7bc4bbbc93dad3c1ddecf021 -->

<!-- START_9205831f4023591387814559bcf5ebf7 -->
## api/v1/service_data_category_provisions/{service_data_category_provision}
> Example request:

```bash
curl -X GET -G "http://localhost/api/v1/service_data_category_provisions/{service_data_category_provision}" 
```

```javascript
const url = new URL("http://localhost/api/v1/service_data_category_provisions/{service_data_category_provision}");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```

> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET api/v1/service_data_category_provisions/{service_data_category_provision}`


<!-- END_9205831f4023591387814559bcf5ebf7 -->

<!-- START_75a052782d59451b6170ba3fba395ec2 -->
## api/v1/service_data_category_provisions/{service_data_category_provision}
> Example request:

```bash
curl -X PUT "http://localhost/api/v1/service_data_category_provisions/{service_data_category_provision}" 
```

```javascript
const url = new URL("http://localhost/api/v1/service_data_category_provisions/{service_data_category_provision}");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "PUT",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


### HTTP Request
`PUT api/v1/service_data_category_provisions/{service_data_category_provision}`

`PATCH api/v1/service_data_category_provisions/{service_data_category_provision}`


<!-- END_75a052782d59451b6170ba3fba395ec2 -->

<!-- START_dfe43b1699c58665e2db37c6b88b1133 -->
## api/v1/service_data_category_provisions/{service_data_category_provision}
> Example request:

```bash
curl -X DELETE "http://localhost/api/v1/service_data_category_provisions/{service_data_category_provision}" 
```

```javascript
const url = new URL("http://localhost/api/v1/service_data_category_provisions/{service_data_category_provision}");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "DELETE",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


### HTTP Request
`DELETE api/v1/service_data_category_provisions/{service_data_category_provision}`


<!-- END_dfe43b1699c58665e2db37c6b88b1133 -->


