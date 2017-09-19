<template>
    <div class="dataTables_wrapper no-footer">
        <div class="datatable-header">
            <filter-bar class="dataTables_filter" @filter:set="filterSet" @filter:reset="filterReset"></filter-bar>

            <show-bar class="dataTables_length" @show:set="showSet"></show-bar>

            <div class="dt-buttons">
                <!-- <a :href="nameUrl + '/create'"><button class="btn btn-primary">
                    <span><i class="icon-add position-left"></i> Добавить</span>
                </button></a> -->
                <button class="btn btn-danger">
                    <span><i class="icon-trash position-left"></i> Удалить</span>
                </button>
            </div>
        </div>
        <div class="datatable-scroll-wrap">
            <vuetable ref="vuetable" :api-url="'/api/' + nameUrl + 's'" :fields="fields" pagination-path="" :css="css.table" :append-params="moreParams" :per-page="perPage" 
                    :sort-order="sortOrder" :multi-sort="true" @vuetable:cell-clicked="onCellClicked" @vuetable:pagination-data="onPaginationData" @vuetable:loaded="loadedTable"
                    @vuetable:row-dblclicked="onRowClick">

                <template slot="row-link" scope="props">
                    <div>
                        <a :href="nameUrl + '/' + props.rowData.id +'/edit'">{{props.rowData.number_document}}</a>
                    </div>
                </template>
            
            </vuetable>
        </div>
        <div class="datatable-footer">
            <vuetable-pagination-info ref="paginationInfo" class="pagination-info dataTables_info" :info-template="template.paginationInfo"></vuetable-pagination-info>
            <vuetable-pagination ref="pagination" :css="css.pagination" @vuetable-pagination:change-page="onChangePage"></vuetable-pagination>
        </div>
    </div>
</template>

<script>
import accounting from 'accounting'
import moment from 'moment'
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
        nameUrl: 'payment',
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
                title: 'Название',
                sortField: 'number_document',
            },
            // {
            //     name: 'email',
            //     sortField: 'email'
            // },
            // {
            //     name: 'phone',
            //     sortField: 'phone',
            // },
            {
                name: '__slot:custom-actions',
                title: 'Actions',
                titleClass: 'text-center',
                dataClass: 'text-center'
            }
        ],
        sortOrder: [
            { field: 'number_document', sortField: 'number_document', direction: 'asc' }
        ],
        moreParams: {},
        perPage: 20
    }),
    methods: {
        //
    }
}
</script>
<style>
</style>
