<?php 
  include 'functions.php';
 ?>

	<div class="row clearfix">

    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                    <div class="card">
                        <div class="header">
                          <h2>IMPORT DATABASE PRESENSI SHALAT MAHASISWA</h2>
                        </div>
                        <form method="POST">
                        <div class="body">                                
                                  
                                    <div class="input-group">
                                      <label>Periode :</label>
                                      <div class="form-line">
                                        <input type="text" name="daterangeShalat" class="form-control date" id="reportrange" required>
                                      </div>
                                    </div>
                                  
                                                     
                                    <div class="bootstrap-timepicker">
                                      <div class="row">
                                        <div class="col-md-3 nopadding">
                                          <div class="form-group">
                                            <label>Shubuh :</label>
                                              <input type="text" name="shubuhFrom" id="shubuh_dari" class="timepicker form-control" placeholder="Dari" value="04:00">
                                              <input type="text" name="shubuhTo" id="shubuh_sampai" class="timepicker form-control" placeholder="Sampai" value="07:00">
                                          </div>
                                        </div>
                                        <div class="col-md-3 nopadding">
                                          <div class="form-group">
                                            <label>Dzuhur :</label>
                                              <input type="text" name="dzuhurFrom" id="dzuhur_dari" class="timepicker form-control" placeholder="Dari" value="12:00">
                                              <input type="text" name="dzuhurTo" id="dzuhur_sampai" class="timepicker form-control" placeholder="Sampai" value="14:00">
                                          </div>
                                        </div>
                                        <div class="col-md-3 nopadding">
                                          <div class="form-group">
                                            <label>Ashar :</label>
                                              <input type="text" name="asharFrom" id="ashar_dari" class="timepicker form-control" placeholder="Dari" value="15:00">
                                              <input type="text" name="asharTo" id="ashar_sampai" class="timepicker form-control" placeholder="Sampai" value="17:35">
                                          </div>
                                        </div>
                                        <div class="col-md-3 nopadding">
                                          <div class="form-group">
                                            <label>Maghrib :</label>
                                              <input type="text" name="maghribFrom" id="maghrib_dari" class="timepicker form-control" placeholder="Dari" value="18:00">
                                              <input type="text" name="maghribTo" id="maghrib_sampai" class="timepicker form-control" placeholder="Sampai" value="18:45">
                                          </div>
                                        </div>
                                        <div class="col-md-3 nopadding">
                                          <div class="form-group">
                                            <label>Isya :</label>
                                              <input type="text" name="isyaFrom" id="isya_dari" class="timepicker form-control" placeholder="Dari" value="19:00">
                                              <input type="text" name="isyaTo" id="isya_sampai" class="timepicker form-control" placeholder="Sampai" value="21:45">
                                          </div>
                                        </div>
                                      </div>
                                    </div>
                                  <button type="submit" class="btn btn-primary btn-block waves-effect" name="importPresensiShalat">IMPORT</button>
                        </div>

                        </form>
</div>
</div>
</div>   

<?php 

      if(isset($_POST['importPresensiShalat'])) {
        $tgl = explode('-', $_POST['daterangeShalat']);
        $from = $tgl[0];
        $to = $tgl[1];

        // $jmlWktShalat = $_POST['jmlWktShalat'];

        $datefrom = date('Y-m-d', strtotime($from));
        $dateto = date('Y-m-d',strtotime($to));

        $shubuhFrom = $_POST['shubuhFrom'];
        $shubuhTo = $_POST['shubuhTo'];

        $dzuhurFrom = $_POST['dzuhurFrom'];
        $dzuhurTo = $_POST['dzuhurTo'];

        $asharFrom = $_POST['asharFrom'];
        $asharTo = $_POST['asharTo'];

        $maghribFrom = $_POST['maghribFrom'];
        $maghribTo = $_POST['maghribTo'];

        $isyaFrom = $_POST['isyaFrom'];
        $isyaTo = $_POST['isyaTo'];

        updateTimeSetup($from, $to, $shubuhFrom, $shubuhTo, $dzuhurFrom, $dzuhurTo, $asharFrom, $asharTo, $maghribFrom, $maghribTo, $isyaFrom, $isyaTo);
        importShalat('18', $datefrom, $dateto);

        // echo "<script>document.location='?page=shalat'</script>";
      }
?>

<!-- Daterange picker import data presensi shalat mahasiswa -->
    <script>
    $(document).ready(function() {
      var t = $('#tableShalatIkhtisar').DataTable({});
    } );
    </script>  

<script type="text/javascript">
var startDate;
var endDate;

    $('#reportrange').daterangepicker(
       {
          startDate: moment().subtract('days', 6),
          endDate: moment(),
          //minDate: '01/01/2012',
          //maxDate: '12/31/2014',
          dateLimit: { days: 60 },
          showDropdowns: true,
          showWeekNumbers: true,
          timePicker: false,
          timePickerIncrement: 1,
          timePicker12Hour: true,
          ranges: {
             'Hari ini': [moment(), moment()],
             'Kemarin': [moment().subtract('days', 1), moment().subtract('days', 1)],
             '7 Hari Terakhir': [moment().subtract('days', 6), moment()],
             '30 Hari Terakhir': [moment().subtract('days', 29), moment()],
             'Bulan Ini': [moment().startOf('month'), moment().endOf('month')]
             //'Last Month': [moment().subtract('month', 1).startOf('month'), moment().subtract('month', 1).endOf('month')]
          },
          opens: 'left',
          buttonClasses: ['btn btn-primary'],
          applyClass: 'btn-small btn-primary',
          cancelClass: 'btn-small',
          format: 'DD/MM/YYYY',
          separator: ' to ',
          locale: {
              applyLabel: 'Submit',
              fromLabel: 'Dari',
              toLabel: 'Sampai',
              customRangeLabel: 'Custom Range',
              daysOfWeek: ['Su', 'Mo', 'Tu', 'We', 'Th', 'Fr','Sa'],
              monthNames: ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'],
              firstDay: 1
          }
       },
       function(start, end) {
        console.log("Callback has been called!");
        $('#reportrange span').html(start.format('D MMMM YYYY') + ' - ' + end.format('D MMMM YYYY'));
        startDate = start;
         endDate = end;    

       }
    );
    //Set the initial state of the picker label
    $('#reportrange span').html(moment().subtract('days', 29).format('D MMMM YYYY') + ' - ' + moment().format('D MMMM YYYY'));

    $('#saveBtn').click(function(){
        console.log(startDate.format('D MMMM YYYY') + ' - ' + endDate.format('D MMMM YYYY'));
    });

 ;
</script>    

<script type="text/javascript">
      $('#shubuh_dari').bootstrapMaterialDatePicker
      ({
        date: false,
        shortTime: false,
        format: 'HH:mm',
        clearButton: true
      });

      $('#shubuh_sampai').bootstrapMaterialDatePicker
      ({
        date: false,
        shortTime: false,
        format: 'HH:mm',
        clearButton: true
      });


      $('#dzuhur_dari').bootstrapMaterialDatePicker
      ({
        date: false,
        shortTime: false,
        format: 'HH:mm',
        clearButton: true
      });

      $('#dzuhur_sampai').bootstrapMaterialDatePicker
      ({
        date: false,
        shortTime: false,
        format: 'HH:mm',
        clearButton: true
      });


      $('#ashar_dari').bootstrapMaterialDatePicker
      ({
        date: false,
        shortTime: false,
        format: 'HH:mm',
        clearButton: true
      });

      $('#ashar_sampai').bootstrapMaterialDatePicker
      ({
        date: false,
        shortTime: false,
        format: 'HH:mm',
        clearButton: true
      });


      $('#maghrib_dari').bootstrapMaterialDatePicker
      ({
        date: false,
        shortTime: false,
        format: 'HH:mm',
        clearButton: true
      });

      $('#maghrib_sampai').bootstrapMaterialDatePicker
      ({
        date: false,
        shortTime: false,
        format: 'HH:mm',
        clearButton: true
      });


      $('#isya_dari').bootstrapMaterialDatePicker
      ({
        date: false,
        shortTime: false,
        format: 'HH:mm',
        clearButton: true
      });

      $('#isya_sampai').bootstrapMaterialDatePicker
      ({
        date: false,
        shortTime: false,
        format: 'HH:mm',
        clearButton: true
      });

      $.material.init()
    ;
</script>    