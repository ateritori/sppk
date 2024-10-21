<?php
if (isset($_GET['url'])) {
	$url = $_GET['url'];

	switch ($url) {
		case 'alternatif';
			include 'alternatif.php';
			break;

		case 'tambahalternatif';
			include 'tambahalternatif.php';
			break;

		case 'editalternatif';
			include 'editalternatif.php';
			break;

		case 'kriteria';
			include 'kriteria.php';
			break;

		case 'tambahkriteria';
			include 'tambahkriteria.php';
			break;

		case 'editkriteria';
			include 'editkriteria.php';
			break;

		case 'mtrxkeputusan';
			include 'mtrx_keputusan.php';
			break;

		case 'editkeputusan';
			include 'edit_keputusan.php';
			break;


		case 'tambahnilai';
			include 'tambahnilai.php';
			break;

		case 'mtrxternormalisasi';
			include 'mtrx_ternormalisasi.php';
			break;

		case 'nilaipreferensi';
			include 'nilaipreferensi.php';
			break;

		case 'tambahsub';
			include 'tambahsub.php';
			break;

		case 'editsubkriteria';
			include 'editsubkriteria.php';
			break;

		case 'rentang';
			include 'rentang.php';
			break;

		case 'tambahrentang';
			include 'tambahrentang.php';
			break;

		case 'editrentang';
			include 'editrentang.php';
			break;

		case 'hapusrentang';
			include 'hapusrentang.php';
			break;

		case 'simpaneditrentang';
			include 'simpaneditrentang.php';
			break;

		case 'simpannilai';
			include 'simpannilai.php';
			break;

		case 'penilaian';
			include 'penilaian.php';
			break;

		case 'editpenilaian';
			include 'editpenilaian.php';
			break;

		case 'agregasi';
			include 'agregasi.php';
			break;

		case 'preferensi';
			include 'preferensi.php';
			break;

		case 'perankingan';
			include 'perangkingan.php';
			break;

		case 'rinciansaw';
			include 'rinciansaw.php';
			break;
	}
} else {
?>
	<br>
	<div class="h3 mb-0 font-weight-bold" style="color: black;">
		SISTEM PENDUKUNG PEMBUATAN KEPUTUSAN SELEKSI KEPALA DEPUTI INVESTASI IKN<br>
		Metode SAW (Simple Additive Weighting) <br>
		<hr>
		Selamat Datang <?php echo $_SESSION['username']; ?> !
	</div>
	<!-- <img src ="assets/img/gov.jpg"> -->
	<div class="container_dash">
		<img src="assets/img/gov.png" alt="government" style="width: 100%;">
	</div>

<?php
}
?>