<?php

return [
    /*
     * The property id of which you want to display data.
     */
    'property_id' => env('GOOGLE_ANALYTICS_PROPERTY_ID'),

    /*
     * Path to the client secret json file.
     */
    'service_account_credentials_json' => env('GOOGLE_CREDENTIAL_JSON_FILE_ABSOLUTE_PATH', storage_path('app/analytics/service-account-credentials.json')),
];
