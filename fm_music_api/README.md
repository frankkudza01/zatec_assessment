## Contributing

Thank you for considering contributing to the Laravel framework! The contribution guide can be found in the [Laravel documentation](https://laravel.com/docs/contributions).

## Code of Conduct

In order to ensure that the Laravel community is welcoming to all, please review and abide by the [Code of Conduct](https://laravel.com/docs/contributions#code-of-conduct).

## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell via [taylor@laravel.com](mailto:taylor@laravel.com). All security vulnerabilities will be promptly addressed.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).


## Authentication module 

Its a tier of JWT and Google auth to allow user to be authenticated via google api and authorised via a token

Authenticated routes run over a token for user to have access
The token will be parsed to the ui or api testing interface as Bearer token


## System Setup

1) Configure a .env file


2) generate application jwt secret code
    php artisan jwt:generate

3) Disable vendor gruzzle ssl verification
        open vendor\guzzlehttp\guzzle\src\Handler\CurlFactory.php
        $conf[CURLOPT_SSL_VERIFYHOST] = 0;
        $conf[CURLOPT_SSL_VERIFYPEER] = FALSE;

4) Run npm install 

5) configure the api vatriables in .env

6) run migrations
    php artisan migrate

7) run the application



