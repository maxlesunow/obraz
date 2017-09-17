@extends('admin.layouts.app')

@section('content')
    <div class="panel panel-flat">
        <div class="panel-heading">
            <h4 class="panel-title">Список заявок<a class="heading-elements-toggle"><i class="icon-more"></i></a></h4>
        </div>
        <div class="panel-body"></div>
        <payment-types-table></payment-types-table>
    </div>
@endsection

@section('scripts')
    <script>
        $(".styled").uniform({
            radioClass: 'choice'
        });

        $('#checked_all').change(function(){
            if(document.getElementById("checked_all").checked){
                $('.check_item').parent().addClass('checked')
                $('.check_item').prop("checked", $(this).prop("checked"))
            }
            else {
                $('.check_item').parent().removeClass('checked')
                $('.check_item').prop("checked", $(this).prop("checked"))
            }
        })

    </script>
@endsection