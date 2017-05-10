<?php

namespace Framework\Lang\Exception;

use Framework\Exception\BaseException;

class LangNotFoundException extends BaseException
{
    protected $message = 'Нету таколго файла с переводом!';
}
