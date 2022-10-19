<?php

declare(strict_types=1);

namespace UseCases;

use Auth\AuthService;
use User\UserService;
use Illuminate\Log\Logger;
use Illuminate\Support\Arr;
use UseCases\Contracts\Auth\IAuth;
use UseCases\Contracts\User\IUser;
use Illuminate\Foundation\Application;

class DomainServiceFactory
{
    /**
     * @var Logger
     */
    protected $logger;
    /**
     * @var Application
     */
    protected $app;

    protected $bindings = [
        IUser::class => UserService::class,
        IAuth::class => AuthService::class,
    ];

    /**
     * DomainServiceFactory constructor.
     *
     * @param Application $app
     * @param Logger $logger
     */
    public function __construct(Application $app, Logger $logger)
    {
        $this->logger = $logger;
        $this->app = $app;
    }


    /**
     * @template T
     *
     * @param class-string<T> $interface
     *
     * @return T
     */
    public function create(string $interface, ?array $params = [])
    {
        $service_class = Arr::get($this->bindings, $interface);

        try {
            return $this->app->make($service_class, $params);
        } catch (\Throwable $throwable) {
            $this->logger->error($throwable->getMessage());

            throw new DomainServiceException($interface, $params, $throwable);
        }
    }
}
