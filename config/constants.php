<?php
/**
 * Define const for route name
 */
const USER_TOP = 'user.top';
//const USER_HOME = 'user.home';

const USER_RESET_PASSWORD_INDEX = 'user.reset_password.index';
const USER_RESET_PASSWORD_SEND_MAIL = 'user.reset_password.send_mail';
const USER_RESET_PASSWORD_CONFIRM = 'user.reset_password.confirm';
const USER_RESET_PASSWORD_UPDATE = 'user.reset_password.update';
/**
 *  Define role value
 */
const USER = 0;
const ADMIN = 1;
const ROLES = [
    USER => 'user',
    ADMIN => 'admin'
];