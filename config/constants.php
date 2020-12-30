<?php
/**
 * Define const for route name
 */
const HOME = 'home';
const SEE_RESULT = 'see.result';
const USER_LOGIN = 'user.login';
const LOGIN = 'login';
const LOGOUT = 'logout';

const ADMIN_MANAGER_USER = 'admin.manager_user';
const ADMIN_USER_CREATE = 'admin.user_create';
const ADMIN_USER_STORE = 'admin.user_store';
const ADMIN_USER_EDIT = 'admin.user_edit';
const ADMIN_USER_UPDATE = 'admin.user_update';
const ADMIN_USER_DESTROY = 'admin.user_destroy';
const ADMIN_MANAGER_SURVEY= 'admin.manager_survey';
const ADMIN_SURVEY_CREATE = 'admin.survey_create';
const ADMIN_SURVEY_STORE = 'admin.survey_store';
const ADMIN_SURVEY_EDIT = 'admin.survey_edit';
const ADMIN_SURVEY_UPDATE = 'admin.survey_update';
const ADMIN_SURVEY_DESTROY = 'admin.survey_destroy';

const USER_RESET_PASSWORD_INDEX = 'user.reset_password.index';
const USER_RESET_PASSWORD = 'user.reset_password';
const USER_STATISTICAL = 'user.statistical';
const USER_NUTRITION_INDEX = 'user.nutrition.index';
const USER_NUTRITION_CREATE = 'user.nutrition.create';
const USER_NUTRITION_STORE = 'user.nutrition.store';
const USER_NUTRITION_DESTROY = 'user.nutrition.destroy';
const USER_NUTRITION_DESTROY_MULTI = 'user.nutrition.destroy_multi';
const USER_PROFILE = 'user.profile';

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

const ARRAY_CHILDREN = ['infants_0_0', 'toddlers_1_60', 'children_5_11'];

const ATTRIBUTE_DATA = [
    INFANTS => ['weight', 'height', 'head_circumference', 'survey_id'],
    TODDLER => ['weight', 'height', 'biceps_skinfold', 'arm_circumference', 'survey_id'],
    CHILDREN => ['weight', 'height', 'biceps_skinfold', 'arm_circumference', 'head_circumference', 'chest_circumference', 'survey_id'],
    TEENS => ['weight', 'height', 'biceps_skinfold', 'fat_percentage', 'survey_id'],
    ADULTS => ['weight', 'height', 'arm_circumference', 'biceps_skinfold', 'fat_percentage', 'survey_id'],
    SENIORS => ['weight', 'height', 'arm_circumference', 'biceps_skinfold', 'knee_height', 'stomach_feet', 'survey_id'],
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

const LIM_SDD = -0.4;

// Độ lệch chuẩn của quần thể tham chiếu
const STANDARD_DEVIATION = 0.014;

const BMI_RATE = [
    'Gầy độ 3' => [0, 16],
    'Gầy độ 2' => [16, 16.99],
    'Gầy độ 1' => [17, 18.49],
    'Bình thường' => [18.5, 24.99],
    'Thừa cân độ 1' => [25, 29.99],
    'Thừa cân độ 2' => [30, 39.99],
    'Thừa cân độ 3' => [40, 100]
];

