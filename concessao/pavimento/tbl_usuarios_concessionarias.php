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
    
    
    
    class tbl_usuarios_concessionarias_tbl_monitoramentoPage extends DetailPage
    {
        protected function DoBeforeCreate()
        {
            $this->SetTitle('MONITORAMENTO IGG');
            $this->SetMenuLabel('MONITORAMENTO IGG');
    
            $this->dataset = new TableDataset(
                MyPDOConnectionFactory::getInstance(),
                GetConnectionOptions(),
                '`tbl_monitoramento`');
            $this->dataset->addFields(
                array(
                    new IntegerField('idMonitoramento', true, true, true),
                    new StringField('id_gerenciador', true),
                    new IntegerField('idConcessiona', true),
                    new StringField('id_rodovia', true),
                    new IntegerField('idPista', true),
                    new IntegerField('idSentidotrafego', true),
                    new StringField('km_referencia'),
                    new StringField('alca_ramo'),
                    new IntegerField('idFaixa', true),
                    new StringField('id_secao_terrap'),
                    new StringField('tipo_revestimento'),
                    new StringField('Ok'),
                    new StringField('ID_FI'),
                    new StringField('ID_TTC'),
                    new StringField('ID_TTL'),
                    new StringField('ID_TLC'),
                    new StringField('ID_TLL'),
                    new StringField('ID_TRR'),
                    new StringField('ID_J'),
                    new StringField('ID_TB'),
                    new StringField('ID_JE'),
                    new StringField('ID_TBE'),
                    new StringField('ID_ALP'),
                    new StringField('ID_ATP'),
                    new StringField('ID_O'),
                    new StringField('ID_P'),
                    new StringField('ID_EX'),
                    new StringField('ID_D'),
                    new StringField('ID_R'),
                    new StringField('ID_ALC'),
                    new StringField('ID_ATC'),
                    new StringField('ID_E'),
                    new IntegerField('FL_TRE'),
                    new IntegerField('FL_TRI'),
                    new IntegerField('ID_FC2'),
                    new IntegerField('ID_FC3'),
                    new IntegerField('PA'),
                    new IntegerField('AT_ON'),
                    new DateField('dtRegistro', true),
                    new TimeField('Hora', true),
                    new StringField('Observacoes'),
                    new IntegerField('idInterferencia', true),
                    new IntegerField('id_km', true),
                    new StringField('id_anocontratual', true),
                    new StringField('marco_km'),
                    new StringField('latitude'),
                    new StringField('longitude'),
                    new StringField('Observacoe2'),
                    new StringField('id_via'),
                    new StringField('revisao'),
                    new DateTimeField('data_lancamento'),
                    new DateTimeField('data_alteracao')
                )
            );
            $this->dataset->AddLookupField('idConcessiona', 'tbl_concessionarias', new IntegerField('idConcessiona'), new StringField('Lote', false, false, false, false, 'idConcessiona_Lote', 'idConcessiona_Lote_tbl_concessionarias'), 'idConcessiona_Lote_tbl_concessionarias');
            $this->dataset->AddLookupField('id_rodovia', 'tbl_rodovias', new StringField('idRodovia'), new StringField('RodoviaSP', false, false, false, false, 'id_rodovia_RodoviaSP', 'id_rodovia_RodoviaSP_tbl_rodovias'), 'id_rodovia_RodoviaSP_tbl_rodovias');
            $this->dataset->AddLookupField('id_via', 'tbl_vias', new IntegerField('idVia'), new StringField('DescricaoVia', false, false, false, false, 'id_via_DescricaoVia', 'id_via_DescricaoVia_tbl_vias'), 'id_via_DescricaoVia_tbl_vias');
            $this->dataset->AddLookupField('idPista', 'tbl_pistas', new IntegerField('idPista'), new StringField('DescricaoPista', false, false, false, false, 'idPista_DescricaoPista', 'idPista_DescricaoPista_tbl_pistas'), 'idPista_DescricaoPista_tbl_pistas');
            $this->dataset->AddLookupField('idSentidotrafego', 'tbl_sentido_trafego', new IntegerField('idSentidotrafego'), new StringField('Descricao', false, false, false, false, 'idSentidotrafego_Descricao', 'idSentidotrafego_Descricao_tbl_sentido_trafego'), 'idSentidotrafego_Descricao_tbl_sentido_trafego');
            $this->dataset->AddLookupField('idFaixa', 'tbl_faixas', new IntegerField('idFaixa'), new StringField('DescricaoFaixa', false, false, false, false, 'idFaixa_DescricaoFaixa', 'idFaixa_DescricaoFaixa_tbl_faixas'), 'idFaixa_DescricaoFaixa_tbl_faixas');
            $this->dataset->AddLookupField('id_secao_terrap', 'tbl_secao_terrapleno', new IntegerField('idSecao'), new StringField('DescricaoSecao', false, false, false, false, 'id_secao_terrap_DescricaoSecao', 'id_secao_terrap_DescricaoSecao_tbl_secao_terrapleno'), 'id_secao_terrap_DescricaoSecao_tbl_secao_terrapleno');
            $this->dataset->AddLookupField('tipo_revestimento', 'tbl_tipo_material', new IntegerField('idMaterial'), new StringField('DescricaoMaterial', false, false, false, false, 'tipo_revestimento_DescricaoMaterial', 'tipo_revestimento_DescricaoMaterial_tbl_tipo_material'), 'tipo_revestimento_DescricaoMaterial_tbl_tipo_material');
            $this->dataset->AddLookupField('ID_FI', 'tbl_codificacao', new IntegerField('idCodificacao'), new StringField('Marque', false, false, false, false, 'ID_FI_Marque', 'ID_FI_Marque_tbl_codificacao'), 'ID_FI_Marque_tbl_codificacao');
            $this->dataset->AddLookupField('ID_TTC', 'tbl_codificacao', new IntegerField('idCodificacao'), new StringField('Marque', false, false, false, false, 'ID_TTC_Marque', 'ID_TTC_Marque_tbl_codificacao'), 'ID_TTC_Marque_tbl_codificacao');
            $this->dataset->AddLookupField('ID_TTL', 'tbl_codificacao', new IntegerField('idCodificacao'), new StringField('Marque', false, false, false, false, 'ID_TTL_Marque', 'ID_TTL_Marque_tbl_codificacao'), 'ID_TTL_Marque_tbl_codificacao');
            $this->dataset->AddLookupField('ID_TLC', 'tbl_codificacao', new IntegerField('idCodificacao'), new StringField('Marque', false, false, false, false, 'ID_TLC_Marque', 'ID_TLC_Marque_tbl_codificacao'), 'ID_TLC_Marque_tbl_codificacao');
            $this->dataset->AddLookupField('ID_TLL', 'tbl_codificacao', new IntegerField('idCodificacao'), new StringField('Marque', false, false, false, false, 'ID_TLL_Marque', 'ID_TLL_Marque_tbl_codificacao'), 'ID_TLL_Marque_tbl_codificacao');
            $this->dataset->AddLookupField('ID_TRR', 'tbl_codificacao', new IntegerField('idCodificacao'), new StringField('Marque', false, false, false, false, 'ID_TRR_Marque', 'ID_TRR_Marque_tbl_codificacao'), 'ID_TRR_Marque_tbl_codificacao');
            $this->dataset->AddLookupField('ID_J', 'tbl_codificacao', new IntegerField('idCodificacao'), new StringField('Marque', false, false, false, false, 'ID_J_Marque', 'ID_J_Marque_tbl_codificacao'), 'ID_J_Marque_tbl_codificacao');
            $this->dataset->AddLookupField('ID_TB', 'tbl_codificacao', new IntegerField('idCodificacao'), new StringField('Marque', false, false, false, false, 'ID_TB_Marque', 'ID_TB_Marque_tbl_codificacao'), 'ID_TB_Marque_tbl_codificacao');
            $this->dataset->AddLookupField('ID_JE', 'tbl_codificacao', new IntegerField('idCodificacao'), new StringField('Marque', false, false, false, false, 'ID_JE_Marque', 'ID_JE_Marque_tbl_codificacao'), 'ID_JE_Marque_tbl_codificacao');
            $this->dataset->AddLookupField('ID_TBE', 'tbl_codificacao', new IntegerField('idCodificacao'), new StringField('Marque', false, false, false, false, 'ID_TBE_Marque', 'ID_TBE_Marque_tbl_codificacao'), 'ID_TBE_Marque_tbl_codificacao');
            $this->dataset->AddLookupField('ID_ALP', 'tbl_codificacao', new IntegerField('idCodificacao'), new StringField('Marque', false, false, false, false, 'ID_ALP_Marque', 'ID_ALP_Marque_tbl_codificacao'), 'ID_ALP_Marque_tbl_codificacao');
            $this->dataset->AddLookupField('ID_ATP', 'tbl_codificacao', new IntegerField('idCodificacao'), new StringField('Marque', false, false, false, false, 'ID_ATP_Marque', 'ID_ATP_Marque_tbl_codificacao'), 'ID_ATP_Marque_tbl_codificacao');
            $this->dataset->AddLookupField('ID_O', 'tbl_codificacao', new IntegerField('idCodificacao'), new StringField('Marque', false, false, false, false, 'ID_O_Marque', 'ID_O_Marque_tbl_codificacao'), 'ID_O_Marque_tbl_codificacao');
            $this->dataset->AddLookupField('ID_P', 'tbl_codificacao', new IntegerField('idCodificacao'), new StringField('Marque', false, false, false, false, 'ID_P_Marque', 'ID_P_Marque_tbl_codificacao'), 'ID_P_Marque_tbl_codificacao');
            $this->dataset->AddLookupField('ID_EX', 'tbl_codificacao', new IntegerField('idCodificacao'), new StringField('Marque', false, false, false, false, 'ID_EX_Marque', 'ID_EX_Marque_tbl_codificacao'), 'ID_EX_Marque_tbl_codificacao');
            $this->dataset->AddLookupField('ID_D', 'tbl_codificacao', new IntegerField('idCodificacao'), new StringField('Marque', false, false, false, false, 'ID_D_Marque', 'ID_D_Marque_tbl_codificacao'), 'ID_D_Marque_tbl_codificacao');
            $this->dataset->AddLookupField('ID_R', 'tbl_codificacao', new IntegerField('idCodificacao'), new StringField('Marque', false, false, false, false, 'ID_R_Marque', 'ID_R_Marque_tbl_codificacao'), 'ID_R_Marque_tbl_codificacao');
            $this->dataset->AddLookupField('ID_ALC', 'tbl_codificacao', new IntegerField('idCodificacao'), new StringField('Marque', false, false, false, false, 'ID_ALC_Marque', 'ID_ALC_Marque_tbl_codificacao'), 'ID_ALC_Marque_tbl_codificacao');
            $this->dataset->AddLookupField('ID_ATC', 'tbl_codificacao', new IntegerField('idCodificacao'), new StringField('Marque', false, false, false, false, 'ID_ATC_Marque', 'ID_ATC_Marque_tbl_codificacao'), 'ID_ATC_Marque_tbl_codificacao');
            $this->dataset->AddLookupField('ID_E', 'tbl_codificacao', new IntegerField('idCodificacao'), new StringField('Marque', false, false, false, false, 'ID_E_Marque', 'ID_E_Marque_tbl_codificacao'), 'ID_E_Marque_tbl_codificacao');
            $this->dataset->AddLookupField('idInterferencia', 'tbl_interferencias', new IntegerField('idInterferencia'), new StringField('tipo_interferncia', false, false, false, false, 'idInterferencia_tipo_interferncia', 'idInterferencia_tipo_interferncia_tbl_interferencias'), 'idInterferencia_tipo_interferncia_tbl_interferencias');
            $this->dataset->AddLookupField('id_gerenciador', 'tbl_usuarios', new IntegerField('idUsuario'), new StringField('Nome Operador', false, false, false, false, 'id_gerenciador_Nome Operador', 'id_gerenciador_Nome Operador_tbl_usuarios'), 'id_gerenciador_Nome Operador_tbl_usuarios');
            $this->dataset->AddLookupField('id_anocontratual', 'tbl_ano', new IntegerField('idtbl_ano'), new StringField('ano', false, false, false, false, 'id_anocontratual_ano', 'id_anocontratual_ano_tbl_ano'), 'id_anocontratual_ano_tbl_ano');
            $this->dataset->AddCustomCondition(EnvVariablesUtils::EvaluateVariableTemplate($this->GetColumnVariableContainer(), 'SELECT id_gerenciador = $userId'));
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
                new FilterColumn($this->dataset, 'idMonitoramento', 'idMonitoramento', 'Ficha Numero'),
                new FilterColumn($this->dataset, 'idConcessiona', 'idConcessiona_Lote', 'Lote'),
                new FilterColumn($this->dataset, 'id_rodovia', 'id_rodovia_RodoviaSP', 'Rodovia'),
                new FilterColumn($this->dataset, 'id_via', 'id_via_DescricaoVia', 'Via'),
                new FilterColumn($this->dataset, 'idPista', 'idPista_DescricaoPista', 'Pista'),
                new FilterColumn($this->dataset, 'idSentidotrafego', 'idSentidotrafego_Descricao', 'Sentido tráfego (quilometragem)'),
                new FilterColumn($this->dataset, 'km_referencia', 'km_referencia', 'km de referência (caso de dispositivos)'),
                new FilterColumn($this->dataset, 'alca_ramo', 'alca_ramo', 'Nomenclatura de Alça/Ramo(quando necessário)'),
                new FilterColumn($this->dataset, 'idFaixa', 'idFaixa_DescricaoFaixa', 'Faixa'),
                new FilterColumn($this->dataset, 'id_km', 'id_km', 'km'),
                new FilterColumn($this->dataset, 'id_secao_terrap', 'id_secao_terrap_DescricaoSecao', 'Seção Terrap.'),
                new FilterColumn($this->dataset, 'tipo_revestimento', 'tipo_revestimento_DescricaoMaterial', 'Tipo Revestimento'),
                new FilterColumn($this->dataset, 'Ok', 'Ok', 'Ok'),
                new FilterColumn($this->dataset, 'ID_FI', 'ID_FI_Marque', 'FI'),
                new FilterColumn($this->dataset, 'ID_TTC', 'ID_TTC_Marque', 'TTC'),
                new FilterColumn($this->dataset, 'ID_TTL', 'ID_TTL_Marque', 'TTL'),
                new FilterColumn($this->dataset, 'ID_TLC', 'ID_TLC_Marque', 'TLC'),
                new FilterColumn($this->dataset, 'ID_TLL', 'ID_TLL_Marque', 'TLL'),
                new FilterColumn($this->dataset, 'ID_TRR', 'ID_TRR_Marque', 'TRR'),
                new FilterColumn($this->dataset, 'ID_J', 'ID_J_Marque', 'J'),
                new FilterColumn($this->dataset, 'ID_TB', 'ID_TB_Marque', 'TB'),
                new FilterColumn($this->dataset, 'ID_JE', 'ID_JE_Marque', 'JE'),
                new FilterColumn($this->dataset, 'ID_TBE', 'ID_TBE_Marque', 'TBE'),
                new FilterColumn($this->dataset, 'ID_ALP', 'ID_ALP_Marque', 'ALP'),
                new FilterColumn($this->dataset, 'ID_ATP', 'ID_ATP_Marque', 'ATP'),
                new FilterColumn($this->dataset, 'ID_O', 'ID_O_Marque', 'O'),
                new FilterColumn($this->dataset, 'ID_P', 'ID_P_Marque', 'P'),
                new FilterColumn($this->dataset, 'ID_EX', 'ID_EX_Marque', 'EX'),
                new FilterColumn($this->dataset, 'ID_D', 'ID_D_Marque', 'D'),
                new FilterColumn($this->dataset, 'ID_R', 'ID_R_Marque', 'R'),
                new FilterColumn($this->dataset, 'ID_ALC', 'ID_ALC_Marque', 'ALC'),
                new FilterColumn($this->dataset, 'ID_ATC', 'ID_ATC_Marque', 'ATC'),
                new FilterColumn($this->dataset, 'ID_E', 'ID_E_Marque', 'E'),
                new FilterColumn($this->dataset, 'FL_TRE', 'FL_TRE', 'FL-TRE (mm)'),
                new FilterColumn($this->dataset, 'FL_TRI', 'FL_TRI', 'FL-TRI (mm)'),
                new FilterColumn($this->dataset, 'ID_FC2', 'ID_FC2', 'FC2 (%)'),
                new FilterColumn($this->dataset, 'ID_FC3', 'ID_FC3', 'FC3 (%)'),
                new FilterColumn($this->dataset, 'PA', 'PA', 'PA (%)'),
                new FilterColumn($this->dataset, 'AT_ON', 'AT_ON', 'AT/ON (%)'),
                new FilterColumn($this->dataset, 'dtRegistro', 'dtRegistro', 'Data Registro'),
                new FilterColumn($this->dataset, 'Hora', 'Hora', 'Hora'),
                new FilterColumn($this->dataset, 'Observacoes', 'Observacoes', 'Observações'),
                new FilterColumn($this->dataset, 'idInterferencia', 'idInterferencia_tipo_interferncia', 'Interferência'),
                new FilterColumn($this->dataset, 'id_gerenciador', 'id_gerenciador_Nome Operador', 'Gerenciador'),
                new FilterColumn($this->dataset, 'id_anocontratual', 'id_anocontratual_ano', 'Ano Contratual'),
                new FilterColumn($this->dataset, 'marco_km', 'marco_km', 'Marco Km'),
                new FilterColumn($this->dataset, 'latitude', 'latitude', 'Latitude'),
                new FilterColumn($this->dataset, 'longitude', 'longitude', 'Longitude'),
                new FilterColumn($this->dataset, 'Observacoe2', 'Observacoe2', 'Observações'),
                new FilterColumn($this->dataset, 'revisao', 'revisao', 'Revisão'),
                new FilterColumn($this->dataset, 'data_lancamento', 'data_lancamento', 'Data Lancamento'),
                new FilterColumn($this->dataset, 'data_alteracao', 'data_alteracao', 'Data Alteracao')
            );
        }
    
        protected function setupQuickFilter(QuickFilter $quickFilter, FixedKeysArray $columns)
        {
            $quickFilter
                ->addColumn($columns['idMonitoramento'])
                ->addColumn($columns['idConcessiona'])
                ->addColumn($columns['id_rodovia'])
                ->addColumn($columns['id_via'])
                ->addColumn($columns['idPista'])
                ->addColumn($columns['idSentidotrafego'])
                ->addColumn($columns['km_referencia'])
                ->addColumn($columns['alca_ramo'])
                ->addColumn($columns['idFaixa'])
                ->addColumn($columns['id_km'])
                ->addColumn($columns['id_secao_terrap'])
                ->addColumn($columns['tipo_revestimento'])
                ->addColumn($columns['Ok'])
                ->addColumn($columns['ID_FI'])
                ->addColumn($columns['ID_TTC'])
                ->addColumn($columns['ID_TTL'])
                ->addColumn($columns['ID_TLC'])
                ->addColumn($columns['ID_TLL'])
                ->addColumn($columns['ID_TRR'])
                ->addColumn($columns['ID_J'])
                ->addColumn($columns['ID_TB'])
                ->addColumn($columns['ID_JE'])
                ->addColumn($columns['ID_TBE'])
                ->addColumn($columns['ID_ALP'])
                ->addColumn($columns['ID_ATP'])
                ->addColumn($columns['ID_O'])
                ->addColumn($columns['ID_P'])
                ->addColumn($columns['ID_EX'])
                ->addColumn($columns['ID_D'])
                ->addColumn($columns['ID_R'])
                ->addColumn($columns['ID_ALC'])
                ->addColumn($columns['ID_ATC'])
                ->addColumn($columns['ID_E'])
                ->addColumn($columns['FL_TRE'])
                ->addColumn($columns['FL_TRI'])
                ->addColumn($columns['ID_FC2'])
                ->addColumn($columns['ID_FC3'])
                ->addColumn($columns['PA'])
                ->addColumn($columns['AT_ON'])
                ->addColumn($columns['dtRegistro'])
                ->addColumn($columns['Hora'])
                ->addColumn($columns['Observacoes'])
                ->addColumn($columns['idInterferencia'])
                ->addColumn($columns['id_gerenciador'])
                ->addColumn($columns['id_anocontratual'])
                ->addColumn($columns['marco_km'])
                ->addColumn($columns['latitude'])
                ->addColumn($columns['longitude'])
                ->addColumn($columns['Observacoe2'])
                ->addColumn($columns['revisao'])
                ->addColumn($columns['data_lancamento'])
                ->addColumn($columns['data_alteracao']);
        }
    
        protected function setupColumnFilter(ColumnFilter $columnFilter)
        {
            $columnFilter
                ->setOptionsFor('idConcessiona')
                ->setOptionsFor('id_rodovia')
                ->setOptionsFor('id_via')
                ->setOptionsFor('idPista')
                ->setOptionsFor('idSentidotrafego')
                ->setOptionsFor('idFaixa')
                ->setOptionsFor('id_km')
                ->setOptionsFor('id_secao_terrap')
                ->setOptionsFor('tipo_revestimento')
                ->setOptionsFor('dtRegistro')
                ->setOptionsFor('idInterferencia')
                ->setOptionsFor('id_anocontratual')
                ->setOptionsFor('data_lancamento')
                ->setOptionsFor('data_alteracao');
        }
    
        protected function setupFilterBuilder(FilterBuilder $filterBuilder, FixedKeysArray $columns)
        {
            $main_editor = new TextEdit('idmonitoramento_edit');
            
            $filterBuilder->addColumn(
                $columns['idMonitoramento'],
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
            
            $main_editor = new DynamicCombobox('idconcessiona_edit', $this->CreateLinkBuilder());
            $main_editor->setAllowClear(true);
            $main_editor->setMinimumInputLength(0);
            $main_editor->SetAllowNullValue(false);
            $main_editor->SetHandlerName('filter_builder_tbl_usuarios_concessionarias_tbl_monitoramento_idConcessiona_search');
            
            $multi_value_select_editor = new RemoteMultiValueSelect('idConcessiona', $this->CreateLinkBuilder());
            $multi_value_select_editor->SetHandlerName('filter_builder_tbl_usuarios_concessionarias_tbl_monitoramento_idConcessiona_search');
            
            $text_editor = new TextEdit('idConcessiona');
            
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
            
            $main_editor = new DynamicCombobox('id_rodovia_edit', $this->CreateLinkBuilder());
            $main_editor->setAllowClear(true);
            $main_editor->setMinimumInputLength(0);
            $main_editor->SetAllowNullValue(false);
            $main_editor->SetHandlerName('filter_builder_tbl_usuarios_concessionarias_tbl_monitoramento_id_rodovia_search');
            
            $multi_value_select_editor = new RemoteMultiValueSelect('id_rodovia', $this->CreateLinkBuilder());
            $multi_value_select_editor->SetHandlerName('filter_builder_tbl_usuarios_concessionarias_tbl_monitoramento_id_rodovia_search');
            
            $text_editor = new TextEdit('id_rodovia');
            
            $filterBuilder->addColumn(
                $columns['id_rodovia'],
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
            
            $main_editor = new DynamicCombobox('id_via_edit', $this->CreateLinkBuilder());
            $main_editor->setAllowClear(true);
            $main_editor->setMinimumInputLength(0);
            $main_editor->SetAllowNullValue(false);
            $main_editor->SetHandlerName('filter_builder_tbl_usuarios_concessionarias_tbl_monitoramento_id_via_search');
            
            $multi_value_select_editor = new RemoteMultiValueSelect('id_via', $this->CreateLinkBuilder());
            $multi_value_select_editor->SetHandlerName('filter_builder_tbl_usuarios_concessionarias_tbl_monitoramento_id_via_search');
            
            $text_editor = new TextEdit('id_via');
            
            $filterBuilder->addColumn(
                $columns['id_via'],
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
            
            $main_editor = new DynamicCombobox('idpista_edit', $this->CreateLinkBuilder());
            $main_editor->setAllowClear(true);
            $main_editor->setMinimumInputLength(0);
            $main_editor->SetAllowNullValue(false);
            $main_editor->SetHandlerName('filter_builder_tbl_usuarios_concessionarias_tbl_monitoramento_idPista_search');
            
            $multi_value_select_editor = new RemoteMultiValueSelect('idPista', $this->CreateLinkBuilder());
            $multi_value_select_editor->SetHandlerName('filter_builder_tbl_usuarios_concessionarias_tbl_monitoramento_idPista_search');
            
            $text_editor = new TextEdit('idPista');
            
            $filterBuilder->addColumn(
                $columns['idPista'],
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
            
            $main_editor = new DynamicCombobox('idsentidotrafego_edit', $this->CreateLinkBuilder());
            $main_editor->setAllowClear(true);
            $main_editor->setMinimumInputLength(0);
            $main_editor->SetAllowNullValue(false);
            $main_editor->SetHandlerName('filter_builder_tbl_usuarios_concessionarias_tbl_monitoramento_idSentidotrafego_search');
            
            $multi_value_select_editor = new RemoteMultiValueSelect('idSentidotrafego', $this->CreateLinkBuilder());
            $multi_value_select_editor->SetHandlerName('filter_builder_tbl_usuarios_concessionarias_tbl_monitoramento_idSentidotrafego_search');
            
            $text_editor = new TextEdit('idSentidotrafego');
            
            $filterBuilder->addColumn(
                $columns['idSentidotrafego'],
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
            
            $main_editor = new TextEdit('km_referencia_edit');
            $main_editor->SetMaxLength(20);
            
            $filterBuilder->addColumn(
                $columns['km_referencia'],
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
            
            $main_editor = new TextEdit('alca_ramo_edit');
            $main_editor->SetMaxLength(20);
            
            $filterBuilder->addColumn(
                $columns['alca_ramo'],
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
            
            $main_editor = new DynamicCombobox('idfaixa_edit', $this->CreateLinkBuilder());
            $main_editor->setAllowClear(true);
            $main_editor->setMinimumInputLength(0);
            $main_editor->SetAllowNullValue(false);
            $main_editor->SetHandlerName('filter_builder_tbl_usuarios_concessionarias_tbl_monitoramento_idFaixa_search');
            
            $multi_value_select_editor = new RemoteMultiValueSelect('idFaixa', $this->CreateLinkBuilder());
            $multi_value_select_editor->SetHandlerName('filter_builder_tbl_usuarios_concessionarias_tbl_monitoramento_idFaixa_search');
            
            $text_editor = new TextEdit('idFaixa');
            
            $filterBuilder->addColumn(
                $columns['idFaixa'],
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
            
            $main_editor = new TextEdit('id_km_edit');
            
            $filterBuilder->addColumn(
                $columns['id_km'],
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
            
            $main_editor = new DynamicCombobox('id_secao_terrap_edit', $this->CreateLinkBuilder());
            $main_editor->setAllowClear(true);
            $main_editor->setMinimumInputLength(0);
            $main_editor->SetAllowNullValue(false);
            $main_editor->SetHandlerName('filter_builder_tbl_usuarios_concessionarias_tbl_monitoramento_id_secao_terrap_search');
            
            $multi_value_select_editor = new RemoteMultiValueSelect('id_secao_terrap', $this->CreateLinkBuilder());
            $multi_value_select_editor->SetHandlerName('filter_builder_tbl_usuarios_concessionarias_tbl_monitoramento_id_secao_terrap_search');
            
            $text_editor = new TextEdit('id_secao_terrap');
            
            $filterBuilder->addColumn(
                $columns['id_secao_terrap'],
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
            
            $main_editor = new DynamicCombobox('tipo_revestimento_edit', $this->CreateLinkBuilder());
            $main_editor->setAllowClear(true);
            $main_editor->setMinimumInputLength(0);
            $main_editor->SetAllowNullValue(false);
            $main_editor->SetHandlerName('filter_builder_tbl_usuarios_concessionarias_tbl_monitoramento_tipo_revestimento_search');
            
            $multi_value_select_editor = new RemoteMultiValueSelect('tipo_revestimento', $this->CreateLinkBuilder());
            $multi_value_select_editor->SetHandlerName('filter_builder_tbl_usuarios_concessionarias_tbl_monitoramento_tipo_revestimento_search');
            
            $text_editor = new TextEdit('tipo_revestimento');
            
            $filterBuilder->addColumn(
                $columns['tipo_revestimento'],
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
            
            $main_editor = new TextEdit('ok_edit');
            
            $filterBuilder->addColumn(
                $columns['Ok'],
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
            
            $main_editor = new DynamicCombobox('id_fi_edit', $this->CreateLinkBuilder());
            $main_editor->setAllowClear(true);
            $main_editor->setMinimumInputLength(0);
            $main_editor->SetAllowNullValue(false);
            $main_editor->SetHandlerName('filter_builder_tbl_usuarios_concessionarias_tbl_monitoramento_ID_FI_search');
            
            $multi_value_select_editor = new RemoteMultiValueSelect('ID_FI', $this->CreateLinkBuilder());
            $multi_value_select_editor->SetHandlerName('filter_builder_tbl_usuarios_concessionarias_tbl_monitoramento_ID_FI_search');
            
            $text_editor = new TextEdit('ID_FI');
            
            $filterBuilder->addColumn(
                $columns['ID_FI'],
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
            
            $main_editor = new DynamicCombobox('id_ttc_edit', $this->CreateLinkBuilder());
            $main_editor->setAllowClear(true);
            $main_editor->setMinimumInputLength(0);
            $main_editor->SetAllowNullValue(false);
            $main_editor->SetHandlerName('filter_builder_tbl_usuarios_concessionarias_tbl_monitoramento_ID_TTC_search');
            
            $multi_value_select_editor = new RemoteMultiValueSelect('ID_TTC', $this->CreateLinkBuilder());
            $multi_value_select_editor->SetHandlerName('filter_builder_tbl_usuarios_concessionarias_tbl_monitoramento_ID_TTC_search');
            
            $text_editor = new TextEdit('ID_TTC');
            
            $filterBuilder->addColumn(
                $columns['ID_TTC'],
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
            
            $main_editor = new DynamicCombobox('id_ttl_edit', $this->CreateLinkBuilder());
            $main_editor->setAllowClear(true);
            $main_editor->setMinimumInputLength(0);
            $main_editor->SetAllowNullValue(false);
            $main_editor->SetHandlerName('filter_builder_tbl_usuarios_concessionarias_tbl_monitoramento_ID_TTL_search');
            
            $multi_value_select_editor = new RemoteMultiValueSelect('ID_TTL', $this->CreateLinkBuilder());
            $multi_value_select_editor->SetHandlerName('filter_builder_tbl_usuarios_concessionarias_tbl_monitoramento_ID_TTL_search');
            
            $text_editor = new TextEdit('ID_TTL');
            
            $filterBuilder->addColumn(
                $columns['ID_TTL'],
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
            
            $main_editor = new DynamicCombobox('id_tlc_edit', $this->CreateLinkBuilder());
            $main_editor->setAllowClear(true);
            $main_editor->setMinimumInputLength(0);
            $main_editor->SetAllowNullValue(false);
            $main_editor->SetHandlerName('filter_builder_tbl_usuarios_concessionarias_tbl_monitoramento_ID_TLC_search');
            
            $multi_value_select_editor = new RemoteMultiValueSelect('ID_TLC', $this->CreateLinkBuilder());
            $multi_value_select_editor->SetHandlerName('filter_builder_tbl_usuarios_concessionarias_tbl_monitoramento_ID_TLC_search');
            
            $text_editor = new TextEdit('ID_TLC');
            
            $filterBuilder->addColumn(
                $columns['ID_TLC'],
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
            
            $main_editor = new DynamicCombobox('id_tll_edit', $this->CreateLinkBuilder());
            $main_editor->setAllowClear(true);
            $main_editor->setMinimumInputLength(0);
            $main_editor->SetAllowNullValue(false);
            $main_editor->SetHandlerName('filter_builder_tbl_usuarios_concessionarias_tbl_monitoramento_ID_TLL_search');
            
            $multi_value_select_editor = new RemoteMultiValueSelect('ID_TLL', $this->CreateLinkBuilder());
            $multi_value_select_editor->SetHandlerName('filter_builder_tbl_usuarios_concessionarias_tbl_monitoramento_ID_TLL_search');
            
            $text_editor = new TextEdit('ID_TLL');
            
            $filterBuilder->addColumn(
                $columns['ID_TLL'],
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
            
            $main_editor = new DynamicCombobox('id_trr_edit', $this->CreateLinkBuilder());
            $main_editor->setAllowClear(true);
            $main_editor->setMinimumInputLength(0);
            $main_editor->SetAllowNullValue(false);
            $main_editor->SetHandlerName('filter_builder_tbl_usuarios_concessionarias_tbl_monitoramento_ID_TRR_search');
            
            $multi_value_select_editor = new RemoteMultiValueSelect('ID_TRR', $this->CreateLinkBuilder());
            $multi_value_select_editor->SetHandlerName('filter_builder_tbl_usuarios_concessionarias_tbl_monitoramento_ID_TRR_search');
            
            $text_editor = new TextEdit('ID_TRR');
            
            $filterBuilder->addColumn(
                $columns['ID_TRR'],
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
            
            $main_editor = new DynamicCombobox('id_j_edit', $this->CreateLinkBuilder());
            $main_editor->setAllowClear(true);
            $main_editor->setMinimumInputLength(0);
            $main_editor->SetAllowNullValue(false);
            $main_editor->SetHandlerName('filter_builder_tbl_usuarios_concessionarias_tbl_monitoramento_ID_J_search');
            
            $multi_value_select_editor = new RemoteMultiValueSelect('ID_J', $this->CreateLinkBuilder());
            $multi_value_select_editor->SetHandlerName('filter_builder_tbl_usuarios_concessionarias_tbl_monitoramento_ID_J_search');
            
            $text_editor = new TextEdit('ID_J');
            
            $filterBuilder->addColumn(
                $columns['ID_J'],
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
            
            $main_editor = new DynamicCombobox('id_tb_edit', $this->CreateLinkBuilder());
            $main_editor->setAllowClear(true);
            $main_editor->setMinimumInputLength(0);
            $main_editor->SetAllowNullValue(false);
            $main_editor->SetHandlerName('filter_builder_tbl_usuarios_concessionarias_tbl_monitoramento_ID_TB_search');
            
            $multi_value_select_editor = new RemoteMultiValueSelect('ID_TB', $this->CreateLinkBuilder());
            $multi_value_select_editor->SetHandlerName('filter_builder_tbl_usuarios_concessionarias_tbl_monitoramento_ID_TB_search');
            
            $text_editor = new TextEdit('ID_TB');
            
            $filterBuilder->addColumn(
                $columns['ID_TB'],
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
            
            $main_editor = new DynamicCombobox('id_je_edit', $this->CreateLinkBuilder());
            $main_editor->setAllowClear(true);
            $main_editor->setMinimumInputLength(0);
            $main_editor->SetAllowNullValue(false);
            $main_editor->SetHandlerName('filter_builder_tbl_usuarios_concessionarias_tbl_monitoramento_ID_JE_search');
            
            $multi_value_select_editor = new RemoteMultiValueSelect('ID_JE', $this->CreateLinkBuilder());
            $multi_value_select_editor->SetHandlerName('filter_builder_tbl_usuarios_concessionarias_tbl_monitoramento_ID_JE_search');
            
            $text_editor = new TextEdit('ID_JE');
            
            $filterBuilder->addColumn(
                $columns['ID_JE'],
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
            
            $main_editor = new DynamicCombobox('id_tbe_edit', $this->CreateLinkBuilder());
            $main_editor->setAllowClear(true);
            $main_editor->setMinimumInputLength(0);
            $main_editor->SetAllowNullValue(false);
            $main_editor->SetHandlerName('filter_builder_tbl_usuarios_concessionarias_tbl_monitoramento_ID_TBE_search');
            
            $multi_value_select_editor = new RemoteMultiValueSelect('ID_TBE', $this->CreateLinkBuilder());
            $multi_value_select_editor->SetHandlerName('filter_builder_tbl_usuarios_concessionarias_tbl_monitoramento_ID_TBE_search');
            
            $text_editor = new TextEdit('ID_TBE');
            
            $filterBuilder->addColumn(
                $columns['ID_TBE'],
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
            
            $main_editor = new DynamicCombobox('id_alp_edit', $this->CreateLinkBuilder());
            $main_editor->setAllowClear(true);
            $main_editor->setMinimumInputLength(0);
            $main_editor->SetAllowNullValue(false);
            $main_editor->SetHandlerName('filter_builder_tbl_usuarios_concessionarias_tbl_monitoramento_ID_ALP_search');
            
            $multi_value_select_editor = new RemoteMultiValueSelect('ID_ALP', $this->CreateLinkBuilder());
            $multi_value_select_editor->SetHandlerName('filter_builder_tbl_usuarios_concessionarias_tbl_monitoramento_ID_ALP_search');
            
            $text_editor = new TextEdit('ID_ALP');
            
            $filterBuilder->addColumn(
                $columns['ID_ALP'],
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
            
            $main_editor = new DynamicCombobox('id_atp_edit', $this->CreateLinkBuilder());
            $main_editor->setAllowClear(true);
            $main_editor->setMinimumInputLength(0);
            $main_editor->SetAllowNullValue(false);
            $main_editor->SetHandlerName('filter_builder_tbl_usuarios_concessionarias_tbl_monitoramento_ID_ATP_search');
            
            $multi_value_select_editor = new RemoteMultiValueSelect('ID_ATP', $this->CreateLinkBuilder());
            $multi_value_select_editor->SetHandlerName('filter_builder_tbl_usuarios_concessionarias_tbl_monitoramento_ID_ATP_search');
            
            $text_editor = new TextEdit('ID_ATP');
            
            $filterBuilder->addColumn(
                $columns['ID_ATP'],
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
            
            $main_editor = new DynamicCombobox('id_o_edit', $this->CreateLinkBuilder());
            $main_editor->setAllowClear(true);
            $main_editor->setMinimumInputLength(0);
            $main_editor->SetAllowNullValue(false);
            $main_editor->SetHandlerName('filter_builder_tbl_usuarios_concessionarias_tbl_monitoramento_ID_O_search');
            
            $multi_value_select_editor = new RemoteMultiValueSelect('ID_O', $this->CreateLinkBuilder());
            $multi_value_select_editor->SetHandlerName('filter_builder_tbl_usuarios_concessionarias_tbl_monitoramento_ID_O_search');
            
            $text_editor = new TextEdit('ID_O');
            
            $filterBuilder->addColumn(
                $columns['ID_O'],
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
            
            $main_editor = new DynamicCombobox('id_p_edit', $this->CreateLinkBuilder());
            $main_editor->setAllowClear(true);
            $main_editor->setMinimumInputLength(0);
            $main_editor->SetAllowNullValue(false);
            $main_editor->SetHandlerName('filter_builder_tbl_usuarios_concessionarias_tbl_monitoramento_ID_P_search');
            
            $multi_value_select_editor = new RemoteMultiValueSelect('ID_P', $this->CreateLinkBuilder());
            $multi_value_select_editor->SetHandlerName('filter_builder_tbl_usuarios_concessionarias_tbl_monitoramento_ID_P_search');
            
            $text_editor = new TextEdit('ID_P');
            
            $filterBuilder->addColumn(
                $columns['ID_P'],
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
            
            $main_editor = new DynamicCombobox('id_ex_edit', $this->CreateLinkBuilder());
            $main_editor->setAllowClear(true);
            $main_editor->setMinimumInputLength(0);
            $main_editor->SetAllowNullValue(false);
            $main_editor->SetHandlerName('filter_builder_tbl_usuarios_concessionarias_tbl_monitoramento_ID_EX_search');
            
            $multi_value_select_editor = new RemoteMultiValueSelect('ID_EX', $this->CreateLinkBuilder());
            $multi_value_select_editor->SetHandlerName('filter_builder_tbl_usuarios_concessionarias_tbl_monitoramento_ID_EX_search');
            
            $text_editor = new TextEdit('ID_EX');
            
            $filterBuilder->addColumn(
                $columns['ID_EX'],
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
            
            $main_editor = new DynamicCombobox('id_d_edit', $this->CreateLinkBuilder());
            $main_editor->setAllowClear(true);
            $main_editor->setMinimumInputLength(0);
            $main_editor->SetAllowNullValue(false);
            $main_editor->SetHandlerName('filter_builder_tbl_usuarios_concessionarias_tbl_monitoramento_ID_D_search');
            
            $multi_value_select_editor = new RemoteMultiValueSelect('ID_D', $this->CreateLinkBuilder());
            $multi_value_select_editor->SetHandlerName('filter_builder_tbl_usuarios_concessionarias_tbl_monitoramento_ID_D_search');
            
            $text_editor = new TextEdit('ID_D');
            
            $filterBuilder->addColumn(
                $columns['ID_D'],
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
            
            $main_editor = new DynamicCombobox('id_r_edit', $this->CreateLinkBuilder());
            $main_editor->setAllowClear(true);
            $main_editor->setMinimumInputLength(0);
            $main_editor->SetAllowNullValue(false);
            $main_editor->SetHandlerName('filter_builder_tbl_usuarios_concessionarias_tbl_monitoramento_ID_R_search');
            
            $multi_value_select_editor = new RemoteMultiValueSelect('ID_R', $this->CreateLinkBuilder());
            $multi_value_select_editor->SetHandlerName('filter_builder_tbl_usuarios_concessionarias_tbl_monitoramento_ID_R_search');
            
            $text_editor = new TextEdit('ID_R');
            
            $filterBuilder->addColumn(
                $columns['ID_R'],
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
            
            $main_editor = new DynamicCombobox('id_alc_edit', $this->CreateLinkBuilder());
            $main_editor->setAllowClear(true);
            $main_editor->setMinimumInputLength(0);
            $main_editor->SetAllowNullValue(false);
            $main_editor->SetHandlerName('filter_builder_tbl_usuarios_concessionarias_tbl_monitoramento_ID_ALC_search');
            
            $multi_value_select_editor = new RemoteMultiValueSelect('ID_ALC', $this->CreateLinkBuilder());
            $multi_value_select_editor->SetHandlerName('filter_builder_tbl_usuarios_concessionarias_tbl_monitoramento_ID_ALC_search');
            
            $text_editor = new TextEdit('ID_ALC');
            
            $filterBuilder->addColumn(
                $columns['ID_ALC'],
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
            
            $main_editor = new DynamicCombobox('id_atc_edit', $this->CreateLinkBuilder());
            $main_editor->setAllowClear(true);
            $main_editor->setMinimumInputLength(0);
            $main_editor->SetAllowNullValue(false);
            $main_editor->SetHandlerName('filter_builder_tbl_usuarios_concessionarias_tbl_monitoramento_ID_ATC_search');
            
            $multi_value_select_editor = new RemoteMultiValueSelect('ID_ATC', $this->CreateLinkBuilder());
            $multi_value_select_editor->SetHandlerName('filter_builder_tbl_usuarios_concessionarias_tbl_monitoramento_ID_ATC_search');
            
            $text_editor = new TextEdit('ID_ATC');
            
            $filterBuilder->addColumn(
                $columns['ID_ATC'],
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
            
            $main_editor = new DynamicCombobox('id_e_edit', $this->CreateLinkBuilder());
            $main_editor->setAllowClear(true);
            $main_editor->setMinimumInputLength(0);
            $main_editor->SetAllowNullValue(false);
            $main_editor->SetHandlerName('filter_builder_tbl_usuarios_concessionarias_tbl_monitoramento_ID_E_search');
            
            $multi_value_select_editor = new RemoteMultiValueSelect('ID_E', $this->CreateLinkBuilder());
            $multi_value_select_editor->SetHandlerName('filter_builder_tbl_usuarios_concessionarias_tbl_monitoramento_ID_E_search');
            
            $text_editor = new TextEdit('ID_E');
            
            $filterBuilder->addColumn(
                $columns['ID_E'],
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
            
            $main_editor = new TextEdit('fl_tre_edit');
            
            $filterBuilder->addColumn(
                $columns['FL_TRE'],
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
            
            $main_editor = new TextEdit('fl_tri_edit');
            
            $filterBuilder->addColumn(
                $columns['FL_TRI'],
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
            
            $main_editor = new TextEdit('id_fc2_edit');
            
            $filterBuilder->addColumn(
                $columns['ID_FC2'],
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
            
            $main_editor = new TextEdit('id_fc3_edit');
            
            $filterBuilder->addColumn(
                $columns['ID_FC3'],
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
            
            $main_editor = new TextEdit('pa_edit');
            
            $filterBuilder->addColumn(
                $columns['PA'],
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
            
            $main_editor = new TextEdit('at_on_edit');
            
            $filterBuilder->addColumn(
                $columns['AT_ON'],
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
            
            $main_editor = new DateTimeEdit('dtregistro_edit', false, 'd-m-Y');
            
            $filterBuilder->addColumn(
                $columns['dtRegistro'],
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
            
            $main_editor = new TextEdit('hora_edit');
            $main_editor->SetMaxLength(8);
            
            $filterBuilder->addColumn(
                $columns['Hora'],
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
            
            $main_editor = new TextEdit('observacoes_edit');
            $main_editor->SetMaxLength(100);
            
            $filterBuilder->addColumn(
                $columns['Observacoes'],
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
            
            $main_editor = new DynamicCombobox('idinterferencia_edit', $this->CreateLinkBuilder());
            $main_editor->setAllowClear(true);
            $main_editor->setMinimumInputLength(0);
            $main_editor->SetAllowNullValue(false);
            $main_editor->SetHandlerName('filter_builder_tbl_usuarios_concessionarias_tbl_monitoramento_idInterferencia_search');
            
            $multi_value_select_editor = new RemoteMultiValueSelect('idInterferencia', $this->CreateLinkBuilder());
            $multi_value_select_editor->SetHandlerName('filter_builder_tbl_usuarios_concessionarias_tbl_monitoramento_idInterferencia_search');
            
            $text_editor = new TextEdit('idInterferencia');
            
            $filterBuilder->addColumn(
                $columns['idInterferencia'],
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
            
            $main_editor = new DynamicCombobox('id_gerenciador_edit', $this->CreateLinkBuilder());
            $main_editor->setAllowClear(true);
            $main_editor->setMinimumInputLength(0);
            $main_editor->SetAllowNullValue(false);
            $main_editor->SetHandlerName('filter_builder_tbl_usuarios_concessionarias_tbl_monitoramento_id_gerenciador_search');
            
            $multi_value_select_editor = new RemoteMultiValueSelect('id_gerenciador', $this->CreateLinkBuilder());
            $multi_value_select_editor->SetHandlerName('filter_builder_tbl_usuarios_concessionarias_tbl_monitoramento_id_gerenciador_search');
            
            $text_editor = new TextEdit('id_gerenciador');
            
            $filterBuilder->addColumn(
                $columns['id_gerenciador'],
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
            
            $main_editor = new DynamicCombobox('id_anocontratual_edit', $this->CreateLinkBuilder());
            $main_editor->setAllowClear(true);
            $main_editor->setMinimumInputLength(0);
            $main_editor->SetAllowNullValue(false);
            $main_editor->SetHandlerName('filter_builder_tbl_usuarios_concessionarias_tbl_monitoramento_id_anocontratual_search');
            
            $multi_value_select_editor = new RemoteMultiValueSelect('id_anocontratual', $this->CreateLinkBuilder());
            $multi_value_select_editor->SetHandlerName('filter_builder_tbl_usuarios_concessionarias_tbl_monitoramento_id_anocontratual_search');
            
            $text_editor = new TextEdit('id_anocontratual');
            
            $filterBuilder->addColumn(
                $columns['id_anocontratual'],
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
            
            $main_editor = new TextEdit('marco_km_edit');
            $main_editor->SetMaxLength(45);
            
            $filterBuilder->addColumn(
                $columns['marco_km'],
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
            
            $main_editor = new TextEdit('latitude_edit');
            $main_editor->SetMaxLength(20);
            
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
            
            $main_editor = new TextEdit('longitude_edit');
            $main_editor->SetMaxLength(20);
            
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
            
            $main_editor = new TextEdit('observacoe2_edit');
            $main_editor->SetMaxLength(100);
            
            $filterBuilder->addColumn(
                $columns['Observacoe2'],
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
            
            $main_editor = new TextEdit('revisao_edit');
            $main_editor->SetMaxLength(5);
            
            $filterBuilder->addColumn(
                $columns['revisao'],
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
            
            $main_editor = new DateTimeEdit('data_lancamento_edit', false, 'd-m-Y');
            
            $filterBuilder->addColumn(
                $columns['data_lancamento'],
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
            
            $main_editor = new DateTimeEdit('data_alteracao_edit', false, 'd-m-Y');
            
            $filterBuilder->addColumn(
                $columns['data_alteracao'],
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
            // View column for Lote field
            //
            $column = new TextViewColumn('idConcessiona', 'idConcessiona_Lote', 'Lote', $this->dataset);
            $column->SetOrderable(true);
            $column->setMinimalVisibility(ColumnVisibility::PHONE);
            $column->SetDescription('');
            $column->SetFixedWidth(null);
            $grid->AddViewColumn($column);
            
            //
            // View column for RodoviaSP field
            //
            $column = new TextViewColumn('id_rodovia', 'id_rodovia_RodoviaSP', 'Rodovia', $this->dataset);
            $column->SetOrderable(true);
            $column->setMinimalVisibility(ColumnVisibility::PHONE);
            $column->SetDescription('');
            $column->SetFixedWidth(null);
            $grid->AddViewColumn($column);
            
            //
            // View column for DescricaoVia field
            //
            $column = new TextViewColumn('id_via', 'id_via_DescricaoVia', 'Via', $this->dataset);
            $column->SetOrderable(true);
            $column->setMinimalVisibility(ColumnVisibility::PHONE);
            $column->SetDescription('');
            $column->SetFixedWidth(null);
            $grid->AddViewColumn($column);
            
            //
            // View column for DescricaoPista field
            //
            $column = new TextViewColumn('idPista', 'idPista_DescricaoPista', 'Pista', $this->dataset);
            $column->SetOrderable(true);
            $column->setMinimalVisibility(ColumnVisibility::PHONE);
            $column->SetDescription('');
            $column->SetFixedWidth(null);
            $grid->AddViewColumn($column);
            
            //
            // View column for Descricao field
            //
            $column = new TextViewColumn('idSentidotrafego', 'idSentidotrafego_Descricao', 'Sentido tráfego (quilometragem)', $this->dataset);
            $column->SetOrderable(true);
            $column->setMinimalVisibility(ColumnVisibility::PHONE);
            $column->SetDescription('');
            $column->SetFixedWidth(null);
            $grid->AddViewColumn($column);
            
            //
            // View column for DescricaoFaixa field
            //
            $column = new TextViewColumn('idFaixa', 'idFaixa_DescricaoFaixa', 'Faixa', $this->dataset);
            $column->SetOrderable(true);
            $column->setMinimalVisibility(ColumnVisibility::PHONE);
            $column->SetDescription('');
            $column->SetFixedWidth(null);
            $grid->AddViewColumn($column);
            
            //
            // View column for id_km field
            //
            $column = new NumberViewColumn('id_km', 'id_km', 'km', $this->dataset);
            $column->SetOrderable(true);
            $column->setBold(true);
            $column->setNumberAfterDecimal(3);
            $column->setThousandsSeparator('.');
            $column->setDecimalSeparator(',');
            $column->setMinimalVisibility(ColumnVisibility::PHONE);
            $column->SetDescription('');
            $column->SetFixedWidth(null);
            $grid->AddViewColumn($column);
            
            //
            // View column for DescricaoSecao field
            //
            $column = new TextViewColumn('id_secao_terrap', 'id_secao_terrap_DescricaoSecao', 'Seção Terrap.', $this->dataset);
            $column->SetOrderable(true);
            $column->setMinimalVisibility(ColumnVisibility::PHONE);
            $column->SetDescription('');
            $column->SetFixedWidth(null);
            $grid->AddViewColumn($column);
            
            //
            // View column for DescricaoMaterial field
            //
            $column = new TextViewColumn('tipo_revestimento', 'tipo_revestimento_DescricaoMaterial', 'Tipo Revestimento', $this->dataset);
            $column->SetOrderable(true);
            $column->setMinimalVisibility(ColumnVisibility::PHONE);
            $column->SetDescription('');
            $column->SetFixedWidth(null);
            $grid->AddViewColumn($column);
            
            //
            // View column for dtRegistro field
            //
            $column = new DateTimeViewColumn('dtRegistro', 'dtRegistro', 'Data Registro', $this->dataset);
            $column->SetOrderable(true);
            $column->SetDateTimeFormat('d-m-Y');
            $column->setMinimalVisibility(ColumnVisibility::PHONE);
            $column->SetDescription('');
            $column->SetFixedWidth(null);
            $grid->AddViewColumn($column);
            
            //
            // View column for Hora field
            //
            $column = new TextViewColumn('Hora', 'Hora', 'Hora', $this->dataset);
            $column->SetOrderable(true);
            $column->setMinimalVisibility(ColumnVisibility::PHONE);
            $column->SetDescription('');
            $column->SetFixedWidth(null);
            $grid->AddViewColumn($column);
            
            //
            // View column for tipo_interferncia field
            //
            $column = new TextViewColumn('idInterferencia', 'idInterferencia_tipo_interferncia', 'Interferência', $this->dataset);
            $column->SetOrderable(true);
            $column->setMinimalVisibility(ColumnVisibility::PHONE);
            $column->SetDescription('');
            $column->SetFixedWidth(null);
            $grid->AddViewColumn($column);
            
            //
            // View column for ano field
            //
            $column = new TextViewColumn('id_anocontratual', 'id_anocontratual_ano', 'Ano Contratual', $this->dataset);
            $column->SetOrderable(true);
            $column->setMinimalVisibility(ColumnVisibility::PHONE);
            $column->SetDescription('');
            $column->SetFixedWidth(null);
            $grid->AddViewColumn($column);
            
            //
            // View column for marco_km field
            //
            $column = new TextViewColumn('marco_km', 'marco_km', 'Marco Km', $this->dataset);
            $column->SetOrderable(true);
            $column->setMinimalVisibility(ColumnVisibility::PHONE);
            $column->SetDescription('');
            $column->SetFixedWidth(null);
            $grid->AddViewColumn($column);
            
            //
            // View column for latitude field
            //
            $column = new TextViewColumn('latitude', 'latitude', 'Latitude', $this->dataset);
            $column->SetOrderable(true);
            $column->setMinimalVisibility(ColumnVisibility::PHONE);
            $column->SetDescription('');
            $column->SetFixedWidth(null);
            $grid->AddViewColumn($column);
            
            //
            // View column for longitude field
            //
            $column = new TextViewColumn('longitude', 'longitude', 'Longitude', $this->dataset);
            $column->SetOrderable(true);
            $column->setMinimalVisibility(ColumnVisibility::PHONE);
            $column->SetDescription('');
            $column->SetFixedWidth(null);
            $grid->AddViewColumn($column);
            
            //
            // View column for Observacoe2 field
            //
            $column = new TextViewColumn('Observacoe2', 'Observacoe2', 'Observações', $this->dataset);
            $column->SetOrderable(true);
            $column->SetMaxLength(75);
            $column->setMinimalVisibility(ColumnVisibility::PHONE);
            $column->SetDescription('');
            $column->SetFixedWidth(null);
            $grid->AddViewColumn($column);
            
            //
            // View column for revisao field
            //
            $column = new TextViewColumn('revisao', 'revisao', 'Revisão', $this->dataset);
            $column->SetOrderable(true);
            $column->setMinimalVisibility(ColumnVisibility::PHONE);
            $column->SetDescription('');
            $column->SetFixedWidth(null);
            $grid->AddViewColumn($column);
            
            //
            // View column for data_lancamento field
            //
            $column = new DateTimeViewColumn('data_lancamento', 'data_lancamento', 'Data Lancamento', $this->dataset);
            $column->SetOrderable(true);
            $column->SetDateTimeFormat('d-m-Y');
            $column->setMinimalVisibility(ColumnVisibility::PHONE);
            $column->SetDescription('');
            $column->SetFixedWidth(null);
            $grid->AddViewColumn($column);
            
            //
            // View column for data_alteracao field
            //
            $column = new DateTimeViewColumn('data_alteracao', 'data_alteracao', 'Data Alteracao', $this->dataset);
            $column->SetOrderable(true);
            $column->SetDateTimeFormat('d-m-Y');
            $column->setMinimalVisibility(ColumnVisibility::PHONE);
            $column->SetDescription('');
            $column->SetFixedWidth(null);
            $grid->AddViewColumn($column);
        }
    
        protected function AddSingleRecordViewColumns(Grid $grid)
        {
            //
            // View column for idMonitoramento field
            //
            $column = new NumberViewColumn('idMonitoramento', 'idMonitoramento', 'Ficha Numero', $this->dataset);
            $column->SetOrderable(true);
            $column->setNumberAfterDecimal(0);
            $column->setThousandsSeparator('.');
            $column->setDecimalSeparator('');
            $grid->AddSingleRecordViewColumn($column);
            
            //
            // View column for Lote field
            //
            $column = new TextViewColumn('idConcessiona', 'idConcessiona_Lote', 'Lote', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddSingleRecordViewColumn($column);
            
            //
            // View column for RodoviaSP field
            //
            $column = new TextViewColumn('id_rodovia', 'id_rodovia_RodoviaSP', 'Rodovia', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddSingleRecordViewColumn($column);
            
            //
            // View column for DescricaoVia field
            //
            $column = new TextViewColumn('id_via', 'id_via_DescricaoVia', 'Via', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddSingleRecordViewColumn($column);
            
            //
            // View column for DescricaoPista field
            //
            $column = new TextViewColumn('idPista', 'idPista_DescricaoPista', 'Pista', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddSingleRecordViewColumn($column);
            
            //
            // View column for Descricao field
            //
            $column = new TextViewColumn('idSentidotrafego', 'idSentidotrafego_Descricao', 'Sentido tráfego (quilometragem)', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddSingleRecordViewColumn($column);
            
            //
            // View column for km_referencia field
            //
            $column = new TextViewColumn('km_referencia', 'km_referencia', 'km de referência (caso de dispositivos)', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddSingleRecordViewColumn($column);
            
            //
            // View column for alca_ramo field
            //
            $column = new TextViewColumn('alca_ramo', 'alca_ramo', 'Nomenclatura de Alça/Ramo(quando necessário)', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddSingleRecordViewColumn($column);
            
            //
            // View column for DescricaoFaixa field
            //
            $column = new TextViewColumn('idFaixa', 'idFaixa_DescricaoFaixa', 'Faixa', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddSingleRecordViewColumn($column);
            
            //
            // View column for id_km field
            //
            $column = new NumberViewColumn('id_km', 'id_km', 'km', $this->dataset);
            $column->SetOrderable(true);
            $column->setBold(true);
            $column->setNumberAfterDecimal(3);
            $column->setThousandsSeparator('.');
            $column->setDecimalSeparator(',');
            $grid->AddSingleRecordViewColumn($column);
            
            //
            // View column for DescricaoSecao field
            //
            $column = new TextViewColumn('id_secao_terrap', 'id_secao_terrap_DescricaoSecao', 'Seção Terrap.', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddSingleRecordViewColumn($column);
            
            //
            // View column for DescricaoMaterial field
            //
            $column = new TextViewColumn('tipo_revestimento', 'tipo_revestimento_DescricaoMaterial', 'Tipo Revestimento', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddSingleRecordViewColumn($column);
            
            //
            // View column for Ok field
            //
            $column = new NumberViewColumn('Ok', 'Ok', 'Ok', $this->dataset);
            $column->SetOrderable(true);
            $column->setNumberAfterDecimal(0);
            $column->setThousandsSeparator('.');
            $column->setDecimalSeparator('');
            $grid->AddSingleRecordViewColumn($column);
            
            //
            // View column for Marque field
            //
            $column = new TextViewColumn('ID_FI', 'ID_FI_Marque', 'FI', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddSingleRecordViewColumn($column);
            
            //
            // View column for Marque field
            //
            $column = new TextViewColumn('ID_TTC', 'ID_TTC_Marque', 'TTC', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddSingleRecordViewColumn($column);
            
            //
            // View column for Marque field
            //
            $column = new TextViewColumn('ID_TTL', 'ID_TTL_Marque', 'TTL', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddSingleRecordViewColumn($column);
            
            //
            // View column for Marque field
            //
            $column = new TextViewColumn('ID_TLC', 'ID_TLC_Marque', 'TLC', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddSingleRecordViewColumn($column);
            
            //
            // View column for Marque field
            //
            $column = new TextViewColumn('ID_TLL', 'ID_TLL_Marque', 'TLL', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddSingleRecordViewColumn($column);
            
            //
            // View column for Marque field
            //
            $column = new TextViewColumn('ID_TRR', 'ID_TRR_Marque', 'TRR', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddSingleRecordViewColumn($column);
            
            //
            // View column for Marque field
            //
            $column = new TextViewColumn('ID_J', 'ID_J_Marque', 'J', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddSingleRecordViewColumn($column);
            
            //
            // View column for Marque field
            //
            $column = new TextViewColumn('ID_TB', 'ID_TB_Marque', 'TB', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddSingleRecordViewColumn($column);
            
            //
            // View column for Marque field
            //
            $column = new TextViewColumn('ID_JE', 'ID_JE_Marque', 'JE', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddSingleRecordViewColumn($column);
            
            //
            // View column for Marque field
            //
            $column = new TextViewColumn('ID_TBE', 'ID_TBE_Marque', 'TBE', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddSingleRecordViewColumn($column);
            
            //
            // View column for Marque field
            //
            $column = new TextViewColumn('ID_ALP', 'ID_ALP_Marque', 'ALP', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddSingleRecordViewColumn($column);
            
            //
            // View column for Marque field
            //
            $column = new TextViewColumn('ID_ATP', 'ID_ATP_Marque', 'ATP', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddSingleRecordViewColumn($column);
            
            //
            // View column for Marque field
            //
            $column = new TextViewColumn('ID_O', 'ID_O_Marque', 'O', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddSingleRecordViewColumn($column);
            
            //
            // View column for Marque field
            //
            $column = new TextViewColumn('ID_P', 'ID_P_Marque', 'P', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddSingleRecordViewColumn($column);
            
            //
            // View column for Marque field
            //
            $column = new TextViewColumn('ID_EX', 'ID_EX_Marque', 'EX', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddSingleRecordViewColumn($column);
            
            //
            // View column for Marque field
            //
            $column = new TextViewColumn('ID_D', 'ID_D_Marque', 'D', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddSingleRecordViewColumn($column);
            
            //
            // View column for Marque field
            //
            $column = new TextViewColumn('ID_R', 'ID_R_Marque', 'R', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddSingleRecordViewColumn($column);
            
            //
            // View column for Marque field
            //
            $column = new TextViewColumn('ID_ALC', 'ID_ALC_Marque', 'ALC', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddSingleRecordViewColumn($column);
            
            //
            // View column for Marque field
            //
            $column = new TextViewColumn('ID_ATC', 'ID_ATC_Marque', 'ATC', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddSingleRecordViewColumn($column);
            
            //
            // View column for Marque field
            //
            $column = new TextViewColumn('ID_E', 'ID_E_Marque', 'E', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddSingleRecordViewColumn($column);
            
            //
            // View column for FL_TRE field
            //
            $column = new NumberViewColumn('FL_TRE', 'FL_TRE', 'FL-TRE (mm)', $this->dataset);
            $column->SetOrderable(true);
            $column->setNumberAfterDecimal(2);
            $column->setThousandsSeparator('.');
            $column->setDecimalSeparator(',');
            $grid->AddSingleRecordViewColumn($column);
            
            //
            // View column for FL_TRI field
            //
            $column = new NumberViewColumn('FL_TRI', 'FL_TRI', 'FL-TRI (mm)', $this->dataset);
            $column->SetOrderable(true);
            $column->setNumberAfterDecimal(2);
            $column->setThousandsSeparator('.');
            $column->setDecimalSeparator(',');
            $grid->AddSingleRecordViewColumn($column);
            
            //
            // View column for ID_FC2 field
            //
            $column = new NumberViewColumn('ID_FC2', 'ID_FC2', 'FC2 (%)', $this->dataset);
            $column->SetOrderable(true);
            $column->setNumberAfterDecimal(2);
            $column->setThousandsSeparator('.');
            $column->setDecimalSeparator(',');
            $grid->AddSingleRecordViewColumn($column);
            
            //
            // View column for ID_FC3 field
            //
            $column = new NumberViewColumn('ID_FC3', 'ID_FC3', 'FC3 (%)', $this->dataset);
            $column->SetOrderable(true);
            $column->setNumberAfterDecimal(2);
            $column->setThousandsSeparator('.');
            $column->setDecimalSeparator(',');
            $grid->AddSingleRecordViewColumn($column);
            
            //
            // View column for PA field
            //
            $column = new NumberViewColumn('PA', 'PA', 'PA (%)', $this->dataset);
            $column->SetOrderable(true);
            $column->setNumberAfterDecimal(2);
            $column->setThousandsSeparator('.');
            $column->setDecimalSeparator(',');
            $grid->AddSingleRecordViewColumn($column);
            
            //
            // View column for AT_ON field
            //
            $column = new NumberViewColumn('AT_ON', 'AT_ON', 'AT/ON (%)', $this->dataset);
            $column->SetOrderable(true);
            $column->setNumberAfterDecimal(2);
            $column->setThousandsSeparator('.');
            $column->setDecimalSeparator(',');
            $grid->AddSingleRecordViewColumn($column);
            
            //
            // View column for dtRegistro field
            //
            $column = new DateTimeViewColumn('dtRegistro', 'dtRegistro', 'Data Registro', $this->dataset);
            $column->SetOrderable(true);
            $column->SetDateTimeFormat('d-m-Y');
            $grid->AddSingleRecordViewColumn($column);
            
            //
            // View column for Hora field
            //
            $column = new TextViewColumn('Hora', 'Hora', 'Hora', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddSingleRecordViewColumn($column);
            
            //
            // View column for Observacoes field
            //
            $column = new TextViewColumn('Observacoes', 'Observacoes', 'Observações', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddSingleRecordViewColumn($column);
            
            //
            // View column for tipo_interferncia field
            //
            $column = new TextViewColumn('idInterferencia', 'idInterferencia_tipo_interferncia', 'Interferência', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddSingleRecordViewColumn($column);
            
            //
            // View column for Nome Operador field
            //
            $column = new TextViewColumn('id_gerenciador', 'id_gerenciador_Nome Operador', 'Gerenciador', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddSingleRecordViewColumn($column);
            
            //
            // View column for ano field
            //
            $column = new TextViewColumn('id_anocontratual', 'id_anocontratual_ano', 'Ano Contratual', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddSingleRecordViewColumn($column);
            
            //
            // View column for marco_km field
            //
            $column = new TextViewColumn('marco_km', 'marco_km', 'Marco Km', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddSingleRecordViewColumn($column);
            
            //
            // View column for latitude field
            //
            $column = new TextViewColumn('latitude', 'latitude', 'Latitude', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddSingleRecordViewColumn($column);
            
            //
            // View column for longitude field
            //
            $column = new TextViewColumn('longitude', 'longitude', 'Longitude', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddSingleRecordViewColumn($column);
            
            //
            // View column for Observacoe2 field
            //
            $column = new TextViewColumn('Observacoe2', 'Observacoe2', 'Observações', $this->dataset);
            $column->SetOrderable(true);
            $column->SetMaxLength(75);
            $grid->AddSingleRecordViewColumn($column);
            
            //
            // View column for revisao field
            //
            $column = new TextViewColumn('revisao', 'revisao', 'Revisão', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddSingleRecordViewColumn($column);
            
            //
            // View column for data_lancamento field
            //
            $column = new DateTimeViewColumn('data_lancamento', 'data_lancamento', 'Data Lancamento', $this->dataset);
            $column->SetOrderable(true);
            $column->SetDateTimeFormat('d-m-Y');
            $grid->AddSingleRecordViewColumn($column);
            
            //
            // View column for data_alteracao field
            //
            $column = new DateTimeViewColumn('data_alteracao', 'data_alteracao', 'Data Alteracao', $this->dataset);
            $column->SetOrderable(true);
            $column->SetDateTimeFormat('d-m-Y');
            $grid->AddSingleRecordViewColumn($column);
        }
    
        protected function AddEditColumns(Grid $grid)
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
            $lookupDataset->setOrderByField('Lote', 'ASC');
            $editColumn = new DynamicLookupEditColumn('Lote', 'idConcessiona', 'idConcessiona_Lote', 'edit_tbl_usuarios_concessionarias_tbl_monitoramento_idConcessiona_search', $editor, $this->dataset, $lookupDataset, 'idConcessiona', 'Lote', '');
            $validator = new RequiredValidator(StringUtils::Format($this->GetLocalizerCaptions()->GetMessageString('RequiredValidationMessage'), $editColumn->GetCaption()));
            $editor->GetValidatorCollection()->AddValidator($validator);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddEditColumn($editColumn);
            
            //
            // Edit column for id_rodovia field
            //
            $editor = new DynamicCombobox('id_rodovia_edit', $this->CreateLinkBuilder());
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
            $editColumn = new DynamicLookupEditColumn('Rodovia', 'id_rodovia', 'id_rodovia_RodoviaSP', 'edit_tbl_usuarios_concessionarias_tbl_monitoramento_id_rodovia_search', $editor, $this->dataset, $lookupDataset, 'idRodovia', 'RodoviaSP', '');
            $validator = new RequiredValidator(StringUtils::Format($this->GetLocalizerCaptions()->GetMessageString('RequiredValidationMessage'), $editColumn->GetCaption()));
            $editor->GetValidatorCollection()->AddValidator($validator);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddEditColumn($editColumn);
            
            //
            // Edit column for id_via field
            //
            $editor = new DynamicCombobox('id_via_edit', $this->CreateLinkBuilder());
            $editor->setAllowClear(true);
            $editor->setMinimumInputLength(0);
            $lookupDataset = new TableDataset(
                MyPDOConnectionFactory::getInstance(),
                GetConnectionOptions(),
                '`tbl_vias`');
            $lookupDataset->addFields(
                array(
                    new IntegerField('idVia', true, true, true),
                    new StringField('DescricaoVia'),
                    new IntegerField('Ordem')
                )
            );
            $lookupDataset->setOrderByField('DescricaoVia', 'ASC');
            $editColumn = new DynamicLookupEditColumn('Via', 'id_via', 'id_via_DescricaoVia', 'edit_tbl_usuarios_concessionarias_tbl_monitoramento_id_via_search', $editor, $this->dataset, $lookupDataset, 'idVia', 'DescricaoVia', '');
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddEditColumn($editColumn);
            
            //
            // Edit column for idPista field
            //
            $editor = new DynamicCombobox('idpista_edit', $this->CreateLinkBuilder());
            $editor->setAllowClear(true);
            $editor->setMinimumInputLength(0);
            $lookupDataset = new TableDataset(
                MyPDOConnectionFactory::getInstance(),
                GetConnectionOptions(),
                '`tbl_pistas`');
            $lookupDataset->addFields(
                array(
                    new IntegerField('idPista', true, true, true),
                    new StringField('DescricaoPista'),
                    new IntegerField('Ordem')
                )
            );
            $lookupDataset->setOrderByField('DescricaoPista', 'ASC');
            $editColumn = new DynamicLookupEditColumn('Pista', 'idPista', 'idPista_DescricaoPista', 'edit_tbl_usuarios_concessionarias_tbl_monitoramento_idPista_search', $editor, $this->dataset, $lookupDataset, 'idPista', 'DescricaoPista', '');
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddEditColumn($editColumn);
            
            //
            // Edit column for idSentidotrafego field
            //
            $editor = new DynamicCombobox('idsentidotrafego_edit', $this->CreateLinkBuilder());
            $editor->setAllowClear(true);
            $editor->setMinimumInputLength(0);
            $lookupDataset = new TableDataset(
                MyPDOConnectionFactory::getInstance(),
                GetConnectionOptions(),
                '`tbl_sentido_trafego`');
            $lookupDataset->addFields(
                array(
                    new IntegerField('idSentidotrafego', true, true, true),
                    new StringField('Sigla'),
                    new StringField('Descricao')
                )
            );
            $lookupDataset->setOrderByField('Descricao', 'ASC');
            $editColumn = new DynamicLookupEditColumn('Sentido tráfego (quilometragem)', 'idSentidotrafego', 'idSentidotrafego_Descricao', 'edit_tbl_usuarios_concessionarias_tbl_monitoramento_idSentidotrafego_search', $editor, $this->dataset, $lookupDataset, 'idSentidotrafego', 'Descricao', '');
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddEditColumn($editColumn);
            
            //
            // Edit column for km_referencia field
            //
            $editor = new TextEdit('km_referencia_edit');
            $editor->SetMaxLength(20);
            $editColumn = new CustomEditColumn('km de referência (caso de dispositivos)', 'km_referencia', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddEditColumn($editColumn);
            
            //
            // Edit column for alca_ramo field
            //
            $editor = new TextEdit('alca_ramo_edit');
            $editor->SetMaxLength(20);
            $editColumn = new CustomEditColumn('Nomenclatura de Alça/Ramo(quando necessário)', 'alca_ramo', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddEditColumn($editColumn);
            
            //
            // Edit column for idFaixa field
            //
            $editor = new DynamicCombobox('idfaixa_edit', $this->CreateLinkBuilder());
            $editor->setAllowClear(true);
            $editor->setMinimumInputLength(0);
            $lookupDataset = new TableDataset(
                MyPDOConnectionFactory::getInstance(),
                GetConnectionOptions(),
                '`tbl_faixas`');
            $lookupDataset->addFields(
                array(
                    new IntegerField('idFaixa', true, true, true),
                    new StringField('DescricaoFaixa'),
                    new IntegerField('Ordem')
                )
            );
            $lookupDataset->setOrderByField('DescricaoFaixa', 'ASC');
            $editColumn = new DynamicLookupEditColumn('Faixa', 'idFaixa', 'idFaixa_DescricaoFaixa', 'edit_tbl_usuarios_concessionarias_tbl_monitoramento_idFaixa_search', $editor, $this->dataset, $lookupDataset, 'idFaixa', 'DescricaoFaixa', '');
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddEditColumn($editColumn);
            
            //
            // Edit column for id_km field
            //
            $editor = new TextEdit('id_km_edit');
            $editColumn = new CustomEditColumn('km', 'id_km', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddEditColumn($editColumn);
            
            //
            // Edit column for id_secao_terrap field
            //
            $editor = new DynamicCombobox('id_secao_terrap_edit', $this->CreateLinkBuilder());
            $editor->setAllowClear(true);
            $editor->setMinimumInputLength(0);
            $lookupDataset = new TableDataset(
                MyPDOConnectionFactory::getInstance(),
                GetConnectionOptions(),
                '`tbl_secao_terrapleno`');
            $lookupDataset->addFields(
                array(
                    new IntegerField('idSecao', true, true, true),
                    new StringField('DescricaoSecao'),
                    new StringField('CodSecao')
                )
            );
            $lookupDataset->setOrderByField('DescricaoSecao', 'ASC');
            $editColumn = new DynamicLookupEditColumn('Seção Terrap.', 'id_secao_terrap', 'id_secao_terrap_DescricaoSecao', 'edit_tbl_usuarios_concessionarias_tbl_monitoramento_id_secao_terrap_search', $editor, $this->dataset, $lookupDataset, 'idSecao', 'DescricaoSecao', '');
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddEditColumn($editColumn);
            
            //
            // Edit column for tipo_revestimento field
            //
            $editor = new DynamicCombobox('tipo_revestimento_edit', $this->CreateLinkBuilder());
            $editor->setAllowClear(true);
            $editor->setMinimumInputLength(0);
            $lookupDataset = new TableDataset(
                MyPDOConnectionFactory::getInstance(),
                GetConnectionOptions(),
                '`tbl_tipo_material`');
            $lookupDataset->addFields(
                array(
                    new IntegerField('idMaterial', true, true, true),
                    new StringField('DescricaoMaterial'),
                    new StringField('CodigoMaterial')
                )
            );
            $lookupDataset->setOrderByField('DescricaoMaterial', 'ASC');
            $editColumn = new DynamicLookupEditColumn('Tipo Revestimento', 'tipo_revestimento', 'tipo_revestimento_DescricaoMaterial', 'edit_tbl_usuarios_concessionarias_tbl_monitoramento_tipo_revestimento_search', $editor, $this->dataset, $lookupDataset, 'idMaterial', 'DescricaoMaterial', '');
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddEditColumn($editColumn);
            
            //
            // Edit column for Ok field
            //
            $editor = new TextEdit('ok_edit');
            $editColumn = new CustomEditColumn('Ok', 'Ok', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddEditColumn($editColumn);
            
            //
            // Edit column for ID_FI field
            //
            $editor = new ComboBox('id_fi_edit', $this->GetLocalizerCaptions()->GetMessageString('PleaseSelect'));
            $lookupDataset = new TableDataset(
                MyPDOConnectionFactory::getInstance(),
                GetConnectionOptions(),
                '`tbl_codificacao`');
            $lookupDataset->addFields(
                array(
                    new IntegerField('idCodificacao', true, true, true),
                    new StringField('Sigla', true),
                    new StringField('Descricao'),
                    new StringField('Observacao'),
                    new StringField('Marque')
                )
            );
            $lookupDataset->setOrderByField('Marque', 'ASC');
            $editColumn = new LookUpEditColumn(
                'FI', 
                'ID_FI', 
                $editor, 
                $this->dataset, 'idCodificacao', 'Marque', $lookupDataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddEditColumn($editColumn);
            
            //
            // Edit column for ID_TTC field
            //
            $editor = new ComboBox('id_ttc_edit', $this->GetLocalizerCaptions()->GetMessageString('PleaseSelect'));
            $lookupDataset = new TableDataset(
                MyPDOConnectionFactory::getInstance(),
                GetConnectionOptions(),
                '`tbl_codificacao`');
            $lookupDataset->addFields(
                array(
                    new IntegerField('idCodificacao', true, true, true),
                    new StringField('Sigla', true),
                    new StringField('Descricao'),
                    new StringField('Observacao'),
                    new StringField('Marque')
                )
            );
            $lookupDataset->setOrderByField('Marque', 'ASC');
            $editColumn = new LookUpEditColumn(
                'TTC', 
                'ID_TTC', 
                $editor, 
                $this->dataset, 'idCodificacao', 'Marque', $lookupDataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddEditColumn($editColumn);
            
            //
            // Edit column for ID_TTL field
            //
            $editor = new ComboBox('id_ttl_edit', $this->GetLocalizerCaptions()->GetMessageString('PleaseSelect'));
            $lookupDataset = new TableDataset(
                MyPDOConnectionFactory::getInstance(),
                GetConnectionOptions(),
                '`tbl_codificacao`');
            $lookupDataset->addFields(
                array(
                    new IntegerField('idCodificacao', true, true, true),
                    new StringField('Sigla', true),
                    new StringField('Descricao'),
                    new StringField('Observacao'),
                    new StringField('Marque')
                )
            );
            $lookupDataset->setOrderByField('Marque', 'ASC');
            $editColumn = new LookUpEditColumn(
                'TTL', 
                'ID_TTL', 
                $editor, 
                $this->dataset, 'idCodificacao', 'Marque', $lookupDataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddEditColumn($editColumn);
            
            //
            // Edit column for ID_TLC field
            //
            $editor = new ComboBox('id_tlc_edit', $this->GetLocalizerCaptions()->GetMessageString('PleaseSelect'));
            $lookupDataset = new TableDataset(
                MyPDOConnectionFactory::getInstance(),
                GetConnectionOptions(),
                '`tbl_codificacao`');
            $lookupDataset->addFields(
                array(
                    new IntegerField('idCodificacao', true, true, true),
                    new StringField('Sigla', true),
                    new StringField('Descricao'),
                    new StringField('Observacao'),
                    new StringField('Marque')
                )
            );
            $lookupDataset->setOrderByField('Marque', 'ASC');
            $editColumn = new LookUpEditColumn(
                'TLC', 
                'ID_TLC', 
                $editor, 
                $this->dataset, 'idCodificacao', 'Marque', $lookupDataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddEditColumn($editColumn);
            
            //
            // Edit column for ID_TLL field
            //
            $editor = new ComboBox('id_tll_edit', $this->GetLocalizerCaptions()->GetMessageString('PleaseSelect'));
            $lookupDataset = new TableDataset(
                MyPDOConnectionFactory::getInstance(),
                GetConnectionOptions(),
                '`tbl_codificacao`');
            $lookupDataset->addFields(
                array(
                    new IntegerField('idCodificacao', true, true, true),
                    new StringField('Sigla', true),
                    new StringField('Descricao'),
                    new StringField('Observacao'),
                    new StringField('Marque')
                )
            );
            $lookupDataset->setOrderByField('Marque', 'ASC');
            $editColumn = new LookUpEditColumn(
                'TLL', 
                'ID_TLL', 
                $editor, 
                $this->dataset, 'idCodificacao', 'Marque', $lookupDataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddEditColumn($editColumn);
            
            //
            // Edit column for ID_TRR field
            //
            $editor = new ComboBox('id_trr_edit', $this->GetLocalizerCaptions()->GetMessageString('PleaseSelect'));
            $lookupDataset = new TableDataset(
                MyPDOConnectionFactory::getInstance(),
                GetConnectionOptions(),
                '`tbl_codificacao`');
            $lookupDataset->addFields(
                array(
                    new IntegerField('idCodificacao', true, true, true),
                    new StringField('Sigla', true),
                    new StringField('Descricao'),
                    new StringField('Observacao'),
                    new StringField('Marque')
                )
            );
            $lookupDataset->setOrderByField('Marque', 'ASC');
            $editColumn = new LookUpEditColumn(
                'TRR', 
                'ID_TRR', 
                $editor, 
                $this->dataset, 'idCodificacao', 'Marque', $lookupDataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddEditColumn($editColumn);
            
            //
            // Edit column for ID_J field
            //
            $editor = new ComboBox('id_j_edit', $this->GetLocalizerCaptions()->GetMessageString('PleaseSelect'));
            $lookupDataset = new TableDataset(
                MyPDOConnectionFactory::getInstance(),
                GetConnectionOptions(),
                '`tbl_codificacao`');
            $lookupDataset->addFields(
                array(
                    new IntegerField('idCodificacao', true, true, true),
                    new StringField('Sigla', true),
                    new StringField('Descricao'),
                    new StringField('Observacao'),
                    new StringField('Marque')
                )
            );
            $lookupDataset->setOrderByField('Marque', 'ASC');
            $editColumn = new LookUpEditColumn(
                'J', 
                'ID_J', 
                $editor, 
                $this->dataset, 'idCodificacao', 'Marque', $lookupDataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddEditColumn($editColumn);
            
            //
            // Edit column for ID_TB field
            //
            $editor = new ComboBox('id_tb_edit', $this->GetLocalizerCaptions()->GetMessageString('PleaseSelect'));
            $lookupDataset = new TableDataset(
                MyPDOConnectionFactory::getInstance(),
                GetConnectionOptions(),
                '`tbl_codificacao`');
            $lookupDataset->addFields(
                array(
                    new IntegerField('idCodificacao', true, true, true),
                    new StringField('Sigla', true),
                    new StringField('Descricao'),
                    new StringField('Observacao'),
                    new StringField('Marque')
                )
            );
            $lookupDataset->setOrderByField('Marque', 'ASC');
            $editColumn = new LookUpEditColumn(
                'TB', 
                'ID_TB', 
                $editor, 
                $this->dataset, 'idCodificacao', 'Marque', $lookupDataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddEditColumn($editColumn);
            
            //
            // Edit column for ID_JE field
            //
            $editor = new ComboBox('id_je_edit', $this->GetLocalizerCaptions()->GetMessageString('PleaseSelect'));
            $lookupDataset = new TableDataset(
                MyPDOConnectionFactory::getInstance(),
                GetConnectionOptions(),
                '`tbl_codificacao`');
            $lookupDataset->addFields(
                array(
                    new IntegerField('idCodificacao', true, true, true),
                    new StringField('Sigla', true),
                    new StringField('Descricao'),
                    new StringField('Observacao'),
                    new StringField('Marque')
                )
            );
            $lookupDataset->setOrderByField('Marque', 'ASC');
            $editColumn = new LookUpEditColumn(
                'JE', 
                'ID_JE', 
                $editor, 
                $this->dataset, 'idCodificacao', 'Marque', $lookupDataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddEditColumn($editColumn);
            
            //
            // Edit column for ID_TBE field
            //
            $editor = new ComboBox('id_tbe_edit', $this->GetLocalizerCaptions()->GetMessageString('PleaseSelect'));
            $lookupDataset = new TableDataset(
                MyPDOConnectionFactory::getInstance(),
                GetConnectionOptions(),
                '`tbl_codificacao`');
            $lookupDataset->addFields(
                array(
                    new IntegerField('idCodificacao', true, true, true),
                    new StringField('Sigla', true),
                    new StringField('Descricao'),
                    new StringField('Observacao'),
                    new StringField('Marque')
                )
            );
            $lookupDataset->setOrderByField('Marque', 'ASC');
            $editColumn = new LookUpEditColumn(
                'TBE', 
                'ID_TBE', 
                $editor, 
                $this->dataset, 'idCodificacao', 'Marque', $lookupDataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddEditColumn($editColumn);
            
            //
            // Edit column for ID_ALP field
            //
            $editor = new ComboBox('id_alp_edit', $this->GetLocalizerCaptions()->GetMessageString('PleaseSelect'));
            $lookupDataset = new TableDataset(
                MyPDOConnectionFactory::getInstance(),
                GetConnectionOptions(),
                '`tbl_codificacao`');
            $lookupDataset->addFields(
                array(
                    new IntegerField('idCodificacao', true, true, true),
                    new StringField('Sigla', true),
                    new StringField('Descricao'),
                    new StringField('Observacao'),
                    new StringField('Marque')
                )
            );
            $lookupDataset->setOrderByField('Marque', 'ASC');
            $editColumn = new LookUpEditColumn(
                'ALP', 
                'ID_ALP', 
                $editor, 
                $this->dataset, 'idCodificacao', 'Marque', $lookupDataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddEditColumn($editColumn);
            
            //
            // Edit column for ID_ATP field
            //
            $editor = new ComboBox('id_atp_edit', $this->GetLocalizerCaptions()->GetMessageString('PleaseSelect'));
            $lookupDataset = new TableDataset(
                MyPDOConnectionFactory::getInstance(),
                GetConnectionOptions(),
                '`tbl_codificacao`');
            $lookupDataset->addFields(
                array(
                    new IntegerField('idCodificacao', true, true, true),
                    new StringField('Sigla', true),
                    new StringField('Descricao'),
                    new StringField('Observacao'),
                    new StringField('Marque')
                )
            );
            $lookupDataset->setOrderByField('Marque', 'ASC');
            $editColumn = new LookUpEditColumn(
                'ATP', 
                'ID_ATP', 
                $editor, 
                $this->dataset, 'idCodificacao', 'Marque', $lookupDataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddEditColumn($editColumn);
            
            //
            // Edit column for ID_O field
            //
            $editor = new ComboBox('id_o_edit', $this->GetLocalizerCaptions()->GetMessageString('PleaseSelect'));
            $lookupDataset = new TableDataset(
                MyPDOConnectionFactory::getInstance(),
                GetConnectionOptions(),
                '`tbl_codificacao`');
            $lookupDataset->addFields(
                array(
                    new IntegerField('idCodificacao', true, true, true),
                    new StringField('Sigla', true),
                    new StringField('Descricao'),
                    new StringField('Observacao'),
                    new StringField('Marque')
                )
            );
            $lookupDataset->setOrderByField('Marque', 'ASC');
            $editColumn = new LookUpEditColumn(
                'O', 
                'ID_O', 
                $editor, 
                $this->dataset, 'idCodificacao', 'Marque', $lookupDataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddEditColumn($editColumn);
            
            //
            // Edit column for ID_P field
            //
            $editor = new ComboBox('id_p_edit', $this->GetLocalizerCaptions()->GetMessageString('PleaseSelect'));
            $lookupDataset = new TableDataset(
                MyPDOConnectionFactory::getInstance(),
                GetConnectionOptions(),
                '`tbl_codificacao`');
            $lookupDataset->addFields(
                array(
                    new IntegerField('idCodificacao', true, true, true),
                    new StringField('Sigla', true),
                    new StringField('Descricao'),
                    new StringField('Observacao'),
                    new StringField('Marque')
                )
            );
            $lookupDataset->setOrderByField('Marque', 'ASC');
            $editColumn = new LookUpEditColumn(
                'P', 
                'ID_P', 
                $editor, 
                $this->dataset, 'idCodificacao', 'Marque', $lookupDataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddEditColumn($editColumn);
            
            //
            // Edit column for ID_EX field
            //
            $editor = new ComboBox('id_ex_edit', $this->GetLocalizerCaptions()->GetMessageString('PleaseSelect'));
            $lookupDataset = new TableDataset(
                MyPDOConnectionFactory::getInstance(),
                GetConnectionOptions(),
                '`tbl_codificacao`');
            $lookupDataset->addFields(
                array(
                    new IntegerField('idCodificacao', true, true, true),
                    new StringField('Sigla', true),
                    new StringField('Descricao'),
                    new StringField('Observacao'),
                    new StringField('Marque')
                )
            );
            $lookupDataset->setOrderByField('Marque', 'ASC');
            $editColumn = new LookUpEditColumn(
                'EX', 
                'ID_EX', 
                $editor, 
                $this->dataset, 'idCodificacao', 'Marque', $lookupDataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddEditColumn($editColumn);
            
            //
            // Edit column for ID_D field
            //
            $editor = new ComboBox('id_d_edit', $this->GetLocalizerCaptions()->GetMessageString('PleaseSelect'));
            $lookupDataset = new TableDataset(
                MyPDOConnectionFactory::getInstance(),
                GetConnectionOptions(),
                '`tbl_codificacao`');
            $lookupDataset->addFields(
                array(
                    new IntegerField('idCodificacao', true, true, true),
                    new StringField('Sigla', true),
                    new StringField('Descricao'),
                    new StringField('Observacao'),
                    new StringField('Marque')
                )
            );
            $lookupDataset->setOrderByField('Marque', 'ASC');
            $editColumn = new LookUpEditColumn(
                'D', 
                'ID_D', 
                $editor, 
                $this->dataset, 'idCodificacao', 'Marque', $lookupDataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddEditColumn($editColumn);
            
            //
            // Edit column for ID_R field
            //
            $editor = new ComboBox('id_r_edit', $this->GetLocalizerCaptions()->GetMessageString('PleaseSelect'));
            $lookupDataset = new TableDataset(
                MyPDOConnectionFactory::getInstance(),
                GetConnectionOptions(),
                '`tbl_codificacao`');
            $lookupDataset->addFields(
                array(
                    new IntegerField('idCodificacao', true, true, true),
                    new StringField('Sigla', true),
                    new StringField('Descricao'),
                    new StringField('Observacao'),
                    new StringField('Marque')
                )
            );
            $lookupDataset->setOrderByField('Marque', 'ASC');
            $editColumn = new LookUpEditColumn(
                'R', 
                'ID_R', 
                $editor, 
                $this->dataset, 'idCodificacao', 'Marque', $lookupDataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddEditColumn($editColumn);
            
            //
            // Edit column for ID_ALC field
            //
            $editor = new ComboBox('id_alc_edit', $this->GetLocalizerCaptions()->GetMessageString('PleaseSelect'));
            $lookupDataset = new TableDataset(
                MyPDOConnectionFactory::getInstance(),
                GetConnectionOptions(),
                '`tbl_codificacao`');
            $lookupDataset->addFields(
                array(
                    new IntegerField('idCodificacao', true, true, true),
                    new StringField('Sigla', true),
                    new StringField('Descricao'),
                    new StringField('Observacao'),
                    new StringField('Marque')
                )
            );
            $lookupDataset->setOrderByField('Marque', 'ASC');
            $editColumn = new LookUpEditColumn(
                'ALC', 
                'ID_ALC', 
                $editor, 
                $this->dataset, 'idCodificacao', 'Marque', $lookupDataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddEditColumn($editColumn);
            
            //
            // Edit column for ID_ATC field
            //
            $editor = new ComboBox('id_atc_edit', $this->GetLocalizerCaptions()->GetMessageString('PleaseSelect'));
            $lookupDataset = new TableDataset(
                MyPDOConnectionFactory::getInstance(),
                GetConnectionOptions(),
                '`tbl_codificacao`');
            $lookupDataset->addFields(
                array(
                    new IntegerField('idCodificacao', true, true, true),
                    new StringField('Sigla', true),
                    new StringField('Descricao'),
                    new StringField('Observacao'),
                    new StringField('Marque')
                )
            );
            $lookupDataset->setOrderByField('Marque', 'ASC');
            $editColumn = new LookUpEditColumn(
                'ATC', 
                'ID_ATC', 
                $editor, 
                $this->dataset, 'idCodificacao', 'Marque', $lookupDataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddEditColumn($editColumn);
            
            //
            // Edit column for ID_E field
            //
            $editor = new ComboBox('id_e_edit', $this->GetLocalizerCaptions()->GetMessageString('PleaseSelect'));
            $lookupDataset = new TableDataset(
                MyPDOConnectionFactory::getInstance(),
                GetConnectionOptions(),
                '`tbl_codificacao`');
            $lookupDataset->addFields(
                array(
                    new IntegerField('idCodificacao', true, true, true),
                    new StringField('Sigla', true),
                    new StringField('Descricao'),
                    new StringField('Observacao'),
                    new StringField('Marque')
                )
            );
            $lookupDataset->setOrderByField('Marque', 'ASC');
            $editColumn = new LookUpEditColumn(
                'E', 
                'ID_E', 
                $editor, 
                $this->dataset, 'idCodificacao', 'Marque', $lookupDataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddEditColumn($editColumn);
            
            //
            // Edit column for FL_TRE field
            //
            $editor = new TextEdit('fl_tre_edit');
            $editColumn = new CustomEditColumn('FL-TRE (mm)', 'FL_TRE', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddEditColumn($editColumn);
            
            //
            // Edit column for FL_TRI field
            //
            $editor = new TextEdit('fl_tri_edit');
            $editColumn = new CustomEditColumn('FL-TRI (mm)', 'FL_TRI', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddEditColumn($editColumn);
            
            //
            // Edit column for ID_FC2 field
            //
            $editor = new TextEdit('id_fc2_edit');
            $editColumn = new CustomEditColumn('FC2 (%)', 'ID_FC2', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddEditColumn($editColumn);
            
            //
            // Edit column for ID_FC3 field
            //
            $editor = new TextEdit('id_fc3_edit');
            $editColumn = new CustomEditColumn('FC3 (%)', 'ID_FC3', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddEditColumn($editColumn);
            
            //
            // Edit column for PA field
            //
            $editor = new TextEdit('pa_edit');
            $editColumn = new CustomEditColumn('PA (%)', 'PA', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddEditColumn($editColumn);
            
            //
            // Edit column for AT_ON field
            //
            $editor = new TextEdit('at_on_edit');
            $editColumn = new CustomEditColumn('AT/ON (%)', 'AT_ON', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddEditColumn($editColumn);
            
            //
            // Edit column for dtRegistro field
            //
            $editor = new DateTimeEdit('dtregistro_edit', false, 'd-m-Y');
            $editColumn = new CustomEditColumn('Data Registro', 'dtRegistro', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddEditColumn($editColumn);
            
            //
            // Edit column for Hora field
            //
            $editor = new TextEdit('hora_edit');
            $editor->SetMaxLength(8);
            $editColumn = new CustomEditColumn('Hora', 'Hora', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddEditColumn($editColumn);
            
            //
            // Edit column for Observacoes field
            //
            $editor = new TextEdit('observacoes_edit');
            $editor->SetMaxLength(100);
            $editColumn = new CustomEditColumn('Observações', 'Observacoes', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddEditColumn($editColumn);
            
            //
            // Edit column for idInterferencia field
            //
            $editor = new DynamicCombobox('idinterferencia_edit', $this->CreateLinkBuilder());
            $editor->setAllowClear(true);
            $editor->setMinimumInputLength(0);
            $lookupDataset = new TableDataset(
                MyPDOConnectionFactory::getInstance(),
                GetConnectionOptions(),
                '`tbl_interferencias`');
            $lookupDataset->addFields(
                array(
                    new IntegerField('idInterferencia', true, true, true),
                    new StringField('tipo_interferncia')
                )
            );
            $lookupDataset->setOrderByField('tipo_interferncia', 'ASC');
            $editColumn = new DynamicLookupEditColumn('Interferência', 'idInterferencia', 'idInterferencia_tipo_interferncia', 'edit_tbl_usuarios_concessionarias_tbl_monitoramento_idInterferencia_search', $editor, $this->dataset, $lookupDataset, 'idInterferencia', 'tipo_interferncia', '');
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddEditColumn($editColumn);
            
            //
            // Edit column for id_gerenciador field
            //
            $editor = new DynamicCombobox('id_gerenciador_edit', $this->CreateLinkBuilder());
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
            $editColumn = new DynamicLookupEditColumn('Gerenciador', 'id_gerenciador', 'id_gerenciador_Nome Operador', 'edit_tbl_usuarios_concessionarias_tbl_monitoramento_id_gerenciador_search', $editor, $this->dataset, $lookupDataset, 'idUsuario', 'Nome Operador', '');
            $validator = new RequiredValidator(StringUtils::Format($this->GetLocalizerCaptions()->GetMessageString('RequiredValidationMessage'), $editColumn->GetCaption()));
            $editor->GetValidatorCollection()->AddValidator($validator);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddEditColumn($editColumn);
            
            //
            // Edit column for id_anocontratual field
            //
            $editor = new DynamicCombobox('id_anocontratual_edit', $this->CreateLinkBuilder());
            $editor->setAllowClear(true);
            $editor->setMinimumInputLength(0);
            $lookupDataset = new TableDataset(
                MyPDOConnectionFactory::getInstance(),
                GetConnectionOptions(),
                '`tbl_ano`');
            $lookupDataset->addFields(
                array(
                    new IntegerField('idtbl_ano', true, true, true),
                    new StringField('ano', true, true)
                )
            );
            $lookupDataset->setOrderByField('ano', 'ASC');
            $editColumn = new DynamicLookupEditColumn('Ano Contratual', 'id_anocontratual', 'id_anocontratual_ano', 'edit_tbl_usuarios_concessionarias_tbl_monitoramento_id_anocontratual_search', $editor, $this->dataset, $lookupDataset, 'idtbl_ano', 'ano', '');
            $validator = new RequiredValidator(StringUtils::Format($this->GetLocalizerCaptions()->GetMessageString('RequiredValidationMessage'), $editColumn->GetCaption()));
            $editor->GetValidatorCollection()->AddValidator($validator);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddEditColumn($editColumn);
            
            //
            // Edit column for marco_km field
            //
            $editor = new TextEdit('marco_km_edit');
            $editor->SetMaxLength(45);
            $editColumn = new CustomEditColumn('Marco Km', 'marco_km', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddEditColumn($editColumn);
            
            //
            // Edit column for latitude field
            //
            $editor = new TextEdit('latitude_edit');
            $editor->SetMaxLength(20);
            $editColumn = new CustomEditColumn('Latitude', 'latitude', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddEditColumn($editColumn);
            
            //
            // Edit column for longitude field
            //
            $editor = new TextEdit('longitude_edit');
            $editor->SetMaxLength(20);
            $editColumn = new CustomEditColumn('Longitude', 'longitude', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddEditColumn($editColumn);
            
            //
            // Edit column for Observacoe2 field
            //
            $editor = new TextEdit('observacoe2_edit');
            $editor->SetMaxLength(100);
            $editColumn = new CustomEditColumn('Observações', 'Observacoe2', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddEditColumn($editColumn);
            
            //
            // Edit column for revisao field
            //
            $editor = new TextEdit('revisao_edit');
            $editor->SetMaxLength(5);
            $editColumn = new CustomEditColumn('Revisão', 'revisao', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddEditColumn($editColumn);
            
            //
            // Edit column for data_lancamento field
            //
            $editor = new DateTimeEdit('data_lancamento_edit', false, 'd-m-Y');
            $editColumn = new CustomEditColumn('Data Lancamento', 'data_lancamento', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddEditColumn($editColumn);
            
            //
            // Edit column for data_alteracao field
            //
            $editor = new DateTimeEdit('data_alteracao_edit', false, 'd-m-Y');
            $editColumn = new CustomEditColumn('Data Alteracao', 'data_alteracao', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddEditColumn($editColumn);
        }
    
        protected function AddMultiEditColumns(Grid $grid)
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
            $lookupDataset->setOrderByField('Lote', 'ASC');
            $editColumn = new DynamicLookupEditColumn('Lote', 'idConcessiona', 'idConcessiona_Lote', 'multi_edit_tbl_usuarios_concessionarias_tbl_monitoramento_idConcessiona_search', $editor, $this->dataset, $lookupDataset, 'idConcessiona', 'Lote', '');
            $validator = new RequiredValidator(StringUtils::Format($this->GetLocalizerCaptions()->GetMessageString('RequiredValidationMessage'), $editColumn->GetCaption()));
            $editor->GetValidatorCollection()->AddValidator($validator);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddMultiEditColumn($editColumn);
            
            //
            // Edit column for id_rodovia field
            //
            $editor = new DynamicCombobox('id_rodovia_edit', $this->CreateLinkBuilder());
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
            $editColumn = new DynamicLookupEditColumn('Rodovia', 'id_rodovia', 'id_rodovia_RodoviaSP', 'multi_edit_tbl_usuarios_concessionarias_tbl_monitoramento_id_rodovia_search', $editor, $this->dataset, $lookupDataset, 'idRodovia', 'RodoviaSP', '');
            $validator = new RequiredValidator(StringUtils::Format($this->GetLocalizerCaptions()->GetMessageString('RequiredValidationMessage'), $editColumn->GetCaption()));
            $editor->GetValidatorCollection()->AddValidator($validator);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddMultiEditColumn($editColumn);
            
            //
            // Edit column for id_via field
            //
            $editor = new DynamicCombobox('id_via_edit', $this->CreateLinkBuilder());
            $editor->setAllowClear(true);
            $editor->setMinimumInputLength(0);
            $lookupDataset = new TableDataset(
                MyPDOConnectionFactory::getInstance(),
                GetConnectionOptions(),
                '`tbl_vias`');
            $lookupDataset->addFields(
                array(
                    new IntegerField('idVia', true, true, true),
                    new StringField('DescricaoVia'),
                    new IntegerField('Ordem')
                )
            );
            $lookupDataset->setOrderByField('DescricaoVia', 'ASC');
            $editColumn = new DynamicLookupEditColumn('Via', 'id_via', 'id_via_DescricaoVia', 'multi_edit_tbl_usuarios_concessionarias_tbl_monitoramento_id_via_search', $editor, $this->dataset, $lookupDataset, 'idVia', 'DescricaoVia', '');
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddMultiEditColumn($editColumn);
            
            //
            // Edit column for idPista field
            //
            $editor = new DynamicCombobox('idpista_edit', $this->CreateLinkBuilder());
            $editor->setAllowClear(true);
            $editor->setMinimumInputLength(0);
            $lookupDataset = new TableDataset(
                MyPDOConnectionFactory::getInstance(),
                GetConnectionOptions(),
                '`tbl_pistas`');
            $lookupDataset->addFields(
                array(
                    new IntegerField('idPista', true, true, true),
                    new StringField('DescricaoPista'),
                    new IntegerField('Ordem')
                )
            );
            $lookupDataset->setOrderByField('DescricaoPista', 'ASC');
            $editColumn = new DynamicLookupEditColumn('Pista', 'idPista', 'idPista_DescricaoPista', 'multi_edit_tbl_usuarios_concessionarias_tbl_monitoramento_idPista_search', $editor, $this->dataset, $lookupDataset, 'idPista', 'DescricaoPista', '');
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddMultiEditColumn($editColumn);
            
            //
            // Edit column for idSentidotrafego field
            //
            $editor = new DynamicCombobox('idsentidotrafego_edit', $this->CreateLinkBuilder());
            $editor->setAllowClear(true);
            $editor->setMinimumInputLength(0);
            $lookupDataset = new TableDataset(
                MyPDOConnectionFactory::getInstance(),
                GetConnectionOptions(),
                '`tbl_sentido_trafego`');
            $lookupDataset->addFields(
                array(
                    new IntegerField('idSentidotrafego', true, true, true),
                    new StringField('Sigla'),
                    new StringField('Descricao')
                )
            );
            $lookupDataset->setOrderByField('Descricao', 'ASC');
            $editColumn = new DynamicLookupEditColumn('Sentido tráfego (quilometragem)', 'idSentidotrafego', 'idSentidotrafego_Descricao', 'multi_edit_tbl_usuarios_concessionarias_tbl_monitoramento_idSentidotrafego_search', $editor, $this->dataset, $lookupDataset, 'idSentidotrafego', 'Descricao', '');
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddMultiEditColumn($editColumn);
            
            //
            // Edit column for km_referencia field
            //
            $editor = new TextEdit('km_referencia_edit');
            $editor->SetMaxLength(20);
            $editColumn = new CustomEditColumn('km de referência (caso de dispositivos)', 'km_referencia', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddMultiEditColumn($editColumn);
            
            //
            // Edit column for alca_ramo field
            //
            $editor = new TextEdit('alca_ramo_edit');
            $editor->SetMaxLength(20);
            $editColumn = new CustomEditColumn('Nomenclatura de Alça/Ramo(quando necessário)', 'alca_ramo', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddMultiEditColumn($editColumn);
            
            //
            // Edit column for idFaixa field
            //
            $editor = new DynamicCombobox('idfaixa_edit', $this->CreateLinkBuilder());
            $editor->setAllowClear(true);
            $editor->setMinimumInputLength(0);
            $lookupDataset = new TableDataset(
                MyPDOConnectionFactory::getInstance(),
                GetConnectionOptions(),
                '`tbl_faixas`');
            $lookupDataset->addFields(
                array(
                    new IntegerField('idFaixa', true, true, true),
                    new StringField('DescricaoFaixa'),
                    new IntegerField('Ordem')
                )
            );
            $lookupDataset->setOrderByField('DescricaoFaixa', 'ASC');
            $editColumn = new DynamicLookupEditColumn('Faixa', 'idFaixa', 'idFaixa_DescricaoFaixa', 'multi_edit_tbl_usuarios_concessionarias_tbl_monitoramento_idFaixa_search', $editor, $this->dataset, $lookupDataset, 'idFaixa', 'DescricaoFaixa', '');
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddMultiEditColumn($editColumn);
            
            //
            // Edit column for id_km field
            //
            $editor = new TextEdit('id_km_edit');
            $editColumn = new CustomEditColumn('km', 'id_km', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddMultiEditColumn($editColumn);
            
            //
            // Edit column for id_secao_terrap field
            //
            $editor = new DynamicCombobox('id_secao_terrap_edit', $this->CreateLinkBuilder());
            $editor->setAllowClear(true);
            $editor->setMinimumInputLength(0);
            $lookupDataset = new TableDataset(
                MyPDOConnectionFactory::getInstance(),
                GetConnectionOptions(),
                '`tbl_secao_terrapleno`');
            $lookupDataset->addFields(
                array(
                    new IntegerField('idSecao', true, true, true),
                    new StringField('DescricaoSecao'),
                    new StringField('CodSecao')
                )
            );
            $lookupDataset->setOrderByField('DescricaoSecao', 'ASC');
            $editColumn = new DynamicLookupEditColumn('Seção Terrap.', 'id_secao_terrap', 'id_secao_terrap_DescricaoSecao', 'multi_edit_tbl_usuarios_concessionarias_tbl_monitoramento_id_secao_terrap_search', $editor, $this->dataset, $lookupDataset, 'idSecao', 'DescricaoSecao', '');
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddMultiEditColumn($editColumn);
            
            //
            // Edit column for tipo_revestimento field
            //
            $editor = new DynamicCombobox('tipo_revestimento_edit', $this->CreateLinkBuilder());
            $editor->setAllowClear(true);
            $editor->setMinimumInputLength(0);
            $lookupDataset = new TableDataset(
                MyPDOConnectionFactory::getInstance(),
                GetConnectionOptions(),
                '`tbl_tipo_material`');
            $lookupDataset->addFields(
                array(
                    new IntegerField('idMaterial', true, true, true),
                    new StringField('DescricaoMaterial'),
                    new StringField('CodigoMaterial')
                )
            );
            $lookupDataset->setOrderByField('DescricaoMaterial', 'ASC');
            $editColumn = new DynamicLookupEditColumn('Tipo Revestimento', 'tipo_revestimento', 'tipo_revestimento_DescricaoMaterial', 'multi_edit_tbl_usuarios_concessionarias_tbl_monitoramento_tipo_revestimento_search', $editor, $this->dataset, $lookupDataset, 'idMaterial', 'DescricaoMaterial', '');
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddMultiEditColumn($editColumn);
            
            //
            // Edit column for Ok field
            //
            $editor = new TextEdit('ok_edit');
            $editColumn = new CustomEditColumn('Ok', 'Ok', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddMultiEditColumn($editColumn);
            
            //
            // Edit column for ID_FI field
            //
            $editor = new ComboBox('id_fi_edit', $this->GetLocalizerCaptions()->GetMessageString('PleaseSelect'));
            $lookupDataset = new TableDataset(
                MyPDOConnectionFactory::getInstance(),
                GetConnectionOptions(),
                '`tbl_codificacao`');
            $lookupDataset->addFields(
                array(
                    new IntegerField('idCodificacao', true, true, true),
                    new StringField('Sigla', true),
                    new StringField('Descricao'),
                    new StringField('Observacao'),
                    new StringField('Marque')
                )
            );
            $lookupDataset->setOrderByField('Marque', 'ASC');
            $editColumn = new LookUpEditColumn(
                'FI', 
                'ID_FI', 
                $editor, 
                $this->dataset, 'idCodificacao', 'Marque', $lookupDataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddMultiEditColumn($editColumn);
            
            //
            // Edit column for ID_TTC field
            //
            $editor = new ComboBox('id_ttc_edit', $this->GetLocalizerCaptions()->GetMessageString('PleaseSelect'));
            $lookupDataset = new TableDataset(
                MyPDOConnectionFactory::getInstance(),
                GetConnectionOptions(),
                '`tbl_codificacao`');
            $lookupDataset->addFields(
                array(
                    new IntegerField('idCodificacao', true, true, true),
                    new StringField('Sigla', true),
                    new StringField('Descricao'),
                    new StringField('Observacao'),
                    new StringField('Marque')
                )
            );
            $lookupDataset->setOrderByField('Marque', 'ASC');
            $editColumn = new LookUpEditColumn(
                'TTC', 
                'ID_TTC', 
                $editor, 
                $this->dataset, 'idCodificacao', 'Marque', $lookupDataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddMultiEditColumn($editColumn);
            
            //
            // Edit column for ID_TTL field
            //
            $editor = new ComboBox('id_ttl_edit', $this->GetLocalizerCaptions()->GetMessageString('PleaseSelect'));
            $lookupDataset = new TableDataset(
                MyPDOConnectionFactory::getInstance(),
                GetConnectionOptions(),
                '`tbl_codificacao`');
            $lookupDataset->addFields(
                array(
                    new IntegerField('idCodificacao', true, true, true),
                    new StringField('Sigla', true),
                    new StringField('Descricao'),
                    new StringField('Observacao'),
                    new StringField('Marque')
                )
            );
            $lookupDataset->setOrderByField('Marque', 'ASC');
            $editColumn = new LookUpEditColumn(
                'TTL', 
                'ID_TTL', 
                $editor, 
                $this->dataset, 'idCodificacao', 'Marque', $lookupDataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddMultiEditColumn($editColumn);
            
            //
            // Edit column for ID_TLC field
            //
            $editor = new ComboBox('id_tlc_edit', $this->GetLocalizerCaptions()->GetMessageString('PleaseSelect'));
            $lookupDataset = new TableDataset(
                MyPDOConnectionFactory::getInstance(),
                GetConnectionOptions(),
                '`tbl_codificacao`');
            $lookupDataset->addFields(
                array(
                    new IntegerField('idCodificacao', true, true, true),
                    new StringField('Sigla', true),
                    new StringField('Descricao'),
                    new StringField('Observacao'),
                    new StringField('Marque')
                )
            );
            $lookupDataset->setOrderByField('Marque', 'ASC');
            $editColumn = new LookUpEditColumn(
                'TLC', 
                'ID_TLC', 
                $editor, 
                $this->dataset, 'idCodificacao', 'Marque', $lookupDataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddMultiEditColumn($editColumn);
            
            //
            // Edit column for ID_TLL field
            //
            $editor = new ComboBox('id_tll_edit', $this->GetLocalizerCaptions()->GetMessageString('PleaseSelect'));
            $lookupDataset = new TableDataset(
                MyPDOConnectionFactory::getInstance(),
                GetConnectionOptions(),
                '`tbl_codificacao`');
            $lookupDataset->addFields(
                array(
                    new IntegerField('idCodificacao', true, true, true),
                    new StringField('Sigla', true),
                    new StringField('Descricao'),
                    new StringField('Observacao'),
                    new StringField('Marque')
                )
            );
            $lookupDataset->setOrderByField('Marque', 'ASC');
            $editColumn = new LookUpEditColumn(
                'TLL', 
                'ID_TLL', 
                $editor, 
                $this->dataset, 'idCodificacao', 'Marque', $lookupDataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddMultiEditColumn($editColumn);
            
            //
            // Edit column for ID_TRR field
            //
            $editor = new ComboBox('id_trr_edit', $this->GetLocalizerCaptions()->GetMessageString('PleaseSelect'));
            $lookupDataset = new TableDataset(
                MyPDOConnectionFactory::getInstance(),
                GetConnectionOptions(),
                '`tbl_codificacao`');
            $lookupDataset->addFields(
                array(
                    new IntegerField('idCodificacao', true, true, true),
                    new StringField('Sigla', true),
                    new StringField('Descricao'),
                    new StringField('Observacao'),
                    new StringField('Marque')
                )
            );
            $lookupDataset->setOrderByField('Marque', 'ASC');
            $editColumn = new LookUpEditColumn(
                'TRR', 
                'ID_TRR', 
                $editor, 
                $this->dataset, 'idCodificacao', 'Marque', $lookupDataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddMultiEditColumn($editColumn);
            
            //
            // Edit column for ID_J field
            //
            $editor = new ComboBox('id_j_edit', $this->GetLocalizerCaptions()->GetMessageString('PleaseSelect'));
            $lookupDataset = new TableDataset(
                MyPDOConnectionFactory::getInstance(),
                GetConnectionOptions(),
                '`tbl_codificacao`');
            $lookupDataset->addFields(
                array(
                    new IntegerField('idCodificacao', true, true, true),
                    new StringField('Sigla', true),
                    new StringField('Descricao'),
                    new StringField('Observacao'),
                    new StringField('Marque')
                )
            );
            $lookupDataset->setOrderByField('Marque', 'ASC');
            $editColumn = new LookUpEditColumn(
                'J', 
                'ID_J', 
                $editor, 
                $this->dataset, 'idCodificacao', 'Marque', $lookupDataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddMultiEditColumn($editColumn);
            
            //
            // Edit column for ID_TB field
            //
            $editor = new ComboBox('id_tb_edit', $this->GetLocalizerCaptions()->GetMessageString('PleaseSelect'));
            $lookupDataset = new TableDataset(
                MyPDOConnectionFactory::getInstance(),
                GetConnectionOptions(),
                '`tbl_codificacao`');
            $lookupDataset->addFields(
                array(
                    new IntegerField('idCodificacao', true, true, true),
                    new StringField('Sigla', true),
                    new StringField('Descricao'),
                    new StringField('Observacao'),
                    new StringField('Marque')
                )
            );
            $lookupDataset->setOrderByField('Marque', 'ASC');
            $editColumn = new LookUpEditColumn(
                'TB', 
                'ID_TB', 
                $editor, 
                $this->dataset, 'idCodificacao', 'Marque', $lookupDataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddMultiEditColumn($editColumn);
            
            //
            // Edit column for ID_JE field
            //
            $editor = new ComboBox('id_je_edit', $this->GetLocalizerCaptions()->GetMessageString('PleaseSelect'));
            $lookupDataset = new TableDataset(
                MyPDOConnectionFactory::getInstance(),
                GetConnectionOptions(),
                '`tbl_codificacao`');
            $lookupDataset->addFields(
                array(
                    new IntegerField('idCodificacao', true, true, true),
                    new StringField('Sigla', true),
                    new StringField('Descricao'),
                    new StringField('Observacao'),
                    new StringField('Marque')
                )
            );
            $lookupDataset->setOrderByField('Marque', 'ASC');
            $editColumn = new LookUpEditColumn(
                'JE', 
                'ID_JE', 
                $editor, 
                $this->dataset, 'idCodificacao', 'Marque', $lookupDataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddMultiEditColumn($editColumn);
            
            //
            // Edit column for ID_TBE field
            //
            $editor = new ComboBox('id_tbe_edit', $this->GetLocalizerCaptions()->GetMessageString('PleaseSelect'));
            $lookupDataset = new TableDataset(
                MyPDOConnectionFactory::getInstance(),
                GetConnectionOptions(),
                '`tbl_codificacao`');
            $lookupDataset->addFields(
                array(
                    new IntegerField('idCodificacao', true, true, true),
                    new StringField('Sigla', true),
                    new StringField('Descricao'),
                    new StringField('Observacao'),
                    new StringField('Marque')
                )
            );
            $lookupDataset->setOrderByField('Marque', 'ASC');
            $editColumn = new LookUpEditColumn(
                'TBE', 
                'ID_TBE', 
                $editor, 
                $this->dataset, 'idCodificacao', 'Marque', $lookupDataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddMultiEditColumn($editColumn);
            
            //
            // Edit column for ID_ALP field
            //
            $editor = new ComboBox('id_alp_edit', $this->GetLocalizerCaptions()->GetMessageString('PleaseSelect'));
            $lookupDataset = new TableDataset(
                MyPDOConnectionFactory::getInstance(),
                GetConnectionOptions(),
                '`tbl_codificacao`');
            $lookupDataset->addFields(
                array(
                    new IntegerField('idCodificacao', true, true, true),
                    new StringField('Sigla', true),
                    new StringField('Descricao'),
                    new StringField('Observacao'),
                    new StringField('Marque')
                )
            );
            $lookupDataset->setOrderByField('Marque', 'ASC');
            $editColumn = new LookUpEditColumn(
                'ALP', 
                'ID_ALP', 
                $editor, 
                $this->dataset, 'idCodificacao', 'Marque', $lookupDataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddMultiEditColumn($editColumn);
            
            //
            // Edit column for ID_ATP field
            //
            $editor = new ComboBox('id_atp_edit', $this->GetLocalizerCaptions()->GetMessageString('PleaseSelect'));
            $lookupDataset = new TableDataset(
                MyPDOConnectionFactory::getInstance(),
                GetConnectionOptions(),
                '`tbl_codificacao`');
            $lookupDataset->addFields(
                array(
                    new IntegerField('idCodificacao', true, true, true),
                    new StringField('Sigla', true),
                    new StringField('Descricao'),
                    new StringField('Observacao'),
                    new StringField('Marque')
                )
            );
            $lookupDataset->setOrderByField('Marque', 'ASC');
            $editColumn = new LookUpEditColumn(
                'ATP', 
                'ID_ATP', 
                $editor, 
                $this->dataset, 'idCodificacao', 'Marque', $lookupDataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddMultiEditColumn($editColumn);
            
            //
            // Edit column for ID_O field
            //
            $editor = new ComboBox('id_o_edit', $this->GetLocalizerCaptions()->GetMessageString('PleaseSelect'));
            $lookupDataset = new TableDataset(
                MyPDOConnectionFactory::getInstance(),
                GetConnectionOptions(),
                '`tbl_codificacao`');
            $lookupDataset->addFields(
                array(
                    new IntegerField('idCodificacao', true, true, true),
                    new StringField('Sigla', true),
                    new StringField('Descricao'),
                    new StringField('Observacao'),
                    new StringField('Marque')
                )
            );
            $lookupDataset->setOrderByField('Marque', 'ASC');
            $editColumn = new LookUpEditColumn(
                'O', 
                'ID_O', 
                $editor, 
                $this->dataset, 'idCodificacao', 'Marque', $lookupDataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddMultiEditColumn($editColumn);
            
            //
            // Edit column for ID_P field
            //
            $editor = new ComboBox('id_p_edit', $this->GetLocalizerCaptions()->GetMessageString('PleaseSelect'));
            $lookupDataset = new TableDataset(
                MyPDOConnectionFactory::getInstance(),
                GetConnectionOptions(),
                '`tbl_codificacao`');
            $lookupDataset->addFields(
                array(
                    new IntegerField('idCodificacao', true, true, true),
                    new StringField('Sigla', true),
                    new StringField('Descricao'),
                    new StringField('Observacao'),
                    new StringField('Marque')
                )
            );
            $lookupDataset->setOrderByField('Marque', 'ASC');
            $editColumn = new LookUpEditColumn(
                'P', 
                'ID_P', 
                $editor, 
                $this->dataset, 'idCodificacao', 'Marque', $lookupDataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddMultiEditColumn($editColumn);
            
            //
            // Edit column for ID_EX field
            //
            $editor = new ComboBox('id_ex_edit', $this->GetLocalizerCaptions()->GetMessageString('PleaseSelect'));
            $lookupDataset = new TableDataset(
                MyPDOConnectionFactory::getInstance(),
                GetConnectionOptions(),
                '`tbl_codificacao`');
            $lookupDataset->addFields(
                array(
                    new IntegerField('idCodificacao', true, true, true),
                    new StringField('Sigla', true),
                    new StringField('Descricao'),
                    new StringField('Observacao'),
                    new StringField('Marque')
                )
            );
            $lookupDataset->setOrderByField('Marque', 'ASC');
            $editColumn = new LookUpEditColumn(
                'EX', 
                'ID_EX', 
                $editor, 
                $this->dataset, 'idCodificacao', 'Marque', $lookupDataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddMultiEditColumn($editColumn);
            
            //
            // Edit column for ID_D field
            //
            $editor = new ComboBox('id_d_edit', $this->GetLocalizerCaptions()->GetMessageString('PleaseSelect'));
            $lookupDataset = new TableDataset(
                MyPDOConnectionFactory::getInstance(),
                GetConnectionOptions(),
                '`tbl_codificacao`');
            $lookupDataset->addFields(
                array(
                    new IntegerField('idCodificacao', true, true, true),
                    new StringField('Sigla', true),
                    new StringField('Descricao'),
                    new StringField('Observacao'),
                    new StringField('Marque')
                )
            );
            $lookupDataset->setOrderByField('Marque', 'ASC');
            $editColumn = new LookUpEditColumn(
                'D', 
                'ID_D', 
                $editor, 
                $this->dataset, 'idCodificacao', 'Marque', $lookupDataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddMultiEditColumn($editColumn);
            
            //
            // Edit column for ID_R field
            //
            $editor = new ComboBox('id_r_edit', $this->GetLocalizerCaptions()->GetMessageString('PleaseSelect'));
            $lookupDataset = new TableDataset(
                MyPDOConnectionFactory::getInstance(),
                GetConnectionOptions(),
                '`tbl_codificacao`');
            $lookupDataset->addFields(
                array(
                    new IntegerField('idCodificacao', true, true, true),
                    new StringField('Sigla', true),
                    new StringField('Descricao'),
                    new StringField('Observacao'),
                    new StringField('Marque')
                )
            );
            $lookupDataset->setOrderByField('Marque', 'ASC');
            $editColumn = new LookUpEditColumn(
                'R', 
                'ID_R', 
                $editor, 
                $this->dataset, 'idCodificacao', 'Marque', $lookupDataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddMultiEditColumn($editColumn);
            
            //
            // Edit column for ID_ALC field
            //
            $editor = new ComboBox('id_alc_edit', $this->GetLocalizerCaptions()->GetMessageString('PleaseSelect'));
            $lookupDataset = new TableDataset(
                MyPDOConnectionFactory::getInstance(),
                GetConnectionOptions(),
                '`tbl_codificacao`');
            $lookupDataset->addFields(
                array(
                    new IntegerField('idCodificacao', true, true, true),
                    new StringField('Sigla', true),
                    new StringField('Descricao'),
                    new StringField('Observacao'),
                    new StringField('Marque')
                )
            );
            $lookupDataset->setOrderByField('Marque', 'ASC');
            $editColumn = new LookUpEditColumn(
                'ALC', 
                'ID_ALC', 
                $editor, 
                $this->dataset, 'idCodificacao', 'Marque', $lookupDataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddMultiEditColumn($editColumn);
            
            //
            // Edit column for ID_ATC field
            //
            $editor = new ComboBox('id_atc_edit', $this->GetLocalizerCaptions()->GetMessageString('PleaseSelect'));
            $lookupDataset = new TableDataset(
                MyPDOConnectionFactory::getInstance(),
                GetConnectionOptions(),
                '`tbl_codificacao`');
            $lookupDataset->addFields(
                array(
                    new IntegerField('idCodificacao', true, true, true),
                    new StringField('Sigla', true),
                    new StringField('Descricao'),
                    new StringField('Observacao'),
                    new StringField('Marque')
                )
            );
            $lookupDataset->setOrderByField('Marque', 'ASC');
            $editColumn = new LookUpEditColumn(
                'ATC', 
                'ID_ATC', 
                $editor, 
                $this->dataset, 'idCodificacao', 'Marque', $lookupDataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddMultiEditColumn($editColumn);
            
            //
            // Edit column for ID_E field
            //
            $editor = new ComboBox('id_e_edit', $this->GetLocalizerCaptions()->GetMessageString('PleaseSelect'));
            $lookupDataset = new TableDataset(
                MyPDOConnectionFactory::getInstance(),
                GetConnectionOptions(),
                '`tbl_codificacao`');
            $lookupDataset->addFields(
                array(
                    new IntegerField('idCodificacao', true, true, true),
                    new StringField('Sigla', true),
                    new StringField('Descricao'),
                    new StringField('Observacao'),
                    new StringField('Marque')
                )
            );
            $lookupDataset->setOrderByField('Marque', 'ASC');
            $editColumn = new LookUpEditColumn(
                'E', 
                'ID_E', 
                $editor, 
                $this->dataset, 'idCodificacao', 'Marque', $lookupDataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddMultiEditColumn($editColumn);
            
            //
            // Edit column for FL_TRE field
            //
            $editor = new TextEdit('fl_tre_edit');
            $editColumn = new CustomEditColumn('FL-TRE (mm)', 'FL_TRE', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddMultiEditColumn($editColumn);
            
            //
            // Edit column for FL_TRI field
            //
            $editor = new TextEdit('fl_tri_edit');
            $editColumn = new CustomEditColumn('FL-TRI (mm)', 'FL_TRI', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddMultiEditColumn($editColumn);
            
            //
            // Edit column for ID_FC2 field
            //
            $editor = new TextEdit('id_fc2_edit');
            $editColumn = new CustomEditColumn('FC2 (%)', 'ID_FC2', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddMultiEditColumn($editColumn);
            
            //
            // Edit column for ID_FC3 field
            //
            $editor = new TextEdit('id_fc3_edit');
            $editColumn = new CustomEditColumn('FC3 (%)', 'ID_FC3', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddMultiEditColumn($editColumn);
            
            //
            // Edit column for PA field
            //
            $editor = new TextEdit('pa_edit');
            $editColumn = new CustomEditColumn('PA (%)', 'PA', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddMultiEditColumn($editColumn);
            
            //
            // Edit column for AT_ON field
            //
            $editor = new TextEdit('at_on_edit');
            $editColumn = new CustomEditColumn('AT/ON (%)', 'AT_ON', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddMultiEditColumn($editColumn);
            
            //
            // Edit column for dtRegistro field
            //
            $editor = new DateTimeEdit('dtregistro_edit', false, 'd-m-Y');
            $editColumn = new CustomEditColumn('Data Registro', 'dtRegistro', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddMultiEditColumn($editColumn);
            
            //
            // Edit column for Hora field
            //
            $editor = new TextEdit('hora_edit');
            $editor->SetMaxLength(8);
            $editColumn = new CustomEditColumn('Hora', 'Hora', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddMultiEditColumn($editColumn);
            
            //
            // Edit column for Observacoes field
            //
            $editor = new TextEdit('observacoes_edit');
            $editor->SetMaxLength(100);
            $editColumn = new CustomEditColumn('Observações', 'Observacoes', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddMultiEditColumn($editColumn);
            
            //
            // Edit column for idInterferencia field
            //
            $editor = new DynamicCombobox('idinterferencia_edit', $this->CreateLinkBuilder());
            $editor->setAllowClear(true);
            $editor->setMinimumInputLength(0);
            $lookupDataset = new TableDataset(
                MyPDOConnectionFactory::getInstance(),
                GetConnectionOptions(),
                '`tbl_interferencias`');
            $lookupDataset->addFields(
                array(
                    new IntegerField('idInterferencia', true, true, true),
                    new StringField('tipo_interferncia')
                )
            );
            $lookupDataset->setOrderByField('tipo_interferncia', 'ASC');
            $editColumn = new DynamicLookupEditColumn('Interferência', 'idInterferencia', 'idInterferencia_tipo_interferncia', 'multi_edit_tbl_usuarios_concessionarias_tbl_monitoramento_idInterferencia_search', $editor, $this->dataset, $lookupDataset, 'idInterferencia', 'tipo_interferncia', '');
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddMultiEditColumn($editColumn);
            
            //
            // Edit column for id_gerenciador field
            //
            $editor = new DynamicCombobox('id_gerenciador_edit', $this->CreateLinkBuilder());
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
            $editColumn = new DynamicLookupEditColumn('Gerenciador', 'id_gerenciador', 'id_gerenciador_Nome Operador', 'multi_edit_tbl_usuarios_concessionarias_tbl_monitoramento_id_gerenciador_search', $editor, $this->dataset, $lookupDataset, 'idUsuario', 'Nome Operador', '');
            $validator = new RequiredValidator(StringUtils::Format($this->GetLocalizerCaptions()->GetMessageString('RequiredValidationMessage'), $editColumn->GetCaption()));
            $editor->GetValidatorCollection()->AddValidator($validator);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddMultiEditColumn($editColumn);
            
            //
            // Edit column for id_anocontratual field
            //
            $editor = new DynamicCombobox('id_anocontratual_edit', $this->CreateLinkBuilder());
            $editor->setAllowClear(true);
            $editor->setMinimumInputLength(0);
            $lookupDataset = new TableDataset(
                MyPDOConnectionFactory::getInstance(),
                GetConnectionOptions(),
                '`tbl_ano`');
            $lookupDataset->addFields(
                array(
                    new IntegerField('idtbl_ano', true, true, true),
                    new StringField('ano', true, true)
                )
            );
            $lookupDataset->setOrderByField('ano', 'ASC');
            $editColumn = new DynamicLookupEditColumn('Ano Contratual', 'id_anocontratual', 'id_anocontratual_ano', 'multi_edit_tbl_usuarios_concessionarias_tbl_monitoramento_id_anocontratual_search', $editor, $this->dataset, $lookupDataset, 'idtbl_ano', 'ano', '');
            $validator = new RequiredValidator(StringUtils::Format($this->GetLocalizerCaptions()->GetMessageString('RequiredValidationMessage'), $editColumn->GetCaption()));
            $editor->GetValidatorCollection()->AddValidator($validator);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddMultiEditColumn($editColumn);
            
            //
            // Edit column for marco_km field
            //
            $editor = new TextEdit('marco_km_edit');
            $editor->SetMaxLength(45);
            $editColumn = new CustomEditColumn('Marco Km', 'marco_km', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddMultiEditColumn($editColumn);
            
            //
            // Edit column for latitude field
            //
            $editor = new TextEdit('latitude_edit');
            $editor->SetMaxLength(20);
            $editColumn = new CustomEditColumn('Latitude', 'latitude', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddMultiEditColumn($editColumn);
            
            //
            // Edit column for longitude field
            //
            $editor = new TextEdit('longitude_edit');
            $editor->SetMaxLength(20);
            $editColumn = new CustomEditColumn('Longitude', 'longitude', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddMultiEditColumn($editColumn);
            
            //
            // Edit column for Observacoe2 field
            //
            $editor = new TextEdit('observacoe2_edit');
            $editor->SetMaxLength(100);
            $editColumn = new CustomEditColumn('Observações', 'Observacoe2', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddMultiEditColumn($editColumn);
            
            //
            // Edit column for revisao field
            //
            $editor = new TextEdit('revisao_edit');
            $editor->SetMaxLength(5);
            $editColumn = new CustomEditColumn('Revisão', 'revisao', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddMultiEditColumn($editColumn);
            
            //
            // Edit column for data_lancamento field
            //
            $editor = new DateTimeEdit('data_lancamento_edit', false, 'd-m-Y');
            $editColumn = new CustomEditColumn('Data Lancamento', 'data_lancamento', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddMultiEditColumn($editColumn);
            
            //
            // Edit column for data_alteracao field
            //
            $editor = new DateTimeEdit('data_alteracao_edit', false, 'd-m-Y');
            $editColumn = new CustomEditColumn('Data Alteracao', 'data_alteracao', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddMultiEditColumn($editColumn);
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
            $lookupDataset->setOrderByField('Lote', 'ASC');
            $editColumn = new DynamicLookupEditColumn('Lote', 'idConcessiona', 'idConcessiona_Lote', 'insert_tbl_usuarios_concessionarias_tbl_monitoramento_idConcessiona_search', $editor, $this->dataset, $lookupDataset, 'idConcessiona', 'Lote', '');
            $validator = new RequiredValidator(StringUtils::Format($this->GetLocalizerCaptions()->GetMessageString('RequiredValidationMessage'), $editColumn->GetCaption()));
            $editor->GetValidatorCollection()->AddValidator($validator);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddInsertColumn($editColumn);
            
            //
            // Edit column for id_rodovia field
            //
            $editor = new DynamicCombobox('id_rodovia_edit', $this->CreateLinkBuilder());
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
            $editColumn = new DynamicLookupEditColumn('Rodovia', 'id_rodovia', 'id_rodovia_RodoviaSP', 'insert_tbl_usuarios_concessionarias_tbl_monitoramento_id_rodovia_search', $editor, $this->dataset, $lookupDataset, 'idRodovia', 'RodoviaSP', '');
            $validator = new RequiredValidator(StringUtils::Format($this->GetLocalizerCaptions()->GetMessageString('RequiredValidationMessage'), $editColumn->GetCaption()));
            $editor->GetValidatorCollection()->AddValidator($validator);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddInsertColumn($editColumn);
            
            //
            // Edit column for id_via field
            //
            $editor = new DynamicCombobox('id_via_edit', $this->CreateLinkBuilder());
            $editor->setAllowClear(true);
            $editor->setMinimumInputLength(0);
            $lookupDataset = new TableDataset(
                MyPDOConnectionFactory::getInstance(),
                GetConnectionOptions(),
                '`tbl_vias`');
            $lookupDataset->addFields(
                array(
                    new IntegerField('idVia', true, true, true),
                    new StringField('DescricaoVia'),
                    new IntegerField('Ordem')
                )
            );
            $lookupDataset->setOrderByField('DescricaoVia', 'ASC');
            $editColumn = new DynamicLookupEditColumn('Via', 'id_via', 'id_via_DescricaoVia', 'insert_tbl_usuarios_concessionarias_tbl_monitoramento_id_via_search', $editor, $this->dataset, $lookupDataset, 'idVia', 'DescricaoVia', '');
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddInsertColumn($editColumn);
            
            //
            // Edit column for idPista field
            //
            $editor = new DynamicCombobox('idpista_edit', $this->CreateLinkBuilder());
            $editor->setAllowClear(true);
            $editor->setMinimumInputLength(0);
            $lookupDataset = new TableDataset(
                MyPDOConnectionFactory::getInstance(),
                GetConnectionOptions(),
                '`tbl_pistas`');
            $lookupDataset->addFields(
                array(
                    new IntegerField('idPista', true, true, true),
                    new StringField('DescricaoPista'),
                    new IntegerField('Ordem')
                )
            );
            $lookupDataset->setOrderByField('DescricaoPista', 'ASC');
            $editColumn = new DynamicLookupEditColumn('Pista', 'idPista', 'idPista_DescricaoPista', 'insert_tbl_usuarios_concessionarias_tbl_monitoramento_idPista_search', $editor, $this->dataset, $lookupDataset, 'idPista', 'DescricaoPista', '');
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddInsertColumn($editColumn);
            
            //
            // Edit column for idSentidotrafego field
            //
            $editor = new DynamicCombobox('idsentidotrafego_edit', $this->CreateLinkBuilder());
            $editor->setAllowClear(true);
            $editor->setMinimumInputLength(0);
            $lookupDataset = new TableDataset(
                MyPDOConnectionFactory::getInstance(),
                GetConnectionOptions(),
                '`tbl_sentido_trafego`');
            $lookupDataset->addFields(
                array(
                    new IntegerField('idSentidotrafego', true, true, true),
                    new StringField('Sigla'),
                    new StringField('Descricao')
                )
            );
            $lookupDataset->setOrderByField('Descricao', 'ASC');
            $editColumn = new DynamicLookupEditColumn('Sentido tráfego (quilometragem)', 'idSentidotrafego', 'idSentidotrafego_Descricao', 'insert_tbl_usuarios_concessionarias_tbl_monitoramento_idSentidotrafego_search', $editor, $this->dataset, $lookupDataset, 'idSentidotrafego', 'Descricao', '');
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddInsertColumn($editColumn);
            
            //
            // Edit column for km_referencia field
            //
            $editor = new TextEdit('km_referencia_edit');
            $editor->SetMaxLength(20);
            $editColumn = new CustomEditColumn('km de referência (caso de dispositivos)', 'km_referencia', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddInsertColumn($editColumn);
            
            //
            // Edit column for alca_ramo field
            //
            $editor = new TextEdit('alca_ramo_edit');
            $editor->SetMaxLength(20);
            $editColumn = new CustomEditColumn('Nomenclatura de Alça/Ramo(quando necessário)', 'alca_ramo', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddInsertColumn($editColumn);
            
            //
            // Edit column for idFaixa field
            //
            $editor = new DynamicCombobox('idfaixa_edit', $this->CreateLinkBuilder());
            $editor->setAllowClear(true);
            $editor->setMinimumInputLength(0);
            $lookupDataset = new TableDataset(
                MyPDOConnectionFactory::getInstance(),
                GetConnectionOptions(),
                '`tbl_faixas`');
            $lookupDataset->addFields(
                array(
                    new IntegerField('idFaixa', true, true, true),
                    new StringField('DescricaoFaixa'),
                    new IntegerField('Ordem')
                )
            );
            $lookupDataset->setOrderByField('DescricaoFaixa', 'ASC');
            $editColumn = new DynamicLookupEditColumn('Faixa', 'idFaixa', 'idFaixa_DescricaoFaixa', 'insert_tbl_usuarios_concessionarias_tbl_monitoramento_idFaixa_search', $editor, $this->dataset, $lookupDataset, 'idFaixa', 'DescricaoFaixa', '');
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddInsertColumn($editColumn);
            
            //
            // Edit column for id_km field
            //
            $editor = new TextEdit('id_km_edit');
            $editColumn = new CustomEditColumn('km', 'id_km', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddInsertColumn($editColumn);
            
            //
            // Edit column for id_secao_terrap field
            //
            $editor = new DynamicCombobox('id_secao_terrap_edit', $this->CreateLinkBuilder());
            $editor->setAllowClear(true);
            $editor->setMinimumInputLength(0);
            $lookupDataset = new TableDataset(
                MyPDOConnectionFactory::getInstance(),
                GetConnectionOptions(),
                '`tbl_secao_terrapleno`');
            $lookupDataset->addFields(
                array(
                    new IntegerField('idSecao', true, true, true),
                    new StringField('DescricaoSecao'),
                    new StringField('CodSecao')
                )
            );
            $lookupDataset->setOrderByField('DescricaoSecao', 'ASC');
            $editColumn = new DynamicLookupEditColumn('Seção Terrap.', 'id_secao_terrap', 'id_secao_terrap_DescricaoSecao', 'insert_tbl_usuarios_concessionarias_tbl_monitoramento_id_secao_terrap_search', $editor, $this->dataset, $lookupDataset, 'idSecao', 'DescricaoSecao', '');
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddInsertColumn($editColumn);
            
            //
            // Edit column for tipo_revestimento field
            //
            $editor = new DynamicCombobox('tipo_revestimento_edit', $this->CreateLinkBuilder());
            $editor->setAllowClear(true);
            $editor->setMinimumInputLength(0);
            $lookupDataset = new TableDataset(
                MyPDOConnectionFactory::getInstance(),
                GetConnectionOptions(),
                '`tbl_tipo_material`');
            $lookupDataset->addFields(
                array(
                    new IntegerField('idMaterial', true, true, true),
                    new StringField('DescricaoMaterial'),
                    new StringField('CodigoMaterial')
                )
            );
            $lookupDataset->setOrderByField('DescricaoMaterial', 'ASC');
            $editColumn = new DynamicLookupEditColumn('Tipo Revestimento', 'tipo_revestimento', 'tipo_revestimento_DescricaoMaterial', 'insert_tbl_usuarios_concessionarias_tbl_monitoramento_tipo_revestimento_search', $editor, $this->dataset, $lookupDataset, 'idMaterial', 'DescricaoMaterial', '');
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddInsertColumn($editColumn);
            
            //
            // Edit column for Ok field
            //
            $editor = new TextEdit('ok_edit');
            $editColumn = new CustomEditColumn('Ok', 'Ok', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddInsertColumn($editColumn);
            
            //
            // Edit column for ID_FI field
            //
            $editor = new ComboBox('id_fi_edit', $this->GetLocalizerCaptions()->GetMessageString('PleaseSelect'));
            $lookupDataset = new TableDataset(
                MyPDOConnectionFactory::getInstance(),
                GetConnectionOptions(),
                '`tbl_codificacao`');
            $lookupDataset->addFields(
                array(
                    new IntegerField('idCodificacao', true, true, true),
                    new StringField('Sigla', true),
                    new StringField('Descricao'),
                    new StringField('Observacao'),
                    new StringField('Marque')
                )
            );
            $lookupDataset->setOrderByField('Marque', 'ASC');
            $editColumn = new LookUpEditColumn(
                'FI', 
                'ID_FI', 
                $editor, 
                $this->dataset, 'idCodificacao', 'Marque', $lookupDataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddInsertColumn($editColumn);
            
            //
            // Edit column for ID_TTC field
            //
            $editor = new ComboBox('id_ttc_edit', $this->GetLocalizerCaptions()->GetMessageString('PleaseSelect'));
            $lookupDataset = new TableDataset(
                MyPDOConnectionFactory::getInstance(),
                GetConnectionOptions(),
                '`tbl_codificacao`');
            $lookupDataset->addFields(
                array(
                    new IntegerField('idCodificacao', true, true, true),
                    new StringField('Sigla', true),
                    new StringField('Descricao'),
                    new StringField('Observacao'),
                    new StringField('Marque')
                )
            );
            $lookupDataset->setOrderByField('Marque', 'ASC');
            $editColumn = new LookUpEditColumn(
                'TTC', 
                'ID_TTC', 
                $editor, 
                $this->dataset, 'idCodificacao', 'Marque', $lookupDataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddInsertColumn($editColumn);
            
            //
            // Edit column for ID_TTL field
            //
            $editor = new ComboBox('id_ttl_edit', $this->GetLocalizerCaptions()->GetMessageString('PleaseSelect'));
            $lookupDataset = new TableDataset(
                MyPDOConnectionFactory::getInstance(),
                GetConnectionOptions(),
                '`tbl_codificacao`');
            $lookupDataset->addFields(
                array(
                    new IntegerField('idCodificacao', true, true, true),
                    new StringField('Sigla', true),
                    new StringField('Descricao'),
                    new StringField('Observacao'),
                    new StringField('Marque')
                )
            );
            $lookupDataset->setOrderByField('Marque', 'ASC');
            $editColumn = new LookUpEditColumn(
                'TTL', 
                'ID_TTL', 
                $editor, 
                $this->dataset, 'idCodificacao', 'Marque', $lookupDataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddInsertColumn($editColumn);
            
            //
            // Edit column for ID_TLC field
            //
            $editor = new ComboBox('id_tlc_edit', $this->GetLocalizerCaptions()->GetMessageString('PleaseSelect'));
            $lookupDataset = new TableDataset(
                MyPDOConnectionFactory::getInstance(),
                GetConnectionOptions(),
                '`tbl_codificacao`');
            $lookupDataset->addFields(
                array(
                    new IntegerField('idCodificacao', true, true, true),
                    new StringField('Sigla', true),
                    new StringField('Descricao'),
                    new StringField('Observacao'),
                    new StringField('Marque')
                )
            );
            $lookupDataset->setOrderByField('Marque', 'ASC');
            $editColumn = new LookUpEditColumn(
                'TLC', 
                'ID_TLC', 
                $editor, 
                $this->dataset, 'idCodificacao', 'Marque', $lookupDataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddInsertColumn($editColumn);
            
            //
            // Edit column for ID_TLL field
            //
            $editor = new ComboBox('id_tll_edit', $this->GetLocalizerCaptions()->GetMessageString('PleaseSelect'));
            $lookupDataset = new TableDataset(
                MyPDOConnectionFactory::getInstance(),
                GetConnectionOptions(),
                '`tbl_codificacao`');
            $lookupDataset->addFields(
                array(
                    new IntegerField('idCodificacao', true, true, true),
                    new StringField('Sigla', true),
                    new StringField('Descricao'),
                    new StringField('Observacao'),
                    new StringField('Marque')
                )
            );
            $lookupDataset->setOrderByField('Marque', 'ASC');
            $editColumn = new LookUpEditColumn(
                'TLL', 
                'ID_TLL', 
                $editor, 
                $this->dataset, 'idCodificacao', 'Marque', $lookupDataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddInsertColumn($editColumn);
            
            //
            // Edit column for ID_TRR field
            //
            $editor = new ComboBox('id_trr_edit', $this->GetLocalizerCaptions()->GetMessageString('PleaseSelect'));
            $lookupDataset = new TableDataset(
                MyPDOConnectionFactory::getInstance(),
                GetConnectionOptions(),
                '`tbl_codificacao`');
            $lookupDataset->addFields(
                array(
                    new IntegerField('idCodificacao', true, true, true),
                    new StringField('Sigla', true),
                    new StringField('Descricao'),
                    new StringField('Observacao'),
                    new StringField('Marque')
                )
            );
            $lookupDataset->setOrderByField('Marque', 'ASC');
            $editColumn = new LookUpEditColumn(
                'TRR', 
                'ID_TRR', 
                $editor, 
                $this->dataset, 'idCodificacao', 'Marque', $lookupDataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddInsertColumn($editColumn);
            
            //
            // Edit column for ID_J field
            //
            $editor = new ComboBox('id_j_edit', $this->GetLocalizerCaptions()->GetMessageString('PleaseSelect'));
            $lookupDataset = new TableDataset(
                MyPDOConnectionFactory::getInstance(),
                GetConnectionOptions(),
                '`tbl_codificacao`');
            $lookupDataset->addFields(
                array(
                    new IntegerField('idCodificacao', true, true, true),
                    new StringField('Sigla', true),
                    new StringField('Descricao'),
                    new StringField('Observacao'),
                    new StringField('Marque')
                )
            );
            $lookupDataset->setOrderByField('Marque', 'ASC');
            $editColumn = new LookUpEditColumn(
                'J', 
                'ID_J', 
                $editor, 
                $this->dataset, 'idCodificacao', 'Marque', $lookupDataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddInsertColumn($editColumn);
            
            //
            // Edit column for ID_TB field
            //
            $editor = new ComboBox('id_tb_edit', $this->GetLocalizerCaptions()->GetMessageString('PleaseSelect'));
            $lookupDataset = new TableDataset(
                MyPDOConnectionFactory::getInstance(),
                GetConnectionOptions(),
                '`tbl_codificacao`');
            $lookupDataset->addFields(
                array(
                    new IntegerField('idCodificacao', true, true, true),
                    new StringField('Sigla', true),
                    new StringField('Descricao'),
                    new StringField('Observacao'),
                    new StringField('Marque')
                )
            );
            $lookupDataset->setOrderByField('Marque', 'ASC');
            $editColumn = new LookUpEditColumn(
                'TB', 
                'ID_TB', 
                $editor, 
                $this->dataset, 'idCodificacao', 'Marque', $lookupDataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddInsertColumn($editColumn);
            
            //
            // Edit column for ID_JE field
            //
            $editor = new ComboBox('id_je_edit', $this->GetLocalizerCaptions()->GetMessageString('PleaseSelect'));
            $lookupDataset = new TableDataset(
                MyPDOConnectionFactory::getInstance(),
                GetConnectionOptions(),
                '`tbl_codificacao`');
            $lookupDataset->addFields(
                array(
                    new IntegerField('idCodificacao', true, true, true),
                    new StringField('Sigla', true),
                    new StringField('Descricao'),
                    new StringField('Observacao'),
                    new StringField('Marque')
                )
            );
            $lookupDataset->setOrderByField('Marque', 'ASC');
            $editColumn = new LookUpEditColumn(
                'JE', 
                'ID_JE', 
                $editor, 
                $this->dataset, 'idCodificacao', 'Marque', $lookupDataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddInsertColumn($editColumn);
            
            //
            // Edit column for ID_TBE field
            //
            $editor = new ComboBox('id_tbe_edit', $this->GetLocalizerCaptions()->GetMessageString('PleaseSelect'));
            $lookupDataset = new TableDataset(
                MyPDOConnectionFactory::getInstance(),
                GetConnectionOptions(),
                '`tbl_codificacao`');
            $lookupDataset->addFields(
                array(
                    new IntegerField('idCodificacao', true, true, true),
                    new StringField('Sigla', true),
                    new StringField('Descricao'),
                    new StringField('Observacao'),
                    new StringField('Marque')
                )
            );
            $lookupDataset->setOrderByField('Marque', 'ASC');
            $editColumn = new LookUpEditColumn(
                'TBE', 
                'ID_TBE', 
                $editor, 
                $this->dataset, 'idCodificacao', 'Marque', $lookupDataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddInsertColumn($editColumn);
            
            //
            // Edit column for ID_ALP field
            //
            $editor = new ComboBox('id_alp_edit', $this->GetLocalizerCaptions()->GetMessageString('PleaseSelect'));
            $lookupDataset = new TableDataset(
                MyPDOConnectionFactory::getInstance(),
                GetConnectionOptions(),
                '`tbl_codificacao`');
            $lookupDataset->addFields(
                array(
                    new IntegerField('idCodificacao', true, true, true),
                    new StringField('Sigla', true),
                    new StringField('Descricao'),
                    new StringField('Observacao'),
                    new StringField('Marque')
                )
            );
            $lookupDataset->setOrderByField('Marque', 'ASC');
            $editColumn = new LookUpEditColumn(
                'ALP', 
                'ID_ALP', 
                $editor, 
                $this->dataset, 'idCodificacao', 'Marque', $lookupDataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddInsertColumn($editColumn);
            
            //
            // Edit column for ID_ATP field
            //
            $editor = new ComboBox('id_atp_edit', $this->GetLocalizerCaptions()->GetMessageString('PleaseSelect'));
            $lookupDataset = new TableDataset(
                MyPDOConnectionFactory::getInstance(),
                GetConnectionOptions(),
                '`tbl_codificacao`');
            $lookupDataset->addFields(
                array(
                    new IntegerField('idCodificacao', true, true, true),
                    new StringField('Sigla', true),
                    new StringField('Descricao'),
                    new StringField('Observacao'),
                    new StringField('Marque')
                )
            );
            $lookupDataset->setOrderByField('Marque', 'ASC');
            $editColumn = new LookUpEditColumn(
                'ATP', 
                'ID_ATP', 
                $editor, 
                $this->dataset, 'idCodificacao', 'Marque', $lookupDataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddInsertColumn($editColumn);
            
            //
            // Edit column for ID_O field
            //
            $editor = new ComboBox('id_o_edit', $this->GetLocalizerCaptions()->GetMessageString('PleaseSelect'));
            $lookupDataset = new TableDataset(
                MyPDOConnectionFactory::getInstance(),
                GetConnectionOptions(),
                '`tbl_codificacao`');
            $lookupDataset->addFields(
                array(
                    new IntegerField('idCodificacao', true, true, true),
                    new StringField('Sigla', true),
                    new StringField('Descricao'),
                    new StringField('Observacao'),
                    new StringField('Marque')
                )
            );
            $lookupDataset->setOrderByField('Marque', 'ASC');
            $editColumn = new LookUpEditColumn(
                'O', 
                'ID_O', 
                $editor, 
                $this->dataset, 'idCodificacao', 'Marque', $lookupDataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddInsertColumn($editColumn);
            
            //
            // Edit column for ID_P field
            //
            $editor = new ComboBox('id_p_edit', $this->GetLocalizerCaptions()->GetMessageString('PleaseSelect'));
            $lookupDataset = new TableDataset(
                MyPDOConnectionFactory::getInstance(),
                GetConnectionOptions(),
                '`tbl_codificacao`');
            $lookupDataset->addFields(
                array(
                    new IntegerField('idCodificacao', true, true, true),
                    new StringField('Sigla', true),
                    new StringField('Descricao'),
                    new StringField('Observacao'),
                    new StringField('Marque')
                )
            );
            $lookupDataset->setOrderByField('Marque', 'ASC');
            $editColumn = new LookUpEditColumn(
                'P', 
                'ID_P', 
                $editor, 
                $this->dataset, 'idCodificacao', 'Marque', $lookupDataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddInsertColumn($editColumn);
            
            //
            // Edit column for ID_EX field
            //
            $editor = new ComboBox('id_ex_edit', $this->GetLocalizerCaptions()->GetMessageString('PleaseSelect'));
            $lookupDataset = new TableDataset(
                MyPDOConnectionFactory::getInstance(),
                GetConnectionOptions(),
                '`tbl_codificacao`');
            $lookupDataset->addFields(
                array(
                    new IntegerField('idCodificacao', true, true, true),
                    new StringField('Sigla', true),
                    new StringField('Descricao'),
                    new StringField('Observacao'),
                    new StringField('Marque')
                )
            );
            $lookupDataset->setOrderByField('Marque', 'ASC');
            $editColumn = new LookUpEditColumn(
                'EX', 
                'ID_EX', 
                $editor, 
                $this->dataset, 'idCodificacao', 'Marque', $lookupDataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddInsertColumn($editColumn);
            
            //
            // Edit column for ID_D field
            //
            $editor = new ComboBox('id_d_edit', $this->GetLocalizerCaptions()->GetMessageString('PleaseSelect'));
            $lookupDataset = new TableDataset(
                MyPDOConnectionFactory::getInstance(),
                GetConnectionOptions(),
                '`tbl_codificacao`');
            $lookupDataset->addFields(
                array(
                    new IntegerField('idCodificacao', true, true, true),
                    new StringField('Sigla', true),
                    new StringField('Descricao'),
                    new StringField('Observacao'),
                    new StringField('Marque')
                )
            );
            $lookupDataset->setOrderByField('Marque', 'ASC');
            $editColumn = new LookUpEditColumn(
                'D', 
                'ID_D', 
                $editor, 
                $this->dataset, 'idCodificacao', 'Marque', $lookupDataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddInsertColumn($editColumn);
            
            //
            // Edit column for ID_R field
            //
            $editor = new ComboBox('id_r_edit', $this->GetLocalizerCaptions()->GetMessageString('PleaseSelect'));
            $lookupDataset = new TableDataset(
                MyPDOConnectionFactory::getInstance(),
                GetConnectionOptions(),
                '`tbl_codificacao`');
            $lookupDataset->addFields(
                array(
                    new IntegerField('idCodificacao', true, true, true),
                    new StringField('Sigla', true),
                    new StringField('Descricao'),
                    new StringField('Observacao'),
                    new StringField('Marque')
                )
            );
            $lookupDataset->setOrderByField('Marque', 'ASC');
            $editColumn = new LookUpEditColumn(
                'R', 
                'ID_R', 
                $editor, 
                $this->dataset, 'idCodificacao', 'Marque', $lookupDataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddInsertColumn($editColumn);
            
            //
            // Edit column for ID_ALC field
            //
            $editor = new ComboBox('id_alc_edit', $this->GetLocalizerCaptions()->GetMessageString('PleaseSelect'));
            $lookupDataset = new TableDataset(
                MyPDOConnectionFactory::getInstance(),
                GetConnectionOptions(),
                '`tbl_codificacao`');
            $lookupDataset->addFields(
                array(
                    new IntegerField('idCodificacao', true, true, true),
                    new StringField('Sigla', true),
                    new StringField('Descricao'),
                    new StringField('Observacao'),
                    new StringField('Marque')
                )
            );
            $lookupDataset->setOrderByField('Marque', 'ASC');
            $editColumn = new LookUpEditColumn(
                'ALC', 
                'ID_ALC', 
                $editor, 
                $this->dataset, 'idCodificacao', 'Marque', $lookupDataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddInsertColumn($editColumn);
            
            //
            // Edit column for ID_ATC field
            //
            $editor = new ComboBox('id_atc_edit', $this->GetLocalizerCaptions()->GetMessageString('PleaseSelect'));
            $lookupDataset = new TableDataset(
                MyPDOConnectionFactory::getInstance(),
                GetConnectionOptions(),
                '`tbl_codificacao`');
            $lookupDataset->addFields(
                array(
                    new IntegerField('idCodificacao', true, true, true),
                    new StringField('Sigla', true),
                    new StringField('Descricao'),
                    new StringField('Observacao'),
                    new StringField('Marque')
                )
            );
            $lookupDataset->setOrderByField('Marque', 'ASC');
            $editColumn = new LookUpEditColumn(
                'ATC', 
                'ID_ATC', 
                $editor, 
                $this->dataset, 'idCodificacao', 'Marque', $lookupDataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddInsertColumn($editColumn);
            
            //
            // Edit column for ID_E field
            //
            $editor = new ComboBox('id_e_edit', $this->GetLocalizerCaptions()->GetMessageString('PleaseSelect'));
            $lookupDataset = new TableDataset(
                MyPDOConnectionFactory::getInstance(),
                GetConnectionOptions(),
                '`tbl_codificacao`');
            $lookupDataset->addFields(
                array(
                    new IntegerField('idCodificacao', true, true, true),
                    new StringField('Sigla', true),
                    new StringField('Descricao'),
                    new StringField('Observacao'),
                    new StringField('Marque')
                )
            );
            $lookupDataset->setOrderByField('Marque', 'ASC');
            $editColumn = new LookUpEditColumn(
                'E', 
                'ID_E', 
                $editor, 
                $this->dataset, 'idCodificacao', 'Marque', $lookupDataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddInsertColumn($editColumn);
            
            //
            // Edit column for FL_TRE field
            //
            $editor = new TextEdit('fl_tre_edit');
            $editColumn = new CustomEditColumn('FL-TRE (mm)', 'FL_TRE', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddInsertColumn($editColumn);
            
            //
            // Edit column for FL_TRI field
            //
            $editor = new TextEdit('fl_tri_edit');
            $editColumn = new CustomEditColumn('FL-TRI (mm)', 'FL_TRI', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddInsertColumn($editColumn);
            
            //
            // Edit column for ID_FC2 field
            //
            $editor = new TextEdit('id_fc2_edit');
            $editColumn = new CustomEditColumn('FC2 (%)', 'ID_FC2', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddInsertColumn($editColumn);
            
            //
            // Edit column for ID_FC3 field
            //
            $editor = new TextEdit('id_fc3_edit');
            $editColumn = new CustomEditColumn('FC3 (%)', 'ID_FC3', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddInsertColumn($editColumn);
            
            //
            // Edit column for PA field
            //
            $editor = new TextEdit('pa_edit');
            $editColumn = new CustomEditColumn('PA (%)', 'PA', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddInsertColumn($editColumn);
            
            //
            // Edit column for AT_ON field
            //
            $editor = new TextEdit('at_on_edit');
            $editColumn = new CustomEditColumn('AT/ON (%)', 'AT_ON', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddInsertColumn($editColumn);
            
            //
            // Edit column for dtRegistro field
            //
            $editor = new DateTimeEdit('dtregistro_edit', false, 'd-m-Y');
            $editColumn = new CustomEditColumn('Data Registro', 'dtRegistro', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $editColumn->SetInsertDefaultValue('%CURRENT_DATE%');
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddInsertColumn($editColumn);
            
            //
            // Edit column for Hora field
            //
            $editor = new TextEdit('hora_edit');
            $editor->SetMaxLength(8);
            $editColumn = new CustomEditColumn('Hora', 'Hora', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddInsertColumn($editColumn);
            
            //
            // Edit column for Observacoes field
            //
            $editor = new TextEdit('observacoes_edit');
            $editor->SetMaxLength(100);
            $editColumn = new CustomEditColumn('Observações', 'Observacoes', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddInsertColumn($editColumn);
            
            //
            // Edit column for idInterferencia field
            //
            $editor = new DynamicCombobox('idinterferencia_edit', $this->CreateLinkBuilder());
            $editor->setAllowClear(true);
            $editor->setMinimumInputLength(0);
            $lookupDataset = new TableDataset(
                MyPDOConnectionFactory::getInstance(),
                GetConnectionOptions(),
                '`tbl_interferencias`');
            $lookupDataset->addFields(
                array(
                    new IntegerField('idInterferencia', true, true, true),
                    new StringField('tipo_interferncia')
                )
            );
            $lookupDataset->setOrderByField('tipo_interferncia', 'ASC');
            $editColumn = new DynamicLookupEditColumn('Interferência', 'idInterferencia', 'idInterferencia_tipo_interferncia', 'insert_tbl_usuarios_concessionarias_tbl_monitoramento_idInterferencia_search', $editor, $this->dataset, $lookupDataset, 'idInterferencia', 'tipo_interferncia', '');
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddInsertColumn($editColumn);
            
            //
            // Edit column for id_gerenciador field
            //
            $editor = new DynamicCombobox('id_gerenciador_edit', $this->CreateLinkBuilder());
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
            $editColumn = new DynamicLookupEditColumn('Gerenciador', 'id_gerenciador', 'id_gerenciador_Nome Operador', 'insert_tbl_usuarios_concessionarias_tbl_monitoramento_id_gerenciador_search', $editor, $this->dataset, $lookupDataset, 'idUsuario', 'Nome Operador', '');
            $validator = new RequiredValidator(StringUtils::Format($this->GetLocalizerCaptions()->GetMessageString('RequiredValidationMessage'), $editColumn->GetCaption()));
            $editor->GetValidatorCollection()->AddValidator($validator);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddInsertColumn($editColumn);
            
            //
            // Edit column for id_anocontratual field
            //
            $editor = new DynamicCombobox('id_anocontratual_edit', $this->CreateLinkBuilder());
            $editor->setAllowClear(true);
            $editor->setMinimumInputLength(0);
            $lookupDataset = new TableDataset(
                MyPDOConnectionFactory::getInstance(),
                GetConnectionOptions(),
                '`tbl_ano`');
            $lookupDataset->addFields(
                array(
                    new IntegerField('idtbl_ano', true, true, true),
                    new StringField('ano', true, true)
                )
            );
            $lookupDataset->setOrderByField('ano', 'ASC');
            $editColumn = new DynamicLookupEditColumn('Ano Contratual', 'id_anocontratual', 'id_anocontratual_ano', 'insert_tbl_usuarios_concessionarias_tbl_monitoramento_id_anocontratual_search', $editor, $this->dataset, $lookupDataset, 'idtbl_ano', 'ano', '');
            $validator = new RequiredValidator(StringUtils::Format($this->GetLocalizerCaptions()->GetMessageString('RequiredValidationMessage'), $editColumn->GetCaption()));
            $editor->GetValidatorCollection()->AddValidator($validator);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddInsertColumn($editColumn);
            
            //
            // Edit column for marco_km field
            //
            $editor = new TextEdit('marco_km_edit');
            $editor->SetMaxLength(45);
            $editColumn = new CustomEditColumn('Marco Km', 'marco_km', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddInsertColumn($editColumn);
            
            //
            // Edit column for latitude field
            //
            $editor = new TextEdit('latitude_edit');
            $editor->SetMaxLength(20);
            $editColumn = new CustomEditColumn('Latitude', 'latitude', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddInsertColumn($editColumn);
            
            //
            // Edit column for longitude field
            //
            $editor = new TextEdit('longitude_edit');
            $editor->SetMaxLength(20);
            $editColumn = new CustomEditColumn('Longitude', 'longitude', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddInsertColumn($editColumn);
            
            //
            // Edit column for Observacoe2 field
            //
            $editor = new TextEdit('observacoe2_edit');
            $editor->SetMaxLength(100);
            $editColumn = new CustomEditColumn('Observações', 'Observacoe2', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddInsertColumn($editColumn);
            
            //
            // Edit column for revisao field
            //
            $editor = new TextEdit('revisao_edit');
            $editor->SetMaxLength(5);
            $editColumn = new CustomEditColumn('Revisão', 'revisao', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddInsertColumn($editColumn);
            
            //
            // Edit column for data_lancamento field
            //
            $editor = new DateTimeEdit('data_lancamento_edit', false, 'd-m-Y');
            $editColumn = new CustomEditColumn('Data Lancamento', 'data_lancamento', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddInsertColumn($editColumn);
            
            //
            // Edit column for data_alteracao field
            //
            $editor = new DateTimeEdit('data_alteracao_edit', false, 'd-m-Y');
            $editColumn = new CustomEditColumn('Data Alteracao', 'data_alteracao', $editor, $this->dataset);
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
            // View column for idMonitoramento field
            //
            $column = new NumberViewColumn('idMonitoramento', 'idMonitoramento', 'Ficha Numero', $this->dataset);
            $column->SetOrderable(true);
            $column->setNumberAfterDecimal(0);
            $column->setThousandsSeparator('.');
            $column->setDecimalSeparator('');
            $grid->AddPrintColumn($column);
            
            //
            // View column for Lote field
            //
            $column = new TextViewColumn('idConcessiona', 'idConcessiona_Lote', 'Lote', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddPrintColumn($column);
            
            //
            // View column for RodoviaSP field
            //
            $column = new TextViewColumn('id_rodovia', 'id_rodovia_RodoviaSP', 'Rodovia', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddPrintColumn($column);
            
            //
            // View column for DescricaoVia field
            //
            $column = new TextViewColumn('id_via', 'id_via_DescricaoVia', 'Via', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddPrintColumn($column);
            
            //
            // View column for DescricaoPista field
            //
            $column = new TextViewColumn('idPista', 'idPista_DescricaoPista', 'Pista', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddPrintColumn($column);
            
            //
            // View column for Descricao field
            //
            $column = new TextViewColumn('idSentidotrafego', 'idSentidotrafego_Descricao', 'Sentido tráfego (quilometragem)', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddPrintColumn($column);
            
            //
            // View column for km_referencia field
            //
            $column = new TextViewColumn('km_referencia', 'km_referencia', 'km de referência (caso de dispositivos)', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddPrintColumn($column);
            
            //
            // View column for alca_ramo field
            //
            $column = new TextViewColumn('alca_ramo', 'alca_ramo', 'Nomenclatura de Alça/Ramo(quando necessário)', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddPrintColumn($column);
            
            //
            // View column for DescricaoFaixa field
            //
            $column = new TextViewColumn('idFaixa', 'idFaixa_DescricaoFaixa', 'Faixa', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddPrintColumn($column);
            
            //
            // View column for id_km field
            //
            $column = new NumberViewColumn('id_km', 'id_km', 'km', $this->dataset);
            $column->SetOrderable(true);
            $column->setBold(true);
            $column->setNumberAfterDecimal(3);
            $column->setThousandsSeparator('.');
            $column->setDecimalSeparator(',');
            $grid->AddPrintColumn($column);
            
            //
            // View column for DescricaoSecao field
            //
            $column = new TextViewColumn('id_secao_terrap', 'id_secao_terrap_DescricaoSecao', 'Seção Terrap.', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddPrintColumn($column);
            
            //
            // View column for DescricaoMaterial field
            //
            $column = new TextViewColumn('tipo_revestimento', 'tipo_revestimento_DescricaoMaterial', 'Tipo Revestimento', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddPrintColumn($column);
            
            //
            // View column for Ok field
            //
            $column = new NumberViewColumn('Ok', 'Ok', 'Ok', $this->dataset);
            $column->SetOrderable(true);
            $column->setNumberAfterDecimal(0);
            $column->setThousandsSeparator('.');
            $column->setDecimalSeparator('');
            $grid->AddPrintColumn($column);
            
            //
            // View column for Marque field
            //
            $column = new TextViewColumn('ID_FI', 'ID_FI_Marque', 'FI', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddPrintColumn($column);
            
            //
            // View column for Marque field
            //
            $column = new TextViewColumn('ID_TTC', 'ID_TTC_Marque', 'TTC', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddPrintColumn($column);
            
            //
            // View column for Marque field
            //
            $column = new TextViewColumn('ID_TTL', 'ID_TTL_Marque', 'TTL', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddPrintColumn($column);
            
            //
            // View column for Marque field
            //
            $column = new TextViewColumn('ID_TLC', 'ID_TLC_Marque', 'TLC', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddPrintColumn($column);
            
            //
            // View column for Marque field
            //
            $column = new TextViewColumn('ID_TLL', 'ID_TLL_Marque', 'TLL', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddPrintColumn($column);
            
            //
            // View column for Marque field
            //
            $column = new TextViewColumn('ID_TRR', 'ID_TRR_Marque', 'TRR', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddPrintColumn($column);
            
            //
            // View column for Marque field
            //
            $column = new TextViewColumn('ID_J', 'ID_J_Marque', 'J', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddPrintColumn($column);
            
            //
            // View column for Marque field
            //
            $column = new TextViewColumn('ID_TB', 'ID_TB_Marque', 'TB', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddPrintColumn($column);
            
            //
            // View column for Marque field
            //
            $column = new TextViewColumn('ID_JE', 'ID_JE_Marque', 'JE', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddPrintColumn($column);
            
            //
            // View column for Marque field
            //
            $column = new TextViewColumn('ID_TBE', 'ID_TBE_Marque', 'TBE', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddPrintColumn($column);
            
            //
            // View column for Marque field
            //
            $column = new TextViewColumn('ID_ALP', 'ID_ALP_Marque', 'ALP', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddPrintColumn($column);
            
            //
            // View column for Marque field
            //
            $column = new TextViewColumn('ID_ATP', 'ID_ATP_Marque', 'ATP', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddPrintColumn($column);
            
            //
            // View column for Marque field
            //
            $column = new TextViewColumn('ID_O', 'ID_O_Marque', 'O', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddPrintColumn($column);
            
            //
            // View column for Marque field
            //
            $column = new TextViewColumn('ID_P', 'ID_P_Marque', 'P', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddPrintColumn($column);
            
            //
            // View column for Marque field
            //
            $column = new TextViewColumn('ID_EX', 'ID_EX_Marque', 'EX', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddPrintColumn($column);
            
            //
            // View column for Marque field
            //
            $column = new TextViewColumn('ID_D', 'ID_D_Marque', 'D', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddPrintColumn($column);
            
            //
            // View column for Marque field
            //
            $column = new TextViewColumn('ID_R', 'ID_R_Marque', 'R', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddPrintColumn($column);
            
            //
            // View column for Marque field
            //
            $column = new TextViewColumn('ID_ALC', 'ID_ALC_Marque', 'ALC', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddPrintColumn($column);
            
            //
            // View column for Marque field
            //
            $column = new TextViewColumn('ID_ATC', 'ID_ATC_Marque', 'ATC', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddPrintColumn($column);
            
            //
            // View column for Marque field
            //
            $column = new TextViewColumn('ID_E', 'ID_E_Marque', 'E', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddPrintColumn($column);
            
            //
            // View column for FL_TRE field
            //
            $column = new NumberViewColumn('FL_TRE', 'FL_TRE', 'FL-TRE (mm)', $this->dataset);
            $column->SetOrderable(true);
            $column->setNumberAfterDecimal(2);
            $column->setThousandsSeparator('.');
            $column->setDecimalSeparator(',');
            $grid->AddPrintColumn($column);
            
            //
            // View column for FL_TRI field
            //
            $column = new NumberViewColumn('FL_TRI', 'FL_TRI', 'FL-TRI (mm)', $this->dataset);
            $column->SetOrderable(true);
            $column->setNumberAfterDecimal(2);
            $column->setThousandsSeparator('.');
            $column->setDecimalSeparator(',');
            $grid->AddPrintColumn($column);
            
            //
            // View column for ID_FC2 field
            //
            $column = new NumberViewColumn('ID_FC2', 'ID_FC2', 'FC2 (%)', $this->dataset);
            $column->SetOrderable(true);
            $column->setNumberAfterDecimal(2);
            $column->setThousandsSeparator('.');
            $column->setDecimalSeparator(',');
            $grid->AddPrintColumn($column);
            
            //
            // View column for ID_FC3 field
            //
            $column = new NumberViewColumn('ID_FC3', 'ID_FC3', 'FC3 (%)', $this->dataset);
            $column->SetOrderable(true);
            $column->setNumberAfterDecimal(2);
            $column->setThousandsSeparator('.');
            $column->setDecimalSeparator(',');
            $grid->AddPrintColumn($column);
            
            //
            // View column for PA field
            //
            $column = new NumberViewColumn('PA', 'PA', 'PA (%)', $this->dataset);
            $column->SetOrderable(true);
            $column->setNumberAfterDecimal(2);
            $column->setThousandsSeparator('.');
            $column->setDecimalSeparator(',');
            $grid->AddPrintColumn($column);
            
            //
            // View column for AT_ON field
            //
            $column = new NumberViewColumn('AT_ON', 'AT_ON', 'AT/ON (%)', $this->dataset);
            $column->SetOrderable(true);
            $column->setNumberAfterDecimal(2);
            $column->setThousandsSeparator('.');
            $column->setDecimalSeparator(',');
            $grid->AddPrintColumn($column);
            
            //
            // View column for dtRegistro field
            //
            $column = new DateTimeViewColumn('dtRegistro', 'dtRegistro', 'Data Registro', $this->dataset);
            $column->SetOrderable(true);
            $column->SetDateTimeFormat('d-m-Y');
            $grid->AddPrintColumn($column);
            
            //
            // View column for Hora field
            //
            $column = new TextViewColumn('Hora', 'Hora', 'Hora', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddPrintColumn($column);
            
            //
            // View column for Observacoes field
            //
            $column = new TextViewColumn('Observacoes', 'Observacoes', 'Observações', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddPrintColumn($column);
            
            //
            // View column for tipo_interferncia field
            //
            $column = new TextViewColumn('idInterferencia', 'idInterferencia_tipo_interferncia', 'Interferência', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddPrintColumn($column);
            
            //
            // View column for Nome Operador field
            //
            $column = new TextViewColumn('id_gerenciador', 'id_gerenciador_Nome Operador', 'Gerenciador', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddPrintColumn($column);
            
            //
            // View column for ano field
            //
            $column = new TextViewColumn('id_anocontratual', 'id_anocontratual_ano', 'Ano Contratual', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddPrintColumn($column);
            
            //
            // View column for marco_km field
            //
            $column = new TextViewColumn('marco_km', 'marco_km', 'Marco Km', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddPrintColumn($column);
            
            //
            // View column for latitude field
            //
            $column = new TextViewColumn('latitude', 'latitude', 'Latitude', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddPrintColumn($column);
            
            //
            // View column for longitude field
            //
            $column = new TextViewColumn('longitude', 'longitude', 'Longitude', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddPrintColumn($column);
            
            //
            // View column for Observacoe2 field
            //
            $column = new TextViewColumn('Observacoe2', 'Observacoe2', 'Observações', $this->dataset);
            $column->SetOrderable(true);
            $column->SetMaxLength(75);
            $grid->AddPrintColumn($column);
            
            //
            // View column for revisao field
            //
            $column = new TextViewColumn('revisao', 'revisao', 'Revisão', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddPrintColumn($column);
            
            //
            // View column for data_lancamento field
            //
            $column = new DateTimeViewColumn('data_lancamento', 'data_lancamento', 'Data Lancamento', $this->dataset);
            $column->SetOrderable(true);
            $column->SetDateTimeFormat('d-m-Y');
            $grid->AddPrintColumn($column);
            
            //
            // View column for data_alteracao field
            //
            $column = new DateTimeViewColumn('data_alteracao', 'data_alteracao', 'Data Alteracao', $this->dataset);
            $column->SetOrderable(true);
            $column->SetDateTimeFormat('d-m-Y');
            $grid->AddPrintColumn($column);
        }
    
        protected function AddExportColumns(Grid $grid)
        {
            //
            // View column for idMonitoramento field
            //
            $column = new NumberViewColumn('idMonitoramento', 'idMonitoramento', 'Ficha Numero', $this->dataset);
            $column->SetOrderable(true);
            $column->setNumberAfterDecimal(0);
            $column->setThousandsSeparator('.');
            $column->setDecimalSeparator('');
            $grid->AddExportColumn($column);
            
            //
            // View column for Lote field
            //
            $column = new TextViewColumn('idConcessiona', 'idConcessiona_Lote', 'Lote', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddExportColumn($column);
            
            //
            // View column for RodoviaSP field
            //
            $column = new TextViewColumn('id_rodovia', 'id_rodovia_RodoviaSP', 'Rodovia', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddExportColumn($column);
            
            //
            // View column for DescricaoVia field
            //
            $column = new TextViewColumn('id_via', 'id_via_DescricaoVia', 'Via', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddExportColumn($column);
            
            //
            // View column for DescricaoPista field
            //
            $column = new TextViewColumn('idPista', 'idPista_DescricaoPista', 'Pista', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddExportColumn($column);
            
            //
            // View column for Descricao field
            //
            $column = new TextViewColumn('idSentidotrafego', 'idSentidotrafego_Descricao', 'Sentido tráfego (quilometragem)', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddExportColumn($column);
            
            //
            // View column for km_referencia field
            //
            $column = new TextViewColumn('km_referencia', 'km_referencia', 'km de referência (caso de dispositivos)', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddExportColumn($column);
            
            //
            // View column for alca_ramo field
            //
            $column = new TextViewColumn('alca_ramo', 'alca_ramo', 'Nomenclatura de Alça/Ramo(quando necessário)', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddExportColumn($column);
            
            //
            // View column for DescricaoFaixa field
            //
            $column = new TextViewColumn('idFaixa', 'idFaixa_DescricaoFaixa', 'Faixa', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddExportColumn($column);
            
            //
            // View column for id_km field
            //
            $column = new NumberViewColumn('id_km', 'id_km', 'km', $this->dataset);
            $column->SetOrderable(true);
            $column->setBold(true);
            $column->setNumberAfterDecimal(3);
            $column->setThousandsSeparator('.');
            $column->setDecimalSeparator(',');
            $grid->AddExportColumn($column);
            
            //
            // View column for DescricaoSecao field
            //
            $column = new TextViewColumn('id_secao_terrap', 'id_secao_terrap_DescricaoSecao', 'Seção Terrap.', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddExportColumn($column);
            
            //
            // View column for DescricaoMaterial field
            //
            $column = new TextViewColumn('tipo_revestimento', 'tipo_revestimento_DescricaoMaterial', 'Tipo Revestimento', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddExportColumn($column);
            
            //
            // View column for Ok field
            //
            $column = new NumberViewColumn('Ok', 'Ok', 'Ok', $this->dataset);
            $column->SetOrderable(true);
            $column->setNumberAfterDecimal(0);
            $column->setThousandsSeparator('.');
            $column->setDecimalSeparator('');
            $grid->AddExportColumn($column);
            
            //
            // View column for Marque field
            //
            $column = new TextViewColumn('ID_FI', 'ID_FI_Marque', 'FI', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddExportColumn($column);
            
            //
            // View column for Marque field
            //
            $column = new TextViewColumn('ID_TTC', 'ID_TTC_Marque', 'TTC', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddExportColumn($column);
            
            //
            // View column for Marque field
            //
            $column = new TextViewColumn('ID_TTL', 'ID_TTL_Marque', 'TTL', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddExportColumn($column);
            
            //
            // View column for Marque field
            //
            $column = new TextViewColumn('ID_TLC', 'ID_TLC_Marque', 'TLC', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddExportColumn($column);
            
            //
            // View column for Marque field
            //
            $column = new TextViewColumn('ID_TLL', 'ID_TLL_Marque', 'TLL', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddExportColumn($column);
            
            //
            // View column for Marque field
            //
            $column = new TextViewColumn('ID_TRR', 'ID_TRR_Marque', 'TRR', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddExportColumn($column);
            
            //
            // View column for Marque field
            //
            $column = new TextViewColumn('ID_J', 'ID_J_Marque', 'J', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddExportColumn($column);
            
            //
            // View column for Marque field
            //
            $column = new TextViewColumn('ID_TB', 'ID_TB_Marque', 'TB', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddExportColumn($column);
            
            //
            // View column for Marque field
            //
            $column = new TextViewColumn('ID_JE', 'ID_JE_Marque', 'JE', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddExportColumn($column);
            
            //
            // View column for Marque field
            //
            $column = new TextViewColumn('ID_TBE', 'ID_TBE_Marque', 'TBE', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddExportColumn($column);
            
            //
            // View column for Marque field
            //
            $column = new TextViewColumn('ID_ALP', 'ID_ALP_Marque', 'ALP', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddExportColumn($column);
            
            //
            // View column for Marque field
            //
            $column = new TextViewColumn('ID_ATP', 'ID_ATP_Marque', 'ATP', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddExportColumn($column);
            
            //
            // View column for Marque field
            //
            $column = new TextViewColumn('ID_O', 'ID_O_Marque', 'O', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddExportColumn($column);
            
            //
            // View column for Marque field
            //
            $column = new TextViewColumn('ID_P', 'ID_P_Marque', 'P', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddExportColumn($column);
            
            //
            // View column for Marque field
            //
            $column = new TextViewColumn('ID_EX', 'ID_EX_Marque', 'EX', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddExportColumn($column);
            
            //
            // View column for Marque field
            //
            $column = new TextViewColumn('ID_D', 'ID_D_Marque', 'D', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddExportColumn($column);
            
            //
            // View column for Marque field
            //
            $column = new TextViewColumn('ID_R', 'ID_R_Marque', 'R', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddExportColumn($column);
            
            //
            // View column for Marque field
            //
            $column = new TextViewColumn('ID_ALC', 'ID_ALC_Marque', 'ALC', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddExportColumn($column);
            
            //
            // View column for Marque field
            //
            $column = new TextViewColumn('ID_ATC', 'ID_ATC_Marque', 'ATC', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddExportColumn($column);
            
            //
            // View column for Marque field
            //
            $column = new TextViewColumn('ID_E', 'ID_E_Marque', 'E', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddExportColumn($column);
            
            //
            // View column for FL_TRE field
            //
            $column = new NumberViewColumn('FL_TRE', 'FL_TRE', 'FL-TRE (mm)', $this->dataset);
            $column->SetOrderable(true);
            $column->setNumberAfterDecimal(2);
            $column->setThousandsSeparator('.');
            $column->setDecimalSeparator(',');
            $grid->AddExportColumn($column);
            
            //
            // View column for FL_TRI field
            //
            $column = new NumberViewColumn('FL_TRI', 'FL_TRI', 'FL-TRI (mm)', $this->dataset);
            $column->SetOrderable(true);
            $column->setNumberAfterDecimal(2);
            $column->setThousandsSeparator('.');
            $column->setDecimalSeparator(',');
            $grid->AddExportColumn($column);
            
            //
            // View column for ID_FC2 field
            //
            $column = new NumberViewColumn('ID_FC2', 'ID_FC2', 'FC2 (%)', $this->dataset);
            $column->SetOrderable(true);
            $column->setNumberAfterDecimal(2);
            $column->setThousandsSeparator('.');
            $column->setDecimalSeparator(',');
            $grid->AddExportColumn($column);
            
            //
            // View column for ID_FC3 field
            //
            $column = new NumberViewColumn('ID_FC3', 'ID_FC3', 'FC3 (%)', $this->dataset);
            $column->SetOrderable(true);
            $column->setNumberAfterDecimal(2);
            $column->setThousandsSeparator('.');
            $column->setDecimalSeparator(',');
            $grid->AddExportColumn($column);
            
            //
            // View column for PA field
            //
            $column = new NumberViewColumn('PA', 'PA', 'PA (%)', $this->dataset);
            $column->SetOrderable(true);
            $column->setNumberAfterDecimal(2);
            $column->setThousandsSeparator('.');
            $column->setDecimalSeparator(',');
            $grid->AddExportColumn($column);
            
            //
            // View column for AT_ON field
            //
            $column = new NumberViewColumn('AT_ON', 'AT_ON', 'AT/ON (%)', $this->dataset);
            $column->SetOrderable(true);
            $column->setNumberAfterDecimal(2);
            $column->setThousandsSeparator('.');
            $column->setDecimalSeparator(',');
            $grid->AddExportColumn($column);
            
            //
            // View column for dtRegistro field
            //
            $column = new DateTimeViewColumn('dtRegistro', 'dtRegistro', 'Data Registro', $this->dataset);
            $column->SetOrderable(true);
            $column->SetDateTimeFormat('d-m-Y');
            $grid->AddExportColumn($column);
            
            //
            // View column for Hora field
            //
            $column = new TextViewColumn('Hora', 'Hora', 'Hora', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddExportColumn($column);
            
            //
            // View column for Observacoes field
            //
            $column = new TextViewColumn('Observacoes', 'Observacoes', 'Observações', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddExportColumn($column);
            
            //
            // View column for tipo_interferncia field
            //
            $column = new TextViewColumn('idInterferencia', 'idInterferencia_tipo_interferncia', 'Interferência', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddExportColumn($column);
            
            //
            // View column for Nome Operador field
            //
            $column = new TextViewColumn('id_gerenciador', 'id_gerenciador_Nome Operador', 'Gerenciador', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddExportColumn($column);
            
            //
            // View column for ano field
            //
            $column = new TextViewColumn('id_anocontratual', 'id_anocontratual_ano', 'Ano Contratual', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddExportColumn($column);
            
            //
            // View column for marco_km field
            //
            $column = new TextViewColumn('marco_km', 'marco_km', 'Marco Km', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddExportColumn($column);
            
            //
            // View column for latitude field
            //
            $column = new TextViewColumn('latitude', 'latitude', 'Latitude', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddExportColumn($column);
            
            //
            // View column for longitude field
            //
            $column = new TextViewColumn('longitude', 'longitude', 'Longitude', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddExportColumn($column);
            
            //
            // View column for Observacoe2 field
            //
            $column = new TextViewColumn('Observacoe2', 'Observacoe2', 'Observações', $this->dataset);
            $column->SetOrderable(true);
            $column->SetMaxLength(75);
            $grid->AddExportColumn($column);
            
            //
            // View column for revisao field
            //
            $column = new TextViewColumn('revisao', 'revisao', 'Revisão', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddExportColumn($column);
            
            //
            // View column for data_lancamento field
            //
            $column = new DateTimeViewColumn('data_lancamento', 'data_lancamento', 'Data Lancamento', $this->dataset);
            $column->SetOrderable(true);
            $column->SetDateTimeFormat('d-m-Y');
            $grid->AddExportColumn($column);
            
            //
            // View column for data_alteracao field
            //
            $column = new DateTimeViewColumn('data_alteracao', 'data_alteracao', 'Data Alteracao', $this->dataset);
            $column->SetOrderable(true);
            $column->SetDateTimeFormat('d-m-Y');
            $grid->AddExportColumn($column);
        }
    
        private function AddCompareColumns(Grid $grid)
        {
            //
            // View column for Lote field
            //
            $column = new TextViewColumn('idConcessiona', 'idConcessiona_Lote', 'Lote', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddCompareColumn($column);
            
            //
            // View column for RodoviaSP field
            //
            $column = new TextViewColumn('id_rodovia', 'id_rodovia_RodoviaSP', 'Rodovia', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddCompareColumn($column);
            
            //
            // View column for DescricaoVia field
            //
            $column = new TextViewColumn('id_via', 'id_via_DescricaoVia', 'Via', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddCompareColumn($column);
            
            //
            // View column for DescricaoPista field
            //
            $column = new TextViewColumn('idPista', 'idPista_DescricaoPista', 'Pista', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddCompareColumn($column);
            
            //
            // View column for Descricao field
            //
            $column = new TextViewColumn('idSentidotrafego', 'idSentidotrafego_Descricao', 'Sentido tráfego (quilometragem)', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddCompareColumn($column);
            
            //
            // View column for km_referencia field
            //
            $column = new TextViewColumn('km_referencia', 'km_referencia', 'km de referência (caso de dispositivos)', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddCompareColumn($column);
            
            //
            // View column for alca_ramo field
            //
            $column = new TextViewColumn('alca_ramo', 'alca_ramo', 'Nomenclatura de Alça/Ramo(quando necessário)', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddCompareColumn($column);
            
            //
            // View column for DescricaoFaixa field
            //
            $column = new TextViewColumn('idFaixa', 'idFaixa_DescricaoFaixa', 'Faixa', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddCompareColumn($column);
            
            //
            // View column for id_km field
            //
            $column = new NumberViewColumn('id_km', 'id_km', 'km', $this->dataset);
            $column->SetOrderable(true);
            $column->setBold(true);
            $column->setNumberAfterDecimal(3);
            $column->setThousandsSeparator('.');
            $column->setDecimalSeparator(',');
            $grid->AddCompareColumn($column);
            
            //
            // View column for DescricaoSecao field
            //
            $column = new TextViewColumn('id_secao_terrap', 'id_secao_terrap_DescricaoSecao', 'Seção Terrap.', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddCompareColumn($column);
            
            //
            // View column for DescricaoMaterial field
            //
            $column = new TextViewColumn('tipo_revestimento', 'tipo_revestimento_DescricaoMaterial', 'Tipo Revestimento', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddCompareColumn($column);
            
            //
            // View column for Ok field
            //
            $column = new NumberViewColumn('Ok', 'Ok', 'Ok', $this->dataset);
            $column->SetOrderable(true);
            $column->setNumberAfterDecimal(0);
            $column->setThousandsSeparator('.');
            $column->setDecimalSeparator('');
            $grid->AddCompareColumn($column);
            
            //
            // View column for Marque field
            //
            $column = new TextViewColumn('ID_FI', 'ID_FI_Marque', 'FI', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddCompareColumn($column);
            
            //
            // View column for Marque field
            //
            $column = new TextViewColumn('ID_TTC', 'ID_TTC_Marque', 'TTC', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddCompareColumn($column);
            
            //
            // View column for Marque field
            //
            $column = new TextViewColumn('ID_TTL', 'ID_TTL_Marque', 'TTL', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddCompareColumn($column);
            
            //
            // View column for Marque field
            //
            $column = new TextViewColumn('ID_TLC', 'ID_TLC_Marque', 'TLC', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddCompareColumn($column);
            
            //
            // View column for Marque field
            //
            $column = new TextViewColumn('ID_TLL', 'ID_TLL_Marque', 'TLL', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddCompareColumn($column);
            
            //
            // View column for Marque field
            //
            $column = new TextViewColumn('ID_TRR', 'ID_TRR_Marque', 'TRR', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddCompareColumn($column);
            
            //
            // View column for Marque field
            //
            $column = new TextViewColumn('ID_J', 'ID_J_Marque', 'J', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddCompareColumn($column);
            
            //
            // View column for Marque field
            //
            $column = new TextViewColumn('ID_TB', 'ID_TB_Marque', 'TB', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddCompareColumn($column);
            
            //
            // View column for Marque field
            //
            $column = new TextViewColumn('ID_JE', 'ID_JE_Marque', 'JE', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddCompareColumn($column);
            
            //
            // View column for Marque field
            //
            $column = new TextViewColumn('ID_TBE', 'ID_TBE_Marque', 'TBE', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddCompareColumn($column);
            
            //
            // View column for Marque field
            //
            $column = new TextViewColumn('ID_ALP', 'ID_ALP_Marque', 'ALP', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddCompareColumn($column);
            
            //
            // View column for Marque field
            //
            $column = new TextViewColumn('ID_ATP', 'ID_ATP_Marque', 'ATP', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddCompareColumn($column);
            
            //
            // View column for Marque field
            //
            $column = new TextViewColumn('ID_O', 'ID_O_Marque', 'O', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddCompareColumn($column);
            
            //
            // View column for Marque field
            //
            $column = new TextViewColumn('ID_P', 'ID_P_Marque', 'P', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddCompareColumn($column);
            
            //
            // View column for Marque field
            //
            $column = new TextViewColumn('ID_EX', 'ID_EX_Marque', 'EX', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddCompareColumn($column);
            
            //
            // View column for Marque field
            //
            $column = new TextViewColumn('ID_D', 'ID_D_Marque', 'D', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddCompareColumn($column);
            
            //
            // View column for Marque field
            //
            $column = new TextViewColumn('ID_R', 'ID_R_Marque', 'R', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddCompareColumn($column);
            
            //
            // View column for Marque field
            //
            $column = new TextViewColumn('ID_ALC', 'ID_ALC_Marque', 'ALC', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddCompareColumn($column);
            
            //
            // View column for Marque field
            //
            $column = new TextViewColumn('ID_ATC', 'ID_ATC_Marque', 'ATC', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddCompareColumn($column);
            
            //
            // View column for Marque field
            //
            $column = new TextViewColumn('ID_E', 'ID_E_Marque', 'E', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddCompareColumn($column);
            
            //
            // View column for FL_TRE field
            //
            $column = new NumberViewColumn('FL_TRE', 'FL_TRE', 'FL-TRE (mm)', $this->dataset);
            $column->SetOrderable(true);
            $column->setNumberAfterDecimal(2);
            $column->setThousandsSeparator('.');
            $column->setDecimalSeparator(',');
            $grid->AddCompareColumn($column);
            
            //
            // View column for FL_TRI field
            //
            $column = new NumberViewColumn('FL_TRI', 'FL_TRI', 'FL-TRI (mm)', $this->dataset);
            $column->SetOrderable(true);
            $column->setNumberAfterDecimal(2);
            $column->setThousandsSeparator('.');
            $column->setDecimalSeparator(',');
            $grid->AddCompareColumn($column);
            
            //
            // View column for ID_FC2 field
            //
            $column = new NumberViewColumn('ID_FC2', 'ID_FC2', 'FC2 (%)', $this->dataset);
            $column->SetOrderable(true);
            $column->setNumberAfterDecimal(2);
            $column->setThousandsSeparator('.');
            $column->setDecimalSeparator(',');
            $grid->AddCompareColumn($column);
            
            //
            // View column for ID_FC3 field
            //
            $column = new NumberViewColumn('ID_FC3', 'ID_FC3', 'FC3 (%)', $this->dataset);
            $column->SetOrderable(true);
            $column->setNumberAfterDecimal(2);
            $column->setThousandsSeparator('.');
            $column->setDecimalSeparator(',');
            $grid->AddCompareColumn($column);
            
            //
            // View column for PA field
            //
            $column = new NumberViewColumn('PA', 'PA', 'PA (%)', $this->dataset);
            $column->SetOrderable(true);
            $column->setNumberAfterDecimal(2);
            $column->setThousandsSeparator('.');
            $column->setDecimalSeparator(',');
            $grid->AddCompareColumn($column);
            
            //
            // View column for AT_ON field
            //
            $column = new NumberViewColumn('AT_ON', 'AT_ON', 'AT/ON (%)', $this->dataset);
            $column->SetOrderable(true);
            $column->setNumberAfterDecimal(2);
            $column->setThousandsSeparator('.');
            $column->setDecimalSeparator(',');
            $grid->AddCompareColumn($column);
            
            //
            // View column for dtRegistro field
            //
            $column = new DateTimeViewColumn('dtRegistro', 'dtRegistro', 'Data Registro', $this->dataset);
            $column->SetOrderable(true);
            $column->SetDateTimeFormat('d-m-Y');
            $grid->AddCompareColumn($column);
            
            //
            // View column for Hora field
            //
            $column = new TextViewColumn('Hora', 'Hora', 'Hora', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddCompareColumn($column);
            
            //
            // View column for Observacoes field
            //
            $column = new TextViewColumn('Observacoes', 'Observacoes', 'Observações', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddCompareColumn($column);
            
            //
            // View column for tipo_interferncia field
            //
            $column = new TextViewColumn('idInterferencia', 'idInterferencia_tipo_interferncia', 'Interferência', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddCompareColumn($column);
            
            //
            // View column for Nome Operador field
            //
            $column = new TextViewColumn('id_gerenciador', 'id_gerenciador_Nome Operador', 'Gerenciador', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddCompareColumn($column);
            
            //
            // View column for ano field
            //
            $column = new TextViewColumn('id_anocontratual', 'id_anocontratual_ano', 'Ano Contratual', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddCompareColumn($column);
            
            //
            // View column for marco_km field
            //
            $column = new TextViewColumn('marco_km', 'marco_km', 'Marco Km', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddCompareColumn($column);
            
            //
            // View column for latitude field
            //
            $column = new TextViewColumn('latitude', 'latitude', 'Latitude', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddCompareColumn($column);
            
            //
            // View column for longitude field
            //
            $column = new TextViewColumn('longitude', 'longitude', 'Longitude', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddCompareColumn($column);
            
            //
            // View column for Observacoe2 field
            //
            $column = new TextViewColumn('Observacoe2', 'Observacoe2', 'Observações', $this->dataset);
            $column->SetOrderable(true);
            $column->SetMaxLength(75);
            $grid->AddCompareColumn($column);
            
            //
            // View column for revisao field
            //
            $column = new TextViewColumn('revisao', 'revisao', 'Revisão', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddCompareColumn($column);
            
            //
            // View column for data_lancamento field
            //
            $column = new DateTimeViewColumn('data_lancamento', 'data_lancamento', 'Data Lancamento', $this->dataset);
            $column->SetOrderable(true);
            $column->SetDateTimeFormat('d-m-Y');
            $grid->AddCompareColumn($column);
            
            //
            // View column for data_alteracao field
            //
            $column = new DateTimeViewColumn('data_alteracao', 'data_alteracao', 'Data Alteracao', $this->dataset);
            $column->SetOrderable(true);
            $column->SetDateTimeFormat('d-m-Y');
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
            $lookupDataset->setOrderByField('Lote', 'ASC');
            $handler = new DynamicSearchHandler($lookupDataset, $this, 'insert_tbl_usuarios_concessionarias_tbl_monitoramento_idConcessiona_search', 'idConcessiona', 'Lote', null, 20);
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
            $handler = new DynamicSearchHandler($lookupDataset, $this, 'insert_tbl_usuarios_concessionarias_tbl_monitoramento_id_rodovia_search', 'idRodovia', 'RodoviaSP', null, 20);
            GetApplication()->RegisterHTTPHandler($handler);
            
            $lookupDataset = new TableDataset(
                MyPDOConnectionFactory::getInstance(),
                GetConnectionOptions(),
                '`tbl_vias`');
            $lookupDataset->addFields(
                array(
                    new IntegerField('idVia', true, true, true),
                    new StringField('DescricaoVia'),
                    new IntegerField('Ordem')
                )
            );
            $lookupDataset->setOrderByField('DescricaoVia', 'ASC');
            $handler = new DynamicSearchHandler($lookupDataset, $this, 'insert_tbl_usuarios_concessionarias_tbl_monitoramento_id_via_search', 'idVia', 'DescricaoVia', null, 20);
            GetApplication()->RegisterHTTPHandler($handler);
            
            $lookupDataset = new TableDataset(
                MyPDOConnectionFactory::getInstance(),
                GetConnectionOptions(),
                '`tbl_pistas`');
            $lookupDataset->addFields(
                array(
                    new IntegerField('idPista', true, true, true),
                    new StringField('DescricaoPista'),
                    new IntegerField('Ordem')
                )
            );
            $lookupDataset->setOrderByField('DescricaoPista', 'ASC');
            $handler = new DynamicSearchHandler($lookupDataset, $this, 'insert_tbl_usuarios_concessionarias_tbl_monitoramento_idPista_search', 'idPista', 'DescricaoPista', null, 20);
            GetApplication()->RegisterHTTPHandler($handler);
            
            $lookupDataset = new TableDataset(
                MyPDOConnectionFactory::getInstance(),
                GetConnectionOptions(),
                '`tbl_sentido_trafego`');
            $lookupDataset->addFields(
                array(
                    new IntegerField('idSentidotrafego', true, true, true),
                    new StringField('Sigla'),
                    new StringField('Descricao')
                )
            );
            $lookupDataset->setOrderByField('Descricao', 'ASC');
            $handler = new DynamicSearchHandler($lookupDataset, $this, 'insert_tbl_usuarios_concessionarias_tbl_monitoramento_idSentidotrafego_search', 'idSentidotrafego', 'Descricao', null, 20);
            GetApplication()->RegisterHTTPHandler($handler);
            
            $lookupDataset = new TableDataset(
                MyPDOConnectionFactory::getInstance(),
                GetConnectionOptions(),
                '`tbl_faixas`');
            $lookupDataset->addFields(
                array(
                    new IntegerField('idFaixa', true, true, true),
                    new StringField('DescricaoFaixa'),
                    new IntegerField('Ordem')
                )
            );
            $lookupDataset->setOrderByField('DescricaoFaixa', 'ASC');
            $handler = new DynamicSearchHandler($lookupDataset, $this, 'insert_tbl_usuarios_concessionarias_tbl_monitoramento_idFaixa_search', 'idFaixa', 'DescricaoFaixa', null, 20);
            GetApplication()->RegisterHTTPHandler($handler);
            
            $lookupDataset = new TableDataset(
                MyPDOConnectionFactory::getInstance(),
                GetConnectionOptions(),
                '`tbl_secao_terrapleno`');
            $lookupDataset->addFields(
                array(
                    new IntegerField('idSecao', true, true, true),
                    new StringField('DescricaoSecao'),
                    new StringField('CodSecao')
                )
            );
            $lookupDataset->setOrderByField('DescricaoSecao', 'ASC');
            $handler = new DynamicSearchHandler($lookupDataset, $this, 'insert_tbl_usuarios_concessionarias_tbl_monitoramento_id_secao_terrap_search', 'idSecao', 'DescricaoSecao', null, 20);
            GetApplication()->RegisterHTTPHandler($handler);
            
            $lookupDataset = new TableDataset(
                MyPDOConnectionFactory::getInstance(),
                GetConnectionOptions(),
                '`tbl_tipo_material`');
            $lookupDataset->addFields(
                array(
                    new IntegerField('idMaterial', true, true, true),
                    new StringField('DescricaoMaterial'),
                    new StringField('CodigoMaterial')
                )
            );
            $lookupDataset->setOrderByField('DescricaoMaterial', 'ASC');
            $handler = new DynamicSearchHandler($lookupDataset, $this, 'insert_tbl_usuarios_concessionarias_tbl_monitoramento_tipo_revestimento_search', 'idMaterial', 'DescricaoMaterial', null, 20);
            GetApplication()->RegisterHTTPHandler($handler);
            
            $lookupDataset = new TableDataset(
                MyPDOConnectionFactory::getInstance(),
                GetConnectionOptions(),
                '`tbl_interferencias`');
            $lookupDataset->addFields(
                array(
                    new IntegerField('idInterferencia', true, true, true),
                    new StringField('tipo_interferncia')
                )
            );
            $lookupDataset->setOrderByField('tipo_interferncia', 'ASC');
            $handler = new DynamicSearchHandler($lookupDataset, $this, 'insert_tbl_usuarios_concessionarias_tbl_monitoramento_idInterferencia_search', 'idInterferencia', 'tipo_interferncia', null, 20);
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
            $handler = new DynamicSearchHandler($lookupDataset, $this, 'insert_tbl_usuarios_concessionarias_tbl_monitoramento_id_gerenciador_search', 'idUsuario', 'Nome Operador', null, 20);
            GetApplication()->RegisterHTTPHandler($handler);
            
            $lookupDataset = new TableDataset(
                MyPDOConnectionFactory::getInstance(),
                GetConnectionOptions(),
                '`tbl_ano`');
            $lookupDataset->addFields(
                array(
                    new IntegerField('idtbl_ano', true, true, true),
                    new StringField('ano', true, true)
                )
            );
            $lookupDataset->setOrderByField('ano', 'ASC');
            $handler = new DynamicSearchHandler($lookupDataset, $this, 'insert_tbl_usuarios_concessionarias_tbl_monitoramento_id_anocontratual_search', 'idtbl_ano', 'ano', null, 20);
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
            $lookupDataset->setOrderByField('Lote', 'ASC');
            $handler = new DynamicSearchHandler($lookupDataset, $this, 'filter_builder_tbl_usuarios_concessionarias_tbl_monitoramento_idConcessiona_search', 'idConcessiona', 'Lote', null, 20);
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
            $handler = new DynamicSearchHandler($lookupDataset, $this, 'filter_builder_tbl_usuarios_concessionarias_tbl_monitoramento_id_rodovia_search', 'idRodovia', 'RodoviaSP', null, 20);
            GetApplication()->RegisterHTTPHandler($handler);
            
            $lookupDataset = new TableDataset(
                MyPDOConnectionFactory::getInstance(),
                GetConnectionOptions(),
                '`tbl_vias`');
            $lookupDataset->addFields(
                array(
                    new IntegerField('idVia', true, true, true),
                    new StringField('DescricaoVia'),
                    new IntegerField('Ordem')
                )
            );
            $lookupDataset->setOrderByField('DescricaoVia', 'ASC');
            $handler = new DynamicSearchHandler($lookupDataset, $this, 'filter_builder_tbl_usuarios_concessionarias_tbl_monitoramento_id_via_search', 'idVia', 'DescricaoVia', null, 20);
            GetApplication()->RegisterHTTPHandler($handler);
            
            $lookupDataset = new TableDataset(
                MyPDOConnectionFactory::getInstance(),
                GetConnectionOptions(),
                '`tbl_pistas`');
            $lookupDataset->addFields(
                array(
                    new IntegerField('idPista', true, true, true),
                    new StringField('DescricaoPista'),
                    new IntegerField('Ordem')
                )
            );
            $lookupDataset->setOrderByField('DescricaoPista', 'ASC');
            $handler = new DynamicSearchHandler($lookupDataset, $this, 'filter_builder_tbl_usuarios_concessionarias_tbl_monitoramento_idPista_search', 'idPista', 'DescricaoPista', null, 20);
            GetApplication()->RegisterHTTPHandler($handler);
            
            $lookupDataset = new TableDataset(
                MyPDOConnectionFactory::getInstance(),
                GetConnectionOptions(),
                '`tbl_sentido_trafego`');
            $lookupDataset->addFields(
                array(
                    new IntegerField('idSentidotrafego', true, true, true),
                    new StringField('Sigla'),
                    new StringField('Descricao')
                )
            );
            $lookupDataset->setOrderByField('Descricao', 'ASC');
            $handler = new DynamicSearchHandler($lookupDataset, $this, 'filter_builder_tbl_usuarios_concessionarias_tbl_monitoramento_idSentidotrafego_search', 'idSentidotrafego', 'Descricao', null, 20);
            GetApplication()->RegisterHTTPHandler($handler);
            
            $lookupDataset = new TableDataset(
                MyPDOConnectionFactory::getInstance(),
                GetConnectionOptions(),
                '`tbl_faixas`');
            $lookupDataset->addFields(
                array(
                    new IntegerField('idFaixa', true, true, true),
                    new StringField('DescricaoFaixa'),
                    new IntegerField('Ordem')
                )
            );
            $lookupDataset->setOrderByField('DescricaoFaixa', 'ASC');
            $handler = new DynamicSearchHandler($lookupDataset, $this, 'filter_builder_tbl_usuarios_concessionarias_tbl_monitoramento_idFaixa_search', 'idFaixa', 'DescricaoFaixa', null, 20);
            GetApplication()->RegisterHTTPHandler($handler);
            
            $lookupDataset = new TableDataset(
                MyPDOConnectionFactory::getInstance(),
                GetConnectionOptions(),
                '`tbl_secao_terrapleno`');
            $lookupDataset->addFields(
                array(
                    new IntegerField('idSecao', true, true, true),
                    new StringField('DescricaoSecao'),
                    new StringField('CodSecao')
                )
            );
            $lookupDataset->setOrderByField('DescricaoSecao', 'ASC');
            $handler = new DynamicSearchHandler($lookupDataset, $this, 'filter_builder_tbl_usuarios_concessionarias_tbl_monitoramento_id_secao_terrap_search', 'idSecao', 'DescricaoSecao', null, 20);
            GetApplication()->RegisterHTTPHandler($handler);
            
            $lookupDataset = new TableDataset(
                MyPDOConnectionFactory::getInstance(),
                GetConnectionOptions(),
                '`tbl_tipo_material`');
            $lookupDataset->addFields(
                array(
                    new IntegerField('idMaterial', true, true, true),
                    new StringField('DescricaoMaterial'),
                    new StringField('CodigoMaterial')
                )
            );
            $lookupDataset->setOrderByField('DescricaoMaterial', 'ASC');
            $handler = new DynamicSearchHandler($lookupDataset, $this, 'filter_builder_tbl_usuarios_concessionarias_tbl_monitoramento_tipo_revestimento_search', 'idMaterial', 'DescricaoMaterial', null, 20);
            GetApplication()->RegisterHTTPHandler($handler);
            
            $lookupDataset = new TableDataset(
                MyPDOConnectionFactory::getInstance(),
                GetConnectionOptions(),
                '`tbl_codificacao`');
            $lookupDataset->addFields(
                array(
                    new IntegerField('idCodificacao', true, true, true),
                    new StringField('Sigla', true),
                    new StringField('Descricao'),
                    new StringField('Observacao'),
                    new StringField('Marque')
                )
            );
            $lookupDataset->setOrderByField('Marque', 'ASC');
            $handler = new DynamicSearchHandler($lookupDataset, $this, 'filter_builder_tbl_usuarios_concessionarias_tbl_monitoramento_ID_FI_search', 'idCodificacao', 'Marque', null, 20);
            GetApplication()->RegisterHTTPHandler($handler);
            
            $lookupDataset = new TableDataset(
                MyPDOConnectionFactory::getInstance(),
                GetConnectionOptions(),
                '`tbl_codificacao`');
            $lookupDataset->addFields(
                array(
                    new IntegerField('idCodificacao', true, true, true),
                    new StringField('Sigla', true),
                    new StringField('Descricao'),
                    new StringField('Observacao'),
                    new StringField('Marque')
                )
            );
            $lookupDataset->setOrderByField('Marque', 'ASC');
            $handler = new DynamicSearchHandler($lookupDataset, $this, 'filter_builder_tbl_usuarios_concessionarias_tbl_monitoramento_ID_TTC_search', 'idCodificacao', 'Marque', null, 20);
            GetApplication()->RegisterHTTPHandler($handler);
            
            $lookupDataset = new TableDataset(
                MyPDOConnectionFactory::getInstance(),
                GetConnectionOptions(),
                '`tbl_codificacao`');
            $lookupDataset->addFields(
                array(
                    new IntegerField('idCodificacao', true, true, true),
                    new StringField('Sigla', true),
                    new StringField('Descricao'),
                    new StringField('Observacao'),
                    new StringField('Marque')
                )
            );
            $lookupDataset->setOrderByField('Marque', 'ASC');
            $handler = new DynamicSearchHandler($lookupDataset, $this, 'filter_builder_tbl_usuarios_concessionarias_tbl_monitoramento_ID_TTL_search', 'idCodificacao', 'Marque', null, 20);
            GetApplication()->RegisterHTTPHandler($handler);
            
            $lookupDataset = new TableDataset(
                MyPDOConnectionFactory::getInstance(),
                GetConnectionOptions(),
                '`tbl_codificacao`');
            $lookupDataset->addFields(
                array(
                    new IntegerField('idCodificacao', true, true, true),
                    new StringField('Sigla', true),
                    new StringField('Descricao'),
                    new StringField('Observacao'),
                    new StringField('Marque')
                )
            );
            $lookupDataset->setOrderByField('Marque', 'ASC');
            $handler = new DynamicSearchHandler($lookupDataset, $this, 'filter_builder_tbl_usuarios_concessionarias_tbl_monitoramento_ID_TLC_search', 'idCodificacao', 'Marque', null, 20);
            GetApplication()->RegisterHTTPHandler($handler);
            
            $lookupDataset = new TableDataset(
                MyPDOConnectionFactory::getInstance(),
                GetConnectionOptions(),
                '`tbl_codificacao`');
            $lookupDataset->addFields(
                array(
                    new IntegerField('idCodificacao', true, true, true),
                    new StringField('Sigla', true),
                    new StringField('Descricao'),
                    new StringField('Observacao'),
                    new StringField('Marque')
                )
            );
            $lookupDataset->setOrderByField('Marque', 'ASC');
            $handler = new DynamicSearchHandler($lookupDataset, $this, 'filter_builder_tbl_usuarios_concessionarias_tbl_monitoramento_ID_TLL_search', 'idCodificacao', 'Marque', null, 20);
            GetApplication()->RegisterHTTPHandler($handler);
            
            $lookupDataset = new TableDataset(
                MyPDOConnectionFactory::getInstance(),
                GetConnectionOptions(),
                '`tbl_codificacao`');
            $lookupDataset->addFields(
                array(
                    new IntegerField('idCodificacao', true, true, true),
                    new StringField('Sigla', true),
                    new StringField('Descricao'),
                    new StringField('Observacao'),
                    new StringField('Marque')
                )
            );
            $lookupDataset->setOrderByField('Marque', 'ASC');
            $handler = new DynamicSearchHandler($lookupDataset, $this, 'filter_builder_tbl_usuarios_concessionarias_tbl_monitoramento_ID_TRR_search', 'idCodificacao', 'Marque', null, 20);
            GetApplication()->RegisterHTTPHandler($handler);
            
            $lookupDataset = new TableDataset(
                MyPDOConnectionFactory::getInstance(),
                GetConnectionOptions(),
                '`tbl_codificacao`');
            $lookupDataset->addFields(
                array(
                    new IntegerField('idCodificacao', true, true, true),
                    new StringField('Sigla', true),
                    new StringField('Descricao'),
                    new StringField('Observacao'),
                    new StringField('Marque')
                )
            );
            $lookupDataset->setOrderByField('Marque', 'ASC');
            $handler = new DynamicSearchHandler($lookupDataset, $this, 'filter_builder_tbl_usuarios_concessionarias_tbl_monitoramento_ID_J_search', 'idCodificacao', 'Marque', null, 20);
            GetApplication()->RegisterHTTPHandler($handler);
            
            $lookupDataset = new TableDataset(
                MyPDOConnectionFactory::getInstance(),
                GetConnectionOptions(),
                '`tbl_codificacao`');
            $lookupDataset->addFields(
                array(
                    new IntegerField('idCodificacao', true, true, true),
                    new StringField('Sigla', true),
                    new StringField('Descricao'),
                    new StringField('Observacao'),
                    new StringField('Marque')
                )
            );
            $lookupDataset->setOrderByField('Marque', 'ASC');
            $handler = new DynamicSearchHandler($lookupDataset, $this, 'filter_builder_tbl_usuarios_concessionarias_tbl_monitoramento_ID_TB_search', 'idCodificacao', 'Marque', null, 20);
            GetApplication()->RegisterHTTPHandler($handler);
            
            $lookupDataset = new TableDataset(
                MyPDOConnectionFactory::getInstance(),
                GetConnectionOptions(),
                '`tbl_codificacao`');
            $lookupDataset->addFields(
                array(
                    new IntegerField('idCodificacao', true, true, true),
                    new StringField('Sigla', true),
                    new StringField('Descricao'),
                    new StringField('Observacao'),
                    new StringField('Marque')
                )
            );
            $lookupDataset->setOrderByField('Marque', 'ASC');
            $handler = new DynamicSearchHandler($lookupDataset, $this, 'filter_builder_tbl_usuarios_concessionarias_tbl_monitoramento_ID_JE_search', 'idCodificacao', 'Marque', null, 20);
            GetApplication()->RegisterHTTPHandler($handler);
            
            $lookupDataset = new TableDataset(
                MyPDOConnectionFactory::getInstance(),
                GetConnectionOptions(),
                '`tbl_codificacao`');
            $lookupDataset->addFields(
                array(
                    new IntegerField('idCodificacao', true, true, true),
                    new StringField('Sigla', true),
                    new StringField('Descricao'),
                    new StringField('Observacao'),
                    new StringField('Marque')
                )
            );
            $lookupDataset->setOrderByField('Marque', 'ASC');
            $handler = new DynamicSearchHandler($lookupDataset, $this, 'filter_builder_tbl_usuarios_concessionarias_tbl_monitoramento_ID_TBE_search', 'idCodificacao', 'Marque', null, 20);
            GetApplication()->RegisterHTTPHandler($handler);
            
            $lookupDataset = new TableDataset(
                MyPDOConnectionFactory::getInstance(),
                GetConnectionOptions(),
                '`tbl_codificacao`');
            $lookupDataset->addFields(
                array(
                    new IntegerField('idCodificacao', true, true, true),
                    new StringField('Sigla', true),
                    new StringField('Descricao'),
                    new StringField('Observacao'),
                    new StringField('Marque')
                )
            );
            $lookupDataset->setOrderByField('Marque', 'ASC');
            $handler = new DynamicSearchHandler($lookupDataset, $this, 'filter_builder_tbl_usuarios_concessionarias_tbl_monitoramento_ID_ALP_search', 'idCodificacao', 'Marque', null, 20);
            GetApplication()->RegisterHTTPHandler($handler);
            
            $lookupDataset = new TableDataset(
                MyPDOConnectionFactory::getInstance(),
                GetConnectionOptions(),
                '`tbl_codificacao`');
            $lookupDataset->addFields(
                array(
                    new IntegerField('idCodificacao', true, true, true),
                    new StringField('Sigla', true),
                    new StringField('Descricao'),
                    new StringField('Observacao'),
                    new StringField('Marque')
                )
            );
            $lookupDataset->setOrderByField('Marque', 'ASC');
            $handler = new DynamicSearchHandler($lookupDataset, $this, 'filter_builder_tbl_usuarios_concessionarias_tbl_monitoramento_ID_ATP_search', 'idCodificacao', 'Marque', null, 20);
            GetApplication()->RegisterHTTPHandler($handler);
            
            $lookupDataset = new TableDataset(
                MyPDOConnectionFactory::getInstance(),
                GetConnectionOptions(),
                '`tbl_codificacao`');
            $lookupDataset->addFields(
                array(
                    new IntegerField('idCodificacao', true, true, true),
                    new StringField('Sigla', true),
                    new StringField('Descricao'),
                    new StringField('Observacao'),
                    new StringField('Marque')
                )
            );
            $lookupDataset->setOrderByField('Marque', 'ASC');
            $handler = new DynamicSearchHandler($lookupDataset, $this, 'filter_builder_tbl_usuarios_concessionarias_tbl_monitoramento_ID_O_search', 'idCodificacao', 'Marque', null, 20);
            GetApplication()->RegisterHTTPHandler($handler);
            
            $lookupDataset = new TableDataset(
                MyPDOConnectionFactory::getInstance(),
                GetConnectionOptions(),
                '`tbl_codificacao`');
            $lookupDataset->addFields(
                array(
                    new IntegerField('idCodificacao', true, true, true),
                    new StringField('Sigla', true),
                    new StringField('Descricao'),
                    new StringField('Observacao'),
                    new StringField('Marque')
                )
            );
            $lookupDataset->setOrderByField('Marque', 'ASC');
            $handler = new DynamicSearchHandler($lookupDataset, $this, 'filter_builder_tbl_usuarios_concessionarias_tbl_monitoramento_ID_P_search', 'idCodificacao', 'Marque', null, 20);
            GetApplication()->RegisterHTTPHandler($handler);
            
            $lookupDataset = new TableDataset(
                MyPDOConnectionFactory::getInstance(),
                GetConnectionOptions(),
                '`tbl_codificacao`');
            $lookupDataset->addFields(
                array(
                    new IntegerField('idCodificacao', true, true, true),
                    new StringField('Sigla', true),
                    new StringField('Descricao'),
                    new StringField('Observacao'),
                    new StringField('Marque')
                )
            );
            $lookupDataset->setOrderByField('Marque', 'ASC');
            $handler = new DynamicSearchHandler($lookupDataset, $this, 'filter_builder_tbl_usuarios_concessionarias_tbl_monitoramento_ID_EX_search', 'idCodificacao', 'Marque', null, 20);
            GetApplication()->RegisterHTTPHandler($handler);
            
            $lookupDataset = new TableDataset(
                MyPDOConnectionFactory::getInstance(),
                GetConnectionOptions(),
                '`tbl_codificacao`');
            $lookupDataset->addFields(
                array(
                    new IntegerField('idCodificacao', true, true, true),
                    new StringField('Sigla', true),
                    new StringField('Descricao'),
                    new StringField('Observacao'),
                    new StringField('Marque')
                )
            );
            $lookupDataset->setOrderByField('Marque', 'ASC');
            $handler = new DynamicSearchHandler($lookupDataset, $this, 'filter_builder_tbl_usuarios_concessionarias_tbl_monitoramento_ID_D_search', 'idCodificacao', 'Marque', null, 20);
            GetApplication()->RegisterHTTPHandler($handler);
            
            $lookupDataset = new TableDataset(
                MyPDOConnectionFactory::getInstance(),
                GetConnectionOptions(),
                '`tbl_codificacao`');
            $lookupDataset->addFields(
                array(
                    new IntegerField('idCodificacao', true, true, true),
                    new StringField('Sigla', true),
                    new StringField('Descricao'),
                    new StringField('Observacao'),
                    new StringField('Marque')
                )
            );
            $lookupDataset->setOrderByField('Marque', 'ASC');
            $handler = new DynamicSearchHandler($lookupDataset, $this, 'filter_builder_tbl_usuarios_concessionarias_tbl_monitoramento_ID_R_search', 'idCodificacao', 'Marque', null, 20);
            GetApplication()->RegisterHTTPHandler($handler);
            
            $lookupDataset = new TableDataset(
                MyPDOConnectionFactory::getInstance(),
                GetConnectionOptions(),
                '`tbl_codificacao`');
            $lookupDataset->addFields(
                array(
                    new IntegerField('idCodificacao', true, true, true),
                    new StringField('Sigla', true),
                    new StringField('Descricao'),
                    new StringField('Observacao'),
                    new StringField('Marque')
                )
            );
            $lookupDataset->setOrderByField('Marque', 'ASC');
            $handler = new DynamicSearchHandler($lookupDataset, $this, 'filter_builder_tbl_usuarios_concessionarias_tbl_monitoramento_ID_ALC_search', 'idCodificacao', 'Marque', null, 20);
            GetApplication()->RegisterHTTPHandler($handler);
            
            $lookupDataset = new TableDataset(
                MyPDOConnectionFactory::getInstance(),
                GetConnectionOptions(),
                '`tbl_codificacao`');
            $lookupDataset->addFields(
                array(
                    new IntegerField('idCodificacao', true, true, true),
                    new StringField('Sigla', true),
                    new StringField('Descricao'),
                    new StringField('Observacao'),
                    new StringField('Marque')
                )
            );
            $lookupDataset->setOrderByField('Marque', 'ASC');
            $handler = new DynamicSearchHandler($lookupDataset, $this, 'filter_builder_tbl_usuarios_concessionarias_tbl_monitoramento_ID_ATC_search', 'idCodificacao', 'Marque', null, 20);
            GetApplication()->RegisterHTTPHandler($handler);
            
            $lookupDataset = new TableDataset(
                MyPDOConnectionFactory::getInstance(),
                GetConnectionOptions(),
                '`tbl_codificacao`');
            $lookupDataset->addFields(
                array(
                    new IntegerField('idCodificacao', true, true, true),
                    new StringField('Sigla', true),
                    new StringField('Descricao'),
                    new StringField('Observacao'),
                    new StringField('Marque')
                )
            );
            $lookupDataset->setOrderByField('Marque', 'ASC');
            $handler = new DynamicSearchHandler($lookupDataset, $this, 'filter_builder_tbl_usuarios_concessionarias_tbl_monitoramento_ID_E_search', 'idCodificacao', 'Marque', null, 20);
            GetApplication()->RegisterHTTPHandler($handler);
            
            $lookupDataset = new TableDataset(
                MyPDOConnectionFactory::getInstance(),
                GetConnectionOptions(),
                '`tbl_interferencias`');
            $lookupDataset->addFields(
                array(
                    new IntegerField('idInterferencia', true, true, true),
                    new StringField('tipo_interferncia')
                )
            );
            $lookupDataset->setOrderByField('tipo_interferncia', 'ASC');
            $handler = new DynamicSearchHandler($lookupDataset, $this, 'filter_builder_tbl_usuarios_concessionarias_tbl_monitoramento_idInterferencia_search', 'idInterferencia', 'tipo_interferncia', null, 20);
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
            $handler = new DynamicSearchHandler($lookupDataset, $this, 'filter_builder_tbl_usuarios_concessionarias_tbl_monitoramento_id_gerenciador_search', 'idUsuario', 'Nome Operador', null, 20);
            GetApplication()->RegisterHTTPHandler($handler);
            
            $lookupDataset = new TableDataset(
                MyPDOConnectionFactory::getInstance(),
                GetConnectionOptions(),
                '`tbl_ano`');
            $lookupDataset->addFields(
                array(
                    new IntegerField('idtbl_ano', true, true, true),
                    new StringField('ano', true, true)
                )
            );
            $lookupDataset->setOrderByField('ano', 'ASC');
            $handler = new DynamicSearchHandler($lookupDataset, $this, 'filter_builder_tbl_usuarios_concessionarias_tbl_monitoramento_id_anocontratual_search', 'idtbl_ano', 'ano', null, 20);
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
            $lookupDataset->setOrderByField('Lote', 'ASC');
            $handler = new DynamicSearchHandler($lookupDataset, $this, 'edit_tbl_usuarios_concessionarias_tbl_monitoramento_idConcessiona_search', 'idConcessiona', 'Lote', null, 20);
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
            $handler = new DynamicSearchHandler($lookupDataset, $this, 'edit_tbl_usuarios_concessionarias_tbl_monitoramento_id_rodovia_search', 'idRodovia', 'RodoviaSP', null, 20);
            GetApplication()->RegisterHTTPHandler($handler);
            
            $lookupDataset = new TableDataset(
                MyPDOConnectionFactory::getInstance(),
                GetConnectionOptions(),
                '`tbl_vias`');
            $lookupDataset->addFields(
                array(
                    new IntegerField('idVia', true, true, true),
                    new StringField('DescricaoVia'),
                    new IntegerField('Ordem')
                )
            );
            $lookupDataset->setOrderByField('DescricaoVia', 'ASC');
            $handler = new DynamicSearchHandler($lookupDataset, $this, 'edit_tbl_usuarios_concessionarias_tbl_monitoramento_id_via_search', 'idVia', 'DescricaoVia', null, 20);
            GetApplication()->RegisterHTTPHandler($handler);
            
            $lookupDataset = new TableDataset(
                MyPDOConnectionFactory::getInstance(),
                GetConnectionOptions(),
                '`tbl_pistas`');
            $lookupDataset->addFields(
                array(
                    new IntegerField('idPista', true, true, true),
                    new StringField('DescricaoPista'),
                    new IntegerField('Ordem')
                )
            );
            $lookupDataset->setOrderByField('DescricaoPista', 'ASC');
            $handler = new DynamicSearchHandler($lookupDataset, $this, 'edit_tbl_usuarios_concessionarias_tbl_monitoramento_idPista_search', 'idPista', 'DescricaoPista', null, 20);
            GetApplication()->RegisterHTTPHandler($handler);
            
            $lookupDataset = new TableDataset(
                MyPDOConnectionFactory::getInstance(),
                GetConnectionOptions(),
                '`tbl_sentido_trafego`');
            $lookupDataset->addFields(
                array(
                    new IntegerField('idSentidotrafego', true, true, true),
                    new StringField('Sigla'),
                    new StringField('Descricao')
                )
            );
            $lookupDataset->setOrderByField('Descricao', 'ASC');
            $handler = new DynamicSearchHandler($lookupDataset, $this, 'edit_tbl_usuarios_concessionarias_tbl_monitoramento_idSentidotrafego_search', 'idSentidotrafego', 'Descricao', null, 20);
            GetApplication()->RegisterHTTPHandler($handler);
            
            $lookupDataset = new TableDataset(
                MyPDOConnectionFactory::getInstance(),
                GetConnectionOptions(),
                '`tbl_faixas`');
            $lookupDataset->addFields(
                array(
                    new IntegerField('idFaixa', true, true, true),
                    new StringField('DescricaoFaixa'),
                    new IntegerField('Ordem')
                )
            );
            $lookupDataset->setOrderByField('DescricaoFaixa', 'ASC');
            $handler = new DynamicSearchHandler($lookupDataset, $this, 'edit_tbl_usuarios_concessionarias_tbl_monitoramento_idFaixa_search', 'idFaixa', 'DescricaoFaixa', null, 20);
            GetApplication()->RegisterHTTPHandler($handler);
            
            $lookupDataset = new TableDataset(
                MyPDOConnectionFactory::getInstance(),
                GetConnectionOptions(),
                '`tbl_secao_terrapleno`');
            $lookupDataset->addFields(
                array(
                    new IntegerField('idSecao', true, true, true),
                    new StringField('DescricaoSecao'),
                    new StringField('CodSecao')
                )
            );
            $lookupDataset->setOrderByField('DescricaoSecao', 'ASC');
            $handler = new DynamicSearchHandler($lookupDataset, $this, 'edit_tbl_usuarios_concessionarias_tbl_monitoramento_id_secao_terrap_search', 'idSecao', 'DescricaoSecao', null, 20);
            GetApplication()->RegisterHTTPHandler($handler);
            
            $lookupDataset = new TableDataset(
                MyPDOConnectionFactory::getInstance(),
                GetConnectionOptions(),
                '`tbl_tipo_material`');
            $lookupDataset->addFields(
                array(
                    new IntegerField('idMaterial', true, true, true),
                    new StringField('DescricaoMaterial'),
                    new StringField('CodigoMaterial')
                )
            );
            $lookupDataset->setOrderByField('DescricaoMaterial', 'ASC');
            $handler = new DynamicSearchHandler($lookupDataset, $this, 'edit_tbl_usuarios_concessionarias_tbl_monitoramento_tipo_revestimento_search', 'idMaterial', 'DescricaoMaterial', null, 20);
            GetApplication()->RegisterHTTPHandler($handler);
            
            $lookupDataset = new TableDataset(
                MyPDOConnectionFactory::getInstance(),
                GetConnectionOptions(),
                '`tbl_interferencias`');
            $lookupDataset->addFields(
                array(
                    new IntegerField('idInterferencia', true, true, true),
                    new StringField('tipo_interferncia')
                )
            );
            $lookupDataset->setOrderByField('tipo_interferncia', 'ASC');
            $handler = new DynamicSearchHandler($lookupDataset, $this, 'edit_tbl_usuarios_concessionarias_tbl_monitoramento_idInterferencia_search', 'idInterferencia', 'tipo_interferncia', null, 20);
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
            $handler = new DynamicSearchHandler($lookupDataset, $this, 'edit_tbl_usuarios_concessionarias_tbl_monitoramento_id_gerenciador_search', 'idUsuario', 'Nome Operador', null, 20);
            GetApplication()->RegisterHTTPHandler($handler);
            
            $lookupDataset = new TableDataset(
                MyPDOConnectionFactory::getInstance(),
                GetConnectionOptions(),
                '`tbl_ano`');
            $lookupDataset->addFields(
                array(
                    new IntegerField('idtbl_ano', true, true, true),
                    new StringField('ano', true, true)
                )
            );
            $lookupDataset->setOrderByField('ano', 'ASC');
            $handler = new DynamicSearchHandler($lookupDataset, $this, 'edit_tbl_usuarios_concessionarias_tbl_monitoramento_id_anocontratual_search', 'idtbl_ano', 'ano', null, 20);
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
            $lookupDataset->setOrderByField('Lote', 'ASC');
            $handler = new DynamicSearchHandler($lookupDataset, $this, 'multi_edit_tbl_usuarios_concessionarias_tbl_monitoramento_idConcessiona_search', 'idConcessiona', 'Lote', null, 20);
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
            $handler = new DynamicSearchHandler($lookupDataset, $this, 'multi_edit_tbl_usuarios_concessionarias_tbl_monitoramento_id_rodovia_search', 'idRodovia', 'RodoviaSP', null, 20);
            GetApplication()->RegisterHTTPHandler($handler);
            
            $lookupDataset = new TableDataset(
                MyPDOConnectionFactory::getInstance(),
                GetConnectionOptions(),
                '`tbl_vias`');
            $lookupDataset->addFields(
                array(
                    new IntegerField('idVia', true, true, true),
                    new StringField('DescricaoVia'),
                    new IntegerField('Ordem')
                )
            );
            $lookupDataset->setOrderByField('DescricaoVia', 'ASC');
            $handler = new DynamicSearchHandler($lookupDataset, $this, 'multi_edit_tbl_usuarios_concessionarias_tbl_monitoramento_id_via_search', 'idVia', 'DescricaoVia', null, 20);
            GetApplication()->RegisterHTTPHandler($handler);
            
            $lookupDataset = new TableDataset(
                MyPDOConnectionFactory::getInstance(),
                GetConnectionOptions(),
                '`tbl_pistas`');
            $lookupDataset->addFields(
                array(
                    new IntegerField('idPista', true, true, true),
                    new StringField('DescricaoPista'),
                    new IntegerField('Ordem')
                )
            );
            $lookupDataset->setOrderByField('DescricaoPista', 'ASC');
            $handler = new DynamicSearchHandler($lookupDataset, $this, 'multi_edit_tbl_usuarios_concessionarias_tbl_monitoramento_idPista_search', 'idPista', 'DescricaoPista', null, 20);
            GetApplication()->RegisterHTTPHandler($handler);
            
            $lookupDataset = new TableDataset(
                MyPDOConnectionFactory::getInstance(),
                GetConnectionOptions(),
                '`tbl_sentido_trafego`');
            $lookupDataset->addFields(
                array(
                    new IntegerField('idSentidotrafego', true, true, true),
                    new StringField('Sigla'),
                    new StringField('Descricao')
                )
            );
            $lookupDataset->setOrderByField('Descricao', 'ASC');
            $handler = new DynamicSearchHandler($lookupDataset, $this, 'multi_edit_tbl_usuarios_concessionarias_tbl_monitoramento_idSentidotrafego_search', 'idSentidotrafego', 'Descricao', null, 20);
            GetApplication()->RegisterHTTPHandler($handler);
            
            $lookupDataset = new TableDataset(
                MyPDOConnectionFactory::getInstance(),
                GetConnectionOptions(),
                '`tbl_faixas`');
            $lookupDataset->addFields(
                array(
                    new IntegerField('idFaixa', true, true, true),
                    new StringField('DescricaoFaixa'),
                    new IntegerField('Ordem')
                )
            );
            $lookupDataset->setOrderByField('DescricaoFaixa', 'ASC');
            $handler = new DynamicSearchHandler($lookupDataset, $this, 'multi_edit_tbl_usuarios_concessionarias_tbl_monitoramento_idFaixa_search', 'idFaixa', 'DescricaoFaixa', null, 20);
            GetApplication()->RegisterHTTPHandler($handler);
            
            $lookupDataset = new TableDataset(
                MyPDOConnectionFactory::getInstance(),
                GetConnectionOptions(),
                '`tbl_secao_terrapleno`');
            $lookupDataset->addFields(
                array(
                    new IntegerField('idSecao', true, true, true),
                    new StringField('DescricaoSecao'),
                    new StringField('CodSecao')
                )
            );
            $lookupDataset->setOrderByField('DescricaoSecao', 'ASC');
            $handler = new DynamicSearchHandler($lookupDataset, $this, 'multi_edit_tbl_usuarios_concessionarias_tbl_monitoramento_id_secao_terrap_search', 'idSecao', 'DescricaoSecao', null, 20);
            GetApplication()->RegisterHTTPHandler($handler);
            
            $lookupDataset = new TableDataset(
                MyPDOConnectionFactory::getInstance(),
                GetConnectionOptions(),
                '`tbl_tipo_material`');
            $lookupDataset->addFields(
                array(
                    new IntegerField('idMaterial', true, true, true),
                    new StringField('DescricaoMaterial'),
                    new StringField('CodigoMaterial')
                )
            );
            $lookupDataset->setOrderByField('DescricaoMaterial', 'ASC');
            $handler = new DynamicSearchHandler($lookupDataset, $this, 'multi_edit_tbl_usuarios_concessionarias_tbl_monitoramento_tipo_revestimento_search', 'idMaterial', 'DescricaoMaterial', null, 20);
            GetApplication()->RegisterHTTPHandler($handler);
            
            $lookupDataset = new TableDataset(
                MyPDOConnectionFactory::getInstance(),
                GetConnectionOptions(),
                '`tbl_interferencias`');
            $lookupDataset->addFields(
                array(
                    new IntegerField('idInterferencia', true, true, true),
                    new StringField('tipo_interferncia')
                )
            );
            $lookupDataset->setOrderByField('tipo_interferncia', 'ASC');
            $handler = new DynamicSearchHandler($lookupDataset, $this, 'multi_edit_tbl_usuarios_concessionarias_tbl_monitoramento_idInterferencia_search', 'idInterferencia', 'tipo_interferncia', null, 20);
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
            $handler = new DynamicSearchHandler($lookupDataset, $this, 'multi_edit_tbl_usuarios_concessionarias_tbl_monitoramento_id_gerenciador_search', 'idUsuario', 'Nome Operador', null, 20);
            GetApplication()->RegisterHTTPHandler($handler);
            
            $lookupDataset = new TableDataset(
                MyPDOConnectionFactory::getInstance(),
                GetConnectionOptions(),
                '`tbl_ano`');
            $lookupDataset->addFields(
                array(
                    new IntegerField('idtbl_ano', true, true, true),
                    new StringField('ano', true, true)
                )
            );
            $lookupDataset->setOrderByField('ano', 'ASC');
            $handler = new DynamicSearchHandler($lookupDataset, $this, 'multi_edit_tbl_usuarios_concessionarias_tbl_monitoramento_id_anocontratual_search', 'idtbl_ano', 'ano', null, 20);
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
            if ($part == PagePart::Grid && $mode == PageMode::ViewAll)
              $result = 'import_grid.tpl';
              
              
               if ($part == PagePart::PrintLayout && $mode == PageMode::PrintAll)
              $result = 'page_igg.tpl';
              
              if ($part == PagePart::Grid && $mode == PageMode::PrintAll)
              $result = 'grid_igg.tpl';
              
               if ($part == PagePart::PrintLayout && $mode == PageMode::PrintDetailPage)
              $result = 'detail_page_igg.tpl';
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
            $layout->setMode(FormLayoutMode::VERTICAL);
                            
                            $commonGroup = $layout->addGroup('-',12);
                       //     $commonGroup->addRow()
                       //         ->addCol($columns['id_gerenciador'], 2);
                            $commonGroup->addRow()
                               // ->addCol($columns['id_gerenciador'], 2)
                                ->addCol($columns['idConcessiona'], 1)
                                ->addCol($columns['id_rodovia'], 1)
                                 ->addCol($columns['id_via'], 2)
                                ->addCol($columns['idPista'], 2)
                                ->addCol($columns['idSentidotrafego'], 2)
                                 ->addCol($columns['km_referencia'], 2);
                            /*$commonGroup->addRow()
                                ->addCol($columns['idConcessiona'], 2)
                                ->addCol($columns['id_rodovia'], 2);*/
                           /* $commonGroup->addRow()
                                ->addCol($columns['id_via'], 2)
                                ->addCol($columns['idPista'], 2)
                                ->addCol($columns['idSentido'], 2);*/
                            
                            $dimensionGroup = $layout->addGroup('');
                            $dimensionGroup->addRow()
                               // ->addCol($columns['km_referencia'], 2)
                                ->addCol($columns['alca_ramo'], 2)
                                ->addCol($columns['idFaixa'], 2)
                                ->addCol($columns['id_km'], 2)
                                ->addCol($columns['id_secao_terrap'], 2)
                                ->addCol($columns['tipo_revestimento'], 2)
                                ->addCol($columns['Ok'], 2);
                           /* $dimensionGroup->addRow()
                                ->addCol($columns['tipo_revestimento'], 2)
                                ->addCol($columns['Ok'], 2);*/
                            
                            
                            $displayGroup = $layout->addGroup('-');
                            $displayGroup->addRow()
                                ->addCol($columns['ID_FI'], 1)
                                 ->addCol($columns['ID_TTC'], 1)
                                ->addCol($columns['ID_TTL'], 1)
                                 ->addCol($columns['ID_TLC'], 1)
                                  ->addCol($columns['ID_TLL'], 1)
                                ->addCol($columns['ID_TRR'], 1)
                                 ->addCol($columns['ID_J'], 1)
                                 ->addCol($columns['ID_TB'], 1)
                                  ->addCol($columns['ID_JE'],1)
                                ->addCol($columns['ID_TBE'], 1)
                                ->addCol($columns['ID_ALP'], 1)
                                ->addCol($columns['ID_ATP'], 1)
                                ;
                               /* $displayGroup->addRow()
                                ->addCol($columns['ID_TTC'], 2)
                                ->addCol($columns['ID_TTL'], 2)
                                 ->addCol($columns['ID_TLC'], 2)
                                  ->addCol($columns['ID_TLL'], 2)
                                ->addCol($columns['ID_TRR'], 2);*/
                                
                              /*  $displayGroup->addRow()
                                ->addCol($columns['ID_J'], 2)
                                 ->addCol($columns['ID_TB'], 2)
                                  ->addCol($columns['ID_JE'], 2)
                                ->addCol($columns['ID_TBE'], 2);*/
                               
                                $displayGroup->addRow()
                                ->addCol($columns['ID_O'], 1)
                                ->addCol($columns['ID_P'], 1)
                                ->addCol($columns['ID_EX'], 1)
                                ->addCol($columns['ID_D'], 1)
                                ->addCol($columns['ID_R'], 1)
                                ->addCol($columns['ID_ALC'], 1)
                                ->addCol($columns['ID_ATC'], 1)
                                ->addCol($columns['ID_E'], 1);
                                
                              /*  $displayGroup->addRow()
                                ->addCol($columns['ID_EX'], 1)
                                ->addCol($columns['ID_D'], 1)
                                ->addCol($columns['ID_R'], 1)
                                ->addCol($columns['ID_ALC'], 1)
                                ->addCol($columns['ID_ATC'], 1)
                                ->addCol($columns['ID_E'], 1);*/
                                //->addCol($columns['idTiposecaolongarina'], 2); 
                                
                            $displayGroup->addRow()
                                ->addCol($columns['FL_TRE'], 2)
                                ->addCol($columns['FL_TRI'], 2)
                                ->addCol($columns['ID_FC2'], 2)
                                ->addCol($columns['ID_FC3'], 2)
                                 ->addCol($columns['PA'], 2)
                                ->addCol($columns['AT_ON'], 2);
                            
                            // Placing multiple groups in a row
                            //$hardwareGroup = $layout->addGroup('-', 6);
                    //        $hardwareGroup->addRow()->addCol($columns[''], 2)
                           // $hardwareGroup->addRow()->addCol($columns['idlongarinas'], 2);
                           // $hardwareGroup->addRow()->addCol($columns['idTiposecaolongarina'], 2);
                           // $hardwareGroup->addRow()->addCol($columns['idtransversinas'], 2);
                            //$hardwareGroup->addRow()->addCol($columns['idjuntas'], 2);
                            
                            $softwareGroup = $layout->addGroup('-');
                            $softwareGroup->addRow()->addCol($columns['dtRegistro'], 2)
                            ->addCol($columns['Hora'], 2);
                            
                            
                            // Placing 3 editors in a row
                            $storageGroup = $layout->addGroup('');
                            $storageGroup->addRow()
                                ->addCol($columns['Observacoes'], 6);
                               // ->addCol($columns[''], 2);
                                
                                 $cameraGroup = $layout->addGroup('-', 12);
                            $cameraGroup->addRow()
                                ->addCol($columns['idInterferencia'], 4);
                         /*       ->addCol($columns['storage_max'], 4)
                                ->addCol($columns['storage_external'], 4);
                            
                            $cameraGroup = $layout->addGroup('Camera', 12);
                            $cameraGroup->addRow()
                                ->addCol($columns['camera_resolution'], 4)
                                ->addCol($columns['camera_video_max_x'], 4)
                                ->addCol($columns['camera_video_max_y'], 4);
                            
                            
                            $batteryGroup = $layout->addGroup('Battery', 12);
                            $batteryGroup->addRow()
                                ->addCol($columns['battery_type'], 6)
                                ->addCol($columns['battery_standby_max_time'], 6);
                            $batteryGroup->addRow()
                                ->addCol($columns['battery_talk_max_time'], 6)
                                ->addCol($columns['battery_music_play_max_time'], 6);*/
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
    
    
    
    class tbl_usuarios_concessionarias_tbl_rodoviasPage extends DetailPage
    {
        protected function DoBeforeCreate()
        {
            $this->SetTitle('Tbl Rodovias');
            $this->SetMenuLabel('Tbl Rodovias');
    
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
                new FilterColumn($this->dataset, 'idRodovia', 'idRodovia', 'Id Rodovia'),
                new FilterColumn($this->dataset, 'CodRodovia', 'CodRodovia', 'Cod Rodovia'),
                new FilterColumn($this->dataset, 'RodoviaSP', 'RodoviaSP', 'Rodovia SP'),
                new FilterColumn($this->dataset, 'NameRodovia', 'NameRodovia', 'Nome Rodovia'),
                new FilterColumn($this->dataset, 'lote', 'lote', 'Lote'),
                new FilterColumn($this->dataset, 'Extensao', 'Extensao', 'Extensão'),
                new FilterColumn($this->dataset, 'km_inicial', 'km_inicial', 'Km Inicial'),
                new FilterColumn($this->dataset, 'km_final', 'km_final', 'Km Final'),
                new FilterColumn($this->dataset, 'id_concessionaria', 'id_concessionaria', 'Id Concessionaria'),
                new FilterColumn($this->dataset, 'DenominacaoRodovia', 'DenominacaoRodovia', 'Denominacao Rodovia'),
                new FilterColumn($this->dataset, 'Trecho', 'Trecho', 'Trecho')
            );
        }
    
        protected function setupQuickFilter(QuickFilter $quickFilter, FixedKeysArray $columns)
        {
            $quickFilter
                ->addColumn($columns['idRodovia'])
                ->addColumn($columns['CodRodovia'])
                ->addColumn($columns['RodoviaSP'])
                ->addColumn($columns['NameRodovia'])
                ->addColumn($columns['lote'])
                ->addColumn($columns['Extensao'])
                ->addColumn($columns['km_inicial'])
                ->addColumn($columns['km_final'])
                ->addColumn($columns['id_concessionaria'])
                ->addColumn($columns['DenominacaoRodovia'])
                ->addColumn($columns['Trecho']);
        }
    
        protected function setupColumnFilter(ColumnFilter $columnFilter)
        {
    
        }
    
        protected function setupFilterBuilder(FilterBuilder $filterBuilder, FixedKeysArray $columns)
        {
            $main_editor = new TextEdit('idrodovia_edit');
            $main_editor->SetMaxLength(6);
            
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
            
            $main_editor = new TextEdit('rodoviasp_edit');
            $main_editor->SetMaxLength(45);
            
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
            
            $main_editor = new TextEdit('extensao_edit');
            
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
            
            $main_editor = new TextEdit('id_concessionaria_edit');
            
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
            // View column for RodoviaSP field
            //
            $column = new TextViewColumn('RodoviaSP', 'RodoviaSP', 'Rodovia SP', $this->dataset);
            $column->SetOrderable(true);
            $column->setMinimalVisibility(ColumnVisibility::PHONE);
            $column->SetDescription('');
            $column->SetFixedWidth(null);
            $grid->AddViewColumn($column);
            
            //
            // View column for NameRodovia field
            //
            $column = new TextViewColumn('NameRodovia', 'NameRodovia', 'Nome Rodovia', $this->dataset);
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
            
            //
            // View column for Extensao field
            //
            $column = new NumberViewColumn('Extensao', 'Extensao', 'Extensão', $this->dataset);
            $column->SetOrderable(true);
            $column->setNumberAfterDecimal(2);
            $column->setThousandsSeparator('.');
            $column->setDecimalSeparator(',');
            $column->setMinimalVisibility(ColumnVisibility::PHONE);
            $column->SetDescription('');
            $column->SetFixedWidth(null);
            $grid->AddViewColumn($column);
            
            //
            // View column for km_inicial field
            //
            $column = new NumberViewColumn('km_inicial', 'km_inicial', 'Km Inicial', $this->dataset);
            $column->SetOrderable(true);
            $column->setNumberAfterDecimal(2);
            $column->setThousandsSeparator('.');
            $column->setDecimalSeparator(',');
            $column->setMinimalVisibility(ColumnVisibility::PHONE);
            $column->SetDescription('');
            $column->SetFixedWidth(null);
            $grid->AddViewColumn($column);
            
            //
            // View column for km_final field
            //
            $column = new NumberViewColumn('km_final', 'km_final', 'Km Final', $this->dataset);
            $column->SetOrderable(true);
            $column->setNumberAfterDecimal(2);
            $column->setThousandsSeparator('.');
            $column->setDecimalSeparator(',');
            $column->setMinimalVisibility(ColumnVisibility::PHONE);
            $column->SetDescription('');
            $column->SetFixedWidth(null);
            $grid->AddViewColumn($column);
            
            //
            // View column for DenominacaoRodovia field
            //
            $column = new TextViewColumn('DenominacaoRodovia', 'DenominacaoRodovia', 'Denominacao Rodovia', $this->dataset);
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
        }
    
        protected function AddSingleRecordViewColumns(Grid $grid)
        {
            //
            // View column for idRodovia field
            //
            $column = new TextViewColumn('idRodovia', 'idRodovia', 'Id Rodovia', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddSingleRecordViewColumn($column);
            
            //
            // View column for CodRodovia field
            //
            $column = new TextViewColumn('CodRodovia', 'CodRodovia', 'Cod Rodovia', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddSingleRecordViewColumn($column);
            
            //
            // View column for RodoviaSP field
            //
            $column = new TextViewColumn('RodoviaSP', 'RodoviaSP', 'Rodovia SP', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddSingleRecordViewColumn($column);
            
            //
            // View column for NameRodovia field
            //
            $column = new TextViewColumn('NameRodovia', 'NameRodovia', 'Nome Rodovia', $this->dataset);
            $column->SetOrderable(true);
            $column->SetMaxLength(75);
            $grid->AddSingleRecordViewColumn($column);
            
            //
            // View column for lote field
            //
            $column = new TextViewColumn('lote', 'lote', 'Lote', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddSingleRecordViewColumn($column);
            
            //
            // View column for Extensao field
            //
            $column = new NumberViewColumn('Extensao', 'Extensao', 'Extensão', $this->dataset);
            $column->SetOrderable(true);
            $column->setNumberAfterDecimal(2);
            $column->setThousandsSeparator('.');
            $column->setDecimalSeparator(',');
            $grid->AddSingleRecordViewColumn($column);
            
            //
            // View column for km_inicial field
            //
            $column = new NumberViewColumn('km_inicial', 'km_inicial', 'Km Inicial', $this->dataset);
            $column->SetOrderable(true);
            $column->setNumberAfterDecimal(2);
            $column->setThousandsSeparator('.');
            $column->setDecimalSeparator(',');
            $grid->AddSingleRecordViewColumn($column);
            
            //
            // View column for km_final field
            //
            $column = new NumberViewColumn('km_final', 'km_final', 'Km Final', $this->dataset);
            $column->SetOrderable(true);
            $column->setNumberAfterDecimal(2);
            $column->setThousandsSeparator('.');
            $column->setDecimalSeparator(',');
            $grid->AddSingleRecordViewColumn($column);
            
            //
            // View column for id_concessionaria field
            //
            $column = new NumberViewColumn('id_concessionaria', 'id_concessionaria', 'Id Concessionaria', $this->dataset);
            $column->SetOrderable(true);
            $column->setNumberAfterDecimal(0);
            $column->setThousandsSeparator('.');
            $column->setDecimalSeparator('');
            $grid->AddSingleRecordViewColumn($column);
            
            //
            // View column for DenominacaoRodovia field
            //
            $column = new TextViewColumn('DenominacaoRodovia', 'DenominacaoRodovia', 'Denominacao Rodovia', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddSingleRecordViewColumn($column);
            
            //
            // View column for Trecho field
            //
            $column = new TextViewColumn('Trecho', 'Trecho', 'Trecho', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddSingleRecordViewColumn($column);
        }
    
        protected function AddEditColumns(Grid $grid)
        {
            //
            // Edit column for idRodovia field
            //
            $editor = new TextEdit('idrodovia_edit');
            $editor->SetMaxLength(6);
            $editColumn = new CustomEditColumn('Id Rodovia', 'idRodovia', $editor, $this->dataset);
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
            // Edit column for RodoviaSP field
            //
            $editor = new TextEdit('rodoviasp_edit');
            $editor->SetMaxLength(45);
            $editColumn = new CustomEditColumn('Rodovia SP', 'RodoviaSP', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddEditColumn($editColumn);
            
            //
            // Edit column for NameRodovia field
            //
            $editor = new TextAreaEdit('namerodovia_edit', 50, 8);
            $editColumn = new CustomEditColumn('Nome Rodovia', 'NameRodovia', $editor, $this->dataset);
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
            
            //
            // Edit column for Extensao field
            //
            $editor = new TextEdit('extensao_edit');
            $editColumn = new CustomEditColumn('Extensão', 'Extensao', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddEditColumn($editColumn);
            
            //
            // Edit column for km_inicial field
            //
            $editor = new TextEdit('km_inicial_edit');
            $editColumn = new CustomEditColumn('Km Inicial', 'km_inicial', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddEditColumn($editColumn);
            
            //
            // Edit column for km_final field
            //
            $editor = new TextEdit('km_final_edit');
            $editColumn = new CustomEditColumn('Km Final', 'km_final', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddEditColumn($editColumn);
            
            //
            // Edit column for id_concessionaria field
            //
            $editor = new TextEdit('id_concessionaria_edit');
            $editColumn = new CustomEditColumn('Id Concessionaria', 'id_concessionaria', $editor, $this->dataset);
            $editColumn->setVisible(false);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddEditColumn($editColumn);
            
            //
            // Edit column for DenominacaoRodovia field
            //
            $editor = new TextEdit('denominacaorodovia_edit');
            $editor->SetMaxLength(50);
            $editColumn = new CustomEditColumn('Denominacao Rodovia', 'DenominacaoRodovia', $editor, $this->dataset);
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
        }
    
        protected function AddMultiEditColumns(Grid $grid)
        {
            //
            // Edit column for RodoviaSP field
            //
            $editor = new TextEdit('rodoviasp_edit');
            $editor->SetMaxLength(45);
            $editColumn = new CustomEditColumn('Rodovia SP', 'RodoviaSP', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddMultiEditColumn($editColumn);
            
            //
            // Edit column for NameRodovia field
            //
            $editor = new TextAreaEdit('namerodovia_edit', 50, 8);
            $editColumn = new CustomEditColumn('Nome Rodovia', 'NameRodovia', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddMultiEditColumn($editColumn);
            
            //
            // Edit column for Extensao field
            //
            $editor = new TextEdit('extensao_edit');
            $editColumn = new CustomEditColumn('Extensão', 'Extensao', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddMultiEditColumn($editColumn);
            
            //
            // Edit column for km_inicial field
            //
            $editor = new TextEdit('km_inicial_edit');
            $editColumn = new CustomEditColumn('Km Inicial', 'km_inicial', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddMultiEditColumn($editColumn);
            
            //
            // Edit column for km_final field
            //
            $editor = new TextEdit('km_final_edit');
            $editColumn = new CustomEditColumn('Km Final', 'km_final', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddMultiEditColumn($editColumn);
            
            //
            // Edit column for id_concessionaria field
            //
            $editor = new TextEdit('id_concessionaria_edit');
            $editColumn = new CustomEditColumn('Id Concessionaria', 'id_concessionaria', $editor, $this->dataset);
            $editColumn->setVisible(false);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddMultiEditColumn($editColumn);
            
            //
            // Edit column for DenominacaoRodovia field
            //
            $editor = new TextEdit('denominacaorodovia_edit');
            $editor->SetMaxLength(50);
            $editColumn = new CustomEditColumn('Denominacao Rodovia', 'DenominacaoRodovia', $editor, $this->dataset);
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
        }
    
        protected function AddInsertColumns(Grid $grid)
        {
            //
            // Edit column for idRodovia field
            //
            $editor = new TextEdit('idrodovia_edit');
            $editor->SetMaxLength(6);
            $editColumn = new CustomEditColumn('Id Rodovia', 'idRodovia', $editor, $this->dataset);
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
            // Edit column for RodoviaSP field
            //
            $editor = new TextEdit('rodoviasp_edit');
            $editor->SetMaxLength(45);
            $editColumn = new CustomEditColumn('Rodovia SP', 'RodoviaSP', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddInsertColumn($editColumn);
            
            //
            // Edit column for NameRodovia field
            //
            $editor = new TextAreaEdit('namerodovia_edit', 50, 8);
            $editColumn = new CustomEditColumn('Nome Rodovia', 'NameRodovia', $editor, $this->dataset);
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
            
            //
            // Edit column for Extensao field
            //
            $editor = new TextEdit('extensao_edit');
            $editColumn = new CustomEditColumn('Extensão', 'Extensao', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddInsertColumn($editColumn);
            
            //
            // Edit column for km_inicial field
            //
            $editor = new TextEdit('km_inicial_edit');
            $editColumn = new CustomEditColumn('Km Inicial', 'km_inicial', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddInsertColumn($editColumn);
            
            //
            // Edit column for km_final field
            //
            $editor = new TextEdit('km_final_edit');
            $editColumn = new CustomEditColumn('Km Final', 'km_final', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddInsertColumn($editColumn);
            
            //
            // Edit column for id_concessionaria field
            //
            $editor = new TextEdit('id_concessionaria_edit');
            $editColumn = new CustomEditColumn('Id Concessionaria', 'id_concessionaria', $editor, $this->dataset);
            $editColumn->setVisible(false);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddInsertColumn($editColumn);
            
            //
            // Edit column for DenominacaoRodovia field
            //
            $editor = new TextEdit('denominacaorodovia_edit');
            $editor->SetMaxLength(50);
            $editColumn = new CustomEditColumn('Denominacao Rodovia', 'DenominacaoRodovia', $editor, $this->dataset);
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
            $column = new TextViewColumn('idRodovia', 'idRodovia', 'Id Rodovia', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddPrintColumn($column);
            
            //
            // View column for CodRodovia field
            //
            $column = new TextViewColumn('CodRodovia', 'CodRodovia', 'Cod Rodovia', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddPrintColumn($column);
            
            //
            // View column for RodoviaSP field
            //
            $column = new TextViewColumn('RodoviaSP', 'RodoviaSP', 'Rodovia SP', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddPrintColumn($column);
            
            //
            // View column for NameRodovia field
            //
            $column = new TextViewColumn('NameRodovia', 'NameRodovia', 'Nome Rodovia', $this->dataset);
            $column->SetOrderable(true);
            $column->SetMaxLength(75);
            $grid->AddPrintColumn($column);
            
            //
            // View column for lote field
            //
            $column = new TextViewColumn('lote', 'lote', 'Lote', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddPrintColumn($column);
            
            //
            // View column for Extensao field
            //
            $column = new NumberViewColumn('Extensao', 'Extensao', 'Extensão', $this->dataset);
            $column->SetOrderable(true);
            $column->setNumberAfterDecimal(2);
            $column->setThousandsSeparator('.');
            $column->setDecimalSeparator(',');
            $grid->AddPrintColumn($column);
            
            //
            // View column for km_inicial field
            //
            $column = new NumberViewColumn('km_inicial', 'km_inicial', 'Km Inicial', $this->dataset);
            $column->SetOrderable(true);
            $column->setNumberAfterDecimal(2);
            $column->setThousandsSeparator('.');
            $column->setDecimalSeparator(',');
            $grid->AddPrintColumn($column);
            
            //
            // View column for km_final field
            //
            $column = new NumberViewColumn('km_final', 'km_final', 'Km Final', $this->dataset);
            $column->SetOrderable(true);
            $column->setNumberAfterDecimal(2);
            $column->setThousandsSeparator('.');
            $column->setDecimalSeparator(',');
            $grid->AddPrintColumn($column);
            
            //
            // View column for id_concessionaria field
            //
            $column = new NumberViewColumn('id_concessionaria', 'id_concessionaria', 'Id Concessionaria', $this->dataset);
            $column->SetOrderable(true);
            $column->setNumberAfterDecimal(0);
            $column->setThousandsSeparator('.');
            $column->setDecimalSeparator('');
            $grid->AddPrintColumn($column);
            
            //
            // View column for DenominacaoRodovia field
            //
            $column = new TextViewColumn('DenominacaoRodovia', 'DenominacaoRodovia', 'Denominacao Rodovia', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddPrintColumn($column);
            
            //
            // View column for Trecho field
            //
            $column = new TextViewColumn('Trecho', 'Trecho', 'Trecho', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddPrintColumn($column);
        }
    
        protected function AddExportColumns(Grid $grid)
        {
            //
            // View column for idRodovia field
            //
            $column = new TextViewColumn('idRodovia', 'idRodovia', 'Id Rodovia', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddExportColumn($column);
            
            //
            // View column for CodRodovia field
            //
            $column = new TextViewColumn('CodRodovia', 'CodRodovia', 'Cod Rodovia', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddExportColumn($column);
            
            //
            // View column for RodoviaSP field
            //
            $column = new TextViewColumn('RodoviaSP', 'RodoviaSP', 'Rodovia SP', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddExportColumn($column);
            
            //
            // View column for NameRodovia field
            //
            $column = new TextViewColumn('NameRodovia', 'NameRodovia', 'Nome Rodovia', $this->dataset);
            $column->SetOrderable(true);
            $column->SetMaxLength(75);
            $grid->AddExportColumn($column);
            
            //
            // View column for lote field
            //
            $column = new TextViewColumn('lote', 'lote', 'Lote', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddExportColumn($column);
            
            //
            // View column for Extensao field
            //
            $column = new NumberViewColumn('Extensao', 'Extensao', 'Extensão', $this->dataset);
            $column->SetOrderable(true);
            $column->setNumberAfterDecimal(2);
            $column->setThousandsSeparator('.');
            $column->setDecimalSeparator(',');
            $grid->AddExportColumn($column);
            
            //
            // View column for km_inicial field
            //
            $column = new NumberViewColumn('km_inicial', 'km_inicial', 'Km Inicial', $this->dataset);
            $column->SetOrderable(true);
            $column->setNumberAfterDecimal(2);
            $column->setThousandsSeparator('.');
            $column->setDecimalSeparator(',');
            $grid->AddExportColumn($column);
            
            //
            // View column for km_final field
            //
            $column = new NumberViewColumn('km_final', 'km_final', 'Km Final', $this->dataset);
            $column->SetOrderable(true);
            $column->setNumberAfterDecimal(2);
            $column->setThousandsSeparator('.');
            $column->setDecimalSeparator(',');
            $grid->AddExportColumn($column);
            
            //
            // View column for id_concessionaria field
            //
            $column = new NumberViewColumn('id_concessionaria', 'id_concessionaria', 'Id Concessionaria', $this->dataset);
            $column->SetOrderable(true);
            $column->setNumberAfterDecimal(0);
            $column->setThousandsSeparator('.');
            $column->setDecimalSeparator('');
            $grid->AddExportColumn($column);
            
            //
            // View column for DenominacaoRodovia field
            //
            $column = new TextViewColumn('DenominacaoRodovia', 'DenominacaoRodovia', 'Denominacao Rodovia', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddExportColumn($column);
            
            //
            // View column for Trecho field
            //
            $column = new TextViewColumn('Trecho', 'Trecho', 'Trecho', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddExportColumn($column);
        }
    
        private function AddCompareColumns(Grid $grid)
        {
            //
            // View column for idRodovia field
            //
            $column = new TextViewColumn('idRodovia', 'idRodovia', 'Id Rodovia', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddCompareColumn($column);
            
            //
            // View column for CodRodovia field
            //
            $column = new TextViewColumn('CodRodovia', 'CodRodovia', 'Cod Rodovia', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddCompareColumn($column);
            
            //
            // View column for RodoviaSP field
            //
            $column = new TextViewColumn('RodoviaSP', 'RodoviaSP', 'Rodovia SP', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddCompareColumn($column);
            
            //
            // View column for NameRodovia field
            //
            $column = new TextViewColumn('NameRodovia', 'NameRodovia', 'Nome Rodovia', $this->dataset);
            $column->SetOrderable(true);
            $column->SetMaxLength(75);
            $grid->AddCompareColumn($column);
            
            //
            // View column for lote field
            //
            $column = new TextViewColumn('lote', 'lote', 'Lote', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddCompareColumn($column);
            
            //
            // View column for Extensao field
            //
            $column = new NumberViewColumn('Extensao', 'Extensao', 'Extensão', $this->dataset);
            $column->SetOrderable(true);
            $column->setNumberAfterDecimal(2);
            $column->setThousandsSeparator('.');
            $column->setDecimalSeparator(',');
            $grid->AddCompareColumn($column);
            
            //
            // View column for km_inicial field
            //
            $column = new NumberViewColumn('km_inicial', 'km_inicial', 'Km Inicial', $this->dataset);
            $column->SetOrderable(true);
            $column->setNumberAfterDecimal(2);
            $column->setThousandsSeparator('.');
            $column->setDecimalSeparator(',');
            $grid->AddCompareColumn($column);
            
            //
            // View column for km_final field
            //
            $column = new NumberViewColumn('km_final', 'km_final', 'Km Final', $this->dataset);
            $column->SetOrderable(true);
            $column->setNumberAfterDecimal(2);
            $column->setThousandsSeparator('.');
            $column->setDecimalSeparator(',');
            $grid->AddCompareColumn($column);
            
            //
            // View column for id_concessionaria field
            //
            $column = new NumberViewColumn('id_concessionaria', 'id_concessionaria', 'Id Concessionaria', $this->dataset);
            $column->SetOrderable(true);
            $column->setNumberAfterDecimal(0);
            $column->setThousandsSeparator('.');
            $column->setDecimalSeparator('');
            $grid->AddCompareColumn($column);
            
            //
            // View column for DenominacaoRodovia field
            //
            $column = new TextViewColumn('DenominacaoRodovia', 'DenominacaoRodovia', 'Denominacao Rodovia', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddCompareColumn($column);
            
            //
            // View column for Trecho field
            //
            $column = new TextViewColumn('Trecho', 'Trecho', 'Trecho', $this->dataset);
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
    
    
    
    class tbl_usuarios_concessionariasPage extends Page
    {
        protected function DoBeforeCreate()
        {
            $this->SetTitle('OLD_IGG CONCESSIONÁRIA');
            $this->SetMenuLabel('OLD_IGG CONCESSIONÁRIA');
    
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
            $this->dataset->AddCustomCondition(EnvVariablesUtils::EvaluateVariableTemplate($this->GetColumnVariableContainer(), 'SELECT id_usuario_cs = $userId'));
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
                ->setOptionsFor('id_concessionaria');
        }
    
        protected function setupFilterBuilder(FilterBuilder $filterBuilder, FixedKeysArray $columns)
        {
            $main_editor = new DynamicCombobox('id_concessionaria_edit', $this->CreateLinkBuilder());
            $main_editor->setAllowClear(true);
            $main_editor->setMinimumInputLength(0);
            $main_editor->SetAllowNullValue(false);
            $main_editor->SetHandlerName('filter_builder_tbl_usuarios_concessionarias_id_concessionaria_search');
            
            $multi_value_select_editor = new RemoteMultiValueSelect('id_concessionaria', $this->CreateLinkBuilder());
            $multi_value_select_editor->SetHandlerName('filter_builder_tbl_usuarios_concessionarias_id_concessionaria_search');
            
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
            $main_editor->SetHandlerName('filter_builder_tbl_usuarios_concessionarias_id_usuario_cs_search');
            
            $multi_value_select_editor = new RemoteMultiValueSelect('id_usuario_cs', $this->CreateLinkBuilder());
            $multi_value_select_editor->SetHandlerName('filter_builder_tbl_usuarios_concessionarias_id_usuario_cs_search');
            
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
            if (GetCurrentUserPermissionsForPage('tbl_usuarios_concessionarias.tbl_monitoramento')->HasViewGrant() && $withDetails)
            {
            //
            // View column for tbl_usuarios_concessionarias_tbl_monitoramento detail
            //
            $column = new DetailColumn(array('id_concessionaria'), 'tbl_usuarios_concessionarias.tbl_monitoramento', 'tbl_usuarios_concessionarias_tbl_monitoramento_handler', $this->dataset, 'MONITORAMENTO IGG');
            $column->setMinimalVisibility(ColumnVisibility::PHONE);
            $grid->AddViewColumn($column);
            }
            
            if (GetCurrentUserPermissionsForPage('tbl_usuarios_concessionarias.tbl_rodovias')->HasViewGrant() && $withDetails)
            {
            //
            // View column for tbl_usuarios_concessionarias_tbl_rodovias detail
            //
            $column = new DetailColumn(array('id_concessionaria'), 'tbl_usuarios_concessionarias.tbl_rodovias', 'tbl_usuarios_concessionarias_tbl_rodovias_handler', $this->dataset, 'Tbl Rodovias');
            $column->setMinimalVisibility(ColumnVisibility::PHONE);
            $grid->AddViewColumn($column);
            }
            
            //
            // View column for NomeConcessionaria field
            //
            $column = new TextViewColumn('id_concessionaria', 'id_concessionaria_NomeConcessionaria', 'Concessionária', $this->dataset);
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
            $editColumn = new DynamicLookupEditColumn('Concessionária', 'id_concessionaria', 'id_concessionaria_NomeConcessionaria', 'edit_tbl_usuarios_concessionarias_id_concessionaria_search', $editor, $this->dataset, $lookupDataset, 'idConcessiona', 'NomeConcessionaria', '');
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
            $editColumn = new DynamicLookupEditColumn('Usuário', 'id_usuario_cs', 'id_usuario_cs_Usuario', 'edit_tbl_usuarios_concessionarias_id_usuario_cs_search', $editor, $this->dataset, $lookupDataset, 'idUsuario', 'Usuario', '');
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
            $editColumn = new DynamicLookupEditColumn('Concessionária', 'id_concessionaria', 'id_concessionaria_NomeConcessionaria', 'insert_tbl_usuarios_concessionarias_id_concessionaria_search', $editor, $this->dataset, $lookupDataset, 'idConcessiona', 'NomeConcessionaria', '');
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
            $editColumn = new DynamicLookupEditColumn('Usuário', 'id_usuario_cs', 'id_usuario_cs_Usuario', 'insert_tbl_usuarios_concessionarias_id_usuario_cs_search', $editor, $this->dataset, $lookupDataset, 'idUsuario', 'Usuario', '');
            $editColumn->SetInsertDefaultValue('%CURRENT_USER_ID%');
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
            $detailPage = new tbl_usuarios_concessionarias_tbl_monitoramentoPage('tbl_usuarios_concessionarias_tbl_monitoramento', $this, array('idConcessiona'), array('id_concessionaria'), $this->GetForeignKeyFields(), $this->CreateMasterDetailRecordGrid(), $this->dataset, GetCurrentUserPermissionsForPage('tbl_usuarios_concessionarias.tbl_monitoramento'), 'UTF-8');
            $detailPage->SetRecordPermission(GetCurrentUserRecordPermissionsForDataSource('tbl_usuarios_concessionarias.tbl_monitoramento'));
            $detailPage->SetHttpHandlerName('tbl_usuarios_concessionarias_tbl_monitoramento_handler');
            $handler = new PageHTTPHandler('tbl_usuarios_concessionarias_tbl_monitoramento_handler', $detailPage);
            GetApplication()->RegisterHTTPHandler($handler);
            
            $detailPage = new tbl_usuarios_concessionarias_tbl_rodoviasPage('tbl_usuarios_concessionarias_tbl_rodovias', $this, array('id_concessionaria'), array('id_concessionaria'), $this->GetForeignKeyFields(), $this->CreateMasterDetailRecordGrid(), $this->dataset, GetCurrentUserPermissionsForPage('tbl_usuarios_concessionarias.tbl_rodovias'), 'UTF-8');
            $detailPage->SetRecordPermission(GetCurrentUserRecordPermissionsForDataSource('tbl_usuarios_concessionarias.tbl_rodovias'));
            $detailPage->SetHttpHandlerName('tbl_usuarios_concessionarias_tbl_rodovias_handler');
            $handler = new PageHTTPHandler('tbl_usuarios_concessionarias_tbl_rodovias_handler', $detailPage);
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
            $handler = new DynamicSearchHandler($lookupDataset, $this, 'insert_tbl_usuarios_concessionarias_id_concessionaria_search', 'idConcessiona', 'NomeConcessionaria', null, 20);
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
            $handler = new DynamicSearchHandler($lookupDataset, $this, 'insert_tbl_usuarios_concessionarias_id_usuario_cs_search', 'idUsuario', 'Usuario', null, 20);
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
            $handler = new DynamicSearchHandler($lookupDataset, $this, 'filter_builder_tbl_usuarios_concessionarias_id_concessionaria_search', 'idConcessiona', 'NomeConcessionaria', null, 20);
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
            $handler = new DynamicSearchHandler($lookupDataset, $this, 'filter_builder_tbl_usuarios_concessionarias_id_usuario_cs_search', 'idUsuario', 'Usuario', null, 20);
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
            $handler = new DynamicSearchHandler($lookupDataset, $this, 'edit_tbl_usuarios_concessionarias_id_concessionaria_search', 'idConcessiona', 'NomeConcessionaria', null, 20);
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
            $handler = new DynamicSearchHandler($lookupDataset, $this, 'edit_tbl_usuarios_concessionarias_id_usuario_cs_search', 'idUsuario', 'Usuario', null, 20);
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

    SetUpUserAuthorization();

    try
    {
        $Page = new tbl_usuarios_concessionariasPage("tbl_usuarios_concessionarias", "tbl_usuarios_concessionarias.php", GetCurrentUserPermissionsForPage("tbl_usuarios_concessionarias"), 'UTF-8');
        $Page->SetRecordPermission(GetCurrentUserRecordPermissionsForDataSource("tbl_usuarios_concessionarias"));
        GetApplication()->SetMainPage($Page);
        GetApplication()->Run();
    }
    catch(Exception $e)
    {
        ShowErrorPage($e);
    }
	
