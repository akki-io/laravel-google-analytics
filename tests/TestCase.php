<?php

namespace AkkiIo\LaravelGoogleAnalytics\Tests;

use AkkiIo\LaravelGoogleAnalytics\LaravelGoogleAnalyticsServiceProvider;
use Illuminate\Foundation\Bootstrap\LoadEnvironmentVariables;

abstract class TestCase extends \Orchestra\Testbench\TestCase
{
    /**
     * Setup the test environment.
     * @throws \Google\ApiCore\ValidationException
     */
    protected function setUp(): void
    {
        parent::setUp();

        $this->app['config']->set('laravel-google-analytics.service_account_credentials_json', [
            'type' => 'service_account',
            'project_id' => 'akki-ca',
            'private_key_id' => env('GOOGLE_SERVICE_ACCOUNT_PRIVATE_KEY_ID'),
            'private_key' => env('GOOGLE_SERVICE_ACCOUNT_PRIVATE_KEY'),
            'client_email' => env('GOOGLE_SERVICE_ACCOUNT_CLIENT_EMAIL'),
            'client_id' => env('GOOGLE_SERVICE_ACCOUNT_CLIENT_ID'),
            'auth_uri' => 'https://accounts.google.com/o/oauth2/auth',
            'token_uri' => 'https://accounts.google.com/o/oauth2/token',
            'auth_provider_x509_cert_url' => 'https://www.googleapis.com/oauth2/v1/certs',
            'client_x509_cert_url' => env('GOOGLE_SERVICE_ACCOUNT_CLIENT_X509_CERT_URL'),
        ]);

        $this->app['config']->set('laravel-google-analytics.property_id', env('GOOGLE_ANALYTICS_PROPERTY_ID'));
    }

    /**
     * Get package providers.
     *
     * @param  \Illuminate\Foundation\Application  $app
     *
     * @return array<int, class-string>
     */
    protected function getPackageProviders($app): array
    {
        return [
            LaravelGoogleAnalyticsServiceProvider::class,
        ];
    }

    /**
     * Define environment setup.
     *
     * @param  \Illuminate\Foundation\Application  $app
     *
     * @return void
     */
    protected function getEnvironmentSetUp($app)
    {
        $app->useEnvironmentPath(__DIR__.'/..');
        $app->bootstrapWith([LoadEnvironmentVariables::class]);
        parent::getEnvironmentSetUp($app);
    }
}
