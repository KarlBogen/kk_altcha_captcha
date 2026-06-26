<?php
/* ------------------------------------------------------------
  Module "ALTCHA - Captcha" made by Karl

  modified eCommerce Shopsoftware
  http://www.modified-shop.org

  Released under the GNU General Public License
-------------------------------------------------------------- */

function kk_altcha()
{
    require_once(DIR_FS_EXTERNAL . 'kk_altcha/kk_altcha.php');
    $kk_altcha = new kk_altcha_modified;
    $result = $kk_altcha->handleChallenge();


    $kk_altcha->sendJson($result['data'], $result['status']);
    exit;
}
