/**
 * @module       RD Calendar
 * @author       Evgeniy Gusarov
 * @see          https://ua.linkedin.com/pub/evgeniy-gusarov/8a/a40/54a
 * @version      1.0.0
 */
!function(e, t, a, n) {
  "use strict";
  function rdCalendar(t, a) {
      this.options = e.extend({}, rdCalendar.Defaults, a),
      this.$element = e(t);
      var n = this.$element.find("." + this.options.classes.table).data("date");
      this.$element.data("currentDate", n ? new Date(n) : new Date),
      this.$element.data("todayDate", new Date),
      this.evt = {},
      this._handlers = {
          "rdc.next": this.next,
          "rdc.prev": this.prev,
          "rdc.refresh": e.proxy(this.refresh, this)
      },
      this.initialize()
  }
  rdCalendar.Defaults = {
      days: ["Sunday", "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday"],
      months: ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"],
      classes: {
          base: "rd-calendar",
          next: "rdc-next",
          prev: "rdc-prev",
          year: "rdc-fullyear",
          date: "rdc-date",
          day: "rdc-day",
          month: "rdc-month",
          time: "rdc-time",
          event: "rdc-event",
          events: "rdc-events",
          events_close: "rdc-events_close",
          table: "rdc-table",
          table_today: "rdc-table_today",
          table_event: "rdc-table_event",
          table_events: "rdc-table_events",
          table_has_events: "rdc-table_has-events",
          table_events_count: "rdc-table_events-count",
          table_day: "rdc-table_day",
          table_date: "rdc-table_date",
          table_next: "rdc-table_next",
          table_prev: "rdc-table_prev",
          today_date: "rdc-today_date",
          today_month: "rdc-today_month",
          today_year: "rdc-today_fullyear",
          today_day: "rdc-today_day"
      }
  },
  rdCalendar.prototype.initialize = function() {
      this.$element.trigger("rdc.initialize"),
      this.read(),
      this.create(),
      this.watch(),
      this.$element.trigger("rdc.initialized")
  }
  ,
  rdCalendar.prototype.create = function() {
      var t = this;
      t.$element.find("." + t.options.classes.today_date).each(function() {
          e(this).text(t.getTodayDate())
      }).end().find("." + t.options.classes.today_month).each(function() {
          e(this).text(t.getTodayMonth())
      }).end().find("." + t.options.classes.today_year).each(function() {
          e(this).text(t.getTodayYear())
      }).end().find("." + t.options.classes.today_day).each(function() {
          e(this).text(t.getTodayDay())
      }),
      t.refresh()
  }
  ,
  rdCalendar.prototype.watch = function() {
      var t = this;
      t.$element.on(t._handlers).find("." + t.options.classes.next).on("click", function() {
          t.$element.trigger("rdc.next"),
          t.$element.trigger("rdc.refresh")
      }).end().find("." + t.options.classes.prev).on("click", function() {
          t.$element.trigger("rdc.prev"),
          t.$element.trigger("rdc.refresh")
      }).end().find("." + t.options.classes.events_close).on("click", function() {
          t.$element.removeClass("show-events"),
          t.$element.find("." + t.options.classes.event + ", ." + t.options.classes.table_event).removeClass("active")
      }).end().delegate("." + t.options.classes.table_has_events, "click", function() {
          t.$element.find("." + t.options.classes.table_has_eventsm + ", ." + t.options.classes.event).removeClass("active");
          var a = e(this).find("." + t.options.classes.table_date).data("date");
          for (var n in t.evt[a])
              t.evt[a][n].addClass("active");
          e(this).addClass("active"),
          t.$element.addClass("show-events")
      })
  }
  ,
  rdCalendar.prototype.read = function() {
      var t = this.options
        , a = this;
      this.$element.find("." + t.classes.event).each(function() {
          var t = e(this)
            , n = new Date(t.data("date")).valueOf();
          n in a.evt || (a.evt[n] = []),
          a.evt[n].push(t)
      })
  }
  ,
  rdCalendar.prototype.next = function() {
      var t = e(this)
        , a = t.data("currentDate");
      a = 11 == a.getMonth() ? new Date(a.getFullYear() + 1,0,1) : new Date(a.getFullYear(),a.getMonth() + 1,1),
      t.data("currentDate", a)
  }
  ,
  rdCalendar.prototype.prev = function() {
      var t = e(this)
        , a = t.data("currentDate");
      a = 0 == a.getMonth() ? new Date(a.getFullYear() - 1,11,1) : new Date(a.getFullYear(),a.getMonth() - 1,1),
      t.data("currentDate", a)
  }
  ,
  rdCalendar.prototype.getTodayYear = function() {
      return this.$element.data("todayDate").getFullYear()
  }
  ,
  rdCalendar.prototype.getTodayDay = function() {
      return this.options.days[this.$element.data("todayDate").getDay()]
  }
  ,
  rdCalendar.prototype.getTodayDate = function() {
      return this.$element.data("todayDate").getDate()
  }
  ,
  rdCalendar.prototype.getTodayMonth = function() {
      return this.options.months[this.$element.data("todayDate").getMonth()]
  }
  ,
  rdCalendar.prototype.getMonth = function() {
      return this.options.months[this.$element.data("currentDate").getMonth()]
  }
  ,
  rdCalendar.prototype.getYear = function() {
      return this.$element.data("currentDate").getFullYear()
  }
  ,
  rdCalendar.prototype.refresh = function() {
      var t = this
        , options = this.options
        , s = this.$element.find("." + options.classes.table)
        , r = e("<table/>");
      t.$element.find("." + t.options.classes.month).each(function() {
          var l = e(this);
          l.text(t.getMonth())
      }).end().find("." + t.options.classes.year).each(function() {
          var l = e(this);
          l.text(t.getYear())
      });
      for (var d = e("<tr/>"), o = 0; o < options.days.length; o++)
          d.append(e("<th/>", {
              "class": options.classes.table_day,
              text: options.days[o]
          }));
      r.append(d);

      var mod = function (a, b) {
          return ((a % b) + b) % b
      }
      
      var currDate = this.$element.data("currentDate"), 
        daysInMonth = new Date(currDate.getFullYear(),currDate.getMonth() + 1,0).getDate(), 
        daysInPrevMonth = new Date(currDate.getFullYear(),currDate.getMonth(),0).getDate(), 
        startWeekDay = mod(new Date(currDate.getFullYear(),currDate.getMonth(),1).getDay() - 1, 7), 
        u = 1;

      for (o = 0; 7 > o; o++) {
          d = e("<tr/>");
          for (var p = 0; 7 > p; p++) {
              var iterDate, 
                  y = 7 * o + p + 1, 
                  f = e("<td/>"), 
                  g = n, 
                  _ = n, 
                  dayInTable = e("<div/>", { "class": options.classes.table_date}), 
                  today = new Date;

              // если строка недели не содержит дни из текущего месяца
              if (today.setHours(0), today.setMinutes(0), today.setSeconds(0), today.setMilliseconds(0), 0 == p && y > daysInMonth + startWeekDay)
                  break;
              if (1 > y - startWeekDay) {
                  // если заполняются дни из предыдущего месяца
                  dayInTable.text(daysInPrevMonth + (y - startWeekDay)).addClass(options.classes.table_prev), 
                  iterDate = new Date(currDate.getFullYear(),currDate.getMonth() - 1,daysInPrevMonth + (y - startWeekDay))
              } else if (daysInMonth + startWeekDay >= y) { 
                  // если заполняются дни из текущего месяца
                  dayInTable.text(y - startWeekDay), 
                  iterDate = new Date(currDate.getFullYear(),currDate.getMonth(),y - startWeekDay) 
              } else {
                  // если заполяются дни из следующего месяца
                  dayInTable.text(u).addClass(options.classes.table_next), 
                  iterDate = new Date(currDate.getFullYear(),currDate.getMonth() + 1,u++)
              }
              
              iterDate.valueOf() == today.valueOf() && dayInTable.addClass(options.classes.table_today),
              iterDate.valueOf() in this.evt && (f.addClass(options.classes.table_has_events),
              
              g = e("<div/>", {"class": options.classes.table_events_count}).text(this.evt[iterDate.valueOf()].length),
              _ = e("<ul/>", {"class": options.classes.table_events}),
              
              e(this.evt[iterDate.valueOf()]).each(function() {
                  _.append(e("<li/>", {"class": options.classes.table_event}).html(e(this).html()))
              })),
              f.append(dayInTable.data("date", iterDate.valueOf())),
              g && f.append(g),
              _ && f.append(_),
              d.append(f)
          }
          "" != d.html() && r.append(d)
      }
      var D = s.find("table");
      D.length ? D.replaceWith(r) : r.appendTo(s)
  }
  ,
  e.fn.rdCalendar = function(t) {
      return this.each(function() {
          e(this).data("rdCalendar") || e(this).data("rdCalendar", new rdCalendar(this,t))
      })
  }
  ,
  e.fn.rdCalendar.Constructor = rdCalendar
}(window.jQuery, window, document);