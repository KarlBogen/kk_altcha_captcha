<?php
/* ------------------------------------------------------------
  Module "ALTCHA - Captcha" made by Karl

  modified eCommerce Shopsoftware
  http://www.modified-shop.org

  Released under the GNU General Public License
-------------------------------------------------------------- */

define('MODULE_SYSTEM_KK_ALTCHA_TEXT_TITLE', 'ALTCHA - CAPTCHA');
define('MODULE_SYSTEM_KK_ALTCHA_TEXT_DESCRIPTION', 'You can protect your forms with this module.<br>
  Not: Before making significant changes here, the <a href="https://altcha.org/docs/v2/" target="_blank" title="Altcha Org" style="color: #e67e22; font-weight: bold;">documentation at altcha.org</a> should be read.<br>
  With Altcha, there is also the option to test all settings in a "playground."');
define('MODULE_SYSTEM_KK_ALTCHA_STATUS_TITLE', 'Activate module?');
define('MODULE_SYSTEM_KK_ALTCHA_STATUS_DESC', 'Activate ALTCHA - Captcha?');
define('MODULE_SYSTEM_KK_ALTCHA_DELETE_CONFIRM', 'Should all module files really be deleted?<br /><br />This removes all database entries and all related files!<br />');
define('MODULE_SYSTEM_KK_ALTCHA_DELETE_BUTTON', 'Delete module files');
define('MODULE_SYSTEM_KK_ALTCHA_DELETE_ERR', ' could not be deleted by the program, or does not exist!');

define('MODULE_SYSTEM_KK_ALTCHA_ALGORITHM_TITLE', 'Standard hash function');
define('MODULE_SYSTEM_KK_ALTCHA_ALGORITHM_DESC', 'The SHA-256, SHA-384, and SHA-512 algorithms differ in the length of the generated hash value. A longer hash, is more secure, but the processing is slower.<br>Default value: SHA256');
define('MODULE_SYSTEM_KK_ALTCHA_SECRET_TITLE', 'Secret key');
define('MODULE_SYSTEM_KK_ALTCHA_SECRET_DESC', 'Secret key used for ALTCHA HMAC operations, such as signing challenges. Must be at least 24 characters long.<br>Default value: Ihr-Sehr-Langes-Und-Sicheres-Crypto-Secret');
define('MODULE_SYSTEM_KK_ALTCHA_VERIFICATION_TRIGGER_TITLE', 'Automatic verification');
define('MODULE_SYSTEM_KK_ALTCHA_VERIFICATION_TRIGGER_DESC', 'Determines when verification triggers automatically ("off", "onfocus", "onload", or "onsubmit").<br>Default value: off');
define('MODULE_SYSTEM_KK_ALTCHA_MIN_VERIFICATION_TIME_TITLE', 'Minimum verification time');
define('MODULE_SYSTEM_KK_ALTCHA_MIN_VERIFICATION_TIME_DESC', 'The minimum verification time in milliseconds; adds an artificial delay if the PoW is faster.<br>Default value: 1000');
define('MODULE_SYSTEM_KK_ALTCHA_LAYOUT_MODE_TITLE', 'Layout mode');
define('MODULE_SYSTEM_KK_ALTCHA_LAYOUT_MODE_DESC', 'The visual layout mode ("standard", "bar", "floating", "overlay", "invisible").<br>Default value: standard');
define('MODULE_SYSTEM_KK_ALTCHA_HIDELOGO_TITLE', 'Altcha logo');
define('MODULE_SYSTEM_KK_ALTCHA_HIDELOGO_DESC', 'Hides the ALTCHA logo icon.<br>
  Note: This setting currently has no effect and would need to be applied manually in the Altcha JavaScript file!<br>
  To do this, change the entry "hideLogo:!1" to "hideLogo:1" in the file "templates/your_template/altcha/javascript/altcha.min.js"..<br>Default value: Nein');
define('MODULE_SYSTEM_KK_ALTCHA_HIDEFOOTER_TITLE', 'Altcha link');
define('MODULE_SYSTEM_KK_ALTCHA_HIDEFOOTER_DESC', 'Hides the "ALTCHA" attribution link.<br>
  Note: This setting currently has no effect and would need to be applied manually in the Altcha JavaScript file!<br>
  To do this, change the entry "hideFooter:!1" to "hideFooter:1" in the file "templates/your_template/altcha/javascript/altcha.min.js"..<br>Default value: Nein');
define('MODULE_SYSTEM_KK_ALTCHA_TYPE_TITLE', 'Style of form field');
define('MODULE_SYSTEM_KK_ALTCHA_TYPE_DESC', 'Visual style of form field ("checkbox", "native", "switch").<br>Default value: checkbox');
define('MODULE_SYSTEM_KK_ALTCHA_THEME_TITLE', 'CSS-Themes');
define('MODULE_SYSTEM_KK_ALTCHA_THEME_DESC', 'Different CSS files are loaded based on this setting. ("default", "aqua", "business", "caramel", "cupcake", "cyberpunk", "lime", "wireframe").<br>Default value: default');

define('MODULE_SYSTEM_KK_ALTCHA_FILES_MISS_TXT', 'The for this module necessary file %s is missing on the server! Please verify the upload of the for this module necessary files.');