<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];
    $email = $_POST["email"];
    $message = $_POST["message"];

    // Set up the GitHub repository details
    $repoOwner = "Takochi17"; // Replace with your GitHub username or organization
    $repoName = "LPL-Mastery"; // Replace with your repository name

    // GitHub API endpoint for creating an issue
    $apiEndpoint = "https://api.github.com/repos/$repoOwner/$repoName/issues";

    // Set the issue title and body
    $issueTitle = "New message from contact form";
    $issueBody = "Name: $name\nEmail: $email\nMessage: $message";

    // Set the request headers with authentication and content type
    $headers = [
        "Authorization: Bearer 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", // Replace with your GitHub personal access token
        "User-Agent: PHP" // Provide a user agent name
    ];

    // Set up the request data
    $data = [
        "title" => $issueTitle,
        "body" => $issueBody
    ];

    // Initialize cURL session
    $curl = curl_init();

    // Set the cURL options
    curl_setopt_array($curl, [
        CURLOPT_URL => $apiEndpoint,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_POST => true,
        CURLOPT_POSTFIELDS => json_encode($data),
        CURLOPT_HTTPHEADER => $headers,
        CURLOPT_USERAGENT => "PHP" // Provide a user agent name
    ]);

    // Execute the cURL request
    $response = curl_exec($curl);

    // Check if the request was successful
    if ($response !== false) {
        $statusCode = curl_getinfo($curl, CURLINFO_HTTP_CODE);
        if ($statusCode == 201) {
            echo "Thank you! Your message has been submitted.";
        } else {
            echo "Oops! Something went wrong. Error code: $statusCode";
        }
    } else {
        echo "Oops! Something went wrong. cURL error: " . curl_error($curl);
    }

    // Close cURL session
    curl_close($curl);
}

?>
