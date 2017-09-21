<template>
    <div class="dataTables_wrapper no-footer">
        <div class="datatable-header">
            <filter-bar class="dataTables_filter" @filter:set="filterSet" @filter:reset="filterReset"></filter-bar>

            <show-bar class="dataTables_length" @show:set="showSet"></show-bar>

            <div class="dt-buttons">
                <!-- <a :href="nameUrl + '/create'"><button class="btn btn-primary">
                    <span><i class="icon-add position-left"></i> Добавить</span>
                </button></a>
                <button class="btn btn-danger" @click="removeCheckedRows(removeOptions)">
                    <span><i class="icon-trash position-left"></i> Удалить</span>
                </button> -->
            </div>

        </div>

        <div class="datatable-scroll-wrap">
            <vuetable ref="vuetable" :api-url="'/api/' + nameUrl + 's'" :fields="fields" pagination-path="" :css="css.table" :append-params="moreParams" :per-page="perPage" 
                    :sort-order="sortOrder" :multi-sort="true" @vuetable:cell-clicked="onCellClicked" @vuetable:pagination-data="onPaginationData" @vuetable:loaded="loadedTable"
                    @vuetable:checkbox-toggled-all="updateCheckboxes" @vuetable:row-dblclicked="onRowClick" :noDataTemplate="template.noData">
                 
                <template slot="row-link" scope="props">
                    <div>
                        <a :href="nameUrl + '/' + props.rowData.id +'/edit'">{{props.rowData.user.full_name}}</a>
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
    props: ['courseId'],
    data: () => ({
        nameUrl: 'reservation',
        // removeOptions: {
        //     url: '/api/reservations',
        //     // text: ''
        // },
        filters: {},
        fields: [
            {
                name: 'id',
                title: '№',
                sortField: 'reservations.id',
                titleClass: 'text-center',
                dataClass: 'text-center',
            },
            {
                name: '__slot:row-link',
                title: 'Пользователь',
                sortField: 'users.full_name',
                titleClass: 'text-center',
                dataClass: 'text-center',
            },
            {
                name: 'user.phone',
                title: 'Телефон',
                sortField: 'users.phone',
                callback: 'formatPhone',
                titleClass: 'text-center',
                dataClass: 'text-center',
            },
            {
                name: 'payment_type.name',
                title: 'Способ оплаты',
                sortField: 'payment_types.name',
                titleClass: 'text-center',
                dataClass: 'text-center',
            },
            {
                name: 'payment_status',
                title: 'Оплата',
                sortField: 'reservations.payment_status',
                callback: 'paymentLabel',
                titleClass: 'text-center',
                dataClass: 'text-center',
            },
            {
                name: 'status',
                title: 'Статус',
                sortField: 'reservations.status',
                callback: 'statusLabel',
                titleClass: 'text-center',
                dataClass: 'text-center',
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
        }
    },
    created() {
        this.additionalFilter = { 'reservations.course_id': this.courseId }
        this.moreParams.filters = this.formatFilterPhp(this.additionalFilter)
    }
}
</script>
<style>
</style>
