<template>
    <div class="dataTables_wrapper no-footer">
        <div class="datatable-header">
            <filter-bar class="dataTables_filter" @filter:set="filterSet" @filter:reset="filterReset"></filter-bar>

            <show-bar class="dataTables_length" @show:set="showSet"></show-bar>

            <div class="dt-buttons">
                <!-- <a :href="nameUrl + '/create'"><button class="btn btn-primary">
                    <span><i class="icon-add position-left"></i> Добавить</span>
                </button></a> -->
                <button class="btn btn-danger" @click="removeCheckedRows">
                    <span><i class="icon-trash position-left"></i> Удалить</span>
                </button>
            </div>
        </div>
        <div class="datatable-scroll-wrap">
            <vuetable ref="vuetable" :api-url="'/api/' + nameUrl + 's'" :fields="fields" pagination-path="" :css="css.table" :append-params="moreParams" :per-page="perPage" 
                    :sort-order="sortOrder" :multi-sort="true" @vuetable:cell-clicked="onCellClicked" @vuetable:pagination-data="onPaginationData" @vuetable:loaded="loadedTable"
                    @vuetable:row-dblclicked="onRowClick" :noDataTemplate="template.noData">

                <template slot="row-link" scope="props">
                    <div>
                         <a :href="nameUrl + '/' + props.rowData.id +'/edit'">{{props.rowData.full_name}}</a>
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

export default {
    mixins: [ vuetablemixins ],
    components: { FilterBar, ShowBar, Vuetable, VuetablePagination, VuetablePaginationInfo },
    data: () => ({
        nameUrl: 'user',
        fields: [
            {
                name: '__checkbox',
                titleClass: 'text-center',
                dataClass: 'text-center',
            },
            {
                name: '__sequence',
                title: '№'
            },
            {
                name: '__slot:row-link',
                title: 'ФИО',
                sortField: 'users.first_name',
            },
            {
                name: 'phone',
                title: 'Телефон',
                sortField: 'users.phone',
                callback: 'formatPhone'
            },
            {
                name: 'email',
                title: 'Почта',
                sortField: 'users.email'
            },
            {
                name: 'created_at',
                title: 'Дата регистрации',
                sortField: 'users.created_at',
                callback: 'formatDate'
            },
            {
                name: 'reservations_count',
                title: 'Количество заявок',
                // sortField: 'users.reservations_count'
            },
            {
                name: 'reviews_count',
                title: 'Количество отзывов',
                // sortField: 'users.reviews_count'
            },
        ],
        sortOrder: [
            { field: 'id', sortField: 'users.id', direction: 'asc' }
        ],
        moreParams: {},
        perPage: 20
    }),
    methods: {
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
