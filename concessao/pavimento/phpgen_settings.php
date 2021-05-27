<?php

//  define('SHOW_VARIABLES', 1);
//  define('DEBUG_LEVEL', 1);

error_reporting(E_ALL ^ E_NOTICE);
ini_set('display_errors', 'On');

set_include_path('.' . PATH_SEPARATOR . get_include_path());


include_once dirname(__FILE__) . '/' . 'components/utils/system_utils.php';
include_once dirname(__FILE__) . '/' . 'components/mail/mailer.php';
include_once dirname(__FILE__) . '/' . 'components/mail/phpmailer_based_mailer.php';
require_once dirname(__FILE__) . '/' . 'database_engine/mysql_engine.php';

//  SystemUtils::DisableMagicQuotesRuntime();

SystemUtils::SetTimeZoneIfNeed('America/Argentina/Buenos_Aires');

function GetGlobalConnectionOptions()
{
    return
        array(
          'server' => 'localhost',
          'port' => '3306',
          'username' => 'root',
          'password' => 'm4x362',
          'database' => 'conspin',
          'client_encoding' => 'utf8'
        );
}

function HasAdminPage()
{
    return true;
}

function HasHomePage()
{
    return true;
}

function GetHomeURL()
{
    return 'index.php';
}

function GetHomePageBanner()
{
    return '';
}

function GetPageGroups()
{
    $result = array();
    $result[] = array('caption' => 'Default', 'description' => '');
    $result[] = array('caption' => 'CADASTRO', 'description' => '');
    $result[] = array('caption' => 'PAVIMENTO', 'description' => '');
    $result[] = array('caption' => 'ADMINISTRAÇÃO', 'description' => '');
    return $result;
}

function GetPageInfos()
{
    $result = array();
    $result[] = array('caption' => 'IGG CONCESSIONÁRIA', 'short_caption' => 'IGG CONCESSIONÁRIA', 'filename' => 'tbl_usuarios_concessionarias01.php', 'name' => 'tbl_usuarios_concessionarias01', 'group_name' => 'PAVIMENTO', 'add_separator' => true, 'description' => '');
    $result[] = array('caption' => 'IGG CONCESSIONÁRIA GERAL', 'short_caption' => 'IGG CONCESSIONÁRIA GERAL', 'filename' => 'tbl_usuarios_concessionarias0102.php', 'name' => 'tbl_usuarios_concessionarias03', 'group_name' => 'PAVIMENTO', 'add_separator' => false, 'description' => '');
    $result[] = array('caption' => 'CONCESSIONÁRIAS', 'short_caption' => 'CADASTRO CONCESSIONÁRIAS', 'filename' => 'tbl_concessionarias.php', 'name' => 'tbl_concessionarias', 'group_name' => 'CADASTRO', 'add_separator' => true, 'description' => '');
    $result[] = array('caption' => 'Ano Contratual', 'short_caption' => 'Ano Contratual', 'filename' => 'ano_contratual.php', 'name' => 'ano_contratual', 'group_name' => 'Default', 'add_separator' => false, 'description' => '');
    $result[] = array('caption' => 'CADASTRO DE USUÁRIOS', 'short_caption' => 'CADASTRO DE USUÁRIOS', 'filename' => 'tbl_usuarios.php', 'name' => 'tbl_usuarios', 'group_name' => 'ADMINISTRAÇÃO', 'add_separator' => true, 'description' => '');
    $result[] = array('caption' => 'Monitoramento Igg', 'short_caption' => 'Monitoramento Igg', 'filename' => 'monitoramento_igg.php', 'name' => 'monitoramento_igg', 'group_name' => 'Default', 'add_separator' => false, 'description' => '');
    $result[] = array('caption' => 'REGRAS DE ACESSO', 'short_caption' => 'REGRAS DE ACESSO', 'filename' => 'tbl_roles.php', 'name' => 'tbl_roles', 'group_name' => 'ADMINISTRAÇÃO', 'add_separator' => true, 'description' => '');
    return $result;
}

function GetPagesHeader()
{
    return
        '<style type="text/css">
body p {
	font-family: Arial, Helvetica, sans-serif;
}
body p {
	font-size: 9px;
}
body p {
	color: #CCC;
	font-weight: bold;
}
</style>
<div id="versao">
  
                          <p><b>PMClient</b> <br>ARTESP
                            Módulo Concessionárias - Pavimento<br>v20505-12022021-beta rc04.3.2021	</p>
                        
</div><br><div></div>';
}

function GetPagesFooter()
{
    return
        '<style type="text/css">
	footer {
  clear:both;
  border-top: solid 3px #CC0033;
  
  font-size:0.9em;
  font-family:tahoma;
}
copyright {
  width:280px; float:left;
  color:#FFF;
  padding:10px 0 10px 20px;
  background:#1E6FB7 left bottom no-repeat;
  contact a {color:#FFF;}
	</style>
	<div id="footer">
        <div id="copyright">&copy; 2018&ndash;2021 PLANSERVI ENGENHARIA</div>
	<div id="contact"><a href="#" rel="nofollow">Contato: pmclient@planservi.com.br</a> | <a href="#" rel="nofollow">EQUIPE DE DESENVOLVIMENTO</a></div>
	</div>';
}

function ApplyCommonPageSettings(Page $page, Grid $grid)
{
    $page->SetShowUserAuthBar(true);
    $page->setShowNavigation(true);
    $page->OnGetCustomExportOptions->AddListener('Global_OnGetCustomExportOptions');
    $page->getDataset()->OnGetFieldValue->AddListener('Global_OnGetFieldValue');
    $page->getDataset()->OnGetFieldValue->AddListener('OnGetFieldValue', $page);
    $grid->BeforeUpdateRecord->AddListener('Global_BeforeUpdateHandler');
    $grid->BeforeDeleteRecord->AddListener('Global_BeforeDeleteHandler');
    $grid->BeforeInsertRecord->AddListener('Global_BeforeInsertHandler');
    $grid->AfterUpdateRecord->AddListener('Global_AfterUpdateHandler');
    $grid->AfterDeleteRecord->AddListener('Global_AfterDeleteHandler');
    $grid->AfterInsertRecord->AddListener('Global_AfterInsertHandler');
}

function GetAnsiEncoding() { return 'windows-1252'; }

function Global_AddEnvironmentVariablesHandler(&$variables)
{

}

function Global_CustomHTMLHeaderHandler($page, &$customHtmlHeaderText)
{

}

function Global_GetCustomTemplateHandler($type, $part, $mode, &$result, &$params, CommonPage $page = null)
{

}

function Global_OnGetCustomExportOptions($page, $exportType, $rowData, &$options)
{

}

function Global_OnGetFieldValue($fieldName, &$value, $tableName)
{

}

function Global_GetCustomPageList(CommonPage $page, PageList $pageList)
{

}

function Global_BeforeInsertHandler($page, &$rowData, $tableName, &$cancel, &$message, &$messageDisplayTime)
{

}

function Global_BeforeUpdateHandler($page, $oldRowData, &$rowData, $tableName, &$cancel, &$message, &$messageDisplayTime)
{

}

function Global_BeforeDeleteHandler($page, &$rowData, $tableName, &$cancel, &$message, &$messageDisplayTime)
{

}

function Global_AfterInsertHandler($page, $rowData, $tableName, &$success, &$message, &$messageDisplayTime)
{
    if ($success) {
    
        $message = 'Registro processado com sucesso.';
        $messageDisplayTime = 3;
    
    }
    
    else {
    
        $message = '<p>Aconteceu algo de errado. ' .
    
            '<a class="alert-link" href="mailto:marsofti@hotmail.com">' .
    
            'Contate os desenvolvedores</a> para mais informações.</p>';
    
    }
}

function Global_AfterUpdateHandler($page, $oldRowData, $rowData, $tableName, &$success, &$message, &$messageDisplayTime)
{
    if ($success) {
    
        $message = 'Registro alualizado com sucesso.';
        $messageDisplayTime = 3;
    
    }
    
    else {
    
        $message = '<p>Algo de errado aconteceu. ' .
    
            '<a class="alert-link" href="mailto:marsofti@hotmail.com">' .
    
            'Entre em contato com desenvolvedores</a> para obter mais informações.</p>';
    
    }
}

function Global_AfterDeleteHandler($page, $rowData, $tableName, &$success, &$message, &$messageDisplayTime)
{
    if ($success) {
    
        $message = 'Registro excluído com sucesso.';
        $messageDisplayTime = 3;
    
    }
    
    else {
    
        $message = '<p>Algo de errado aconteceu. ' .
    
            '<a class="alert-link" href="mailto:marsofti@hotmail.com">' .
    
            'Entre em contato com desenvolvedores</a> para obter mais informações.</p>';
    
    }
}

function GetDefaultDateFormat()
{
    return 'd-m-Y';
}

function GetFirstDayOfWeek()
{
    return 0;
}

function GetPageListType()
{
    return PageList::TYPE_MENU;
}

function GetNullLabel()
{
    return '-';
}

function UseMinifiedJS()
{
    return true;
}

function GetOfflineMode()
{
    return false;
}

function GetInactivityTimeout()
{
    return 2400;
}

function GetMailer()
{
    $mailerOptions = new MailerOptions(MailerType::Sendmail, '', '');
    
    return PHPMailerBasedMailer::getInstance($mailerOptions);
}

function sendMailMessage($recipients, $messageSubject, $messageBody, $attachments = '', $cc = '', $bcc = '')
{
    GetMailer()->send($recipients, $messageSubject, $messageBody, $attachments, $cc, $bcc);
}

function createConnection()
{
    $connectionOptions = GetGlobalConnectionOptions();
    $connectionOptions['client_encoding'] = 'utf8';

    $connectionFactory = MyPDOConnectionFactory::getInstance();
    return $connectionFactory->CreateConnection($connectionOptions);
}

/**
 * @param string $pageName
 * @return IPermissionSet
 */
function GetCurrentUserPermissionsForPage($pageName) 
{
    return GetApplication()->GetCurrentUserPermissionSet($pageName);
}
