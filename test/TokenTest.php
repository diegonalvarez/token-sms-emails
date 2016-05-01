<?php
/**
 * Token Generator.
 *
 * @license http://www.apache.org/licenses/LICENSE-2.0 Apache 2.0
 * @author Diego Alvarez <diegoalvarez17@gmail.com>
 * @copyright 2016 TokenEmailSms
 */

namespace TokenSms\Test;

use TokenSms\Token\Token;

class TokenTest extends \PHPUnit_Framework_TestCase
{

    protected $token;

    public function setUp()
    {
        $this->token = new Token;
    }

    /** @test */
    public function tokenEmail()
    {
        $token = $this->token->generate();
        $this->assertEquals(64, strlen($token));
    }

    /** @test */
    public function tokenSms()
    {
        $token = $this->token->generateShort();
        $this->assertEquals(6, strlen($token));
    }
}
