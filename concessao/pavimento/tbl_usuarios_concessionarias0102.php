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
    
    
    
    class tbl_usuarios_concessionarias03_tbl_ano_contratual_monitoramento_iggPage extends DetailPage
    {
        protected function DoBeforeCreate()
        {
            $this->SetTitle('MONITORAMENTO IGG');
            $this->SetMenuLabel('MONITORAMENTO IGG');
    
            $selectQuery = 'SELECT * FROM retorno_monitoramento_igg';
            $insertQuery = array();
            $updateQuery = array();
            $deleteQuery = array();
            $this->dataset = new QueryDataset(
              MyPDOConnectionFactory::getInstance(), 
              GetConnectionOptions(),
              $selectQuery, $insertQuery, $updateQuery, $deleteQuery, 'monitoramento_igg');
            $this->dataset->addFields(
                array(
                    new IntegerField('id_concessionaria', false, true),
                    new IntegerField('idanocontratual', false, true),
                    new StringField('idtbl_ano', false, true),
                    new IntegerField('idMonitoramento', false, true, true),
                    new StringField('id_gerenciador'),
                    new IntegerField('idConcessiona'),
                    new StringField('id_rodovia'),
                    new IntegerField('idPista'),
                    new IntegerField('idSentidotrafego'),
                    new StringField('km_referencia'),
                    new StringField('alca_ramo'),
                    new IntegerField('idFaixa'),
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
                    new DateField('dtRegistro'),
                    new StringField('Hora'),
                    new StringField('Observacoes'),
                    new IntegerField('idInterferencia'),
                    new IntegerField('id_km'),
                    new StringField('id_anocontratual'),
                    new StringField('marco_km'),
                    new StringField('latitude'),
                    new StringField('longitude'),
                    new StringField('Observacoe2'),
                    new StringField('id_via'),
                    new StringField('revisao')
                )
            );
            $this->dataset->AddLookupField('id_gerenciador', 'tbl_usuarios', new IntegerField('idUsuario'), new StringField('Nome Operador', false, false, false, false, 'id_gerenciador_Nome Operador', 'id_gerenciador_Nome Operador_tbl_usuarios'), 'id_gerenciador_Nome Operador_tbl_usuarios');
            $this->dataset->AddLookupField('idConcessiona', 'tbl_concessionarias', new IntegerField('idConcessiona'), new StringField('Lote', false, false, false, false, 'idConcessiona_Lote', 'idConcessiona_Lote_tbl_concessionarias'), 'idConcessiona_Lote_tbl_concessionarias');
            $this->dataset->AddLookupField('idPista', 'tbl_pistas', new IntegerField('idPista'), new StringField('DescricaoPista', false, false, false, false, 'idPista_DescricaoPista', 'idPista_DescricaoPista_tbl_pistas'), 'idPista_DescricaoPista_tbl_pistas');
            $this->dataset->AddLookupField('idSentidotrafego', 'tbl_sentido_trafego', new IntegerField('idSentidotrafego'), new StringField('Descricao', false, false, false, false, 'idSentidotrafego_Descricao', 'idSentidotrafego_Descricao_tbl_sentido_trafego'), 'idSentidotrafego_Descricao_tbl_sentido_trafego');
            $this->dataset->AddLookupField('idFaixa', 'tbl_faixas', new IntegerField('idFaixa'), new StringField('DescricaoFaixa', false, false, false, false, 'idFaixa_DescricaoFaixa', 'idFaixa_DescricaoFaixa_tbl_faixas'), 'idFaixa_DescricaoFaixa_tbl_faixas');
            $this->dataset->AddLookupField('id_via', 'tbl_vias', new IntegerField('idVia'), new StringField('DescricaoVia', false, false, false, false, 'id_via_DescricaoVia', 'id_via_DescricaoVia_tbl_vias'), 'id_via_DescricaoVia_tbl_vias');
            $this->dataset->AddLookupField('id_secao_terrap', 'tbl_secao_terrapleno', new IntegerField('idSecao'), new StringField('DescricaoSecao', false, false, false, false, 'id_secao_terrap_DescricaoSecao', 'id_secao_terrap_DescricaoSecao_tbl_secao_terrapleno'), 'id_secao_terrap_DescricaoSecao_tbl_secao_terrapleno');
            $this->dataset->AddLookupField('tipo_revestimento', 'tbl_tipo_material', new IntegerField('idMaterial'), new StringField('DescricaoMaterial', false, false, false, false, 'tipo_revestimento_DescricaoMaterial', 'tipo_revestimento_DescricaoMaterial_tbl_tipo_material'), 'tipo_revestimento_DescricaoMaterial_tbl_tipo_material');
            $this->dataset->AddLookupField('idInterferencia', 'tbl_interferencias', new IntegerField('idInterferencia'), new StringField('tipo_interferncia', false, false, false, false, 'idInterferencia_tipo_interferncia', 'idInterferencia_tipo_interferncia_tbl_interferencias'), 'idInterferencia_tipo_interferncia_tbl_interferencias');
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
                new FilterColumn($this->dataset, 'idMonitoramento', 'idMonitoramento', 'Ficha Nº'),
                new FilterColumn($this->dataset, 'id_gerenciador', 'id_gerenciador_Nome Operador', 'Usuário'),
                new FilterColumn($this->dataset, 'idConcessiona', 'idConcessiona_Lote', 'Lote'),
                new FilterColumn($this->dataset, 'id_rodovia', 'id_rodovia', 'Rodovia'),
                new FilterColumn($this->dataset, 'idPista', 'idPista_DescricaoPista', 'Pista'),
                new FilterColumn($this->dataset, 'idSentidotrafego', 'idSentidotrafego_Descricao', 'Sentido tráfego (quilometragem)'),
                new FilterColumn($this->dataset, 'km_referencia', 'km_referencia', 'Km Referencia'),
                new FilterColumn($this->dataset, 'alca_ramo', 'alca_ramo', 'Alca Ramo'),
                new FilterColumn($this->dataset, 'idFaixa', 'idFaixa_DescricaoFaixa', 'Faixa'),
                new FilterColumn($this->dataset, 'id_via', 'id_via_DescricaoVia', 'Via'),
                new FilterColumn($this->dataset, 'id_secao_terrap', 'id_secao_terrap_DescricaoSecao', 'Seção Terrap.'),
                new FilterColumn($this->dataset, 'tipo_revestimento', 'tipo_revestimento_DescricaoMaterial', 'Tipo Revestimento'),
                new FilterColumn($this->dataset, 'Ok', 'Ok', 'Ok'),
                new FilterColumn($this->dataset, 'ID_FI', 'ID_FI', 'ID FI'),
                new FilterColumn($this->dataset, 'ID_TTC', 'ID_TTC', 'ID TTC'),
                new FilterColumn($this->dataset, 'ID_TTL', 'ID_TTL', 'ID TTL'),
                new FilterColumn($this->dataset, 'ID_TLC', 'ID_TLC', 'ID TLC'),
                new FilterColumn($this->dataset, 'ID_TLL', 'ID_TLL', 'ID TLL'),
                new FilterColumn($this->dataset, 'ID_TRR', 'ID_TRR', 'ID TRR'),
                new FilterColumn($this->dataset, 'ID_J', 'ID_J', 'ID J'),
                new FilterColumn($this->dataset, 'ID_TB', 'ID_TB', 'ID TB'),
                new FilterColumn($this->dataset, 'ID_JE', 'ID_JE', 'ID JE'),
                new FilterColumn($this->dataset, 'ID_TBE', 'ID_TBE', 'ID TBE'),
                new FilterColumn($this->dataset, 'ID_ALP', 'ID_ALP', 'ID ALP'),
                new FilterColumn($this->dataset, 'ID_ATP', 'ID_ATP', 'ID ATP'),
                new FilterColumn($this->dataset, 'ID_O', 'ID_O', 'ID O'),
                new FilterColumn($this->dataset, 'ID_P', 'ID_P', 'ID P'),
                new FilterColumn($this->dataset, 'ID_EX', 'ID_EX', 'ID EX'),
                new FilterColumn($this->dataset, 'ID_D', 'ID_D', 'ID D'),
                new FilterColumn($this->dataset, 'ID_R', 'ID_R', 'ID R'),
                new FilterColumn($this->dataset, 'ID_ALC', 'ID_ALC', 'ID ALC'),
                new FilterColumn($this->dataset, 'ID_ATC', 'ID_ATC', 'ID ATC'),
                new FilterColumn($this->dataset, 'ID_E', 'ID_E', 'ID E'),
                new FilterColumn($this->dataset, 'FL_TRE', 'FL_TRE', 'FL TRE'),
                new FilterColumn($this->dataset, 'FL_TRI', 'FL_TRI', 'FL TRI'),
                new FilterColumn($this->dataset, 'ID_FC2', 'ID_FC2', 'ID FC2'),
                new FilterColumn($this->dataset, 'ID_FC3', 'ID_FC3', 'ID FC3'),
                new FilterColumn($this->dataset, 'PA', 'PA', 'PA'),
                new FilterColumn($this->dataset, 'AT_ON', 'AT_ON', 'AT ON'),
                new FilterColumn($this->dataset, 'dtRegistro', 'dtRegistro', 'Data Registro'),
                new FilterColumn($this->dataset, 'Hora', 'Hora', 'Hora'),
                new FilterColumn($this->dataset, 'Observacoes', 'Observacoes', 'Observacoes'),
                new FilterColumn($this->dataset, 'idInterferencia', 'idInterferencia_tipo_interferncia', 'Interferência'),
                new FilterColumn($this->dataset, 'id_km', 'id_km', 'Km'),
                new FilterColumn($this->dataset, 'id_anocontratual', 'id_anocontratual', 'Ano'),
                new FilterColumn($this->dataset, 'marco_km', 'marco_km', 'Marco Km'),
                new FilterColumn($this->dataset, 'latitude', 'latitude', 'Latitude'),
                new FilterColumn($this->dataset, 'longitude', 'longitude', 'Longitude'),
                new FilterColumn($this->dataset, 'Observacoe2', 'Observacoe2', 'Observações'),
                new FilterColumn($this->dataset, 'revisao', 'revisao', 'Revisão'),
                new FilterColumn($this->dataset, 'idanocontratual', 'idanocontratual', 'Idanocontratual'),
                new FilterColumn($this->dataset, 'id_concessionaria', 'id_concessionaria', 'Id Concessionaria'),
                new FilterColumn($this->dataset, 'idtbl_ano', 'idtbl_ano', 'Idtbl Ano')
            );
        }
    
        protected function setupQuickFilter(QuickFilter $quickFilter, FixedKeysArray $columns)
        {
            $quickFilter
                ->addColumn($columns['idMonitoramento'])
                ->addColumn($columns['id_gerenciador'])
                ->addColumn($columns['idConcessiona'])
                ->addColumn($columns['id_rodovia'])
                ->addColumn($columns['idPista'])
                ->addColumn($columns['idSentidotrafego'])
                ->addColumn($columns['km_referencia'])
                ->addColumn($columns['alca_ramo'])
                ->addColumn($columns['idFaixa'])
                ->addColumn($columns['id_via'])
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
                ->addColumn($columns['id_km'])
                ->addColumn($columns['id_anocontratual'])
                ->addColumn($columns['marco_km'])
                ->addColumn($columns['latitude'])
                ->addColumn($columns['longitude'])
                ->addColumn($columns['Observacoe2'])
                ->addColumn($columns['revisao'])
                ->addColumn($columns['idanocontratual'])
                ->addColumn($columns['id_concessionaria'])
                ->addColumn($columns['idtbl_ano']);
        }
    
        protected function setupColumnFilter(ColumnFilter $columnFilter)
        {
            $columnFilter
                ->setOptionsFor('idConcessiona')
                ->setOptionsFor('id_rodovia')
                ->setOptionsFor('idPista')
                ->setOptionsFor('idFaixa')
                ->setOptionsFor('id_via')
                ->setOptionsFor('id_secao_terrap')
                ->setOptionsFor('tipo_revestimento')
                ->setOptionsFor('dtRegistro')
                ->setOptionsFor('idInterferencia')
                ->setOptionsFor('id_anocontratual');
        }
    
        protected function setupFilterBuilder(FilterBuilder $filterBuilder, FixedKeysArray $columns)
        {
            $main_editor = new SpinEdit('idmonitoramento_edit');
            
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
            
            $main_editor = new DynamicCombobox('id_gerenciador_edit', $this->CreateLinkBuilder());
            $main_editor->setAllowClear(true);
            $main_editor->setMinimumInputLength(0);
            $main_editor->SetAllowNullValue(false);
            $main_editor->SetHandlerName('filter_builder_tbl_usuarios_concessionarias03_tbl_ano_contratual_monitoramento_igg_id_gerenciador_search');
            
            $multi_value_select_editor = new RemoteMultiValueSelect('id_gerenciador', $this->CreateLinkBuilder());
            $multi_value_select_editor->SetHandlerName('filter_builder_tbl_usuarios_concessionarias03_tbl_ano_contratual_monitoramento_igg_id_gerenciador_search');
            
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
            
            $main_editor = new DynamicCombobox('idconcessiona_edit', $this->CreateLinkBuilder());
            $main_editor->setAllowClear(true);
            $main_editor->setMinimumInputLength(0);
            $main_editor->SetAllowNullValue(false);
            $main_editor->SetHandlerName('filter_builder_tbl_usuarios_concessionarias03_tbl_ano_contratual_monitoramento_igg_idConcessiona_search');
            
            $multi_value_select_editor = new RemoteMultiValueSelect('idConcessiona', $this->CreateLinkBuilder());
            $multi_value_select_editor->SetHandlerName('filter_builder_tbl_usuarios_concessionarias03_tbl_ano_contratual_monitoramento_igg_idConcessiona_search');
            
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
                    FilterConditionOperator::IN => $multi_value_select_editor,
                    FilterConditionOperator::NOT_IN => $multi_value_select_editor,
                    FilterConditionOperator::IS_BLANK => null,
                    FilterConditionOperator::IS_NOT_BLANK => null
                )
            );
            
            $main_editor = new TextEdit('id_rodovia_edit');
            
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
            
            $main_editor = new DynamicCombobox('idpista_edit', $this->CreateLinkBuilder());
            $main_editor->setAllowClear(true);
            $main_editor->setMinimumInputLength(0);
            $main_editor->SetAllowNullValue(false);
            $main_editor->SetHandlerName('filter_builder_tbl_usuarios_concessionarias03_tbl_ano_contratual_monitoramento_igg_idPista_search');
            
            $multi_value_select_editor = new RemoteMultiValueSelect('idPista', $this->CreateLinkBuilder());
            $multi_value_select_editor->SetHandlerName('filter_builder_tbl_usuarios_concessionarias03_tbl_ano_contratual_monitoramento_igg_idPista_search');
            
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
            $main_editor->SetHandlerName('filter_builder_tbl_usuarios_concessionarias03_tbl_ano_contratual_monitoramento_igg_idSentidotrafego_search');
            
            $multi_value_select_editor = new RemoteMultiValueSelect('idSentidotrafego', $this->CreateLinkBuilder());
            $multi_value_select_editor->SetHandlerName('filter_builder_tbl_usuarios_concessionarias03_tbl_ano_contratual_monitoramento_igg_idSentidotrafego_search');
            
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
                    FilterConditionOperator::IN => $multi_value_select_editor,
                    FilterConditionOperator::NOT_IN => $multi_value_select_editor,
                    FilterConditionOperator::IS_BLANK => null,
                    FilterConditionOperator::IS_NOT_BLANK => null
                )
            );
            
            $main_editor = new TextEdit('km_referencia_edit');
            
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
            $main_editor->SetHandlerName('filter_builder_tbl_usuarios_concessionarias03_tbl_ano_contratual_monitoramento_igg_idFaixa_search');
            
            $multi_value_select_editor = new RemoteMultiValueSelect('idFaixa', $this->CreateLinkBuilder());
            $multi_value_select_editor->SetHandlerName('filter_builder_tbl_usuarios_concessionarias03_tbl_ano_contratual_monitoramento_igg_idFaixa_search');
            
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
            $main_editor->SetHandlerName('filter_builder_tbl_usuarios_concessionarias03_tbl_ano_contratual_monitoramento_igg_id_via_search');
            
            $multi_value_select_editor = new RemoteMultiValueSelect('id_via', $this->CreateLinkBuilder());
            $multi_value_select_editor->SetHandlerName('filter_builder_tbl_usuarios_concessionarias03_tbl_ano_contratual_monitoramento_igg_id_via_search');
            
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
            
            $main_editor = new DynamicCombobox('id_secao_terrap_edit', $this->CreateLinkBuilder());
            $main_editor->setAllowClear(true);
            $main_editor->setMinimumInputLength(0);
            $main_editor->SetAllowNullValue(false);
            $main_editor->SetHandlerName('filter_builder_tbl_usuarios_concessionarias03_tbl_ano_contratual_monitoramento_igg_id_secao_terrap_search');
            
            $multi_value_select_editor = new RemoteMultiValueSelect('id_secao_terrap', $this->CreateLinkBuilder());
            $multi_value_select_editor->SetHandlerName('filter_builder_tbl_usuarios_concessionarias03_tbl_ano_contratual_monitoramento_igg_id_secao_terrap_search');
            
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
            $main_editor->SetHandlerName('filter_builder_tbl_usuarios_concessionarias03_tbl_ano_contratual_monitoramento_igg_tipo_revestimento_search');
            
            $multi_value_select_editor = new RemoteMultiValueSelect('tipo_revestimento', $this->CreateLinkBuilder());
            $multi_value_select_editor->SetHandlerName('filter_builder_tbl_usuarios_concessionarias03_tbl_ano_contratual_monitoramento_igg_tipo_revestimento_search');
            
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
            
            $main_editor = new TextEdit('id_fi_edit');
            
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
            
            $main_editor = new TextEdit('id_ttc_edit');
            
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
            
            $main_editor = new TextEdit('id_ttl_edit');
            
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
            
            $main_editor = new TextEdit('id_tlc_edit');
            
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
            
            $main_editor = new TextEdit('id_tll_edit');
            
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
            
            $main_editor = new TextEdit('id_trr_edit');
            
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
            
            $main_editor = new TextEdit('id_j_edit');
            
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
            
            $main_editor = new TextEdit('id_tb_edit');
            
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
            
            $main_editor = new TextEdit('id_je_edit');
            
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
            
            $main_editor = new TextEdit('id_tbe_edit');
            
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
            
            $main_editor = new TextEdit('id_alp_edit');
            
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
            
            $main_editor = new TextEdit('id_atp_edit');
            
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
            
            $main_editor = new TextEdit('id_o_edit');
            
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
            
            $main_editor = new TextEdit('id_p_edit');
            
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
            
            $main_editor = new TextEdit('id_ex_edit');
            
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
            
            $main_editor = new TextEdit('id_d_edit');
            
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
            
            $main_editor = new TextEdit('id_r_edit');
            
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
            
            $main_editor = new TextEdit('id_alc_edit');
            
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
            
            $main_editor = new TextEdit('id_atc_edit');
            
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
            
            $main_editor = new TextEdit('id_e_edit');
            
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
            
            $main_editor = new TextEdit('observacoes_edit');
            
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
            $main_editor->SetHandlerName('filter_builder_tbl_usuarios_concessionarias03_tbl_ano_contratual_monitoramento_igg_idInterferencia_search');
            
            $multi_value_select_editor = new RemoteMultiValueSelect('idInterferencia', $this->CreateLinkBuilder());
            $multi_value_select_editor->SetHandlerName('filter_builder_tbl_usuarios_concessionarias03_tbl_ano_contratual_monitoramento_igg_idInterferencia_search');
            
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
            
            $main_editor = new TextEdit('id_anocontratual_edit');
            
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
            
            $main_editor = new TextEdit('marco_km_edit');
            
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
            
            $main_editor = new TextEdit('idanocontratual_edit');
            
            $filterBuilder->addColumn(
                $columns['idanocontratual'],
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
            
            $main_editor = new SpinEdit('id_concessionaria_edit');
            
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
            
            $main_editor = new TextEdit('idtbl_ano_edit');
            
            $filterBuilder->addColumn(
                $columns['idtbl_ano'],
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
            // View column for id_rodovia field
            //
            $column = new TextViewColumn('id_rodovia', 'id_rodovia', 'Rodovia', $this->dataset);
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
            // View column for DescricaoFaixa field
            //
            $column = new TextViewColumn('idFaixa', 'idFaixa_DescricaoFaixa', 'Faixa', $this->dataset);
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
            // View column for id_km field
            //
            $column = new NumberViewColumn('id_km', 'id_km', 'Km', $this->dataset);
            $column->SetOrderable(true);
            $column->setNumberAfterDecimal(2);
            $column->setThousandsSeparator('.');
            $column->setDecimalSeparator(',');
            $column->setMinimalVisibility(ColumnVisibility::PHONE);
            $column->SetDescription('');
            $column->SetFixedWidth(null);
            $grid->AddViewColumn($column);
            
            //
            // View column for id_anocontratual field
            //
            $column = new TextViewColumn('id_anocontratual', 'id_anocontratual', 'Ano', $this->dataset);
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
            // View column for id_concessionaria field
            //
            $column = new NumberViewColumn('id_concessionaria', 'id_concessionaria', 'Id Concessionaria', $this->dataset);
            $column->SetOrderable(true);
            $column->setNumberAfterDecimal(0);
            $column->setThousandsSeparator('.');
            $column->setDecimalSeparator('');
            $column->setMinimalVisibility(ColumnVisibility::PHONE);
            $column->SetDescription('');
            $column->SetFixedWidth(null);
            $grid->AddViewColumn($column);
            
            //
            // View column for idtbl_ano field
            //
            $column = new TextViewColumn('idtbl_ano', 'idtbl_ano', 'Idtbl Ano', $this->dataset);
            $column->SetOrderable(true);
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
            $column = new NumberViewColumn('idMonitoramento', 'idMonitoramento', 'Ficha Nº', $this->dataset);
            $column->SetOrderable(true);
            $column->setNumberAfterDecimal(0);
            $column->setThousandsSeparator('.');
            $column->setDecimalSeparator('');
            $grid->AddSingleRecordViewColumn($column);
            
            //
            // View column for Nome Operador field
            //
            $column = new TextViewColumn('id_gerenciador', 'id_gerenciador_Nome Operador', 'Usuário', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddSingleRecordViewColumn($column);
            
            //
            // View column for Lote field
            //
            $column = new TextViewColumn('idConcessiona', 'idConcessiona_Lote', 'Lote', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddSingleRecordViewColumn($column);
            
            //
            // View column for id_rodovia field
            //
            $column = new TextViewColumn('id_rodovia', 'id_rodovia', 'Rodovia', $this->dataset);
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
            $column = new TextViewColumn('km_referencia', 'km_referencia', 'Km Referencia', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddSingleRecordViewColumn($column);
            
            //
            // View column for alca_ramo field
            //
            $column = new TextViewColumn('alca_ramo', 'alca_ramo', 'Alca Ramo', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddSingleRecordViewColumn($column);
            
            //
            // View column for DescricaoFaixa field
            //
            $column = new TextViewColumn('idFaixa', 'idFaixa_DescricaoFaixa', 'Faixa', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddSingleRecordViewColumn($column);
            
            //
            // View column for DescricaoVia field
            //
            $column = new TextViewColumn('id_via', 'id_via_DescricaoVia', 'Via', $this->dataset);
            $column->SetOrderable(true);
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
            $column = new TextViewColumn('Ok', 'Ok', 'Ok', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddSingleRecordViewColumn($column);
            
            //
            // View column for ID_FI field
            //
            $column = new TextViewColumn('ID_FI', 'ID_FI', 'ID FI', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddSingleRecordViewColumn($column);
            
            //
            // View column for ID_TTC field
            //
            $column = new TextViewColumn('ID_TTC', 'ID_TTC', 'ID TTC', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddSingleRecordViewColumn($column);
            
            //
            // View column for ID_TTL field
            //
            $column = new TextViewColumn('ID_TTL', 'ID_TTL', 'ID TTL', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddSingleRecordViewColumn($column);
            
            //
            // View column for ID_TLC field
            //
            $column = new TextViewColumn('ID_TLC', 'ID_TLC', 'ID TLC', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddSingleRecordViewColumn($column);
            
            //
            // View column for ID_TLL field
            //
            $column = new TextViewColumn('ID_TLL', 'ID_TLL', 'ID TLL', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddSingleRecordViewColumn($column);
            
            //
            // View column for ID_TRR field
            //
            $column = new TextViewColumn('ID_TRR', 'ID_TRR', 'ID TRR', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddSingleRecordViewColumn($column);
            
            //
            // View column for ID_J field
            //
            $column = new TextViewColumn('ID_J', 'ID_J', 'ID J', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddSingleRecordViewColumn($column);
            
            //
            // View column for ID_TB field
            //
            $column = new TextViewColumn('ID_TB', 'ID_TB', 'ID TB', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddSingleRecordViewColumn($column);
            
            //
            // View column for ID_JE field
            //
            $column = new TextViewColumn('ID_JE', 'ID_JE', 'ID JE', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddSingleRecordViewColumn($column);
            
            //
            // View column for ID_TBE field
            //
            $column = new TextViewColumn('ID_TBE', 'ID_TBE', 'ID TBE', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddSingleRecordViewColumn($column);
            
            //
            // View column for ID_ALP field
            //
            $column = new TextViewColumn('ID_ALP', 'ID_ALP', 'ID ALP', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddSingleRecordViewColumn($column);
            
            //
            // View column for ID_ATP field
            //
            $column = new TextViewColumn('ID_ATP', 'ID_ATP', 'ID ATP', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddSingleRecordViewColumn($column);
            
            //
            // View column for ID_O field
            //
            $column = new TextViewColumn('ID_O', 'ID_O', 'ID O', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddSingleRecordViewColumn($column);
            
            //
            // View column for ID_P field
            //
            $column = new TextViewColumn('ID_P', 'ID_P', 'ID P', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddSingleRecordViewColumn($column);
            
            //
            // View column for ID_EX field
            //
            $column = new TextViewColumn('ID_EX', 'ID_EX', 'ID EX', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddSingleRecordViewColumn($column);
            
            //
            // View column for ID_D field
            //
            $column = new TextViewColumn('ID_D', 'ID_D', 'ID D', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddSingleRecordViewColumn($column);
            
            //
            // View column for ID_R field
            //
            $column = new TextViewColumn('ID_R', 'ID_R', 'ID R', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddSingleRecordViewColumn($column);
            
            //
            // View column for ID_ALC field
            //
            $column = new TextViewColumn('ID_ALC', 'ID_ALC', 'ID ALC', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddSingleRecordViewColumn($column);
            
            //
            // View column for ID_ATC field
            //
            $column = new TextViewColumn('ID_ATC', 'ID_ATC', 'ID ATC', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddSingleRecordViewColumn($column);
            
            //
            // View column for ID_E field
            //
            $column = new TextViewColumn('ID_E', 'ID_E', 'ID E', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddSingleRecordViewColumn($column);
            
            //
            // View column for FL_TRE field
            //
            $column = new NumberViewColumn('FL_TRE', 'FL_TRE', 'FL TRE', $this->dataset);
            $column->SetOrderable(true);
            $column->setNumberAfterDecimal(2);
            $column->setThousandsSeparator('.');
            $column->setDecimalSeparator(',');
            $grid->AddSingleRecordViewColumn($column);
            
            //
            // View column for FL_TRI field
            //
            $column = new NumberViewColumn('FL_TRI', 'FL_TRI', 'FL TRI', $this->dataset);
            $column->SetOrderable(true);
            $column->setNumberAfterDecimal(2);
            $column->setThousandsSeparator('.');
            $column->setDecimalSeparator(',');
            $grid->AddSingleRecordViewColumn($column);
            
            //
            // View column for ID_FC2 field
            //
            $column = new NumberViewColumn('ID_FC2', 'ID_FC2', 'ID FC2', $this->dataset);
            $column->SetOrderable(true);
            $column->setNumberAfterDecimal(2);
            $column->setThousandsSeparator('.');
            $column->setDecimalSeparator(',');
            $grid->AddSingleRecordViewColumn($column);
            
            //
            // View column for ID_FC3 field
            //
            $column = new NumberViewColumn('ID_FC3', 'ID_FC3', 'ID FC3', $this->dataset);
            $column->SetOrderable(true);
            $column->setNumberAfterDecimal(2);
            $column->setThousandsSeparator('.');
            $column->setDecimalSeparator(',');
            $grid->AddSingleRecordViewColumn($column);
            
            //
            // View column for PA field
            //
            $column = new NumberViewColumn('PA', 'PA', 'PA', $this->dataset);
            $column->SetOrderable(true);
            $column->setNumberAfterDecimal(2);
            $column->setThousandsSeparator('.');
            $column->setDecimalSeparator(',');
            $grid->AddSingleRecordViewColumn($column);
            
            //
            // View column for AT_ON field
            //
            $column = new NumberViewColumn('AT_ON', 'AT_ON', 'AT ON', $this->dataset);
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
            $column = new TextViewColumn('Observacoes', 'Observacoes', 'Observacoes', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddSingleRecordViewColumn($column);
            
            //
            // View column for tipo_interferncia field
            //
            $column = new TextViewColumn('idInterferencia', 'idInterferencia_tipo_interferncia', 'Interferência', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddSingleRecordViewColumn($column);
            
            //
            // View column for id_km field
            //
            $column = new NumberViewColumn('id_km', 'id_km', 'Km', $this->dataset);
            $column->SetOrderable(true);
            $column->setNumberAfterDecimal(2);
            $column->setThousandsSeparator('.');
            $column->setDecimalSeparator(',');
            $grid->AddSingleRecordViewColumn($column);
            
            //
            // View column for id_anocontratual field
            //
            $column = new TextViewColumn('id_anocontratual', 'id_anocontratual', 'Ano', $this->dataset);
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
            $grid->AddSingleRecordViewColumn($column);
            
            //
            // View column for revisao field
            //
            $column = new TextViewColumn('revisao', 'revisao', 'Revisão', $this->dataset);
            $column->SetOrderable(true);
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
            // View column for idtbl_ano field
            //
            $column = new TextViewColumn('idtbl_ano', 'idtbl_ano', 'Idtbl Ano', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddSingleRecordViewColumn($column);
        }
    
        protected function AddEditColumns(Grid $grid)
        {
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
            $editColumn = new DynamicLookupEditColumn('Usuário', 'id_gerenciador', 'id_gerenciador_Nome Operador', 'edit_tbl_usuarios_concessionarias03_tbl_ano_contratual_monitoramento_igg_id_gerenciador_search', $editor, $this->dataset, $lookupDataset, 'idUsuario', 'Nome Operador', '');
            $editColumn->SetReadOnly(true);
            $validator = new RequiredValidator(StringUtils::Format($this->GetLocalizerCaptions()->GetMessageString('RequiredValidationMessage'), $editColumn->GetCaption()));
            $editor->GetValidatorCollection()->AddValidator($validator);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddEditColumn($editColumn);
            
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
            $editColumn = new DynamicLookupEditColumn('Lote', 'idConcessiona', 'idConcessiona_Lote', 'edit_tbl_usuarios_concessionarias03_tbl_ano_contratual_monitoramento_igg_idConcessiona_search', $editor, $this->dataset, $lookupDataset, 'idConcessiona', 'Lote', '');
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddEditColumn($editColumn);
            
            //
            // Edit column for id_rodovia field
            //
            $editor = new TextEdit('id_rodovia_edit');
            $editColumn = new CustomEditColumn('Rodovia', 'id_rodovia', $editor, $this->dataset);
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
            $editColumn = new DynamicLookupEditColumn('Pista', 'idPista', 'idPista_DescricaoPista', 'edit_tbl_usuarios_concessionarias03_tbl_ano_contratual_monitoramento_igg_idPista_search', $editor, $this->dataset, $lookupDataset, 'idPista', 'DescricaoPista', '');
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
            $editColumn = new DynamicLookupEditColumn('Sentido tráfego (quilometragem)', 'idSentidotrafego', 'idSentidotrafego_Descricao', 'edit_tbl_usuarios_concessionarias03_tbl_ano_contratual_monitoramento_igg_idSentidotrafego_search', $editor, $this->dataset, $lookupDataset, 'idSentidotrafego', 'Descricao', '');
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddEditColumn($editColumn);
            
            //
            // Edit column for km_referencia field
            //
            $editor = new TextEdit('km_referencia_edit');
            $editColumn = new CustomEditColumn('Km Referencia', 'km_referencia', $editor, $this->dataset);
            $validator = new RequiredValidator(StringUtils::Format($this->GetLocalizerCaptions()->GetMessageString('RequiredValidationMessage'), $editColumn->GetCaption()));
            $editor->GetValidatorCollection()->AddValidator($validator);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddEditColumn($editColumn);
            
            //
            // Edit column for alca_ramo field
            //
            $editor = new TextEdit('alca_ramo_edit');
            $editColumn = new CustomEditColumn('Alca Ramo', 'alca_ramo', $editor, $this->dataset);
            $validator = new RequiredValidator(StringUtils::Format($this->GetLocalizerCaptions()->GetMessageString('RequiredValidationMessage'), $editColumn->GetCaption()));
            $editor->GetValidatorCollection()->AddValidator($validator);
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
            $editColumn = new DynamicLookupEditColumn('Faixa', 'idFaixa', 'idFaixa_DescricaoFaixa', 'edit_tbl_usuarios_concessionarias03_tbl_ano_contratual_monitoramento_igg_idFaixa_search', $editor, $this->dataset, $lookupDataset, 'idFaixa', 'DescricaoFaixa', '');
            $editColumn->SetAllowSetToNull(true);
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
            $editColumn = new DynamicLookupEditColumn('Via', 'id_via', 'id_via_DescricaoVia', 'edit_tbl_usuarios_concessionarias03_tbl_ano_contratual_monitoramento_igg_id_via_search', $editor, $this->dataset, $lookupDataset, 'idVia', 'DescricaoVia', '');
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
            $editColumn = new DynamicLookupEditColumn('Seção Terrap.', 'id_secao_terrap', 'id_secao_terrap_DescricaoSecao', 'edit_tbl_usuarios_concessionarias03_tbl_ano_contratual_monitoramento_igg_id_secao_terrap_search', $editor, $this->dataset, $lookupDataset, 'idSecao', 'DescricaoSecao', '');
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
            $editColumn = new DynamicLookupEditColumn('Tipo Revestimento', 'tipo_revestimento', 'tipo_revestimento_DescricaoMaterial', 'edit_tbl_usuarios_concessionarias03_tbl_ano_contratual_monitoramento_igg_tipo_revestimento_search', $editor, $this->dataset, $lookupDataset, 'idMaterial', 'DescricaoMaterial', '');
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddEditColumn($editColumn);
            
            //
            // Edit column for Ok field
            //
            $editor = new TextEdit('ok_edit');
            $editColumn = new CustomEditColumn('Ok', 'Ok', $editor, $this->dataset);
            $validator = new RequiredValidator(StringUtils::Format($this->GetLocalizerCaptions()->GetMessageString('RequiredValidationMessage'), $editColumn->GetCaption()));
            $editor->GetValidatorCollection()->AddValidator($validator);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddEditColumn($editColumn);
            
            //
            // Edit column for ID_FI field
            //
            $editor = new TextEdit('id_fi_edit');
            $editColumn = new CustomEditColumn('ID FI', 'ID_FI', $editor, $this->dataset);
            $validator = new RequiredValidator(StringUtils::Format($this->GetLocalizerCaptions()->GetMessageString('RequiredValidationMessage'), $editColumn->GetCaption()));
            $editor->GetValidatorCollection()->AddValidator($validator);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddEditColumn($editColumn);
            
            //
            // Edit column for ID_TTC field
            //
            $editor = new TextEdit('id_ttc_edit');
            $editColumn = new CustomEditColumn('ID TTC', 'ID_TTC', $editor, $this->dataset);
            $validator = new RequiredValidator(StringUtils::Format($this->GetLocalizerCaptions()->GetMessageString('RequiredValidationMessage'), $editColumn->GetCaption()));
            $editor->GetValidatorCollection()->AddValidator($validator);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddEditColumn($editColumn);
            
            //
            // Edit column for ID_TTL field
            //
            $editor = new TextEdit('id_ttl_edit');
            $editColumn = new CustomEditColumn('ID TTL', 'ID_TTL', $editor, $this->dataset);
            $validator = new RequiredValidator(StringUtils::Format($this->GetLocalizerCaptions()->GetMessageString('RequiredValidationMessage'), $editColumn->GetCaption()));
            $editor->GetValidatorCollection()->AddValidator($validator);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddEditColumn($editColumn);
            
            //
            // Edit column for ID_TLC field
            //
            $editor = new TextEdit('id_tlc_edit');
            $editColumn = new CustomEditColumn('ID TLC', 'ID_TLC', $editor, $this->dataset);
            $validator = new RequiredValidator(StringUtils::Format($this->GetLocalizerCaptions()->GetMessageString('RequiredValidationMessage'), $editColumn->GetCaption()));
            $editor->GetValidatorCollection()->AddValidator($validator);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddEditColumn($editColumn);
            
            //
            // Edit column for ID_TLL field
            //
            $editor = new TextEdit('id_tll_edit');
            $editColumn = new CustomEditColumn('ID TLL', 'ID_TLL', $editor, $this->dataset);
            $validator = new RequiredValidator(StringUtils::Format($this->GetLocalizerCaptions()->GetMessageString('RequiredValidationMessage'), $editColumn->GetCaption()));
            $editor->GetValidatorCollection()->AddValidator($validator);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddEditColumn($editColumn);
            
            //
            // Edit column for ID_TRR field
            //
            $editor = new TextEdit('id_trr_edit');
            $editColumn = new CustomEditColumn('ID TRR', 'ID_TRR', $editor, $this->dataset);
            $validator = new RequiredValidator(StringUtils::Format($this->GetLocalizerCaptions()->GetMessageString('RequiredValidationMessage'), $editColumn->GetCaption()));
            $editor->GetValidatorCollection()->AddValidator($validator);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddEditColumn($editColumn);
            
            //
            // Edit column for ID_J field
            //
            $editor = new TextEdit('id_j_edit');
            $editColumn = new CustomEditColumn('ID J', 'ID_J', $editor, $this->dataset);
            $validator = new RequiredValidator(StringUtils::Format($this->GetLocalizerCaptions()->GetMessageString('RequiredValidationMessage'), $editColumn->GetCaption()));
            $editor->GetValidatorCollection()->AddValidator($validator);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddEditColumn($editColumn);
            
            //
            // Edit column for ID_TB field
            //
            $editor = new TextEdit('id_tb_edit');
            $editColumn = new CustomEditColumn('ID TB', 'ID_TB', $editor, $this->dataset);
            $validator = new RequiredValidator(StringUtils::Format($this->GetLocalizerCaptions()->GetMessageString('RequiredValidationMessage'), $editColumn->GetCaption()));
            $editor->GetValidatorCollection()->AddValidator($validator);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddEditColumn($editColumn);
            
            //
            // Edit column for ID_JE field
            //
            $editor = new TextEdit('id_je_edit');
            $editColumn = new CustomEditColumn('ID JE', 'ID_JE', $editor, $this->dataset);
            $validator = new RequiredValidator(StringUtils::Format($this->GetLocalizerCaptions()->GetMessageString('RequiredValidationMessage'), $editColumn->GetCaption()));
            $editor->GetValidatorCollection()->AddValidator($validator);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddEditColumn($editColumn);
            
            //
            // Edit column for ID_TBE field
            //
            $editor = new TextEdit('id_tbe_edit');
            $editColumn = new CustomEditColumn('ID TBE', 'ID_TBE', $editor, $this->dataset);
            $validator = new RequiredValidator(StringUtils::Format($this->GetLocalizerCaptions()->GetMessageString('RequiredValidationMessage'), $editColumn->GetCaption()));
            $editor->GetValidatorCollection()->AddValidator($validator);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddEditColumn($editColumn);
            
            //
            // Edit column for ID_ALP field
            //
            $editor = new TextEdit('id_alp_edit');
            $editColumn = new CustomEditColumn('ID ALP', 'ID_ALP', $editor, $this->dataset);
            $validator = new RequiredValidator(StringUtils::Format($this->GetLocalizerCaptions()->GetMessageString('RequiredValidationMessage'), $editColumn->GetCaption()));
            $editor->GetValidatorCollection()->AddValidator($validator);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddEditColumn($editColumn);
            
            //
            // Edit column for ID_ATP field
            //
            $editor = new TextEdit('id_atp_edit');
            $editColumn = new CustomEditColumn('ID ATP', 'ID_ATP', $editor, $this->dataset);
            $validator = new RequiredValidator(StringUtils::Format($this->GetLocalizerCaptions()->GetMessageString('RequiredValidationMessage'), $editColumn->GetCaption()));
            $editor->GetValidatorCollection()->AddValidator($validator);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddEditColumn($editColumn);
            
            //
            // Edit column for ID_O field
            //
            $editor = new TextEdit('id_o_edit');
            $editColumn = new CustomEditColumn('ID O', 'ID_O', $editor, $this->dataset);
            $validator = new RequiredValidator(StringUtils::Format($this->GetLocalizerCaptions()->GetMessageString('RequiredValidationMessage'), $editColumn->GetCaption()));
            $editor->GetValidatorCollection()->AddValidator($validator);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddEditColumn($editColumn);
            
            //
            // Edit column for ID_P field
            //
            $editor = new TextEdit('id_p_edit');
            $editColumn = new CustomEditColumn('ID P', 'ID_P', $editor, $this->dataset);
            $validator = new RequiredValidator(StringUtils::Format($this->GetLocalizerCaptions()->GetMessageString('RequiredValidationMessage'), $editColumn->GetCaption()));
            $editor->GetValidatorCollection()->AddValidator($validator);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddEditColumn($editColumn);
            
            //
            // Edit column for ID_EX field
            //
            $editor = new TextEdit('id_ex_edit');
            $editColumn = new CustomEditColumn('ID EX', 'ID_EX', $editor, $this->dataset);
            $validator = new RequiredValidator(StringUtils::Format($this->GetLocalizerCaptions()->GetMessageString('RequiredValidationMessage'), $editColumn->GetCaption()));
            $editor->GetValidatorCollection()->AddValidator($validator);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddEditColumn($editColumn);
            
            //
            // Edit column for ID_D field
            //
            $editor = new TextEdit('id_d_edit');
            $editColumn = new CustomEditColumn('ID D', 'ID_D', $editor, $this->dataset);
            $validator = new RequiredValidator(StringUtils::Format($this->GetLocalizerCaptions()->GetMessageString('RequiredValidationMessage'), $editColumn->GetCaption()));
            $editor->GetValidatorCollection()->AddValidator($validator);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddEditColumn($editColumn);
            
            //
            // Edit column for ID_R field
            //
            $editor = new TextEdit('id_r_edit');
            $editColumn = new CustomEditColumn('ID R', 'ID_R', $editor, $this->dataset);
            $validator = new RequiredValidator(StringUtils::Format($this->GetLocalizerCaptions()->GetMessageString('RequiredValidationMessage'), $editColumn->GetCaption()));
            $editor->GetValidatorCollection()->AddValidator($validator);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddEditColumn($editColumn);
            
            //
            // Edit column for ID_ALC field
            //
            $editor = new TextEdit('id_alc_edit');
            $editColumn = new CustomEditColumn('ID ALC', 'ID_ALC', $editor, $this->dataset);
            $validator = new RequiredValidator(StringUtils::Format($this->GetLocalizerCaptions()->GetMessageString('RequiredValidationMessage'), $editColumn->GetCaption()));
            $editor->GetValidatorCollection()->AddValidator($validator);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddEditColumn($editColumn);
            
            //
            // Edit column for ID_ATC field
            //
            $editor = new TextEdit('id_atc_edit');
            $editColumn = new CustomEditColumn('ID ATC', 'ID_ATC', $editor, $this->dataset);
            $validator = new RequiredValidator(StringUtils::Format($this->GetLocalizerCaptions()->GetMessageString('RequiredValidationMessage'), $editColumn->GetCaption()));
            $editor->GetValidatorCollection()->AddValidator($validator);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddEditColumn($editColumn);
            
            //
            // Edit column for ID_E field
            //
            $editor = new TextEdit('id_e_edit');
            $editColumn = new CustomEditColumn('ID E', 'ID_E', $editor, $this->dataset);
            $validator = new RequiredValidator(StringUtils::Format($this->GetLocalizerCaptions()->GetMessageString('RequiredValidationMessage'), $editColumn->GetCaption()));
            $editor->GetValidatorCollection()->AddValidator($validator);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddEditColumn($editColumn);
            
            //
            // Edit column for FL_TRE field
            //
            $editor = new TextEdit('fl_tre_edit');
            $editColumn = new CustomEditColumn('FL TRE', 'FL_TRE', $editor, $this->dataset);
            $validator = new RequiredValidator(StringUtils::Format($this->GetLocalizerCaptions()->GetMessageString('RequiredValidationMessage'), $editColumn->GetCaption()));
            $editor->GetValidatorCollection()->AddValidator($validator);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddEditColumn($editColumn);
            
            //
            // Edit column for FL_TRI field
            //
            $editor = new TextEdit('fl_tri_edit');
            $editColumn = new CustomEditColumn('FL TRI', 'FL_TRI', $editor, $this->dataset);
            $validator = new RequiredValidator(StringUtils::Format($this->GetLocalizerCaptions()->GetMessageString('RequiredValidationMessage'), $editColumn->GetCaption()));
            $editor->GetValidatorCollection()->AddValidator($validator);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddEditColumn($editColumn);
            
            //
            // Edit column for ID_FC2 field
            //
            $editor = new TextEdit('id_fc2_edit');
            $editColumn = new CustomEditColumn('ID FC2', 'ID_FC2', $editor, $this->dataset);
            $validator = new RequiredValidator(StringUtils::Format($this->GetLocalizerCaptions()->GetMessageString('RequiredValidationMessage'), $editColumn->GetCaption()));
            $editor->GetValidatorCollection()->AddValidator($validator);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddEditColumn($editColumn);
            
            //
            // Edit column for ID_FC3 field
            //
            $editor = new TextEdit('id_fc3_edit');
            $editColumn = new CustomEditColumn('ID FC3', 'ID_FC3', $editor, $this->dataset);
            $validator = new RequiredValidator(StringUtils::Format($this->GetLocalizerCaptions()->GetMessageString('RequiredValidationMessage'), $editColumn->GetCaption()));
            $editor->GetValidatorCollection()->AddValidator($validator);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddEditColumn($editColumn);
            
            //
            // Edit column for PA field
            //
            $editor = new TextEdit('pa_edit');
            $editColumn = new CustomEditColumn('PA', 'PA', $editor, $this->dataset);
            $validator = new RequiredValidator(StringUtils::Format($this->GetLocalizerCaptions()->GetMessageString('RequiredValidationMessage'), $editColumn->GetCaption()));
            $editor->GetValidatorCollection()->AddValidator($validator);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddEditColumn($editColumn);
            
            //
            // Edit column for AT_ON field
            //
            $editor = new TextEdit('at_on_edit');
            $editColumn = new CustomEditColumn('AT ON', 'AT_ON', $editor, $this->dataset);
            $validator = new RequiredValidator(StringUtils::Format($this->GetLocalizerCaptions()->GetMessageString('RequiredValidationMessage'), $editColumn->GetCaption()));
            $editor->GetValidatorCollection()->AddValidator($validator);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddEditColumn($editColumn);
            
            //
            // Edit column for dtRegistro field
            //
            $editor = new DateTimeEdit('dtregistro_edit', false, 'd-m-Y');
            $editColumn = new CustomEditColumn('Data Registro', 'dtRegistro', $editor, $this->dataset);
            $validator = new RequiredValidator(StringUtils::Format($this->GetLocalizerCaptions()->GetMessageString('RequiredValidationMessage'), $editColumn->GetCaption()));
            $editor->GetValidatorCollection()->AddValidator($validator);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddEditColumn($editColumn);
            
            //
            // Edit column for Hora field
            //
            $editor = new TextEdit('hora_edit');
            $editColumn = new CustomEditColumn('Hora', 'Hora', $editor, $this->dataset);
            $validator = new RequiredValidator(StringUtils::Format($this->GetLocalizerCaptions()->GetMessageString('RequiredValidationMessage'), $editColumn->GetCaption()));
            $editor->GetValidatorCollection()->AddValidator($validator);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddEditColumn($editColumn);
            
            //
            // Edit column for Observacoes field
            //
            $editor = new TextEdit('observacoes_edit');
            $editColumn = new CustomEditColumn('Observacoes', 'Observacoes', $editor, $this->dataset);
            $validator = new RequiredValidator(StringUtils::Format($this->GetLocalizerCaptions()->GetMessageString('RequiredValidationMessage'), $editColumn->GetCaption()));
            $editor->GetValidatorCollection()->AddValidator($validator);
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
            $editColumn = new DynamicLookupEditColumn('Interferência', 'idInterferencia', 'idInterferencia_tipo_interferncia', 'edit_tbl_usuarios_concessionarias03_tbl_ano_contratual_monitoramento_igg_idInterferencia_search', $editor, $this->dataset, $lookupDataset, 'idInterferencia', 'tipo_interferncia', '');
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddEditColumn($editColumn);
            
            //
            // Edit column for id_km field
            //
            $editor = new TextEdit('id_km_edit');
            $editColumn = new CustomEditColumn('Km', 'id_km', $editor, $this->dataset);
            $validator = new RequiredValidator(StringUtils::Format($this->GetLocalizerCaptions()->GetMessageString('RequiredValidationMessage'), $editColumn->GetCaption()));
            $editor->GetValidatorCollection()->AddValidator($validator);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddEditColumn($editColumn);
            
            //
            // Edit column for id_anocontratual field
            //
            $editor = new TextEdit('id_anocontratual_edit');
            $editColumn = new CustomEditColumn('Ano', 'id_anocontratual', $editor, $this->dataset);
            $validator = new RequiredValidator(StringUtils::Format($this->GetLocalizerCaptions()->GetMessageString('RequiredValidationMessage'), $editColumn->GetCaption()));
            $editor->GetValidatorCollection()->AddValidator($validator);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddEditColumn($editColumn);
            
            //
            // Edit column for marco_km field
            //
            $editor = new TextEdit('marco_km_edit');
            $editColumn = new CustomEditColumn('Marco Km', 'marco_km', $editor, $this->dataset);
            $validator = new RequiredValidator(StringUtils::Format($this->GetLocalizerCaptions()->GetMessageString('RequiredValidationMessage'), $editColumn->GetCaption()));
            $editor->GetValidatorCollection()->AddValidator($validator);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddEditColumn($editColumn);
            
            //
            // Edit column for latitude field
            //
            $editor = new TextEdit('latitude_edit');
            $editColumn = new CustomEditColumn('Latitude', 'latitude', $editor, $this->dataset);
            $validator = new RequiredValidator(StringUtils::Format($this->GetLocalizerCaptions()->GetMessageString('RequiredValidationMessage'), $editColumn->GetCaption()));
            $editor->GetValidatorCollection()->AddValidator($validator);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddEditColumn($editColumn);
            
            //
            // Edit column for longitude field
            //
            $editor = new TextEdit('longitude_edit');
            $editColumn = new CustomEditColumn('Longitude', 'longitude', $editor, $this->dataset);
            $validator = new RequiredValidator(StringUtils::Format($this->GetLocalizerCaptions()->GetMessageString('RequiredValidationMessage'), $editColumn->GetCaption()));
            $editor->GetValidatorCollection()->AddValidator($validator);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddEditColumn($editColumn);
            
            //
            // Edit column for Observacoe2 field
            //
            $editor = new TextEdit('observacoe2_edit');
            $editColumn = new CustomEditColumn('Observações', 'Observacoe2', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddEditColumn($editColumn);
            
            //
            // Edit column for revisao field
            //
            $editor = new TextEdit('revisao_edit');
            $editColumn = new CustomEditColumn('Revisão', 'revisao', $editor, $this->dataset);
            $validator = new RequiredValidator(StringUtils::Format($this->GetLocalizerCaptions()->GetMessageString('RequiredValidationMessage'), $editColumn->GetCaption()));
            $editor->GetValidatorCollection()->AddValidator($validator);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddEditColumn($editColumn);
            
            //
            // Edit column for idanocontratual field
            //
            $editor = new TextEdit('idanocontratual_edit');
            $editColumn = new CustomEditColumn('Idanocontratual', 'idanocontratual', $editor, $this->dataset);
            $validator = new RequiredValidator(StringUtils::Format($this->GetLocalizerCaptions()->GetMessageString('RequiredValidationMessage'), $editColumn->GetCaption()));
            $editor->GetValidatorCollection()->AddValidator($validator);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddEditColumn($editColumn);
            
            //
            // Edit column for id_concessionaria field
            //
            $editor = new SpinEdit('id_concessionaria_edit');
            $editColumn = new CustomEditColumn('Id Concessionaria', 'id_concessionaria', $editor, $this->dataset);
            $validator = new RequiredValidator(StringUtils::Format($this->GetLocalizerCaptions()->GetMessageString('RequiredValidationMessage'), $editColumn->GetCaption()));
            $editor->GetValidatorCollection()->AddValidator($validator);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddEditColumn($editColumn);
            
            //
            // Edit column for idtbl_ano field
            //
            $editor = new TextEdit('idtbl_ano_edit');
            $editColumn = new CustomEditColumn('Idtbl Ano', 'idtbl_ano', $editor, $this->dataset);
            $validator = new RequiredValidator(StringUtils::Format($this->GetLocalizerCaptions()->GetMessageString('RequiredValidationMessage'), $editColumn->GetCaption()));
            $editor->GetValidatorCollection()->AddValidator($validator);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddEditColumn($editColumn);
        }
    
        protected function AddMultiEditColumns(Grid $grid)
        {
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
            $editColumn = new DynamicLookupEditColumn('Usuário', 'id_gerenciador', 'id_gerenciador_Nome Operador', 'multi_edit_tbl_usuarios_concessionarias03_tbl_ano_contratual_monitoramento_igg_id_gerenciador_search', $editor, $this->dataset, $lookupDataset, 'idUsuario', 'Nome Operador', '');
            $editColumn->SetReadOnly(true);
            $validator = new RequiredValidator(StringUtils::Format($this->GetLocalizerCaptions()->GetMessageString('RequiredValidationMessage'), $editColumn->GetCaption()));
            $editor->GetValidatorCollection()->AddValidator($validator);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddMultiEditColumn($editColumn);
            
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
            $editColumn = new DynamicLookupEditColumn('Lote', 'idConcessiona', 'idConcessiona_Lote', 'multi_edit_tbl_usuarios_concessionarias03_tbl_ano_contratual_monitoramento_igg_idConcessiona_search', $editor, $this->dataset, $lookupDataset, 'idConcessiona', 'Lote', '');
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddMultiEditColumn($editColumn);
            
            //
            // Edit column for id_rodovia field
            //
            $editor = new TextEdit('id_rodovia_edit');
            $editColumn = new CustomEditColumn('Rodovia', 'id_rodovia', $editor, $this->dataset);
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
            $editColumn = new DynamicLookupEditColumn('Pista', 'idPista', 'idPista_DescricaoPista', 'multi_edit_tbl_usuarios_concessionarias03_tbl_ano_contratual_monitoramento_igg_idPista_search', $editor, $this->dataset, $lookupDataset, 'idPista', 'DescricaoPista', '');
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
            $editColumn = new DynamicLookupEditColumn('Sentido tráfego (quilometragem)', 'idSentidotrafego', 'idSentidotrafego_Descricao', 'multi_edit_tbl_usuarios_concessionarias03_tbl_ano_contratual_monitoramento_igg_idSentidotrafego_search', $editor, $this->dataset, $lookupDataset, 'idSentidotrafego', 'Descricao', '');
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddMultiEditColumn($editColumn);
            
            //
            // Edit column for km_referencia field
            //
            $editor = new TextEdit('km_referencia_edit');
            $editColumn = new CustomEditColumn('Km Referencia', 'km_referencia', $editor, $this->dataset);
            $validator = new RequiredValidator(StringUtils::Format($this->GetLocalizerCaptions()->GetMessageString('RequiredValidationMessage'), $editColumn->GetCaption()));
            $editor->GetValidatorCollection()->AddValidator($validator);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddMultiEditColumn($editColumn);
            
            //
            // Edit column for alca_ramo field
            //
            $editor = new TextEdit('alca_ramo_edit');
            $editColumn = new CustomEditColumn('Alca Ramo', 'alca_ramo', $editor, $this->dataset);
            $validator = new RequiredValidator(StringUtils::Format($this->GetLocalizerCaptions()->GetMessageString('RequiredValidationMessage'), $editColumn->GetCaption()));
            $editor->GetValidatorCollection()->AddValidator($validator);
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
            $editColumn = new DynamicLookupEditColumn('Faixa', 'idFaixa', 'idFaixa_DescricaoFaixa', 'multi_edit_tbl_usuarios_concessionarias03_tbl_ano_contratual_monitoramento_igg_idFaixa_search', $editor, $this->dataset, $lookupDataset, 'idFaixa', 'DescricaoFaixa', '');
            $editColumn->SetAllowSetToNull(true);
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
            $editColumn = new DynamicLookupEditColumn('Via', 'id_via', 'id_via_DescricaoVia', 'multi_edit_tbl_usuarios_concessionarias03_tbl_ano_contratual_monitoramento_igg_id_via_search', $editor, $this->dataset, $lookupDataset, 'idVia', 'DescricaoVia', '');
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
            $editColumn = new DynamicLookupEditColumn('Seção Terrap.', 'id_secao_terrap', 'id_secao_terrap_DescricaoSecao', 'multi_edit_tbl_usuarios_concessionarias03_tbl_ano_contratual_monitoramento_igg_id_secao_terrap_search', $editor, $this->dataset, $lookupDataset, 'idSecao', 'DescricaoSecao', '');
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
            $editColumn = new DynamicLookupEditColumn('Tipo Revestimento', 'tipo_revestimento', 'tipo_revestimento_DescricaoMaterial', 'multi_edit_tbl_usuarios_concessionarias03_tbl_ano_contratual_monitoramento_igg_tipo_revestimento_search', $editor, $this->dataset, $lookupDataset, 'idMaterial', 'DescricaoMaterial', '');
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddMultiEditColumn($editColumn);
            
            //
            // Edit column for Ok field
            //
            $editor = new TextEdit('ok_edit');
            $editColumn = new CustomEditColumn('Ok', 'Ok', $editor, $this->dataset);
            $validator = new RequiredValidator(StringUtils::Format($this->GetLocalizerCaptions()->GetMessageString('RequiredValidationMessage'), $editColumn->GetCaption()));
            $editor->GetValidatorCollection()->AddValidator($validator);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddMultiEditColumn($editColumn);
            
            //
            // Edit column for ID_FI field
            //
            $editor = new TextEdit('id_fi_edit');
            $editColumn = new CustomEditColumn('ID FI', 'ID_FI', $editor, $this->dataset);
            $validator = new RequiredValidator(StringUtils::Format($this->GetLocalizerCaptions()->GetMessageString('RequiredValidationMessage'), $editColumn->GetCaption()));
            $editor->GetValidatorCollection()->AddValidator($validator);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddMultiEditColumn($editColumn);
            
            //
            // Edit column for ID_TTC field
            //
            $editor = new TextEdit('id_ttc_edit');
            $editColumn = new CustomEditColumn('ID TTC', 'ID_TTC', $editor, $this->dataset);
            $validator = new RequiredValidator(StringUtils::Format($this->GetLocalizerCaptions()->GetMessageString('RequiredValidationMessage'), $editColumn->GetCaption()));
            $editor->GetValidatorCollection()->AddValidator($validator);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddMultiEditColumn($editColumn);
            
            //
            // Edit column for ID_TTL field
            //
            $editor = new TextEdit('id_ttl_edit');
            $editColumn = new CustomEditColumn('ID TTL', 'ID_TTL', $editor, $this->dataset);
            $validator = new RequiredValidator(StringUtils::Format($this->GetLocalizerCaptions()->GetMessageString('RequiredValidationMessage'), $editColumn->GetCaption()));
            $editor->GetValidatorCollection()->AddValidator($validator);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddMultiEditColumn($editColumn);
            
            //
            // Edit column for ID_TLC field
            //
            $editor = new TextEdit('id_tlc_edit');
            $editColumn = new CustomEditColumn('ID TLC', 'ID_TLC', $editor, $this->dataset);
            $validator = new RequiredValidator(StringUtils::Format($this->GetLocalizerCaptions()->GetMessageString('RequiredValidationMessage'), $editColumn->GetCaption()));
            $editor->GetValidatorCollection()->AddValidator($validator);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddMultiEditColumn($editColumn);
            
            //
            // Edit column for ID_TLL field
            //
            $editor = new TextEdit('id_tll_edit');
            $editColumn = new CustomEditColumn('ID TLL', 'ID_TLL', $editor, $this->dataset);
            $validator = new RequiredValidator(StringUtils::Format($this->GetLocalizerCaptions()->GetMessageString('RequiredValidationMessage'), $editColumn->GetCaption()));
            $editor->GetValidatorCollection()->AddValidator($validator);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddMultiEditColumn($editColumn);
            
            //
            // Edit column for ID_TRR field
            //
            $editor = new TextEdit('id_trr_edit');
            $editColumn = new CustomEditColumn('ID TRR', 'ID_TRR', $editor, $this->dataset);
            $validator = new RequiredValidator(StringUtils::Format($this->GetLocalizerCaptions()->GetMessageString('RequiredValidationMessage'), $editColumn->GetCaption()));
            $editor->GetValidatorCollection()->AddValidator($validator);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddMultiEditColumn($editColumn);
            
            //
            // Edit column for ID_J field
            //
            $editor = new TextEdit('id_j_edit');
            $editColumn = new CustomEditColumn('ID J', 'ID_J', $editor, $this->dataset);
            $validator = new RequiredValidator(StringUtils::Format($this->GetLocalizerCaptions()->GetMessageString('RequiredValidationMessage'), $editColumn->GetCaption()));
            $editor->GetValidatorCollection()->AddValidator($validator);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddMultiEditColumn($editColumn);
            
            //
            // Edit column for ID_TB field
            //
            $editor = new TextEdit('id_tb_edit');
            $editColumn = new CustomEditColumn('ID TB', 'ID_TB', $editor, $this->dataset);
            $validator = new RequiredValidator(StringUtils::Format($this->GetLocalizerCaptions()->GetMessageString('RequiredValidationMessage'), $editColumn->GetCaption()));
            $editor->GetValidatorCollection()->AddValidator($validator);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddMultiEditColumn($editColumn);
            
            //
            // Edit column for ID_JE field
            //
            $editor = new TextEdit('id_je_edit');
            $editColumn = new CustomEditColumn('ID JE', 'ID_JE', $editor, $this->dataset);
            $validator = new RequiredValidator(StringUtils::Format($this->GetLocalizerCaptions()->GetMessageString('RequiredValidationMessage'), $editColumn->GetCaption()));
            $editor->GetValidatorCollection()->AddValidator($validator);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddMultiEditColumn($editColumn);
            
            //
            // Edit column for ID_TBE field
            //
            $editor = new TextEdit('id_tbe_edit');
            $editColumn = new CustomEditColumn('ID TBE', 'ID_TBE', $editor, $this->dataset);
            $validator = new RequiredValidator(StringUtils::Format($this->GetLocalizerCaptions()->GetMessageString('RequiredValidationMessage'), $editColumn->GetCaption()));
            $editor->GetValidatorCollection()->AddValidator($validator);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddMultiEditColumn($editColumn);
            
            //
            // Edit column for ID_ALP field
            //
            $editor = new TextEdit('id_alp_edit');
            $editColumn = new CustomEditColumn('ID ALP', 'ID_ALP', $editor, $this->dataset);
            $validator = new RequiredValidator(StringUtils::Format($this->GetLocalizerCaptions()->GetMessageString('RequiredValidationMessage'), $editColumn->GetCaption()));
            $editor->GetValidatorCollection()->AddValidator($validator);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddMultiEditColumn($editColumn);
            
            //
            // Edit column for ID_ATP field
            //
            $editor = new TextEdit('id_atp_edit');
            $editColumn = new CustomEditColumn('ID ATP', 'ID_ATP', $editor, $this->dataset);
            $validator = new RequiredValidator(StringUtils::Format($this->GetLocalizerCaptions()->GetMessageString('RequiredValidationMessage'), $editColumn->GetCaption()));
            $editor->GetValidatorCollection()->AddValidator($validator);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddMultiEditColumn($editColumn);
            
            //
            // Edit column for ID_O field
            //
            $editor = new TextEdit('id_o_edit');
            $editColumn = new CustomEditColumn('ID O', 'ID_O', $editor, $this->dataset);
            $validator = new RequiredValidator(StringUtils::Format($this->GetLocalizerCaptions()->GetMessageString('RequiredValidationMessage'), $editColumn->GetCaption()));
            $editor->GetValidatorCollection()->AddValidator($validator);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddMultiEditColumn($editColumn);
            
            //
            // Edit column for ID_P field
            //
            $editor = new TextEdit('id_p_edit');
            $editColumn = new CustomEditColumn('ID P', 'ID_P', $editor, $this->dataset);
            $validator = new RequiredValidator(StringUtils::Format($this->GetLocalizerCaptions()->GetMessageString('RequiredValidationMessage'), $editColumn->GetCaption()));
            $editor->GetValidatorCollection()->AddValidator($validator);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddMultiEditColumn($editColumn);
            
            //
            // Edit column for ID_EX field
            //
            $editor = new TextEdit('id_ex_edit');
            $editColumn = new CustomEditColumn('ID EX', 'ID_EX', $editor, $this->dataset);
            $validator = new RequiredValidator(StringUtils::Format($this->GetLocalizerCaptions()->GetMessageString('RequiredValidationMessage'), $editColumn->GetCaption()));
            $editor->GetValidatorCollection()->AddValidator($validator);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddMultiEditColumn($editColumn);
            
            //
            // Edit column for ID_D field
            //
            $editor = new TextEdit('id_d_edit');
            $editColumn = new CustomEditColumn('ID D', 'ID_D', $editor, $this->dataset);
            $validator = new RequiredValidator(StringUtils::Format($this->GetLocalizerCaptions()->GetMessageString('RequiredValidationMessage'), $editColumn->GetCaption()));
            $editor->GetValidatorCollection()->AddValidator($validator);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddMultiEditColumn($editColumn);
            
            //
            // Edit column for ID_R field
            //
            $editor = new TextEdit('id_r_edit');
            $editColumn = new CustomEditColumn('ID R', 'ID_R', $editor, $this->dataset);
            $validator = new RequiredValidator(StringUtils::Format($this->GetLocalizerCaptions()->GetMessageString('RequiredValidationMessage'), $editColumn->GetCaption()));
            $editor->GetValidatorCollection()->AddValidator($validator);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddMultiEditColumn($editColumn);
            
            //
            // Edit column for ID_ALC field
            //
            $editor = new TextEdit('id_alc_edit');
            $editColumn = new CustomEditColumn('ID ALC', 'ID_ALC', $editor, $this->dataset);
            $validator = new RequiredValidator(StringUtils::Format($this->GetLocalizerCaptions()->GetMessageString('RequiredValidationMessage'), $editColumn->GetCaption()));
            $editor->GetValidatorCollection()->AddValidator($validator);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddMultiEditColumn($editColumn);
            
            //
            // Edit column for ID_ATC field
            //
            $editor = new TextEdit('id_atc_edit');
            $editColumn = new CustomEditColumn('ID ATC', 'ID_ATC', $editor, $this->dataset);
            $validator = new RequiredValidator(StringUtils::Format($this->GetLocalizerCaptions()->GetMessageString('RequiredValidationMessage'), $editColumn->GetCaption()));
            $editor->GetValidatorCollection()->AddValidator($validator);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddMultiEditColumn($editColumn);
            
            //
            // Edit column for ID_E field
            //
            $editor = new TextEdit('id_e_edit');
            $editColumn = new CustomEditColumn('ID E', 'ID_E', $editor, $this->dataset);
            $validator = new RequiredValidator(StringUtils::Format($this->GetLocalizerCaptions()->GetMessageString('RequiredValidationMessage'), $editColumn->GetCaption()));
            $editor->GetValidatorCollection()->AddValidator($validator);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddMultiEditColumn($editColumn);
            
            //
            // Edit column for FL_TRE field
            //
            $editor = new TextEdit('fl_tre_edit');
            $editColumn = new CustomEditColumn('FL TRE', 'FL_TRE', $editor, $this->dataset);
            $validator = new RequiredValidator(StringUtils::Format($this->GetLocalizerCaptions()->GetMessageString('RequiredValidationMessage'), $editColumn->GetCaption()));
            $editor->GetValidatorCollection()->AddValidator($validator);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddMultiEditColumn($editColumn);
            
            //
            // Edit column for FL_TRI field
            //
            $editor = new TextEdit('fl_tri_edit');
            $editColumn = new CustomEditColumn('FL TRI', 'FL_TRI', $editor, $this->dataset);
            $validator = new RequiredValidator(StringUtils::Format($this->GetLocalizerCaptions()->GetMessageString('RequiredValidationMessage'), $editColumn->GetCaption()));
            $editor->GetValidatorCollection()->AddValidator($validator);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddMultiEditColumn($editColumn);
            
            //
            // Edit column for ID_FC2 field
            //
            $editor = new TextEdit('id_fc2_edit');
            $editColumn = new CustomEditColumn('ID FC2', 'ID_FC2', $editor, $this->dataset);
            $validator = new RequiredValidator(StringUtils::Format($this->GetLocalizerCaptions()->GetMessageString('RequiredValidationMessage'), $editColumn->GetCaption()));
            $editor->GetValidatorCollection()->AddValidator($validator);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddMultiEditColumn($editColumn);
            
            //
            // Edit column for ID_FC3 field
            //
            $editor = new TextEdit('id_fc3_edit');
            $editColumn = new CustomEditColumn('ID FC3', 'ID_FC3', $editor, $this->dataset);
            $validator = new RequiredValidator(StringUtils::Format($this->GetLocalizerCaptions()->GetMessageString('RequiredValidationMessage'), $editColumn->GetCaption()));
            $editor->GetValidatorCollection()->AddValidator($validator);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddMultiEditColumn($editColumn);
            
            //
            // Edit column for PA field
            //
            $editor = new TextEdit('pa_edit');
            $editColumn = new CustomEditColumn('PA', 'PA', $editor, $this->dataset);
            $validator = new RequiredValidator(StringUtils::Format($this->GetLocalizerCaptions()->GetMessageString('RequiredValidationMessage'), $editColumn->GetCaption()));
            $editor->GetValidatorCollection()->AddValidator($validator);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddMultiEditColumn($editColumn);
            
            //
            // Edit column for AT_ON field
            //
            $editor = new TextEdit('at_on_edit');
            $editColumn = new CustomEditColumn('AT ON', 'AT_ON', $editor, $this->dataset);
            $validator = new RequiredValidator(StringUtils::Format($this->GetLocalizerCaptions()->GetMessageString('RequiredValidationMessage'), $editColumn->GetCaption()));
            $editor->GetValidatorCollection()->AddValidator($validator);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddMultiEditColumn($editColumn);
            
            //
            // Edit column for dtRegistro field
            //
            $editor = new DateTimeEdit('dtregistro_edit', false, 'd-m-Y');
            $editColumn = new CustomEditColumn('Data Registro', 'dtRegistro', $editor, $this->dataset);
            $validator = new RequiredValidator(StringUtils::Format($this->GetLocalizerCaptions()->GetMessageString('RequiredValidationMessage'), $editColumn->GetCaption()));
            $editor->GetValidatorCollection()->AddValidator($validator);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddMultiEditColumn($editColumn);
            
            //
            // Edit column for Hora field
            //
            $editor = new TextEdit('hora_edit');
            $editColumn = new CustomEditColumn('Hora', 'Hora', $editor, $this->dataset);
            $validator = new RequiredValidator(StringUtils::Format($this->GetLocalizerCaptions()->GetMessageString('RequiredValidationMessage'), $editColumn->GetCaption()));
            $editor->GetValidatorCollection()->AddValidator($validator);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddMultiEditColumn($editColumn);
            
            //
            // Edit column for Observacoes field
            //
            $editor = new TextEdit('observacoes_edit');
            $editColumn = new CustomEditColumn('Observacoes', 'Observacoes', $editor, $this->dataset);
            $validator = new RequiredValidator(StringUtils::Format($this->GetLocalizerCaptions()->GetMessageString('RequiredValidationMessage'), $editColumn->GetCaption()));
            $editor->GetValidatorCollection()->AddValidator($validator);
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
            $editColumn = new DynamicLookupEditColumn('Interferência', 'idInterferencia', 'idInterferencia_tipo_interferncia', 'multi_edit_tbl_usuarios_concessionarias03_tbl_ano_contratual_monitoramento_igg_idInterferencia_search', $editor, $this->dataset, $lookupDataset, 'idInterferencia', 'tipo_interferncia', '');
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddMultiEditColumn($editColumn);
            
            //
            // Edit column for id_km field
            //
            $editor = new TextEdit('id_km_edit');
            $editColumn = new CustomEditColumn('Km', 'id_km', $editor, $this->dataset);
            $validator = new RequiredValidator(StringUtils::Format($this->GetLocalizerCaptions()->GetMessageString('RequiredValidationMessage'), $editColumn->GetCaption()));
            $editor->GetValidatorCollection()->AddValidator($validator);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddMultiEditColumn($editColumn);
            
            //
            // Edit column for id_anocontratual field
            //
            $editor = new TextEdit('id_anocontratual_edit');
            $editColumn = new CustomEditColumn('Ano', 'id_anocontratual', $editor, $this->dataset);
            $validator = new RequiredValidator(StringUtils::Format($this->GetLocalizerCaptions()->GetMessageString('RequiredValidationMessage'), $editColumn->GetCaption()));
            $editor->GetValidatorCollection()->AddValidator($validator);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddMultiEditColumn($editColumn);
            
            //
            // Edit column for marco_km field
            //
            $editor = new TextEdit('marco_km_edit');
            $editColumn = new CustomEditColumn('Marco Km', 'marco_km', $editor, $this->dataset);
            $validator = new RequiredValidator(StringUtils::Format($this->GetLocalizerCaptions()->GetMessageString('RequiredValidationMessage'), $editColumn->GetCaption()));
            $editor->GetValidatorCollection()->AddValidator($validator);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddMultiEditColumn($editColumn);
            
            //
            // Edit column for latitude field
            //
            $editor = new TextEdit('latitude_edit');
            $editColumn = new CustomEditColumn('Latitude', 'latitude', $editor, $this->dataset);
            $validator = new RequiredValidator(StringUtils::Format($this->GetLocalizerCaptions()->GetMessageString('RequiredValidationMessage'), $editColumn->GetCaption()));
            $editor->GetValidatorCollection()->AddValidator($validator);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddMultiEditColumn($editColumn);
            
            //
            // Edit column for longitude field
            //
            $editor = new TextEdit('longitude_edit');
            $editColumn = new CustomEditColumn('Longitude', 'longitude', $editor, $this->dataset);
            $validator = new RequiredValidator(StringUtils::Format($this->GetLocalizerCaptions()->GetMessageString('RequiredValidationMessage'), $editColumn->GetCaption()));
            $editor->GetValidatorCollection()->AddValidator($validator);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddMultiEditColumn($editColumn);
            
            //
            // Edit column for Observacoe2 field
            //
            $editor = new TextEdit('observacoe2_edit');
            $editColumn = new CustomEditColumn('Observações', 'Observacoe2', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddMultiEditColumn($editColumn);
            
            //
            // Edit column for revisao field
            //
            $editor = new TextEdit('revisao_edit');
            $editColumn = new CustomEditColumn('Revisão', 'revisao', $editor, $this->dataset);
            $validator = new RequiredValidator(StringUtils::Format($this->GetLocalizerCaptions()->GetMessageString('RequiredValidationMessage'), $editColumn->GetCaption()));
            $editor->GetValidatorCollection()->AddValidator($validator);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddMultiEditColumn($editColumn);
            
            //
            // Edit column for id_concessionaria field
            //
            $editor = new SpinEdit('id_concessionaria_edit');
            $editColumn = new CustomEditColumn('Id Concessionaria', 'id_concessionaria', $editor, $this->dataset);
            $validator = new RequiredValidator(StringUtils::Format($this->GetLocalizerCaptions()->GetMessageString('RequiredValidationMessage'), $editColumn->GetCaption()));
            $editor->GetValidatorCollection()->AddValidator($validator);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddMultiEditColumn($editColumn);
            
            //
            // Edit column for idtbl_ano field
            //
            $editor = new TextEdit('idtbl_ano_edit');
            $editColumn = new CustomEditColumn('Idtbl Ano', 'idtbl_ano', $editor, $this->dataset);
            $validator = new RequiredValidator(StringUtils::Format($this->GetLocalizerCaptions()->GetMessageString('RequiredValidationMessage'), $editColumn->GetCaption()));
            $editor->GetValidatorCollection()->AddValidator($validator);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddMultiEditColumn($editColumn);
        }
    
        protected function AddInsertColumns(Grid $grid)
        {
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
            $editColumn = new DynamicLookupEditColumn('Usuário', 'id_gerenciador', 'id_gerenciador_Nome Operador', 'insert_tbl_usuarios_concessionarias03_tbl_ano_contratual_monitoramento_igg_id_gerenciador_search', $editor, $this->dataset, $lookupDataset, 'idUsuario', 'Nome Operador', '');
            $editColumn->SetReadOnly(true);
            $validator = new RequiredValidator(StringUtils::Format($this->GetLocalizerCaptions()->GetMessageString('RequiredValidationMessage'), $editColumn->GetCaption()));
            $editor->GetValidatorCollection()->AddValidator($validator);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddInsertColumn($editColumn);
            
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
            $editColumn = new DynamicLookupEditColumn('Lote', 'idConcessiona', 'idConcessiona_Lote', 'insert_tbl_usuarios_concessionarias03_tbl_ano_contratual_monitoramento_igg_idConcessiona_search', $editor, $this->dataset, $lookupDataset, 'idConcessiona', 'Lote', '');
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddInsertColumn($editColumn);
            
            //
            // Edit column for id_rodovia field
            //
            $editor = new TextEdit('id_rodovia_edit');
            $editColumn = new CustomEditColumn('Rodovia', 'id_rodovia', $editor, $this->dataset);
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
            $editColumn = new DynamicLookupEditColumn('Pista', 'idPista', 'idPista_DescricaoPista', 'insert_tbl_usuarios_concessionarias03_tbl_ano_contratual_monitoramento_igg_idPista_search', $editor, $this->dataset, $lookupDataset, 'idPista', 'DescricaoPista', '');
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
            $editColumn = new DynamicLookupEditColumn('Sentido tráfego (quilometragem)', 'idSentidotrafego', 'idSentidotrafego_Descricao', 'insert_tbl_usuarios_concessionarias03_tbl_ano_contratual_monitoramento_igg_idSentidotrafego_search', $editor, $this->dataset, $lookupDataset, 'idSentidotrafego', 'Descricao', '');
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddInsertColumn($editColumn);
            
            //
            // Edit column for km_referencia field
            //
            $editor = new TextEdit('km_referencia_edit');
            $editColumn = new CustomEditColumn('Km Referencia', 'km_referencia', $editor, $this->dataset);
            $validator = new RequiredValidator(StringUtils::Format($this->GetLocalizerCaptions()->GetMessageString('RequiredValidationMessage'), $editColumn->GetCaption()));
            $editor->GetValidatorCollection()->AddValidator($validator);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddInsertColumn($editColumn);
            
            //
            // Edit column for alca_ramo field
            //
            $editor = new TextEdit('alca_ramo_edit');
            $editColumn = new CustomEditColumn('Alca Ramo', 'alca_ramo', $editor, $this->dataset);
            $validator = new RequiredValidator(StringUtils::Format($this->GetLocalizerCaptions()->GetMessageString('RequiredValidationMessage'), $editColumn->GetCaption()));
            $editor->GetValidatorCollection()->AddValidator($validator);
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
            $editColumn = new DynamicLookupEditColumn('Faixa', 'idFaixa', 'idFaixa_DescricaoFaixa', 'insert_tbl_usuarios_concessionarias03_tbl_ano_contratual_monitoramento_igg_idFaixa_search', $editor, $this->dataset, $lookupDataset, 'idFaixa', 'DescricaoFaixa', '');
            $editColumn->SetAllowSetToNull(true);
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
            $editColumn = new DynamicLookupEditColumn('Via', 'id_via', 'id_via_DescricaoVia', 'insert_tbl_usuarios_concessionarias03_tbl_ano_contratual_monitoramento_igg_id_via_search', $editor, $this->dataset, $lookupDataset, 'idVia', 'DescricaoVia', '');
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
            $editColumn = new DynamicLookupEditColumn('Seção Terrap.', 'id_secao_terrap', 'id_secao_terrap_DescricaoSecao', 'insert_tbl_usuarios_concessionarias03_tbl_ano_contratual_monitoramento_igg_id_secao_terrap_search', $editor, $this->dataset, $lookupDataset, 'idSecao', 'DescricaoSecao', '');
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
            $editColumn = new DynamicLookupEditColumn('Tipo Revestimento', 'tipo_revestimento', 'tipo_revestimento_DescricaoMaterial', 'insert_tbl_usuarios_concessionarias03_tbl_ano_contratual_monitoramento_igg_tipo_revestimento_search', $editor, $this->dataset, $lookupDataset, 'idMaterial', 'DescricaoMaterial', '');
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddInsertColumn($editColumn);
            
            //
            // Edit column for Ok field
            //
            $editor = new TextEdit('ok_edit');
            $editColumn = new CustomEditColumn('Ok', 'Ok', $editor, $this->dataset);
            $validator = new RequiredValidator(StringUtils::Format($this->GetLocalizerCaptions()->GetMessageString('RequiredValidationMessage'), $editColumn->GetCaption()));
            $editor->GetValidatorCollection()->AddValidator($validator);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddInsertColumn($editColumn);
            
            //
            // Edit column for ID_FI field
            //
            $editor = new TextEdit('id_fi_edit');
            $editColumn = new CustomEditColumn('ID FI', 'ID_FI', $editor, $this->dataset);
            $validator = new RequiredValidator(StringUtils::Format($this->GetLocalizerCaptions()->GetMessageString('RequiredValidationMessage'), $editColumn->GetCaption()));
            $editor->GetValidatorCollection()->AddValidator($validator);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddInsertColumn($editColumn);
            
            //
            // Edit column for ID_TTC field
            //
            $editor = new TextEdit('id_ttc_edit');
            $editColumn = new CustomEditColumn('ID TTC', 'ID_TTC', $editor, $this->dataset);
            $validator = new RequiredValidator(StringUtils::Format($this->GetLocalizerCaptions()->GetMessageString('RequiredValidationMessage'), $editColumn->GetCaption()));
            $editor->GetValidatorCollection()->AddValidator($validator);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddInsertColumn($editColumn);
            
            //
            // Edit column for ID_TTL field
            //
            $editor = new TextEdit('id_ttl_edit');
            $editColumn = new CustomEditColumn('ID TTL', 'ID_TTL', $editor, $this->dataset);
            $validator = new RequiredValidator(StringUtils::Format($this->GetLocalizerCaptions()->GetMessageString('RequiredValidationMessage'), $editColumn->GetCaption()));
            $editor->GetValidatorCollection()->AddValidator($validator);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddInsertColumn($editColumn);
            
            //
            // Edit column for ID_TLC field
            //
            $editor = new TextEdit('id_tlc_edit');
            $editColumn = new CustomEditColumn('ID TLC', 'ID_TLC', $editor, $this->dataset);
            $validator = new RequiredValidator(StringUtils::Format($this->GetLocalizerCaptions()->GetMessageString('RequiredValidationMessage'), $editColumn->GetCaption()));
            $editor->GetValidatorCollection()->AddValidator($validator);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddInsertColumn($editColumn);
            
            //
            // Edit column for ID_TLL field
            //
            $editor = new TextEdit('id_tll_edit');
            $editColumn = new CustomEditColumn('ID TLL', 'ID_TLL', $editor, $this->dataset);
            $validator = new RequiredValidator(StringUtils::Format($this->GetLocalizerCaptions()->GetMessageString('RequiredValidationMessage'), $editColumn->GetCaption()));
            $editor->GetValidatorCollection()->AddValidator($validator);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddInsertColumn($editColumn);
            
            //
            // Edit column for ID_TRR field
            //
            $editor = new TextEdit('id_trr_edit');
            $editColumn = new CustomEditColumn('ID TRR', 'ID_TRR', $editor, $this->dataset);
            $validator = new RequiredValidator(StringUtils::Format($this->GetLocalizerCaptions()->GetMessageString('RequiredValidationMessage'), $editColumn->GetCaption()));
            $editor->GetValidatorCollection()->AddValidator($validator);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddInsertColumn($editColumn);
            
            //
            // Edit column for ID_J field
            //
            $editor = new TextEdit('id_j_edit');
            $editColumn = new CustomEditColumn('ID J', 'ID_J', $editor, $this->dataset);
            $validator = new RequiredValidator(StringUtils::Format($this->GetLocalizerCaptions()->GetMessageString('RequiredValidationMessage'), $editColumn->GetCaption()));
            $editor->GetValidatorCollection()->AddValidator($validator);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddInsertColumn($editColumn);
            
            //
            // Edit column for ID_TB field
            //
            $editor = new TextEdit('id_tb_edit');
            $editColumn = new CustomEditColumn('ID TB', 'ID_TB', $editor, $this->dataset);
            $validator = new RequiredValidator(StringUtils::Format($this->GetLocalizerCaptions()->GetMessageString('RequiredValidationMessage'), $editColumn->GetCaption()));
            $editor->GetValidatorCollection()->AddValidator($validator);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddInsertColumn($editColumn);
            
            //
            // Edit column for ID_JE field
            //
            $editor = new TextEdit('id_je_edit');
            $editColumn = new CustomEditColumn('ID JE', 'ID_JE', $editor, $this->dataset);
            $validator = new RequiredValidator(StringUtils::Format($this->GetLocalizerCaptions()->GetMessageString('RequiredValidationMessage'), $editColumn->GetCaption()));
            $editor->GetValidatorCollection()->AddValidator($validator);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddInsertColumn($editColumn);
            
            //
            // Edit column for ID_TBE field
            //
            $editor = new TextEdit('id_tbe_edit');
            $editColumn = new CustomEditColumn('ID TBE', 'ID_TBE', $editor, $this->dataset);
            $validator = new RequiredValidator(StringUtils::Format($this->GetLocalizerCaptions()->GetMessageString('RequiredValidationMessage'), $editColumn->GetCaption()));
            $editor->GetValidatorCollection()->AddValidator($validator);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddInsertColumn($editColumn);
            
            //
            // Edit column for ID_ALP field
            //
            $editor = new TextEdit('id_alp_edit');
            $editColumn = new CustomEditColumn('ID ALP', 'ID_ALP', $editor, $this->dataset);
            $validator = new RequiredValidator(StringUtils::Format($this->GetLocalizerCaptions()->GetMessageString('RequiredValidationMessage'), $editColumn->GetCaption()));
            $editor->GetValidatorCollection()->AddValidator($validator);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddInsertColumn($editColumn);
            
            //
            // Edit column for ID_ATP field
            //
            $editor = new TextEdit('id_atp_edit');
            $editColumn = new CustomEditColumn('ID ATP', 'ID_ATP', $editor, $this->dataset);
            $validator = new RequiredValidator(StringUtils::Format($this->GetLocalizerCaptions()->GetMessageString('RequiredValidationMessage'), $editColumn->GetCaption()));
            $editor->GetValidatorCollection()->AddValidator($validator);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddInsertColumn($editColumn);
            
            //
            // Edit column for ID_O field
            //
            $editor = new TextEdit('id_o_edit');
            $editColumn = new CustomEditColumn('ID O', 'ID_O', $editor, $this->dataset);
            $validator = new RequiredValidator(StringUtils::Format($this->GetLocalizerCaptions()->GetMessageString('RequiredValidationMessage'), $editColumn->GetCaption()));
            $editor->GetValidatorCollection()->AddValidator($validator);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddInsertColumn($editColumn);
            
            //
            // Edit column for ID_P field
            //
            $editor = new TextEdit('id_p_edit');
            $editColumn = new CustomEditColumn('ID P', 'ID_P', $editor, $this->dataset);
            $validator = new RequiredValidator(StringUtils::Format($this->GetLocalizerCaptions()->GetMessageString('RequiredValidationMessage'), $editColumn->GetCaption()));
            $editor->GetValidatorCollection()->AddValidator($validator);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddInsertColumn($editColumn);
            
            //
            // Edit column for ID_EX field
            //
            $editor = new TextEdit('id_ex_edit');
            $editColumn = new CustomEditColumn('ID EX', 'ID_EX', $editor, $this->dataset);
            $validator = new RequiredValidator(StringUtils::Format($this->GetLocalizerCaptions()->GetMessageString('RequiredValidationMessage'), $editColumn->GetCaption()));
            $editor->GetValidatorCollection()->AddValidator($validator);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddInsertColumn($editColumn);
            
            //
            // Edit column for ID_D field
            //
            $editor = new TextEdit('id_d_edit');
            $editColumn = new CustomEditColumn('ID D', 'ID_D', $editor, $this->dataset);
            $validator = new RequiredValidator(StringUtils::Format($this->GetLocalizerCaptions()->GetMessageString('RequiredValidationMessage'), $editColumn->GetCaption()));
            $editor->GetValidatorCollection()->AddValidator($validator);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddInsertColumn($editColumn);
            
            //
            // Edit column for ID_R field
            //
            $editor = new TextEdit('id_r_edit');
            $editColumn = new CustomEditColumn('ID R', 'ID_R', $editor, $this->dataset);
            $validator = new RequiredValidator(StringUtils::Format($this->GetLocalizerCaptions()->GetMessageString('RequiredValidationMessage'), $editColumn->GetCaption()));
            $editor->GetValidatorCollection()->AddValidator($validator);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddInsertColumn($editColumn);
            
            //
            // Edit column for ID_ALC field
            //
            $editor = new TextEdit('id_alc_edit');
            $editColumn = new CustomEditColumn('ID ALC', 'ID_ALC', $editor, $this->dataset);
            $validator = new RequiredValidator(StringUtils::Format($this->GetLocalizerCaptions()->GetMessageString('RequiredValidationMessage'), $editColumn->GetCaption()));
            $editor->GetValidatorCollection()->AddValidator($validator);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddInsertColumn($editColumn);
            
            //
            // Edit column for ID_ATC field
            //
            $editor = new TextEdit('id_atc_edit');
            $editColumn = new CustomEditColumn('ID ATC', 'ID_ATC', $editor, $this->dataset);
            $validator = new RequiredValidator(StringUtils::Format($this->GetLocalizerCaptions()->GetMessageString('RequiredValidationMessage'), $editColumn->GetCaption()));
            $editor->GetValidatorCollection()->AddValidator($validator);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddInsertColumn($editColumn);
            
            //
            // Edit column for ID_E field
            //
            $editor = new TextEdit('id_e_edit');
            $editColumn = new CustomEditColumn('ID E', 'ID_E', $editor, $this->dataset);
            $validator = new RequiredValidator(StringUtils::Format($this->GetLocalizerCaptions()->GetMessageString('RequiredValidationMessage'), $editColumn->GetCaption()));
            $editor->GetValidatorCollection()->AddValidator($validator);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddInsertColumn($editColumn);
            
            //
            // Edit column for FL_TRE field
            //
            $editor = new TextEdit('fl_tre_edit');
            $editColumn = new CustomEditColumn('FL TRE', 'FL_TRE', $editor, $this->dataset);
            $validator = new RequiredValidator(StringUtils::Format($this->GetLocalizerCaptions()->GetMessageString('RequiredValidationMessage'), $editColumn->GetCaption()));
            $editor->GetValidatorCollection()->AddValidator($validator);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddInsertColumn($editColumn);
            
            //
            // Edit column for FL_TRI field
            //
            $editor = new TextEdit('fl_tri_edit');
            $editColumn = new CustomEditColumn('FL TRI', 'FL_TRI', $editor, $this->dataset);
            $validator = new RequiredValidator(StringUtils::Format($this->GetLocalizerCaptions()->GetMessageString('RequiredValidationMessage'), $editColumn->GetCaption()));
            $editor->GetValidatorCollection()->AddValidator($validator);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddInsertColumn($editColumn);
            
            //
            // Edit column for ID_FC2 field
            //
            $editor = new TextEdit('id_fc2_edit');
            $editColumn = new CustomEditColumn('ID FC2', 'ID_FC2', $editor, $this->dataset);
            $validator = new RequiredValidator(StringUtils::Format($this->GetLocalizerCaptions()->GetMessageString('RequiredValidationMessage'), $editColumn->GetCaption()));
            $editor->GetValidatorCollection()->AddValidator($validator);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddInsertColumn($editColumn);
            
            //
            // Edit column for ID_FC3 field
            //
            $editor = new TextEdit('id_fc3_edit');
            $editColumn = new CustomEditColumn('ID FC3', 'ID_FC3', $editor, $this->dataset);
            $validator = new RequiredValidator(StringUtils::Format($this->GetLocalizerCaptions()->GetMessageString('RequiredValidationMessage'), $editColumn->GetCaption()));
            $editor->GetValidatorCollection()->AddValidator($validator);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddInsertColumn($editColumn);
            
            //
            // Edit column for PA field
            //
            $editor = new TextEdit('pa_edit');
            $editColumn = new CustomEditColumn('PA', 'PA', $editor, $this->dataset);
            $validator = new RequiredValidator(StringUtils::Format($this->GetLocalizerCaptions()->GetMessageString('RequiredValidationMessage'), $editColumn->GetCaption()));
            $editor->GetValidatorCollection()->AddValidator($validator);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddInsertColumn($editColumn);
            
            //
            // Edit column for AT_ON field
            //
            $editor = new TextEdit('at_on_edit');
            $editColumn = new CustomEditColumn('AT ON', 'AT_ON', $editor, $this->dataset);
            $validator = new RequiredValidator(StringUtils::Format($this->GetLocalizerCaptions()->GetMessageString('RequiredValidationMessage'), $editColumn->GetCaption()));
            $editor->GetValidatorCollection()->AddValidator($validator);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddInsertColumn($editColumn);
            
            //
            // Edit column for dtRegistro field
            //
            $editor = new DateTimeEdit('dtregistro_edit', false, 'd-m-Y');
            $editColumn = new CustomEditColumn('Data Registro', 'dtRegistro', $editor, $this->dataset);
            $validator = new RequiredValidator(StringUtils::Format($this->GetLocalizerCaptions()->GetMessageString('RequiredValidationMessage'), $editColumn->GetCaption()));
            $editor->GetValidatorCollection()->AddValidator($validator);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddInsertColumn($editColumn);
            
            //
            // Edit column for Hora field
            //
            $editor = new TextEdit('hora_edit');
            $editColumn = new CustomEditColumn('Hora', 'Hora', $editor, $this->dataset);
            $validator = new RequiredValidator(StringUtils::Format($this->GetLocalizerCaptions()->GetMessageString('RequiredValidationMessage'), $editColumn->GetCaption()));
            $editor->GetValidatorCollection()->AddValidator($validator);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddInsertColumn($editColumn);
            
            //
            // Edit column for Observacoes field
            //
            $editor = new TextEdit('observacoes_edit');
            $editColumn = new CustomEditColumn('Observacoes', 'Observacoes', $editor, $this->dataset);
            $validator = new RequiredValidator(StringUtils::Format($this->GetLocalizerCaptions()->GetMessageString('RequiredValidationMessage'), $editColumn->GetCaption()));
            $editor->GetValidatorCollection()->AddValidator($validator);
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
            $editColumn = new DynamicLookupEditColumn('Interferência', 'idInterferencia', 'idInterferencia_tipo_interferncia', 'insert_tbl_usuarios_concessionarias03_tbl_ano_contratual_monitoramento_igg_idInterferencia_search', $editor, $this->dataset, $lookupDataset, 'idInterferencia', 'tipo_interferncia', '');
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddInsertColumn($editColumn);
            
            //
            // Edit column for id_km field
            //
            $editor = new TextEdit('id_km_edit');
            $editColumn = new CustomEditColumn('Km', 'id_km', $editor, $this->dataset);
            $validator = new RequiredValidator(StringUtils::Format($this->GetLocalizerCaptions()->GetMessageString('RequiredValidationMessage'), $editColumn->GetCaption()));
            $editor->GetValidatorCollection()->AddValidator($validator);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddInsertColumn($editColumn);
            
            //
            // Edit column for id_anocontratual field
            //
            $editor = new TextEdit('id_anocontratual_edit');
            $editColumn = new CustomEditColumn('Ano', 'id_anocontratual', $editor, $this->dataset);
            $validator = new RequiredValidator(StringUtils::Format($this->GetLocalizerCaptions()->GetMessageString('RequiredValidationMessage'), $editColumn->GetCaption()));
            $editor->GetValidatorCollection()->AddValidator($validator);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddInsertColumn($editColumn);
            
            //
            // Edit column for marco_km field
            //
            $editor = new TextEdit('marco_km_edit');
            $editColumn = new CustomEditColumn('Marco Km', 'marco_km', $editor, $this->dataset);
            $validator = new RequiredValidator(StringUtils::Format($this->GetLocalizerCaptions()->GetMessageString('RequiredValidationMessage'), $editColumn->GetCaption()));
            $editor->GetValidatorCollection()->AddValidator($validator);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddInsertColumn($editColumn);
            
            //
            // Edit column for latitude field
            //
            $editor = new TextEdit('latitude_edit');
            $editColumn = new CustomEditColumn('Latitude', 'latitude', $editor, $this->dataset);
            $validator = new RequiredValidator(StringUtils::Format($this->GetLocalizerCaptions()->GetMessageString('RequiredValidationMessage'), $editColumn->GetCaption()));
            $editor->GetValidatorCollection()->AddValidator($validator);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddInsertColumn($editColumn);
            
            //
            // Edit column for longitude field
            //
            $editor = new TextEdit('longitude_edit');
            $editColumn = new CustomEditColumn('Longitude', 'longitude', $editor, $this->dataset);
            $validator = new RequiredValidator(StringUtils::Format($this->GetLocalizerCaptions()->GetMessageString('RequiredValidationMessage'), $editColumn->GetCaption()));
            $editor->GetValidatorCollection()->AddValidator($validator);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddInsertColumn($editColumn);
            
            //
            // Edit column for Observacoe2 field
            //
            $editor = new TextEdit('observacoe2_edit');
            $editColumn = new CustomEditColumn('Observações', 'Observacoe2', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddInsertColumn($editColumn);
            
            //
            // Edit column for revisao field
            //
            $editor = new TextEdit('revisao_edit');
            $editColumn = new CustomEditColumn('Revisão', 'revisao', $editor, $this->dataset);
            $validator = new RequiredValidator(StringUtils::Format($this->GetLocalizerCaptions()->GetMessageString('RequiredValidationMessage'), $editColumn->GetCaption()));
            $editor->GetValidatorCollection()->AddValidator($validator);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddInsertColumn($editColumn);
            
            //
            // Edit column for idanocontratual field
            //
            $editor = new TextEdit('idanocontratual_edit');
            $editColumn = new CustomEditColumn('Idanocontratual', 'idanocontratual', $editor, $this->dataset);
            $validator = new RequiredValidator(StringUtils::Format($this->GetLocalizerCaptions()->GetMessageString('RequiredValidationMessage'), $editColumn->GetCaption()));
            $editor->GetValidatorCollection()->AddValidator($validator);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddInsertColumn($editColumn);
            
            //
            // Edit column for id_concessionaria field
            //
            $editor = new SpinEdit('id_concessionaria_edit');
            $editColumn = new CustomEditColumn('Id Concessionaria', 'id_concessionaria', $editor, $this->dataset);
            $validator = new RequiredValidator(StringUtils::Format($this->GetLocalizerCaptions()->GetMessageString('RequiredValidationMessage'), $editColumn->GetCaption()));
            $editor->GetValidatorCollection()->AddValidator($validator);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddInsertColumn($editColumn);
            
            //
            // Edit column for idtbl_ano field
            //
            $editor = new TextEdit('idtbl_ano_edit');
            $editColumn = new CustomEditColumn('Idtbl Ano', 'idtbl_ano', $editor, $this->dataset);
            $validator = new RequiredValidator(StringUtils::Format($this->GetLocalizerCaptions()->GetMessageString('RequiredValidationMessage'), $editColumn->GetCaption()));
            $editor->GetValidatorCollection()->AddValidator($validator);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddInsertColumn($editColumn);
            $grid->SetShowAddButton(false && $this->GetSecurityInfo()->HasAddGrant());
        }
    
        private function AddMultiUploadColumn(Grid $grid)
        {
    
        }
    
        protected function AddPrintColumns(Grid $grid)
        {
            //
            // View column for idMonitoramento field
            //
            $column = new NumberViewColumn('idMonitoramento', 'idMonitoramento', 'Ficha Nº', $this->dataset);
            $column->SetOrderable(true);
            $column->setNumberAfterDecimal(0);
            $column->setThousandsSeparator('.');
            $column->setDecimalSeparator('');
            $grid->AddPrintColumn($column);
            
            //
            // View column for Nome Operador field
            //
            $column = new TextViewColumn('id_gerenciador', 'id_gerenciador_Nome Operador', 'Usuário', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddPrintColumn($column);
            
            //
            // View column for Lote field
            //
            $column = new TextViewColumn('idConcessiona', 'idConcessiona_Lote', 'Lote', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddPrintColumn($column);
            
            //
            // View column for id_rodovia field
            //
            $column = new TextViewColumn('id_rodovia', 'id_rodovia', 'Rodovia', $this->dataset);
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
            $column = new TextViewColumn('km_referencia', 'km_referencia', 'Km Referencia', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddPrintColumn($column);
            
            //
            // View column for alca_ramo field
            //
            $column = new TextViewColumn('alca_ramo', 'alca_ramo', 'Alca Ramo', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddPrintColumn($column);
            
            //
            // View column for DescricaoFaixa field
            //
            $column = new TextViewColumn('idFaixa', 'idFaixa_DescricaoFaixa', 'Faixa', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddPrintColumn($column);
            
            //
            // View column for DescricaoVia field
            //
            $column = new TextViewColumn('id_via', 'id_via_DescricaoVia', 'Via', $this->dataset);
            $column->SetOrderable(true);
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
            $column = new TextViewColumn('Ok', 'Ok', 'Ok', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddPrintColumn($column);
            
            //
            // View column for ID_FI field
            //
            $column = new TextViewColumn('ID_FI', 'ID_FI', 'ID FI', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddPrintColumn($column);
            
            //
            // View column for ID_TTC field
            //
            $column = new TextViewColumn('ID_TTC', 'ID_TTC', 'ID TTC', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddPrintColumn($column);
            
            //
            // View column for ID_TTL field
            //
            $column = new TextViewColumn('ID_TTL', 'ID_TTL', 'ID TTL', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddPrintColumn($column);
            
            //
            // View column for ID_TLC field
            //
            $column = new TextViewColumn('ID_TLC', 'ID_TLC', 'ID TLC', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddPrintColumn($column);
            
            //
            // View column for ID_TLL field
            //
            $column = new TextViewColumn('ID_TLL', 'ID_TLL', 'ID TLL', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddPrintColumn($column);
            
            //
            // View column for ID_TRR field
            //
            $column = new TextViewColumn('ID_TRR', 'ID_TRR', 'ID TRR', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddPrintColumn($column);
            
            //
            // View column for ID_J field
            //
            $column = new TextViewColumn('ID_J', 'ID_J', 'ID J', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddPrintColumn($column);
            
            //
            // View column for ID_TB field
            //
            $column = new TextViewColumn('ID_TB', 'ID_TB', 'ID TB', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddPrintColumn($column);
            
            //
            // View column for ID_JE field
            //
            $column = new TextViewColumn('ID_JE', 'ID_JE', 'ID JE', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddPrintColumn($column);
            
            //
            // View column for ID_TBE field
            //
            $column = new TextViewColumn('ID_TBE', 'ID_TBE', 'ID TBE', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddPrintColumn($column);
            
            //
            // View column for ID_ALP field
            //
            $column = new TextViewColumn('ID_ALP', 'ID_ALP', 'ID ALP', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddPrintColumn($column);
            
            //
            // View column for ID_ATP field
            //
            $column = new TextViewColumn('ID_ATP', 'ID_ATP', 'ID ATP', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddPrintColumn($column);
            
            //
            // View column for ID_O field
            //
            $column = new TextViewColumn('ID_O', 'ID_O', 'ID O', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddPrintColumn($column);
            
            //
            // View column for ID_P field
            //
            $column = new TextViewColumn('ID_P', 'ID_P', 'ID P', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddPrintColumn($column);
            
            //
            // View column for ID_EX field
            //
            $column = new TextViewColumn('ID_EX', 'ID_EX', 'ID EX', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddPrintColumn($column);
            
            //
            // View column for ID_D field
            //
            $column = new TextViewColumn('ID_D', 'ID_D', 'ID D', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddPrintColumn($column);
            
            //
            // View column for ID_R field
            //
            $column = new TextViewColumn('ID_R', 'ID_R', 'ID R', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddPrintColumn($column);
            
            //
            // View column for ID_ALC field
            //
            $column = new TextViewColumn('ID_ALC', 'ID_ALC', 'ID ALC', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddPrintColumn($column);
            
            //
            // View column for ID_ATC field
            //
            $column = new TextViewColumn('ID_ATC', 'ID_ATC', 'ID ATC', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddPrintColumn($column);
            
            //
            // View column for ID_E field
            //
            $column = new TextViewColumn('ID_E', 'ID_E', 'ID E', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddPrintColumn($column);
            
            //
            // View column for FL_TRE field
            //
            $column = new NumberViewColumn('FL_TRE', 'FL_TRE', 'FL TRE', $this->dataset);
            $column->SetOrderable(true);
            $column->setNumberAfterDecimal(2);
            $column->setThousandsSeparator('.');
            $column->setDecimalSeparator(',');
            $grid->AddPrintColumn($column);
            
            //
            // View column for FL_TRI field
            //
            $column = new NumberViewColumn('FL_TRI', 'FL_TRI', 'FL TRI', $this->dataset);
            $column->SetOrderable(true);
            $column->setNumberAfterDecimal(2);
            $column->setThousandsSeparator('.');
            $column->setDecimalSeparator(',');
            $grid->AddPrintColumn($column);
            
            //
            // View column for ID_FC2 field
            //
            $column = new NumberViewColumn('ID_FC2', 'ID_FC2', 'ID FC2', $this->dataset);
            $column->SetOrderable(true);
            $column->setNumberAfterDecimal(2);
            $column->setThousandsSeparator('.');
            $column->setDecimalSeparator(',');
            $grid->AddPrintColumn($column);
            
            //
            // View column for ID_FC3 field
            //
            $column = new NumberViewColumn('ID_FC3', 'ID_FC3', 'ID FC3', $this->dataset);
            $column->SetOrderable(true);
            $column->setNumberAfterDecimal(2);
            $column->setThousandsSeparator('.');
            $column->setDecimalSeparator(',');
            $grid->AddPrintColumn($column);
            
            //
            // View column for PA field
            //
            $column = new NumberViewColumn('PA', 'PA', 'PA', $this->dataset);
            $column->SetOrderable(true);
            $column->setNumberAfterDecimal(2);
            $column->setThousandsSeparator('.');
            $column->setDecimalSeparator(',');
            $grid->AddPrintColumn($column);
            
            //
            // View column for AT_ON field
            //
            $column = new NumberViewColumn('AT_ON', 'AT_ON', 'AT ON', $this->dataset);
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
            $column = new TextViewColumn('Observacoes', 'Observacoes', 'Observacoes', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddPrintColumn($column);
            
            //
            // View column for tipo_interferncia field
            //
            $column = new TextViewColumn('idInterferencia', 'idInterferencia_tipo_interferncia', 'Interferência', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddPrintColumn($column);
            
            //
            // View column for id_km field
            //
            $column = new NumberViewColumn('id_km', 'id_km', 'Km', $this->dataset);
            $column->SetOrderable(true);
            $column->setNumberAfterDecimal(2);
            $column->setThousandsSeparator('.');
            $column->setDecimalSeparator(',');
            $grid->AddPrintColumn($column);
            
            //
            // View column for id_anocontratual field
            //
            $column = new TextViewColumn('id_anocontratual', 'id_anocontratual', 'Ano', $this->dataset);
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
            $grid->AddPrintColumn($column);
            
            //
            // View column for revisao field
            //
            $column = new TextViewColumn('revisao', 'revisao', 'Revisão', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddPrintColumn($column);
            
            //
            // View column for idanocontratual field
            //
            $column = new NumberViewColumn('idanocontratual', 'idanocontratual', 'Idanocontratual', $this->dataset);
            $column->SetOrderable(true);
            $column->setNumberAfterDecimal(0);
            $column->setThousandsSeparator('.');
            $column->setDecimalSeparator('');
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
            // View column for idtbl_ano field
            //
            $column = new TextViewColumn('idtbl_ano', 'idtbl_ano', 'Idtbl Ano', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddPrintColumn($column);
        }
    
        protected function AddExportColumns(Grid $grid)
        {
            //
            // View column for idMonitoramento field
            //
            $column = new NumberViewColumn('idMonitoramento', 'idMonitoramento', 'Ficha Nº', $this->dataset);
            $column->SetOrderable(true);
            $column->setNumberAfterDecimal(0);
            $column->setThousandsSeparator('.');
            $column->setDecimalSeparator('');
            $grid->AddExportColumn($column);
            
            //
            // View column for Nome Operador field
            //
            $column = new TextViewColumn('id_gerenciador', 'id_gerenciador_Nome Operador', 'Usuário', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddExportColumn($column);
            
            //
            // View column for Lote field
            //
            $column = new TextViewColumn('idConcessiona', 'idConcessiona_Lote', 'Lote', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddExportColumn($column);
            
            //
            // View column for id_rodovia field
            //
            $column = new TextViewColumn('id_rodovia', 'id_rodovia', 'Rodovia', $this->dataset);
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
            $column = new TextViewColumn('km_referencia', 'km_referencia', 'Km Referencia', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddExportColumn($column);
            
            //
            // View column for alca_ramo field
            //
            $column = new TextViewColumn('alca_ramo', 'alca_ramo', 'Alca Ramo', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddExportColumn($column);
            
            //
            // View column for DescricaoFaixa field
            //
            $column = new TextViewColumn('idFaixa', 'idFaixa_DescricaoFaixa', 'Faixa', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddExportColumn($column);
            
            //
            // View column for DescricaoVia field
            //
            $column = new TextViewColumn('id_via', 'id_via_DescricaoVia', 'Via', $this->dataset);
            $column->SetOrderable(true);
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
            $column = new TextViewColumn('Ok', 'Ok', 'Ok', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddExportColumn($column);
            
            //
            // View column for ID_FI field
            //
            $column = new TextViewColumn('ID_FI', 'ID_FI', 'ID FI', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddExportColumn($column);
            
            //
            // View column for ID_TTC field
            //
            $column = new TextViewColumn('ID_TTC', 'ID_TTC', 'ID TTC', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddExportColumn($column);
            
            //
            // View column for ID_TTL field
            //
            $column = new TextViewColumn('ID_TTL', 'ID_TTL', 'ID TTL', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddExportColumn($column);
            
            //
            // View column for ID_TLC field
            //
            $column = new TextViewColumn('ID_TLC', 'ID_TLC', 'ID TLC', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddExportColumn($column);
            
            //
            // View column for ID_TLL field
            //
            $column = new TextViewColumn('ID_TLL', 'ID_TLL', 'ID TLL', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddExportColumn($column);
            
            //
            // View column for ID_TRR field
            //
            $column = new TextViewColumn('ID_TRR', 'ID_TRR', 'ID TRR', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddExportColumn($column);
            
            //
            // View column for ID_J field
            //
            $column = new TextViewColumn('ID_J', 'ID_J', 'ID J', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddExportColumn($column);
            
            //
            // View column for ID_TB field
            //
            $column = new TextViewColumn('ID_TB', 'ID_TB', 'ID TB', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddExportColumn($column);
            
            //
            // View column for ID_JE field
            //
            $column = new TextViewColumn('ID_JE', 'ID_JE', 'ID JE', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddExportColumn($column);
            
            //
            // View column for ID_TBE field
            //
            $column = new TextViewColumn('ID_TBE', 'ID_TBE', 'ID TBE', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddExportColumn($column);
            
            //
            // View column for ID_ALP field
            //
            $column = new TextViewColumn('ID_ALP', 'ID_ALP', 'ID ALP', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddExportColumn($column);
            
            //
            // View column for ID_ATP field
            //
            $column = new TextViewColumn('ID_ATP', 'ID_ATP', 'ID ATP', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddExportColumn($column);
            
            //
            // View column for ID_O field
            //
            $column = new TextViewColumn('ID_O', 'ID_O', 'ID O', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddExportColumn($column);
            
            //
            // View column for ID_P field
            //
            $column = new TextViewColumn('ID_P', 'ID_P', 'ID P', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddExportColumn($column);
            
            //
            // View column for ID_EX field
            //
            $column = new TextViewColumn('ID_EX', 'ID_EX', 'ID EX', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddExportColumn($column);
            
            //
            // View column for ID_D field
            //
            $column = new TextViewColumn('ID_D', 'ID_D', 'ID D', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddExportColumn($column);
            
            //
            // View column for ID_R field
            //
            $column = new TextViewColumn('ID_R', 'ID_R', 'ID R', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddExportColumn($column);
            
            //
            // View column for ID_ALC field
            //
            $column = new TextViewColumn('ID_ALC', 'ID_ALC', 'ID ALC', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddExportColumn($column);
            
            //
            // View column for ID_ATC field
            //
            $column = new TextViewColumn('ID_ATC', 'ID_ATC', 'ID ATC', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddExportColumn($column);
            
            //
            // View column for ID_E field
            //
            $column = new TextViewColumn('ID_E', 'ID_E', 'ID E', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddExportColumn($column);
            
            //
            // View column for FL_TRE field
            //
            $column = new NumberViewColumn('FL_TRE', 'FL_TRE', 'FL TRE', $this->dataset);
            $column->SetOrderable(true);
            $column->setNumberAfterDecimal(2);
            $column->setThousandsSeparator('.');
            $column->setDecimalSeparator(',');
            $grid->AddExportColumn($column);
            
            //
            // View column for FL_TRI field
            //
            $column = new NumberViewColumn('FL_TRI', 'FL_TRI', 'FL TRI', $this->dataset);
            $column->SetOrderable(true);
            $column->setNumberAfterDecimal(2);
            $column->setThousandsSeparator('.');
            $column->setDecimalSeparator(',');
            $grid->AddExportColumn($column);
            
            //
            // View column for ID_FC2 field
            //
            $column = new NumberViewColumn('ID_FC2', 'ID_FC2', 'ID FC2', $this->dataset);
            $column->SetOrderable(true);
            $column->setNumberAfterDecimal(2);
            $column->setThousandsSeparator('.');
            $column->setDecimalSeparator(',');
            $grid->AddExportColumn($column);
            
            //
            // View column for ID_FC3 field
            //
            $column = new NumberViewColumn('ID_FC3', 'ID_FC3', 'ID FC3', $this->dataset);
            $column->SetOrderable(true);
            $column->setNumberAfterDecimal(2);
            $column->setThousandsSeparator('.');
            $column->setDecimalSeparator(',');
            $grid->AddExportColumn($column);
            
            //
            // View column for PA field
            //
            $column = new NumberViewColumn('PA', 'PA', 'PA', $this->dataset);
            $column->SetOrderable(true);
            $column->setNumberAfterDecimal(2);
            $column->setThousandsSeparator('.');
            $column->setDecimalSeparator(',');
            $grid->AddExportColumn($column);
            
            //
            // View column for AT_ON field
            //
            $column = new NumberViewColumn('AT_ON', 'AT_ON', 'AT ON', $this->dataset);
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
            $column = new TextViewColumn('Observacoes', 'Observacoes', 'Observacoes', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddExportColumn($column);
            
            //
            // View column for tipo_interferncia field
            //
            $column = new TextViewColumn('idInterferencia', 'idInterferencia_tipo_interferncia', 'Interferência', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddExportColumn($column);
            
            //
            // View column for id_km field
            //
            $column = new NumberViewColumn('id_km', 'id_km', 'Km', $this->dataset);
            $column->SetOrderable(true);
            $column->setNumberAfterDecimal(2);
            $column->setThousandsSeparator('.');
            $column->setDecimalSeparator(',');
            $grid->AddExportColumn($column);
            
            //
            // View column for id_anocontratual field
            //
            $column = new TextViewColumn('id_anocontratual', 'id_anocontratual', 'Ano', $this->dataset);
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
            $grid->AddExportColumn($column);
            
            //
            // View column for revisao field
            //
            $column = new TextViewColumn('revisao', 'revisao', 'Revisão', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddExportColumn($column);
            
            //
            // View column for idanocontratual field
            //
            $column = new NumberViewColumn('idanocontratual', 'idanocontratual', 'Idanocontratual', $this->dataset);
            $column->SetOrderable(true);
            $column->setNumberAfterDecimal(0);
            $column->setThousandsSeparator('.');
            $column->setDecimalSeparator('');
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
            // View column for idtbl_ano field
            //
            $column = new TextViewColumn('idtbl_ano', 'idtbl_ano', 'Idtbl Ano', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddExportColumn($column);
        }
    
        private function AddCompareColumns(Grid $grid)
        {
            //
            // View column for Nome Operador field
            //
            $column = new TextViewColumn('id_gerenciador', 'id_gerenciador_Nome Operador', 'Usuário', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddCompareColumn($column);
            
            //
            // View column for Lote field
            //
            $column = new TextViewColumn('idConcessiona', 'idConcessiona_Lote', 'Lote', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddCompareColumn($column);
            
            //
            // View column for id_rodovia field
            //
            $column = new TextViewColumn('id_rodovia', 'id_rodovia', 'Rodovia', $this->dataset);
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
            $column = new TextViewColumn('km_referencia', 'km_referencia', 'Km Referencia', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddCompareColumn($column);
            
            //
            // View column for alca_ramo field
            //
            $column = new TextViewColumn('alca_ramo', 'alca_ramo', 'Alca Ramo', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddCompareColumn($column);
            
            //
            // View column for DescricaoFaixa field
            //
            $column = new TextViewColumn('idFaixa', 'idFaixa_DescricaoFaixa', 'Faixa', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddCompareColumn($column);
            
            //
            // View column for DescricaoVia field
            //
            $column = new TextViewColumn('id_via', 'id_via_DescricaoVia', 'Via', $this->dataset);
            $column->SetOrderable(true);
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
            $column = new TextViewColumn('Ok', 'Ok', 'Ok', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddCompareColumn($column);
            
            //
            // View column for ID_FI field
            //
            $column = new TextViewColumn('ID_FI', 'ID_FI', 'ID FI', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddCompareColumn($column);
            
            //
            // View column for ID_TTC field
            //
            $column = new TextViewColumn('ID_TTC', 'ID_TTC', 'ID TTC', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddCompareColumn($column);
            
            //
            // View column for ID_TTL field
            //
            $column = new TextViewColumn('ID_TTL', 'ID_TTL', 'ID TTL', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddCompareColumn($column);
            
            //
            // View column for ID_TLC field
            //
            $column = new TextViewColumn('ID_TLC', 'ID_TLC', 'ID TLC', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddCompareColumn($column);
            
            //
            // View column for ID_TLL field
            //
            $column = new TextViewColumn('ID_TLL', 'ID_TLL', 'ID TLL', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddCompareColumn($column);
            
            //
            // View column for ID_TRR field
            //
            $column = new TextViewColumn('ID_TRR', 'ID_TRR', 'ID TRR', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddCompareColumn($column);
            
            //
            // View column for ID_J field
            //
            $column = new TextViewColumn('ID_J', 'ID_J', 'ID J', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddCompareColumn($column);
            
            //
            // View column for ID_TB field
            //
            $column = new TextViewColumn('ID_TB', 'ID_TB', 'ID TB', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddCompareColumn($column);
            
            //
            // View column for ID_JE field
            //
            $column = new TextViewColumn('ID_JE', 'ID_JE', 'ID JE', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddCompareColumn($column);
            
            //
            // View column for ID_TBE field
            //
            $column = new TextViewColumn('ID_TBE', 'ID_TBE', 'ID TBE', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddCompareColumn($column);
            
            //
            // View column for ID_ALP field
            //
            $column = new TextViewColumn('ID_ALP', 'ID_ALP', 'ID ALP', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddCompareColumn($column);
            
            //
            // View column for ID_ATP field
            //
            $column = new TextViewColumn('ID_ATP', 'ID_ATP', 'ID ATP', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddCompareColumn($column);
            
            //
            // View column for ID_O field
            //
            $column = new TextViewColumn('ID_O', 'ID_O', 'ID O', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddCompareColumn($column);
            
            //
            // View column for ID_P field
            //
            $column = new TextViewColumn('ID_P', 'ID_P', 'ID P', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddCompareColumn($column);
            
            //
            // View column for ID_EX field
            //
            $column = new TextViewColumn('ID_EX', 'ID_EX', 'ID EX', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddCompareColumn($column);
            
            //
            // View column for ID_D field
            //
            $column = new TextViewColumn('ID_D', 'ID_D', 'ID D', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddCompareColumn($column);
            
            //
            // View column for ID_R field
            //
            $column = new TextViewColumn('ID_R', 'ID_R', 'ID R', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddCompareColumn($column);
            
            //
            // View column for ID_ALC field
            //
            $column = new TextViewColumn('ID_ALC', 'ID_ALC', 'ID ALC', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddCompareColumn($column);
            
            //
            // View column for ID_ATC field
            //
            $column = new TextViewColumn('ID_ATC', 'ID_ATC', 'ID ATC', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddCompareColumn($column);
            
            //
            // View column for ID_E field
            //
            $column = new TextViewColumn('ID_E', 'ID_E', 'ID E', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddCompareColumn($column);
            
            //
            // View column for FL_TRE field
            //
            $column = new NumberViewColumn('FL_TRE', 'FL_TRE', 'FL TRE', $this->dataset);
            $column->SetOrderable(true);
            $column->setNumberAfterDecimal(2);
            $column->setThousandsSeparator('.');
            $column->setDecimalSeparator(',');
            $grid->AddCompareColumn($column);
            
            //
            // View column for FL_TRI field
            //
            $column = new NumberViewColumn('FL_TRI', 'FL_TRI', 'FL TRI', $this->dataset);
            $column->SetOrderable(true);
            $column->setNumberAfterDecimal(2);
            $column->setThousandsSeparator('.');
            $column->setDecimalSeparator(',');
            $grid->AddCompareColumn($column);
            
            //
            // View column for ID_FC2 field
            //
            $column = new NumberViewColumn('ID_FC2', 'ID_FC2', 'ID FC2', $this->dataset);
            $column->SetOrderable(true);
            $column->setNumberAfterDecimal(2);
            $column->setThousandsSeparator('.');
            $column->setDecimalSeparator(',');
            $grid->AddCompareColumn($column);
            
            //
            // View column for ID_FC3 field
            //
            $column = new NumberViewColumn('ID_FC3', 'ID_FC3', 'ID FC3', $this->dataset);
            $column->SetOrderable(true);
            $column->setNumberAfterDecimal(2);
            $column->setThousandsSeparator('.');
            $column->setDecimalSeparator(',');
            $grid->AddCompareColumn($column);
            
            //
            // View column for PA field
            //
            $column = new NumberViewColumn('PA', 'PA', 'PA', $this->dataset);
            $column->SetOrderable(true);
            $column->setNumberAfterDecimal(2);
            $column->setThousandsSeparator('.');
            $column->setDecimalSeparator(',');
            $grid->AddCompareColumn($column);
            
            //
            // View column for AT_ON field
            //
            $column = new NumberViewColumn('AT_ON', 'AT_ON', 'AT ON', $this->dataset);
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
            $column = new TextViewColumn('Observacoes', 'Observacoes', 'Observacoes', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddCompareColumn($column);
            
            //
            // View column for tipo_interferncia field
            //
            $column = new TextViewColumn('idInterferencia', 'idInterferencia_tipo_interferncia', 'Interferência', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddCompareColumn($column);
            
            //
            // View column for id_km field
            //
            $column = new NumberViewColumn('id_km', 'id_km', 'Km', $this->dataset);
            $column->SetOrderable(true);
            $column->setNumberAfterDecimal(2);
            $column->setThousandsSeparator('.');
            $column->setDecimalSeparator(',');
            $grid->AddCompareColumn($column);
            
            //
            // View column for id_anocontratual field
            //
            $column = new TextViewColumn('id_anocontratual', 'id_anocontratual', 'Ano', $this->dataset);
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
            $grid->AddCompareColumn($column);
            
            //
            // View column for revisao field
            //
            $column = new TextViewColumn('revisao', 'revisao', 'Revisão', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddCompareColumn($column);
            
            //
            // View column for idanocontratual field
            //
            $column = new NumberViewColumn('idanocontratual', 'idanocontratual', 'Idanocontratual', $this->dataset);
            $column->SetOrderable(true);
            $column->setNumberAfterDecimal(0);
            $column->setThousandsSeparator('.');
            $column->setDecimalSeparator('');
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
            // View column for idtbl_ano field
            //
            $column = new TextViewColumn('idtbl_ano', 'idtbl_ano', 'Idtbl Ano', $this->dataset);
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
    
        protected function CreateGrid()
        {
            $result = new Grid($this, $this->dataset);
            if ($this->GetSecurityInfo()->HasDeleteGrant())
               $result->SetAllowDeleteSelected(false);
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
            $result->setMultiEditAllowed($this->GetSecurityInfo()->HasEditGrant() && false);
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
            $handler = new DynamicSearchHandler($lookupDataset, $this, 'insert_tbl_usuarios_concessionarias03_tbl_ano_contratual_monitoramento_igg_id_gerenciador_search', 'idUsuario', 'Nome Operador', null, 20);
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
            $handler = new DynamicSearchHandler($lookupDataset, $this, 'insert_tbl_usuarios_concessionarias03_tbl_ano_contratual_monitoramento_igg_idConcessiona_search', 'idConcessiona', 'Lote', null, 20);
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
            $handler = new DynamicSearchHandler($lookupDataset, $this, 'insert_tbl_usuarios_concessionarias03_tbl_ano_contratual_monitoramento_igg_idPista_search', 'idPista', 'DescricaoPista', null, 20);
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
            $handler = new DynamicSearchHandler($lookupDataset, $this, 'insert_tbl_usuarios_concessionarias03_tbl_ano_contratual_monitoramento_igg_idSentidotrafego_search', 'idSentidotrafego', 'Descricao', null, 20);
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
            $handler = new DynamicSearchHandler($lookupDataset, $this, 'insert_tbl_usuarios_concessionarias03_tbl_ano_contratual_monitoramento_igg_idFaixa_search', 'idFaixa', 'DescricaoFaixa', null, 20);
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
            $handler = new DynamicSearchHandler($lookupDataset, $this, 'insert_tbl_usuarios_concessionarias03_tbl_ano_contratual_monitoramento_igg_id_via_search', 'idVia', 'DescricaoVia', null, 20);
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
            $handler = new DynamicSearchHandler($lookupDataset, $this, 'insert_tbl_usuarios_concessionarias03_tbl_ano_contratual_monitoramento_igg_id_secao_terrap_search', 'idSecao', 'DescricaoSecao', null, 20);
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
            $handler = new DynamicSearchHandler($lookupDataset, $this, 'insert_tbl_usuarios_concessionarias03_tbl_ano_contratual_monitoramento_igg_tipo_revestimento_search', 'idMaterial', 'DescricaoMaterial', null, 20);
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
            $handler = new DynamicSearchHandler($lookupDataset, $this, 'insert_tbl_usuarios_concessionarias03_tbl_ano_contratual_monitoramento_igg_idInterferencia_search', 'idInterferencia', 'tipo_interferncia', null, 20);
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
            $handler = new DynamicSearchHandler($lookupDataset, $this, 'filter_builder_tbl_usuarios_concessionarias03_tbl_ano_contratual_monitoramento_igg_id_gerenciador_search', 'idUsuario', 'Nome Operador', null, 20);
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
            $handler = new DynamicSearchHandler($lookupDataset, $this, 'filter_builder_tbl_usuarios_concessionarias03_tbl_ano_contratual_monitoramento_igg_idConcessiona_search', 'idConcessiona', 'Lote', null, 20);
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
            $handler = new DynamicSearchHandler($lookupDataset, $this, 'filter_builder_tbl_usuarios_concessionarias03_tbl_ano_contratual_monitoramento_igg_idPista_search', 'idPista', 'DescricaoPista', null, 20);
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
            $handler = new DynamicSearchHandler($lookupDataset, $this, 'filter_builder_tbl_usuarios_concessionarias03_tbl_ano_contratual_monitoramento_igg_idSentidotrafego_search', 'idSentidotrafego', 'Descricao', null, 20);
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
            $handler = new DynamicSearchHandler($lookupDataset, $this, 'filter_builder_tbl_usuarios_concessionarias03_tbl_ano_contratual_monitoramento_igg_idFaixa_search', 'idFaixa', 'DescricaoFaixa', null, 20);
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
            $handler = new DynamicSearchHandler($lookupDataset, $this, 'filter_builder_tbl_usuarios_concessionarias03_tbl_ano_contratual_monitoramento_igg_id_via_search', 'idVia', 'DescricaoVia', null, 20);
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
            $handler = new DynamicSearchHandler($lookupDataset, $this, 'filter_builder_tbl_usuarios_concessionarias03_tbl_ano_contratual_monitoramento_igg_id_secao_terrap_search', 'idSecao', 'DescricaoSecao', null, 20);
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
            $handler = new DynamicSearchHandler($lookupDataset, $this, 'filter_builder_tbl_usuarios_concessionarias03_tbl_ano_contratual_monitoramento_igg_tipo_revestimento_search', 'idMaterial', 'DescricaoMaterial', null, 20);
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
            $handler = new DynamicSearchHandler($lookupDataset, $this, 'filter_builder_tbl_usuarios_concessionarias03_tbl_ano_contratual_monitoramento_igg_idInterferencia_search', 'idInterferencia', 'tipo_interferncia', null, 20);
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
            $handler = new DynamicSearchHandler($lookupDataset, $this, 'edit_tbl_usuarios_concessionarias03_tbl_ano_contratual_monitoramento_igg_id_gerenciador_search', 'idUsuario', 'Nome Operador', null, 20);
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
            $handler = new DynamicSearchHandler($lookupDataset, $this, 'edit_tbl_usuarios_concessionarias03_tbl_ano_contratual_monitoramento_igg_idConcessiona_search', 'idConcessiona', 'Lote', null, 20);
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
            $handler = new DynamicSearchHandler($lookupDataset, $this, 'edit_tbl_usuarios_concessionarias03_tbl_ano_contratual_monitoramento_igg_idPista_search', 'idPista', 'DescricaoPista', null, 20);
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
            $handler = new DynamicSearchHandler($lookupDataset, $this, 'edit_tbl_usuarios_concessionarias03_tbl_ano_contratual_monitoramento_igg_idSentidotrafego_search', 'idSentidotrafego', 'Descricao', null, 20);
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
            $handler = new DynamicSearchHandler($lookupDataset, $this, 'edit_tbl_usuarios_concessionarias03_tbl_ano_contratual_monitoramento_igg_idFaixa_search', 'idFaixa', 'DescricaoFaixa', null, 20);
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
            $handler = new DynamicSearchHandler($lookupDataset, $this, 'edit_tbl_usuarios_concessionarias03_tbl_ano_contratual_monitoramento_igg_id_via_search', 'idVia', 'DescricaoVia', null, 20);
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
            $handler = new DynamicSearchHandler($lookupDataset, $this, 'edit_tbl_usuarios_concessionarias03_tbl_ano_contratual_monitoramento_igg_id_secao_terrap_search', 'idSecao', 'DescricaoSecao', null, 20);
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
            $handler = new DynamicSearchHandler($lookupDataset, $this, 'edit_tbl_usuarios_concessionarias03_tbl_ano_contratual_monitoramento_igg_tipo_revestimento_search', 'idMaterial', 'DescricaoMaterial', null, 20);
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
            $handler = new DynamicSearchHandler($lookupDataset, $this, 'edit_tbl_usuarios_concessionarias03_tbl_ano_contratual_monitoramento_igg_idInterferencia_search', 'idInterferencia', 'tipo_interferncia', null, 20);
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
            $handler = new DynamicSearchHandler($lookupDataset, $this, 'multi_edit_tbl_usuarios_concessionarias03_tbl_ano_contratual_monitoramento_igg_id_gerenciador_search', 'idUsuario', 'Nome Operador', null, 20);
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
            $handler = new DynamicSearchHandler($lookupDataset, $this, 'multi_edit_tbl_usuarios_concessionarias03_tbl_ano_contratual_monitoramento_igg_idConcessiona_search', 'idConcessiona', 'Lote', null, 20);
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
            $handler = new DynamicSearchHandler($lookupDataset, $this, 'multi_edit_tbl_usuarios_concessionarias03_tbl_ano_contratual_monitoramento_igg_idPista_search', 'idPista', 'DescricaoPista', null, 20);
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
            $handler = new DynamicSearchHandler($lookupDataset, $this, 'multi_edit_tbl_usuarios_concessionarias03_tbl_ano_contratual_monitoramento_igg_idSentidotrafego_search', 'idSentidotrafego', 'Descricao', null, 20);
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
            $handler = new DynamicSearchHandler($lookupDataset, $this, 'multi_edit_tbl_usuarios_concessionarias03_tbl_ano_contratual_monitoramento_igg_idFaixa_search', 'idFaixa', 'DescricaoFaixa', null, 20);
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
            $handler = new DynamicSearchHandler($lookupDataset, $this, 'multi_edit_tbl_usuarios_concessionarias03_tbl_ano_contratual_monitoramento_igg_id_via_search', 'idVia', 'DescricaoVia', null, 20);
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
            $handler = new DynamicSearchHandler($lookupDataset, $this, 'multi_edit_tbl_usuarios_concessionarias03_tbl_ano_contratual_monitoramento_igg_id_secao_terrap_search', 'idSecao', 'DescricaoSecao', null, 20);
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
            $handler = new DynamicSearchHandler($lookupDataset, $this, 'multi_edit_tbl_usuarios_concessionarias03_tbl_ano_contratual_monitoramento_igg_tipo_revestimento_search', 'idMaterial', 'DescricaoMaterial', null, 20);
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
            $handler = new DynamicSearchHandler($lookupDataset, $this, 'multi_edit_tbl_usuarios_concessionarias03_tbl_ano_contratual_monitoramento_igg_idInterferencia_search', 'idInterferencia', 'tipo_interferncia', null, 20);
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
    
    
    
    class tbl_usuarios_concessionarias03_tbl_ano_contratualPage extends DetailPage
    {
        protected function DoBeforeCreate()
        {
            $this->SetTitle('ANO IGG');
            $this->SetMenuLabel('ANO IGG');
    
            $this->dataset = new TableDataset(
                MyPDOConnectionFactory::getInstance(),
                GetConnectionOptions(),
                '`tbl_ano_contratual`');
            $this->dataset->addFields(
                array(
                    new IntegerField('idanocontratual', true, true, true),
                    new IntegerField('id_concessionaria', true, true),
                    new StringField('idtbl_ano', true, true)
                )
            );
            $this->dataset->AddLookupField('id_concessionaria', 'tbl_concessionarias', new IntegerField('idConcessiona'), new StringField('NomeConcessionaria', false, false, false, false, 'id_concessionaria_NomeConcessionaria', 'id_concessionaria_NomeConcessionaria_tbl_concessionarias'), 'id_concessionaria_NomeConcessionaria_tbl_concessionarias');
            $this->dataset->AddLookupField('idtbl_ano', 'tbl_ano', new StringField('ano'), new StringField('ano', false, false, false, false, 'idtbl_ano_ano', 'idtbl_ano_ano_tbl_ano'), 'idtbl_ano_ano_tbl_ano');
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
                new FilterColumn($this->dataset, 'idanocontratual', 'idanocontratual', 'Idanocontratual'),
                new FilterColumn($this->dataset, 'id_concessionaria', 'id_concessionaria_NomeConcessionaria', 'Concessionária'),
                new FilterColumn($this->dataset, 'idtbl_ano', 'idtbl_ano_ano', 'Ano Contratual')
            );
        }
    
        protected function setupQuickFilter(QuickFilter $quickFilter, FixedKeysArray $columns)
        {
            $quickFilter
                ->addColumn($columns['idanocontratual'])
                ->addColumn($columns['id_concessionaria'])
                ->addColumn($columns['idtbl_ano']);
        }
    
        protected function setupColumnFilter(ColumnFilter $columnFilter)
        {
            $columnFilter
                ->setOptionsFor('idtbl_ano');
        }
    
        protected function setupFilterBuilder(FilterBuilder $filterBuilder, FixedKeysArray $columns)
        {
            $main_editor = new TextEdit('idanocontratual_edit');
            
            $filterBuilder->addColumn(
                $columns['idanocontratual'],
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
            
            $main_editor = new DynamicCombobox('id_concessionaria_edit', $this->CreateLinkBuilder());
            $main_editor->setAllowClear(true);
            $main_editor->setMinimumInputLength(0);
            $main_editor->SetAllowNullValue(false);
            $main_editor->SetHandlerName('filter_builder_tbl_usuarios_concessionarias03_tbl_ano_contratual_id_concessionaria_search');
            
            $multi_value_select_editor = new RemoteMultiValueSelect('id_concessionaria', $this->CreateLinkBuilder());
            $multi_value_select_editor->SetHandlerName('filter_builder_tbl_usuarios_concessionarias03_tbl_ano_contratual_id_concessionaria_search');
            
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
                    FilterConditionOperator::IN => $multi_value_select_editor,
                    FilterConditionOperator::NOT_IN => $multi_value_select_editor,
                    FilterConditionOperator::IS_BLANK => null,
                    FilterConditionOperator::IS_NOT_BLANK => null
                )
            );
            
            $main_editor = new DynamicCombobox('idtbl_ano_edit', $this->CreateLinkBuilder());
            $main_editor->setAllowClear(true);
            $main_editor->setMinimumInputLength(0);
            $main_editor->SetAllowNullValue(false);
            $main_editor->SetHandlerName('filter_builder_tbl_usuarios_concessionarias03_tbl_ano_contratual_idtbl_ano_search');
            
            $multi_value_select_editor = new RemoteMultiValueSelect('idtbl_ano', $this->CreateLinkBuilder());
            $multi_value_select_editor->SetHandlerName('filter_builder_tbl_usuarios_concessionarias03_tbl_ano_contratual_idtbl_ano_search');
            
            $filterBuilder->addColumn(
                $columns['idtbl_ano'],
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
            if (GetCurrentUserPermissionsForPage('tbl_usuarios_concessionarias03.tbl_ano_contratual.monitoramento_igg')->HasViewGrant() && $withDetails)
            {
            //
            // View column for tbl_usuarios_concessionarias03_tbl_ano_contratual_monitoramento_igg detail
            //
            $column = new DetailColumn(array('id_concessionaria', 'idanocontratual', 'idtbl_ano'), 'tbl_usuarios_concessionarias03.tbl_ano_contratual.monitoramento_igg', 'tbl_usuarios_concessionarias03_tbl_ano_contratual_monitoramento_igg_handler', $this->dataset, 'MONITORAMENTO IGG');
            $column->setMinimalVisibility(ColumnVisibility::PHONE);
            $grid->AddViewColumn($column);
            }
            
            //
            // View column for ano field
            //
            $column = new TextViewColumn('idtbl_ano', 'idtbl_ano_ano', 'Ano Contratual', $this->dataset);
            $column->SetOrderable(true);
            $column->setMinimalVisibility(ColumnVisibility::PHONE);
            $column->SetDescription('');
            $column->SetFixedWidth(null);
            $grid->AddViewColumn($column);
        }
    
        protected function AddSingleRecordViewColumns(Grid $grid)
        {
            //
            // View column for idanocontratual field
            //
            $column = new NumberViewColumn('idanocontratual', 'idanocontratual', 'Idanocontratual', $this->dataset);
            $column->SetOrderable(true);
            $column->setNumberAfterDecimal(0);
            $column->setThousandsSeparator('.');
            $column->setDecimalSeparator('');
            $grid->AddSingleRecordViewColumn($column);
            
            //
            // View column for NomeConcessionaria field
            //
            $column = new TextViewColumn('id_concessionaria', 'id_concessionaria_NomeConcessionaria', 'Concessionária', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddSingleRecordViewColumn($column);
            
            //
            // View column for ano field
            //
            $column = new TextViewColumn('idtbl_ano', 'idtbl_ano_ano', 'Ano Contratual', $this->dataset);
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
            $editColumn = new DynamicLookupEditColumn('Concessionária', 'id_concessionaria', 'id_concessionaria_NomeConcessionaria', 'edit_tbl_usuarios_concessionarias03_tbl_ano_contratual_id_concessionaria_search', $editor, $this->dataset, $lookupDataset, 'idConcessiona', 'NomeConcessionaria', '');
            $editColumn->SetReadOnly(true);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddEditColumn($editColumn);
            
            //
            // Edit column for idtbl_ano field
            //
            $editor = new DynamicCombobox('idtbl_ano_edit', $this->CreateLinkBuilder());
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
            $editColumn = new DynamicLookupEditColumn('Ano Contratual', 'idtbl_ano', 'idtbl_ano_ano', 'edit_tbl_usuarios_concessionarias03_tbl_ano_contratual_idtbl_ano_search', $editor, $this->dataset, $lookupDataset, 'ano', 'ano', '');
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddEditColumn($editColumn);
        }
    
        protected function AddMultiEditColumns(Grid $grid)
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
            $editColumn = new DynamicLookupEditColumn('Concessionária', 'id_concessionaria', 'id_concessionaria_NomeConcessionaria', 'multi_edit_tbl_usuarios_concessionarias03_tbl_ano_contratual_id_concessionaria_search', $editor, $this->dataset, $lookupDataset, 'idConcessiona', 'NomeConcessionaria', '');
            $editColumn->SetReadOnly(true);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddMultiEditColumn($editColumn);
            
            //
            // Edit column for idtbl_ano field
            //
            $editor = new DynamicCombobox('idtbl_ano_edit', $this->CreateLinkBuilder());
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
            $editColumn = new DynamicLookupEditColumn('Ano Contratual', 'idtbl_ano', 'idtbl_ano_ano', 'multi_edit_tbl_usuarios_concessionarias03_tbl_ano_contratual_idtbl_ano_search', $editor, $this->dataset, $lookupDataset, 'ano', 'ano', '');
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddMultiEditColumn($editColumn);
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
            $editColumn = new DynamicLookupEditColumn('Concessionária', 'id_concessionaria', 'id_concessionaria_NomeConcessionaria', 'insert_tbl_usuarios_concessionarias03_tbl_ano_contratual_id_concessionaria_search', $editor, $this->dataset, $lookupDataset, 'idConcessiona', 'NomeConcessionaria', '');
            $editColumn->SetReadOnly(true);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddInsertColumn($editColumn);
            
            //
            // Edit column for idtbl_ano field
            //
            $editor = new DynamicCombobox('idtbl_ano_edit', $this->CreateLinkBuilder());
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
            $editColumn = new DynamicLookupEditColumn('Ano Contratual', 'idtbl_ano', 'idtbl_ano_ano', 'insert_tbl_usuarios_concessionarias03_tbl_ano_contratual_idtbl_ano_search', $editor, $this->dataset, $lookupDataset, 'ano', 'ano', '');
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
            // View column for idanocontratual field
            //
            $column = new NumberViewColumn('idanocontratual', 'idanocontratual', 'Idanocontratual', $this->dataset);
            $column->SetOrderable(true);
            $column->setNumberAfterDecimal(0);
            $column->setThousandsSeparator('.');
            $column->setDecimalSeparator('');
            $grid->AddPrintColumn($column);
            
            //
            // View column for NomeConcessionaria field
            //
            $column = new TextViewColumn('id_concessionaria', 'id_concessionaria_NomeConcessionaria', 'Concessionária', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddPrintColumn($column);
            
            //
            // View column for ano field
            //
            $column = new TextViewColumn('idtbl_ano', 'idtbl_ano_ano', 'Ano Contratual', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddPrintColumn($column);
        }
    
        protected function AddExportColumns(Grid $grid)
        {
            //
            // View column for idanocontratual field
            //
            $column = new NumberViewColumn('idanocontratual', 'idanocontratual', 'Idanocontratual', $this->dataset);
            $column->SetOrderable(true);
            $column->setNumberAfterDecimal(0);
            $column->setThousandsSeparator('.');
            $column->setDecimalSeparator('');
            $grid->AddExportColumn($column);
            
            //
            // View column for NomeConcessionaria field
            //
            $column = new TextViewColumn('id_concessionaria', 'id_concessionaria_NomeConcessionaria', 'Concessionária', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddExportColumn($column);
            
            //
            // View column for ano field
            //
            $column = new TextViewColumn('idtbl_ano', 'idtbl_ano_ano', 'Ano Contratual', $this->dataset);
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
            // View column for ano field
            //
            $column = new TextViewColumn('idtbl_ano', 'idtbl_ano_ano', 'Ano Contratual', $this->dataset);
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
            $detailPage = new tbl_usuarios_concessionarias03_tbl_ano_contratual_monitoramento_iggPage('tbl_usuarios_concessionarias03_tbl_ano_contratual_monitoramento_igg', $this, array('id_concessionaria', 'idanocontratual', 'idtbl_ano'), array('id_concessionaria', 'idanocontratual', 'idtbl_ano'), $this->GetForeignKeyFields(), $this->CreateMasterDetailRecordGrid(), $this->dataset, GetCurrentUserPermissionsForPage('tbl_usuarios_concessionarias03.tbl_ano_contratual.monitoramento_igg'), 'UTF-8');
            $detailPage->SetRecordPermission(GetCurrentUserRecordPermissionsForDataSource('tbl_usuarios_concessionarias03.tbl_ano_contratual.monitoramento_igg'));
            $detailPage->SetHttpHandlerName('tbl_usuarios_concessionarias03_tbl_ano_contratual_monitoramento_igg_handler');
            $handler = new PageHTTPHandler('tbl_usuarios_concessionarias03_tbl_ano_contratual_monitoramento_igg_handler', $detailPage);
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
            $handler = new DynamicSearchHandler($lookupDataset, $this, 'insert_tbl_usuarios_concessionarias03_tbl_ano_contratual_id_concessionaria_search', 'idConcessiona', 'NomeConcessionaria', null, 20);
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
            $handler = new DynamicSearchHandler($lookupDataset, $this, 'insert_tbl_usuarios_concessionarias03_tbl_ano_contratual_idtbl_ano_search', 'ano', 'ano', null, 20);
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
            $handler = new DynamicSearchHandler($lookupDataset, $this, 'filter_builder_tbl_usuarios_concessionarias03_tbl_ano_contratual_id_concessionaria_search', 'idConcessiona', 'NomeConcessionaria', null, 20);
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
            $handler = new DynamicSearchHandler($lookupDataset, $this, 'filter_builder_tbl_usuarios_concessionarias03_tbl_ano_contratual_idtbl_ano_search', 'ano', 'ano', null, 20);
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
            $handler = new DynamicSearchHandler($lookupDataset, $this, 'edit_tbl_usuarios_concessionarias03_tbl_ano_contratual_id_concessionaria_search', 'idConcessiona', 'NomeConcessionaria', null, 20);
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
            $handler = new DynamicSearchHandler($lookupDataset, $this, 'edit_tbl_usuarios_concessionarias03_tbl_ano_contratual_idtbl_ano_search', 'ano', 'ano', null, 20);
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
            $handler = new DynamicSearchHandler($lookupDataset, $this, 'multi_edit_tbl_usuarios_concessionarias03_tbl_ano_contratual_id_concessionaria_search', 'idConcessiona', 'NomeConcessionaria', null, 20);
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
            $handler = new DynamicSearchHandler($lookupDataset, $this, 'multi_edit_tbl_usuarios_concessionarias03_tbl_ano_contratual_idtbl_ano_search', 'ano', 'ano', null, 20);
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
    
    
    
    class tbl_usuarios_concessionarias03Page extends Page
    {
        protected function DoBeforeCreate()
        {
            $this->SetTitle('IGG CONCESSIONÁRIA GERAL');
            $this->SetMenuLabel('IGG CONCESSIONÁRIA GERAL');
    
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
                ->setOptionsFor('id_concessionaria');
        }
    
        protected function setupFilterBuilder(FilterBuilder $filterBuilder, FixedKeysArray $columns)
        {
            $main_editor = new DynamicCombobox('id_concessionaria_edit', $this->CreateLinkBuilder());
            $main_editor->setAllowClear(true);
            $main_editor->setMinimumInputLength(0);
            $main_editor->SetAllowNullValue(false);
            $main_editor->SetHandlerName('filter_builder_tbl_usuarios_concessionarias03_id_concessionaria_search');
            
            $multi_value_select_editor = new RemoteMultiValueSelect('id_concessionaria', $this->CreateLinkBuilder());
            $multi_value_select_editor->SetHandlerName('filter_builder_tbl_usuarios_concessionarias03_id_concessionaria_search');
            
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
            $main_editor->SetHandlerName('filter_builder_tbl_usuarios_concessionarias03_id_usuario_cs_search');
            
            $multi_value_select_editor = new RemoteMultiValueSelect('id_usuario_cs', $this->CreateLinkBuilder());
            $multi_value_select_editor->SetHandlerName('filter_builder_tbl_usuarios_concessionarias03_id_usuario_cs_search');
            
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
            if (GetCurrentUserPermissionsForPage('tbl_usuarios_concessionarias03.tbl_ano_contratual')->HasViewGrant() && $withDetails)
            {
            //
            // View column for tbl_usuarios_concessionarias03_tbl_ano_contratual detail
            //
            $column = new DetailColumn(array('id_concessionaria'), 'tbl_usuarios_concessionarias03.tbl_ano_contratual', 'tbl_usuarios_concessionarias03_tbl_ano_contratual_handler', $this->dataset, 'ANO IGG');
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
            $editColumn = new DynamicLookupEditColumn('Concessionária', 'id_concessionaria', 'id_concessionaria_NomeConcessionaria', 'edit_tbl_usuarios_concessionarias03_id_concessionaria_search', $editor, $this->dataset, $lookupDataset, 'idConcessiona', 'NomeConcessionaria', '');
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
            $editColumn = new DynamicLookupEditColumn('Usuário', 'id_usuario_cs', 'id_usuario_cs_Usuario', 'edit_tbl_usuarios_concessionarias03_id_usuario_cs_search', $editor, $this->dataset, $lookupDataset, 'idUsuario', 'Usuario', '');
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
            $editColumn = new DynamicLookupEditColumn('Concessionária', 'id_concessionaria', 'id_concessionaria_NomeConcessionaria', 'insert_tbl_usuarios_concessionarias03_id_concessionaria_search', $editor, $this->dataset, $lookupDataset, 'idConcessiona', 'NomeConcessionaria', '');
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
            $editColumn = new DynamicLookupEditColumn('Usuário', 'id_usuario_cs', 'id_usuario_cs_Usuario', 'insert_tbl_usuarios_concessionarias03_id_usuario_cs_search', $editor, $this->dataset, $lookupDataset, 'idUsuario', 'Usuario', '');
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
            $detailPage = new tbl_usuarios_concessionarias03_tbl_ano_contratualPage('tbl_usuarios_concessionarias03_tbl_ano_contratual', $this, array('id_concessionaria'), array('id_concessionaria'), $this->GetForeignKeyFields(), $this->CreateMasterDetailRecordGrid(), $this->dataset, GetCurrentUserPermissionsForPage('tbl_usuarios_concessionarias03.tbl_ano_contratual'), 'UTF-8');
            $detailPage->SetRecordPermission(GetCurrentUserRecordPermissionsForDataSource('tbl_usuarios_concessionarias03.tbl_ano_contratual'));
            $detailPage->SetHttpHandlerName('tbl_usuarios_concessionarias03_tbl_ano_contratual_handler');
            $handler = new PageHTTPHandler('tbl_usuarios_concessionarias03_tbl_ano_contratual_handler', $detailPage);
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
            $handler = new DynamicSearchHandler($lookupDataset, $this, 'insert_tbl_usuarios_concessionarias03_id_concessionaria_search', 'idConcessiona', 'NomeConcessionaria', null, 20);
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
            $handler = new DynamicSearchHandler($lookupDataset, $this, 'insert_tbl_usuarios_concessionarias03_id_usuario_cs_search', 'idUsuario', 'Usuario', null, 20);
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
            $handler = new DynamicSearchHandler($lookupDataset, $this, 'filter_builder_tbl_usuarios_concessionarias03_id_concessionaria_search', 'idConcessiona', 'NomeConcessionaria', null, 20);
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
            $handler = new DynamicSearchHandler($lookupDataset, $this, 'filter_builder_tbl_usuarios_concessionarias03_id_usuario_cs_search', 'idUsuario', 'Usuario', null, 20);
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
            $handler = new DynamicSearchHandler($lookupDataset, $this, 'edit_tbl_usuarios_concessionarias03_id_concessionaria_search', 'idConcessiona', 'NomeConcessionaria', null, 20);
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
            $handler = new DynamicSearchHandler($lookupDataset, $this, 'edit_tbl_usuarios_concessionarias03_id_usuario_cs_search', 'idUsuario', 'Usuario', null, 20);
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
        $Page = new tbl_usuarios_concessionarias03Page("tbl_usuarios_concessionarias03", "tbl_usuarios_concessionarias0102.php", GetCurrentUserPermissionsForPage("tbl_usuarios_concessionarias03"), 'UTF-8');
        $Page->SetRecordPermission(GetCurrentUserRecordPermissionsForDataSource("tbl_usuarios_concessionarias03"));
        GetApplication()->SetMainPage($Page);
        GetApplication()->Run();
    }
    catch(Exception $e)
    {
        ShowErrorPage($e);
    }
	
