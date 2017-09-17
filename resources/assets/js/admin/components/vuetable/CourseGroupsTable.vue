<template>
    <div class="dataTables_wrapper no-footer">
        <div class="datatable-header">
            <filter-bar class="dataTables_filter" @filter:set="filterSet" @filter:reset="filterReset"></filter-bar>

            <div class="dt-buttons">
                <a href="group/create"><button class="btn btn-primary">
                    <span><i class="icon-add position-left"></i> Добавить</span>
                </button></a>
                <button class="btn btn-danger">
                    <span><i class="icon-trash position-left"></i> Удалить</span>
                </button>
            </div>
        </div>
        <div class="row">
            {{select2}}
            <select2 class="col-xs-4" :local-data="select2Data" v-model="select2" @input="onInput">
                <!-- <option value="0">Докладчик</option> -->
            </select2>
        </div>
        <div class="datatable-scroll-wrap">
            <vuetable ref="vuetable" api-url="/api/course/groups" :fields="fields" pagination-path="" :css="css.table" :append-params="moreParams" 
                    :sort-order="sortOrder" :multi-sort="true" @vuetable:cell-clicked="onCellClicked" @vuetable:pagination-data="onPaginationData">
                
                <template slot="row-link" scope="props">
                    <div>
                        <a :href="'group/' + props.rowData.id +'/edit'">{{props.rowData.name}}</a>
                    </div>
                </template>

                <template slot="custom-actions" scope="props">
                    <div class="custom-actions">
                        <a href="site"><button class="ui basic button" ><i class="icon-split"></i></button></a>
                        <button class="ui basic button" @click="onAction('edit-item', props.rowData, props.rowIndex)"> <i class="icon-pencil"></i></button>
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
import Vuetable from 'vuetable-2/src/components/Vuetable'
import VuetablePagination from 'vuetable-2/src/components/VuetablePagination'
import VuetablePaginationInfo from 'vuetable-2/src/components/VuetablePaginationInfo'

import FilterBar  from './FilterBar'
import vuetablemixins  from './vuetablemixins'

import Select2 from './../Select2'

export default {
    mixins: [ vuetablemixins ],
    components: { Select2, FilterBar, Vuetable, VuetablePagination, VuetablePaginationInfo },
    data: () => ({
        select2Data: [{id: 1, text: "1213"}, {id: 2, text: "2232"}],
        select2: "0",
        fields: [
            {
                name: '__checkbox',
                titleClass: 'text-center',
                dataClass: 'text-center',
            },
            {
                name: '__slot:row-link',
                title: 'Название',
                sortField: 'name',
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
            { field: 'name', sortField: 'name', direction: 'asc' }
        ],
        moreParams: {}
    }),
    methods: {
        onInput(value) {
            console.log(value)
        },
        onAction() {

        }
        //
    }
}
</script>
<style>
</style>
