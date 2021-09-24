<?php

if (strtolower($_SERVER['REQUEST_METHOD']) === 'options') {
    header('Access-Control-Allow-Origin: *');
    header('Access-Control-Allow-Methods: POST, GET, DELETE, PUT, PATCH, OPTIONS');
    header('Access-Control-Allow-Headers: Content-Type');
    header('Access-Control-Max-Age: 1728000');
    header('Content-Length: 0');
    header('Content-Type: text/plain');
    die();
}

header('Access-Control-Allow-Origin: *');

if (strtolower($_SERVER['REQUEST_METHOD']) === 'get') {
    echo '
        <form action="https://2i-js.iknsa.xyz/create-user.php" method="post">
            <div>
                <label for="name">Name</label>
                <input type="text" name="name" id="name">
            </div>
            <div>
                <label for="age">Age</label>
                <input type="text" name="age" id="age">
            </div>
    
            <div>
                <input type="submit">
            </div>
        </form>
    ';
    exit;
}

if (strtolower($_SERVER['REQUEST_METHOD']) === 'post') {
    if (isset($_POST['name']) && isset($_POST['age']) && $_POST['name'] !== "" && $_POST['age'] !== "") {
        $response = [
            "success" => true,
            "message" => "Votre message a bien été transmis"
        ];
    } else {
        $response = [
            "message" => "Il y a des erreurs dans le formulaire"
        ];
    }

    header('Content-Type: application/json');

    echo json_encode($response);
    exit;
}