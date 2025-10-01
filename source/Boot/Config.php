<?php

/**
 * DATABASE
 */
const CONF_DB_LIVE = ["host" => "localhost", "user" => "u505403060_skywavefibra", "pass" => '4W$K=jX~', "database" => "u505403060_skywavefibra"]; // produção
const CONF_DB_TEST = ["host" => "localhost", "user" => "root", "pass" => "", "database" => "skywavefibra"]; // localhost

/**
 * PROJECT URLs
 */
const CONF_URL_BASE = "https://www.skywavefibra.com.br";
const CONF_URL_TEST = "http://www.localhost/skywavefibra";

/**
 * SITE
 */
const CONF_SITE_NAME = "Sky Wave Fibra";
const CONF_SITE_NAME_STYLED = "Sky Wave <b>Fibra</b>";
const CONF_SITE_EMAIL = "contato@skywavefibra.com.br";
const CONF_SITE_EMAIL_ERROR = "erro@skywavefibra.com.br";
const CONF_SITE_TITLE = "Sky Wave Fibra - Internet de Alta Velocidade";
const CONF_SITE_DESC = "Sky Wave Fibra: conexão estável, ultrarrápida e de confiança para sua casa ou empresa.";
const CONF_SITE_LANG = "pt_BR";
const CONF_SITE_DOMAIN = "skywavefibra.com.br";
const CONF_SITE_ADDR_STREET = "Br 101, Km 197";
const CONF_SITE_ADDR_NUMBER = "";
const CONF_SITE_ADDR_COMPLEMENT = "UNIAENE";
const CONF_SITE_ADDR_CITY = "Cachoeira";
const CONF_SITE_ADDR_STATE = "BA";
const CONF_SITE_ADDR_ZIPCODE = "44300-000";

/**
 * DATES
 */
const CONF_DATE_BR = "d/m/Y H:i:s";
const CONF_DATE_APP = "Y-m-d H:i:s";

/**
 * PASSWORD
 */
const CONF_PASSWD_MIN_LEN = 6;
const CONF_PASSWD_MAX_LEN = 40;
const CONF_PASSWD_ALGO = PASSWORD_DEFAULT;
const CONF_PASSWD_OPTION = ["cost" => 10];

/**
 * VIEW
 */
const CONF_VIEW_PATH = __DIR__ . "/../../shared/views";
const CONF_VIEW_EXT = "php";
const CONF_VIEW_THEME = "web";
const CONF_VIEW_APP = "app";
const CONF_VIEW_ADMIN = "adm";

/**
 * THEMES ASSETS
 */
const CONF_THEME = "shared/themes/metronic";

/**
 * UPLOAD
 */
const CONF_UPLOAD_DIR = "storage";
const CONF_UPLOAD_IMAGE_DIR = "images";
const CONF_UPLOAD_FILE_DIR = "files";
const CONF_UPLOAD_MEDIA_DIR = "medias";

/**
 * IMAGES
 */
const CONF_IMAGE_CACHE = CONF_UPLOAD_DIR . "/" . CONF_UPLOAD_IMAGE_DIR . "/cache";
const CONF_IMAGE_SIZE = 2000;
const CONF_IMAGE_QUALITY = ["jpg" => 75, "png" => 5];

/**
 * MAIL
 */
const CONF_MAIL_HOST = "smtp.hostinger.com";
const CONF_MAIL_PORT = "465";
const CONF_MAIL_USER = "contato@skywavefibra.com.br";
const CONF_MAIL_PASS = "4Hq9Y$[P=@";
const CONF_MAIL_SENDER = ["name" => "Sky Wave Fibra", "address" => "contato@skywavefibra.com.br"];
const CONF_MAIL_SUPPORT = "contato@skywavefibra.com.br";
const CONF_MAIL_OPTION_LANG = "br";
const CONF_MAIL_OPTION_HTML = true;
const CONF_MAIL_OPTION_AUTH = true;
const CONF_MAIL_OPTION_SECURE = "ssl";
const CONF_MAIL_OPTION_CHARSET = "utf-8";

/**
 * SOCIAL
 */
const CONF_SOCIAL_TWITTER_CREATOR = "@fac_adventista";
const CONF_SOCIAL_TWITTER_PUBLISHER = "@fac_adventista";

const CONF_SOCIAL_FACEBOOK_APP = "5555555555";
const CONF_SOCIAL_FACEBOOK_PAGE = "FaculdadeAdventista";
const CONF_SOCIAL_FACEBOOK_AUTHOR = "author";

const CONF_SOCIAL_GOOGLE_PAGE = "5555555555";
const CONF_SOCIAL_GOOGLE_AUTHOR = "5555555555";

const CONF_SOCIAL_INSTAGRAM_PAGE = "https://www.instagram.com/uniaene";

const CONF_SOCIAL_YOUTUBE_PAGE = "https://www.youtube.com/channel/UC6GjhC0KktsGmiPtJ92mVdQ";