<?php

namespace App\Services\Wallet;

use App\Constants\StatusConstants;
use App\Constants\TransactionConstants;
use App\Exceptions\Transaction\UserTransactionException;
use App\Models\UserTransaction;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Illuminate\Validation\ValidationException;

class UserTransactionService
{

    public static function validate($data)
    {
        $validator = Validator::make($data, [
            "user_id" => "bail|required|exists:users,id",
            "currency_id" => "bail|required|exists:currencies,id",
            "amount" => "bail|required|numeric|gt:0",
            "description" => "bail|required|string",
            "activity" => "bail|nullable|string",
            "batch_no" => "bail|nullable|string",
            "status" => "bail|nullable|string|" . Rule::in([
                StatusConstants::COMPLETED,
                StatusConstants::PENDING,
                StatusConstants::PROCESSING
                // StatusConstants::DECLINED
            ]),
        ]);
        if ($validator->fails()) {
            throw new ValidationException($validator);
        }
        return $validator->validated();
    }
    public static function create($data): UserTransaction
    {
        $data = self::validate($data);
        $data["reference"] = self::generateReferenceNo();
        $transaction = UserTransaction::create($data);
        return $transaction;
    }

    public static function generateBatchNo()
    {
        $key = "BN_" . getRandomToken(6, true);
        $check = UserTransaction::where("batch_no", $key)->count();
        if ($check > 0) {
            return self::generateBatchNo();
        }
        return $key;
    }

    public static function generateReferenceNo()
    {
        $key = "RF_" . getRandomToken(8, true);
        $check = UserTransaction::where("reference", $key)->count();
        if ($check > 0) {
            return self::generateReferenceNo();
        }
        return $key;
    }

    public static function getByReference($reference): UserTransaction
    {
        $transaction = UserTransaction::where("reference", $reference)->first();

        if (empty($transaction)) {
            throw new UserTransactionException(
                "Transaction not found",
            );
        }
        return $transaction;
    }

    public static function getById($id): UserTransaction
    {
        $transaction = UserTransaction::where("id", $id)->first();

        if (empty($transaction)) {
            throw new UserTransactionException(
                "Transaction not found",
            );
        }
        return $transaction;
    }

    public static function markAs(string $reference, string $status)
    {
        return UserTransaction::where("reference", $reference)->update(["status" => $status]);
    }
}
