<?php namespace Multiwebinc\Internationaltelephoneinput\Components;

use Cms\Classes\ComponentBase;
use Session;

class TelephoneInput extends ComponentBase
{
    public function componentDetails()
    {
        return [
            'name'        => 'multiwebinc.internationaltelephoneinput::lang.components.telephoneinput.name',
            'description' => 'multiwebinc.internationaltelephoneinput::lang.components.telephoneinput.description'
        ];
    }

    public function onRun()
    {
        $this->addCss('vendor/jackocnr/intl-tel-input/build/css/intlTelInput.min.css');

        $this->addJs('vendor/jackocnr/intl-tel-input/build/js/intlTelInput.min.js');
        if ($this->property('utilsScript')) {
            $this->addJs('vendor/jackocnr/intl-tel-input/build/js/utils.js');
        }

        $properties = array_keys($this->defineProperties());
        foreach ($properties as $key) {
            $this->page[$key] = $this->property($key);
        }

        if ($this->property('preferredCountries')) {
            $this->page['preferredCountries'] = array_map(
                'trim',
                explode(',', $this->property('preferredCountries'))
            );
        }

        if ($this->property('defaultValueSessionKey')) {
            $this->page['value'] = Session::get(
                $this->property('defaultValueSessionKey')
            );
        }

        $this->page['errorMap'] = [
            trans('multiwebinc.internationaltelephoneinput::lang.errors.invalid_number'),
            trans('multiwebinc.internationaltelephoneinput::lang.errors.invalid_country_code'),
            trans('multiwebinc.internationaltelephoneinput::lang.errors.too_short'),
            trans('multiwebinc.internationaltelephoneinput::lang.errors.too_long'),
            trans('multiwebinc.internationaltelephoneinput::lang.errors.invalid_number'),
        ];
    }

    public function defineProperties() {
        return [
            'inputName' => [
                'title'             => 'multiwebinc.internationaltelephoneinput::lang.components.telephoneinput.inputNameTitle',
                'description'       => 'multiwebinc.internationaltelephoneinput::lang.components.telephoneinput.inputNameDescription',
                'type'              => 'string',
                'showExternalParam' => false,
                'required'          => false,
            ],
            'inputClass' => [
                'title'             => 'multiwebinc.internationaltelephoneinput::lang.components.telephoneinput.inputClassTitle',
                'description'       => 'multiwebinc.internationaltelephoneinput::lang.components.telephoneinput.inputClassDescription',
                'type'              => 'string',
                'showExternalParam' => false,
                'required'          => false,
            ],
            'inputRequired' => [
                'title'             => 'multiwebinc.internationaltelephoneinput::lang.components.telephoneinput.inputRequiredTitle',
                'description'       => 'multiwebinc.internationaltelephoneinput::lang.components.telephoneinput.inputRequiredDescription',
                'type'              => 'checkbox',
                'default'           => false,
            ],
            'defaultValueSessionKey' => [
                'title'             => 'multiwebinc.internationaltelephoneinput::lang.components.telephoneinput.defaultValueSessionKeyTitle',
                'description'       => 'multiwebinc.internationaltelephoneinput::lang.components.telephoneinput.defaultValueSessionKeyDescription',
                'type'              => 'string',
                'showExternalParam' => false,
                'required'          => false,
            ],
            'allowDropdown' => [
                'title'             => 'multiwebinc.internationaltelephoneinput::lang.components.telephoneinput.allowDropdownTitle',
                'description'       => 'multiwebinc.internationaltelephoneinput::lang.components.telephoneinput.allowDropdownDescription',
                'type'              => 'checkbox',
                'default'           => true,
                'showExternalParam' => false,
            ],
            'autoHideDialCode' => [
                'title'             => 'multiwebinc.internationaltelephoneinput::lang.components.telephoneinput.autoHideDialCodeTitle',
                'description'       => 'multiwebinc.internationaltelephoneinput::lang.components.telephoneinput.autoHideDialCodeDescription',
                'type'              => 'checkbox',
                'default'           => true,
                'showExternalParam' => false,
            ],
            'autoPlaceholder' => [
                'title'             => 'multiwebinc.internationaltelephoneinput::lang.components.telephoneinput.autoPlaceholderTitle',
                'description'       => 'multiwebinc.internationaltelephoneinput::lang.components.telephoneinput.autoPlaceholderDescription',
                'default'           => 'polite',
                'type'              => 'dropdown',
                'options'           => [
                    'polite'=>'polite',
                    'aggressive'=>'aggressive',
                    'off' => 'off'
                ],
                'showExternalParam' => false,
            ],
            'customContainer' => [
                'title'             => 'multiwebinc.internationaltelephoneinput::lang.components.telephoneinput.customContainerTitle',
                'description'       => 'multiwebinc.internationaltelephoneinput::lang.components.telephoneinput.customContainerDescription',
                'default'           => '',
                'type'              => 'string',
                'showExternalParam' => false,
                'required'          => false,
            ],
            'excludeCountries' => [
                'title'             => 'multiwebinc.internationaltelephoneinput::lang.components.telephoneinput.excludeCountriesTitle',
                'description'       => 'multiwebinc.internationaltelephoneinput::lang.components.telephoneinput.excludeCountriesDescription',
                'default'           => '',
                'type'              => 'string',
                'showExternalParam' => false,
                'required'          => false,
            ],
            'formatOnDisplay' => [
                'title'             => 'multiwebinc.internationaltelephoneinput::lang.components.telephoneinput.formatOnDisplayTitle',
                'description'       => 'multiwebinc.internationaltelephoneinput::lang.components.telephoneinput.formatOnDisplayDescription',
                'type'              => 'checkbox',
                'default'           => true,
                'showExternalParam' => false,
            ],
            'formatOnType' => [
                'title'             => 'multiwebinc.internationaltelephoneinput::lang.components.telephoneinput.formatOnTypeTitle',
                'description'       => 'multiwebinc.internationaltelephoneinput::lang.components.telephoneinput.formatOnTypeDescription',
                'type'              => 'checkbox',
                'default'           => false,
                'showExternalParam' => false,
            ],
            'geoIp' => [
                'title'             => 'multiwebinc.internationaltelephoneinput::lang.components.telephoneinput.geoIpTitle',
                'description'       => 'multiwebinc.internationaltelephoneinput::lang.components.telephoneinput.geoIpDescription',
                'type'              => 'checkbox',
                'default'           => true,
                'showExternalParam' => false,
            ],
            'hiddenInput' => [
                'title'             => 'multiwebinc.internationaltelephoneinput::lang.components.telephoneinput.hiddenInputTitle',
                'description'       => 'multiwebinc.internationaltelephoneinput::lang.components.telephoneinput.hiddenInputDescription',
                'default'           => '',
                'type'              => 'string',
                'showExternalParam' => false,
                'required'          => false,
            ],
            'initialCountry' => [
                'title'             => 'multiwebinc.internationaltelephoneinput::lang.components.telephoneinput.initialCountryTitle',
                'description'       => 'multiwebinc.internationaltelephoneinput::lang.components.telephoneinput.initialCountryDescription',
                'default'           => '',
                'type'              => 'string',
                'showExternalParam' => false,
                'required'          => false,
            ],
            'nationalMode' => [
                'title'             => 'multiwebinc.internationaltelephoneinput::lang.components.telephoneinput.nationalModeTitle',
                'description'       => 'multiwebinc.internationaltelephoneinput::lang.components.telephoneinput.nationalModeDescription',
                'type'              => 'checkbox',
                'default'           => true,
                'showExternalParam' => false,
            ],
            'onlyCountries' => [
                'title'             => 'multiwebinc.internationaltelephoneinput::lang.components.telephoneinput.onlyCountriesTitle',
                'description'       => 'multiwebinc.internationaltelephoneinput::lang.components.telephoneinput.onlyCountriesDescription',
                'default'           => '',
                'type'              => 'string',
                'showExternalParam' => false,
                'required'          => false,
            ],
            'placeholderNumberType' => [
                'title'             => 'multiwebinc.internationaltelephoneinput::lang.components.telephoneinput.placeholderNumberTypeTitle',
                'description'       => 'multiwebinc.internationaltelephoneinput::lang.components.telephoneinput.placeholderNumberTypeDescription',
                'default'           => 'MOBILE',
                'type'              => 'dropdown',
                'options'           => [
                    'FIXED_LINE' => 'multiwebinc.internationaltelephoneinput::lang.components.telephoneinput.placeholderNumberTypeFixedLine',
                    'MOBILE' => 'multiwebinc.internationaltelephoneinput::lang.components.telephoneinput.placeholderNumberTypeMobile',
                    'FIXED_LINE_OR_MOBILE' => 'multiwebinc.internationaltelephoneinput::lang.components.telephoneinput.placeholderNumberTypeFixedLineOrMobile',
                    'TOLL_FREE' => 'multiwebinc.internationaltelephoneinput::lang.components.telephoneinput.placeholderNumberTypeTollFree',
                    'PREMIUM_RATE' => 'multiwebinc.internationaltelephoneinput::lang.components.telephoneinput.placeholderNumberTypePremiumRate',
                    'SHARED_COST' => 'multiwebinc.internationaltelephoneinput::lang.components.telephoneinput.placeholderNumberTypeSharedCost',
                    'VOIP' => 'multiwebinc.internationaltelephoneinput::lang.components.telephoneinput.placeholderNumberTypeVoip',
                    'PERSONAL_NUMBER' => 'multiwebinc.internationaltelephoneinput::lang.components.telephoneinput.placeholderNumberTypePersonalNumber',
                    'PAGER' => 'multiwebinc.internationaltelephoneinput::lang.components.telephoneinput.placeholderNumberTypePager',
                    'UAN' => 'multiwebinc.internationaltelephoneinput::lang.components.telephoneinput.placeholderNumberTypeUAN',
                    'VOICEMAIL' => 'multiwebinc.internationaltelephoneinput::lang.components.telephoneinput.placeholderNumberTypeVoicemail',
                    'UNKNOWN' => 'multiwebinc.internationaltelephoneinput::lang.components.telephoneinput.placeholderNumberTypeUnknown',
                ],
                'showExternalParam' => false,
            ],
            'preferredCountries' => [
                'title'             => 'multiwebinc.internationaltelephoneinput::lang.components.telephoneinput.preferredCountriesTitle',
                'description'       => 'multiwebinc.internationaltelephoneinput::lang.components.telephoneinput.preferredCountriesDescription',
                'default'           => '',
                'type'              => 'string',
                'showExternalParam' => false,
                'required'          => false,
            ],
            'separateDialCode' => [
                'title'             => 'multiwebinc.internationaltelephoneinput::lang.components.telephoneinput.separateDialCodeTitle',
                'description'       => 'multiwebinc.internationaltelephoneinput::lang.components.telephoneinput.separateDialCodeDescription',
                'type'              => 'checkbox',
                'default'           => false,
                'showExternalParam' => false,
            ],
            'utilsScript' => [
                'title'             => 'multiwebinc.internationaltelephoneinput::lang.components.telephoneinput.utilsScriptTitle',
                'description'       => 'multiwebinc.internationaltelephoneinput::lang.components.telephoneinput.utilsScriptDescription',
                'type'              => 'checkbox',
                'default'           => false,
                'showExternalParam' => false,
            ],
            'validateClientSide' => [
                'title'             => 'multiwebinc.internationaltelephoneinput::lang.components.telephoneinput.validateClientSideTitle',
                'description'       => 'multiwebinc.internationaltelephoneinput::lang.components.telephoneinput.validateClientSideDescription',
                'type'              => 'checkbox',
                'default'           => false,
                'showExternalParam' => false,
            ],
        ];
    }
}
