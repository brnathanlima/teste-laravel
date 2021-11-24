@extends('layouts.app', ['activePage' => 'users', 'titlePage' => 'Usuários'])

@section('content')
    <div class="content">
        <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header card-header-primary">
                                <h4 class="card-title ">Usuários</h4>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="users-table" class="table table-striped table-no-bordered table-hover"
                                        cellspacing="0" width="100%" style="width: 100%">
                                        <thead></thead>
                                        <tbody></tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <</div>
        </div>
    @endsection

    @push('js')<script>
        // Facebook Pixel Code Don't Delete
        ! function(f, b, e, v, n, t, s) {
            if (f.fbq) return;
            n = f.fbq = function() {
                n.callMethod ?
                    n.callMethod.apply(n, arguments) : n.queue.push(arguments)
            };
            if (!f._fbq) f._fbq = n;
            n.push = n;
            n.loaded = !0;
            n.version = '2.0';
            n.queue = [];
            t = b.createElement(e);
            t.async = !0;
            t.src = v;
            s = b.getElementsByTagName(e)[0];
            s.parentNode.insertBefore(t, s)
        }(window,
            document, 'script', '//connect.facebook.net/en_US/fbevents.js');
        try {
            fbq('init', '111649226022273');
            fbq('track', "PageView");
        } catch (err) {
            console.log('Facebook Track Error:', err);
        }
    </script>
    <script>
        $(function() {
            $('#users-table').DataTable({
                responsive: true,
                pagingType: 'full_numbers',
                paging: true,
                lengthMenu: [
                    [10, 25, 50, -1],
                    [10, 25, 50, 'Todos']
                ],
                processing: true,
                serverSide: true,
                ordering: false,
                ajax: {
                    type: 'GET',
                    url: "{{ url('/users') }}",
                    data: function(d) {

                    },
                    dataFilter: function(data) {
                        var json = jQuery.parseJSON(data);
                        json.draw = json.draw;
                        json.recordsFiltered = json.total;
                        json.recordsTotal = json.total;
                        json.data = json.data;

                        return JSON.stringify(json);
                    },
                },
                columns: [
                    {
                        title: 'Nome',
                        data: 'name',
                        name: 'name',
                        visible: true,
                        searchable: true
                    },
                    {
                        title: 'E-mail',
                        data: 'email',
                        name: 'email',
                        visible: true,
                        searchable: true
                    },
                    {
                        title: 'UF',
                        data: 'uf',
                        name: 'uf',
                        visible: true,
                        searchable: true
                    },
                    {
                        title: 'Categoria',
                        data: 'category.name',
                        name: 'category',
                        visible: true,
                        searchable: true
                    },
                ],
                language: {
                    url: 'https://cdn.datatables.net/plug-ins/1.10.22/i18n/Portuguese-Brasil.json'
                }
            });
        });

    </script>
    @endpush
