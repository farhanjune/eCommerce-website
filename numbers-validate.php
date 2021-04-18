<?php

function card_number_validate($card_number){
    if (is_numeric($card_number) && strlen($card_number) == 16){
        return $card_number;
    }
    elseif (empty($card_number)){
        return 'null';
    }
    else{
        return false;
    }
}

function card_security_validate($card_security){
    if (is_numeric($card_security) && strlen($card_security) == 3){
        return $card_security;
    }
    elseif (empty($card_security)){
        return 'null';
    }
    else{
        return false;
    }
}

function phone_validate($phone){
    if (is_numeric($phone) && strlen($phone) == 10){
        return $phone;
    }
    elseif (empty($phone)){
        return 'null';
    }
    else{
        return false;
    }
}