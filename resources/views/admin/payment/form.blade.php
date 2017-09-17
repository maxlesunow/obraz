@include('admin.partials.form.input', ['id' => 'number_document', 'name' => 'Номер документа:'])

@include('admin.partials.form.input', ['id' => 'total', 'name' => 'Сумма оплаты:'])

@include('admin.partials.form.select', ['id' => 'reservation', 'name' => 'Заявка:', 'value' => $reservation, 'values' => $reservations])

@include('admin.partials.form.submit')

@section('scripts')
    <script>
        $('select').select2({
            // options
        });
    </script>
@endsection