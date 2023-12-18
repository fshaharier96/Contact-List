<?php
require('vendor/autoload.php');
include_once "classes/Database.php";

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\IOFactory;

class ImportExport
{
    public function import()
    {
        $db_connect = new Database();
        $conn = $db_connect->conn;

        // inilializing Spreadsheet Class

        $spreadsheet = new Spreadsheet();


        $inputFileName = $_FILES["file"]["tmp_name"];

        // load the spreasheet file
        $spreadsheet = IOFactory::load($inputFileName);


        $sheet = $spreadsheet->getActiveSheet();


        $highestRow = $sheet->getHighestRow();
        $highestColumn = $sheet->getHighestColumn();


        for ($row = 1; $row <= $highestRow; ++$row) {
            $rowData = [];
            for ($col = 'A'; $col <= $highestColumn; ++$col) {
                $cellValue = $sheet->getCell($col . $row)->getValue();
                // Store cell values in an array
                $rowData[] = $cellValue;


            }


            // Use your database insert query here, assuming a table named 'excel_data'


        }


//            if($_FILES["file"]["size"] > 0)
//            {
//                $file = fopen($filename, "r");
//                while (($getData = fgetcsv($file, 10000, ",")) !== FALSE)
//                {
//                    // echo $getData[0]."<br/>";
//                    // echo $getData[1]."<br/>";
//                    // echo $getData[2]."<br/>";
//
//                    $sql = "INSERT INTO contact_info_table(user_id,contact_image,first_name,last_name,company,job_title,department,email,phone,country,street_address,city,postal_code,birth_date,favourite,trash_id)
//                   VALUES ('".$getData[0]."','".$getData[1]."','".$getData[2]."','".$getData[3]."','".$getData[4]."','".$getData[5]."','".$getData[6]."','".$getData[7]."','".$getData[8]."','".$getData[9]."','".$getData[10]."','".$getData[11]."','".$getData[12]."','".$getData[13]."','".$getData[14]."','".$getData[15]."')";
//
//                    $result = mysqli_query($conn, $sql) or die("query unsuccessful: ".mysqli_error($conn));
//                    if(!$result)
//                    {
//                        echo "<script type=\"text/javascript\">
//              alert(\"Invalid File:Please Upload CSV File.\");
//              window.location = \"/home\"
//              </script>";
//                    }
//                    else {
//                        header("Location:/home");
//                    }
//                }
//
//                fclose($file);
//            }
    }
}

public
function export()
{
    $db_connect = new Database();
    $conn = $db_connect->conn;

    $sql = "SELECT * FROM contact_info_table"; // Replace 'contacts' with your table name
    $result = mysqli_query($conn, $sql);

    if ($result->num_rows > 0) {
        // Set headers for file download
        header('Content-Type: text/csv');
        header('Content-Disposition: attachment; filename="contacts.csv"');

        // Open a file handle to write CSV data
        $output = fopen('php://output', 'w');

        // Write headers to the CSV file
        fputcsv($output, array('First Name', 'Last Name', 'Email', 'Phone', 'Country'));

        // Loop through database results and write each row to the CSV file
        while ($row = $result->fetch_assoc()) {
            fputcsv($output, array($row['first_name'], $row['last_name'], $row['email'], $row['phone'], $row['country'])); // Adjust these fields according to your database schema
        }

        // Close file handle
        fclose($output);
    } else {
        echo "No contacts found";
    }

// Close database connection
    $conn->close();
}


}