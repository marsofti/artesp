<?php
/* * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
 *                                   ATTENTION!
 * If you see this message in your browser (Internet Explorer, Mozilla Firefox, Google Chrome, etc.)
 * this means that PHP is not properly installed on your web server. Please refer to the PHP manual
 * for more details: http://php.net/manual/install.php
 *
 * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
 */

include_once dirname(__FILE__) . '/components/startup.php';
include_once dirname(__FILE__) . '/components/page/login_page.php';
include_once dirname(__FILE__) . '/authorization.php';
include_once dirname(__FILE__) . '/database_engine/mysql_engine.php';
include_once dirname(__FILE__) . '/components/security/user_identity_storage/user_identity_session_storage.php';

function GetConnectionOptions() {
    $result = GetGlobalConnectionOptions();
    $result['client_encoding'] = 'utf8';
    return $result;
}

function OnAfterLogin($userName, EngConnection $connection, &$canLogin, &$errorMessage) {
    $ip = $_SERVER['REMOTE_ADDR']; 
        $logado = 'entrou_no_sistema';
        $connection->ExecSQL("INSERT INTO tbl_auditoria(operador, data, acao, ip_address) 
                
        VALUES ('$userName', CURRENT_TIMESTAMP, '$logado', '$ip' ) ");
}

function OnAfterFailedLoginAttempt($userName, EngConnection $connection, &$errorMessage) {

}

function OnBeforeLogout($userName, EngConnection $connection) {
    $ip = $_SERVER['REMOTE_ADDR']; 
        $logado = 'saiu_do_sistema';
        $connection->ExecSQL("INSERT INTO tbl_auditoria(operador, data, acao, ip_address) 
                
        VALUES ('$userName', CURRENT_TIMESTAMP, '$logado', '$ip' ) ");
}

SetUpUserAuthorization();

$page = new LoginPage(
    'tbl_usuarios_concessionarias01.php',
    dirname(__FILE__),
    GetApplication()->GetUserAuthentication(),
    MyPDOConnectionFactory::getInstance(),
    Captions::getInstance('UTF-8'),
    GetReCaptcha('login'),
    ''
);


$page->OnAfterLogin->AddListener('OnAfterLogin');
$page->OnAfterFailedLoginAttempt->AddListener('OnAfterFailedLoginAttempt');
$page->OnBeforeLogout->AddListener('OnBeforeLogout');
$page->BeginRender();
$page->EndRender();
