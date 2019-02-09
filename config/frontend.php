<?php
    return [

        //this is the path to the frontend UTL
        'url' => env('FRONTEND_URL', 'http://localhost:8080'),

        // path to my frontend page with query param queryURL(temporarySignedRoute URL)
        'email_verify_url' => env('FRONTEND_EMAIL_VERIFY_URL', '/account/verify/email?queryURL='),
    ];

?>
