@extends('layouts.prova')

@section('title', 'Llista datatables yajra')
@section('subtitle', ' - routes del projecte')

@section('content')

<h1 class="mb-8 text-3xl font-extrabold leading-none tracking-normal text-gray-900 md:text-5xl md:tracking-tight text-center">
		@yield ('title')<span class="block w-full py-2 text-transparent bg-clip-text leading-12 bg-gradient-to-r from-green-400 to-purple-500 lg:inline">@yield ('subtitle')	</span>
		</h1>

    <table id="routes-table" class="min-w-full bg-white shadow-md rounded-lg overflow-hidden">
        <thead class="bg-green-300 text-orange-500">
            <tr>
                <th class="py-2 px-4">URI</th>
                <th class="py-2 px-4">Nombre</th>
                <th class="py-2 px-4">Métodos</th>
                <th class="py-2 px-4">Acción</th>
            </tr>
        </thead>
    </table>
@endsection

@push('scripts')
    <script>
        $(document).ready(function() {
            var preview = $('#preview');

            $('#routes-table').DataTable({
                "ajax": "/routes",
                "columns": [
                    { 
                        "data": "uri",
                        "render": function(data, type, row, meta) {
                            return '<a href="/' + data + '" class="text-blue-500 hover:underline preview-link">' + data + '</a>';
                        }
                    },
                    { "data": "name" },
                    { "data": "methods" },
                    { "data": "action" }
                ],
				"pageLength": 12, // Mostrar 12 filas por defecto
                rowReorder: {
                    selector: 'td:nth-child(2)'
                },
                responsive: true,
                "language": {
                    "emptyTable": "No hay datos disponibles en la tabla",
                    "lengthMenu": "Mostrar _MENU_ registros por página",
                    "zeroRecords": "No se encontraron registros coincidentes",
                    "info": "Mostrando _START_ a _END_ de _TOTAL_ registros",
                    "infoEmpty": "Mostrando 0 a 0 de 0 registros",
                    "infoFiltered": "(filtrado de _MAX_ registros totales)",
                    "search": "Buscar:",
                    "paginate": {
                        "first": "Primero",
                        "last": "Último",
                        "next": "Siguiente",
                        "previous": "Anterior"
                    }
                }
            });

            $(document).on('mouseenter', '.preview-link', function(e) {
                var url = $(this).attr('href');
                preview.html('<iframe src="' + url + '"></iframe>');
                preview.css({
                    display: 'block'
                });
            }).on('mouseleave', '.preview-link', function() {
                preview.css('display', 'none');
            });
        });
    </script>
@endpush