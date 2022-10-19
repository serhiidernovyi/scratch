<?php

declare(strict_types=1);

namespace App\Models\Other;

class BadMessages
{
    // User
    public const REGISTER_USER_ERROR = 'Register user error.';
    public const LOGIN_USER_ERROR = 'Login user error.';
    public const HAS_NO_ACCESS = 'Has no access to content.';
    public const REMOVE_USER_ERROR = 'Error remove user.';
    public const ACTIVATE_USER_ERROR = 'Error activate user.';

    // Auth
    public const INVALID_USER_CREDENTIALS = 'User credentials invalid.';
    public const PASSWORD_USER_NOT_CHANGED = 'Password not changed.';

    // Item
    public const ERROR_CREATE_ORDER = 'Error create pms order';
    public const ERROR_CREATE_ITEMS = 'Error create item(s)';
    public const ERROR_UPDATE_ITEM = 'Error update item';
    public const ERROR_UPDATE_ORDER = 'Error update order, seller';
    public const ERROR_REMOVE_ORDER = 'Error remove order';
    public const ERROR_REMOVE_ITEM = 'Error remove item';
    public const ERROR_ADD_ITEMS = 'Error add items, order is purchased';
    public const ERROR_REMOVE_FILTER = 'Error remove items filter';

    // STATUSES
    public const ERROR_SET_CUSTOM_STATUS = 'Error set next status Object is not ';
    public const ERROR_SET_PURCHASED_ORDER = 'Error set status purchased, not ready for payment';
    public const ERROR_SET_DELIVERED_ORDER = 'Error set status DELIVERED';
    public const ERROR_SET_TAKEN_ORDER = 'Error set status taken, order not DELIVERED';
    public const ERROR_SET_RENOVATED_STATUS = 'Error set status renovated, item is not PURCHASED';
    public const ERROR_SET_DESCRIBED_NO_IMAGES = 'Error set status described, item has no images';
    public const ERROR_SET_OFFERED_TAX_NULL = 'Error set status offered, item tax is null';
    public const ERROR_SET_OFFERED_NO_SELECTED_IMAGES = 'Error add status offered, no photos selected';
    public const ERROR_SET_OFFERED_COST_NULL = 'Error set status offered, item sell price is null';
    public const ERROR_SET_ASSIGN_ORDER = 'Error assign order to driver, order has not pickup time';
    public const ERROR_SET_INDEXES = 'Error set indexes';
    public const ERROR_SET_EMPTY_INDEXES_ITEM_PHOTOGRAPHED = 'Error set empty indexes, item has status photographed';

    // Comment
    public const ERROR_CREATE_COMMENT = 'Error create comment';
    public const ERROR_UPDATE_COMMENT = 'Error update comment';

    // Image
    public const ERROR_REMOVE_IMAGE = 'Error remove image';

    // Integration
    public const ERROR_SAVE_TRANSLATION = 'Error save translation';
    public const ERROR_GET_TRANSLATION = 'Translation is empty';

    // Calendar
    public const ERROR_CREATE_PICKUP_PERIOD = 'Error Pickup Period not created';
    public const ERROR_REMOVE_PICKUP_PERIOD = 'Error Pickup Period not removed';

    // Item SetFilters
    public const ERROR_SET_DEFAULT_FILTER = 'Error set default filter';
}
