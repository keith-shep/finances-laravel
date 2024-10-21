<?php

namespace App\Enums;

enum BankAccountTypes: string
{
   case Individual = 'individual';
   case Joint = 'joint';
}