<?php
/* ------------------------------------------------------------
  Module "ALTCHA - Captcha" made by Karl

  modified eCommerce Shopsoftware
  http://www.modified-shop.org

  Released under the GNU General Public License
-------------------------------------------------------------- */

defined('_VALID_XTC') or die('Direct Access to this location is not allowed.');

class kk_altcha_captcha
{

  public string $version;
  public string $code;
  public string $title;
  public string $description;
  public int $sort_order;
  public bool $enabled;
  public array $properties;
  public bool $_check;

  private array $files_exist;

  public function __construct()
  {
    $this->version = '1.0.0';
    $this->code = 'kk_altcha_captcha';
    $this->title = MODULE_SYSTEM_KK_ALTCHA_TEXT_TITLE . ' © by <a href="https://github.com/KarlBogen" target="_blank" style="color: #e67e22; font-weight: bold;">Karl</a> - Version: ' . $this->version;
    $this->description = '';
    //$this->description .= '<a class="button btnbox" style="text-align:center;" href="' . xtc_href_link(FILENAME_MODULE_EXPORT, 'set=system&module=' . $this->code . '&action=edit') . '">' . BUTTON_EDIT . '</a><br />';
    $this->description .= '<a class="button btnbox but_red" style="text-align:center;" onclick="return confirmLink(\'' . MODULE_SYSTEM_KK_ALTCHA_DELETE_CONFIRM . '\', \'\' ,this);" href="' . xtc_href_link(FILENAME_MODULE_EXPORT, 'set=system&module=' . $this->code . '&action=custom') . '">' . MODULE_SYSTEM_KK_ALTCHA_DELETE_BUTTON . '</a><br />';
    $this->description .= MODULE_SYSTEM_KK_ALTCHA_TEXT_DESCRIPTION;
    $this->sort_order = defined('MODULE_SYSTEM_KK_ALTCHA_SORT_ORDER') ? MODULE_SYSTEM_KK_ALTCHA_SORT_ORDER : 0;
    $this->enabled = ((defined('MODULE_SYSTEM_KK_ALTCHA_STATUS') && MODULE_SYSTEM_KK_ALTCHA_STATUS == 'true') ? true : false);
    //$this->properties = array('process_key' => false);

    if (isset($_GET['module']) && $_GET['module'] == $this->code && isset($_GET['action']) && $_GET['action'] == 'save') {
      if ($_POST['configuration']['MODULE_SYSTEM_KK_ALTCHA_STATUS'] == 'true') {
        xtc_db_query("UPDATE " . TABLE_CONFIGURATION . " SET configuration_value = 'kk_altcha_captcha' WHERE configuration_key = 'CAPTCHA_MOD_CLASS'");
      } else {
        xtc_db_query("UPDATE " . TABLE_CONFIGURATION . " SET configuration_value = 'modified_captcha' WHERE configuration_key = 'CAPTCHA_MOD_CLASS'");
      }
    }
  }

  public function process($file) {}

  public function display()
  {
    return array('text' => '<br /><div align="center">' . xtc_button(BUTTON_SAVE) .
      xtc_button_link(BUTTON_CANCEL, xtc_href_link(FILENAME_MODULE_EXPORT, 'set=' . $_GET['set'] . '&module=kk_altcha_captcha')) . "</div>");
  }

  public function check()
  {
    if (!isset($this->_check)) {
      if (defined('MODULE_SYSTEM_KK_ALTCHA_STATUS')) {
        $this->_check = true;
      } else {
        $check_query = xtc_db_query("SELECT configuration_value
                                       FROM " . TABLE_CONFIGURATION . "
                                      WHERE configuration_key = 'MODULE_SYSTEM_KK_ALTCHA_STATUS'");
        $this->_check = xtc_db_num_rows($check_query);
      }
    }
    return $this->_check;
  }

  public function install()
  {
    xtc_db_query("INSERT INTO " . TABLE_CONFIGURATION . " (configuration_key, configuration_value, configuration_group_id, sort_order, set_function, date_added) VALUES ('MODULE_SYSTEM_KK_ALTCHA_STATUS', 'true',  '6', '1', 'xtc_cfg_select_option(array(\'true\', \'false\'), ', now())");
    xtc_db_query("INSERT INTO " . TABLE_CONFIGURATION . " (configuration_key, configuration_value, configuration_group_id, sort_order, set_function, date_added) VALUES ('MODULE_SYSTEM_KK_ALTCHA_ALGORITHM', 'SHA256',  '6', '1', 'xtc_cfg_select_option(array(\'SHA256\', \'SHA384\', \'SHA512\'), ', now())");
    xtc_db_query("INSERT INTO " . TABLE_CONFIGURATION . " (configuration_key, configuration_value,  configuration_group_id, sort_order, date_added) values ('MODULE_SYSTEM_KK_ALTCHA_SECRET', 'Ihr-Sehr-Langes-Und-Sicheres-Crypto-Secret',  '6', '1', now())");
    xtc_db_query("INSERT INTO " . TABLE_CONFIGURATION . " (configuration_key, configuration_value, configuration_group_id, sort_order, set_function, date_added) VALUES ('MODULE_SYSTEM_KK_ALTCHA_VERIFICATION_TRIGGER', 'off',  '6', '1', 'xtc_cfg_select_option(array(\'off\', \'onfocus\', \'onload\', \'onsubmit\'), ', now())");
    xtc_db_query("INSERT INTO " . TABLE_CONFIGURATION . " (configuration_key, configuration_value,  configuration_group_id, sort_order, date_added) values ('MODULE_SYSTEM_KK_ALTCHA_MIN_VERIFICATION_TIME', '1000',  '6', '1', now())");
    xtc_db_query("INSERT INTO " . TABLE_CONFIGURATION . " (configuration_key, configuration_value, configuration_group_id, sort_order, set_function, date_added) VALUES ('MODULE_SYSTEM_KK_ALTCHA_LAYOUT_MODE', 'standard',  '6', '1', 'xtc_cfg_select_option(array(\'standard\', \'bar\', \'floating\', \'overlay\', \'invisible\'), ', now())");
    xtc_db_query("INSERT INTO " . TABLE_CONFIGURATION . " (configuration_key, configuration_value, configuration_group_id, sort_order, set_function, date_added) VALUES ('MODULE_SYSTEM_KK_ALTCHA_HIDELOGO', 'false',  '6', '1', 'xtc_cfg_select_option(array(\'true\', \'false\'), ', now())");
    xtc_db_query("INSERT INTO " . TABLE_CONFIGURATION . " (configuration_key, configuration_value, configuration_group_id, sort_order, set_function, date_added) VALUES ('MODULE_SYSTEM_KK_ALTCHA_HIDEFOOTER', 'false',  '6', '1', 'xtc_cfg_select_option(array(\'true\', \'false\'), ', now())");
    xtc_db_query("INSERT INTO " . TABLE_CONFIGURATION . " (configuration_key, configuration_value, configuration_group_id, sort_order, set_function, date_added) VALUES ('MODULE_SYSTEM_KK_ALTCHA_TYPE', 'checkbox',  '6', '1', 'xtc_cfg_select_option(array(\'checkbox\', \'native\', \'switch\'), ', now())");
    xtc_db_query("INSERT INTO " . TABLE_CONFIGURATION . " (configuration_key, configuration_value, configuration_group_id, sort_order, set_function, date_added) VALUES ('MODULE_SYSTEM_KK_ALTCHA_THEME', 'default',  '6', '1', 'xtc_cfg_select_option(array(\'default\', \'aqua\', \'business\', \'caramel\', \'cupcake\', \'cyberpunk\', \'lime\', \'wireframe\'), ', now())");
    xtc_db_query("INSERT INTO " . TABLE_CONFIGURATION . " (configuration_key, configuration_value, configuration_group_id, sort_order, set_function, date_added) VALUES ('MODULE_SYSTEM_KK_ALTCHA_FORMFIELD_TEXT', '',  '6', '1', 'xtc_cfg_input_email_language;MODULE_SYSTEM_KK_ALTCHA_FORMFIELD_TEXT', now())");

    xtc_db_query("UPDATE " . TABLE_CONFIGURATION . " SET configuration_value = 'kk_altcha_captcha' WHERE configuration_key = 'CAPTCHA_MOD_CLASS'");
  }

  public function update() {}

  public function remove()
  {
    xtc_db_query("DELETE FROM " . TABLE_CONFIGURATION . " WHERE configuration_key in ('" . implode("', '", $this->keys()) . "')");

    xtc_db_query("UPDATE " . TABLE_CONFIGURATION . " SET configuration_value = 'modified_captcha' WHERE configuration_key = 'CAPTCHA_MOD_CLASS'");
  }

  public function custom()
  {
    global $messageStack;

    // Systemmodule deinstallieren
    $this->remove();

    // Dateien definieren
    $dirs_and_files = $this->fileList();

    // Dateien löschen
    foreach ($dirs_and_files as $dir_or_file) {
      if (!$this->rrmdir($dir_or_file)) {
        $messageStack->add_session($dir_or_file . MODULE_SYSTEM_KK_ALTCHA_DELETE_ERR, 'error');
      }
    }
    // Datei selbst löschen
    unlink(DIR_FS_CATALOG . DIR_ADMIN . 'includes/modules/system/kk_altcha_captcha.php');
    $messageStack->add_session($this->title, 'success');
    xtc_redirect(xtc_href_link(FILENAME_MODULE_EXPORT, 'set=system'));
  }

  public function keys()
  {
    $key = array(
      'MODULE_SYSTEM_KK_ALTCHA_STATUS',
      'MODULE_SYSTEM_KK_ALTCHA_ALGORITHM',
      'MODULE_SYSTEM_KK_ALTCHA_SECRET',
      'MODULE_SYSTEM_KK_ALTCHA_VERIFICATION_TRIGGER',
      'MODULE_SYSTEM_KK_ALTCHA_MIN_VERIFICATION_TIME',
      'MODULE_SYSTEM_KK_ALTCHA_LAYOUT_MODE',
      'MODULE_SYSTEM_KK_ALTCHA_HIDELOGO',
      'MODULE_SYSTEM_KK_ALTCHA_HIDEFOOTER',
      'MODULE_SYSTEM_KK_ALTCHA_TYPE',
      'MODULE_SYSTEM_KK_ALTCHA_THEME',
      'MODULE_SYSTEM_KK_ALTCHA_FORMFIELD_TEXT'
    );

    return $key;
  }

  protected function fileList()
  {
    // Dateien definieren
    $shop_path = DIR_FS_CATALOG;
    $dirs_and_files = array();

    // includes
    $dirs_and_files[] = $shop_path . 'includes/external/kk_altcha';
    $dirs_and_files[] = $shop_path . 'includes/extra/ajax/kk_altcha.php';
    $dirs_and_files[] = $shop_path . 'includes/extra/captcha/kk_altcha.php';
    // lang
    $dirs_and_files[] = $shop_path . 'lang/english/extra/admin/kk_altcha_captcha.php';
    $dirs_and_files[] = $shop_path . 'lang/english/modules/system/kk_altcha_captcha.php';
    $dirs_and_files[] = $shop_path . 'lang/german/extra/admin/kk_altcha_captcha.php';
    $dirs_and_files[] = $shop_path . 'lang/german/modules/system/kk_altcha_captcha.php';
    // Templateverzeichnis
    $dirs_and_files[] = $shop_path . 'templates/' . CURRENT_TEMPLATE . '/altcha/javascript/altcha.min.js';
    $dirs_and_files[] = $shop_path . 'templates/' . CURRENT_TEMPLATE . '/altcha';

    return $dirs_and_files;
  }

  protected function rrmdir(string $dir)
  {
    if (is_dir($dir)) {
      $objects = scandir($dir);
      foreach ($objects as $object) {
        if ($object != "." && $object != "..") {
          if (filetype($dir . "/" . $object) == "dir") $this->rrmdir($dir . "/" . $object);
          else unlink($dir . "/" . $object);
        }
      }
      reset($objects);
      rmdir($dir);
      return true;
    } elseif (is_file($dir)) {
      unlink($dir);
      return true;
    }
  }
}
