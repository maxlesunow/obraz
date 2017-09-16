<template>
    <div class="dataTables_wrapper no-footer">
        <div class="datatable-heading">
            <filter-bar @filter:set="filterSet" @filter:reset="filterReset"></filter-bar>
        </div>
        <div class="datatable-scroll-wrap">
            <vuetable ref="vuetable" api-url="/api/users"
                    :fields="fields" pagination-path="" :css="css.table" 
                    :append-params="moreParams" 
                    :sort-order="sortOrder" :multi-sort="true" 
                    detail-row-component="my-detail-row" 
                    @vuetable:cell-clicked="onCellClicked" 
                    @vuetable:pagination-data="onPaginationData">
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
import Vuetable from 'vuetable-2/src/components/Vuetable'
import VuetablePagination from 'vuetable-2/src/components/VuetablePagination'
import VuetablePaginationInfo from 'vuetable-2/src/components/VuetablePaginationInfo'

import CustomActions from './CustomActions'
import DetailRow from './DetailRow'

import FilterBar  from './../FilterBar'
import vuetablemixins  from './../vuetablemixins'

Vue.component('custom-actions', CustomActions)
Vue.component('my-detail-row', DetailRow)
// Vue.component('filter-bar', FilterBar)

export default {
    mixins: [ vuetablemixins ],
    components: { FilterBar, Vuetable, VuetablePagination, VuetablePaginationInfo },
    data: () => ({
        fields: [
            {
                name: '__checkbox',
                titleClass: 'text-center',
                dataClass: 'text-center',
            },
            {
                name: 'full_name',
                title: 'ФИО',
                sortField: 'first_name',
            },
            {
                name: 'email',
                sortField: 'email'
            },
            {
                name: 'phone',
                sortField: 'phone',
            },
            {
                name: '__component:custom-actions',
                title: 'Actions',
                titleClass: 'text-center',
                dataClass: 'text-center'
            }
        ],
        sortOrder: [
            { field: 'email', sortField: 'email', direction: 'asc' }
        ],
        moreParams: {}
    }),
    methods: {
        //
    }
}
</script>
<style>
</style>
