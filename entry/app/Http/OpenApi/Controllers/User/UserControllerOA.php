<?php

declare(strict_types=1);

namespace App\Http\OpenApi\Controllers\User;

class UserControllerOA
{
    /**
     * @OA\Get(
     *     path="/api/user/{user_id}",
     *     operationId="show-user",
     *     tags={"User"},
     *     security={{"bearerAuth":{}}},
     *     summary="Show User",
     *     description="Show User",
     *
     *     @OA\Parameter(ref="#/components/parameters/user_id_path"),
     *
     *     @OA\Response(response="200", ref="#/components/responses/user_response"),
     *     @OA\Response(response="401", ref="#/components/responses/unauthorized_401"),
     *     @OA\Response(response="403", ref="#/components/responses/forbidden_403"),
     *     @OA\Response(response="404", ref="#/components/responses/not_found_404"),
     *     @OA\Response(response="405", ref="#/components/responses/not_allowed_405"),
     * )
     * @see UserController::show()
     */
    public function show()
    {
    }

    /**
     * @OA\Get(
     *     path="/api/users",
     *     operationId="show-users-list",
     *     tags={"User"},
     *     security={{"bearerAuth":{}}},
     *     summary="Show Users List",
     *     description="Show Users List",
     *
     *     @OA\Parameter(ref="#/components/parameters/per_page"),
     *     @OA\Parameter(ref="#/components/parameters/page"),
     *     @OA\Parameter(ref="#/components/parameters/name_sort"),
     *     @OA\Parameter(ref="#/components/parameters/surname_sort"),
     *     @OA\Parameter(ref="#/components/parameters/name"),
     *     @OA\Parameter(ref="#/components/parameters/surname"),
     *     @OA\Parameter(ref="#/components/parameters/deleted_search"),
     *
     *     @OA\Response(response="200", ref="#/components/responses/user_list_response"),
     *     @OA\Response(response="401", ref="#/components/responses/unauthorized_401"),
     *     @OA\Response(response="403", ref="#/components/responses/forbidden_403"),
     *     @OA\Response(response="405", ref="#/components/responses/not_allowed_405"),
     * )
     * @see UserController::showUsers()
     */
    public function showUsers()
    {
    }

    /**
     * @OA\Put(
     *     path="/api/user/{user_id}",
     *     operationId="update-user",
     *     tags={"User"},
     *     security={{"bearerAuth":{}}},
     *     summary="Update User",
     *     description="Update User Info",
     *
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(ref="#/components/schemas/update_user"),
     *     ),
     *
     *     @OA\Response(response="200", ref="#/components/responses/user_response"),
     *     @OA\Response(response="401", ref="#/components/responses/unauthorized_401"),
     *     @OA\Response(response="403", ref="#/components/responses/forbidden_403"),
     *     @OA\Response(response="404", ref="#/components/responses/not_found_404"),
     *     @OA\Response(response="405", ref="#/components/responses/not_allowed_405"),
     *     @OA\Response(response="422", ref="#/components/responses/validation_422"),
     * )
     * @see UserController::update()
     */
    private function update()
    {
    }

    /**
     * @OA\Delete(
     *     path="/api/user/{user_id}",
     *     operationId="delete-user",
     *     tags={"User"},
     *     security={{"bearerAuth":{}}},
     *     summary="Delete User",
     *     description="Delete User Info",
     *
     *     @OA\Response(response="200", ref="#/components/responses/message"),
     *     @OA\Response(response="400", ref="#/components/responses/bad_request_400"),
     *     @OA\Response(response="401", ref="#/components/responses/unauthorized_401"),
     *     @OA\Response(response="403", ref="#/components/responses/forbidden_403"),
     *     @OA\Response(response="404", ref="#/components/responses/not_found_404"),
     *     @OA\Response(response="405", ref="#/components/responses/not_allowed_405"),
     * )
     * @see UserController::delete()
     */
    private function delete()
    {
    }

    /**
     * @OA\Get(
     *     path="/api/me",
     *     operationId="show-user-me",
     *     tags={"User"},
     *     security={{"bearerAuth":{}}},
     *     summary="Show User Me",
     *     description="Show User Me",
     *
     *     @OA\Response(response="200", ref="#/components/responses/user_response"),
     *     @OA\Response(response="401", ref="#/components/responses/unauthorized_401"),
     *     @OA\Response(response="405", ref="#/components/responses/not_allowed_405"),
     * )
     * @see UserController::me()
     */
    private function me()
    {
    }

    /**
     * @OA\Put(
     *     path="/api/user-activate",
     *     operationId="user-activate",
     *     tags={"User"},
     *     security={{"bearerAuth":{}}},
     *     summary="Activate User",
     *     description="Activate deleted User",
     *
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(ref="#/components/schemas/activate_user"),
     *     ),
     *
     *     @OA\Response(response="200", ref="#/components/responses/message"),
     *     @OA\Response(response="400", ref="#/components/responses/bad_request_400"),
     *     @OA\Response(response="401", ref="#/components/responses/unauthorized_401"),
     *     @OA\Response(response="403", ref="#/components/responses/forbidden_403"),
     *     @OA\Response(response="404", ref="#/components/responses/not_found_404"),
     *     @OA\Response(response="405", ref="#/components/responses/not_allowed_405"),
     * )
     * @see UserController::activate()
     */
    private function activate()
    {
    }
}
