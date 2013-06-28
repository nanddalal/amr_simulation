<?php
function convert($uploaded_file, $upload_path) {
	putenv("LD_LIBRARY_PATH=/usr/local/lib");
	$narrow_band = array('4.75k','5.15k','5.90k','6.70k','7.40k','7.95k','10.20k','12.20k');
	$narrow_names = array('475k','515k','590k','670k','740k','795k','1020k','1220k');
	$wide_band = array('14.25k','15.85k','18.25k','19.85k','23.05k','23.85k');
	$wide_names = array('1425k','1585k','1825k','1985k','2305k','2385k');

	for ($i = 0; $i < count($narrow_band); $i++) {
		$cmd = "ffmpeg -y -vn -i " . $uploaded_file ." -y -acodec libopencore_amrnb -ac 1 -ar 8000 -ab " . $narrow_band[$i] . " -f amr " . $upload_path . $narrow_names[$i] . ".amr";
			exec($cmd." 2>&1", $out, $ret);
			if ($ret) {
				echo "Not so good with " . $narrow_band[$i] . PHP_EOL;
				print_r($out);
			} else {
				echo "Good with " . $narrow_band[$i] . PHP_EOL;
			}
		$cmd = "ffmpeg -y -acodec libopencore_amrnb -vn -i " . $upload_path . $narrow_names[$i] .".amr " . $upload_path . $narrow_names[$i] . ".wav > /dev/null 2>/dev/null &";
			exec($cmd." 2>&1", $out, $ret);
			if ($ret) {
				echo "wav Not so good with " . $narrow_band[$i] . PHP_EOL;
				print_r($out);
			} else {
				echo "wav Good with " . $narrow_band[$i] . PHP_EOL;
			}
	}

	for ($i = 0; $i < count($wide_band); $i++) {
		$cmd = "ffmpeg -y -vn -i " . $uploaded_file ." -y -acodec libvo_amrwbenc -ac 1 -ar 16000 -ab " . $wide_band[$i] . " -f amr " . $upload_path . $wide_names[$i] . ".amr";
			exec($cmd." 2>&1", $out, $ret);
			if ($ret) {
				echo "Not so good with " . $wide_band[$i] . PHP_EOL;
				print_r($out);
			} else {
				echo "Good with " . $wide_band[$i] . PHP_EOL;
			}
		$cmd = "ffmpeg -y -acodec libopencore_amrwb -vn -i " . $upload_path . $wide_names[$i] .".amr " . $upload_path . $wide_names[$i] . ".wav > /dev/null 2>/dev/null &";
			exec($cmd." 2>&1", $out, $ret);
			if ($ret) {
				echo "wav Not so good with " . $wide_band[$i] . PHP_EOL;
				print_r($out);
			} else {
				echo "wav Good with " . $wide_band[$i] . PHP_EOL;
			}
	}

	$str1 = "";
	for ($i = 0; $i < count($narrow_band); $i++) {
		$str1 .= "
		<div class='span4 lightblue'>
			<label><a href='" . $upload_path . $narrow_names[$i] . ".amr'>NB " . $narrow_band[$i] . "</a></label>
			<audio controls>
				<source src='" . $upload_path . $narrow_names[$i] . ".wav' type='audio/wav'>
				<script>
					QT_WriteOBJECT('" . $upload_path . $narrow_names[$i] . ".amr','40em','31em','','scale','tofit','emb#id','paris_embed','obj#id','paris_obj');
				</script>
			</audio>
		</div><!--/span-->
		";
	}

	$str2 = "";
	for ($i = 0; $i < count($wide_band); $i++) {
		$str2 .= "
		<div class='span4 lightblue'>
			<label><a href='" . $upload_path . $wide_names[$i] . ".amr'>WB " . $wide_band[$i] . "</a></label>
			<audio controls>
				<source src='" . $upload_path . $wide_names[$i] . ".wav' type='audio/wav'>
				<script>
					QT_WriteOBJECT('" . $upload_path . $wide_names[$i] . ".amr','40em','31em','','scale','tofit','emb#id','paris_embed','obj#id','paris_obj');
				</script>
			</audio>
		</div><!--/span-->
		";
	}
	return array($str1, $str2);
}
?>
