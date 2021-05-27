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
    include_once dirname(__FILE__) . '/components/application.php';
    include_once dirname(__FILE__) . '/' . 'authorization.php';


    include_once dirname(__FILE__) . '/' . 'database_engine/mysql_engine.php';
    include_once dirname(__FILE__) . '/' . 'components/page/page_includes.php';

    function GetConnectionOptions()
    {
        $result = GetGlobalConnectionOptions();
        $result['client_encoding'] = 'utf8';
        GetApplication()->GetUserAuthentication()->applyIdentityToConnectionOptions($result);
        return $result;
    }

    
    
    
    
    // OnBeforePageExecute event handler
    
    
    
    class tbl_usuarios_tbl_role_membershipPage extends DetailPage
    {
        protected function DoBeforeCreate()
        {
            $this->SetTitle('REGRAS DE ASSOCIAÇÃO USUARIO');
            $this->SetMenuLabel('REGRAS DE ASSOCIAÇÃO USUARIO');
    
            $this->dataset = new TableDataset(
                MyPDOConnectionFactory::getInstance(),
                GetConnectionOptions(),
                '`tbl_role_membership`');
            $this->dataset->addFields(
                array(
                    new IntegerField('role_id', true, true),
                    new IntegerField('idUsuario', true, true)
                )
            );
            $this->dataset->AddLookupField('role_id', 'tbl_roles', new IntegerField('id'), new StringField('role_name', false, false, false, false, 'role_id_role_name', 'role_id_role_name_tbl_roles'), 'role_id_role_name_tbl_roles');
            $this->dataset->AddLookupField('idUsuario', 'tbl_usuarios', new IntegerField('idUsuario'), new StringField('Nome Operador', false, false, false, false, 'idUsuario_Nome Operador', 'idUsuario_Nome Operador_tbl_usuarios'), 'idUsuario_Nome Operador_tbl_usuarios');
        }
    
        protected function DoPrepare() {
    
        }
    
        protected function CreatePageNavigator()
        {
            $result = new CompositePageNavigator($this);
            
            $partitionNavigator = new PageNavigator('pnav', $this, $this->dataset);
            $partitionNavigator->SetRowsPerPage(40);
            $result->AddPageNavigator($partitionNavigator);
            
            return $result;
        }
    
        protected function CreateRssGenerator()
        {
            return null;
        }
    
        protected function setupCharts()
        {
    
        }
    
        protected function getFiltersColumns()
        {
            return array(
                new FilterColumn($this->dataset, 'role_id', 'role_id_role_name', 'Regra'),
                new FilterColumn($this->dataset, 'idUsuario', 'idUsuario_Nome Operador', 'Usuário')
            );
        }
    
        protected function setupQuickFilter(QuickFilter $quickFilter, FixedKeysArray $columns)
        {
            $quickFilter
                ->addColumn($columns['role_id'])
                ->addColumn($columns['idUsuario']);
        }
    
        protected function setupColumnFilter(ColumnFilter $columnFilter)
        {
            $columnFilter
                ->setOptionsFor('idUsuario');
        }
    
        protected function setupFilterBuilder(FilterBuilder $filterBuilder, FixedKeysArray $columns)
        {
            $main_editor = new DynamicCombobox('role_id_edit', $this->CreateLinkBuilder());
            $main_editor->setAllowClear(true);
            $main_editor->setMinimumInputLength(0);
            $main_editor->SetAllowNullValue(false);
            $main_editor->SetHandlerName('filter_builder_tbl_usuarios_tbl_role_membership_role_id_search');
            
            $multi_value_select_editor = new RemoteMultiValueSelect('role_id', $this->CreateLinkBuilder());
            $multi_value_select_editor->SetHandlerName('filter_builder_tbl_usuarios_tbl_role_membership_role_id_search');
            
            $text_editor = new TextEdit('role_id');
            
            $filterBuilder->addColumn(
                $columns['role_id'],
                array(
                    FilterConditionOperator::EQUALS => $main_editor,
                    FilterConditionOperator::DOES_NOT_EQUAL => $main_editor,
                    FilterConditionOperator::IS_GREATER_THAN => $main_editor,
                    FilterConditionOperator::IS_GREATER_THAN_OR_EQUAL_TO => $main_editor,
                    FilterConditionOperator::IS_LESS_THAN => $main_editor,
                    FilterConditionOperator::IS_LESS_THAN_OR_EQUAL_TO => $main_editor,
                    FilterConditionOperator::IS_BETWEEN => $main_editor,
                    FilterConditionOperator::IS_NOT_BETWEEN => $main_editor,
                    FilterConditionOperator::CONTAINS => $text_editor,
                    FilterConditionOperator::DOES_NOT_CONTAIN => $text_editor,
                    FilterConditionOperator::BEGINS_WITH => $text_editor,
                    FilterConditionOperator::ENDS_WITH => $text_editor,
                    FilterConditionOperator::IS_LIKE => $text_editor,
                    FilterConditionOperator::IS_NOT_LIKE => $text_editor,
                    FilterConditionOperator::IN => $multi_value_select_editor,
                    FilterConditionOperator::NOT_IN => $multi_value_select_editor,
                    FilterConditionOperator::IS_BLANK => null,
                    FilterConditionOperator::IS_NOT_BLANK => null
                )
            );
            
            $main_editor = new DynamicCombobox('idusuario_edit', $this->CreateLinkBuilder());
            $main_editor->setAllowClear(true);
            $main_editor->setMinimumInputLength(0);
            $main_editor->SetAllowNullValue(false);
            $main_editor->SetHandlerName('filter_builder_tbl_usuarios_tbl_role_membership_idUsuario_search');
            
            $multi_value_select_editor = new RemoteMultiValueSelect('idUsuario', $this->CreateLinkBuilder());
            $multi_value_select_editor->SetHandlerName('filter_builder_tbl_usuarios_tbl_role_membership_idUsuario_search');
            
            $text_editor = new TextEdit('idUsuario');
            
            $filterBuilder->addColumn(
                $columns['idUsuario'],
                array(
                    FilterConditionOperator::EQUALS => $main_editor,
                    FilterConditionOperator::DOES_NOT_EQUAL => $main_editor,
                    FilterConditionOperator::IS_GREATER_THAN => $main_editor,
                    FilterConditionOperator::IS_GREATER_THAN_OR_EQUAL_TO => $main_editor,
                    FilterConditionOperator::IS_LESS_THAN => $main_editor,
                    FilterConditionOperator::IS_LESS_THAN_OR_EQUAL_TO => $main_editor,
                    FilterConditionOperator::IS_BETWEEN => $main_editor,
                    FilterConditionOperator::IS_NOT_BETWEEN => $main_editor,
                    FilterConditionOperator::CONTAINS => $text_editor,
                    FilterConditionOperator::DOES_NOT_CONTAIN => $text_editor,
                    FilterConditionOperator::BEGINS_WITH => $text_editor,
                    FilterConditionOperator::ENDS_WITH => $text_editor,
                    FilterConditionOperator::IS_LIKE => $text_editor,
                    FilterConditionOperator::IS_NOT_LIKE => $text_editor,
                    FilterConditionOperator::IN => $multi_value_select_editor,
                    FilterConditionOperator::NOT_IN => $multi_value_select_editor,
                    FilterConditionOperator::IS_BLANK => null,
                    FilterConditionOperator::IS_NOT_BLANK => null
                )
            );
        }
    
        protected function AddOperationsColumns(Grid $grid)
        {
            $actions = $grid->getActions();
            $actions->setCaption($this->GetLocalizerCaptions()->GetMessageString('Actions'));
            $actions->setPosition(ActionList::POSITION_LEFT);
            
            if ($this->GetSecurityInfo()->HasViewGrant())
            {
                $operation = new LinkOperation($this->GetLocalizerCaptions()->GetMessageString('View'), OPERATION_VIEW, $this->dataset, $grid);
                $operation->setUseImage(true);
                $actions->addOperation($operation);
            }
            
            if ($this->GetSecurityInfo()->HasEditGrant())
            {
                $operation = new LinkOperation($this->GetLocalizerCaptions()->GetMessageString('Edit'), OPERATION_EDIT, $this->dataset, $grid);
                $operation->setUseImage(true);
                $actions->addOperation($operation);
                $operation->OnShow->AddListener('ShowEditButtonHandler', $this);
            }
            
            if ($this->GetSecurityInfo()->HasDeleteGrant())
            {
                $operation = new LinkOperation($this->GetLocalizerCaptions()->GetMessageString('Delete'), OPERATION_DELETE, $this->dataset, $grid);
                $operation->setUseImage(true);
                $actions->addOperation($operation);
                $operation->OnShow->AddListener('ShowDeleteButtonHandler', $this);
                $operation->SetAdditionalAttribute('data-modal-operation', 'delete');
                $operation->SetAdditionalAttribute('data-delete-handler-name', $this->GetModalGridDeleteHandler());
            }
            
            if ($this->GetSecurityInfo()->HasAddGrant())
            {
                $operation = new LinkOperation($this->GetLocalizerCaptions()->GetMessageString('Copy'), OPERATION_COPY, $this->dataset, $grid);
                $operation->setUseImage(true);
                $actions->addOperation($operation);
            }
        }
    
        protected function AddFieldColumns(Grid $grid, $withDetails = true)
        {
            //
            // View column for Nome Operador field
            //
            $column = new TextViewColumn('idUsuario', 'idUsuario_Nome Operador', 'Usuário', $this->dataset);
            $column->SetOrderable(true);
            $column->setMinimalVisibility(ColumnVisibility::PHONE);
            $column->SetDescription('');
            $column->SetFixedWidth(null);
            $grid->AddViewColumn($column);
        }
    
        protected function AddSingleRecordViewColumns(Grid $grid)
        {
            //
            // View column for role_name field
            //
            $column = new TextViewColumn('role_id', 'role_id_role_name', 'Regra', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddSingleRecordViewColumn($column);
            
            //
            // View column for Nome Operador field
            //
            $column = new TextViewColumn('idUsuario', 'idUsuario_Nome Operador', 'Usuário', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddSingleRecordViewColumn($column);
        }
    
        protected function AddEditColumns(Grid $grid)
        {
            //
            // Edit column for role_id field
            //
            $editor = new DynamicCombobox('role_id_edit', $this->CreateLinkBuilder());
            $editor->setAllowClear(true);
            $editor->setMinimumInputLength(0);
            $lookupDataset = new TableDataset(
                MyPDOConnectionFactory::getInstance(),
                GetConnectionOptions(),
                '`tbl_roles`');
            $lookupDataset->addFields(
                array(
                    new IntegerField('id', true, true, true),
                    new StringField('role_name')
                )
            );
            $lookupDataset->setOrderByField('role_name', 'ASC');
            $editColumn = new DynamicLookupEditColumn('Regra', 'role_id', 'role_id_role_name', 'edit_tbl_usuarios_tbl_role_membership_role_id_search', $editor, $this->dataset, $lookupDataset, 'id', 'role_name', '');
            $validator = new RequiredValidator(StringUtils::Format($this->GetLocalizerCaptions()->GetMessageString('RequiredValidationMessage'), $editColumn->GetCaption()));
            $editor->GetValidatorCollection()->AddValidator($validator);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddEditColumn($editColumn);
            
            //
            // Edit column for idUsuario field
            //
            $editor = new DynamicCombobox('idusuario_edit', $this->CreateLinkBuilder());
            $editor->setAllowClear(true);
            $editor->setMinimumInputLength(0);
            $lookupDataset = new TableDataset(
                MyPDOConnectionFactory::getInstance(),
                GetConnectionOptions(),
                '`tbl_usuarios`');
            $lookupDataset->addFields(
                array(
                    new IntegerField('idUsuario', true, true, true),
                    new StringField('Nome Operador', true),
                    new StringField('Usuario', true),
                    new StringField('Senha', true),
                    new StringField('Telefone'),
                    new StringField('Email', true),
                    new IntegerField('AtivoMobile'),
                    new IntegerField('is_head_manager'),
                    new IntegerField('is_blocked'),
                    new IntegerField('id_depto'),
                    new IntegerField('grupo_idgrupo')
                )
            );
            $lookupDataset->setOrderByField('Nome Operador', 'ASC');
            $editColumn = new DynamicLookupEditColumn('Usuário', 'idUsuario', 'idUsuario_Nome Operador', 'edit_tbl_usuarios_tbl_role_membership_idUsuario_search', $editor, $this->dataset, $lookupDataset, 'idUsuario', 'Nome Operador', '');
            $validator = new RequiredValidator(StringUtils::Format($this->GetLocalizerCaptions()->GetMessageString('RequiredValidationMessage'), $editColumn->GetCaption()));
            $editor->GetValidatorCollection()->AddValidator($validator);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddEditColumn($editColumn);
        }
    
        protected function AddMultiEditColumns(Grid $grid)
        {
    
        }
    
        protected function AddInsertColumns(Grid $grid)
        {
            //
            // Edit column for role_id field
            //
            $editor = new DynamicCombobox('role_id_edit', $this->CreateLinkBuilder());
            $editor->setAllowClear(true);
            $editor->setMinimumInputLength(0);
            $lookupDataset = new TableDataset(
                MyPDOConnectionFactory::getInstance(),
                GetConnectionOptions(),
                '`tbl_roles`');
            $lookupDataset->addFields(
                array(
                    new IntegerField('id', true, true, true),
                    new StringField('role_name')
                )
            );
            $lookupDataset->setOrderByField('role_name', 'ASC');
            $editColumn = new DynamicLookupEditColumn('Regra', 'role_id', 'role_id_role_name', 'insert_tbl_usuarios_tbl_role_membership_role_id_search', $editor, $this->dataset, $lookupDataset, 'id', 'role_name', '');
            $validator = new RequiredValidator(StringUtils::Format($this->GetLocalizerCaptions()->GetMessageString('RequiredValidationMessage'), $editColumn->GetCaption()));
            $editor->GetValidatorCollection()->AddValidator($validator);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddInsertColumn($editColumn);
            
            //
            // Edit column for idUsuario field
            //
            $editor = new DynamicCombobox('idusuario_edit', $this->CreateLinkBuilder());
            $editor->setAllowClear(true);
            $editor->setMinimumInputLength(0);
            $lookupDataset = new TableDataset(
                MyPDOConnectionFactory::getInstance(),
                GetConnectionOptions(),
                '`tbl_usuarios`');
            $lookupDataset->addFields(
                array(
                    new IntegerField('idUsuario', true, true, true),
                    new StringField('Nome Operador', true),
                    new StringField('Usuario', true),
                    new StringField('Senha', true),
                    new StringField('Telefone'),
                    new StringField('Email', true),
                    new IntegerField('AtivoMobile'),
                    new IntegerField('is_head_manager'),
                    new IntegerField('is_blocked'),
                    new IntegerField('id_depto'),
                    new IntegerField('grupo_idgrupo')
                )
            );
            $lookupDataset->setOrderByField('Nome Operador', 'ASC');
            $editColumn = new DynamicLookupEditColumn('Usuário', 'idUsuario', 'idUsuario_Nome Operador', 'insert_tbl_usuarios_tbl_role_membership_idUsuario_search', $editor, $this->dataset, $lookupDataset, 'idUsuario', 'Nome Operador', '');
            $validator = new RequiredValidator(StringUtils::Format($this->GetLocalizerCaptions()->GetMessageString('RequiredValidationMessage'), $editColumn->GetCaption()));
            $editor->GetValidatorCollection()->AddValidator($validator);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddInsertColumn($editColumn);
            $grid->SetShowAddButton(true && $this->GetSecurityInfo()->HasAddGrant());
        }
    
        private function AddMultiUploadColumn(Grid $grid)
        {
    
        }
    
        protected function AddPrintColumns(Grid $grid)
        {
            //
            // View column for role_name field
            //
            $column = new TextViewColumn('role_id', 'role_id_role_name', 'Regra', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddPrintColumn($column);
            
            //
            // View column for Nome Operador field
            //
            $column = new TextViewColumn('idUsuario', 'idUsuario_Nome Operador', 'Usuário', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddPrintColumn($column);
        }
    
        protected function AddExportColumns(Grid $grid)
        {
            //
            // View column for role_name field
            //
            $column = new TextViewColumn('role_id', 'role_id_role_name', 'Regra', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddExportColumn($column);
            
            //
            // View column for Nome Operador field
            //
            $column = new TextViewColumn('idUsuario', 'idUsuario_Nome Operador', 'Usuário', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddExportColumn($column);
        }
    
        private function AddCompareColumns(Grid $grid)
        {
            //
            // View column for role_name field
            //
            $column = new TextViewColumn('role_id', 'role_id_role_name', 'Regra', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddCompareColumn($column);
            
            //
            // View column for Nome Operador field
            //
            $column = new TextViewColumn('idUsuario', 'idUsuario_Nome Operador', 'Usuário', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddCompareColumn($column);
        }
    
        private function AddCompareHeaderColumns(Grid $grid)
        {
    
        }
    
        public function GetPageDirection()
        {
            return null;
        }
    
        public function isFilterConditionRequired()
        {
            return false;
        }
    
        protected function ApplyCommonColumnEditProperties(CustomEditColumn $column)
        {
            $column->SetDisplaySetToNullCheckBox(false);
            $column->SetDisplaySetToDefaultCheckBox(false);
    		$column->SetVariableContainer($this->GetColumnVariableContainer());
        }
    
        function GetCustomClientScript()
        {
            return ;
        }
        
        function GetOnPageLoadedClientScript()
        {
            return ;
        }
        protected function GetEnableModalGridDelete() { return true; }
    
        protected function CreateGrid()
        {
            $result = new Grid($this, $this->dataset);
            if ($this->GetSecurityInfo()->HasDeleteGrant())
               $result->SetAllowDeleteSelected(true);
            else
               $result->SetAllowDeleteSelected(false);   
            
            ApplyCommonPageSettings($this, $result);
            
            $result->SetUseImagesForActions(true);
            $result->SetUseFixedHeader(false);
            $result->SetShowLineNumbers(false);
            $result->SetShowKeyColumnsImagesInHeader(false);
            $result->SetViewMode(ViewMode::TABLE);
            $result->setEnableRuntimeCustomization(true);
            $result->setAllowCompare(true);
            $this->AddCompareHeaderColumns($result);
            $this->AddCompareColumns($result);
            $result->setMultiEditAllowed($this->GetSecurityInfo()->HasEditGrant() && true);
            $result->setTableBordered(true);
            $result->setTableCondensed(true);
            
            $result->SetHighlightRowAtHover(true);
            $result->SetWidth('');
            $this->AddOperationsColumns($result);
            $this->AddFieldColumns($result);
            $this->AddSingleRecordViewColumns($result);
            $this->AddEditColumns($result);
            $this->AddMultiEditColumns($result);
            $this->AddInsertColumns($result);
            $this->AddPrintColumns($result);
            $this->AddExportColumns($result);
            $this->AddMultiUploadColumn($result);
    
    
            $this->SetShowPageList(true);
            $this->SetShowTopPageNavigator(true);
            $this->SetShowBottomPageNavigator(true);
            $this->setPrintListAvailable(true);
            $this->setPrintListRecordAvailable(false);
            $this->setPrintOneRecordAvailable(true);
            $this->setAllowPrintSelectedRecords(false);
            $this->setExportListAvailable(array('pdf', 'excel'));
            $this->setExportSelectedRecordsAvailable(array('pdf', 'excel'));
            $this->setExportListRecordAvailable(array());
            $this->setExportOneRecordAvailable(array('pdf', 'excel'));
    
            return $result;
        }
     
        protected function setClientSideEvents(Grid $grid) {
    
        }
    
        protected function doRegisterHandlers() {
            $lookupDataset = new TableDataset(
                MyPDOConnectionFactory::getInstance(),
                GetConnectionOptions(),
                '`tbl_roles`');
            $lookupDataset->addFields(
                array(
                    new IntegerField('id', true, true, true),
                    new StringField('role_name')
                )
            );
            $lookupDataset->setOrderByField('role_name', 'ASC');
            $handler = new DynamicSearchHandler($lookupDataset, $this, 'insert_tbl_usuarios_tbl_role_membership_role_id_search', 'id', 'role_name', null, 20);
            GetApplication()->RegisterHTTPHandler($handler);
            
            $lookupDataset = new TableDataset(
                MyPDOConnectionFactory::getInstance(),
                GetConnectionOptions(),
                '`tbl_usuarios`');
            $lookupDataset->addFields(
                array(
                    new IntegerField('idUsuario', true, true, true),
                    new StringField('Nome Operador', true),
                    new StringField('Usuario', true),
                    new StringField('Senha', true),
                    new StringField('Telefone'),
                    new StringField('Email', true),
                    new IntegerField('AtivoMobile'),
                    new IntegerField('is_head_manager'),
                    new IntegerField('is_blocked'),
                    new IntegerField('id_depto'),
                    new IntegerField('grupo_idgrupo')
                )
            );
            $lookupDataset->setOrderByField('Nome Operador', 'ASC');
            $handler = new DynamicSearchHandler($lookupDataset, $this, 'insert_tbl_usuarios_tbl_role_membership_idUsuario_search', 'idUsuario', 'Nome Operador', null, 20);
            GetApplication()->RegisterHTTPHandler($handler);
            
            $lookupDataset = new TableDataset(
                MyPDOConnectionFactory::getInstance(),
                GetConnectionOptions(),
                '`tbl_roles`');
            $lookupDataset->addFields(
                array(
                    new IntegerField('id', true, true, true),
                    new StringField('role_name')
                )
            );
            $lookupDataset->setOrderByField('role_name', 'ASC');
            $handler = new DynamicSearchHandler($lookupDataset, $this, 'filter_builder_tbl_usuarios_tbl_role_membership_role_id_search', 'id', 'role_name', null, 20);
            GetApplication()->RegisterHTTPHandler($handler);
            
            $lookupDataset = new TableDataset(
                MyPDOConnectionFactory::getInstance(),
                GetConnectionOptions(),
                '`tbl_usuarios`');
            $lookupDataset->addFields(
                array(
                    new IntegerField('idUsuario', true, true, true),
                    new StringField('Nome Operador', true),
                    new StringField('Usuario', true),
                    new StringField('Senha', true),
                    new StringField('Telefone'),
                    new StringField('Email', true),
                    new IntegerField('AtivoMobile'),
                    new IntegerField('is_head_manager'),
                    new IntegerField('is_blocked'),
                    new IntegerField('id_depto'),
                    new IntegerField('grupo_idgrupo')
                )
            );
            $lookupDataset->setOrderByField('Nome Operador', 'ASC');
            $handler = new DynamicSearchHandler($lookupDataset, $this, 'filter_builder_tbl_usuarios_tbl_role_membership_idUsuario_search', 'idUsuario', 'Nome Operador', null, 20);
            GetApplication()->RegisterHTTPHandler($handler);
            
            $lookupDataset = new TableDataset(
                MyPDOConnectionFactory::getInstance(),
                GetConnectionOptions(),
                '`tbl_roles`');
            $lookupDataset->addFields(
                array(
                    new IntegerField('id', true, true, true),
                    new StringField('role_name')
                )
            );
            $lookupDataset->setOrderByField('role_name', 'ASC');
            $handler = new DynamicSearchHandler($lookupDataset, $this, 'edit_tbl_usuarios_tbl_role_membership_role_id_search', 'id', 'role_name', null, 20);
            GetApplication()->RegisterHTTPHandler($handler);
            
            $lookupDataset = new TableDataset(
                MyPDOConnectionFactory::getInstance(),
                GetConnectionOptions(),
                '`tbl_usuarios`');
            $lookupDataset->addFields(
                array(
                    new IntegerField('idUsuario', true, true, true),
                    new StringField('Nome Operador', true),
                    new StringField('Usuario', true),
                    new StringField('Senha', true),
                    new StringField('Telefone'),
                    new StringField('Email', true),
                    new IntegerField('AtivoMobile'),
                    new IntegerField('is_head_manager'),
                    new IntegerField('is_blocked'),
                    new IntegerField('id_depto'),
                    new IntegerField('grupo_idgrupo')
                )
            );
            $lookupDataset->setOrderByField('Nome Operador', 'ASC');
            $handler = new DynamicSearchHandler($lookupDataset, $this, 'edit_tbl_usuarios_tbl_role_membership_idUsuario_search', 'idUsuario', 'Nome Operador', null, 20);
            GetApplication()->RegisterHTTPHandler($handler);
        }
       
        protected function doCustomRenderColumn($fieldName, $fieldData, $rowData, &$customText, &$handled)
        { 
    
        }
    
        protected function doCustomRenderPrintColumn($fieldName, $fieldData, $rowData, &$customText, &$handled)
        { 
    
        }
    
        protected function doCustomRenderExportColumn($exportType, $fieldName, $fieldData, $rowData, &$customText, &$handled)
        { 
    
        }
    
        protected function doCustomDrawRow($rowData, &$cellFontColor, &$cellFontSize, &$cellBgColor, &$cellItalicAttr, &$cellBoldAttr)
        {
    
        }
    
        protected function doExtendedCustomDrawRow($rowData, &$rowCellStyles, &$rowStyles, &$rowClasses, &$cellClasses)
        {
    
        }
    
        protected function doCustomRenderTotal($totalValue, $aggregate, $columnName, &$customText, &$handled)
        {
    
        }
    
        protected function doCustomDefaultValues(&$values, &$handled) 
        {
    
        }
    
        protected function doCustomCompareColumn($columnName, $valueA, $valueB, &$result)
        {
    
        }
    
        protected function doBeforeInsertRecord($page, &$rowData, $tableName, &$cancel, &$message, &$messageDisplayTime)
        {
    
        }
    
        protected function doBeforeUpdateRecord($page, $oldRowData, &$rowData, $tableName, &$cancel, &$message, &$messageDisplayTime)
        {
    
        }
    
        protected function doBeforeDeleteRecord($page, &$rowData, $tableName, &$cancel, &$message, &$messageDisplayTime)
        {
    
        }
    
        protected function doAfterInsertRecord($page, $rowData, $tableName, &$success, &$message, &$messageDisplayTime)
        {
    
        }
    
        protected function doAfterUpdateRecord($page, $oldRowData, $rowData, $tableName, &$success, &$message, &$messageDisplayTime)
        {
    
        }
    
        protected function doAfterDeleteRecord($page, $rowData, $tableName, &$success, &$message, &$messageDisplayTime)
        {
    
        }
    
        protected function doCustomHTMLHeader($page, &$customHtmlHeaderText)
        { 
    
        }
    
        protected function doGetCustomTemplate($type, $part, $mode, &$result, &$params)
        {
    
        }
    
        protected function doGetCustomExportOptions(Page $page, $exportType, $rowData, &$options)
        {
    
        }
    
        protected function doFileUpload($fieldName, $rowData, &$result, &$accept, $originalFileName, $originalFileExtension, $fileSize, $tempFileName)
        {
    
        }
    
        protected function doPrepareChart(Chart $chart)
        {
    
        }
    
        protected function doPrepareColumnFilter(ColumnFilter $columnFilter)
        {
    
        }
    
        protected function doPrepareFilterBuilder(FilterBuilder $filterBuilder, FixedKeysArray $columns)
        {
    
        }
    
        protected function doGetSelectionFilters(FixedKeysArray $columns, &$result)
        {
    
        }
    
        protected function doGetCustomFormLayout($mode, FixedKeysArray $columns, FormLayout $layout)
        {
    
        }
    
        protected function doGetCustomColumnGroup(FixedKeysArray $columns, ViewColumnGroup $columnGroup)
        {
    
        }
    
        protected function doPageLoaded()
        {
    
        }
    
        protected function doCalculateFields($rowData, $fieldName, &$value)
        {
    
        }
    
        protected function doGetCustomRecordPermissions(Page $page, &$usingCondition, $rowData, &$allowEdit, &$allowDelete, &$mergeWithDefault, &$handled)
        {
    
        }
    
        protected function doAddEnvironmentVariables(Page $page, &$variables)
        {
    
        }
    
    }
    
    
    
    
    // OnBeforePageExecute event handler
    
    
    
    class tbl_usuarios_tbl_usuarios_concessionariasPage extends DetailPage
    {
        protected function DoBeforeCreate()
        {
            $this->SetTitle('ASSOCIAÇÃO USUÁRIO CONCESSIONÁRIA');
            $this->SetMenuLabel('ASSOCIAÇÃO USUÁRIO CONCESSIONÁRIA');
    
            $this->dataset = new TableDataset(
                MyPDOConnectionFactory::getInstance(),
                GetConnectionOptions(),
                '`tbl_usuarios_concessionarias`');
            $this->dataset->addFields(
                array(
                    new IntegerField('id_concessionaria', true, true),
                    new IntegerField('id_usuario_cs', true, true)
                )
            );
            $this->dataset->AddLookupField('id_concessionaria', 'tbl_concessionarias', new IntegerField('idConcessiona'), new StringField('NomeConcessionaria', false, false, false, false, 'id_concessionaria_NomeConcessionaria', 'id_concessionaria_NomeConcessionaria_tbl_concessionarias'), 'id_concessionaria_NomeConcessionaria_tbl_concessionarias');
            $this->dataset->AddLookupField('id_usuario_cs', 'tbl_usuarios', new IntegerField('idUsuario'), new StringField('Usuario', false, false, false, false, 'id_usuario_cs_Usuario', 'id_usuario_cs_Usuario_tbl_usuarios'), 'id_usuario_cs_Usuario_tbl_usuarios');
        }
    
        protected function DoPrepare() {
    
        }
    
        protected function CreatePageNavigator()
        {
            $result = new CompositePageNavigator($this);
            
            $partitionNavigator = new PageNavigator('pnav', $this, $this->dataset);
            $partitionNavigator->SetRowsPerPage(40);
            $result->AddPageNavigator($partitionNavigator);
            
            return $result;
        }
    
        protected function CreateRssGenerator()
        {
            return null;
        }
    
        protected function setupCharts()
        {
    
        }
    
        protected function getFiltersColumns()
        {
            return array(
                new FilterColumn($this->dataset, 'id_concessionaria', 'id_concessionaria_NomeConcessionaria', 'Concessionária'),
                new FilterColumn($this->dataset, 'id_usuario_cs', 'id_usuario_cs_Usuario', 'Usuário')
            );
        }
    
        protected function setupQuickFilter(QuickFilter $quickFilter, FixedKeysArray $columns)
        {
            $quickFilter
                ->addColumn($columns['id_concessionaria'])
                ->addColumn($columns['id_usuario_cs']);
        }
    
        protected function setupColumnFilter(ColumnFilter $columnFilter)
        {
            $columnFilter
                ->setOptionsFor('id_concessionaria')
                ->setOptionsFor('id_usuario_cs');
        }
    
        protected function setupFilterBuilder(FilterBuilder $filterBuilder, FixedKeysArray $columns)
        {
            $main_editor = new DynamicCombobox('id_concessionaria_edit', $this->CreateLinkBuilder());
            $main_editor->setAllowClear(true);
            $main_editor->setMinimumInputLength(0);
            $main_editor->SetAllowNullValue(false);
            $main_editor->SetHandlerName('filter_builder_tbl_usuarios_tbl_usuarios_concessionarias_id_concessionaria_search');
            
            $multi_value_select_editor = new RemoteMultiValueSelect('id_concessionaria', $this->CreateLinkBuilder());
            $multi_value_select_editor->SetHandlerName('filter_builder_tbl_usuarios_tbl_usuarios_concessionarias_id_concessionaria_search');
            
            $text_editor = new TextEdit('id_concessionaria');
            
            $filterBuilder->addColumn(
                $columns['id_concessionaria'],
                array(
                    FilterConditionOperator::EQUALS => $main_editor,
                    FilterConditionOperator::DOES_NOT_EQUAL => $main_editor,
                    FilterConditionOperator::IS_GREATER_THAN => $main_editor,
                    FilterConditionOperator::IS_GREATER_THAN_OR_EQUAL_TO => $main_editor,
                    FilterConditionOperator::IS_LESS_THAN => $main_editor,
                    FilterConditionOperator::IS_LESS_THAN_OR_EQUAL_TO => $main_editor,
                    FilterConditionOperator::IS_BETWEEN => $main_editor,
                    FilterConditionOperator::IS_NOT_BETWEEN => $main_editor,
                    FilterConditionOperator::CONTAINS => $text_editor,
                    FilterConditionOperator::DOES_NOT_CONTAIN => $text_editor,
                    FilterConditionOperator::BEGINS_WITH => $text_editor,
                    FilterConditionOperator::ENDS_WITH => $text_editor,
                    FilterConditionOperator::IS_LIKE => $text_editor,
                    FilterConditionOperator::IS_NOT_LIKE => $text_editor,
                    FilterConditionOperator::IN => $multi_value_select_editor,
                    FilterConditionOperator::NOT_IN => $multi_value_select_editor,
                    FilterConditionOperator::IS_BLANK => null,
                    FilterConditionOperator::IS_NOT_BLANK => null
                )
            );
            
            $main_editor = new DynamicCombobox('id_usuario_cs_edit', $this->CreateLinkBuilder());
            $main_editor->setAllowClear(true);
            $main_editor->setMinimumInputLength(0);
            $main_editor->SetAllowNullValue(false);
            $main_editor->SetHandlerName('filter_builder_tbl_usuarios_tbl_usuarios_concessionarias_id_usuario_cs_search');
            
            $multi_value_select_editor = new RemoteMultiValueSelect('id_usuario_cs', $this->CreateLinkBuilder());
            $multi_value_select_editor->SetHandlerName('filter_builder_tbl_usuarios_tbl_usuarios_concessionarias_id_usuario_cs_search');
            
            $text_editor = new TextEdit('id_usuario_cs');
            
            $filterBuilder->addColumn(
                $columns['id_usuario_cs'],
                array(
                    FilterConditionOperator::EQUALS => $main_editor,
                    FilterConditionOperator::DOES_NOT_EQUAL => $main_editor,
                    FilterConditionOperator::IS_GREATER_THAN => $main_editor,
                    FilterConditionOperator::IS_GREATER_THAN_OR_EQUAL_TO => $main_editor,
                    FilterConditionOperator::IS_LESS_THAN => $main_editor,
                    FilterConditionOperator::IS_LESS_THAN_OR_EQUAL_TO => $main_editor,
                    FilterConditionOperator::IS_BETWEEN => $main_editor,
                    FilterConditionOperator::IS_NOT_BETWEEN => $main_editor,
                    FilterConditionOperator::CONTAINS => $text_editor,
                    FilterConditionOperator::DOES_NOT_CONTAIN => $text_editor,
                    FilterConditionOperator::BEGINS_WITH => $text_editor,
                    FilterConditionOperator::ENDS_WITH => $text_editor,
                    FilterConditionOperator::IS_LIKE => $text_editor,
                    FilterConditionOperator::IS_NOT_LIKE => $text_editor,
                    FilterConditionOperator::IN => $multi_value_select_editor,
                    FilterConditionOperator::NOT_IN => $multi_value_select_editor,
                    FilterConditionOperator::IS_BLANK => null,
                    FilterConditionOperator::IS_NOT_BLANK => null
                )
            );
        }
    
        protected function AddOperationsColumns(Grid $grid)
        {
            $actions = $grid->getActions();
            $actions->setCaption($this->GetLocalizerCaptions()->GetMessageString('Actions'));
            $actions->setPosition(ActionList::POSITION_LEFT);
            
            if ($this->GetSecurityInfo()->HasViewGrant())
            {
                $operation = new LinkOperation($this->GetLocalizerCaptions()->GetMessageString('View'), OPERATION_VIEW, $this->dataset, $grid);
                $operation->setUseImage(true);
                $actions->addOperation($operation);
            }
            
            if ($this->GetSecurityInfo()->HasEditGrant())
            {
                $operation = new LinkOperation($this->GetLocalizerCaptions()->GetMessageString('Edit'), OPERATION_EDIT, $this->dataset, $grid);
                $operation->setUseImage(true);
                $actions->addOperation($operation);
                $operation->OnShow->AddListener('ShowEditButtonHandler', $this);
            }
            
            if ($this->GetSecurityInfo()->HasDeleteGrant())
            {
                $operation = new LinkOperation($this->GetLocalizerCaptions()->GetMessageString('Delete'), OPERATION_DELETE, $this->dataset, $grid);
                $operation->setUseImage(true);
                $actions->addOperation($operation);
                $operation->OnShow->AddListener('ShowDeleteButtonHandler', $this);
                $operation->SetAdditionalAttribute('data-modal-operation', 'delete');
                $operation->SetAdditionalAttribute('data-delete-handler-name', $this->GetModalGridDeleteHandler());
            }
            
            if ($this->GetSecurityInfo()->HasAddGrant())
            {
                $operation = new LinkOperation($this->GetLocalizerCaptions()->GetMessageString('Copy'), OPERATION_COPY, $this->dataset, $grid);
                $operation->setUseImage(true);
                $actions->addOperation($operation);
            }
        }
    
        protected function AddFieldColumns(Grid $grid, $withDetails = true)
        {
            //
            // View column for NomeConcessionaria field
            //
            $column = new TextViewColumn('id_concessionaria', 'id_concessionaria_NomeConcessionaria', 'Concessionária', $this->dataset);
            $column->SetOrderable(true);
            $column->setMinimalVisibility(ColumnVisibility::PHONE);
            $column->SetDescription('');
            $column->SetFixedWidth(null);
            $grid->AddViewColumn($column);
            
            //
            // View column for Usuario field
            //
            $column = new TextViewColumn('id_usuario_cs', 'id_usuario_cs_Usuario', 'Usuário', $this->dataset);
            $column->SetOrderable(true);
            $column->setMinimalVisibility(ColumnVisibility::PHONE);
            $column->SetDescription('');
            $column->SetFixedWidth(null);
            $grid->AddViewColumn($column);
        }
    
        protected function AddSingleRecordViewColumns(Grid $grid)
        {
            //
            // View column for NomeConcessionaria field
            //
            $column = new TextViewColumn('id_concessionaria', 'id_concessionaria_NomeConcessionaria', 'Concessionária', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddSingleRecordViewColumn($column);
            
            //
            // View column for Usuario field
            //
            $column = new TextViewColumn('id_usuario_cs', 'id_usuario_cs_Usuario', 'Usuário', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddSingleRecordViewColumn($column);
        }
    
        protected function AddEditColumns(Grid $grid)
        {
            //
            // Edit column for id_concessionaria field
            //
            $editor = new DynamicCombobox('id_concessionaria_edit', $this->CreateLinkBuilder());
            $editor->setAllowClear(true);
            $editor->setMinimumInputLength(0);
            $lookupDataset = new TableDataset(
                MyPDOConnectionFactory::getInstance(),
                GetConnectionOptions(),
                '`tbl_concessionarias`');
            $lookupDataset->addFields(
                array(
                    new IntegerField('idConcessiona', true, true, true),
                    new StringField('Lote', true, true),
                    new StringField('NumCNPJ', true, true),
                    new StringField('NomeConcessionaria', true),
                    new DateTimeField('dtInicioConcessao', true),
                    new DateTimeField('dtTerminoConcessao', true),
                    new StringField('Edital'),
                    new StringField('UsuarioResponsavel'),
                    new StringField('email'),
                    new StringField('Telefone'),
                    new StringField('site'),
                    new IntegerField('id_fiscalizadora'),
                    new BlobField('image_log')
                )
            );
            $lookupDataset->setOrderByField('NomeConcessionaria', 'ASC');
            $editColumn = new DynamicLookupEditColumn('Concessionária', 'id_concessionaria', 'id_concessionaria_NomeConcessionaria', 'edit_tbl_usuarios_tbl_usuarios_concessionarias_id_concessionaria_search', $editor, $this->dataset, $lookupDataset, 'idConcessiona', 'NomeConcessionaria', '');
            $validator = new RequiredValidator(StringUtils::Format($this->GetLocalizerCaptions()->GetMessageString('RequiredValidationMessage'), $editColumn->GetCaption()));
            $editor->GetValidatorCollection()->AddValidator($validator);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddEditColumn($editColumn);
            
            //
            // Edit column for id_usuario_cs field
            //
            $editor = new DynamicCombobox('id_usuario_cs_edit', $this->CreateLinkBuilder());
            $editor->setAllowClear(true);
            $editor->setMinimumInputLength(0);
            $lookupDataset = new TableDataset(
                MyPDOConnectionFactory::getInstance(),
                GetConnectionOptions(),
                '`tbl_usuarios`');
            $lookupDataset->addFields(
                array(
                    new IntegerField('idUsuario', true, true, true),
                    new StringField('Nome Operador', true),
                    new StringField('Usuario', true),
                    new StringField('Senha', true),
                    new StringField('Telefone'),
                    new StringField('Email', true),
                    new IntegerField('AtivoMobile'),
                    new IntegerField('is_head_manager'),
                    new IntegerField('is_blocked'),
                    new IntegerField('id_depto'),
                    new IntegerField('grupo_idgrupo')
                )
            );
            $lookupDataset->setOrderByField('Usuario', 'ASC');
            $editColumn = new DynamicLookupEditColumn('Usuário', 'id_usuario_cs', 'id_usuario_cs_Usuario', 'edit_tbl_usuarios_tbl_usuarios_concessionarias_id_usuario_cs_search', $editor, $this->dataset, $lookupDataset, 'idUsuario', 'Usuario', '');
            $validator = new RequiredValidator(StringUtils::Format($this->GetLocalizerCaptions()->GetMessageString('RequiredValidationMessage'), $editColumn->GetCaption()));
            $editor->GetValidatorCollection()->AddValidator($validator);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddEditColumn($editColumn);
        }
    
        protected function AddMultiEditColumns(Grid $grid)
        {
    
        }
    
        protected function AddInsertColumns(Grid $grid)
        {
            //
            // Edit column for id_concessionaria field
            //
            $editor = new DynamicCombobox('id_concessionaria_edit', $this->CreateLinkBuilder());
            $editor->setAllowClear(true);
            $editor->setMinimumInputLength(0);
            $lookupDataset = new TableDataset(
                MyPDOConnectionFactory::getInstance(),
                GetConnectionOptions(),
                '`tbl_concessionarias`');
            $lookupDataset->addFields(
                array(
                    new IntegerField('idConcessiona', true, true, true),
                    new StringField('Lote', true, true),
                    new StringField('NumCNPJ', true, true),
                    new StringField('NomeConcessionaria', true),
                    new DateTimeField('dtInicioConcessao', true),
                    new DateTimeField('dtTerminoConcessao', true),
                    new StringField('Edital'),
                    new StringField('UsuarioResponsavel'),
                    new StringField('email'),
                    new StringField('Telefone'),
                    new StringField('site'),
                    new IntegerField('id_fiscalizadora'),
                    new BlobField('image_log')
                )
            );
            $lookupDataset->setOrderByField('NomeConcessionaria', 'ASC');
            $editColumn = new DynamicLookupEditColumn('Concessionária', 'id_concessionaria', 'id_concessionaria_NomeConcessionaria', 'insert_tbl_usuarios_tbl_usuarios_concessionarias_id_concessionaria_search', $editor, $this->dataset, $lookupDataset, 'idConcessiona', 'NomeConcessionaria', '');
            $validator = new RequiredValidator(StringUtils::Format($this->GetLocalizerCaptions()->GetMessageString('RequiredValidationMessage'), $editColumn->GetCaption()));
            $editor->GetValidatorCollection()->AddValidator($validator);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddInsertColumn($editColumn);
            
            //
            // Edit column for id_usuario_cs field
            //
            $editor = new DynamicCombobox('id_usuario_cs_edit', $this->CreateLinkBuilder());
            $editor->setAllowClear(true);
            $editor->setMinimumInputLength(0);
            $lookupDataset = new TableDataset(
                MyPDOConnectionFactory::getInstance(),
                GetConnectionOptions(),
                '`tbl_usuarios`');
            $lookupDataset->addFields(
                array(
                    new IntegerField('idUsuario', true, true, true),
                    new StringField('Nome Operador', true),
                    new StringField('Usuario', true),
                    new StringField('Senha', true),
                    new StringField('Telefone'),
                    new StringField('Email', true),
                    new IntegerField('AtivoMobile'),
                    new IntegerField('is_head_manager'),
                    new IntegerField('is_blocked'),
                    new IntegerField('id_depto'),
                    new IntegerField('grupo_idgrupo')
                )
            );
            $lookupDataset->setOrderByField('Usuario', 'ASC');
            $editColumn = new DynamicLookupEditColumn('Usuário', 'id_usuario_cs', 'id_usuario_cs_Usuario', 'insert_tbl_usuarios_tbl_usuarios_concessionarias_id_usuario_cs_search', $editor, $this->dataset, $lookupDataset, 'idUsuario', 'Usuario', '');
            $validator = new RequiredValidator(StringUtils::Format($this->GetLocalizerCaptions()->GetMessageString('RequiredValidationMessage'), $editColumn->GetCaption()));
            $editor->GetValidatorCollection()->AddValidator($validator);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddInsertColumn($editColumn);
            $grid->SetShowAddButton(true && $this->GetSecurityInfo()->HasAddGrant());
        }
    
        private function AddMultiUploadColumn(Grid $grid)
        {
    
        }
    
        protected function AddPrintColumns(Grid $grid)
        {
            //
            // View column for NomeConcessionaria field
            //
            $column = new TextViewColumn('id_concessionaria', 'id_concessionaria_NomeConcessionaria', 'Concessionária', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddPrintColumn($column);
            
            //
            // View column for Usuario field
            //
            $column = new TextViewColumn('id_usuario_cs', 'id_usuario_cs_Usuario', 'Usuário', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddPrintColumn($column);
        }
    
        protected function AddExportColumns(Grid $grid)
        {
            //
            // View column for NomeConcessionaria field
            //
            $column = new TextViewColumn('id_concessionaria', 'id_concessionaria_NomeConcessionaria', 'Concessionária', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddExportColumn($column);
            
            //
            // View column for Usuario field
            //
            $column = new TextViewColumn('id_usuario_cs', 'id_usuario_cs_Usuario', 'Usuário', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddExportColumn($column);
        }
    
        private function AddCompareColumns(Grid $grid)
        {
            //
            // View column for NomeConcessionaria field
            //
            $column = new TextViewColumn('id_concessionaria', 'id_concessionaria_NomeConcessionaria', 'Concessionária', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddCompareColumn($column);
            
            //
            // View column for Usuario field
            //
            $column = new TextViewColumn('id_usuario_cs', 'id_usuario_cs_Usuario', 'Usuário', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddCompareColumn($column);
        }
    
        private function AddCompareHeaderColumns(Grid $grid)
        {
    
        }
    
        public function GetPageDirection()
        {
            return null;
        }
    
        public function isFilterConditionRequired()
        {
            return false;
        }
    
        protected function ApplyCommonColumnEditProperties(CustomEditColumn $column)
        {
            $column->SetDisplaySetToNullCheckBox(false);
            $column->SetDisplaySetToDefaultCheckBox(false);
    		$column->SetVariableContainer($this->GetColumnVariableContainer());
        }
    
        function GetCustomClientScript()
        {
            return ;
        }
        
        function GetOnPageLoadedClientScript()
        {
            return ;
        }
        protected function GetEnableModalGridDelete() { return true; }
    
        protected function CreateGrid()
        {
            $result = new Grid($this, $this->dataset);
            if ($this->GetSecurityInfo()->HasDeleteGrant())
               $result->SetAllowDeleteSelected(true);
            else
               $result->SetAllowDeleteSelected(false);   
            
            ApplyCommonPageSettings($this, $result);
            
            $result->SetUseImagesForActions(true);
            $result->SetUseFixedHeader(false);
            $result->SetShowLineNumbers(false);
            $result->SetShowKeyColumnsImagesInHeader(false);
            $result->SetViewMode(ViewMode::TABLE);
            $result->setEnableRuntimeCustomization(true);
            $result->setAllowCompare(true);
            $this->AddCompareHeaderColumns($result);
            $this->AddCompareColumns($result);
            $result->setMultiEditAllowed($this->GetSecurityInfo()->HasEditGrant() && true);
            $result->setTableBordered(true);
            $result->setTableCondensed(true);
            
            $result->SetHighlightRowAtHover(true);
            $result->SetWidth('');
            $this->AddOperationsColumns($result);
            $this->AddFieldColumns($result);
            $this->AddSingleRecordViewColumns($result);
            $this->AddEditColumns($result);
            $this->AddMultiEditColumns($result);
            $this->AddInsertColumns($result);
            $this->AddPrintColumns($result);
            $this->AddExportColumns($result);
            $this->AddMultiUploadColumn($result);
    
    
            $this->SetShowPageList(true);
            $this->SetShowTopPageNavigator(true);
            $this->SetShowBottomPageNavigator(true);
            $this->setPrintListAvailable(true);
            $this->setPrintListRecordAvailable(false);
            $this->setPrintOneRecordAvailable(true);
            $this->setAllowPrintSelectedRecords(false);
            $this->setExportListAvailable(array('pdf', 'excel'));
            $this->setExportSelectedRecordsAvailable(array('pdf', 'excel'));
            $this->setExportListRecordAvailable(array());
            $this->setExportOneRecordAvailable(array('pdf', 'excel'));
    
            return $result;
        }
     
        protected function setClientSideEvents(Grid $grid) {
    
        }
    
        protected function doRegisterHandlers() {
            $lookupDataset = new TableDataset(
                MyPDOConnectionFactory::getInstance(),
                GetConnectionOptions(),
                '`tbl_concessionarias`');
            $lookupDataset->addFields(
                array(
                    new IntegerField('idConcessiona', true, true, true),
                    new StringField('Lote', true, true),
                    new StringField('NumCNPJ', true, true),
                    new StringField('NomeConcessionaria', true),
                    new DateTimeField('dtInicioConcessao', true),
                    new DateTimeField('dtTerminoConcessao', true),
                    new StringField('Edital'),
                    new StringField('UsuarioResponsavel'),
                    new StringField('email'),
                    new StringField('Telefone'),
                    new StringField('site'),
                    new IntegerField('id_fiscalizadora'),
                    new BlobField('image_log')
                )
            );
            $lookupDataset->setOrderByField('NomeConcessionaria', 'ASC');
            $handler = new DynamicSearchHandler($lookupDataset, $this, 'insert_tbl_usuarios_tbl_usuarios_concessionarias_id_concessionaria_search', 'idConcessiona', 'NomeConcessionaria', null, 20);
            GetApplication()->RegisterHTTPHandler($handler);
            
            $lookupDataset = new TableDataset(
                MyPDOConnectionFactory::getInstance(),
                GetConnectionOptions(),
                '`tbl_usuarios`');
            $lookupDataset->addFields(
                array(
                    new IntegerField('idUsuario', true, true, true),
                    new StringField('Nome Operador', true),
                    new StringField('Usuario', true),
                    new StringField('Senha', true),
                    new StringField('Telefone'),
                    new StringField('Email', true),
                    new IntegerField('AtivoMobile'),
                    new IntegerField('is_head_manager'),
                    new IntegerField('is_blocked'),
                    new IntegerField('id_depto'),
                    new IntegerField('grupo_idgrupo')
                )
            );
            $lookupDataset->setOrderByField('Usuario', 'ASC');
            $handler = new DynamicSearchHandler($lookupDataset, $this, 'insert_tbl_usuarios_tbl_usuarios_concessionarias_id_usuario_cs_search', 'idUsuario', 'Usuario', null, 20);
            GetApplication()->RegisterHTTPHandler($handler);
            
            $lookupDataset = new TableDataset(
                MyPDOConnectionFactory::getInstance(),
                GetConnectionOptions(),
                '`tbl_concessionarias`');
            $lookupDataset->addFields(
                array(
                    new IntegerField('idConcessiona', true, true, true),
                    new StringField('Lote', true, true),
                    new StringField('NumCNPJ', true, true),
                    new StringField('NomeConcessionaria', true),
                    new DateTimeField('dtInicioConcessao', true),
                    new DateTimeField('dtTerminoConcessao', true),
                    new StringField('Edital'),
                    new StringField('UsuarioResponsavel'),
                    new StringField('email'),
                    new StringField('Telefone'),
                    new StringField('site'),
                    new IntegerField('id_fiscalizadora'),
                    new BlobField('image_log')
                )
            );
            $lookupDataset->setOrderByField('NomeConcessionaria', 'ASC');
            $handler = new DynamicSearchHandler($lookupDataset, $this, 'filter_builder_tbl_usuarios_tbl_usuarios_concessionarias_id_concessionaria_search', 'idConcessiona', 'NomeConcessionaria', null, 20);
            GetApplication()->RegisterHTTPHandler($handler);
            
            $lookupDataset = new TableDataset(
                MyPDOConnectionFactory::getInstance(),
                GetConnectionOptions(),
                '`tbl_usuarios`');
            $lookupDataset->addFields(
                array(
                    new IntegerField('idUsuario', true, true, true),
                    new StringField('Nome Operador', true),
                    new StringField('Usuario', true),
                    new StringField('Senha', true),
                    new StringField('Telefone'),
                    new StringField('Email', true),
                    new IntegerField('AtivoMobile'),
                    new IntegerField('is_head_manager'),
                    new IntegerField('is_blocked'),
                    new IntegerField('id_depto'),
                    new IntegerField('grupo_idgrupo')
                )
            );
            $lookupDataset->setOrderByField('Usuario', 'ASC');
            $handler = new DynamicSearchHandler($lookupDataset, $this, 'filter_builder_tbl_usuarios_tbl_usuarios_concessionarias_id_usuario_cs_search', 'idUsuario', 'Usuario', null, 20);
            GetApplication()->RegisterHTTPHandler($handler);
            
            $lookupDataset = new TableDataset(
                MyPDOConnectionFactory::getInstance(),
                GetConnectionOptions(),
                '`tbl_concessionarias`');
            $lookupDataset->addFields(
                array(
                    new IntegerField('idConcessiona', true, true, true),
                    new StringField('Lote', true, true),
                    new StringField('NumCNPJ', true, true),
                    new StringField('NomeConcessionaria', true),
                    new DateTimeField('dtInicioConcessao', true),
                    new DateTimeField('dtTerminoConcessao', true),
                    new StringField('Edital'),
                    new StringField('UsuarioResponsavel'),
                    new StringField('email'),
                    new StringField('Telefone'),
                    new StringField('site'),
                    new IntegerField('id_fiscalizadora'),
                    new BlobField('image_log')
                )
            );
            $lookupDataset->setOrderByField('NomeConcessionaria', 'ASC');
            $handler = new DynamicSearchHandler($lookupDataset, $this, 'edit_tbl_usuarios_tbl_usuarios_concessionarias_id_concessionaria_search', 'idConcessiona', 'NomeConcessionaria', null, 20);
            GetApplication()->RegisterHTTPHandler($handler);
            
            $lookupDataset = new TableDataset(
                MyPDOConnectionFactory::getInstance(),
                GetConnectionOptions(),
                '`tbl_usuarios`');
            $lookupDataset->addFields(
                array(
                    new IntegerField('idUsuario', true, true, true),
                    new StringField('Nome Operador', true),
                    new StringField('Usuario', true),
                    new StringField('Senha', true),
                    new StringField('Telefone'),
                    new StringField('Email', true),
                    new IntegerField('AtivoMobile'),
                    new IntegerField('is_head_manager'),
                    new IntegerField('is_blocked'),
                    new IntegerField('id_depto'),
                    new IntegerField('grupo_idgrupo')
                )
            );
            $lookupDataset->setOrderByField('Usuario', 'ASC');
            $handler = new DynamicSearchHandler($lookupDataset, $this, 'edit_tbl_usuarios_tbl_usuarios_concessionarias_id_usuario_cs_search', 'idUsuario', 'Usuario', null, 20);
            GetApplication()->RegisterHTTPHandler($handler);
        }
       
        protected function doCustomRenderColumn($fieldName, $fieldData, $rowData, &$customText, &$handled)
        { 
    
        }
    
        protected function doCustomRenderPrintColumn($fieldName, $fieldData, $rowData, &$customText, &$handled)
        { 
    
        }
    
        protected function doCustomRenderExportColumn($exportType, $fieldName, $fieldData, $rowData, &$customText, &$handled)
        { 
    
        }
    
        protected function doCustomDrawRow($rowData, &$cellFontColor, &$cellFontSize, &$cellBgColor, &$cellItalicAttr, &$cellBoldAttr)
        {
    
        }
    
        protected function doExtendedCustomDrawRow($rowData, &$rowCellStyles, &$rowStyles, &$rowClasses, &$cellClasses)
        {
    
        }
    
        protected function doCustomRenderTotal($totalValue, $aggregate, $columnName, &$customText, &$handled)
        {
    
        }
    
        protected function doCustomDefaultValues(&$values, &$handled) 
        {
    
        }
    
        protected function doCustomCompareColumn($columnName, $valueA, $valueB, &$result)
        {
    
        }
    
        protected function doBeforeInsertRecord($page, &$rowData, $tableName, &$cancel, &$message, &$messageDisplayTime)
        {
    
        }
    
        protected function doBeforeUpdateRecord($page, $oldRowData, &$rowData, $tableName, &$cancel, &$message, &$messageDisplayTime)
        {
    
        }
    
        protected function doBeforeDeleteRecord($page, &$rowData, $tableName, &$cancel, &$message, &$messageDisplayTime)
        {
    
        }
    
        protected function doAfterInsertRecord($page, $rowData, $tableName, &$success, &$message, &$messageDisplayTime)
        {
    
        }
    
        protected function doAfterUpdateRecord($page, $oldRowData, $rowData, $tableName, &$success, &$message, &$messageDisplayTime)
        {
    
        }
    
        protected function doAfterDeleteRecord($page, $rowData, $tableName, &$success, &$message, &$messageDisplayTime)
        {
    
        }
    
        protected function doCustomHTMLHeader($page, &$customHtmlHeaderText)
        { 
    
        }
    
        protected function doGetCustomTemplate($type, $part, $mode, &$result, &$params)
        {
    
        }
    
        protected function doGetCustomExportOptions(Page $page, $exportType, $rowData, &$options)
        {
    
        }
    
        protected function doFileUpload($fieldName, $rowData, &$result, &$accept, $originalFileName, $originalFileExtension, $fileSize, $tempFileName)
        {
    
        }
    
        protected function doPrepareChart(Chart $chart)
        {
    
        }
    
        protected function doPrepareColumnFilter(ColumnFilter $columnFilter)
        {
    
        }
    
        protected function doPrepareFilterBuilder(FilterBuilder $filterBuilder, FixedKeysArray $columns)
        {
    
        }
    
        protected function doGetSelectionFilters(FixedKeysArray $columns, &$result)
        {
    
        }
    
        protected function doGetCustomFormLayout($mode, FixedKeysArray $columns, FormLayout $layout)
        {
    
        }
    
        protected function doGetCustomColumnGroup(FixedKeysArray $columns, ViewColumnGroup $columnGroup)
        {
    
        }
    
        protected function doPageLoaded()
        {
    
        }
    
        protected function doCalculateFields($rowData, $fieldName, &$value)
        {
    
        }
    
        protected function doGetCustomRecordPermissions(Page $page, &$usingCondition, $rowData, &$allowEdit, &$allowDelete, &$mergeWithDefault, &$handled)
        {
    
        }
    
        protected function doAddEnvironmentVariables(Page $page, &$variables)
        {
    
        }
    
    }
    
    
    
    
    // OnBeforePageExecute event handler
    
    
    
    class tbl_usuarios_tbl_usuarios_eafsPage extends DetailPage
    {
        protected function DoBeforeCreate()
        {
            $this->SetTitle('ASSOCIAÇÃO USUÁRIO FISCALIZADORA');
            $this->SetMenuLabel('ASSOCIAÇÃO USUÁRIO FISCALIZADORA');
    
            $this->dataset = new TableDataset(
                MyPDOConnectionFactory::getInstance(),
                GetConnectionOptions(),
                '`tbl_usuarios_eafs`');
            $this->dataset->addFields(
                array(
                    new IntegerField('id_fiscalizadora', true, true),
                    new IntegerField('id_usuario_eafs', true, true)
                )
            );
            $this->dataset->AddLookupField('id_fiscalizadora', 'tbl_eafs', new IntegerField('idEaf'), new StringField('NomeEaf', false, false, false, false, 'id_fiscalizadora_NomeEaf', 'id_fiscalizadora_NomeEaf_tbl_eafs'), 'id_fiscalizadora_NomeEaf_tbl_eafs');
            $this->dataset->AddLookupField('id_usuario_eafs', 'tbl_usuarios', new IntegerField('idUsuario'), new StringField('Nome Operador', false, false, false, false, 'id_usuario_eafs_Nome Operador', 'id_usuario_eafs_Nome Operador_tbl_usuarios'), 'id_usuario_eafs_Nome Operador_tbl_usuarios');
        }
    
        protected function DoPrepare() {
    
        }
    
        protected function CreatePageNavigator()
        {
            $result = new CompositePageNavigator($this);
            
            $partitionNavigator = new PageNavigator('pnav', $this, $this->dataset);
            $partitionNavigator->SetRowsPerPage(40);
            $result->AddPageNavigator($partitionNavigator);
            
            return $result;
        }
    
        protected function CreateRssGenerator()
        {
            return null;
        }
    
        protected function setupCharts()
        {
    
        }
    
        protected function getFiltersColumns()
        {
            return array(
                new FilterColumn($this->dataset, 'id_fiscalizadora', 'id_fiscalizadora_NomeEaf', 'Fiscalizadora'),
                new FilterColumn($this->dataset, 'id_usuario_eafs', 'id_usuario_eafs_Nome Operador', 'Usuário Eafs')
            );
        }
    
        protected function setupQuickFilter(QuickFilter $quickFilter, FixedKeysArray $columns)
        {
            $quickFilter
                ->addColumn($columns['id_fiscalizadora'])
                ->addColumn($columns['id_usuario_eafs']);
        }
    
        protected function setupColumnFilter(ColumnFilter $columnFilter)
        {
            $columnFilter
                ->setOptionsFor('id_fiscalizadora')
                ->setOptionsFor('id_usuario_eafs');
        }
    
        protected function setupFilterBuilder(FilterBuilder $filterBuilder, FixedKeysArray $columns)
        {
            $main_editor = new DynamicCombobox('id_fiscalizadora_edit', $this->CreateLinkBuilder());
            $main_editor->setAllowClear(true);
            $main_editor->setMinimumInputLength(0);
            $main_editor->SetAllowNullValue(false);
            $main_editor->SetHandlerName('filter_builder_tbl_usuarios_tbl_usuarios_eafs_id_fiscalizadora_search');
            
            $multi_value_select_editor = new RemoteMultiValueSelect('id_fiscalizadora', $this->CreateLinkBuilder());
            $multi_value_select_editor->SetHandlerName('filter_builder_tbl_usuarios_tbl_usuarios_eafs_id_fiscalizadora_search');
            
            $text_editor = new TextEdit('id_fiscalizadora');
            
            $filterBuilder->addColumn(
                $columns['id_fiscalizadora'],
                array(
                    FilterConditionOperator::EQUALS => $main_editor,
                    FilterConditionOperator::DOES_NOT_EQUAL => $main_editor,
                    FilterConditionOperator::IS_GREATER_THAN => $main_editor,
                    FilterConditionOperator::IS_GREATER_THAN_OR_EQUAL_TO => $main_editor,
                    FilterConditionOperator::IS_LESS_THAN => $main_editor,
                    FilterConditionOperator::IS_LESS_THAN_OR_EQUAL_TO => $main_editor,
                    FilterConditionOperator::IS_BETWEEN => $main_editor,
                    FilterConditionOperator::IS_NOT_BETWEEN => $main_editor,
                    FilterConditionOperator::CONTAINS => $text_editor,
                    FilterConditionOperator::DOES_NOT_CONTAIN => $text_editor,
                    FilterConditionOperator::BEGINS_WITH => $text_editor,
                    FilterConditionOperator::ENDS_WITH => $text_editor,
                    FilterConditionOperator::IS_LIKE => $text_editor,
                    FilterConditionOperator::IS_NOT_LIKE => $text_editor,
                    FilterConditionOperator::IN => $multi_value_select_editor,
                    FilterConditionOperator::NOT_IN => $multi_value_select_editor,
                    FilterConditionOperator::IS_BLANK => null,
                    FilterConditionOperator::IS_NOT_BLANK => null
                )
            );
            
            $main_editor = new DynamicCombobox('id_usuario_eafs_edit', $this->CreateLinkBuilder());
            $main_editor->setAllowClear(true);
            $main_editor->setMinimumInputLength(0);
            $main_editor->SetAllowNullValue(false);
            $main_editor->SetHandlerName('filter_builder_tbl_usuarios_tbl_usuarios_eafs_id_usuario_eafs_search');
            
            $multi_value_select_editor = new RemoteMultiValueSelect('id_usuario_eafs', $this->CreateLinkBuilder());
            $multi_value_select_editor->SetHandlerName('filter_builder_tbl_usuarios_tbl_usuarios_eafs_id_usuario_eafs_search');
            
            $text_editor = new TextEdit('id_usuario_eafs');
            
            $filterBuilder->addColumn(
                $columns['id_usuario_eafs'],
                array(
                    FilterConditionOperator::EQUALS => $main_editor,
                    FilterConditionOperator::DOES_NOT_EQUAL => $main_editor,
                    FilterConditionOperator::IS_GREATER_THAN => $main_editor,
                    FilterConditionOperator::IS_GREATER_THAN_OR_EQUAL_TO => $main_editor,
                    FilterConditionOperator::IS_LESS_THAN => $main_editor,
                    FilterConditionOperator::IS_LESS_THAN_OR_EQUAL_TO => $main_editor,
                    FilterConditionOperator::IS_BETWEEN => $main_editor,
                    FilterConditionOperator::IS_NOT_BETWEEN => $main_editor,
                    FilterConditionOperator::CONTAINS => $text_editor,
                    FilterConditionOperator::DOES_NOT_CONTAIN => $text_editor,
                    FilterConditionOperator::BEGINS_WITH => $text_editor,
                    FilterConditionOperator::ENDS_WITH => $text_editor,
                    FilterConditionOperator::IS_LIKE => $text_editor,
                    FilterConditionOperator::IS_NOT_LIKE => $text_editor,
                    FilterConditionOperator::IN => $multi_value_select_editor,
                    FilterConditionOperator::NOT_IN => $multi_value_select_editor,
                    FilterConditionOperator::IS_BLANK => null,
                    FilterConditionOperator::IS_NOT_BLANK => null
                )
            );
        }
    
        protected function AddOperationsColumns(Grid $grid)
        {
            $actions = $grid->getActions();
            $actions->setCaption($this->GetLocalizerCaptions()->GetMessageString('Actions'));
            $actions->setPosition(ActionList::POSITION_LEFT);
            
            if ($this->GetSecurityInfo()->HasViewGrant())
            {
                $operation = new LinkOperation($this->GetLocalizerCaptions()->GetMessageString('View'), OPERATION_VIEW, $this->dataset, $grid);
                $operation->setUseImage(true);
                $actions->addOperation($operation);
            }
            
            if ($this->GetSecurityInfo()->HasEditGrant())
            {
                $operation = new LinkOperation($this->GetLocalizerCaptions()->GetMessageString('Edit'), OPERATION_EDIT, $this->dataset, $grid);
                $operation->setUseImage(true);
                $actions->addOperation($operation);
                $operation->OnShow->AddListener('ShowEditButtonHandler', $this);
            }
            
            if ($this->GetSecurityInfo()->HasDeleteGrant())
            {
                $operation = new LinkOperation($this->GetLocalizerCaptions()->GetMessageString('Delete'), OPERATION_DELETE, $this->dataset, $grid);
                $operation->setUseImage(true);
                $actions->addOperation($operation);
                $operation->OnShow->AddListener('ShowDeleteButtonHandler', $this);
                $operation->SetAdditionalAttribute('data-modal-operation', 'delete');
                $operation->SetAdditionalAttribute('data-delete-handler-name', $this->GetModalGridDeleteHandler());
            }
            
            if ($this->GetSecurityInfo()->HasAddGrant())
            {
                $operation = new LinkOperation($this->GetLocalizerCaptions()->GetMessageString('Copy'), OPERATION_COPY, $this->dataset, $grid);
                $operation->setUseImage(true);
                $actions->addOperation($operation);
            }
        }
    
        protected function AddFieldColumns(Grid $grid, $withDetails = true)
        {
            //
            // View column for NomeEaf field
            //
            $column = new TextViewColumn('id_fiscalizadora', 'id_fiscalizadora_NomeEaf', 'Fiscalizadora', $this->dataset);
            $column->SetOrderable(true);
            $column->setMinimalVisibility(ColumnVisibility::PHONE);
            $column->SetDescription('');
            $column->SetFixedWidth(null);
            $grid->AddViewColumn($column);
            
            //
            // View column for Nome Operador field
            //
            $column = new TextViewColumn('id_usuario_eafs', 'id_usuario_eafs_Nome Operador', 'Usuário Eafs', $this->dataset);
            $column->SetOrderable(true);
            $column->setMinimalVisibility(ColumnVisibility::PHONE);
            $column->SetDescription('');
            $column->SetFixedWidth(null);
            $grid->AddViewColumn($column);
        }
    
        protected function AddSingleRecordViewColumns(Grid $grid)
        {
            //
            // View column for NomeEaf field
            //
            $column = new TextViewColumn('id_fiscalizadora', 'id_fiscalizadora_NomeEaf', 'Fiscalizadora', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddSingleRecordViewColumn($column);
            
            //
            // View column for Nome Operador field
            //
            $column = new TextViewColumn('id_usuario_eafs', 'id_usuario_eafs_Nome Operador', 'Usuário Eafs', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddSingleRecordViewColumn($column);
        }
    
        protected function AddEditColumns(Grid $grid)
        {
            //
            // Edit column for id_fiscalizadora field
            //
            $editor = new DynamicCombobox('id_fiscalizadora_edit', $this->CreateLinkBuilder());
            $editor->setAllowClear(true);
            $editor->setMinimumInputLength(0);
            $lookupDataset = new TableDataset(
                MyPDOConnectionFactory::getInstance(),
                GetConnectionOptions(),
                '`tbl_eafs`');
            $lookupDataset->addFields(
                array(
                    new IntegerField('idEaf', true, true, true),
                    new StringField('NomeEaf'),
                    new StringField('UsuarioResponsavel'),
                    new StringField('email'),
                    new StringField('Telefone'),
                    new BlobField('image_logo')
                )
            );
            $lookupDataset->setOrderByField('NomeEaf', 'ASC');
            $editColumn = new DynamicLookupEditColumn('Fiscalizadora', 'id_fiscalizadora', 'id_fiscalizadora_NomeEaf', 'edit_tbl_usuarios_tbl_usuarios_eafs_id_fiscalizadora_search', $editor, $this->dataset, $lookupDataset, 'idEaf', 'NomeEaf', '');
            $validator = new RequiredValidator(StringUtils::Format($this->GetLocalizerCaptions()->GetMessageString('RequiredValidationMessage'), $editColumn->GetCaption()));
            $editor->GetValidatorCollection()->AddValidator($validator);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddEditColumn($editColumn);
            
            //
            // Edit column for id_usuario_eafs field
            //
            $editor = new DynamicCombobox('id_usuario_eafs_edit', $this->CreateLinkBuilder());
            $editor->setAllowClear(true);
            $editor->setMinimumInputLength(0);
            $lookupDataset = new TableDataset(
                MyPDOConnectionFactory::getInstance(),
                GetConnectionOptions(),
                '`tbl_usuarios`');
            $lookupDataset->addFields(
                array(
                    new IntegerField('idUsuario', true, true, true),
                    new StringField('Nome Operador', true),
                    new StringField('Usuario', true),
                    new StringField('Senha', true),
                    new StringField('Telefone'),
                    new StringField('Email', true),
                    new IntegerField('AtivoMobile'),
                    new IntegerField('is_head_manager'),
                    new IntegerField('is_blocked'),
                    new IntegerField('id_depto'),
                    new IntegerField('grupo_idgrupo')
                )
            );
            $lookupDataset->setOrderByField('Nome Operador', 'ASC');
            $editColumn = new DynamicLookupEditColumn('Usuário Eafs', 'id_usuario_eafs', 'id_usuario_eafs_Nome Operador', 'edit_tbl_usuarios_tbl_usuarios_eafs_id_usuario_eafs_search', $editor, $this->dataset, $lookupDataset, 'idUsuario', 'Nome Operador', '');
            $validator = new RequiredValidator(StringUtils::Format($this->GetLocalizerCaptions()->GetMessageString('RequiredValidationMessage'), $editColumn->GetCaption()));
            $editor->GetValidatorCollection()->AddValidator($validator);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddEditColumn($editColumn);
        }
    
        protected function AddMultiEditColumns(Grid $grid)
        {
    
        }
    
        protected function AddInsertColumns(Grid $grid)
        {
            //
            // Edit column for id_fiscalizadora field
            //
            $editor = new DynamicCombobox('id_fiscalizadora_edit', $this->CreateLinkBuilder());
            $editor->setAllowClear(true);
            $editor->setMinimumInputLength(0);
            $lookupDataset = new TableDataset(
                MyPDOConnectionFactory::getInstance(),
                GetConnectionOptions(),
                '`tbl_eafs`');
            $lookupDataset->addFields(
                array(
                    new IntegerField('idEaf', true, true, true),
                    new StringField('NomeEaf'),
                    new StringField('UsuarioResponsavel'),
                    new StringField('email'),
                    new StringField('Telefone'),
                    new BlobField('image_logo')
                )
            );
            $lookupDataset->setOrderByField('NomeEaf', 'ASC');
            $editColumn = new DynamicLookupEditColumn('Fiscalizadora', 'id_fiscalizadora', 'id_fiscalizadora_NomeEaf', 'insert_tbl_usuarios_tbl_usuarios_eafs_id_fiscalizadora_search', $editor, $this->dataset, $lookupDataset, 'idEaf', 'NomeEaf', '');
            $validator = new RequiredValidator(StringUtils::Format($this->GetLocalizerCaptions()->GetMessageString('RequiredValidationMessage'), $editColumn->GetCaption()));
            $editor->GetValidatorCollection()->AddValidator($validator);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddInsertColumn($editColumn);
            
            //
            // Edit column for id_usuario_eafs field
            //
            $editor = new DynamicCombobox('id_usuario_eafs_edit', $this->CreateLinkBuilder());
            $editor->setAllowClear(true);
            $editor->setMinimumInputLength(0);
            $lookupDataset = new TableDataset(
                MyPDOConnectionFactory::getInstance(),
                GetConnectionOptions(),
                '`tbl_usuarios`');
            $lookupDataset->addFields(
                array(
                    new IntegerField('idUsuario', true, true, true),
                    new StringField('Nome Operador', true),
                    new StringField('Usuario', true),
                    new StringField('Senha', true),
                    new StringField('Telefone'),
                    new StringField('Email', true),
                    new IntegerField('AtivoMobile'),
                    new IntegerField('is_head_manager'),
                    new IntegerField('is_blocked'),
                    new IntegerField('id_depto'),
                    new IntegerField('grupo_idgrupo')
                )
            );
            $lookupDataset->setOrderByField('Nome Operador', 'ASC');
            $editColumn = new DynamicLookupEditColumn('Usuário Eafs', 'id_usuario_eafs', 'id_usuario_eafs_Nome Operador', 'insert_tbl_usuarios_tbl_usuarios_eafs_id_usuario_eafs_search', $editor, $this->dataset, $lookupDataset, 'idUsuario', 'Nome Operador', '');
            $validator = new RequiredValidator(StringUtils::Format($this->GetLocalizerCaptions()->GetMessageString('RequiredValidationMessage'), $editColumn->GetCaption()));
            $editor->GetValidatorCollection()->AddValidator($validator);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddInsertColumn($editColumn);
            $grid->SetShowAddButton(true && $this->GetSecurityInfo()->HasAddGrant());
        }
    
        private function AddMultiUploadColumn(Grid $grid)
        {
    
        }
    
        protected function AddPrintColumns(Grid $grid)
        {
            //
            // View column for NomeEaf field
            //
            $column = new TextViewColumn('id_fiscalizadora', 'id_fiscalizadora_NomeEaf', 'Fiscalizadora', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddPrintColumn($column);
            
            //
            // View column for Nome Operador field
            //
            $column = new TextViewColumn('id_usuario_eafs', 'id_usuario_eafs_Nome Operador', 'Usuário Eafs', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddPrintColumn($column);
        }
    
        protected function AddExportColumns(Grid $grid)
        {
            //
            // View column for NomeEaf field
            //
            $column = new TextViewColumn('id_fiscalizadora', 'id_fiscalizadora_NomeEaf', 'Fiscalizadora', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddExportColumn($column);
            
            //
            // View column for Nome Operador field
            //
            $column = new TextViewColumn('id_usuario_eafs', 'id_usuario_eafs_Nome Operador', 'Usuário Eafs', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddExportColumn($column);
        }
    
        private function AddCompareColumns(Grid $grid)
        {
            //
            // View column for NomeEaf field
            //
            $column = new TextViewColumn('id_fiscalizadora', 'id_fiscalizadora_NomeEaf', 'Fiscalizadora', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddCompareColumn($column);
            
            //
            // View column for Nome Operador field
            //
            $column = new TextViewColumn('id_usuario_eafs', 'id_usuario_eafs_Nome Operador', 'Usuário Eafs', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddCompareColumn($column);
        }
    
        private function AddCompareHeaderColumns(Grid $grid)
        {
    
        }
    
        public function GetPageDirection()
        {
            return null;
        }
    
        public function isFilterConditionRequired()
        {
            return false;
        }
    
        protected function ApplyCommonColumnEditProperties(CustomEditColumn $column)
        {
            $column->SetDisplaySetToNullCheckBox(false);
            $column->SetDisplaySetToDefaultCheckBox(false);
    		$column->SetVariableContainer($this->GetColumnVariableContainer());
        }
    
        function GetCustomClientScript()
        {
            return ;
        }
        
        function GetOnPageLoadedClientScript()
        {
            return ;
        }
        protected function GetEnableModalGridDelete() { return true; }
    
        protected function CreateGrid()
        {
            $result = new Grid($this, $this->dataset);
            if ($this->GetSecurityInfo()->HasDeleteGrant())
               $result->SetAllowDeleteSelected(true);
            else
               $result->SetAllowDeleteSelected(false);   
            
            ApplyCommonPageSettings($this, $result);
            
            $result->SetUseImagesForActions(true);
            $result->SetUseFixedHeader(false);
            $result->SetShowLineNumbers(false);
            $result->SetShowKeyColumnsImagesInHeader(false);
            $result->SetViewMode(ViewMode::TABLE);
            $result->setEnableRuntimeCustomization(true);
            $result->setAllowCompare(true);
            $this->AddCompareHeaderColumns($result);
            $this->AddCompareColumns($result);
            $result->setMultiEditAllowed($this->GetSecurityInfo()->HasEditGrant() && true);
            $result->setTableBordered(true);
            $result->setTableCondensed(true);
            
            $result->SetHighlightRowAtHover(true);
            $result->SetWidth('');
            $this->AddOperationsColumns($result);
            $this->AddFieldColumns($result);
            $this->AddSingleRecordViewColumns($result);
            $this->AddEditColumns($result);
            $this->AddMultiEditColumns($result);
            $this->AddInsertColumns($result);
            $this->AddPrintColumns($result);
            $this->AddExportColumns($result);
            $this->AddMultiUploadColumn($result);
    
    
            $this->SetShowPageList(true);
            $this->SetShowTopPageNavigator(true);
            $this->SetShowBottomPageNavigator(true);
            $this->setPrintListAvailable(true);
            $this->setPrintListRecordAvailable(false);
            $this->setPrintOneRecordAvailable(true);
            $this->setAllowPrintSelectedRecords(false);
            $this->setExportListAvailable(array('pdf', 'excel'));
            $this->setExportSelectedRecordsAvailable(array('pdf', 'excel'));
            $this->setExportListRecordAvailable(array());
            $this->setExportOneRecordAvailable(array('pdf', 'excel'));
    
            return $result;
        }
     
        protected function setClientSideEvents(Grid $grid) {
    
        }
    
        protected function doRegisterHandlers() {
            $lookupDataset = new TableDataset(
                MyPDOConnectionFactory::getInstance(),
                GetConnectionOptions(),
                '`tbl_eafs`');
            $lookupDataset->addFields(
                array(
                    new IntegerField('idEaf', true, true, true),
                    new StringField('NomeEaf'),
                    new StringField('UsuarioResponsavel'),
                    new StringField('email'),
                    new StringField('Telefone'),
                    new BlobField('image_logo')
                )
            );
            $lookupDataset->setOrderByField('NomeEaf', 'ASC');
            $handler = new DynamicSearchHandler($lookupDataset, $this, 'insert_tbl_usuarios_tbl_usuarios_eafs_id_fiscalizadora_search', 'idEaf', 'NomeEaf', null, 20);
            GetApplication()->RegisterHTTPHandler($handler);
            
            $lookupDataset = new TableDataset(
                MyPDOConnectionFactory::getInstance(),
                GetConnectionOptions(),
                '`tbl_usuarios`');
            $lookupDataset->addFields(
                array(
                    new IntegerField('idUsuario', true, true, true),
                    new StringField('Nome Operador', true),
                    new StringField('Usuario', true),
                    new StringField('Senha', true),
                    new StringField('Telefone'),
                    new StringField('Email', true),
                    new IntegerField('AtivoMobile'),
                    new IntegerField('is_head_manager'),
                    new IntegerField('is_blocked'),
                    new IntegerField('id_depto'),
                    new IntegerField('grupo_idgrupo')
                )
            );
            $lookupDataset->setOrderByField('Nome Operador', 'ASC');
            $handler = new DynamicSearchHandler($lookupDataset, $this, 'insert_tbl_usuarios_tbl_usuarios_eafs_id_usuario_eafs_search', 'idUsuario', 'Nome Operador', null, 20);
            GetApplication()->RegisterHTTPHandler($handler);
            
            $lookupDataset = new TableDataset(
                MyPDOConnectionFactory::getInstance(),
                GetConnectionOptions(),
                '`tbl_eafs`');
            $lookupDataset->addFields(
                array(
                    new IntegerField('idEaf', true, true, true),
                    new StringField('NomeEaf'),
                    new StringField('UsuarioResponsavel'),
                    new StringField('email'),
                    new StringField('Telefone'),
                    new BlobField('image_logo')
                )
            );
            $lookupDataset->setOrderByField('NomeEaf', 'ASC');
            $handler = new DynamicSearchHandler($lookupDataset, $this, 'filter_builder_tbl_usuarios_tbl_usuarios_eafs_id_fiscalizadora_search', 'idEaf', 'NomeEaf', null, 20);
            GetApplication()->RegisterHTTPHandler($handler);
            
            $lookupDataset = new TableDataset(
                MyPDOConnectionFactory::getInstance(),
                GetConnectionOptions(),
                '`tbl_usuarios`');
            $lookupDataset->addFields(
                array(
                    new IntegerField('idUsuario', true, true, true),
                    new StringField('Nome Operador', true),
                    new StringField('Usuario', true),
                    new StringField('Senha', true),
                    new StringField('Telefone'),
                    new StringField('Email', true),
                    new IntegerField('AtivoMobile'),
                    new IntegerField('is_head_manager'),
                    new IntegerField('is_blocked'),
                    new IntegerField('id_depto'),
                    new IntegerField('grupo_idgrupo')
                )
            );
            $lookupDataset->setOrderByField('Nome Operador', 'ASC');
            $handler = new DynamicSearchHandler($lookupDataset, $this, 'filter_builder_tbl_usuarios_tbl_usuarios_eafs_id_usuario_eafs_search', 'idUsuario', 'Nome Operador', null, 20);
            GetApplication()->RegisterHTTPHandler($handler);
            
            $lookupDataset = new TableDataset(
                MyPDOConnectionFactory::getInstance(),
                GetConnectionOptions(),
                '`tbl_eafs`');
            $lookupDataset->addFields(
                array(
                    new IntegerField('idEaf', true, true, true),
                    new StringField('NomeEaf'),
                    new StringField('UsuarioResponsavel'),
                    new StringField('email'),
                    new StringField('Telefone'),
                    new BlobField('image_logo')
                )
            );
            $lookupDataset->setOrderByField('NomeEaf', 'ASC');
            $handler = new DynamicSearchHandler($lookupDataset, $this, 'edit_tbl_usuarios_tbl_usuarios_eafs_id_fiscalizadora_search', 'idEaf', 'NomeEaf', null, 20);
            GetApplication()->RegisterHTTPHandler($handler);
            
            $lookupDataset = new TableDataset(
                MyPDOConnectionFactory::getInstance(),
                GetConnectionOptions(),
                '`tbl_usuarios`');
            $lookupDataset->addFields(
                array(
                    new IntegerField('idUsuario', true, true, true),
                    new StringField('Nome Operador', true),
                    new StringField('Usuario', true),
                    new StringField('Senha', true),
                    new StringField('Telefone'),
                    new StringField('Email', true),
                    new IntegerField('AtivoMobile'),
                    new IntegerField('is_head_manager'),
                    new IntegerField('is_blocked'),
                    new IntegerField('id_depto'),
                    new IntegerField('grupo_idgrupo')
                )
            );
            $lookupDataset->setOrderByField('Nome Operador', 'ASC');
            $handler = new DynamicSearchHandler($lookupDataset, $this, 'edit_tbl_usuarios_tbl_usuarios_eafs_id_usuario_eafs_search', 'idUsuario', 'Nome Operador', null, 20);
            GetApplication()->RegisterHTTPHandler($handler);
        }
       
        protected function doCustomRenderColumn($fieldName, $fieldData, $rowData, &$customText, &$handled)
        { 
    
        }
    
        protected function doCustomRenderPrintColumn($fieldName, $fieldData, $rowData, &$customText, &$handled)
        { 
    
        }
    
        protected function doCustomRenderExportColumn($exportType, $fieldName, $fieldData, $rowData, &$customText, &$handled)
        { 
    
        }
    
        protected function doCustomDrawRow($rowData, &$cellFontColor, &$cellFontSize, &$cellBgColor, &$cellItalicAttr, &$cellBoldAttr)
        {
    
        }
    
        protected function doExtendedCustomDrawRow($rowData, &$rowCellStyles, &$rowStyles, &$rowClasses, &$cellClasses)
        {
    
        }
    
        protected function doCustomRenderTotal($totalValue, $aggregate, $columnName, &$customText, &$handled)
        {
    
        }
    
        protected function doCustomDefaultValues(&$values, &$handled) 
        {
    
        }
    
        protected function doCustomCompareColumn($columnName, $valueA, $valueB, &$result)
        {
    
        }
    
        protected function doBeforeInsertRecord($page, &$rowData, $tableName, &$cancel, &$message, &$messageDisplayTime)
        {
    
        }
    
        protected function doBeforeUpdateRecord($page, $oldRowData, &$rowData, $tableName, &$cancel, &$message, &$messageDisplayTime)
        {
    
        }
    
        protected function doBeforeDeleteRecord($page, &$rowData, $tableName, &$cancel, &$message, &$messageDisplayTime)
        {
    
        }
    
        protected function doAfterInsertRecord($page, $rowData, $tableName, &$success, &$message, &$messageDisplayTime)
        {
    
        }
    
        protected function doAfterUpdateRecord($page, $oldRowData, $rowData, $tableName, &$success, &$message, &$messageDisplayTime)
        {
    
        }
    
        protected function doAfterDeleteRecord($page, $rowData, $tableName, &$success, &$message, &$messageDisplayTime)
        {
    
        }
    
        protected function doCustomHTMLHeader($page, &$customHtmlHeaderText)
        { 
    
        }
    
        protected function doGetCustomTemplate($type, $part, $mode, &$result, &$params)
        {
    
        }
    
        protected function doGetCustomExportOptions(Page $page, $exportType, $rowData, &$options)
        {
    
        }
    
        protected function doFileUpload($fieldName, $rowData, &$result, &$accept, $originalFileName, $originalFileExtension, $fileSize, $tempFileName)
        {
    
        }
    
        protected function doPrepareChart(Chart $chart)
        {
    
        }
    
        protected function doPrepareColumnFilter(ColumnFilter $columnFilter)
        {
    
        }
    
        protected function doPrepareFilterBuilder(FilterBuilder $filterBuilder, FixedKeysArray $columns)
        {
    
        }
    
        protected function doGetSelectionFilters(FixedKeysArray $columns, &$result)
        {
    
        }
    
        protected function doGetCustomFormLayout($mode, FixedKeysArray $columns, FormLayout $layout)
        {
    
        }
    
        protected function doGetCustomColumnGroup(FixedKeysArray $columns, ViewColumnGroup $columnGroup)
        {
    
        }
    
        protected function doPageLoaded()
        {
    
        }
    
        protected function doCalculateFields($rowData, $fieldName, &$value)
        {
    
        }
    
        protected function doGetCustomRecordPermissions(Page $page, &$usingCondition, $rowData, &$allowEdit, &$allowDelete, &$mergeWithDefault, &$handled)
        {
    
        }
    
        protected function doAddEnvironmentVariables(Page $page, &$variables)
        {
    
        }
    
    }
    
    class tbl_usuarios_id_deptoNestedPage extends NestedFormPage
    {
        protected function DoBeforeCreate()
        {
            $this->dataset = new TableDataset(
                MyPDOConnectionFactory::getInstance(),
                GetConnectionOptions(),
                '`tbl_departamento`');
            $this->dataset->addFields(
                array(
                    new IntegerField('id_depto', true, true, true),
                    new IntegerField('idConcessiona', true),
                    new StringField('Descricao')
                )
            );
            $this->dataset->AddLookupField('idConcessiona', 'tbl_concessionarias', new IntegerField('idConcessiona'), new StringField('NomeConcessionaria', false, false, false, false, 'idConcessiona_NomeConcessionaria', 'idConcessiona_NomeConcessionaria_tbl_concessionarias'), 'idConcessiona_NomeConcessionaria_tbl_concessionarias');
        }
    
        protected function DoPrepare() {
    
        }
    
        protected function AddInsertColumns(Grid $grid)
        {
            //
            // Edit column for idConcessiona field
            //
            $editor = new DynamicCombobox('idconcessiona_edit', $this->CreateLinkBuilder());
            $editor->setAllowClear(true);
            $editor->setMinimumInputLength(0);
            $lookupDataset = new TableDataset(
                MyPDOConnectionFactory::getInstance(),
                GetConnectionOptions(),
                '`tbl_concessionarias`');
            $lookupDataset->addFields(
                array(
                    new IntegerField('idConcessiona', true, true, true),
                    new StringField('Lote', true, true),
                    new StringField('NumCNPJ', true, true),
                    new StringField('NomeConcessionaria', true),
                    new DateTimeField('dtInicioConcessao', true),
                    new DateTimeField('dtTerminoConcessao', true),
                    new StringField('Edital'),
                    new StringField('UsuarioResponsavel'),
                    new StringField('email'),
                    new StringField('Telefone'),
                    new StringField('site'),
                    new IntegerField('id_fiscalizadora'),
                    new BlobField('image_log')
                )
            );
            $lookupDataset->setOrderByField('NomeConcessionaria', 'ASC');
            $editColumn = new DynamicLookupEditColumn('Id Concessiona', 'idConcessiona', 'idConcessiona_NomeConcessionaria', 'insert_tbl_usuarios_id_deptoNestedPage_idConcessiona_search', $editor, $this->dataset, $lookupDataset, 'idConcessiona', 'NomeConcessionaria', '');
            $validator = new RequiredValidator(StringUtils::Format($this->GetLocalizerCaptions()->GetMessageString('RequiredValidationMessage'), $editColumn->GetCaption()));
            $editor->GetValidatorCollection()->AddValidator($validator);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddInsertColumn($editColumn);
            
            //
            // Edit column for Descricao field
            //
            $editor = new TextEdit('descricao_edit');
            $editor->SetMaxLength(20);
            $editColumn = new CustomEditColumn('Descricao', 'Descricao', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddInsertColumn($editColumn);
        }
    
        function GetCustomClientScript()
        {
            return ;
        }
        
        function GetOnPageLoadedClientScript()
        {
            return ;
        }
    
        protected function setClientSideEvents(Grid $grid) {
    
        }
    
        protected function ApplyCommonColumnEditProperties(CustomEditColumn $column)
        {
            $column->SetDisplaySetToNullCheckBox(false);
            $column->SetDisplaySetToDefaultCheckBox(false);
            $column->SetVariableContainer($this->GetColumnVariableContainer());
        }
    
       static public function getNestedInsertHandlerName()
        {
            return get_class() . '_form_insert';
        }
    
        public function GetGridInsertHandler()
        {
            return self::getNestedInsertHandlerName();
        }
    
        protected function doGetCustomTemplate($type, $part, $mode, &$result, &$params)
        {
    
        }
    
        protected function doGetCustomFormLayout($mode, FixedKeysArray $columns, FormLayout $layout)
        {
    
        }
    
        protected function doFileUpload($fieldName, $rowData, &$result, &$accept, $originalFileName, $originalFileExtension, $fileSize, $tempFileName)
        {
    
        }
    
        public function doCustomDefaultValues(&$values, &$handled) 
        {
    
        }
    
        protected function doBeforeInsertRecord($page, &$rowData, $tableName, &$cancel, &$message, &$messageDisplayTime)
        {
    
        }
    
        protected function doAfterInsertRecord($page, $rowData, $tableName, &$success, &$message, &$messageDisplayTime)
        {
    
        }
    
    }
    
    class tbl_usuarios_grupo_idgrupoNestedPage extends NestedFormPage
    {
        protected function DoBeforeCreate()
        {
            $this->dataset = new TableDataset(
                MyPDOConnectionFactory::getInstance(),
                GetConnectionOptions(),
                '`grupo`');
            $this->dataset->addFields(
                array(
                    new IntegerField('idgrupo', true, true, true),
                    new StringField('descricao_grupo')
                )
            );
        }
    
        protected function DoPrepare() {
    
        }
    
        protected function AddInsertColumns(Grid $grid)
        {
            //
            // Edit column for descricao_grupo field
            //
            $editor = new TextEdit('descricao_grupo_edit');
            $editor->SetMaxLength(45);
            $editColumn = new CustomEditColumn('Descricao Grupo', 'descricao_grupo', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddInsertColumn($editColumn);
        }
    
        function GetCustomClientScript()
        {
            return ;
        }
        
        function GetOnPageLoadedClientScript()
        {
            return ;
        }
    
        protected function setClientSideEvents(Grid $grid) {
    
        }
    
        protected function ApplyCommonColumnEditProperties(CustomEditColumn $column)
        {
            $column->SetDisplaySetToNullCheckBox(false);
            $column->SetDisplaySetToDefaultCheckBox(false);
            $column->SetVariableContainer($this->GetColumnVariableContainer());
        }
    
       static public function getNestedInsertHandlerName()
        {
            return get_class() . '_form_insert';
        }
    
        public function GetGridInsertHandler()
        {
            return self::getNestedInsertHandlerName();
        }
    
        protected function doGetCustomTemplate($type, $part, $mode, &$result, &$params)
        {
    
        }
    
        protected function doGetCustomFormLayout($mode, FixedKeysArray $columns, FormLayout $layout)
        {
    
        }
    
        protected function doFileUpload($fieldName, $rowData, &$result, &$accept, $originalFileName, $originalFileExtension, $fileSize, $tempFileName)
        {
    
        }
    
        public function doCustomDefaultValues(&$values, &$handled) 
        {
    
        }
    
        protected function doBeforeInsertRecord($page, &$rowData, $tableName, &$cancel, &$message, &$messageDisplayTime)
        {
    
        }
    
        protected function doAfterInsertRecord($page, $rowData, $tableName, &$success, &$message, &$messageDisplayTime)
        {
    
        }
    
    }
    
    // OnBeforePageExecute event handler
    
    
    
    class tbl_usuariosPage extends Page
    {
        protected function DoBeforeCreate()
        {
            $this->SetTitle('CADASTRO DE USUÁRIOS');
            $this->SetMenuLabel('CADASTRO DE USUÁRIOS');
    
            $this->dataset = new TableDataset(
                MyPDOConnectionFactory::getInstance(),
                GetConnectionOptions(),
                '`tbl_usuarios`');
            $this->dataset->addFields(
                array(
                    new IntegerField('idUsuario', true, true, true),
                    new StringField('Nome Operador', true),
                    new StringField('Usuario', true),
                    new StringField('Senha', true),
                    new StringField('Telefone'),
                    new StringField('Email', true),
                    new IntegerField('AtivoMobile'),
                    new IntegerField('is_head_manager'),
                    new IntegerField('is_blocked'),
                    new IntegerField('id_depto'),
                    new IntegerField('grupo_idgrupo')
                )
            );
            $this->dataset->AddLookupField('id_depto', 'tbl_departamento', new IntegerField('id_depto'), new StringField('Descricao', false, false, false, false, 'id_depto_Descricao', 'id_depto_Descricao_tbl_departamento'), 'id_depto_Descricao_tbl_departamento');
            $this->dataset->AddLookupField('grupo_idgrupo', 'grupo', new IntegerField('idgrupo'), new StringField('descricao_grupo', false, false, false, false, 'grupo_idgrupo_descricao_grupo', 'grupo_idgrupo_descricao_grupo_grupo'), 'grupo_idgrupo_descricao_grupo_grupo');
        }
    
        protected function DoPrepare() {
    
        }
    
        protected function CreatePageNavigator()
        {
            $result = new CompositePageNavigator($this);
            
            $partitionNavigator = new PageNavigator('pnav', $this, $this->dataset);
            $partitionNavigator->SetRowsPerPage(40);
            $result->AddPageNavigator($partitionNavigator);
            
            return $result;
        }
    
        protected function CreateRssGenerator()
        {
            return null;
        }
    
        protected function setupCharts()
        {
    
        }
    
        protected function getFiltersColumns()
        {
            return array(
                new FilterColumn($this->dataset, 'idUsuario', 'idUsuario', 'Número Identificação'),
                new FilterColumn($this->dataset, 'Nome Operador', 'Nome Operador', 'Nome'),
                new FilterColumn($this->dataset, 'Usuario', 'Usuario', 'Login'),
                new FilterColumn($this->dataset, 'Senha', 'Senha', 'Senha'),
                new FilterColumn($this->dataset, 'Telefone', 'Telefone', 'Telefone'),
                new FilterColumn($this->dataset, 'Email', 'Email', 'Email'),
                new FilterColumn($this->dataset, 'AtivoMobile', 'AtivoMobile', 'Ativo'),
                new FilterColumn($this->dataset, 'is_head_manager', 'is_head_manager', 'Gerente'),
                new FilterColumn($this->dataset, 'is_blocked', 'is_blocked', 'Bloqueado'),
                new FilterColumn($this->dataset, 'id_depto', 'id_depto_Descricao', 'Associado'),
                new FilterColumn($this->dataset, 'grupo_idgrupo', 'grupo_idgrupo_descricao_grupo', 'Grupo')
            );
        }
    
        protected function setupQuickFilter(QuickFilter $quickFilter, FixedKeysArray $columns)
        {
            $quickFilter
                ->addColumn($columns['idUsuario'])
                ->addColumn($columns['Nome Operador'])
                ->addColumn($columns['Usuario'])
                ->addColumn($columns['Senha'])
                ->addColumn($columns['Telefone'])
                ->addColumn($columns['Email'])
                ->addColumn($columns['AtivoMobile'])
                ->addColumn($columns['is_head_manager'])
                ->addColumn($columns['is_blocked'])
                ->addColumn($columns['id_depto'])
                ->addColumn($columns['grupo_idgrupo']);
        }
    
        protected function setupColumnFilter(ColumnFilter $columnFilter)
        {
            $columnFilter
                ->setOptionsFor('id_depto')
                ->setOptionsFor('grupo_idgrupo');
        }
    
        protected function setupFilterBuilder(FilterBuilder $filterBuilder, FixedKeysArray $columns)
        {
            $main_editor = new TextEdit('idusuario_edit');
            
            $filterBuilder->addColumn(
                $columns['idUsuario'],
                array(
                    FilterConditionOperator::EQUALS => $main_editor,
                    FilterConditionOperator::DOES_NOT_EQUAL => $main_editor,
                    FilterConditionOperator::IS_GREATER_THAN => $main_editor,
                    FilterConditionOperator::IS_GREATER_THAN_OR_EQUAL_TO => $main_editor,
                    FilterConditionOperator::IS_LESS_THAN => $main_editor,
                    FilterConditionOperator::IS_LESS_THAN_OR_EQUAL_TO => $main_editor,
                    FilterConditionOperator::IS_BETWEEN => $main_editor,
                    FilterConditionOperator::IS_NOT_BETWEEN => $main_editor,
                    FilterConditionOperator::IS_BLANK => null,
                    FilterConditionOperator::IS_NOT_BLANK => null
                )
            );
            
            $main_editor = new TextEdit('nome_operador_edit');
            $main_editor->SetMaxLength(40);
            
            $filterBuilder->addColumn(
                $columns['Nome Operador'],
                array(
                    FilterConditionOperator::EQUALS => $main_editor,
                    FilterConditionOperator::DOES_NOT_EQUAL => $main_editor,
                    FilterConditionOperator::IS_GREATER_THAN => $main_editor,
                    FilterConditionOperator::IS_GREATER_THAN_OR_EQUAL_TO => $main_editor,
                    FilterConditionOperator::IS_LESS_THAN => $main_editor,
                    FilterConditionOperator::IS_LESS_THAN_OR_EQUAL_TO => $main_editor,
                    FilterConditionOperator::IS_BETWEEN => $main_editor,
                    FilterConditionOperator::IS_NOT_BETWEEN => $main_editor,
                    FilterConditionOperator::CONTAINS => $main_editor,
                    FilterConditionOperator::DOES_NOT_CONTAIN => $main_editor,
                    FilterConditionOperator::BEGINS_WITH => $main_editor,
                    FilterConditionOperator::ENDS_WITH => $main_editor,
                    FilterConditionOperator::IS_LIKE => $main_editor,
                    FilterConditionOperator::IS_NOT_LIKE => $main_editor,
                    FilterConditionOperator::IS_BLANK => null,
                    FilterConditionOperator::IS_NOT_BLANK => null
                )
            );
            
            $main_editor = new TextEdit('usuario_edit');
            $main_editor->SetMaxLength(10);
            
            $filterBuilder->addColumn(
                $columns['Usuario'],
                array(
                    FilterConditionOperator::EQUALS => $main_editor,
                    FilterConditionOperator::DOES_NOT_EQUAL => $main_editor,
                    FilterConditionOperator::IS_GREATER_THAN => $main_editor,
                    FilterConditionOperator::IS_GREATER_THAN_OR_EQUAL_TO => $main_editor,
                    FilterConditionOperator::IS_LESS_THAN => $main_editor,
                    FilterConditionOperator::IS_LESS_THAN_OR_EQUAL_TO => $main_editor,
                    FilterConditionOperator::IS_BETWEEN => $main_editor,
                    FilterConditionOperator::IS_NOT_BETWEEN => $main_editor,
                    FilterConditionOperator::CONTAINS => $main_editor,
                    FilterConditionOperator::DOES_NOT_CONTAIN => $main_editor,
                    FilterConditionOperator::BEGINS_WITH => $main_editor,
                    FilterConditionOperator::ENDS_WITH => $main_editor,
                    FilterConditionOperator::IS_LIKE => $main_editor,
                    FilterConditionOperator::IS_NOT_LIKE => $main_editor,
                    FilterConditionOperator::IS_BLANK => null,
                    FilterConditionOperator::IS_NOT_BLANK => null
                )
            );
            
            $main_editor = new TextEdit('senha_edit');
            $main_editor->SetMaxLength(10);
            
            $filterBuilder->addColumn(
                $columns['Senha'],
                array(
                    FilterConditionOperator::EQUALS => $main_editor,
                    FilterConditionOperator::DOES_NOT_EQUAL => $main_editor,
                    FilterConditionOperator::IS_GREATER_THAN => $main_editor,
                    FilterConditionOperator::IS_GREATER_THAN_OR_EQUAL_TO => $main_editor,
                    FilterConditionOperator::IS_LESS_THAN => $main_editor,
                    FilterConditionOperator::IS_LESS_THAN_OR_EQUAL_TO => $main_editor,
                    FilterConditionOperator::IS_BETWEEN => $main_editor,
                    FilterConditionOperator::IS_NOT_BETWEEN => $main_editor,
                    FilterConditionOperator::CONTAINS => $main_editor,
                    FilterConditionOperator::DOES_NOT_CONTAIN => $main_editor,
                    FilterConditionOperator::BEGINS_WITH => $main_editor,
                    FilterConditionOperator::ENDS_WITH => $main_editor,
                    FilterConditionOperator::IS_LIKE => $main_editor,
                    FilterConditionOperator::IS_NOT_LIKE => $main_editor,
                    FilterConditionOperator::IS_BLANK => null,
                    FilterConditionOperator::IS_NOT_BLANK => null
                )
            );
            
            $main_editor = new MaskedEdit('telefone_edit', '99-9999-9999');
            
            $text_editor = new TextEdit('Telefone');
            
            $filterBuilder->addColumn(
                $columns['Telefone'],
                array(
                    FilterConditionOperator::EQUALS => $main_editor,
                    FilterConditionOperator::DOES_NOT_EQUAL => $main_editor,
                    FilterConditionOperator::IS_GREATER_THAN => $main_editor,
                    FilterConditionOperator::IS_GREATER_THAN_OR_EQUAL_TO => $main_editor,
                    FilterConditionOperator::IS_LESS_THAN => $main_editor,
                    FilterConditionOperator::IS_LESS_THAN_OR_EQUAL_TO => $main_editor,
                    FilterConditionOperator::IS_BETWEEN => $main_editor,
                    FilterConditionOperator::IS_NOT_BETWEEN => $main_editor,
                    FilterConditionOperator::CONTAINS => $text_editor,
                    FilterConditionOperator::DOES_NOT_CONTAIN => $text_editor,
                    FilterConditionOperator::BEGINS_WITH => $text_editor,
                    FilterConditionOperator::ENDS_WITH => $text_editor,
                    FilterConditionOperator::IS_LIKE => $text_editor,
                    FilterConditionOperator::IS_NOT_LIKE => $text_editor,
                    FilterConditionOperator::IS_BLANK => null,
                    FilterConditionOperator::IS_NOT_BLANK => null
                )
            );
            
            $main_editor = new TextEdit('email_edit');
            $main_editor->SetMaxLength(50);
            
            $filterBuilder->addColumn(
                $columns['Email'],
                array(
                    FilterConditionOperator::EQUALS => $main_editor,
                    FilterConditionOperator::DOES_NOT_EQUAL => $main_editor,
                    FilterConditionOperator::IS_GREATER_THAN => $main_editor,
                    FilterConditionOperator::IS_GREATER_THAN_OR_EQUAL_TO => $main_editor,
                    FilterConditionOperator::IS_LESS_THAN => $main_editor,
                    FilterConditionOperator::IS_LESS_THAN_OR_EQUAL_TO => $main_editor,
                    FilterConditionOperator::IS_BETWEEN => $main_editor,
                    FilterConditionOperator::IS_NOT_BETWEEN => $main_editor,
                    FilterConditionOperator::CONTAINS => $main_editor,
                    FilterConditionOperator::DOES_NOT_CONTAIN => $main_editor,
                    FilterConditionOperator::BEGINS_WITH => $main_editor,
                    FilterConditionOperator::ENDS_WITH => $main_editor,
                    FilterConditionOperator::IS_LIKE => $main_editor,
                    FilterConditionOperator::IS_NOT_LIKE => $main_editor,
                    FilterConditionOperator::IS_BLANK => null,
                    FilterConditionOperator::IS_NOT_BLANK => null
                )
            );
            
            $main_editor = new ComboBox('AtivoMobile');
            $main_editor->SetAllowNullValue(false);
            $main_editor->addChoice(true, $this->GetLocalizerCaptions()->GetMessageString('True'));
            $main_editor->addChoice(false, $this->GetLocalizerCaptions()->GetMessageString('False'));
            
            $filterBuilder->addColumn(
                $columns['AtivoMobile'],
                array(
                    FilterConditionOperator::EQUALS => $main_editor,
                    FilterConditionOperator::DOES_NOT_EQUAL => $main_editor,
                    FilterConditionOperator::IS_BLANK => null,
                    FilterConditionOperator::IS_NOT_BLANK => null
                )
            );
            
            $main_editor = new ComboBox('is_head_manager');
            $main_editor->SetAllowNullValue(false);
            $main_editor->addChoice(true, $this->GetLocalizerCaptions()->GetMessageString('True'));
            $main_editor->addChoice(false, $this->GetLocalizerCaptions()->GetMessageString('False'));
            
            $filterBuilder->addColumn(
                $columns['is_head_manager'],
                array(
                    FilterConditionOperator::EQUALS => $main_editor,
                    FilterConditionOperator::DOES_NOT_EQUAL => $main_editor,
                    FilterConditionOperator::IS_BLANK => null,
                    FilterConditionOperator::IS_NOT_BLANK => null
                )
            );
            
            $main_editor = new ComboBox('is_blocked');
            $main_editor->SetAllowNullValue(false);
            $main_editor->addChoice(true, $this->GetLocalizerCaptions()->GetMessageString('True'));
            $main_editor->addChoice(false, $this->GetLocalizerCaptions()->GetMessageString('False'));
            
            $filterBuilder->addColumn(
                $columns['is_blocked'],
                array(
                    FilterConditionOperator::EQUALS => $main_editor,
                    FilterConditionOperator::DOES_NOT_EQUAL => $main_editor,
                    FilterConditionOperator::IS_BLANK => null,
                    FilterConditionOperator::IS_NOT_BLANK => null
                )
            );
            
            $main_editor = new DynamicCombobox('id_depto_edit', $this->CreateLinkBuilder());
            $main_editor->setAllowClear(true);
            $main_editor->setMinimumInputLength(0);
            $main_editor->SetAllowNullValue(false);
            $main_editor->SetHandlerName('filter_builder_tbl_usuarios_id_depto_search');
            
            $multi_value_select_editor = new RemoteMultiValueSelect('id_depto', $this->CreateLinkBuilder());
            $multi_value_select_editor->SetHandlerName('filter_builder_tbl_usuarios_id_depto_search');
            
            $filterBuilder->addColumn(
                $columns['id_depto'],
                array(
                    FilterConditionOperator::EQUALS => $main_editor,
                    FilterConditionOperator::DOES_NOT_EQUAL => $main_editor,
                    FilterConditionOperator::IS_GREATER_THAN => $main_editor,
                    FilterConditionOperator::IS_GREATER_THAN_OR_EQUAL_TO => $main_editor,
                    FilterConditionOperator::IS_LESS_THAN => $main_editor,
                    FilterConditionOperator::IS_LESS_THAN_OR_EQUAL_TO => $main_editor,
                    FilterConditionOperator::IS_BETWEEN => $main_editor,
                    FilterConditionOperator::IS_NOT_BETWEEN => $main_editor,
                    FilterConditionOperator::IN => $multi_value_select_editor,
                    FilterConditionOperator::NOT_IN => $multi_value_select_editor,
                    FilterConditionOperator::IS_BLANK => null,
                    FilterConditionOperator::IS_NOT_BLANK => null
                )
            );
            
            $main_editor = new DynamicCombobox('grupo_idgrupo_edit', $this->CreateLinkBuilder());
            $main_editor->setAllowClear(true);
            $main_editor->setMinimumInputLength(0);
            $main_editor->SetAllowNullValue(false);
            $main_editor->SetHandlerName('filter_builder_tbl_usuarios_grupo_idgrupo_search');
            
            $multi_value_select_editor = new RemoteMultiValueSelect('grupo_idgrupo', $this->CreateLinkBuilder());
            $multi_value_select_editor->SetHandlerName('filter_builder_tbl_usuarios_grupo_idgrupo_search');
            
            $filterBuilder->addColumn(
                $columns['grupo_idgrupo'],
                array(
                    FilterConditionOperator::EQUALS => $main_editor,
                    FilterConditionOperator::DOES_NOT_EQUAL => $main_editor,
                    FilterConditionOperator::IS_GREATER_THAN => $main_editor,
                    FilterConditionOperator::IS_GREATER_THAN_OR_EQUAL_TO => $main_editor,
                    FilterConditionOperator::IS_LESS_THAN => $main_editor,
                    FilterConditionOperator::IS_LESS_THAN_OR_EQUAL_TO => $main_editor,
                    FilterConditionOperator::IS_BETWEEN => $main_editor,
                    FilterConditionOperator::IS_NOT_BETWEEN => $main_editor,
                    FilterConditionOperator::IN => $multi_value_select_editor,
                    FilterConditionOperator::NOT_IN => $multi_value_select_editor,
                    FilterConditionOperator::IS_BLANK => null,
                    FilterConditionOperator::IS_NOT_BLANK => null
                )
            );
        }
    
        protected function AddOperationsColumns(Grid $grid)
        {
            $actions = $grid->getActions();
            $actions->setCaption($this->GetLocalizerCaptions()->GetMessageString('Actions'));
            $actions->setPosition(ActionList::POSITION_LEFT);
            
            if ($this->GetSecurityInfo()->HasViewGrant())
            {
                $operation = new LinkOperation($this->GetLocalizerCaptions()->GetMessageString('View'), OPERATION_VIEW, $this->dataset, $grid);
                $operation->setUseImage(true);
                $actions->addOperation($operation);
            }
            
            if ($this->GetSecurityInfo()->HasEditGrant())
            {
                $operation = new LinkOperation($this->GetLocalizerCaptions()->GetMessageString('Edit'), OPERATION_EDIT, $this->dataset, $grid);
                $operation->setUseImage(true);
                $actions->addOperation($operation);
                $operation->OnShow->AddListener('ShowEditButtonHandler', $this);
            }
            
            if ($this->GetSecurityInfo()->HasDeleteGrant())
            {
                $operation = new LinkOperation($this->GetLocalizerCaptions()->GetMessageString('Delete'), OPERATION_DELETE, $this->dataset, $grid);
                $operation->setUseImage(true);
                $actions->addOperation($operation);
                $operation->OnShow->AddListener('ShowDeleteButtonHandler', $this);
                $operation->SetAdditionalAttribute('data-modal-operation', 'delete');
                $operation->SetAdditionalAttribute('data-delete-handler-name', $this->GetModalGridDeleteHandler());
            }
            
            if ($this->GetSecurityInfo()->HasAddGrant())
            {
                $operation = new LinkOperation($this->GetLocalizerCaptions()->GetMessageString('Copy'), OPERATION_COPY, $this->dataset, $grid);
                $operation->setUseImage(true);
                $actions->addOperation($operation);
            }
        }
    
        protected function AddFieldColumns(Grid $grid, $withDetails = true)
        {
            if (GetCurrentUserPermissionsForPage('tbl_usuarios.tbl_role_membership')->HasViewGrant() && $withDetails)
            {
            //
            // View column for tbl_usuarios_tbl_role_membership detail
            //
            $column = new DetailColumn(array('idUsuario'), 'tbl_usuarios.tbl_role_membership', 'tbl_usuarios_tbl_role_membership_handler', $this->dataset, 'REGRAS DE ASSOCIAÇÃO USUARIO');
            $column->setMinimalVisibility(ColumnVisibility::PHONE);
            $grid->AddViewColumn($column);
            }
            
            if (GetCurrentUserPermissionsForPage('tbl_usuarios.tbl_usuarios_concessionarias')->HasViewGrant() && $withDetails)
            {
            //
            // View column for tbl_usuarios_tbl_usuarios_concessionarias detail
            //
            $column = new DetailColumn(array('idUsuario'), 'tbl_usuarios.tbl_usuarios_concessionarias', 'tbl_usuarios_tbl_usuarios_concessionarias_handler', $this->dataset, 'ASSOCIAÇÃO USUÁRIO CONCESSIONÁRIA');
            $column->setMinimalVisibility(ColumnVisibility::PHONE);
            $grid->AddViewColumn($column);
            }
            
            if (GetCurrentUserPermissionsForPage('tbl_usuarios.tbl_usuarios_eafs')->HasViewGrant() && $withDetails)
            {
            //
            // View column for tbl_usuarios_tbl_usuarios_eafs detail
            //
            $column = new DetailColumn(array('idUsuario'), 'tbl_usuarios.tbl_usuarios_eafs', 'tbl_usuarios_tbl_usuarios_eafs_handler', $this->dataset, 'ASSOCIAÇÃO USUÁRIO FISCALIZADORA');
            $column->setMinimalVisibility(ColumnVisibility::PHONE);
            $grid->AddViewColumn($column);
            }
            
            //
            // View column for Nome Operador field
            //
            $column = new TextViewColumn('Nome Operador', 'Nome Operador', 'Nome', $this->dataset);
            $column->SetOrderable(true);
            $column->setMinimalVisibility(ColumnVisibility::PHONE);
            $column->SetDescription('');
            $column->SetFixedWidth(null);
            $grid->AddViewColumn($column);
            
            //
            // View column for Usuario field
            //
            $column = new TextViewColumn('Usuario', 'Usuario', 'Login', $this->dataset);
            $column->SetOrderable(true);
            $column->setMinimalVisibility(ColumnVisibility::PHONE);
            $column->SetDescription('');
            $column->SetFixedWidth(null);
            $grid->AddViewColumn($column);
            
            //
            // View column for Telefone field
            //
            $column = new TextViewColumn('Telefone', 'Telefone', 'Telefone', $this->dataset);
            $column->SetOrderable(true);
            $column->setMinimalVisibility(ColumnVisibility::PHONE);
            $column->SetDescription('');
            $column->SetFixedWidth(null);
            $grid->AddViewColumn($column);
            
            //
            // View column for Email field
            //
            $column = new TextViewColumn('Email', 'Email', 'Email', $this->dataset);
            $column->SetOrderable(true);
            $column->setMinimalVisibility(ColumnVisibility::PHONE);
            $column->SetDescription('');
            $column->SetFixedWidth(null);
            $grid->AddViewColumn($column);
            
            //
            // View column for Descricao field
            //
            $column = new TextViewColumn('id_depto', 'id_depto_Descricao', 'Associado', $this->dataset);
            $column->SetOrderable(true);
            $column->setMinimalVisibility(ColumnVisibility::PHONE);
            $column->SetDescription('');
            $column->SetFixedWidth(null);
            $grid->AddViewColumn($column);
            
            //
            // View column for descricao_grupo field
            //
            $column = new TextViewColumn('grupo_idgrupo', 'grupo_idgrupo_descricao_grupo', 'Grupo', $this->dataset);
            $column->SetOrderable(true);
            $column->setMinimalVisibility(ColumnVisibility::PHONE);
            $column->SetDescription('');
            $column->SetFixedWidth(null);
            $grid->AddViewColumn($column);
        }
    
        protected function AddSingleRecordViewColumns(Grid $grid)
        {
            //
            // View column for idUsuario field
            //
            $column = new NumberViewColumn('idUsuario', 'idUsuario', 'Número Identificação', $this->dataset);
            $column->SetOrderable(true);
            $column->setNumberAfterDecimal(0);
            $column->setThousandsSeparator('.');
            $column->setDecimalSeparator('');
            $grid->AddSingleRecordViewColumn($column);
            
            //
            // View column for Nome Operador field
            //
            $column = new TextViewColumn('Nome Operador', 'Nome Operador', 'Nome', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddSingleRecordViewColumn($column);
            
            //
            // View column for Usuario field
            //
            $column = new TextViewColumn('Usuario', 'Usuario', 'Login', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddSingleRecordViewColumn($column);
            
            //
            // View column for Senha field
            //
            $column = new TextViewColumn('Senha', 'Senha', 'Senha', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddSingleRecordViewColumn($column);
            
            //
            // View column for Telefone field
            //
            $column = new TextViewColumn('Telefone', 'Telefone', 'Telefone', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddSingleRecordViewColumn($column);
            
            //
            // View column for Email field
            //
            $column = new TextViewColumn('Email', 'Email', 'Email', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddSingleRecordViewColumn($column);
            
            //
            // View column for AtivoMobile field
            //
            $column = new NumberViewColumn('AtivoMobile', 'AtivoMobile', 'Ativo', $this->dataset);
            $column->SetOrderable(true);
            $column->setNumberAfterDecimal(0);
            $column->setThousandsSeparator('.');
            $column->setDecimalSeparator('');
            $grid->AddSingleRecordViewColumn($column);
            
            //
            // View column for is_head_manager field
            //
            $column = new NumberViewColumn('is_head_manager', 'is_head_manager', 'Gerente', $this->dataset);
            $column->SetOrderable(true);
            $column->setNumberAfterDecimal(0);
            $column->setThousandsSeparator('.');
            $column->setDecimalSeparator('');
            $grid->AddSingleRecordViewColumn($column);
            
            //
            // View column for is_blocked field
            //
            $column = new NumberViewColumn('is_blocked', 'is_blocked', 'Bloqueado', $this->dataset);
            $column->SetOrderable(true);
            $column->setNumberAfterDecimal(0);
            $column->setThousandsSeparator('.');
            $column->setDecimalSeparator('');
            $grid->AddSingleRecordViewColumn($column);
            
            //
            // View column for Descricao field
            //
            $column = new TextViewColumn('id_depto', 'id_depto_Descricao', 'Associado', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddSingleRecordViewColumn($column);
            
            //
            // View column for descricao_grupo field
            //
            $column = new TextViewColumn('grupo_idgrupo', 'grupo_idgrupo_descricao_grupo', 'Grupo', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddSingleRecordViewColumn($column);
        }
    
        protected function AddEditColumns(Grid $grid)
        {
            //
            // Edit column for Nome Operador field
            //
            $editor = new TextEdit('nome_operador_edit');
            $editor->SetMaxLength(40);
            $editColumn = new CustomEditColumn('Nome', 'Nome Operador', $editor, $this->dataset);
            $validator = new RequiredValidator(StringUtils::Format($this->GetLocalizerCaptions()->GetMessageString('RequiredValidationMessage'), $editColumn->GetCaption()));
            $editor->GetValidatorCollection()->AddValidator($validator);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddEditColumn($editColumn);
            
            //
            // Edit column for Usuario field
            //
            $editor = new TextEdit('usuario_edit');
            $editor->SetMaxLength(10);
            $editColumn = new CustomEditColumn('Login', 'Usuario', $editor, $this->dataset);
            $validator = new RequiredValidator(StringUtils::Format($this->GetLocalizerCaptions()->GetMessageString('RequiredValidationMessage'), $editColumn->GetCaption()));
            $editor->GetValidatorCollection()->AddValidator($validator);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddEditColumn($editColumn);
            
            //
            // Edit column for Senha field
            //
            $editor = new TextEdit('senha_edit');
            $editor->SetMaxLength(10);
            $editColumn = new CustomEditColumn('Senha', 'Senha', $editor, $this->dataset);
            $validator = new RequiredValidator(StringUtils::Format($this->GetLocalizerCaptions()->GetMessageString('RequiredValidationMessage'), $editColumn->GetCaption()));
            $editor->GetValidatorCollection()->AddValidator($validator);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddEditColumn($editColumn);
            
            //
            // Edit column for Telefone field
            //
            $editor = new MaskedEdit('telefone_edit', '99-9999-9999');
            $editColumn = new CustomEditColumn('Telefone', 'Telefone', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddEditColumn($editColumn);
            
            //
            // Edit column for Email field
            //
            $editor = new TextEdit('email_edit');
            $editor->SetMaxLength(50);
            $editColumn = new CustomEditColumn('Email', 'Email', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddEditColumn($editColumn);
            
            //
            // Edit column for AtivoMobile field
            //
            $editor = new CheckBox('ativomobile_edit');
            $editColumn = new CustomEditColumn('Ativo', 'AtivoMobile', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddEditColumn($editColumn);
            
            //
            // Edit column for is_head_manager field
            //
            $editor = new CheckBox('is_head_manager_edit');
            $editColumn = new CustomEditColumn('Gerente', 'is_head_manager', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddEditColumn($editColumn);
            
            //
            // Edit column for is_blocked field
            //
            $editor = new CheckBox('is_blocked_edit');
            $editColumn = new CustomEditColumn('Bloqueado', 'is_blocked', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddEditColumn($editColumn);
            
            //
            // Edit column for id_depto field
            //
            $editor = new DynamicCombobox('id_depto_edit', $this->CreateLinkBuilder());
            $editor->setAllowClear(true);
            $editor->setMinimumInputLength(0);
            $lookupDataset = new TableDataset(
                MyPDOConnectionFactory::getInstance(),
                GetConnectionOptions(),
                '`tbl_departamento`');
            $lookupDataset->addFields(
                array(
                    new IntegerField('id_depto', true, true, true),
                    new IntegerField('idConcessiona', true),
                    new StringField('Descricao')
                )
            );
            $lookupDataset->setOrderByField('Descricao', 'ASC');
            $editColumn = new DynamicLookupEditColumn('Associado', 'id_depto', 'id_depto_Descricao', 'edit_tbl_usuarios_id_depto_search', $editor, $this->dataset, $lookupDataset, 'id_depto', 'Descricao', '');
            $editColumn->setNestedInsertFormLink(
                $this->GetHandlerLink(tbl_usuarios_id_deptoNestedPage::getNestedInsertHandlerName())
            );
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddEditColumn($editColumn);
            
            //
            // Edit column for grupo_idgrupo field
            //
            $editor = new DynamicCombobox('grupo_idgrupo_edit', $this->CreateLinkBuilder());
            $editor->setAllowClear(true);
            $editor->setMinimumInputLength(0);
            $lookupDataset = new TableDataset(
                MyPDOConnectionFactory::getInstance(),
                GetConnectionOptions(),
                '`grupo`');
            $lookupDataset->addFields(
                array(
                    new IntegerField('idgrupo', true, true, true),
                    new StringField('descricao_grupo')
                )
            );
            $lookupDataset->setOrderByField('descricao_grupo', 'ASC');
            $editColumn = new DynamicLookupEditColumn('Grupo', 'grupo_idgrupo', 'grupo_idgrupo_descricao_grupo', '_tbl_usuarios_grupo_idgrupo_search', $editor, $this->dataset, $lookupDataset, 'idgrupo', 'descricao_grupo', '');
            $editColumn->setNestedInsertFormLink(
                $this->GetHandlerLink(tbl_usuarios_grupo_idgrupoNestedPage::getNestedInsertHandlerName())
            );
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddEditColumn($editColumn);
        }
    
        protected function AddMultiEditColumns(Grid $grid)
        {
            //
            // Edit column for Usuario field
            //
            $editor = new TextEdit('usuario_edit');
            $editor->SetMaxLength(10);
            $editColumn = new CustomEditColumn('Login', 'Usuario', $editor, $this->dataset);
            $validator = new RequiredValidator(StringUtils::Format($this->GetLocalizerCaptions()->GetMessageString('RequiredValidationMessage'), $editColumn->GetCaption()));
            $editor->GetValidatorCollection()->AddValidator($validator);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddMultiEditColumn($editColumn);
            
            //
            // Edit column for Senha field
            //
            $editor = new TextEdit('senha_edit');
            $editor->SetMaxLength(10);
            $editColumn = new CustomEditColumn('Senha', 'Senha', $editor, $this->dataset);
            $validator = new RequiredValidator(StringUtils::Format($this->GetLocalizerCaptions()->GetMessageString('RequiredValidationMessage'), $editColumn->GetCaption()));
            $editor->GetValidatorCollection()->AddValidator($validator);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddMultiEditColumn($editColumn);
            
            //
            // Edit column for Telefone field
            //
            $editor = new MaskedEdit('telefone_edit', '99-9999-9999');
            $editColumn = new CustomEditColumn('Telefone', 'Telefone', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddMultiEditColumn($editColumn);
            
            //
            // Edit column for Email field
            //
            $editor = new TextEdit('email_edit');
            $editor->SetMaxLength(50);
            $editColumn = new CustomEditColumn('Email', 'Email', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddMultiEditColumn($editColumn);
            
            //
            // Edit column for AtivoMobile field
            //
            $editor = new CheckBox('ativomobile_edit');
            $editColumn = new CustomEditColumn('Ativo', 'AtivoMobile', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddMultiEditColumn($editColumn);
            
            //
            // Edit column for is_head_manager field
            //
            $editor = new CheckBox('is_head_manager_edit');
            $editColumn = new CustomEditColumn('Gerente', 'is_head_manager', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddMultiEditColumn($editColumn);
            
            //
            // Edit column for is_blocked field
            //
            $editor = new CheckBox('is_blocked_edit');
            $editColumn = new CustomEditColumn('Bloqueado', 'is_blocked', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddMultiEditColumn($editColumn);
            
            //
            // Edit column for id_depto field
            //
            $editor = new DynamicCombobox('id_depto_edit', $this->CreateLinkBuilder());
            $editor->setAllowClear(true);
            $editor->setMinimumInputLength(0);
            $lookupDataset = new TableDataset(
                MyPDOConnectionFactory::getInstance(),
                GetConnectionOptions(),
                '`tbl_departamento`');
            $lookupDataset->addFields(
                array(
                    new IntegerField('id_depto', true, true, true),
                    new IntegerField('idConcessiona', true),
                    new StringField('Descricao')
                )
            );
            $lookupDataset->setOrderByField('Descricao', 'ASC');
            $editColumn = new DynamicLookupEditColumn('Associado', 'id_depto', 'id_depto_Descricao', 'multi_edit_tbl_usuarios_id_depto_search', $editor, $this->dataset, $lookupDataset, 'id_depto', 'Descricao', '');
            $editColumn->setNestedInsertFormLink(
                $this->GetHandlerLink(tbl_usuarios_id_deptoNestedPage::getNestedInsertHandlerName())
            );
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddMultiEditColumn($editColumn);
            
            //
            // Edit column for grupo_idgrupo field
            //
            $editor = new DynamicCombobox('grupo_idgrupo_edit', $this->CreateLinkBuilder());
            $editor->setAllowClear(true);
            $editor->setMinimumInputLength(0);
            $lookupDataset = new TableDataset(
                MyPDOConnectionFactory::getInstance(),
                GetConnectionOptions(),
                '`grupo`');
            $lookupDataset->addFields(
                array(
                    new IntegerField('idgrupo', true, true, true),
                    new StringField('descricao_grupo')
                )
            );
            $lookupDataset->setOrderByField('descricao_grupo', 'ASC');
            $editColumn = new DynamicLookupEditColumn('Grupo', 'grupo_idgrupo', 'grupo_idgrupo_descricao_grupo', 'multi_edit_tbl_usuarios_grupo_idgrupo_search', $editor, $this->dataset, $lookupDataset, 'idgrupo', 'descricao_grupo', '');
            $editColumn->setNestedInsertFormLink(
                $this->GetHandlerLink(tbl_usuarios_grupo_idgrupoNestedPage::getNestedInsertHandlerName())
            );
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddMultiEditColumn($editColumn);
        }
    
        protected function AddInsertColumns(Grid $grid)
        {
            //
            // Edit column for Nome Operador field
            //
            $editor = new TextEdit('nome_operador_edit');
            $editor->SetMaxLength(40);
            $editColumn = new CustomEditColumn('Nome', 'Nome Operador', $editor, $this->dataset);
            $validator = new RequiredValidator(StringUtils::Format($this->GetLocalizerCaptions()->GetMessageString('RequiredValidationMessage'), $editColumn->GetCaption()));
            $editor->GetValidatorCollection()->AddValidator($validator);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddInsertColumn($editColumn);
            
            //
            // Edit column for Usuario field
            //
            $editor = new TextEdit('usuario_edit');
            $editor->SetMaxLength(10);
            $editColumn = new CustomEditColumn('Login', 'Usuario', $editor, $this->dataset);
            $validator = new RequiredValidator(StringUtils::Format($this->GetLocalizerCaptions()->GetMessageString('RequiredValidationMessage'), $editColumn->GetCaption()));
            $editor->GetValidatorCollection()->AddValidator($validator);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddInsertColumn($editColumn);
            
            //
            // Edit column for Senha field
            //
            $editor = new TextEdit('senha_edit');
            $editor->SetMaxLength(10);
            $editColumn = new CustomEditColumn('Senha', 'Senha', $editor, $this->dataset);
            $validator = new RequiredValidator(StringUtils::Format($this->GetLocalizerCaptions()->GetMessageString('RequiredValidationMessage'), $editColumn->GetCaption()));
            $editor->GetValidatorCollection()->AddValidator($validator);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddInsertColumn($editColumn);
            
            //
            // Edit column for Telefone field
            //
            $editor = new MaskedEdit('telefone_edit', '99-9999-9999');
            $editColumn = new CustomEditColumn('Telefone', 'Telefone', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddInsertColumn($editColumn);
            
            //
            // Edit column for Email field
            //
            $editor = new TextEdit('email_edit');
            $editor->SetMaxLength(50);
            $editColumn = new CustomEditColumn('Email', 'Email', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddInsertColumn($editColumn);
            
            //
            // Edit column for AtivoMobile field
            //
            $editor = new CheckBox('ativomobile_edit');
            $editColumn = new CustomEditColumn('Ativo', 'AtivoMobile', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddInsertColumn($editColumn);
            
            //
            // Edit column for is_head_manager field
            //
            $editor = new CheckBox('is_head_manager_edit');
            $editColumn = new CustomEditColumn('Gerente', 'is_head_manager', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddInsertColumn($editColumn);
            
            //
            // Edit column for is_blocked field
            //
            $editor = new CheckBox('is_blocked_edit');
            $editColumn = new CustomEditColumn('Bloqueado', 'is_blocked', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddInsertColumn($editColumn);
            
            //
            // Edit column for id_depto field
            //
            $editor = new DynamicCombobox('id_depto_edit', $this->CreateLinkBuilder());
            $editor->setAllowClear(true);
            $editor->setMinimumInputLength(0);
            $lookupDataset = new TableDataset(
                MyPDOConnectionFactory::getInstance(),
                GetConnectionOptions(),
                '`tbl_departamento`');
            $lookupDataset->addFields(
                array(
                    new IntegerField('id_depto', true, true, true),
                    new IntegerField('idConcessiona', true),
                    new StringField('Descricao')
                )
            );
            $lookupDataset->setOrderByField('Descricao', 'ASC');
            $editColumn = new DynamicLookupEditColumn('Associado', 'id_depto', 'id_depto_Descricao', 'insert_tbl_usuarios_id_depto_search', $editor, $this->dataset, $lookupDataset, 'id_depto', 'Descricao', '');
            $editColumn->setNestedInsertFormLink(
                $this->GetHandlerLink(tbl_usuarios_id_deptoNestedPage::getNestedInsertHandlerName())
            );
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddInsertColumn($editColumn);
            
            //
            // Edit column for grupo_idgrupo field
            //
            $editor = new DynamicCombobox('grupo_idgrupo_edit', $this->CreateLinkBuilder());
            $editor->setAllowClear(true);
            $editor->setMinimumInputLength(0);
            $lookupDataset = new TableDataset(
                MyPDOConnectionFactory::getInstance(),
                GetConnectionOptions(),
                '`grupo`');
            $lookupDataset->addFields(
                array(
                    new IntegerField('idgrupo', true, true, true),
                    new StringField('descricao_grupo')
                )
            );
            $lookupDataset->setOrderByField('descricao_grupo', 'ASC');
            $editColumn = new DynamicLookupEditColumn('Grupo', 'grupo_idgrupo', 'grupo_idgrupo_descricao_grupo', 'insert_tbl_usuarios_grupo_idgrupo_search', $editor, $this->dataset, $lookupDataset, 'idgrupo', 'descricao_grupo', '');
            $editColumn->setNestedInsertFormLink(
                $this->GetHandlerLink(tbl_usuarios_grupo_idgrupoNestedPage::getNestedInsertHandlerName())
            );
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddInsertColumn($editColumn);
            $grid->SetShowAddButton(true && $this->GetSecurityInfo()->HasAddGrant());
        }
    
        private function AddMultiUploadColumn(Grid $grid)
        {
    
        }
    
        protected function AddPrintColumns(Grid $grid)
        {
            //
            // View column for idUsuario field
            //
            $column = new NumberViewColumn('idUsuario', 'idUsuario', 'Número Identificação', $this->dataset);
            $column->SetOrderable(true);
            $column->setNumberAfterDecimal(0);
            $column->setThousandsSeparator('.');
            $column->setDecimalSeparator('');
            $grid->AddPrintColumn($column);
            
            //
            // View column for Nome Operador field
            //
            $column = new TextViewColumn('Nome Operador', 'Nome Operador', 'Nome', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddPrintColumn($column);
            
            //
            // View column for Usuario field
            //
            $column = new TextViewColumn('Usuario', 'Usuario', 'Login', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddPrintColumn($column);
            
            //
            // View column for Senha field
            //
            $column = new TextViewColumn('Senha', 'Senha', 'Senha', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddPrintColumn($column);
            
            //
            // View column for Telefone field
            //
            $column = new TextViewColumn('Telefone', 'Telefone', 'Telefone', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddPrintColumn($column);
            
            //
            // View column for Email field
            //
            $column = new TextViewColumn('Email', 'Email', 'Email', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddPrintColumn($column);
            
            //
            // View column for AtivoMobile field
            //
            $column = new NumberViewColumn('AtivoMobile', 'AtivoMobile', 'Ativo', $this->dataset);
            $column->SetOrderable(true);
            $column->setNumberAfterDecimal(0);
            $column->setThousandsSeparator('.');
            $column->setDecimalSeparator('');
            $grid->AddPrintColumn($column);
            
            //
            // View column for is_head_manager field
            //
            $column = new NumberViewColumn('is_head_manager', 'is_head_manager', 'Gerente', $this->dataset);
            $column->SetOrderable(true);
            $column->setNumberAfterDecimal(0);
            $column->setThousandsSeparator('.');
            $column->setDecimalSeparator('');
            $grid->AddPrintColumn($column);
            
            //
            // View column for is_blocked field
            //
            $column = new NumberViewColumn('is_blocked', 'is_blocked', 'Bloqueado', $this->dataset);
            $column->SetOrderable(true);
            $column->setNumberAfterDecimal(0);
            $column->setThousandsSeparator('.');
            $column->setDecimalSeparator('');
            $grid->AddPrintColumn($column);
            
            //
            // View column for Descricao field
            //
            $column = new TextViewColumn('id_depto', 'id_depto_Descricao', 'Associado', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddPrintColumn($column);
            
            //
            // View column for descricao_grupo field
            //
            $column = new TextViewColumn('grupo_idgrupo', 'grupo_idgrupo_descricao_grupo', 'Grupo', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddPrintColumn($column);
        }
    
        protected function AddExportColumns(Grid $grid)
        {
            //
            // View column for idUsuario field
            //
            $column = new NumberViewColumn('idUsuario', 'idUsuario', 'Número Identificação', $this->dataset);
            $column->SetOrderable(true);
            $column->setNumberAfterDecimal(0);
            $column->setThousandsSeparator('.');
            $column->setDecimalSeparator('');
            $grid->AddExportColumn($column);
            
            //
            // View column for Nome Operador field
            //
            $column = new TextViewColumn('Nome Operador', 'Nome Operador', 'Nome', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddExportColumn($column);
            
            //
            // View column for Usuario field
            //
            $column = new TextViewColumn('Usuario', 'Usuario', 'Login', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddExportColumn($column);
            
            //
            // View column for Senha field
            //
            $column = new TextViewColumn('Senha', 'Senha', 'Senha', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddExportColumn($column);
            
            //
            // View column for Telefone field
            //
            $column = new TextViewColumn('Telefone', 'Telefone', 'Telefone', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddExportColumn($column);
            
            //
            // View column for Email field
            //
            $column = new TextViewColumn('Email', 'Email', 'Email', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddExportColumn($column);
            
            //
            // View column for AtivoMobile field
            //
            $column = new NumberViewColumn('AtivoMobile', 'AtivoMobile', 'Ativo', $this->dataset);
            $column->SetOrderable(true);
            $column->setNumberAfterDecimal(0);
            $column->setThousandsSeparator('.');
            $column->setDecimalSeparator('');
            $grid->AddExportColumn($column);
            
            //
            // View column for is_head_manager field
            //
            $column = new NumberViewColumn('is_head_manager', 'is_head_manager', 'Gerente', $this->dataset);
            $column->SetOrderable(true);
            $column->setNumberAfterDecimal(0);
            $column->setThousandsSeparator('.');
            $column->setDecimalSeparator('');
            $grid->AddExportColumn($column);
            
            //
            // View column for is_blocked field
            //
            $column = new NumberViewColumn('is_blocked', 'is_blocked', 'Bloqueado', $this->dataset);
            $column->SetOrderable(true);
            $column->setNumberAfterDecimal(0);
            $column->setThousandsSeparator('.');
            $column->setDecimalSeparator('');
            $grid->AddExportColumn($column);
            
            //
            // View column for Descricao field
            //
            $column = new TextViewColumn('id_depto', 'id_depto_Descricao', 'Associado', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddExportColumn($column);
            
            //
            // View column for descricao_grupo field
            //
            $column = new TextViewColumn('grupo_idgrupo', 'grupo_idgrupo_descricao_grupo', 'Grupo', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddExportColumn($column);
        }
    
        private function AddCompareColumns(Grid $grid)
        {
    
        }
    
        private function AddCompareHeaderColumns(Grid $grid)
        {
    
        }
    
        public function GetPageDirection()
        {
            return null;
        }
    
        public function isFilterConditionRequired()
        {
            return false;
        }
    
        protected function ApplyCommonColumnEditProperties(CustomEditColumn $column)
        {
            $column->SetDisplaySetToNullCheckBox(false);
            $column->SetDisplaySetToDefaultCheckBox(false);
    		$column->SetVariableContainer($this->GetColumnVariableContainer());
        }
    
        function CreateMasterDetailRecordGrid()
        {
            $result = new Grid($this, $this->dataset);
            
            $this->AddFieldColumns($result, false);
            $this->AddPrintColumns($result);
            $this->AddExportColumns($result);
            
            $result->SetAllowDeleteSelected(false);
            $result->SetShowUpdateLink(false);
            $result->SetShowKeyColumnsImagesInHeader(false);
            $result->SetViewMode(ViewMode::TABLE);
            $result->setEnableRuntimeCustomization(false);
            $result->setTableBordered(true);
            $result->setTableCondensed(true);
            
            $this->setupGridColumnGroup($result);
            $this->attachGridEventHandlers($result);
            
            return $result;
        }
        
        function GetCustomClientScript()
        {
            return ;
        }
        
        function GetOnPageLoadedClientScript()
        {
            return ;
        }
        protected function GetEnableModalGridDelete() { return true; }
    
        protected function CreateGrid()
        {
            $result = new Grid($this, $this->dataset);
            if ($this->GetSecurityInfo()->HasDeleteGrant())
               $result->SetAllowDeleteSelected(true);
            else
               $result->SetAllowDeleteSelected(false);   
            
            ApplyCommonPageSettings($this, $result);
            
            $result->SetUseImagesForActions(true);
            $result->SetUseFixedHeader(false);
            $result->SetShowLineNumbers(false);
            $result->SetShowKeyColumnsImagesInHeader(false);
            $result->SetViewMode(ViewMode::TABLE);
            $result->setEnableRuntimeCustomization(true);
            $result->setAllowCompare(true);
            $this->AddCompareHeaderColumns($result);
            $this->AddCompareColumns($result);
            $result->setMultiEditAllowed($this->GetSecurityInfo()->HasEditGrant() && true);
            $result->setTableBordered(true);
            $result->setTableCondensed(true);
            
            $result->SetHighlightRowAtHover(true);
            $result->SetWidth('');
            $this->AddOperationsColumns($result);
            $this->AddFieldColumns($result);
            $this->AddSingleRecordViewColumns($result);
            $this->AddEditColumns($result);
            $this->AddMultiEditColumns($result);
            $this->AddInsertColumns($result);
            $this->AddPrintColumns($result);
            $this->AddExportColumns($result);
            $this->AddMultiUploadColumn($result);
    
    
            $this->SetInsertFormTitle('FORMULÁRIO CADASTRO DE USUÁRIOS');
            $this->SetShowPageList(true);
            $this->SetShowTopPageNavigator(true);
            $this->SetShowBottomPageNavigator(true);
            $this->setPrintListAvailable(true);
            $this->setPrintListRecordAvailable(false);
            $this->setPrintOneRecordAvailable(true);
            $this->setAllowPrintSelectedRecords(false);
            $this->setExportListAvailable(array('pdf', 'excel'));
            $this->setExportSelectedRecordsAvailable(array('pdf', 'excel'));
            $this->setExportListRecordAvailable(array());
            $this->setExportOneRecordAvailable(array('pdf', 'excel'));
    
            return $result;
        }
     
        protected function setClientSideEvents(Grid $grid) {
    
        }
    
        protected function doRegisterHandlers() {
            $detailPage = new tbl_usuarios_tbl_role_membershipPage('tbl_usuarios_tbl_role_membership', $this, array('idUsuario'), array('idUsuario'), $this->GetForeignKeyFields(), $this->CreateMasterDetailRecordGrid(), $this->dataset, GetCurrentUserPermissionsForPage('tbl_usuarios.tbl_role_membership'), 'UTF-8');
            $detailPage->SetRecordPermission(GetCurrentUserRecordPermissionsForDataSource('tbl_usuarios.tbl_role_membership'));
            $detailPage->SetHttpHandlerName('tbl_usuarios_tbl_role_membership_handler');
            $handler = new PageHTTPHandler('tbl_usuarios_tbl_role_membership_handler', $detailPage);
            GetApplication()->RegisterHTTPHandler($handler);
            
            $detailPage = new tbl_usuarios_tbl_usuarios_concessionariasPage('tbl_usuarios_tbl_usuarios_concessionarias', $this, array('id_usuario_cs'), array('idUsuario'), $this->GetForeignKeyFields(), $this->CreateMasterDetailRecordGrid(), $this->dataset, GetCurrentUserPermissionsForPage('tbl_usuarios.tbl_usuarios_concessionarias'), 'UTF-8');
            $detailPage->SetRecordPermission(GetCurrentUserRecordPermissionsForDataSource('tbl_usuarios.tbl_usuarios_concessionarias'));
            $detailPage->SetHttpHandlerName('tbl_usuarios_tbl_usuarios_concessionarias_handler');
            $handler = new PageHTTPHandler('tbl_usuarios_tbl_usuarios_concessionarias_handler', $detailPage);
            GetApplication()->RegisterHTTPHandler($handler);
            
            $detailPage = new tbl_usuarios_tbl_usuarios_eafsPage('tbl_usuarios_tbl_usuarios_eafs', $this, array('id_usuario_eafs'), array('idUsuario'), $this->GetForeignKeyFields(), $this->CreateMasterDetailRecordGrid(), $this->dataset, GetCurrentUserPermissionsForPage('tbl_usuarios.tbl_usuarios_eafs'), 'UTF-8');
            $detailPage->SetRecordPermission(GetCurrentUserRecordPermissionsForDataSource('tbl_usuarios.tbl_usuarios_eafs'));
            $detailPage->SetHttpHandlerName('tbl_usuarios_tbl_usuarios_eafs_handler');
            $handler = new PageHTTPHandler('tbl_usuarios_tbl_usuarios_eafs_handler', $detailPage);
            GetApplication()->RegisterHTTPHandler($handler);
            
            $lookupDataset = new TableDataset(
                MyPDOConnectionFactory::getInstance(),
                GetConnectionOptions(),
                '`tbl_departamento`');
            $lookupDataset->addFields(
                array(
                    new IntegerField('id_depto', true, true, true),
                    new IntegerField('idConcessiona', true),
                    new StringField('Descricao')
                )
            );
            $lookupDataset->setOrderByField('Descricao', 'ASC');
            $handler = new DynamicSearchHandler($lookupDataset, $this, 'insert_tbl_usuarios_id_depto_search', 'id_depto', 'Descricao', null, 20);
            GetApplication()->RegisterHTTPHandler($handler);
            
            $lookupDataset = new TableDataset(
                MyPDOConnectionFactory::getInstance(),
                GetConnectionOptions(),
                '`grupo`');
            $lookupDataset->addFields(
                array(
                    new IntegerField('idgrupo', true, true, true),
                    new StringField('descricao_grupo')
                )
            );
            $lookupDataset->setOrderByField('descricao_grupo', 'ASC');
            $handler = new DynamicSearchHandler($lookupDataset, $this, 'insert_tbl_usuarios_grupo_idgrupo_search', 'idgrupo', 'descricao_grupo', null, 20);
            GetApplication()->RegisterHTTPHandler($handler);
            
            $lookupDataset = new TableDataset(
                MyPDOConnectionFactory::getInstance(),
                GetConnectionOptions(),
                '`tbl_departamento`');
            $lookupDataset->addFields(
                array(
                    new IntegerField('id_depto', true, true, true),
                    new IntegerField('idConcessiona', true),
                    new StringField('Descricao')
                )
            );
            $lookupDataset->setOrderByField('Descricao', 'ASC');
            $handler = new DynamicSearchHandler($lookupDataset, $this, 'filter_builder_tbl_usuarios_id_depto_search', 'id_depto', 'Descricao', null, 20);
            GetApplication()->RegisterHTTPHandler($handler);
            
            $lookupDataset = new TableDataset(
                MyPDOConnectionFactory::getInstance(),
                GetConnectionOptions(),
                '`grupo`');
            $lookupDataset->addFields(
                array(
                    new IntegerField('idgrupo', true, true, true),
                    new StringField('descricao_grupo')
                )
            );
            $lookupDataset->setOrderByField('descricao_grupo', 'ASC');
            $handler = new DynamicSearchHandler($lookupDataset, $this, 'filter_builder_tbl_usuarios_grupo_idgrupo_search', 'idgrupo', 'descricao_grupo', null, 20);
            GetApplication()->RegisterHTTPHandler($handler);
            
            $lookupDataset = new TableDataset(
                MyPDOConnectionFactory::getInstance(),
                GetConnectionOptions(),
                '`tbl_departamento`');
            $lookupDataset->addFields(
                array(
                    new IntegerField('id_depto', true, true, true),
                    new IntegerField('idConcessiona', true),
                    new StringField('Descricao')
                )
            );
            $lookupDataset->setOrderByField('Descricao', 'ASC');
            $handler = new DynamicSearchHandler($lookupDataset, $this, 'edit_tbl_usuarios_id_depto_search', 'id_depto', 'Descricao', null, 20);
            GetApplication()->RegisterHTTPHandler($handler);
            
            $lookupDataset = new TableDataset(
                MyPDOConnectionFactory::getInstance(),
                GetConnectionOptions(),
                '`grupo`');
            $lookupDataset->addFields(
                array(
                    new IntegerField('idgrupo', true, true, true),
                    new StringField('descricao_grupo')
                )
            );
            $lookupDataset->setOrderByField('descricao_grupo', 'ASC');
            $handler = new DynamicSearchHandler($lookupDataset, $this, '_tbl_usuarios_grupo_idgrupo_search', 'idgrupo', 'descricao_grupo', null, 20);
            GetApplication()->RegisterHTTPHandler($handler);
            
            $lookupDataset = new TableDataset(
                MyPDOConnectionFactory::getInstance(),
                GetConnectionOptions(),
                '`tbl_departamento`');
            $lookupDataset->addFields(
                array(
                    new IntegerField('id_depto', true, true, true),
                    new IntegerField('idConcessiona', true),
                    new StringField('Descricao')
                )
            );
            $lookupDataset->setOrderByField('Descricao', 'ASC');
            $handler = new DynamicSearchHandler($lookupDataset, $this, 'multi_edit_tbl_usuarios_id_depto_search', 'id_depto', 'Descricao', null, 20);
            GetApplication()->RegisterHTTPHandler($handler);
            
            $lookupDataset = new TableDataset(
                MyPDOConnectionFactory::getInstance(),
                GetConnectionOptions(),
                '`grupo`');
            $lookupDataset->addFields(
                array(
                    new IntegerField('idgrupo', true, true, true),
                    new StringField('descricao_grupo')
                )
            );
            $lookupDataset->setOrderByField('descricao_grupo', 'ASC');
            $handler = new DynamicSearchHandler($lookupDataset, $this, 'multi_edit_tbl_usuarios_grupo_idgrupo_search', 'idgrupo', 'descricao_grupo', null, 20);
            GetApplication()->RegisterHTTPHandler($handler);
            $lookupDataset = new TableDataset(
                MyPDOConnectionFactory::getInstance(),
                GetConnectionOptions(),
                '`tbl_concessionarias`');
            $lookupDataset->addFields(
                array(
                    new IntegerField('idConcessiona', true, true, true),
                    new StringField('Lote', true, true),
                    new StringField('NumCNPJ', true, true),
                    new StringField('NomeConcessionaria', true),
                    new DateTimeField('dtInicioConcessao', true),
                    new DateTimeField('dtTerminoConcessao', true),
                    new StringField('Edital'),
                    new StringField('UsuarioResponsavel'),
                    new StringField('email'),
                    new StringField('Telefone'),
                    new StringField('site'),
                    new IntegerField('id_fiscalizadora'),
                    new BlobField('image_log')
                )
            );
            $lookupDataset->setOrderByField('NomeConcessionaria', 'ASC');
            $handler = new DynamicSearchHandler($lookupDataset, $this, 'insert_tbl_usuarios_id_deptoNestedPage_idConcessiona_search', 'idConcessiona', 'NomeConcessionaria', null, 20);
            GetApplication()->RegisterHTTPHandler($handler);
            
            
            
            
            
            new tbl_usuarios_id_deptoNestedPage($this, GetCurrentUserPermissionsForPage('tbl_usuarios.id_depto'));
            new tbl_usuarios_grupo_idgrupoNestedPage($this, GetCurrentUserPermissionsForPage('tbl_usuarios.grupo_idgrupo'));
        }
       
        protected function doCustomRenderColumn($fieldName, $fieldData, $rowData, &$customText, &$handled)
        { 
    
        }
    
        protected function doCustomRenderPrintColumn($fieldName, $fieldData, $rowData, &$customText, &$handled)
        { 
    
        }
    
        protected function doCustomRenderExportColumn($exportType, $fieldName, $fieldData, $rowData, &$customText, &$handled)
        { 
    
        }
    
        protected function doCustomDrawRow($rowData, &$cellFontColor, &$cellFontSize, &$cellBgColor, &$cellItalicAttr, &$cellBoldAttr)
        {
    
        }
    
        protected function doExtendedCustomDrawRow($rowData, &$rowCellStyles, &$rowStyles, &$rowClasses, &$cellClasses)
        {
    
        }
    
        protected function doCustomRenderTotal($totalValue, $aggregate, $columnName, &$customText, &$handled)
        {
    
        }
    
        protected function doCustomDefaultValues(&$values, &$handled) 
        {
    
        }
    
        protected function doCustomCompareColumn($columnName, $valueA, $valueB, &$result)
        {
    
        }
    
        protected function doBeforeInsertRecord($page, &$rowData, $tableName, &$cancel, &$message, &$messageDisplayTime)
        {
    
        }
    
        protected function doBeforeUpdateRecord($page, $oldRowData, &$rowData, $tableName, &$cancel, &$message, &$messageDisplayTime)
        {
    
        }
    
        protected function doBeforeDeleteRecord($page, &$rowData, $tableName, &$cancel, &$message, &$messageDisplayTime)
        {
    
        }
    
        protected function doAfterInsertRecord($page, $rowData, $tableName, &$success, &$message, &$messageDisplayTime)
        {
    
        }
    
        protected function doAfterUpdateRecord($page, $oldRowData, $rowData, $tableName, &$success, &$message, &$messageDisplayTime)
        {
    
        }
    
        protected function doAfterDeleteRecord($page, $rowData, $tableName, &$success, &$message, &$messageDisplayTime)
        {
    
        }
    
        protected function doCustomHTMLHeader($page, &$customHtmlHeaderText)
        { 
    
        }
    
        protected function doGetCustomTemplate($type, $part, $mode, &$result, &$params)
        {
    
        }
    
        protected function doGetCustomExportOptions(Page $page, $exportType, $rowData, &$options)
        {
    
        }
    
        protected function doFileUpload($fieldName, $rowData, &$result, &$accept, $originalFileName, $originalFileExtension, $fileSize, $tempFileName)
        {
    
        }
    
        protected function doPrepareChart(Chart $chart)
        {
    
        }
    
        protected function doPrepareColumnFilter(ColumnFilter $columnFilter)
        {
    
        }
    
        protected function doPrepareFilterBuilder(FilterBuilder $filterBuilder, FixedKeysArray $columns)
        {
    
        }
    
        protected function doGetSelectionFilters(FixedKeysArray $columns, &$result)
        {
    
        }
    
        protected function doGetCustomFormLayout($mode, FixedKeysArray $columns, FormLayout $layout)
        {
    
        }
    
        protected function doGetCustomColumnGroup(FixedKeysArray $columns, ViewColumnGroup $columnGroup)
        {
    
        }
    
        protected function doPageLoaded()
        {
    
        }
    
        protected function doCalculateFields($rowData, $fieldName, &$value)
        {
    
        }
    
        protected function doGetCustomRecordPermissions(Page $page, &$usingCondition, $rowData, &$allowEdit, &$allowDelete, &$mergeWithDefault, &$handled)
        {
    
        }
    
        protected function doAddEnvironmentVariables(Page $page, &$variables)
        {
    
        }
    
    }

    SetUpUserAuthorization();

    try
    {
        $Page = new tbl_usuariosPage("tbl_usuarios", "tbl_usuarios.php", GetCurrentUserPermissionsForPage("tbl_usuarios"), 'UTF-8');
        $Page->SetRecordPermission(GetCurrentUserRecordPermissionsForDataSource("tbl_usuarios"));
        GetApplication()->SetMainPage($Page);
        GetApplication()->Run();
    }
    catch(Exception $e)
    {
        ShowErrorPage($e);
    }
	
