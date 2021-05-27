<?php

include_once dirname(__FILE__) . '/' . 'phpgen_settings.php';
include_once dirname(__FILE__) . '/' . 'components/application.php';
include_once dirname(__FILE__) . '/' . 'components/security/permission_set.php';
include_once dirname(__FILE__) . '/' . 'components/security/user_authentication/table_based_user_authentication.php';
include_once dirname(__FILE__) . '/' . 'components/security/grant_manager/table_based_user_grant_manager.php';
include_once dirname(__FILE__) . '/' . 'components/security/table_based_user_manager.php';
include_once dirname(__FILE__) . '/' . 'components/security/user_identity_storage/user_identity_session_storage.php';
include_once dirname(__FILE__) . '/' . 'components/security/recaptcha.php';
include_once dirname(__FILE__) . '/' . 'database_engine/mysql_engine.php';



$dataSourceRecordPermissions = array();

$tableCaptions = array('tbl_usuarios_concessionarias01' => 'IGG CONCESSIONÁRIA',
'tbl_usuarios_concessionarias01.tbl_ano_contratual' => 'IGG CONCESSIONÁRIA->ANO IGG',
'tbl_usuarios_concessionarias01.tbl_ano_contratual.monitoramento_igg' => 'IGG CONCESSIONÁRIA->ANO IGG->MONITORAMENTO IGG',
'tbl_usuarios_concessionarias03' => 'IGG CONCESSIONÁRIA GERAL',
'tbl_usuarios_concessionarias03.tbl_ano_contratual' => 'IGG CONCESSIONÁRIA GERAL->ANO IGG',
'tbl_usuarios_concessionarias03.tbl_ano_contratual.monitoramento_igg' => 'IGG CONCESSIONÁRIA GERAL->ANO IGG->MONITORAMENTO IGG',
'tbl_concessionarias' => 'CONCESSIONÁRIAS',
'tbl_concessionarias.tbl_rodovias' => 'CONCESSIONÁRIAS->RODOVIAS',
'tbl_concessionarias.tbl_rodovias.tbl_geo_estacakmi' => 'CONCESSIONÁRIAS->RODOVIAS->MALHA VIÁRIA',
'ano_contratual' => 'Ano Contratual',
'tbl_usuarios' => 'CADASTRO DE USUÁRIOS',
'tbl_usuarios.tbl_role_membership' => 'CADASTRO DE USUÁRIOS->REGRAS DE ASSOCIAÇÃO USUARIO',
'tbl_usuarios.tbl_usuarios_concessionarias' => 'CADASTRO DE USUÁRIOS->ASSOCIAÇÃO USUÁRIO CONCESSIONÁRIA',
'tbl_usuarios.tbl_usuarios_eafs' => 'CADASTRO DE USUÁRIOS->ASSOCIAÇÃO USUÁRIO FISCALIZADORA',
'tbl_concessionarias01' => 'IGG',
'tbl_concessionarias01.tbl_monitoramento' => 'IGG->MONITORAMENTO IGG',
'tbl_concessionarias01.tbl_rodovias' => 'IGG->RODOVIAS',
'tbl_concessionarias01.tbl_rodovias.tbl_geo_estacakmi' => 'IGG->RODOVIAS->MALHA VIÁRIA',
'monitoramento_igg' => 'Monitoramento Igg',
'tbl_usuarios_concessionarias' => 'OLD_IGG CONCESSIONÁRIA',
'tbl_usuarios_concessionarias.tbl_monitoramento' => 'OLD_IGG CONCESSIONÁRIA->MONITORAMENTO IGG',
'tbl_usuarios_concessionarias.tbl_rodovias' => 'OLD_IGG CONCESSIONÁRIA->Tbl Rodovias',
'tbl_roles' => 'REGRAS DE ACESSO',
'tbl_roles.tbl_role_membership' => 'REGRAS DE ACESSO->ASSOCIAR USUARIOS',
'tbl_roles.tbl_role_permissions' => 'REGRAS DE ACESSO->PERMITIR AÇÕES',
'tbl_usuarios_concessionarias02' => 'old08042021IGG CONCESSIONÁRIA',
'tbl_usuarios_concessionarias02.tbl_monitoramento' => 'old08042021IGG CONCESSIONÁRIA->MONITORAMENTO IGG',
'tbl_usuarios_concessionarias02.tbl_ano_contratual' => 'old08042021IGG CONCESSIONÁRIA->ANO IGG',
'tbl_usuarios_concessionarias02.tbl_ano_contratual.tbl_monitoramento' => 'old08042021IGG CONCESSIONÁRIA->ANO IGG->MONITORAMENTO IGG');

$usersTableInfo = array(
    'TableName' => 'tbl_usuarios',
    'UserId' => 'idUsuario',
    'UserName' => 'Usuario',
    'Password' => 'Senha',
    'Email' => '',
    'UserToken' => '',
    'UserStatus' => ''
);

function EncryptPassword($password, &$result)
{

}

function VerifyPassword($enteredPassword, $encryptedPassword, &$result)
{

}

function BeforeUserRegistration($userName, $email, $password, &$allowRegistration, &$errorMessage)
{

}    

function AfterUserRegistration($userName, $email)
{

}    

function PasswordResetRequest($userName, $email)
{

}

function PasswordResetComplete($userName, $email)
{

}

function VerifyPasswordStrength($password, &$result, &$passwordRuleMessage) 
{

}

function CreatePasswordHasher()
{
    $hasher = CreateHasher('');
    if ($hasher instanceof CustomStringHasher) {
        $hasher->OnEncryptPassword->AddListener('EncryptPassword');
        $hasher->OnVerifyPassword->AddListener('VerifyPassword');
    }
    return $hasher;
}

function CreateGrantManager() 
{
    global $tableCaptions;
    global $usersTableInfo;
    
    $userPermsTableInfo = array('TableName' => 'tbl_permissao_concessionaria', 'UserId' => 'idUsuario', 'PageName' => 'page_name', 'Grant' => 'perm_name');
    
    return new TableBasedUserGrantManager(MyPDOConnectionFactory::getInstance(), GetGlobalConnectionOptions(),
        $usersTableInfo, $userPermsTableInfo, $tableCaptions, false);
}

function CreateTableBasedUserManager() 
{
    global $usersTableInfo;

    $userManager = new TableBasedUserManager(MyPDOConnectionFactory::getInstance(), GetGlobalConnectionOptions(), 
        $usersTableInfo, CreatePasswordHasher(), false);
    $userManager->OnVerifyPasswordStrength->AddListener('VerifyPasswordStrength');

    return $userManager;
}

function GetReCaptcha($formId) 
{
    return null;
}

function SetUpUserAuthorization() 
{
    global $dataSourceRecordPermissions;

    $hasher = CreatePasswordHasher();

    $grantManager = CreateGrantManager();

    $userAuthentication = new TableBasedUserAuthentication(new UserIdentitySessionStorage(), false, $hasher, CreateTableBasedUserManager(), false, false, false);

    GetApplication()->SetUserAuthentication($userAuthentication);
    GetApplication()->SetUserGrantManager($grantManager);
    GetApplication()->SetDataSourceRecordPermissionRetrieveStrategy(new HardCodedDataSourceRecordPermissionRetrieveStrategy($dataSourceRecordPermissions));
}
