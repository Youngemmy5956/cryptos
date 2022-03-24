<?php
namespace App\Constants;

class ApiConstants
{
    const SERVER_ERR_CODE = 500;
    const BAD_REQ_ERR_CODE = 400;
    const AUTH_ERR_CODE = 401;
    const FORBIDDEN_ERR_CODE = 403;
    const NOT_FOUND_ERR_CODE = 404;
    const VALIDATION_ERR_CODE = 422;
    const GOOD_REQ_CODE = 200;
    const AUTH_TOKEN_EXP = 60; // auth otp token expiry in minutes
    const OTP_DEFAULT_LENGTH = 7;

    const PENDING_TRANSACTION = 0;
    const SUCCESSFUL_TRANSACTION = 1;
    const FAILED_TRANSACTION = 2;
    const CANCELLED_TRANSACTION = 3;
    const GG_PROVIDER = 'google';
    const FB_PROVIDER = 'facebook';

    const PAGINATION_SIZE_WEB = 50;
    const PAGINATION_SIZE_API = 20;

    const PASSWORD_PIN = "password";
}
