<!-- convert mysql to csv -->

<?php
//connect database
$servername = "au-cdbr-azure-east-a.cloudapp.net";
$username = "be8d174af4b73c";
$password = "55d0247f";
$dbname = "acsm_08460dd72e726f7";
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
} 

//connect database table
$select = "SELECT * FROM dress";

$export = mysqli_query ($conn, $select ) or die ( "Sql error : " . mysqli_error( ) );

//find fields in table
$fields = mysqli_num_fields ( $export );


//loop fields and find value of each column
for ( $i = 0; $i < $fields; $i++ )
{
    $header .= mysql_field_name( $export , $i ) . "\t";
}

while( $row = mysqli_fetch_row( $export ) )
{
    $line = '';
    foreach( $row as $value )
    {                                            
        if ( ( !isset( $value ) ) || ( $value == "" ) )
        {
            $value = "\t";
        }
        else
        {
            $value = str_replace( '"' , '""' , $value );
            $value = '"' . $value . '"' . "\t";
        }
        $line .= $value;
    }
    $data .= trim( $line ) . "\n";
}
$data = str_replace( "\r" , "" , $data );

if ( $data == "" )
{
    $data = "\n(0) Records Found!\n";                        
}

//set file name and download
header("Content-type: application/octet-stream");
header("Content-Disposition: attachment; filename=bestDressed.xls");
header("Pragma: no-cache");
header("Expires: 0");
print "$header\n$data";

$conn->close();

?>