<?php

namespace Directus\Db\Exception;

class DuplicateEntryException extends DbException
{
    public function __construct($message, $code = 0, \Exception $previous = null)
    {
        parent::__construct($message, $code, $previous);

        preg_match("/Duplicate entry '([^']+)' for key '([^']+)'/i", $message, $output);

        if ($output) {
            $messageFormat = 'Duplicate value: %s<br>(%s)';
            $this->message = sprintf($messageFormat, $output[1], $output[2]);
        }
    }
}
