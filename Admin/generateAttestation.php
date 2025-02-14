<?php
// Include the PHPWord library
require_once 'vendor/autoload.php'; // Ensure this path is correct based on your PHPWord installation

use PhpOffice\PhpWord\PhpWord;
use PhpOffice\PhpWord\IOFactory;

// Establish database connection
include('db_connection.php'); // Replace with your DB connection file

if (isset($_GET['Id']) && is_numeric($_GET['Id'])) {
    $Id = $_GET['Id'];

    // Fetch the student details from the database
    $query = "SELECT * FROM tblstudents WHERE Id = '$Id'"; // Adjust to your database structure
    $result = $conn->query($query);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();

        // Create a new PHPWord object
        $phpWord = new PhpWord();
        $section = $phpWord->addSection();
        
        // Add the student's information to the document
        $section->addText('Attestation', array('bold' => true, 'size' => 14));
        $section->addText('Nom complet: ' . $row['firstName'] . ' ' . $row['lastName']);
        $section->addText('Autre nom: ' . $row['otherName']);
        $section->addText('Numéro d\'admission: ' . $row['admissionNumber']);
        $section->addText('Classe: ' . $row['classId']);
        $section->addText('Date de création: ' . $row['dateCreated']);
        // Add more fields as needed

        // Set the filename for the Word document
        $filename = 'attestation_' . $row['admissionNumber'] . '.docx';

        // Send headers to force the download of the Word document
        header('Content-Type: application/vnd.openxmlformats-officedocument.wordprocessingml.document');
        header('Content-Disposition: attachment;filename="' . $filename . '"');
        header('Cache-Control: max-age=0');

        // Write the document to the output
        $objWriter = IOFactory::createWriter($phpWord, 'Word2007');
        $objWriter->save('php://output');

        // Exit to prevent further output
        exit;
    } else {
        echo "No student found with this ID.";
    }
} else {
    echo "Invalid student ID.";
}
?>
