<?php

use Framework\Routing\Routes\Methods\Get;
use Pages\DefaultPage;

return [
    new Get('/', DefaultPage::class),
//    new Get('/user/{id}', UserGetPage::class)
];