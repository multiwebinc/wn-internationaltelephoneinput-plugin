<?php namespace Multiwebinc\Internationaltelephoneinput\Validators;

use Illuminate\Contracts\Validation\Rule;

class PhoneNumberValidator implements Rule
{
    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        $phoneUtil = \libphonenumber\PhoneNumberUtil::getInstance();
        $parsed = $phoneUtil->parse($value);

        return $phoneUtil->isValidNumber($parsed);
    }

    /**
     * Validation callback method.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @param  array  $params
     * @return bool
     */
    public function validate($attribute, $value, $params)
    {
        return $this->passes($attribute, $value);
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'Invalid phone number';
    }
}