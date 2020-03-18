<?php

return [
    'plugin' => [
        'name' => 'International telephone input',
        'description' => 'Outputs a form field to request the user\'s telephone number. Based on https://github.com/jackocnr/intl-tel-input.',
    ],
    'components' => [
        'telephoneinput' => [
            'name' => 'Telephone input field',
            'description' => 'Outputs the input field and relevant JavaScript',

            'inputNameTitle' => 'Input field name',
            'inputNameDescription' => '"name" attribute to be added to the input field.',

            'inputClassTitle' => 'Input field class',
            'inputClassDescription' => 'CSS class attribute to be added to the input field. Separate multiple values with spaces.',

            'inputRequiredTitle' => 'Input field "required" attribute',
            'inputRequiredDescription' => 'Whether or not the form field is required.',

            'defaultValueSessionKeyTitle' => 'Session key to get default value',
            'defaultValueSessionKeyDescription' => 'Session key used to populate the default value. For example, if you store the user\'s phone number in $_SESSION["phone"], you would enter "phone" here.',

            'allowDropdownTitle' => 'Allow dropdown',
            'allowDropdownDescription' => 'Whether or not to allow the dropdown. If disabled, there is no dropdown arrow, and the selected flag is not clickable. Also we display the selected flag on the right instead because it is just a marker of state.',

            'autoHideDialCodeTitle' => 'Auto hide dial code',
            'autoHideDialCodeDescription' => 'If there is just a dial code in the input: remove it on blur or submit. This is to prevent just a dial code getting submitted with the form. Requires "nationalMode" to be set to false.',

            'autoPlaceholderTitle' => 'Auto placeholder',
            'autoPlaceholderDescription' => 'Set the input\'s placeholder to an example number for the selected country, and update it if the country changes. You can specify the number type using the placeholderNumberType option. By default it is set to "polite", which means it will only set the placeholder if the input doesn\'t already have one. You can also set it to "aggressive", which will replace any existing placeholder, or "off". Requires the utilsScript option.',

            'customContainerTitle' => 'Custom container',
            'customContainerDescription' => 'Additional classes to add to the parent div.',

            'excludeCountriesTitle' => 'Excluded countries',
            'excludeCountriesDescription' => 'A comma separated list of countries to exclude from the list. In the dropdown, all countries will be displayed except the ones you specify here. Use two character country codes. Do not put quotes around the values.',

            'formatOnDisplayTitle' => 'Format on display',
            'formatOnDisplayDescription' => 'Format the input value (according to the "nationalMode" option) during initialisation, and on setNumber. Requires the utilsScript option.',

            'formatOnTypeTitle' => 'Format as you type',
            'formatOnTypeDescription' => 'Format the input value (according to the "nationalMode" option) as the user types. Requires the formatOnDisplay option.',

            'geoIpTitle' => 'GeoIp lookup',
            'geoIpDescription' => 'Auto detect country based on user\'s IP address using the ipinfo.io service',

            'hiddenInputTitle' => 'Hidden input',
            'hiddenInputDescription' => 'Additional classes to add to the parent div.',

            'initialCountryTitle' => 'Initial country',
            'initialCountryDescription' => 'Set the initial country selection by specifying its two character country code. You can also set it to "auto", which will lookup the user\'s country based on their IP address (requires the geoIp option). Note that the "auto" option will not update the country selection if the input already contains a number. If you leave initialCountry blank, it will default to the first country in the list.',

            'nationalModeTitle' => 'National mode',
            'nationalModeDescription' => 'Allow users to enter national numbers (and not have to think about international dial codes). Formatting, validation and placeholders still work. It is recommended that you leave it that way as it provides a better experience for the user.',

            'onlyCountriesTitle' => 'Excluded countries',
            'onlyCountriesDescription' => 'In the dropdown, display only the countries you specify. This needs to be a comma separated list of two character country codes. Do not put quotes around the values.',

            'placeholderNumberTypeTitle' => 'Placeholder number type',
            'placeholderNumberTypeDescription' => 'Sets the number type to use for the placeholder.',
            'placeholderNumberTypeFixedLine' => 'Fixed line',
            'placeholderNumberTypeMobile' => 'Mobile',
            'placeholderNumberTypeFixedLineOrMobile' => 'Fixed line or mobile',
            'placeholderNumberTypeTollFree' => 'Toll free',
            'placeholderNumberTypePremiumRate' => 'Premium rate',
            'placeholderNumberTypeSharedCost' => 'Shared cost',
            'placeholderNumberTypeVoip' => 'VoIP',
            'placeholderNumberTypePersonalNumber' => 'Personal number',
            'placeholderNumberTypePager' => 'Pager',
            'placeholderNumberTypeUAN' => 'Universal access numbers',
            'placeholderNumberTypeVoicemail' => 'Voicemail',
            'placeholderNumberTypeUnknown' => 'Unknown',

            'preferredCountriesTitle' => 'Preferred countries',
            'preferredCountriesDescription' => 'A comma separated list of countries to appear at the top of the list. Use two character country codes. Do not put quotes around the values.',

            'separateDialCodeTitle' => 'Separate dial code',
            'separateDialCodeDescription' => 'Display the country dial code next to the selected flag so it\'s not part of the typed number. Note that this will disable "nationalMode" because technically we are dealing with international numbers, but with the dial code separated.',

            'utilsScriptTitle' => 'utilsScript',
            'utilsScriptDescription' => 'Loads the utilities script required to enable several options (~234 KB)',

            'validateClientSideTitle' => 'Validate client-side',
            'validateClientSideDescription' => 'Validate phone numbers when the number input field loses focus. Requires "utilsScript"',
        ],
    ],
    'errors' => [
        'invalid_number' => 'Invalid number',
        'invalid_country_code' => 'Invalid country code',
        'too_short' => 'Too short',
        'too_long' => 'Too long',
    ],
];
