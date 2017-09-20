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
            this.updateCheckboxes()
        },
        updateCheckboxes() {
            $(this.$el).find('input[type="checkbox"]').uniform({
                radioClass: 'choice'
            });
        },
        onRowClick(dataItem) {
            window.location.href = this.nameUrl + '/' + dataItem.id +'/edit'
        },
        removeCheckedRows(options) {
            var swal = require('./../../plugins/sweet_alert.min')

            var ids = this.$refs.vuetable.selectedTo.join(',')

            if (ids === '') {
                return
            }
            
            swal({
                title: "Are you sure?",
                text: "You will not be able to recover this imaginary file!",
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: "#EF5350",
                confirmButtonText: "Yes, delete it!",
                cancelButtonText: "No, cancel pls!",
                closeOnConfirm: false,
                closeOnCancel: false
            }, function(isConfirm) {
                if (isConfirm) {
                    axios.delete(options.url + '/' + ids)
                        .then(function (result) {
                            swal({
                                title: "Deleted!",
                                text: "Your imaginary file has been deleted.",
                                confirmButtonColor: "#66BB6A",
                                type: "success"
                            });
                        })
                        .catch(function(result) {
                            swal({
                                title: "Not Deleted!",
                                text: "Problems....",
                                confirmButtonColor: "#66BB6A",
                                type: "error"
                            });
                        })
                }
                else {
                    swal({
                        title: "Cancelled",
                        text: "Your imaginary file is safe :)",
                        confirmButtonColor: "#2196F3",
                        type: "error"
                    });
                }
            });            
        },
        // vuetable callbacks
        
        formatMoney (value) {
            var accounting = require('accounting')
            try {
                return accounting.formatMoney(value, "₽", 2, ".", ",")
            } catch (e) {
                return value
            }
        },
        formatDate (value, fmt = 'DD-MM-YYYY') {
            var moment = require('moment')
            try {
                return moment(value, 'YYYY-MM-DD').format(fmt)
            } catch (e) {
                return value
            }
        },
        formatPhone (value) {
            var PNF = require('google-libphonenumber').PhoneNumberFormat;
            var phoneUtil = require('google-libphonenumber').PhoneNumberUtil.getInstance();
            try {
                var phoneNumber = phoneUtil.parse(value, 'RU')
                return phoneUtil.format(phoneNumber, PNF.INTERNATIONAL)
            } catch (e) {
                return value
            }
        }
    }
}