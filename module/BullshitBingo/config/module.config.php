<?php
return array(
    'router' => array(
        'routes' => array(
            'bullshit-bingo.rest.buzzwords' => array(
                'type' => 'Segment',
                'options' => array(
                    'route' => '/buzzwords[/:buzzwords_id]',
                    'defaults' => array(
                        'controller' => 'BullshitBingo\\V1\\Rest\\Buzzwords\\Controller',
                    ),
                ),
            ),
        ),
    ),
    'zf-versioning' => array(
        'uri' => array(
            0 => 'bullshit-bingo.rest.buzzwords',
        ),
    ),
    'zf-rest' => array(
        'BullshitBingo\\V1\\Rest\\Buzzwords\\Controller' => array(
            'listener' => 'BullshitBingo\\V1\\Rest\\Buzzwords\\BuzzwordsResource',
            'route_name' => 'bullshit-bingo.rest.buzzwords',
            'route_identifier_name' => 'buzzwords_id',
            'collection_name' => 'buzzwords',
            'entity_http_methods' => array(
                0 => 'GET',
                1 => 'PATCH',
                2 => 'DELETE',
            ),
            'collection_http_methods' => array(
                0 => 'GET',
                1 => 'POST',
                2 => 'DELETE',
            ),
            'collection_query_whitelist' => array(),
            'page_size' => 25,
            'page_size_param' => null,
            'entity_class' => 'BullshitBingo\\V1\\Rest\\Buzzwords\\BuzzwordsEntity',
            'collection_class' => 'BullshitBingo\\V1\\Rest\\Buzzwords\\BuzzwordsCollection',
            'service_name' => 'buzzwords',
        ),
    ),
    'zf-content-negotiation' => array(
        'controllers' => array(
            'BullshitBingo\\V1\\Rest\\Buzzwords\\Controller' => 'HalJson',
        ),
        'accept_whitelist' => array(
            'BullshitBingo\\V1\\Rest\\Buzzwords\\Controller' => array(
                0 => 'application/vnd.bullshit-bingo.v1+json',
                1 => 'application/hal+json',
                2 => 'application/json',
            ),
        ),
        'content_type_whitelist' => array(
            'BullshitBingo\\V1\\Rest\\Buzzwords\\Controller' => array(
                0 => 'application/vnd.bullshit-bingo.v1+json',
                1 => 'application/json',
            ),
        ),
    ),
    'zf-hal' => array(
        'metadata_map' => array(
            'BullshitBingo\\V1\\Rest\\Buzzwords\\BuzzwordsEntity' => array(
                'entity_identifier_name' => 'id',
                'route_name' => 'bullshit-bingo.rest.buzzwords',
                'route_identifier_name' => 'buzzwords_id',
                'hydrator' => 'Zend\\Hydrator\\ArraySerializable',
            ),
            'BullshitBingo\\V1\\Rest\\Buzzwords\\BuzzwordsCollection' => array(
                'entity_identifier_name' => 'id',
                'route_name' => 'bullshit-bingo.rest.buzzwords',
                'route_identifier_name' => 'buzzwords_id',
                'is_collection' => true,
            ),
        ),
    ),
    'zf-apigility' => array(
        'db-connected' => array(
            'BullshitBingo\\V1\\Rest\\Buzzwords\\BuzzwordsResource' => array(
                'adapter_name' => 'BullshitBingo',
                'table_name' => 'buzzwords',
                'hydrator_name' => 'Zend\\Hydrator\\ArraySerializable',
                'controller_service_name' => 'BullshitBingo\\V1\\Rest\\Buzzwords\\Controller',
                'entity_identifier_name' => 'id',
                'table_service' => 'BullshitBingo\\V1\\Rest\\Buzzwords\\BuzzwordsResource\\Table',
            ),
        ),
    ),
    'zf-content-validation' => array(
        'BullshitBingo\\V1\\Rest\\Buzzwords\\Controller' => array(
            'input_filter' => 'BullshitBingo\\V1\\Rest\\Buzzwords\\Validator',
        ),
    ),
    'input_filter_specs' => array(
        'BullshitBingo\\V1\\Rest\\Buzzwords\\Validator' => array(
            0 => array(
                'name' => 'pos',
                'required' => true,
                'filters' => array(),
                'validators' => array(
                    0 => array(
                        'name' => 'ZF\\ContentValidation\\Validator\\DbNoRecordExists',
                        'options' => array(
                            'adapter' => 'BullshitBingo',
                            'table' => 'buzzwords',
                            'field' => 'pos',
                        ),
                    ),
                    1 => array(
                        'name' => 'Zend\\I18n\\Validator\\IsInt',
                        'options' => array(),
                    ),
                    2 => array(
                        'name' => 'Zend\\Validator\\Between',
                        'options' => array(
                            'inclusive' => true,
                            'min' => '1',
                            'max' => '16',
                        ),
                    ),
                ),
            ),
            1 => array(
                'name' => 'text',
                'required' => true,
                'filters' => array(
                    0 => array(
                        'name' => 'Zend\\Filter\\StringTrim',
                    ),
                    1 => array(
                        'name' => 'Zend\\Filter\\StripTags',
                    ),
                ),
                'validators' => array(
                    0 => array(
                        'name' => 'ZF\\ContentValidation\\Validator\\DbNoRecordExists',
                        'options' => array(
                            'adapter' => 'BullshitBingo',
                            'table' => 'buzzwords',
                            'field' => 'text',
                        ),
                    ),
                    1 => array(
                        'name' => 'Zend\\Validator\\StringLength',
                        'options' => array(
                            'min' => 1,
                            'max' => 255,
                        ),
                    ),
                ),
            ),
            2 => array(
                'name' => 'marked',
                'required' => false,
                'filters' => array(),
                'validators' => array(
                    0 => array(
                        'name' => 'Zend\\I18n\\Validator\\IsInt',
                        'options' => array(),
                    ),
                    1 => array(
                        'name' => 'Zend\\Validator\\Between',
                        'options' => array(
                            'inclusive' => true,
                            'min' => '0',
                            'max' => '1',
                        ),
                    ),
                ),
            ),
        ),
    ),
);