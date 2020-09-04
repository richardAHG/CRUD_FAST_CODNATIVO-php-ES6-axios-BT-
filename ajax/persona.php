<?php
//creacion de un API
// require_once '../modelos/persona.php';
// $obj = new Persona();

// if ($_SERVER['REQUEST_METHOD'] == 'GET') {
//     http_response_code(200);
//     $peticion = $_GET['url'];
//     print_r($peticion);
//     die();
//     switch ($peticion) {
//         case 'listar':
            
//             $rpta = $obj->listar();
//             // print_r($rpta);
//             // die();
//             $data = [];
//             // var_dump($rpta);
//             // die();
//             if (!is_object($rpta)) {
//                 echo 'Error al momento de traer los datos';
//                 return;
//             }
//             while ($reg = $rpta->fetch_object()) {
//                 $data[] = [
//                     'userid' => $reg->userid,
//                     'id' => $reg->id,
//                     'title' => $reg->title,
//                     'body' => $reg->body,
//                 ];
//             }

//             echo json_encode($data);
//             break;

//         default:
//             # code...
//             break;
//     }
// } elseif ($_SERVER['REQUEST_METHOD'] == 'POST') {
//     http_response_code(200);
// } else {
//     http_response_code(405);
// }


require_once '../modelos/persona.php';
$obj = new Persona();

$id = isset($_POST['id']) ? $_POST['id'] : '';


switch ($_GET['op']) {
    case 'listar':
        $rpta = $obj->listar();
        // print_r($rpta);
        // die();
        $data = [];
        // var_dump($rpta);
        // die();
        if (!is_object($rpta)) {
            echo 'Error al momento de traer los datos';
            return;
        }
        while ($reg = $rpta->fetch_object()) {
            $data[] = [
                'userid' => $reg->userid,
                'id' => $reg->id,
                'title' => $reg->title,
                'body' => $reg->body,
            ];
        }

        echo json_encode($data);
        break;
    case 'eliminar':
        $rpta = $obj->eliminar($id);
        echo $rpta? 'Registro Eliminado':'Error al momento de eliminar';
        break;
    default:
        # code...
        break;
}
