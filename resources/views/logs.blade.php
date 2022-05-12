@extends('welcome')
@section('container')
    <form method="post" action="">
        <input name="_token" type="hidden" class="token" value="{{ csrf_token() }}">
        <div class="wrapper fade-in-down">
            <div class="form-content form-content--long">
                <div class="d-flex form-content__content-logo fade-in fade-in__first">
                </div>
                <div class="form-header">
                    <a href="home" class="to-return">
                        <i class="fa fa-arrow-circle-o-left" aria-hidden="true"></i>REGRESAR
                    </a>
                </div>
                <div class="form-body">
                    @if($data)
                        <table class="table stripe" id="table" style="width:100%">
                            <thead>
                                <tr>
                                    @foreach($headers as $value)
                                        <th>{{ $value }}</th>
                                    @endforeach
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($data as $values)
                                    <tr>
                                        @foreach($values as $key => $value)
                                            <td>{{ $value }}</td>
                                        @endforeach
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    @else
                        <div>No hay datos disponibles</div>
                    @endif
                    
                </div>
            </div>
        </div>
    </form>
@stop