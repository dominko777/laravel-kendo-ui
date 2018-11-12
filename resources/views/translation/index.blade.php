@extends('layouts.app')
@section('content')
<div class="container">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <div id="grid"></div>
</div>
@endsection
<?php
$crudServiceBaseUrl = url('/');
?>
@section('page-script')
    <script>
        $(document).ready(function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            var dataSource = new kendo.data.DataSource({
                    transport: {
                        read:  {
                            url: '{!! $crudServiceBaseUrl !!}' + "/translation/list",
                            dataType: "json"
                        },
                        update: {
                            url: '{!! $crudServiceBaseUrl !!}' + "/translation/update",
                            dataType: "jsonp"
                        },
                        destroy: {
                            url: '{!! $crudServiceBaseUrl !!}' + "/translation/delete",
                            dataType: "jsonp"
                        },
                        create: {
                            url: '{!! $crudServiceBaseUrl !!}' + "/translation/create",
                            type: "POST",
                            complete: function(e) {
                                $("#grid").data("kendoGrid").dataSource.read();
                            },
                            dataType: "jsonp"
                        },
                        parameterMap: function(options, operation) {
                            if (operation !== "read" && options.models) {
                                return {models: kendo.stringify(options.models)};
                            }
                        }
                    },
                    batch: true,
                    pageSize: 20,
                    schema: {
                        model: {
                            id: "translation_id",
                            fields: {
                                translation_id:  { editable: true, nullable: false },
                                description: { type: "string" },
                                label_id: { type: "string", validation: { required: true } },
                                text: { type: "string", validation: { required: true } },
                                language_id: { type: "number", validation: { required: true } }
                            }
                        }
                    },
                    sort: [
                        { field: "translation_id", dir: "desc" },
                    ]
                });

            $("#grid").kendoGrid({
                dataSource: dataSource,
                navigatable: true,
                pageable: true,
                height: 550,
                toolbar: ["create", "save", "cancel"],
                columns: [
                    { field: "translation_id", width: "120px" },
                    { field: "description", width: "120px" },
                    { field: "label_id", width: "120px" },
                    { field: "text", width: "120px" },
                    { field: "language_id", width: "120px" },
                ],
                editable: "inline"
            });
        });
    </script>
@stop
