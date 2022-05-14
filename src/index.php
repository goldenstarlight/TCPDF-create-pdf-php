<?php

	if(isset($_POST['create_pdf'])) {

		require_once('tcpdf_include.php');
	
		// create new PDF document
		$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
	
		// set document information
		$pdf->setCreator(PDF_CREATOR);
		$pdf->setAuthor('Nicola Asuni');
		$pdf->setTitle('TCPDF Example 002');
		$pdf->setSubject('TCPDF Tutorial');
		$pdf->setKeywords('TCPDF, PDF, example, test, guide');
	
		// remove default header/footer
		$pdf->setPrintHeader(false);
		$pdf->setPrintFooter(false);
	
		// set default monospaced font
		$pdf->setFont('dejavusans', '', 14, '', true);
	
		// set margins
		$pdf->setMargins(20, 30, -40);
	
		// set auto page breaks
		$pdf->setAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);
	
		// set image scale factor
		$pdf->setImageScale(2);
	
		// set some language-dependent strings (optional)
		if (@file_exists(dirname(__FILE__).'/lang/eng.php')) {
			require_once(dirname(__FILE__).'/lang/eng.php');
			$pdf->setLanguageArray($l);
		}
	
		// ---------------------------------------------------------
	
	
		// add a page
		$pdf->AddPage();
	
		// set some text to print
		$html = <<<EOD
		<div style="padding-left: 50px;padding-right: 50px;">
			<table>
				<tr>
					<td >
						<img src="images/logo.png">
					</td>
					<td width="30%">
						<img src="images/site.png">
					</td>
				</tr>
			</table>
			<p style="font-size: 14px; color: gray">Classic Company Felsenstr. 4, 71106 Magstadt Deutschland</p>
			<table style="padding-bottom: 30px;">
				<tr>
					<td width="40%">
						<p style="font-size:18px">
							Klassiker Garage West<br>
							Andre Langohr<br>
							Bruchend 49<br>
							41836 Hückelhoven<br>
							Deutschland
						</p>
					</td>
					<td width="22%">
						<p style="font-size:18px; ">
							<b>Rechnungsnummer</b><br>
							<font style="font-size: 14px; color:gray;">Rechnungsdatum<br>
							Zahlungsmethode<br>
							Bestellnummer<br>
							Kundernummer</font>
						</p>
					</td>
					<td>
						<p style="font-size:18px;">
							<b>R-202204-0002</b><br>
							<font style="font-size: 14px; color:gray;">	24.04.2022<br>
							PayPal<br>
							B-1647510072-9442<br>
							22AL03RY53</font>
						</p>
					</td>
				</tr>
			</table>
			<hr style="width:74.4%;">
			<table style="padding-top:40px">
				<tr>
					<td width="30%">
					</td>
					<td>
						<p style="font-size: 35px;"><b>Rechnung</b></p>
					</td>
					<td>
					</td>
				</tr>
			</table>
			<table style="width:74.4%; padding-top:30px">
				<tr>
					<td width="10%">
						<p style="background-color: #dbeee6; padding-left: 7px; font-size:20px; color:gray; line-height: 40px; text-align:center">Pos.</p>
					</td>
					<td  width="30%">
					<p style="background-color: #dbeee6; padding-left: 7px; font-size:20px; color:gray; line-height: 40px; text-align:center"> Bezeichnung</p>
					</td>
					<td>
						<p style="background-color: #dbeee6; padding-left: 7px; font-size:20px; color:gray; line-height: 40px; text-align:center">Menge</p>
					</td>
					<td>
						<p style="background-color: #dbeee6; padding-left: 7px; font-size:20px; color:gray; line-height: 40px; text-align:center">Einzelpreis</p>
					</td>
					<td>
						<p style="background-color: #dbeee6; font-size:20px; color:gray; line-height: 40px; text-align:center">Preis</p>
					</td>
				</tr>
			</table>
			<table style="width:74.4%; padding-top:0px;">
				<tr>
					<td width="10%">
						<font style="font-size:18px; text-align:center; margin-top:-30px !important;">1</font>
					</td>
					<td  width="30%">
						<font style="font-size:18px; text-align:center">
							Werbe Banner: Klassik Garage West...
							Leistungszeitraum 23.03.2022 - 22.03.2023
						</font>
					</td>
					<td>
						<font style="font-size:18px; text-align:center">1</font>
					</td>
					<td>
						<font style="font-size:18px; text-align:right">99,90 Euro</font>
					</td>
					<td>
						<font style="font-size:18px; text-align:right">99,90 Euro</font>
					</td>
				</tr>
				<tr>
					<td colSpan="2"></td>
					<td colSpan="2" style="font-size: 18px; background-color: #dbeee6; line-height:2">
						Zwischensumme (Netto):
					</td>
					<td style="font-size: 18px; text-align: right; background-color: #dbeee6; line-height:2">
						83,95 Euro
					</td>
				</tr>
				<tr>
					<td colSpan="2"></td>
					<td colSpan="2" style="font-size: 18px; line-height:2">
						Umsatzsteuer (19%):
					</td>
					<td style="font-size: 18px; text-align: right; line-height:2">
						15,95 Euro
					</td>
				</tr>
				<tr>
					<td colSpan="2"></td>
					<td colSpan="2" style="font-size: 18px; background-color: #dbeee6; line-height:2">
						Gesamtsumme:
					</td>
					<td style="font-size: 18px; text-align: right; background-color: #dbeee6; line-height:2">
						99,90 Euro
					</td>
				</tr>
			</table>
			<br><br><br><br><br><br><br><br><br><br><br><br>
			<hr style="width:74.8%;">
			<table style="width:74.4%; padding-top: 30px; padding-bottom:0px">
				<tr>
					<td>
						<font style="font-size:18px;">Classic Company<br>
							<font style="color:gray; line-height: 25px; font-size:16px;">Felsenstr. 4<br>
								71106 Magstadt<br>
								Deutschland	
							</font>
						</font>
					</td>
					<td>
						<font style="color:gray; line-height: 25px; font-size:16px;">+49 (0) 7159 70 640
							info@classic-company.de<br>
							https://classic-company.de/
						</font>
					</td>
					<td>
						<font style="color:gray; line-height: 25px; font-size:16px;">Steuer-Nr: xxx/xxx/xxxxxxx
							USt.-ID: DE296946713<br>
							Inhaber: Ömür Bozkurt
						</font>
					</td>
					<td>
						<font style="color:gray; line-height: 25px; font-size:16px;">Bank: Kreissparkasse Böblingen<br>
							IBAN: DE62603501301002378894<br>
							BIC: BBKRDE6BXXX 
						</font>
					</td>
				</tr>
			</table>
		<div>
		EOD;
	
		// print a block of text using Write()
		$pdf->writeHTMLCell(0, 0, '', '', $html, 0, 1, 0, true, '', true);
	
		// ---------------------------------------------------------
	
		//Close and output PDF document
		$pdf->Output('example_002.pdf', 'I');
	}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
</head>
<body>
	<div style="padding-left: 50px;padding-right: 50px; margin-top: 20vh; display:flex; justify-content: center;">
		<form method="post" style="align-self: center;">
			<input type="submit" value="CREATE PDF" name="create_pdf" style="height:50vh; width: 50vw">
		</form>
	<div>
</body>
</html>

