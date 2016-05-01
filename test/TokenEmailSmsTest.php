<?php
/**
 * Token Email Sms Test Use.
 *
 * @license http://www.apache.org/licenses/LICENSE-2.0 Apache 2.0
 * @author Diego Alvarez <diegoalvarez17@gmail.com>
 * @copyright 2016 TokenEmailSms
 */

namespace TokenSms\Test;

use TokenSms\TokenEmailSms;

class TokenEmailSmsTest extends \PHPUnit_Framework_TestCase
{

    protected $tokenEmailSms;

    public function setUp()
    {
        $this->tokenEmailSms = new TokenEmailSms;
    }

    /** @test */
    public function credentials_set()
    {
        $this->assertInternalType('array', $this->tokenEmailSms->getCredentials());
    }

    /** @test */
    public function sending_tokens()
    {
        $this->tokenEmailSms->setAddress();
        $this->tokenEmailSms->send();
        $this->assertInternalType('string', $this->tokenEmailSms->tokenSms());
        $this->assertInternalType('string', $this->tokenEmailSms->tokenEmail());
    }
}
