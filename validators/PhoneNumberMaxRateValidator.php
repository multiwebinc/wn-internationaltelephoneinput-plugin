<?php namespace Multiwebinc\Internationaltelephoneinput\Validators;

use Illuminate\Contracts\Validation\Rule;

class PhoneNumberMaxRateValidator implements Rule
{
    protected $maxRate;
    protected $errorMessage = 'Rate is too high';

    public function __construct($maxRate, $errorMessage = null)
    {
        $this->maxRate = $maxRate;

        if (isset($errorMessage)) {
            $this->errorMessage = $errorMessage;
        }
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        // Remove all non-numeric characters
        $value = preg_replace("/[^0-9,.]/", "", $value);

        $client = new \GuzzleHttp\Client();
        $response = $client->request('POST', 'https://www.callwithus.com/api/getrate/', [
            'form_params' => [
                'key' => env('CALLWITHUS_API_KEY'),
                'number' => $value,
            ],
        ]);

        // Number is valid
        if (strpos($response->getBody(), 'rate=')) {
            $rates = explode(' ',str_replace('rate=','',$response->getBody()));
            $rates = array_map('trim', $rates);

            if (!empty($rates[0]) && $rates[0] <= $this->maxRate) {
                return true;
            }
        }
        return false;
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
        return $this->errorMessage;
    }
}