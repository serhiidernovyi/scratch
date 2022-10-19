<?php

declare(strict_types=1);

namespace User;

use App\Models\ResponseMessages;
use App\Models\Other\BadMessages;
use User\Contracts\IActivateUser;
use User\Entities\User as DomainUser;
use User\Entities\UserResponseFactory;
use Symfony\Component\HttpFoundation\Response;
use UseCases\Contracts\Requests\User\IActivateUserRequest;

class ActivateUser implements IActivateUser
{
    /**
     * @var DomainUser
     */
    public DomainUser $user_domain;

    /**
     * @param DomainUser $user_domain
     */
    public function __construct(UserResponseFactory $response_factory, DomainUser $user_domain)
    {
        $this->response_factory = $response_factory;
        $this->user_domain = $user_domain;
    }

    public function activate(IActivateUserRequest $user_id_provider)
    {
        $user_id = $user_id_provider->getUserId();

        if (!$this->user_domain->getTrashedUser($user_id)->exists()) {
            return $this->response_factory->createSimpleErrorMessage(Response::$statusTexts[404]);
        }

        try {
            $this->user_domain->getTrashedUser($user_id)->restore();
        } catch (\Exception $e) {
            return $this->response_factory->createErrorMessage(BadMessages::ACTIVATE_USER_ERROR, $e);
        }

        return $this->response_factory->createSuccessMessage(ResponseMessages::SUCCESS_ACTIVATE_USER);
    }
}
