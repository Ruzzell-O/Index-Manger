<?php
$action = $_REQUEST['action'];

if (!empty($action)) {
    require_once 'includes/Player.php';
    $obj = new Player();
}

if ($action == 'adduser' && !empty($_POST)) {
    $pname = $_POST['username'];
    $occupation = $_POST['occupation'];
    $gender = $_POST['gender'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];
    $city = $_POST['city'];
    $zipcode = $_POST['zip'];
    $birthdate = $_POST['birth'];
    $civilstatus = $_POST['civilstatus'];
    $citizenship = $_POST['citizenship'];
    $religion = $_POST['religion'];
    $sssidno = $_POST['sss'];
    $umidno = $_POST['umid'];
    $gsis = $_POST['gsis'];
    $pagibig = $_POST['pagibig'];
    $philhealth = $_POST['philhealth'];
    $date = $_POST['date'];
    $photo = $_FILES['photo'];
    $document = $_FILES['document'];
    $playerId = (!empty($_POST['userid'])) ? $_POST['userid'] : '';

    $imagename = '';
    $documentname = '';
    if (!empty($photo['name']) && !empty($document['name'])) {
        $imagename = $obj->uploadPhoto($photo);
        $documentname = $obj->uploadDocument($document);
        $playerData = [
            'pname' => $pname,
            'occupation' => $occupation,
            'gender' => $gender,
            'email' => $email,
            'phone' => $phone,
            'address' => $address,
            'city' => $city,
            'zipcode' => $zipcode,
            'birthdate' => $birthdate,
            'civilstatus' => $civilstatus,
            'citizenship' => $citizenship,
            'religion' => $religion,
            'sssidno' => $sssidno,
            'umidno' => $umidno,
            'gsis' => $gsis,
            'pagibig' => $pagibig,
            'philhealth' => $philhealth,
            'date' => $date,
            'photo' => $imagename,
            'document' => $documentname,
        ];
    } elseif (!empty($photo['name'])) {
        $imagename = $obj->uploadPhoto($photo);
        $playerData = [
            'pname' => $pname,
            'occupation' => $occupation,
            'gender' => $gender,
            'email' => $email,
            'phone' => $phone,
            'address' => $address,
            'city' => $city,
            'zipcode' => $zipcode,
            'birthdate' => $birthdate,
            'civilstatus' => $civilstatus,
            'citizenship' => $citizenship,
            'religion' => $religion,
            'sssidno' => $sssidno,
            'umidno' => $umidno,
            'gsis' => $gsis,
            'pagibig' => $pagibig,
            'philhealth' => $philhealth,
            'date' => $date,
            'photo' => $imagename,
        ];
    } elseif (!empty($document['name'])) {
        $documentname = $obj->uploadDocument($document);
        $playerData = [
            'pname' => $pname,
            'occupation' => $occupation,
            'gender' => $gender,
            'email' => $email,
            'phone' => $phone,
            'address' => $address,
            'city' => $city,
            'zipcode' => $zipcode,
            'birthdate' => $birthdate,
            'civilstatus' => $civilstatus,
            'citizenship' => $citizenship,
            'religion' => $religion,
            'sssidno' => $sssidno,
            'umidno' => $umidno,
            'gsis' => $gsis,
            'pagibig' => $pagibig,
            'philhealth' => $philhealth,
            'date' => $date,
            'document' => $documentname,
        ];
    } else {
        $playerData = [
            'pname' => $pname,
            'occupation' => $occupation,
            'gender' => $gender,
            'email' => $email,
            'phone' => $phone,
            'address' => $address,
            'city' => $city,
            'zipcode' => $zipcode,
            'birthdate' => $birthdate,
            'civilstatus' => $civilstatus,
            'citizenship' => $citizenship,
            'religion' => $religion,
            'sssidno' => $sssidno,
            'umidno' => $umidno,
            'gsis' => $gsis,
            'pagibig' => $pagibig,
            'philhealth' => $philhealth,
            'date' => $date,
        ];
    }

    if ($playerId) {
        $obj->update($playerData, $playerId);
    } else {
        $playerId = $obj->add($playerData);
    }

    if (!empty($playerId)) {
        $player = $obj->getRow('id', $playerId);
        echo json_encode($player);
        exit();
    }    
}

if ($action == "getusers") {
    $page = (!empty($_GET['page'])) ? $_GET['page'] : 1;
    $limit = 6;
    $start = ($page - 1) * $limit;

    $players = $obj->getRows($start, $limit);
    if (!empty($players)) {
        $playerslist = $players;
    } else {
        $playerslist = [];
    }
    $total = $obj->getCount();
    $playerArr = ['count' => $total, 'players' => $playerslist];
    echo json_encode($playerArr);
    exit();
}

if ($action == "getuser") {
    $playerId = (!empty($_GET['id'])) ? $_GET['id'] : '';
    if (!empty($playerId)) {
        $player = $obj->getRow('id', $playerId);
        echo json_encode($player);
        exit();
    }
}

if ($action == "deleteuser") {
    $playerId = (!empty($_GET['id'])) ? $_GET['id'] : '';
    if (!empty($playerId)) {
        $isDeleted = $obj->deleteRow($playerId);
        if ($isDeleted) {
            $message = ['deleted' => 1];
        } else {
            $message = ['deleted' => 0];
        }
        echo json_encode($message);
        exit();
    }
}

if ($action == 'search') {
    $queryString = (!empty($_GET['searchQuery'])) ? trim($_GET['searchQuery']) : '';
    $results = $obj->searchPlayer($queryString);
    echo json_encode($results);
    exit();
}
