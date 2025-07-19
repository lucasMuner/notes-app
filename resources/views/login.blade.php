@extends('layouts.main_layout')

@section('content')
    <div class="container mt-4">
        <div class="row justify-content-center">
            <div class="col-md-6 col-sm-8">
                <div class="card shadow p-5" style="background-color: #ffffff;">
                    
                    <!-- logo -->
                    <div class="text-center p-6">
                        <img src="assets/logo.png" alt="Notes logo" class="img-fluid w-100" style="max-width: 110px;">
                    </div>

                    <!-- form -->
                    <div class="row justify-content-center">
                        <div class="col-md-10 col-12">
                            <form action="#" method="post">
                                <div class="mb-3">
                                    <label class="form-label" for="text_username">Usuário</label>
                                    <input type="text" class="form-control" name="username" placeholder="Digite o seu usuário">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label" for="text_password">Senha</label>
                                    <input type="text" class="form-control" name="password" placeholder="Digite a sua senha">
                                </div>
                                <div class="mb-3 text-center">
                                    <button type="password" style="background-color: #4ABDFF;" class="btn text-white" id="btn_login"><i class="fa fa-sign-in"></i> Login</button>
                                </div>
                            </form>
                             <div class="mt-5 container fs-6 text-center">
                                &copy; {{ date('Y') }} Notes.
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
