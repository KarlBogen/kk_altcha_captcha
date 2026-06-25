<?php
/* ------------------------------------------------------------
  Module "ALTCHA - Captcha" made by Karl

  modified eCommerce Shopsoftware
  http://www.modified-shop.org

  Released under the GNU General Public License
-------------------------------------------------------------- */

define('MODULE_SYSTEM_KK_ALTCHA_TEXT_TITLE', 'ALTCHA - CAPTCHA');
define('MODULE_SYSTEM_KK_ALTCHA_TEXT_DESCRIPTION', 'Mit diesem Modul k&ouml;nnen Sie ihre Formulare sch&uuml;tzen.<br>
  Hinweis: Bevor hier wesentliche &Auml;nderungen gemacht werden, sollte die <a href="https://altcha.org/docs/v2/" target="_blank" title="Altcha Org" style="color: #e67e22; font-weight: bold;">Dokumentation bei altcha.org</a> gelesen werden.<br>
  Bei Altcha besteht zudem die M&ouml;glichkeit alle Einstellungen in einem "Playground" auszuprobieren.');
define('MODULE_SYSTEM_KK_ALTCHA_STATUS_TITLE', 'Modul aktivieren?');
define('MODULE_SYSTEM_KK_ALTCHA_STATUS_DESC', 'ALTCHA - Captcha aktivieren');
define('MODULE_SYSTEM_KK_ALTCHA_DELETE_CONFIRM', 'Sollen alle Moduldateien wirklich l&ouml;scht werden?<br /><br />Es werden alle Datenbankeintr&auml;ge und alle zugeh&ouml;rigen Dateien entfernt!<br />');
define('MODULE_SYSTEM_KK_ALTCHA_DELETE_BUTTON', 'Moduldateien l&ouml;schen');
define('MODULE_SYSTEM_KK_ALTCHA_DELETE_ERR', ' konnte nicht vom Programm gel&ouml;scht werden, oder existiert nicht!');

define('MODULE_SYSTEM_KK_ALTCHA_ALGORITHM_TITLE', 'Standard-Hash-Funktion');
define('MODULE_SYSTEM_KK_ALTCHA_ALGORITHM_DESC', 'Die Algorithmen SHA-256, SHA-384 und SHA-512 unterscheiden sich in der L&auml;nge des erzeugten Hash-Wertes. Je l&auml;nger desto sicherer, jedoch umso langsamer die Verarbeitung.<br>Standardwert: SHA256');
define('MODULE_SYSTEM_KK_ALTCHA_SECRET_TITLE', 'Geheimer Schl&uuml;ssel');
define('MODULE_SYSTEM_KK_ALTCHA_SECRET_DESC', 'Geheimer Schl&uuml;ssel, der f&uuml;r ALTCHA-HMAC-Operationen wie das Signieren von Challenges verwendet wird. Muss mindestens 24 Zeichen lang sein.<br>Standardwert: Ihr-Sehr-Langes-Und-Sicheres-Crypto-Secret');
define('MODULE_SYSTEM_KK_ALTCHA_VERIFICATION_TRIGGER_TITLE', 'Automatischer Start der &Uuml;berpr&uuml;fung');
define('MODULE_SYSTEM_KK_ALTCHA_VERIFICATION_TRIGGER_DESC', 'Legt fest, wann die &Uuml;berpr&uuml;fung automatisch ausgel&ouml;st wird ("off", "onfocus", "onload" oder "onsubmit").<br>Standardwert: off');
define('MODULE_SYSTEM_KK_ALTCHA_MIN_VERIFICATION_TIME_TITLE', 'Minimale Verifizierungszeit');
define('MODULE_SYSTEM_KK_ALTCHA_MIN_VERIFICATION_TIME_DESC', 'Die minimale Verifizierungszeit in Millisekunden; f&uuml;gt eine k&uuml;nstliche Verz&ouml;gerung hinzu, falls der PoW (Proof-of-work - &Uuml;berpr&uuml;fungszeit) schneller ist.<br>Standardwert: 1000');
define('MODULE_SYSTEM_KK_ALTCHA_LAYOUT_MODE_TITLE', 'Layout-Modus');
define('MODULE_SYSTEM_KK_ALTCHA_LAYOUT_MODE_DESC', 'Der visuelle Layout-Modus ("standard", "bar - Leiste", "floating - schwebend", "overlay - &Uuml;berlagerung", "invisible - unsichtbar").<br>Standardwert: standard');
define('MODULE_SYSTEM_KK_ALTCHA_HIDELOGO_TITLE', 'Altcha-Logo');
define('MODULE_SYSTEM_KK_ALTCHA_HIDELOGO_DESC', 'Blendet das ALTCHA-Logo-Symbol aus.<br>
  Hinweis: Diese Einstellung hat momentan keine Auswirkung und m&uuml;sste manuell in der Altcha-JavaScript-Datei vorgenommen werden!<br>
  Dazu in der Datei "templates/mein_template/altcha/javascript/altcha.min.js" den Eintrag "hideLogo:!1" &auml;ndern zu "hideLogo:1".<br>Standardwert: Nein');
define('MODULE_SYSTEM_KK_ALTCHA_HIDEFOOTER_TITLE', 'Altcha-Link');
define('MODULE_SYSTEM_KK_ALTCHA_HIDEFOOTER_DESC', 'Blendet den ALTCHA-Link aus.<br>
  Hinweis: Diese Einstellung hat momentan keine Auswirkung und m&uuml;sste manuell in der Altcha-JavaScript-Datei vorgenommen werden!<br>
  Dazu in der Datei "templates/mein_template/altcha/javascript/altcha.min.js" den Eintrag "hideFooter:!1" &auml;ndern zu "hideFooter:1".<br>Standardwert: Nein');
define('MODULE_SYSTEM_KK_ALTCHA_TYPE_TITLE', 'Stil des Eingabefeldes');
define('MODULE_SYSTEM_KK_ALTCHA_TYPE_DESC', 'Der visuelle Stil des Eingabefeldes ("checkbox", "native", "switch").<br>Standardwert: checkbox');
define('MODULE_SYSTEM_KK_ALTCHA_THEME_TITLE', 'CSS-Themes');
define('MODULE_SYSTEM_KK_ALTCHA_THEME_DESC', 'Entsprechend dieser Einstellung werden unterschiedliche CSS-Dateien geladen ("default", "aqua", "business", "caramel", "cupcake", "cyberpunk", "lime", "wireframe").<br>Standardwert: default');

define('MODULE_SYSTEM_KK_ALTCHA_FILES_MISS_TXT', 'Die f&uuml;r das vorliegende Modul erforderliche Datei %s fehlt auf dem Server! Bitte den Upload der f&uuml;r das Modul erforderlichen Dateien pr&uuml;fen.');