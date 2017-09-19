<template>
    <div class="dataTables_wrapper no-footer">
        <div class="datatable-header">
            <filter-bar class="dataTables_filter" @filter:set="filterSet" @filter:reset="filterReset"></filter-bar>

            <show-bar class="dataTables_length" @show:set="showSet"></show-bar>

            <div class="dt-buttons">
                <a :href="nameUrl + '/create'"><button class="btn btn-primary">
                    <span><i class="icon-add position-left"></i> Добавить</span>
                </button></a>
                <button class="btn btn-danger" @click="removeCheckedRows">
                    <span><i class="icon-trash position-left"></i> Удалить</span>
                </button>
            </div>

            <div class="col-xs-12" style="margin-bottom: 15px;">
                <select2 :filters="filters" select-name="user" @select2:set="select2Set"></select2>
                <select2 :filters="filters" select-name="course" @select2:set="select2Set"></select2>
                <select2 :filters="filters" select-name="paymentType" @select2:set="select2Set"></select2>
                <select2 :filters="filters" select-name="courseType" @select2:set="select2Set"></select2>
                
                <select2 :filters="filters" select-name="paymentStatus" @select2:set="select2Set"></select2>
                <select2 :filters="filters" select-name="reservationStatus" @select2:set="select2Set"></select2>
            </div>
        </div>

        <div class="datatable-scroll-wrap">
            <vuetable ref="vuetable" :api-url="'/api/' + nameUrl + 's'" :fields="fields" pagination-path="" :css="css.table" :append-params="moreParams" :per-page="perPage" 
                    :sort-order="sortOrder" :multi-sort="true" @vuetable:cell-clicked="onCellClicked" @vuetable:pagination-data="onPaginationData" @vuetable:loaded="loadedTable"
                    @vuetable:row-dblclicked="onRowClick" :noDataTemplate="template.noData">
                
                <template slot="row-link" scope="props">
                    <div>
                        <a :href="nameUrl + '/' + props.rowData.id +'/edit'">{{props.rowData.course.name}}</a>
                    </div>
                </template>
            
            </vuetable>
        </div>
        <div class="datatable-footer">
            <vuetable-pagination-info ref="paginationInfo" class="pagination-info dataTables_info" :info-template="template.paginationInfo" :noDataTemplate="template.noDataPaginate"></vuetable-pagination-info>
            <vuetable-pagination ref="pagination" :css="css.pagination" @vuetable-pagination:change-page="onChangePage"></vuetable-pagination>
        </div>
    </div>
</template>

<script>
import accounting from 'accounting'
import moment from 'moment'

var PNF = require('google-libphonenumber').PhoneNumberFormat;
var phoneUtil = require('google-libphonenumber').PhoneNumberUtil.getInstance();

import Vuetable from './../../plugins/vuetable-2-develop/Vuetable'
import VuetablePagination from './../../plugins/vuetable-2-develop/VuetablePagination'
import VuetablePaginationInfo from './../../plugins/vuetable-2-develop/VuetablePaginationInfo'

import FilterBar  from './FilterBar'
import ShowBar  from './ShowBar'
import vuetablemixins  from './vuetablemixins'

import Select2 from './../Select2'

export default {
    mixins: [ vuetablemixins ],
    components: { Select2, FilterBar, ShowBar, Vuetable, VuetablePagination, VuetablePaginationInfo },
    data: () => ({
        nameUrl: 'reservation',
        filters: {
            user: {
                ajax: { url: '/api/users', text: 'full_name' },
                field: 'users.id',
                placeholder: 'Пользователь'
            },
            course: {
                ajax: { url: '/api/courses', text: 'name' },
                field: 'courses.id',
                placeholder: 'Курс'
            },
            paymentType: {
                ajax: { url: '/api/payment/types', text: 'name' },
                field: 'payment_types.id',
                placeholder: 'Тип оплаты'
            },
            courseType: {
                ajax: { url: '/api/course/types', text: 'name' },
                field: 'courses.course_type_id',
                placeholder: 'Тип курса'
            },
            paymentStatus: {
                data: [{ id: "-1" }, { id: "true", text: "Оплачено" }, { id: "false", text: "Не оплачено" }],
                field: 'reservations.payment_status',
                placeholder: { // @see https://github.com/select2/select2/issues/3553#issuecomment-240259253
                    id: "-1",
                    text: "Статус оплаты",
                    selected:'selected'
                }
            },
            reservationStatus: {
                data: [{ id: "-1" }, { id: "true", text: "Подтверждено" }, { id: "false", text: "Не подтверждено" }],
                field: 'reservations.status',
                placeholder: {
                    id: "-1",
                    text: "Статус заявки",
                    selected:'selected'
                }
            }
        },
        fields: [
            {
                name: '__checkbox',
                titleClass: 'text-center styled',
                dataClass: 'text-center styled',
            },
            {
                name: 'id',
                title: '№',
                sortField: 'reservations.id'
            },
            {
                name: '__slot:row-link',
                title: 'Курс',
                sortField: 'courses.name',
            },
            {
                name: 'user.full_name',
                title: 'Пользователь',
                sortField: 'users.full_name'
            },
            {
                name: 'user.phone',
                title: 'Телефон',
                sortField: 'users.phone',
                callback: 'formatPhone'
            },
            {
                name: 'created_at',
                title: 'Дата заявки',
                sortField: 'created_at',
                callback: 'formatDate'
            },
            // {
            //     name: 'course.time_start',
            //     title: 'Дата курса',
            //     sortField: 'courses.time_start',
            //     callback: 'formatDate'
            // },
            {
                name: 'course.course_type.name',
                title: 'Тип курса',
                // sortField: 'courses.course_types.name',
            },
            {
                name: 'cost',
                title: 'Стоимость',
                sortField: 'reservations.cost',
                callback: 'formatMoney'
            },
            {
                name: 'payment_type.name',
                title: 'Способ оплаты',
                sortField: 'payment_types.name',
            },
            {
                name: 'payment_status',
                title: 'Оплата',
                sortField: 'reservations.payment_status',
                callback: 'paymentLabel'
            },
            {
                name: 'status',
                title: 'Статус',
                sortField: 'reservations.status',
                callback: 'statusLabel'
            }
        ],
        sortOrder: [
            { field: 'id', sortField: 'reservations.id', direction: 'asc' }
        ],
        moreParams: {},
        perPage: 20
    }),
    methods: {
        paymentLabel (value) {
            return value
                ? '<span class="label label-success">Оплачено</span>'
                : '<span class="label label-danger">Не оплачено</span>'
        },
        statusLabel (value) {
            return value
                ? '<span class="label label-info">Подтверждено</span>'
                : '<span class="label label-default">Не подтверждено</span>'
        },
        formatMoney (value) {
            try {
                return accounting.formatMoney(value, "₽", 2, ".", ",")
            } catch (e) {
                return value
            }
        },
        formatDate (value, fmt = 'DD-MM-YYYY') {
            try {
                return moment(value, 'YYYY-MM-DD').format(fmt)
            } catch (e) {
                return value
            }
        },
        formatPhone (value) {
            try {
                var phoneNumber = phoneUtil.parse(value, 'RU')
                return phoneUtil.format(phoneNumber, PNF.INTERNATIONAL)
            } catch (e) {
                return value
            }
        }
    }
}
</script>
<style>
</style>
