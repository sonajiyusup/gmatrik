<?php 
  include 'functions2.php';  
 ?>

<div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                INPUT TARGET HAFALAN QURAN MAHASISWA
                            </h2>
                        </div>
                        <form method="POST" id="formInputTargetHafalan">
	                        <div class="body">
	                            <div class="irs-demo">
	                                <b>Pilih Target Hafalan (Juz 30 Sampai 1)</b>
	                                <input type="text" id="range_07" class="js-range-slider" value="" />
	                            </div>
	                            <button type="submit" class="btn btn-primary waves-effect js-get-values" name="submitTargetHafalan">SUBMIT</button>
	                           <div class="result">
																<input type="hidden" class="js-result-to" name="juz_dari" value="" />
															</div>
	                           <div class="result">
																<input type="hidden" class="js-result-from" name="juz_sampai" value="" />
															</div>
                        	</div>
                        </form>
                    </div>
                </div>
</div>

    <?php 
        if (isset($_POST['submitTargetHafalan'])) {
          inputTargetHafalan($_POST['juz_dari'], $_POST['juz_sampai']);

					echo "<script>document.location='?page=targethafalan'</script>";
        }
    ?>

<script type="text/javascript">
	var $range = $(".js-range-slider"),
	    $resultfrom = $(".js-result-from"),
	    $resultto = $(".js-result-to"),
	    $getvalues = $(".js-get-values"),
	    
	    from = 0,
	    to = 0;

	var saveResult = function (data) {
	    from = data.from;
	    to = data.to;
	};

	var writeResult = function () {
			$resultfrom.val(to)
	    $resultto.val(from);
	};

	$range.ionRangeSlider({
	    type: "double",
	    grid: true,
      values: [0, 30, 29, 28, 27, 26, 25, 24, 23, 22, 21, 20, 19, 18, 17, 16, 15, 14, 13, 12, 11, 10, 9, 8, 7, 6, 5, 4, 3, 2, 1]
	    from: from,
	    to: to,
	    onStart: function (data) {
	        saveResult(data);
	        writeResult();
	    },
	    onChange: saveResult,
	    onFinish: saveResult
	});

	$getvalues.on("click", writeResult);

</script>