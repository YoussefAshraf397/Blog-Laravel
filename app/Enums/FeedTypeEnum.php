<?php

namespace App\Enums;

class FeedTypeEnum extends AbstractEnum
{
    const TERMS = 'terms';
    const ABOUT = 'about';
    const PRIVACY = 'privacy';
    const CANCELLATION = 'cancellation';
    const DELETE_ACCOUNT = 'delete_account';
    const PLACE_CANCELLATION_TEXT = 'place_cancellation_text';
    const PLACE_ADDITIONAL_RULES_TEXT = 'place_rules_text';
    const PLACE_ADDITIONAL_SERVICES_TEXT = 'place_services_text';
}
