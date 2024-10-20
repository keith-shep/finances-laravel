<?php

namespace App\Enums;

enum CategoryTypes: string
{
   case OnlineShopping = 'online_shopping';
   case Groceries = 'groceries';
   case PublicTransport = 'public_transport';
   case PrivateTransport = 'private_transport';
}