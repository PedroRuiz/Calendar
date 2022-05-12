<?= $this->extend('App\\Views\\layouts\\main');

/**
 * Modules/calendar main view
 * 
 * @property calendar
 * @package Modular
 * @author Pedro Ruiz Hidalgo <ruizhidalgopedro@gmail.com>
 * @license https://opensource.org/licenses/MIT MIT license
 */
?>

<?= $this->section('script') ?>
<script type="module">
  'use strict'


  $(function() {
    

    moment.locale('es');

  

    var calendarEl = document.getElementById('calendar');


  

    var calendar = new FullCalendar.Calendar(calendarEl, {
      themeSystem: 'bootstrap',
      initialView: 'dayGridMonth',
      locale: '<?= $lang ?>',
      firstDay: '<?= $lang === 'es' ? 1 : 0; ?>',
      customButtons: {
        newEvent: {
          text: '<?= lang('calendarmodule.newEvent') ?>',
          click: function() {
            location.href = '<?=base_locale('calendar/sendEvents')?>'
          }
        },
        recurringEvent: {
          text: '<?= lang('calendarmodule.recurringEvent') ?>',
          click: function() {
            location.href = '<?=base_locale('calendar/sendRecurEvents')?>'
          }
        }
      },
      headerToolbar: {
        left: 'prevYear,prev,today,next,nextYear newEvent recurringEvent',
        center: 'title',
        right: 'dayGridMonth,timeGridWeek,timeGridDay'
      },
      // eventSources: [{
      //   url: '<?= current_url() . '/getEvents' ?>',
      //   method: 'POST',
      //   extraParams: {
      //     <?= csrf_token() ?>: '<?= csrf_hash() ?>'
      //   },
      //   failure: function(error) {
      //     alert(error.message + '. See console')
      //     console.log('response: ' + error.xhr.response)
      //   }
      // }],
      events: [
        {
          title: 'my weekly recurring event',
          backgroundColor :'<?=lang('calendarmodule.recurringBackgroundColor')?>',
          borderColor     :'<?=lang('calendarmodule.recurringBorderColor')?>',
          textColor       :'<?=lang('calendarmodule.recurringTextColor')?>',
          rrule: {
            freq: 'weekly',
            interval: 2,
            byweekday: [ 'mo', 'fr' ],
            dtstart: '2022-02-01T10:30:00', // will also accept '20120201T103000'
            until: '2022-12-01' // will also accept '20120201'
          }
        },
        {
          title: 'qaz',
          backgroundColor :'<?=lang('calendarmodule.recurringBackgroundColor')?>',
          borderColor     :'<?=lang('calendarmodule.recurringBorderColor')?>',
          textColor       :'<?=lang('calendarmodule.recurringTextColor')?>',
          editable: true,
                
        }        
      ],
      eventClick: function(Event) {

        $('#editTitle').attr('value', Event.event.title)
        $('#created_at').attr('value', moment(Event.event.extendedProps.created_at).format('D-M-YYYY'))
        $('#updated_at').attr('value', moment(Event.event.extendedProps.updated_at).format('D-M-YYYY'))

        if (Event.event.AllDay) {

          $('input[name="editStart1"]').daterangepicker({
            singleDatePicker: true,
            showDropdowns: true,
            timePicker: false,
            startDate: moment(Event.event.start),
            endDate: moment(Event.event.end),
            locale: {
              format: 'DD-MM (HH:mm)'
            }
          });
        } else {
          $('#editEnd').attr('value', '')

          $('input[name="editStart1"]').daterangepicker({
            timePicker: true,
            startDate: moment(Event.event.start),
            endDate: moment(Event.event.end),
            timePicker: false,
            locale: {
              format: 'DD-MM (HH:mm)'
            }
          });
        }


        $('#editAllDay').bootstrapSwitch('state', Event.event.allDay); // Set the state as on/off depending on Event.event.allDay
        $('#editHighlighted').bootstrapSwitch('state', Event.event.extendedProps.remark); // Set the state as on/off depending on Event.event.allDay

        $('#modal-modify').modal('show')
      },
      eventMouseEnter: function(Event) {
        $(Event.el).attr('data-tooltip', 'tooltip')
        $(Event.el).attr('data-toggle', 'ofcanvas')
        $(Event.el).attr('title', Event.event.title)
        //<a href="#" class="navbar-btn sidebar-toggle" data-toggle="offcanvas" role="button" data-tooltip="tooltip" title="Toggle">
      }
    }).render();
    //calendar.render();

    function formatdate(isodate, allDay = false) {
      let date_format = new Date(isodate)
      if (!allDay) {
        return date_format.getDate() + '-' + date_format.getMonth() + '-' + date_format.getFullYear() + ' ' + date_format.getHours() + ':' + date_format.getMinutes() + ':' + date_format.getSeconds()
      } else {
        return date_format.getDate() + '-' + date_format.getMonth() + '-' + date_format.getFullYear()
      }

    }


  }); //$function
</script>
<?= $this->endSection() ?>

<?= $this->section('css') ?>
<!-- fullCalendar -->
<link rel="stylesheet" href="<?=template('plugins/fullcalendar/main.css')?>">
<!-- iCheck for checkboxes and radio inputs -->
<link rel="stylesheet" href="<?= template('plugins/bootstrap-switch/css/bootstrap2/bootstrap-switch.min.css') ?>">
<!-- daterange picker -->
<link rel="stylesheet" href="<?= template('plugins/daterangepicker/daterangepicker.css') ?>">
<?= $this->endSection() ?>

<?= $this->section('breadcrubms') ?>
<li class="breadcrumb-item"><a href="<?= base_url() ?>"><?= lang('calendarmodule.home') ?></a></li>
<li class="breadcrumb-item active"><?= lang('calendarmodule.breadcrumb') ?></li>
<?= $this->endSection() ?>

<?= $this->section('js') ?>
<!-- fullCalendar 2.2.5 -->
<script src="<?= template('plugins/moment/moment.min.js') ?>"></script>
<script src="<?= template('plugins/fullcalendar/main.js') ?>"></script>
<script src="<?= template('plugins/fullcalendar/locales/es.js') ?>"></script>
<!-- rrule -->
<script src="<?= base_url('Modules/Calendar/ThirdParty/rrule-tz.min.js') ?>"></script>
<!-- the rrule-to-fullcalendar connector. must go AFTER the rrule lib -->
<script src="<?= base_url('Modules/Calendar/ThirdParty/rrule_fullcalendar.js') ?>"></script>
<!-- date-range-picker -->
<script src="<?= template('plugins/daterangepicker/daterangepicker.js') ?>"></script>
<?= $this->endSection() ?>


<?= $this->section('content') ?>
<section class="content">
  <div class="container-fluid">
    <div class="row">

      <!-- /.col -->
      <div class="col-md-12">
        <div class="card card-primary">
          <div class="card-body p-0">
            <!-- THE CALENDAR -->
            <div id="calendar"></div>
          </div>
          <!-- /.card-body -->
        </div>
        <!-- /.card -->
      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->
  </div><!-- /.container-fluid -->

  

  
</section>


<!-- /.content -->
<?= $this->endSection() ?>



