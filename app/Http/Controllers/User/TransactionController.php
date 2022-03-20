<?php

namespace App\Http\Controllers\User;

use App\Constants\TransactionConstants;
use App\Http\Controllers\Controller;
use App\Models\UserTransaction;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    //
    public $typeOptions = [
        TransactionConstants::CREDIT => "Credit",
        TransactionConstants::DEBIT => "Debit",
    ];

    public function index(Request $request)
    {
        $user = auth()->user();
        $builder = UserTransaction::with("currency")->where("user_id", $user->id);
        if(!empty($key = $request->search)){
            $builder = $builder->search($key);
        }

        if (!empty($key = $request->type)) {
            $builder = $builder->where('type', $key);
        }

        $transactions = $builder->orderBy("id", "desc")->paginate(20);
        return view('user.dashboard.finance.transaction',[
            'transactions' => $transactions,
            "typeOptions" => $this->typeOptions,

        ]);
    }
}
