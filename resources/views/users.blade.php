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
                    <div class="row">
                        @foreach ($collection as $item)
                            <div class="col-md-4">
                                <div class="user-container">
                                    <i class="fa fa-user" aria-hidden="true"></i>
                                    {{ $item->name }}
                                    <br>
                                    <a href="#" class="photos show-modal-photos" user-id="{{$item->id}}" aria-hidden="true" data-toggle="tooltip" data-placement="top" title="ver fotos">
                                        <i class="fa fa-camera" aria-hidden="true"></i>
                                    </a>
                                    <a href="#" class="posts show-modal-posts" user-id="{{$item->id}}" aria-hidden="true" data-toggle="tooltip" data-placement="top" title="ver publicaciones">
                                        <i class="fa fa-file-text" aria-hidden="true"></i>
                                    </a>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </form>
    <div class="modal fade" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title"></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                </div>
            </div>
        </div>
    </div>
@stop