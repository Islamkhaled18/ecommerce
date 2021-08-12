<?php

function getFolder(){

    return app()->getlocale() == 'ar' ? 'css-rtl' : 'css';
}