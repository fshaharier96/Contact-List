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

        // get active sheet

        $sheet = $spreadsheet->getActiveSheet();


        $highestRow = $sheet->getHighestRow();
        $highestColumn = $sheet->getHighestColumn();

        $sql="SELECT phone,email FROM contact_info_table";
        $result=mysqli_query($conn,$sql) or die("connention failed");
        if(mysqli_num_rows($result)){
            while($dbrow=mysqli_fetch_assoc($result)){
                $dbValues=array();
                array_push()
            }
        }

        for ($row = 1; $row <= $highestRow; ++$row) {
            $rowData = [];
            for ($col = 'A'; $col <= $highestColumn; ++$col) {
                $cellValue = $sheet->getCell($col . $row)->getValue();
                // Store cell values in an array
                $rowData[] = $cellValue;

            }

         $sql1 = "INSERT INTO contact_info_table(user_id,contact_image,first_name,last_name,company,job_title,department,email,phone,country,street_address,city,postal_code,birth_date,favourite,trash_id)
                 VALUES ('".$rowData[0]."','".$rowData[1]."','".$rowData[2]."','".$rowData[3]."','".$rowData[4]."','".$rowData[5]."','".$rowData[6]."','".$rowData[7]."','".$rowData[8]."','".$rowData[9]."',
                 '".$rowData[10]."','".$rowData[11]."','".$rowData[12]."','".$rowData[13]."','".$rowData[14]."','".$rowData[15]."')";

            $result1 = mysqli_query($conn, $sql1) or die("query unsuccessful: ");

                    if(!$result1)
                    {
                        echo "<script type=\"text/javascript\">
              alert(\"Invalid File:Please Upload CSV or Excel File.\");
              window.location = \"/home\"
              </script>";
                    }
                    else {
                        header("Location:/home");
                    }

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