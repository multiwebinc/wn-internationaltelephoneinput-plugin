<?php namespace Multiwebinc\Internationaltelephoneinput;

use Backend;
use System\Classes\PluginBase;
use Validator;
use Multiwebinc\Internationaltelephoneinput\Validators\PhoneNumberValidator;

/**
 * internationaltelephoneinput Plugin Information File
 */
class Plugin extends PluginBase
{
    /**
     * Returns information about this plugin.
     *
     * @return array
     */
    public function pluginDetails()
    {
        return [
            'name'        => 'multiwebinc.internationaltelephoneinput::lang.plugin.name',
            'description' => 'multiwebinc.internationaltelephoneinput::lang.plugin.description',
            'author'      => 'multiwebinc',
            'icon'        => 'icon-phone'
        ];
    }

    /**
     * Boot method, called right before the request route.
     *
     * @return array
     */
    public function boot()
    {
        Validator::extend('valid_phone_number', PhoneNumberValidator::class);
    }

    /**
     * Registers any front-end components implemented in this plugin.
     *
     * @return array
     */
    public function registerComponents()
    {
        return [
            'Multiwebinc\Internationaltelephoneinput\Components\TelephoneInput' => 'telephoneInput',
        ];
    }
}
