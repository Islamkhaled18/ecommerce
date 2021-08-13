<?php

define('PAGINATION_COUNT',15);

function getFolder(){

    return app()->getlocale() == 'ar' ? 'css-rtl' : 'css';
}
