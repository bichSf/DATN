<?php
/**
 * Define const for route name
 */
const HOME = 'home';
const USER_TOP = 'user.top';
const USER_LOGIN = 'user.login';
const LOGIN = 'login';
const LOGOUT = 'logout';

const ADMIN_MANAGER_USER = 'admin.manager_user';
const ADMIN_USER_CREATE = 'admin.user_create';
const ADMIN_USER_STORE = 'admin.user_store';
const ADMIN_MANAGER_SURVEY= 'admin.manager_survey';
const ADMIN_SURVEY_CREATE = 'admin.survey_create';
const ADMIN_SURVEY_STORE = 'admin.survey_store';
const ADMIN_SURVEY_EDIT = 'admin.survey_edit';
const ADMIN_SURVEY_UPDATE = 'admin.survey_update';
const ADMIN_SURVEY_DESTROY = 'admin.survey_destroy';

const USER_FORGET_PASSWORD_INDEX = 'user.forget_password.index';
const USER_RESET_PASSWORD_INDEX = 'user.reset_password.index';
const USER_RESET_PASSWORD = 'user.reset_password';
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

const MAN = 0;
const WOMAN = 1;

const GENDER_NAME = [
    MAN => 'Nam',
    WOMAN => 'Nữ',
];

const INFANTS = 'infants_0_0';
const TODDLER = 'toddlers_1_60';
const CHILDREN = 'children_5_11';
const TEENS = 'teens_11_20';
const ADULTS = 'adults_20_60';
const SENIORS = 'seniors_60_100';

const ATTRIBUTE_DATA = [
    INFANTS => ['weight', 'height', 'head_circumference'],
    TODDLER => ['weight', 'height', 'biceps_skinfold', 'arm_circumference'],
    CHILDREN => ['weight', 'height', 'biceps_skinfold', 'arm_circumference', 'head_circumference', 'chest_circumference'],
    TEENS => ['weight', 'height', 'biceps_skinfold', 'fat_percentage'],
    ADULTS => ['weight', 'height', 'arm_circumference', 'biceps_skinfold', 'fat_percentage'],
    SENIORS => ['weight', 'height', 'arm_circumference', 'biceps_skinfold', 'knee_height', 'stomach_feet'],
];

const PATH_AVATAR_USER = '/storage/imagesProfileUser/';



const TYPE_POPULATION_NAME = [
    'infants_0_0' => 'Trẻ sơ sinh',
    'toddlers_1_60' => '1 đến 60 tháng tuổi',
    'children_5_11' => '5 đến 11 tuổi',
    'teens_11_20' => '11 đến 20 tuổi',
    'adults_20_60' => '20 đến 60 tuổi',
    'seniors_60_100' => 'Trên 60 tuổi',
];

const STR_SUCCESS_FLASH = 'success-flash';
const STR_ERROR_FLASH = 'error-flash';

const DATE_YEAR_MIN = '2000';
const PAGINATE = 10;

const NORTHERN = 1;
const SOUTH = 2;
const CENTRAL = 3;
const AREAS = [
    NORTHERN => 'Miền Bắc',
    SOUTH => 'Miền Nam',
    CENTRAL => 'Miền Trung'
];

