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
    
    
    
    class tbl_concessionarias_tbl_rodovias_tbl_geo_estacakmiPage extends DetailPage
    {
        protected function DoBeforeCreate()
        {
            $this->SetTitle('CADASTRO MALHA VIÁRIA');
            $this->SetMenuLabel('MALHA VIÁRIA');
    
            $this->dataset = new TableDataset(
                MyPDOConnectionFactory::getInstance(),
                GetConnectionOptions(),
                '`tbl_geo_estacakmi`');
            $this->dataset->addFields(
                array(
                    new IntegerField('idGeoestacakmi', true, true, true),
                    new IntegerField('CodeRodovia', true),
                    new IntegerField('numero_km'),
                    new IntegerField('numero_estaca'),
                    new StringField('latitude'),
                    new StringField('longitude')
                )
            );
            $this->dataset->AddLookupField('CodeRodovia', 'tbl_rodovias', new StringField('idRodovia'), new StringField('RodoviaSP', false, false, false, false, 'CodeRodovia_RodoviaSP', 'CodeRodovia_RodoviaSP_tbl_rodovias'), 'CodeRodovia_RodoviaSP_tbl_rodovias');
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
                new FilterColumn($this->dataset, 'idGeoestacakmi', 'idGeoestacakmi', 'Id Geoestacakmi'),
                new FilterColumn($this->dataset, 'numero_km', 'numero_km', 'km'),
                new FilterColumn($this->dataset, 'numero_estaca', 'numero_estaca', 'Estaca'),
                new FilterColumn($this->dataset, 'latitude', 'latitude', 'Latitude'),
                new FilterColumn($this->dataset, 'longitude', 'longitude', 'Longitude'),
                new FilterColumn($this->dataset, 'CodeRodovia', 'CodeRodovia_RodoviaSP', 'Rodovia')
            );
        }
    
        protected function setupQuickFilter(QuickFilter $quickFilter, FixedKeysArray $columns)
        {
            $quickFilter
                ->addColumn($columns['idGeoestacakmi'])
                ->addColumn($columns['numero_km'])
                ->addColumn($columns['numero_estaca'])
                ->addColumn($columns['latitude'])
                ->addColumn($columns['longitude'])
                ->addColumn($columns['CodeRodovia']);
        }
    
        protected function setupColumnFilter(ColumnFilter $columnFilter)
        {
            $columnFilter
                ->setOptionsFor('CodeRodovia');
        }
    
        protected function setupFilterBuilder(FilterBuilder $filterBuilder, FixedKeysArray $columns)
        {
            $main_editor = new TextEdit('idgeoestacakmi_edit');
            
            $filterBuilder->addColumn(
                $columns['idGeoestacakmi'],
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
            
            $main_editor = new TextEdit('numero_km_edit');
            
            $filterBuilder->addColumn(
                $columns['numero_km'],
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
            
            $main_editor = new TextEdit('numero_estaca_edit');
            
            $filterBuilder->addColumn(
                $columns['numero_estaca'],
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
            
            $main_editor = new TextEdit('latitude_edit');
            
            $filterBuilder->addColumn(
                $columns['latitude'],
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
            
            $main_editor = new TextEdit('longitude_edit');
            
            $filterBuilder->addColumn(
                $columns['longitude'],
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
            
            $main_editor = new DynamicCombobox('coderodovia_edit', $this->CreateLinkBuilder());
            $main_editor->setAllowClear(true);
            $main_editor->setMinimumInputLength(0);
            $main_editor->SetAllowNullValue(false);
            $main_editor->SetHandlerName('filter_builder_tbl_concessionarias_tbl_rodovias_tbl_geo_estacakmi_CodeRodovia_search');
            
            $multi_value_select_editor = new RemoteMultiValueSelect('CodeRodovia', $this->CreateLinkBuilder());
            $multi_value_select_editor->SetHandlerName('filter_builder_tbl_concessionarias_tbl_rodovias_tbl_geo_estacakmi_CodeRodovia_search');
            
            $text_editor = new TextEdit('CodeRodovia');
            
            $filterBuilder->addColumn(
                $columns['CodeRodovia'],
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
            // View column for numero_km field
            //
            $column = new NumberViewColumn('numero_km', 'numero_km', 'km', $this->dataset);
            $column->SetOrderable(true);
            $column->setNumberAfterDecimal(3);
            $column->setThousandsSeparator('.');
            $column->setDecimalSeparator(',');
            $column->setMinimalVisibility(ColumnVisibility::PHONE);
            $column->SetDescription('');
            $column->SetFixedWidth(null);
            $grid->AddViewColumn($column);
            
            //
            // View column for numero_estaca field
            //
            $column = new TextViewColumn('numero_estaca', 'numero_estaca', 'Estaca', $this->dataset);
            $column->SetOrderable(true);
            $column->setMinimalVisibility(ColumnVisibility::PHONE);
            $column->SetDescription('');
            $column->SetFixedWidth(null);
            $grid->AddViewColumn($column);
            
            //
            // View column for latitude field
            //
            $column = new NumberViewColumn('latitude', 'latitude', 'Latitude', $this->dataset);
            $column->SetOrderable(true);
            $column->setNumberAfterDecimal(2);
            $column->setThousandsSeparator('.');
            $column->setDecimalSeparator(',');
            $column->setMinimalVisibility(ColumnVisibility::PHONE);
            $column->SetDescription('');
            $column->SetFixedWidth(null);
            $grid->AddViewColumn($column);
            
            //
            // View column for longitude field
            //
            $column = new NumberViewColumn('longitude', 'longitude', 'Longitude', $this->dataset);
            $column->SetOrderable(true);
            $column->setNumberAfterDecimal(2);
            $column->setThousandsSeparator('.');
            $column->setDecimalSeparator(',');
            $column->setMinimalVisibility(ColumnVisibility::PHONE);
            $column->SetDescription('');
            $column->SetFixedWidth(null);
            $grid->AddViewColumn($column);
            
            //
            // View column for RodoviaSP field
            //
            $column = new TextViewColumn('CodeRodovia', 'CodeRodovia_RodoviaSP', 'Rodovia', $this->dataset);
            $column->SetOrderable(true);
            $column->setMinimalVisibility(ColumnVisibility::PHONE);
            $column->SetDescription('');
            $column->SetFixedWidth(null);
            $grid->AddViewColumn($column);
        }
    
        protected function AddSingleRecordViewColumns(Grid $grid)
        {
            //
            // View column for idGeoestacakmi field
            //
            $column = new NumberViewColumn('idGeoestacakmi', 'idGeoestacakmi', 'Id Geoestacakmi', $this->dataset);
            $column->SetOrderable(true);
            $column->setNumberAfterDecimal(0);
            $column->setThousandsSeparator('.');
            $column->setDecimalSeparator('');
            $grid->AddSingleRecordViewColumn($column);
            
            //
            // View column for numero_km field
            //
            $column = new NumberViewColumn('numero_km', 'numero_km', 'km', $this->dataset);
            $column->SetOrderable(true);
            $column->setNumberAfterDecimal(3);
            $column->setThousandsSeparator('.');
            $column->setDecimalSeparator(',');
            $grid->AddSingleRecordViewColumn($column);
            
            //
            // View column for numero_estaca field
            //
            $column = new TextViewColumn('numero_estaca', 'numero_estaca', 'Estaca', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddSingleRecordViewColumn($column);
            
            //
            // View column for latitude field
            //
            $column = new NumberViewColumn('latitude', 'latitude', 'Latitude', $this->dataset);
            $column->SetOrderable(true);
            $column->setNumberAfterDecimal(2);
            $column->setThousandsSeparator('.');
            $column->setDecimalSeparator(',');
            $grid->AddSingleRecordViewColumn($column);
            
            //
            // View column for longitude field
            //
            $column = new NumberViewColumn('longitude', 'longitude', 'Longitude', $this->dataset);
            $column->SetOrderable(true);
            $column->setNumberAfterDecimal(2);
            $column->setThousandsSeparator('.');
            $column->setDecimalSeparator(',');
            $grid->AddSingleRecordViewColumn($column);
            
            //
            // View column for RodoviaSP field
            //
            $column = new TextViewColumn('CodeRodovia', 'CodeRodovia_RodoviaSP', 'Rodovia', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddSingleRecordViewColumn($column);
        }
    
        protected function AddEditColumns(Grid $grid)
        {
            //
            // Edit column for numero_km field
            //
            $editor = new TextEdit('numero_km_edit');
            $editColumn = new CustomEditColumn('km', 'numero_km', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddEditColumn($editColumn);
            
            //
            // Edit column for numero_estaca field
            //
            $editor = new TextEdit('numero_estaca_edit');
            $editColumn = new CustomEditColumn('Estaca', 'numero_estaca', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddEditColumn($editColumn);
            
            //
            // Edit column for latitude field
            //
            $editor = new TextEdit('latitude_edit');
            $editColumn = new CustomEditColumn('Latitude', 'latitude', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddEditColumn($editColumn);
            
            //
            // Edit column for longitude field
            //
            $editor = new TextEdit('longitude_edit');
            $editColumn = new CustomEditColumn('Longitude', 'longitude', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddEditColumn($editColumn);
            
            //
            // Edit column for CodeRodovia field
            //
            $editor = new DynamicCombobox('coderodovia_edit', $this->CreateLinkBuilder());
            $editor->setAllowClear(true);
            $editor->setMinimumInputLength(0);
            $lookupDataset = new TableDataset(
                MyPDOConnectionFactory::getInstance(),
                GetConnectionOptions(),
                '`tbl_rodovias`');
            $lookupDataset->addFields(
                array(
                    new StringField('idRodovia', true, true),
                    new StringField('CodRodovia', true, true),
                    new StringField('RodoviaSP'),
                    new StringField('NameRodovia'),
                    new StringField('lote', true, true),
                    new IntegerField('Extensao'),
                    new IntegerField('km_inicial'),
                    new IntegerField('km_final'),
                    new IntegerField('id_concessionaria'),
                    new StringField('DenominacaoRodovia'),
                    new StringField('Trecho')
                )
            );
            $lookupDataset->setOrderByField('RodoviaSP', 'ASC');
            $editColumn = new DynamicLookupEditColumn('Rodovia', 'CodeRodovia', 'CodeRodovia_RodoviaSP', 'edit_tbl_concessionarias_tbl_rodovias_tbl_geo_estacakmi_CodeRodovia_search', $editor, $this->dataset, $lookupDataset, 'idRodovia', 'RodoviaSP', '');
            $editColumn->SetReadOnly(true);
            $validator = new RequiredValidator(StringUtils::Format($this->GetLocalizerCaptions()->GetMessageString('RequiredValidationMessage'), $editColumn->GetCaption()));
            $editor->GetValidatorCollection()->AddValidator($validator);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddEditColumn($editColumn);
        }
    
        protected function AddMultiEditColumns(Grid $grid)
        {
            //
            // Edit column for numero_km field
            //
            $editor = new TextEdit('numero_km_edit');
            $editColumn = new CustomEditColumn('km', 'numero_km', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddMultiEditColumn($editColumn);
            
            //
            // Edit column for numero_estaca field
            //
            $editor = new TextEdit('numero_estaca_edit');
            $editColumn = new CustomEditColumn('Estaca', 'numero_estaca', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddMultiEditColumn($editColumn);
            
            //
            // Edit column for latitude field
            //
            $editor = new TextEdit('latitude_edit');
            $editColumn = new CustomEditColumn('Latitude', 'latitude', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddMultiEditColumn($editColumn);
            
            //
            // Edit column for longitude field
            //
            $editor = new TextEdit('longitude_edit');
            $editColumn = new CustomEditColumn('Longitude', 'longitude', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddMultiEditColumn($editColumn);
            
            //
            // Edit column for CodeRodovia field
            //
            $editor = new DynamicCombobox('coderodovia_edit', $this->CreateLinkBuilder());
            $editor->setAllowClear(true);
            $editor->setMinimumInputLength(0);
            $lookupDataset = new TableDataset(
                MyPDOConnectionFactory::getInstance(),
                GetConnectionOptions(),
                '`tbl_rodovias`');
            $lookupDataset->addFields(
                array(
                    new StringField('idRodovia', true, true),
                    new StringField('CodRodovia', true, true),
                    new StringField('RodoviaSP'),
                    new StringField('NameRodovia'),
                    new StringField('lote', true, true),
                    new IntegerField('Extensao'),
                    new IntegerField('km_inicial'),
                    new IntegerField('km_final'),
                    new IntegerField('id_concessionaria'),
                    new StringField('DenominacaoRodovia'),
                    new StringField('Trecho')
                )
            );
            $lookupDataset->setOrderByField('RodoviaSP', 'ASC');
            $editColumn = new DynamicLookupEditColumn('Rodovia', 'CodeRodovia', 'CodeRodovia_RodoviaSP', 'multi_edit_tbl_concessionarias_tbl_rodovias_tbl_geo_estacakmi_CodeRodovia_search', $editor, $this->dataset, $lookupDataset, 'idRodovia', 'RodoviaSP', '');
            $editColumn->SetReadOnly(true);
            $validator = new RequiredValidator(StringUtils::Format($this->GetLocalizerCaptions()->GetMessageString('RequiredValidationMessage'), $editColumn->GetCaption()));
            $editor->GetValidatorCollection()->AddValidator($validator);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddMultiEditColumn($editColumn);
        }
    
        protected function AddInsertColumns(Grid $grid)
        {
            //
            // Edit column for numero_km field
            //
            $editor = new TextEdit('numero_km_edit');
            $editColumn = new CustomEditColumn('km', 'numero_km', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddInsertColumn($editColumn);
            
            //
            // Edit column for numero_estaca field
            //
            $editor = new TextEdit('numero_estaca_edit');
            $editColumn = new CustomEditColumn('Estaca', 'numero_estaca', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddInsertColumn($editColumn);
            
            //
            // Edit column for latitude field
            //
            $editor = new TextEdit('latitude_edit');
            $editColumn = new CustomEditColumn('Latitude', 'latitude', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddInsertColumn($editColumn);
            
            //
            // Edit column for longitude field
            //
            $editor = new TextEdit('longitude_edit');
            $editColumn = new CustomEditColumn('Longitude', 'longitude', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddInsertColumn($editColumn);
            
            //
            // Edit column for CodeRodovia field
            //
            $editor = new DynamicCombobox('coderodovia_edit', $this->CreateLinkBuilder());
            $editor->setAllowClear(true);
            $editor->setMinimumInputLength(0);
            $lookupDataset = new TableDataset(
                MyPDOConnectionFactory::getInstance(),
                GetConnectionOptions(),
                '`tbl_rodovias`');
            $lookupDataset->addFields(
                array(
                    new StringField('idRodovia', true, true),
                    new StringField('CodRodovia', true, true),
                    new StringField('RodoviaSP'),
                    new StringField('NameRodovia'),
                    new StringField('lote', true, true),
                    new IntegerField('Extensao'),
                    new IntegerField('km_inicial'),
                    new IntegerField('km_final'),
                    new IntegerField('id_concessionaria'),
                    new StringField('DenominacaoRodovia'),
                    new StringField('Trecho')
                )
            );
            $lookupDataset->setOrderByField('RodoviaSP', 'ASC');
            $editColumn = new DynamicLookupEditColumn('Rodovia', 'CodeRodovia', 'CodeRodovia_RodoviaSP', 'insert_tbl_concessionarias_tbl_rodovias_tbl_geo_estacakmi_CodeRodovia_search', $editor, $this->dataset, $lookupDataset, 'idRodovia', 'RodoviaSP', '');
            $editColumn->SetReadOnly(true);
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
            // View column for idGeoestacakmi field
            //
            $column = new NumberViewColumn('idGeoestacakmi', 'idGeoestacakmi', 'Id Geoestacakmi', $this->dataset);
            $column->SetOrderable(true);
            $column->setNumberAfterDecimal(0);
            $column->setThousandsSeparator('.');
            $column->setDecimalSeparator('');
            $grid->AddPrintColumn($column);
            
            //
            // View column for numero_km field
            //
            $column = new NumberViewColumn('numero_km', 'numero_km', 'km', $this->dataset);
            $column->SetOrderable(true);
            $column->setNumberAfterDecimal(3);
            $column->setThousandsSeparator('.');
            $column->setDecimalSeparator(',');
            $grid->AddPrintColumn($column);
            
            //
            // View column for numero_estaca field
            //
            $column = new TextViewColumn('numero_estaca', 'numero_estaca', 'Estaca', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddPrintColumn($column);
            
            //
            // View column for latitude field
            //
            $column = new NumberViewColumn('latitude', 'latitude', 'Latitude', $this->dataset);
            $column->SetOrderable(true);
            $column->setNumberAfterDecimal(2);
            $column->setThousandsSeparator('.');
            $column->setDecimalSeparator(',');
            $grid->AddPrintColumn($column);
            
            //
            // View column for longitude field
            //
            $column = new NumberViewColumn('longitude', 'longitude', 'Longitude', $this->dataset);
            $column->SetOrderable(true);
            $column->setNumberAfterDecimal(2);
            $column->setThousandsSeparator('.');
            $column->setDecimalSeparator(',');
            $grid->AddPrintColumn($column);
            
            //
            // View column for RodoviaSP field
            //
            $column = new TextViewColumn('CodeRodovia', 'CodeRodovia_RodoviaSP', 'Rodovia', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddPrintColumn($column);
        }
    
        protected function AddExportColumns(Grid $grid)
        {
            //
            // View column for idGeoestacakmi field
            //
            $column = new NumberViewColumn('idGeoestacakmi', 'idGeoestacakmi', 'Id Geoestacakmi', $this->dataset);
            $column->SetOrderable(true);
            $column->setNumberAfterDecimal(0);
            $column->setThousandsSeparator('.');
            $column->setDecimalSeparator('');
            $grid->AddExportColumn($column);
            
            //
            // View column for numero_km field
            //
            $column = new NumberViewColumn('numero_km', 'numero_km', 'km', $this->dataset);
            $column->SetOrderable(true);
            $column->setNumberAfterDecimal(3);
            $column->setThousandsSeparator('.');
            $column->setDecimalSeparator(',');
            $grid->AddExportColumn($column);
            
            //
            // View column for numero_estaca field
            //
            $column = new TextViewColumn('numero_estaca', 'numero_estaca', 'Estaca', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddExportColumn($column);
            
            //
            // View column for latitude field
            //
            $column = new NumberViewColumn('latitude', 'latitude', 'Latitude', $this->dataset);
            $column->SetOrderable(true);
            $column->setNumberAfterDecimal(2);
            $column->setThousandsSeparator('.');
            $column->setDecimalSeparator(',');
            $grid->AddExportColumn($column);
            
            //
            // View column for longitude field
            //
            $column = new NumberViewColumn('longitude', 'longitude', 'Longitude', $this->dataset);
            $column->SetOrderable(true);
            $column->setNumberAfterDecimal(2);
            $column->setThousandsSeparator('.');
            $column->setDecimalSeparator(',');
            $grid->AddExportColumn($column);
            
            //
            // View column for RodoviaSP field
            //
            $column = new TextViewColumn('CodeRodovia', 'CodeRodovia_RodoviaSP', 'Rodovia', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddExportColumn($column);
        }
    
        private function AddCompareColumns(Grid $grid)
        {
            //
            // View column for RodoviaSP field
            //
            $column = new TextViewColumn('CodeRodovia', 'CodeRodovia_RodoviaSP', 'Rodovia', $this->dataset);
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
    
    
            $this->SetInsertFormTitle('FORMULÁRIO CADASTRO MALHA VIÁRIA');
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
                '`tbl_rodovias`');
            $lookupDataset->addFields(
                array(
                    new StringField('idRodovia', true, true),
                    new StringField('CodRodovia', true, true),
                    new StringField('RodoviaSP'),
                    new StringField('NameRodovia'),
                    new StringField('lote', true, true),
                    new IntegerField('Extensao'),
                    new IntegerField('km_inicial'),
                    new IntegerField('km_final'),
                    new IntegerField('id_concessionaria'),
                    new StringField('DenominacaoRodovia'),
                    new StringField('Trecho')
                )
            );
            $lookupDataset->setOrderByField('RodoviaSP', 'ASC');
            $handler = new DynamicSearchHandler($lookupDataset, $this, 'insert_tbl_concessionarias_tbl_rodovias_tbl_geo_estacakmi_CodeRodovia_search', 'idRodovia', 'RodoviaSP', null, 20);
            GetApplication()->RegisterHTTPHandler($handler);
            
            $lookupDataset = new TableDataset(
                MyPDOConnectionFactory::getInstance(),
                GetConnectionOptions(),
                '`tbl_rodovias`');
            $lookupDataset->addFields(
                array(
                    new StringField('idRodovia', true, true),
                    new StringField('CodRodovia', true, true),
                    new StringField('RodoviaSP'),
                    new StringField('NameRodovia'),
                    new StringField('lote', true, true),
                    new IntegerField('Extensao'),
                    new IntegerField('km_inicial'),
                    new IntegerField('km_final'),
                    new IntegerField('id_concessionaria'),
                    new StringField('DenominacaoRodovia'),
                    new StringField('Trecho')
                )
            );
            $lookupDataset->setOrderByField('RodoviaSP', 'ASC');
            $handler = new DynamicSearchHandler($lookupDataset, $this, 'filter_builder_tbl_concessionarias_tbl_rodovias_tbl_geo_estacakmi_CodeRodovia_search', 'idRodovia', 'RodoviaSP', null, 20);
            GetApplication()->RegisterHTTPHandler($handler);
            
            $lookupDataset = new TableDataset(
                MyPDOConnectionFactory::getInstance(),
                GetConnectionOptions(),
                '`tbl_rodovias`');
            $lookupDataset->addFields(
                array(
                    new StringField('idRodovia', true, true),
                    new StringField('CodRodovia', true, true),
                    new StringField('RodoviaSP'),
                    new StringField('NameRodovia'),
                    new StringField('lote', true, true),
                    new IntegerField('Extensao'),
                    new IntegerField('km_inicial'),
                    new IntegerField('km_final'),
                    new IntegerField('id_concessionaria'),
                    new StringField('DenominacaoRodovia'),
                    new StringField('Trecho')
                )
            );
            $lookupDataset->setOrderByField('RodoviaSP', 'ASC');
            $handler = new DynamicSearchHandler($lookupDataset, $this, 'edit_tbl_concessionarias_tbl_rodovias_tbl_geo_estacakmi_CodeRodovia_search', 'idRodovia', 'RodoviaSP', null, 20);
            GetApplication()->RegisterHTTPHandler($handler);
            
            $lookupDataset = new TableDataset(
                MyPDOConnectionFactory::getInstance(),
                GetConnectionOptions(),
                '`tbl_rodovias`');
            $lookupDataset->addFields(
                array(
                    new StringField('idRodovia', true, true),
                    new StringField('CodRodovia', true, true),
                    new StringField('RodoviaSP'),
                    new StringField('NameRodovia'),
                    new StringField('lote', true, true),
                    new IntegerField('Extensao'),
                    new IntegerField('km_inicial'),
                    new IntegerField('km_final'),
                    new IntegerField('id_concessionaria'),
                    new StringField('DenominacaoRodovia'),
                    new StringField('Trecho')
                )
            );
            $lookupDataset->setOrderByField('RodoviaSP', 'ASC');
            $handler = new DynamicSearchHandler($lookupDataset, $this, 'multi_edit_tbl_concessionarias_tbl_rodovias_tbl_geo_estacakmi_CodeRodovia_search', 'idRodovia', 'RodoviaSP', null, 20);
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
    
    
    
    class tbl_concessionarias_tbl_rodoviasPage extends DetailPage
    {
        protected function DoBeforeCreate()
        {
            $this->SetTitle('RODOVIAS');
            $this->SetMenuLabel('RODOVIAS');
    
            $this->dataset = new TableDataset(
                MyPDOConnectionFactory::getInstance(),
                GetConnectionOptions(),
                '`tbl_rodovias`');
            $this->dataset->addFields(
                array(
                    new StringField('idRodovia', true, true),
                    new StringField('CodRodovia', true, true),
                    new StringField('RodoviaSP'),
                    new StringField('NameRodovia'),
                    new StringField('lote', true, true),
                    new IntegerField('Extensao'),
                    new IntegerField('km_inicial'),
                    new IntegerField('km_final'),
                    new IntegerField('id_concessionaria'),
                    new StringField('DenominacaoRodovia'),
                    new StringField('Trecho')
                )
            );
            $this->dataset->AddLookupField('id_concessionaria', 'tbl_concessionarias', new IntegerField('idConcessiona'), new StringField('NomeConcessionaria', false, false, false, false, 'id_concessionaria_NomeConcessionaria', 'id_concessionaria_NomeConcessionaria_tbl_concessionarias'), 'id_concessionaria_NomeConcessionaria_tbl_concessionarias');
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
                new FilterColumn($this->dataset, 'idRodovia', 'idRodovia', 'Id'),
                new FilterColumn($this->dataset, 'RodoviaSP', 'RodoviaSP', 'Rodovia SP'),
                new FilterColumn($this->dataset, 'DenominacaoRodovia', 'DenominacaoRodovia', 'Denominação'),
                new FilterColumn($this->dataset, 'Trecho', 'Trecho', 'Trecho'),
                new FilterColumn($this->dataset, 'id_concessionaria', 'id_concessionaria_NomeConcessionaria', 'Concessionária'),
                new FilterColumn($this->dataset, 'km_inicial', 'km_inicial', 'km inicial'),
                new FilterColumn($this->dataset, 'km_final', 'km_final', 'km final'),
                new FilterColumn($this->dataset, 'Extensao', 'Extensao', 'Extensão'),
                new FilterColumn($this->dataset, 'CodRodovia', 'CodRodovia', 'Cod Rodovia'),
                new FilterColumn($this->dataset, 'NameRodovia', 'NameRodovia', 'Name Rodovia'),
                new FilterColumn($this->dataset, 'lote', 'lote', 'Lote')
            );
        }
    
        protected function setupQuickFilter(QuickFilter $quickFilter, FixedKeysArray $columns)
        {
            $quickFilter
                ->addColumn($columns['idRodovia'])
                ->addColumn($columns['RodoviaSP'])
                ->addColumn($columns['DenominacaoRodovia'])
                ->addColumn($columns['Trecho'])
                ->addColumn($columns['id_concessionaria'])
                ->addColumn($columns['km_inicial'])
                ->addColumn($columns['km_final'])
                ->addColumn($columns['Extensao'])
                ->addColumn($columns['CodRodovia'])
                ->addColumn($columns['NameRodovia'])
                ->addColumn($columns['lote']);
        }
    
        protected function setupColumnFilter(ColumnFilter $columnFilter)
        {
    
        }
    
        protected function setupFilterBuilder(FilterBuilder $filterBuilder, FixedKeysArray $columns)
        {
            $main_editor = new TextEdit('idrodovia_edit');
            
            $filterBuilder->addColumn(
                $columns['idRodovia'],
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
            
            $main_editor = new TextEdit('rodoviasp_edit');
            $main_editor->SetMaxLength(12);
            
            $filterBuilder->addColumn(
                $columns['RodoviaSP'],
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
            
            $main_editor = new TextEdit('denominacaorodovia_edit');
            $main_editor->SetMaxLength(50);
            
            $filterBuilder->addColumn(
                $columns['DenominacaoRodovia'],
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
            
            $main_editor = new TextEdit('trecho_edit');
            $main_editor->SetMaxLength(60);
            
            $filterBuilder->addColumn(
                $columns['Trecho'],
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
            
            $main_editor = new DynamicCombobox('id_concessionaria_edit', $this->CreateLinkBuilder());
            $main_editor->setAllowClear(true);
            $main_editor->setMinimumInputLength(0);
            $main_editor->SetAllowNullValue(false);
            $main_editor->SetHandlerName('filter_builder_tbl_concessionarias_tbl_rodovias_id_concessionaria_search');
            
            $multi_value_select_editor = new RemoteMultiValueSelect('id_concessionaria', $this->CreateLinkBuilder());
            $multi_value_select_editor->SetHandlerName('filter_builder_tbl_concessionarias_tbl_rodovias_id_concessionaria_search');
            
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
            
            $main_editor = new TextEdit('km_inicial_edit');
            
            $filterBuilder->addColumn(
                $columns['km_inicial'],
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
            
            $main_editor = new TextEdit('km_final_edit');
            
            $filterBuilder->addColumn(
                $columns['km_final'],
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
            
            $main_editor = new TextEdit('extensao_edit');
            $main_editor->SetMaxLength(40);
            
            $filterBuilder->addColumn(
                $columns['Extensao'],
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
            
            $main_editor = new TextEdit('codrodovia_edit');
            $main_editor->SetMaxLength(6);
            
            $filterBuilder->addColumn(
                $columns['CodRodovia'],
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
            
            $main_editor = new TextEdit('NameRodovia');
            
            $filterBuilder->addColumn(
                $columns['NameRodovia'],
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
            
            $main_editor = new TextEdit('lote_edit');
            $main_editor->SetMaxLength(6);
            
            $filterBuilder->addColumn(
                $columns['lote'],
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
                $operation = new AjaxOperation(OPERATION_EDIT,
                    $this->GetLocalizerCaptions()->GetMessageString('Edit'),
                    $this->GetLocalizerCaptions()->GetMessageString('Edit'), $this->dataset,
                    $this->GetGridEditHandler(), $grid, AjaxOperation::INLINE);
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
                $operation = new AjaxOperation(OPERATION_COPY,
                    $this->GetLocalizerCaptions()->GetMessageString('Copy'),
                    $this->GetLocalizerCaptions()->GetMessageString('Copy'), $this->dataset,
                    $this->GetModalGridCopyHandler(), $grid, AjaxOperation::INLINE);
                $operation->setUseImage(true);
                $actions->addOperation($operation);
            }
        }
    
        protected function AddFieldColumns(Grid $grid, $withDetails = true)
        {
            if (GetCurrentUserPermissionsForPage('tbl_concessionarias.tbl_rodovias.tbl_geo_estacakmi')->HasViewGrant() && $withDetails)
            {
            //
            // View column for tbl_concessionarias_tbl_rodovias_tbl_geo_estacakmi detail
            //
            $column = new DetailColumn(array('idRodovia'), 'tbl_concessionarias.tbl_rodovias.tbl_geo_estacakmi', 'tbl_concessionarias_tbl_rodovias_tbl_geo_estacakmi_handler', $this->dataset, 'MALHA VIÁRIA');
            $column->setMinimalVisibility(ColumnVisibility::PHONE);
            $grid->AddViewColumn($column);
            }
            
            //
            // View column for RodoviaSP field
            //
            $column = new TextViewColumn('RodoviaSP', 'RodoviaSP', 'Rodovia SP', $this->dataset);
            $column->SetOrderable(true);
            $column->setMinimalVisibility(ColumnVisibility::PHONE);
            $column->SetDescription('');
            $column->SetFixedWidth(null);
            $grid->AddViewColumn($column);
            
            //
            // View column for DenominacaoRodovia field
            //
            $column = new TextViewColumn('DenominacaoRodovia', 'DenominacaoRodovia', 'Denominação', $this->dataset);
            $column->SetOrderable(true);
            $column->setMinimalVisibility(ColumnVisibility::PHONE);
            $column->SetDescription('');
            $column->SetFixedWidth(null);
            $grid->AddViewColumn($column);
            
            //
            // View column for Trecho field
            //
            $column = new TextViewColumn('Trecho', 'Trecho', 'Trecho', $this->dataset);
            $column->SetOrderable(true);
            $column->setMinimalVisibility(ColumnVisibility::PHONE);
            $column->SetDescription('');
            $column->SetFixedWidth(null);
            $grid->AddViewColumn($column);
            
            //
            // View column for km_inicial field
            //
            $column = new NumberViewColumn('km_inicial', 'km_inicial', 'km inicial', $this->dataset);
            $column->SetOrderable(true);
            $column->setNumberAfterDecimal(3);
            $column->setThousandsSeparator('.');
            $column->setDecimalSeparator(',');
            $column->setMinimalVisibility(ColumnVisibility::PHONE);
            $column->SetDescription('');
            $column->SetFixedWidth(null);
            $grid->AddViewColumn($column);
            
            //
            // View column for km_final field
            //
            $column = new NumberViewColumn('km_final', 'km_final', 'km final', $this->dataset);
            $column->SetOrderable(true);
            $column->setNumberAfterDecimal(3);
            $column->setThousandsSeparator('.');
            $column->setDecimalSeparator(',');
            $column->setMinimalVisibility(ColumnVisibility::PHONE);
            $column->SetDescription('');
            $column->SetFixedWidth(null);
            $grid->AddViewColumn($column);
            
            //
            // View column for Extensao field
            //
            $column = new NumberViewColumn('Extensao', 'Extensao', 'Extensão', $this->dataset);
            $column->SetOrderable(true);
            $column->setNumberAfterDecimal(3);
            $column->setThousandsSeparator('.');
            $column->setDecimalSeparator(',');
            $column->setMinimalVisibility(ColumnVisibility::PHONE);
            $column->SetDescription('');
            $column->SetFixedWidth(null);
            $grid->AddViewColumn($column);
            
            //
            // View column for CodRodovia field
            //
            $column = new TextViewColumn('CodRodovia', 'CodRodovia', 'Cod Rodovia', $this->dataset);
            $column->SetOrderable(true);
            $column->setMinimalVisibility(ColumnVisibility::PHONE);
            $column->SetDescription('');
            $column->SetFixedWidth(null);
            $grid->AddViewColumn($column);
            
            //
            // View column for NameRodovia field
            //
            $column = new TextViewColumn('NameRodovia', 'NameRodovia', 'Name Rodovia', $this->dataset);
            $column->SetOrderable(true);
            $column->SetMaxLength(75);
            $column->setMinimalVisibility(ColumnVisibility::PHONE);
            $column->SetDescription('');
            $column->SetFixedWidth(null);
            $grid->AddViewColumn($column);
            
            //
            // View column for lote field
            //
            $column = new TextViewColumn('lote', 'lote', 'Lote', $this->dataset);
            $column->SetOrderable(true);
            $column->setMinimalVisibility(ColumnVisibility::PHONE);
            $column->SetDescription('');
            $column->SetFixedWidth(null);
            $grid->AddViewColumn($column);
        }
    
        protected function AddSingleRecordViewColumns(Grid $grid)
        {
            //
            // View column for idRodovia field
            //
            $column = new NumberViewColumn('idRodovia', 'idRodovia', 'Id', $this->dataset);
            $column->SetOrderable(true);
            $column->setNumberAfterDecimal(0);
            $column->setThousandsSeparator('.');
            $column->setDecimalSeparator('');
            $grid->AddSingleRecordViewColumn($column);
            
            //
            // View column for RodoviaSP field
            //
            $column = new TextViewColumn('RodoviaSP', 'RodoviaSP', 'Rodovia SP', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddSingleRecordViewColumn($column);
            
            //
            // View column for DenominacaoRodovia field
            //
            $column = new TextViewColumn('DenominacaoRodovia', 'DenominacaoRodovia', 'Denominação', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddSingleRecordViewColumn($column);
            
            //
            // View column for Trecho field
            //
            $column = new TextViewColumn('Trecho', 'Trecho', 'Trecho', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddSingleRecordViewColumn($column);
            
            //
            // View column for NomeConcessionaria field
            //
            $column = new TextViewColumn('id_concessionaria', 'id_concessionaria_NomeConcessionaria', 'Concessionária', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddSingleRecordViewColumn($column);
            
            //
            // View column for km_inicial field
            //
            $column = new NumberViewColumn('km_inicial', 'km_inicial', 'km inicial', $this->dataset);
            $column->SetOrderable(true);
            $column->setNumberAfterDecimal(3);
            $column->setThousandsSeparator('.');
            $column->setDecimalSeparator(',');
            $grid->AddSingleRecordViewColumn($column);
            
            //
            // View column for km_final field
            //
            $column = new NumberViewColumn('km_final', 'km_final', 'km final', $this->dataset);
            $column->SetOrderable(true);
            $column->setNumberAfterDecimal(3);
            $column->setThousandsSeparator('.');
            $column->setDecimalSeparator(',');
            $grid->AddSingleRecordViewColumn($column);
            
            //
            // View column for Extensao field
            //
            $column = new NumberViewColumn('Extensao', 'Extensao', 'Extensão', $this->dataset);
            $column->SetOrderable(true);
            $column->setNumberAfterDecimal(3);
            $column->setThousandsSeparator('.');
            $column->setDecimalSeparator(',');
            $grid->AddSingleRecordViewColumn($column);
            
            //
            // View column for CodRodovia field
            //
            $column = new TextViewColumn('CodRodovia', 'CodRodovia', 'Cod Rodovia', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddSingleRecordViewColumn($column);
            
            //
            // View column for NameRodovia field
            //
            $column = new TextViewColumn('NameRodovia', 'NameRodovia', 'Name Rodovia', $this->dataset);
            $column->SetOrderable(true);
            $column->SetMaxLength(75);
            $grid->AddSingleRecordViewColumn($column);
            
            //
            // View column for lote field
            //
            $column = new TextViewColumn('lote', 'lote', 'Lote', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddSingleRecordViewColumn($column);
        }
    
        protected function AddEditColumns(Grid $grid)
        {
            //
            // Edit column for RodoviaSP field
            //
            $editor = new TextEdit('rodoviasp_edit');
            $editor->SetMaxLength(12);
            $editColumn = new CustomEditColumn('Rodovia SP', 'RodoviaSP', $editor, $this->dataset);
            $validator = new RequiredValidator(StringUtils::Format($this->GetLocalizerCaptions()->GetMessageString('RequiredValidationMessage'), $editColumn->GetCaption()));
            $editor->GetValidatorCollection()->AddValidator($validator);
            $validator = new MaxLengthValidator(12, StringUtils::Format($this->GetLocalizerCaptions()->GetMessageString('MaxlengthValidationMessage'), $editColumn->GetCaption()));
            $editor->GetValidatorCollection()->AddValidator($validator);
            $validator = new MinLengthValidator(0, StringUtils::Format($this->GetLocalizerCaptions()->GetMessageString('MinlengthValidationMessage'), $editColumn->GetCaption()));
            $editor->GetValidatorCollection()->AddValidator($validator);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddEditColumn($editColumn);
            
            //
            // Edit column for DenominacaoRodovia field
            //
            $editor = new TextEdit('denominacaorodovia_edit');
            $editor->SetMaxLength(50);
            $editColumn = new CustomEditColumn('Denominação', 'DenominacaoRodovia', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddEditColumn($editColumn);
            
            //
            // Edit column for Trecho field
            //
            $editor = new TextEdit('trecho_edit');
            $editor->SetMaxLength(60);
            $editColumn = new CustomEditColumn('Trecho', 'Trecho', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddEditColumn($editColumn);
            
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
            $editColumn = new DynamicLookupEditColumn('Concessionária', 'id_concessionaria', 'id_concessionaria_NomeConcessionaria', 'edit_tbl_concessionarias_tbl_rodovias_id_concessionaria_search', $editor, $this->dataset, $lookupDataset, 'idConcessiona', 'NomeConcessionaria', '');
            $editColumn->SetReadOnly(true);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddEditColumn($editColumn);
            
            //
            // Edit column for km_inicial field
            //
            $editor = new TextEdit('km_inicial_edit');
            $editColumn = new CustomEditColumn('km inicial', 'km_inicial', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddEditColumn($editColumn);
            
            //
            // Edit column for km_final field
            //
            $editor = new TextEdit('km_final_edit');
            $editColumn = new CustomEditColumn('km final', 'km_final', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddEditColumn($editColumn);
            
            //
            // Edit column for CodRodovia field
            //
            $editor = new TextEdit('codrodovia_edit');
            $editor->SetMaxLength(6);
            $editColumn = new CustomEditColumn('Cod Rodovia', 'CodRodovia', $editor, $this->dataset);
            $validator = new RequiredValidator(StringUtils::Format($this->GetLocalizerCaptions()->GetMessageString('RequiredValidationMessage'), $editColumn->GetCaption()));
            $editor->GetValidatorCollection()->AddValidator($validator);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddEditColumn($editColumn);
            
            //
            // Edit column for NameRodovia field
            //
            $editor = new TextAreaEdit('namerodovia_edit', 50, 8);
            $editColumn = new CustomEditColumn('Name Rodovia', 'NameRodovia', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddEditColumn($editColumn);
            
            //
            // Edit column for lote field
            //
            $editor = new TextEdit('lote_edit');
            $editor->SetMaxLength(6);
            $editColumn = new CustomEditColumn('Lote', 'lote', $editor, $this->dataset);
            $validator = new RequiredValidator(StringUtils::Format($this->GetLocalizerCaptions()->GetMessageString('RequiredValidationMessage'), $editColumn->GetCaption()));
            $editor->GetValidatorCollection()->AddValidator($validator);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddEditColumn($editColumn);
        }
    
        protected function AddMultiEditColumns(Grid $grid)
        {
            //
            // Edit column for RodoviaSP field
            //
            $editor = new TextEdit('rodoviasp_edit');
            $editor->SetMaxLength(12);
            $editColumn = new CustomEditColumn('Rodovia SP', 'RodoviaSP', $editor, $this->dataset);
            $validator = new RequiredValidator(StringUtils::Format($this->GetLocalizerCaptions()->GetMessageString('RequiredValidationMessage'), $editColumn->GetCaption()));
            $editor->GetValidatorCollection()->AddValidator($validator);
            $validator = new MaxLengthValidator(12, StringUtils::Format($this->GetLocalizerCaptions()->GetMessageString('MaxlengthValidationMessage'), $editColumn->GetCaption()));
            $editor->GetValidatorCollection()->AddValidator($validator);
            $validator = new MinLengthValidator(0, StringUtils::Format($this->GetLocalizerCaptions()->GetMessageString('MinlengthValidationMessage'), $editColumn->GetCaption()));
            $editor->GetValidatorCollection()->AddValidator($validator);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddMultiEditColumn($editColumn);
            
            //
            // Edit column for DenominacaoRodovia field
            //
            $editor = new TextEdit('denominacaorodovia_edit');
            $editor->SetMaxLength(50);
            $editColumn = new CustomEditColumn('Denominação', 'DenominacaoRodovia', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddMultiEditColumn($editColumn);
            
            //
            // Edit column for Trecho field
            //
            $editor = new TextEdit('trecho_edit');
            $editor->SetMaxLength(60);
            $editColumn = new CustomEditColumn('Trecho', 'Trecho', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddMultiEditColumn($editColumn);
            
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
            $editColumn = new DynamicLookupEditColumn('Concessionária', 'id_concessionaria', 'id_concessionaria_NomeConcessionaria', 'multi_edit_tbl_concessionarias_tbl_rodovias_id_concessionaria_search', $editor, $this->dataset, $lookupDataset, 'idConcessiona', 'NomeConcessionaria', '');
            $editColumn->SetReadOnly(true);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddMultiEditColumn($editColumn);
            
            //
            // Edit column for km_inicial field
            //
            $editor = new TextEdit('km_inicial_edit');
            $editColumn = new CustomEditColumn('km inicial', 'km_inicial', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddMultiEditColumn($editColumn);
            
            //
            // Edit column for km_final field
            //
            $editor = new TextEdit('km_final_edit');
            $editColumn = new CustomEditColumn('km final', 'km_final', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddMultiEditColumn($editColumn);
            
            //
            // Edit column for CodRodovia field
            //
            $editor = new TextEdit('codrodovia_edit');
            $editor->SetMaxLength(6);
            $editColumn = new CustomEditColumn('Cod Rodovia', 'CodRodovia', $editor, $this->dataset);
            $validator = new RequiredValidator(StringUtils::Format($this->GetLocalizerCaptions()->GetMessageString('RequiredValidationMessage'), $editColumn->GetCaption()));
            $editor->GetValidatorCollection()->AddValidator($validator);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddMultiEditColumn($editColumn);
            
            //
            // Edit column for NameRodovia field
            //
            $editor = new TextAreaEdit('namerodovia_edit', 50, 8);
            $editColumn = new CustomEditColumn('Name Rodovia', 'NameRodovia', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddMultiEditColumn($editColumn);
            
            //
            // Edit column for lote field
            //
            $editor = new TextEdit('lote_edit');
            $editor->SetMaxLength(6);
            $editColumn = new CustomEditColumn('Lote', 'lote', $editor, $this->dataset);
            $validator = new RequiredValidator(StringUtils::Format($this->GetLocalizerCaptions()->GetMessageString('RequiredValidationMessage'), $editColumn->GetCaption()));
            $editor->GetValidatorCollection()->AddValidator($validator);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddMultiEditColumn($editColumn);
        }
    
        protected function AddInsertColumns(Grid $grid)
        {
            //
            // Edit column for RodoviaSP field
            //
            $editor = new TextEdit('rodoviasp_edit');
            $editor->SetMaxLength(12);
            $editColumn = new CustomEditColumn('Rodovia SP', 'RodoviaSP', $editor, $this->dataset);
            $validator = new RequiredValidator(StringUtils::Format($this->GetLocalizerCaptions()->GetMessageString('RequiredValidationMessage'), $editColumn->GetCaption()));
            $editor->GetValidatorCollection()->AddValidator($validator);
            $validator = new MaxLengthValidator(12, StringUtils::Format($this->GetLocalizerCaptions()->GetMessageString('MaxlengthValidationMessage'), $editColumn->GetCaption()));
            $editor->GetValidatorCollection()->AddValidator($validator);
            $validator = new MinLengthValidator(0, StringUtils::Format($this->GetLocalizerCaptions()->GetMessageString('MinlengthValidationMessage'), $editColumn->GetCaption()));
            $editor->GetValidatorCollection()->AddValidator($validator);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddInsertColumn($editColumn);
            
            //
            // Edit column for DenominacaoRodovia field
            //
            $editor = new TextEdit('denominacaorodovia_edit');
            $editor->SetMaxLength(50);
            $editColumn = new CustomEditColumn('Denominação', 'DenominacaoRodovia', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddInsertColumn($editColumn);
            
            //
            // Edit column for Trecho field
            //
            $editor = new TextEdit('trecho_edit');
            $editor->SetMaxLength(60);
            $editColumn = new CustomEditColumn('Trecho', 'Trecho', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddInsertColumn($editColumn);
            
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
            $editColumn = new DynamicLookupEditColumn('Concessionária', 'id_concessionaria', 'id_concessionaria_NomeConcessionaria', 'insert_tbl_concessionarias_tbl_rodovias_id_concessionaria_search', $editor, $this->dataset, $lookupDataset, 'idConcessiona', 'NomeConcessionaria', '');
            $editColumn->SetReadOnly(true);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddInsertColumn($editColumn);
            
            //
            // Edit column for km_inicial field
            //
            $editor = new TextEdit('km_inicial_edit');
            $editColumn = new CustomEditColumn('km inicial', 'km_inicial', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddInsertColumn($editColumn);
            
            //
            // Edit column for km_final field
            //
            $editor = new TextEdit('km_final_edit');
            $editColumn = new CustomEditColumn('km final', 'km_final', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddInsertColumn($editColumn);
            
            //
            // Edit column for CodRodovia field
            //
            $editor = new TextEdit('codrodovia_edit');
            $editor->SetMaxLength(6);
            $editColumn = new CustomEditColumn('Cod Rodovia', 'CodRodovia', $editor, $this->dataset);
            $validator = new RequiredValidator(StringUtils::Format($this->GetLocalizerCaptions()->GetMessageString('RequiredValidationMessage'), $editColumn->GetCaption()));
            $editor->GetValidatorCollection()->AddValidator($validator);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddInsertColumn($editColumn);
            
            //
            // Edit column for NameRodovia field
            //
            $editor = new TextAreaEdit('namerodovia_edit', 50, 8);
            $editColumn = new CustomEditColumn('Name Rodovia', 'NameRodovia', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddInsertColumn($editColumn);
            
            //
            // Edit column for lote field
            //
            $editor = new TextEdit('lote_edit');
            $editor->SetMaxLength(6);
            $editColumn = new CustomEditColumn('Lote', 'lote', $editor, $this->dataset);
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
            // View column for idRodovia field
            //
            $column = new NumberViewColumn('idRodovia', 'idRodovia', 'Id', $this->dataset);
            $column->SetOrderable(true);
            $column->setNumberAfterDecimal(0);
            $column->setThousandsSeparator('.');
            $column->setDecimalSeparator('');
            $grid->AddPrintColumn($column);
            
            //
            // View column for RodoviaSP field
            //
            $column = new TextViewColumn('RodoviaSP', 'RodoviaSP', 'Rodovia SP', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddPrintColumn($column);
            
            //
            // View column for DenominacaoRodovia field
            //
            $column = new TextViewColumn('DenominacaoRodovia', 'DenominacaoRodovia', 'Denominação', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddPrintColumn($column);
            
            //
            // View column for Trecho field
            //
            $column = new TextViewColumn('Trecho', 'Trecho', 'Trecho', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddPrintColumn($column);
            
            //
            // View column for NomeConcessionaria field
            //
            $column = new TextViewColumn('id_concessionaria', 'id_concessionaria_NomeConcessionaria', 'Concessionária', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddPrintColumn($column);
            
            //
            // View column for km_inicial field
            //
            $column = new NumberViewColumn('km_inicial', 'km_inicial', 'km inicial', $this->dataset);
            $column->SetOrderable(true);
            $column->setNumberAfterDecimal(3);
            $column->setThousandsSeparator('.');
            $column->setDecimalSeparator(',');
            $grid->AddPrintColumn($column);
            
            //
            // View column for km_final field
            //
            $column = new NumberViewColumn('km_final', 'km_final', 'km final', $this->dataset);
            $column->SetOrderable(true);
            $column->setNumberAfterDecimal(3);
            $column->setThousandsSeparator('.');
            $column->setDecimalSeparator(',');
            $grid->AddPrintColumn($column);
            
            //
            // View column for Extensao field
            //
            $column = new NumberViewColumn('Extensao', 'Extensao', 'Extensão', $this->dataset);
            $column->SetOrderable(true);
            $column->setNumberAfterDecimal(3);
            $column->setThousandsSeparator('.');
            $column->setDecimalSeparator(',');
            $grid->AddPrintColumn($column);
            
            //
            // View column for CodRodovia field
            //
            $column = new TextViewColumn('CodRodovia', 'CodRodovia', 'Cod Rodovia', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddPrintColumn($column);
            
            //
            // View column for NameRodovia field
            //
            $column = new TextViewColumn('NameRodovia', 'NameRodovia', 'Name Rodovia', $this->dataset);
            $column->SetOrderable(true);
            $column->SetMaxLength(75);
            $grid->AddPrintColumn($column);
            
            //
            // View column for lote field
            //
            $column = new TextViewColumn('lote', 'lote', 'Lote', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddPrintColumn($column);
        }
    
        protected function AddExportColumns(Grid $grid)
        {
            //
            // View column for idRodovia field
            //
            $column = new NumberViewColumn('idRodovia', 'idRodovia', 'Id', $this->dataset);
            $column->SetOrderable(true);
            $column->setNumberAfterDecimal(0);
            $column->setThousandsSeparator('.');
            $column->setDecimalSeparator('');
            $grid->AddExportColumn($column);
            
            //
            // View column for RodoviaSP field
            //
            $column = new TextViewColumn('RodoviaSP', 'RodoviaSP', 'Rodovia SP', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddExportColumn($column);
            
            //
            // View column for DenominacaoRodovia field
            //
            $column = new TextViewColumn('DenominacaoRodovia', 'DenominacaoRodovia', 'Denominação', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddExportColumn($column);
            
            //
            // View column for Trecho field
            //
            $column = new TextViewColumn('Trecho', 'Trecho', 'Trecho', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddExportColumn($column);
            
            //
            // View column for NomeConcessionaria field
            //
            $column = new TextViewColumn('id_concessionaria', 'id_concessionaria_NomeConcessionaria', 'Concessionária', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddExportColumn($column);
            
            //
            // View column for km_inicial field
            //
            $column = new NumberViewColumn('km_inicial', 'km_inicial', 'km inicial', $this->dataset);
            $column->SetOrderable(true);
            $column->setNumberAfterDecimal(3);
            $column->setThousandsSeparator('.');
            $column->setDecimalSeparator(',');
            $grid->AddExportColumn($column);
            
            //
            // View column for km_final field
            //
            $column = new NumberViewColumn('km_final', 'km_final', 'km final', $this->dataset);
            $column->SetOrderable(true);
            $column->setNumberAfterDecimal(3);
            $column->setThousandsSeparator('.');
            $column->setDecimalSeparator(',');
            $grid->AddExportColumn($column);
            
            //
            // View column for Extensao field
            //
            $column = new NumberViewColumn('Extensao', 'Extensao', 'Extensão', $this->dataset);
            $column->SetOrderable(true);
            $column->setNumberAfterDecimal(3);
            $column->setThousandsSeparator('.');
            $column->setDecimalSeparator(',');
            $grid->AddExportColumn($column);
            
            //
            // View column for CodRodovia field
            //
            $column = new TextViewColumn('CodRodovia', 'CodRodovia', 'Cod Rodovia', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddExportColumn($column);
            
            //
            // View column for NameRodovia field
            //
            $column = new TextViewColumn('NameRodovia', 'NameRodovia', 'Name Rodovia', $this->dataset);
            $column->SetOrderable(true);
            $column->SetMaxLength(75);
            $grid->AddExportColumn($column);
            
            //
            // View column for lote field
            //
            $column = new TextViewColumn('lote', 'lote', 'Lote', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddExportColumn($column);
        }
    
        private function AddCompareColumns(Grid $grid)
        {
            //
            // View column for CodRodovia field
            //
            $column = new TextViewColumn('CodRodovia', 'CodRodovia', 'Cod Rodovia', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddCompareColumn($column);
            
            //
            // View column for NameRodovia field
            //
            $column = new TextViewColumn('NameRodovia', 'NameRodovia', 'Name Rodovia', $this->dataset);
            $column->SetOrderable(true);
            $column->SetMaxLength(75);
            $grid->AddCompareColumn($column);
            
            //
            // View column for lote field
            //
            $column = new TextViewColumn('lote', 'lote', 'Lote', $this->dataset);
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
            $result->setTableBordered(false);
            $result->setTableCondensed(false);
            
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
        
        public function GetEnableInlineGridInsert() { return true; }
        protected function GetEnableModalGridDelete() { return true; }
        
        public function GetEnableModalGridCopy() { return true; }
    
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
            $result->setMultiEditAllowed($this->GetSecurityInfo()->HasEditGrant() && true);
            $result->setTableBordered(false);
            $result->setTableCondensed(false);
            
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
    
    
            $this->SetInsertFormTitle('FORMULÁO DE CADASTRO DE RODOVIAS');
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
            $detailPage = new tbl_concessionarias_tbl_rodovias_tbl_geo_estacakmiPage('tbl_concessionarias_tbl_rodovias_tbl_geo_estacakmi', $this, array('CodeRodovia'), array('idRodovia'), $this->GetForeignKeyFields(), $this->CreateMasterDetailRecordGrid(), $this->dataset, GetCurrentUserPermissionsForPage('tbl_concessionarias.tbl_rodovias.tbl_geo_estacakmi'), 'UTF-8');
            $detailPage->SetRecordPermission(GetCurrentUserRecordPermissionsForDataSource('tbl_concessionarias.tbl_rodovias.tbl_geo_estacakmi'));
            $detailPage->SetHttpHandlerName('tbl_concessionarias_tbl_rodovias_tbl_geo_estacakmi_handler');
            $handler = new PageHTTPHandler('tbl_concessionarias_tbl_rodovias_tbl_geo_estacakmi_handler', $detailPage);
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
            $handler = new DynamicSearchHandler($lookupDataset, $this, 'insert_tbl_concessionarias_tbl_rodovias_id_concessionaria_search', 'idConcessiona', 'NomeConcessionaria', null, 20);
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
            $handler = new DynamicSearchHandler($lookupDataset, $this, 'filter_builder_tbl_concessionarias_tbl_rodovias_id_concessionaria_search', 'idConcessiona', 'NomeConcessionaria', null, 20);
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
            $handler = new DynamicSearchHandler($lookupDataset, $this, 'edit_tbl_concessionarias_tbl_rodovias_id_concessionaria_search', 'idConcessiona', 'NomeConcessionaria', null, 20);
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
            $handler = new DynamicSearchHandler($lookupDataset, $this, 'multi_edit_tbl_concessionarias_tbl_rodovias_id_concessionaria_search', 'idConcessiona', 'NomeConcessionaria', null, 20);
            GetApplication()->RegisterHTTPHandler($handler);
        }
       
        protected function doCustomRenderColumn($fieldName, $fieldData, $rowData, &$customText, &$handled)
        { 
            if ($fieldName == 'Extensao') {
                        
                            if ($fieldData  == 0)
                        
                                $customText = $fieldData . number_format($rowData ['km_final'] - $rowData['km_inicial'],2,",",".");
                        
                            else
                        
                                $customText = '-';
                        
                            $handled = true;   
                        
                        }
        }
    
        protected function doCustomRenderPrintColumn($fieldName, $fieldData, $rowData, &$customText, &$handled)
        { 
            if ($fieldName == 'Extensao') {
                        
                            if ($fieldData  == 0)
                        
                                $customText = $fieldData . number_format($rowData ['km_final'] - $rowData['km_inicial'],2,",",".");
                        
                            else
                        
                                $customText = '-';
                        
                            $handled = true;   
                        
                        }
        }
    
        protected function doCustomRenderExportColumn($exportType, $fieldName, $fieldData, $rowData, &$customText, &$handled)
        { 
            if ($fieldName == 'Extensao') {
                        
                            if ($fieldData  == 0)
                        
                                $customText = $fieldData . number_format($rowData ['km_final'] - $rowData['km_inicial'],2,",",".");
                        
                            else
                        
                                $customText = '-';
                        
                            $handled = true;   
                        
                        }
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
            $ip = $this->GetEnvVar('REMOTE_ADDR');			
            $userName = $this->GetEnvVar('CURRENT_USER_NAME');
            $inserir = 'inseriu_registro';			
            $numficha = $this->GetConnection()->ExecScalarSQL('SELECT LAST_INSERT_ID() From tbl_rodovias');
            $this->GetConnection()->ExecSQL("INSERT INTO tbl_auditoria(operador, data, tabela, acao, numficha, ip_address)
            VALUES('$userName',  CURRENT_TIMESTAMP, '$tableName' , '$inserir', $numficha, '$ip')");
        }
    
        protected function doAfterUpdateRecord($page, $oldRowData, $rowData, $tableName, &$success, &$message, &$messageDisplayTime)
        {
            $ip = $this->GetEnvVar('REMOTE_ADDR');
            $userName = $this->GetEnvVar('CURRENT_USER_NAME');
            $atualizou = 'atualizou_registro';
            $numficha = $rowData['idRodovia'];
            $this->GetConnection()->ExecSQL("INSERT INTO tbl_auditoria(operador, data, tabela, acao, numficha, ip_address)
            VALUES('$userName',  CURRENT_TIMESTAMP, '$tableName' , '$atualizou',$numficha,'$ip')");
        }
    
        protected function doAfterDeleteRecord($page, $rowData, $tableName, &$success, &$message, &$messageDisplayTime)
        {
            $ip = $this->GetEnvVar('REMOTE_ADDR');
            $userName = $this->GetEnvVar('CURRENT_USER_NAME');
            $excluir = 'excluiu_registro';
            $numficha = $rowData['idRodovia'];
            $this->GetConnection()->ExecSQL("INSERT INTO tbl_auditoria(operador, data, tabela, acao, numficha, ip_address)
            VALUES('$userName',  CURRENT_TIMESTAMP, '$tableName' , '$excluir',$numficha, '$ip')");
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
    
    class tbl_concessionarias_id_fiscalizadoraNestedPage extends NestedFormPage
    {
        protected function DoBeforeCreate()
        {
            $this->dataset = new TableDataset(
                MyPDOConnectionFactory::getInstance(),
                GetConnectionOptions(),
                '`tbl_eafs`');
            $this->dataset->addFields(
                array(
                    new IntegerField('idEaf', true, true, true),
                    new StringField('NomeEaf'),
                    new StringField('UsuarioResponsavel'),
                    new StringField('email'),
                    new StringField('Telefone'),
                    new BlobField('image_logo')
                )
            );
        }
    
        protected function DoPrepare() {
    
        }
    
        protected function AddInsertColumns(Grid $grid)
        {
            //
            // Edit column for NomeEaf field
            //
            $editor = new TextEdit('nomeeaf_edit');
            $editor->SetMaxLength(50);
            $editColumn = new CustomEditColumn('Fiscalizadora', 'NomeEaf', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddInsertColumn($editColumn);
            
            //
            // Edit column for UsuarioResponsavel field
            //
            $editor = new TextEdit('usuarioresponsavel_edit');
            $editor->SetMaxLength(40);
            $editColumn = new CustomEditColumn('Usuário Responsável', 'UsuarioResponsavel', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddInsertColumn($editColumn);
            
            //
            // Edit column for email field
            //
            $editor = new TextEdit('email_edit');
            $editor->SetMaxLength(30);
            $editColumn = new CustomEditColumn('Email', 'email', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
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
            // Edit column for image_logo field
            //
            $editor = new ImageUploader('image_logo_edit');
            $editor->SetShowImage(false);
            $editColumn = new FileUploadingColumn('Image Logo', 'image_logo', $editor, $this->dataset, false, false, 'tbl_concessionarias_id_fiscalizadoraNestedPage_image_logo_handler_insert');
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
    
    
    
    class tbl_concessionariasPage extends Page
    {
        protected function DoBeforeCreate()
        {
            $this->SetTitle('CADASTRO CONCESSIONÁRIAS');
            $this->SetMenuLabel('CONCESSIONÁRIAS');
    
            $this->dataset = new TableDataset(
                MyPDOConnectionFactory::getInstance(),
                GetConnectionOptions(),
                '`tbl_concessionarias`');
            $this->dataset->addFields(
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
            $this->dataset->AddLookupField('id_fiscalizadora', 'tbl_eafs', new IntegerField('idEaf'), new StringField('NomeEaf', false, false, false, false, 'id_fiscalizadora_NomeEaf', 'id_fiscalizadora_NomeEaf_tbl_eafs'), 'id_fiscalizadora_NomeEaf_tbl_eafs');
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
                new FilterColumn($this->dataset, 'idConcessiona', 'idConcessiona', 'Id'),
                new FilterColumn($this->dataset, 'NomeConcessionaria', 'NomeConcessionaria', 'Concessionária'),
                new FilterColumn($this->dataset, 'Lote', 'Lote', 'Lote'),
                new FilterColumn($this->dataset, 'dtInicioConcessao', 'dtInicioConcessao', 'Data Inicio Concessão'),
                new FilterColumn($this->dataset, 'dtTerminoConcessao', 'dtTerminoConcessao', 'Data Término Concessão'),
                new FilterColumn($this->dataset, 'Edital', 'Edital', 'Edital'),
                new FilterColumn($this->dataset, 'UsuarioResponsavel', 'UsuarioResponsavel', 'Responsável'),
                new FilterColumn($this->dataset, 'email', 'email', 'Email'),
                new FilterColumn($this->dataset, 'Telefone', 'Telefone', 'Telefone'),
                new FilterColumn($this->dataset, 'site', 'site', 'Site'),
                new FilterColumn($this->dataset, 'id_fiscalizadora', 'id_fiscalizadora_NomeEaf', 'Fiscalizadora'),
                new FilterColumn($this->dataset, 'NumCNPJ', 'NumCNPJ', 'Num CNPJ'),
                new FilterColumn($this->dataset, 'image_log', 'image_log', 'Image Log')
            );
        }
    
        protected function setupQuickFilter(QuickFilter $quickFilter, FixedKeysArray $columns)
        {
            $quickFilter
                ->addColumn($columns['idConcessiona'])
                ->addColumn($columns['NomeConcessionaria'])
                ->addColumn($columns['Lote'])
                ->addColumn($columns['dtInicioConcessao'])
                ->addColumn($columns['dtTerminoConcessao'])
                ->addColumn($columns['Edital'])
                ->addColumn($columns['UsuarioResponsavel'])
                ->addColumn($columns['email'])
                ->addColumn($columns['Telefone'])
                ->addColumn($columns['site'])
                ->addColumn($columns['id_fiscalizadora'])
                ->addColumn($columns['NumCNPJ'])
                ->addColumn($columns['image_log']);
        }
    
        protected function setupColumnFilter(ColumnFilter $columnFilter)
        {
            $columnFilter
                ->setOptionsFor('image_log');
        }
    
        protected function setupFilterBuilder(FilterBuilder $filterBuilder, FixedKeysArray $columns)
        {
            $main_editor = new TextEdit('idconcessiona_edit');
            
            $filterBuilder->addColumn(
                $columns['idConcessiona'],
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
            
            $main_editor = new TextEdit('nomeconcessionaria_edit');
            $main_editor->SetMaxLength(50);
            
            $filterBuilder->addColumn(
                $columns['NomeConcessionaria'],
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
            
            $main_editor = new TextEdit('lote_edit');
            $main_editor->SetMaxLength(10);
            
            $filterBuilder->addColumn(
                $columns['Lote'],
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
            
            $main_editor = new DateTimeEdit('dtinicioconcessao_edit', false, 'd-m-Y');
            
            $filterBuilder->addColumn(
                $columns['dtInicioConcessao'],
                array(
                    FilterConditionOperator::EQUALS => $main_editor,
                    FilterConditionOperator::DOES_NOT_EQUAL => $main_editor,
                    FilterConditionOperator::IS_GREATER_THAN => $main_editor,
                    FilterConditionOperator::IS_GREATER_THAN_OR_EQUAL_TO => $main_editor,
                    FilterConditionOperator::IS_LESS_THAN => $main_editor,
                    FilterConditionOperator::IS_LESS_THAN_OR_EQUAL_TO => $main_editor,
                    FilterConditionOperator::IS_BETWEEN => $main_editor,
                    FilterConditionOperator::IS_NOT_BETWEEN => $main_editor,
                    FilterConditionOperator::DATE_EQUALS => $main_editor,
                    FilterConditionOperator::DATE_DOES_NOT_EQUAL => $main_editor,
                    FilterConditionOperator::TODAY => null,
                    FilterConditionOperator::IS_BLANK => null,
                    FilterConditionOperator::IS_NOT_BLANK => null
                )
            );
            
            $main_editor = new DateTimeEdit('dtterminoconcessao_edit', false, 'd-m-Y');
            
            $filterBuilder->addColumn(
                $columns['dtTerminoConcessao'],
                array(
                    FilterConditionOperator::EQUALS => $main_editor,
                    FilterConditionOperator::DOES_NOT_EQUAL => $main_editor,
                    FilterConditionOperator::IS_GREATER_THAN => $main_editor,
                    FilterConditionOperator::IS_GREATER_THAN_OR_EQUAL_TO => $main_editor,
                    FilterConditionOperator::IS_LESS_THAN => $main_editor,
                    FilterConditionOperator::IS_LESS_THAN_OR_EQUAL_TO => $main_editor,
                    FilterConditionOperator::IS_BETWEEN => $main_editor,
                    FilterConditionOperator::IS_NOT_BETWEEN => $main_editor,
                    FilterConditionOperator::DATE_EQUALS => $main_editor,
                    FilterConditionOperator::DATE_DOES_NOT_EQUAL => $main_editor,
                    FilterConditionOperator::TODAY => null,
                    FilterConditionOperator::IS_BLANK => null,
                    FilterConditionOperator::IS_NOT_BLANK => null
                )
            );
            
            $main_editor = new TextEdit('edital_edit');
            $main_editor->SetMaxLength(20);
            
            $filterBuilder->addColumn(
                $columns['Edital'],
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
            
            $main_editor = new TextEdit('usuarioresponsavel_edit');
            $main_editor->SetMaxLength(40);
            
            $filterBuilder->addColumn(
                $columns['UsuarioResponsavel'],
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
            
            $main_editor = new TextEdit('email_edit');
            $main_editor->SetMaxLength(30);
            
            $filterBuilder->addColumn(
                $columns['email'],
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
            
            $main_editor = new TextEdit('site_edit');
            $main_editor->SetMaxLength(100);
            
            $filterBuilder->addColumn(
                $columns['site'],
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
            
            $main_editor = new DynamicCombobox('id_fiscalizadora_edit', $this->CreateLinkBuilder());
            $main_editor->setAllowClear(true);
            $main_editor->setMinimumInputLength(0);
            $main_editor->SetAllowNullValue(false);
            $main_editor->SetHandlerName('filter_builder_tbl_concessionarias_id_fiscalizadora_search');
            
            $multi_value_select_editor = new RemoteMultiValueSelect('id_fiscalizadora', $this->CreateLinkBuilder());
            $multi_value_select_editor->SetHandlerName('filter_builder_tbl_concessionarias_id_fiscalizadora_search');
            
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
            
            $main_editor = new TextEdit('numcnpj_edit');
            $main_editor->SetMaxLength(14);
            
            $filterBuilder->addColumn(
                $columns['NumCNPJ'],
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
            
            $main_editor = new TextEdit('image_log');
            
            $filterBuilder->addColumn(
                $columns['image_log'],
                array(
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
            if (GetCurrentUserPermissionsForPage('tbl_concessionarias.tbl_rodovias')->HasViewGrant() && $withDetails)
            {
            //
            // View column for tbl_concessionarias_tbl_rodovias detail
            //
            $column = new DetailColumn(array('idConcessiona'), 'tbl_concessionarias.tbl_rodovias', 'tbl_concessionarias_tbl_rodovias_handler', $this->dataset, 'RODOVIAS');
            $column->setMinimalVisibility(ColumnVisibility::PHONE);
            $grid->AddViewColumn($column);
            }
            
            //
            // View column for NomeConcessionaria field
            //
            $column = new TextViewColumn('NomeConcessionaria', 'NomeConcessionaria', 'Concessionária', $this->dataset);
            $column->SetOrderable(true);
            $column->setMinimalVisibility(ColumnVisibility::PHONE);
            $column->SetDescription('');
            $column->SetFixedWidth(null);
            $grid->AddViewColumn($column);
            
            //
            // View column for Lote field
            //
            $column = new TextViewColumn('Lote', 'Lote', 'Lote', $this->dataset);
            $column->SetOrderable(true);
            $column->setMinimalVisibility(ColumnVisibility::PHONE);
            $column->SetDescription('');
            $column->SetFixedWidth(null);
            $grid->AddViewColumn($column);
            
            //
            // View column for NumCNPJ field
            //
            $column = new TextViewColumn('NumCNPJ', 'NumCNPJ', 'Num CNPJ', $this->dataset);
            $column->SetOrderable(true);
            $column->setMinimalVisibility(ColumnVisibility::PHONE);
            $column->SetDescription('');
            $column->SetFixedWidth(null);
            $grid->AddViewColumn($column);
            
            //
            // View column for image_log field
            //
            $column = new BlobImageViewColumn('image_log', 'image_log', 'Image Log', $this->dataset, 'tbl_concessionarias_image_log_handler_list');
            $column->SetOrderable(true);
            $column->setMinimalVisibility(ColumnVisibility::PHONE);
            $column->SetDescription('');
            $column->SetFixedWidth(null);
            $grid->AddViewColumn($column);
        }
    
        protected function AddSingleRecordViewColumns(Grid $grid)
        {
            //
            // View column for idConcessiona field
            //
            $column = new NumberViewColumn('idConcessiona', 'idConcessiona', 'Id', $this->dataset);
            $column->SetOrderable(true);
            $column->setNumberAfterDecimal(0);
            $column->setThousandsSeparator('.');
            $column->setDecimalSeparator('');
            $grid->AddSingleRecordViewColumn($column);
            
            //
            // View column for NomeConcessionaria field
            //
            $column = new TextViewColumn('NomeConcessionaria', 'NomeConcessionaria', 'Concessionária', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddSingleRecordViewColumn($column);
            
            //
            // View column for Lote field
            //
            $column = new TextViewColumn('Lote', 'Lote', 'Lote', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddSingleRecordViewColumn($column);
            
            //
            // View column for dtInicioConcessao field
            //
            $column = new DateTimeViewColumn('dtInicioConcessao', 'dtInicioConcessao', 'Data Inicio Concessão', $this->dataset);
            $column->SetOrderable(true);
            $column->SetDateTimeFormat('d-m-Y');
            $grid->AddSingleRecordViewColumn($column);
            
            //
            // View column for dtTerminoConcessao field
            //
            $column = new DateTimeViewColumn('dtTerminoConcessao', 'dtTerminoConcessao', 'Data Término Concessão', $this->dataset);
            $column->SetOrderable(true);
            $column->SetDateTimeFormat('d-m-Y');
            $grid->AddSingleRecordViewColumn($column);
            
            //
            // View column for Edital field
            //
            $column = new TextViewColumn('Edital', 'Edital', 'Edital', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddSingleRecordViewColumn($column);
            
            //
            // View column for UsuarioResponsavel field
            //
            $column = new TextViewColumn('UsuarioResponsavel', 'UsuarioResponsavel', 'Responsável', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddSingleRecordViewColumn($column);
            
            //
            // View column for email field
            //
            $column = new TextViewColumn('email', 'email', 'Email', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddSingleRecordViewColumn($column);
            
            //
            // View column for Telefone field
            //
            $column = new TextViewColumn('Telefone', 'Telefone', 'Telefone', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddSingleRecordViewColumn($column);
            
            //
            // View column for site field
            //
            $column = new TextViewColumn('site', 'site', 'Site', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddSingleRecordViewColumn($column);
            
            //
            // View column for NomeEaf field
            //
            $column = new TextViewColumn('id_fiscalizadora', 'id_fiscalizadora_NomeEaf', 'Fiscalizadora', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddSingleRecordViewColumn($column);
            
            //
            // View column for NumCNPJ field
            //
            $column = new TextViewColumn('NumCNPJ', 'NumCNPJ', 'Num CNPJ', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddSingleRecordViewColumn($column);
            
            //
            // View column for image_log field
            //
            $column = new BlobImageViewColumn('image_log', 'image_log', 'Image Log', $this->dataset, 'tbl_concessionarias_image_log_handler_view');
            $column->SetOrderable(true);
            $grid->AddSingleRecordViewColumn($column);
        }
    
        protected function AddEditColumns(Grid $grid)
        {
            //
            // Edit column for NomeConcessionaria field
            //
            $editor = new TextEdit('nomeconcessionaria_edit');
            $editor->SetMaxLength(50);
            $editColumn = new CustomEditColumn('Concessionária', 'NomeConcessionaria', $editor, $this->dataset);
            $validator = new RequiredValidator(StringUtils::Format($this->GetLocalizerCaptions()->GetMessageString('RequiredValidationMessage'), $editColumn->GetCaption()));
            $editor->GetValidatorCollection()->AddValidator($validator);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddEditColumn($editColumn);
            
            //
            // Edit column for Lote field
            //
            $editor = new TextEdit('lote_edit');
            $editor->SetMaxLength(10);
            $editColumn = new CustomEditColumn('Lote', 'Lote', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddEditColumn($editColumn);
            
            //
            // Edit column for dtInicioConcessao field
            //
            $editor = new DateTimeEdit('dtinicioconcessao_edit', false, 'd-m-Y');
            $editColumn = new CustomEditColumn('Data Inicio Concessão', 'dtInicioConcessao', $editor, $this->dataset);
            $validator = new RequiredValidator(StringUtils::Format($this->GetLocalizerCaptions()->GetMessageString('RequiredValidationMessage'), $editColumn->GetCaption()));
            $editor->GetValidatorCollection()->AddValidator($validator);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddEditColumn($editColumn);
            
            //
            // Edit column for dtTerminoConcessao field
            //
            $editor = new DateTimeEdit('dtterminoconcessao_edit', false, 'd-m-Y');
            $editColumn = new CustomEditColumn('Data Término Concessão', 'dtTerminoConcessao', $editor, $this->dataset);
            $validator = new RequiredValidator(StringUtils::Format($this->GetLocalizerCaptions()->GetMessageString('RequiredValidationMessage'), $editColumn->GetCaption()));
            $editor->GetValidatorCollection()->AddValidator($validator);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddEditColumn($editColumn);
            
            //
            // Edit column for Edital field
            //
            $editor = new TextEdit('edital_edit');
            $editor->SetMaxLength(20);
            $editColumn = new CustomEditColumn('Edital', 'Edital', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddEditColumn($editColumn);
            
            //
            // Edit column for UsuarioResponsavel field
            //
            $editor = new TextEdit('usuarioresponsavel_edit');
            $editor->SetMaxLength(40);
            $editColumn = new CustomEditColumn('Responsável', 'UsuarioResponsavel', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddEditColumn($editColumn);
            
            //
            // Edit column for email field
            //
            $editor = new TextEdit('email_edit');
            $editor->SetMaxLength(30);
            $editColumn = new CustomEditColumn('Email', 'email', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
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
            // Edit column for site field
            //
            $editor = new TextEdit('site_edit');
            $editor->SetMaxLength(100);
            $editColumn = new CustomEditColumn('Site', 'site', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddEditColumn($editColumn);
            
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
            $editColumn = new DynamicLookupEditColumn('Fiscalizadora', 'id_fiscalizadora', 'id_fiscalizadora_NomeEaf', 'edit_tbl_concessionarias_id_fiscalizadora_search', $editor, $this->dataset, $lookupDataset, 'idEaf', 'NomeEaf', '');
            $editColumn->setNestedInsertFormLink(
                $this->GetHandlerLink(tbl_concessionarias_id_fiscalizadoraNestedPage::getNestedInsertHandlerName())
            );
            $validator = new RequiredValidator(StringUtils::Format($this->GetLocalizerCaptions()->GetMessageString('RequiredValidationMessage'), $editColumn->GetCaption()));
            $editor->GetValidatorCollection()->AddValidator($validator);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddEditColumn($editColumn);
            
            //
            // Edit column for NumCNPJ field
            //
            $editor = new TextEdit('numcnpj_edit');
            $editor->SetMaxLength(14);
            $editColumn = new CustomEditColumn('Num CNPJ', 'NumCNPJ', $editor, $this->dataset);
            $validator = new RequiredValidator(StringUtils::Format($this->GetLocalizerCaptions()->GetMessageString('RequiredValidationMessage'), $editColumn->GetCaption()));
            $editor->GetValidatorCollection()->AddValidator($validator);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddEditColumn($editColumn);
            
            //
            // Edit column for image_log field
            //
            $editor = new ImageUploader('image_log_edit');
            $editor->SetShowImage(false);
            $editColumn = new FileUploadingColumn('Image Log', 'image_log', $editor, $this->dataset, false, false, 'tbl_concessionarias_image_log_handler_');
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddEditColumn($editColumn);
        }
    
        protected function AddMultiEditColumns(Grid $grid)
        {
            //
            // Edit column for Lote field
            //
            $editor = new TextEdit('lote_edit');
            $editor->SetMaxLength(10);
            $editColumn = new CustomEditColumn('Lote', 'Lote', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddMultiEditColumn($editColumn);
            
            //
            // Edit column for dtInicioConcessao field
            //
            $editor = new DateTimeEdit('dtinicioconcessao_edit', false, 'd-m-Y');
            $editColumn = new CustomEditColumn('Data Inicio Concessão', 'dtInicioConcessao', $editor, $this->dataset);
            $validator = new RequiredValidator(StringUtils::Format($this->GetLocalizerCaptions()->GetMessageString('RequiredValidationMessage'), $editColumn->GetCaption()));
            $editor->GetValidatorCollection()->AddValidator($validator);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddMultiEditColumn($editColumn);
            
            //
            // Edit column for dtTerminoConcessao field
            //
            $editor = new DateTimeEdit('dtterminoconcessao_edit', false, 'd-m-Y');
            $editColumn = new CustomEditColumn('Data Término Concessão', 'dtTerminoConcessao', $editor, $this->dataset);
            $validator = new RequiredValidator(StringUtils::Format($this->GetLocalizerCaptions()->GetMessageString('RequiredValidationMessage'), $editColumn->GetCaption()));
            $editor->GetValidatorCollection()->AddValidator($validator);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddMultiEditColumn($editColumn);
            
            //
            // Edit column for Edital field
            //
            $editor = new TextEdit('edital_edit');
            $editor->SetMaxLength(20);
            $editColumn = new CustomEditColumn('Edital', 'Edital', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddMultiEditColumn($editColumn);
            
            //
            // Edit column for UsuarioResponsavel field
            //
            $editor = new TextEdit('usuarioresponsavel_edit');
            $editor->SetMaxLength(40);
            $editColumn = new CustomEditColumn('Responsável', 'UsuarioResponsavel', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddMultiEditColumn($editColumn);
            
            //
            // Edit column for email field
            //
            $editor = new TextEdit('email_edit');
            $editor->SetMaxLength(30);
            $editColumn = new CustomEditColumn('Email', 'email', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
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
            // Edit column for site field
            //
            $editor = new TextEdit('site_edit');
            $editor->SetMaxLength(100);
            $editColumn = new CustomEditColumn('Site', 'site', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddMultiEditColumn($editColumn);
            
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
            $editColumn = new DynamicLookupEditColumn('Fiscalizadora', 'id_fiscalizadora', 'id_fiscalizadora_NomeEaf', 'multi_edit_tbl_concessionarias_id_fiscalizadora_search', $editor, $this->dataset, $lookupDataset, 'idEaf', 'NomeEaf', '');
            $editColumn->setNestedInsertFormLink(
                $this->GetHandlerLink(tbl_concessionarias_id_fiscalizadoraNestedPage::getNestedInsertHandlerName())
            );
            $validator = new RequiredValidator(StringUtils::Format($this->GetLocalizerCaptions()->GetMessageString('RequiredValidationMessage'), $editColumn->GetCaption()));
            $editor->GetValidatorCollection()->AddValidator($validator);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddMultiEditColumn($editColumn);
            
            //
            // Edit column for NumCNPJ field
            //
            $editor = new TextEdit('numcnpj_edit');
            $editor->SetMaxLength(14);
            $editColumn = new CustomEditColumn('Num CNPJ', 'NumCNPJ', $editor, $this->dataset);
            $validator = new RequiredValidator(StringUtils::Format($this->GetLocalizerCaptions()->GetMessageString('RequiredValidationMessage'), $editColumn->GetCaption()));
            $editor->GetValidatorCollection()->AddValidator($validator);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddMultiEditColumn($editColumn);
            
            //
            // Edit column for image_log field
            //
            $editor = new ImageUploader('image_log_edit');
            $editor->SetShowImage(false);
            $editColumn = new FileUploadingColumn('Image Log', 'image_log', $editor, $this->dataset, false, false, 'tbl_concessionarias_image_log_handler_multi_edit');
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddMultiEditColumn($editColumn);
        }
    
        protected function AddInsertColumns(Grid $grid)
        {
            //
            // Edit column for NomeConcessionaria field
            //
            $editor = new TextEdit('nomeconcessionaria_edit');
            $editor->SetMaxLength(50);
            $editColumn = new CustomEditColumn('Concessionária', 'NomeConcessionaria', $editor, $this->dataset);
            $validator = new RequiredValidator(StringUtils::Format($this->GetLocalizerCaptions()->GetMessageString('RequiredValidationMessage'), $editColumn->GetCaption()));
            $editor->GetValidatorCollection()->AddValidator($validator);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddInsertColumn($editColumn);
            
            //
            // Edit column for Lote field
            //
            $editor = new TextEdit('lote_edit');
            $editor->SetMaxLength(10);
            $editColumn = new CustomEditColumn('Lote', 'Lote', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddInsertColumn($editColumn);
            
            //
            // Edit column for dtInicioConcessao field
            //
            $editor = new DateTimeEdit('dtinicioconcessao_edit', false, 'd-m-Y');
            $editColumn = new CustomEditColumn('Data Inicio Concessão', 'dtInicioConcessao', $editor, $this->dataset);
            $editColumn->SetInsertDefaultValue('%CURRENT_DATE%');
            $validator = new RequiredValidator(StringUtils::Format($this->GetLocalizerCaptions()->GetMessageString('RequiredValidationMessage'), $editColumn->GetCaption()));
            $editor->GetValidatorCollection()->AddValidator($validator);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddInsertColumn($editColumn);
            
            //
            // Edit column for dtTerminoConcessao field
            //
            $editor = new DateTimeEdit('dtterminoconcessao_edit', false, 'd-m-Y');
            $editColumn = new CustomEditColumn('Data Término Concessão', 'dtTerminoConcessao', $editor, $this->dataset);
            $editColumn->SetInsertDefaultValue('%CURRENT_DATE%');
            $validator = new RequiredValidator(StringUtils::Format($this->GetLocalizerCaptions()->GetMessageString('RequiredValidationMessage'), $editColumn->GetCaption()));
            $editor->GetValidatorCollection()->AddValidator($validator);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddInsertColumn($editColumn);
            
            //
            // Edit column for Edital field
            //
            $editor = new TextEdit('edital_edit');
            $editor->SetMaxLength(20);
            $editColumn = new CustomEditColumn('Edital', 'Edital', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddInsertColumn($editColumn);
            
            //
            // Edit column for UsuarioResponsavel field
            //
            $editor = new TextEdit('usuarioresponsavel_edit');
            $editor->SetMaxLength(40);
            $editColumn = new CustomEditColumn('Responsável', 'UsuarioResponsavel', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddInsertColumn($editColumn);
            
            //
            // Edit column for email field
            //
            $editor = new TextEdit('email_edit');
            $editor->SetMaxLength(30);
            $editColumn = new CustomEditColumn('Email', 'email', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
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
            // Edit column for site field
            //
            $editor = new TextEdit('site_edit');
            $editor->SetMaxLength(100);
            $editColumn = new CustomEditColumn('Site', 'site', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddInsertColumn($editColumn);
            
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
            $editColumn = new DynamicLookupEditColumn('Fiscalizadora', 'id_fiscalizadora', 'id_fiscalizadora_NomeEaf', 'insert_tbl_concessionarias_id_fiscalizadora_search', $editor, $this->dataset, $lookupDataset, 'idEaf', 'NomeEaf', '');
            $editColumn->setNestedInsertFormLink(
                $this->GetHandlerLink(tbl_concessionarias_id_fiscalizadoraNestedPage::getNestedInsertHandlerName())
            );
            $validator = new RequiredValidator(StringUtils::Format($this->GetLocalizerCaptions()->GetMessageString('RequiredValidationMessage'), $editColumn->GetCaption()));
            $editor->GetValidatorCollection()->AddValidator($validator);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddInsertColumn($editColumn);
            
            //
            // Edit column for NumCNPJ field
            //
            $editor = new TextEdit('numcnpj_edit');
            $editor->SetMaxLength(14);
            $editColumn = new CustomEditColumn('Num CNPJ', 'NumCNPJ', $editor, $this->dataset);
            $validator = new RequiredValidator(StringUtils::Format($this->GetLocalizerCaptions()->GetMessageString('RequiredValidationMessage'), $editColumn->GetCaption()));
            $editor->GetValidatorCollection()->AddValidator($validator);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddInsertColumn($editColumn);
            
            //
            // Edit column for image_log field
            //
            $editor = new ImageUploader('image_log_edit');
            $editor->SetShowImage(false);
            $editColumn = new FileUploadingColumn('Image Log', 'image_log', $editor, $this->dataset, false, false, 'tbl_concessionarias_image_log_handler_insert');
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
            // View column for idConcessiona field
            //
            $column = new NumberViewColumn('idConcessiona', 'idConcessiona', 'Id', $this->dataset);
            $column->SetOrderable(true);
            $column->setNumberAfterDecimal(0);
            $column->setThousandsSeparator('.');
            $column->setDecimalSeparator('');
            $grid->AddPrintColumn($column);
            
            //
            // View column for NomeConcessionaria field
            //
            $column = new TextViewColumn('NomeConcessionaria', 'NomeConcessionaria', 'Concessionária', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddPrintColumn($column);
            
            //
            // View column for Lote field
            //
            $column = new TextViewColumn('Lote', 'Lote', 'Lote', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddPrintColumn($column);
            
            //
            // View column for dtInicioConcessao field
            //
            $column = new DateTimeViewColumn('dtInicioConcessao', 'dtInicioConcessao', 'Data Inicio Concessão', $this->dataset);
            $column->SetOrderable(true);
            $column->SetDateTimeFormat('d-m-Y');
            $grid->AddPrintColumn($column);
            
            //
            // View column for dtTerminoConcessao field
            //
            $column = new DateTimeViewColumn('dtTerminoConcessao', 'dtTerminoConcessao', 'Data Término Concessão', $this->dataset);
            $column->SetOrderable(true);
            $column->SetDateTimeFormat('d-m-Y');
            $grid->AddPrintColumn($column);
            
            //
            // View column for Edital field
            //
            $column = new TextViewColumn('Edital', 'Edital', 'Edital', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddPrintColumn($column);
            
            //
            // View column for UsuarioResponsavel field
            //
            $column = new TextViewColumn('UsuarioResponsavel', 'UsuarioResponsavel', 'Responsável', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddPrintColumn($column);
            
            //
            // View column for email field
            //
            $column = new TextViewColumn('email', 'email', 'Email', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddPrintColumn($column);
            
            //
            // View column for Telefone field
            //
            $column = new TextViewColumn('Telefone', 'Telefone', 'Telefone', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddPrintColumn($column);
            
            //
            // View column for site field
            //
            $column = new TextViewColumn('site', 'site', 'Site', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddPrintColumn($column);
            
            //
            // View column for NomeEaf field
            //
            $column = new TextViewColumn('id_fiscalizadora', 'id_fiscalizadora_NomeEaf', 'Fiscalizadora', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddPrintColumn($column);
            
            //
            // View column for NumCNPJ field
            //
            $column = new TextViewColumn('NumCNPJ', 'NumCNPJ', 'Num CNPJ', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddPrintColumn($column);
            
            //
            // View column for image_log field
            //
            $column = new BlobImageViewColumn('image_log', 'image_log', 'Image Log', $this->dataset, 'tbl_concessionarias_image_log_handler_print');
            $column->SetOrderable(true);
            $grid->AddPrintColumn($column);
        }
    
        protected function AddExportColumns(Grid $grid)
        {
            //
            // View column for idConcessiona field
            //
            $column = new NumberViewColumn('idConcessiona', 'idConcessiona', 'Id', $this->dataset);
            $column->SetOrderable(true);
            $column->setNumberAfterDecimal(0);
            $column->setThousandsSeparator('.');
            $column->setDecimalSeparator('');
            $grid->AddExportColumn($column);
            
            //
            // View column for NomeConcessionaria field
            //
            $column = new TextViewColumn('NomeConcessionaria', 'NomeConcessionaria', 'Concessionária', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddExportColumn($column);
            
            //
            // View column for Lote field
            //
            $column = new TextViewColumn('Lote', 'Lote', 'Lote', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddExportColumn($column);
            
            //
            // View column for dtInicioConcessao field
            //
            $column = new DateTimeViewColumn('dtInicioConcessao', 'dtInicioConcessao', 'Data Inicio Concessão', $this->dataset);
            $column->SetOrderable(true);
            $column->SetDateTimeFormat('d-m-Y');
            $grid->AddExportColumn($column);
            
            //
            // View column for dtTerminoConcessao field
            //
            $column = new DateTimeViewColumn('dtTerminoConcessao', 'dtTerminoConcessao', 'Data Término Concessão', $this->dataset);
            $column->SetOrderable(true);
            $column->SetDateTimeFormat('d-m-Y');
            $grid->AddExportColumn($column);
            
            //
            // View column for Edital field
            //
            $column = new TextViewColumn('Edital', 'Edital', 'Edital', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddExportColumn($column);
            
            //
            // View column for UsuarioResponsavel field
            //
            $column = new TextViewColumn('UsuarioResponsavel', 'UsuarioResponsavel', 'Responsável', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddExportColumn($column);
            
            //
            // View column for email field
            //
            $column = new TextViewColumn('email', 'email', 'Email', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddExportColumn($column);
            
            //
            // View column for Telefone field
            //
            $column = new TextViewColumn('Telefone', 'Telefone', 'Telefone', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddExportColumn($column);
            
            //
            // View column for site field
            //
            $column = new TextViewColumn('site', 'site', 'Site', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddExportColumn($column);
            
            //
            // View column for NomeEaf field
            //
            $column = new TextViewColumn('id_fiscalizadora', 'id_fiscalizadora_NomeEaf', 'Fiscalizadora', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddExportColumn($column);
            
            //
            // View column for NumCNPJ field
            //
            $column = new TextViewColumn('NumCNPJ', 'NumCNPJ', 'Num CNPJ', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddExportColumn($column);
            
            //
            // View column for image_log field
            //
            $column = new BlobImageViewColumn('image_log', 'image_log', 'Image Log', $this->dataset, 'tbl_concessionarias_image_log_handler_export');
            $column->SetOrderable(true);
            $grid->AddExportColumn($column);
        }
    
        private function AddCompareColumns(Grid $grid)
        {
            //
            // View column for NumCNPJ field
            //
            $column = new TextViewColumn('NumCNPJ', 'NumCNPJ', 'Num CNPJ', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddCompareColumn($column);
            
            //
            // View column for image_log field
            //
            $column = new BlobImageViewColumn('image_log', 'image_log', 'Image Log', $this->dataset, 'tbl_concessionarias_image_log_handler_compare');
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
    
    
            $this->SetInsertFormTitle('FORMULÁRIO CADASTRO CONCESSIONÁRIAS');
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
            $detailPage = new tbl_concessionarias_tbl_rodoviasPage('tbl_concessionarias_tbl_rodovias', $this, array('id_concessionaria'), array('idConcessiona'), $this->GetForeignKeyFields(), $this->CreateMasterDetailRecordGrid(), $this->dataset, GetCurrentUserPermissionsForPage('tbl_concessionarias.tbl_rodovias'), 'UTF-8');
            $detailPage->SetRecordPermission(GetCurrentUserRecordPermissionsForDataSource('tbl_concessionarias.tbl_rodovias'));
            $detailPage->SetHttpHandlerName('tbl_concessionarias_tbl_rodovias_handler');
            $handler = new PageHTTPHandler('tbl_concessionarias_tbl_rodovias_handler', $detailPage);
            GetApplication()->RegisterHTTPHandler($handler);
            
            $handler = new ImageHTTPHandler($this->dataset, 'image_log', 'tbl_concessionarias_image_log_handler_list', new NullFilter());
            GetApplication()->RegisterHTTPHandler($handler);
            
            $handler = new ImageHTTPHandler($this->dataset, 'image_log', 'tbl_concessionarias_image_log_handler_print', new NullFilter());
            GetApplication()->RegisterHTTPHandler($handler);
            
            $handler = new ImageHTTPHandler($this->dataset, 'image_log', 'tbl_concessionarias_image_log_handler_compare', new NullFilter());
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
            $handler = new DynamicSearchHandler($lookupDataset, $this, 'insert_tbl_concessionarias_id_fiscalizadora_search', 'idEaf', 'NomeEaf', null, 20);
            GetApplication()->RegisterHTTPHandler($handler);
            
            $handler = new ImageHTTPHandler($this->dataset, 'image_log', 'tbl_concessionarias_image_log_handler_insert', new NullFilter());
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
            $handler = new DynamicSearchHandler($lookupDataset, $this, 'filter_builder_tbl_concessionarias_id_fiscalizadora_search', 'idEaf', 'NomeEaf', null, 20);
            GetApplication()->RegisterHTTPHandler($handler);
            
            $handler = new ImageHTTPHandler($this->dataset, 'image_log', 'tbl_concessionarias_image_log_handler_view', new NullFilter());
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
            $handler = new DynamicSearchHandler($lookupDataset, $this, 'edit_tbl_concessionarias_id_fiscalizadora_search', 'idEaf', 'NomeEaf', null, 20);
            GetApplication()->RegisterHTTPHandler($handler);
            
            $handler = new ImageHTTPHandler($this->dataset, 'image_log', 'tbl_concessionarias_image_log_handler_', new NullFilter());
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
            $handler = new DynamicSearchHandler($lookupDataset, $this, 'multi_edit_tbl_concessionarias_id_fiscalizadora_search', 'idEaf', 'NomeEaf', null, 20);
            GetApplication()->RegisterHTTPHandler($handler);
            
            $handler = new ImageHTTPHandler($this->dataset, 'image_log', 'tbl_concessionarias_image_log_handler_multi_edit', new NullFilter());
            GetApplication()->RegisterHTTPHandler($handler);
            $handler = new ImageHTTPHandler($this->dataset, 'image_logo', 'tbl_concessionarias_id_fiscalizadoraNestedPage_image_logo_handler_insert', new NullFilter());
            GetApplication()->RegisterHTTPHandler($handler);
            
            
            new tbl_concessionarias_id_fiscalizadoraNestedPage($this, GetCurrentUserPermissionsForPage('tbl_concessionarias.id_fiscalizadora'));
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
        $Page = new tbl_concessionariasPage("tbl_concessionarias", "tbl_concessionarias.php", GetCurrentUserPermissionsForPage("tbl_concessionarias"), 'UTF-8');
        $Page->SetRecordPermission(GetCurrentUserRecordPermissionsForDataSource("tbl_concessionarias"));
        GetApplication()->SetMainPage($Page);
        GetApplication()->Run();
    }
    catch(Exception $e)
    {
        ShowErrorPage($e);
    }
	
