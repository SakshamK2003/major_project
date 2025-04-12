<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $data = [
        'Name' => $_POST['name'],
        'DOB' => $_POST['dob'],
        'Gender' => $_POST['gender'],
        'Marital' => $_POST['marital'],
        'Address' => $_POST['address'],
        'Mobile' => $_POST['mobile'],
        'Email' => $_POST['email'],
        'Loan Type' => $_POST['loan_type'],
        'Amount' => $_POST['amount'],
        'Purpose' => $_POST['purpose'],
        'Occupation' => $_POST['occupation'],
        'Income' => $_POST['income']
    ];

    // Save files
    $uploadDir = "uploads/";
    if (!is_dir($uploadDir)) {
        mkdir($uploadDir);
    }

    $identityPath = $uploadDir . basename($_FILES["identity"]["name"]);
    move_uploaded_file($_FILES["identity"]["tmp_name"], $identityPath);

    $signaturePath = $uploadDir . basename($_FILES["signature"]["name"]);
    move_uploaded_file($_FILES["signature"]["tmp_name"], $signaturePath);

    // Save as CSV
    $file = fopen("submissions.csv", "a");
    fputcsv($file, array_values($data));
    fclose($file);

    echo "<h2>Thank you for applying! धन्यवाद!</h2>";
} else {
    echo "Invalid request.";
}
?>
