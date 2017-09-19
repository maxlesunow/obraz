module.exports = {
    data: () => ({
        css: {
            table: {
                tableClass: 'table table-hover datatable-basic dataTable no-footer',
                ascendingIcon: ' icon-sort-amount-asc',
                descendingIcon: ' icon-sort-amount-desc',
                sortableIcon: 'icon-sort'
            },
            pagination: {
                wrapperClass: 'pagination dataTables_paginate',
                activeClass: 'current',
                disabledClass: 'disabled',
                pageClass: 'paginate_button',
                linkClass: 'paginate_button',
                icons: {
                    first: 'icon-first',
                    prev: 'icon-previous2',
                    next: 'icon-next2',
                    last: 'icon-last',
                },
            },
        },
        template: {
            paginationInfo: 'Показано с {from} по {to} из {total} элементов',
            noData: 'Нет доступных данных',
            noDataPaginate: 'Нет данных'
        },
        moreParams: {},
        filterField: {},
        perPage: 20
    }),
    methods: {
        updateTable() {
            Vue.nextTick(() => this.$refs.vuetable.refresh())
        },
        onPaginationData(paginationData) {
            this.$refs.pagination.setPaginationData(paginationData)
            this.$refs.paginationInfo.setPaginationData(paginationData)
        },
        onChangePage(page) {
            this.$refs.vuetable.changePage(page)
        },
        onCellClicked(data, field, event) {
            this.$refs.vuetable.toggleDetailRow(data.id)
        },
        filterSet(filterText) {
            this.moreParams = {
                search: filterText
            }
            this.updateTable()
        },
        filterReset() {
            this.moreParams = {}
            this.updateTable()
        },
        showSet(value) {
            this.perPage = value
            this.updateTable()
        },
        formatFilterPhp(filterFiled = {}) {
            var normalFilterField = JSON.parse(JSON.stringify(filterFiled)) // normalize object (remove functions and _proto)
            var entries = Object.entries(normalFilterField)
            var filters = entries.map((el) => el.join('|') )

            return filters.join(',')
        },
        select2Set(value, name) {
            var destName = this.filters[name].field;
            this.filterField[destName] = value
            if (value === '' || value === '-1') {
                delete this.filterField[destName]
            }
            this.moreParams.filters = this.formatFilterPhp(this.filterField)
            this.updateTable()
        },
        loadedTable() {
            this.$refs.vuetable.selectedTo = [] // uncheck selected row
            $(this.$el).find('input[type="checkbox"]').uniform({
                radioClass: 'choice'
            });
        },
        onRowClick(dataItem) {
            window.location.href = this.nameUrl + '/' + dataItem.id +'/edit'
        },
        removeCheckedRows() {
            console.log(this.$refs.vuetable.selectedTo)            
        }
    }
}