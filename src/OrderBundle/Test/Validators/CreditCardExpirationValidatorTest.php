<?php

namespace OrderBundle\Test\Validators;

use DateTime;
use OrderBundle\Validators\CreditCardExpirationValidator;
use PHPUnit\Framework\TestCase;

class CreditCardExpirationValidatorTest extends TestCase
{

    public function testShouldBeValidWhenDateExpirationIsBiggerThenDateNow()
    {
        $dateTime = new DateTime();

        $dateTime->setDate(2028, 12, 13);

        $creditCardExpirationValidator = new CreditCardExpirationValidator($dateTime);

        $isValid = $creditCardExpirationValidator->isValid();

        $this->assertTrue($isValid);
    }

    public function testShouldNotBeValidWhenDateExpirationIsSmallerThenDateNow()
    {
        $dateTime = new DateTime();

        $dateTime->setDate(2022, 5, 22);

        $creditCardExpirationValidator = new CreditCardExpirationValidator($dateTime);

        $isValid = $creditCardExpirationValidator->isValid();

        $this->assertFalse($isValid);
    }
}
