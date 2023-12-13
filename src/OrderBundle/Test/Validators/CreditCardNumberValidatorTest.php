<?php

namespace OrderBundle\Test\Validators;

use OrderBundle\Validators\CreditCardNumberValidator;
use PHPUnit\Framework\TestCase;

class CreditCardNumberValidatorTest extends TestCase
{
    /**
     * @dataProvider valueProvider
     */
    public function testIsValid($value, $expectedResult)
    {
        $creditCardNumberValidator = new CreditCardNumberValidator($value);

        $isValid = $creditCardNumberValidator->isValid();

        $this->assertEquals($expectedResult, $isValid);
    }

    public function valueProvider()
    {
        return [
            'shouldBeValidWhenValueIsANumberAndLengthEquals16' =>
            [
                'value' => 1234567891234567,
                'expectedResult' => true
            ],
            'shouldNotBeValidWhenValueIsANumberAndLengthNotEquals16' =>
            [
                'value' => 12345678912345678,
                'expectedResult' => false
            ],
            'shouldNotBeValidWhenValueIsNotANumber' =>
            [
                'value' => 'par',
                'expectedResult' => false
            ],
            'shouldNotBeValidWhenValueIsNotANumberAndLengthEquals16' =>
            [
                'value' => 'aaaaaaaaaaaaaaaa',
                'expectedResult' => false
            ],
            'shouldNotBeValidWhenValueIsEmpty' =>
            [
                'value' => '',
                'expectedResult' => false
            ]
        ];
    }
}
