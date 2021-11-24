@extends('layouts.app', ['class' => 'off-canvas-sidebar', 'activePage' => 'register', 'title' => __('Material
Dashboard')])

@section('content')
    <div class="contact_data_to_clone_row d-none">
        <input type="text" name="phone_numbers[]" class="form-control" required>
        <div class="col-lg-2">
            <a class="btn btn-danger btn-sm remove_phone_number" href="#" data-toggle="">
                Remover
            </a>
        </div>
    </div>
    <div class="container" style="height: auto;">
        <div class="row align-items-center">
            <div class="col-lg-4 col-md-6 col-sm-8 ml-auto mr-auto">
                <form class="form" method="POST" action="{{ route('register') }}">
                    @csrf

                    <div class="card card-login card-hidden mb-3">
                        <div class="card-header card-header-primary text-center">
                            <h4 class="card-title"><strong>{{ __('Register') }}</strong></h4>
                        </div>
                        <div class="card-body ">
                            <div class="form-group bmd-form-group{{ $errors->has('uf') ? ' has-danger' : '' }}">
                                <label for="user-type" class="bmd-label-static">Tipo de usuário</label>
                                <select id="user-type" class="form-control" data-style="btn btn-link" name="user_type"
                                    value="{{ old('user_type') }}" required>
                                    <option value="">Selecione</option>
                                    <option value="pf">Pessoa física</option>
                                    <option value="pj">Pessoa jurídica</option>
                                </select>
                                @if ($errors->has('uf'))
                                    <div id="user-type-error" class="error text-danger pl-3" for="user-type" style="display: block;">
                                        <strong>{{ $errors->first('user_type') }}</strong>
                                    </div>
                                @endif
                            </div>
                            <div class="form-group bmd-form-group{{ $errors->has('uf') ? ' has-danger' : '' }}">
                                <label for="category" class="bmd-label-static">Categoria</label>
                                <select id="category" class="form-control" data-style="btn btn-link" name="category"
                                    value="{{ old('category') }}" required>
                                    <option value="">Selecione</option>
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                                    @endforeach
                                </select>
                                @if ($errors->has('category'))
                                    <div id="category-error" class="error text-danger pl-3" for="category" style="display: block;">
                                        <strong>{{ $errors->first('category') }}</strong>
                                    </div>
                                @endif
                            </div>
                            <div class="form-group bmd-form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                                <label for="name" class="bmd-label-static">Nome</label>
                                <input type="text" name="name" class="form-control" value="{{ old('name') }}" required>
                                @if ($errors->has('name'))
                                    <div id="name-error" class="error text-danger pl-3" for="name" style="display: block;">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </div>
                                @endif
                            </div>
                            <div
                                class="form-group bmd-form-group{{ $errors->has('phone_numbers') ? ' has-danger' : '' }}">
                                <label for="phone_numbers" class="bmd-label-static">Telefones</label>
                                <div id="phone_numbers_row">
                                    <input type="text" name="phone_numbers[]" class="form-control" required>
                                </div>
                                @if ($errors->has('phone_numbers'))
                                    <div id="phone_numbers-error" class="error text-danger pl-3" for="phone_numbers"
                                        style="display: block;">
                                        <strong>{{ $errors->first('phone_numbers') }}</strong>
                                    </div>
                                @endif
                                <div class="form-group m-form__group row">
                                    <div class="col-lg-12">
                                        <a class="btn btn-primary btn-sm add_phone_number" href="#" data-toggle=""
                                            title="Adicionar">
                                            Adicionar telefone
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group bmd-form-group{{ $errors->has('uf') ? ' has-danger' : '' }}">
                                <label for="uf" class="bmd-label-static">UF</label>
                                <select id="uf" class="form-control" data-style="btn btn-link" name="uf"
                                    value="{{ old('uf') }}" required>
                                    <option value="">Selecione</option>
                                    <option value="AL">Alagoas</option>
                                    <option value="AP">Amapá</option>
                                    <option value="AM">Amazonas</option>
                                    <option value="BA">Bahia</option>
                                    <option value="CE">Ceará</option>
                                    <option value="DF">Distrito Federal</option>
                                    <option value="ES">Espírito Santo</option>
                                    <option value="GO">Goiás</option>
                                    <option value="MA">Maranhão</option>
                                    <option value="MT">Mato Grosso</option>
                                    <option value="MS">Mato Grosso do Sul</option>
                                    <option value="MG">Minas Gerais</option>
                                    <option value="PA">Pará</option>
                                    <option value="PB">Paraíba</option>
                                    <option value="PR">Paraná</option>
                                    <option value="PE">Pernambuco</option>
                                    <option value="PI">Piauí</option>
                                    <option value="RJ">Rio de Janeiro</option>
                                    <option value="RN">Rio Grande do Norte</option>
                                    <option value="RS">Rio Grande do Sul</option>
                                    <option value="RO">Rondônia</option>
                                    <option value="RR">Roraima</option>
                                    <option value="SC">Santa Catarina</option>
                                    <option value="SP">São Paulo</option>
                                    <option value="SE">Sergipe</option>
                                    <option value="TO">Tocantins</option>
                                </select>
                                @if ($errors->has('uf'))
                                    <div id="uf-error" class="error text-danger pl-3" for="uf" style="display: block;">
                                        <strong>{{ $errors->first('uf') }}</strong>
                                    </div>
                                @endif
                            </div>
                            <div class="form-group bmd-form-group{{ $errors->has('date-of-birth') ? ' has-danger' : '' }} d-none" id="date-of-birth-div">
                                <label for="date-of-birth" class="bmd-label-static">Data de nascimento</label>
                                <input id="date-of-birth" type="date" class="form-control"
                                    name="date_of_birth" value="{{ old('date_of_birth') }}">
                                @if ($errors->has('name'))
                                    <div id="date-of-birth-error" class="error text-danger pl-3" for="date-of-birth" style="display: block;">
                                        <strong>{{ $errors->first('date_of_birth') }}</strong>
                                    </div>
                                @endif
                            </div>
                            <div class="form-group bmd-form-group{{ $errors->has('foundation-date') ? ' has-danger' : '' }} d-none" id="foundation-date-div">
                                <label for="foundation-date" class="bmd-label-static">Data de fundação</label>
                                <input id="foundation-date" type="date" class="form-control"
                                    name="foundation_date" value="{{ old('foundation_date') }}">
                                @if ($errors->has('name'))
                                    <div id=foundation-date-error" class="error text-danger pl-3" for="foundation-date" style="display: block;">
                                        <strong>{{ $errors->first('foundation_date') }}</strong>
                                    </div>
                                @endif
                            </div>
                            <div class="form-group bmd-form-group{{ $errors->has('email') ? ' has-danger' : '' }} mt-3">
                                <label for="email" class="bmd-label-static">E-mail</label>
                                <input type="email" name="email" class="form-control"
                                    placeholder="{{ __('Email...') }}" value="{{ old('email') }}" required>
                                @if ($errors->has('email'))
                                    <div id="email-error" class="error text-danger pl-3" for="email"
                                        style="display: block;">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </div>
                                @endif
                            </div>
                            <div
                                class="form-group bmd-form-group{{ $errors->has('password') ? ' has-danger' : '' }} mt-3">
                                <label for="password" class="bmd-label-static">Senha</label>
                                <input type="password" name="password" id="password" class="form-control"
                                    placeholder="{{ __('Password...') }}" required>
                                @if ($errors->has('password'))
                                    <div id="password-error" class="error text-danger pl-3" for="password"
                                        style="display: block;">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </div>
                                @endif
                            </div>
                            <div
                                class="form-group bmd-form-group{{ $errors->has('password_confirmation') ? ' has-danger' : '' }} mt-3">
                                <label for="password_confirmation" class="bmd-label-static">Confirmação da senha</label>
                                <input type="password" name="password_confirmation" id="password_confirmation"
                                    class="form-control" placeholder="{{ __('Confirm Password...') }}" required>
                                @if ($errors->has('password_confirmation'))
                                    <div id="password_confirmation-error" class="error text-danger pl-3"
                                        for="password_confirmation" style="display: block;">
                                        <strong>{{ $errors->first('password_confirmation') }}</strong>
                                    </div>
                                @endif
                            </div>
                        </div>
                        <div class="card-footer justify-content-center">
                            <input type="submit" class="btn btn-primary btn-link btn-lg" value="{{ __('Create account') }}" />
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script>
        function remove_phone_number(el) {
            el.parent().parent().remove();
        }

        function bind_remove_phone_number() {
            jQuery(".remove_phone_number").on("click", function(e) {
                e.preventDefault();
                remove_phone_number(jQuery(this));
            });
        }

        jQuery(document).ready(function() {
            bind_remove_phone_number();

            jQuery("#user-type").on("change", function() {
                if ($(this).val() == 'pf') {
                    $('#uf').children('option[value=MG]').attr('disabled', true);
                    $('#date-of-birth-div').removeClass('d-none');
                    $('#foundation-date-div').addClass('d-none');
                } else {
                    $('#uf').children('option[value=MG]').attr('disabled', false);
                    $('#foundation-date-div').removeClass('d-none');
                    $('#date-of-birth-div').addClass('d-none');
                }
            });

            jQuery(".add_phone_number").on("click", function(e) {
                e.preventDefault();
                var clone = jQuery(".contact_data_to_clone_row").clone();
                clone.removeClass("contact_data_to_clone_row");
                clone.removeClass("d-none");
                clone.find("input").each(function() {
                    jQuery(this).val('');
                });
                jQuery("#phone_numbers_row").append(clone);
                bind_remove_phone_number();
            });
        })
    </script>
@endsection
