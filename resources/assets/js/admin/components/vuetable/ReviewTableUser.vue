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
                         <a :href="'/admin/' + nameUrl + '/' + props.rowData.id +'/edit'">{{props.rowData.created_at}}</a>
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
    props: ['userId'],
    data: () => ({
        nameUrl: 'review',
        // removeOptions: {
        //     url: '/api/reviews',
        //     // text: 'Ваши действия так же удалят все заявки курса!'
        // },
        filters: {},
        fields: [
            // {
            //     name: '__checkbox',
            //     titleClass: 'text-center',
            //     dataClass: 'text-center',
            // },
            {
                name: '__sequence',
                title: '№',
                titleClass: 'text-center',
                dataClass: 'text-center',
            },
            {
                name: '__slot:row-link',
                title: 'Дата',
                sortField: 'reviews.created_at',
                titleClass: 'text-center',
                dataClass: 'text-center',
            },
            // {
            //     name: 'created_at',
            //     title: 'Дата',
            //     sortField: 'reviews.created_at',
            //     callback: 'formatDate',
            //     titleClass: 'text-center',
            //     dataClass: 'text-center',
            // },
            {
                name: 'text',
                title: 'Текст',
                sortField: 'reviews.text',
                callback: 'truncateText',
                titleClass: 'text-center',
                dataClass: 'text-center',
            },
            {
                name: 'status',
                title: 'Статус',
                sortField: 'reviews.status',
                callback: 'reviewLabel',
                titleClass: 'text-center',
                dataClass: 'text-center',
            },
        ],
        sortOrder: [
            // { field: 'name', sortField: 'name', direction: 'asc' }
        ],
        moreParams: {},
        perPage: 20
    }),
    methods: {
        reviewLabel (value) {
            return value
                ? '<span class="label label-info">Подтверждено</span>'
                : '<span class="label label-default">Не подтверждено</span>'
        }
    },
    created() {
        this.additionalFilter = { 'reviews.user_id': this.userId }
        this.moreParams.filters = this.formatFilterPhp(this.additionalFilter)
    }
}
</script>
<style>
</style>
