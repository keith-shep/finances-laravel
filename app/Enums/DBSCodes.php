<?php

namespace App\Enums;

enum DBSCodes: string
{
   case ICT = 'FAST or PayNow Payment / Receipt';
   case INT = 'Interest Earned';
   case UMC_S = 'Debit Card Transaction'; // Escaped 'UMC-S'
   case POS = 'Point-of-Sale Transaction or Proceeds';
   case SAL = 'Salary';
   case ITR = 'Funds Transfer';
   case BILL = 'Bill Payment';
   case AWL = 'Cash Withdrawal';
}