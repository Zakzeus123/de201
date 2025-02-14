<?php
require 'vendor/autoload.php';
include '../Includes/dbcon.php';

if (isset($_GET['Id'])) {
    $studentId = intval($_GET['Id']);
    $query = mysqli_query($conn, "SELECT tblstudents.*, tblclass.className 
                                  FROM tblstudents 
                                  INNER JOIN tblclass ON tblclass.Id = tblstudents.classId 
                                  WHERE tblstudents.Id = '$studentId'");
    $row = mysqli_fetch_assoc($query);

    if (!$row) {
        die("Erreur : étudiant introuvable !");
    }

    $pdf = new FPDF();
    $pdf->AddPage();
    
    // Titre
    $pdf->SetFont('Arial', 'B', 16);
    $pdf->Cell(0, 10, 'Attestation de Scolarité', 0, 1, 'C');
    $pdf->Ln(10);
    
    // Informations de l'étudiant
    $pdf->SetFont('Arial', '', 12);
    $pdf->Cell(0, 10, 'Nom complet : ' . utf8_decode($row['firstName'] . ' ' . $row['lastName']), 0, 1);
    $pdf->Cell(0, 10, 'Numéro d\'admission : ' . $row['emailAddress'], 0, 1);
    $pdf->Cell(0, 10, 'Classe : ' . utf8_decode($row['className']), 0, 1);
    $pdf->Ln(10);

    // Texte de confirmation
    $pdf->MultiCell(0, 10, utf8_decode("Nous certifions que l'étudiant(e) susmentionné(e) est inscrit(e) dans notre établissement pour l'année scolaire en cours."), 0, 'L');
    $pdf->Ln(10);

    // Signature
    $pdf->Cell(0, 10, 'Signature du directeur : ___________________', 0, 1);
    
    // Téléchargement du PDF
    $pdf->Output('D', 'Attestation_' . $row['firstName'] . '.pdf'); 
} else {
    echo "ID invalide !";
}
?>
