<?php
/**
 * Token Generator.
 *
 * @license http://www.apache.org/licenses/LICENSE-2.0 Apache 2.0
 * @author Diego Alvarez <diegoalvarez17@gmail.com>
 * @copyright 2016 TokenEmailSms
 */

namespace TokenSms\Token;

class Token
{

    /**
     * Generate a random secure token in a long way.
     */
    public function generate()
    {
         return bin2hex(openssl_random_pseudo_bytes(32));
    }

    /**
     * Generate a random secure token in a short way.
     */
    public function generateShort()
    {
        return bin2hex(openssl_random_pseudo_bytes(3));
    }
}
