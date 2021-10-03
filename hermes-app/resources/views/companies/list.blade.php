@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <!-- Breadcrumbs -->
            {{ Breadcrumbs::render('companies') }}

            <!-- Session messages -->
            @include('partials.session_message')

            <!-- Search Bar -->
            <div class="row">
                <div class="input-group col-10">
                    <input type="text" class="form-control search-bar" id="search-company" placeholder="Busca un emprendimiento" value="{{isset($querySearch) ? $querySearch : ''}}">
                    <div class="input-group-append">
                        <button class="btn btn-primary" id="submit-search-company" type="button">
                            <i class="fas fa-search"></i>
                        </button>
                    </div>
                </div>
                <div class="col-2 clear-search">
                    <button class="btn btn-outline-secondary" id="clear-search-company" type="button">
                        Limpiar
                    </button>
                </div>
            </div>

            <div class="form-group guide-info col-10">
                <span>*Campos de búsqueda</span>
            </div>

            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <span>Listado de emprendimientos</span>
                    <a href="/companies/create" class="btn btn-primary btn-sm">Nuevo emprendimiento</a>
                </div>

                <div class="card-body">
                    @include('partials.loader')
                    <div id="companies-list-container">
                        @include('companies.partials.results')
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script type="text/javascript">
    function sendSearchCompany() {
        let keyword = $("#search-company").val();
        $("#company-list-container").html("");
        $(".loader-center").removeClass("hidden");

        $.ajax({
            type: "GET",
            url: "{{route('companies.search')}}",
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: {
                keyword: keyword
            }
        }).done(function(data) {
            $(".loader-center").addClass("hidden");
            $("#company-list-container").html(data);
        });
    }


    $("#search-company").keypress(function(e) {
        let key = e.which;
        if (key == 13) { // the enter key code
            sendSearchCompany();
        }
    });

    $("#submit-search-company").click(function() {
        sendSearchCompany();
    });

    $("#clear-search-company").click(function() {
        $('#search-company').val('');
        sendSearchCompany();
    });
</script>
@endsection