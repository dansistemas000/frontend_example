<form method="post" action="unsubscribe_folios">
    <div class="response response--medium"></div>
    <input name="_token" type="hidden" class="token" value="{{ csrf_token() }}">
    <div class="wrapper fade-in-down">
        <div class="form-content form-content--medium">
            <div class="d-flex form-content__content-logo fade-in fade-in__first">
                <img src="images/logos/logo-manzana.png"  class="form-content__logo"/>
            </div>
            <div class="form-header">
                <div class="form-header__title fade-in fade-in__second">DAR DE BAJA FOLIOS</div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="form-body">
                        <div class="col-md-12">
                            <div class="form-body__sub-title">
                                Tipo de archivo:
                            </div> 
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <label class="container-radio">
                                    <input type="radio" name="file-type" class="ext-radio" value="excel" checked>Archivo EXCEL (.xlsx o .xls)
                                    <i></i>
                                </label>
                            </div>
                            <div class="col-md-6">
                                <label class="container-radio">
                                    <input type="radio" name="file-type" class="ext-radio" value="txt">Archivo de texto (.txt)
                                    <i></i>
                                    &nbsp;&nbsp;<span class="fa fa-question-circle" aria-hidden="true" data-toggle="tooltip" data-placement="top" title="Nota: Las columnas deben estar divididas por tabuladores."></span>
                                </label>
                            </div>
                        </div>
                        <div class="form-body__instructions-content">
                            El archivo debe tener el siguiente encabezado <span class="fa fa-question-circle" aria-hidden="true" data-toggle="tooltip" data-placement="top" title="Nota: Las columnas pueden estar en mayúsculas o minúsculas o con acentos."></span> :
                            @foreach($headers as $value)
                                <span class="badge badge-info">{{$value}}</span>
                            @endforeach
                        </div>
                        <div class="input-container">
                            <input type="file" name="file" accept=".xlsx,.xls" class="validate-file" required="required" />
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="form-footer fade-in fade-in__third">
                        <button type="submit"  class="send-form">
                            Cargar archivo
                        </button>
                    </div>
                </div>
            </div>
      	</div>
    </div>
</form>
@section('footer')
    <script src="js/unsubscribe_folios.js{{'?' . time() }}"></script>
@stop