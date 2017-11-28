<!-- Large modal -->
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
         aria-hidden="true" xmlns:v-on="http://www.w3.org/1999/xhtml">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                        ×
                    </button>
                    <h4 class="modal-title" id="myModalLabel">
                        Login/Registration</h4>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-8" style="border-right: 1px dotted #C2C2C2;padding-right: 30px;">
                            <!-- Nav tabs -->
                            <ul class="nav nav-tabs">
                                <li class="active"><a href="#Login" data-toggle="tab">Login</a></li>
                                <li><a href="#Registration" data-toggle="tab">Registration</a></li>
                            </ul>
                            <!-- Tab panes -->
                            <div class="tab-content">
                                <div class="tab-pane active" id="Login">
                                    <form role="form" class="form-horizontal">
                                        <div v-if="error" class="alert alert-danger">
                                            <strong>Алярм!</strong>
                                            {{error ? error : ""}}
                                        </div>
                                        <div v-if="success" class="alert alert-success">
                                            <strong>Успех!</strong> Вы вошли!
                                        </div>

                                        <div class="form-group">
                                            <label for="email" class="col-sm-2 control-label">
                                                Name</label>
                                            <div class="col-sm-10">
                                                <input v-model="nameLogin" type="name" class="form-control" id="name"
                                                       placeholder="Name"/>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputPassword1" class="col-sm-2 control-label">
                                                Password</label>
                                            <div class="col-sm-10">
                                                <input v-model="passwordLogin" type="password" class="form-control"
                                                       id="exampleInputPassword1"
                                                       placeholder="Password"/>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-2">
                                            </div>
                                            <div class="col-sm-10">
                                                <button v-on:click="signIn" type="button"
                                                        class="btn btn-primary btn-sm">
                                                    Войти
                                                </button>
                                                <a href="javascript:;">Forgot your password?</a>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <div class="tab-pane" id="Registration">
                                    <form role="form" class="form-horizontal">
                                        <div class="form-group">
                                            <label for="email" class="col-sm-2 control-label">
                                                Name</label>
                                            <div class="col-sm-10">
                                                <div class="row">
                                                    <div class="col-md-9">
                                                        <div v-if="error" class="alert alert-danger">
                                                            <strong>Алярм!</strong>
                                                            {{error ? error : ""}}
                                                        </div>
                                                        <div v-if="success" class="alert alert-success">
                                                            <strong>Успех!</strong> Теперь можно войти, оп!
                                                        </div>

                                                        <input v-model="name" type="text" class="form-control"
                                                               placeholder="Name"/>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="password" class="col-sm-2 control-label">
                                                Password</label>
                                            <div class="col-sm-10">
                                                <input v-model="password" type="password" class="form-control"
                                                       id="password"
                                                       placeholder="Password"/>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-2">
                                            </div>
                                            <div class="col-sm-10">
                                                <button v-on:click="signUp" type="button"
                                                        class="btn btn-primary btn-sm">
                                                    Save & Continue
                                                </button>
                                                <button type="button" class="btn btn-default btn-sm">
                                                    Cancel
                                                </button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <div id="OR" class="hidden-xs">
                                OR
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="row text-center sign-with">
                                <div class="col-md-12">
                                    <h3>
                                        Sign in with</h3>
                                </div>
                                <div class="col-md-12">
                                    <div class="btn-group btn-group-justified">
                                        <a href="#" class="btn btn-primary">Facebook</a> <a href="#"
                                                                                            class="btn btn-danger">
                                            Google</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>