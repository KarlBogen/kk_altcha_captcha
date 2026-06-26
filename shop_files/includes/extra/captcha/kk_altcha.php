<?php
/* ------------------------------------------------------------
  Module "ALTCHA - Captcha" made by Karl

  modified eCommerce Shopsoftware
  http://www.modified-shop.org

  Released under the GNU General Public License
-------------------------------------------------------------- */

class kk_altcha extends modified_captcha
{

  protected static $_instance = null;

  public static function getInstance()
  {

    if (null === self::$_instance) {
      self::$_instance = new self;
    }

    return self::$_instance;
  }

  public function output() {}

  public function validate($input)
  {

    require_once(DIR_FS_EXTERNAL . 'kk_altcha/kk_altcha.php');
    $res = new kk_altcha_modified;
    $result = $res->handleSubmit();

    if (!empty($result['verified']) && $result['verified'] === true) {
      return true;
    }

    return false;
  }

  public function get_image_code() {}

  public function get_input_code()
  {
    $hidelogo = MODULE_SYSTEM_KK_ALTCHA_HIDELOGO === 'true' ? 'hideLogo' : '';
    $hidefooter = MODULE_SYSTEM_KK_ALTCHA_HIDEFOOTER === 'true' ? 'hideFooter' : '';
    defined('KK_ALTACHA_DIR_TMPL') or define('KK_ALTACHA_DIR_TMPL', 'templates/' . CURRENT_TEMPLATE . '/altcha');

    $scripts = '';
    if (MODULE_SYSTEM_KK_ALTCHA_THEME != 'default' && is_file(DIR_FS_CATALOG . KK_ALTACHA_DIR_TMPL . '/css/themes/' . MODULE_SYSTEM_KK_ALTCHA_THEME . '.min.css')) {
      $scripts .= '<link href="' . DIR_WS_BASE . KK_ALTACHA_DIR_TMPL . '/css/themes/' . MODULE_SYSTEM_KK_ALTCHA_THEME . '.min.css" rel="stylesheet">';
    }
    $scripts .= '<script async defer src="' . DIR_WS_BASE . KK_ALTACHA_DIR_TMPL . '/javascript/altcha.min.js" type="module"></script>' . PHP_EOL;
    if (is_file(DIR_FS_CATALOG . KK_ALTACHA_DIR_TMPL . '/javascript/altcha-' . $_SESSION["language_code"] . '.js')) {
      $scripts .= '<script src="' . DIR_WS_BASE . KK_ALTACHA_DIR_TMPL . '/javascript/altcha-' . $_SESSION["language_code"] . '.js" type="module"></script>' . PHP_EOL;
    }
    $scripts .= '<altcha-widget auto="' . MODULE_SYSTEM_KK_ALTCHA_VERIFICATION_TRIGGER . '" challenge="' . DIR_WS_BASE . 'ajax.php/challenge?ext=kk_altcha" configuration=\'{"minDuration": ' . (int)MODULE_SYSTEM_KK_ALTCHA_MIN_VERIFICATION_TIME . '}\' display="' . MODULE_SYSTEM_KK_ALTCHA_LAYOUT_MODE . '" language="' . $_SESSION["language_code"] . '" name="altcha" ' . $hidelogo . ' ' . $hidefooter . ' theme="' . MODULE_SYSTEM_KK_ALTCHA_THEME . '" type="' . MODULE_SYSTEM_KK_ALTCHA_TYPE . '" workers="4"></altcha-widget>';
    return $scripts;
  }
}
