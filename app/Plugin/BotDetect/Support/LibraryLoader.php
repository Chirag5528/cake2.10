<?php

final class BDCAKE_LibraryLoader {

    /**
     * Disable instance creation.
     */
    private function __construct() {}

    /**
     * The the BotDetect CAPTCHA Library and override captcha library settings.
     *
     * @return void
     */
    public static function load() {
        // load bd php library
        self::loadBotDetectLibrary();

        // load the captcha configuration defaults
        self::loadCaptchaConfigDefaults();
    }

    /**
     * Load BotDetect CAPTCHA Library.
     *
     * @return void
     */
    private static function loadBotDetectLibrary() {
        // determine the bd library location and define a constant for the path to the library
        self::determineLibraryLocation();
        self::includeFile(BDCAKE_PLUGIN_PATH . 'Provider' . DS . 'botdetect.php', true);
    }

    /**
     * Load the captcha configuration defaults.
     *
     * @return void
     */
    private static function loadCaptchaConfigDefaults()
    {
        self::includeFile(BDCAKE_PLUGIN_PATH . 'Support' . DS . 'CaptchaConfigDefaults.php', true);
    }

    /**
     * Define a constant for the path to the bd library.
     * 
     * @param string $path
     * @return void
     */
    private static function defineLibraryPath($path) {
        if (!defined('BDCLIB_PATH')) {
            define('BDCLIB_PATH', dirname($path) . DS . 'botdetect/');    
        }
    }

    /**
     * Determine the bd library location and define a constant for the path to the bd library.
     * 
     * @return void
     */
    private static function determineLibraryLocation() {
        // Path to BotDetect shared library
        $outerLib_1 = realpath(ROOT . '/../botdetect-captcha-lib/botdetect.php'); 
        $outerLib_2 = realpath(ROOT . '/../lib/botdetect.php'); 

        // MYWEBROOT/lib
        $innerRootDirLib_1 = ROOT . '/botdetect-captcha-lib/botdetect.php'; 
        $innerRootDirLib_2 = ROOT . '/lib/botdetect.php'; 

        // MYWEBROOT/app/Lib/
        $innerAppDirLib = APP . 'Lib/botdetect.php'; 

        if (is_readable($outerLib_1)) {
            self::defineLibraryPath($outerLib_1);
        } else if (is_readable($outerLib_2)) {
            self::defineLibraryPath($outerLib_2);
        } else if (is_readable($innerAppDirLib)) {
            self::defineLibraryPath($innerAppDirLib);
        } else if (is_readable($innerRootDirLib_1)) {
            self::defineLibraryPath($innerRootDirLib_1);
        } else if (is_readable($innerRootDirLib_2)) {
            self::defineLibraryPath($innerRootDirLib_2);
        } else {
            // show an error message if user does not yet included lib
            self::showErrorLibraryIncludeMessage();
        }
    }

    /**
     * Show an error message if user does not yet include the BD libarry into the lib/ folder.
     */
    private static function showErrorLibraryIncludeMessage() {
        $destinationPath = APP . 'Lib';
        echo 'You have downloaded our CakePHP sample, but you are missing BotDetect Captcha library which comes as a separate download. To resolve the issue:

            <br><br>1) Download BotDetect PHP CAPTCHA Library from here: <a href="https://captcha.com/captcha-download.html?version=php&amp;utm_source=installation&amp;utm_medium=php&amp;utm_campaign=CakePHP">https://captcha.com/captcha-download.html?version=php</a>

            <br><br>2) Copy (all contents of the directory)
            <br>from: &lt;BDLIB&gt;/botdetect-captcha-lib
            <br>to: ' . $destinationPath . '
            <br><i>* where &lt;BDLIB&gt; stands for the downloaded and extracted contents of the BotDetect PHP Captcha library</i>

            <br><br>Here is where you can find more details: <a href="https://captcha.com/doc/php/howto/cakephp-captcha.html?utm_source=installation&amp;utm_medium=php&amp;utm_campaign=CakePHP">https://captcha.com/doc/php/howto/cakephp-captcha.html</a>
            <br>';
        die;
    }

    /**
     * Include a file.
     *
     * @param string  $filePath
     * @param bool    $once
     * @param mix     $includeData
     * @return void
     */
    private static function includeFile($filePath, $once = false, $includeData = null) {
        if (is_file($filePath)) {
            $once ? include_once($filePath) : include($filePath);
        }
    }
}
