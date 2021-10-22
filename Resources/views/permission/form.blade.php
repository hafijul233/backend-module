<div class="card-body">
    <div class="row mb-3">
        <div class="col-md-4">
            {!! \Form::nText('display_name', 'Display Name', old('display_name', $permission->display_name ?? null), true) !!}
        </div>
        <div class="col-md-4">
            {!! \Form::nText('name', 'Permission Code', old('name', $permission->name ?? null), true ,[
            'pattern' => \Constant::PERMISSION_NAME_ALLOW_CHAR,
             'onkeyup' => 'this.value = this.value.replace(/\s+/g, \'-\').toLowerCase()',
             'title' => 'Only Alphanumeric, Hyphen(-), UnderScope(_), Fullstops(.) Allowed'
             ]) !!}
        </div>
        <div class="col-md-4">
            {!! \Form::nSelect('enabled', 'Enabled', \Constant::ENABLED_OPTIONS,
                old('enabled', ($permission->enabled ?? \DefaultValue::ENABLED_OPTION)), true) !!}
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            {!! \Form::nTextarea('remarks', 'Remarks', old('remarks', $permission->remarks ?? null), false) !!}
        </div>
    </div>
    <div class="row mt-3">
        <div class="col-12 justify-content-between d-flex">
            {!! \Form::nCancel('Cancel') !!}
            {!! \Form::nSubmit('submit', 'Save') !!}
        </div>
    </div>
</div>


@push('page-scripts')
    <script>
        $(document).ready(function () {
            $("#permission-form").validate({
                rules: {
                    display_name: {
                        required: true,
                        minlength: 3,
                        maxlength: 255
                    },
                    name: {
                        required: true,
                        minlength: 3,
                        maxlength: 255,
                        regex:'{{ \Constant::PERMISSION_NAME_ALLOW_CHAR }}',
                    },
                    enabled: {
                        required: true
                    },
                    remarks: {
                    },
                },
                messages : {
                    name : {
                        regex : 'Only Alphanumeric, Hyphen(-), uUnderScope(_), Fullstops(.) Allowed'
                    }
                }
            });
        });
    </script>
@endpush
