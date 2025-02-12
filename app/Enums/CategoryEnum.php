<?php
namespace App\Enums;

enum CategoryEnum: string
{
    case  ACCOUNT_OPENING  = 'A';
    case  DEPOSIT_WITHDRAWALS  = 'B';
    case  CONSULTATION_ASSESSMENT  = 'V';

    case  CREDIT_REQUEST  = 'Q';


    //metodo para obtener los valores del enum

    public static function all(): array{
        return [
            self::ACCOUNT_OPENING,
            self::DEPOSIT_WITHDRAWALS,
            self::CONSULTATION_ASSESSMENT,
            self::CREDIT_REQUEST,
        ];
    }
}
