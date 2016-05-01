<?php
/**
 * Tokem Email Sms Generator.
 *
 * @license http://www.apache.org/licenses/LICENSE-2.0 Apache 2.0
 * @author Diego Alvarez <diegoalvarez17@gmail.com>
 * @copyright 2016 TokenEmailSms
 */

namespace TokenSms;

use TokenSms\Token\Token;
use TokenSms\Vendor\Email\EmailFactory;
use TokenSms\Vendor\Sms\SmsFactory;

class TokenEmailSms
{

    protected $email;

    protected $phone;

    protected $credentials;

    protected $tokenEmail;

    protected $tokenSms;

    protected $clientSms;

    protected $clientEmail;

    public function __construct($config = null)
    {
        if (empty($config)) {
            $this->prepareConfig();
        } else {
            $this->credentials = $config;
        }
        $this->token = new Token;
    }

    public function setAddress($email = null, $phone = null)
    {
        if (empty($email)) {
            $email = $this->credentials['address']['email'];
        }
        $this->email = $email;

        if (empty($phone)) {
            $phone = $this->credentials['address']['phone'];
        }
        $this->phone = $phone;
        return $this;
    }

    public function getCredentials()
    {
        return $this->credentials;
    }

    protected function prepareConfig()
    {
        $vendorDir = dirname(dirname(dirname(__FILE__)));
        $this->credentials = include($vendorDir.'/token-email-sms-config.php');
    }

    public function send()
    {
        $this->traitEmail();
        $this->traitSms();
        $this->sendTokens();
    }

    protected function traitEmail()
    {
        $sms = new EmailFactory();
        $this->clientEmail = $sms->build($this->credentials['email']['client']);
        $this->clientEmail->setConfig($this->credentials['email']);
    }

    protected function traitSms()
    {
        $sms = new SmsFactory();
        $this->clientSms = $sms->build($this->credentials['sms']['client']);
        $this->clientSms->setConfig($this->credentials['sms']);
    }

    protected function sendTokens()
    {
        $this->setTokens();
        $this->clientEmail->send($this->email, $this->tokenEmail);
        $this->clientSms->send($this->phone, $this->tokenSms);
    }

    protected function setTokens()
    {
        $this->tokenEmail = $this->token->generate();
        $this->tokenSms   = $this->token->generateShort();
    }

    public function tokenSms()
    {
        return $this->tokenSms;
    }

    public function tokenEmail()
    {
        return $this->tokenEmail;
    }
}
