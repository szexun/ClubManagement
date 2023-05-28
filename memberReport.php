<?php
    //include library
    include('library/tcpdf.php');
    include('db.php');

    $sql_query = "SELECT * FROM `member list`";
    $result = mysqli_query($conn, $sql_query);

    // make TCPDF object
    $pdf = new TCPDF('P', 'mm', 'A4');

    // remove default header and footer
    $pdf -> setPrintHeader(false);
    $pdf -> setPrintFooter(false);

    // add page
    $pdf -> AddPage();

    // add content
    // title
    $pdf -> SetFont('Helvetica', '', 14);
    $pdf -> Cell(190, 10, "Members Report", 0, 1, 'C');
    $pdf -> Ln();

    // make the table
    $pdf -> SetFont('Helvetica', '', 10);
    $html = "
        <table>
            <tr>
                <th>Member ID</th>
                <th>Member Name</th>
                <th>Member Email</th>
                <th>Member Gender</th>
                <th>Club Name</th>
            </tr>
            ";
    while($row = mysqli_fetch_assoc($result)){
        $html .= "
            <tr>
                <td>". $row['member_id']."</td>
                <td>". $row['member_name']."</td>
                <td>". $row['member_email']."</td>
                <td>". $row['member_gender']."</td>
                <td>". $row['club_name']."</td>
            </tr>
            ";
    }
    
    $html .= "
        </table>
        <style>
            table {
                border-collapse: collapse;
            }
            th, td {
                border: 1px solid #888;
            }
            table tr th {
                background-color: #888;
                color: #fff;
                font-weight: bold;
            }
        </style>
    ";

    // while($row = mysqli_fetch_assoc($result)){
    //     $pdf -> Cell(10,5, $row['id'], 1);
    //     $pdf -> Cell(50,5, $row['club_name'], 1);
    //     $pdf -> Cell(130,5, $row['club_description'], 1);
    //     $pdf -> Ln();
    // }
    
    // writeHTMLCell
    $pdf -> writeHTMLCell(192, 0, 9, '', $html, 0);

    // output
    $pdf -> Output();
?>