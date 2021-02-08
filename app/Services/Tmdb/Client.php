<?php

namespace App\Services\Tmdb;

use Tmdb\Client as TClient;
use Tmdb\Event\RequestEvent;
use Tmdb\Token\Api\ApiToken;
use Tmdb\Token\Api\BearerToken;
use Tmdb\Event\BeforeRequestEvent;
use Tmdb\Event\Listener\RequestListener;
use Symfony\Component\EventDispatcher\EventDispatcher;
use Tmdb\Event\Listener\Request\ApiTokenRequestListener;
use Tmdb\Event\Listener\Request\UserAgentRequestListener;
use Tmdb\Event\Listener\Request\AcceptJsonRequestListener;
use Tmdb\Event\Listener\Request\ContentTypeJsonRequestListener;

class Client{

    public function handle()
    {
        
        $token = new ApiToken(config('app.tmdb_key'));

        $ed = new EventDispatcher();

        $client = new TClient(
            [
        /** @var ApiToken|BearerToken */
        'api_token' => $token,
        'event_dispatcher' => [
            'adapter' => $ed
        ],
        // We make use of PSR-17 and PSR-18 auto discovery to automatically guess these, but preferably set these explicitly.
        'http' => [
            'client' => null,
            'request_factory' => null,
            'response_factory' => null,
            'stream_factory' => null,
            'uri_factory' => null,
        ]
    ]
        );

        /**
         * Required event listeners and events to be registered with the PSR-14 Event Dispatcher.
         */
        $requestListener = new RequestListener($client->getHttpClient(), $ed);
        $ed->addListener(RequestEvent::class, $requestListener);

        $apiTokenListener = new ApiTokenRequestListener($client->getToken());
        $ed->addListener(BeforeRequestEvent::class, $apiTokenListener);

        $acceptJsonListener = new AcceptJsonRequestListener();
        $ed->addListener(BeforeRequestEvent::class, $acceptJsonListener);

        $jsonContentTypeListener = new ContentTypeJsonRequestListener();
        $ed->addListener(BeforeRequestEvent::class, $jsonContentTypeListener);

        $userAgentListener = new UserAgentRequestListener();
        $ed->addListener(BeforeRequestEvent::class, $userAgentListener);

        return $client;
    }

}