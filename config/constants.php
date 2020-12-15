<?php
/**
 * Define const for route name
 */
const HOME = 'home';
const USER_TOP = 'user.top';
const USER_LOGIN = 'user.login';
const LOGIN = 'login';

const ADMIN_MANAGER_USER = 'admin.manager_user';
const ADMIN_USER_CREATE = 'admin.user_create';
const ADMIN_USER_STORE = 'admin.user_store';
const ADMIN_MANAGER_SURVEY= 'admin.manager_survey';
const ADMIN_SURVEY_CREATE = 'admin.survey_create';
const ADMIN_SURVEY_STORE = 'admin.survey_store';

const USER_FORGET_PASSWORD_INDEX = 'user.forget_password.index';
const USER_RESET_PASSWORD_INDEX = 'user.reset_password.index';
const USER_STATISTICAL = 'user.statistical';
const USER_STATISTICAL_POPULATION = 'user.statistical.population';
const USER_STATISTICAL_CREATE = 'user.statistical.create';
const USER_STATISTICAL_STORE = 'user.statistical.store';
const USER_PROFILE = 'user.profile';
const USER_POPULATION = 'user.population';
/**
 *  Define role value
 */
const USER = 0;
const ADMIN = 1;
const ROLES = [
    USER => 'user',
    ADMIN => 'admin'
];

const TYPE_POPULATION_NAME = [
    'infants_0_0' => 'Trẻ sơ sinh',
    'toddlers_1_60' => '1 đến 60 tháng tuổi',
    'children_5_11' => '5 đến 11 tuổi',
    'teens_11_20' => '11 đến 20 tuổi',
    'adults_20_60' => '20 đến 60 tuổi',
    'seniors_60_100' => 'Trên 60 tuổi',
];

const STR_ERROR_FLASH = 'error-flash';

const DATE_YEAR_MIN = '2000';