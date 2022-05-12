<form method="post" action="">
    <input name="_token" type="hidden" class="token" value="{{ csrf_token() }}">
    <div class="wrapper fade-in-down">
        <div class="form-content form-content--long">
            <div class="d-flex form-content__content-logo fade-in fade-in__first">
            </div>
            <div class="form-body">
                <div class="row">
                    <div class="col-md-6">
                        <a class="a-users" href="users" >
                            <div class="users-menu">
                                <i class="fa fa-users" aria-hidden="true"></i>
                                <br>
                                USUARIOS
                            </div>
                        </a>
                    </div>
                    <div class="col-md-6">
                        <a class="a-logs" href="tableLogs" >
                            <div class="logs-menu">
                                <i class="fa fa-database" aria-hidden="true"></i>
                                <br>
                                LOGS
                            </div>
                        </a>
                    </div>
                </div>
            </div>
      	</div>
    </div>
</form>
