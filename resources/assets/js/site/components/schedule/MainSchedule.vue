<template>
    <div>
        <div>
            <div class="range range-sm-center">
              <div class="cell-sm-12 cell-md-6 text-left">
                <div class="form-group offset-xs-top-24 offset-md-top-0">
                    <vue-multi-select :filters="filters" select-name="courseType" @select2:set="select2Set"></vue-multi-select>
                </div>
              </div>
              <div class="cell-sm-12 cell-md-6 text-left">
                <div class="form-group offset-xs-top-24 offset-md-top-0">
                    <vue-multi-select :filters="filters" select-name="courseGroup" @select2:set="select2Set"></vue-multi-select>
                </div>
              </div>
              <div class="cell-sm-12 cell-md-6 text-left">
                <div class="form-group offset-top-24">
                    <input class="form-control datePicker" id="date-start" type="text" placeholder="Старт" name="date" data-time-picker="date">
                </div>
              </div>
              <div class="cell-sm-12 cell-md-6 text-left">
                <div class="form-group offset-top-24">
                    <input class="form-control datePicker" id="date-stop" type="text" placeholder="Стоп" name="date" data-time-picker="date">
                </div>
              </div>
            </div>
        </div>

        <template v-for="(group, key) in events">
            <section class="offset-top-30">
                <div class="post-modern-timeline-date text-sm-right">
                    <time :datetime="key">{{ getDateGroup(key) }}</time>
                </div>
                <template v-for="(event, index) in group">
                    <article class="post post-modern post-modern-timeline post-modern-timeline-right">
                        <section class="post-content text-left">
                            <ul class="list-inline">
                                <li>
                                    <span class="label-custom label-sm-custom label-rounded-custom label-primary">{{event.course_type.name}}</span>
                                    <span class="label-custom label-sm-custom label-rounded-custom label-info">{{event.course_group.name}}</span>
                                </li>
                            </ul>
                            <div class="post-title">
                                <h6 class="offset-top-24">
                                    <a :href="event.url">{{event.name}}</a>
                                </h6>
                            </div>
                            <div class="post-body offset-top-20">
                                <p>{{event.mini_description}}</p>
                            </div>
                            <div class="post-meta offset-top-20">
                                <template v-for="speaker in event.speakers">
                                    <!-- <div class="post-author-img">
                                        <a :href="speaker.url">
                                            <img class="img-circle" width="45" height="45" src="images/users/user-eugene-newman-60x60.jpg" :alt="speaker.full_name">
                                        </a>
                                    </div> -->
                                    <div>
                                        <span class="icon-xxs text-picton-blue mdi mdi-account-multiple"></span>
                                        <span v-bind:key="speaker.full_name" class="text-dark">{{speaker.full_name}}</span>
                                    </div>
                                </template>
                                <ul class="list-inline list-inline-sm">
                                    <li>
                                        <span class="icon-xxs text-picton-blue mdi mdi-map-marker-radius"></span>
                                        <span class="text-dark">{{event.address}}</span>
                                    </li>
                                    <li>
                                        <span class="icon-xxs text-picton-blue mdi mdi-clock"></span>
                                        <time class="text-dark">{{getDateStart(event.time_stamp_start)}}</time>
                                    </li>
                                </ul>
                            </div>
                            <div class="post-author" style="width: 280px;">
                                {{formatMoney(123123)}}
                            </div>
                            <div>
                                <a :href="event.url" class="btn btn-xs btn-block btn-primary offset-top-20">Записаться на курс онлайн</a>
                            </div>
                        </section>
                    </article>
                </template>
            </section>
        </template>

        <footer class="offset-top-66">
            <div class="post-modern-timeline-right">
                <nav>
                    <ul class="pager">
                        <li class="previous" v-if="!isFirstPage()" @click.prevent="prevPage">
                            <a href><span class="icon-left mdi mdi-arrow-left" aria-hidden="true"></span>Назад</a>
                        </li>
                        <li class="next" v-if="!isLastPage()" @click.prevent="nextPage">
                            <a href><span class="icon-right mdi mdi-arrow-right" aria-hidden="true"></span>Далее</a>
                        </li>
                    </ul>
                </nav>
            </div>
        </footer>
    </div>
</template>

<script>
import accounting from 'accounting'
import VueMultiSelect from './VueMultiSelect'

export default {
    components: { VueMultiSelect },
    data: () => ({
        filterField: {},
        filters: {
            courseType: {
                ajax: { url: '/api/site/course/types', text: 'name' },
                field: 'courses.course_type_id',
                placeholder: 'Выбирите тип курса'
            },
            courseGroup: {
                ajax: { url: '/api/site/course/groups', text: 'name' },
                field: 'courses.course_group_id',
                placeholder: 'Выбирите группу курса'
            },
            startDate: {
                field: 'data_start'
            },
            endDate: {
                field: 'data_stop'
            }
        },
        events: [],
        lastPage: '',
        options: { page: '' }
    }),
    methods: {
        formatFilterPhp(filterFiled = {}) {
            var normalFilterField = JSON.parse(JSON.stringify(filterFiled)) // normalize object (remove functions and _proto)
            var entries = Object.entries(normalFilterField)
            var filters = entries.map((el) => el.join('|'))

            return filters.join(',')
        },
        select2Set(value, name) {
            var destName = this.filters[name].field;
            this.filterField[destName] = value
            if (value === '' || value === '-1') {
                delete this.filterField[destName]
            }
            var filters = [this.formatFilterPhp(this.filterField)].join(',')
            
            this.options.filter = filters
            this.loadEvents()
        },
        formatMoney (value) {
            return accounting.formatMoney(value, "₽", 2, ".", ",")
        },
        setDate() {
            console.log(arguments)
        },
        getDateGroup(date) {
            return moment(date).locale('ru').format("DD MMMM YYYY")
        },
        getDateStart(date) {
            console.log(date)
            return moment(date).locale('ru').format("DD MMMM hh:mm")
        },
        isFirstPage() {
            return this.options.page === 1 
        },
        isLastPage() {
            return this.options.page === this.lastPage
        },
        prevPage() {
            this.options.page--
            this.loadEvents(() => $('#ui-to-top').click() )
        },
        nextPage() {
            this.options.page++
            this.loadEvents(() => $('#ui-to-top').click() )
        },
        fixEvents(events = []) {
            var MAX_SPEAKERS = 3
            var fixedTimeStart = _.map(events, (el) => {
                el.time_stamp_start = el.time_start
                el.time_start && (el.time_start = moment(el.time_start).locale('ru').format("YYYY-MM-DD") )
                el.speakers && (el.speakers = el.speakers.slice(0, MAX_SPEAKERS) )
                return el
            })

            return _.groupBy(fixedTimeStart, 'time_start')
        },
        loadEvents(cb = ()=>{}) {
            axios.get('/api/site/courses', { params: this.options })
                .then((res) => {
                    this.events = this.fixEvents(res.data.data)
                    this.options.page = res.data.current_page
                    this.lastPage = res.data.last_page
                    cb()
                })
                .catch((res) => {
                    this.events = []
                    this.options.page = ''
                    this.lastPage = ''
                })
        }
        
    },
    created() {
        this.loadEvents()
    },
    mounted() {
        var vm = this;
        $(vm.$el).find('#date-start').on('change', function(e, date) {
            vm.options.date_start = new Date(date).toISOString()
            vm.options.page = 1
            vm.loadEvents()
        });
        $(vm.$el).find('#date-stop').on('change', function(e, date) {
            vm.options.date_stop = new Date(date).toISOString()
            vm.options.page = 1
            vm.loadEvents()
        });
    }
}
</script>

<style>
    .datePicker {
        cursor: pointer;
        font-size: 14px;
    }

    .datePicker::-webkit-input-placeholder {
        color: #a8a8c4;
    }

    .datePicker:hover {
        border-color: #8391a5;
    }
</style>
