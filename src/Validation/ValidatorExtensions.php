<?php namespace MadeITBelgium\Vat\Validation;

use MadeITBelgium\Vat\Vat;
use MadeITBelgium\Vat\Validation\Validator;
use MadeITBelgium\Vat\ServiceUnavailableException;
use Exception;

class ValidatorExtensions
{
    /**
     * @var MadeITBelgium\Vat\Validation\Validator
     */
    private $validator;

    public function __construct(Validator $validator)
    {
        $this->validator = $validator;
    }

    public function validateVat($attribute, $value, $parameters)
    {
        try {
            return $this->validator->isVat($value);
        } catch(ServiceUnavailableException $e) {
            if(isset($parameters[0])) {
                return $parameters[0] == 'true';
            }
        } catch(Exception $e) {
            return false;
        }
        return false;
    }
}
