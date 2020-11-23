<?php
/**
 * Define const for route name
 */
const USER_TOP = 'user.top';
const USER_LOGIN = 'user.login';

const USER_FORGET_PASSWORD_INDEX = 'user.forget_password.index';
const USER_RESET_PASSWORD_INDEX = 'user.reset_password.index';
const USER_STATISTICAL = 'user.statistical';
const USER_PROFILE = 'user.profile';
const USER_POPULATION = 'user.population';
const USER_POPULATION = 'user.profile';
/**
 *  Define role value
 */
const USER = 0;
const ADMIN = 1;
const ROLES = [
    USER => 'user',
    ADMIN => 'admin'
];