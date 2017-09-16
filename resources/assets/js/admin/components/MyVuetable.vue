<template>
    <div class="dataTables_wrapper no-footer">
        <div class="datatable-heading">
            <filter-bar @filter:set="filterSet" @filter:reset="filterReset"></filter-bar>
        </div>
        <div class="datatable-scroll-wrap">
            <vuetable ref="vuetable" api-url="http://vuetable.ratiw.net/api/users" 
                    :fields="fields" pagination-path="" :css="css.table" 
                    :append-params="moreParams" 
                    :sort-order="sortOrder" :multi-sort="true" 
                    detail-row-component="my-detail-row" 
                    @vuetable:cell-clicked="onCellClicked" 
                    @vuetable:pagination-data="onPaginationData">
            </vuetable>
        </div>
        <div class="datatable-footer">
            <vuetable-pagination-info ref="paginationInfo" class="pagination-info dataTables_info"></vuetable-pagination-info>
            <vuetable-pagination ref="pagination" :css="css.pagination" 
                    @vuetable-pagination:change-page="onChangePage">
            </vuetable-pagination>
        </div>
    </div>
</template>

<script>
import accounting from 'accounting'
import moment from 'moment'
import Vuetable from 'vuetable-2/src/components/Vuetable'
import VuetablePagination from 'vuetable-2/src/components/VuetablePagination'
import VuetablePaginationInfo from 'vuetable-2/src/components/VuetablePaginationInfo'
// import Vue from 'vue'
// import VueEvents from 'vue-events'
import CustomActions from './CustomActions'
import DetailRow from './DetailRow'
import FilterBar from './VueTable/FilterBar'

import vuetablemixins from './VueTable/vuetablemixins'
// Vue.use(VueEvents)
Vue.component('custom-actions', CustomActions)
Vue.component('my-detail-row', DetailRow)
Vue.component('filter-bar', FilterBar)

export default {
    mixins: [vuetablemixins],
    components: {
        Vuetable,
        VuetablePagination,
        VuetablePaginationInfo,
    },
    data: () => ({
        fields: [
            // {
            //     name: '__sequence',
            //     title: '#',
            //     titleClass: 'text-right',
            //     dataClass: 'text-right'
            // },
            {
                name: '__checkbox',
                titleClass: 'text-center',
                dataClass: 'text-center',
            },
            {
                name: 'name',
                sortField: 'name',
            },
            {
                name: 'email',
                sortField: 'email'
            },
            {
                name: 'birthdate',
                sortField: 'birthdate',
                titleClass: 'text-center',
                dataClass: 'text-center',
                callback: 'formatDate|DD-MM-YYYY'
            },
            // {
            //     name: 'nickname',
            //     sortField: 'nickname',
            //     callback: 'allcap'
            // },
            {
                name: 'gender',
                sortField: 'gender',
                titleClass: 'text-center',
                dataClass: 'text-center',
                callback: 'genderLabel'
            },
            {
                name: 'salary',
                sortField: 'salary',
                titleClass: 'text-center',
                dataClass: 'text-right',
                callback: 'formatNumber'
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
        allcap(value) {
            return value.toUpperCase()
        },
        genderLabel(value) {
            return value === 'M'
                ? '<span class="label label-success"><i class="icon-star-full2"></i> Male</span>'
                : '<span class="label label-danger"><i class="icon-heart6"></i> Female</span>'
        },
        formatNumber(value) {
            return accounting.formatNumber(value, 2)
        },
        formatDate(value, fmt = 'D MMM YYYY') {
            return (value == null)
                ? ''
                : moment(value, 'YYYY-MM-DD').format(fmt)
        }
    }
}
</script>
<style>
</style>
