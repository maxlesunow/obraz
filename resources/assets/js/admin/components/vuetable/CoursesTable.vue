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
                <select2 :filters="filters" select-name="course" @select2:set="select2Set"></select2>
                <select2 :filters="filters" select-name="speaker" @select2:set="select2Set"></select2>
                <select2 :filters="filters" select-name="courseType" @select2:set="select2Set"></select2>
                <select2 :filters="filters" select-name="courseGroup" @select2:set="select2Set"></select2>
            </div>
        </div>
        <div class="datatable-scroll-wrap">
            <vuetable ref="vuetable" :api-url="'/api/' + nameUrl + 's'" :fields="fields" pagination-path="" :css="css.table" :append-params="moreParams" :per-page="perPage" 
                    :sort-order="sortOrder" :multi-sort="true" @vuetable:cell-clicked="onCellClicked" @vuetable:pagination-data="onPaginationData" @vuetable:loaded="loadedTable"
                    @vuetable:row-dblclicked="onRowClick">

                <template slot="row-link" scope="props">
                    <div>
                         <a :href="nameUrl + '/' + props.rowData.id +'/edit'">{{props.rowData.name}}</a>
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

import Select2 from './../Select2'

export default {
    mixins: [ vuetablemixins ],
    components: { Select2, FilterBar, ShowBar, Vuetable, VuetablePagination, VuetablePaginationInfo },
    data: () => ({
        nameUrl: 'course',
        filters: {
            course: {
                ajax: { url: '/api/courses', text: 'name' },
                field: 'courses.id',
                placeholder: 'Курс'
            },
            speaker: {
                ajax: { url: '/api/speakers', text: 'full_name' },
                field: 'speakers.id',
                placeholder: 'Лектор'
            },
            courseType: {
                ajax: { url: '/api/course/types', text: 'name' },
                field: 'courses.course_type_id',
                placeholder: 'Тип курса'
            },
            courseGroup: {
                ajax: { url: '/api/course/groups', text: 'name' },
                field: 'courses.course_group_id',
                placeholder: 'Группа'
            },
        },
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
                sortField: 'courses.name',
            },
            {
                name: 'speakers',
                title: 'Лектор',
                // sortField: 'email'
                callback: 'formatSpeakers'
            },
            {
                name: 'time_start',
                title: 'Дата курса',
                sortField: 'courses.time_start',
                callback: 'formatDate'
            },
            {
                name: 'address',
                title: 'Адрес',
                sortField: 'courses.address'
            },
            {
                name: 'course_type.name',
                title: 'Тип курса',
                sortField: 'course_types.name'
            },
            {
                name: 'course_group.name',
                title: 'Группа',
                sortField: 'course_groups.name'
            },
            {
                name: 'cost',
                title: 'Стоимость',
                sortField: 'courses.cost',
                callback: 'formatMoney'
            },
            {
                name: 'reservations_count',
                title: 'Количество учавстников',
                // sortField: 'courses.address'
            }
        ],
        sortOrder: [
            { field: 'name', sortField: 'courses.name', direction: 'asc' }
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
        formatSpeakers (value) {
            try {
                var names = value.map((el) => '<span>' + el.full_name + '</span>')
                return names.join(',<br>')
            } catch (e) {
                return value
            }
        }
    }
}
</script>
<style>
</style>
